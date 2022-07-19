<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends CI_Controller {

	public function __Construct()
    {
        parent ::__construct();
        $this->load->model('UserModel');
        $this->load->model('UniModel');
        $this->load->model('TopicModel');
        $this->load->model('ConsultModel');
        $this->load->model('LeadModel');
		$this->load->model('LogMail');
        $this->load->library('mail_smtp');
    }

	public function view()
	{
		if($this->session->has_userdata('user_id')) { // if the session value is null or doesn't exist
			redirect('/');
		}
		
		$data['title'] = "Registration";

		$this->load->view('template/header', $data);
		$this->load->view('user/register');
		$this->load->view('template/footer');
	}

	public function register()
	{	
		
		// saving school name if user select other start
		$schoolOption = $this->input->post('school_option');
		if(strtolower($schoolOption) == "other") {

			$postRequest = array(
			    'sch_name' => $this->input->post('user_school')
			);

			$url = 'bigdata.crm-allinedu.com/api/save/school'; 
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_SSL_VERIFYHOST => false,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => $postRequest
			));

			$response = curl_exec($curl);

			if ($response === false) 
				$response = curl_error($curl);
		
		}
		// saving school name if user select other end
		
		// add other major into selected major start
		$user_major = $this->input->post('user_major');
		$user_major_other = $this->input->post('user_major_other');
		if(strpos($user_major, "other") !== false) { //word found
			$user_major = str_replace('other,', '', $user_major);
			$user_major = $user_major.",".$user_major_other;
		}
		// add other major into selected major end

		$data = array(
			"user_fullname"          => $this->input->post('user_fullname'),
			"user_email"             => $this->input->post('user_email'),
			"user_password"          => password_hash($this->input->post('user_password'), PASSWORD_DEFAULT),
			"user_phone"             => $this->input->post('user_phone'),
			"user_status"            => $this->input->post('user_status'),
			"user_gender"            => $this->input->post('user_gender'),
			"user_dob"               => $this->input->post('user_dateofbirth'),
			"user_first_time"        => $this->input->post('user_first_time') == "yes" ? 1 : 0,
			"user_grade"             => $this->input->post('user_grade'),
			"user_school"            => $this->input->post('user_school'),
			"user_country"           => $this->input->post('user_destination'),
			"user_major"             => $user_major,
			"user_know_from"         => str_replace("'", "\'", $this->input->post('user_lead')),
			"user_register_date"     => date('Y-m-d H:i:s'),
			"user_last_login"        => '',
			"user_biggest_challenge" => $this->input->post('user_biggest_challenge'),
			"came_from"              => ($this->input->post('param') != "") ? 1 : 0, // 1 personality test, 0 dashboard
		);


		$email = $this->input->post('user_email');
		$process = $this->UserModel->insertUser($data);
		// echo json_encode($process);exit;
		if($process['val']) {
			$inserted_id = $process['val'];

			//build token
			$token = $this->UserModel->insertToken($inserted_id);
			$qstring = $this->base64url_encode($token);

			//buat redirect link sesuai parameter
			$add_on = '';
			if ($redirect_clue = $this->input->post('param')) {
				$add_on = "?param=".$redirect_clue;
			}

			$data = array( "url" => base_url() . '/verify/token/' . $qstring . $add_on );
			// send verification mail
			if($this->sendingEmail($data, $email)) {
				$sent = true;

				// send mail success
				$array = array(
		          "code" => "001",
		          "msg"  => "Email has been sent",
		          "val"  => true
		        );
		        echo json_encode($array);
			} else {
				$sent = false;
				//error send email verify;
				$array = array(
		          "code" => "08",
		          "msg"  => "Email verify failed to send",
		          "val"  => false
		        );
		        echo json_encode($array);
			}

		} else {
			echo json_encode($process);
		}

		//* save log
		$this->LogMail->insert(['inserted_id' => $inserted_id, 'category' => 0, 'sent' => $sent]);
	}

	public function resendVerificationLink()
	{
		$data = $this->session->flashdata('user_temp');
		//build token
		$token = $this->UserModel->insertToken($data['user_id']);
		$qstring = $this->base64url_encode($token);
		$add_on = '';
		if ($data['came_from'] == 1) {
			$add_on = "?param=personal-test";
		}

		$data['url'] = base_url() . '/verify/token/' . $qstring . $add_on;

		if($this->sendingEmail($data, $data['user_email'])) {
			$sent = true;
			// send mail success
			$array = array(
			  "code" => "001",
			  "msg"  => "Email has been sent",
			  "val"  => true
			);
			echo json_encode($array);
		} else {
			$sent = false;
			//error send email verify;
			$array = array(
			  "code" => "08",
			  "msg"  => "Email verify failed to send",
			  "val"  => false
			);
			echo json_encode($array);
		}
		//* save log
		$this->LogMail->insert(['inserted_id' => $data['user_id'], 'category' => 8, 'sent' => $sent]);

	}

	public function getTokenVerifyEmail()
	{
		$token = $this->base64url_decode($this->uri->segment(3));
		$cleanToken = $this->security->xss_clean($token);
		$uid = substr($token, 30);
		$user_info = $this->UserModel->isTokenValid($cleanToken); // either false or array();
		if (!$user_info) {
			$this->session->set_flashdata('sukses', 'Token not valid or expired');
            redirect(site_url('/'), 'refresh');
		}

		$this->UserModel->updateTokenStatus($uid);
		$create_session = $this->login($uid);
		if($create_session == "001") {
			$user = $this->UserModel->getUserDataById($uid);
			$email = $user['user_email'];

			$config = $this->mail_smtp->smtp();
			$this->load->library('mail_smtp', $config);
			$this->email->initialize($config);
			$this->email->from('info@all-inedu.com', 'ALL-in Eduspace');
			$this->email->to($email);
			// $this->email->cc('manuel.eric@all-inedu.com');
			$this->email->subject(SUBJECT_WELCOME_EMAIL);
			$bodyMail = $this->load->view('mail/welcome', '', true);
			$this->email->message($bodyMail);
			// send mail
			$this->email->send();

			//! update 2022
			//! you need to replace this one
			$param = $this->input->get('param');
			if ($param == "personal-test") {
				// redirect(PERSONAL_TEST_LINK);
				// header("Location: ".PERSONAL_TEST_LINK);
				redirect('/');
			} else if ($param == "submit-cv") {
				header("Location: ".base_url().'home/dashboard');
			} else {
				redirect('/');
			}
			// redirect('/registration/topic');
		} else {
			echo "Server Timeout";
		}
	}

	public function login($inserted_id) 
	{
		$userData = $this->UserModel->getUserDataById($inserted_id);
		if($userData) { //if there is user data with inserted id
			$this->session->set_userdata($userData);
			return "001"; //sukses
		} else {
			return "02"; //error login
		}
		// $this->session->set_flashdata('success', 'Your email has been registered<br>');
	}
	
	public function topic()
	{
		if(!$this->session->has_userdata('user_id')) { // if the session value is null or doesn't exist
			redirect('/');
		}

		$topicData_day1 = $this->TopicModel->getTopicData(TALK_DAY_1); // change with edufair start date
		$topicData_day2 = $this->TopicModel->getTopicData(TALK_DAY_2); // change iwth edufair start date
        // print("<pre>".print_r($topicData_day1, true)."</pre>");exit;

		$topicData = array(
			"topicData_day1" => $topicData_day1,
			"topicData_day2" => $topicData_day2
		);

		$data['title'] = "Topic";
		$this->load->view('template/header', $data);
		$this->load->view('user/topic', $topicData);
		$this->load->view('template/footer');
	}

	public function book() // route: registration/consult
	{
		if(!$this->session->has_userdata('user_id')) { // if the session value is null or doesn't exist
			redirect('/');
		}

		// echo $this->session->userdata('user_id');
		$data['uniData'] = $this->UniModel->getUniData("");
		// print("<pre>".print_r($data['uniData'], true)."</pre>");

		$data['title'] = "Book Consultation";
		$this->load->view('template/header', $data);
		$this->load->view('user/book', $data);
		$this->load->view('template/footer');
	}

	/* PROCESS FUNCTION START HERE */
	public function bookingTopic() 
	{
		$userId = $this->session->userdata('user_id'); //get user id from session login
		$day1bookingTopicId = $this->input->post('day[1]');
		$day2bookingTopicId = $this->input->post('day[2]');

		$process = $this->TopicModel->bookingTopic($userId, $day1bookingTopicId, $day2bookingTopicId);
		if($process) {
			echo "001";
		} else {
			echo "03"; // error booking topic
		}
	}

	public function bookingConsult()
	{
		$userId = $this->session->userdata('user_id'); //get user id from session login
		$uniid = $this->input->post('uniid');
		$startTime = $this->input->post('startTime');
		$endTime = $this->input->post('endTime');
		$unidtltimeid = $this->input->post('unidtltimeid');

		$checkBooked = $this->ConsultModel->checkConsult($userId, $uniid);
		$checkTime = $this->ConsultModel->checkTime($userId, $startTime);

		if((count($checkBooked)>0)){
			echo "05"; //eror multiple
		} else if((count($checkTime)>0)) {
			echo "06"; //eror waktu sama
		} else {
			$data = array(
				'user_id'            => $userId,
				'uni_detail_time_id' => $unidtltimeid,
				'booking_c_date'     => date('Y-m-d H:i:s'),
				'booking_c_status'	 => 1
				);
			$process = $this->ConsultModel->bookingConsult($data);
			if($process) {
				echo "001";
			} else {
				echo "04"; // error booking consult
			}
		}
	}

	public function getAllDataLead()
	{
		echo json_encode($this->LeadModel->getAllDataLead());
	}

	//* New 2022
	public function getAllDataChallenge()
	{
		$session_role = $this->input->post('role');
		if (($session_role == "Teacher/Consellor") OR ($session_role == "Parent") ) {
			$data = array(
				array(
					'name' => 'Exploring their interest & passion',
				),
				array(
					'name' => 'Deciding what major & university to apply',
				),
				array(
					'name' => 'Building their CV or portfolio',
				),
				array(
					'name' => 'Writing university essay application',
				),
				array(
					'name' => 'Preparing for standardized tests (SAT, ACT, TOEFL, IELTS, etc)',
				),
				array(
					'name' => 'Improving their grades',
				),
				array(
					'name' => 'Creating a unique application profile',
				),
				array(
					'name' => 'Improving their writing skill',
				)
			);
		} else {
			$data = array(
				array(
					'name' => 'Exploring my interest & passion',
				),
				array(
					'name' => 'Deciding what major & university to apply',
				),
				array(
					'name' => 'Building my CV or portfolio',
				),
				array(
					'name' => 'Writing university essay application',
				),
				array(
					'name' => 'Preparing for standardized tests (SAT, ACT, TOEFL, IELTS, etc)',
				),
				array(
					'name' => 'Improving my grades',
				),
				array(
					'name' => 'Creating a unique application profile',
				),
				array(
					'name' => 'Improving my writing skill',
				)
			);
		}
		

		echo json_encode($data);
	}

	public function sendingEmail($data, $email)
	{
		$config = $this->mail_smtp->smtp();
        $this->load->library('mail_smtp', $config);
        $this->email->initialize($config);
        $this->email->from('info@all-inedu.com', 'ALL-in Eduspace');
        $this->email->to($email);
        // $this->email->cc('manuel.eric@all-inedu.com');

        $this->email->subject(SUBJECT_VERIFY_EMAIL);

        $bodyMail = $this->load->view('mail/verify_email', $data, true);
        $this->email->message($bodyMail);

        // Send Email
        return $this->email->send();
	}

	public function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
	/* PROCESS FUNCTION END HERE */
}
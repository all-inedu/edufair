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
        $this->load->library('mail_smtp');
    }

	public function view()
	{
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
			"user_first_name" => $this->input->post('user_first_name'),
			"user_last_name"  => $this->input->post('user_last_name'),
			"user_email"      => $this->input->post('user_email'),
			"user_password"   => password_hash($this->input->post('user_password'), PASSWORD_DEFAULT),
			"user_phone"      => $this->input->post('user_phone'),
			"user_status"     => $this->input->post('user_status'),
			"user_gender"     => $this->input->post('user_gender'),
			"user_dob"	      => $this->input->post('user_dateofbirth'),
			"user_first_time" => $this->input->post('user_first_time'),
			"user_grade"      => $this->input->post('user_grade'),
			"user_school"     => $this->input->post('user_school'),
			"user_country"    => $this->input->post('user_destination'),
			"user_major"      => $user_major,
			"user_lead"       => str_replace("'", "\'", $this->input->post('user_lead'))
		);


		$email = $this->input->post('user_email');
		$process = $this->UserModel->insertUser($data);
		if($process) {
			$inserted_id = $process;

			//build token
			$token = $this->UserModel->insertToken($inserted_id);
			$qstring = $this->base64url_encode($token);
			$data = array( "url" => base_url() . '/verify/token/' . $qstring );
			// send verification mail
			if($this->sendingEmail($data, $email)) {
				echo "001";
			} else {
				echo "08"; //error send email verify;
			}

		} else {
			echo "01"; //error register
		}
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

		$create_session = $this->login($uid);
		if($create_session == "001") {
			redirect('/');
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

		$topicData_day1 = $this->TopicModel->getTopicData('2021-05-20'); // change with edufair start date
		$topicData_day2 = $this->TopicModel->getTopicData('2021-05-21'); // change iwth edufair start date
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
		$startTime = $this->input->post('startTime');
		$endTime = $this->input->post('endTime');
		$unidtltimeid = $this->input->post('unidtltimeid');
		$data = array(
			'user_id'            => $userId,
			'uni_detail_time_id' => $unidtltimeid,
			'booking_c_date'     => date('Y-m-d H:i:s')
			);

		$process = $this->ConsultModel->bookingConsult($data);
		if($process) {
			echo "001";
		} else {
			echo "04"; // error booking consult
		}
	}

	public function getAllDataLead()
	{
		echo json_encode($this->LeadModel->getAllDataLead());
	}

	public function sendingEmail($data, $email)
	{
		$config = $this->mail_smtp->smtp();
        $this->load->library('mail_smtp', $config);
        $this->email->initialize($config);
        $this->email->from('info@all-inedu.com', 'ALL-in Eduspace');
        $this->email->to($email);
        // $this->email->cc('manuel.eric@all-inedu.com');

        $this->email->subject('Please verify your email');

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
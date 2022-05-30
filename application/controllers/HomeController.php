<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function __Construct()
    {
        parent ::__construct();
        $this->load->model('UserModel');
        $this->load->model('UniModel');
        $this->load->model('TopicModel');
        $this->load->model('ConsultModel');
        $this->load->library('mail_smtp');
    }

	public function index()
	{
		$data['title']     = "Edufair";
		$data['pre_event'] = $this->TopicModel->getTopicData(PRE_EVENT);
		$data['talk_day1'] = $this->TopicModel->getTopicData(TALK_DAY_1);  // change with edufair start date
		$data['talk_day2'] = $this->TopicModel->getTopicData(TALK_DAY_2);  // change iwth edufair start date
		// $data['uniData']    = $this->UniModel->getUniData();
		$data['uniData']        = $this->UniModel->showAllUniData(1);
		$data['uniUpcoming']    = $this->UniModel->showAllUniData(2);
		$data['uniCountry']     = $this->UniModel->getUniCountry();
		$data['bookingTopic']   = [];
		$data['bookingConsult'] = [];

		if ($this->session->has_userdata('user_id')) {
			$bookingTopic = $this->TopicModel->getBookingTopicData($this->session->userdata('user_id')); 
			if(isset($bookingTopic)) {
				$data['bookingTopic'] = $bookingTopic;
			}

			$bookingConsult = $this->ConsultModel->getBookingConsultData($this->session->userdata('user_id'));
			if (isset($bookingConsult)) {
				$data['bookingConsult'] = $bookingConsult;
			}

		}
		

		// echo json_encode($data['uniData']);
		$this->load->view('home/home', $data);
	}

	public function login()
	{
		

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$userInfo = $this->UserModel->getUserInfoByEmail($email);
		$hashed = $userInfo['user_password'];
		if ((password_verify($password, $hashed)) and ($userInfo['token_status']==1)) {
			$this->session->set_userdata($userInfo);
			$userId = $this->session->userdata('user_id');
			$lastLoginUpdate = $this->UserModel->lastLoginUpdate($userId);
			if ((isset($_GET['param'])) && ($_GET['param'] == "cv") ) {
				
				echo "0001";
			} else {
				
				echo "001";
			}
		} else if ((password_verify($password, $hashed)) and ($userInfo['token_status']==0)) {
			
			$this->session->set_flashdata('user_temp', $userInfo);
			echo "02"; // error token
		} else {
			echo "03"; // error login
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

	public function bookingTopic()
	{
		$userId = $this->session->userdata('user_id'); //get user id from session login
		$topicId = $this->input->post('topic_id');

		$process = $this->TopicModel->bookingOneTopic($userId, $topicId);
		echo $process;
	}

	public function dashboard() //user profile
	{
		if(!$this->session->has_userdata('user_id')) { // if the session value is null or doesn't exist
			redirect('/');
		}

		$user_id = $this->session->userdata('user_id');
		$data['title'] = 'Dashboard';
		$data['dataTopic'] = $this->UserModel->getUserTopic($user_id);
		$data['dataConsult'] = $this->UserModel->getUserConsult($user_id);
		// print("<pre>".print_r($data['dataTopic'], true)."</pre>");exit;
		$data['dataCountry'] = $this->getDataCountry();
		$data['dataMajor'] = $this->getDataMajor();

		$this->load->view('template/header', $data);
        $this->load->view('home/navbar');
		$this->load->view('dashboard/dashboard', $data);
		$this->load->view('home/footer');
        $this->load->view('template/footer');
	}

	public function getDataCountry()
	{
		$url = 'https://www.bigdata.crm-allinedu.com/api/countries'; 
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
			CURLOPT_CUSTOMREQUEST => 'POST'
		));

		$response = curl_exec($curl);

		if ($response === false) 
			$response = curl_error($curl);

		return json_decode($response);
	}

	public function getDataMajor()
	{
		$url = 'https://www.bigdata.crm-allinedu.com/api/major';
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
			CURLOPT_CUSTOMREQUEST => 'POST'
		));

		$response = curl_exec($curl);

		if ($response === false) 
			$response = curl_error($curl);

		return json_decode($response);
	}

	public function cancelBooking()
	{
		$user_id = $this->session->userdata('user_id');
		$type = $this->uri->segment(3);
		if($type == "topic") {
			$topicId = $this->base64url_decode($this->input->post('topicId'));
			echo $this->UserModel->cancelBooking($user_id, $type, $topicId);
		} else if ($type == "consult") {
			$consultationId = $this->base64url_decode($this->input->post('consultationId'));
			echo $this->UserModel->cancelBooking($user_id, $type, $consultationId);
		}
	}

	public function updateInformation()
	{
		$userId = $this->session->userdata('user_id');

		// add other major into selected major start
		$user_major = $this->input->post('user_major');
		$user_major_other = $this->input->post('user_major_other');
		if(strpos($user_major, "other") !== false) { //word found
			$user_major = str_replace('other,', '', $user_major);
			$user_major = $user_major.",".$user_major_other;
		}
		// add other major into selected major end

		$data = array(
			"user_fullname" => $this->input->post('user_fullname'),
			"user_email"      => $this->input->post('user_email'),
			"user_phone"      => $this->input->post('user_phone'),
			"user_dob"	      => $this->input->post('user_dob'),
			"user_school"     => $this->input->post('user_school'),
			"user_country"    => $this->input->post('user_destination'),
			"user_major"      => $user_major
		);

		// print_r($data);exit;

		$process = $this->UserModel->updateInformation($data, $userId);
	 	if($process) {
	 		$userData = $this->UserModel->getUserDataById($userId);
	 		if($userData) {
	 			$this->session->set_userdata($userData);
	 			echo "001";
	 		}
	 	} else {
	 		echo "07"; //error update information
	 	}
	}

	public function insertToWaitingList()
	{
		$userId = $this->session->userdata('user_id');	
		if($userId)  {
			$uniId = $this->input->post('uniId');
			$check = $this->UserModel->showWaitingListById($userId, $uniId);

			if(count($check)>0) {
				echo "01"; // udah ada didatabase
			} else {
				$process = $this->UserModel->insertToWaitingList($uniId, $userId);
				if($process) {
					echo "02"; // Sukses
				} else {
					echo "03"; // Sukses
				}
			}

		} else {
			echo "04"; // no user
		}

	}

	// **************************************************** //
	// **************************************************** //
	// ******** FORGOT PASSWORD FUNCTION START ************ //
	// **************************************************** //
	// **************************************************** //

	public function forgotPassword() // when user send forgot password email on landing page
	{
		$email = $this->input->post("fpEmail");

		$userInfo = $this->UserModel->getUserInfoByEmail($email);
		if(count($userInfo) > 0) {

			//build token
			$token = $this->UserModel->insertToken($userInfo['user_id']);
			$qstring = $this->base64url_encode($token);
			$data = array( "url" => base_url() . '/reset-password/token/' . $qstring );

			echo $this->sendingEmail($data, $email);
		}
	}

	public function resetPassword() // when user click reset password on her/his mail
	{
		$this->session->sess_destroy();
		$token = $this->base64url_decode($this->uri->segment(3));
		$cleanToken = $this->security->xss_clean($token);

		$user_info = $this->UserModel->isTokenValid($cleanToken); // either false or array();
		if (!$user_info) {
			$this->session->set_flashdata('sukses', 'Token not valid or expired');
            redirect(site_url('/'), 'refresh');
		}

		$hashed_userId = $this->opensslencrypt($user_info['user_id']);

		$data = array(
			'title' => 'Reset Password',
			'id' 	=> $user_info['user_id'],
			'nama'  => $user_info['user_fullname'],
			'email' => $user_info['user_email'],
			'token' => $this->base64url_encode($token)
		);

		$this->load->view('user/forgot-password', $data);
	}

	public function updatePassword() // process update password on database
	{
		// $post = $this->input->post(NULL, TRUE);
        // $cleanPost = $this->security->xss_clean($post); 
        // $hashed = password_hash($cleanPost['password'], PASSWORD_DEFAULT);
		// $userId = $cleanPost['userId'];
		$userId = $this->input->post('userId');
		$hashed = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		
        $data = array(
        		"user_id" => $userId,
        		"user_password" => $hashed
			);
		
        $process = $this->UserModel->updatePassword($data);
        if( $process ) {
        	echo "001";
        } else {
        	echo "06"; // error update password 
        }
    }

	public function sendingEmail($data, $email)
	{
		$config = $this->mail_smtp->smtp();
        $this->load->library('mail_smtp', $config);
        $this->email->initialize($config);
        $this->email->from('info@all-inedu.com', 'ALL-in Eduspace');
        $this->email->to($email);
        // $this->email->cc('manuel.eric@all-inedu.com');

        $this->email->subject('Reset Your Password');

        $bodyMail = $this->load->view('mail/forgot_password', $data, true);
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

    public function opensslencrypt($string)
    {
    	//generate key
	    $bytes = openssl_random_pseudo_bytes(4, $cstrong);
	    $key = $cstrong;

	    $plaintext = $string;
		$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
		$iv = openssl_random_pseudo_bytes($ivlen);
		$ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
		$hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
		return $ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );
    }

    public function openssldecrypt($string)
    {
    	$c = base64_decode($ciphertext);
		$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
		$iv = substr($c, 0, $ivlen);
		$hmac = substr($c, $ivlen, $sha2len=32);
		$ciphertext_raw = substr($c, $ivlen+$sha2len);
		$original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
		$calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
		if (hash_equals($hmac, $calcmac))//PHP 5.6+ timing attack safe comparison
		{
		    return $original_plaintext;
		}
    }

    public function lihatBodyEmail()
    {
    	$token = $this->UserModel->insertToken(1);
		$qstring = $this->base64url_encode($token);
		$data = array( "url" => base_url() . '/reset-password/token/' . $qstring );

    	$this->load->view('mail/verify_email', $data);
    }

	// **************************************************** //
	// **************************************************** //
	// ******** FORGOT PASSWORD FUNCTION END ************** //
	// **************************************************** //
	// **************************************************** //

	// **************************************************** //
	// **************************************************** //
	// ************** UPLOAD RESUME CV START ************** //
	// **************************************************** //
	// **************************************************** //

	public function bookingConsultation()
	{
		$value_of_selected_consult = $this->input->post('var_id_value');
		$selected_consult_schedule = $this->input->post('var_id');
		$code = "201";

		if (count(array_filter($value_of_selected_consult)) > 0) {

			if (($selected_consult_schedule != null) && (count($selected_consult_schedule) > 0) ) {
				$value_of_selected_consult = array_values(array_filter($value_of_selected_consult));
				$selected_consult_schedule = array_merge($value_of_selected_consult, $selected_consult_schedule);
				$code = "001";
			} else {
				
				$selected_consult_schedule = array_values(array_filter($value_of_selected_consult));
				$code = "201";
			}

		}

		// if ($selected_consult_schedule == null) {
		// 	$selected_consult_schedule = $value_of_selected_consult;
		// }
		// echo count(array_filter($value_of_selected_consult));exit;

		try {
			
			// if ($selected_consult_schedule == '') {
			// 	throw new Exception('You\'ve to choose the consultation date');
			// } 

			for ($i = 0; $i < count($selected_consult_schedule) ; $i++) {
				
				$data = array(
					'uni_dtl_id' => $selected_consult_schedule[$i],
					// 'question' => $this->input->post('question'),
					'user_id' => $this->session->userdata('user_id'),
					'booking_c_date' => date('Y-m-d H:i:s'),
					'booking_c_status' => 1
				);

				if ($this->ConsultModel->checkExistingConsultation($data) == 0) {
					$this->ConsultModel->bookingConsult($data);
					$code = "001";
				} else {
					$dataConsult = $this->ConsultModel->getExistingConsultation($data);
					$consult_id = $dataConsult->booking_c_id;

					$this->ConsultModel->updateBookingConsultation($consult_id);
				}
			}

			if ($this->input->post('question') != '') {
				$this->ConsultModel->insertQuestion($this->session->userdata('user_id'), $this->input->post('uni_id'), $this->input->post('question'));
			}
			
		} catch (Exception $e) {
			echo json_encode(array(
				"code" => "000",
				"error" => $e->getMessage()	
			));
			exit;
		}

		echo json_encode(array(
			"code" => $code,
			"value" => $selected_consult_schedule
		));
		
	}

	public function uploadResume()
	{
		$this->db->trans_begin();
		$user_id = $this->session->userdata('user_id');
		$user_fullname = $this->session->userdata('user_fullname');	
		$file_path = $_FILES['uploaded_resume']['name'];
		$config['upload_path']          = './assets/user/uploads/';
		$config['allowed_types']        = 'jpg|png|pdf|doc|docx';
		$config['max_size']             = 5000000;
		$config['file_name']  			= strtolower($user_fullname).'-resume.'.pathinfo($file_path, PATHINFO_EXTENSION);
		$config['file_ext_tolower']     = true;
		$config['overwrite']			= true;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->load->library('upload'); 
		$this->upload->initialize($config);

		if ($this->session->userdata('user_resume') != '') {

			unlink(PUBPATH . 'assets/user/uploads/'.$this->session->userdata('user_resume'));
		}
		
		if ( ! $this->upload->do_upload('uploaded_resume'))
		{
			$error = array('error' => $this->upload->display_errors());
			echo json_encode(array(
				'success' => false,
				'error' => $this->upload->display_errors()
			));
		}
		else
		{
			$file_name = str_replace(' ', '_', strtolower($user_fullname)).'-resume.'.pathinfo($file_path, PATHINFO_EXTENSION);
			try {
				$this->UserModel->updateResume($user_id, $file_name);
				$this->session->set_userdata('user_resume', $file_name);
				$this->db->trans_commit();

				echo json_encode(array(
					'success' => true,
					'message' => "Your resume or cv has been uploaded"
				));
			} catch (Exception $e) {
				$this->db->trans_rollback();

				echo json_encode(array(
					'success' => false,
					'message' => "Something went wrong. Please contact the administrator for further information"
				));
			}

			
		}
	}

	// **************************************************** //
	// **************************************************** //
	// ************** UPLOAD RESUME CV END **************** //
	// **************************************************** //
	// **************************************************** //
	
}
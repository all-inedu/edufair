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
        $data['title'] = "Edufair";
        $topicData_day1 = $this->TopicModel->getTopicData('2021-05-20'); // change with edufair start date
		$topicData_day2 = $this->TopicModel->getTopicData('2021-05-21'); // change iwth edufair start date
		$data['talk_day1'] = $topicData_day1;
		$data['talk_day2'] = $topicData_day2;
		$data['uniData'] = $this->UniModel->getUniData();
		// print("<pre>".print_r($data['uniData'], true)."</pre>");exit;
		$data['uniCountry'] = $this->UniModel->getUniCountry();
		// print("<pre>".print_r($data['uniCountry'], true)."</pre>");exit;
        $this->load->view('template/header', $data);
        $this->load->view('home/navbar');
        $this->load->view('home/header');
		$this->load->view('home/topic', $data);
		$this->load->view('home/book');
		$this->load->view('home/footer');
        $this->load->view('template/footer');
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$userInfo = $this->UserModel->getUserInfoByEmail($email);
		$hashed = $userInfo['user_password'];
		if (password_verify($password, $hashed)) {
			$this->session->set_userdata($userInfo);
			$userId = $this->session->userdata('user_id');
			$lastLoginUpdate = $this->UserModel->lastLoginUpdate($userId);
			echo "001";
		} else {
			echo "02"; // error login
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
		// print("<pre>".print_r($data['dataConsult'], true)."</pre>");exit;
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
			"user_first_name" => $this->input->post('user_first_name'),
			"user_last_name"  => $this->input->post('user_last_name'),
			"user_email"      => $this->input->post('user_email'),
			"user_phone"      => $this->input->post('user_phone'),
			"user_dob"	      => $this->input->post('user_dob'),
			"user_school"     => $this->input->post('user_school'),
			"user_country"    => $this->input->post('user_destination'),
			"user_major"      => $user_major
		);

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
			'id' 	=> $hashed_userId,
			'nama'  => $user_info['user_first_name']." ".$user_info['user_last_name'],
			'email' => $user_info['user_email'],
			'token' => $this->base64url_encode($token)
		);

		$this->load->view('user/forgot-password', $data);
	}

	public function updatePassword() // process update password on database
	{
		$post = $this->input->post(NULL, TRUE);
        $cleanPost = $this->security->xss_clean($post);
        $hashed = password_hash($cleanPost['password'], PASSWORD_DEFAULT);
        $userId = $cleanPost['userId'];
        $data = array(
        		"user_id" => $userId,
        		"password" => $hashed
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
}
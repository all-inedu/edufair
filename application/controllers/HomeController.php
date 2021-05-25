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

	public function forgotPassword()
	{
		$email = $this->input->post("fpEmail");

		$userInfo = $this->UserModel->getUserInfoByEmail($email);
		if(count($userInfo) > 0) {

			//build token
			$token = $this->UserModel->insertToken($userInfo['user_id']);
			$qstring = $this->base64url_encode($token);
			$url = base_url() . '/reset-password/token/' . $qstring;

			$data['url'] = $url;

			echo $this->sendingEmail($data, $email);
		}
	}

	public function resetPassword()
	{
		$token = $this->base64url_decode($this->uri->segment(3));
		$cleanToken = $this->security->xss_clean($token);

		$user_info = $this->UserModel->isTokenValid($cleanToken); // either false or array();
		if (!$user_info) {
			$this->session->set_flashdata('sukses', 'Token tidak valid atau kadaluarsa');
            redirect(site_url('/'), 'refresh');
		}

		$data = array(
			'title' => 'Reset Password',
			'nama'  => $user_info['user_first_name']." ".$user_info['user_last_name'],
			'email' => $user_info['user_email'],
			'token' => $this->base64url_encode($token)
		);

		$this->load->view('user/forgot-password', $data);
	}

	public function updatePassword()
	{
		$post = $this->input->post(NULL, TRUE);
        $cleanPost = $this->security->xss_clean($post);
        $hashed = password_hash($cleanPost['password'], PASSWORD_DEFAULT);

	public function sendingEmail($data, $email)
	{
		$config = $this->mail_smtp->smtp();
        $this->load->library('mail_smtp', $config);
        $this->email->initialize($config);
        $this->email->from('info@all-inedu.com', 'ALL-in Eduspace');
        $this->email->to($email);
        // $this->email->cc('manuel.eric@all-inedu.com');

        $this->email->subject('Reset Your Password');

        $bodyMail = $this->load->view('mail/body', $data, true);
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
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends CI_Controller {

	public function __Construct()
    {
        parent ::__construct();
        $this->load->model('RegisterModel');
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

		$user_major = $this->input->get('user_major');
		$user_major_other = $this->input->get('user_major_other');
		if(strpos($user_major, "other") !== false) { //word found
			$user_major = str_replace('other,', '', $user_major);
			$user_major = $user_major.",".$user_major_other;
		}

		$data = array(
			"user_first_name" => $this->input->get('user_first_name'),
			"user_last_name"  => $this->input->get('user_last_name'),
			"user_email"      => $this->input->get('user_email'),
			"user_password"   => "12345",
			"user_phone"      => $this->input->get('user_phone'),
			"user_status"     => $this->input->get('user_status'),
			"user_gender"     => $this->input->get('user_gender'),
			"user_first_time" => $this->input->get('user_first_time'),
			"user_grade"      => $this->input->get('user_grade'),
			"user_school"     => $this->input->get('user_school'),
			"user_country"    => $this->input->get('user_destination'),
			"user_major"      => $user_major,
			"user_lead"       => $this->input->get('user_lead')
		);

		$process = $this->RegisterModel->insertUser($data);
		echo $process ? "001" : "0";


	public function topic()
	{
		$data['title'] = "Topic";
		$this->load->view('template/header', $data);
		$this->load->view('user/topic');
		$this->load->view('template/footer');
	}
}
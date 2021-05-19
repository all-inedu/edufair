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
		// session_destroy();
		$data['title'] = "Registration";
		$this->load->view('template/header', $data);
		$this->load->view('user/register');
		$this->load->view('template/footer');
	}

	public function register()
	{	
		$user_major = $this->input->post('user_major');
		$user_major_other = $this->input->post('user_major_other');
		if(strpos($user_major, "other") !== false) { //word found
			$user_major = str_replace('other,', '', $user_major);
			$user_major = $user_major.",".$user_major_other;
		}

		$data = array(
			"user_first_name" => $this->input->post('user_first_name'),
			"user_last_name"  => $this->input->post('user_last_name'),
			"user_email"      => $this->input->post('user_email'),
			"user_password"   => password_hash($this->input->post('user_password'), PASSWORD_DEFAULT),
			"user_phone"      => $this->input->post('user_phone'),
			"user_status"     => $this->input->post('user_status'),
			"user_gender"     => $this->input->post('user_gender'),
			"user_first_time" => $this->input->post('user_first_time'),
			"user_grade"      => $this->input->post('user_grade'),
			"user_school"     => $this->input->post('user_school'),
			"user_country"    => $this->input->post('user_destination'),
			"user_major"      => $user_major,
			"user_lead"       => $this->input->post('user_lead')
		);

		$process = $this->RegisterModel->insertUser($data);
		if($process) {
			$inserted_id = $process;
			echo $this->login($inserted_id);
		} else {
			echo "01"; //error register
		}
	}

	public function login($inserted_id) 
	{
		$userData = $this->RegisterModel->getUserDataById($inserted_id);
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
		$data['title'] = "Topic";
		$this->load->view('template/header', $data);
		$this->load->view('user/topic');
		$this->load->view('template/footer');
	}

	public function book()
	{
		$data['title'] = "Book Consultation";
		$this->load->view('template/header', $data);
		$this->load->view('user/book');
		$this->load->view('template/footer');
	}
}
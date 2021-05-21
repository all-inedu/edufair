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
			"user_first_time" => $this->input->post('user_first_time'),
			"user_grade"      => $this->input->post('user_grade'),
			"user_school"     => $this->input->post('user_school'),
			"user_country"    => $this->input->post('user_destination'),
			"user_major"      => $user_major,
			"user_lead"       => $this->input->post('user_lead')
		);

		$process = $this->UserModel->insertUser($data);
		if($process) {
			$inserted_id = $process;
			echo $this->login($inserted_id);
		} else {
			echo "01"; //error register
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
			//redirect('/');
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
			//redirect('/');
		}

		$data['uniData'] = $this->UniModel->getUniData();
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
		$uniId = $this->input->post('uniId');
		$data = array(
			'user_id'              => $userId,
			'uni_id'               => $uniId,
			'booking_c_start_date' => $startTime,
			'booking_c_end_date'   => $endTime
			);

		$process = $this->ConsultModel->bookingConsult($data);
		if($process) {
			echo "001";
		} else {
			echo "04"; // error booking consult
		}
	}
	/* PROCESS FUNCTION END HERE */
}
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
		// echo "mulai tanggal : ";
		// echo $assigned_time = "2021-05-08 10:00:00";
		// echo "<br>";
		// echo "selesai tanggal : ";
		// echo $completed_time = "2021-05-08 12:00:00";
		// echo "<br>";

		// $d1 = new DateTime($assigned_time);
		// $d2 = new DateTime($completed_time);

		// $interval = $d2->diff($d1);

		// echo "selisih : ";
		// echo $time = $interval->format('%H');
		// echo " jam <br>";


		// $duration = 15;
		// $count = 0;
		// for($i = 1; $i <= ($time*60)/$duration; $i++){
		// 	$startTime = strtotime("+".$duration*$count." minutes", strtotime($assigned_time));
		//    $endTime = strtotime("+".$duration*$i." minutes", strtotime($assigned_time));
		//    echo date('h:i:s', $startTime)." - ".date('h:i:s', $endTime);
		//    echo "<br>";
		//    $count++;
		// }

		// exit;
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
			"user_password"   => password_hash($this->input->get('user_password'), PASSWORD_DEFAULT),
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
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
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {


	public function index()
	{
        $data['title'] = "Edufair";
        $this->load->view('template/header', $data);
        $this->load->view('home/navbar');
        $this->load->view('home/header');
		$this->load->view('home/topic');
		$this->load->view('home/book');
		$this->load->view('home/footer');
        $this->load->view('template/footer');
	}
}
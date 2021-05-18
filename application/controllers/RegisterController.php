<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function view()
	{
		$data['title'] = "Registration";
		$this->load->view('template/header', $data);
		$this->load->view('user/register');
		$this->load->view('template/footer');
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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

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
	public function index()
	{
		$this->load->view('admin/dashboard');
	}


	// Topic Page 

	public function indexTopic() 
	{
		$this->load->view('admin/page/topic/index');
	}

	public function addTopic() 
	{
		$this->load->view('admin/page/topic/add');
	}

	public function saveTopic() 
	{
		
	}

	public function editTopic($id) 
	{
		$this->load->view('admin/page/topic/edit');
	}

	public function updateTopic() 
	{
		
	}

	public function deleteTopic() 
	{
		
	}



	// University 
	
	public function indexUni() 
	{
		$this->load->view('admin/page/uni/index');
	}

	public function addUni() 
	{
		$this->load->view('admin/page/uni/add');
	}

	public function saveUni() 
	{
		
	}

	public function editUni() 
	{
		$this->load->view('admin/page/uni/edit');
	}

	public function updateUni() 
	{
		
	}

	public function deleteUni() 
	{
		
	}
	
}
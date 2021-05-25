<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
		$this->load->library('country');
		$this->load->model('TopicModel','topic');
    }

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
		$topic = $this->topic->getId();
		$newid = $topic['topic_id'] + 1;

		$config['upload_path'] = './assets/img';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '5000';
		$this->load->library('upload');
		$this->upload->initialize($config);

		$check_banner = $this->input->post('topic_banner');
		if($check_banner!="") {
			if ($this->upload->do_upload('upload_banner')) {
				$filesname = htmlspecialchars($this->upload->data('file_name'));
				$this->upload->data();
			} else {
				$error = array('error' => $this->upload->display_errors());
				echo json_encode($error);
			}	
		} else {
			$filesname = 'default.jpeg';
		}	

		$data = [
			'topic_id' => $newid,
			'topic_name' => $this->input->post('topic_name'),
			'topic_desc' => $this->input->post('topic_desc'),
			'topic_start_date' => $this->input->post('topic_start_date'),
			'topic_end_date' => $this->input->post('topic_end_date'),
			'topic_status' => 1,
			'topic_banner' => $filesname
		];
		$process = $this->topic->insertTopic($data);

		foreach ($this->input->post('uni_id') as $uni) {
			$data_topic_dtl = [
				'topic_id' => $newid,
				'uni_id' => $uni
			];
			$this->topic->insertTopicDetail($data_topic_dtl);
		} 
			
		if($process){
			echo '001';
		} else {
			echo '02';
		}
	}

	public function editTopic($id) 
	{
		echo $id;
		// $this->load->view('admin/page/topic/edit');
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

	public function showCountry($d) {		
		if($d=="asia") {
			$data = $this->country->asian();
		} else 
		if ($d=="europe"){
			$data = $this->country->europe();
		} else {
			$data = $this->country->show();
		}

		echo json_encode($data);
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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
		$this->load->library('country');
		$this->load->model('TopicModel','topic');
		$this->load->model('UniModel','uni');
    }

	public function index()
	{
		$this->load->view('admin/dashboard');
	}

	// Topic Page 
	public function indexTopic() 
	{
		$data['topic'] = $this->topic->getTopicData();
		$this->load->view('admin/page/topic/index', $data);
	}

	public function addTopic() 
	{
		$data['uni'] = $this->uni->showUniData();
		$this->load->view('admin/page/topic/add', $data);
	}

	public function saveTopic() 
	{
		$topic = $this->topic->getId();
		$newid = $topic['topic_id'] + 1;

		$config['upload_path'] = './assets/topic';
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
		$topic = $this->topic->getTopicDataById($id);
		$data['topic'] = $topic[$id];
		$data['uni'] = $this->uni->showUniData();
		$this->load->view('admin/page/topic/edit', $data);
	}

	public function updateTopic() 
	{
		$topic_id = $this->input->post('topic_id');

		$config['upload_path'] = './assets/topic';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '5000';
		$this->load->library('upload');
		$this->upload->initialize($config);

		$check_banner = $this->input->post('topic_banner');
		$banner_old = $this->input->post('topic_banner_old');

		if(($check_banner!="") and ($check_banner!=$banner_old)) {
			if ($this->upload->do_upload('upload_banner')) {
				$filesname = htmlspecialchars($this->upload->data('file_name'));
				$this->upload->data();
			} else {
				$error = array('error' => $this->upload->display_errors());
				echo json_encode($error);
			}	
		} else {
			$filesname = $banner_old;
		}	

		$data = [
			'topic_name' => $this->input->post('topic_name'),
			'topic_desc' => $this->input->post('topic_desc'),
			'topic_start_date' => $this->input->post('topic_start_date'),
			'topic_end_date' => $this->input->post('topic_end_date'),
			'topic_banner' => $filesname
		];
		$process = $this->topic->updateTopic($topic_id, $data);

		// Delete all topic detail 
		$this->topic->deleteTopicDetail($topic_id);

		// Add new topic detail 
		foreach ($this->input->post('uni_id') as $uni) {
			$data_topic_dtl = [
				'topic_id' => $topic_id,
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

	public function activeTopic($id) 
	{
		$data = ['topic_status' => 1];
		$process = $this->topic->statusTopic($id, $data);
		
		if($process){
			echo '001';
		} else {
			echo '02';
		}
	}

	public function inactiveTopic($id) 
	{
		$data = ['topic_status' => 0];
		$process = $this->topic->statusTopic($id, $data);
		
		if($process){
			echo '001';
		} else {
			echo '02';
		}
	}



	// University 
	public function indexUni() 
	{
		$data['uni'] = $this->uni->showUniDataJoin();
		// echo json_encode($data);
		$this->load->view('admin/page/uni/index', $data);
	}

	public function showCountry($d) {		
		if($d=="Asia") {
			$data = $this->country->asian();
		} else 
		if ($d=="Europe"){
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
		$uni = $this->uni->getId();
		$newid = $uni['uni_id'] + 1;

		$config['upload_path'] = './assets/uni/banner';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '5000';
		$this->load->library('upload');
		$this->upload->initialize($config);

		$check_banner = $this->input->post('uni_photo_banner');
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
			'uni_id' => $newid,
			'uni_name' => $this->input->post('uni_name'),
			'uni_description' => $this->input->post('uni_description'),
			'uni_country' => $this->input->post('uni_country'),
			'uni_detail_country' => $this->input->post('uni_detail_country'),
			'uni_status' => 1,
			'uni_photo_banner' => $filesname
		];

		$process = $this->uni->insertUni($data);
		if($process){
			echo $newid;
		} else {
			echo 0;
		}
	}

	public function editUni($id) 
	{
		$uni = $this->uni->showUniDataJoin($id);
		$data['uni'] = $uni[$id];
		$this->load->view('admin/page/uni/edit', $data);
	}

	public function updateUni() 
	{
		$uni_id = $this->input->post('uni_id');
		
		$config['upload_path'] = './assets/uni/banner';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '5000';
		$this->load->library('upload');
		$this->upload->initialize($config);

		$check_banner = $this->input->post('uni_photo_banner');
		$banner_old = $this->input->post('uni_photo_banner_old');
		if(($check_banner!="") and ($check_banner!=$banner_old)) {
			if ($this->upload->do_upload('upload_banner')) {
				$filesname = htmlspecialchars($this->upload->data('file_name'));
				$this->upload->data();
			} else {
				$error = array('error' => $this->upload->display_errors());
				echo json_encode($error);
			}	
		} else {
			$filesname = $banner_old;
		}	

		$data = [
			'uni_name' => $this->input->post('uni_name'),
			'uni_description' => $this->input->post('uni_description'),
			'uni_country' => $this->input->post('uni_country'),
			'uni_detail_country' => $this->input->post('uni_detail_country'),
			'uni_status' => 1,
			'uni_photo_banner' => $filesname
		];

		$process = $this->uni->updateUni($uni_id, $data);
		if($process){
			echo $uni_id;
		} else {
			echo 0;
		}
	}

	public function deleteUni() 
	{
		
	}

	public function saveUniConsult() 
	{
		$uni = $this->uni->getUniDtlId();
		$newid = $uni['uni_dtl_id'] + 1;
		
		$data = [
			'uni_dtl_id' => $newid,
			'uni_id' => $this->input->post('uni_id'),
			'uni_dtl_start_date' => $this->input->post('uni_dtl_start_date'),
			'uni_dtl_end_date' => $this->input->post('uni_dtl_end_date'),
			'uni_dtl_duration' => $this->input->post('uni_dtl_duration'),
			'uni_dtl_zoom_link' => $this->input->post('uni_dtl_zoom_link')
		];	
		$process = $this->uni->insertUniDetail($data);

		$start_time = date('Y-m-d H:i', strtotime($this->input->post('uni_dtl_start_date')));
		$end_time = date('Y-m-d H:i', strtotime($this->input->post('uni_dtl_end_date')));
		$duration = $this->input->post('uni_dtl_duration');
		$diff 			= strtotime($end_time) - strtotime($start_time);
		$jam  			= $diff / (60 * 60);
		$menit    		= $jam * 60;
		$jumlah_sesi 	= $menit/$duration;

		$datas = [];
		for($i = 1; $i<=$jumlah_sesi ; $i++){
			$starttime = strtotime("+".$duration*$i-$duration."minutes", strtotime($start_time));
			$endtime = strtotime("+".$duration*$i."minutes", strtotime($start_time));
			$datas[$i] = [
				'uni_dtl_id' => $newid,
				'uni_dtl_t_start_time' => date('Y-m-d H:i:s', $starttime),
				'uni_dtl_t_end_time' => date('Y-m-d H:i:s', $endtime),
				'uni_dtl_t_status' => 1
				
			];
			$this->uni->insertUniDetailTime($datas[$i]);
		}

		if($process){
			echo $this->input->post('uni_id');
		} else {
			echo 0;
		}
	}

	function deleteUniConsult($id)
	{
		$process = $this->uni->deleteUniDetail($id);
		if($process){
			echo "001";
		} else {
			echo "02";
		}
	}

}
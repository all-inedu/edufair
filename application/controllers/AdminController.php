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
		$this->load->model('UserModel', 'user');
		$this->load->library('session');
	}

	public function checkAuth()
	{
		$user = $this->session->userdata('auth');
		if(!isset($user)){
			redirect('admin');
		} 
	}
	
	public function login()
	{
		$user = $this->session->userdata('auth');
		if(!isset($user)) {
			$this->load->view('admin/auth/index');
		} else {
			redirect('dashboard/admin');
		}
	}

	public function auth()
	{
		$username = $this->input->post('user_name');
		$password = $this->input->post('user_password');
		if(($username=="all-inedu") and ($password=="all-inedu")) 
		{
			$this->session->set_userdata('auth', $username);
			echo "1"; //success
		} else if(($username=="all-inedu") and ($password!="all-inedu")) {
			echo "2"; //password wrong
		} else {
			echo "3"; //username wrong
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('auth');
		redirect('admin');
	}


	public function index()
	{
		$this->checkAuth();
		$data['uni'] = $this->uni->showUniData();
		$this->load->view('admin/dashboard', $data);
		// echo json_encode($data);
	}

	// Topic Page 
	public function indexTopic() 
	{
		$this->checkAuth();
		$data['topic'] = $this->topic->getTopicData();
		$this->load->view('admin/page/topic/index', $data);
	}

	public function addTopic() 
	{
		$this->checkAuth();
		$data['uni'] = $this->uni->showUniData();
		$this->load->view('admin/page/topic/add', $data);
	}

	public function saveTopic() 
	{
		$topic = $this->topic->getId();
		$newid = $topic['topic_id'] + 1;

		if($this->input->post('uni_id')) {
			foreach ($this->input->post('uni_id') as $uni) {
				$data_topic_dtl = [
					'topic_id' => $newid,
					'uni_id' => $uni
				];
				$this->topic->insertTopicDetail($data_topic_dtl);
			} 
		}

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
			'topic_zoom_link' => $this->input->post('topic_zoom_link'),
			'topic_password' => $this->input->post('topic_password'),
			'topic_status' => 1,
			'topic_banner' => $filesname
		];
		$process = $this->topic->insertTopic($data);
			
		if($process){
			echo '001';
		} else {
			echo '02';
		}
	}

	public function editTopic($id) 
	{
		$this->checkAuth();
		$topic = $this->topic->getTopicDataById($id);
		$data['topic'] = $topic[$id];
		$data['uni'] = $this->uni->showUniData();
		$this->load->view('admin/page/topic/edit', $data);
	}

	public function updateTopic() 
	{
		$topic_id = $this->input->post('topic_id');
		
		// Delete all topic detail 
		$this->topic->deleteTopicDetail($topic_id);

		// Add new topic detail 
		if($this->input->post('uni_id')) {
			foreach ($this->input->post('uni_id') as $uni) {
				$data_topic_dtl = [
					'topic_id' => $topic_id,
					'uni_id' => $uni
				];
				$this->topic->insertTopicDetail($data_topic_dtl);
			} 
		}

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

				if($banner_old!="default.jpeg") {
					$path = FCPATH  . "assets/topic/".$banner_old;
					unlink($path);
				}
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
			'topic_zoom_link' => $this->input->post('topic_zoom_link'),
			'topic_password' => $this->input->post('topic_password'),
			'topic_banner' => $filesname
		];
		$process = $this->topic->updateTopic($topic_id, $data);
			
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
		$this->checkAuth();
		$data['uni'] = $this->uni->showUniDataJoin();
		$this->load->view('admin/page/uni/index', $data);
	}

	public function addUni() 
	{
		$this->checkAuth();
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
			'uni_status' => $this->input->post('uni_status'),
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
		$this->checkAuth();
		$uni = $this->uni->showUniDataJoin($id);
		if(!empty($uni)) {
			$data['uni'] = $uni[$id];
			$this->load->view('admin/page/uni/edit', $data);
		} else {
			redirect(base_url('dashboard/admin/uni')); 
		}
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

			if($banner_old!="default.jpeg") {
				$path = FCPATH  . "assets/uni/banner/".$banner_old;
				unlink($path);
			}
		} else {
			$filesname = $banner_old;
		}	

		$data = [
			'uni_name' => $this->input->post('uni_name'),
			'uni_description' => $this->input->post('uni_description'),
			'uni_country' => $this->input->post('uni_country'),
			'uni_detail_country' => $this->input->post('uni_detail_country'),
			'uni_status' => $this->input->post('uni_status'),
			'uni_photo_banner' => $filesname
		];

		$process = $this->uni->updateUni($uni_id, $data);
		if($process){
			echo $uni_id;
		} else {
			echo 0;
		}
	}

	public function deleteUni($id) 
	{
		$data = $this->uni->showUniDataJoin($id);
		$photo = $data[$id]['uni_photo_banner'];
		if($photo!="default.jpeg") {
			$path = FCPATH  . "assets/uni/banner/".$photo;
			unlink($path);
		}
		
		$process = $this->uni->deleteUni($id);
		if($process){
			echo "001";
		} else {
			echo "02";
		}
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
			'uni_dtl_zoom_link' => $this->input->post('uni_dtl_zoom_link'),
			'uni_dtl_password' => $this->input->post('uni_dtl_password')
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

	function editUniConsult($id)
	{
		$process = $this->uni->getUniDtlId($id);
		echo json_encode($process);
	}

	function updateUniConsult()
	{
		$id = $this->input->post('uni_id');
		$dtl_id = $this->input->post('uni_dtl_id');

		$start =  $this->input->post('uni_dtl_start_date');
		$start_old =  $this->input->post('uni_dtl_start_date_old');
		$end = $this->input->post('uni_dtl_end_date');
		$end_old = $this->input->post('uni_dtl_end_date_old');
		$duration 	= $this->input->post('uni_dtl_duration');
		$duration_old 	= $this->input->post('uni_dtl_duration_old');

		if(($start!=$start_old) or ($end!=$end_old) or ($duration!=$duration_old)){
			$this->uni->deleteUniDetailTime($dtl_id);
			
			$start_time 	= date('Y-m-d H:i', strtotime($start));
			$end_time 		= date('Y-m-d H:i', strtotime($end));
			$diff 			= strtotime($end_time) - strtotime($start_time);
			$jam  			= $diff / (60 * 60);
			$menit    		= $jam * 60;
			$jumlah_sesi 	= $menit/$duration;

			$datas = [];
			for($i = 1; $i<=$jumlah_sesi ; $i++){
				$starttime = strtotime("+".$duration*$i-$duration."minutes", strtotime($start_time));
				$endtime = strtotime("+".$duration*$i."minutes", strtotime($start_time));
				$datas[$i] = [
					'uni_dtl_id' => $dtl_id,
					'uni_dtl_t_start_time' => date('Y-m-d H:i:s', $starttime),
					'uni_dtl_t_end_time' => date('Y-m-d H:i:s', $endtime),
					'uni_dtl_t_status' => 1
					
				];
				$this->uni->insertUniDetailTime($datas[$i]);
			}
		}

		$data = [
			'uni_dtl_start_date' => $this->input->post('uni_dtl_start_date'),
			'uni_dtl_end_date' => $this->input->post('uni_dtl_end_date'),
			'uni_dtl_duration' => $this->input->post('uni_dtl_duration'),
			'uni_dtl_zoom_link' => $this->input->post('uni_dtl_zoom_link'),
			'uni_dtl_password' => $this->input->post('uni_dtl_password'),
		];

		$process = $this->uni->updateUniDetail($data, $dtl_id);
		
		if($process) {
			echo $id;
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

	function indexUser($id="")
	{
		$this->checkAuth();
		$data['user'] = $this->user->getUserData($id);
		$this->load->view('admin/page/user/index', $data);
	}

	function indexBookTopic()
	{
		$this->checkAuth();
		$data['top'] = $this->topic->getTopicStatusData(1);
		$data['topic'] = $this->topic->getBookingTopic();
		$this->load->view('admin/page/book-topic/index', $data);
		// echo json_encode($data);
	}

	function exportBookTopic()
	{
		$this->checkAuth();
		$data['top'] = $this->topic->getTopicStatusData(1);
		$data['topic'] = $this->topic->getBookingTopic();
		$this->load->view('admin/page/book-topic/export/excel', $data);
	}

	function indexBookConsult()
	{
		$this->checkAuth();
		$data['uni'] = $this->uni->getBookConsult();
		$this->load->view('admin/page/book-consult/index', $data);
		// echo json_encode($data);
	}

	function exportBookConsult()
	{
		$this->checkAuth();
		$data['uni'] = $this->uni->getBookConsult();
		$this->load->view('admin/page/book-consult/export/excel', $data);
		// echo json_encode($data);
	}

}
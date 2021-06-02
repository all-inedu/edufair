<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiController extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
		$this->load->library('country');
		$this->load->model('TopicModel','topic');
		$this->load->model('UniModel','uni');
		$this->load->model('UserModel', 'user');
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
    
    public function showParticipant($id) 
    {
        $p = $this->user->showUserStatus($id);
        $u = count($this->user->getUserData('all'));
        $data = [
            'status' => $p['tot'],
            'tot' => $u,
            'percentage' => ($p['tot']/$u) * 100 ."%"
        ];
        echo json_encode($data);
    }

}
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
        $this->load->model('LeadModel', 'lead');
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
            'percentage' => number_format(($p['tot']/$u) * 100,0) ."%"
        ];
        echo json_encode($data);
    }

    public function showRegistrant()
    {
        $r = $this->user->getUserDataPerDays();
        $data = [];
        foreach ($r as $row) {
            $data[] = [
                'tot' => $row['tot'],
                'date' => date('M dS', strtotime($row['user_register_date']))
            ];
        }
        echo json_encode($data);
    }

    public function showUserLead()
    {
        $l = $this->user->getUserLead();
        echo json_encode($l);
    }

    public function showUserTopic()
    {      
        $topic = $this->topic->getTopicStatusData(1);
        $data = [];
        foreach ($topic as $t) {
            $data[] = [
                'topic_name' => $t['topic_name'],
                'join' => $this->user->getUserBookingTopic($t['topic_id'],1),
                'cancel' => $this->user->getUserBookingTopic($t['topic_id'],0)
            ];
        }

        echo json_encode($data);
    }

    public function showUserConsult($id)
    {
        $data = [
            'uni_id'    => $id,
            'join'      => $this->user->getUserBookingConsult($id, 1),
            'cancel'    => $this->user->getUserBookingConsult($id, 0)
        ];

        echo json_encode($data);
    }

}
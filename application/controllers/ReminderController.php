<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReminderController extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
		$this->load->library('country');
		$this->load->model('TopicModel','topic');
		$this->load->model('UniModel','uni');
		$this->load->model('UserModel', 'user');
        $this->load->library('session');
        $this->load->library('mail_smtp');
    }

    public function reminder() {
        $date = "2021-05-19";
        // $date = date("Y-m-d");
        
        $tomorrow = date("Y-m-d",strtotime('+1 days', strtotime($date))); 
        $user = $this->user->getUserData("all");
        $data = [];
        foreach ($user as $u) {
            $bookTopic = $this->topic->getBookingTopicById($u['user_id'], $tomorrow);
            $bookConsult = $this->uni->getBookingConsultById($u['user_id'], $tomorrow);
            if(!isset($data[$u['user_id']])) {
                $data[$u['user_id']] = [
                    'user_name' => $u['user_first_name']." ".$u['user_last_name'],
                    'user_email' => $u['user_email'],
                    'topic' => $bookTopic,
                    'consult' => $bookConsult,
                ];
            }
        }

        foreach ($data as $d) {
            if((!empty($d['topic'])) or (!empty($d['consult']))) {
                $email = $d['user_email'];
                
                $config = $this->mail_smtp->smtp();
                $this->load->library('mail_smtp', $config);
                $this->email->initialize($config);
                $this->email->from('info@all-inedu.com', 'ALL-in Eduspace');
                $this->email->to($email);
                // $this->email->to('hafidz.fanany@all-inedu.com');

                $this->email->subject('Edufair Reminder');

                $bodyMail = $this->load->view('mail/reminder', $d, true);
                $this->email->message($bodyMail);

                    // Send Email
                $this->email->send();
            } 
        }
        // echo json_encode($data);
    }
    
}
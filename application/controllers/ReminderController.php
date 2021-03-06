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

    public function welcome() {
        // $config = $this->mail_smtp->smtp();
        // $this->load->library('mail_smtp', $config);
        // $this->email->initialize($config);
        // $this->email->from('info@all-inedu.com', 'ALL-in Eduspace');
        // $this->email->to('hafidz.fanany@all-inedu.com');
        // $this->email->subject('Welcome to ALL-in Edufair 2021!');
        // $bodyMail = $this->load->view('mail/thanks', '', true);
        // $this->email->message($bodyMail);
        // $this->email->send();

        // $this->load->view('mail/thanks');
    }

    public function reminderh7() {
        $date_reminder = "2021-07-17"; // ganti 2021-07-17
        $date = date("Y-m-d");

        if($date_reminder==$date) {
            $user = $this->user->getUserData("all");
            foreach($user as $u) {
                $email = $u['user_email'];
                
                $config = $this->mail_smtp->smtp();
                $this->load->library('mail_smtp', $config);
                $this->email->initialize($config);
                $this->email->from('info@all-inedu.com', 'ALL-in Eduspace');
                // $this->email->to('hafidz.bdt@gmail.com');
                $this->email->to($email);
                $this->email->subject('Did you book your 1-on-1 consultation yet?');
                $bodyMail = $this->load->view('mail/reminder_h-7', '', true);
                $this->email->message($bodyMail);
                $this->email->send();
            }
        }
    }

    public function reminderh3() {
        $date_reminder = "2021-07-20"; // ganti 2021-07-21
        $date = date("Y-m-d");

        if($date_reminder==$date) {
            $user = $this->user->getUserData("all");
            foreach($user as $u) {
                $email = $u['user_email'];
                
                $config = $this->mail_smtp->smtp();
                $this->load->library('mail_smtp', $config);
                $this->email->initialize($config);
                $this->email->from('info@all-inedu.com', 'ALL-in Eduspace');
                // $this->email->to('hafidz.bdt@gmail.com');
                $this->email->to($email);
                $this->email->subject('Quick! Secure your spot now!');
                $bodyMail = $this->load->view('mail/reminder_h-3', '', true);
                $this->email->message($bodyMail);
                $this->email->send();
            }
        }

        // return $this->load->view('mail/reminder_h-3');
    }

    public function reminderh1() {
        // $dates = "2021-07-23";
        $date = date("Y-m-d");
        
        if($date=="2021-07-23") {
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
                    $this->email->subject('These universities are expecting you!');
                    $bodyMail = $this->load->view('mail/reminder_h-1', $d, true);
                    $this->email->message($bodyMail);
                    $this->email->send();
                }
            }
        }
        
    }

    public function reminderd1() {
        // $date = "2021-07-24";
        $date = date("Y-m-d");

        if($date=="2021-07-24") {   
            $user = $this->user->getUserData("all");
            $data = [];
            foreach ($user as $u) {
                $bookTopic = $this->topic->getBookingTopicById($u['user_id'], $date);
                $bookConsult = $this->uni->getBookingConsultById($u['user_id'], $date);
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
                    $this->email->subject('Your Day 1 Agenda');
                    $bodyMail = $this->load->view('mail/reminder_d1', $d, true);
                    $this->email->message($bodyMail);
                    $this->email->send();

                    // $this->load->view('mail/reminder_d1', $d);
                } 
            }
        }
        // echo json_encode($data);
    }

    public function reminderd2() {
        // $date = "2021-07-25";
        $date = date("Y-m-d");
        
        if($date=="2021-07-25") {
            $user = $this->user->getUserData("all");
            $data = [];
            foreach ($user as $u) {
                $bookTopic = $this->topic->getBookingTopicById($u['user_id'], $date);
                $bookConsult = $this->uni->getBookingConsultById($u['user_id'], $date);
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
                    $this->email->subject('Your Day 2 Agenda');
                    $bodyMail = $this->load->view('mail/reminder_d2', $d, true);
                    $this->email->message($bodyMail);
                    $this->email->send();

                    // $this->load->view('mail/reminder_d2', $d);
                } 
            }
        }
    }

    public function thanks() {
        // $date = "2021-07-26";
        $date = date("Y-m-d");
        
        if($date=="2021-07-26") {
            $user = $this->user->getUserData("all");
            $data = [];
            foreach ($user as $u) {
                $bookTopic = $this->topic->getBookingTopicById($u['user_id']);
                $bookConsult = $this->uni->getBookingConsultById($u['user_id']);
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
                    $this->email->subject('One Last Thing!');
                    $bodyMail = $this->load->view('mail/thanks', $d, true);
                    $this->email->message($bodyMail);
                    $this->email->send();

                    // $this->load->view('mail/thanks', $d);
                } 
            }
        }    
        // $this->load->view('mail/thanks');
    }
    
}
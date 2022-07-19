<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AutomatedController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('logMail');
    }

    public function automated_send_mail()
    {
        $get_unsended_mail = $this->logMail->getData();
        foreach ($get_unsended_mail as $detail) {
            $mail_category = $detail['mail_category'];
            $user_id = $detail['user_id'];

            switch ($mail_category) {
                case 0: //register

                    break;

                case 1: // reminder h7

                    break;

                case 2: // reminder h3

                    break;

                case 3: // reminder h1

                    break;

                case 4: // reminder d1h1

                    break;

                case 5: // reminder d1

                    break;

                case 6: // reminder d2

                    break;

                case 7: // reminder thanks

                    break;

                case 8: // reminder verification

                    break;

                case 9: // reminder forgot pass

                    break;
            }
        }
    }

    public function send_mail_reminder_h3($user_id)
    {
        $date_reminder = REMINDER_H3;
        $date = date("Y-m-d");

        if($date_reminder == $date) {
            $data = [];
            $user = $this->user->getUserData($user_id);
            $bookTopic = $this->topic->getBookingTopicById($user_id, '');
            $bookConsult = $this->uni->getBookingConsultById($user_id, '');

            if(!isset($data[$user_id])) {
                $data[$user_id] = [
                    'user_name' => $user['user_fullname'],
                    'user_email' => $user['user_email'],
                    'topic' => $bookTopic,
                    'consult' => $bookConsult,
                ];
            }

            foreach($data as $d) {
                if ((!empty($d['topic'])) or (!empty($d['consult']))) {
                    $email = $d['user_email'];
                
                    $config = $this->mail_smtp->smtp();
                    $this->load->library('mail_smtp', $config);
                    $this->email->initialize($config);
                    $this->email->from('info@all-inedu.com', 'ALL-in Eduspace');
                    $this->email->to($email);
                    // $this->email->to('hafidz.fanany@all-inedu.com');
                    $this->email->subject(SUBJECT_REMINDER_H3);
                    $bodyMail = $this->load->view('mail/reminder_h-3', $d, true);
                    $this->email->message($bodyMail);
                    $sent = $this->email->send() ? true : false;

                    //* save log
			        $this->LogMail->insert(['inserted_id' => $d['user_id'], 'category' => 2, 'sent' => $sent]);
		
                }
            }
        }
    }
}
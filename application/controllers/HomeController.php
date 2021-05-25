<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function __Construct()
    {
        parent ::__construct();
        $this->load->model('UserModel');
        $this->load->model('UniModel');
        $this->load->model('TopicModel');
        $this->load->model('ConsultModel');
    }

	public function index()
	{
        $data['title'] = "Edufair";
        $topicData_day1 = $this->TopicModel->getTopicData('2021-05-20'); // change with edufair start date
		$topicData_day2 = $this->TopicModel->getTopicData('2021-05-21'); // change iwth edufair start date
		$data['talk_day1'] = $topicData_day1;
		$data['talk_day2'] = $topicData_day2;
		$data['uniData'] = $this->UniModel->getUniData("");
		$data['uniCountry'] = $this->UniModel->getUniCountry();

        $this->load->view('template/header', $data);
        $this->load->view('home/navbar');
        $this->load->view('home/header');
		$this->load->view('home/topic', $data);
		$this->load->view('home/book');
		$this->load->view('home/footer');
        $this->load->view('template/footer');
	}

	public function findUniByCountry()
	{
		$countryName = $this->input->post('countryName');
		$uniData = $this->UniModel->getUniData($countryName);
		if($uniData) {
			$html = '<div class="row my-0">';
			$i = 0;
            foreach($uniData as $uniInfo) {
            	$html .= '
            	<div class="col-md-6 mb-2" id="col<?=$i;?>">
                    <div class="card">
                        <img src="'.base_url().$uniInfo['uni_photo_banner'].'" alt="" height="200">
                        <div class="card-body text-center p-1">
                            <h4 class="m-0 text-muted">Uni '.$uniInfo['uni_name'].'</h4>
                        </div>
                        <div class="row no-gutters">';
            			$day = 1;
                        foreach($uniInfo['uni_detail'] as $row) {
                            $assigned_time  = $row['uni_dtl_start_date'];
                            $start = explode(" ", $assigned_time);
                            $start_time = substr($start[1], 0, 5);

                            $completed_time  = $row['uni_dtl_end_date'];
                            $end = explode(" ", $completed_time );
                            $end_time = substr($end[1], 0, 5);

                            $d1 = new DateTime($assigned_time);
                            $d2 = new DateTime($completed_time);

                            $interval = $d2->diff($d1);
                            $time = $interval->format('%H');
                            $html .= '
                            <div class="col">
                                <button class="btn btn-primary btn-block btn-sm btn-book" data-toggle="modal"
                                    data-target="#modal'.$row['uni_dtl_id'].'">Day '.$day.'</button>
                            </div>';

                            $disabled = "";
                            if(count($uniInfo['uni_detail']) < 2) {
                                $disabled = "style='background:#c6c6c6 !important;border: 1px solid #c6c6c6 !important'";
                                $html .= '
                                <div class="col">
                                    <button class="btn btn-success btn-block btn-sm btn-book" data-toggle="modal" '.$disabled.'
                                        data-target="#day2">Day 2</button>
                                </div>';
                            }

                            $html .= '
                            <div class="modal" tabindex="-1" role="dialog" id="modal'.$row['uni_dtl_id'].'">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Time</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">';
                                    $duration = 15;
                                    $count = 0;
                                    for($i = 1; $i <= ($time*60)/$duration; $i++){
                                        $startTime = strtotime("+".$duration*$count." minutes", strtotime($assigned_time));
                                        $endTime = strtotime("+".$duration*$i." minutes", strtotime($assigned_time));

                                        $html .= '
                                        	<div class="row mb-2">
                                                <div class="col-9 pr-0">
                                                    <button class="btn btn-outline-info btn-disabled btn-block" disabled>'.date("h:i", $startTime)." - ".date("h:i", $endTime).' WIB</button>
                                                </div>
                                                <div class="col-3">
                                                    <button class="btn btn-primary btn-block btn-book-consul" data-uniid="'.$uniInfo["uni_id"].'" data-starttime="'.$start[0]." ".date("h:i:s", $startTime).'" data-endtime="'.$start[0]." ".date("h:i:s", $endTime).'">Book</button>
                                                </div>
                                            </div>';
                                   	$count++;
                                    }
                            $html .= '
                            		</div>
                        		</div>
		                    </div>
		                    </div>';
		                $day++;
		            	}
           		$html .= '
	            	</div>
	            </div>
	        </div>';
	    	}
			echo $html;
		} else {
			echo "05"; // error find Uni By Country
		}

	}
}
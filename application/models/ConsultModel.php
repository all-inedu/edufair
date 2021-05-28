<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ConsultModel extends CI_Model {

    function bookingConsult($data)
    {
        //insert to tb booking consult
        $insert = $this->db->insert('tb_booking_consult', $data);
        if($insert) {
	        //change status to booked
	        $this->db->where('uni_detail_time_id', $data['uni_detail_time_id']);
	        return $this->db->update('tb_uni_detail_time', array( "uni_dtl_t_status" => 0));
	    } else {
	    	return false;
	    }

    }

}
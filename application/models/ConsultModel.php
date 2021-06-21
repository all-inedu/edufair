<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ConsultModel extends CI_Model {

    function bookingConsult($data)
    {
    	//check if there's any booking consultation with requested user id
    	$sql = "SELECT * FROM tb_booking_consult WHERE user_id = ".$data['user_id']." AND uni_detail_time_id = ".$data['uni_detail_time_id'];
    	$query = $this->db->query($sql);
		if($query->num_rows() > 0) { // jika ada
			$this->db->where('uni_detail_time_id', $data['uni_detail_time_id']);
			$this->db->delete('tb_booking_consult');
    	}

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
	
	function checkConsult($id, $uniid) 
	{
		$this->db->select('c.uni_id');
		$this->db->from('tb_booking_consult a');
		$this->db->where('a.user_id', $id);
		$this->db->where('a.booking_c_status', 1);
		$this->db->where('c.uni_id', $uniid);
		$this->db->join('tb_uni_detail_time b','b.uni_detail_time_id=a.uni_detail_time_id');
		$this->db->join('tb_uni_detail c','c.uni_dtl_id=b.uni_dtl_id');
		return $this->db->get()->result_array();
	}

	function checkTime($id, $start_time)
	{
		$this->db->select('a.user_id');
		$this->db->from('tb_booking_consult a');
		$this->db->where('a.user_id', $id);
		$this->db->where('a.booking_c_status', 1);
		$this->db->where('b.uni_dtl_t_start_time', $start_time);
		$this->db->join('tb_uni_detail_time b','b.uni_detail_time_id=a.uni_detail_time_id');
		return $this->db->get()->result_array();
	}

}
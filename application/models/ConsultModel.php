<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ConsultModel extends CI_Model {

	function getBookingConsultData($user_id)
	{
		$this->db->select('uni_dtl_id');
		$query = $this->db->get_where('tb_booking_consult', array('user_id' => $user_id, 'booking_c_status' => 1));
		return $query->result_array();
	}

	function insertQuestion($user_id, $uni_id, $question)
	{
		$data = array(
			'user_id' => $user_id,
			'uni_id' => $uni_id,
			'q_question' => $question,
			'created_at' => date('Y-m-d H:i:s')
		);
		return $this->db->insert('tb_questions', $data);
	}

    function bookingConsult($data)
    {
		return $this->db->insert('tb_booking_consult', $data);
	}

	function checkExistingConsultation($data)
	{
		$query = $this->db->get_where('tb_booking_consult', array('user_id' => $data['user_id'], 'uni_dtl_id' => $data['uni_dtl_id']));
		return $query->num_rows();
	}

	function getExistingConsultation($data)
	{
		$query = $this->db->get_where('tb_booking_consult', array('user_id' => $data['user_id'], 'uni_dtl_id' => $data['uni_dtl_id']));
		return $query->row();
	}

	function updateBookingConsultation($booking_c_id)
	{
		$this->db->set('booking_c_status', 1);
		$this->db->where('booking_c_id', $booking_c_id);
		return $this->db->update('tb_booking_consult');
	}
	
	function checkConsult($id, $uniid) 
	{
		$this->db->select('c.uni_id');
		$this->db->from('tb_booking_consult a');
		$this->db->where('a.user_id', $id);
		$this->db->where('a.booking_c_status', 1);
		$this->db->where('c.uni_id', $uniid);
		// $this->db->join('tb_uni_detail_time b','b.uni_detail_time_id=a.uni_detail_time_id');
		$this->db->join('tb_uni_detail c','c.uni_dtl_id=a.uni_dtl_id');
		return $this->db->get()->result_array();
	}

	function checkTime($id, $start_time)
	{
		$this->db->select('a.user_id');
		$this->db->from('tb_booking_consult a');
		$this->db->where('a.user_id', $id);
		$this->db->where('a.booking_c_status', 1);
		//! lanjut jumat
		// $this->db->where('b.uni_dtl_t_start_time', $start_time);
		// $this->db->join('tb_uni_detail_time b','b.uni_detail_time_id=a.uni_detail_time_id');
		return $this->db->get()->result_array();
	}

}
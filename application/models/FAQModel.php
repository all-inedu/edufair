<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FAQModel extends CI_Model {

    function getQuestions()
    {
        $this->db->from('tb_questions');
        $this->db->join('tb_user', 'user_id');
        $this->db->join('tb_uni', 'uni_id');
        // $this->db->from('tb_booking_consult');
        // $this->db->join('tb_user', 'user_id');
        $this->db->order_by("created_at asc, q_question asc");
        $query = $this->db->get();
        return $query->result();
    }
}
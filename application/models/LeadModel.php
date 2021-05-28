<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LeadModel extends CI_Model {

    function getAllDataLead()
    {
        $query = $this->db->get('tb_lead');
        return $query->result();
    }

}
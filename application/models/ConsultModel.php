<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ConsultModel extends CI_Model {

    function bookingConsult($data)
    {
        return $this->db->insert('tb_booking_consult', $data);
    }

}
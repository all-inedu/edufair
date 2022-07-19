<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LogMail extends CI_Model {

    function insert($request) {
        $data = array(
			'user_id' => $request['inserted_id'],
			'mail_category' => $request['category'],
			'status' => $request['sent'] === true ? 1 : 0
		);
		return $this->db->insert('log_mail', $data);
    }
}
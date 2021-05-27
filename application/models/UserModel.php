<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model {

  	function insertUser($data)
  	{
	    $sql    = "INSERT INTO `tb_user`(`user_first_name`, `user_last_name`, `user_email`, `user_password`, `user_phone`, `user_status`, `user_gender`, `user_first_time`, `user_grade`, `user_school`, `user_country`, `user_major`, `user_know_from`, `user_register_date`, `user_last_login`) 
	    		VALUES ('".$data['user_first_name']."',
	    				'".$data['user_last_name']."',
	    				'".$data['user_email']."',
	    				'".$data['user_password']."',
	    				'".$data['user_phone']."',
	    				'".$data['user_status']."',
	    				'".$data['user_gender']."',
	    				'".$data['user_first_time']."',
	    				'".$data['user_grade']."',
	    				'".$data['user_school']."',
	    				'".$data['user_country']."',
	    				'".$data['user_major']."',
	    				'".$data['user_lead']."',
	    				now(),
	    				'')";
	    				
	    $query = $this->db->query($sql);
	    if($query) {
	    	return $this->db->insert_id();
	    } else {
	    	return false;
	    }
  	}

  	public function getUserDataById($inserted_id)
  	{
  		$sql = "SELECT * FROM `tb_user` WHERE user_id = '".$inserted_id."'";
  		$query = $this->db->query($sql);
  		$row = $query->row();
  		if(isset($row)) {
  			$data = array(
				"user_id"            => $row->user_id,
				"user_first_name"    => $row->user_first_name,
				"user_last_name"     => $row->user_last_name,
				"user_email"         => $row->user_email,
				"user_password"      => $row->user_password,
				"user_phone"         => $row->user_phone,
				"user_status"        => $row->user_status,
				"user_gender"        => $row->user_gender,
				"user_first_time"    => $row->user_first_time,
				"user_grade"         => $row->user_grade,
				"user_school"        => $row->user_school,
				"user_country"       => $row->user_country,
				"user_major"         => $row->user_major,
				"user_know_from"     => $row->user_know_from,
				"user_register_date" => $row->user_register_date,
				"user_last_login"    => $row->user_last_login
  			);
  			return $data;
  		} else {
  			return false;
  		}
  	}

  	public function getUserInfoByEmail($email)
  	{
  		$sql = "SELECT * FROM tb_user WHERE user_email = '$email'";
  		$query = $this->db->query($sql);
  		if($query->num_rows() > 0) {
  			foreach($query->result() as $row) {
	  			$data = array(
					"user_id"            => $row->user_id,
					"user_first_name"    => $row->user_first_name,
					"user_last_name"     => $row->user_last_name,
					"user_email"         => $row->user_email,
					"user_password"      => $row->user_password,
					"user_phone"         => $row->user_phone,
					"user_status"        => $row->user_status,
					"user_gender"        => $row->user_gender,
					"user_first_time"    => $row->user_first_time,
					"user_grade"         => $row->user_grade,
					"user_school"        => $row->user_school,
					"user_country"       => $row->user_country,
					"user_major"         => $row->user_major,
					"user_know_from"     => $row->user_know_from,
					"user_register_date" => $row->user_register_date,
					"user_last_login"    => $row->user_last_login
	  			);
	  		}
			return $data; 
  		}
  		
  	}

  	public function insertToken($user_id)
    {
        $token = substr(sha1(rand()), 0, 30);
        $date = date('Y-m-d');

        $string = array(
            'token' => $token,
            'user_id' => $user_id,
            'created' => $date
        );
        $query = $this->db->insert_string('tokens', $string);
        $this->db->query($query);
        return $token . $user_id;
    }

    public function isTokenValid($token)
    {
        $tkn = substr($token, 0, 30);
        $uid = substr($token, 30);

        $q = $this->db->get_where('tokens', array(
            'tokens.token' => $tkn,
            'tokens.user_id' => $uid
        ), 1);

        if ($this->db->affected_rows() > 0) {
            $row = $q->row();

            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d');
            $todayTS = strtotime($today);

            if ($createdTS != $todayTS) {
                return false;
            }

            $user_info = $this->getUserDataById($row->user_id);
            return $user_info;
        } else {
            return false;
        }
    }

    public function updatePassword($post)
    {
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('tb_user', array('user_password' => $post['password']));
        return true;
    }

    public function lastLoginUpdate($userId)
    {
    	$this->db->where('user_id', $userId);
    	$this->db->update('tb_user', array('user_last_login' => date('Y-m-d H:i:s')));
    	return true;
    }

}
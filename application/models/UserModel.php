<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model {

	function getUserData()
	{
		$this->db->select('
			tb_user.*,

			tb_booking_topic.booking_topic_id,
			tb_booking_topic.topic_id,
			tb_booking_topic.booking_topic_date,
			tb_topic.topic_name,
			tb_topic.topic_start_date,
			tb_topic.topic_end_date,
			tb_topic.topic_name,

			tb_booking_consult.booking_c_id,
			tb_booking_consult.uni_detail_time_id,
			tb_booking_consult.booking_c_date,
			tb_uni_detail_time.	uni_dtl_t_start_time,
			tb_uni_detail_time.	uni_dtl_t_end_time,
			tb_uni.	uni_id,
			tb_uni.	uni_name,
			');
		$this->db->from('tb_user');
		$this->db->order_by('tb_user.user_register_date','DESC');
		$this->db->order_by('tb_topic.topic_start_date','ASC');
		$this->db->order_by('tb_uni_detail_time.uni_dtl_t_start_time','ASC');
		$this->db->join('tb_booking_topic','tb_booking_topic.user_id=tb_user.user_id','left');
		$this->db->join('tb_topic','tb_topic.topic_id=tb_booking_topic.topic_id','left');
		$this->db->join('tb_booking_consult','tb_booking_consult.user_id=tb_user.user_id','left');
		$this->db->join('tb_uni_detail_time','tb_uni_detail_time.uni_detail_time_id=tb_booking_consult.uni_detail_time_id','left');
		$this->db->join('tb_uni_detail','tb_uni_detail.uni_dtl_id=tb_uni_detail_time.uni_dtl_id','left');
		$this->db->join('tb_uni','tb_uni.uni_id=tb_uni_detail.uni_id','left');
		$query = $this->db->get()->result_array();
		$data = [];
		foreach ($query as $row) {
			if(!isset($data[$row['user_id']])) {
				$data[$row['user_id']] = [
				  "user_id" 		=> $row['user_id'],
				  "user_first_name"	=> $row['user_first_name'],
				  "user_last_name" 	=> $row['user_last_name'],
				  "user_email" 		=> $row['user_email'],
				  "user_phone" 		=> $row['user_phone'],
				  "user_status" 	=> $row['user_status'],
				  "user_gender" 	=> $row['user_gender'],
				  "user_first_time"	=> $row['user_first_time'],
				  "user_school" 	=> $row['user_school'],
				  "user_grade" 		=> $row['user_grade'],
				  "user_country" 	=> $row['user_country'],
				  "user_major" 		=> $row['user_major'],
				  "user_know_from" 	=> $row['user_know_from'],
				  "user_register_date" 		=> $row['user_register_date'],
				  "user_booking_topic"  	=> [],
				  "user_booking_consult"  	=> []
				];
			}

			if(!isset($data[$row['user_id']]['user_booking_topic'][$row['booking_topic_id']])) {
				$data[$row['user_id']]['user_booking_topic'][$row['booking_topic_id']] = [
					"booking_topic_id" 	=> $row['booking_topic_id'],
					"topic_id" 				=> $row['topic_id'],
					"topic_name" 			=> $row['topic_name'],
					"topic_start_date" 		=> $row['topic_start_date'],
					"topic_end_date" 		=> $row['topic_end_date'],
					"booking_topic_date" 	=> $row['booking_topic_date'],
				];
			}

			if(!isset($data[$row['user_id']]['user_booking_consult'][$row['booking_c_id']])) {
				$data[$row['user_id']]['user_booking_consult'][$row['booking_c_id']] = [
					"booking_c_id" 			=> $row['booking_c_id'],
					"uni_id" 				=> $row['uni_id'],
					"uni_name" 				=> $row['uni_name'],
					"uni_detail_time_id"	=> $row['uni_detail_time_id'],
					"uni_dtl_t_start_time"	=> $row['uni_dtl_t_start_time'],
					"uni_dtl_t_end_time"	=> $row['uni_dtl_t_end_time'],
					"booking_c_date" 		=> $row['booking_c_date'],
				];
			}
		}
		return $data;
	}

  	function insertUser($data)
  	{
      $sql = "SELECT * FROM tb_user WHERE user_email = '".$data['user_email']."'";
      $query = $this->db->query($sql);
      if($query->num_rows() > 0 ) {
        // error email already exist
        $array = array(
          "code" => "09",
          "msg"  => "Email already exist",
          "val"  => false
        );
        return $array;
      }

	    $sql    = "INSERT INTO `tb_user`(`user_first_name`, `user_last_name`, `user_email`, `user_password`, `user_phone`, `user_status`, `user_gender`, `user_dob`, `user_first_time`, `user_grade`, `user_school`, `user_country`, `user_major`, `user_know_from`, `user_register_date`, `user_last_login`) 
	    		VALUES ('".$data['user_first_name']."',
	    				'".$data['user_last_name']."',
	    				'".$data['user_email']."',
	    				'".$data['user_password']."',
	    				'".$data['user_phone']."',
	    				'".$data['user_status']."',
	    				'".$data['user_gender']."',
              '".$data['user_dob']."',
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
        $array = array(
          "code" => "001",
          "msg"  => "Registration Success",
          "val"  => $this->db->insert_id()
        );
	    	return $array;
	    } else {
        $array = array(
          "code" => "01",
          "msg"  => "Registration Failed",
          "val"  => false
        );
	    	return $array;
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
        "user_dob"           => $row->user_dob,
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
          "user_dob"           => $row->user_dob,
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
	
	public function getUserDataPerDays()
	{
		$date = date("Y-m-d");
		$day30 = date("Y-m-d", strtotime("-30 days", strtotime($date)));
		$this->db->select('
			count(user_id) as tot,
			user_register_date
		');
		$this->db->from('tb_user');
		$this->db->group_by('user_register_date');
		$this->db->where('user_register_date <', $date);
		$this->db->where('user_register_date >', $day30);
		return $this->db->get()->result_array();
	}

    public function getUserTopic($user_id)
    {
      $sql = "SELECT * FROM tb_booking_topic bt 
              LEFT JOIN tb_topic t ON t.topic_id = bt.topic_id 
              WHERE bt.user_id = $user_id AND bt.booking_topic_status = 1";
      $query = $this->db->query($sql);
      return $query->result();
    }

    public function getUserConsult($user_id)
    {
      $sql = "SELECT udt.uni_dtl_t_start_time, udt.uni_dtl_t_end_time, udt.uni_dtl_t_status, udt.uni_detail_time_id, ud.uni_dtl_zoom_link, u.uni_id, u.uni_name, u.uni_photo_banner FROM tb_booking_consult bc
              JOIN tb_uni_detail_time udt ON udt.uni_detail_time_id = bc.uni_detail_time_id
              JOIN tb_uni_detail ud ON ud.uni_dtl_id = udt.uni_dtl_id
              JOIN tb_uni u ON u.uni_id = ud.uni_id
              WHERE bc.user_id = $user_id AND bc.booking_c_status = 1";
      $query = $this->db->query($sql);
      return $query->result(); 
      // if($query->num_rows() > 0) {
      //   $data = array();
      //   foreach($query->result() as $row) {
      //     // print("<pre>".print_r($row, true)."</pre>");
      //     if(!isset($data[$row->uni_id])) {
      //       $data[$row->uni_id] = array(
      //           "uni_name" => $row->uni_name,
      //           "uni_photo_banner" => $row->uni_photo_banner,
      //           "uni_dtl_zoom_link" => $row->uni_dtl_zoom_link,
      //           "uni_schedule" => array()
      //       );
      //     }

      //     $data[$row->uni_id]['uni_schedule'][] = array(
      //             "uni_dtl_t_start_time" => $row->uni_dtl_t_start_time,
      //             "uni_dtl_t_end_time" => $row->uni_dtl_t_end_time
      //           );

          
      //   }
      //   return $data;
      // } else {
      //   return false;
      // }
    }

    public function cancelBooking($user_id, $type, $id)
    {
      if($type == "topic") {
        $this->db->where('user_id', $user_id);
        $this->db->where('topic_id', $id);
        return $this->db->update('tb_booking_topic', array("booking_topic_status" => 0));
      } else if ($type == "consult") {
        $this->db->where('user_id', $user_id);
        $this->db->where('uni_detail_time_id', $id);
        return $this->db->update('tb_booking_consult', array("booking_c_status" => 0));
      }
    }

    public function updateInformation($data, $userId)
    {
    	$this->db->where('user_id', $userId);
    	return $this->db->update('tb_user', $data);
    }
}
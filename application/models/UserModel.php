<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model {

	function showUserStatus($id)
	{
		$this->db->select('
			count(user_id) as tot
		');
		$this->db->from('tb_user');
		$this->db->where('user_status', $id);
		return $this->db->get()->row_array();
	}

	public function getUserLead()
	{
		$this->db->select('
			count(user_id) as tot,
			user_know_from
		');
		$this->db->from('tb_user');
		$this->db->group_by('user_know_from');
		return $this->db->get()->result_array();
	}

	public function getUserBookingTopic($id, $s)
	{
		$this->db->select('
			count(user_id) as tot
		');
		$this->db->from('tb_booking_topic');
		$this->db->where('topic_id',$id);
		$this->db->where('booking_topic_status',$s);
		return $this->db->get()->result_array();
	}

	public function getUserBookingConsult($id, $s)
	{
		$this->db->select('
			count(tb_booking_consult.user_id) as tot
		');
		$this->db->from('tb_booking_consult');
		$this->db->where('tb_uni_detail.uni_id',$id);
		$this->db->where('tb_booking_consult.booking_c_status',$s);
		$this->db->join('tb_uni_detail_time', 'tb_uni_detail_time.uni_detail_time_id=tb_booking_consult.uni_detail_time_id');
		$this->db->join('tb_uni_detail', 'tb_uni_detail.uni_dtl_id=tb_uni_detail_time.uni_dtl_id');
		return $this->db->get()->result_array();
	}

	function getUserData($id)
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
			tb_booking_consult.uni_dtl_id,
			tb_booking_consult.booking_c_date,
			tb_uni.uni_id,
			tb_uni.uni_name,
			tb_uni_detail.uni_dtl_start_date,
			tb_uni_detail.uni_dtl_end_date
			');
		$this->db->from('tb_user');
		if(($id!="all")) {
			$this->db->where('tb_user.user_status',$id);
		}
		$this->db->order_by('tb_user.user_register_date','DESC');
		$this->db->order_by('tb_topic.topic_start_date','ASC');
		$this->db->join('tb_booking_topic','tb_booking_topic.user_id=tb_user.user_id','left');
		$this->db->join('tb_topic','tb_topic.topic_id=tb_booking_topic.topic_id','left');
		$this->db->join('tb_booking_consult','tb_booking_consult.user_id=tb_user.user_id','left');
		$this->db->join('tb_uni_detail','tb_uni_detail.uni_dtl_id=tb_booking_consult.uni_dtl_id','left');
		// $this->db->join('tb_uni_detail','tb_uni_detail.uni_dtl_id=tb_uni_detail_time.uni_dtl_id','left');
		$this->db->join('tb_uni','tb_uni.uni_id=tb_uni_detail.uni_id','left');
		$query = $this->db->get()->result_array();
		$data = [];
		foreach ($query as $row) {
			if(!isset($data[$row['user_id']])) {
				$data[$row['user_id']] = [
				  "user_id" 		=> $row['user_id'],
				  "user_fullname"   => $row['user_fullname'],
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
				  "token_status" 	=> $row['token_status'],
				  "user_register_date" 		=> $row['user_register_date'],
				  "user_resume"				=> $row['resume'],
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
					"uni_dtl_start_date"    => $row['uni_dtl_start_date'],
					"uni_dtl_end_date"		=> $row['uni_dtl_end_date'],
					// "uni_detail_time_id"	=> $row['uni_detail_time_id'],
					// "uni_dtl_t_start_time"	=> $row['uni_dtl_t_start_time'],
					// "uni_dtl_t_end_time"	=> $row['uni_dtl_t_end_time'],
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

	  	try {
			  
			// $this->db->trans_begin();
			// $sql    = "INSERT INTO `tb_user`(`user_fullname`, `user_email`, `user_password`, `user_phone`, `user_status`, `user_gender`, `user_dob`, `user_first_time`, `user_grade`, `user_school`, `user_country`, `user_major`, `user_know_from`, `user_register_date`, `user_last_login`, `user_biggest_challenge`) 
			// 		VALUES ('".$data['user_fullname']."',
			// 				'".$data['user_email']."',
			// 				'".$data['user_password']."',
			// 				'".$data['user_phone']."',
			// 				'".$data['user_status']."',
			// 				'".$data['user_gender']."',
			// 				'".$data['user_dob']."',
			// 				'".$data['user_first_time']."',
			// 				'".$data['user_grade']."',
			// 				'".$data['user_school']."',
			// 				'".$data['user_country']."',
			// 				'".$data['user_major']."',
			// 				'".$data['user_lead']."',
			// 				now(),
			// 				'',
			// 				'".$data['user_biggest']."')";
			// $query = $this->db->query($sql);
			$this->db->insert('tb_user', $data);
			// $this->db->trans_commit();
			// $this->db->trans_complete();
			// $db_error = $this->db->error();
			// if ($db_error != "") {
			// 	throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
			// 	// return false; // unreachable retrun statement !!!
				// return array(
				// 	"code" => "01",
				// 	"msg"  => "Registration Failed",
				// 	"val"  => false
				// 	);
			// }

			return array(
			"code" => "001",
			"msg"  => "Registration Success",
			"val"  => $this->db->insert_id()
			);
					
		} catch (Exception $e) {
			
			// $this->db->trans_rollback();
			log_message('error', $e->getMessage());
        	return array(
				"code" => "01",
				"msg"  => "Registration Failed",
				"val"  => false
				);
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
				"user_fullname"      => $row->user_fullname,
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
					"user_fullname"      => $row->user_fullname,
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
					"user_resume"		   => $row->resume,
					"user_last_login"    => $row->user_last_login,
					"token_status"	   => $row->token_status,
					"resume"			=> $row->resume,
					"came_from"			=> $row->came_from
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
	
	public function updateTokenStatus($id)
	{
		$this->db->set('token_status',1);
		$this->db->where('user_id', $id);
		$this->db->update('tb_user');
	}

    public function updatePassword($post)
    {
		$this->db->set('user_password', $post['user_password']);
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('tb_user');
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
		$day30 = date("Y-m-d", strtotime("-30days", strtotime($date)));
		$this->db->select('
			count(user_id) as tot,
			user_register_date
		');
		$this->db->from('tb_user');
		$this->db->group_by('date(user_register_date)');
		$this->db->where('date(user_register_date) <=', $date);
		$this->db->where('date(user_register_date) >', $day30);
		return $this->db->get()->result_array();
	}

    public function getUserTopic($user_id)
    {
      $sql = "SELECT * FROM tb_booking_topic bt 
              LEFT JOIN tb_topic t ON t.topic_id = bt.topic_id 
			  WHERE bt.user_id = $user_id AND bt.booking_topic_status = 1
			  ORDER BY t.topic_start_date ASC";
      $query = $this->db->query($sql);
	//   $this->db->select('*');
	//   $this->db->from('tb_booking_topic');
	//   $this->db->join('tb_topic', 'topic_id', 'left');
	//   $this->db->where('tb_booking_topic.user_id', $user_id);
	//   $this->db->where('tb_booking_topic.booking_topic_status', 1);
	//   $this->db->order_by('tb_topic.topic_start_date', 'ASC');
	//   return $this->db->get();
      return $query->result();
    }

    public function getUserConsult($user_id)
    {
      $sql = "SELECT bc.booking_c_id, ud.uni_dtl_start_date, ud.uni_dtl_end_date, ud.uni_dtl_id, ud.uni_dtl_zoom_link, u.uni_id, u.uni_name, u.uni_photo_banner FROM tb_booking_consult bc
            --   JOIN tb_uni_detail_time udt ON udt.uni_detail_time_id = bc.uni_detail_time_id
              JOIN tb_uni_detail ud ON ud.uni_dtl_id = bc.uni_dtl_id
              JOIN tb_uni u ON u.uni_id = ud.uni_id
			  WHERE bc.user_id = $user_id AND bc.booking_c_status = 1
			--   ORDER BY udt.uni_dtl_t_start_time ASC
			ORDER BY ud.uni_dtl_start_date ASC
			  ";
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
        /* change booking c status on tb_booking_consult to 0 */
        $this->db->where('user_id', $user_id);
        // $this->db->where('uni_detail_time_id', $id);
		$this->db->where('booking_c_id', $id);
        return $this->db->update('tb_booking_consult', array("booking_c_status" => 0));
        // if($process) {
        //   /* change uni dtl t status on tb_uni_detail_time to 1 */
        //   $this->db->where('uni_detail_time_id', $id);
        //   return $this->db->update('tb_uni_detail_time', array("uni_dtl_t_status" => 1));
        // } else {
        //   return false;
        // }
      }
    }

    public function updateInformation($data, $userId)
    {
    	$this->db->where('user_id', $userId);
    	return $this->db->update('tb_user', $data);
    }

    public function insertToWaitingList($uniId, $userId)
    {
    	$data = array(
    		"user_id" => $userId,
    		"uni_id" => $uniId,
    		"wl_date" => date('Y-m-d')
    	);

    	return $this->db->insert('tb_waiting_list', $data);
	}
	
	public function showWaitingListById($user_id, $uni_id)
	{
		$this->db->select('uni_id');
		$this->db->where('user_id', $user_id);
		$this->db->where('uni_id', $uni_id);
		return $this->db->get('tb_waiting_list')->result_array();
	}

	public function getWaitingList($id="")
	{
		$this->db->select('*');
		if($id=="uni"){
			$this->db->where('tb_uni.uni_id !=', 21);
		} else {
			$this->db->where('tb_uni.uni_id=', 21);
		}
		$this->db->join('tb_uni','tb_uni.uni_id=tb_waiting_list.uni_id');
		$this->db->join('tb_user','tb_user.user_id=tb_waiting_list.user_id');
		return $this->db->get('tb_waiting_list')->result_array();
	}

	//* New 2022
	public function updateResume($user_id, $file_name)
	{	
		$this->db->set('resume', $file_name);
		$this->db->where('user_id', $user_id);
		return $this->db->update('tb_user');
	}
}
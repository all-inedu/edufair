<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UniModel extends CI_Model {

	function getId() 
    {
        $this->db->select('uni_id');
        $this->db->order_by('uni_id','DESC');
        $this->db->from('tb_uni');
        return $this->db->get()->row_array();
	}
	
	function getUniDtlId($id="") 
	{
		$this->db->select('*');
		if($id!="") {
			$this->db->where('uni_dtl_id', $id);
		}
        $this->db->order_by('uni_dtl_id','DESC');
        $this->db->from('tb_uni_detail');
        return $this->db->get()->row_array();
    }

	function showUniData() {
		$this->db->select('*');
		$this->db->order_by('uni_name', 'asc');
		return $this->db->get('tb_uni')->result_array();
	}

	function showUniDataJoin($id="") {
		$this->db->select('
			tb_uni.*, 
			tb_uni_detail.uni_dtl_id,
			tb_uni_detail.uni_dtl_start_date,
			tb_uni_detail.uni_dtl_end_date,
			tb_uni_detail.uni_dtl_duration,
			tb_uni_detail.uni_dtl_zoom_link,
			tb_uni_detail.uni_dtl_password,
		');
		if($id!=""){
			$this->db->where('tb_uni.uni_id',$id);
		}
		$this->db->order_by('uni_name', 'asc');
		$this->db->join('tb_uni_detail','tb_uni_detail.uni_id=tb_uni.uni_id','left');
		$query = $this->db->get('tb_uni')->result();

		$data = array();
        foreach($query as $queryData) {
          if(!isset($data[$queryData->uni_id])) {
            $data[$queryData->uni_id] = array(
                  "uni_id"         		=> $queryData->uni_id,
                  "uni_name"       		=> $queryData->uni_name,
                  "uni_country"       	=> $queryData->uni_country,
                  "uni_detail_country" 	=> $queryData->uni_detail_country,
                  "uni_description"   	=> $queryData->uni_description,
                  "uni_photo_banner" 	=> $queryData->uni_photo_banner,
                  "uni_status"    		=> $queryData->uni_status,
                  "uni_detail"       	=> array()
              );
          }
          $data[$queryData->uni_id]['uni_detail'][] = array(
				  "uni_dtl_id"   			=> $queryData->uni_dtl_id,
				  "uni_dtl_start_date" 		=> $queryData->uni_dtl_start_date,
				  "uni_dtl_end_date" 		=> $queryData->uni_dtl_end_date,
				  "uni_dtl_duration" 		=> $queryData->uni_dtl_duration,
				  "uni_dtl_zoom_link"   	=> $queryData->uni_dtl_zoom_link,
				  "uni_dtl_password"   		=> $queryData->uni_dtl_password,
                );
        }
        return $data;
	}
	
	function getUniData($countryName="")
	{
		// $sql = "SELECT u.*, ud.uni_dtl_id, ud.uni_dtl_start_date, ud.uni_dtl_end_date, bc.booking_c_id, 
		// 		(CASE WHEN bc.uni_id is NULL THEN 'available' ELSE 'booked' END) AS status
		// 		FROM `tb_uni` u 
		// 		JOIN tb_uni_detail ud ON ud.uni_id = u.uni_id 
		// 		LEFT JOIN tb_booking_consult bc ON bc.uni_id = u.uni_id
		// 		WHERE u.uni_status = 1 ORDER BY ud.uni_dtl_start_date ASC";

		

		$sql = "SELECT *
				FROM `tb_uni` u 
				JOIN tb_uni_detail ud ON ud.uni_id = u.uni_id 
                JOIN tb_uni_detail_time udt ON udt.uni_dtl_id = ud.uni_dtl_id
				WHERE u.uni_status = 1 ORDER BY ud.uni_dtl_start_date ASC";
		
		$query = $this->db->query($sql);
		if($query->num_rows() > 0) {
			$data = array();
			foreach($query->result() as $row){
				if(!isset($data[$row->uni_id])) {
					$sql_count_fullbooked = "SELECT IF(SUM(udt.uni_dtl_t_status) = 0, 'FULL', 'NOT_FULL') AS 'status'
								FROM `tb_uni` u 
								JOIN tb_uni_detail ud ON ud.uni_id = u.uni_id 
				                JOIN tb_uni_detail_time udt ON udt.uni_dtl_id = ud.uni_dtl_id
								WHERE u.uni_status = 1 AND u.uni_id = ".$row->uni_id;
					$query_count_fullbooked = $this->db->query($sql_count_fullbooked);
					foreach($query_count_fullbooked->result() as $rows) {
						$status_fullbooked = $rows->status;
					}

					$sql_count_topic = "SELECT IF(COUNT(*) > 0, 'REGISTERED', 'NOT_REGISTERED') AS topic_registered FROM tb_topic_detail td 
										WHERE td.uni_id = ".$row->uni_id;
					$query_count_topic = $this->db->query($sql_count_topic);
					foreach($query_count_topic->result() as $rows) {
						$status_topicregistered = $rows->topic_registered;
					}


		            $data[$row->uni_id] = array(
						"uni_id"           => $row->uni_id,
						"uni_name"         => $row->uni_name,
						"uni_country"      => $row->uni_country,
						"uni_description"  => $row->uni_description,
						"uni_photo_banner" => $row->uni_photo_banner,
						"uni_status_fullbooked" => $status_fullbooked,
						"uni_topic_reg"	   => $status_topicregistered,
						// "uni_zoom_link"    => $row->uni_zoom_link,
						"uni_detail"       => array()
		              	);
		          	}

		        $uni_dtl_start_date = explode(" ", $row->uni_dtl_start_date);
		        $uni_dtl_end_date = explode(" ", $row->uni_dtl_end_date);

		        if(!isset($data[$row->uni_id]['uni_detail'][$uni_dtl_start_date[0]])) {
		        	$data[$row->uni_id]['uni_detail'][$uni_dtl_start_date[0]] = array(
						"uni_dtl_id"         => $row->uni_dtl_id,
						"uni_dtl_start_date" => $row->uni_dtl_start_date,
						"uni_dtl_end_date"   => $row->uni_dtl_end_date,
						"uni_dtl_duration" 	 => $row->uni_dtl_duration,
						"uni_dtl_zoom_link"  => $row->uni_dtl_zoom_link,
						"uni_dtl_time"       => array()
					);
		        }

		        $data[$row->uni_id]['uni_detail'][$uni_dtl_start_date[0]]['uni_dtl_time'][] = array(
					"uni_detail_time_id" => $row->uni_detail_time_id,
					"uni_dtl_t_start_time"   => $row->uni_dtl_t_start_time,
					"uni_dtl_t_end_time" => $row->uni_dtl_t_end_time,
					"uni_dtl_t_status" => $row->uni_dtl_t_status
		        );
				
			}
			// print("<pre>".print_r($data, true)."</pre>");exit;
			return $data;
		} else {
			return false;
		}
	}

	function getUniCountry()
	{
		$sql = "SELECT DISTINCT(u.uni_id), u.uni_name, u.uni_country FROM tb_uni u
				RIGHT JOIN tb_uni_detail ud ON ud.uni_id = u.uni_id
				WHERE u.uni_status = 1";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0) {
			$data = array();
			foreach($query->result() as $row) {
				if(!isset($data[$row->uni_country])) {
					$data[$row->uni_country] = array(
							"uni_detail" => array()
					);
				}

				$data[$row->uni_country]['uni_detail'][] = array(
							"uni_id" => $row->uni_id,
							"uni_name" => $row->uni_name
					);	
				
			}
			return $data;
		} else {
			return false;
		}
	}

	function getBookConsult()
	{
		$this->db->select('*');
		$this->db->from('tb_booking_consult');
		$this->db->order_by('tb_uni.uni_name','ASC');
		$this->db->order_by('tb_booking_consult.booking_c_status','DESC');
		$this->db->order_by('tb_uni_detail_time.uni_dtl_t_start_time','ASC');
		$this->db->join('tb_user','tb_user.user_id=tb_booking_consult.user_id');
		$this->db->join('tb_uni_detail_time','tb_uni_detail_time.uni_detail_time_id=tb_booking_consult.uni_detail_time_id');
		$this->db->join('tb_uni_detail','tb_uni_detail.uni_dtl_id=tb_uni_detail_time.uni_dtl_id');
		$this->db->join('tb_uni','tb_uni.uni_id=tb_uni_detail.uni_id');
		$query = $this->db->get()->result_array();

		$data = [];
		foreach ($query as $c) {
			if(!isset($data[$c['uni_id']])){
				$data[$c['uni_id']] = [
					"uni_id" => $c['uni_id'],
					"uni_name" => $c['uni_name'],
					"user" => [],
				];
			}

			$data[$c['uni_id']]['user'][] = [
				"user_id" => $c['user_id'],
				"user_first_name" => $c['user_first_name'],
				"user_last_name" => $c['user_last_name'],
				"user_email" => $c['user_email'],
				"user_status" => $c['user_status'],
				"user_school" => $c['user_school'],
				"user_grade" => $c['user_grade'],
				"user_know_from" => $c['user_know_from'],
				"user_dob" => $c['user_dob'],
				"uni_detail_time_id" => $c['uni_detail_time_id'],
				"uni_dtl_t_start_time" => $c['uni_dtl_t_start_time'],
				"uni_dtl_t_end_time" => $c['uni_dtl_t_end_time'],
				"booking_c_date" => $c['booking_c_date'],
				"booking_c_status" => $c['booking_c_status'],
			];
		}

		return $data;
	}

	function insertUni($data) 
	{
		$query = $this->db->insert('tb_uni', $data);
        if($query) {
          return true;
        } else {
          return false;
        }
	}

	function updateUni($id, $data)
	{
		$this->db->where('uni_id', $id);
		$query = $this->db->update('tb_uni', $data);
		if($query) {
          return true;
        } else {
          return false;
        }
	}

	function deleteUni($id)
	{
		$this->db->where('uni_id', $id);
		$query = $this->db->delete('tb_uni');
        if($query) {
          return true;
        } else {
          return false;
        }
	}

	function insertUniDetail($data) 
	{
		$query = $this->db->insert('tb_uni_detail', $data);
        if($query) {
          return true;
        } else {
          return false;
        }
	}

	function updateUniDetail($data, $id) {
		$this->db->where('uni_dtl_id', $id);
		$query = $this->db->update('tb_uni_detail', $data);
		if($query) {
          return true;
        } else {
          return false;
        }
	}

	function deleteUniDetail($id)
	{
		$this->db->where('uni_dtl_id', $id);
		$query = $this->db->delete('tb_uni_detail');
        if($query) {
          return true;
        } else {
          return false;
        }
	}

	function insertUniDetailTime($data) 
	{
		$query = $this->db->insert('tb_uni_detail_time', $data);
        if($query) {
          return true;
        } else {
          return false;
        }
	}

	function deleteUniDetailTime($id)
	{
		$this->db->where('uni_dtl_id', $id);
		$query = $this->db->delete('tb_uni_detail_time');
        if($query) {
          return true;
        } else {
          return false;
        }
	}

	function getBookingConsultById($id, $d="") {
      $this->db->select('*');
      $this->db->where('tb_booking_consult.user_id', $id);
	  $this->db->where('tb_booking_consult.booking_c_status', 1);
	  if($d!=""){
	  	$this->db->where('date(tb_uni_detail_time.uni_dtl_t_start_time)', $d);
	  }
      $this->db->from('tb_booking_consult');
	  $this->db->join('tb_uni_detail_time', 'tb_uni_detail_time.uni_detail_time_id=tb_booking_consult.uni_detail_time_id');
	  $this->db->join('tb_uni_detail', 'tb_uni_detail.uni_dtl_id=tb_uni_detail_time.uni_dtl_id');
	  $this->db->join('tb_uni', 'tb_uni.uni_id=tb_uni_detail.uni_id');
      return $this->db->get()->result_array();
    }
}
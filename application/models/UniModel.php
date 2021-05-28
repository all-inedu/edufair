<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UniModel extends CI_Model {

	function getUniData ()
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
		            $data[$row->uni_id] = array(
						"uni_id"           => $row->uni_id,
						"uni_name"         => $row->uni_name,
						"uni_country"      => $row->uni_country,
						"uni_description"  => $row->uni_description,
						"uni_photo_banner" => $row->uni_photo_banner,
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
}
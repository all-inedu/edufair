<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UniModel extends CI_Model {

	function getUniData ()
	{
		$sql = "SELECT u.*, ud.uni_dtl_id, ud.uni_dtl_start_date, ud.uni_dtl_end_date, bc.booking_c_id, 
				(CASE WHEN bc.uni_id is NULL THEN 'available' ELSE 'booked' END) AS status
				FROM `tb_uni` u 
				JOIN tb_uni_detail ud ON ud.uni_id = u.uni_id 
				LEFT JOIN tb_booking_consult bc ON bc.uni_id = u.uni_id
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
						"uni_zoom_link"    => $row->uni_zoom_link,
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
						"uni_dtl_time"       => array()
					);
		        }

		        $data[$row->uni_id]['uni_detail'][$uni_dtl_start_date[0]]['uni_dtl_time'][] = array(
					"start_time" => $uni_dtl_start_date[1],
					"end_time"   => $uni_dtl_end_date[1],
		        );
				
			}
			return $data;
		} else {
			return false;
		}
		
	}
}
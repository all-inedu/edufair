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
	
	function getUniDtlId() 
    {
        $this->db->select('uni_dtl_id');
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
				  "uni_dtl_duration" 	=> $queryData->uni_dtl_duration,
				  "uni_dtl_zoom_link"   	=> $queryData->uni_dtl_zoom_link,
                );
        }
        return $data;
	}
	
	function getUniData($countryName="")
	{
		if($countryName != "") { // if user does search by country name
			$sql = "SELECT u.*, ud.uni_dtl_id, ud.uni_dtl_start_date, ud.uni_dtl_end_date, bc.booking_c_id, 
				(CASE WHEN bc.uni_id is NULL THEN 'available' ELSE 'booked' END) AS status
				FROM `tb_uni` u 
				JOIN tb_uni_detail ud ON ud.uni_id = u.uni_id 
				LEFT JOIN tb_booking_consult bc ON bc.uni_id = u.uni_id
				WHERE 
				u.uni_country LIKE '%".$countryName."%' 
				OR u.uni_detail_country like '%".$countryName."%'
				AND u.uni_status = 1 ORDER BY ud.uni_dtl_start_date ASC";
		} else { // if user doesn't search by country name
			$sql = "SELECT u.*, ud.uni_dtl_id, ud.uni_dtl_start_date, ud.uni_dtl_end_date, bc.booking_c_id, 
				(CASE WHEN bc.uni_id is NULL THEN 'available' ELSE 'booked' END) AS status
				FROM `tb_uni` u 
				JOIN tb_uni_detail ud ON ud.uni_id = u.uni_id 
				LEFT JOIN tb_booking_consult bc ON bc.uni_id = u.uni_id
				WHERE u.uni_status = 1 ORDER BY ud.uni_dtl_start_date ASC";
		}
		
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
						// "uni_dtl_time"       => array()
					);
		        }

		   //      $data[$row->uni_id]['uni_detail'][$uni_dtl_start_date[0]]['uni_dtl_time'][] = array(
					// "start_time" => $uni_dtl_start_date[1],
					// "end_time"   => $uni_dtl_end_date[1],
		   //      );
				
			}
			return $data;
		} else {
			return false;
		}
	}

	function getUniCountry()
	{
		$sql = "SELECT uni_country, uni_detail_country FROM tb_uni WHERE uni_status = 1";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0) {
			$data = array();
			foreach($query->result() as $row) {
				if(!isset($data[$row->uni_country])) {
					$data[$row->uni_country] = array();
				}

				$data[$row->uni_country][] = $row->uni_detail_country;
				
			}
			return $data;
		} else {
			return false;
		}
	}

	function getUniDataByCountry($countryName)
	{
		$sql = "SELECT uni_country, uni_detail_country FROM tb_uni WHERE uni_country LIKE '%".$countryName."%' 
				OR uni_detail_country like '%".$countryName."%' AND uni_status = 1";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0) {
			$data = array();
			foreach($query->result() as $row) {
				if(!isset($data[$row->uni_country])) {
					$data[$row->uni_country] = array();
				}

				$data[$row->uni_country][] = $row->uni_detail_country;
				
			}
			return $data;
		} else {
			return false;
		}
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

	function insertUniDetail($data) 
	{
		$query = $this->db->insert('tb_uni_detail', $data);
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
}
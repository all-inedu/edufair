<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TopicModel extends CI_Model {

    function getId() 
    {
        $this->db->select('topic_id');
        $this->db->order_by('topic_id','DESC');
        $this->db->from('tb_topic');
        return $this->db->get()->row_array();
    }

    function getTopicStatusData($s)
    {
        $this->db->select('*');
        $this->db->order_by('topic_name','ASC');
        $this->db->from('tb_topic');
        $this->db->where('topic_status',$s);
        return $this->db->get()->result_array();
    }

    function getTopicDataById($id) 
    {
      $sql = "SELECT t.*, u.* FROM `tb_topic` t 
              LEFT JOIN tb_topic_detail td ON t.topic_id = td.topic_id
              LEFT JOIN tb_uni u ON u.uni_id = td.uni_id
              WHERE t.topic_id = '".$id."'";

      $query = $this->db->query($sql);
      if($query->num_rows() > 0) {
        $data = array();
        foreach($query->result() as $queryData) {
          if(!isset($data[$queryData->topic_id])) {
            $data[$queryData->topic_id] = array(
                  "topic_id"         => $queryData->topic_id,
                  "topic_name"       => $queryData->topic_name,
                  "topic_desc"       => $queryData->topic_desc,
                  "topic_start_date" => $queryData->topic_start_date,
                  "topic_end_date"   => $queryData->topic_end_date,
                  "topic_banner"     => $queryData->topic_banner,
                  "topic_status"     => $queryData->topic_status,
                  "topic_zoom_link"  => $queryData->topic_zoom_link,
                  "uni_detail"       => array()
              );
          }
          $data[$queryData->topic_id]['uni_detail'][] = array(
                  "uni_id"           => $queryData->uni_id
                  // "uni_zoom_link"    => $queryData->uni_zoom_link
                );
        }
        return $data;
      } else {
        return false;
      }
    }

    function getUniDataByTopic($id) 
    {
        $this->db->select('*');
        $this->db->where('topic_id', $id);
        $this->db->from('tb_topic_detail');
        return $this->db->get()->result_array();
    }

    function getBookingTopicData($user_id)
    {
      $sql = "SELECT * FROM tb_booking_topic WHERE user_id = $user_id";
      $query = $this->db->query($sql);
      if($query->num_rows() > 0) {
        $array = array();
        foreach($query->result() as $row) {
          array_push($array, $row->topic_id);
        }
        return $array;
      }
    }

  	function getTopicData($requestedDate="") 
    {
      if($requestedDate!="") {
      $sql = "SELECT t.*, u.* FROM `tb_topic` t 
              LEFT JOIN tb_topic_detail td ON t.topic_id = td.topic_id
              LEFT JOIN tb_uni u ON u.uni_id = td.uni_id
              WHERE t.topic_start_date BETWEEN '".$requestedDate."' AND '".$requestedDate." 23:59:59' AND
              t.topic_status = 1 
              ORDER BY t.topic_start_date ASC
              ";
      // echo $sql;exit;
      } else {
      $sql = "SELECT t.*, u.* FROM `tb_topic` t 
              LEFT JOIN tb_topic_detail td ON t.topic_id = td.topic_id
              LEFT JOIN tb_uni u ON u.uni_id = td.uni_id
              ORDER BY t.topic_start_date ASC";
      }
      
      $query = $this->db->query($sql);
      if($query->num_rows() > 0) {
        $data = array();
        foreach($query->result() as $queryData) {
          if(!isset($data[$queryData->topic_id])) {
            $data[$queryData->topic_id] = array(
                  "topic_id"         => $queryData->topic_id,
                  "topic_name"       => $queryData->topic_name,
                  "topic_desc"       => $queryData->topic_desc,
                  "topic_start_date" => $queryData->topic_start_date,
                  "topic_end_date"   => $queryData->topic_end_date,
                  "topic_banner"     => $queryData->topic_banner,
                  "topic_status"     => $queryData->topic_status,
                  "topic_zoom_link"  => $queryData->topic_zoom_link,
                  "uni_detail"       => array()
              );
          }
          $data[$queryData->topic_id]['uni_detail'][] = array(
                  "uni_id"           => $queryData->uni_id,
                  "uni_name"         => $queryData->uni_name,
                  "uni_country"      => $queryData->uni_country,
                  "uni_description"  => $queryData->uni_description,
                  "uni_photo_banner" => $queryData->uni_photo_banner
                  // "uni_zoom_link"    => $queryData->uni_zoom_link
                );
        }
        return $data;
      } else {
        return false;
      }
    }

    function bookingTopic($userId, $day1bookingTopicId, $day2bookingTopicId)
    {
      $error_found = 0;
      // insert from day 1
      foreach($day1bookingTopicId as $key => $topicId) {
        $sql = "INSERT INTO `tb_booking_topic`(`topic_id`, `user_id`, `booking_topic_date`, `booking_topic_status`) VALUES (".$topicId.",".$userId.",now(), 1)";
        $query = $this->db->query($sql);
        if(!$query) {
          $error_found++; // +1 error if insert can't be done
        }
      }

      // insert from day 2
      foreach($day2bookingTopicId as $key => $topicId) {
        $sql = "INSERT INTO `tb_booking_topic`(`topic_id`, `user_id`, `booking_topic_date`, `booking_topic_status`) VALUES (".$topicId.",".$userId.",now(), 1)";
        $query = $this->db->query($sql);
        if(!$query) {
          $error_found++; // +1 error if insert can't be done
        }
      }

      if($error_found == 0) {
        return true;
      } else {
        return false;
      }
    }

    function bookingOneTopic($userId, $topicId)
    {
      $sql = "SELECT count(*) AS bookingCount FROM tb_booking_topic WHERE user_id = ".$userId." AND topic_id = ".$topicId;
      $query = $this->db->query($sql);
      foreach( $query->result() as $row ) {
        $bookingCount = $row->bookingCount;
      }

      if($bookingCount > 0) {
        return "07";
      }

      $data = array(
        "topic_id" => $topicId,
        "user_id" => $userId,
        "booking_topic_date" => date('Y-m-d H:i:s'),
        "booking_topic_status" => 1
      );
      $query = $this->db->insert('tb_booking_topic', $data);
      if($query) {
        return "001";
      } else {
        return "03";
      }
    }

    function getBookingTopic()
    {
      $this->db->select('
          tb_topic.*,
          tb_booking_topic.user_id,
          tb_booking_topic.booking_topic_status,
          tb_booking_topic.booking_topic_date,
          tb_user.user_first_name,
          tb_user.user_last_name,
          tb_user.user_status,
          tb_user.user_email,
          tb_user.user_school,
          tb_user.user_grade,
          tb_user.user_dob,
          tb_user.user_know_from
          
      ');
      $this->db->from('tb_topic');
      $this->db->order_by('tb_topic.topic_start_date','ASC');
      $this->db->order_by('tb_booking_topic.booking_topic_status','DESC');
       $this->db->order_by('tb_user.user_first_name','ASC');
      $this->db->order_by('tb_user.user_status','ASC');
      $this->db->where('tb_topic.topic_status', 1);
      $this->db->join('tb_booking_topic', 'tb_booking_topic.topic_id=tb_topic.topic_id','left');
      $this->db->join('tb_user', 'tb_user.user_id=tb_booking_topic.user_id', 'left');
      $query = $this->db->get()->result_array();

      $data = [];
		  foreach ($query as $row) {
        if(!isset($data[$row['topic_id']])){
            $data[$row['topic_id']]=[
              "topic_id"              => $row['topic_id'],
              "topic_name"            => $row['topic_name'],
              "topic_start_date"      => $row['topic_start_date'],
              "topic_end_date"        => $row['topic_end_date'],
              "user"                  => []
            ];
        }
        $data[$row['topic_id']]['user'][] = [
            "user_id"               => $row['user_id'],
            "user_first_name"       => $row['user_first_name'],
            "user_last_name"        => $row['user_last_name'],
            "user_status"           => $row['user_status'],
            "user_email"            => $row['user_email'],
            "user_school"           => $row['user_school'],
            "user_grade"            => $row['user_grade'],
            "booking_topic_status"  => $row['booking_topic_status'],
            "user_dob"              => $row['user_dob'],
            "user_know_from"        => $row['user_know_from'],
        ];
      }
      return $data;
    }

    function insertTopic($data) 
    {
        $query = $this->db->insert('tb_topic', $data);
        return $query;
    }

    function insertTopicDetail($data) 
    {
        $query = $this->db->insert('tb_topic_detail', $data);
        return $query;
    }

    function statusTopic($id, $data) {
      $this->db->where('topic_id', $id);
      $query = $this->db->update('tb_topic', $data);
      if($query) {
          return true;
      } else {
          return false;
      }
    }

    function updateTopic($id, $data) {
      $this->db->where('topic_id', $id);
      $query = $this->db->update('tb_topic', $data);
      if($query) {
          return true;
      } else {
          return false;
      }
    }

    function deleteTopicDetail($id) {
      $this->db->where('topic_id', $id);
      $query = $this->db->delete('tb_topic_detail');
      if($query) {
          return true;
      } else {
          return false;
      }
    }

    function getBookingTopicById($id, $d) {
      $this->db->select('*');
      $this->db->where('tb_booking_topic.user_id', $id);
      $this->db->where('tb_booking_topic.booking_topic_status', 1);
      $this->db->where('date(tb_topic.topic_start_date)', $d);
      $this->db->from('tb_booking_topic');
      $this->db->join('tb_topic', 'tb_topic.topic_id=tb_booking_topic.topic_id');
      return $this->db->get()->result_array();
    }

}
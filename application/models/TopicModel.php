<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TopicModel extends CI_Model {

  	function getTopicData($requestedDate) 
    {
      $sql = "SELECT t.*, u.* FROM `tb_topic` t 
              JOIN tb_topic_detail td ON t.topic_id = td.topic_id
              JOIN tb_uni u ON u.uni_id = td.uni_id
              WHERE t.topic_start_date BETWEEN '".$requestedDate."' AND '".$requestedDate." 23:59:59' AND
              t.topic_status = 1 AND u.uni_status = 1
              ";
      $query = $this->db->query($sql);
      if($query->num_rows() > 0) {
        $data = array();
        foreach($query->result() as $queryData) {
          if(!isset($data[$queryData->topic_id])) {
            $data[$queryData->topic_id] = array(
                  "topic_id"         => $queryData->topic_id,
                  "topic_name"       => $queryData->topic_name,
                  "topic_start_date" => $queryData->topic_start_date,
                  "topic_end_date"   => $queryData->topic_end_date,
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
        $sql = "INSERT INTO `tb_booking_topic`(`topic_id`, `user_id`, `booking_topic_date`) VALUES (".$topicId.",".$userId.",now())";
        $query = $this->db->query($sql);
        if(!$query) {
          $error_found++; // +1 error if insert can't be done
        }
      }

      // insert from day 2
      foreach($day2bookingTopicId as $key => $topicId) {
        $sql = "INSERT INTO `tb_booking_topic`(`topic_id`, `user_id`, `booking_topic_date`) VALUES (".$topicId.",".$userId.",now())";
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

}
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RegisterModel extends CI_Model {

  function insertUser($data){
 
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
    return $query;   

  }

}
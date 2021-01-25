<?php 
class Otp_Model extends CI_Model
{
 protected $table = 'otp_login_attempts';
 public function __construct() 
 {
    parent::__construct();
 }

 public function insert($userData) 
  { 
       $this->db->insert($this->table, $userData);
  } 

}
?>
<?php 
class User_model extends CI_Model
{
  protected $table = 'users';
  public function __construct() 
  {
    parent::__construct();
  }
  public function insert($userData) 
  { 
    $this->db->set('uuid', 'UUID()', FALSE);   
    $this->db->insert($this->table, $userData);
       // geting last row id for inserting into otp_login_attempts. 
    $user_id = $this->db->insert_id();
    return $user_id;
  } 

  function loginValidation($username, $password)   
  { 
    $this->db->where('email', $username);
    $this->db->where('password', md5($password)); //User enter password convert into md5 before searching.
    $query = $this->db->get($this->table);
    echo $this->db->last_query();
    die;
    return $query;
  }

}
?>
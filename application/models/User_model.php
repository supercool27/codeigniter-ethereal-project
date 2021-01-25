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
    return $query;
  }

  function otp_insert($otp,$data)
  {
    $otp_data=array(
      'uuid'=>$data['uuid']->uuid,
      'user_id'=> $data['user_id'],
      'otp' =>$otp,
      'is_verified'=> 0,
    );
    $this->db->insert('otp_login_attempts',$otp_data);
    //get uuid of the user and insert into otp table
  }
  
  function otp_verify($data)
  {
    $this->db->where('otp',$data['otp']);
    $query = $this->db->get($this->table);
    return $query;
    //$this->db->where('otp',$data->otp)
  }

  function insert_otp_attempts()
  {


  }

  function get_uuid_by_user_id($id)
  {
    return $this->db->get_where($this->table, array('id' => $id))
                        ->row();
  }




}
?>
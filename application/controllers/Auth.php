<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Auth Controller
class Auth extends CI_Controller 
{
  //
  public function __construct()
  {
    parent::__construct();
  }

  //
  public function login()
  {
    $data = [];
    $data['content'] = $this->load->view('auth/login', $data, true);
    return $this->load->view('auth/_layouts/main', $data);
  }

  //
  public function register()
  {
    die("register");
  }

}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Dashboard Controller
class Dashboard extends CI_Controller
{
  //
  public function __construct()
  {
    parent::__construct();

    //
    $user = $this->session->userdata('user');
    if ( ! $user ) {
      return redirect( base_url('/login') );
    }

    //
    if ( ! (bool) $user->is_verified ) {
      return redirect( base_url('/verifyAccount') );
    }

  }

  //
  public function index()
  {
    die("welcome to your database");
  }

}

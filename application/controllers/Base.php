<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Base Controller
class Base extends CI_Controller 
{
  //
  public function __construct()
  {
    parent::__construct();

  }

  //
  public function index()
  {
    die("i am starting point");
  }

  //
  public function about_us()
  {
    die("About Us");
  }

  //
  public function developer()
  {
    die("supercool77");
  }

  //
  public function login()
  {
    return redirect( base_url('/auth/login') );
  }

  //
  public function register()
  {
    return redirect( base_url('/auth/register') );
  }

}
<?php class MY_Controller extends CI_Controller
  {
    public function __construct()
    {
     parent::__construct();
    }

    public function is_logged_in()
    {
     $user = $this->session->userdata($UserData['admin']);
     return isset($user);
    }
  }
<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Base Controller
class Base extends CI_Controller 
{
  //
  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->helper('string');
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
    die("supercool27");
  }

  //
  public function login()
  {
    if($this->input->post())
    {
      $this->form_validation->set_rules('email_id', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'required');
      if($this->form_validation->run()==TRUE)
      {
        $email= $this->input->post('email_id');
        $password = $this->input->post('password');
        $userID = $this->user_model->loginValidation($email,$password);
          if($userID->num_rows() > 0)
          {
            $UserData = array(
            'username'  => 'Admin',
            'email'     => $email,
            'logged_in' => TRUE
            );
            $this->session->set_userdata($UserData);
          }
          else
          {
            $this->session->set_flashdata('error', 'Authentication failed.');
            return redirect(base_url('/auth/login'));
          }
      }
      else
      {
        $this->session->set_flashdata('error', 'Enter Valid email and password');
        return redirect(base_url('/auth/login'));
      } 
    }
    else{
       return redirect(base_url('/auth/login'));
    }
  }
  
  //
  public function register()
  {
    return redirect(base_url('/auth/register') );
  }

  //
  public function create()
  {
    if($this->input->post())
		{
      $this->form_validation->set_rules('first_name', 'First Name', 'required|max_length[40]'); 
      $this->form_validation->set_rules('last_name', 'Last Name', 'required|max_length[40]');
      $this->form_validation->set_rules('email','Email ID','required');
      $this->form_validation->set_rules('password','Password','required');
      $this->form_validation->set_rules('cnfpassword','Password Confirmation','required','matches[password]');
      //$otp = random_string('numeric', 6);
      
      if($this->form_validation->run() == true)
      {
        $userData = array( 
          'first_name' => strip_tags($this->input->post('first_name')),
          'last_name'=> strip_tags($this->input->post('last_name')),
          'password'=> md5($this->input->post('password')),
          'email'=> strip_tags($this->input->post('email')),
          //'otp'=> $otp
          );
      } 
      else
      {
        return redirect(base_url('/auth/register') );

      }
    }
    
    $data['user_id'] = $this->user_model->insert($userData);
    $data['title'] = 'User Registered Successfully';
    $data['content']= $this->load->view('/auth/success',$data,true);
    return $this->load->view('auth/_layouts/main',$data);
  }
}



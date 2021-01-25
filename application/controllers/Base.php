<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Base Controller
class Base extends CI_Controller
{
  //
  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
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
    $data = [];

    //
    if( $this->input->post() ) {

      //
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'required');

      //
      if( $this->form_validation->run()==TRUE ) {

        // XSS cleaning


        //
        $user = $this->db->get_where('users', [
          'email' => $this->input->post('email')
        ])->row();

        //
        if ( !$user ) {
          $data['errors'] = [
            "No such user exists, please retry."
          ];
        }

        //
        if( password_verify($this->input->post('password'), $user->password) ) {

          //
          $this->session->set_userdata([
            'user' => $user
          ]);

          //
          return redirect( base_url('/dashboard') );

        } else {
          $data['errors'] = [
            "Please provide correct credentials."
          ];
        }

      }

    }

    //
    $data['content'] = $this->load->view('auth/login', $data, true);
    return $this->load->view('auth/_layouts/main', $data);
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

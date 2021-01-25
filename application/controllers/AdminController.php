<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller 
{
    public function __construct()
    {     
		  parent::__construct();
		  $this->load->model('comment_model');
		  $this->load->model('user_model');
		  $this->load->helper('form');
		  $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->helper('string');
      //Apply auth code for accessing controller. 

    }

    // public function index()
    // {
    // 	$data['content']= $this->load->view('Admin/pages/login',$data,true);
    //     return $this->load->view('layout_admin',$data);
    // }

    public function dashboard()
    {

      $data['title'] = "Create blog page";
			$data['content']= $this->load->view('Admin/pages/dashboard',$data,true);
  		return $this->load->view('Admin/layout_admin',$data);

    }

    public function login()
    {
        $data['title'] = "create blog page";
        $data['content']= $this->load->view('Admin/auth/login',$data,true);
        return $this->load->view('Admin/layout_admin',$data);
    }

	public function login_check()
	{
		$this->form_validation->set_rules('email_id', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if(!$this->form_validation->run()==TRUE)
		{
			$this->session->set_flashdata('error', 'Enter Valid email and password');
		  //$this->login();
    }
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
          $this->login();
        }
	}

    public function otp_generator()
    {
      

    }

    public function opt_view()
    {
      $otp = random_string('alnum', 6);
    }

   

    public function forgot_password()
    {
        // OTP Fucntionality database me save  
        $data['title']= "create blog page";
        $data['content']= $this->load->view('Admin/auth/forgot',$data,true);
        return $this->load->view('Admin/layout_admin',$data);
    }

    public function register()
    {
        $data['title']='Creae blog page';
        $data['content']= $this->load->view('Admin/auth/register',$data,true);
        return $this->load->view('Admin/layout_admin',$data);
    }
  
    public function create()
    {
      if($this->input->post())
      {
        // parsing and common fucntion
        $this->form_validation->set_rules('first_name', 'First Name', 'required|max_length[40]'); 
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|max_length[40]');
        $this->form_validation->set_rules('email','Email ID','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('cnfpassword','Password Confirmation','required','matches[password]');
        $otp = random_string('numeric', 6);
        $userData = array( 
        'first_name' => strip_tags($this->input->post('first_name')),
        'last_name'=> strip_tags($this->input->post('last_name')),
        'password'=> md5($this->input->post('password')),
        'email'=> strip_tags($this->input->post('email')),
        'otp'=> $otp
        );

        if(!$this->form_validation->run() == true)
        {
          $this->register();
        } 
      }
      
      $data['user_id'] = $this->user_model->insert($userData);
      $data['uuid']=$this->user_model->get_uuid_by_user_id($data['user_id']);
      $this->session->set_userdata('uuid',$data['uuid']);
      $data['otp'] = $this->user_model->otp_insert($otp,$data);
      $data['title'] = 'OTP verification';
      $data['content']= $this->load->view('Admin/Auth/otp_view',$data,true);
      return $this->load->view('Admin/layout_login',$data);



  }

  public function otp_verify()
  {

    if($this->input->post())
    {
      
      $this->form_validation->set_rules('otp', 'OTP', 'required|max_length[6]');
      $otp_attempts=0;
      $otp_error=0;
      
      $this->session->set_userdata('otp_counter', $otp_attempts);
      //Fetch OTP from Database 

      if($this->form_validation->run() == TRUE)
      {
    
        $data['otp'] = $this->input->post('otp');
        $UserID = $this->input->post('user_id');
        $otp = $this->user_model->otp_verify($data);
        //Increase Counter
        $this->session->set_userdata('otp_counter', $otp_attempts);

        if($otp->num_rows())
        {
          $otp_attempts++;
          $this->session->set_userdata('otp_counter', $otp_attempts);
          $data['title']= "User Registerd";
          $data['content']=$this->load->view('Admin/auth/success',$data,true);
          return $this->load->view('Admin/layout_admin',$data);
        }
        else
        {
          $data['otp'] = $this->input->post('otp');
          $data['user_id'] =  $this->input->post('user_id');
          $this->session->set_userdata('otp_error',$otp_error);
          $otp_error++;
          $this->session->set_userdata('otp_counter', $otp_attempts);
          $otp_attempts++;
          $data['title'] = 'OTP left 2 times ';
          $data['content']= $this->load->view('Admin/Auth/otp_view',$data,true);
          return $this->load->view('Admin/layout_login',$data);
        }
      }
      else
      {
       echo "Validation is false";
       die;
      }
        if($otp_error==1)
        {
          $this->session->set_userdata('otp_error',$otp_error);
          $otp_error++;
          $this->session->set_userdata('otp_counter', $otp_attempts);
          $otp_attempts++;
          $data['title'] = 'OTP left 2 times ';
          $data['content']= $this->load->view('Admin/Auth/otp_view',$data,true);
          return $this->load->view('Admin/layout_login',$data);
        }
        // if($otp_error==2)
        // {
        //   $this->session->set_userdata('otp_error',$otp_error);
        //   $otp_error++;
        //   $this->session->set_userdata('otp_counter', $otp_attempts);
        //   $otp_attempts++;
        //   $data['title'] = 'OTP left 1 times ';
        //   $data['content']= $this->load->view('Admin/Auth/otp_view',$data,true);
        //   return $this->load->view('Admin/layout_login',$data);
        // }
        // if($otp_error==3)
        // {
        //   // Re registered yourself.
        //   $this->session->set_userdata('otp_error',$otp_error);
        //   $otp_error++;
        //   $this->session->set_userdata('otp_counter', $otp_attempts);
        //   $otp_attempts++;
        //   $data['otp'] = $this->input->post('otp');
        //   $data['title'] = 'OTP left 1 times ';
        //   $data['content']= $this->load->view('Admin/Auth/otp_view',$data,true);
        //   return $this->load->view('Admin/layout_login',$data);
        // }

    }
    else
    {
      echo "you are in else part";
      die;
    }
    


  }


	public function logout()
	{
		$this->session->sess_destroy();
		redirect("login");
  }
  
function otp_verify2()
{

    $otp_attempts++;
    //OTP registeration 2nd time

}

function otp_verify3()
{

    $otp_attempts++;
    // user registerdd finished.

}




}

?>
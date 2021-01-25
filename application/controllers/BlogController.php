<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BlogController extends CI_Controller {

	 public function __construct()
	 {
	  parent::__construct();
	  $this->load->model('blog_model');
	  $this->load->helper('form');
	  $this->load->library('form_validation');
	 }

	public function index()
	{
		$data['title'] = "create blog page";
		$data['blogpost']=$this->blog_model->get_posts();
		$this->load->library('pagination');
		$config['base_url'] =  base_url()."blogdatatable";
		$config['total_rows'] = $this->blog_model->get_totalrow(); 
		$config['per_page'] = 5;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 1;
		$data['blogpost_post_page_limit'] = $this->blog_model->get_posts_page($config["per_page"], $page);
		$data['link']= $this->pagination->create_links();
		$data['blogpost']=$this->blog_model->get_posts();
		$data['content']= $this->load->view('pages/blogviewonly',$data,true);
		return $this->load->view('layout_master',$data);
	}

	public function blogview()
	{
			$data['blogpost']=$this->blog_model->get_posts();
			$data['title'] = "See our blog";
		    $data['content']= $this->load->view('pages/blogview',$data,true);
		    return $this->load->view('layout_master',$data);
	}

	public function validate_image() {
		
				$check = TRUE;
				if ((!isset($_FILES['profile_image'])) || $_FILES['profile_image']['size'] == 0) {
					$this->form_validation->set_message('validate_image', 'The {field} field is required');
					$check = FALSE;
				}
				else if (isset($_FILES['profile_image']) && $_FILES['profile_image']['size'] != 0) {
					$allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
					$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
					$extension = pathinfo($_FILES["profile_image"]["name"], PATHINFO_EXTENSION);
					$detectedType = exif_imagetype($_FILES['profile_image']['tmp_name']);
					$type = $_FILES['profile_image']['type'];
					if (!in_array($detectedType, $allowedTypes)) {
						$this->form_validation->set_message('validate_image', 'Invalid Image Content!');
						$check = FALSE;
					}
					if(filesize($_FILES['profile_image']['tmp_name']) > 2000000) {
						$this->form_validation->set_message('validate_image', 'The Image file size shoud not exceed 20MB!');
						$check = FALSE;
					}
					if(!in_array($extension, $allowedExts)) {
						$this->form_validation->set_message('validate_image', "Invalid file extension {$extension}");
						$check = FALSE;
					}
				}
				return $check;
	}

	public function create()
	{
		$data['title'] = "create blog page";
		$data['content']= $this->load->view('pages/create',$data,true);
		$this->load->view('layout_master',$data);

        // displaying all the record using pagination on the same post page. 
    }
	  
	public function store()
	{
    	if($this->input->post())
		{
			$new_name = time().$_FILES["profile_image"]['name'];
			$config['file_name'] = $new_name;
			$config['upload_path'] = './images/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 2000;
			$config['max_width'] = 1500;
			$config['max_height'] = 1500;
			// image uploading code
			$this->load->library('upload', $config); // Note: Always define $config

			if (!$this->upload->do_upload('profile_image')) 
			{
				$error = array('error' => $this->upload->display_errors());
				
			} 
			else 
			{
				$data = array('image_metadata' => $this->upload->data());

			}
		
			$this->form_validation->set_rules('blog_title', 'FirstName', 'required'); 
			$this->form_validation->set_rules('blogtextarea', 'blogtextarea', 'required|max_length[400]'); 

			if (empty($_FILES['userfile']['name']))
			{
				// do nothing
			}
			else
			{
				$this->form_validation->set_rules('profile_image', 'Document', 'callback_validate_image');
			}

			$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('blog_title'))));

       		 $userData = array( 
				'title' => strip_tags($this->input->post('blog_title')),
				'slug'=> $slug, 
				'description'=> $this->input->post('blogtextarea'), 
				'imagepath'=> $config['file_name'],
				'status'=>$this->input->post('status'),
		     ); 

			if(!$this->form_validation->run() == true)
			{
				$this->create();
			} 
			else
			{
            	$insert = $this->blog_model->insert($userData);
				redirect('listview');
			}
		
		}
    
	}

	public function blogviewonly()
	{
		$data['blogpost']=$this->blog_model->get_posts();
		$data['title'] = "See our blog";
		$data['content']= $this->load->view('pages/blogviewonly',$data,true);
		return $this->load->view('layout_master',$data);

		//$this->load->view('blogviewonly');			
	}

	public function datatableonly()
	{
		$this->load->library('pagination');
		$config['base_url'] =  base_url()."blogdatatable";
		$config['total_rows'] = $this->blog_model->get_totalrow(); 
		$config['per_page'] = 5;
		$this->pagination->initialize($config);

		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 1;
		$data['blogpost_post_page_limit'] = $this->blog_model->get_posts_page($config["per_page"], $page);
		$data['link']= $this->pagination->create_links();
		$data['blogpost']=$this->blog_model->get_posts();
		$data['title'] = "See our blog";
		$data['content']= $this->load->view('pages/blogviewonly',$data,true);
		return $this->load->view('layout_master',$data);

	}
	public function cdndatatable()
	{
		$data['blogpost']=$this->blog_model->get_all_posts();
		$data['title'] = "See our blog";
		$data['content']= $this->load->view('pages/cdndatatable',$data,true);
		return $this->load->view('layout_master',$data);
	}

	public function delete()
	{
			$id = $this->input->post('del_id');
			$this->blog_model->delete($id);
			$this->index();
	}

	public function edit($id)
	{
		$data['title'] = "Its Blog";
		$data['blogpost'] = $this->blog_model->edit($id);
		$data['content']= $this->load->view('pages/blogeditonly',$data,true);
		return $this->load->view('layout_master',$data);
	}

	public function doedit($id)
	{
		if($this->input->post())
		{ 
			$config['file_name']=$_FILES["profile_image"]['name'];
			$config['upload_path'] = './images/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 2000;
			$config['max_width'] = 1500;
			$config['max_height'] = 1500;
			// image uploading code
			$this->load->library('upload', $config); // note: always define $config
			
			if (!$this->upload->do_upload('profile_image')) 
			{
				$error = array('error' => $this->upload->display_errors());
			} 

			$this->form_validation->set_rules('blog_title', 'FirstName', 'required'); 
			$this->form_validation->set_rules('blogtextarea', 'blogtextarea', 'required|max_length[400]'); 
			if(empty($_FILES['userfile']['name']))
			{
				$this->form_validation->set_rules('profile_image', 'Document', 'callback_validate_image');
					
			}

			$userData['title'] = strip_tags($this->input->post('blog_title'));
			$userData['description'] = $this->input->post('blogtextarea');
			$userData['status'] = $this->input->post('status');

			if(isset($config['file_name']))
				{
				  $userData['imagepath'] = $config['file_name'];
				}     

			if($this->form_validation->run() == true)
			{
			
				$update = $this->blog_model->updated($userData,$id);
				echo $this->db->last_query();
			} 
			else
			{
				$this->index();
			}
		}
		

	}

	public function viewdatatable()
	{
		$data['title'] = "View blogs";
		$data['content']= $this->load->view('pages/view',$data,true);
		return $this->load->view('layout_master',$data);
	}

	public function demo_toggle()
	{
		$this->load->view('pages/demo_toggle');
	}

	public function bloghome()
	{
		$data['blogpost']=$this->blog_model->get_posts();
		$data['title'] = "See our Blog";
		$data['content']= $this->load->view('pages/bloghome',$data,true);
		return $this->load->view('layout_master',$data);
	}
	
	public function showComment()
	{

		$this->load->model('comment_model');
		$blog_id = $this->input->post('comment_id');
		$data['comments']=$this->comment_model->get_comment_by_blog_id($blog_id);
		$data['blogsdata']=$this->blog_model->get_post_by_id($blog_id);
		$data['blog_id']=$blog_id;
		$data['title'] = "See our Blog";
		$data['content'] = $this->load->view('pages/showComment',$data,true);
		return $this->load->view('layout_master',$data);

	}

/*	public function generate_url_slug($title,$table,$field='url_slug',$key=NULL,$value=NULL)
	{

		$t =& get_instance();
		$slug = url_titile($string);
		$slug = strtolower($slug);
		$i = 0;
		$params = array();
		$params[$field]=$slug;
		if($key)$params["$key!="]= $value;
		while($t->db->where($params)->get($table)->num_rows())
		{
			if(!preg_match('/-{1}[0-9]+$/'),$slug))
			   $slug.='-'. ++$i;
			else
			   $slug = preg_replace('/[0-9]+$', ++$i, $slug);
			   $params[$field] = $slug;

		}

		return $slug;

	}
*/



}



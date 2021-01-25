<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class CommentController extends CI_Controller 
{
    public function __construct()
    {
          parent::__construct();
          $this->load->model('comment_model');
          $this->load->model('blog_model');
          $this->load->helper('form');
          $this->load->library('form_validation');
    }

    public function insert()
    {
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('comment_text', 'comment_form','required|max_length[400]');
            $comment_text= $this->input->post('comment_text');
            $blog_id= $this->input->post('blog_id');
            $data = array('comment'=>$comment_text);
            if($this->form_validation->run()==true)
            {
                $this->comment_model->insert($blog_id,$data); 
            }
        }
    }
    
    public function show_comment()
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
     
}

?>
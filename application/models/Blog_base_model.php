<?php 
class Blog_base_model extends Base_model 
{ 
  protected $table = '';
  

 public function insert($userData) 
 { 
        $this->db->insert('users', $userData);
} 

function get_posts($number = 10, $start = 0)
{
    $this->db->select();
    $this->db->from('users');
    $this->db->limit($number, $start);
    $query = $this->db->get();
    return $query->result_array();
}

function get_all_posts()
{
    $this->db->select('*');
    $this->db->from('users');
    $query = $this->db->get();
    return $query->result_array();
}
    
function get_post_by_id($id)
{
return $this->db->get_where('users', array('id' => $id))
            ->row();

// for data accessing.   $blogsdata->imagepath;              
}

function get_totalrow()
{
return $this->db->count_all('users');
}

function get_posts_page($number = 5,$start = 0)
{

$this->db->select();
$this->db->from('users');
$this->db->limit($number, $start);
$query = $this->db->get();
return $query->result_array();
}

function edit($id)
{
return $this->db->get_where('users', array('id' => $id))
        ->row();

}

function updated($userdata,$id)
{
$this->db->where('id', $id);
$this->db->update('users', $userdata);
}

function delete($id)
{
$this->db->where('id', $id);
$this->db->delete('users');
}

function get_all_comment($post_id)
{
$this->db->select('*');
$this->db->from('users');
$this->db->join('comments', 'blog.id = comments.blog_id', 'inner');
$this->db->where('blog_id',$post_id);
$query = $this->db->get();
return $query->result_array();

}
}
?>
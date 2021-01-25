<?php 
class Comment_model extends CI_Model 
{ 
        function get_comment_by_blog_id($blog_id)
        {
            $this->db->select('*');
            $this->db->from('comments');
            $this->db->where('blog_id',$blog_id);
            $query = $this->db->get();
            return $query->result_array();
        }

        function insert($id,$data)
        {
            $blog_id = $this->uri->segment(2, 0);
		    if($blog_id==0){ echo "quri string is not passed"; }
            else
            {
                $this->db->insert('comments',$data);
            }
        }
}
?>
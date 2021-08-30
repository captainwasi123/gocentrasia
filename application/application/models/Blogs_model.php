<?php

class Blogs_model extends CI_Model{

    public function getAllBlogs()
    {
        $query = $this->db->query('SELECT blog_tags.*, blogs.id AS blogId, blogs.*, GROUP_CONCAT(tag.tag_name) as tagName FROM blog_tags JOIN blogs ON blog_tags.blog_id = blogs.id JOIN tag ON blog_tags.tag_id = tag.id GROUP BY blogId');
        return $query->result();
    }

		public function getrandomblogslimit($limit)
		{
			$q = $this->db->select("*")
      ->from("blogs")
			->order_by('rand()')
             ->limit($limit)
             ->get();
    	return $q->result();
		}


    public function bloglist($limit,$offset)
    {
      $q = $this->db->select("*")
      ->from("blogs")
             ->limit($limit,$offset)
             ->get();
    return $q->result();
    }

    public function num_rows()
  {
    
        $query = $this->db->query('SELECT blog_tags.*, blogs.id AS blogId, blogs.*, tag.id AS tagId, tag.tag_name AS tagName FROM blog_tags
        JOIN blogs ON blog_tags.blog_id = blogs.id
        JOIN tag ON blog_tags.tag_id = tag.id');
        return $query->num_rows();
  }

    public function getAllBlogsWhere($id)
    {
        $query = $this->db->query('SELECT blog_tags.*, blogs.id AS blogId, blogs.*, tag.id AS tagId, tag.tag_name AS tagName FROM blog_tags
        JOIN blogs ON blog_tags.blog_id = blogs.id
        JOIN tag ON blog_tags.tag_id = tag.id 
        WHERE blogs.id = '.$id.' GROUP BY blogId');
        return $query->result();
    }

    function addResults($data)
{
    $res = $this->db->get_where('tag ', array('tag_name' => $data));
    $inDatabase = (bool)$res->num_rows();
    //return $res->result();

    if (!$inDatabase)
    {
        echo 'New Record ' . $data->tag;
        // $this->db->set('date', 'NOW()', FALSE); 
        // $this->db->insert('articles', $data);
    }
}


function role_exists($table,$field,$value)
{
    $this->db->where($field,$value);
    $query = $this->db->get($table);
    if (!empty($query->result_array())){
        return 1;
    }
    else{
        return 0;
    }
}

public function check_exist($string,$token){
    if(!empty($string)){
      $token=explode("-",$token);
      $column=$token[1];
      //$string = implode(",",$string);
      //print_r($string); die;
      if($token[0]=="add")
      {
        //    $where = array(
        //         $column => $string
        //       );
        $where = $string;
      }
      //return $where; die;
    //   exit();
      if($token[0]=="edit")
      {
           $where = array(
                $column => $string,
                'id!=' => $token[2]
              );
      }
      
      
      $this->db->select('id');
      $this->db->from('tag');
        //$query =$this->db->get_where('tag', array('tag_name' => $where[]));
      $this->db->where_in("tag_name",$where);
      //$num_results = $this->db->count_all_results();
      $query = $this->db->get();
      return $query->row();
      ;

    //   if($num_results>0){
    //     //$this->form_validation->set_message('check_exist', 'The %s value is already exists.');
    //     return 0;
    //   }else{
    //     return 1;
    //   }
    }
  }



}

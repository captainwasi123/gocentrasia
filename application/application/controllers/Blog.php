<?php

class Blog extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Blogs_model');
        if ($this->session->userdata('user_role') != 'admin') { 
            return redirect(base_url("admin"));
        }
    }

    public function all_blog()
    {
        // echo "<pre>";
        // print_r($this->Blogs_model->getAllBlogs()); die;
        $data = array(
            "title" => "Blogs",
            "blogs" => $this->Blogs_model->getAllBlogs(),
            //"tag" => $this->Custom_model->get_alltable("tag")
        );
        $this->load->view('alL_blog',$data);
    }

    public function add_blog()
    {
        $data = array(
            "title" => "Blogs",
            "form_title" => "Add Blog",
            'tags' => $this->Constant_model->get_alltable('tag'),
        );
        $this->load->view('add_blog', $data);   
    }

    public function save_blog()
    { 
        if (!empty($_FILES['img']['name'])) {
    		$img = img_upload($_FILES, 'assets/img/blog_img/');
    	}
        $blog = array(
            "title" => $_POST['title'],
            "video_link" => $_POST['link'],
            "description" => $_POST['description'],
            "img" => $img
        );
        $blog_id = $this->Constant_model->insertDataReturnLastId('blogs',$blog);
        if (isset($_POST['tags'])) {
            foreach ($_POST['tags'] as $value) {
                $check = $this->Constant_model->getOneCol('tag','id',$value);
                if (empty($check)) {
                    $tags =  array(
                        "tag_name" => $value,
                    );   
                    $tag_id = $this->Constant_model->insertDataReturnLastId('tag',$tags);
                    $blog_tags = array(
                        'blog_id' => $blog_id,
                        'tag_id' => $tag_id
                    );
                    $this->Constant_model->insert_alltable('blog_tags',$blog_tags);
                }else{
                    $blog_tags = array(
                        'blog_id' => $blog_id,
                        'tag_id' => $value
                    );
                    $this->Constant_model->insert_alltable('blog_tags',$blog_tags);
                }
            }
            
        }
        $this->session->set_flashdata('alert_msg', array('success', "Successfully added Blog"));
        return redirect(base_url().'blog/all_blog');
    }

    public function edit_blog($id)
    {   
        $id = hashids_decrypt($id);
        $data = array(
    		'title' => 'All Blog',
			'form_title' => 'Edit Blog',
			'is_edit' => true,
			'blog' => $this->Blogs_model->getAllBlogsWhere($id),
            'tags' => $this->Constant_model->get_alltable('tag'),
            'blog_tags' => $this->Constant_model->getDataOneColumn('blog_tags','blog_id', $id),
    	);
        $this->load->view('edit_blog', $data);
    }

    public function update_blog(){
        //print_r($_POST["tag_id"]) . die;
        $id = $_POST["id"];
        $this->Constant_model->custom_deleteData('blog_tags','blog_id',$id);
        if (!empty($_FILES['img']['name'])) {
    		$img = img_upload($_FILES, 'assets/img/blog_img/');
            unlink(FCPATH.'assets/img/blog_img/'.$_FILES["img"]['name']);
    	}
        $blog = array(
            "title" => $_POST['title'],
            "video_link" => $_POST['link'],
            "description" => $_POST['description'],
            "img" => $img
        );
        $this->Constant_model->updateData('blogs', $blog, $id);
        if (isset($_POST['tags'])) {
            foreach ($_POST['tags'] as $value) {
                $check = $this->Constant_model->getOneCol('tag','id',$value);
                if (empty($check)) {
                    $tags =  array(
                        "tag_name" => $value,
                    );   
                    $tag_id = $this->Constant_model->insertDataReturnLastId('tag',$tags);
                    $blog_tags = array(
                        'blog_id' => $id,
                        'tag_id' => $tag_id
                    );
                    $this->Constant_model->insert_alltable('blog_tags',$blog_tags);
                }else{
                    $blog_tags = array(
                        'blog_id' => $id,
                        'tag_id' => $value
                    );
                    $this->Constant_model->insert_alltable('blog_tags',$blog_tags);
                }
            }
            
        }
        $this->session->set_flashdata('alert_msg', array('success', "Successfully Edit Blog"));
        return redirect(base_url().'blog/all_blog');
    }

	public function delete_blog(){

		//print_r($_POST);
		$id = $_POST['act_id'];
		$img = $_POST['act_img'];
		$this->Constant_model->deleteData('blogs', $id);
		unlink(FCPATH."assets/img/blog_img/".$img);
		$this->Constant_model->custom_deleteData('blog_tags','blog_id',$id);
		$this->session->set_flashdata('alert_msg', array('success', "Successfully Deleted Blog"));
		return redirect(base_url().'Blog/all_blog');
	}

}

<?php

class Pages extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_role') != 'admin') { 
            return redirect(base_url("admin"));
        }
    }

    public function home()
    {
        $data =array(
            'title' => 'Home Page',
            'data' => $this->Constant_model->getOneCol('home_page','id',1),
        );

        $this->load->view('home_page',$data);
    }

    public function save_home_page()
    {  //echo '<pre>'; print_r($_POST);
        $this->Constant_model->updateData('home_page', $_POST, '1');
        $this->session->set_flashdata('alert_msg', array('success', "Successfully Update Home page"));
        return redirect(base_url().'Pages/home');
    }


	public function client_reviews()
	{
		$data = array(
			'title' => 'Client Reviews',
			'form_title' => 'Add Client Reviews',
			'review' => $this->Constant_model->get_alltable('client_reviews'),
		);
		$this->load->view('client_reviews', $data);
	}

	public function save_client_reviews(){
		if ($_FILES['img']['name'] != '') {
    		$img = img_upload($_FILES, 'assets/img/client_img/');
    	}
		$data = array(
			'name' => $_POST['name'],
			'img' => $img,
			'review' => $_POST['review']
		);
		$this->Constant_model->insert_alltable('client_reviews',$data);
		$this->session->set_flashdata('alert_msg', array('success', "Successfully added Client Review"));
        return redirect(base_url().'Pages/client_reviews');
	}

	public function delete_client_reviews(){
		$id = $_POST['act_id'];
		$img = $_POST['act_img'];
		$this->Constant_model->deleteData('client_reviews', $id);
		unlink(FCPATH."assets/img/client_img/".$img);
		$this->session->set_flashdata('alert_msg', array('success', "Successfully Deleted Client Review"));
		return redirect(base_url().'Pages/client_reviews');
	}

	public function our_partners(){
		$data = array(
			'title' => 'Our Partners',
			'form_title' => 'Add Our Partners',
			'partners' => $this->Constant_model->get_alltable('our_partners'),
		);
		$this->load->view("our_partners",$data);
	}

	public function save_our_partners(){
		if ($_FILES['img']['name'] != '') {
    		$img = img_upload($_FILES, 'assets/img/partners_logo/');
    	}
		$data = array(
			'img' => $img
		);
		$this->Constant_model->insert_alltable('our_partners',$data);
		$this->session->set_flashdata('alert_msg', array('success', "Successfully added Partners Logo"));
        return redirect(base_url().'Pages/our_partners');
	}

	public function delete_our_partners(){
		$id = $_POST['act_id'];
		$img = $_POST['act_img'];
		$this->Constant_model->deleteData('our_partners', $id);
		unlink(FCPATH."assets/img/partners_logo/".$img);
		$this->session->set_flashdata('alert_msg', array('success', "Successfully Deleted Partners Logo"));
		return redirect(base_url().'Pages/our_partners');
	}

	public function slider()
	{
		$data = array(
			'title' => 'Slider', 
			'form_title' => 'Add Slider',
			'slider_data' => $this->Constant_model->get_alltable_desc('slider'),
		);
		$this->load->view('slider',$data);
	}
	public function save_slider()
	{
		
		$data = array(
			'title' => $_POST['title'],
			'tag_line' => $_POST['tag_line'],
		);
		
		if (empty($_POST['slider_id'])) {
			$img = img_upload($_FILES, 'assets/img/slider/');
    		$data['img'] = 'assets/img/slider/'.$img;
		 	$this->Constant_model->insert_alltable('slider',$data);
		    $this->session->set_flashdata('alert_msg', array('success', "Successfully added Slider"));
		 }else{
		 	if ($_FILES['img']['name'] != '') {
    			$img = img_upload($_FILES, 'assets/img/slider/');
    			$data['img'] = 'assets/img/slider/'.$img;
    			$datas = $this->Constant_model->getOneCol('slider','id',$_POST['slider_id']);
		        unlink(FCPATH.$datas->img);
    		}
		 	$this->Constant_model->updateData('slider', $data, $_POST['slider_id']);
		    $this->session->set_flashdata('alert_msg', array('success', "Successfully Update Slider"));
		 } 
		
        return redirect(base_url().'pages/slider');
	}
	public function delete_silder($id)
	{
		$id = hashids_decrypt($id);
		$data = $this->Constant_model->getOneCol('slider','id',$id);
		unlink(FCPATH.$data->img);
		$this->Constant_model->deleteData('slider', $id);
		$this->session->set_flashdata('alert_msg', array('success', "Successfully Deleted Slider"));
		return redirect(base_url().'Pages/slider');
	}
	public function edit_silder($id)
	{
		$id = hashids_decrypt($id);
		$data = array(
			'title' => 'Slider', 
			'form_title' => 'Edit Slider',
			'slider_data' => $this->Constant_model->get_alltable_desc('slider'),
			'slider' => $this->Constant_model->getOneCol('slider','id',$id),
		);
		$this->load->view('slider',$data);
	}

	public function about_us(){
		$data = array(
			'title' => 'About US', 
			'form_title' => 'Add About US',
			'about' => $this->Constant_model->getOneCol('about_us','id',1),
		);
		$this->load->view('about_us', $data);
	}

	public function save_about_us()
	{
		//echo "<pre>"; //print_r($_FILES) . die;
		
		$data = array(
			"about_us_title" => $_POST["about_us_title"],
			"about_us_desc" => $_POST["about_us_desc"],
			"story_title" => $_POST["story_title"],
			"story_desc" => $_POST["story_desc"],
			"we_do_title" => $_POST["we_do_title"],
			"we_do_desc" => $_POST["we_do_desc"],
			"our_travelers_title" => $_POST["our_travelers_title"],
			"our_travelers_desc" => $_POST["our_travelers_desc"],
		);
		if($_FILES['cover_img']["name"] != ""){
			$data['cover_img'] = $this->Constant_model->fileUploader($_FILES['cover_img'], 'cover_img','assets/img/package_img');		
		}

		if ($_FILES['img']['name'] != '') {
    		$data['img'] = $this->Constant_model->fileUploader($_FILES['img'], 'img','assets/img/aboutus_img/');

    	}
		//print_r($data); die;
		$this->Constant_model->updateData('about_us', $data,1);
		$this->session->set_flashdata('alert_msg', array('success', "Successfully Added About US"));
		return redirect(base_url().'Pages/about_us');

	}
	public function terms_and_conditions()
	{
		$data = array(
			'title' => 'Terms And Conditions', 
			'form_title' => 'Add Terms & Conditions',
			'data' => $this->Constant_model->get_alltable_desc('terms_and_conditions'),
		);
		$this->load->view('terms_and_conditions', $data);
	}
	public function save_terms_and_conditions()
	{
		$d = array(
				'title' => $_POST['title'], 
				'description' => $_POST['description']
			);
		if (empty($_POST['id'])) {
			$this->Constant_model->insert_alltable('terms_and_conditions',$d);
			$this->session->set_flashdata('alert_msg', array('success', "Successfully Added Terms And Conditions"));
		}else{
			
			$this->Constant_model->updateData('terms_and_conditions',$d,$_POST['id']);
		    $this->session->set_flashdata('alert_msg', array('success', "Successfully Update Terms And Conditions"));
		}
		
		return redirect(base_url().'Pages/terms_and_conditions');
	}
	public function edit_terms_and_conditions($id)
	{
		$id = hashids_decrypt($id);
		$data = array(
			'title' => 'Terms And Conditions', 
			'form_title' => 'Edit Terms & Conditions',
			'form_data' => $this->Constant_model->getOneCol('terms_and_conditions','id',$id),
			'data' => $this->Constant_model->get_alltable_desc('terms_and_conditions'),
		);
		$this->load->view('terms_and_conditions', $data);
	}
}

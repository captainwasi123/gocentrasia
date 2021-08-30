<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('custom_helper');
		if ($this->session->userdata('user_role') != 'admin') { 
            return redirect(base_url("admin"));
        }
	}

	public function index()
	{
		$this->load->view('dashboard');
	}

	public function country()
	{
		$data['title']="Country";
		$data['data']=$this->Constant_model->get_alltable_desc('country');
		$this->load->view('country', $data);
		
	}

	public function add_country()
	{
		$data = array(
			'title' => 'Add Country',
			'form_title' => 'Add Country',
			'data' => $this->Constant_model->get_alltable_desc('country')
		);
		$this->load->view('add_country',$data);
	}
	public function save_country()
	{ 
		$data = array(
    		'country_name' => $_POST['country_name'],
			'tag_line' => $_POST['tag_line'],
			'latitude' => $_POST["latitude"],
			'longitude' => $_POST["longitude"],
			'description' => $_POST['description'],
			'tour' => $_POST["tour"],
			'show_on_website' => $_POST['show_on_website'],
    	);
    	if (!empty($_FILES['img']['name'])){
			if(file_exists($_FILES['img']['name'])){
				unlink($_FILES['img']['name']);
			}
			$data['country_img'] = $this->Constant_model->fileUploader($_FILES['img'],'img','assets/img/country_img/');
		}
		if (!empty($_FILES['cover_img']['name'])) {
			if(file_exists($_FILES['cover_img']['name'])){
				unlink($_FILES['cover_img']['name']);
			}
			$data['cover_img'] = $this->Constant_model->fileUploader($_FILES['cover_img'],'cover_img','assets/img/country_img/');
		}
		// print_r($data) . die;
    	$c_id = $this->Constant_model->insertDataReturnLastId('country',$data);
		if (!empty($_FILES['country_gallery']['name'])) {
			$filesCount = count($_FILES['country_gallery']['name']); 
	            for($i = 0; $i < $filesCount; $i++){
	                $filename = $_FILES['file']['name'] = $_FILES['country_gallery']['name'][$i];
	                $_FILES['file']['type']     = $_FILES['country_gallery']['type'][$i];
	                $_FILES['file']['tmp_name'] = $_FILES['country_gallery']['tmp_name'][$i];
	                $_FILES['file']['error']     = $_FILES['country_gallery']['error'][$i];
	                $_FILES['file']['size']     = $_FILES['country_gallery']['size'][$i];
	                
	                // File upload configuration
	                $path = 'assets/img/country_img' . '/' . date('Y') . '/' . date('m').'/';
				    if (!is_dir($path)) {
			            mkdir($path, 0777, TRUE);
			        }elseif(file_exists($filename)){
						unlink($filename);
					}
	                $uploadPath = $path;
	                $config['upload_path'] = $uploadPath;
	                $config['allowed_types'] = 'jpg|jpeg|png|gif';
	                
	                // Load and initialize upload library
	                $this->load->library('upload', $config);
	                $this->upload->initialize($config);
	                
	                // Upload file to server
	                if($this->upload->do_upload('file')){
	                    // Uploaded file data
	                    $fileData = $this->upload->data();
	                    $uploadData[$i]['file_name'] = $path.$fileData['file_name'];
	                }
	            }  
	            foreach ($uploadData as $value) {
	             	$package_images = array(
	             		'country_id' => $c_id,
	             		'img' => $value['file_name'],
	             	);
	             	$this->Constant_model->insert_alltable('country_images',$package_images);
	            }     
       	}
    	$this->session->set_flashdata('alert_msg', array('success', "Successfully added country"));
        return redirect(base_url().'dashboard/country');
	}

	public function edit_counrty($id){
		$c_id = hashids_decrypt($id);
		$data = array(
    		'title' => 'Edit Country',
			'form_title' => 'Edit Country',
			'country' => $this->Constant_model->get_edit_data('country',$c_id),
			'country_images' => $this->Constant_model->getDataOneColumn('country_images','country_id',$c_id),
    	);
		$this->load->view('edit_country',$data);
	}

	public function update_country(){
		// echo "<pre>";
		// print_r($_POST); die; 
		if(isset($_POST['old_img_name'])){
			foreach($_POST['old_img_name'] as $key => $val){
				unlink(FCPATH.$val);
				$this->Constant_model->deleteData('country_images', $_POST['img_id'][$key]);
			}
		}
		$id = $_POST['c_id'];
		
		
		$data = array(
			'country_name' => $_POST['country_name'],
			'tag_line' => $_POST['tag_line'],
			'tour' => $_POST["tour"],
			'latitude' => $_POST["latitude"],
			'longitude' => $_POST["longitude"],
			'description' => $_POST['description'],
			'show_on_website' => $_POST['show_on_website'],
		);
		if (!empty($_FILES['img']['name'])){
			if(file_exists($_FILES['img']['name'])){
				unlink($_FILES['img']['name']);
			}
			$data['country_img'] = $this->Constant_model->fileUploader($_FILES['img'],'img','assets/img/country_img/');
		}
		if (!empty($_FILES['cover_img']['name'])) {
			if(file_exists($_FILES['cover_img']['name'])){
				unlink($_FILES['cover_img']['name']);
			}
			$data['cover_img'] = $this->Constant_model->fileUploader($_FILES['cover_img'],'cover_img','assets/img/country_img/');
		}
		$this->Constant_model->updateData('country', $data, $id);
	
		if(empty($_FILES['country_gallery']['name'])){	   
			foreach ($_POST['old_country_gallery'] as $value) {
				$country_images = array(
					'country_id' => $id,
					'img' => $value
				);
				$this->Constant_model->insert_alltable('country_images',$country_images);
			}  
			//print_r($country_images); die;
		}elseif ($_FILES['country_gallery']['name'] != " ") {
			$filesCount = count($_FILES['country_gallery']['name']); 
	            for($i = 0; $i < $filesCount; $i++){
	                $filename = $_FILES['file']['name']     = $_FILES['country_gallery']['name'][$i];
	                $_FILES['file']['type']     = $_FILES['country_gallery']['type'][$i];
	                $_FILES['file']['tmp_name'] = $_FILES['country_gallery']['tmp_name'][$i];
	                $_FILES['file']['error']     = $_FILES['country_gallery']['error'][$i];
	                $_FILES['file']['size']     = $_FILES['country_gallery']['size'][$i];
	                
	                // File upload configuration
	                $path = 'assets/img/country_img' . '/' . date('Y') . '/' . date('m').'/';
				    if (!is_dir($path)) {
			            mkdir($path, 0777, TRUE);
			        }elseif(file_exists($filename)){
						unlink($filename);
					}
	                $uploadPath = $path;
	                $config['upload_path'] = $uploadPath;
	                $config['allowed_types'] = 'jpg|jpeg|png|gif';
	                
	                // Load and initialize upload library
	                $this->load->library('upload', $config);
	                $this->upload->initialize($config);
	                
	                // Upload file to server
	                if($this->upload->do_upload('file')){
	                    // Uploaded file data
	                    $fileData = $this->upload->data();
	                    $uploadData[$i]['file_name'] = $path.$fileData['file_name'];
	                }
	            }  
	           // print($uploadData) . exit();
	            if(!empty($uploadData)){
    	            foreach ($uploadData as $value) {
    	             	$package_images = array(
    	             		'country_id' => $id,
    	             		'img' => $value['file_name'],
    	             	);
    	             	$this->Constant_model->insert_alltable('country_images',$package_images);
    	            }     
	            }
       	}
		
		$this->session->set_flashdata('alert_msg', array('success', "Successfully Update country"));
		return redirect(base_url().'dashboard/country');
	}

	public function delete_country(){
		$id = $_POST['id'];
		$c_img = $_POST['c_img'];
		$gal = $this->Constant_model->getDataOneColumn('country_images','country_id',$id);
// 		foreach ($gal as $value) {
// 			unlink(FCPATH.$value->img);
// 		}
		$this->Constant_model->deleteData('country', $id);
		//unlink(FCPATH."assets/img/country_img/".$c_img);
		$this->Constant_model->custom_deleteData('country_images','country_id',$id);
		$this->session->set_flashdata('alert_msg', array('success', "Successfully Deleted country"));
		return redirect(base_url().'dashboard/country');
	}

	public function activities()
	{ 
		$data = array(
			'title' => 'All Activities',
			'form_title' => 'Add Activity',
			'data' => $this->Constant_model->get_alltable_desc('activities')
		);
		$this->load->view('activities',$data);
	}

	public function save_activity() 
	{
		// echo "<pre>";
		// print_r($_POST) . exit();
		if ($_FILES['img']['name'] != '') {
    		$img = img_upload($_FILES, 'assets/img/activity_img/');
    	}
    	$data = array(
    		'activity_name' => $_POST['activity_name'],
    		'activity_img' => $img,
			'custom_tour_activity' => $_POST['custom_tour_activity'],
    	);

		if ($_POST['custom_tour_activity'] == "1") {
			$custom_activity_img = $this->Constant_model->fileUploader($_FILES['custom_activity_img'],'custom_activity_img','assets/img/activity_img/');
			$data["custom_activity_img"] = $custom_activity_img;
			$true_activity_img = $this->Constant_model->fileUploader($_FILES['true_activity_img'],'true_activity_img','assets/img/activity_img/');
			$data["true_activity_img"] = $true_activity_img;
		}


    	$this->Constant_model->insert_alltable('activities',$data);
    	$this->session->set_flashdata('alert_msg', array('success', "Successfully added activity"));
        return redirect(base_url().'dashboard/activities');
	}

	public function edit_activities($id){
		$c_id = hashids_decrypt($id);
		$data = array(
    		'title' => 'All Activities',
			'form_title' => 'Edit Activity',
			'is_edit' => true,
			'activity' => $this->Constant_model->get_edit_data('activities',$c_id),
			'data' => $this->Constant_model->get_alltable_desc('activities')
    	);
		// echo "<pre>";
		// print_r($data) . die;
		$this->load->view('edit_activities',$data);
	}

	public function update_activities(){
		// updateData
		// echo "<pre>";
		// print_r($_POST) . die;
		$id = $_POST['c_id'];
		$data = array(
			'activity_name' => $_POST['country_name'],
			'custom_tour_activity' => $_POST['custom_tour_activity']
		);
		
		
		if ($_FILES['img']['name'] != '') {
    		$img = img_upload($_FILES, 'assets/img/activity_img/');
			$data['activity_img'] = $img;
			unlink(FCPATH."assets/img/activity_img/".$_POST['old_img']);
    	}else{
			$data['activity_img'] = $_POST["old_img"];
		}

		if ($_POST['custom_tour_activity'] == "1") {
			if($_FILES['custom_activity_img']['name'] != ''){
				$custom_activity_img = $this->Constant_model->fileUploader($_FILES['custom_activity_img'],'custom_activity_img','assets/img/activity_img/');
				$data['custom_activity_img'] = $custom_activity_img;
    			if(!empty($_POST["old_custom_activity_img"])){
    			    unlink(FCPATH.$_POST['old_custom_activity_img']);
    			}
			}else{
				$data['custom_activity_img'] = $_POST['old_custom_activity_img'];
			}
		}
		if ($_POST['custom_tour_activity'] == "1") {
			if($_FILES['true_activity_img']['name'] != ''){
				$true_activity_img = $this->Constant_model->fileUploader($_FILES['true_activity_img'],'true_activity_img','assets/img/activity_img/');
				$data['true_activity_img'] = $true_activity_img;
				if(!empty($_POST["old_true_activity_img"])){
    			    unlink(FCPATH.$_POST['old_true_activity_img']);
    			}
				
			}else{
				$data['true_activity_img'] = $_POST['old_true_activity_img'];
			}
		}
		$this->Constant_model->updateData('activities', $data, $id);
		$this->session->set_flashdata('alert_msg', array('success', "Successfully Update activity"));
		return redirect(base_url().'dashboard/activities');
	}

	public function delete_activities(){
		// echo "<pre>";
		// print_r($_POST) . die;
		$id = $_POST['act_id'];
		$img = $_POST['act_img'];
		//echo $img; die;
		$this->Constant_model->deleteData('activities', $id);
		unlink(FCPATH."assets/img/activity_img/".$img);
		unlink(FCPATH."assets/img/activity_img/".$_POST['old_true_activity_img']);
		unlink(FCPATH."assets/img/activity_img/".$_POST['old_custom_activity_img']);
		$this->session->set_flashdata('alert_msg', array('success', "Successfully Deleted activity"));
		return redirect(base_url().'dashboard/activities');
	}

	public function service()
	{
		$data = array(
			'title' => 'All Services',
			'form_title' => 'Add Services',
			'data' => $this->Constant_model->get_alltable_desc('services')
		);
		$this->load->view('services',$data);
		
	}

	public function save_service(){
		if ($_FILES['img']['name'] != '') {
    		$img = img_upload($_FILES, 'assets/img/service_img/');
    	}
    	$data = array(
    		'service_name' => $_POST['service_name'],
    		'service_img' => $img, 
    	);
    	$this->Constant_model->insert_alltable('services',$data);
    	$this->session->set_flashdata('alert_msg', array('success', "Successfully added Service"));
        return redirect(base_url().'dashboard/service');
	}

	public function edit_service($id){
		$c_id = hashids_decrypt($id);
		$data = array(
    		'title' => 'All Services',
			'form_title' => 'Add Services',
			'is_edit' => true,
			'data' => $this->Constant_model->get_alltable_desc('services'),
			'activity' => $this->Constant_model->get_edit_data('services',$c_id)
    	);
		$this->load->view('edit_service',$data);
	}

	public function update_service(){
		// updateData
		$id = $_POST['c_id'];
		$data = array(
			'service_name' => $_POST['country_name'],
		);
		if ($_FILES['img']['name'] != '') {
    		$img = img_upload($_FILES, 'assets/img/service_img/');
			$data['service_img'] = $img;
			unlink(FCPATH."assets/img/service_img/".$_POST['old_name']);
    	}
		$this->Constant_model->updateData('services', $data, $id);
		$this->session->set_flashdata('alert_msg', array('success', "Successfully Update service"));
		return redirect(base_url().'dashboard/service');
	}

	public function delete_service(){
		$id = $_POST['act_id'];
		$img = $_POST['act_img'];
		//echo $img; die;
		$this->Constant_model->deleteData('activities', $id);
		unlink(FCPATH."assets/img/service_img/".$img);
		$this->Constant_model->deleteData('services', $id);
		$this->session->set_flashdata('alert_msg', array('success', "Successfully Deleted service"));
		return redirect(base_url().'dashboard/service');
	}

	public function all_packages()
	{
		$data1 = $this->db->query("
		SELECT packages.*, country.country_name as cName 
		FROM packages
		JOIN country ON packages.country_id = country.id")->result();
		$data = array(
			'title' => 'All Packages',
			'data' => $data1
		);
		$this->load->view('all_packages',$data);
	}
	public function package_detail()
	{
		$data = array(
			'title' => 'Package Detail',
		);
		$this->load->view('package_detail',$data);
	}
	public function add_packages()
	{
		$data = array(
			'title' => 'Add Packeges',
			'form_title' => 'Add Packeges',
			'activity' => $this->Constant_model->get_alltable('activities'),
			'country' => $this->Constant_model->get_alltable('country'),
			'service' => $this->Constant_model->get_alltable('services'),
		);
		$this->load->view('packages', $data);
	}

	public function save_package(){ 
				$accommodation['city'] = $_POST['city'];
				$accommodation['stay'] = $_POST['stay'];
				$accommodation['detail'] = $_POST['detail'];
		$data = array(
			'country_id' => $_POST['country'],
			'package_name' => $_POST['package_title'], 
			'duration' => $_POST['package_duration'],
		//	'group_tour_price' => $_POST['group_price'],
		//	'private_tour_price' => $_POST['private_price'],
			'places_description' => $_POST['places'],
			'description' => $_POST['description'],
		//	'start_date' => $_POST['start_date'],
		//	'end_date' => $_POST['end_date'],
			'accommodation' => json_encode($accommodation),
			'inclusion' => $_POST['in_ex'],
			'exclusion' => $_POST['ex'],
			'additional_remarks' => $_POST['Remarks'],	
			'show_on_website' => $_POST['show_on_website'],		
		);
		if (isset($_FILES['image'])) {
            $upload = $this->Constant_model->fileUploader($_FILES['image'], 'image','assets/img/package_img');
            if (!isset($upload['error'])) {
                $data['images'] =  $upload;
            }
	    }
		$pkg_id = $this->Constant_model->insertDataReturnLastId('packages', $data);
			if (isset($_POST['itinerary'])) {
				if (!empty($_FILES['itinerary_img']['name'])) {
				    $filesCount = count($_FILES['itinerary_img']['name']); 
			        for($i = 0; $i < $filesCount; $i++){
			            $_FILES['file']['name']     = $_FILES['itinerary_img']['name'][$i];
			            $_FILES['file']['type']     = $_FILES['itinerary_img']['type'][$i];
			            $_FILES['file']['tmp_name'] = $_FILES['itinerary_img']['tmp_name'][$i];
			            $_FILES['file']['error']     = $_FILES['itinerary_img']['error'][$i];
			            $_FILES['file']['size']     = $_FILES['itinerary_img']['size'][$i];
			            $itinerary_img[$i]['file_name'] = $this->Constant_model->fileUploader($_FILES['file'],'file','assets/img/itinerary_img/');
			      
			      //       $path = 'assets/img/itinerary_img' . '/' . date('Y') . '/' . date('m').'/';
					    // if (!is_dir($path)) {
				     //        mkdir($path, 0777, TRUE);
				     //    }
			      //       $uploadPath = $path;
			      //       $config['upload_path'] = $uploadPath;
			      //       $config['allowed_types'] = 'jpg|jpeg|png|gif';
						
			      //       // Load and initialize upload library
			      //       $this->load->library('upload', $config);
			      //       $this->upload->initialize($config);
						
			      //       // Upload file to server
			      //       if($this->upload->do_upload('file')){
			      //           // Uploaded file data
			      //           $fileData = $this->upload->data();
			      //           $itinerary_img[$i]['file_name'] = $path.$fileData['file_name'];
			      //       }
			        }   
			        
					
					 
			       }
			} 
			$j = 0; 
			foreach ($_POST['itinerary'] as $l => $itinerary) {
						$itinerary_data = array(
			        		'pkg_id' => $pkg_id,
			         		'title' => $itinerary['title'],
							 'detail' => $itinerary['detail'],
							'latitude' => $itinerary['latitude'],
							'longitude' => $itinerary['longitude'],
			         		'img' => $itinerary_img[$j]['file_name'],
			         	);
			        // 	print_r($itinerary_data);  
			         	$j++;
			         	$this->Constant_model->insert_alltable('itinerary',$itinerary_data);
			        }
			        
		foreach ($_POST['activity'] as $value) {
			$package_activities = array(
				'pkg_id' => $pkg_id,
				'activity_id' => $value, 
			);
			$this->Constant_model->insert_alltable('package_activities',$package_activities);
		}

		foreach ($_POST['service'] as $value) {
			$package_service = array(
				'pkg_id' => $pkg_id,
				'service_id' => $value, 
			);
			$this->Constant_model->insert_alltable('package_service',$package_service);
		}
		if (!empty($_FILES['inputfa']['name'])) {
			$filesCount = count($_FILES['inputfa']['name']); 
	            for($i = 0; $i < $filesCount; $i++){
	                $_FILES['file']['name']     = $_FILES['inputfa']['name'][$i];
	                $_FILES['file']['type']     = $_FILES['inputfa']['type'][$i];
	                $_FILES['file']['tmp_name'] = $_FILES['inputfa']['tmp_name'][$i];
	                $_FILES['file']['error']     = $_FILES['inputfa']['error'][$i];
	                $_FILES['file']['size']     = $_FILES['inputfa']['size'][$i];
	                
	                // File upload configuration
	                $path = 'assets/img/package_img' . '/' . date('Y') . '/' . date('m').'/';
				    if (!is_dir($path)) {
			            mkdir($path, 0777, TRUE);
			        }
	                $uploadPath = $path;
	                $config['upload_path'] = $uploadPath;
	                $config['allowed_types'] = 'jpg|jpeg|png|gif';
	                
	                // Load and initialize upload library
	                $this->load->library('upload', $config);
	                $this->upload->initialize($config);
	                
	                // Upload file to server
	                if($this->upload->do_upload('file')){
	                    // Uploaded file data
	                    $fileData = $this->upload->data();
	                    $uploadData[$i]['file_name'] = $path.$fileData['file_name'];
	                }
	            }  
	            foreach ($uploadData as $value) {
	             	$package_images = array(
	             		'pkg_id' => $pkg_id,
	             		'img' => $value['file_name'],
	             	);
	             	$this->Constant_model->insert_alltable('package_images',$package_images);
	            }     
       	}
		$this->session->set_flashdata('alert_msg', array('success', "Successfully added Package"));
		return redirect(base_url().'dashboard/all_packages');
	}

	public function edit_package($id){
		$id = hashids_decrypt($id);
		$package = $this->Constant_model->get_edit_data('packages',$id);
		$country = $this->Constant_model->get_alltable('country');
		$activities = $this->Constant_model->get_alltable('activities');
		$pkg_act_id = $this->Constant_model->getDataOneColumn('package_activities','pkg_id',$id);
		$services = $this->Constant_model->get_alltable('services');
		$pkg_srv_id = $this->Constant_model->getDataOneColumn('package_service','pkg_id',$id);
		$package_image = $this->Constant_model->getDataOneColumn('package_images','pkg_id',$id);
		$itinerary = $this->Constant_model-> getDataOneColumn('itinerary', 'pkg_id', $id);
		//$pkg_itinerary = $this->Constant_model->getwhere('itinerary','pkg_id',$id);


		$data = array(
			'title' => "Package",
			'form_title' => "Edit Package",
			'package' => $package,
			'country' => $country,
			'activity' => $activities,
			'pkg_act_id' => $pkg_act_id,
			'services' => $services,
			'pkg_srv_id' => $pkg_srv_id,
			'package_image' => $package_image,
			'itinerary' => $itinerary,
			//'pkg_itinerary' => $pkg_itinerary
		);
		
		$this->load->view('edit_packages', $data);
	}

	public function update_package(){
		// echo "<PRE>";
		// print_r($_POST); die;
		$id = $_POST['package_id'];
		
		$data = array(
			'country_id' => $_POST['country'],
			'package_name' => $_POST['package_title'], 
			'duration' => $_POST['package_duration'],
			'places_description' => $_POST['places'],
			'description' => $_POST['description'],
			'accommodation' => $_POST['accommodation'],
			'inclusion' => $_POST['in_ex'],
			'exclusion' => $_POST['ex'],
			'additional_remarks' => $_POST['Remarks'],			
		);
		if (!empty(isset($_FILES['image']))) {
            $upload = $this->Constant_model->fileUploader($_FILES['image'], 'image','assets/img/package_img');
            if (!isset($upload['error'])) {
                $data['images'] =  $upload;
            }
	    }else{
			$data['images'] = $_POST['old_img'];
		}
		$this->Constant_model->updateData('packages', $data, $id);

		// $this->Constant_model->custom_deleteData('itinerary','pkg_id',$id);		
		// if (isset($_POST['itinerary'])) {
		// 	if (!empty($_FILES['itinerary_img']['name'])) {
		// 	    $filesCount = count($_FILES['itinerary_img']['name']); 
	    //         for($i = 0; $i < $filesCount; $i++){
	    //             $_FILES['file']['name']     = $_FILES['itinerary_img']['name'][$i];
	    //             $_FILES['file']['type']     = $_FILES['itinerary_img']['type'][$i];
	    //             $_FILES['file']['tmp_name'] = $_FILES['itinerary_img']['tmp_name'][$i];
	    //             $_FILES['file']['error']     = $_FILES['itinerary_img']['error'][$i];
	    //             $_FILES['file']['size']     = $_FILES['itinerary_img']['size'][$i];
	    //            // print_r($_FILES['itinerary']);
	    //             // File upload configuration
	    //             $path = 'assets/img/itinerary_img' . '/' . date('Y') . '/' . date('m').'/';
		// 		    if (!is_dir($path)) {
		// 	            mkdir($path, 0777, TRUE);
		// 	        }
	    //             $uploadPath = $path;
	    //             $config['upload_path'] = $uploadPath;
	    //             $config['allowed_types'] = 'jpg|jpeg|png|gif';
	                
	    //             // Load and initialize upload library
	    //             $this->load->library('upload', $config);
	    //             $this->upload->initialize($config);
	                
	    //             // Upload file to server
	    //             if($this->upload->do_upload('file')){
	    //                 // Uploaded file data
	    //                 $fileData = $this->upload->data();
	    //                 $itinerary_img[$i]['file_name'] = $path.$fileData['file_name'];
	    //             }
	    //         }  
	    //         foreach ($itinerary_img as $key => $itinerary) {
	    //         	$itinerary_data = array(
	    //         		'pkg_id' => $id,
	    //          		'title' => $_POST['itinerary'][$key]['title'],
	    //          		'detail' => $_POST['itinerary'][$key]['detail'],
	    //          		'img' => $itinerary['file_name'],
	    //          	);
	    //          	$this->Constant_model->insert_alltable('itinerary',$itinerary_data);
	    //         }
       	//     }
		// }
		$this->Constant_model->custom_deleteData('package_activities','pkg_id',$id);
		foreach ($_POST['activity'] as $value) {
			$package_activities = array(
				'pkg_id' => $id,
				'activity_id' => $value, 
			);
			$this->Constant_model->insert_alltable('package_activities',$package_activities);
		}
		// $this->Constant_model->custom_deleteData('package_service','pkg_id',$id);
		// foreach ($_POST['service'] as $value) {
		// 	$package_service = array(
		// 		'pkg_id' => $id,
		// 		'service_id' => $value, 
		// 	);
		// 	$this->Constant_model->insert_alltable('package_service',$package_service);
		// }
		// $this->Constant_model->custom_deleteData('package_images','pkg_id',$id);
		// if (!empty($_FILES['inputfa']['name'])) {
		// 	$filesCount = count($_FILES['inputfa']['name']); 
	    //         for($i = 0; $i < $filesCount; $i++){
	    //             $_FILES['file']['name']     = $_FILES['inputfa']['name'][$i];
	    //             $_FILES['file']['type']     = $_FILES['inputfa']['type'][$i];
	    //             $_FILES['file']['tmp_name'] = $_FILES['inputfa']['tmp_name'][$i];
	    //             $_FILES['file']['error']     = $_FILES['inputfa']['error'][$i];
	    //             $_FILES['file']['size']     = $_FILES['inputfa']['size'][$i];
	                
	    //             // File upload configuration
	    //             $path = 'assets/img/package_img' . '/' . date('Y') . '/' . date('m').'/';
		// 		    if (!is_dir($path)) {
		// 	            mkdir($path, 0777, TRUE);
		// 	        }
	    //             $uploadPath = $path;
	    //             $config['upload_path'] = $uploadPath;
	    //             $config['allowed_types'] = 'jpg|jpeg|png|gif';
	                
	    //             // Load and initialize upload library
	    //             $this->load->library('upload', $config);
	    //             $this->upload->initialize($config);
	                
	    //             // Upload file to server
	    //             if($this->upload->do_upload('file')){
	    //                 // Uploaded file data
	    //                 $fileData = $this->upload->data();
	    //                 $uploadData[$i]['file_name'] = $path.$fileData['file_name'];
	    //             }
	    //         }  
	    //         foreach ($uploadData as $value) {
	    //          	$package_images = array(
	    //          		'pkg_id' => $id,
	    //          		'img' => $value['file_name'],
	    //          	);
	    //          	$this->Constant_model->insert_alltable('package_images',$package_images);
	    //         }     
       	// }else{
		// 	foreach ($_POST["old_gallery"] as $value) {
		// 		$package_images = array(
		// 			'pkg_id' => $id,
		// 			'img' => $value,
		// 		);
		// 		$this->Constant_model->insert_alltable('package_images',$package_images);
		//    }     
		// }
		$this->session->set_flashdata('alert_msg', array('success', "Successfully added Package"));
		return redirect(base_url().'dashboard/all_packages');
		
	}

	public function delete_package($id){
		$id = hashids_decrypt($id);
		$this->Constant_model->deleteData('packages', $id);
        $this->Constant_model->custom_deleteData('package_activities', 'pkg_id', $id);
		$this->Constant_model->custom_deleteData('package_images', 'pkg_id', $id);
		$this->Constant_model->custom_deleteData('package_service', 'pkg_id', $id);
		$this->Constant_model->custom_deleteData('itinerary', 'pkg_id', $id);
        $this->session->set_flashdata('alert_msg', array('success', "Successfully Deleted Package"));
        return redirect(base_url().'Dashboard/all_packages');
	}
	public function view_package($id)
	{
		$id = hashids_decrypt($id);
		$country = $this->db->query("
		SELECT packages.*, country.country_name as cName 
		FROM packages
		JOIN country ON packages.country_id = country.id 
		where packages.id = $id")->result();
		$activities = $this->db->query("SELECT activities.* from activities
		JOIN package_activities ON package_activities.activity_id = activities.id
		JOIN packages ON package_activities.pkg_id = packages.id
		WHERE packages.id = $id")->result();
		$services = $this->db->query("SELECT services.* from services
		JOIN package_service ON package_service.service_id = services.id
		JOIN packages ON package_service.pkg_id = packages.id
		WHERE packages.id = $id")->result();
		$gallery = $this->db->query("SELECT package_images.* FROM package_images
		JOIN packages ON package_images.pkg_id = packages.id
		WHERE packages.id = $id")->result();
		$itinerary = $this->db->query("SELECT itinerary.* FROM itinerary
		JOIN packages ON itinerary.pkg_id = packages.id
		WHERE packages.id = $id")->result();
		
		$data = array(
			'title' => 'View Package',
			'package' => $country,
			'activity' => $activities,
			'service' => $services,
			'itinerary' => $itinerary,
			'gallery' => $gallery
		);
		$this->load->view('view_package',$data);
	}
	public function getDuration(){
		$package_id = $_GET['package_id'];
		$data = $this->Constant_model->getOneCol('packages','id',$package_id);
		
		echo $data->duration;
	}

	public function events(){
		$event = $this->db->query("
		SELECT packages.package_name as pkgName, event.* 
		FROM event
		JOIN packages ON packages.id = event.package_id")->result();
		// echo "<PRE>";  print_r($event);
		$data = array(
			'title' => 'Events',
			'form_title' => 'Add Event',
			'package' => $this->Constant_model->get_alltable('packages'),
			'event' => $event
		);
		$this->load->view('events', $data);
	}

	public function save_event(){
		$data = array(
			'package_id' => $_POST['package_name'],
			'event_name' => $_POST['event_name'],
			'duration' => $_POST['duration'],
			'start_date' => $_POST['start_date'],
			'end_date' => $_POST['end_date'],
			'group_price' => $_POST['group_price'],
			'private_price' => $_POST['private_price'],
			'min_no_people' => $_POST['min_no_people'],
			'max_no_people' => $_POST['max_no_people'],
			'base_fare' => $_POST['base_fare'],
			'gst' => $_POST['gst'],
			'tcs' => $_POST['tcs'],
			'affiliate_code' => $_POST["affiliate_code"],
			"separate_room_charges" => $_POST["separate_room_charges"],
			"discount" => $_POST["discount"],
			//"private_txt_price" => $_POST["private_txt_price"],
			//"group_txt_price" => $_POST["group_txt_price"],
			"show_home" => $_POST['show_home']
		);
		$this->Constant_model->insert_alltable('event',$data);
    	$this->session->set_flashdata('alert_msg', array('success', "Successfully added Event"));
        return redirect(base_url().'dashboard/events');
	}

	public function edit_event($id){
		$id = hashids_decrypt($id);
		// echo "<PRE>";
		// print_r($ED);
		$event = $this->db->query("
		SELECT packages.package_name as pkgName, packages.id as pkgID, event.* 
		FROM event
		JOIN packages ON packages.id = event.package_id")->result();
		// echo "<PRE>";  print_r($event);
		$data = array(
			'title' => 'Events',
			'form_title' => 'Edit Event',
			'package' => $this->Constant_model->get_alltable('packages'),
			'edit_data' => $this->Constant_model->get_edit_data('event',$id),
			'event' => $event,
		);
		$this->load->view('edit_events', $data);
	}

	public function update_event(){
		$event_id = $_POST['event_id'];
		//print_r($_POST); 
		//die;
		$data = array(
			'package_id' => $_POST['package_name'],
			'event_name' => $_POST['event_name'],
			'duration' => $_POST['duration'],
			'start_date' => $_POST['start_date'],
			'end_date' => $_POST['end_date'],
			'group_price' => $_POST['group_price'],
			'private_price' => $_POST['private_price'],
			'min_no_people' => $_POST['min_no_people'],
			'max_no_people' => $_POST['max_no_people'],
			'gst' => $_POST['gst'],
			'tcs' => $_POST['tcs'],
			'affiliate_code' => $_POST["affiliate_code"],
			"separate_room_charges" => $_POST["separate_room_charges"],
			"discount" => $_POST["discount"],
			"private_txt_price" => $_POST["private_txt_price"],
			"group_txt_price" => $_POST["group_txt_price"],
			"show_home" => $_POST['show_home']
		);
		$this->Constant_model->updateData('event',$data,$event_id);
		$this->session->set_flashdata('alert_msg', array('success', "Successfully Update Event"));
        return redirect(base_url().'dashboard/events');
	}

	public function delete_event($id){
		$id = hashids_decrypt($id);
		$this->Constant_model->deleteData('event', $id);
		$this->session->set_flashdata('alert_msg', array('success', "Successfully Deleted Event"));
		return redirect(base_url().'dashboard/events');
	}


	public function website_setting()
	{
		$data = array(
			'title' => "Website Setting",
			'form_title' => "Add Website Settings",
			'data' => $this->Constant_model->getOneCol('website_setting','id',1),
		);
		return $this->load->view('website_setting',$data);
	}

	public function save_settings()
	{
		
		// $data = array(
		// 	'basefare' => $_POST['basefare'],
		// 	'gst' => $_POST['gst'],
		// 	'tcs' => $_POST['tcs'],
		// );
		$this->Constant_model->updateData('website_setting', $_POST, 1);
		$this->session->set_flashdata('alert_msg', array('success', "Successfully Add Website Settings"));
		return redirect(base_url().'dashboard/website_setting');
	}

	public function city()
	{
		$data['title']="City";
		$data['city']=$this->Constant_model->get_city('city');

	//	print_r($data) . die;

		$this->load->view('all_city', $data);
	}

	public function city_add()
	{
		$data['title']="City";
		$data['form_title'] = "Add City";
		$data['data']=$this->Constant_model->get_alltable('country');
		$this->load->view('add_city', $data);
	}

	public function save_city()
	{
		$data = array(
			'country_id' => $_POST['country'],
			'name' => $_POST['name'],
			'longitude' => $_POST['longitude'],
			'latitude' => $_POST['latitude'],
		);
		$this->Constant_model->insert_alltable('city',$data);	
		$this->session->set_flashdata('alert_msg', array('success', "Successfully added City"));
        return redirect(base_url().'dashboard/city');
	}

	public function edit_city($id)
	{
		$id = hashids_decrypt($id);
		$data = array(
			'title' => "Edit City",
			'form_title' => "Edit City",
			'data' =>$this->Constant_model->get_alltable('country'),
			'city' => $this->Constant_model->get_edit_data('city',$id),
		);
		$this->load->view('edit_city', $data);
	}

	public function update_city()
	{
		$data = array(
			'country_id' => $_POST['country'],
			'name' => $_POST['name'],
			'longitude' => $_POST['longitude'],
			'latitude' => $_POST['latitude'],
		);
		$this->Constant_model->updateData('city',$data,$_POST['id']);
		$this->session->set_flashdata('alert_msg', array('success', "Successfully Updated City"));
        return redirect(base_url().'dashboard/city');
	}

	public function delete_city($id){
		$id = hashids_decrypt($id);
		$this->Constant_model->deleteData('city', $id);
		$this->session->set_flashdata('alert_msg', array('success', "Successfully Deleted City"));
		return redirect(base_url().'dashboard/city');
	}

	public function guide_details()
	{
		$data = array(
			'form_title' => 'Add Guide',
			'title' => 'Guide Details',
			'country' => $this->Constant_model->get_alltable('country'),
			'data' => $this->Constant_model->guide_details(),
		);

		$this->load->view('guide_details',$data);
	}

	public function save_guide()
	{
		if (!empty($_POST['id'])) {
			$data = array(
				'country_id' => $_POST['country'],
				'name' => $_POST['name'],
				'email' => $_POST['email']
			);
			$this->Constant_model->updateData('guide_details',$data,$_POST['id']);
			$msg = ['success', "Successfully Updated Guide"];
		}else{
			$data = array(
				'country_id' => $_POST['country'],
				'name' => $_POST['name'],
				'email' => $_POST['email']
			);
			$this->Constant_model->insert_alltable('guide_details',$data);
			$msg = ['success', "Successfully added Guide"];
		}
		
		$this->session->set_flashdata('alert_msg', $msg);
        return redirect(base_url().'dashboard/guide_details');
	}

	public function guide_edit($id)
	{
		$id = hashids_decrypt($id);
		$data = array(
			'form_title' => 'Edit Guide',
			'title' => 'Guide Details',
			'country' => $this->Constant_model->get_alltable('country'),
			'data' => $this->Constant_model->guide_details(),
		);
		$data['edit'] = $this->Constant_model->get_edit_data('guide_details',$id);
		$this->load->view('edit_guide',$data);
	}

	public function guide_delete($id){
		$id = hashids_decrypt($id);
		$this->Constant_model->deleteData('guide_details', $id);
		$this->session->set_flashdata('alert_msg', array('success', "Successfully Deleted Guide"));
		return redirect(base_url().'dashboard/guide_details');
	}

	public function arrival_city()
	{
		$data = array(
			'form_title' => 'Add ',
			'title' => 'Arrival City',
			'country' => $this->Constant_model->get_alltable('country'),
			'city' => $this->Constant_model->get_alltable('city'),
			'data' => $this->Constant_model->arrival_city(),
		);
		$this->load->view('arrival_city',$data);
	}

	public function arrival_city_save()
	{
		if (!empty($_POST['id'])) {
			$data = array(
				'country_id' => $_POST['country'],
				'arrival_city_id' => $_POST['arrival_city'],
			);
			$this->Constant_model->updateData('arrival_city',$data,$_POST['id']);
			$msg = ['success', "Successfully Updated Arrival City"];
		}else{
			$data = array(
				'country_id' => $_POST['country'],
				'arrival_city_id' => $_POST['arrival_city'],
			);
			$this->Constant_model->insert_alltable('arrival_city',$data);
			$msg = ['success', "Successfully added Arrival City"];
		}
		
		$this->session->set_flashdata('alert_msg', $msg);
        return redirect(base_url().'dashboard/arrival_city');
	}

	public function arrival_city_edit($id)
	{
		$id = hashids_decrypt($id);
		$data = array(
			'form_title' => 'Edit ',
			'title' => 'Arrival City',
			'country' => $this->Constant_model->get_alltable('country'),
			'city' => $this->Constant_model->get_alltable('city'),
			'edit' => $this->Constant_model->get_edit_data('arrival_city',$id),
		);
	//	print_r(json_encode($data));
		$data['data'] = $this->Constant_model->arrival_city();
		$this->load->view('edit_arrival_city',$data);
	}

	public function delete_arrival_city($id){
		$id = hashids_decrypt($id);
		$this->Constant_model->deleteData('arrival_city', $id);
		$this->session->set_flashdata('alert_msg', array('success', "Successfully Deleted Arrival City"));
		return redirect(base_url().'dashboard/arrival_city');
	}

	public function departure_city()
	{
		$data = array(
			'form_title' => 'Add ',
			'title' => 'Departure City',
			'country' => $this->Constant_model->get_alltable('country'),
			'city' => $this->Constant_model->get_alltable('city'),
			'data' => $this->Constant_model->departure_city(),
		);
		$this->load->view('departure_city',$data);
	}

	public function departure_city_save()
	{
		if (!empty($_POST['id'])) {
			$data = array(
				'country_id' => $_POST['country'],
				'departure_city_id' => $_POST['departure_city'],
			);
			$this->Constant_model->updateData('departure_city',$data,$_POST['id']);
			$msg = ['success', "Successfully Updated Departure City"];
		}else{
			$data = array(
				'country_id' => $_POST['country'],
				'departure_city_id' => $_POST['departure_city'],
			);
			$this->Constant_model->insert_alltable('departure_city',$data);
			$msg = ['success', "Successfully added Departure City"];
		}
		
		$this->session->set_flashdata('alert_msg', $msg);
        return redirect(base_url().'dashboard/departure_city');
	}

	public function departure_city_edit($id)
	{
		$id = hashids_decrypt($id);
		$data = array(
			'form_title' => 'Edit ',
			'title' => 'Departure City',
			'country' => $this->Constant_model->get_alltable('country'),
			'city' => $this->Constant_model->get_alltable('city'),
			'edit' => $this->Constant_model->get_edit_data('departure_city',$id),
		);
		$data['data'] = $this->Constant_model->departure_city();
		$this->load->view('edit_departure_city',$data);
	}

	public function delete_departure_city($id){
		$id = hashids_decrypt($id);
		$this->Constant_model->deleteData('departure_city', $id);
		$this->session->set_flashdata('alert_msg', array('success', "Successfully Deleted Departure City"));
		return redirect(base_url().'dashboard/departure_city');
	}


	public function agent_size_cost()
	{
		$data = array(
			'form_title' => 'Add Aggent Rates',
			'title' => 'Aggent Rates',
			'itin' => $this->Constant_model->get_alltable('itinerary'),
		);
		$this->load->view('aggent_rates',$data);
	}

	public function agent_size_cost_all()
	{
		$data = array(
			'title' => 'All Aggent Rates',
			'data' => $this->Constant_model->aggent_rates(),
		);
		$this->load->view('all_aggent_rates',$data);
	}

	public function agent_size_cost_view($id)
	{
		$id = hashids_decrypt($id);
		$data = array(
			'title' => 'Aggent Rates Details',
			'data' => $this->Constant_model->aggent_rates_view($id),
		);
		// $data = $this->Constant_model->aggent_rates_view($id);
		$this->load->view('view_aggent_rates',$data);
	}

	public function agent_size_cost_edit($id)
	{
		$id = hashids_decrypt($id);
		$data = array(
			'form_title' => 'Edit Aggent Rates',
			'title' => 'Aggent Rates',
			'edit' => $this->Constant_model->aggent_rates_view($id),
			'itin' => $this->Constant_model->get_alltable('itinerary'),
		);
		$this->load->view('edit_aggent_rates',$data);
	}

	public function itinerary_get($id)
	{
		$data_iti =  $this->Constant_model->itinerary_where($id);
		$data = [];
		foreach ($data_iti as $key => $value) {
			$data['country'] = $value->country_name;
			$data['guidde_id'][$key] = $value->guide_id;
			$data['guidde_name'][$key] = $value->name;
		}
		echo json_encode($data);
	}

	public function save_agent_size_cost()
	{
		if (!empty($_POST['id'])) {
			$id = $_POST['id'];
			$this->Constant_model->custom_deleteData('size_and_cost_aggent_rates','aggent_rates_id',$id);
			$data = array(
			'itinerary_id' => $_POST['itinerary'],
			'guide_id' => $_POST['aggent'],
			'tour_type' => $_POST['tour_type']
			);
			$this->Constant_model->updateData('aggent_rates',$data,$id);
			$last_id = $id;
			$data1 = [];
			if ($_POST['group_type'] == 'Private') {
				foreach ($_POST['private_group_size'] as $key => $value) {
					$data1['aggent_rates_id'] = $last_id;
					$data1['size'] = $value;
					$data1['cost'] = $_POST['private_price'][$key];
					$data1['group_type'] = $_POST['group_type'];
					$this->Constant_model->insert_alltable('size_and_cost_aggent_rates',$data1);
				}
			}else if ($_POST['group_type'] == 'Group') {
				foreach ($_POST['group_size'] as $key => $value) {
					$data1['aggent_rates_id'] = $last_id;
					$data1['size'] = $value;
					$data1['cost'] = $_POST['group_price'][$key];
					$data1['group_type'] = $_POST['group_type'];
					$this->Constant_model->insert_alltable('size_and_cost_aggent_rates',$data1);
				}
			}
			$msg = ['success', "Successfully Updated Aggent Rates"];
		}else{
			$data = array(
				'itinerary_id' => $_POST['itinerary'],
				'guide_id' => $_POST['aggent'],
				'tour_type' => $_POST['tour_type']
			);
	
			$last_id = $this->Constant_model->insertDataReturnLastId('aggent_rates',$data);
			$data1 = [];
			if ($_POST['group_type'] == 'Private') {
				foreach ($_POST['private_group_size'] as $key => $value) {
					$data1['aggent_rates_id'] = $last_id;
					$data1['size'] = $value;
					$data1['cost'] = $_POST['private_price'][$key];
					$data1['group_type'] = $_POST['group_type'];
					$this->Constant_model->insert_alltable('size_and_cost_aggent_rates',$data1);
				}
			}else if ($_POST['group_type'] == 'Group') {
				foreach ($_POST['group_size'] as $key => $value) {
					$data1['aggent_rates_id'] = $last_id;
					$data1['size'] = $value;
					$data1['cost'] = $_POST['group_price'][$key];
					$data1['group_type'] = $_POST['group_type'];
					$this->Constant_model->insert_alltable('size_and_cost_aggent_rates',$data1);
				}
			}
			$msg = ['success', "Successfully Added Aggent Rates"];
		}
		$this->session->set_flashdata('alert_msg', $msg);
		return redirect(base_url().'dashboard/agent_size_cost_all');
	}


	public function delete_agent_size_cost($id)
	{
		$id = hashids_decrypt($id);
		$this->Constant_model->custom_deleteData('size_and_cost_aggent_rates','aggent_rates_id',$id);
		$this->Constant_model->deleteData('aggent_rates', $id);
		$this->session->set_flashdata('alert_msg', array('success', "Successfully Deleted Aggent Rates"));
		return redirect(base_url().'dashboard/agent_size_cost_all');
	}


}

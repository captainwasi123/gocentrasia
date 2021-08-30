<?php

class Custom_tour extends CI_Controller{
    function __construct()
	{
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('custom_helper');
        $this->load->model("Custom_tours");
        if ($this->session->userdata('user_role') != 'admin') { 
            return redirect(base_url("admin"));
        }
	}

    public function all_custom_tour(){
		$data["title"] = "All Custom Tour";
        $data['tour'] = $this->Constant_model->get_alltable('custom_tour');
        $this->load->view('all_custom_tours.php',$data);   
    }
        
    public function custom_tour(){
		$data["title"] = "Add Custom Tour";
		$data['city'] = $this->Constant_model->get_alltable('city');
        $data['activity'] = $this->Custom_tours->getActivityByCustomTour();
        $this->load->view('custom_tour.php',$data);
    }

    public function add_custom_tour(){
        // echo "<PRE>";
        // print_r($_POST); die;
        $data = array(
			'city_id' => $_POST['city'],
			'title' => $_POST['title'],
            'day' => $_POST['day'],
            'description' => $_POST['description'],
            'place' => $_POST['place'],
            // 'mausoleum' => $_POST['mausoleum'],
			'latitude' => $_POST['latitude'],
            'longitude' => $_POST['longitude'],
            'price' => $_POST['price']
		);
        if (isset($_FILES['image'])) {
            $upload = $this->Constant_model->fileUploader($_FILES['image'], 'image','assets/img/custom_tour');
            if (!isset($upload['error'])) {
                $data['image'] =  $upload;
            }
	    }

		$custom_id = $this->Constant_model->insertDataReturnLastId('custom_tour', $data);
		
		foreach ($_POST['activity'] as $value) {
			$custom_tour_activities = array(
				'custom_id' => $custom_id,
				'activity_id' => $value, 
			);
			$this->Constant_model->insert_alltable('custom_tour_activities',$custom_tour_activities);
		}

        $this->session->set_flashdata('alert_msg', array('success', "Successfully added Custom Tour"));
		return redirect(base_url().'Custom_tour/custom_tour');
    }

    public function edit_custom_tour($id){
        $id = hashids_decrypt($id);

        $custom = $this->Constant_model->get_edit_data('custom_tour',$id);
        $activities = $this->Custom_tours->getActivityByCustomTour();
		$cust_act_id = $this->Constant_model->getwhere('custom_tour_activities','custom_id',$id);

		$data["title"] = "Edit Custom Tour";
        $data = array(
            'custom' => $custom,
            'activity' => $activities,
            'cust_act_id' => $cust_act_id,
        );
		$data['city'] = $this->Constant_model->get_alltable('city');
        // echo "<PRE>";
        // print_r($data); die;
        $this->load->view('edit_custom_tour.php',$data);
        
    }

    public function update_custom_tour(){
        // echo "<PRE>";
        // print_r($_POST); die;
        $id = $_POST['id'];
        $data = array(
			'city_id' => $_POST['city'],
			'title' => $_POST['title'],
            'day' => $_POST['day'],
            'description' => $_POST['description'],
            'place' => $_POST['place'],
            // 'mausoleum' => $_POST['mausoleum'],
            'price' => $_POST['price'],
			'latitude' => $_POST['latitude'],
            'longitude' => $_POST['longitude']
		);
        if (isset($_FILES['image']) != "" ) {
            // if(!empty($_POST['old_img'])){
            //     unlink(FCPATH."assets/img/custom_tour".$_POST['old_img']);
            // }
            $upload = $this->Constant_model->fileUploader($_FILES['image'], 'image','assets/img/custom_tour');
            if (!isset($upload['error'])) {
                $data['image'] =  $upload;
            }
	    }else{
            $data['image'] = $_POST['old_img'];
        }
        $this->Constant_model->updateData('custom_tour', $data, $id);
        
        $res = $this->Constant_model->custom_deleteData('custom_tour_activities', 'custom_id', $id);
        if ($res == true) {
            foreach ($_POST['activity'] as $value) {
                $custom_tour_activities = array(
                    'custom_id' => $id,
                    'activity_id' => $value, 
                );
                $this->Constant_model->insert_alltable('custom_tour_activities',$custom_tour_activities);
            }   
        }

        $this->session->set_flashdata('alert_msg', array('success', "Successfully Update Custom Tour"));
        return redirect(base_url().'Custom_tour/all_custom_tour');
    }

    public function deletecustom($id)
    {
        $id = hashids_decrypt($id);
        $this->Constant_model->deleteData('custom_tour', $id);
        $this->Constant_model->custom_deleteData('custom_tour_activities', 'custom_id', $id);
        $this->session->set_flashdata('alert_msg', array('success', "Successfully Deleted Custom Tour"));
        return redirect(base_url().'Custom_tour/all_custom_tour');
    }

} 

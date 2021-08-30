<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	 public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        
        $this->load->model('Auth_model');
        
    }
	public function index()
	{ 
		if (!isset($_SESSION)) {
			return redirect(base_url()."Dashboard");
		}
		$this->load->view('login');
		
	}
	public function login()
	{
		$username = strip_tags($this->input->post('username'));
		$password = strip_tags($this->input->post('password'));
		$data = array(
			'username' =>$username,
			'password' =>$password
		);
		$res = $this->Auth_model->login_verify($data); 
			if ($res['valid']) {
				$user_id = $res['user_id'];
				$username = $res['username'];
				$user_role = $res['user_role'];
		
				$user_data = array(
					'user_id' =>$user_id ,
					'username' =>$username ,
					'user_role' =>$user_role ,
					);
				if ($user_role == 'admin') {
					$this->session->set_userdata($user_data);
					return redirect('dashboard');
				}if ($user_role == '5') {
					$this->session->set_userdata($user_data);
					return redirect('accountant-profile');
				}if ($user_role == '6') {
					$this->session->set_userdata($user_data);
					return redirect('receptionist-profile');
				}if ($user_role == '2') {
					$this->session->set_userdata($user_data);
					return redirect('student-dashboard');
				}if ($res['user_role'] == "user") {
					$this->session->set_userdata($user_data);
					return redirect('Home');
				}
			
			}else{
				
				$this->session->set_flashdata('alert_msg', array('failure', 'Login', $res['error']));
                redirect(base_url().'admin');
			}		 	
	}

	public function logout()
	{
		session_destroy();
		redirect('Auth', 'refresh');
	}
}
	
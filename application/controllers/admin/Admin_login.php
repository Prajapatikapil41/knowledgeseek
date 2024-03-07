<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {
	public function __construct(){
		parent::__construct();

		$this->load->model('admin/Admin_login_model', 'login');
	}


	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'password', 'required|trim');
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		if($this->form_validation->run() == true){
			$username =  $this->input->post('username');
			$password = $this->input->post('password');
			$adminData = $this->login->getAdminData();
			if($adminData->username == $username){
				$verifyPasssword = password_verify($password, $adminData->password);
				if($verifyPasssword == true){
						$adminDetail['admin_id'] = $adminData->id;
						$adminDetail['admin_name'] = $adminData->username;

						if($this->input->post('check')){
							set_cookie('admin_username', $username, '3600');
							set_cookie('admin_password', $password, '3600');
						}
						$this->session->set_userdata('adminID', $adminDetail['admin_id']);
						$this->session->set_userdata('adminName', $adminDetail['admin_name']);

						redirect(base_url().'admin/Admin/index');
						
						
				}else{
					$this->session->set_flashdata('pass_error', 'PASSWORD IS INCORRECT');
					redirect(base_url().'admin/admin_login/index');
				}
			}else{
				$this->session->set_flashdata('name_error', 'USERNAME IS INCORRECT');
				redirect(base_url().'admin/admin_login/index');
			}
			
		}else{
		$this->load->view('admin/adminLogin');
		}
	}

	public function changePassword(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim');
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		if($this->form_validation->run() == true){
			echo "its runs";
		}else{
			$this->load->view('admin/changePassword');
		}
	
	}

	public function logout(){
		delete_cookie('admin_username');
		delete_cookie('admin_username');
		$this->session->unset_userdata('adminID');
		$this->session->unset_userdata('adminName');
		redirect(base_url().'admin/Admin_login/index');

	}

}

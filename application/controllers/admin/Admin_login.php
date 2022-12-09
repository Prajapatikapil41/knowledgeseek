<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('admin/Admin_login_model', 'login');
	}


	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'password', 'required|trim');
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');

		if ($this->form_validation->run() == true) {
			$username =  $this->input->post('username');
			$password = $this->input->post('password');
			$adminData = $this->login->getAdminData($username);

			if ($adminData->username == $username) {
				$verifyPasssword = password_verify($password, $adminData->password);

				if ($verifyPasssword == true) {
					$adminDetail['admin_id'] = $adminData->id;
					$adminDetail['admin_name'] = $adminData->username;

					if ($this->input->post('check')) {
						set_cookie('admin_username', $username, '3600');
						set_cookie('admin_password', $password, '3600');
					}
					$this->session->set_userdata('adminID', $adminDetail['admin_id']);
					$this->session->set_userdata('adminName', $adminDetail['admin_name']);

					redirect(base_url() . 'dashboard');
				} else {
					$this->session->set_flashdata('pass_error', 'LOOGIN CREDENTIAL IS INCORRECT');
					redirect(base_url() . 'kSeek/control_panel/unlock');
				}
			} else {
				$this->session->set_flashdata('name_error', 'LOOGIN CREDENTIAL IS INCORRECT');
				redirect(base_url() . 'kSeek/control_panel/unlock');
			}
		} else {
			$this->load->view('admin/adminLogin');
		}
	}

	public function forgotPass()
	{
		delete_cookie('admin_username');
		delete_cookie('admin_username');
		$this->session->unset_userdata('adminID');
		$this->session->unset_userdata('adminName');
		$token = md5(rand());
		$mail = 'knowledgeseek21@gmail.com';
		$tknData = $this->login->updateToken($token, $mail);
		if ($tknData) {
			$config['mailtype'] = "html";
			$message = 	"<html>
						<head>
							<title>Security</title>
						</head>
						<body>
						<h2>Change Password</h2>
							<p>Please click the link below to activate your account.</p>
							<h4><a href='" . base_url() . "change_password?token=" . $token . "&mail=" . $mail . "'>Click Here</a></h4>
						</body>
						</html>";

			$this->load->library("email", $config);
			$this->email->from("testingcoder040@gmail.com");
			$this->email->to("knowledgeseek21@gmail.com");
			$this->email->subject("Change Password Link");
			$this->email->message($message);
			$this->email->set_newline("\r\n");

			if (!$this->email->send()) {
				show_error($this->email->print_debugger());
			} else {
				$this->changePassword($code);
				$this->session->set_flashdata('passVerfication', 'Please check your mail id <strong>knowledgeseek21@gmail.com</strong> for password change');
				redirect(base_url() . 'kSeek/control_panel/unlock');
			}
		} else {
			$this->session->set_flashdata('tokenVerfication', 'Token not generated');
			redirect(base_url() . 'kSeek/control_panel/unlock');
		}
	}


	public function changePassword()
	{
		// $url = parse_url($_SERVER['REQUEST_URI']);
		// parse_str($url['query'], $params);

		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|trim');
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');

		if ($this->form_validation->run() == true) {

			$token = $this->input->post('token');
			$mail = $this->input->post('mail');
			$pass = $this->input->post('password');
			$cpass = $this->input->post('confirmpassword');

			if (!empty($token)) {

				$information = $this->login->getAdminToken($token);
				if ($information) {
					if ($pass == $cpass) {
						$hashPass = password_hash($pass,  PASSWORD_BCRYPT);
						$res = $this->login->changePasswords($hashPass);
						if ($res) {
							$token = md5(rand());
							$check = $this->login->updateToken($token, $mail);
							if ($check) {
								redirect(base_url() . 'kSeek/control_panel/unlock');
							}
						}
					} else {
						$this->session->set_flashdata('change_pass_error', 'Password and confirm password are not matched');
						redirect(base_url() . 'change_password?token=' . $token . "&mail=" . $mail);
					}
				} else {
					$this->session->set_flashdata('token_error', 'Invalid token');
					redirect(base_url() . 'change_password?token=' . $token . "&mail=" . $mail);
				}
			} else {
				$this->session->set_flashdata('token_error1', 'no token available');
				redirect(base_url() . 'change_password?token=' . $token . "&mail=" . $mail);
			}
		} else {
			$this->load->view('admin/changePassword');
		}
	}


	public function logout()
	{
		delete_cookie('admin_username');
		delete_cookie('admin_username');
		$this->session->unset_userdata('adminID');
		$this->session->unset_userdata('adminName');
		redirect(base_url() . 'kSeek/control_panel/unlock');
	}
}

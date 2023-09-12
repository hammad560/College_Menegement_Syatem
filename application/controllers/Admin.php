<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('quries');
	}
	public function index()
	{
		$this->load->model('quries');
		$checkAdminExit['checkAdminExit'] = $this->quries->checkAdminExit();
		$this->load->view('home', $checkAdminExit);
	}
	// this fetch roles name from databse
	public function adminregistration()
	{
		$this->load->model('quries');
		$roles['roles'] = $this->quries->getRoles();
		$this->load->view('adminregistration', $roles);
	}
	// adminsign up controller
	public function adminsignup()
	{
		$this->validations();
		if ($this->form_validation->run()) {
			$data['username'] = $this->input->post('username');
			$data['email'] = $this->input->post('email');
			$data['gender'] = $this->input->post('gender');
			$data['role_id'] = $this->input->post('role_id');
			$data['password'] = sha1($this->input->post('password'));
			$data['cpassword'] = sha1($this->input->post('cpassword'));
			// call the model for insert the data and set the message on view also
			if ($this->quries->registerAdmin($data)) {
				$this->session->set_flashdata('message', 'User registered successfully!');
				return redirect('admin/adminregistration');
			} else {
				$this->session->set_flashdata('message', 'Registeration failed !');
				return redirect('admin/adminregistration');
			}
		} else {
			$this->adminregistration();
		}
	}
	public function validations()
	{
		$this->form_validation->set_rules('username', 'UserName', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
		$this->form_validation->set_rules('role_id', 'Role', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
	}

	public function login(){
		$this->load->view('login');
	}
	public function signin(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		if($this->form_validation->run()){
			$email = $this->input->post('email');
			$password = sha1($this->input->post('password'));
			$userExist = $this->quries->adminExit($email,$password);			
			if ($userExist) {
				if($userExist->role_id == '1'){
					$sessionfData = [
						'id' => $userExist->user_id,
						'username' => $userExist->username,
						'email' => $userExist->email,
						'role_id' => $userExist->role_id
					];
					$this->session->set_userdata($sessionfData);				
					return redirect('Admin1/dashboard');
				}
				elseif($userExist->role_id > '1'){
					$sessionfData = [
						'id' => $userExist->user_id,
						'username' => $userExist->username,
						'email' => $userExist->email,
						'college_id' => $userExist->college_id,
						'role_id' => $userExist->role_id
					];
					$this->session->set_userdata($sessionfData);				
					return redirect('coadmin/dashboard');
				}				
			}else{
				$this->session->set_flashdata('message', 'Email and Password are incorrect.');
				return redirect('admin/login');
			}
		}else{
			$this->login();
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		return redirect('admin/login');
	}
}
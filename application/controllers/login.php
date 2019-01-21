<?php
class Login extends My_Controller {
	public function index () {
		if ($this->session->userdata('user_id'))
			return redirect('admin/dashboard');
			/*check for the suerdata is set or not if set the execute/redirect 'admin/dashboard page'*/
		
		$this->load->helper('form');
		$this->load->view('public/admin_login');
	}
	
	public function admin_login () {
		$this->load->library('form_validation');
		
		//$this->form_validation->set_rules('username', 'User Name', 'required|alpha|trim');
		//$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->run('admin_login');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		
		if ($this->form_validation->run() ) { //if validation passes
			//Success.
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			//echo "username: $username and password: $password";
			$this->load->model('loginmodel');
			
			$user_id = $this->loginmodel->login_valid($username, $password);
			if ($user_id) {
				//echo 'credentials valid, login user.';
				//$this->load->library('session');
				$this->session->set_userdata('user_id', $user_id);
				/*$this->load-view('dashboard');*/
				return redirect('admin/dashboard');
				
			} else {
				//echo 'authentication failed.';
				$this->session->set_flashdata('login_faild', 'Invalid Username/Password!');
				/*set_flashdata() is set only once till the next step, set_flashdata automatically removed after completing the next step*/
				return redirect('login');
			}
		} else {
			//Failed.
			$this->load->view('public/admin_login');
			/*echo validation_errors();*/
		}
	}
	public function logout () {
		$this->session->unset_userdata('user_id');
		return redirect ('login');
	}
}
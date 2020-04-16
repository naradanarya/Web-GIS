<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	// Halaman Login
	public function index()
	{
			//Validation
		$this->form_validation->set_rules('username', 'Username', 'required', 
							array(	'required' 	=> '%s harus diisi' ));

			
		$this->form_validation->set_rules('password', 'Password', 'required', 
							array(	'required' 	=> '%s harus diisi' ));

		if ($this->form_validation->run())
		{
			$username = $this->input->post('username');
            $password = $this->input->post('password');

			//proses simple login
			$this->simple_login->login($username,$password);
		}
		//End Validation

		$data = array ('title' => 'Login Administrator');
		$this->load->view('backend/login/list', $data, FALSE);
	}
		//Fungsi Logout
	public function logout() {
		// Ambil fungsi logout di simple_login
		$this->simple_login->logout();
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
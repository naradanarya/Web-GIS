<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_Login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();

        //load data model user

        $this->CI->load->model('User_model');
	}

	//Fungsi Login
	public function login ($username, $password)
	{
			$check = $this->CI->user_model->login($username, $password);
			// Jika data user yang cocok maka session di buat
			// die;
			if ($check) {
					$id_user			= 	$check->id_user;
					$username			=	$check->username; 
					$akses_level	=	$check->akses_level;

					//Create session
					$this->CI->session->set_userdata('id_user', $id_user);
					$this->CI->session->set_userdata('username', $username);
					$this->CI->session->set_userdata('akses_level', $akses_level);
					//redirec ke halaman admin yang di proteksi
					redirect(base_url('backend/dashboard'), 'refresh');
			}else{
				// Jika tidak, Login Kembali
				$this->CI->session->set_flashdata('warning', 'Username atau Password tidak cocok!');
				redirect(base_url('backend/login'), 'refresh');
			}	
	}

	//Fungsi Cek / Session
	public function cek_login ()
	{
		//Memeriksa apakah session sudah ada
		if($this->CI->session->userdata('username')==""){
			$this->CI->session->set_flashdata('warning', 'Anda belum Login');
				redirect(base_url('backend/login'), 'refresh');
		}
	}

	public function norelog ()
	{
		//Memeriksa apakah session sudah ada
		if($this->CI->session->userdata('username') !== null){
			$this->CI->session->set_flashdata('warning', 'Anda belum Login');
				redirect(base_url('backend/dashboard'), 'refresh');
		}
	}
	//Fungsi Logout
	public function logout()
	{
		//Membuang semua session saat sudah login
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('akses_level');
		//Setelah di destroy maka di redirec
		$this->CI->session->set_flashdata('sukses', 'Anda berhasil Logout!');
				redirect(base_url('backend/login'), 'refresh');
	}	

}

/* End of file Simple_Login.php */
/* Location: ./application/libraries/Simple_Login.php */

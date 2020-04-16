<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		// PROTEKSI SESSION
		$this->simple_login->cek_login();

	}

	
	//Halaman utama admin Dasbor
	public function index()
	{	

		$konfigurasi = $this->konfigurasi_model->detail();

		$data = array (	'title'	=> 'Administrator',
						'content' 	=> 'backend/datapoint/list');

		$this->load->view('backend/layout/wrapper', $data, FALSE);

			
	}

}

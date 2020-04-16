<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
        // PROTEKSI SESSION
		$this->simple_login->cek_login();
		//AMBIL DATA
		$this->load->model('konfigurasi_model');
		
	}
	public function index()
	{	
		if($this->session->userdata('akses_level') == 'admin'){

        // AMBIL DATA
		$konfigurasi = $this->konfigurasi_model->detail();

		$data = array ( 'title'		        =>	'Konfigurasi Website',
						'konfigurasi'		=>	$konfigurasi,
						'content' 		    =>	'backend/konfigurasi/detail');
						
        $this->load->view('backend/layout/wrapper', $data, FALSE);
    }else{

		redirect(base_url('backend/login'), 'refresh');
	}

	}
	
	public function edit($setting_id)
    {	// Ambil data Konfigurasi
		if($this->session->userdata('akses_level') == 'admin'){
        
        $konfigurasi = $this->konfigurasi_model->detail($setting_id);
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('namaweb', 'Nama Web', 'required',
			array ( 'required'		=> 	'%s harus diisi!',
                    ));
        
                if($valid->run()){
                    // Setelah validasi
                    $dataupload = array();

                    $config['upload_path'] 		= './assets/upload/konfigurasi/';
                    $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
                    $config['max_size']  		= '2400'; // Dalam KB
                    $config['max_width'] 		= '2024';
                    $config['max_height']  		= '2024';
                    
                    $this->load->library('upload', $config);

                        if ( !$this->upload->do_upload('icon')){
                            $dataupload['icon'] = $konfigurasi->icon;

                        }else {
                            $fileData = $this->upload->data();
                            $pathicon = FCPATH.'assets/upload/konfigurasi/'; 
                            $get_icon = $pathicon.$konfigurasi->icon; 
                            unlink($get_icon); 
                            
                            $dataupload['icon'] = $fileData['file_name'];
                        }
                        if ( !$this->upload->do_upload('logo')){
                            $dataupload['logo'] = $konfigurasi->logo;

                        }else {
                            $fileData = $this->upload->data();
                            $pathlogo = FCPATH.'assets/upload/konfigurasi/'; 
                            $get_logo = $pathlogo.$konfigurasi->logo; 
                            unlink($get_logo); 

                            $dataupload['logo'] = $fileData['file_name'];
                        }

						$data = array (
											'setting_id'	=> $setting_id,
											'icon'	=>	 $dataupload['icon'],
                                            'logo'	=>	 $dataupload['logo'],
											'namaweb'	=>	$this->input->post('namaweb'), 
                        );
                        $this->konfigurasi_model->edit($data);
                        $this->session->set_flashdata('sukses', 'Data telah di edit!');
                        redirect(base_url('backend/konfigurasi/'), 'refresh');
                    } 
            $data = array ( 'title'		=>	'Edit Konfigurasi',
                            'konfigurasi' => $konfigurasi,
                            'content' 		=>	'backend/konfigurasi/edit');
            
            $this->load->view('backend/layout/wrapper', $data, FALSE);
        }else{

            redirect(base_url('backend/login'), 'refresh');
        }
                    
                }
		
    }

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapoint extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		// PROTEKSI SESSION
		$this->simple_login->cek_login();
		// AMBIL DATA di tabel datapoint
		$this->load->model('datapoint_model');

	}

	
	//Halaman utama admin Dasbor
	public function index()
	{	
		$konfigurasi = $this->konfigurasi_model->detail();


		$data = array (	'title'	=> 'Pemetaan SPBU Jakarta',
						'content' 	=> 'backend/datapoint/list');
 		$this->load->view('backend/layout/wrapper', $data, FALSE);
	}

	public function tampil_json()
	{	
		$data = $this->db->get('datapoint')->result();
		echo json_encode($data);
		
	}

	// INPUT
	public function tambah()
    {
             
        $this->form_validation->set_rules('nama_spbu', 'Nama SPBU', 'required');
        

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Input Data',
                'content' 	=> 'backend/datapoint/tambah'
            );
    
            $this->load->view('backend/layout/wrapper', $data, FALSE);
            
        } else {

            $data = array(
                'nama_spbu' =>  $this->input->post('nama_spbu'),
                'keterangan' =>  $this->input->post('keterangan'),
                'latitude' =>  $this->input->post('latitude'),
                'longitude' =>  $this->input->post('longitude'),

            );

            $this->datapoint_model->tambah($data);
            
            $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan :)');
            
            redirect('backend/datapoint');
            
            
        }
	}
	
	public function tabel()
    {
		$datalisting = $this->datapoint_model->listing();

        $data = array(
            'title' => 'Data SPBU',
            'datalisting' => $datalisting,
			'content' 	=> 'backend/datapoint/tabel'
        );

        $this->load->view('backend/layout/wrapper', $data, FALSE);
	}
	
	public function edit($id)
    {

		$detail = $this->datapoint_model->detail($id);

        $this->form_validation->set_rules('nama_spbu', 'Nama SPBU', 'required');
        

        if ($this->form_validation->run() == FALSE) {
            $data = array(
				'title' => 'Data SPBU',
				'detail' => $detail,
				'content' 	=> 'backend/datapoint/tabel'
			);
    
            $this->load->view('backend/layout/wrapper', $data, FALSE);
            
        } else {

            if ( $this->input->post('status') == "Normal Aktif") {
                $radius=300;
                $warna='blue';
            }
            if ( $this->input->post('status') == "Waspada") {
                $radius=3000;
                $warna='green';
            }
            if ( $this->input->post('status') == "Siaga") {
                $radius=10000;
                $warna='yellow';
            }
            if ( $this->input->post('status') == "Awas") {
                $radius=20000;
                $warna='red';
            }

            $data = array(
                'id' => $id,
                'nama_gunung' =>  $this->input->post('nama_gunung'),
                'keterangan' =>  $this->input->post('keterangan'),
                'radius' =>  $radius,
                'latitude' =>  $this->input->post('latitude'),
                'longitude' =>  $this->input->post('longitude'),
                'warna' =>  $warna,
                'status' => $this->input->post('status')
                

            );

            $this->m_home->update($data);
            
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit :)');
            
            redirect('home/tampil');
            
            
		}
	}


}

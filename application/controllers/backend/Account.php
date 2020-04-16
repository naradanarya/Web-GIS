<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		// PROTEKSI SESSION
		$this->simple_login->cek_login();

		$this->load->model('user_model');
		$this->load->model('konfigurasi_model');


	}

	

	public function index()
	{	if($this->session->userdata('akses_level') == 'admin'){

		$users = $this->user_model->listing();

		$data = array ( 'title'		=>	'Data User',
						'users'		=>	$users,
						'content' 		=>	'backend/account/list');
						
		$this->load->view('backend/layout/wrapper', $data, FALSE);

	}else{

		redirect(base_url('backend/login'), 'refresh');
	}

	}

	public function add()
	{		
	if($this->session->userdata('akses_level') == 'admin'){
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('username', 'Username', 'required|is_unique[users.username]',
			array ( 'required'		=> '%s harus diisi!',
					'is_unique'		=>	'%s sudah terdaftar. Buat silahlkan buat baru.'));

		$valid->set_rules('password', 'Password', 'required',
			array ( 'required'		=> '%s harus diisi!'));

		$valid->set_rules('akses_level', 'Akses Level', 'required',
			array ( 'required'		=> '%s harus diisi!'));
		
			if($valid->run()){
	
				$config['upload_path'] 		= './assets/upload/profile/';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['max_size']  		= '2400'; // Dalam KB
				$config['max_width'] 		= '2024';
				$config['max_height']  		= '2024';
				
				$this->load->library('upload', $config);
				// Proses Uplaod
				if ( ! $this->upload->do_upload('image')){				
						
				// End Validation
				
				$data = array ( 'title'		=>	'Tambah User',
								'error'		=>	$this->upload->display_errors(),
								'content' 		=>	'backend/account/add');
				
				$this->load->view('backend/layout/wrapper', $data, FALSE);
				// Masuk Database
				}else{
								$upload_gambar = array('upload_data' => $this->upload->data());
								// create thumbnail
								$config['image_library'] 	= 'gd2';
								$config['source_image'] 	= './assets/upload/profile/'.$upload_gambar['upload_data']['file_name'];
								// Lokasi thumbnail new
								$config['new_image'] 		= './assets/upload/profile/thumbs/';
								$config['create_thumb'] 	= TRUE;
								$config['maintain_ratio'] 	= TRUE;
								$config['width']         	= 120; //pixel
								$config['height']       	= 120; //pixel
								$config['thumb_marker']		= '';
		
								$this->load->library('image_lib', $config);
		
								$this->image_lib->resize();
							// end create thumbnail
		
							$i = $this->input;
							$data = array (	
												'username'	=>	$i->post('username'), 
												'password'	=>	SHA1($i->post('password')),
												'akses_level' => $i->post('akses_level'),

												'image'	=>	$upload_gambar['upload_data']['file_name'], 
						);
						
							$this->user_model->add($data);
							$this->session->set_flashdata('sukses', 'Data User telah di ditambahkan!');
							redirect(base_url('backend/account'), 'refresh');
				}
			}
	
			// End Masuk database
			$data = array ( 'title'			=>	'Tambah User',
							'content' 		=>	'backend/account/add');
			
			$this->load->view('backend/layout/wrapper', $data, FALSE);
	}else{

		redirect(base_url('backend/login'), 'refresh');
	}
}

	public function edit($id_user)
	{		
		if($this->session->userdata('akses_level') == 'admin'){
		$users = $this->user_model->detail($id_user);
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('username', 'Username', 'required',
			array ( 'required'		=> '%s harus diisi!'));

		$valid->set_rules('password', 'Password', 'required',
			array ( 'required'		=> '%s harus diisi!'));

		$valid->set_rules('akses_level', 'Akses Level', 'required',
			array ( 'required'		=> '%s harus diisi!'));
		
			if($valid->run()){	
				// Check jika gambar diganti
				if(!empty($_FILES['image']['name'])) {
	
	
				$config['upload_path'] 		= './assets/upload/profile/';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['max_size']  		= '2400'; // Dalam KB
				$config['max_width'] 		= '2024';
				$config['max_height']  		= '2024';
				
				$this->load->library('upload', $config);
				// Proses Uplaod
				if ( ! $this->upload->do_upload('image')){				
						
			// End Validation
			
			$data = array ( 'title'		=>	'Edit Profile'.$users->username,
							'users'	=>	$users,
							'error'		=>	$this->upload->display_errors(),
							'content' 		=>	'backend/account/edit');
			
			$this->load->view('backend/layout/wrapper', $data, FALSE);
			// Masuk Database
			}else{
							$upload_gambar = array('upload_data' => $this->upload->data());
							// create thumbnail
							$config['image_library'] 	= 'gd2';
							$config['source_image'] 	= './assets/upload/profile/'.$upload_gambar['upload_data']['file_name'];
							// Lokasi thumbnail new
							$config['new_image'] 		= './assets/upload/profile/thumbs/';
							$config['create_thumb'] 	= TRUE;
							$config['maintain_ratio'] 	= TRUE;
							$config['width']         	= 120; //pixel
							$config['height']       	= 120; //pixel
							$config['thumb_marker']		= '';
	
							$this->load->library('image_lib', $config);
	
							$this->image_lib->resize();
						// end create thumbnail
	
						$i = $this->input;
						$data = array (	
											'id_user'	=> $id_user,
											'username'	=>	$i->post('username'), 
											'password'	=>	SHA1($i->post('password')),
											'akses_level'	=>	$i->post('akses_level'), 
											'image'	=>	$upload_gambar['upload_data']['file_name'], 
					);
						// unlink (Delete) gambar dan thumbs
						$path = FCPATH.'assets/upload/profile/'; 
						$paththumbs = FCPATH.'assets/upload/profile/thumbs/'; 
						$get_image = $path.$users->image; 
						$get_thumbs = $paththumbs.$users->image; 
						unlink($get_image); 
						unlink($get_thumbs); 
						// Done unlink


						$this->user_model->edit($data);
						$this->session->set_flashdata('sukses', 'Data telah di edit!');
						redirect(base_url('backend/account'), 'refresh');
	
			}}else{
					// Edit produk tanpa ganti gambar
				$i = $this->input;
						$data = array (
											'id_user'	=> $id_user,
											'username'	=>	$i->post('username'), 
											'password'	=>	SHA1($i->post('password')),
											'akses_level'	=>	$i->post('akses_level'), 

						);
						$this->user_model->edit($data);
						$this->session->set_flashdata('sukses', 'Data telah di edit!');
						redirect(base_url('backend/account/'), 'refresh');
			}}
			
			// End Masuk database
			$data = array ( 'title'		=>	'Edit Profile: '.$users->username,
							'users'	=> 	$users,
							'content' 		=>	'backend/account/edit');
			
			$this->load->view('backend/layout/wrapper', $data, FALSE);
		}else{

			redirect(base_url('backend/login'), 'refresh');
		}
	}

	public function delete($id_user)
	{
		if($this->session->userdata('akses_level') == 'admin'){

		if ($id_user == $this->session->id_user) {

			$this->session->set_flashdata('gagal', 'User sedang aktif, tidak bisa dihapus.');
			redirect(base_url('backend/account'), 'refresh');
			
		}else{
			$users = $this->user_model->detail($id_user);

			$data = array ('id_user'	=> $id_user );
			// unlink (Delete) gambar dan thumbs
			$path = FCPATH.'assets/upload/profile/'; 
			$paththumbs = FCPATH.'assets/upload/profile/thumbs/'; 
			$get_image = $path.$users->image; 
			$get_thumbs = $paththumbs.$users->image; 
			unlink($get_image); 
			unlink($get_thumbs); 
			// Done unlink

			$this->user_model->delete($data);
			$this->session->set_flashdata('sukses', 'User telah di hapus!');
			redirect(base_url('backend/account'), 'refresh');

		}
	}else{

		redirect(base_url('backend/login'), 'refresh');
	}
			
	}

}

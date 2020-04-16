<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

		public function __construct()
		{
			parent::__construct();
			//Do your magic here
			$this->load->database();

		}
	

			//Listing semua user
		public function listing ()
		{
			$this->db->select('*');
			$this->db->from('users');	
			$this->db->order_by('id_user', 'desc');
			$query = $this->db->get();
			return $query->result();
		}
			//Detail user
		public function detail ($id_user)
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('id_user', $id_user);	
			$this->db->order_by('id_user', 'desc');
			$query = $this->db->get();
			return $query->row();
		}

		//Add
		public function add($data)
		{
			$this->db->insert('users', $data);
		}
			//Fungsi Login User
		public function login ($username, $password)
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where(array( 'username'=>$username, 
                                    'password'=>SHA1($password),
                                    ));	
			$this->db->order_by('id_user', 'desc');
			$query = $this->db->get();
			return $query->row();
		}


			//Tambah Akun
		public function tambah($data)
		{
			$this->db->insert('users', $data);
		}
			//Edit Akun
		public function edit($data)
		{
			$this->db->where('id_user', $data['id_user']);
			$this->db->update('users', $data);
		}

			//Delete Akun
		public function delete($data)
		{
			$this->db->where('id_user', $data['id_user']);
			$this->db->delete('users', $data);
		}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
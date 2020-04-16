<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

		public function __construct()
		{
			parent::__construct();
			//Do your magic here
			$this->load->database();

		}
			//Detail kategori
		public function detail()
		{
			$this->db->select('*');
			$this->db->from('konfigurasi');
			$this->db->where('setting_id', ('1'));	
			$this->db->order_by('setting_id', 'desc');
			$query = $this->db->get();
			return $query->row();
		}
			//Edit Akun
		public function edit($data)
		{
			$this->db->where('setting_id', $data['setting_id']);
			$this->db->update('konfigurasi', $data);
		}

}

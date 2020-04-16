<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class Datapoint_model extends CI_Model {

    public function tambah($data)
    {
        $this->db->insert('datapoint', $data);
        
    }

    public function listing ()
		{
			$this->db->select('*');
			$this->db->from('datapoint');	
			$this->db->order_by('id', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

    public function marker()
        {
            $this->db->select('*');
            $this->db->from('datapoint');
            $this->db->order_by('id', 'desc');
            return $this->db->get()->result();
        }

    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('datapoint');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function update($data)
    {
        
        $this->db->where('id', $data['id']);
        $this->db->update('datapoint', $data);
        
        
    }

    public function delete($id)
    {
        
        $this->db->where('id', $id);
        $this->db->delete('datapoint');
        
        
    }

}

/* End of file M_home.php */

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_data_pc extends CI_Model {

	public function insert_data($tabel, $data)
	{
		$query = $this->db->insert($tabel, $data);
		return $query;
	}

	public function hapus_data($id)
    {
		$this->db->where($id);
		$this->db->delete('tbl_data_pc');
    }

	public function get_data_pegawai()
    {
        $this->db->select('*');
        $this->db->from('data_pegawai');

        $query = $this->db->get();
        return $query->result_array();
    }
}

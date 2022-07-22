<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_data_pc extends CI_Model
{

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

	public function get_data_pc()
	{
		$this->db->select('*');
		$this->db->from('tbl_data_pc');
		$this->db->order_by('id_pc', 'DESC');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_data_pegawai()
	{
		$this->db->select('*');
		$this->db->from('data_pegawai');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_data_ruangan()
	{
		$this->db->select('*');
		$this->db->from('tbl_ruangan');

		$query = $this->db->get();
		return $query->result_array();
	}
}

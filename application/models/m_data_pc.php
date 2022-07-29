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

	public function hapus_transaksi($id)
	{
		$this->db->where($id);
		$this->db->delete('tbl_transaksi');
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

	public function get_code_pc()
	{
		$this->db->select('RIGHT(tbl_data_pc.kode_pc,4) as kode_pc', FALSE);
		$this->db->order_by('kode_pc', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_data_pc');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode_pc) + 1;
		} else {
			$kode = 1;
		}
		$batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodetampil = "IT-PABJN-PC-" . $batas;
		return $kodetampil;
	}

	public function get_data_transaksi()
	{
		$tahun_a = $this->session->userdata('admin_ta');

		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->where('YEAR(tgl_transaksi)', $tahun_a);
		$this->db->order_by('id_transaksi', 'DESC');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_code_transaksi()
	{
		$this->db->select('RIGHT(tbl_transaksi.kode_transaksi,4) as kode_transaksi', FALSE);
		$this->db->order_by('kode_transaksi', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_transaksi');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode_transaksi) + 1;
		} else {
			$kode = 1;
		}
		$batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodetampil = "IT-PABJN-TRX-" . $batas;
		return $kodetampil;
	}

	public function get_perawatan_pc()
	{
		$tahun_a = $this->session->userdata('admin_ta');
		$bulan = date('m');

		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->where('YEAR(tgl_transaksi)', $tahun_a);
		$this->db->where('MONTH(tgl_transaksi)', $bulan);
		$this->db->where('realisasi', 'Perawatan PC');
		$this->db->order_by('id_transaksi', 'DESC');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_perawatan_laptop()
	{
		$tahun_a = $this->session->userdata('admin_ta');
		$bulan = date('m');

		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->where('YEAR(tgl_transaksi)', $tahun_a);
		$this->db->where('MONTH(tgl_transaksi)', $bulan);
		$this->db->where('realisasi', 'Perawatan Laptop');
		$this->db->order_by('id_transaksi', 'DESC');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_perawatan_printer()
	{
		$tahun_a = $this->session->userdata('admin_ta');
		$bulan = date('m');

		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->where('YEAR(tgl_transaksi)', $tahun_a);
		$this->db->where('MONTH(tgl_transaksi)', $bulan);
		$this->db->where('realisasi', 'Perawatan Printer');
		$this->db->order_by('id_transaksi', 'DESC');

		$query = $this->db->get();
		return $query->result_array();
	}
}

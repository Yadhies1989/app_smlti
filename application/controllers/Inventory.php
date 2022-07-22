<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventory extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function data_pc()
	{
		$data['title'] = 'Data Personal Computer (PC)';
		$data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
		$data['data'] = $this->db->get('tbl_data_pc')->result_array();
        $data['pegawai'] = $this->m_data_pc->get_data_pegawai();

		$this->load->view('Template/navbar', $data);
		$this->load->view('Template/sidebar', $data);
		$this->load->view('Inventory/v_data_pc', $data);
		$this->load->view('Template/footer');
	}

	public function get_user()
    {
        $user_selected = NULL;
        echo "<option value=''>Pilih Pegawai</option>";
        $query = $this->db->query("SELECT * FROM data_pegawai")->result_array();
        foreach($query as $row){
            echo '<option value="'.$row['id_pegawai'].'" '.(($row['nama']==$user_selected)?'selected="selected"':"").'>'.$row['nama'].'</option>';
        }
    }

    public function proses_input_data_pc()
    {
        $data = array(
            'nama_pc'        => $this->input->post('nama_pc', true),
            'nama_monitor'   => $this->input->post('nama_monitor', true),
            'sn_pc'          => $this->input->post('sn_pc', true),
            'sn_monitor'     => $this->input->post('sn_monitor', true),
            'tgl_beli'       => $this->input->post('tgl_beli', true),
            'penguasaan'     => $this->input->post('penguasaan', true),
            'nup'            => $this->input->post('nup', true),
            'ruangan'        => $this->input->post('ruangan', true),
            'user'        	 => $this->input->post('user', true),
            'date_created'   => date('Y-m-d')
        );

        $this->m_data_pc->insert_data('tbl_data_pc',$data);

        $this->session->set_flashdata('pesan', 'Di Tambahkan');
        redirect('inventory/data_pc');
    }

    public function ubah_data_pc($id)
    {
        $data = array(
            'nama_pc'        => $this->input->post('nama_pc', true),
            'nama_monitor'   => $this->input->post('nama_monitor', true),
            'sn_pc'          => $this->input->post('sn_pc', true),
            'sn_monitor'     => $this->input->post('sn_monitor', true),
            'tgl_beli'       => $this->input->post('tgl_beli', true),
            'penguasaan'     => $this->input->post('penguasaan', true),
            'nup'            => $this->input->post('nup', true),
            'ruangan'        => $this->input->post('ruangan', true),
            'user'        	 => $this->input->post('user', true),
            'date_updated'   => date('Y-m-d')
        );

        $this->db->where('id_pc', $id);
        $this->db->update('tbl_data_pc', $data);
        $this->session->set_flashdata('pesan', 'Di Ubah !!!');
        redirect('inventory/data_pc');
    }

    public function hapus_data_pc($id)
	{
		$where = array('id_pc' => $id);
		$this->m_data_pc->hapus_data($where, 'tbl_data_pc');
		$this->session->set_flashdata('pesan', 'Di Hapus !!!');
		redirect('inventory/data_pc');
	}

	
}

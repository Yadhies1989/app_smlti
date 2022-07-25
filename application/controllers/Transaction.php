<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function data_transaksi()
    {
        $data['title'] = 'Data Transaksi';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->load->view('Template/navbar', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Transaction/v_data-transaction', $data);
        $this->load->view('Template/footer');
    }

    public function proses_input_data_trx()
    {
        $data = array(
            'nama_transaksi' => $this->input->post('nama_transaksi', true),
            'tgl_transaksi'  => $this->input->post('tgl_transaksi'),
            'harga_barang'   => $this->input->post('harga_barang', true),
            'quantity'       => $this->input->post('quantity', true),
            'total_harga'    => $this->input->post('total_harga', true),
            'tgl_beli'       => $this->input->post('tgl_beli', true),
            'realisasi'      => $this->input->post('realisasi', true),
            'keterangan'     => $this->input->post('keterangan', true),
            'file_upload'    => $this->input->post('file_upload', true),
            'keterangan'     => $this->input->post('keterangan', true),
            'date_created'   => date('Y/m/d H:i:s')
        );

        $config['upload_path']        = './upload/surat_masuk';
        $config['allowed_types']      = 'gif|jpg|png|pdf';
        $config['max_size']           = '2048';
        $config['max_width']          = '3000';
        $config['max_height']         = '3000';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_upload')) {
            $up_data         = $this->upload->data();
        } else {
        }

        $this->m_data_pc->insert_data('tbl_transaksi', $data);

        $this->session->set_flashdata('pesan', 'Di Tambahkan');
        redirect('transaction/data_transaksi');
    }
}

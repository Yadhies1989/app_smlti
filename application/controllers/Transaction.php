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
        $data['transaksi'] = $this->m_data_pc->get_data_transaksi();
        $data['kode_trx'] = $this->m_data_pc->get_code_transaksi();
        $data['tahun_a'] = $this->session->userdata('admin_ta');

        $this->load->view('Template/navbar', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Transaction/v_data-transaction', $data);
        $this->load->view('Template/footer');
    }

    public function proses_input_data_trx()
    {
        $kode_trx = strtolower($this->input->post('kode_trx', true));
        $upload_data = $_FILES['file_upload']['name'];

        if ($upload_data) {
            $config['upload_path']        = './upload/transaksi';
            $config['allowed_types']      = 'pdf';
            $config['max_size']           = '2048';
            $config['max_width']          = '3000';
            $config['max_height']         = '3000';
            $config['file_name']          = $kode_trx;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_upload')) {
                $upload_name = $this->upload->data('file_name');

                $data = array(
                    'nama_transaksi' => $this->input->post('nama_transaksi', true),
                    'kode_transaksi' => $this->input->post('kode_trx', true),
                    'tgl_transaksi'  => $this->input->post('tgl_transaksi'),
                    'harga_barang'   => $this->input->post('harga_barang', true),
                    'quantity'       => $this->input->post('quantity', true),
                    'total_harga'    => $this->input->post('total_harga', true),
                    'realisasi'      => $this->input->post('realisasi', true),
                    'file_upload'    => $upload_name,
                    'keterangan'     => $this->input->post('keterangan', true),
                    'date_created'   => date('Y/m/d H:i:s')
                );

                $this->m_data_pc->insert_data('tbl_transaksi', $data);

                $this->session->set_flashdata('pesan', 'Di Tambahkan');
                redirect('transaction/data_transaksi');
            } else {
                $this->session->set_flashdata('nama_menu', 'Tipe File Tidak Support Atau File Terlalu Besar !!!');
                redirect('transaction/data_transaksi');
            }
        }
    }

    public function proses_update_data_trx()
    {
        $kode_trx = strtolower($this->input->post('kode_trx', true));


        $data['transaksi'] = $this->db->get_where('tbl_transaksi', ['kode_transaksi' => $kode_trx])->row_array();

        $upload_image = $_FILES['file_upload']['name'];

        if ($upload_image) {
            $config['upload_path']        = './upload/transaksi';
            $config['allowed_types']      = 'pdf';
            $config['max_size']           = '2048';
            $config['max_width']          = '3000';
            $config['max_height']         = '3000';
            $config['file_name']          = $kode_trx . '-edit';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_upload')) {
                $old_image = $data['transaksi']['file_upload'];
                if ($old_image != 'default.pdf') {
                    unlink(FCPATH . "upload/transaksi/" . $old_image);
                }

                $new_image = $this->upload->data('file_name');

                $this->db->set('file_upload', $new_image);
            } else {
                $this->session->set_flashdata('nama_menu', 'Tipe File Tidak Support Atau File Terlalu Besar !!!');
                redirect('transaction/data_transaksi');
            }
        }

        $data = array(
            'nama_transaksi' => $this->input->post('nama_transaksi', true),
            'kode_transaksi' => $this->input->post('kode_trx', true),
            'tgl_transaksi'  => $this->input->post('tgl_transaksi'),
            'harga_barang'   => $this->input->post('harga_barang', true),
            'quantity'       => $this->input->post('quantity', true),
            'total_harga'    => $this->input->post('total_harga', true),
            'realisasi'      => $this->input->post('realisasi', true),
            'keterangan'     => $this->input->post('keterangan', true),
            'update_created'   => date('Y/m/d H:i:s')
        );

        $this->db->update('tbl_transaksi', $data, array('kode_transaksi' => $kode_trx));

        $this->session->set_flashdata('pesan', 'Di Ubah !!!');
        redirect('transaction/data_transaksi');
    }

    public function delete_data($id)
    {
        $where = array('id_transaksi' => $id);
        $row = $this->db->where('id_transaksi', $id)->get('tbl_transaksi')->row_array();
        unlink('./upload/transaksi/' . $row['file_upload']);

        $this->m_data_pc->hapus_transaksi($where, 'tbl_transaksi');
        $this->session->set_flashdata('pesan', 'Di Hapus !!!');
        redirect('transaction/data_transaksi');
    }

    public function laporan()
    {
        $data['title'] = 'Laporan Transaksi';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['transaksi'] = $this->m_data_pc->get_data_transaksi();
        $data['kode_trx'] = $this->m_data_pc->get_code_transaksi();
        $data['tahun_a'] = $this->session->userdata('admin_ta');
        $data['perawatan_pc'] = $this->m_data_pc->get_perawatan_pc();
        $data['perawatan_printer'] = $this->m_data_pc->get_perawatan_printer();
        $data['perawatan_laptop'] = $this->m_data_pc->get_perawatan_laptop();

        $this->load->view('Template/navbar', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Transaction/v_laporan-transaction', $data);
        $this->load->view('Template/footer');
    }

    public function load_karyawan()
    {
        $karyawan = $this->input->get('karyawan');
        // $karyawan = 3;

        if ($karyawan == 0) {
            $data = $this->db->get('tbl_transaksi')->result();
        } else {
            $data = $this->db->get_where('tbl_transaksi', ['MONTH(tgl_transaksi)' => $karyawan])->result();
        }
        echo json_encode($data);
    }
}

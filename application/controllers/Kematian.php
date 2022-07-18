<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kematian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kematian_model');
    }

    public function index()

    {
        $data['title'] = 'Data Kematian';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kematian'] = $this->Kematian_model->getAllKematian();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kematian/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Form Tambah Data Kematian';

        $this->form_validation->set_rules('id_pend', 'ID', 'required|numeric');
        $this->form_validation->set_rules('tgl_kematian', 'Tanggal Kematian', 'required');
        $this->form_validation->set_rules('sebab', 'Sebab', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kematian/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Kematian_model->tambahDataKematian();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    		Berhasil</div>');
            redirect('kematian');
        }
    }

    public function hapus($id_kematian)
    {
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->Kematian_model->hapusDataKematian($id_kematian);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('kematian');
    }

    // public function detail($id_kelahiran)
    // {
    //     $data['user'] = $this->db->get_where('users', ['email' =>
    //     $this->session->userdata('email')])->row_array();

    //     $data['title'] = 'Detail Data Kelahiran';
    //     $data['kelahiran'] = $this->Kelahiran_model->getKelahiranById($id_kelahiran);
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('kelahiran/detail', $data);
    //     $this->load->view('templates/footer');
    // }

    public function ubah($id_kematian)
    {
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kematian'] = $this->Kematian_model->getKematianById($id_kematian);
        $data['title'] = 'Form Edit Data Kematian';

        // $data['jenis_kelamin'] = ['Laki-Laki', 'Perempuan'];

        $this->form_validation->set_rules('id_kematian', 'ID', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tgl_kematian', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('sebab', 'Sebab', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kematian/ubah');
            $this->load->view('templates/footer');
        } else {
            $this->Kematian_model->ubahDataKematian();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    		Berhasil</div>');
            redirect('kematian');
        }
    }
}

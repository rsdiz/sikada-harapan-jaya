<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelahiran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kelahiran_model');
    }

    public function index()

    {
        $data['title'] = 'Data Kelahiran';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kelahiran'] = $this->Kelahiran_model->getAllKelahiran();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelahiran/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Form Tambah Data Kelahiran';

        // $this->form_validation->set_rules('id_kelahiran', 'ID', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('id_kk', 'KK', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kelahiran/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Kelahiran_model->tambahDataKelahiran();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    		Berhasil</div>');
            redirect('kelahiran');
        }
    }

    public function hapus($id_kelahiran)
    {
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->Kelahiran_model->hapusDataKelahiran($id_kelahiran);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('kelahiran');
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

    public function ubah($id_kelahiran)
    {
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kelahiran'] = $this->Kelahiran_model->getKelahiranById($id_kelahiran);
        $data['title'] = 'Form Edit Data Kelahiran';

        $data['jenis_kelamin'] = ['Laki-Laki', 'Perempuan'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kelahiran/ubah');
            $this->load->view('templates/footer');
        } else {
            $this->Kelahiran_model->ubahDataKelahiran();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    		Berhasil</div>');
            redirect('kelahiran');
        }
    }
}

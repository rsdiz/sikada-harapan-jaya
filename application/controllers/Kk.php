<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KK_model');
        $this->load->model('AK_model');
    }

    public function index()

    {
        $data['title'] = 'Data Kartu Keluarga';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kk'] = $this->KK_model->getAllKK();
        if ($this->input->post('keyword')) {
            $data['kk'] = $this->KK_model->cariDataKK();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Form Tambah Data Kartu Keluarga';

        $this->form_validation->set_rules('no_kk', 'NO KK', 'required|numeric');
        // $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('nama_kepala', 'Nama Kepala Keluarga', 'required');
        // $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('desa', 'Desa', 'required');
        $this->form_validation->set_rules('rt', 'RT', 'required');
        $this->form_validation->set_rules('rw', 'RW', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('prov', 'Provinsi', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kk/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->KK_model->tambahDataKK();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil</div>');
            redirect('kk');
        }
    }

    public function hapus($id_kk)
    {
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->KK_model->hapusDataKK($id_kk);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('kk');
    }

    public function detail($id_kk)
    {
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Detail Data Kartu Keluarga';
        $data['kk'] = $this->KK_model->getKKById($id_kk);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kk/detail', $data);
        $this->load->view('templates/footer');
    }

    // public function detailak($no_kk)
    // {
    //     $data['user'] = $this->db->get_where('users', ['email' =>
    //     $this->session->userdata('email')])->row_array();

    //     $data['title'] = 'Detail Data Anggota Keluarga';
    //     // $data['AK'] = $this->KK_model->getAKById($no_kk);
    //     $data['AK'] = $this->KK_model->getKKById($no_kk);
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('kk/detail', $data);
    //     $this->load->view('templates/footer');
    // }

    public function ubah($id_kk)
    {
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kk'] = $this->KK_model->getKKById($id_kk);
        $data['title'] = 'Form Edit Data Kartu Keluarga';

        // $data['status'] = ['Anak', 'Ayah', 'Ibu'];


        $this->form_validation->set_rules('no_kk', 'NO KK', 'required|numeric');
        // $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('nama_kepala', 'Nama Kepala Keluarga', 'required');
        // $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('desa', 'Desa', 'required');
        $this->form_validation->set_rules('rt', 'RT', 'required');
        $this->form_validation->set_rules('rw', 'RW', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('prov', 'Provinsi', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kk/ubah');
            $this->load->view('templates/footer');
        } else {
            $this->KK_model->ubahDataKK();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil</div>');
            redirect('kk');
        }
    }

    public function ak($id_kk)

    {
        $data['title'] = 'Data Anggota KK';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();;
        $data['ak'] = $this->KK_model->getAllAK($id_kk);
        $data['anggota'] = $this->KK_model->getAllAnggota($id_kk);
        // var_dump($data['ak']);
        // die();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kk/anggota', $data);
        $this->load->view('templates/footer');
    }

    public function tambahAK($id_kk)
    {
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['ak'] = $this->KK_model->getAllKeluarga($id_kk);

        $this->form_validation->set_rules('id_kk', 'ID KK', 'required|numeric');
        $this->form_validation->set_rules('id_pend', 'iD Penduduk', 'required|numeric');
        $this->form_validation->set_rules('hubungan', 'Hubungan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kk/tambah_anggota');
            $this->load->view('templates/footer');
        } else {
            $this->KK_model->tambahAK();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil</div>');
            redirect('kk');
        }
    }

    public function pa($id_kk)
    {
        $this->load->model('KK_model');
        $data['ak'] = $this->KK_model->getAllAK($id_kk);
        $data['anggota'] = $this->KK_model->getAllAnggota($id_kk);

        $this->load->view('kk/printanggota', $data);
    }
}

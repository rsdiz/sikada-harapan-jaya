<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penduduk_model');
    }

    public function index()

    {
        $data['title'] = 'Data Penduduk';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['penduduk'] = $this->Penduduk_model->getAllPenduduk();
        if ($this->input->post('keyword')) {
            $data['penduduk'] = $this->Penduduk_model->cariDataPenduduk();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penduduk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Form Tambah Data Penduduk';

        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('desa', 'Desa', 'required');
        $this->form_validation->set_rules('rt', 'RT', 'required');
        $this->form_validation->set_rules('rw', 'RW', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'required');
        // $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penduduk/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Penduduk_model->tambahDataPenduduk();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil</div>');
            redirect('penduduk');
        }
    }

    public function hapus($nik)
    {
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->Penduduk_model->hapusDataPenduduk($nik);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('penduduk');
    }

    public function detail($nik)
    {
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Detail Data Penduduk';
        $data['penduduk'] = $this->Penduduk_model->getPendudukById($nik);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penduduk/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($nik)
    {
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['penduduk'] = $this->Penduduk_model->getPendudukById($nik);
        $data['title'] = 'Form Edit Data Penduduk';

        $data['jenis_kelamin'] = ['LK', 'PR'];
        $data['status_kawin'] = ['Belum Kawin', 'Kawin'];
        $data['agama'] = ['Islam', 'Kristen', 'Hindu', 'Budha', 'Konghucu'];
        // $data['pendidikan'] = ['SD', 'SMP', 'SMA', 'Diploma', 'Sarjana'];


        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('desa', 'Desa', 'required');
        $this->form_validation->set_rules('rt', 'RT', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penduduk/ubah');
            $this->load->view('templates/footer');
        } else {
            $this->Penduduk_model->ubahDataPenduduk();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil</div>');
            redirect('penduduk');
        }
    }
}

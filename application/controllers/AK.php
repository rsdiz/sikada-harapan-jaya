<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AK extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AK_model');
    }

    public function index()

    {
        $data['title'] = 'Data Anggota KK';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['ak'] = $this->AK_model->getAllAK($data['tb_pend']['id_pend'], $data['tb_anggota']['id_kk']);
        if ($this->input->post('keyword')) {
            $data['ak'] = $this->AK_model->cariDataAK();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ak/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Form Tambah Data Anggota Keluarga';

        $this->form_validation->set_rules('no_kk', 'NO KK', 'required|numeric');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('nama_kepala', 'Nama Kepala Keluarga', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
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
            redirect('kk/a');
        }
    }

    public function hapus($no_kk)
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->AK_model->hapusDataAnggotaKeluarga($no_kk);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('kk');
    }

    public function detail($no_kk)
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Detail Data Kartu Keluarga';
        $data['ak'] = $this->AK_model->getAllAK($no_kk);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ak/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($no_kk)
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kk'] = $this->KK_model->getKKById($no_kk);
        $data['title'] = 'Form Edit Data Kartu Keluarga';

        $data['status'] = ['Anak', 'Ayah', 'Ibu'];


        $this->form_validation->set_rules('no_kk', 'NO KK', 'required|numeric');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('nama_kepala', 'Nama Kepala Keluarga', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
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

    public function ak()

    {
        $data['title'] = 'Kartu Keluarga';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['anggota'] = $this->AK_model->getAllAK();
        if ($this->input->post('keyword')) {
            $data['anggota'] = $this->AK_model->cariAnggota();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kk/anggota', $data);
        $this->load->view('templates/footer');
    }

    // public function pa()
    // {
    //     $data['anggota'] = $this->AK_model->getAllAK();
    //     $this->load->view('kk/printanggota', $data);
    // }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pindahdomisili extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PindahDomisili_model');
    }

    public function index()

    {
        $data['title'] = 'Data Pindah Domisili';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pindahdomisili'] = $this->PindahDomisili_model->getAllPindahDomisili();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pindahdomisili/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Form Tambah Data Pindah Domisili';

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('id_pend', 'penduduk', 'required');
        $this->form_validation->set_rules('ket', 'Keterangan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pindahdomisili/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->PindahDomisili_model->tambahDataPindahDomisili();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    		Berhasil</div>');
            redirect('pindahdomisili');
        }
    }

    public function hapus($id_pindah)
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->PindahDomisili_model->hapusDataPindahDomisili($id_pindah);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('pindahdomisili');
    }

    public function detail($id_pindah)
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Detail Data Domisili';
        $data['domisili'] = $this->PindahDomisili_model->getPindahDomisiliById($id_pindah);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pindahdomisili/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id_pindah)
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['domisili'] = $this->PindahDomisili_model->getPindahDomisiliById($id_pindah);
        $data['title'] = 'Form Edit Data Pindah Domisili';

        // $data['jenis_kelamin'] = ['Laki-Laki', 'Perempuan'];


        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('id_pend', 'penduduk', 'required');
        $this->form_validation->set_rules('ket', 'Keterangan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pindahdomisili/ubah');
            $this->load->view('templates/footer');
        } else {
            $this->PindahDomisili_model->ubahDataDomisili();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    		Berhasil</div>');
            redirect('pindahdomisili');
        }
    }
}

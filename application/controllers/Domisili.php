<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Domisili extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Domisili_model');
    }

    public function index()

    {
        $data['title'] = 'Data Domisili';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['domisili'] = $this->Domisili_model->getAllDomisili();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('domisili/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Form Tambah Data Domisili';

        $this->form_validation->set_rules('id_domisili', 'ID', 'required|numeric');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('asal', 'Asal', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('domisili/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Domisili_model->tambahDataDomisili();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    		Berhasil</div>');
            redirect('domisili');
        }
    }

    public function hapus($id_domisili)
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->Domisili_model->hapusDataDomisili($id_domisili);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('domisili');
    }

    // public function detail($id_domisili)
    // {
    //     $data['user'] = $this->db->get_where('tb_user', ['email' =>
    //     $this->session->userdata('email')])->row_array();

    //     $data['title'] = 'Detail Data Domisili';
    //     $data['domisili'] = $this->Domisili_model->getDomisiliById($id_domisili);
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('domisili/detail', $data);
    //     $this->load->view('templates/footer');
    // }

    public function ubah($id_domisili)
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['domisili'] = $this->Domisili_model->getDomisiliById($id_domisili);
        $data['title'] = 'Form Edit Data Domisili';

        // $data['jenis_kelamin'] = ['Laki-Laki', 'Perempuan'];

        $this->form_validation->set_rules('id_domisili', 'ID', 'required|numeric');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('asal', 'Asal', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('domisili/ubah');
            $this->load->view('templates/footer');
        } else {
            $this->Domisili_model->ubahDataDomisili();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    		Berhasil</div>');
            redirect('domisili');
        }
    }
}

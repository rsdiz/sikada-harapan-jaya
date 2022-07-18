<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_model');
    }

    public function index()

    {
        $data['title'] = 'Pengguna Sistem';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pengguna'] = $this->Pengguna_model->getAllPengguna();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengguna/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Form Tambah Pengguna Sistem';

        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('image', 'Image', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pengguna/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Pengguna_model->tambahDataPengguna();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    		Berhasil</div>');
            redirect('domisili');
        }
    }

    public function hapus($id_user)
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->Pengguna_model->hapusDataPengguna($id_user);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('pengguna');
    }

    // public function detail($id_user)
    // {
    //     $data['user'] = $this->db->get_where('tb_user', ['email' =>
    //     $this->session->userdata('email')])->row_array();

    //     $data['title'] = 'Detail Data Pe';
    //     $data['domisili'] = $this->Domisili_model->getDomisiliById($id_user);
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('domisili/detail', $data);
    //     $this->load->view('templates/footer');
    // }

    public function ubah($id_user)
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['pengguna'] = $this->Pengguna_model->getPenggunaById($id_user);
        $data['title'] = 'Form Edit Data Pengguna Sistem';

        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('image', 'Image', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pengguna/ubah');
            $this->load->view('templates/footer');
        } else {
            $this->Pengguna_model->ubahDataPengguna();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    		Berhasil</div>');
            redirect('pengguna');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pengguna/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong current password!</div>');
                redirect('pengguna/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    New password cannot be the same as current password!</div>');
                    redirect('pengguna/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password changed!</div>');
                    redirect('pengguna/changepassword');
                }
            }
        }
    }
}

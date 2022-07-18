<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'LOGIN';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
        if ($user) {

            if ($user['is_active'] == 1) {

                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('Superadmin');
                    } else {
                        redirect('Admin');
                    }
                } else {
                    $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
                    Password salah
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
            Email tidak aktif
          </div>');
            }
        } else {
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
            Email tidak terdaftar
          </div>');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]');
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password tidak sama',
            'min_length' => 'Password terlalu pendek',
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {

            $data['judul'] = 'REGISTER';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'image' => 'deafult.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
            Selamat, Anda sudah terdaftar. Silakan login
          </div>');
            redirect('auth');
        }
    }
}

<?php
class Pengguna_model extends CI_Model
{
    public function getAllPengguna()
    {
        $this->db->select('*');
        $this->db->join(
            'role',
            'users.role_id=role.id_role',
            'inner'
        );
        return $this->db->get('users')->result_array();
    }

    public function tambahDataPengguna()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "email" => $this->input->post('email', true),
            "image" => $this->input->post('image', true),
            "password" => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            "role_id" => 2,
            "is_active" => 1,
            "date_created" => time(),
        ];
        // var_dump($data);
        // die();

        $this->db->insert('users', $data);
        redirect('pengguna');
    }

    public function hapusDataPengguna($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('users');
    }

    public function getPenggunaById($id_user)
    {
        return $this->db->get_where('users', ['id_user' => $id_user])->row_array();
    }

    public function ubahDataPengguna()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "email" => $this->input->post('email', true),
            "image" => $this->input->post('image', true),
            "password" => $this->input->post('password', true),
        ];
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('users', $data);
        redirect('pengguna');
    }
}

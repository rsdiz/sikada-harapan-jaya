<?php
class Enkripsi_model extends CI_Model
{
    public function getAllEnkripsi()
    {
        return $this->db->get('file')->result_array();
    }

    public function tambahDataEnkripsi($data)
    {
        $this->db->insert('file', $data);
    }

    public function get_user()
    {
        $this->db->select('*');
        $this->db->join(
            'users',
            'file.id_user=users.id_user',
            'inner'
        );
        return $this->db->get('file')->result_array();
    }

    public function getAllData()
    {
        return $this->db->get('users')->result_array();
    }
}

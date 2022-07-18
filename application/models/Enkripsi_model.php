<?php
class Enkripsi_model extends CI_Model
{
    public function getAllEnkripsi()
    {
        return $this->db->get('tb_file')->result_array();
    }

    public function tambahDataEnkripsi($data)
    {
        $this->db->insert('tb_file', $data);
    }

    public function get_user()
    {
        $this->db->select('*');
        $this->db->join(
            'tb_user',
            'tb_file.id_user=tb_user.id_user',
            'inner'
        );
        return $this->db->get('tb_file')->result_array();
    }

    public function getAllData()
    {
        return $this->db->get('tb_user')->result_array();
    }
}

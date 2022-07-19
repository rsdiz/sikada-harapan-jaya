<?php
class Dekripsi_model extends CI_Model
{
    public function getAllDekripsi()
    {
        return $this->db->get('users')->result_array();
    }

    public function getAllFile($id_user)
    {
        return $this->db->get_where('file', ['id_user' => $id_user])->result_array();
    }

    public function getWhereFile($id_file)
    {
        return $this->db->get_where('file', ['id_file' => $id_file])->row_array();
    }

    public function getDekripsiById($id_file)
    {
        return $this->db->get_where('file', ['id_file' => $id_file])->row_array();
    }

    public function hapusDataDekripsi($id_file)
    {
        $this->db->where('id_file', $id_file);
        $this->db->delete('file');
    }

    public function formDataDekripsi($data)
    {
        $this->db->where('id_file', $data);
        $this->db->update('file', $data);
        // redirect('dekripsi');
    }
}

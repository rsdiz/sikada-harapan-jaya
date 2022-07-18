<?php
class Dekripsi_model extends CI_Model
{
    public function getAllDekripsi()
    {
        return $this->db->get('tb_user')->result_array();
    }

    public function getAllFile()
    {
        return $this->db->get('tb_file')->result_array();
    }

    public function getWhereFile($id_file)
    {
        return $this->db->get_where('tb_file', ['id_file' => $id_file])->row_array();
    }

    public function getDekripsiById($id_file)
    {
        return $this->db->get_where('tb_file', ['id_file' => $id_file])->row_array();
    }

    public function hapusDataDekripsi($id_file)
    {
        $this->db->where('id_file', $id_file);
        $this->db->delete('tb_file');
    }

    public function formDataDekripsi($data)
    {
        $this->db->where('id_file', $data);
        $this->db->update('tb_file', $data);
        // redirect('dekripsi');
    }
}

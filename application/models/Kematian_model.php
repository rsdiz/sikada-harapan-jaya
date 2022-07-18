<?php
class Kematian_model extends CI_Model
{
    public function getAllKematian()
    {
        return $this->db->get('kematian')->result_array();
    }

    public function tambahDataKematian()
    {
        $data = [
            "id_penduduk" => $this->input->post('id_penduduk', true),
            "tgl_kematian" => $this->input->post('tgl_kematian', true),
            "sebab" => $this->input->post('sebab', true),
        ];

        $this->db->insert('kematian', $data);
        redirect('kematian');
    }

    public function hapusDataKematian($id_kematian)
    {
        $this->db->where('id_kematian', $id_kematian);
        $this->db->delete('kematian');
    }

    public function getKematianById($id_kematian)
    {
        return $this->db->get_where('kematian', ['id_kematian' => $id_kematian])->row_array();
    }

    public function ubahDataKematian()
    {
        $data = [
            "id_penduduk" => $this->input->post('id_penduduk', true),
            "nama" => $this->input->post('nama', true),
            "tgl_kematian" => $this->input->post('tgl_kematian', true),
            "sebab" => $this->input->post('sebab', true),
        ];
        $this->db->where('id_kematian', $this->input->post('id_kematian'));
        $this->db->update('kematian', $data);
        redirect('kematian');
    }
}

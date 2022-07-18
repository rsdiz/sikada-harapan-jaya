<?php
class Kematian_model extends CI_Model
{
    public function getAllKematian()
    {
        return $this->db->get('tb_kematian')->result_array();
    }

    public function tambahDataKematian()
    {
        $data = [
            "id_pend" => $this->input->post('id_pend', true),
            "tgl_kematian" => $this->input->post('tgl_kematian', true),
            "sebab" => $this->input->post('sebab', true),
        ];

        $this->db->insert('tb_kematian', $data);
        redirect('kematian');
    }

    public function hapusDataKematian($id_kematian)
    {
        $this->db->where('id_kematian', $id_kematian);
        $this->db->delete('tb_kematian');
    }

    public function getKematianById($id_kematian)
    {
        return $this->db->get_where('tb_kematian', ['id_kematian' => $id_kematian])->row_array();
    }

    public function ubahDataKematian()
    {
        $data = [
            "id_pend" => $this->input->post('id_pend', true),
            "nama" => $this->input->post('nama', true),
            "tgl_kematian" => $this->input->post('tgl_kematian', true),
            "sebab" => $this->input->post('sebab', true),
        ];
        $this->db->where('id_kematian', $this->input->post('id_kematian'));
        $this->db->update('tb_kematian', $data);
        redirect('kematian');
    }
}

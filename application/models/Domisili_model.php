<?php
class Domisili_model extends CI_Model
{
    public function getAllDomisili()
    {
        $this->db->select('*');
        $this->db->join(
            'tb_pend',
            'tb_pindahdomisili.id_pend=tb_pend.id_pend',
            'inner'
        );
        return $this->db->get('tb_pindahdomisili')->result_array();
    }

    public function tambahDataDomisili()
    {
        $data = [
            "id_domisili" => $this->input->post('id_domisili', true),
            "tanggal" => $this->input->post('tanggal', true),
            "asal" => $this->input->post('asal', true),
            "keterangan" => $this->input->post('keterangan', true),
            "nik" => $this->input->post('nik', true),
        ];

        $this->db->insert('tb_domisili', $data);
        redirect('domisili');
    }

    public function hapusDataDomisili($id_domisili)
    {
        $this->db->where('id_domisili', $id_domisili);
        $this->db->delete('tb_domisili');
    }

    public function getDomisiliById($id_domisili)
    {
        return $this->db->get_where('tb_domisili', ['id_domisili' => $id_domisili])->row_array();
    }

    public function ubahDataDomisili()
    {
        $data = [
            "id_domisili" => $this->input->post('id_domisili', true),
            "tanggal" => $this->input->post('tanggal', true),
            "asal" => $this->input->post('asal', true),
            "keterangan" => $this->input->post('keterangan', true),
            "nik" => $this->input->post('nik', true),
        ];
        $this->db->where('id_domisili', $this->input->post('id_domisili'));
        $this->db->update('tb_domisili', $data);
        redirect('domisili');
    }
}

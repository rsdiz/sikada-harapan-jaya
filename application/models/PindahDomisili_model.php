<?php
class PindahDomisili_model extends CI_Model
{
    public function getAllPindahDomisili()
    {
        $this->db->select('*');
        $this->db->join(
            'tb_pend',
            'tb_pindahdomisili.id_pend=tb_pend.id_pend',
            'inner'
        );
        return $this->db->get('tb_pindahdomisili')->result_array();
    }

    public function tambahDataPindahDomisili()
    {
        $data = [
            "tanggal" => $this->input->post('tanggal', true),
            "tujuan" => $this->input->post('tujuan', true),
            "id_pend" => $this->input->post('id_pend', true),
            "ket" => $this->input->post('ket', true),
        ];
        // var_dump($data);
        // die();
        $this->db->insert('tb_pindahdomisili', $data);
        redirect('pindahdomisili');
    }

    public function hapusDataPindahDomisili($id_pindah)
    {
        $this->db->where('id_pindah', $id_pindah);
        $this->db->delete('tb_pindahdomisili');
    }

    public function getPindahDomisiliById($id_pindah)
    {
        $this->db->select('*');
        $this->db->join(
            'tb_pend',
            'tb_pindahdomisili.id_pend=tb_pend.id_pend',
            'inner'
        );
        return $this->db->get_where('tb_pindahdomisili', ['id_pindah' => $id_pindah])->row_array();
    }

    public function ubahDataDomisili()
    {
        $data = [

            "tanggal" => $this->input->post('tanggal', true),
            "tujuan" => $this->input->post('tujuan', true),
            "id_pend" => $this->input->post('id_pend', true),
            "ket" => $this->input->post('ket', true),
        ];
        $this->db->where('id_pindah', $this->input->post('id_pindah'));
        $this->db->update('tb_pindahdomisili', $data);
        redirect('pindahdomisili');
    }
}

<?php
class PindahDomisili_model extends CI_Model
{
    public function getAllPindahDomisili()
    {
        $this->db->select('*');
        $this->db->join(
            'penduduk',
            'pindah_domisili.id_penduduk=penduduk.id_penduduk',
            'inner'
        );
        return $this->db->get('pindah_domisili')->result_array();
    }

    public function tambahDataPindahDomisili()
    {
        $data = [
            "tanggal" => $this->input->post('tanggal', true),
            "tujuan" => $this->input->post('tujuan', true),
            "id_penduduk" => $this->input->post('id_penduduk', true),
            "ket" => $this->input->post('ket', true),
        ];
        // var_dump($data);
        // die();
        $this->db->insert('pindah_domisili', $data);
        redirect('pindahdomisili');
    }

    public function hapusDataPindahDomisili($id_pindah)
    {
        $this->db->where('id_pindah', $id_pindah);
        $this->db->delete('pindah_domisili');
    }

    public function getPindahDomisiliById($id_pindah)
    {
        $this->db->select('*');
        $this->db->join(
            'penduduk',
            'pindah_domisili.id_penduduk=penduduk.id_penduduk',
            'inner'
        );
        return $this->db->get_where('pindah_domisili', ['id_pindah' => $id_pindah])->row_array();
    }

    public function ubahDataDomisili()
    {
        $data = [

            "tanggal" => $this->input->post('tanggal', true),
            "tujuan" => $this->input->post('tujuan', true),
            "id_penduduk" => $this->input->post('id_penduduk', true),
            "ket" => $this->input->post('ket', true),
        ];
        $this->db->where('id_pindah', $this->input->post('id_pindah'));
        $this->db->update('pindah_domisili', $data);
        redirect('pindahdomisili');
    }
}

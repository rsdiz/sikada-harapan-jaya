<?php
class AK_model extends CI_Model
{
    public function getAllAK($id_penduduk, $id_kartu_keluarga)
    {
        $this->db->select('*');
        $this->db->join(
            'penduduk',
            'penduduk.id_penduduk=anggota.id_penduduk',
            'inner'
        );
        $this->db->join(
            'anggota',
            'kartu_keluarga.id_kartu_keluarga=anggota.id_kartu_keluarga',
            'inner'
        );
        $this->db->where('penduduk.id_penduduk', $id_penduduk);
        $this->db->where('kartu_keluarga.id_kartu_keluarga', $id_kartu_keluarga);
        return $this->db->get('anggota')->row_array();
    }

    public function hapusDataAnggotaKeluarga($no_kartu_keluarga)
    {
        $this->db->where('no_kartu_keluarga', $no_kartu_keluarga);
        $this->db->delete('kartu_keluarga');
    }

    public function getAllprintanggota()
    {
        return $this->db->get('anggota')->result_array();
    }
}

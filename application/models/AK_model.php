<?php
class AK_model extends CI_Model
{
    public function getAllAK($id_pend, $id_kk)
    {
        $this->db->select('*');
        $this->db->join(
            'tb_pend',
            'tb_pend.id_pend=anggota.id_pend',
            'inner'
        );
        $this->db->join(
            'anggota',
            'tb_kk.id_kk=anggota.id_kk',
            'inner'
        );
        $this->db->where('tb_pend.id_pend', $id_pend);
        $this->db->where('tb_kk.id_kk', $id_kk);
        return $this->db->get('tb_ak')->row_array();
    }

    public function hapusDataAnggotaKeluarga($no_kk)
    {
        $this->db->where('no_kk', $no_kk);
        $this->db->delete('tb_kk');
    }

    public function getAllprintanggota()
    {
        return $this->db->get('anggota')->result_array();
    }
}

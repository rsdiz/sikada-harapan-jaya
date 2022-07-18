<?php
class KK_model extends CI_Model
{
    public function getAllKK()
    {
        return $this->db->get('tb_kk')->result_array();
    }

    public function cariDataKK()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('no_kk', $keyword);
        // $this->db->like('nik', $keyword);
        $this->db->or_like('nama_kepala', $keyword);
        $this->db->or_like('rt', $keyword);
        $this->db->or_like('rw', $keyword);
        return $this->db->get('tb_kk')->result_array();
    }

    public function tambahDataKK()
    {
        $data = [
            "no_kk" => $this->input->post('no_kk', true),
            // "nik" => $this->input->post('nik', true),
            "nama_kepala" => $this->input->post('nama_kepala', true),
            // "status" => $this->input->post('status', true),
            "desa" => $this->input->post('desa', true),
            "rt" => $this->input->post('rt', true),
            "rw" => $this->input->post('rw', true),
            "kec" => $this->input->post('kec'),
            "kab" => $this->input->post('kab', true),
            "prov" => $this->input->post('prov', true),
        ];

        $this->db->insert('tb_kk', $data);
        redirect('kk');
    }

    public function hapusDataKK($id_kk)
    {
        $this->db->where('id_kk', $id_kk);
        $this->db->delete('tb_kk');
    }

    public function getKKById($id_kk)
    {
        return $this->db->get_where('tb_kk', ['id_kk' => $id_kk])->row_array();
    }

    public function ubahDataKK()
    {
        $data = [
            "no_kk" => $this->input->post('no_kk', true),
            // "nik" => $this->input->post('nik', true),
            "nama_kepala" => $this->input->post('nama_kepala', true),
            // "status" => $this->input->post('status', true),
            "desa" => $this->input->post('desa', true),
            "rt" => $this->input->post('rt', true),
            "rw" => $this->input->post('rw', true),
            "kec" => $this->input->post('kec'),
            "kab" => $this->input->post('kab', true),
            "prov" => $this->input->post('prov', true),
        ];
        $this->db->where('id_kk', $this->input->post('id_kk'));
        $this->db->update('tb_kk', $data);
        redirect('kk');
    }

    public function getAKById()
    {
        $this->db->select('*');
        $this->db->join(
            'tb_penduduk',
            'tb_kk.nik=tb_penduduk.nik',
            'inner'
        );
        return $this->db->get('tb_kk')->row_array();
    }

    public function getAllAK($id_kk)
    {
        $this->db->select('*');
        $this->db->where('tb_kk.id_kk', $id_kk);

        return $this->db->get('tb_kk')->row_array();
    }

    public function getAllKeluarga($id_kk)
    {
        $this->db->select('*');
        $this->db->where('tb_kk.id_kk', $id_kk);
        return $this->db->get('tb_kk')->row_array();
    }

    public function getAllAnggota($id_kk)
    {
        $this->db->select('*');
        $this->db->join(
            'tb_pend',
            'tb_pend.id_pend=anggota.id_pend',
            'inner'
        );
        $this->db->join(
            'tb_kk',
            'tb_kk.id_kk=anggota.id_kk',
            'inner'
        );
        $this->db->where('tb_kk.id_kk', $id_kk);
        // $this->db->where('tb_pend.id_pend', $id_pend);
        return $this->db->get('anggota')->result_array();
    }

    public function getPend($id_pend)
    {
        $this->db->select('*');
        $this->db->where('tb_pend.id_pend', $id_pend);
        return $this->db->get('tb_pend')->row_array();
    }

    public function tambahAK()
    {
        $data = [
            "id_kk" => $this->input->post('id_kk', true),
            "id_pend" => $this->input->post('id_pend', true),
            "hubungan" => $this->input->post('hubungan', true),
        ];
        $this->db->insert('anggota', $data);
        redirect('kk');
        var_dump($data);
        die();
    }

    public function getAllprintanggota($id_pend, $id_kk)
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
}

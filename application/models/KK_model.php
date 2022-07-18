<?php
class KK_model extends CI_Model
{
    public function getAllKK()
    {
        return $this->db->get('kartu_keluarga')->result_array();
    }

    public function cariDataKK()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('no_kartu_keluarga', $keyword);
        // $this->db->like('nik', $keyword);
        $this->db->or_like('nama_kepala', $keyword);
        $this->db->or_like('rt', $keyword);
        $this->db->or_like('rw', $keyword);
        return $this->db->get('kartu_keluarga')->result_array();
    }

    public function tambahDataKK()
    {
        $data = [
            "no_kartu_keluarga" => $this->input->post('no_kartu_keluarga', true),
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

        $this->db->insert('kartu_keluarga', $data);
        redirect('kk');
    }

    public function hapusDataKK($id_kartu_keluarga)
    {
        $this->db->where('id_kartu_keluarga', $id_kartu_keluarga);
        $this->db->delete('kartu_keluarga');
    }

    public function getKKById($id_kartu_keluarga)
    {
        return $this->db->get_where('kartu_keluarga', ['id_kartu_keluarga' => $id_kartu_keluarga])->row_array();
    }

    public function ubahDataKK()
    {
        $data = [
            "no_kartu_keluarga" => $this->input->post('no_kartu_keluarga', true),
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
        $this->db->where('id_kartu_keluarga', $this->input->post('id_kartu_keluarga'));
        $this->db->update('kartu_keluarga', $data);
        redirect('kk');
    }

    public function getAKById()
    {
        $this->db->select('*');
        $this->db->join(
            'pendudukuduk',
            'kartu_keluarga.nik=penduduk.nik',
            'inner'
        );
        return $this->db->get('kartu_keluarga')->row_array();
    }

    public function getAllAK($id_kartu_keluarga)
    {
        $this->db->select('*');
        $this->db->where('kartu_keluarga.id_kartu_keluarga', $id_kartu_keluarga);

        return $this->db->get('kartu_keluarga')->row_array();
    }

    public function getAllKeluarga($id_kartu_keluarga)
    {
        $this->db->select('*');
        $this->db->where('kartu_keluarga.id_kartu_keluarga', $id_kartu_keluarga);
        return $this->db->get('kartu_keluarga')->row_array();
    }

    public function getAllAnggota($id_kartu_keluarga)
    {
        $this->db->select('*');
        $this->db->join(
            'penduduk',
            'penduduk.id_penduduk=anggota.id_penduduk',
            'inner'
        );
        $this->db->join(
            'kartu_keluarga',
            'kartu_keluarga.id_kartu_keluarga=anggota.id_kartu_keluarga',
            'inner'
        );
        $this->db->where('kartu_keluarga.id_kartu_keluarga', $id_kartu_keluarga);
        // $this->db->where('penduduk.id_penduduk', $id_penduduk);
        return $this->db->get('anggota')->result_array();
    }

    public function getPend($id_penduduk)
    {
        $this->db->select('*');
        $this->db->where('penduduk.id_penduduk', $id_penduduk);
        return $this->db->get('penduduk')->row_array();
    }

    public function tambahAK()
    {
        $data = [
            "id_kartu_keluarga" => $this->input->post('id_kartu_keluarga', true),
            "id_penduduk" => $this->input->post('id_penduduk', true),
            "hubungan" => $this->input->post('hubungan', true),
        ];
        $this->db->insert('anggota', $data);
        redirect('kk');
        var_dump($data);
        die();
    }

    public function getAllprintanggota($id_penduduk, $id_kartu_keluarga)
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
}

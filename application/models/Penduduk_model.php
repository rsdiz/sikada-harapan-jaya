<?php
class Penduduk_model extends CI_Model
{
    public function getAllPenduduk()
    {
        return $this->db->get('tb_pend')->result_array();
    }

    public function cariDataPenduduk()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nik', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('rt', $keyword);
        $this->db->or_like('rw', $keyword);
        $this->db->or_like('agama', $keyword);
        $this->db->or_like('jk', $keyword);
        return $this->db->get('tb_pend')->result_array();
    }

    public function tambahDataPenduduk()
    {
        $data = [
            "nik" => $this->input->post('nik', true),
            "nama" => $this->input->post('nama', true),
            "tempat_lahir" => $this->input->post('tempat_lahir', true),
            "tgl_lahir" => $this->input->post('tgl_lahir', true),
            "jk" => $this->input->post('jk', true),
            "desa" => $this->input->post('desa', true),
            "rt" => $this->input->post('rt'),
            "rw" => $this->input->post('rw', true),
            "agama" => $this->input->post('agama', true),
            "status_perkawinan" => $this->input->post('status_perkawinan', true),
            // "pendidikan" => $this->input->post('pendidikan', true),
            "pekerjaan" => $this->input->post('pekerjaan', true),
        ];

        $this->db->insert('tb_pend', $data);
        redirect('penduduk');
    }

    public function hapusDataPenduduk($nik)
    {
        $this->db->where('nik', $nik);
        $this->db->delete('tb_pend');
    }

    public function getPendudukById($nik)
    {
        return $this->db->get_where('tb_pend', ['nik' => $nik])->row_array();
    }

    public function ubahDataPenduduk()
    {
        $data = [
            "nik" => $this->input->post('nik', true),
            "nama" => $this->input->post('nama', true),
            "tempat_lahir" => $this->input->post('tempat_lahir', true),
            "tgl_lahir" => $this->input->post('tgl_lahir', true),
            "jk" => $this->input->post('jk', true),
            "desa" => $this->input->post('desa', true),
            "rt" => $this->input->post('rt'),
            "rw" => $this->input->post('rw', true),
            "agama" => $this->input->post('agama', true),
            "status_perkawinan" => $this->input->post('status_perkawinan', true),
            // "pendidikan" => $this->input->post('pendidikan', true),
            "pekerjaan" => $this->input->post('pekerjaan', true),
        ];
        $this->db->where('nik', $this->input->post('nik'));
        $this->db->update('tb_pend', $data);
        redirect('penduduk');
    }
}

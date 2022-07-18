<?php
class Kelahiran_model extends CI_Model
{
    public function getAllKelahiran()
    {
        $this->db->select('*');
        $this->db->join(
            'kartu_keluarga',
            'kartu_keluarga.id_kartu_keluarga=kelahiran.id_kartu_keluarga',
            'inner'
        );
        $this->db->where('kartu_keluarga.id_kartu_keluarga');
        // $this->db->where('penduduk.id_penduduk', $id_penduduk);
        return $this->db->get('kelahiran')->result_array();
    }

    public function tambahDataKelahiran()
    {
        $data = [
            // "id_kelahiran" => $this->input->post('id_kelahiran', true),
            "nama" => $this->input->post('nama', true),
            // "tempat_lahir" => $this->input->post('tempat_lahir', true),
            "tgl_lahir" => $this->input->post('tgl_lahir', true),
            "jk" => $this->input->post('jk', true),
            "id_kartu_keluarga" => $this->input->post('id_kartu_keluarga', true)
        ];

        $this->db->insert('kelahiran', $data);
        redirect('kelahiran');
    }

    public function hapusDataKelahiran($id_kelahiran)
    {
        $this->db->where('id_kelahiran', $id_kelahiran);
        $this->db->delete('kelahiran');
    }

    public function getKelahiranById($id_kelahiran)
    {
        return $this->db->get_where('kelahiran', ['id_kelahiran' => $id_kelahiran])->row_array();
    }

    // public function ubahDataKelahiran()
    // {
    //     $data = [
    //         // "id_kelahiran" => $this->input->post('id_kelahiran', true),
    //         "nama" => $this->input->post('nama', true),
    //         // "tempat_lahir" => $this->input->post('tempat_lahir', true),
    //         "tgl_lahir" => $this->input->post('tgl_lahir', true),
    //         "jk" => $this->input->post('jk', true),
    //         "id_kartu_keluarga" => $this->input->post('id_kartu_keluarga', true),

    //     ];
    //     $this->db->where('id_kelahiran', $this->input->post('id_kelahiran'));
    //     $this->db->update('kelahiran', $data);
    //     redirect('kelahiran');
    // }
}

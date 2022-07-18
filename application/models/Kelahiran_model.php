<?php
class Kelahiran_model extends CI_Model
{
    public function getAllKelahiran()
    {
        $this->db->select('*');
        $this->db->join(
            'tb_kk',
            'tb_kk.id_kk=tb_kelahiran.id_kk',
            'inner'
        );
        $this->db->where('tb_kk.id_kk');
        // $this->db->where('tb_pend.id_pend', $id_pend);
        return $this->db->get('tb_kelahiran')->result_array();
    }

    public function tambahDataKelahiran()
    {
        $data = [
            // "id_kelahiran" => $this->input->post('id_kelahiran', true),
            "nama" => $this->input->post('nama', true),
            // "tempat_lahir" => $this->input->post('tempat_lahir', true),
            "tgl_lahir" => $this->input->post('tgl_lahir', true),
            "jk" => $this->input->post('jk', true),
            "id_kk" => $this->input->post('id_kk', true)
        ];

        $this->db->insert('tb_kelahiran', $data);
        redirect('kelahiran');
    }

    public function hapusDataKelahiran($id_kelahiran)
    {
        $this->db->where('id_kelahiran', $id_kelahiran);
        $this->db->delete('tb_kelahiran');
    }

    public function getKelahiranById($id_kelahiran)
    {
        return $this->db->get_where('tb_kelahiran', ['id_kelahiran' => $id_kelahiran])->row_array();
    }

    // public function ubahDataKelahiran()
    // {
    //     $data = [
    //         // "id_kelahiran" => $this->input->post('id_kelahiran', true),
    //         "nama" => $this->input->post('nama', true),
    //         // "tempat_lahir" => $this->input->post('tempat_lahir', true),
    //         "tgl_lahir" => $this->input->post('tgl_lahir', true),
    //         "jk" => $this->input->post('jk', true),
    //         "id_kk" => $this->input->post('id_kk', true),

    //     ];
    //     $this->db->where('id_kelahiran', $this->input->post('id_kelahiran'));
    //     $this->db->update('tb_kelahiran', $data);
    //     redirect('kelahiran');
    // }
}

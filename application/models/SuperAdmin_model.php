<?php
class SuperAdmin_model extends CI_Model
{
    public function getAllLaporanKK()
    {
        return $this->db->get('kartu_keluarga')->result_array();
    }

    public function getAllLaporanPenduduk()
    {
        return $this->db->get('penduduk')->result_array();
    }

    public function getAllLaporanKelahiran()
    {
        $this->db->select('*');
        $this->db->join(
            'kartu_keluarga',
            'kelahiran.id_kartu_keluarga=kartu_keluarga.id_kartu_keluarga',
            'inner'
        );
        return $this->db->get('kelahiran')->result_array();
    }

    public function view_by_date($date)
    {
        $this->db->select('*');
        $this->db->join(
            'kartu_keluarga',
            'kelahiran.id_kartu_keluarga=kartu_keluarga.id_kartu_keluarga',
            'inner'
        );
        $this->db->where('DATE(tgl_lahir)', $date); // Tambahkan where tanggal nya

        return $this->db->get('kelahiran')->result_array(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
    }

    public function view_by_month($month, $year)
    {
        $this->db->select('*');
        $this->db->join(
            'kartu_keluarga',
            'kelahiran.id_kartu_keluarga=kartu_keluarga.id_kartu_keluarga',
            'inner'
        );
        $this->db->where('MONTH(tgl_lahir)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tgl_lahir)', $year); // Tambahkan where tahun

        return $this->db->get('kelahiran')->result_array(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
    }

    public function view_by_year($year)
    {
        $this->db->select('*');
        $this->db->join(
            'kartu_keluarga',
            'kelahiran.id_kartu_keluarga=kartu_keluarga.id_kartu_keluarga',
            'inner'
        );
        $this->db->where('YEAR(tgl_lahir)', $year); // Tambahkan where tahun

        return $this->db->get('kelahiran')->result_array(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
    }

    public function view_all()
    {
        return $this->db->get('kelahiran')->result_array(); // Tampilkan semua data transaksi
    }

    public function option_tahun()
    {
        $this->db->select('YEAR(tgl_lahir) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('kelahiran'); // select ke tabel transaksi
        $this->db->order_by('YEAR(tgl_lahir)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tgl_lahir)'); // Group berdasarkan tahun pada field tgl

        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }

    public function getAllLaporanPindah()
    {
        $this->db->select('*');
        $this->db->join(
            'penduduk',
            'pindah_domisili.id_penduduk=penduduk.id_penduduk',
            'inner'
        );
        return $this->db->get('pindah_domisili')->result_array();
    }
    public function getAllLaporanKematian()
    {
        $this->db->select('*');
        $this->db->join(
            'penduduk',
            'kematian.id_penduduk=penduduk.id_penduduk',
            'inner'
        );
        return $this->db->get('kematian')->result_array();
    }

    public function date($date)
    {
        $this->db->select('*');
        $this->db->join(
            'penduduk',
            'kematian.id_penduduk=penduduk.id_penduduk',
            'inner'
        );
        $this->db->where('DATE(tgl_kematian)', $date); // Tambahkan where tanggal nya

        return $this->db->get('kematian')->result_array(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
    }

    public function month($month, $year)
    {
        $this->db->select('*');
        $this->db->join(
            'penduduk',
            'kematian.id_penduduk=penduduk.id_penduduk',
            'inner'
        );
        $this->db->where('MONTH(tgl_kematian)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tgl_kematian)', $year); // Tambahkan where tahun

        return $this->db->get('kematian')->result_array(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
    }

    public function year($year)
    {
        $this->db->select('*');
        $this->db->join(
            'penduduk',
            'kematian.id_penduduk=penduduk.id_penduduk',
            'inner'
        );
        $this->db->where('YEAR(tgl_kematian)', $year); // Tambahkan where tahun

        return $this->db->get('kematian')->result_array(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
    }

    public function all()
    {
        return $this->db->get('kematian')->result_array(); // Tampilkan semua data transaksi
    }

    public function tahun()
    {
        $this->db->select('YEAR(tgl_kematian) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('kematian'); // select ke tabel transaksi
        $this->db->order_by('YEAR(tgl_kematian)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tgl_kematian)'); // Group berdasarkan tahun pada field tgl

        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }

    public function getAllPenduduk()
    {
        return $this->db->get('penduduk')->result_array();
    }

    public function getAllKK()
    {
        return $this->db->get('kartu_keluarga')->result_array();
    }

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

    public function getAllKematian()
    {
        return $this->db->get('kematian')->result_array();
    }

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

    public function getPendudukById($nik)
    {
        return $this->db->get_where('penduduk', ['nik' => $nik])->row_array();
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

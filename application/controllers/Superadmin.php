<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Superadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SuperAdmin_model');
    }
    public function index()
    {
        $data['title'] = 'Dasboard';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sp_sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/index', $data);
        $this->load->view('templates/footer');
    }

    public function penduduk()

    {
        $data['title'] = 'Data Penduduk';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['penduduk'] = $this->SuperAdmin_model->getAllPenduduk();
        if ($this->input->post('keyword')) {
            $data['penduduk'] = $this->Penduduk_model->cariDataPenduduk();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sp_sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/view_penduduk', $data);
        $this->load->view('templates/footer');
    }

    public function kk()

    {
        $data['title'] = 'Data Kartu Keluarga';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kk'] = $this->SuperAdmin_model->getAllKK();
        if ($this->input->post('keyword')) {
            $data['kk'] = $this->KK_model->cariDataKK();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sp_sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/view_kk', $data);
        $this->load->view('templates/footer');
    }

    public function kelahiran()

    {
        $data['title'] = 'Data Kelahiran';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kelahiran'] = $this->SuperAdmin_model->getAllKelahiran();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sp_sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/view_kelahiran', $data);
        $this->load->view('templates/footer');
    }

    public function kematian()

    {
        $data['title'] = 'Data Kematian';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kematian'] = $this->SuperAdmin_model->getAllKematian();
        // var_dump($data['kematian']);
        // die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sp_sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/view_kematian', $data);
        $this->load->view('templates/footer');
    }

    public function pindah()

    {
        $data['title'] = 'Data Pindah Domisili';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pindahdomisili'] = $this->SuperAdmin_model->getAllPindahDomisili();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sp_sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/view_pindah', $data);
        $this->load->view('templates/footer');
    }

    public function ak($id_kk)

    {
        $data['title'] = 'Data Anggota KK';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();;
        $data['ak'] = $this->SuperAdmin_model->getAllAK($id_kk);
        $data['anggota'] = $this->SuperAdmin_model->getAllAnggota($id_kk);
        // var_dump($data['ak']);
        // die();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sp_sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/view_ak', $data);
        $this->load->view('templates/footer');
    }

    public function laporanpenduduk()

    {
        $data['title'] = 'Laporan Penduduk';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['laporan'] = $this->SuperAdmin_model->getAllLaporanPenduduk();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sp_sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/laporan_penduduk', $data);
        $this->load->view('templates/footer');
    }

    public function laporankk()

    {
        $data['title'] = 'Laporan Kartu Keluarga';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kk'] = $this->SuperAdmin_model->getAllLaporanKK();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sp_sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/laporan_kk', $data);
        $this->load->view('templates/footer');
    }

    // public function laporankelahiran()

    // {
    //     $data['title'] = 'Laporan Penduduk';
    //     $data['user'] = $this->db->get_where('users', ['email' =>
    //     $this->session->userdata('email')])->row_array();

    //     $data['laporan'] = $this->SuperAdmin_model->getAllLaporanKelahiran();
    //     if ($this->input->post('keyword')) {
    //         $data['laporan'] = $this->laporan_model->cariLaporanPenduduk();
    //     }

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sp_sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('superadmin/laporan_kelahiran', $data);
    //     $this->load->view('templates/footer');
    // }

    public function laporankelahiran()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl_lahir = $_GET['tanggal'];

                $ket = 'Data Kelahiran Tanggal ' . date('d-m-y', strtotime($tgl_lahir));
                $url_cetak = 'superadmin/printkel?filter=1&tanggal=' . $tgl_lahir;
                $tb_kelahiran = $this->SuperAdmin_model->view_by_date($tgl_lahir); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Kelahiran Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $url_cetak = 'superadmin/printkel?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $tb_kelahiran = $this->SuperAdmin_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Kelahiran Tahun ' . $tahun;
                $url_cetak = 'superadmin/printkel?filter=3&tahun=' . $tahun;
                $tb_kelahiran = $this->SuperAdmin_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Kelahiran';
            $url_cetak = 'superadmin/printkel';
            $tb_kelahiran = $this->SuperAdmin_model->getAllLaporanKelahiran(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url($url_cetak);
        $data['tb_kelahiran'] = $tb_kelahiran;
        // $data['kelahiran'] = $this->db->get('tb_kelahiran')->result_array();
        $data['option_tahun'] = $this->SuperAdmin_model->option_tahun();

        $data['title'] = 'Laporan Kelahiran';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        // $data['laporan'] = $this->Laporan_model->getAllLaporanKelahiran();
        // if ($this->input->post('keyword')) {
        //     $data['laporan'] = $this->Laporan_model->cariLaporanPenduduk();
        // }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sp_sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/laporan_kelahiran', $data);
        $this->load->view('templates/footer');
    }

    public function printkel()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl_lahir = $_GET['tanggal'];

                $ket = 'Data Kelahiran Tanggal ' . date('d-m-y', strtotime($tgl_lahir));
                $tb_kelahiran = $this->SuperAdmin_model->view_by_date($tgl_lahir); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Kelahiran Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $tb_kelahiran = $this->SuperAdmin_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Kelahiran Tahun ' . $tahun;
                $tb_kelahiran = $this->SuperAdmin_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Kelahiran';
            $tb_kelahiran = $this->SuperAdmin_model->getAllLaporanKelahiran(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['tb_kelahiran'] = $tb_kelahiran;
        $this->load->view('superadmin/printkel', $data);

        // ob_start();
        // $this->load->view('laporan/printkel', $data);
        // $html = ob_get_contents();
        // ob_end_clean();

        // require './assets/html2pdf/autoload.php';

        // $pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
        // $pdf->WriteHTML($html);
        // $pdf->Output('Data Transaksi.pdf', 'D');
    }

    public function laporanpindah()

    {
        $data['title'] = 'Laporan Penduduk';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pindah'] = $this->SuperAdmin_model->getAllLaporanPindah();
        if ($this->input->post('keyword')) {
            $data['laporan'] = $this->laporan_model->cariLaporanPenduduk();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sp_sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/laporan_pindah', $data);
        $this->load->view('templates/footer');
    }

    // public function laporankematian()

    // {
    //     $data['title'] = 'Laporan Penduduk';
    //     $data['user'] = $this->db->get_where('users', ['email' =>
    //     $this->session->userdata('email')])->row_array();

    //     $data['meninggal'] = $this->SuperAdmin_model->getAllLaporanKematian();
    //     if ($this->input->post('keyword')) {
    //         $data['laporan'] = $this->laporan_model->cariLaporanPenduduk();
    //     }

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sp_sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('superadmin/laporan_kematian', $data);
    //     $this->load->view('templates/footer');
    // }

    public function laporankematian()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl_kematian = $_GET['tanggal'];

                $ket = 'Data Kematian Tanggal ' . date('d-m-y', strtotime($tgl_kematian));
                $url_cetak1 = 'superadmin/printkematian?filter=1&tanggal=' . $tgl_kematian;
                $tb_kematian = $this->SuperAdmin_model->date($tgl_kematian); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Kematian Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $url_cetak1 = 'superadmin/printkematian?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $tb_kematian = $this->SuperAdmin_model->month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Kematian Tahun ' . $tahun;
                $url_cetak1 = 'superadmin/printkematian?filter=3&tahun=' . $tahun;
                $tb_kematian = $this->SuperAdmin_model->year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Kematian';
            $url_cetak1 = 'superadmin/printkematian';
            $tb_kematian = $this->SuperAdmin_model->getAllLaporanKematian(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url($url_cetak1);
        $data['tb_kematian'] = $tb_kematian;
        // $data['kelahiran'] = $this->db->get('tb_kelahiran')->result_array();
        $data['option_tahun'] = $this->SuperAdmin_model->option_tahun();

        $data['title'] = 'Laporan Kematian';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        // $data['laporan'] = $this->Laporan_model->getAllLaporanKelahiran();
        // if ($this->input->post('keyword')) {
        //     $data['laporan'] = $this->Laporan_model->cariLaporanPenduduk();
        // }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sp_sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/laporan_kematian', $data);
        $this->load->view('templates/footer');
    }

    public function printkematian()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl_kematian = $_GET['tanggal'];

                $ket = 'Data Kematian Tanggal ' . date('d-m-y', strtotime($tgl_kematian));
                $tb_kematian = $this->SuperAdmin_model->date($tgl_kematian); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Kematian Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $tb_kematian = $this->SuperAdmin_model->month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Kematian Tahun ' . $tahun;
                $tb_kematian = $this->SuperAdmin_model->year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Kematian';
            $tb_kematian = $this->SuperAdmin_model->getAllLaporanKematian(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['tb_kematian'] = $tb_kematian;
        $this->load->view('superadmin/printkematian', $data);

        // ob_start();
        // $this->load->view('laporan/printkel', $data);
        // $html = ob_get_contents();
        // ob_end_clean();

        // require './assets/html2pdf/autoload.php';

        // $pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
        // $pdf->WriteHTML($html);
        // $pdf->Output('Data Transaksi.pdf', 'D');
    }

    public function print()
    {
        $data['laporan'] = $this->SuperAdmin_model->getAllLaporanPenduduk();
        $this->load->view('superadmin/print', $data);
    }

    public function printkk()
    {
        $data['kk'] = $this->SuperAdmin_model->getAllLaporanKK();
        $this->load->view('superadmin/printkk', $data);
    }

    // public function printkelahiran()
    // {
    //     $data['lahir'] = $this->SuperAdmin_model->getAllLaporanKelahiran();
    //     $this->load->view('superadmin/printkel', $data);
    // }

    // public function printkematian()
    // {
    //     $data['mati'] = $this->SuperAdmin_model->getAllLaporanKematian();
    //     $this->load->view('superadmin/printkematian', $data);
    // }

    public function printpindah()
    {
        $data['pindah'] = $this->SuperAdmin_model->getAllLaporanPindah();
        $this->load->view('superadmin/printpindah', $data);
    }

    public function detail($nik)
    {
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Detail Data Penduduk';
        $data['penduduk'] = $this->SuperAdmin_model->getPendudukById($nik);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sp_sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/detail', $data);
        $this->load->view('templates/footer');
    }

    public function pa($id_kk)
    {
        $this->load->model('KK_model');
        $data['ak'] = $this->KK_model->getAllAK($id_kk);
        $data['anggota'] = $this->KK_model->getAllAnggota($id_kk);
        $this->load->view('superadmin/printanggota', $data);
    }
}

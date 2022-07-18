<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
    }

    public function index()

    {
        $data['title'] = 'Laporan Penduduk';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['laporan'] = $this->Laporan_model->getAllLaporanPenduduk();
        if ($this->input->post('keyword')) {
            $data['laporan'] = $this->laporan_model->cariLaporanPenduduk();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }

    // public function print()
    // {
    //     $data['pend'] = $this->Laporan_model->getAllLaporanPenduduk();
    //     $this->load->view('laporan/print', $data);
    // }

    // public function print()
    // {
    //     // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
    //     $this->load->library('pdfgenerator');

    //     // filename dari pdf ketika didownload
    //     $file_pdf = 'laporan_penjualan_toko_kita';
    //     // setting paper
    //     $paper = 'A4';
    //     //orientasi paper potrait / 
    //     $orientation = "portrait";

    //     $data['pend'] = $this->Laporan_model->getAllLaporanPenduduk();

    //     $html = $this->load->view('laporan/print', $this->data, true);

    //     // run dompdf
    //     $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    // }

    public function print()
    {
        $this->load->library('pdfgenerator');
        $data['pend'] = $this->Laporan_model->getAllLaporanPenduduk();
        $this->pdfgenerator->load_view('laporan/print', $data);
    }

    public function kk()

    {
        $data['title'] = 'Laporan Kartu Keluarga';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kk'] = $this->Laporan_model->getAllLaporanKK();
        if ($this->input->post('keyword')) {
            $data['laporan'] = $this->Laporan_model->cariLaporanKK();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/kk', $data);
        $this->load->view('templates/footer');
    }

    public function printkk()
    {
        $data['kk'] = $this->Laporan_model->getAllLaporanKK();
        $this->load->view('laporan/printkk', $data);
    }

    // public function kelahiran()

    // {
    //     $data['title'] = 'Laporan Penduduk';
    //     $data['user'] = $this->db->get_where('users', ['email' =>
    //     $this->session->userdata('email')])->row_array();

    //     $data['laporan'] = $this->Laporan_model->getAllLaporanKelahiran();
    //     if ($this->input->post('keyword')) {
    //         $data['laporan'] = $this->laporan_model->cariLaporanPenduduk();
    //     }

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('laporan/kelahiran', $data);
    //     $this->load->view('templates/footer');
    // }

    // public function printkelahiran()
    // {
    //     $data['lahir'] = $this->Laporan_model->getAllLaporanKelahiran();
    //     $this->load->view('laporan/printkel', $data);
    // }

    public function kelahiran()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl_lahir = $_GET['tanggal'];

                $ket = 'Data Kelahiran Tanggal ' . date('d-m-y', strtotime($tgl_lahir));
                $url_cetak = 'laporan/printkel?filter=1&tanggal=' . $tgl_lahir;
                $tb_kelahiran = $this->Laporan_model->view_by_date($tgl_lahir); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Kelahiran Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $url_cetak = 'laporan/printkel?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $tb_kelahiran = $this->Laporan_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Kelahiran Tahun ' . $tahun;
                $url_cetak = 'laporan/printkel?filter=3&tahun=' . $tahun;
                $tb_kelahiran = $this->Laporan_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Kelahiran';
            $url_cetak = 'laporan/printkel';
            $tb_kelahiran = $this->Laporan_model->getAllLaporanKelahiran(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url($url_cetak);
        $data['tb_kelahiran'] = $tb_kelahiran;
        // $data['kelahiran'] = $this->db->get('tb_kelahiran')->result_array();
        $data['option_tahun'] = $this->Laporan_model->option_tahun();

        $data['title'] = 'Laporan Kelahiran';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        // $data['laporan'] = $this->Laporan_model->getAllLaporanKelahiran();
        // if ($this->input->post('keyword')) {
        //     $data['laporan'] = $this->Laporan_model->cariLaporanPenduduk();
        // }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/kelahiran', $data);
        $this->load->view('templates/footer');
    }

    public function printkel()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl_lahir = $_GET['tanggal'];

                $ket = 'Data Kelahiran Tanggal ' . date('d-m-y', strtotime($tgl_lahir));
                $tb_kelahiran = $this->Laporan_model->view_by_date($tgl_lahir); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Kelahiran Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $tb_kelahiran = $this->Laporan_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Kelahiran Tahun ' . $tahun;
                $tb_kelahiran = $this->Laporan_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Kelahiran';
            $tb_kelahiran = $this->Laporan_model->getAllLaporanKelahiran(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['tb_kelahiran'] = $tb_kelahiran;
        $this->load->view('laporan/printkel', $data);

        // ob_start();
        // $this->load->view('laporan/printkel', $data);
        // $html = ob_get_contents();
        // ob_end_clean();

        // require './assets/html2pdf/autoload.php';

        // $pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
        // $pdf->WriteHTML($html);
        // $pdf->Output('Data Transaksi.pdf', 'D');
    }

    public function pindah()

    {
        $data['title'] = 'Laporan Penduduk';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pindah'] = $this->Laporan_model->getAllLaporanPindah();
        if ($this->input->post('keyword')) {
            $data['laporan'] = $this->laporan_model->cariLaporanPenduduk();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/pindah', $data);
        $this->load->view('templates/footer');
    }

    public function printpindah()
    {
        $data['pindah'] = $this->Laporan_model->getAllLaporanPindah();
        $this->load->view('laporan/printpindah', $data);
    }

    // public function kematian()

    // {
    //     $data['title'] = 'Laporan Penduduk';
    //     $data['user'] = $this->db->get_where('users', ['email' =>
    //     $this->session->userdata('email')])->row_array();

    //     $data['meninggal'] = $this->Laporan_model->getAllLaporanKematian();
    //     if ($this->input->post('keyword')) {
    //         $data['laporan'] = $this->laporan_model->cariLaporanPenduduk();
    //     }

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('laporan/kematian', $data);
    //     $this->load->view('templates/footer');
    // }

    // public function printkematian()
    // {
    //     $data['mati'] = $this->Laporan_model->getAllLaporanKematian();
    //     $this->load->view('laporan/printkematian', $data);
    // }

    public function kematian()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl_kematian = $_GET['tanggal'];

                $ket = 'Data Kematian Tanggal ' . date('d-m-y', strtotime($tgl_kematian));
                $url_cetak1 = 'laporan/printkematian?filter=1&tanggal=' . $tgl_kematian;
                $tb_kematian = $this->Laporan_model->date($tgl_kematian); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Kematian Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $url_cetak1 = 'laporan/printkematian?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $tb_kematian = $this->Laporan_model->month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Kematian Tahun ' . $tahun;
                $url_cetak1 = 'laporan/printkematian?filter=3&tahun=' . $tahun;
                $tb_kematian = $this->Laporan_model->year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Kematian';
            $url_cetak1 = 'laporan/printkematian';
            $tb_kematian = $this->Laporan_model->getAllLaporanKematian(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url($url_cetak1);
        $data['tb_kematian'] = $tb_kematian;
        // $data['kelahiran'] = $this->db->get('tb_kelahiran')->result_array();
        $data['option_tahun'] = $this->Laporan_model->option_tahun();

        $data['title'] = 'Laporan Kematian';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        // $data['laporan'] = $this->Laporan_model->getAllLaporanKelahiran();
        // if ($this->input->post('keyword')) {
        //     $data['laporan'] = $this->Laporan_model->cariLaporanPenduduk();
        // }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/kematian', $data);
        $this->load->view('templates/footer');
    }

    public function printkematian()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl_kematian = $_GET['tanggal'];

                $ket = 'Data Kematian Tanggal ' . date('d-m-y', strtotime($tgl_kematian));
                $tb_kematian = $this->Laporan_model->date($tgl_kematian); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Kematian Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $tb_kematian = $this->Laporan_model->month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Kematian Tahun ' . $tahun;
                $tb_kematian = $this->Laporan_model->year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Kematian';
            $tb_kematian = $this->Laporan_model->getAllLaporanKematian(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['tb_kematian'] = $tb_kematian;
        $this->load->view('laporan/printkematian', $data);

        // ob_start();
        // $this->load->view('laporan/printkel', $data);
        // $html = ob_get_contents();
        // ob_end_clean();

        // require './assets/html2pdf/autoload.php';

        // $pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
        // $pdf->WriteHTML($html);
        // $pdf->Output('Data Transaksi.pdf', 'D');
    }
}

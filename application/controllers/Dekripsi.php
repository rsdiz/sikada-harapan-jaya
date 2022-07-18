<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . '/libraries/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Dekripsi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dekripsi_model');
    }

    public function index()

    {
        $data['title'] = 'Dekripsi';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['dekripsi'] = $this->Dekripsi_model->getAllDekripsi();
        $data['file'] = $this->Dekripsi_model->getAllFile();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Dekripsi/index', $data);
        $this->load->view('templates/footer');
    }

    public function download($id_file)
    {
        $file = $this->Dekripsi_model->getWhereFile($id_file);

        $name_file = $file['nama_file_enkrip'];
        $data = file_get_contents('./assets/file_chipertext/' . $name_file);

        // print_r($file);

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $name_file . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('./assets/file_chipertext/' . $name_file));

        // $this->load->helper('download');

        echo "$data";
    }

    public function dekrip($id_file)
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Form Dekripsi';
        $this->load->model('Dekripsi_model', 'data');

        $data_file = $this->data->getDekripsiById($id_file);

        $data['data'] = $data_file;

        $this->form_validation->set_rules('nama_file', 'Nama File Awal', 'required');
        $this->form_validation->set_rules('nama_file_enkrip', 'Nama File Enkripsi', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('Dekripsi/dekrip', $data);
            $this->load->view('templates/footer');
        } else {
            $plaintext = "";
            $ciphertext = "";

            $password = $this->input->post('password');

            if ($data_file['password'] == $password) {
                $this->load->library('DES');
                $path = "assets/file_encript/" . $this->input->post('nama_file_enkrip');

                $bin_ciphertext = (string) file_get_contents($path);
                $arr_ciphertext = str_split($bin_ciphertext, 64);

                // echo "<br>" . $bin_ciphertext;
                // print_r($arr_ciphertext);
                $desModule = new DES();

                foreach ($arr_ciphertext as $i) {
                    $decrypt = $desModule->decrypt($i, $password);
                    $plaintext .= $desModule->read_bin($decrypt);
                    $ciphertext .= $desModule->read_bin($i);
                }

                // echo $decrypt;
                // echo "<br>" . $plaintext;

                // header('Content-Description: File Transfer');
                // header('Content-Type: application/octet-stream');
                // header('Content-Disposition: attachment; filename="' . $data_file['nama_file'] . '"');
                // header('Expires: 0');
                // header('Cache-Control: must-revalidate');
                // header('Pragma: public');
                // header('Content-Length: ' . filesize('' . $data_file));

                // echo "$plaintext";

                $this->load->library('Pdfgenerator');
                $dt['plaintext'] = $plaintext;
                // $this->load->view('Dekripsi/downloadPdf', $dt);

                $new_plaintext = mb_convert_encoding($plaintext, 'UTF-8', 'ASCII');

                // echo $plaintext;
                // echo "<br>";
                // echo $new_plaintext;

                $html = ob_get_contents();
                ob_end_clean();

                $pdfgenerator = new Pdfgenerator();
                $pdfgenerator->generate($new_plaintext, $data_file['nama_file'], "A4", "landscape", TRUE);
                $pdfgenerator->loadHtml($html);
                $pdfgenerator->setPaper('A4', 'landscape');
                $pdfgenerator->render();
                $pdfgenerator->stream($data_file['nama_file'], array('Attachment' => 0));
                exit();
            } else {
                // echo "Salah password";
                // $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                //     Password salah
                //     </div>');
                // redirect('dekripsi/dekrip/' . $id_file);
                $data['pesan'] = '<div class="alert alert-danger" role="alert"> Password salah</div>';

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('Dekripsi/dekrip', $data);
                $this->load->view('templates/footer');
            }

            // $data = [
            //     "nama_file" => $this->input->post('nama_file', true),
            //     "nama_file_enkrip" => $this->input->post('nama_file_enkrip', true),
            //     "password" => $this->input->post('password', true),
            // ];
            // $this->Dekripsi_model->formDataDekripsi($data);
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            // Berhasil</div>');

            // redirect('dekripsi');
        }
    }

    // public function dekrip($id_file)
    // {
    //     $data['user'] = $this->db->get_where('tb_user', ['email' =>
    //     $this->session->userdata('email')])->row_array();

    //     $data['title'] = 'Form Dekripsi';
    //     $data['dekripsi'] = $this->Dekripsi_model->getDekripsiById($id_file);

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('dekripsi/dekrip', $data);
    //     $this->load->view('templates/footer');
    // }

    public function hapus($id_file)
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->Dekripsi_model->hapusDataDekripsi($id_file);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('dekripsi');
    }
}
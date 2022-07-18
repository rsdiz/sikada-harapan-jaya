<?php
defined('BASEPATH') or exit('No direct script access allowed');

// panggil autoload dompdf nya
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdfgenerator extends Dompdf
{

    public function generate($html, $filename = '', $paper = '', $orientation = '', $stream = TRUE)
    {
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        if ($stream) {
            $dompdf->stream($filename . ".pdf", array("Attachment" => 0));
        } else {
            return $dompdf->output();
        }
    }

    protected function ci()
    {
        return get_instance();
    }

    public function load_view($view, $data = array())
    {
        $dompdf = new Dompdf();
        $html = $this->ci()->load->view($view, $data, TRUE);

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();
        // $time = time();

        // Output the generated PDF to Browser
        $dompdf->stream("Data Penduduk");
    }
}

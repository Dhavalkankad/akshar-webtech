<?php defined('BASEPATH') or exit('No direct script access allowed');

use Mpdf\Mpdf;

class Pdf
{
    public $mpdf;

    public function __construct($params = [])
    {
        require_once APPPATH . '../vendor/autoload.php';

        $default_config = array_merge([
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'P',
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_top' => 0,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0
        ], $params);

        $this->mpdf = new Mpdf($default_config);
    }
}

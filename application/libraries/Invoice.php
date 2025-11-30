<?php

class Invoice
{

    public function __construct() {}

    public function __get($var)
    {
        return get_instance()->$var;
    }

    public function generate_pdf($content, $name = 'download.pdf', $output_type = NULL, $footer = NULL, $margin_bottom = 0, $header = NULL, $margin_top = 0, $orientation = 'P', $custom_footer = NULL, $custom_folder_name = NULL)
    {
        if (!$output_type) {
            $output_type = 'D';
        }

        $this->load->library('pdf');
        $pdf = $this->pdf->mpdf;

        $header = '<div class="header"><div class="logo">Salford & Co.</div><div class="slogan">Your Slogan Goes Here</div></div>';
        if (!empty($header)) {
            $pdf->SetHTMLHeader($header);
        }
        $footer = '<div class="footer"><p>THANK YOU FOR YOUR BUSINESS</p><p>123 Anywhere St., Any City - 123-456-7890 - hello@reallygreatsite.com</p></div>';
        if (!empty($footer)) {
            $pdf->SetHTMLFooter($footer);
        }
        $pdf->WriteHTML($content);

        if ($output_type == 'S') {
            $file_content = $pdf->Output('', 'S');
            $this->load->helper('file');
            $path = 'uploads/invoices/' . ($custom_folder_name ? "$custom_folder_name/" : '') . $name;
            write_file($path, $file_content);
            return $path;
        } else {
            $pdf->Output($name, $output_type);
        }
    }
}

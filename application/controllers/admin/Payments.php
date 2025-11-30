<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payments extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Payments_model');
        $this->load->model('Orders_model');
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (!($isLoggedIn)) {
            redirect('admin');
        }
    }

    public function payments_list()
    {
        $data = array();
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (isset($isLoggedIn) && $isLoggedIn == TRUE) {
            $con = array(
                'returnType' => ''
            );
            $data['payments_details'] = $this->Payments_model->getRows($con);
            $this->load->view('admin/payments/payments_list', $data);
        } else {
            redirect('admin');
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Contactus_model');
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (!($isLoggedIn)) {
            redirect('admin');
        }
    }

    public function index()
    {
        $data = array();
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (isset($isLoggedIn) && $isLoggedIn == TRUE) {
            $con = array(
                'returnType' => ''
            );
            $data['contact_details'] = $this->Contactus_model->getRows($con);
            $this->load->view('admin/contactus/index', $data);
        } else {
            redirect('admin');
        }
    }
}

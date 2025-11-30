<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (!($isLoggedIn)) {
            redirect('admin');
        }
    }

    public function users_list()
    {
        $data = array();
        $con = array(
            'returnType' => ''
        );
        $data['users_details'] = $this->Users_model->getRows($con);
        $this->load->view('admin/users/users_list', $data);
    }

    public function view_users_details($id = "")
    {
        $data = [];
        if (isset($id) && !empty($id)) {
            $con = [
                'conditions' => [
                    'id' => $id,
                ],
                'returnType' => 'single'
            ];
            $data['users_details'] = $this->Users_model->getRows($con);
            $data['billing_address'] = $this->Users_model->get_address($data['users_details']['id'], 'billing');
            $data['shipping_address'] = $this->Users_model->get_address($data['users_details']['id'], 'shipping');
        }
        return $this->load->view('admin/users/view_users_details', $data);
    }
}

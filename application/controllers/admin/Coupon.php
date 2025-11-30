<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coupon extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Coupon_model');
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (!($isLoggedIn)) {
            redirect('admin');
        }
    }

    public function coupon_list()
    {
        $data = array();
        $con = array(
            'returnType' => ''
        );
        $data['coupon_details'] = $this->Coupon_model->get_all_coupon($con);
        $this->load->view('admin/coupon/coupon_list', $data);
    }

    public function add_coupon()
    {
        $data = array();
        $data['coupon_details'] = array();
        return $this->load->view('admin/coupon/add_coupon', $data);
    }

    public function edit_coupon($id = "")
    {
        $data = array();
        if (isset($id) && !empty($id)) {
            $con = array(
                'id' => $id
            );
            $data['coupon_details'] = $this->Coupon_model->get_all_coupon($con);
        }
        return $this->load->view('admin/coupon/add_coupon', $data);
    }

    public function delete_coupon($id = "")
    {
        $data = array();
        if (isset($id) && !empty($id)) {
            $con = array(
                'id' => $id
            );
            $coupon_details = $this->Coupon_model->get_all_coupon($con);
            $where = array('id' => $id);
            if ($this->Coupon_model->delete_coupon($where)) {
                $data['status'] = true;
                $data['message'] = 'Coupon deleted successfully.';
            } else {
                $data['status'] = false;
                $data['message'] = 'Something went wrong, please try again.';
            }
        }
        echo json_encode($data);
    }

    public function coupon_commit()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('code', 'Coupon Code', 'required');
            $this->form_validation->set_rules('type', 'Type', 'required');
            $this->form_validation->set_rules('value', 'Value', 'required|numeric');
            $this->form_validation->set_rules('start_date', 'Start Date', 'required');
            $this->form_validation->set_rules('end_date', 'End Date', 'required');
            $this->form_validation->set_rules('status', 'status', 'required');
            if ($this->form_validation->run() == true) {
                $details = [
                    'code' => $this->input->post('code'),
                    'type' => $this->input->post('type'),
                    'value' => $this->input->post('value'),
                    'min_order_amount' => $this->input->post('min_order_amount') ?: 0,
                    'start_date' => $this->input->post('start_date'),
                    'end_date' => $this->input->post('end_date'),
                    'status' => $this->input->post('status')
                ];
                if (($this->input->post('id') != "")) {
                    $where = array('id' => $this->input->post('id'));
                    $code = trim($this->input->post('code'));
                    if ($this->Coupon_model->coupons_exist($code, $this->input->post('id'))) {
                        $this->session->set_flashdata('error', 'The coupon code already exists. Please use another coupon code.');
                        redirect('admin/coupon-list');
                        return;
                    }
                    if ($this->Coupon_model->update_coupon($details, $where)) {
                        $this->session->set_flashdata('success', 'Coupon updated successfully.');
                    } else {
                        $this->session->set_flashdata('error', 'Something went wrong! please try again.');
                    }
                } else {
                    $code = trim($this->input->post('code'));
                    if ($this->Coupon_model->coupons_exist($code)) {
                        $this->session->set_flashdata('error', 'The coupon code already exists. Please use another coupon code.');
                        redirect('admin/coupon-list');
                        return;
                    }
                    $last_id = $this->Coupon_model->insert_coupon($details);
                    if ($last_id > 0) {
                        $this->session->set_flashdata('success', 'Coupon added successfully.');
                    } else {
                        $this->session->set_flashdata('error', 'Something went wrong! please try again.');
                    }
                }
            } else {
                $this->session->set_flashdata('error', 'Please fill all the mandatory fields.');
            }
            redirect('admin/coupon-list');
        }
    }
}

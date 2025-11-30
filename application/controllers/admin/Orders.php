<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Orders_model');
        $this->load->model('Payments_model');
        $this->load->model('Products_model');
        $this->load->model('Settings_model');
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (!($isLoggedIn)) {
            redirect('admin');
        }
    }

    public function orders_list()
    {
        $data = array();
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (isset($isLoggedIn) && $isLoggedIn == TRUE) {
            $con = array(
                'returnType' => ''
            );
            $data['orders_details'] = $this->Orders_model->getRows($con);
            $this->load->view('admin/orders/orders_list', $data);
        } else {
            redirect('admin');
        }
    }

    public function edit_order_status($id = "")
    {
        $data = array();
        if (isset($id) && !empty($id)) {
            $conditions = [
                'returnType' => 'single',
                'conditions' => ['id' => decrypt($id)]
            ];
            $data['order'] = $this->Orders_model->getRows($conditions);
        }
        return $this->load->view('admin/orders/update_order_status', $data);
    }

    public function order_status_commit()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('status', 'status', 'required');
            if ($this->form_validation->run() == true) {
                $id = trim($this->input->post('id'));
                $details = array(
                    'status' => $this->input->post('status')
                );
                if ($this->Orders_model->update_status($id, $details)) {
                    $this->session->set_flashdata('success', 'Order status updated successfully.');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, please try again.');
                }
            } else {
                $this->session->set_flashdata('error', 'Please fill all the mandatory fields.');
            }
            redirect('admin/orders-list');
        }
    }

    public function generate_invoice($order_id = "")
    {
        $data = [];
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (!($isLoggedIn)) {
            redirect('admin');
        }
        if (!$order_id) {
            $this->session->set_flashdata('error', 'Order not found.');
            redirect('login');
            return;
        }
        $orders_details = "";
        $conditions = [
            'returnType' => 'single',
            'conditions' => ['id' => decrypt($order_id)]
        ];
        $orders_details = $this->Orders_model->getRows($conditions);
        if (!empty($orders_details)) {
            $item_conditions = [
                'returnType' => '',
                'conditions' => ['order_id' => $orders_details['id']]
            ];
            $orders_item_details                    = $this->Orders_model->getOrderItemsRows($item_conditions);
            $orders_details['order_items_details']  = !empty($orders_item_details) ? $orders_item_details : [];
        }
        $payment_conditions = [
            'returnType' => 'single',
            'conditions' => ['order_id' => decrypt($order_id)]
        ];
        $payment_details            = $this->Payments_model->getRows($payment_conditions);
        $data['invoice_settings']   = $this->Settings_model->getInvoiceSettingsRows(['returnType' => 'single']);
        $data['payment_details']    = ($payment_details) ? $payment_details : "";
        $data['orders_details']     = $orders_details;
        return $this->load->view('invoice', $data);
    }

    public function view_order_details($order_id = '')
    {
        $data = array();
        if (!$order_id) {
            $this->session->set_flashdata('error', 'Order not found.');
            redirect('login');
            return;
        }
        $orders_details = "";
        $conditions = [
            'returnType' => 'single',
            'conditions' => ['id' => decrypt($order_id)]
        ];
        $orders_details = $this->Orders_model->getRows($conditions);
        if (!empty($orders_details)) {
            $item_conditions = [
                'returnType' => '',
                'conditions' => ['order_id' => $orders_details['id']]
            ];
            $orders_item_details                    = $this->Orders_model->getOrderItemsRows($item_conditions);
            $orders_details['order_items_details']  = !empty($orders_item_details) ? $orders_item_details : [];
        }
        $payment_conditions = [
            'returnType' => 'single',
            'conditions' => ['order_id' => decrypt($order_id)]
        ];
        $payment_details            = $this->Payments_model->getRows($payment_conditions);
        $data['payment_details']    = ($payment_details) ? $payment_details : "";
        $data['orders_details']     = $orders_details;
        return $this->load->view('admin/orders/orders_details', $data);
    }
}

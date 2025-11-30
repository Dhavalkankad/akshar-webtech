<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Settings_model');
        $this->load->model('Contactus_model');
        $this->load->model('Products_model');
        $this->load->model('Orders_model');
        $this->load->model('Users_model');
        $this->load->model('Category_model');
        $this->load->model('Testimonials_model');
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (!($isLoggedIn)) {
            redirect('admin');
        }
    }

    public function dashboard()
    {
        $data = array();
        $pcon = array(
            'returnType' => 'count'
        );
        $total_products = $this->Products_model->get_all_products($pcon);
        $catcon = array(
            'returnType' => 'count'
        );
        $total_cateogry = $this->Category_model->get_all_categories($catcon);
        $ccon = array(
            'returnType' => 'count'
        );
        $total_contactus = $this->Contactus_model->getRows($ccon);
        $ocon = array(
            'returnType' => 'count'
        );
        $total_orders = $this->Orders_model->getRows($ocon);
        $ucon = array(
            'returnType' => 'count'
        );
        $total_users = $this->Users_model->getRows($ucon);
        $tcon = array(
            'returnType' => 'count'
        );
        $total_testimonials = $this->Testimonials_model->get_all_testimonials($tcon);
        $data['total_products'] = ($total_products > 0) ? $total_products : 0;
        $data['total_orders'] = ($total_orders > 0) ? $total_orders : 0;
        $data['total_users'] = ($total_users > 0) ? $total_users : 0;
        $data['total_contactus'] = ($total_contactus > 0) ? $total_contactus : 0;
        $data['total_cateogry'] = ($total_cateogry > 0) ? $total_cateogry : 0;
        $data['total_testimonials'] = ($total_testimonials > 0) ? $total_testimonials : 0;
        $this->load->view('admin/dashboard', $data);
    }

    public function company_details()
    {
        $data = array();
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (isset($isLoggedIn) && $isLoggedIn == TRUE) {
            $con = array(
                'returnType' => 'single'
            );
            $data['company'] = $this->Settings_model->getRows($con);
            $this->load->view('admin/settings/company_details', $data);
        } else {
            redirect('admin');
        }
    }

    public function update_company_details()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('contact_no', 'contact_no', 'required');
            $this->form_validation->set_rules('whatsapp_no', 'whatsapp_no', 'required');
            $this->form_validation->set_rules('address', 'address', 'required');
            $this->form_validation->set_rules('facebook', 'facebook', 'required');
            $this->form_validation->set_rules('instagram', 'instagram', 'required');
            $this->form_validation->set_rules('google', 'google', 'required');
            // $this->form_validation->set_rules('aboutus', 'aboutus', 'required');
            $this->form_validation->set_rules('company_map', 'company_map', 'required');
            $this->form_validation->set_rules('meta_keywords', 'meta_keywords', 'required');
            $this->form_validation->set_rules('meta_description', 'meta_description', 'required');
            if ($this->form_validation->run() == true) {
                $details = array(
                    'email' => trim($this->input->post('email')),
                    'contact_no' => trim($this->input->post('contact_no')),
                    'whatsapp_no' => trim($this->input->post('whatsapp_no')),
                    'address' => trim($this->input->post('address')),
                    'facebook' => trim($this->input->post('facebook')),
                    'instagram' => trim($this->input->post('instagram')),
                    'google' => trim($this->input->post('google')),
                    // 'aboutus' => trim($this->input->post('aboutus')),
                    'company_map' => trim($this->input->post('company_map')),
                    'meta_keywords' => trim($this->input->post('meta_keywords')),
                    'meta_description' => trim($this->input->post('meta_description')),
                );
                $where = array('id' => $this->input->post('company_id'));
                if ($this->Settings_model->update_company_details($details, $where)) {
                    $this->session->set_flashdata('success', 'Company details updated successfully.');
                    redirect('admin/company-details');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, please try again.');
                    redirect('admin/company-details');
                }
            } else {
                $this->session->set_flashdata('error', 'Please fill all the mandatory fields.');
                redirect('admin/company-details');
            }
        }
    }

    public function invoice_settings()
    {
        $data = array();
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (isset($isLoggedIn) && $isLoggedIn == TRUE) {
            $data['invoice_settings'] = $this->Settings_model->getInvoiceSettingsRows(['returnType' => 'single']);
            $this->load->view('admin/settings/invoice_settings', $data);
        } else {
            redirect('admin');
        }
    }

    public function update_invoice_settings()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('company_name', 'company_name', 'required');
            $this->form_validation->set_rules('city', 'city', 'required');
            $this->form_validation->set_rules('country', 'country', 'required');
            $this->form_validation->set_rules('address', 'address', 'required');
            $this->form_validation->set_rules('state', 'state', 'required');
            $this->form_validation->set_rules('zipcode', 'zipcode', 'required');
            $this->form_validation->set_rules('phone_no', 'phone_no', 'required');
            $this->form_validation->set_rules('terms_condition', 'terms_condition', 'required');
            if ($this->form_validation->run() == true) {
                $details = [
                    'email'             => trim($this->input->post('email')),
                    'company_name'      => trim($this->input->post('company_name')),
                    'city'              => trim($this->input->post('city')),
                    'country'           => trim($this->input->post('country')),
                    'address'           => trim($this->input->post('address')),
                    'state'             => trim($this->input->post('state')),
                    'zipcode'           => trim($this->input->post('zipcode')),
                    'phone_no'          => trim($this->input->post('phone_no')),
                    'terms_condition'   => trim($this->input->post('terms_condition')),
                ];
                $where = ['id' => $this->input->post('invoice_settings_id')];
                if ($this->Settings_model->update_invoice_settings_details($details, $where)) {
                    $this->session->set_flashdata('success', 'Invoice settings updated successfully.');
                    redirect('admin/invoice-settings');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, please try again.');
                    redirect('admin/invoice-settings');
                }
            } else {
                $this->session->set_flashdata('error', 'Please fill all the mandatory fields.');
                redirect('admin/invoice-settings');
            }
        }
    }
}

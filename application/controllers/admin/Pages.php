<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mypages_model');
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (!($isLoggedIn)) {
            redirect('admin');
        }
    }

    public function homepage_details()
    {
        $data = array();
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (isset($isLoggedIn) && $isLoggedIn == TRUE) {
            $acon = array(
                'returnType' => 'single',
                'conditions' => array('type' => 'aboutus')
            );
            $data['aboutus_homepage'] = $this->Mypages_model->getRows($acon);
            $why_choose_us_con = array(
                'returnType' => 'single',
                'conditions' => array('type' => 'why_choose_us')
            );
            $data['why_choose_us_homepage'] = $this->Mypages_model->getRows($why_choose_us_con);
            $this->load->view('admin/pages/homepage_details', $data);
        } else {
            redirect('admin');
        }
    }

    public function update_homepage_details()
    {
        if ($this->input->post()) {
            if ($this->input->post('type') == 'aboutus') {
                // $this->form_validation->set_rules('title', 'title', 'required');
                $this->form_validation->set_rules('description', 'description', 'required');
            } elseif ($this->input->post('type') == 'why_choose_us') {
                // $this->form_validation->set_rules('title', 'title', 'required');
                $this->form_validation->set_rules('description', 'description', 'required');
            }
            if ($this->form_validation->run() == true) {
                if ($this->input->post('type') == 'aboutus') {
                    $details = array(
                        // 'title' => trim($this->input->post('title')),
                        'description' => trim($this->input->post('description'))
                    );
                    $where = array('type' => $this->input->post('type'));
                    $upload_path = 'uploads/homepage';
                    if (!is_dir($upload_path)) {
                        mkdir($upload_path, 0755, true);
                    }
                    if (!empty($_FILES['image']['name'])) {
                        unlink($this->input->post('old_image'));
                        $config['upload_path'] = $upload_path;
                        $config['allowed_types'] = 'gif|jpg|jpeg|png|webp|svg';
                        $config['file_name'] = time() . rand() . '_' . $_FILES['image']['name'];
                        $this->load->library('upload', $config);
                        if ($this->upload->do_upload('image')) {
                            $uploadData = $this->upload->data();
                            $filepath = $upload_path . '/' . $uploadData['file_name'];
                            $details['image'] = $filepath;
                        }
                    }
                    if (!empty($_FILES['image2']['name'])) {
                        unlink($this->input->post('old_image2'));
                        $config['upload_path'] = $upload_path;
                        $config['allowed_types'] = 'gif|jpg|jpeg|png|webp|svg';
                        $config['file_name'] = time() . rand() . '_' . $_FILES['image2']['name'];
                        $this->load->library('upload', $config);
                        if ($this->upload->do_upload('image2')) {
                            $uploadData = $this->upload->data();
                            $filepath = $upload_path . '/' . $uploadData['file_name'];
                            $details['image_two'] = $filepath;
                        }
                    }
                } elseif ($this->input->post('type') == 'why_choose_us') {
                    $details = array(
                        // 'title' => trim($this->input->post('title')),
                        'description' => trim($this->input->post('description'))
                    );
                    $where = array('type' => $this->input->post('type'));
                }
                if ($this->Mypages_model->update_homepage_details($details, $where)) {
                    $this->session->set_flashdata('success', 'Details updated successfully.');
                    redirect('admin/homepage-details');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, please try again.');
                }
            } else {
                $this->session->set_flashdata('error', 'Please fill all the mandatory fields.');
            }
        }
    }

    public function privacy_policy_page_details()
    {
        $data = array();
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (isset($isLoggedIn) && $isLoggedIn == TRUE) {
            $con = [
                'conditions' => [
                    'type' => 'privacy-policy'
                ],
                'returnType' => 'single'
            ];
            $data['privacy_policy_page'] = $this->Mypages_model->get_policy_pages_rows($con);
            $this->load->view('admin/pages/privacy_policy_page_details', $data);
        } else {
            redirect('admin');
        }
    }

    public function update_privacy_policy_page_details()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('description', 'description', 'required');
            if ($this->form_validation->run() == true) {
                $details = array('description' => trim($this->input->post('description')));
                $where = array('type' => 'privacy-policy');
                if ($this->Mypages_model->update_policy_pages_details($details, $where)) {
                    $this->session->set_flashdata('success', 'Details updated successfully.');
                    redirect('admin/privacy-policy-page-details');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong! Please try again later.');
                    redirect('admin/privacy-policy-page-details');
                }
            } else {
                $this->session->set_flashdata('error', 'Please fill the description field.');
                redirect('admin/privacy-policy-page-details');
            }
        }
    }

    public function terms_conditions_page_details()
    {
        $data = array();
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (isset($isLoggedIn) && $isLoggedIn == TRUE) {
            $con = [
                'conditions' => [
                    'type' => 'terms-conditions'
                ],
                'returnType' => 'single'
            ];
            $data['terms_conditions_page'] = $this->Mypages_model->get_policy_pages_rows($con);
            $this->load->view('admin/pages/terms_conditions_page_details', $data);
        } else {
            redirect('admin');
        }
    }

    public function update_terms_conditions_page_details()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('description', 'description', 'required');
            if ($this->form_validation->run() == true) {
                $details = array('description' => trim($this->input->post('description')));
                $where = array('type' => 'terms-conditions');
                if ($this->Mypages_model->update_policy_pages_details($details, $where)) {
                    $this->session->set_flashdata('success', 'Details updated successfully.');
                    redirect('admin/terms-conditions-page-details');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong! Please try again later.');
                    redirect('admin/terms-conditions-page-details');
                }
            } else {
                $this->session->set_flashdata('error', 'Please fill the description field.');
                redirect('admin/terms-conditions-page-details');
            }
        }
    }

    public function cancellation_returns_policy_page_details()
    {
        $data = array();
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (isset($isLoggedIn) && $isLoggedIn == TRUE) {
            $con = [
                'conditions' => [
                    'type' => 'cancellation-returns-policy'
                ],
                'returnType' => 'single'
            ];
            $data['cancellation_returns_policy_page'] = $this->Mypages_model->get_policy_pages_rows($con);
            $this->load->view('admin/pages/cancellation_returns_policy_page_details', $data);
        } else {
            redirect('admin');
        }
    }

    public function update_cancellation_returns_policy_page_details()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('description', 'description', 'required');
            if ($this->form_validation->run() == true) {
                $details = array('description' => trim($this->input->post('description')));
                $where = array('type' => 'cancellation-returns-policy');
                if ($this->Mypages_model->update_policy_pages_details($details, $where)) {
                    $this->session->set_flashdata('success', 'Details updated successfully.');
                    redirect('admin/cancellation-returns-policy-page-details');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong! Please try again later.');
                    redirect('admin/cancellation-returns-policy-page-details');
                }
            } else {
                $this->session->set_flashdata('error', 'Please fill the description field.');
                redirect('admin/cancellation-returns-policy-page-details');
            }
        }
    }

    public function refund_policy_page_details()
    {
        $data = array();
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (isset($isLoggedIn) && $isLoggedIn == TRUE) {
            $con = [
                'conditions' => [
                    'type' => 'refund-policy'
                ],
                'returnType' => 'single'
            ];
            $data['refund_policy_page'] = $this->Mypages_model->get_policy_pages_rows($con);
            $this->load->view('admin/pages/refund_policy_page_details', $data);
        } else {
            redirect('admin');
        }
    }

    public function update_refund_policy_page_details()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('description', 'description', 'required');
            if ($this->form_validation->run() == true) {
                $details = array('description' => trim($this->input->post('description')));
                $where = array('type' => 'refund-policy');
                if ($this->Mypages_model->update_policy_pages_details($details, $where)) {
                    $this->session->set_flashdata('success', 'Details updated successfully.');
                    redirect('admin/refund-policy-page-details');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong! Please try again later.');
                    redirect('admin/refund-policy-page-details');
                }
            } else {
                $this->session->set_flashdata('error', 'Please fill the description field.');
                redirect('admin/refund-policy-page-details');
            }
        }
    }

    public function shipping_policy_page_details()
    {
        $data = array();
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (isset($isLoggedIn) && $isLoggedIn == TRUE) {
            $con = [
                'conditions' => [
                    'type' => 'shipping-policy'
                ],
                'returnType' => 'single'
            ];
            $data['shipping_policy_page'] = $this->Mypages_model->get_policy_pages_rows($con);
            $this->load->view('admin/pages/shipping_policy_page_details', $data);
        } else {
            redirect('admin');
        }
    }

    public function update_shipping_policy_page_details()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('description', 'description', 'required');
            if ($this->form_validation->run() == true) {
                $details = array('description' => trim($this->input->post('description')));
                $where = array('type' => 'shipping-policy');
                if ($this->Mypages_model->update_policy_pages_details($details, $where)) {
                    $this->session->set_flashdata('success', 'Details updated successfully.');
                    redirect('admin/shipping-policy-page-details');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong! Please try again later.');
                    redirect('admin/shipping-policy-page-details');
                }
            } else {
                $this->session->set_flashdata('error', 'Please fill the description field.');
                redirect('admin/shipping-policy-page-details');
            }
        }
    }

    public function aboutpage_details()
    {
        $data = array();
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (isset($isLoggedIn) && $isLoggedIn == TRUE) {
            $acon = array(
                'returnType' => 'single',
                'conditions' => array('type' => 'aboutus')
            );
            $data['aboutpage'] = $this->Mypages_model->get_about_rows($acon);
            $our_vision_con = array(
                'returnType' => 'single',
                'conditions' => array('type' => 'our_vision')
            );
            $data['our_vision_aboutpage'] = $this->Mypages_model->get_about_rows($our_vision_con);
            $our_mission_con = array(
                'returnType' => 'single',
                'conditions' => array('type' => 'our_mission')
            );
            $data['our_mission_aboutpage'] = $this->Mypages_model->get_about_rows($our_mission_con);
            $our_product_con = array(
                'returnType' => 'single',
                'conditions' => array('type' => 'our_product')
            );
            $data['our_product_aboutpage'] = $this->Mypages_model->get_about_rows($our_product_con);
            $our_design_process_con = array(
                'returnType' => 'single',
                'conditions' => array('type' => 'our_design_process')
            );
            $data['our_design_process_aboutpage'] = $this->Mypages_model->get_about_rows($our_design_process_con);

            $this->load->view('admin/pages/aboutpage_details', $data);
        } else {
            redirect('admin');
        }
    }

    public function update_aboutpage_details()
    {
        if ($this->input->post()) {
            if ($this->input->post('type') == 'aboutus') {
                $this->form_validation->set_rules('title', 'title', 'required');
                $this->form_validation->set_rules('aboutus_description', 'description', 'required');
            } elseif ($this->input->post('type') == 'our_vision') {
                $this->form_validation->set_rules('our_vision_description', 'description', 'required');
            } elseif ($this->input->post('type') == 'our_mission') {
                $this->form_validation->set_rules('our_mission_description', 'description', 'required');
            } elseif ($this->input->post('type') == 'our_product') {
                $this->form_validation->set_rules('our_product_description', 'description', 'required');
            } elseif ($this->input->post('type') == 'our_design_process') {
                $this->form_validation->set_rules('our_design_process_description', 'description', 'required');
            }
            if ($this->form_validation->run() == true) {
                $upload_path = 'uploads/aboutuspage';
                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0755, true);
                }
                if ($this->input->post('type') == 'aboutus') {
                    $details = array('title' => trim($this->input->post('title')), 'description' => trim($this->input->post('aboutus_description')));
                    $where = array('type' => $this->input->post('type'));
                    if (!empty($_FILES['image']['name'])) {
                        unlink($this->input->post('old_image'));
                        $config['upload_path'] = $upload_path;
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['file_name'] = time() . rand() . '_' . $_FILES['image']['name'];
                        $this->load->library('upload', $config);
                        if ($this->upload->do_upload('image')) {
                            $uploadData = $this->upload->data();
                            $filepath = $upload_path . '/' . $uploadData['file_name'];
                            $details['image'] = $filepath;
                        }
                    }
                } elseif ($this->input->post('type') == 'our_vision') {
                    $details = array('description' => trim($this->input->post('our_vision_description')));
                    $where = array('type' => $this->input->post('type'));
                } elseif ($this->input->post('type') == 'our_mission') {
                    $details = array('description' => trim($this->input->post('our_mission_description')));
                    $where = array('type' => $this->input->post('type'));
                } elseif ($this->input->post('type') == 'our_product') {
                    $details = array('description' => trim($this->input->post('our_product_description')));
                    $where = array('type' => $this->input->post('type'));
                    if (!empty($_FILES['image']['name'])) {
                        unlink($this->input->post('old_image'));
                        $config['upload_path'] = $upload_path;
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['file_name'] = time() . rand() . '_' . $_FILES['image']['name'];
                        $this->load->library('upload', $config);
                        if ($this->upload->do_upload('image')) {
                            $uploadData = $this->upload->data();
                            $filepath = $upload_path . '/' . $uploadData['file_name'];
                            $details['image'] = $filepath;
                        }
                    }
                } elseif ($this->input->post('type') == 'our_design_process') {
                    $details = array('description' => trim($this->input->post('our_design_process_description')));
                    $where = array('type' => $this->input->post('type'));
                }
                if ($this->Mypages_model->update_aboutpage_details($details, $where)) {
                    $this->session->set_flashdata('success', 'Details updated successfully.');
                    redirect('admin/aboutpage-details');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong! please try again later.');
                }
            } else {
                $this->session->set_flashdata('error', 'Please fill all the mandatory fields.');
            }
        }
    }
}

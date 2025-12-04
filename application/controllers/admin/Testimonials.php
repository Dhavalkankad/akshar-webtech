<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimonials extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Testimonials_model');
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (!($isLoggedIn)) {
            redirect('admin');
        }
    }

    public function testimonials_list()
    {
        $data = array();
        $con = array(
            'returnType' => ''
        );
        $data['testimonials_details'] = $this->Testimonials_model->get_all_testimonials($con);
        $this->load->view('admin/testimonials/testimonials_list', $data);
    }

    public function add_testimonials()
    {
        $data = array();
        $data['testimonials_details'] = array();
        return $this->load->view('admin/testimonials/add_testimonials', $data);
    }

    public function edit_testimonials($id = "")
    {
        $data = array();
        if (isset($id) && !empty($id)) {
            $con = array(
                'id' => $id
            );
            $data['testimonials_details'] = $this->Testimonials_model->get_all_testimonials($con);
        }
        return $this->load->view('admin/testimonials/add_testimonials', $data);
    }

    public function delete_testimonials($id = "")
    {
        $data = array();
        if (isset($id) && !empty($id)) {
            $con = array(
                'id' => $id
            );
            $testimonials_details = $this->Testimonials_model->get_all_testimonials($con);
            $where = array('id' => $id);
            if ($this->Testimonials_model->delete_testimonials($where)) {
                if (file_exists($testimonials_details['client_image'])) {
                    unlink($testimonials_details['client_image']);
                }
                $data['status'] = true;
                $data['message'] = 'Testimonials deleted successfully.';
            } else {
                $data['status'] = false;
                $data['message'] = 'Something went wrong! please try again later.';
            }
        }
        echo json_encode($data);
    }

    public function testimonials_commit()
    {
        $data = array();
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Customer Name', 'required|trim');
            $this->form_validation->set_rules('position', 'Position', 'required|trim');
            $this->form_validation->set_rules('rating', 'Rating', 'required|integer|less_than_equal_to[5]|greater_than_equal_to[1]');
            $this->form_validation->set_rules('description', 'Description', 'required|trim');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == true) {
                $details = array(
                    'name'        => trim($this->input->post('name')),
                    'position'        => trim($this->input->post('position')),
                    'rating'      => (int)$this->input->post('rating'), // 1 to 5
                    'description' => trim($this->input->post('description')),
                    'status'      => $this->input->post('status')
                );
                if (($this->input->post('id') != "")) {
                    if (!empty($_FILES['image']['name'])) {
                        $upload_path = 'uploads/testimonials';
                        if (!is_dir($upload_path)) {
                            mkdir($upload_path, 0755, true);
                        }
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
                    $where = array('id' => $this->input->post('id'));
                    if ($this->Testimonials_model->update_testimonials($details, $where)) {
                        $this->session->set_flashdata('success', 'Testimonials updated successfully.');
                    } else {
                        $this->session->set_flashdata('error', 'Something went wrong! please try again later.');
                    }
                } else {
                    if (!empty($_FILES['image']['name'])) {
                        $upload_path = 'uploads/testimonials';
                        if (!is_dir($upload_path)) {
                            mkdir($upload_path, 0755, true);
                        }
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
                    $last_id = $this->Testimonials_model->insert_testimonials($details);
                    if ($last_id > 0) {
                        $this->session->set_flashdata('success', 'Testimonials added successfully.');
                    } else {
                        $this->session->set_flashdata('error', 'Something went wrong! please try again later.');
                    }
                }
            } else {
                $this->session->set_flashdata('error', 'Please fill all the mandatory fields.');
            }
            redirect('admin/testimonials-list');
        }
    }
}

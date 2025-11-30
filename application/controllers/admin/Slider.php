<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Slider_model');
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (!($isLoggedIn)) {
            redirect('admin');
        }
    }

    public function slider_list()
    {
        $data = array();
        $con = array(
            'returnType' => ''
        );
        $data['slider_details'] = $this->Slider_model->get_all_slider($con);
        $this->load->view('admin/slider/slider_list', $data);
    }

    public function add_slider()
    {
        $data = array();
        $data['slider_details'] = array();
        return $this->load->view('admin/slider/add_slider', $data);
    }

    public function edit_slider($id = "")
    {
        $data = array();
        if (isset($id) && !empty($id)) {
            $con = array(
                'id' => $id
            );
            $data['slider_details'] = $this->Slider_model->get_all_slider($con);
        }
        return $this->load->view('admin/slider/add_slider', $data);
    }

    public function delete_slider($id = "")
    {
        $data = array();
        if (isset($id) && !empty($id)) {
            $con = array(
                'id' => $id
            );
            $slider_details = $this->Slider_model->get_all_slider($con);
            $where = array('id' => $id);
            if ($this->Slider_model->delete_slider($where)) {
                if (file_exists($slider_details['image'])) {
                    unlink($slider_details['image']);
                }
                $data['status'] = true;
                $data['message'] = 'Slider deleted successfully.';
            } else {
                $data['status'] = false;
                $data['message'] = 'Something went wrong, please try again.';
            }
        }
        echo json_encode($data);
    }

    public function slider_commit()
    {
        $data = array();
        if ($this->input->post()) {
            // $this->form_validation->set_rules('description', 'description', 'required');
            $this->form_validation->set_rules('ordering', 'ordering', 'required');
            // $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('status', 'status', 'required');
            if ($this->form_validation->run() == true) {
                if (($this->input->post('id') != "")) {
                    $details = array(
                        // 'description' => trim($this->input->post('description')),
                        'ordering' => trim($this->input->post('ordering')),
                        'status' => $this->input->post('status'),
                        // 'title' => $this->input->post('title')
                    );
                    if (!empty($_FILES['image']['name'])) {
                        $upload_path = 'uploads/slider';
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
                    if ($this->Slider_model->update_slider($details, $where)) {
                        $this->session->set_flashdata('success', 'Slider updated successfully.');
                    } else {
                        $this->session->set_flashdata('error', 'Something went wrong, please try again.');
                    }
                } else {
                    $details = array(
                        // 'description' => trim($this->input->post('description')),
                        'ordering' => trim($this->input->post('ordering')),
                        'image' => '',
                        'status' => $this->input->post('status'),
                        // 'title' => $this->input->post('title')
                    );
                    $last_id = $this->Slider_model->insert_slider($details);
                    if ($last_id > 0) {
                        if (!empty($_FILES['image']['name'])) {
                            $upload_path = 'uploads/slider';
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
                        $where = array('id' => $last_id);
                        if ($this->Slider_model->update_slider($details, $where)) {
                            $this->session->set_flashdata('success', 'Slider added successfully.');
                        } else {
                            $this->session->set_flashdata('error', 'Something went wrong, please try again.');
                        }
                    } else {
                        $this->session->set_flashdata('error', 'Something went wrong, please try again.');
                    }
                }
            } else {
                $this->session->set_flashdata('error', 'Please fill all the mandatory fields.');
            }
            redirect('admin/slider-list');
        }
    }
}

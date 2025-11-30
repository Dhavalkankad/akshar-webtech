<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model');
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (!($isLoggedIn)) {
            redirect('admin');
        }
    }

    public function category_list()
    {
        $data = array();
        $con = array(
            'returnType' => ''
        );
        $data['category'] = $this->Category_model->get_all_categories($con);
        $data['main_categories'] = $this->Category_model->get_main_categories();
        $this->load->view('admin/category/category_list', $data);
    }

    public function add_category()
    {
        $data = [];
        $data['category'] = [];
        $data['main_categories'] = $this->Category_model->get_main_categories();
        return $this->load->view('admin/category/add_category', $data);
    }

    public function edit_category($id = "")
    {
        $data = array();
        if (isset($id) && !empty($id)) {
            $data['category'] = $this->Category_model->get_by_id($id);
            $data['main_categories'] = $this->Category_model->get_main_categories();
        }
        return $this->load->view('admin/category/add_category', $data);
    }

    public function delete_category($id = "")
    {
        $data = array();
        if (isset($id) && !empty($id)) {
            $subcategories = $this->Category_model->get_subcategories($id);
            if (isset($subcategories) && !empty($subcategories)) {
                foreach ($subcategories as $sub) {
                    if (file_exists($sub['icon_image'])) {
                        unlink($sub['icon_image']);
                    }
                    if (file_exists($sub['poster_image'])) {
                        unlink($sub['poster_image']);
                    }
                }
            }
            $category = $this->Category_model->get_by_id($id);
            if ($this->Category_model->delete_category($id)) {
                if (file_exists($category['icon_image'])) {
                    unlink($category['icon_image']);
                }
                if (file_exists($category['poster_image'])) {
                    unlink($category['poster_image']);
                }
                $data['status'] = true;
                $data['message'] = 'Category deleted successfully.';
            } else {
                $data['status'] = false;
                $data['message'] = 'Something went wrong, please try again.';
            }
        }
        echo json_encode($data);
    }

    public function category_commit()
    {
        if (!$this->input->post()) {
            return;
        }
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('error', 'Please fill all the mandatory fields.');
            redirect('admin/category-list');
            return;
        }
        $id = $this->input->post('id');
        $details = [
            'name' => trim($this->input->post('name', true)),
            'status' => $this->input->post('status', true),
            'parent_id' => $this->input->post('parent_id', true),
            // 'show_in_header' => $this->input->post('show_in_header') ? 1 : 0,
            'show_in_footer' => $this->input->post('show_in_footer') ? 1 : 0,
            'show_in_shop_by_categories_section' => $this->input->post('show_in_shop_by_categories_section') ? 1 : 0,
        ];
        if (!empty($id)) {
            if ($this->Category_model->is_name_exists(trim($this->input->post('name', true)), $this->input->post('parent_id', true), $id)) {
                $this->session->set_flashdata('error', 'Category name already exists.');
                redirect('admin/category-list');
            }
            if (!empty($_FILES['icon_image']['name'])) {
                $old_icon_image = $this->input->post('old_icon_image');
                if (!empty($old_icon_image) && file_exists($old_icon_image)) {
                    unlink($old_icon_image);
                }
                $upload_path = 'uploads/category';
                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0755, true);
                }
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png|webp|svg';
                $config['file_name'] = time() . rand() . '_' . $_FILES['icon_image']['name'];
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('icon_image')) {
                    $uploadData = $this->upload->data();
                    $filepath = $upload_path . '/' . $uploadData['file_name'];
                    $details['icon_image'] = $filepath;
                }
            }
            if (!empty($_FILES['poster_image']['name'])) {
                $old_poster_image = $this->input->post('old_poster_image');
                if (!empty($old_poster_image) && file_exists($old_poster_image)) {
                    unlink($old_poster_image);
                }
                $upload_path = 'uploads/category';
                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0755, true);
                }
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png|webp|svg';
                $config['file_name'] = time() . rand() . '_' . $_FILES['poster_image']['name'];
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('poster_image')) {
                    $uploadData = $this->upload->data();
                    $filepath = $upload_path . '/' . $uploadData['file_name'];
                    $details['poster_image'] = $filepath;
                }
            }
            $where = ['id' => $id];
            $success = $this->Category_model->update_category($details, $where);
            $message = $success ? 'Category updated successfully.' : 'Something went wrong! please try again.';
        } else {
            if ($this->Category_model->is_name_exists(trim($this->input->post('name', true)), $this->input->post('parent_id'))) {
                $this->session->set_flashdata('error', 'Category name already exists.');
                redirect('admin/category-list');
            }
            $details['created_at'] = date('Y-m-d H:s:i');
            $last_id = $this->Category_model->insert_category($details);
            if (!empty($_FILES['icon_image']['name'])) {
                $upload_path = 'uploads/category';
                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0755, true);
                }
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png|webp|svg';
                $config['file_name'] = time() . rand() . '_' . $_FILES['icon_image']['name'];
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('icon_image')) {
                    $uploadData = $this->upload->data();
                    $filepath = $upload_path . '/' . $uploadData['file_name'];
                    $details['icon_image'] = $filepath;
                }
            }
            if (!empty($_FILES['poster_image']['name'])) {
                $upload_path = 'uploads/category';
                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0755, true);
                }
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png|webp|svg';
                $config['file_name'] = time() . rand() . '_' . $_FILES['poster_image']['name'];
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('poster_image')) {
                    $uploadData = $this->upload->data();
                    $filepath = $upload_path . '/' . $uploadData['file_name'];
                    $details['poster_image'] = $filepath;
                }
            }
            $success = $this->Category_model->update_category($details, ['id' => $last_id]);
            $message = $success ? 'Category added successfully.' : 'Something went wrong! please try again.';
        }
        $this->session->set_flashdata($success ? 'success' : 'error', $message);
        redirect('admin/category-list');
    }

    public function generate_pdf()
    {
        return $this->load->view('admin/category/new_pdf', []);
        // $html = $this->load->view('admin/category/new_pdf', [], true);
        // $name = "invoice.pdf";
        // $this->invoice->generate_pdf($html, $name, 'I');
    }

    public function save_pdf()
    {
        $filename = $this->input->post('file_name') ?: 'invoice_' . date('Ymd_His') . '.pdf';
        if (!empty($_FILES['invoice_pdf']['name'])) {
            $upload_path = FCPATH . 'uploads/invoices/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0755, true);
            }
            $full_path = $upload_path . basename($filename);
            if (move_uploaded_file($_FILES['invoice_pdf']['tmp_name'], $full_path)) {
                echo base_url('uploads/invoices/' . basename($filename));
            } else {
                http_response_code(500);
                echo 'Failed to save file.';
            }
        } else {
            http_response_code(400);
            echo 'No file uploaded.';
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Products_model');
        $this->load->model('Category_model');
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (!($isLoggedIn)) {
            redirect('admin');
        }
    }

    public function products_list()
    {
        $data = array();
        $con = array(
            'returnType' => ''
        );
        $data['products_details'] = $this->Products_model->get_all_products($con);
        $this->load->view('admin/products/products_list', $data);
    }

    public function add_products()
    {
        $data = array();
        $data['products_details'] = array();
        $con = array(
            'conditions' => array(
                'status' => '1',
            ),
            'returnType' => ''
        );
        $data['category_list'] = $this->Category_model->get_all_categories($con);
        return $this->load->view('admin/products/add_products', $data);
    }

    public function edit_products($id = "")
    {
        $data = array();
        if (isset($id) && !empty($id)) {
            $con = array(
                'conditions' => array(
                    'id' => $id,
                ),
                'returnType' => 'single'
            );
            $data['products'] = $this->Products_model->get_all_products($con);
            $pcon = array(
                'conditions' => array(
                    'product_id' => $id,
                ),
                'returnType' => ''
            );
            $data['products_details'] = $this->Products_model->get_all_products_details($pcon);
            $con = array(
                'conditions' => array(
                    'status' => '1',
                ),
                'returnType' => ''
            );
            $data['category_list'] = $this->Category_model->get_all_categories($con);
        }
        return $this->load->view('admin/products/add_products', $data);
    }

    public function delete_products($id = "")
    {
        $data = array();
        if (isset($id) && !empty($id)) {
            $con = array(
                'conditions' => array(
                    'id' => $id
                ),
                'returnType' => 'single'
            );
            $products_details = $this->Products_model->get_all_products($con);
            $where = array('id' => $id);
            if ($this->Products_model->delete_products($where)) {
                $this->Products_model->delete_products_details(['product_id' => $id]);
                $this->delete_products_image_by_product_id($id);
                if (!empty($products_details['thumbnail'])) {
                    if (file_exists($products_details['thumbnail'])) {
                        unlink($products_details['thumbnail']);
                    }
                }
                $data['status'] = true;
                $data['message'] = 'Product deleted successfully.';
            } else {
                $data['status'] = false;
                $data['message'] = 'Something went wrong, please try again.';
            }
        }
        echo json_encode($data);
    }

    public function delete_products_image_by_product_id($id = "")
    {
        if (isset($id) && !empty($id)) {
            $con = array(
                'conditions' => array(
                    'product_id' => $id
                ),
                'returnType' => '',
            );
            $products_details = $this->Products_model->get_products_images($con);
            if (!empty($products_details)) {
                foreach ($products_details as $row) {
                    $where = array('id' => $row['id']);
                    if ($this->Products_model->delete_products_images($where)) {
                        if (!empty($row['image'])) {
                            if (file_exists($row['image'])) {
                                unlink($row['image']);
                            }
                        }
                    }
                }
            }
        }
    }

    public function delete_products_image($id = "")
    {
        $data = array();
        if (isset($id) && !empty($id)) {
            $con = array(
                'id' => $id
            );
            $products_details = $this->Products_model->get_products_images($con);
            $where = array('id' => $id);
            if ($this->Products_model->delete_products_images($where)) {
                if (!empty($products_details['image'])) {
                    if (file_exists($products_details['image'])) {
                        unlink($products_details['image']);
                    }
                }
                $data['status'] = true;
                $data['message'] = 'Product image deleted successfully.';
            } else {
                $data['status'] = false;
                $data['message'] = 'Something went wrong, please try again.';
            }
        }
        echo json_encode($data);
    }

    public function products_commit()
    {
        $data = [];
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('price', 'price', 'required|numeric|greater_than[0]');
            $this->form_validation->set_rules('category', 'category', 'required');
            $this->form_validation->set_rules('description', 'description', 'required');
            $this->form_validation->set_rules('shipping_description', 'shipping_description', 'required');
            $this->form_validation->set_rules('status', 'status', 'required');
            $this->form_validation->set_rules('stock_quantity', 'stock quantity', 'numeric|greater_than_equal_to[0]');
            if ($this->form_validation->run() == true) {
                $category = trim($this->input->post('category'));
                $stock_quantity = $this->input->post('stock_quantity') !== null ? (int)$this->input->post('stock_quantity') : 0;
                $stock_status = ($stock_quantity > 0) ? 'in_stock' : 'out_of_stock';
                $update_products_details_data = [];
                $products_details_data = [];
                if (($this->input->post('id') != "")) {
                    $details = array(
                        'name' => trim($this->input->post('name')),
                        'tagline' => trim($this->input->post('tagline')),
                        'key_features' => trim($this->input->post('key_features')),
                        'price' => trim($this->input->post('price')),
                        'category_id' => $category,
                        'description' => trim($this->input->post('description')),
                        'shipping_description' => trim($this->input->post('shipping_description')),
                        'status' => $this->input->post('status'),
                        'stock_quantity' => $stock_quantity,
                        'stock_status' => $stock_status,
                    );
                    if (!empty($_FILES['thumbnail']['name'])) {
                        $old_thumbnail = $this->input->post('old_thumbnail');
                        if (!empty($old_thumbnail) && file_exists($old_thumbnail)) {
                            @unlink($old_thumbnail);
                        }
                        $upload_path = 'uploads/products';
                        if (!is_dir($upload_path)) {
                            mkdir($upload_path, 0755, true);
                        }
                        $config['upload_path'] = $upload_path;
                        $config['allowed_types'] = 'gif|jpg|jpeg|png|webp|svg';
                        $config['file_name'] = time() . rand() . '_' . $_FILES['thumbnail']['name'];
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('thumbnail')) {
                            $uploadData = $this->upload->data();
                            $filepath = $upload_path . '/' . $uploadData['file_name'];
                            $details['thumbnail'] = $filepath;
                        }
                    }
                    $where = array('id' => $this->input->post('id'));
                    $labels = $this->input->post('label') ?: [];
                    $values = $this->input->post('value') ?: [];
                    $countLabels = is_array($labels) ? count($labels) : 0;
                    for ($i = 0; $i < $countLabels; $i++) {
                        $update_products_details_data[] = [
                            'product_id' => $this->input->post('id'),
                            'product_label' => $labels[$i],
                            'product_label_value' => isset($values[$i]) ? $values[$i] : ''
                        ];
                    }
                    if (!empty($_FILES['productimage']['name'])) {
                        $cpt = count($_FILES['productimage']['name']);
                        $files = $_FILES;
                        $pupload_path = 'uploads/products';
                        if (!is_dir($pupload_path)) {
                            mkdir($pupload_path, 0755, true);
                        }
                        for ($i = 0; $i < $cpt; $i++) {
                            $_FILES['productimage']['name'] = $files['productimage']['name'][$i];
                            $_FILES['productimage']['type'] = $files['productimage']['type'][$i];
                            $_FILES['productimage']['tmp_name'] = $files['productimage']['tmp_name'][$i];
                            $_FILES['productimage']['error'] = $files['productimage']['error'][$i];
                            $_FILES['productimage']['size'] = $files['productimage']['size'][$i];
                            $aconfig['upload_path'] = $pupload_path;
                            $aconfig['allowed_types'] = 'gif|jpg|jpeg|png|webp|svg';
                            $aconfig['file_name'] = time() . '_' . uniqid() . '_' . $files['productimage']['name'][$i];
                            $this->load->library('upload', $aconfig);
                            $this->upload->initialize($aconfig);
                            if ($this->upload->do_upload('productimage')) {
                                $auploadData = $this->upload->data();
                                $afilepath = $pupload_path . '/' . $auploadData['file_name'];
                                $mdetails = array('image' => $afilepath, 'product_id' => $this->input->post('id'), 'created_at' => date('Y-m-d H:i:s'));
                                $this->Products_model->insert_products_images($mdetails);
                            }
                        }
                    }
                    if ($this->Products_model->update_products($details, $where)) {
                        $this->Products_model->delete_products_details(['product_id' => $this->input->post('id')]);
                        if (!empty($update_products_details_data)) {
                            $this->Products_model->insert_batch_products_details($update_products_details_data);
                        }
                        $this->session->set_flashdata('success', 'Product updated successfully.');
                    } else {
                        $this->session->set_flashdata('error', 'Something went wrong, please try again.');
                    }
                } else {
                    $details = array(
                        'name' => trim($this->input->post('name')),
                        'tagline' => trim($this->input->post('tagline')),
                        'key_features' => trim($this->input->post('key_features')),
                        'price' => trim($this->input->post('price')),
                        'category_id' => $category,
                        'description' => trim($this->input->post('description')),
                        'shipping_description' => trim($this->input->post('shipping_description')),
                        'thumbnail' => '',
                        'status' => $this->input->post('status'),
                        'stock_quantity' => $stock_quantity,
                        'stock_status' => $stock_status,
                    );
                    $last_id = $this->Products_model->insert_products($details);
                    if ($last_id > 0) {
                        $upload_path = 'uploads/products';
                        if (!is_dir($upload_path)) {
                            mkdir($upload_path, 0755, true);
                        }
                        if (!empty($_FILES['thumbnail']['name'])) {
                            $config['upload_path'] = $upload_path;
                            $config['allowed_types'] = 'gif|jpg|jpeg|png|webp|svg';
                            $config['file_name'] = time() . rand() . '_' . $_FILES['thumbnail']['name'];
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('thumbnail')) {
                                $uploadData = $this->upload->data();
                                $filepath = $upload_path . '/' . $uploadData['file_name'];
                                $details['thumbnail'] = $filepath;
                            }
                        }
                        if (!empty($_FILES['productimage']['name'])) {
                            $cpt = count($_FILES['productimage']['name']);
                            $files = $_FILES;
                            $pupload_path = 'uploads/products';
                            if (!is_dir($pupload_path)) {
                                mkdir($pupload_path, 0755, true);
                            }
                            for ($i = 0; $i < $cpt; $i++) {
                                $_FILES['productimage']['name'] = $files['productimage']['name'][$i];
                                $_FILES['productimage']['type'] = $files['productimage']['type'][$i];
                                $_FILES['productimage']['tmp_name'] = $files['productimage']['tmp_name'][$i];
                                $_FILES['productimage']['error'] = $files['productimage']['error'][$i];
                                $_FILES['productimage']['size'] = $files['productimage']['size'][$i];
                                $aconfig['upload_path'] = $pupload_path;
                                $aconfig['allowed_types'] = 'gif|jpg|jpeg|png|webp|svg';
                                $aconfig['file_name'] = time() . '_' . uniqid() . '_' . $files['productimage']['name'][$i];
                                $this->load->library('upload', $aconfig);
                                $this->upload->initialize($aconfig);
                                if ($this->upload->do_upload('productimage')) {
                                    $auploadData = $this->upload->data();
                                    $afilepath = $pupload_path . '/' . $auploadData['file_name'];
                                    $mdetails = array('image' => $afilepath, 'product_id' => $last_id, 'created_at' => date('Y-m-d H:i:s'));
                                    $this->Products_model->insert_products_images($mdetails);
                                }
                            }
                        }
                        $where = array('id' => $last_id);
                        if ($this->Products_model->update_products($details, $where)) {
                            $labels = $this->input->post('label') ?: [];
                            $values = $this->input->post('value') ?: [];
                            $countLabels = is_array($labels) ? count($labels) : 0;
                            for ($i = 0; $i < $countLabels; $i++) {
                                $products_details_data[] = [
                                    'product_id' => $last_id,
                                    'product_label' => $labels[$i],
                                    'product_label_value' => isset($values[$i]) ? $values[$i] : ''
                                ];
                            }
                            if (!empty($products_details_data)) {
                                $this->Products_model->insert_batch_products_details($products_details_data);
                            }
                            $this->session->set_flashdata('success', 'Product added successfully.');
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
            redirect('admin/products-list');
        }
    }
}

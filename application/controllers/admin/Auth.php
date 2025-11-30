<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_model');
        $this->load->library('email');
    }

    public function index()
    {
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (isset($isLoggedIn) && $isLoggedIn == TRUE) {
            redirect('admin/dashboard');
        } else {
            $this->load->view('admin/auth/login');
        }
    }

    public function login()
    {
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (isset($isLoggedIn) && $isLoggedIn == TRUE) {
            redirect('admin/dashboard');
        } else {
            $data = array();
            if ($this->input->post()) {
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('password', 'password', 'required');
                if ($this->form_validation->run() == true) {
                    $con = array(
                        'returnType' => 'single',
                        'conditions' => array(
                            'email' => trim($this->input->post('email')),
                            'password' => md5(trim($this->input->post('password'))),
                            'status' => 1
                        )
                    );
                    $checkLogin = $this->Admin_model->getRows($con);
                    if ($checkLogin) {
                        $this->session->set_userdata('isUserLoggedIn', TRUE);
                        $this->session->set_userdata('userId', $checkLogin['id']);
                        $this->session->set_userdata('user_detail', $checkLogin);
                        $this->session->set_flashdata('success', 'Login successfully.');
                        redirect('admin/dashboard');
                    } else {
                        $this->session->set_flashdata('error', 'Login failed, please try again.');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Please fill all the mandatory fields.');
                }
            }
            $this->load->view('admin/auth/login', $data);
        }
    }

    public function forgot_password()
    {
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (isset($isLoggedIn) && $isLoggedIn == TRUE) {
            redirect('admin/dashboard');
        } else {
            $data = array();
            if ($this->input->post()) {
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                if ($this->form_validation->run() == true) {
                    $con = array(
                        'returnType' => 'single',
                        'conditions' => array(
                            'email' => trim($this->input->post('email'))
                        )
                    );
                    $get_user_details = $this->Admin_model->getRows($con);
                    if (!empty($get_user_details)) {
                        $reset_token = "";
                        $data['name'] = $get_user_details['name'];
                        $data['email'] = $get_user_details['email'];
                        $reset_token = md5(microtime());
                        $data['reset_link'] = base_url('admin/reset-password') . '?token=' . $reset_token;
                        $details = array('reset_token' => $reset_token);
                        $where = array('email' => $get_user_details['email']);
                        if ($this->Admin_model->update_details($details, $where)) {
                            $this->load->library('email');
                            $config = array(
                                'protocol' => 'mail',
                                'mailtype' => 'html',
                                'charset' => 'utf-8',
                                'newline' => "\r\n"
                            );
                            $this->email->initialize($config);
                            $this->email->from('info@swingwellcradle.com', 'Swing Well Cradle');
                            $this->email->to($get_user_details['email']);
                            $this->email->subject('Reset Password');
                            $this->email->message($this->load->view('admin/email/reset_password', $data, TRUE));
                            $sendStatus = $this->email->send();
                        }
                        if ($sendStatus) {
                            $this->session->set_flashdata('success', 'Reset password link successfully sent to your email address.');
                            redirect('admin/forgot-password');
                        } else {
                            $this->session->set_flashdata('error', 'Something went wrong! Please try again later.');
                        }
                    } else {
                        $this->session->set_flashdata('error', 'This email address does not exist.');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Please enter email address.');
                }
            }
            $this->load->view('admin/auth/forgot_password', $data);
        }
    }

    public function reset_password()
    {
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (isset($isLoggedIn) && $isLoggedIn == TRUE) {
            redirect('admin/dashboard');
        } else {
            $data = array();
            $data['reset_token'] = $this->input->get('token');
            if ($this->input->post()) {
                $this->form_validation->set_rules('password', 'password', 'required');
                $this->form_validation->set_rules('confirm_password', 'confirm_password', 'required');
                if ($this->form_validation->run() == true) {
                    $details = array('password' => md5(trim($this->input->post('password'))), 'reset_token' => '');
                    $where = array('reset_token' => $this->input->post('reset_token'));
                    if ($this->Admin_model->update_details($details, $where)) {
                        $this->session->set_flashdata('success', 'Password reset successfully.');
                        redirect('admin/login');
                    } else {
                        $this->session->set_flashdata('error', 'Something went wrong, please try again.');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Please fill all the mandatory fields.');
                }
            }
            $this->load->view('admin/auth/reset_password', $data);
        }
    }

    public function logout()
    {
        if ($this->session->userdata('isUserLoggedIn')) {
            $this->session->unset_userdata('isUserLoggedIn');
            $this->session->unset_userdata('userId');
            $this->session->unset_userdata('user_detail');
        }
        $this->session->set_flashdata('success', 'Logout successfully.');
        redirect('admin');
    }

    public function edit_profile()
    {
        $data = array();
        $data['title'] = "Settings";
        $data['breadcrums'] = "Settings";
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (isset($isLoggedIn) && $isLoggedIn == TRUE) {
            if ($this->input->post()) {
                $this->form_validation->set_rules('name', 'name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                if ($this->form_validation->run() == true) {
                    $email_exist_details = $this->Admin_model->email_exist(trim($this->input->post('email')), $this->input->post('user_id'));
                    if (empty($email_exist_details)) {
                        $details = array('name' => trim($this->input->post('name')), 'email' => trim($this->input->post('email')));
                        $where = array('id' => $this->input->post('user_id'));
                        if ($this->Admin_model->update_details($details, $where)) {
                            $this->session->set_flashdata('success', 'Profile update successfully.');
                            redirect('admin/settings');
                        } else {
                            $this->session->set_flashdata('error', 'Something went wrong, please try again.');
                        }
                    } else {
                        $this->session->set_flashdata('error', 'This email address is already exist.');
                        redirect('admin/settings');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Please fill all the mandatory fields.');
                }
            } else {
                $con = array(
                    'returnType' => 'single',
                    'conditions' => array(
                        'id' => $this->session->userdata('userId')
                    )
                );
                $data['user_details'] = $this->Admin_model->getRows($con);
            }
            $this->load->view('admin/settings/profile', $data);
        } else {
            redirect('admin');
        }
    }

    public function change_profile_password()
    {
        $data = array();
        $isLoggedIn = $this->session->userdata('isUserLoggedIn');
        if (isset($isLoggedIn) && $isLoggedIn == TRUE) {
            if ($this->input->post()) {
                $this->form_validation->set_rules('password', 'password', 'required');
                $this->form_validation->set_rules('confirm_password', 'confirm_password', 'required');
                if ($this->form_validation->run() == true) {
                    $details = array('password' => md5(trim($this->input->post('password'))));
                    $where = array('id' => $this->input->post('user_id'));
                    if ($this->Admin_model->update_details($details, $where)) {
                        $this->session->set_flashdata('success', 'Password updated successfully.');
                        redirect('admin/settings');
                    } else {
                        $this->session->set_flashdata('error', 'Something went wrong, please try again.');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Please fill all the mandatory fields.');
                }
            }
        } else {
            redirect('admin');
        }
    }
}

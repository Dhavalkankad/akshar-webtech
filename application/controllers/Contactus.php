<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contactus extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Contactus_model');
		$this->load->library('email');
	}

	public function index()
	{
		$this->load->view('frontend/contactus');
	}

	public function submit_contact()
	{
		$data = array();
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('number', 'number', 'required');
		$this->form_validation->set_rules('subject', 'subject', 'required');
		$this->form_validation->set_rules('message', 'message', 'required');
		if ($this->form_validation->run() == TRUE) {
			$details = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'subject' => $this->input->post('subject'),
				'phone_no' => $this->input->post('number'),
				'message' => $this->input->post('message'),
				'created_at' => date('Y-m-d H:i')
			);
			if ($this->Contactus_model->insert($details)) {
				$email_data = array();
				$name = $this->input->post('name');
				$email = trim($this->input->post('email'));
				$subject = $this->input->post('subject');
				$phone_no = $this->input->post('number');
				$message = $this->input->post('message');
				$email_data['name'] = $name;
				$email_data['email'] = $email;
				$email_data['subject'] = $subject;
				$email_data['phone_no'] = $phone_no;
				$email_data['message'] = $message;
				$to = "kankaddhaval666@gmail.com";
				$this->load->library('email');
				$config = array(
					'protocol' => 'mail',
					'mailtype' => 'html',
					'charset' => 'utf-8',
					'newline' => "\r\n"
				);
				$this->email->initialize($config);
				$this->email->from($email, $name);
				$this->email->to($to);
				$this->email->subject('New Contact Request Received');
				$this->email->message($this->load->view('frontend/layout/contact_email', $email_data, TRUE));
				$sendStatus = $this->email->send();
				if ($sendStatus) {
					$data['type'] = true;
					$data['message'] = '<div class="alert alert-success">Your message was sent successfully.</div>';
				} else {
					$data['type'] = false;
					$data['message'] = '<div class="alert alert-danger">Something went wrong!. Please try again.</div>';
				}
			} else {
				$data['type'] = false;
				$data['message'] = '<div class="alert alert-danger">Something went wrong!. Please try again.</div>';
			}
		} else {
			$data['type'] = false;
			$data['message'] = '<div class="alert alert-danger">Please fill in all mandatory fields correctly.</div>';
		}
		echo json_encode($data);
	}
}

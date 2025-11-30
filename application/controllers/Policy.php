<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Policy extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function privacy_policy()
	{
		$data = array();
		$this->load->view('frontend/policy/privacy_policy', $data);
	}

	public function terms_conditions()
	{
		$data = array();
		$this->load->view('frontend/policy/terms_conditions', $data);
	}

	public function cancel_policy()
	{
		$data = array();
		$this->load->view('frontend/policy/cancel_policy', $data);
	}

	public function refund_policy()
	{
		$data = array();
		$this->load->view('frontend/policy/refund_policy', $data);
	}

	public function shipping_policy()
	{
		$data = array();
		$this->load->view('frontend/policy/shipping_policy', $data);
	}
}

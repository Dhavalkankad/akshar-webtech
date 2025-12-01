<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mypages_model');
	}

	public function index()
	{
		$data = [];
		$this->load->view('frontend/services', $data);
	}

}

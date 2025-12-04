<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Slider_model');
		$this->load->model('Mypages_model');
		$this->load->model('Contactus_model');
		$this->load->model('Category_model');
		$this->load->model('Testimonials_model');
	}

	public function index()
	{
		$data = array();
		$slider_con = array(
			'returnType' => '',
			'order_by' => array('ordering' => 'asc'),
			'conditions' => array('status' => '1')
		);
		$data['slider_details'] = $this->Slider_model->get_all_slider($slider_con);
		$con2 = array(
			'returnType' => '',
			'order_by' => array('created_at' => 'desc'),
			'conditions' => array('status' => '1')
		);
		$data['testimonials_details'] = $this->Testimonials_model->get_all_testimonials($con2);
		$this->load->view('frontend/home', $data);
	}

	public function about_us()
	{
		$data = array();
		$acon = array(
			'returnType' => '',
		);
		$aboutuspage = $this->Mypages_model->get_about_rows($acon);
		if (!empty($aboutuspage)) {
			foreach ($aboutuspage as $row) {
				if (isset($row['type'])) {
					$aboutuspage_details[$row['type']] = $row;
				}
			}
		}
		$data['aboutus_details'] = $aboutuspage_details;
		$this->load->view('frontend/about_us', $data);
	}

}

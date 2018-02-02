<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class About extends Front_Controller
{

	function __construct() {
	parent::__construct();

	}

	function index() {
		$this->load->model('Mdl_Services');
		$this->load->model('Mdl_site_info');

		$query = $this->Mdl_site_info->get('id');
		foreach ($query->result() as $row) {
			$data['site_description_ar'] = $row->site_description_ar;
		}

		$data['query_services'] = $this->Mdl_Services->get('id');
		$data['title'] = 'About';
		$data['flash'] = $this->session->flashdata('item');
		$this->load->library('template');
		$this->template->load('blog', 'about/index', $data);
	}

}
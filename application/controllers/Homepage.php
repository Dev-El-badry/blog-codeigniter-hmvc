<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Homepage extends Front_Controller
{

	function __construct() {
	parent::__construct();
	}

	function index() {
		$this->load->model('Mdl_slides');
		$this->load->model('Mdl_Services');
		$this->load->model('Mdl_articles');
		$this->load->model('Mdl_categories');
		$this->load->model('Mdl_comments');

		$data['query_slides'] = $this->Mdl_slides->get('id');
		$data['query_services'] = $this->Mdl_Services->get('id');
		$sql_query = "SELECT * FROM articles LIMIT 4";
		$data['query_articles'] = $this->Mdl_articles->_custom_query($sql_query);

		$data['title'] = 'Blog';
		$this->load->library('template');
		$this->template->load('blog', 'homepage/index', $data);
	}

	
}
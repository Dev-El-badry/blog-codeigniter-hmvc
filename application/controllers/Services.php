<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Services extends Base_Controller
{

	function __construct() {
	parent::__construct();
	}

	function del() {
		$this->_make_sure_is_admin();
		$update_id = $this->uri->segment(3);
		$this->_delete($update_id);
		$value = '<div class="alert alert-danger">
                                 Successfully Deleted Service.
                            </div>';
        $data['flash'] = $this->session->set_flashdata('item', $value);
		redirect(base_url().'services/manage');
	}

	function view() {
		$this->_make_sure_is_admin();
		$update_id = $this->uri->segment(3);

		if(is_numeric($update_id)) {
			
			$query = $this->get_where($update_id);
			foreach ($query->result() as $row) {
				$data['services_title'] = $row->services_title;
				$data['services_description'] = $row->services_description;
				
				$data['icon'] = $row->icon;
				$data['services_title_ar'] = $row->services_title_ar;
				$data['services_description_ar'] = $row->services_description_ar;
			}
		}

		$data['head_line'] = 'Service ID - ' . $update_id;
		$data['title'] = 'Services';
		$this->load->library('template');
		$this->template->load('admin','services/view', $data);
	}


	function get_post_data() {
		$data['services_title'] = $this->input->post('services_title', TRUE);
		$data['services_description'] = $this->input->post('services_description', TRUE);
		$data['services_title_ar'] = $this->input->post('services_title_ar', TRUE);
		$data['services_description_ar'] = $this->input->post('services_description_ar', TRUE);
		$data['icon'] = $this->input->post('icon', TRUE);

		return $data;
	}

	function get_data_form_db($update_id) {
		$query = $this->get_where($update_id);
		foreach ($query->result() as $row) {
			$data['services_title'] = $row->services_title;
			$data['services_description'] = $row->services_description;
			$data['services_title_ar'] = $row->services_title_ar;
			$data['services_description_ar'] = $row->services_description_ar;
			$data['icon'] = $row->icon;
		}

		return $data;
	}

	function create() {
		$this->_make_sure_is_admin();
		$submit = $this->input->post('submit', TRUE);
		$update_id = $this->uri->segment(3);

		if($submit == 'Submit') {
			//echo $this->input->post('icon');die;
			$this->load->library('form_validation');
			$this->form_validation->set_rules('icon', 'Icon', 'required|trim');
			$this->form_validation->set_rules('services_title', 'Services title', 'required|trim');
			$this->form_validation->set_rules('services_description', 'Services description', 'required|trim');
			$this->form_validation->set_rules('services_title_ar', 'Services title arabic', 'required|trim');
			$this->form_validation->set_rules('services_description_ar', 'Services description arabic', 'required|trim');
			if($this->form_validation->run() == TRUE) {
				$update_id = $this->input->post('update_id', TRUE);
				$data = $this->get_post_data();
				if(is_numeric($update_id)) {
					$this->_update($update_id, $data);
					$value = '<div class="alert alert-success">
                                 Successfully Update Service.
                            </div>';
				} else {
					
					$this->_insert($data);
					$update_id = $this->get_max();
					$value = '<div class="alert alert-success">
                                 Successfully Adde Service.
                            </div>';
				}
				$data['flash'] = $this->session->set_flashdata('item', $value);
				redirect(base_url().'services/create/'.$update_id);
			}
		} elseif($submit == "Cancel") {
			redirect(base_url().'services/manage');
		}

		if(is_numeric($update_id)) {
			$data = $this->get_data_form_db($update_id);
			
			$data['head_line'] = 'Edit Service';
			$data['icon'] = 'pencil';
		} else {
			$data = $this->get_post_data();
			$data['head_line'] = 'Create New Service';
			$data['icon'] = 'plus';
		}
		$data['update_id'] = $update_id;
		$data['title'] = 'Services';
		$data['flash'] = $this->session->flashdata('item');
		$this->load->library('template');
		$this->template->load('admin','services/create', $data);
	}

	function manage() {
		$this->_make_sure_is_admin();
		$data['query'] = $this->get('id');
		
		$data['title'] = 'Services';
		$data['flash'] = $this->session->flashdata('item');
		$this->load->library('template');
		$this->template->load('admin','services/manage', $data);
	}

	function get($order_by) {
	$this->load->model('Mdl_services');
	$query = $this->Mdl_services->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('Mdl_services');
	$query = $this->Mdl_services->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('Mdl_services');
	$query = $this->Mdl_services->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('Mdl_services');
	$query = $this->Mdl_services->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('Mdl_services');
	$this->Mdl_services->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('Mdl_services');
	$this->Mdl_services->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('Mdl_services');
	$this->Mdl_services->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('Mdl_services');
	$count = $this->Mdl_services->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('Mdl_services');
	$max_id = $this->Mdl_services->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('Mdl_services');
	$query = $this->Mdl_services->_custom_query($mysql_query);
	return $query;
	}

}
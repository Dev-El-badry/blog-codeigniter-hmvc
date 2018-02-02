<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Tags extends Base_Controller
{

	function __construct() {
	parent::__construct();
	$this->lang->load('admin/tags');
	}

	function get_post_data() {
		$data['tag_title'] = $this->input->post('tag_title', TRUE);
		$data['tag_title_ar'] = $this->input->post('tag_title_ar', TRUE);

		return $data;
	}

	function get_data_from_db($update_id) {
		$query = $this->get_where($update_id);
		foreach ($query->result() as $row) {
			$data['tag_title'] = $row->tag_title;
			$data['tag_title_ar'] = $row->tag_title_ar;
			
		}

		return $data;
	}

	function del() {
		$update_id = $this->uri->segment(3);
		$this->_delete($update_id);
		redirect(base_url().'tags/create');
	}

	function create() {
		$this->_make_sure_is_admin();
		$update_id = $this->uri->segment(3);
		$submit = $this->input->post('submit', TRUE);

		if($submit == "Submit") {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('tag_title', $this->lang->line('tag_title'), 'required');
			$this->form_validation->set_rules('tag_title_ar', $this->lang->line('tag_title_ar'), 'required');
			
			if($this->form_validation->run() == TRUE) {
				$data = $this->get_post_data();
				$update_id = $this->input->post('update_id', TRUE);

			
					$this->_insert($data);
					
				
				redirect(base_url().'tags/create/');
			} 
				
			
		}

		if(is_numeric($update_id)) {
			$data = $this->get_data_from_db($update_id);
			$data['update_id'] = $update_id;
		} else {
			$data = $this->get_post_data();
		}

		$data['query'] = $this->get('id');
		$data['num_rows'] = $data['query']->num_rows();
		$data['flash'] = $this->session->flashdata('item');
		$data['title'] = 'Tags';
		$this->load->library('template');
		$this->template->load('admin','tags/create', $data);
	}

	function get($order_by) {
	$this->load->model('Mdl_tags');
	$query = $this->Mdl_tags->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('Mdl_tags');
	$query = $this->Mdl_tags->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('Mdl_tags');
	$query = $this->Mdl_tags->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('Mdl_tags');
	$query = $this->Mdl_tags->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('Mdl_tags');
	$this->Mdl_tags->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('Mdl_tags');
	$this->Mdl_tags->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('Mdl_tags');
	$this->Mdl_tags->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('Mdl_tags');
	$count = $this->Mdl_tags->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('Mdl_tags');
	$max_id = $this->Mdl_tags->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('Mdl_tags');
	$query = $this->Mdl_tags->_custom_query($mysql_query);
	return $query;
	}

}
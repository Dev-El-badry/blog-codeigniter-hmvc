<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Categories extends Base_Controller
{

	function __construct() {
	parent::__construct();

		$this->lang->load('admin/categories');
	}

	function del() {
		$update_id = $this->uri->segment(3);

		$this->_delete($update_id);
		redirect(base_url().'categories/manage');
	}

	function get_post_data() {
		$data['category_title'] = $this->input->post('category_title', TRUE);
		$data['category_title_ar'] = $this->input->post('category_title_ar', TRUE);
		$data['arrange'] = $this->input->post('arrange', TRUE);

		return $data;
	}

	function get_data_from_db($update_id) {
		$query = $this->get_where($update_id);
		foreach ($query->result() as $row) {
			$data['category_title'] = $row->category_title;
			$data['category_title_ar'] = $row->category_title_ar;
			$data['arrange'] = $row->arrange;
		}

		return $data;
	}

	function manage() {
		$this->_make_sure_is_admin();

		$data['query'] = $this->get('arrange');
		$data['title'] = 'Categories';
		$this->load->library('template');
		$this->template->load('admin','categories/manage', $data);
	}

	function create() {
		$this->_make_sure_is_admin();
		$update_id = $this->uri->segment(3);
		$submit = $this->input->post('submit', TRUE);

		if($submit == "Submit") {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('category_title', $this->lang->line("category_title"), 'required');
			$this->form_validation->set_rules('category_title_ar', $this->lang->line("category_title_ar"), 'required');
			$this->form_validation->set_rules('arrange', $this->lang->line("arrange"), 'required|numeric');

			if($this->form_validation->run() == TRUE) {
				$data = $this->get_post_data();
				$update_id = $this->input->post('update_id', TRUE);

				if(is_numeric($update_id)) {
					$this->_update($update_id, $data);
					$value = '<div class="alert alert-success">
                                '. $this->lang->line('alert_success').'
                            </div>';
				} else {
					$this->_insert($data);
					$update_id = $this->get_max();
					$value = '<div class="alert alert-success">
                                '. $this->lang->line('alert_success_add').'
                            </div>';
				}
				$this->session->set_flashdata('item', $value);
				redirect(base_url().'categories/create/'.$update_id);
			} else {
				echo validation_errors();
			}
		} elseif ($submit == "Cancel") {
			redirect(base_url().'categories/manage');
		}

		if(is_numeric($update_id)) {
			$data = $this->get_data_from_db($update_id);
			$data['update_id'] = $update_id;
			$data['head_line'] = $this->lang->line('edit_category');
			$data['icon'] = 'pencil';
		} else {
			$data = $this->get_post_data();
			$data['head_line'] = $this->lang->line('create_category');
			$data['icon'] = 'plus';
		}

		$data['flash'] = $this->session->flashdata('item');
		$data['title'] = 'Categories';
		$this->load->library('template');
		$this->template->load('admin','categories/create', $data);
	}

	function get($order_by) {
	$this->load->model('Mdl_categories');
	$query = $this->Mdl_categories->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('Mdl_categories');
	$query = $this->Mdl_categories->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('Mdl_categories');
	$query = $this->Mdl_categories->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('Mdl_categories');
	$query = $this->Mdl_categories->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('Mdl_categories');
	$this->Mdl_categories->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('Mdl_categories');
	$this->Mdl_categories->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('Mdl_categories');
	$this->Mdl_categories->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('Mdl_categories');
	$count = $this->Mdl_categories->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('Mdl_categories');
	$max_id = $this->Mdl_categories->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('Mdl_categories');
	$query = $this->Mdl_categories->_custom_query($mysql_query);
	return $query;
	}

}
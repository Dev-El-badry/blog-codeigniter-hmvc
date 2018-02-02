<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Pages extends Base_Controller
{

	function __construct() {
	parent::__construct();
	$this->lang->load('admin/pages');
	}

	function manage() {
		$this->_make_sure_is_admin();
		$data['query'] = $this->get('arrange');
		$data['title'] = 'Pages';
		$this->load->library('template');
		$this->template->load('admin','pages/manage', $data);
	}

	function get_post_data() {
		$data['page_title'] = $this->input->post('page_title', TRUE);
		$data['page_title_ar'] = $this->input->post('page_title_ar', TRUE);
		$data['arrange'] = $this->input->post('arrange', TRUE);

		return $data;
	}

	function get_data_from_db($update_id) {
		$query = $this->get_where($update_id);
		foreach ($query->result() as $row) {
			$data['page_title'] = $row->page_title;
			$data['page_title_ar'] = $row->page_title_ar;
			$data['arrange'] = $row->arrange;
		}

		return $data;
	}

	function create() {
		$this->_make_sure_is_admin();
		$update_id = $this->uri->segment(3);
		$submit = $this->input->post('submit', TRUE);
		if($submit == "Submit") {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('page_title', $this->lang->line("category_title"), 'required');
			$this->form_validation->set_rules('page_title_ar', $this->lang->line("category_title_ar"), 'required');
			$this->form_validation->set_rules('arrange', $this->lang->line("arrange"), 'required|numeric');
			if($this->form_validation->run() == TRUE) {
				$update_id = $this->input->post('update_id', TRUE);
				$data = $this->get_post_data();

				if(is_numeric($update_id)) {
					
					$this->_update($update_id, $data);
					$value = '<div class="alert alert-danger">
                                 Successfully Updated.
                            </div>';
        
				} else {
					
					$this->_insert($data);
					$update_id = $this->get_max();
					$value = '<div class="alert alert-danger">
                                 Successfully Added.
                            </div>';

				}
				$this->session->set_flashdata('item', $value);
				redirect(base_url().'pages/create/'.$update_id);
			}
		} elseif($submit == "Cancel") {
			redirect(base_url().'pages/manage');
		}

		if(is_numeric($update_id)) {
			$data = $this->get_data_from_db($update_id);
			$data['icon'] = 'pencil';
			$data['head_line'] = 'Edit Page';
		} else {
			$data = $this->get_post_data();
			$data['icon'] = 'plus';
			$data['head_line'] = 'Add New Page';
		}
		$data['update_id'] = $update_id;
		$data['title'] = 'Pages';
		$this->load->library('template');
		$this->template->load('admin','pages/create', $data);
	}

	function get($order_by) {
	$this->load->model('Mdl_pages');
	$query = $this->Mdl_pages->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('Mdl_pages');
	$query = $this->Mdl_pages->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('Mdl_pages');
	$query = $this->Mdl_pages->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('Mdl_pages');
	$query = $this->Mdl_pages->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('Mdl_pages');
	$this->Mdl_pages->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('Mdl_pages');
	$this->Mdl_pages->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('Mdl_pages');
	$this->Mdl_pages->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('Mdl_pages');
	$count = $this->Mdl_pages->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('Mdl_pages');
	$max_id = $this->Mdl_pages->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('Mdl_pages');
	$query = $this->Mdl_pages->_custom_query($mysql_query);
	return $query;
	}

}
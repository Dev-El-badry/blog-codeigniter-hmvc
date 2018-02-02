<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Sliders extends Base_Controller
{

	function __construct() {
	parent::__construct();
	$this->lang->load('admin/sliders');
	}


	function del_slide($id) {
		$update_id = $id;

		if(is_numeric($update_id)) {
			$data = $this->get_data_from_db($update_id);
			$slider_id = $data['slider_id'];

			$this->delete_image($update_id);

			$this->_delete($update_id);

			redirect(base_url().'slides/create/'.$slider_id);
		}
	}

	function get_data_from_db($update_id){
		$query = $this->get_where($update_id);
		foreach ($query->result() as $row) {
			
			$data['slide_image'] = $row->slide_image;
		
		}
		return $data;
	}


	function del() {
		$update_id = $this->uri->segment(3);
		if(is_numeric($update_id)) {
			$this->load->model('Mdl_slides');
			$query = $this->Mdl_slides->get_where_custom('slider_id', $update_id);
			foreach ($query->result() as $row) {
				$this->del_slide($row->id);
			}
		}
	}

	function active() {
		$this->_make_sure_is_admin();
		$update_id = $this->uri->segment(3);
		if(is_numeric($update_id)) {
			$data['view'] = 1;
			$this->_update($update_id, $data);	
		}

		redirect(base_url().'sliders/manage');
	}

	function unactive() {
		$this->_make_sure_is_admin();
		$update_id = $this->uri->segment(3);
		if(is_numeric($update_id)) {
			$data['view'] = 0;
			$this->_update($update_id, $data);	
		}

		redirect(base_url().'sliders/manage');
	}

	function get_post_data_sliders() {
		$data['slider_title'] = $this->input->post('slider_title', TRUE);
		$data['slider_description'] = $this->input->post('slider_description', TRUE);

		return $data;
	}

	function get_data_from_db_sliders($update_id) {
		$query = $this->get_where($update_id);
		foreach ($query->result() as $row) {
			$data['slider_title'] = $row->slider_title;
			$data['slider_description'] = $row->slider_description;
		}

		return $data;
	} 

	function create() {
		$this->_make_sure_is_admin();
		$this->load->model('Mdl_slides');
		$submit = $this->input->post('submit', TRUE);
		$update_id = $this->uri->segment(3);
		if($submit == 'Submit') {
			//echo $this->input->post('icon');die;
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('slider_title', $this->lang->line('slider_title'), 'required|trim');
			$this->form_validation->set_rules('slider_description', $this->lang->line('slider_description'), 'required|trim');

			if($this->form_validation->run() == TRUE) {
				$update_id = $this->input->post('update_id', TRUE);
				$data = $this->get_post_data_sliders();
				if(is_numeric($update_id)) {
					$this->_update($update_id, $data);
					$value = '<div class="alert alert-success">
                                 '.$this->lang->line('success').'
                            </div>';
				} else {
					
					$this->_insert($data);
					$update_id = $this->get_max();
					$value = '<div class="alert alert-success">
                                 '.$this->lang->line('success_add').'
                            </div>';
				}
				$data['flash'] = $this->session->set_flashdata('item', $value);
				redirect(base_url().'sliders/create/'.$update_id);
			}
		} elseif($submit == "Cancel") {
			redirect(base_url().'sliders/manage');
		}

		if(is_numeric($update_id)) {
			$data = $this->get_data_from_db_sliders($update_id);
			$data['head_line'] = $this->lang->line('edit_headline');
			$data['icon'] = 'pencil';
		} else {
			$data = $this->get_post_data_sliders();
			$data['head_line'] = $this->lang->line('add_headline');
			$data['icon'] = 'plus';
		}
		
		$data['update_id'] = $update_id;
		$data['title'] = 'Sliders';
		$data['flash'] = $this->session->flashdata('item');
		$this->load->library('template');
		$this->template->load('admin','sliders/create', $data);

	}

	function manage() {
		$this->_make_sure_is_admin();
		$data['query'] = $this->get('id');
		
		$data['title'] = 'Sliders';
		$data['flash'] = $this->session->flashdata('item');
		$this->load->library('template');
		$this->template->load('admin','sliders/manage', $data);
	}

	function get($order_by) {
	$this->load->model('Mdl_sliders');
	$query = $this->Mdl_sliders->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('Mdl_sliders');
	$query = $this->Mdl_sliders->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('Mdl_sliders');
	$query = $this->Mdl_sliders->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('Mdl_sliders');
	$query = $this->Mdl_sliders->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('Mdl_sliders');
	$this->Mdl_sliders->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('Mdl_sliders');
	$this->Mdl_sliders->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('Mdl_sliders');
	$this->Mdl_sliders->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('Mdl_sliders');
	$count = $this->Mdl_sliders->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('Mdl_sliders');
	$max_id = $this->Mdl_sliders->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('Mdl_sliders');
	$query = $this->Mdl_sliders->_custom_query($mysql_query);
	return $query;
	}

}
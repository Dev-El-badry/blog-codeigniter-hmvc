<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Comments extends Base_Controller
{

	function __construct() {
	parent::__construct();
	}

	function unapprove() {
		$this->_make_sure_is_admin();
		$update_id = $this->uri->segment(3);

		$data['view'] = 0;
		$this->_update($update_id, $data);
		$value = '<div class="alert alert-warning">
                                 Successfully Unapprove Comment.
                            </div>';
        $data['flash'] = $this->session->set_flashdata('item', $value);
		redirect(base_url().'comments/manage');
	}

	function approve() {
		$this->_make_sure_is_admin();
		$update_id = $this->uri->segment(3);

		$data['view'] = 1;
		$this->_update($update_id, $data);
		$value = '<div class="alert alert-success">
                                 Successfully Approve Comment.
                            </div>';
        $data['flash'] = $this->session->set_flashdata('item', $value);
		redirect(base_url().'comments/manage');
	}

	function del() {
		$this->_make_sure_is_admin();
		$update_id = $this->uri->segment(3);
		$this->_delete($update_id);
		$value = '<div class="alert alert-danger">
                                 Successfully Deleted Comment.
                            </div>';
        $data['flash'] = $this->session->set_flashdata('item', $value);
		redirect(base_url().'comments/manage');
	}

	function manage() {
		$this->_make_sure_is_admin();
		$this->load->model('Mdl_articles');
		$data['query'] = $this->get('date_created desc');
		$data['title'] = 'Comments';
		$data['flash'] = $this->session->flashdata('item');
		$this->load->library('template');
		$this->template->load('admin','comments/manage', $data);
	}

	function get($order_by) {
	$this->load->model('Mdl_comments');
	$query = $this->Mdl_comments->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('Mdl_comments');
	$query = $this->Mdl_comments->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('Mdl_comments');
	$query = $this->Mdl_comments->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('Mdl_comments');
	$query = $this->Mdl_comments->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('Mdl_comments');
	$this->Mdl_comments->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('Mdl_comments');
	$this->Mdl_comments->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('Mdl_comments');
	$this->Mdl_comments->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('Mdl_comments');
	$count = $this->Mdl_comments->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('Mdl_comments');
	$max_id = $this->Mdl_comments->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('Mdl_comments');
	$query = $this->Mdl_comments->_custom_query($mysql_query);
	return $query;
	}

}
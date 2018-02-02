<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Enquiries extends Base_Controller
{

	function __construct() {
	parent::__construct();
	}

	function view() {
		$this->_make_sure_is_admin();
		$update_id = $this->uri->segment(3);

		if(is_numeric($update_id)) {
			$this->_open_it($update_id);
			$query = $this->get_where($update_id);
			foreach ($query->result() as $row) {
				$data['sender_name'] = $row->sender_name;
				$data['sender_email'] = $row->sender_email;
				$data['sender_phone'] = $row->sender_phone;
				$data['subject'] = $row->subject;
				$data['content'] = $row->content;
				$data['date_created'] = $row->date_created;
			}
		}

		$data['head_line'] = 'Enquire ID - ' . $update_id;
		$data['title'] = 'Enquiries';
		$this->load->library('template');
		$this->template->load('admin','enquiries/view', $data);
	}

	function _open_it($update_id) {
		$data['opend'] = 1;
		$this->_update($update_id, $data);
	}

	function manage() {
		$data['query'] = $this->get('date_created');
		$data['title'] = 'Enquiries';
		$this->load->library('template');
		$this->template->load('admin','enquiries/manage', $data);
	}

	function get($order_by) {
	$this->load->model('Mdl_enquiries');
	$query = $this->Mdl_enquiries->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('Mdl_enquiries');
	$query = $this->Mdl_enquiries->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('Mdl_enquiries');
	$query = $this->Mdl_enquiries->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('Mdl_enquiries');
	$query = $this->Mdl_enquiries->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('Mdl_enquiries');
	$this->Mdl_enquiries->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('Mdl_enquiries');
	$this->Mdl_enquiries->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('Mdl_enquiries');
	$this->Mdl_enquiries->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('Mdl_enquiries');
	$count = $this->Mdl_enquiries->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('Mdl_enquiries');
	$max_id = $this->Mdl_enquiries->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('Mdl_enquiries');
	$query = $this->Mdl_enquiries->_custom_query($mysql_query);
	return $query;
	}

}
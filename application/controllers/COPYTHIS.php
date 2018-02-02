<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class COPYTHIS extends Base_Controller
{

	function __construct() {
	parent::__construct();
	}

	function get($order_by) {
	$this->load->model('COPYTHIS');
	$query = $this->COPYTHIS->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('COPYTHIS');
	$query = $this->COPYTHIS->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('COPYTHIS');
	$query = $this->COPYTHIS->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('COPYTHIS');
	$query = $this->COPYTHIS->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('COPYTHIS');
	$this->COPYTHIS->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('COPYTHIS');
	$this->COPYTHIS->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('COPYTHIS');
	$this->COPYTHIS->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('COPYTHIS');
	$count = $this->COPYTHIS->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('COPYTHIS');
	$max_id = $this->COPYTHIS->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('COPYTHIS');
	$query = $this->COPYTHIS->_custom_query($mysql_query);
	return $query;
	}

}
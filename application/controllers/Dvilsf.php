<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dvilsf extends Base_Controller {

	function __construct() {
		parent::__construct();
		$this->lang->load('admin/dvilsf');
	}

	function index() {
		$data['title'] = 'Login';
		$this->load->library('template');
		$this->template->load('admin','advilsf/login', $data);
	}

	function submit_login() {
		$submit = $this->input->post('submit', TRUE);

		if ($submit == "Submit") {
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == TRUE) {
				$username = $this->input->post('username', TRUE);
				$password = $this->input->post('password', TRUE);
				if($this->_check_admin_login_admin_details($username, $password) == TRUE) {
					$this->_in_you_go();
				}
			}
		}

	}

	function _in_you_go() {

		$this->session->set_userdata('is_admin', TRUE);

		redirect(base_url().'site');
	}

	function logout() {
		$this->session->unset_userdata('is_admin');

		redirect(base_url().'Dvilsf');
	}
}
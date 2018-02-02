<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Base_Controller {

	
	public function index()
	{
		
		//$this->load->view('welcome_message');
		$data['title'] = 'Website';
		$this->load->library('template');
		$this->template->load('admin','content', $data);
	}


}

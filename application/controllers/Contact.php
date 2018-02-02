<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Contact extends Front_Controller
{

	function __construct() {
		parent::__construct();

	}

	function index() {
		$query = $this->Mdl_site_info->get('id');
		foreach ($query->result() as $row) {
			$data['site_description_ar'] = $row->site_description_ar;
			$data['site_email'] = $row->site_email;
			$data['phone_number'] = $row->phone_number;
		}

		$data['title'] = 'Contact Us';
		$data['flash'] = $this->session->flashdata('item');
		$this->load->library('template');
		$this->template->load('blog', 'contact/index', $data);
	}

	function get_post_data() {
		$data['sender_name'] = $this->input->post('sender_name');
		$data['sender_email'] = $this->input->post('sender_email');
		$data['sender_phone'] = $this->input->post('sender_phone');
		$data['content'] = $this->input->post('content');
		$data['is_there'] = TRUE;
		return $data;
	}

	function submit_action() {
		if($_SERVER['REQUEST_METHOD'] == "POST") {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('sender_name', 'الاسم', 'required|min_length[3]');
			$this->form_validation->set_rules('sender_email', 'البرديد الالكتونى', 'required|valid_email');
			$this->form_validation->set_rules('sender_phone', 'رقم التليفون', 'required|min_length[3]|numeric');
			$this->form_validation->set_rules('content', 'الرسالة', 'required|min_length[10]');
			if($this->form_validation->run() == TRUE) {
				$data = $this->get_post_data();
				$this->load->model('Mdl_enquiries');
				$this->Mdl_enquiries->_insert($data);

				$value = '<div class="alert alert-info">
                                شكرا لتواصلك معنا - تم ارسال الرسالة
                            </div>';
				$this->session->set_flashdata('item', $value);
				redirect(base_url().'contact/index');
			} else {
				$value = validation_errors('<p style="color: red">', '</p>');
				$this->session->set_flashdata('item', $value);
				redirect(base_url().'contact');
			}
		}
	}
}
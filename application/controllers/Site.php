<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends Base_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function delete_icon($update_id)
    {
		
		$this->_make_sure_is_admin();

		if(!isset($update_id)) {
			redirect('site/not_allowed');
		}

		$data = $this->get_data_from_db($update_id);
		$logo = $data['logo'];
		

		$big_path = './images/'.$logo;
		
		
		if (file_exists($big_path)) {
			unlink($big_path);
		}

		$data['logo'] = "";
		
		$this->_update($update_id, $data);
	}

	public function delete_favicon($update_id)
    {
		
		$this->_make_sure_is_admin();

		if(!isset($update_id)) {
			redirect('site/not_allowed');
		}

		$data = $this->get_data_from_db($update_id);
		
		$favicon = $data['favicon'];
		$small_path = './images/'.$favicon;

		if (file_exists($small_path)) {
			unlink($small_path);
		}

		//update Date
		$data['favicon'] = "";		
		$this->_update($update_id, $data);
	}

    public function do_upload_icon($update_id)
    {
        $this->_make_sure_is_admin();

        $submit = $this->input->post('submit');

        if(!isset($update_id)) {
            redirect('site/not_allowed');
        }

        $config['upload_path']          = './images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 200;
        $config['max_height']           = 200;
        $config['file_name'] 			= $this->RandomString(6);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('logo'))
        {
            $data['error'] = array('error' => $this->upload->display_errors('<p style="color: red;">', '</p>'));

            //var_dump($data['error']);die;

           	$value = $data['error']['error'];
           	//echo $value;die;
            $this->session->set_flashdata('item', $value);
			redirect(base_url().'site/site_info/'.$update_id);
        }
        else
        {
        	$data_chk = $this->get_data_from_db($update_id);
        	if(!empty($data_chk['logo'])) {
        		$bic_path = './images/'.$data_chk['logo'];
				
				if(file_exists($bic_path)) {
					unlink($bic_path);
				}
				
        	}
            $data = array('upload_data' => $this->upload->data());
            // make thumbnails when upload was successfully
            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];
            
            $this->delete_icon($update_id);
            //store data in database
            $update_data['logo'] = $file_name;

            $this->_update($update_id, $update_data);
        }
    }

    public function do_upload_favicon($update_id)
    {
        $this->_make_sure_is_admin();

        
        if(!isset($update_id)) {
            redirect('site/not_allowed');
        }
        $config['upload_path']          = './images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 200;
        $config['max_height']           = 200;
 		$config['file_name'] 			= $this->RandomString(6);


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('favicon'))
        {
            $data['error'] = array('error' => $this->upload->display_errors('<p style="color: red;">', '</p>'));
           
         	$value = $data['error']['error'];
            $this->session->set_flashdata('item', $value);
			redirect(base_url().'site/site_info/'.$update_id);
        }
        else
        {
        	$data_chk = $this->get_data_from_db($update_id);
        	if(!empty($data_chk['favicon'])) {
        		$bic_path = './images/'.$data_chk['favicon'];
				
				if(file_exists($bic_path)) {
					unlink($bic_path);
				}
				
        	}
            $data = array('upload_data' => $this->upload->data());
            // make thumbnails when upload was successfully
            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];
            
            //store data in database
            $update_data['favicon'] = $file_name;

            $this->_update($update_id, $update_data);
        }
    }

	function create() {

		$this->_make_sure_is_admin();
		$submit = $this->input->post('Submit', TRUE);

		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->lang->load('admin/sidebar');
            $this->load->library('form_validation');
            
			$this->form_validation->set_rules('site_title', $this->lang->line('site_title'), 'required');
			$this->form_validation->set_rules('site_description', $this->lang->line('site_description'), 'required');
			$this->form_validation->set_rules('site_title_ar', $this->lang->line('site_title_ar'), 'required');
			$this->form_validation->set_rules('site_description_ar', $this->lang->line('site_description_ar'), 'required');
			$this->form_validation->set_rules('site_address', $this->lang->line('site_address'), 'required');
			$this->form_validation->set_rules('site_email', $this->lang->line('site_email'), 'required');
			$this->form_validation->set_rules('phone_number', $this->lang->line('phone_number'), 'required');
			$this->form_validation->set_rules('site_address_ar', $this->lang->line('site_address_ar'), 'required');
			$this->form_validation->set_rules('site_fb', $this->lang->line('site_fb'), 'valid_url');
			$this->form_validation->set_rules('site_twitter', $this->lang->line('site_twitter'), 'valid_url');
			$this->form_validation->set_rules('site_insta', $this->lang->line('site_insta'), 'valid_url');
			$this->form_validation->set_rules('site_google_plus', $this->lang->line('site_google_plus'), 'valid_url');
			$this->form_validation->set_rules('skype', $this->lang->line('skype'), 'valid_url');
			$this->form_validation->set_rules('site_email', $this->lang->line('site_email'), 'valid_email');
			$update_id = $this->input->post('update_id', TRUE);
			if ($this->form_validation->run() == TRUE) {
				
				$data = $this->get_data_post();

				if(is_numeric($update_id)) {
					if($_FILES['logo']['name'] != '') { $this->do_upload_icon($update_id); }
					if($_FILES['favicon']['name'] != '') { $this->do_upload_favicon($update_id); }

					$this->_update($update_id, $data);
					
					$value = '<div class="alert alert-success">
                                Successfully Updated.
                            </div>';
                    $this->session->set_flashdata('item', $value);
					redirect(base_url().'site/site_info/'.$update_id);
				} else {
					
				}

			} else {
				
				$value = validation_errors('<p style="color: red">', '</p>');
                $this->session->set_flashdata('item', $value);
				redirect(base_url().'site/site_info/'.$update_id);
			}
		}
		
	}

	function get_data_post() {
		
		$data['site_title'] = $this->input->post('site_title', TRUE);
		$data['site_title_ar'] = $this->input->post('site_title_ar', TRUE);
		$data['site_description'] = $this->input->post('site_description', TRUE);
		$data['site_description_ar'] = $this->input->post('site_description_ar', TRUE);
		$data['site_address'] = $this->input->post('site_address', TRUE);
		$data['site_address_ar'] = $this->input->post('site_address_ar', TRUE);
		$data['phone_number'] = $this->input->post('phone_number', TRUE);
		$data['skype'] = $this->input->post('skype', TRUE);
		$data['site_fb'] = $this->input->post('site_fb', TRUE);
		$data['site_insta'] = $this->input->post('site_insta', TRUE);
		$data['site_twitter'] = $this->input->post('site_twitter', TRUE);
		$data['site_google_plus'] = $this->input->post('site_google_plus', TRUE);
		$data['site_email'] = $this->input->post('site_email', TRUE);
		

		return $data;
	}

	function get_data_from_db($update_id) {

		$query = $this->get_where($update_id);
		foreach ($query->result() as $row) {
			
			$data['site_title'] = $row->site_title;
			$data['site_title_ar'] = $row->site_title_ar;
			$data['site_description'] = $row->site_description;
			$data['site_description_ar'] = $row->site_description_ar;
			$data['site_address'] = $row->site_address;
			$data['site_address_ar'] = $row->site_address_ar;
			$data['phone_number'] = $row->phone_number;
			$data['skype'] = $row->skype;
			$data['site_fb'] = $row->site_fb;
			$data['site_insta'] = $row->site_insta;
			$data['site_twitter'] = $row->site_twitter;
			$data['site_google_plus'] = $row->site_google_plus;
			$data['site_email'] = $row->site_email;
			$data['favicon'] = $row->favicon;
			$data['logo'] = $row->logo;
		}

		return $data;
	}

	public function not_allowed() {
        echo "Not Allowed To Access This Page";
    }
	
	public function index()
	{
		$this->lang->load('admin/dashboard');
		$this->_make_sure_is_admin();
		$data[''] = '';
		$this->load->library('template');
		$this->template->load('admin','site/dashboard', $data);
	}
	
	function site_info() {
		$this->_make_sure_is_admin();
		$update_id = $this->uri->segment(3);

		if(is_numeric($update_id)) {
			$data = $this->get_data_from_db($update_id);
			$data['update_id'] = $update_id;
		} else {
			$data = $this->get_data_post();
		}
		$data['flash'] = $this->session->flashdata('item');
		$data['title'] = 'site info';
		$this->load->library('template');
		$this->template->load('admin','site/site_info', $data);
	}

	function get($order_by) {
	$this->load->model('Mdl_site_info');
	$query = $this->Mdl_site_info->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('Mdl_site_info');
	$query = $this->Mdl_site_info->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('Mdl_site_info');
	$query = $this->Mdl_site_info->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('Mdl_site_info');
	$query = $this->Mdl_site_info->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('Mdl_site_info');
	$this->Mdl_site_info->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('Mdl_site_info');
	$this->Mdl_site_info->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('Mdl_site_info');
	$this->Mdl_site_info->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('Mdl_site_info');
	$count = $this->Mdl_site_info->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('Mdl_site_info');
	$max_id = $this->Mdl_site_info->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('Mdl_site_info');
	$query = $this->Mdl_site_info->_custom_query($mysql_query);
	return $query;
	}

}

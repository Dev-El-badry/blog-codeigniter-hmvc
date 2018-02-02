<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class slides extends Base_Controller
{

	function __construct() {
	parent::__construct();
	$this->lang->load('admin/slides');
	}

	function edit_slide() {

		$this->_make_sure_is_admin();
		$submit = $this->input->post('submit', TRUE);
		$update_id = $this->uri->segment(3);


			if($submit == 'Submit') {
			//echo $this->input->post('icon');die;
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('slide_title', 'slide title', 'required|trim');
			$this->form_validation->set_rules('slide_description', 'slide description', 'required|trim');
			$this->form_validation->set_rules('alt', 'slide description', 'required|trim');
			$this->form_validation->set_rules('slide_description', 'slide description', 'required|trim');
			$this->form_validation->set_rules('slide_description', 'slide description', 'required|trim');
			$this->form_validation->set_rules('target_url', 'Target URL', 'valid_url');
			$this->form_validation->set_rules('slide_title_ar', 'slide title Arabic', 'required|trim');
			
			if($this->form_validation->run() == TRUE) {
				$update_id = $this->input->post('update_id', TRUE);
				
				$slider_id = $this->input->post('slider_id', TRUE);
				if(is_numeric($update_id)) {
					$data = $this->get_post_data();
					$data['slider_id'] = $slider_id;
					
					$this->_update($update_id, $data);
					if($_FILES['userfile']['name'] != '') {
						$this->do_upload($update_id);
					}
					
					
					$value = '<div class="alert alert-success">Successfully Update Slide.</div>';
					$data['flash'] = $this->session->set_flashdata('item', $value);
					redirect(base_url().'slides/edit_slide/'.$update_id);
				}
			}
		} elseif($submit == "Cancel") {
			
			redirect(base_url().'sliders/create/'.$update_id);
		}
if(is_numeric($update_id)) {
			$data = $this->get_data_from_db($update_id);
			$data['update_id'] = $update_id;
			$data['title'] = 'Slides';
			$data['flash'] = $this->session->flashdata('item');
			$this->load->library('template');
			$this->template->load('admin','slides/edit_slide', $data);

		}
	}

	function delete_image($update_id) {
		$this->_make_sure_is_admin();
		if(is_numeric($update_id)) {

			$data_chk = $this->get_data_from_db($update_id);
        	if(!empty($data_chk['slide_image'])) {
        			
        		$bic_path = './images/slides/'.$data_chk['slide_image'];
				
				if(file_exists($bic_path)) {
					
					unlink($bic_path);
					
				}
				
        	}	
        	
		}
	}

	function del() {
		$update_id = $this->uri->segment(3);

		if(is_numeric($update_id)) {
			$data = $this->get_data_from_db($update_id);
			$slider_id = $data['slider_id'];

			$this->delete_image($update_id);

			$this->_delete($update_id);

			redirect(base_url().'slides/create/'.$slider_id);
		}
	}

	public function do_upload($update_id)
    {

        $this->_make_sure_is_admin();
        
        if(!isset($update_id)) {
            redirect('site/not_allowed');
        }

        $config['upload_path']          = './images/slides/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 500;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;
        $config['file_name'] 			= $this->RandomString(6);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile'))
        {
            $data['error'] = array('error' => $this->upload->display_errors('<p style="color: red;">', '</p>'));

            $value = '<div class="alert alert-danger">'.$data['error']['error'].'</div>';
					$data['flash'] = $this->session->set_flashdata('item', $value);
					redirect(base_url().'slides/create/'.$update_id);
        }
        else
        {
        	// check when update image, so delete the old image from folder
        	$data_chk = $this->get_data_from_db($update_id);
        	if(!empty($data_chk['slide_image'])) {
        		$bic_path = './images/slides/'.$data_chk['slide_image'];
				
				if(file_exists($bic_path)) {
					unlink($bic_path);
				}
				
        	}
        	
            $data = array('upload_data' => $this->upload->data());
            // make thumbnails when upload was successfully
            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];

            //store data in database
            $update_data['slide_image'] = $file_name;

            $this->_update($update_id, $update_data);

        }
        
       
    }

	function get_post_data() {
		$data['slide_title'] = $this->input->post('slide_title', TRUE);
		$data['slide_description'] = $this->input->post('slide_description', TRUE);
		$data['alt'] = $this->input->post('alt', TRUE);
		$data['slide_title_ar'] = $this->input->post('slide_title_ar', TRUE);
		$data['slide_description_ar'] = $this->input->post('slide_description_ar', TRUE);
		$data['alt_ar'] = $this->input->post('alt_ar', TRUE);
		$data['target_url'] = $this->input->post('target_url', TRUE);

		return $data;
	}

	function get_data_from_db($update_id){
		$query = $this->get_where($update_id);
		foreach ($query->result() as $row) {
			
		$data['slide_title'] = $row->slide_title;
		$data['slide_description'] = $row->slide_description;
		$data['alt'] = $row->alt;
		$data['slide_title_ar'] = $row->slide_title_ar;
		$data['slide_description_ar'] = $row->slide_description_ar;
		$data['alt_ar'] = $row->alt_ar;
		$data['target_url'] = $row->target_url;
		$data['slide_image'] = $row->slide_image;
		$data['slider_id'] = $row->slider_id;
		}
		return $data;
	}


	function create() {
		$this->_make_sure_is_admin();
		
		$submit = $this->input->post('submit', TRUE);
		$update_id = $this->uri->segment(3);
		if($submit == 'Submit') {
			//echo $this->input->post('icon');die;
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('slide_title', $this->lang->line('slide_title'), 'required|trim');
			$this->form_validation->set_rules('slide_description', $this->lang->line('slide_description'), 'required|trim');
			$this->form_validation->set_rules('alt', $this->lang->line('alt'), 'required|trim');
			$this->form_validation->set_rules('slide_title_ar', $this->lang->line('slide_title_ar'), 'required|trim');
			$this->form_validation->set_rules('slide_description_ar', $this->lang->line('slide_description_ar'), 'required|trim');
			$this->form_validation->set_rules('target_url', $this->lang->line('target_url'), 'valid_url');
			$this->form_validation->set_rules('alt_ar', $this->lang->line('alt_ar'), 'required|trim');
			$update_id = $this->input->post('update_id', TRUE);
			if($this->form_validation->run() == TRUE) {
				
				if(is_numeric($update_id)) {
					$data = $this->get_post_data();
					$data['slider_id'] = $update_id;
					
					$this->_insert($data);
					$id = $this->get_max();

					$this->do_upload($id);
					$value = '<div class="alert alert-success">'.$this->lang->line('alert_success').'</div>';
					$data['flash'] = $this->session->set_flashdata('item', $value);
					redirect(base_url().'slides/create/'.$update_id);
				}
			} 
		} elseif($submit == "Cancel") {
			redirect(base_url().'sliders/create');
		}

		if(is_numeric($update_id)) {
			$data = $this->get_post_data();
			$data['query'] = $this->get_where_custom('slider_id', $update_id);
			$data['num_rows'] = $data['query']->num_rows();
			$data['update_id'] = $update_id;

		}
		
		
		$data['title'] = 'Slides';
		$data['flash'] = $this->session->flashdata('item');
		$this->load->library('template');
		$this->template->load('admin','slides/create', $data);

	}

	function get($order_by) {
	$this->load->model('Mdl_slides');
	$query = $this->Mdl_slides->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('Mdl_slides');
	$query = $this->Mdl_slides->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('Mdl_slides');
	$query = $this->Mdl_slides->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('Mdl_slides');
	$query = $this->Mdl_slides->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('Mdl_slides');
	$this->Mdl_slides->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('Mdl_slides');
	$this->Mdl_slides->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('Mdl_slides');
	$this->Mdl_slides->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('Mdl_slides');
	$count = $this->Mdl_slides->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('Mdl_slides');
	$max_id = $this->Mdl_slides->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('Mdl_slides');
	$query = $this->Mdl_slides->_custom_query($mysql_query);
	return $query;
	}

}
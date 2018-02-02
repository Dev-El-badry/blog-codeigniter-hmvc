<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Articles extends Base_Controller
{

	function __construct() {
	parent::__construct();
	$this->lang->load('admin/articles');
	$this->load->library('ckeditor');
	$this->load->library('ckfinder');

	$this->ckeditor->basePath = base_url().'asset/ckeditor/';
	$this->ckeditor->config['toolbar'] = array(
	                array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' )
	                                                    );
	$this->ckeditor->config['language'] = 'it';
	$this->ckeditor->config['width'] = '730px';
	$this->ckeditor->config['height'] = '300px';            

	//Add Ckfinder to Ckeditor
	$this->ckfinder->SetupCKEditor($this->ckeditor,'../../asset/ckfinder/'); 
	}

	function del_video() {
		$this->_make_sure_is_admin();

		$update_id = $this->uri->segment(3);
		$data['video_link'] = '';
		$this->_update($update_id, $data);

		$value = '<div class="alert alert-danger">
                                 '.$this->lang->line('del_video').'
                            </div>';
        $data['flash'] = $this->session->set_flashdata('item', $value);
		redirect(base_url().'articles/create/'.$update_id);
	}

	function add_video($update_id) {
		$this->_make_sure_is_admin();
		$submit = $this->input->post('submit', TRUE);

		if($submit == "Submit") {
			$update_id = $this->input->post('update_id', TRUE);
			$this->load->library('form_validation');
			$this->form_validation->set_rules('video_link1', $this->lang->line('video_link'), 'required');
			if ($this->form_validation->run() == TRUE) {
				
				$data['video_link'] = $this->input->post('video_link', TRUE);
				$this->_update($update_id, $data);
				$value = '<div class="alert alert-info">
                                '.$this->lang->line('del_video').' 
                            </div>';
            	$data['flash'] = $this->session->set_flashdata('item', $value);
				redirect(base_url().'articles/create/'.$update_id);
			}
		} elseif($submit == "Cancel") {
			$update_id = $this->input->post('update_id', TRUE);
			redirect(base_url().'articles/create/'.$update_id);
		}
		$data = $this->get_data_from_db($update_id);
		$data['update_id'] = $update_id;
		$data['title'] = 'Add Video Link';
		$this->load->library('template');
		$this->template->load('admin','articles/add_link_video', $data);		
	}

	function del_img($update_id) {
		$this->_make_sure_is_admin();

		$data = $this->get_data_from_db($update_id);

		$bic_path = './images/articles/'.$data['big_pic'];
		$small_path = './images/articles/'.$data['sml_pic'];
		
		if(file_exists($bic_path)) {
			unlink($bic_path);
		}
		
		if(file_exists($small_path)) {
			unlink($small_path);
		}
		
		$update_data['big_pic'] = '';
		$update_data['sml_pic'] = '';
		$this->_update($update_id, $update_data);
		$value = '<div class="alert alert-danger">
                              '.$this->lang->line('del_img').'    
                            </div>';
        $data['flash'] = $this->session->set_flashdata('item', $value);
		redirect(base_url().'articles/create/'.$update_id);
		redirect(base_url().'articles/create/'.$update_id);
	}

	function manage() {
		$data['query'] = $this->get('id');
		$data['flash'] = $this->session->flashdata('item');
		$data['title'] = 'Articles';

		$this->load->library('template');
		$this->template->load('admin','articles/manage', $data);
	}

	public function _generate_thumbnail($file_name, $thumb_name) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './images/articles/'.$file_name;
        $config['new_image'] = './images/articles/'.$thumb_name;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 240;
        $config['height'] = 195;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
    }

    public function do_upload($update_id)
    {
        $this->_make_sure_is_admin();
        $submit = $this->input->post('submit', TRUE);
        if(!isset($update_id)) {
            redirect('site/not_allowed');
        }

        if($submit == "Cancel") {
        	redirect(base_url().'articles/create/'.$update_id);
        } elseif($submit == "Upload") {

        $config['upload_path']          = './images/articles/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 400;
        $config['max_width']            = 1900;
        $config['max_height']           = 1000;


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile'))
        {
            $data['error'] = array('error' => $this->upload->display_errors('<p style="color: red;">', '</p>'));

            $value = $data['error']['error'];
            $this->session->set_flashdata('item', $value);
            redirect(base_url().'articles/create/'.$update_id);
        }
        else
        {
        	// check when update image, so delete the old image from folder
        	$data_chk = $this->get_data_from_db($update_id);
        	if(!empty($data_chk['big_pic'])) {
        		$bic_path = './images/articles/'.$data_chk['big_pic'];
				$small_path = './images/articles/'.$data_chk['sml_pic'];
				
				if(file_exists($bic_path)) {
					unlink($bic_path);
				}
				
				if(file_exists($small_path)) {
					unlink($small_path);
				}
        	}

            $data = array('upload_data' => $this->upload->data());
            // make thumbnails when upload was successfully
            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];
            $thumb_name = $upload_data['raw_name'] . '_thumb'.$upload_data['file_ext'];


            $this->_generate_thumbnail($file_name, $thumb_name);

            //store data in database
            $update_data['big_pic'] = $file_name;
            $update_data['sml_pic'] = $thumb_name;

            $this->_update($update_id, $update_data);
            $value = '<div class="alert alert-info">
                                '.$this->lang->line('add_img').'    
                            </div>';
            $data['flash'] = $this->session->set_flashdata('item', $value);
			
			//var_dump($data);die;
			redirect(base_url().'articles/create/'.$update_id);

        }
        }
        $data['title'] = 'Articles';
		//var_dump($data);die;
		$this->load->library('template');
		$this->template->load('admin','articles/upload_image', $data);
    }

	function get_all_tags_en() {
		$this->load->model('Mdl_tags');
		$query = $this->Mdl_tags->get('id');
		
		foreach ($query->result() as $row) {
			$option[$row->id] = $row->tag_title;
		}

		return $option;
	}

	function get_all_tags_ar() {
		$this->load->model('Mdl_tags');
		$query = $this->Mdl_tags->get('id');
		
		foreach ($query->result() as $row) {
			$option[$row->id] = $row->tag_title_ar;
		}

		return $option;
	}

	function get_all_categories_en() {
		$this->load->model('Mdl_categories');
		$query = $this->Mdl_categories->get('id');
		$option[''] = 'Select Category ...';
		foreach ($query->result() as $row) {
			$option[$row->id] = $row->category_title;
		}

		return $option;
	}

	function get_all_categories_ar() {
		$this->load->model('Mdl_categories');
		$query = $this->Mdl_categories->get('id');
		$option[''] = 'اختر قسم ...';
		foreach ($query->result() as $row) {
			$option[$row->id] = $row->category_title_ar;
		}

		return $option;
	}

	function get_post_data() {
		$data['article_title'] = $this->input->post('article_title', TRUE);
		$data['article_title_ar'] = $this->input->post('article_title_ar', TRUE);
		$data['article_description'] = $this->input->post('article_description', TRUE);
		$data['article_descripition_ar'] = $this->input->post('article_descripition_ar', TRUE);
		$data['category_id'] = $this->input->post('category_id', TRUE);
		//$data['big_pic'] = $this->input->post('big_pic', TRUE);
		//$data['tag_id'] = $this->input->post('tag_id', TRUE);

		return $data;
	}

	function get_data_from_db($update_id) {
		$query = $this->get_where($update_id);
		foreach ($query->result() as $row) {
			$data['article_title'] = $row->article_title;
			$data['article_title_ar'] = $row->article_title_ar;
			$data['article_description'] = $row->article_description;
			$data['article_descripition_ar'] = $row->article_descripition_ar;
			$data['category_id'] = $row->category_id;
			$data['big_pic'] = $row->big_pic;
			$data['sml_pic'] = $row->sml_pic;
			$data['video_link'] = $row->video_link;

		}

		return $data;
	}


	function create() {
		$this->_make_sure_is_admin();
		
		$update_id = $this->uri->segment(3);
		

		if($_SERVER['REQUEST_METHOD'] == "POST") {

			$this->load->model('Mdl_articles_tags');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('article_title', $this->lang->line('article_title'), 'required');
			$this->form_validation->set_rules('article_title_ar',  $this->lang->line('article_title_ar'), 'required');
			$this->form_validation->set_rules('article_description',  $this->lang->line('article_description'), 'required');
			$this->form_validation->set_rules('article_descripition_ar', $this->lang->line('article_description_ar'), 'required');
			$this->form_validation->set_rules('category_id', $this->lang->line('category_id'), 'required');

			if($this->form_validation->run() == TRUE) {

				$data = $this->get_post_data();
				$data['article_slug'] = url_title($data['article_title']);
				$data['article_slug_ar'] = url_title($data['article_title_ar']);
				$data['date_created'] = time();
				$tag_id = $this->input->post('tag_id', TRUE);
				//var_dump($tag_id);die;

				$comma_separated = implode(",", $tag_id);
				$update_id = $this->input->post('update_id', TRUE);

				if(is_numeric($update_id)) {

					$this->_update($update_id, $data);
					$data_s['tag_id'] = $comma_separated;

					$query = $this->Mdl_articles_tags->get_where_custom('article_id', $update_id);
					foreach ($query->result() as $row) {
						$id = $row->id;
					}
					$query = $this->Mdl_articles_tags->_update($id, $data_s);

				} else {
					$this->_insert($data);
					$update_id = $this->get_max();
					
					$data_s['tag_id'] = $comma_separated;
					$data_s['article_id'] = $update_id;
					$this->Mdl_articles_tags->_insert($data_s);
				}
				
				$this->do_upload($update_id);
				
				redirect(base_url().'articles/create/'.$update_id);
			}
		} 

		if(is_numeric($update_id)) {
			$data = $this->get_data_from_db($update_id);
			
			$this->load->model('Mdl_articles_tags');
			$query = $this->Mdl_articles_tags->get_where_custom('article_id', $update_id);
			foreach ($query->result() as $row) {
				$ids = $row->tag_id;
			}
			$all_ids = explode(",", $ids);
			$data['all_Ids'] = $all_ids;

			if(!empty($data['big_pic'])) {
				$data['img'] = TRUE;
			} elseif(!empty($data['video_link'])) {
				$data['video_link'] == TRUE;
			} else {
				$data['ss'] = TRUE;
			}
			

		} else {
			$data = $this->get_post_data();
		}


		

		$data['update_id'] = $update_id;
		$data['options'] = $this->get_all_categories_en();
		$data['options_ar'] = $this->get_all_categories_ar();
		$data['options_tag'] = $this->get_all_tags_en();
		$data['options_tag_ar'] = $this->get_all_tags_ar();
		$data['flash'] = $this->session->flashdata('item');
		$data['title'] = 'Articles';
		//var_dump($data);die;
		$this->load->library('template');
		$this->template->load('admin','articles/create', $data);
	}

	function get($order_by) {
	$this->load->model('Mdl_articles');
	$query = $this->Mdl_articles->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('Mdl_articles');
	$query = $this->Mdl_articles->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('Mdl_articles');
	$query = $this->Mdl_articles->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('Mdl_articles');
	$query = $this->Mdl_articles->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('Mdl_articles');
	$this->Mdl_articles->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('Mdl_articles');
	$this->Mdl_articles->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('Mdl_articles');
	$this->Mdl_articles->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('Mdl_articles');
	$count = $this->Mdl_articles->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('Mdl_articles');
	$max_id = $this->Mdl_articles->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('Mdl_articles');
	$query = $this->Mdl_articles->_custom_query($mysql_query);
	return $query;
	}


}
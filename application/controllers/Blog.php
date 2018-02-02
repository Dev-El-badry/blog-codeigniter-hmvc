content<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Blog extends Front_Controller
{

	function __construct() {
	parent::__construct();

	}

	function index() {
		$this->load->model('Mdl_articles');
		$this->load->model('Mdl_categories');
		$this->load->model('Mdl_comments');

		$data['query_articles'] = $this->Mdl_articles->get('id');
		$data['title'] = 'Blog';
		$data['flash'] = $this->session->flashdata('item');
		$this->load->library('template');
		$this->template->load('blog', 'blog/index', $data);
	}

	function single_blog() {
		$this->load->model('Mdl_articles');
		$this->load->model('Mdl_categories');
		$this->load->model('Mdl_comments');
		$update_id = $this->input->get('title', TRUE);
		
		if($update_id != '') {
			$query = $this->Mdl_articles->get_where_custom('article_slug_ar', $update_id);
			$num_rows = $query->num_rows();
			if($num_rows >0) {
				foreach ($query->result() as $row) {
					$data['id'] = $row->id;
					$data['article_title_ar'] = $row->article_title_ar;
					$data['article_descripition_ar'] = $row->article_descripition_ar;
					$data['article_slug_ar'] = $row->article_slug_ar;
					$category_id = $row->category_id;
					$data['date_created'] = $row->date_created;
					$data['big_pic'] = $row->big_pic;
					$data['video_link'] = $row->video_link;
					$data['date_created'] = $row->date_created;
					$data['article_slug_ar'] = $row->article_slug_ar;
				}
				
				$q_sql = $this->Mdl_categories->get_where($category_id);
				foreach ($q_sql->result() as $q) {
					$data['category_title_ar'] = $q->category_title_ar;
				}

				$count_comments = $this->Mdl_comments->count_where('id',$data['id']);
				if($count_comments == 0) {
					$data['count'] = 'لا توجد تعلقاات';
				} else {
					$data['count'] = $count_comments;
				}

			$data['title'] = 'Single Blog';
			$data['flash'] = $this->session->flashdata('item');
			$this->load->library('template');
			$this->template->load('blog', 'blog/single_blog', $data);
			} else {
				$data['not_found'] = "<h2 style='padding: 170px;' class='text-center'> الصفحة غير موجودة </h2>";
				$data['title'] = 'Not Found';
				$this->load->library('template');
				$this->template->load('blog', 'blog/not_found', $data);
			}
		}

	}
}
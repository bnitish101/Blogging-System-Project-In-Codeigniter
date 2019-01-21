<?php
class Admin extends My_Controller {
	public function Dashboard () {
		$this->load->helper('form');/*45*/
		/*if (! $this->session->userdata('user_id'))
			return redirect('login');*/
		
		$this->load->model('articlesmodel', 'articles');
		$articles = $this->articles->articles_list();
		
		$this->load->view('admin/dashboard', ['articles'=>$articles]);
	}
	public function add_article () {
		$this->load->helper('form');
		$this->load->view('admin/add_article');
	}
	public function store_article () {
		//$this->input->post();
		$this->load->library('form_validation');
		if ($this->form_validation->run('add_article_rules')) {
			//echo 'form validation is successful!';
			$post = $this->input->post();
			//print_r ($post); exit;
			unset($post['submit']);
			$this->load->model('articlesmodel', 'article');
			/*$post variable decleared just above, which fetch the values/array from 'add_article.php' form*/
			if ($this->article->add_article($post)) {
				//flash message insert successful.
				//echo 'Insert successful!';
				
				$this->session->set_flashdata('feedback', 'Article Added Successfully.');/*39*/
				$this->session->set_flashdata('feedback_class', 'alert-success');/*39*/
				//return redirect('admin/dashboard');/*45 this line was wrong since long time*/
			} else {
				//insert failed.
				//echo 'Insert failed!';
				$this->session->set_flashdata('feedback', 'Article Failed to Add, Please Try Again.'); /*39*/
				$this->session->set_flashdata('feedback_class', 'alert-danger');/*39*/
				//return redirect('admin/dashboard');/*45 this line was wrong since long time*/
			}
			return redirect('admin/dashboard');
		} else {
			$this->load->view('admin/add_article');
		}
		
	}
	public function edit_article ($article_id) { /*40*/
		$this->load->helper('form');
		//echo $article_id;/*40*/
		$this->load->model('articlesmodel', 'articles');/*41*/
		$article = $this->articles->find_article($article_id);/*41*/
		//echo "<pre>";/*41,42*/
		//print_r ($article);/*41,42*/
		$this->load->view('admin/edit_article', ['article'=>$article]);/*42*/
	}
	public function update_article ($article_id) {/*42,44*/
		//exit($article_id);/*44*/
		$this->load->library ('form_validation');
		if ($this->form_validation->run('add_article_rules')) {
			//print_r($this->input->post());/*42*/
			$post = $this->input->post();/*44*/
			unset ($post['submit']);/*44*/
			$this->load->model ('articlesmodel', 'articles');/*43*/
			//print_r($post); exit;/*44*/
			if ($this->articles->update_article($article_id, $post)) {/*43,44*/
				$this->session->set_flashdata('feedback', 'Article Updated Successfully.');/*44*/
				$this->session->set_flashdata('feedback_class', 'alert-success');/*44*/
				//return redirect('admin/dashboard');/*44*//*45 this line was wrong since long time*/
			} else {/*42,44*/
				$this->session->set_flashdata('feedback', 'Article Failed to Updated, Please Try Again.');/*44*/
				$this->session->set_flashdata('feedback_class','alert-danger');/*44*/
				//return redirect('admin/dashboard');/*44*//*45 this line was wrong since long time*/
			}/*44*/
			return redirect('admin/dashboard');
		} else {
			$this->load->view('admin/edit_article');/*44*/
		}
	}
	public function delete_article () {
		//print_r($this->input->post());/*45*/
		$article_id = $this->input->post('article_id');/*45*/
		$this->load->model('articlesmodel', 'articles');/*45*/
		if ($this->articles->delete_article($article_id)) {/*45*/
			$this->session->set_flashdata('feedback', 'Article Deleted Successfully.');/*44*/
			$this->session->set_flashdata('feedback_class', 'alert-success');/*45*/
		} else {/*45*/
			$this->session->set_flashdata('feedback', 'Article Failed to Delete, Please Try Again.');/*45*/
			$this->session->set_flashdata('feedback_class','alert-danger');/*45*/
		}/*45*/
		return redirect('admin/dashboard');/*45*/
	}
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_id'))/*checkin the session is set or not if not then dashboard.php page won't execute*/
			return redirect('login');
	}
}
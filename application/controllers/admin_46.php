<?php
class Admin extends My_Controller {
	public function Dashboard () {
		$this->load->helper('form');/*45*/
		/*if (! $this->session->userdata('user_id'))
			return redirect('login');*/
		
		//$this->load->model('articlesmodel', 'articles');/*46 this model is loaded via '__construct()' function*/
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
			//$this->load->model('articlesmodel', 'articles');/*46 this model is loaded via '__construct()' function*/
			/*$post variable decleared just above, which fetch the values/array from 'add_article.php' form*/
			$this->_flashAndRedirect(
				$this->articles->add_article($post),
				"Article Added Successfully.",
				"Article Failed to Add, Please Try Again."
			);
			//if ($this->articles->add_article($post)) {/*46*/
				//flash message insert successful.
				//echo 'Insert successful!';
				
				//$this->session->set_flashdata('feedback', 'Article Added Successfully.');/*39,46*/
				//$this->session->set_flashdata('feedback_class', 'alert-success');/*39,46*/
				//return redirect('admin/dashboard');/*45 this line was wrong since long time*/
			//} else {/*46*/
				//insert failed.
				//echo 'Insert failed!';
				//$this->session->set_flashdata('feedback', 'Article Failed to Add, Please Try Again.'); /*39,46*/
				//$this->session->set_flashdata('feedback_class', 'alert-danger');/*39,46*/
				//return redirect('admin/dashboard');/*45 this line was wrong since long time*/
			//}/*46*/
			//return redirect('admin/dashboard');/*46*/
		//} else {/*46*/
			//$this->load->view('admin/add_article');/*46*/
		//}/*46*/
		
	}
	public function edit_article ($article_id) { /*40*/
		$this->load->helper('form');
		//echo $article_id;/*40*/
		//$this->load->model('articlesmodel', 'articles');/*41,46 this model is loaded via '__construct()' function*/
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
			//$this->load->model('articlesmodel', 'articles');/*43,46 this model is loaded via '__construct()' function*/
			//print_r($post); exit;/*44*/
			$this->_flashAndRedirect(
				$this->articles->update_article($article_id, $post),
				"Article Updated Successfully.",
				"Article Failed to Updated, Please Try Again."
			);
			//if ($this->articles->update_article($article_id, $post)) {/*43,44*/
				//$this->session->set_flashdata('feedback', 'Article Updated Successfully.');/*44*/
				//$this->session->set_flashdata('feedback_class', 'alert-success');/*44,46*/
				//return redirect('admin/dashboard');/*44*//*45 this line was wrong since long time*/
			//} else {/*42,44,46*/
				//$this->session->set_flashdata('feedback', 'Article Failed to Updated, Please Try Again.');/*44,46*/
				//$this->session->set_flashdata('feedback_class','alert-danger');/*44,46*/
				//return redirect('admin/dashboard');/*44*//*45 this line was wrong since long time*/
			//}/*44,46*/
			//return redirect('admin/dashboard');/*46*/
		//} else {/*46*/
			//$this->load->view('admin/edit_article');/*44,46*/
		//}/*46*/
	}
	public function delete_article () {
		//print_r($this->input->post());/*45*/
		$article_id = $this->input->post('article_id');/*45*/
		//$this->load->model('articlesmodel', 'articles');/*45,46 this model is loaded via '__construct()' function*/
		$this->_flashAndRedirect (
			$this->articles->delete_article($article_id),
			"Article Deleted Successfully.",
			"Article Failed to Delete, Please Try Again."
		);
		//if ($this->articles->delete_article($article_id)) {/*45,46*/
			//$this->session->set_flashdata('feedback', 'Article Deleted Successfully.');/*45,46*/
			//$this->session->set_flashdata('feedback_class', 'alert-success');/*45,46*/
		//} else {/*45,46*/
			//$this->session->set_flashdata('feedback', 'Article Failed to Delete, Please Try Again.');/*45,46*/
			//$this->session->set_flashdata('feedback_class','alert-danger');/*45,46*/
		//}/*45,46*/
		//return redirect('admin/dashboard');/*45,46*/
	}
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_id'))/*checkin the session is set or not if not then dashboard.php page won't execute*/
			return redirect('login');
			/*46-> DRY = Don't Reapet Yourself*/
			$this->load->model('articlesmodel', 'articles');/*46 this model will be loaded in all public functions*/
			$this->load->helper('form');/*46 this helper will be loaded in all public functions*/
	}
	private function _flashAndRedirect($successful, $successMessage, $failureMessage) {
		if ($successful) {
			$this->session->set_flashdata('feedback', $successMessage);
			$this->session->set_flashdata('feedback_class', 'alert-success');
		} else {
			$this->session->set_flashdata('feedback', $failureMessage);
			$this->session->set_flashdata('feedback_class', 'alert-danger');
		}
		return redirect('dashboard');
	}
}
<?php

class User extends My_Controller {
	
	public function index () {
		$this->load->helper('form');/*50*/
		$this->load->model('articlesmodel', 'articles');/*50*/
		$this->load->library('pagination');/*50*/
		$config = [/*50*/
			'base_url'			=>	base_url('user/index'),/*50*/
			'per_page'			=>	5,/*50*/
			'total_rows'		=>	$this->articles->count_all_articles(),/*50*/
			'full_tag_open'		=>	"<ul class='pagination'>",/*50*/
			'full_tag_close'	=>	"</ul>",/*50*/
			'first_tag_open'	=>	"<li>",/*50*/
			'first_tag_close'	=>	"</li>",/*50*/
			'last_tag_open'		=>	"<li>",/*50*/
			'last_tag_close'	=>	"</li>",/*50*/
			'next_tag_open'		=>	"<li>",/*50*/
			'next_tag_close'	=>	"</li>",/*50*/
			'prev_tag_open'		=>	"<li>",/*50*/
			'prev_tag_close'	=>	"</li>",/*50*/
			'num_tag_open'		=>	"<li>",/*50*/
			'num_tag_close'		=>	"</li>",/*50*/
			'cur_tag_open'		=>	"<li class = 'active'><a>",/*50*/
			'cur_tag_close'	=>	"</a></li>",/*50*/
			
			
		];/*50*/
		$this->pagination->initialize($config);/*50*/
		$articles = $this->articles->all_articles_list($config['per_page'], $this->uri->segment(3));/*50*/
		//$this->load->view('public/articles_list' ['articles'=>$articles]);/*50 samething can be written in another way below*/
		$this->load->view('public/articles_list', compact('articles'));/*50 compact os a core php funntion to define a key of an arrays*/	
	}
	public function search () {/*51*/
		$this->load->library('form_validation');/*51*/
		$this->form_validation->set_rules('query', 'Query', 'required');/*51*/
		if (! $this->form_validation->run()) //{/*51,53*/
			return $this->index();/*51,53 when we write the 'return' and it's onece get completed then stoped here itself*/
		//} else {/*53*/
		$query = $this->input->post('query');/*51*/
		return redirect("user/search_results/$query");/*52*/
		//print_r ($query);/*this array is not executed*//*51*/
		//$this->load->model('articlesmodel', 'articles');/*51,52*/
		//$articles = $this->articles->search($query);/*51,52*/
		//$this->load->view('public/search_results', compact('articles'));/*51,52*/
		//}/*53*/
	}
	public function search_results ($query) {/*52*/
		$this->load->helper('form');/*52*/
		$this->load->model('articlesmodel', 'articles');/*52*/
		$this->load->library('pagination');/*52*/
		$config = [/*52*/
			'base_url'			=>	base_url("user/search_results/$query"),/*52*/
			'uri_segment'		=> 4,/*52 bydefault is '3' */
			'per_page'			=>	5,/*52*/
			'total_rows'		=>	$this->articles->count_search_results($query),/*52*/
			'full_tag_open'		=>	"<ul class='pagination'>",/*52*/
			'full_tag_close'	=>	"</ul>",/*52*/
			'first_tag_open'	=>	"<li>",/*52*/
			'first_tag_close'	=>	"</li>",/*52*/
			'last_tag_open'		=>	"<li>",/*52*/
			'last_tag_close'	=>	"</li>",/*52*/
			'next_tag_open'		=>	"<li>",/*52*/
			'next_tag_close'	=>	"</li>",/*52*/
			'prev_tag_open'		=>	"<li>",/*52*/
			'prev_tag_close'	=>	"</li>",/*52*/
			'num_tag_open'		=>	"<li>",/*52*/
			'num_tag_close'		=>	"</li>",/*52*/
			'cur_tag_open'		=>	"<li class = 'active'><a>",/*52*/
			'cur_tag_close'	=>	"</a></li>",/*52*/
			
			
		];/*52*/
		$this->pagination->initialize($config);/*52*/
		$articles = $this->articles->search($query, $config['per_page'], $this->uri->segment(4, 0));/*52*/
		$this->load->view('public/search_results', compact('articles'));/*52*/
	}/*52*/
	public function article ($id) {/*54*/
		$this->load->helper('form');/*54*/
		$this->load->model('articlesmodel', 'articles');/*54*/
		$article = $this->articles->find($id);/*54*/
		$this->load->view('public/article_detail', compact('article'));/*54*/
	}/*54*/
}
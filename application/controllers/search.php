<?php
class Search extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'recipes_model' );
	}
	public function index() {
	}
	public function view() {
		$search_term = $this->input->post('search');

		$data['searchValues'] = $this->recipes_model->recipe_Search($search_term);
		$data['headerSurprise'] = $this->recipes_model->get_surprise();
		$data ['categories'] = $this->recipes_model->get_all_categories ();

		$this->load->view ( 'templates/header',$data );
		$this->load->view('search/view',$data);
		$this->load->view ( 'templates/footer' );
	}
}

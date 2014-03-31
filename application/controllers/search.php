<?php
class Search extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'recipes_model' );
	}
	public function index() {
	}
	public function invalid($args) {
		$data['headerSurprise'] = $this->recipes_model->get_surprise();
		$data ['categories'] = $this->recipes_model->get_all_categories ();
		$this->load->view ( 'templates/header',$data );
		$this->load->view('search/invalid',$data);
		$this->load->view ( 'templates/footer' );
	}
	public function view($args) {
		$search_term = $this->input->post('search');

		$ingredient_Results= $this->recipes_model->ingredient_Search($search_term);
		$recipe_Results= $this->recipes_model->recipe_Search($search_term);
		$data['headerSurprise'] = $this->recipes_model->get_surprise();
		$data ['categories'] = $this->recipes_model->get_all_categories ();
		
		$this->form_validation->set_rules('submit', 'submit', 'required');
		$this->form_validation->set_message('required', 'Search term is required');
		if(is_array($ingredient_Results) and is_array($recipe_Results)){
			$data['searchValues'] = array_merge($ingredient_Results, $recipe_Results);
		}
		else if (is_array($ingredient_Results)){
			$data['searchValues'] = $ingredient_Results;
		}
		else if (is_array($recipe_Results)){
			$data['searchValues'] = $recipe_Results;
		}
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view ( 'templates/header',$data );
			$this->load->view('search/view',$data);
			$this->load->view ( 'templates/footer' );
		}
		else
		{
			echo form_error('username');
		}	
	}
}
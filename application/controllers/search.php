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
		
		$this->form_validation->set_rules('search', 'search', 'required|min_length[3]|max_length[50]');
	
		if ($this->form_validation->run() == TRUE)
		{
			$search_term = $this->input->post('search');
			$ingredient_Results= $this->recipes_model->ingredient_Search($search_term);






			$recipe_Results= $this->recipes_model->recipe_Search($search_term);
			if(is_array($ingredient_Results) and is_array($recipe_Results)){
				$data['searchValues'] = array_merge($ingredient_Results, $recipe_Results);
			}
			else if (is_array($ingredient_Results)){
				$data['searchValues'] = $ingredient_Results;
			}
			else if (is_array($recipe_Results)){
				$data['searchValues'] = $recipe_Results;
			}
			else{
				$data['searchValues'] = null;
			}
			// $data['searchValues'] = merge_Results($ingredient_Results, $recipe_Results);
			$data['headerSurprise'] = $this->recipes_model->get_surprise();
			$data ['categories'] = $this->recipes_model->get_all_categories ();
			$data ['searchTerm'] = $search_term;

			$this->load->view ( 'templates/header',$data );
			$this->load->view('search/view',$data);
			$this->load->view ( 'templates/footer' );
		}
		else
		{
			$data['headerSurprise'] = $this->recipes_model->get_surprise();
			$data ['categories'] = $this->recipes_model->get_all_categories ();
			$data['searchTerm']  = $search_term = $this->input->post('search');
			$this->load->view ( 'templates/header',$data );
			$this->load->view('search/invalid', $data);
			$this->load->view ( 'templates/footer' );
		}
	}
}
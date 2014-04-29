<?php
/**
 * The Search controller handles search requests. 
 */
class Search extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		// Load model. 
		$this->load->model ( 'recipes_model' );
	}
	public function view($args) {

		$this->form_validation->set_rules ( 'search', 'search', 'required|min_length[3]|max_length[50]' );
		// this form has validation that requires the input to be x where 3<= x <= 50

		if ($this->form_validation->run () == TRUE) {
			// if the search term passes the validation then:
			$search_term = $this->input->post ( 'search' ); // access the search term from the post data
			$ingredient_Results = $this->recipes_model->ingredient_Search ( $search_term ); //find all recipes with this ingredient
			
			$recipe_Results = $this->recipes_model->recipe_Search ( $search_term ); // find all recipes with the search term within the name of the recipe
			if (is_array ( $ingredient_Results ) and is_array ( $recipe_Results )) { // 
				// if there are more than 1 of each then merge the arrays and make the array unique of the recipe name
				$data ['searchValues'] = array_unique(array_merge ( $ingredient_Results, $recipe_Results ));
			} else if (is_array ( $ingredient_Results )) {
				// if just the ingredients list is an array then also make sure that this array is unique
				$data ['searchValues'] = array_unique($ingredient_Results);
			} else if (is_array ( $recipe_Results )) {
				// if just the recipe list is an array then also make sure that this array is unique
				$data ['searchValues'] = array_unique($recipe_Results);
			} else {
				// otherwise no results were found so return null
				$data ['searchValues'] = null;
			}
			//
			$data ['headerSurprise'] = $this->recipes_model->get_surprise (); // link to the next surprise recipe

			$data ['categories'] = $this->recipes_model->get_all_categories (); // populates the category drop down
			$data ['searchTerm'] = $search_term; // allows the search term to be printed
			
			$this->load->view ( 'templates/header', $data );
			$this->load->view ( 'search/view', $data );
			$this->load->view ( 'templates/footer' );
		} else {
			// occurs if the search term fails the form validation validation 
			$data ['searchTerm'] = $search_term = $this->input->post ( 'search' );

			$data ['headerSurprise'] = $this->recipes_model->get_surprise (); // link to the next surprise recipe

			$data ['categories'] = $this->recipes_model->get_all_categories (); // populates the category drop down
			//load the header,invalid view and footer
			$this->load->view ( 'templates/header', $data );
			$this->load->view ( 'search/invalid', $data );
			$this->load->view ( 'templates/footer' );
			
		}
	}
}
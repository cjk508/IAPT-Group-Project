<?php
/**
 * The Recipe controller is responsible for loading the individual
 * recipe pages. 
 */
class Recipe extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		// Load model
		$this->load->model ( 'recipes_model' );
	}
	/**
	 * Get a Recipe_object with an id.
	 *
	 *
	 * @param int/string $id
	 *        	the id of the recipe.
	 */
	public function view($id) {
		$data ['categories'] = $this->recipes_model->get_all_main_categories ();
		// Get recipe.
		$data ['recipe_item'] = $this->recipes_model->get_recipe ( ( int ) $id );
		$data ['headerSurprise'] = $this->recipes_model->get_surprise ();
		$this->load->view ( 'templates/header', $data );
		if (empty ( $data ['recipe_item'] )) {
			echo "<h3>No such recipe.</h3>";
		} else {
			$this->load->view ( 'recipes/view', $data );
		}
		$this->load->view ( 'templates/footer' );
	}
}
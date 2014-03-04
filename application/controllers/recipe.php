<?php
class Recipe extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'recipes_model' );
	}
	/**
	 * The index page of the controller.
	 */
	public function index() {
		$this->load->view ( 'templates/header' );
	}
	/**
	 * Get a Recipe_object with an id.
	 *
	 *
	 * @param int/string $id
	 *        	the id of the recipe.
	 */
	public function view($id) {
		$data ['categories'] = $this->recipes_model->get_all_categories ();
		$data ['recipe_item'] = $this->recipes_model->get_recipe ( ( int ) $id );
		$this->load->view ( 'templates/header', $data );
		if (empty ( $data ['recipe_item'] )) {
			echo "<h2>No such recipe.</h2>";
		} else {
			$this->load->view ( 'recipes/view', $data );
		}
		$this->load->view ( 'templates/footer' );
	}
	public function surprise() {
	}
	public function preview($id) {
	}
}
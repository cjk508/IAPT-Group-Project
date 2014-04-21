<?php
/**
 * The Category controller of the cooking website. 
 * The Category controller is responsible for rendering categories. 
 */
class Category extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		// load the recipes model
		$this->load->model ( 'recipes_model' );
	}
	/**
	 * Default action for the controller.
	 *
	 * @param string $category
	 *        	the target category.
	 */
	function index($category = "Main_Dish") {
		$this->view ( $category );
	}
	/**
	 * View a category.
	 *
	 *
	 * @param string $category
	 *        	the target category
	 */
	function view($category = "Main_Dish") {
		// load a list of all the website categories (for the header)
		$data ['categories'] = $this->recipes_model->get_all_main_categories ();
		$data ['headerSurprise'] = $this->recipes_model->get_surprise ();
		// Load all the recipes for the target category. 		
		$data ['category_items'] = $this->recipes_model->get_category ( $category );
		if (empty ( $data ['category_items'] )) { // If no recipes in category. 
			show_404 ();	
		}
		foreach ( $this->recipes_model->get_all_categories () as $cat ) {
			if ($cat->getCategoryName () === $category) {
				$data ['searchCategory'] = $cat->getCategoryDisplayName ();
			}
		}
		// Load views. 
		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'categories/view', $data );
		$this->load->view ( 'templates/footer' );
	}
}
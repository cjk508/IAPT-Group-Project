<?php
/**
 * The Category controller is responsible for loading categories. 
 * 
 *
 */
class Category extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'recipes_model' );
	}
	function index($category = "Main_Dish") {
		$data ['categories'] = $this->recipes_model->get_all_categories ();
		// will need to change
		$data ['category_items'] = $this->recipes_model->get_category ( $category );
		if (empty ( $data ['category_items'] )) {
			show_404 ();
		}
		$data ['headerCategories'] = $this->recipes_model->get_all_categories ();
		$data ['headerSurprise'] = $this->recipes_model->get_surprise ();
		$data ['searchCategory'] = $category;
		
		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'categories/view', $data );
		$this->load->view ( 'templates/footer' );
	}
	function view($category = "Main_Dish") {
		$data ['categories'] = $this->recipes_model->get_all_categories ();
		if ($category === "Quick_meals") {
			$data ['category_items'] = $this->recipes_model->get_quick_meals ();
		} else {
			$data ['category_items'] = $this->recipes_model->get_category ( $category );
		}
		if (empty ( $data ['category_items'] )) {
			show_404 ();
		}
		$data ['headerCategories'] = $this->recipes_model->get_all_categories ();
		$data ['headerSurprise'] = $this->recipes_model->get_surprise ();
		foreach ( $this->recipes_model->get_all_categories2 () as $cat ) {
			if ($cat->getCategoryName () === $category) {
				$data ['searchCategory'] = $cat->getCategoryDisplayName ();
			}
		}
		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'categories/view', $data );
		$this->load->view ( 'templates/footer' );
	}
}
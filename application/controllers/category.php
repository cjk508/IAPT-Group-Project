<?php
class Category extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'recipes_model' );
	}
	function index($category = "Main Dish") {
		//will need to change
		$data ['category_items'] = $this->recipes_model->get_category ( $category );
		/*if (empty ( $data ['category_item'] )) {
			show_404 ();
		}*/
		$data['headerCategories'] = $this->recipes_model->get_all_categories();
		$data['headerSurprise'] = $this->recipes_model->get_surprise();
		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'categories/view', $data );
		$this->load->view ( 'templates/footer' );
	}
	function view($category = "Main Dish") {
		$data ['category_items'] = $this->recipes_model->get_category ( $category );
		$data['headerCategories'] = $this->recipes_model->get_all_categories();
		$data['headerSurprise'] = $this->recipes_model->get_surprise();
		if (empty ( $data ['category_items'] )) {
			show_404 ();
		}
		
		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'categories/view', $data );
		$this->load->view ( 'templates/footer' );
	}
}
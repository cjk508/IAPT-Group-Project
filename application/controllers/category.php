<?php
class Category extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'recipes_model' );
		$this->load->library('session');
	}
	function index() {
		echo "Category landing page";
	}
	function view($category) {
		$data ['category_recipes'] = $this->recipes_model->get_category ( $category );
		if (empty ( $data ['category_recipes'] )) {
			show_404 ();
		}
		
		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'categories/view', $data );
		$this->load->view ( 'templates/footer' );
	}
}
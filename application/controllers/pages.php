<?php
class Pages extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'recipes_model' );
	}
	public function view($page = 'home') {
		$data ['categories'] = $this->recipes_model->get_all_categories ();
		
		if (! file_exists ( 'application/views/pages/' . $page . '.php' )) {
			// Whoops, we don't have a page for that!
			show_404 ();
		}
		
		$data ['title'] = ucfirst ( $page ); // Capitalize the first letter
		$data['db_works'] = $this->recipes_model->test_db();
		$data ['mostRecents'] = $this->recipes_model->get_latest();
		$data['headerSurprise'] = $this->recipes_model->get_surprise();
		$data['headerCategories'] = $this->recipes_model->get_all_categories();
		$data ['AllItems'] = $this->recipes_model->get_all_recipes_AZ();
		
		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'pages/' . $page, $data );
		$this->load->view ( 'templates/footer', $data );
	}
}
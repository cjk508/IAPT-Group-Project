<?php

class Pages extends CI_Controller {
	
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'recipes_model' );
		$this->load->library('session');
	}
	
	public function view($page = 'home') {
		if (! file_exists ( 'application/views/pages/' . $page . '.php' )) {
			// Whoops, we don't have a page for that!
			show_404 ();
		}
		
		$data ['title'] = ucfirst ( $page ); // Capitalize the first letter
		$data['db_works'] = $this->recipes_model->test_db();
		

		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'pages/' . $page, $data );
		$this->load->view ( 'templates/footer', $data );
	}
}
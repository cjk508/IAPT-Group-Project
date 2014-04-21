<?php
/**
 * The Page controller is responsible for handling main page 
 * requests, including the home page. 
 */
class Pages extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		// Load model. 
		$this->load->model ( 'recipes_model' );
	}
	/**
	 * View page.
	 *
	 *
	 * @param string $page
	 *        	the target page
	 */
	public function view($page = 'home') {
		$data ['categories'] = $this->recipes_model->get_all_main_categories ();
		
		if (! file_exists ( 'application/views/pages/' . $page . '.php' )) {
			// Whoops, we don't have a page for that!
			show_404 ();
		}
		
		$data ['title'] = ucfirst ( $page ); // Capitalize the first letter
		                                     // Load most recent recipes and other components of the page.
		$data ['mostRecents'] = $this->recipes_model->get_latest ();
		$data ['headerSurprise'] = $this->recipes_model->get_surprise ();
		
		// Load view.
		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'pages/' . $page, $data );
		$this->load->view ( 'templates/footer', $data );
	}
}
<?php
class Search extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'recipes_model' );
	}
	public function index() {
	}
	public function search($args) {
	}
}
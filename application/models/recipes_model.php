<?php
class Recipes_model extends CI_Model {
	public function __construct() {
		$this->load->database ();
	}
	public function test_db() {
		return "Db is working";
	}
}
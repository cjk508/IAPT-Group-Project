<?php
require_once 'recipe_object.php';
require_once 'ingredient_pool_object.php';
/**
 * Defines the Recipe model of the application.
 */
class Recipes_model extends CI_Model {
	public function __construct() {
		$this->load->database ();
	}
	public function test_db() {
		return "Db is working";
	}
	/**
	 * Get a recipe by id.
	 *
	 *
	 * @param int $id
	 *        	the id of the recipe
	 */
	public function get_recipe($id) {
		$result = $this->db->get_where ( 'recipes_view', array (
				'recipe_id' => $id 
		) );
		return $this->_processSingleResult ( $result );
	}
	/**
	 * Get a list of recipes that belong to a category.
	 *
	 *
	 * @param string $category
	 *        	the category
	 */
	public function get_category($category) {
		if ($this->_valid_category ( $category )) {
			$query_1 = "select * from `recipes_view` where `category` like '%" . ( string ) $category . "%'";
			$result = $this->db->query ( $query_1 );
			return $this->_processMultipleResults ( $result );
		}
		return NULL;
	}
	/**
	 * Get all the categories for the recipes. 
	 * 
	 * @return array: a list of categories for the website. 
	 */
	public function get_all_categories() {
		$query_1 = "select * from `category_list_view` limit 1";
		$result = $this->db->query ( $query_1 );
		$array = array ();
		if ($result->num_rows () > 0) {
			eval ( '$array = ' . $result->result ()[0]->categories . ";" );
		}
		return $array;
	}
	/**
	 * Check if a category call is valid.
	 *
	 *
	 * @param string $category
	 *        	the category name
	 * @return boolean true if valid
	 */
	public function _valid_category($category) {
		$query_1 = "select * from `categories` where `category_name` like '" . ( string ) $category . "'";
		$result = $this->db->query ( $query_1 );
		if ($this->_processMultipleResults ( $result )) {
			return true;
		}
		return false;
	}
	/**
	 * Get a all recipes from the database and order them A-Z on there Name.
	 */
	public function get_all_recipes_AZ() {
		$query_1 = "select * from `recipes_view` ORDER BY `recipe_title`";
		$result = $this->db->query ( $query_1 );
		return $this->_processMultipleResults ( $result );
	}
	/**
	 * Get a random recipe from the database.
	 */
	public function get_surprise() {
		$query_1 = "select * from `recipes_view` ORDER BY RAND() LIMIT 1";
		$result = $this->db->query ( $query_1 );
		return $this->_processSingleResult ( $result );
	}
	/**
	 * Get a random recipe from the database from a given category.
	 *
	 *
	 * @param string $category
	 *        	the category.
	 */
	public function get_surprise_cat($category) {
		$query_1 = "select * from `recipes_view` where `category` like '" . ( string ) $category . "' ORDER BY RAND() LIMIT 1";
		$result = $this->db->query ( $query_1 );
		return $this->_processSingleResult ( $result );
	}
	/**
	 * Get the latest 5 recipes from the database.
	 */
	public function get_latest() {
		$query_1 = "select * from `recipes_view` ORDER BY `recipe_date` DESC LIMIT 5";
		$result = $this->db->query ( $query_1 );
		return $this->_processMultipleResults ( $result );
	}
	/**
	 * Helper method to get the ingredients associated with a recipe id.
	 *
	 *
	 * @param int $id
	 *        	the id of the recipe
	 */
	private function _getIngredientPool($id) {
		$ingredient_pools = $this->db->get_where ( 'ingredient_pools_view', array (
				'recipe_id' => $id 
		) );
		if ($ingredient_pools->num_rows () > 0) {
			return $ingredient_pools->result ( 'Ingredient_pool' );
		}
		return NULL;
	}
	/**
	 * Helper method used to create the appropriate recipe and ingredient objects.
	 *
	 *
	 * @param $result the
	 *        	result of the query
	 * @return Recipe_object instance
	 */
	private function _processSingleResult($result) {
		if ($result->num_rows () > 0) {
			$recipe_data = $result->result ( 'Recipe_object' );
			$recipe_data [0]->ingredient_pools = $this->_getIngredientPool ( $recipe_data [0]->getId () );
			return $recipe_data [0];
		}
		return NULL;
	}
	/**
	 * Helper method used to create the appropriate recipe and ingredient objects.
	 * For multi-line results.
	 *
	 * @param $result the
	 *        	result of the query
	 * @return array of Recipe_object
	 */
	private function _processMultipleResults($result) {
		if ($result->num_rows () > 0) {
			$recipe_data = $result->result ( 'Recipe_object' );
			foreach ( $recipe_data as $recipe ) {
				$recipe->ingredient_pools = $this->_getIngredientPool ( $recipe->getId () );
			}
			return $recipe_data;
		}
		return NULL;
	}
}
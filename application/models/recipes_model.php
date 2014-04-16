<?php
require_once 'recipe_object.php';
require_once 'category_object.php';
require_once 'ingredient_pool_object.php';
/**
 * Defines the Recipe model of the application.
 */
class Recipes_model extends CI_Model {
	public function __construct() {
		$this->load->database ();
		// Set the session's concat limit. This is very important.
		$this->db->simple_query ( "SET SESSION group_concat_max_len = 1000000;" );
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
	 * Get a recipe by name
	 *
	 *
	 * @param string $searchTerm
	 *        	value that is being searched for
	 */
	public function recipe_Search($searchTerm) {
		$this->db->like ( 'recipe_title', $searchTerm );
		$result = $this->db->get ( 'recipes_view' );
		return $this->_processMultipleResults ( $result );
	}
	/**
	 * Get a ingredient by name.
	 *
	 *
	 * @param string $searchTerm
	 *        	value that is being searched for
	 */
	public function ingredient_Search($searchTerm) {
		$query_1 = "select recipes_view.* from `ingredient_pools_view` INNER JOIN `recipes_view` on 
					recipes_view.recipe_id=ingredient_pools_view.recipe_id where `ingredients` like '%" . ( string ) $searchTerm . "%' Group by recipes_view.recipe_id;";
		$result = $this->db->query ( $query_1 );
		return $this->_processMultipleResults ( $result );
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
			$query_1 = "select * from `recipes_view` where `category` like '%" . ( string ) $category . "%'" . " or " . " `category_url` like '%" . ( string ) $category . "%'";
			$result = $this->db->query ( $query_1 );
			return $this->_processMultipleResults ( $result );
		}
		return NULL;
	}
	/**
	 * Get all the categories for the recipes.
	 *
	 *
	 * @return array: a list of categories for the website.
	 */
	public function get_all_categories() {
		$query_1 = "select * from `categories_view` where `main_category` = 0";
		$result = $this->db->query ( $query_1 );
		return $this->_processMultipleResults ( $result, 'Category_object' );
	}
	/**
	 * Get all the categories for the recipes.
	 *
	 *
	 * @return array: a list of categories for the website.
	 */
	public function get_all_categories2() {
		$query_1 = "select * from `categories_view`";
		$result = $this->db->query ( $query_1 );
		return $this->_processMultipleResults ( $result, 'Category_object' );
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
	 * Get quick to make recipes.
	 *
	 *
	 * @param number $max_duration
	 *        	max recipe duration
	 * @return list of recipes
	 */
	public function get_quick_meals($max_duration = 20) {
		$query_1 = "select * from `recipes_view` where `recipe_cook_time` <= " . ( string ) $max_duration;
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
			$result = $ingredient_pools->result ( 'Ingredient_pool' );
			// var_dump($result);
			return $result;
		}
		return NULL;
	}
	/**
	 * Helper method to get the categories associated with a recipe id.
	 *
	 *
	 * @param int $id
	 *        	the id of the recipe
	 */
	private function _getCategories($id) {
		$categories = $this->db->get_where ( 'recipe_categories_view_2', array (
				'recipe_id' => $id 
		) );
		if ($categories->num_rows () > 0) {
			$result = $categories->result ( 'Category_object' );
			return $result;
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
	private function _processSingleResult($result, $output_class = 'Recipe_object') {
		if ($result->num_rows () > 0) {
			$recipe_data = $result->result ( $output_class );
			$recipe_data [0]->ingredient_pools = $this->_getIngredientPool ( $recipe_data [0]->getId () );
			$recipe_data [0]->categories = $this->_getCategories ( $recipe_data [0]->getId () );
			// var_dump($recipe_data [0]->ingredient_pools);
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
	private function _processMultipleResults($result, $output_class = 'Recipe_object') {
		if ($result->num_rows () > 0) {
			$recipe_data = $result->result ( $output_class );
			if ($output_class === 'Recipe_object') {
				foreach ( $recipe_data as $recipe ) {
					$recipe->ingredient_pools = $this->_getIngredientPool ( $recipe->getId () );
					$recipe->categories = $this->_getCategories ( $recipe->getId () );
				}
			}
			return $recipe_data;
		}
		return NULL;
	}
}
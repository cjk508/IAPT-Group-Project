<?php
/**
 * Defines the skeleton of an Ingredient_pool.
 * Ingredient pools are used in Recipes and contain the ingredients of the recipe.
 */
class Ingredient_pool {
	public $recipe_id;
	public $pool_id;
	public $pool_name;
	public $ingredients;
	public $difficulty;
	public function getId() {
		return $this->recipe_id;
	}
	public function getDifficulty() {
		return $this->difficulty;
	}
	public function getTitle() {
		return $this->pool_name;
	}
	/**
	 *
	 * @return a list of ingredients.
	 */
	public function getIngredients() {
		if (! is_array ( $this->ingredients )) {
			eval ( '$this->ingredients = ' . $this->ingredients . ";" );
		}
		return $this->ingredients;
	}
	public function getPoolId() {
		return $this->pool_id;
	}
}
<?php
/**
 * Defines the skeleton of an Ingredient_pool.
 * Ingredient pools are used in Recipes and contain the ingredients of the recipe.
 */
class Ingredient_pool {
	// The id of the recipe, this ingredient pool belongs to.
	public $recipe_id;
	// The id of the ingredient pool.
	public $pool_id;
	// The name of the ingredient pool.
	public $pool_name;
	// A list of ingredients, that belong to the pool.
	public $ingredients;
	// The pool difficulty.
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

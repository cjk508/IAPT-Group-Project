<?php
/**
 * This defines the skeleton of a Recipe_object. 
 * Recipe_objects contain all the key details of a Recipe, including preparation methods. 
 */
class Recipe_object {
	// The id of the recipe
	public $recipe_id;
	// The title of the recipe
	public $recipe_title;
	// The recipe category
	public $category;
	// The path to the image of the recipe
	public $recipe_image;
	// Array of Ingredient_pool
	public $ingredient_pools;
	// The date the recipe was created
	public $recipe_date;
	// The servings of the recipe
	public $recipe_servings;
	// The narrative method of the recipe
	public $narrative_method;
	// The segmented method of the recipe
	// It is an array of ordered steps.
	public $segmented_method;
	// The step method of the recipe.
	// It is an array of ordered steps.
	public $step_method;
	public function getNarrativeMethod() {
		return $this->narrative_method;
	}
	public function getImage() {
		return $this->recipe_image;
	}
	public function getSegmentedMethod() {
		if (! is_array ( $this->segmented_method )) {
			eval ( '$this->segmented_method = ' . $this->segmented_method . ";" );
		}
		return $this->segmented_method;
	}
	public function getStepMethod() {
		if (! is_array ( $this->step_method )) {
			eval ( '$this->step_method = ' . $this->step_method . ";" );
		}
		return $this->step_method;
	}
	public function getTitle() {
		return $this->recipe_title;
	}
	public function getId() {
		return $this->recipe_id;
	}
	public function getCategory() {
		if (! is_array ( $this->category )) {
			eval ( '$this->category = ' . $this->category . ";" );
		}
		return $this->category;
	}
	public function getIngredientPools() {
		return $this->ingredient_pools;
	}
	public function getDate() {
		return $this->recipe_date;
	}
	public function getServings() {
		return $this->recipe_servings;
	}
	public function getIngredientPool($difficulty) {
		foreach ( $this->getIngredientPools () as $pool ) {
			if (strcmp ( $pool->getDifficulty (), $difficulty )) {
				return $pool;
			}
		}
		return NULL;
	}
}
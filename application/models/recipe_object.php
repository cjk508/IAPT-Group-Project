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
	public $categories;
	// The path to the image of the recipe
	public $recipe_image;
	// The alternative of the image
	public $recipe_image_alt;
	// The short description of the recipe
	public $recipe_description;
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
	// The recipe preparation time.
	public $recipe_cook_time;
	public function getRecipeCookTime() {
		return $this->recipe_cook_time;
	}
	public function getNarrativeMethod() {
		return $this->narrative_method;
	}
	public function getImage() {
		return $this->recipe_image;
	}
	public function getImageAlt() {
		return $this->recipe_image_alt;
	}
	public function getDescription() {
		return $this->recipe_description;
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
		return $this->categories;
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
	/**
	 * Get an array of Ingredient_pool objects, that belong to a recipe.
	 *
	 *
	 * @param string $difficulty
	 *        	the target difficulty
	 * @return array: array of Ingredient_pool
	 */
	public function getIngredientPool($difficulty) {
		$pools = array ();
		foreach ( $this->getIngredientPools () as $pool ) {
			if ($pool->getDifficulty () === $difficulty) {
				array_push ( $pools, $pool );
			}
		}
		return $pools;
	}
	//used to create unique array on the recipe name
	public function __toString() {
	    return $this->recipe_id;
	}
}

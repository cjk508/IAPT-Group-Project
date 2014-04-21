<?php
/**
 * Defines a caregory object, which contains information about a category. 
 */
class Category_object {
	// The category id.
	public $category_id;
	// The category name.
	public $category_name;
	// The category display name, used in formatting to screen.
	public $category_display_name;
	// The index of the main category. If none is 0.
	public $main_category;
	function getCategoryId() {
		return ( int ) $this->category_id;
	}
	function getCategoryName() {
		return $this->category_name;
	}
	function getCategoryDisplayName() {
		return $this->category_display_name;
	}
	function getMainCategoryId() {
		return ( int ) $this->main_category;
	}
}
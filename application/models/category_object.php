<?php
/**
 * Defines a caregory object, which contains information about a category. 
 * 
 *
 */
class Category_object {
	public $category_id;
	public $category_name;
	public $category_display_name;
	public $main_category;
	public $category_icon_file;
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
	function getIconFileName() {
		return $this->category_icon_file;
	}
}
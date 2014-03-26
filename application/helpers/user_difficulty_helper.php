<?php
/*
 * Helper functions, useful for determining the current user type.
 */

/**
 * Check if we're on the narrative track.
 *
 *
 * @param unknown $sessionData        	
 * @return boolean
 */
function isNarrative($sessionData) {
	return $sessionData ['viewType'] == NARRATIVE;
}
function isSegmented($sessionData) {
	return $sessionData ['viewType'] == SEGMENTED;
}
function isStep($sessionData) {
	return $sessionData ['viewType'] == STEP;
}
/**
 * Check if a user type has been selected.
 *
 *
 * @param unknown $sessionData
 *        	the current session.
 * @return boolean true if a type is selected.
 */
function typeIsSelected($sessionData) {
	return isNarrative ( $sessionData ) || isSegmented ( $sessionData ) || isStep ( $sessionData );
}
function getUserType($sessionData) {
	if (array_key_exists ( 'viewType', $sessionData )) {
		return $sessionData ['viewType'];
	}
	// The default type.
	return DEFAULT_TYPE;
}
function differentType($sessionData) {
	return ! isset ( $sessionData ['viewType'] ) || $sessionData ['viewType'] !== $_POST ['viewType'];
}
/**
 * Conditional echo of a string depending on the intended user type.
 *
 * @param string $string        	
 * @param unknown $sessionData        	
 * @param string $targetType        	
 */
function echo_type_depend($string, $sessionData, $targetType) {
	switch ($sessionData ['viewType']) {
		case NARRATIVE :
			if ($targetType == NARRATIVE) {
				echo $string;
			}
			break;
		
		case SEGMENTED :
			if ($targetType == SEGMENTED) {
				echo $string;
			}
			break;
		case STEP :
			if ($targetType == STEP) {
				echo $string;
			}
			break;
		
		default :
			echo "";
			break;
	}
}


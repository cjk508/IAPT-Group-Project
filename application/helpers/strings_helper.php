<?php
/* Some String helper methods. */

/**
 * Check if a string starts with another string.
 *
 *
 * @param unknown $haystack
 *        	the haystack
 * @param unknown $needle
 *        	the needle
 * @return boolean
 */
function startsWith($haystack, $needle) {
	return $needle === "" || strpos ( $haystack, $needle ) === 0;
}
/**
 * Check if a string ends with another string.
 *
 *
 * @param unknown $haystack
 *        	the haystack
 * @param unknown $needle
 *        	the needle
 * @return boolean
 */
function endsWith($haystack, $needle) {
	return $needle === "" || substr ( $haystack, - strlen ( $needle ) ) === $needle;
}
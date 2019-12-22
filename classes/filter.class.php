<?php
/*
	Produced 2019
	By https://github.com/amattu2
	Copy Alec M.
	License GNU Affero General Public License v3.0
*/

/*
	Built on PHP 7.2.24 for Ubuntu
*/

class Filter {
	/**
	* Remove HTML Tags, Non-Printable Characters, Slashes from a string
	*
	* @param string $input
	* @return string filtered
	* @throws TypeError
	**/
	public static function input(string $input) : string {
		$input = strip_tags($input);
		$input = preg_replace('/[^\00-\255]+/u', '', $input);
		$input = stripslashes($input);
		return $input;
	}

	/**
	* Remove Non-numeric characters from a string
	*
	* @param int|string|double|float $input
	* @return int|double|float filtered
	* @throws None
	**/
	public static function nonNumeric($input) {
		// Variables
		$type = gettype($input);

		// Checks
		if ($type === "string") {
			return preg_replace('/[^0-9]/', '', $input);
		} else if ($type === "integer") {
			return $input;
		} else if ($type === "double") {
			return $input;
		} else if ($type === "float") {
			return $input;
		} else {
			return 0;
		}
	}

	/**
	* Remove Non-Alpha characters (a-zA-Z) from a string
	*
	* @param string $input
	* @return string filtered
	* @throws None
	**/
	public static function nonAlpha($input) : string {
		// Variables
		$type = gettype($input);

		// Checks
		if ($type === "string") {
			return preg_replace('/\PL/u', '', $input);
		} else {
			return "";
		}
	}

	/**
	* Remove Non-Alphanumeric characters (a-zA-Z0-9) from a string
	*
	* @param string $input
	* @return string filtered
	* @throws None
	**/
	public static function nonAlphaNumeric($input) : string {
		// Variables
		$type = gettype($input);

		// Checks
		if ($type === "string") {
			return preg_replace("/(\W)+/", '', $input);
		} else if ($type === "integer") {
			return strval($input);
		} else if ($type === "double") {
			return strval($input);
		} else if ($type === "float") {
			return strval($input);
		} else {
			return "";
		}
	}

	/**
	* Replace string whitespace characters with dashes
	*
	* @param string $input
	* @return string replaced
	* @throws TypeError
	**/
	public static function fileName(string $input) : string {
		return preg_replace("/[\s_]/", "-", trim($input));
	}

	/**
	* Remove invalid characters from string|int and format number
	*
	* @param string|int $input
	* @return string filtered
	* @throws None
	**/
	public static function number($input) : string {
		// Variables
		$type = gettype($input);

		// Checks
		if ($type === "string") {
			$input = preg_replace("/[^\d]/", "", $input);
		} else if ($type === "integer") {
			$input = strval($input);
		} else {
			return "";
		}

		// Return
		return preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $input);
	}
}
?>

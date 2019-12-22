<?php
/*
	Produced 2019
	By https://github.com/amattu2
	Copy Alec M.
	License GNU Affero General Public License v3.0
*/

// Files
require(dirname(__FILE__) . "/classes/filter.class.php");

// Test Cases
test("input", Filter::input("Wo/p wo\p \nnewline <b>Hu</b>"), "Wo/p wo\p \nnewline <b>Hu</b>", true);
test("nonNumeric", Filter::nonNumeric("1Wop wop <b>Hu</b>2"), "1Wop wop <b>Hu</b>2");
test("nonNumeric", Filter::nonNumeric(3), 3);
test("nonNumeric", Filter::nonNumeric(Array(1, 3)), "Array", true);
test("nonAlpha", Filter::nonAlpha(Array(1, 3)), "Array");
test("nonAlpha", Filter::nonAlpha("Hey 1 Two 3 Four"), "Hey 1 Two 3 Four");
test("nonAlpha", Filter::nonAlpha("123|321"), "123|321", true);
test("nonAlphaNumeric", Filter::nonAlphaNumeric("123|321"), "123|321");
test("nonAlphaNumeric", Filter::nonAlphaNumeric("BeepB00p 1-2-3-4 ! @ # $"), "BeepB00p 1-2-3-4 ! @ # $");
test("nonAlphaNumeric", Filter::nonAlphaNumeric(Array(1, 3)), "Array", true);
test("fileName", Filter::fileName("abc efg.txt"), "abc efg.txt");
test("fileName", Filter::fileName("abc_efg.txt"), "abc_efg.txt", true);
test("number", Filter::number("9085088887"), "9085088887");
test("number", Filter::number("910 - 5!10 - 8877"), "910 - 5!10 - 8877");
test("number", Filter::number(Array(1, 3)), "Array");
test("number", Filter::number("13014009898"), "13014009898");

// Test Function
function test($name, $value, $original, $last = false) {
	echo "<b>Test <i>Filter::$name</i></b>: ";
	echo $value;
	echo " [Original <i><input type='text' value='$original'></input></i>]";
	echo ($last ? "<hr/>" : "<br/><br/>");
}
?>

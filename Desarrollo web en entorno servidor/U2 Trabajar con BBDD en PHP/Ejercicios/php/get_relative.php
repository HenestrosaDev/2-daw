<?php
function get_relative($path) {
	if (preg_match('/index/', basename($path, '.php'))) {
		return ".";
	} else {
		return "..";
	}
}
?>
<?php
function get_relative($path) {
	if (preg_match('/inicio/', basename($path, '.php'))) {
		return ".";
	} else {
		return "..";
	}
}
?>
<?php 
function redirect($role) {
	global $relative;
	if ($relative === '.') { //index.php
		header("Location: ./1_test/{$role}.php");
	} else {
		header("Location: ./{$role}.php");
	}
	exit();
}

function redirect_index() {
	global $relative;
	header("Location: {$relative}/index.php");
	exit();
}
?>
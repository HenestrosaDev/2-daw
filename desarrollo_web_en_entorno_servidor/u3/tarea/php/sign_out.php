<?php
function sign_out() {
	global $relative;

	session_status() === PHP_SESSION_ACTIVE ?: session_start();
	$_SESSION = array();
	session_destroy();
	session_start();
	session_regenerate_id();
	
	header("Location: {$relative}/index.php");
	exit();
}

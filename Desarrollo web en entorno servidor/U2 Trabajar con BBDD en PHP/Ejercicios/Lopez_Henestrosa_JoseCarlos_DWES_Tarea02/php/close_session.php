<?php
function close_session() {
	global $relative;
	require_once("{$relative}/php/redirect.php");
	session_status() === PHP_SESSION_ACTIVE ?: session_start();
	$_SESSION = array();
	session_destroy();
	session_start();
	session_regenerate_id();
	redirect_index();
}
?>

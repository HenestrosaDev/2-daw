<?php
if (!empty($_POST["logout_submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
	session_status() === PHP_SESSION_ACTIVE ?: session_start();
	$_SESSION = array();
	session_destroy();
	session_start();
	session_regenerate_id();
	header("Location: {$_POST["logout_submit"]}");
}

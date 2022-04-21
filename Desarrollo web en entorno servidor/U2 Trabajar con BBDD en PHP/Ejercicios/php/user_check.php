<?php
require_once("{$relative}/php/connect_db.php");
session_status() === PHP_SESSION_ACTIVE ?: session_start();

if (!isset($_SESSION) || !isset($_SESSION["app_user_id"])) {
	require_once("{$relative}/php/close_session.php");
	close_session();
}
?>
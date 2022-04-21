<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
if (!isset($_SESSION) || $_SESSION["user_role"] !== 'A') {
	require_once("{$relative}/php/redirect.php");
	redirect("user");
}
require_once("{$relative}/php/connect_db.php");
?>
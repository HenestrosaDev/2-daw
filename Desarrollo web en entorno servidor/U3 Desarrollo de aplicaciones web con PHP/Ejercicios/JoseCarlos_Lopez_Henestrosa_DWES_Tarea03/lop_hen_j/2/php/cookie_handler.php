<?php
if (!empty($_POST["cart"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
	setcookie("cart", $_POST["cart"], time() + 3600, '/');
	echo $_POST["cart"];
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	if (!empty($_COOKIE["cart"])) {
		echo $_COOKIE["cart"];
	}
}
?>
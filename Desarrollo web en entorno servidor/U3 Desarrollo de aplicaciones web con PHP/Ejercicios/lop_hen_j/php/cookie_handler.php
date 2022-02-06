<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST["cart_2"])) {
		setcookie("cart_2", $_POST["cart_2"], time() + 3600, '/');
	} else if (!empty($_POST["cart_5"])) {
		setcookie("cart_5", $_POST["cart_5"], time() + 3600, '/');
	} else {
		/**
		 * Comprobamos si la key del POST contiene
		 * la palabra 'custom'. De ser así, significa
		 * que tenemos que setear la cookie con los 
		 * ingredientes de dicha pizza custom.
		 */
		foreach ($_POST as $key => $value) {
			if (str_contains($key, 'custom')) {
				setcookie($key, $value, time() + 3600, '/');		
			}
		}
	}
	echo $_POST;
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	if (!empty($_GET["cart_2"]) && !empty($_COOKIE["cart_2"])) {
		echo $_COOKIE["cart_2"];
	} else if (!empty($_GET["cart_5"]) && !empty($_COOKIE["cart_5"])) {
		echo $_COOKIE["cart_5"];
	}
}
?>
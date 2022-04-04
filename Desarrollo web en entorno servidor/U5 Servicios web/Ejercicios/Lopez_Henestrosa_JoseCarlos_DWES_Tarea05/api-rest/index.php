<?php
require __DIR__ . "/inc/bootstrap.php";

/**
 * parse_url and explode functions initialize URI segments into the $uri
 * array variable
 */
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

/**
 * Validating the URI segments. The 3rd position of the URI array indicates the
 * action 
 */ 
if ((!empty($uri[2]) && $uri[2] != 'user') || !isset($uri[3])) {
	// If not valid, return an error 404 and stop the execution
	header("HTTP/1.1 404 Not Found");
	exit();
}

/**
 * If the URI is valid, import the User Controller and call the corresponding
 * action method
 */
 
require PROJECT_ROOT_PATH . "/Controllers/Api/UserController.php";

$userController = new UserController();
$methodName = "{$uri[3]}Action";
$userController->{$methodName}();

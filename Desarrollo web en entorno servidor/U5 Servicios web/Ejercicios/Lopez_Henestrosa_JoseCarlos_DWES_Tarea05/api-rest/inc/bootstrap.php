<?php
/**
 * Sets up the common files in the application.
 */

define("PROJECT_ROOT_PATH", __DIR__ . "/../");

// include main configuration file (mainly the database connection information)
require_once PROJECT_ROOT_PATH . "/inc/config.php";

// include the base controller file
require_once PROJECT_ROOT_PATH . "/Controllers/Api/BaseController.php";
 
// include the use model file
require_once PROJECT_ROOT_PATH . "/Models/User.php";

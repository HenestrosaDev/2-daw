<?php
require_once PROJECT_ROOT_PATH . "/Models/Database.php";

/**
 * Implements the necessary methods to interact with the users table in the
 * MySQL database
 */

class User extends Database
{
	public function getUsers($limit)
	{
		/**
		 * "i" specifies that the type of variable bind_param() returns is an
		 * Integer.
		 */
		return $this->select("SELECT * FROM users ORDER BY id ASC LIMIT ?", ["i", $limit]);
	}
}

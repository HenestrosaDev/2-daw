<?php
function filter($data) {
  	$data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function filter_username($username) {
	$username = filter($username);
	if (preg_match('/^[\w-]*$/', $username) && (strlen($username) <= 20)) {
		return $username;
	} else {
		return null;
	}
}
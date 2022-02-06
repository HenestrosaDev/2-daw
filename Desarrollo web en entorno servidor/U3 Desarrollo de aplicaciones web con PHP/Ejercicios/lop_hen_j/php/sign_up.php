<?php
function throw_exception($message, $path) {
	$_SESSION["sign_up_exception"] = $message;
	header("Location: {$path}");
}

if (!empty($_POST["sign_up_submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
	session_status() === PHP_SESSION_ACTIVE ? session_regenerate_id() : session_start();
	require_once "./connect_db.php";
	require_once "./exceptions.php";
	
	$args = array(
		'sign_up_username' => array(
			'filter' => FILTER_CALLBACK,
			'options' =>
				function ($input) {
					$filtered = filter_var($input, FILTER_SANITIZE_STRING);
					if (strlen($input) < 20 && preg_match('/^[\w-]*$/', $input)) {
						return $input;
					}
					return null;
				}
		),
		/* 
		 * Evitamos que se introduzcan strings vacíos ("") 
		 * sustituyendo el valor de la variable por null
		 */
		'sign_up_password' => array(
			'filter' => FILTER_CALLBACK, 
			'options' => 
				function ($input) {
					$filtered = filter_var($input, FILTER_SANITIZE_STRING);
					return $filtered ? $filtered : null;
				}
		),
		'sign_up_submit' => FILTER_SANITIZE_STRING,
	);

	$_POST = filter_input_array(INPUT_POST, $args);

	try {
		if (!empty($_POST["sign_up_username"])) {
			$sign_up_username = $_POST["sign_up_username"];
			if ($sign_up_username === NULL) throw new InvalidUsernameException;
		} else {
			throw new EmptyFieldException;
		}
		if (!empty($_POST["sign_up_password"])) {
			$sign_up_password = password_hash($_POST["sign_up_password"], PASSWORD_BCRYPT);
		} else {
			throw new EmptyFieldException;
		}
		
		$sql_user_exists = "SELECT 1 FROM app_user WHERE LOWER(username)=?";
		$sth_user_exists = $dbh->prepare($sql_user_exists);
		$sth_user_exists->execute(array(strtolower($sign_up_username)));

		if ($sth_user_exists->rowCount() === 0) {
			$sql_insert_user = "INSERT INTO app_user (username, user_password) VALUES (?, ?)";
			$sth_insert_user = $dbh->prepare($sql_insert_user);
			$sth_insert_user->execute(array($sign_up_username, $sign_up_password));

			$sql_user_id = "SELECT id FROM app_user WHERE username=?";
			$sth_user_id = $dbh->prepare($sql_user_id);
			$sth_user_id->execute(array($sign_up_username));


			$app_user_id = $sth_user_id->fetch();
			$_SESSION["app_user_id"] = $app_user_id[0];
			$_SESSION["is_logged_in"] = true;
			$_SESSION["username"] = $sign_up_username;
			$_SESSION["user_role"] = 'U';

			header("Location: {$_POST['sign_up_submit']}");
		} else {
			throw new UserExistsException;
		}
	} catch (InvalidUsernameException $e) {
		throw_exception("El nombre de usuario no es válido", $_POST['sign_up_submit']);
	} catch (UserExistsException $e) {
		throw_exception("El usuario ya existe", $_POST['sign_up_submit']);
	} catch (EmptyFieldException $e) {
		throw_exception("No pueden haber campos vacíos", $_POST['sign_up_submit']);
	}
}  
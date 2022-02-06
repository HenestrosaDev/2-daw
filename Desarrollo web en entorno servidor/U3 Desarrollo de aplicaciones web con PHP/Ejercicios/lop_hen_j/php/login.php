<?php
function throw_exception($message, $path) {
	$_SESSION["login_exception"] = $message;
	header("Location: {$path}");
}

if (!empty($_POST["login_submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
	session_status() === PHP_SESSION_ACTIVE ?: session_start();
	
	require_once "./connect_db.php";
	require_once "./exceptions.php";

	$args = array(
		'login_username' => array(
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
		'login_password' => array(
			'filter' => FILTER_CALLBACK, 
			'options' => 
				function ($input) {
					$filtered = filter_var($input, FILTER_SANITIZE_STRING);
					return $filtered ? $filtered : null;
				}
		),
		'login_submit' => FILTER_SANITIZE_STRING,
	);

	$_POST = filter_input_array(INPUT_POST, $args);

	try {
		$login_username = $login_password = "";

		if (!empty($_POST["login_username"]) && !empty($_POST["login_password"])) {
			$login_username = $_POST["login_username"];
			$login_password = $_POST["login_password"];
		} else {
			throw new EmptyFieldException;
		}

		$sql_user = "SELECT * FROM app_user WHERE LOWER(username)=?";
		$sth_user = $dbh->prepare($sql_user);
		$sth_user->execute(array(strtolower($login_username)));
		$user = $sth_user->fetch(PDO::FETCH_ASSOC);

		if ($sth_user->rowCount() === 0) {
			throw new UsernameNotMatchException;
		} else if (!password_verify($login_password, $user["user_password"])) {
			throw new PasswordNotMatchException;
		} else if ($user["is_active"] == 0) {
			throw new InactiveUserException;
		} else {
			$_SESSION["app_user_id"] = $user["id"];
			$_SESSION["username"] = $user["username"];
			$_SESSION["is_logged_in"] = true;
			$_SESSION["user_role"] = $user["user_role"];

			header("Location: {$_POST['login_submit']}");
		}
	} catch (EmptyFieldException $e) {
		throw_exception("No pueden haber campos vacíos", $_POST['login_submit']);
	} catch (UsernameNotMatchException $e) {
		throw_exception("El usuario no existe", $_POST['login_submit']);
	} catch (PasswordNotMatchException $e) {
		throw_exception("La contraseña no es correcta", $_POST['login_submit']);
	} catch (InactiveUserException $e) {
		throw_exception("El usuario está inactivo", $_POST['login_submit']);
	}
}
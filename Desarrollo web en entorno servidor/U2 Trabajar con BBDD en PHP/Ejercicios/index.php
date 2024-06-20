<?php
require_once("./php/get_relative.php");
$relative = get_relative(__FILE__);

require_once("{$relative}/php/connect_db.php");
require_once "{$relative}/php/exceptions.php";
require_once "{$relative}/php/redirect.php";

session_status() === PHP_SESSION_ACTIVE ?: session_start();

// Login
if (!empty($_POST["login_submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

	require_once "{$relative}/php/filter.php";

	try {
		if (empty($_POST["login_username"]) || empty($_POST["login_password"])) {
			throw new EmptyFieldException;
		}
		$login_username = filter($_POST["login_username"]);
		$login_password = $_POST["login_password"];

		$sql_user = "SELECT * FROM app_user WHERE LOWER(username)=?";
		$sth_user = $dbh->prepare($sql_user);
		$sth_user->execute(array(strtolower($login_username)));
		$user = $sth_user->fetch(PDO::FETCH_ASSOC);
		print_r($user);

		if ($sth_user->rowCount() === 0) {
			throw new UsernameNotMatchException;
		} else if (!password_verify($login_password, $user["user_password"])) {
			throw new PasswordNotMatchException;
		} else if ($user["is_active"] == 0) {
			throw new InactiveUserException;
		} else {
			session_status() === PHP_SESSION_ACTIVE ?: session_start();
			$_SESSION["app_user_id"] = $user["id"];
			$_SESSION["username"] = $user["username"];
			$_SESSION["is_logged_in"] = true;
			$_SESSION["user_role"] = $user["user_role"];

			if ($_SESSION["user_role"] === 'A') {
				redirect("admin");
			} else if ($_SESSION["user_role"] === 'U') {
				redirect("user");
			}
		}
	} catch (EmptyFieldException $e) {
		$e_login_empty_field = true;
	} catch (UsernameNotMatchException $e) {
		$e_username_not_match = true;
	} catch (PasswordNotMatchException $e) {
		$e_password_not_match = true;
	} catch (InactiveUserException $e) {
		$e_inactive_user = true;
	}
}

// Sign up
if (!empty($_POST["sign_up_submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

	require_once "{$relative}/php/filter.php";

	try {
		if (!empty($_POST["sign_up_username"])) {
			$sign_up_username = filter_username($_POST["sign_up_username"]);
			if ($sign_up_username === NULL) throw new InvalidUsernameException;
		} else {
			throw new EmptyFieldException;
		}
		if (!empty($_POST["sign_up_password"])) {
			$sign_up_password = password_hash($_POST["sign_up_password"], PASSWORD_ARGON2ID);
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

			session_status() === PHP_SESSION_ACTIVE ? session_regenerate_id() : session_start();

			$app_user_id = $sth_user_id->fetch();
			$_SESSION["app_user_id"] = $app_user_id[0];
			$_SESSION["is_logged_in"] = true;
			$_SESSION["username"] = $sign_up_username;
			$_SESSION["user_role"] = 'U';

			redirect("user");
		} else {
			throw new UserExistsException;
		}
	} catch (InvalidUsernameException $e) {
		$e_invalid_username = true;
	} catch (UserExistsException $e) {
		$e_user_exists = true;
	} catch (EmptyFieldException $e) {
		$e_sign_up_empty_field = true;
	}
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Unidad 2 | Ejercicio 1: Inicio</title>
	<?php include "{$relative}/common/head.php"; ?>
</head>

<body class="bg-light">
	<?php include "{$relative}/common/modal-logout.php" ?>

	<!-- Modal login -->
	<div 
		id="login__modal" 
		class="modal fade" 
		tabindex="-1" 
		aria-labelledby="login__title" 
		aria-hidden="true"
	>
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 
						id="login__title"
						class="modal-title" 
					>
						Inicio de sesión
					</h5>
					<button 
						type="button" 
						class="btn-close" 
						data-bs-dismiss="modal" 
						aria-label="Close"
					></button>
				</div>

				<form method="post">
					<div class="modal-body">
						<div 
							id="login__username"
							class="form-floating" 
						>
							<input 
								id="login__username__input" 
								type="text" 
								name="login_username" 
								class="form-control" 
								placeholder="Juan" 
								maxlength="20" 
								required
							>
							<label for="login__username__input">
								Nombre de usuario
							</label>
						</div>

						<div 
							id="login__password"
							class="form-floating" 
						>
							<input 
								id="login__password__input" 
								name="login_password" 
								type="password" 
								class="form-control" 
								placeholder="Password" 
								required
							>
							<label for="login__password__input">
								Contraseña
							</label>
						</div>

						<?php if (!empty($e_login_empty_field) || !empty($e_username_not_match) || !empty($e_password_not_match) || !empty($e_inactive_user)) { ?>
							<div 
								class="alert alert-danger text-center" 
								role="alert"
							>
								<?php if (!empty($e_login_empty_field)) { ?>
									No pueden haber campos vacíos
								<?php } else if (!empty($e_username_not_match)) { ?>
									El usuario no existe
								<?php } else if (!empty($e_password_not_match)) { ?>
									La contraseña no es correcta
								<?php } else if (!empty($e_inactive_user)) { ?>
									El usuario no está activado
								<?php } ?>
							</div>
						<?php } ?>
					</div>

					<div class="modal-footer">
						<button 
							type="button" 
							class="btn btn-secondary" 
							data-bs-dismiss="modal"
						>
							Cerrar
						</button>
						<button 
							name="login_submit" 
							value="login_submit" 
							type="submit" 
							class="btn btn-primary"
						>
							Iniciar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Modal sign up -->
	<div 
		id="sign_up__modal" 
		class="modal fade" 
		tabindex="-1" 
		aria-labelledby="sign_up__title" 
		aria-hidden="true"
	>
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 
						id="sign_up__title"
						class="modal-title" 
					>
						Registro
					</h5>
					<button 
						type="button" 
						class="btn-close" 
						data-bs-dismiss="modal" 
						aria-label="Close"
					></button>
				</div>

				<form method="post">
					<div class="modal-body">
						<div 
							id="sign_up__username"
							class="form-floating" 
						>
							<input 
								id="sign_up__username__input" 
								name="sign_up_username" 
								type="text" 
								class="form-control" 
								placeholder="Juan" 
								maxlength="20" 
								required
							>
							<label for="username__input">
								Nombre de usuario
							</label>
						</div>

						<div 
							class="form-floating" 
							id="sign_up__password"
						>
							<input 
								id="sign_up__password__input" 
								name="sign_up_password" 
								type="password" 
								class="form-control" 
								placeholder="Password" 
								required
							>
							<label for="password__input">
								Contraseña
							</label>
						</div>

						<div 
							class="<?= (!empty($e_invalid_username) || !empty($e_user_exists) || !empty($e_sign_up_empty_field) ? "alert alert-danger text-center" : "d-none") ?>" 
							role="alert"
						>
							<?php if (!empty($e_invalid_username)) { ?>
								El usuario solo puede contener letras, números, "_" y/o "-", con un máximo de 20 caracteres.
							<?php } else if (!empty($e_user_exists)) { ?>
								El usuario ya existe
							<?php } else if (!empty($e_sign_up_empty_field)) { ?>
								No pueden haber campos vacíos
							<?php } ?>
						</div>
					</div>

					<div class="modal-footer">
						<button 
							type="reset" 
							class="btn btn-secondary" 
							data-bs-dismiss="modal"
						>
							Cerrar
						</button>

						<button 
							type="submit" 
							name="sign_up_submit" 
							value="sign_up_submit" 
							class="btn btn-primary"
						>
							Registrarse
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php include "{$relative}/common/nav.php" ?>

	<div 
		class="container pt-3" 
		style="max-width: 960px;"
	>
		<header>
			<div class="p-3 pb-md-4 mx-auto text-center">
				<h1 class="display-4 fw-normal">
					Bienvenido
				</h1>
			</div>
		</header>

		<main>
			<div class="text-center">
				<p>
					Necesitas iniciar sesión para poder acceder a las funcionalidades de la página.
				</p>
				
				<p>De la parte de la pizzería solo he realizado el front-end.</p>
				<p>
					Credenciales: 
					<strong>admin</strong>: 1234 
					/ 
					<strong>user</strong>: 1234
				</p>
			</div>
		</main>
	</div>

	<?php include "{$relative}/common/footer.html" ?>

	<?php include "{$relative}/common/scripts.php" ?>
	<?php require_once "{$relative}/php/check_errors.php" ?>
</body>

</html>
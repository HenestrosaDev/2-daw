<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();

if (!empty($_SESSION["app_user_id"])) {
	header("Location: {$_SESSION['redirect_from_join']}");
	exit();
}

$relative = ".";
$active = 4;
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Unidad 3 | Únete</title>
	<?php include "{$relative}/common/head.php"; ?>
</head>

<body class="bg-light">
	<?php include "{$relative}/common/nav.php" ?>

	<?php include "{$relative}/common/modal-login.php" ?>

	<div
		class="container pt-3"
		style="max-width: 500px"
	>
		<header>
			<div class="p-3 pb-md-4 mx-auto text-center">
				<h1 class="display-4 fw-normal">Inicia sesión</h1>
			</div>
		</header>

		<main>
			<div class="card bg-light">
				<article
					class="card-body mx-auto w-100"
					style="max-width: 350px"
				>
					<h4 class="card-title mt-3 text-center">Crea tu cuenta</h4>
					<p class="text-center">Alternativa a los usuarios predefinidos</p>

					<form 
						id="sign_up__form" 
						method="post" 
						action="<?= $relative ?>/php/sign_up.php"
					>
						<div class="mb-3 input-group">
							<span class="input-group-text">
								<i class="bi bi-person-fill"></i>
							</span>
							<input
								id="sign_up__username"
								class="form-control"
								name="sign_up_username"
								placeholder="Nombre de usuario"
								aria-label="Nombre de usuario"
								type="text"
								pattern="^[\w-]*$"
								title="Solo letras, números, '_' y '-' "
								maxlength="20"
								required
							/>

							<div
								id="username__feedback"
								class="invalid-feedback"
							>
								El nombre de usuario no puede estar vacío.
							</div>
						</div>

						<div class="mb-3 input-group">
							<span class="input-group-text">
								<i class="bi bi-lock-fill"></i>
							</span>
							<input
								id="sign_up__password"
								class="form-control"
								name="sign_up_password"
								placeholder="Contraseña"
								aria-label="Contraseña"
								type="password"
								required
							/>

							<div
								id="password__feedback"
								class="invalid-feedback"
							>
								La contraseña no puede estar vacía.
							</div>
						</div>

						<div class="input-group mb-3">
							<span class="input-group-text">
								<i class="bi bi-lock-fill"></i>
							</span>
							<input
								id="sign_up__password--val"
								class="form-control"
								placeholder="Confirmar contraseña"
								aria-label="Confirmar contraseña"
								type="password"
								required
							/>

							<div
								id="password__feedback--val"
								class="invalid-feedback"
							>
								Las contraseñas no coinciden.
							</div>
						</div>

						<?php if (!empty($_SESSION["sign_up_exception"])) { ?>
							<div
								class="input-group alert alert-danger d-flex align-items-center"
								role="alert"
							>
								<svg
									xmlns="http://www.w3.org/2000/svg"
									width="24"
									height="24"
									fill="currentColor"
									class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2"
									viewBox="0 0 16 16"
									role="img"
									aria-label="Warning:"
								>
									<path
										d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
									/>
								</svg>
								<div class="text-break text-center">
									<?= $_SESSION["sign_up_exception"] ?>
								</div>
							</div>
						<?php } ?>

						<div class="my-4 text-center">
							<button
								id="sign_up__submit--visible"
								class="btn btn-primary col-12"
								type="button"
							>
								Crear cuenta
							</button>
							<input
								id="sign_up__submit--invisible"
								name="sign_up_submit"
								value="<?= $_SESSION["redirect_from_php"] ?>"
								class="d-none"
								type="submit"
							/>
						</div>
					</form>

					<p class="divider-text">
						<span class="bg-light">O</span>
					</p>

					<p class="text-center">
						¿Ya tienes cuenta?
						<a
							href=""
							data-bs-toggle="modal"
							data-bs-target="#login__modal"
						>
							Entra
						</a>
					</p>
				</article>
			</div>
		</main>
	</div>

	<?php include "{$relative}/common/scripts.php" ?>
	<script src="<?= $relative ?>/js/reset-modal-forms.js"></script>
	<script src="<?= $relative ?>/js/join.js"></script>
</body>

</html>
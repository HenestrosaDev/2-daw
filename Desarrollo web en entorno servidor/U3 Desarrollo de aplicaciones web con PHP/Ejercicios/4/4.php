<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();

$relative = "..";
$active = 4;

/*
 * Las variables "redirect_from_..." se usan
 * para saber a dónde redireccionar al usuario
 * en caso de que se registre/inicie sesión 
 * correctamente, puesto que join.php se usa
 * tanto en el archivo 4.php como en 5.php
 */
if (!(!empty($_SESSION["app_user_id"]))) {
	/*
	 * Ruta a la que redirigir en caso de que 
	 * el usuario inicie sesión correctamente.
	 * Se redirige desde common/modal-login.php
	 */
	$_SESSION["redirect_from_php"] = "../4/4.php";
	/*
	 * Ruta a la que redirigir en caso de que 
	 * el usuario haya iniciado sesión previamente.
	 * Se redirige desde join.php, situado en la raíz.
	 */
	$_SESSION["redirect_from_join"] = "./4/4.php";
	header("Location: {$relative}/join.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Unidad 3 | Ejercicio 4: Contabilidad</title>
	<link href="./css/4.css" rel="stylesheet">
	<?php include "{$relative}/common/head.php"; ?>
</head>

<body class="bg-light">
	<?php include "{$relative}/common/nav.php" ?>

	<?php include "{$relative}/common/modal-logout.php" ?>

	<div
		class="container pt-3"
		style="max-width: 960px"
	>
		<header>
			<div class="p-3 pb-md-4 mx-auto text-center">
				<h1 class="display-4 fw-normal">Contabilidad de gastos e ingresos</h1>
			</div>
		</header>

		<main>
			<form
				id="form"
				class="shadow"
				action="./php/generate_pdf.php"
				method="post"
			>
				<div id="income">
					<h3 class="between-lines">
						<span class="between-lines__text text-uppercase text-success">
							Ingresos
						</span>
					</h3>

					<div id="income__inputs">
						<div
							id="income--1"
							class="row g-3 px-3 mb-3"
						>
							<div class="col-md-4">
								<label
									for="income__date--1"
									class="form-label"
								>
									Fecha
								</label>
								<input
									id="income__date--1"
									name="income_date[]"
									type="date"
									class="form-control"
								/>
							</div>

							<div class="col-md-4">
								<label
									for="income__description--1"
									class="form-label"
								>
									Descripción
								</label>
								<input
									id="income__description--1"
									name="income_description[]"
									type="text"
									class="form-control"
								/>
							</div>

							<div class="col-md-4">
								<label
									for="income__amount--1"
									class="form-label"
								>
									Cantidad
								</label>
								<input
									id="income__amount--1"
									name="income_amount[]"
									type="number"
									step=".01"
									class="form-control"
								/>
							</div>
						</div>
					</div>

					<div class="text-center row mt-4 d-flex justify-content-evenly">
						<div class="col-md-5 mb-3">
							<button
								id="income__add"
								class="w-100 btn btn-success"
								type="button"
							>
								Añadir ingreso
							</button>
						</div>
					</div>
				</div>

				<div id="expense">
					<h3 class="between-lines">
						<span class="between-lines__text text-uppercase text-danger">
							Gastos
						</span>
					</h3>

					<div id="expense__inputs">
						<div
							id="expense--1"
							class="row g-3 px-3 mb-3"
						>
							<div class="col-md-4">
								<label
									for="expense__date--1"
									class="form-label"
								>
									Fecha
								</label>
								<input
									id="expense__date--1"
									name="expense_date[]"
									type="date"
									class="form-control"
								/>
							</div>

							<div class="col-md-4">
								<label
									for="expense__description--1"
									class="form-label"
								>
									Descripción
								</label>
								<input
									id="expense__description--1"
									name="expense_description[]"
									type="text"
									class="form-control"
								/>
							</div>

							<div class="col-md-4">
								<label
									for="expense__amount--1"
									class="form-label"
								>
									Cantidad
								</label>
								<input
									id="expense__amount--1"
									name="expense_amount[]"
									type="number"
									step=".01"
									class="form-control"
								/>
							</div>
						</div>
					</div>

					<div class="text-center row mt-4 d-flex justify-content-evenly">
						<div class="col-md-5 mb-3">
							<button
								id="expense__add"
								class="w-100 btn btn-success"
								type="button"
							>
								Añadir gasto
							</button>
						</div>
					</div>
				</div>

				<hr />

				<div
					id="form__buttons"
					class="mt-4 pb-3 text-center"
				>
					<button
						id="reset__button"
						class="btn btn-secondary me-3"
						type="button"
					>
						Restablecer
					</button>

					<button
						class="btn btn-primary"
						name="submit"
						value="submit"
						type="submit"
					>
						Generar
					</button>
				</div>
			</form>
		</main>

		<?php include "{$relative}/common/footer.html" ?>
	</div>

	<?php include "{$relative}/common/scripts.php" ?>
	<script src="./js/4.js"></script>
</body>

</html>
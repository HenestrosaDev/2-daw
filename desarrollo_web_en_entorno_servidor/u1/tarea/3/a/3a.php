<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='es'>

<head>
	<title>Unidad 1 | Ejercicio 1: 3a</title>
	<?php
	require_once("../../php/get_relative.php");
	$relative = get_relative(__FILE__);
	include $relative . "/common/head.php";
	?>
</head>

<body>
	<?php include $relative . "/common/sidenav.php"; ?>

	<main 
		id="main" 
		class="main"
	>
		<header class="header">
			<h1>Introduce usuario</h1>
			<h3>Rellene los campos y pulse <strong>Enviar</strong></h3>
		</header>

		<form 
			id="form" 
			action="./usuario.php" 
			method="post"
		>
			<div class="form__columns">
				<input 
					class="form__item" 
					type="text" 
					name="fullName" 
					placeholder="Nombre y apellidos*" 
					required
				>
				<input 
					class="form__item" 
					type="email" 
					name="email" 
					placeholder="Correo electrónico*" 
					required
				>
				<input 
					class="form__item" 
					type="tel" 
					name="phone" 
					placeholder="Teléfono" 
					title="El número tiene que tener 9 dígitos" 
					pattern="[0-9]{9}"
					oninput="check(this)" 
				>
				<input 
					class="form__item" 
					type="url" 
					name="web" 
					placeholder="Sitio web personal"
				>
			</div>
			
			<textarea 
				rows="4" 
				cols="100" 
				name="comment" 
				placeholder="Escribe tu comentario aquí*" 
				required
			></textarea>
			
			<button 
				class="form__btn form__btn--submit" 
				name="submit" 
				value="submit" 
				type="submit"
			>
				Enviar
			</button>
		</form>
	</main>

	<?php include $relative . "/common/footer.html"; ?>
	<?php include $relative . "/common/floating-buttons.html"; ?>
</body>

</html>
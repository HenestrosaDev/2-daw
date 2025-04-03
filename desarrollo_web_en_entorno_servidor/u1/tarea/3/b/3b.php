<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='es'>

<head>
	<title>Unidad 1 | Ejercicio 1: 3b</title>
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
			<h1>Validación de usuarios</h1>
			<h3>Rellene los campos y pulse <strong>Enviar</strong></h3>
		</header>

		<form 
			id="form" 
			action="./cv.php" 
			method="post"
		>
			<div class="form__columns">
				<input 
					name="fullName" 
					class="form__item" 
					type="text" 
					placeholder="Nombre y apellidos*" 
					required
				>
				<input 
					name="email" 
					class="form__item" 
					type="email" 
					placeholder="Correo electrónico*" 
					required
				>
				<input 
					name="phone" 
					class="form__item" 
					type="tel" 
					placeholder="Teléfono" 
					pattern="[0-9]{9}"
					oninput="check(this)" 
				>
				<input 
					name="city" 
					class="form__item" 
					type="text" 
					placeholder="Pueblo/ciudad*" 
					required
				>
			</div>

			<textarea 
				name="about" 
				rows="4" 
				cols="100" 
				placeholder="Habla un poco sobre ti…*" 
				required
			></textarea>

			<div class="form__columns">
				<div class="form__column">
					<div class="form__btn-container">
						<button 
							type="button" 
							class="form__btn form__btn--modifier form__btn--modifier-add" 
							onclick="addTextField('#languages-amount', 'Idioma', 'language', 'language_', '#generated-language')"
						>
							+
						</button>
						<button 
							type="button" 
							class="form__btn form__btn--modifier form__btn--modifier-remove" 
							onclick="removeTextField('#languages-amount', '#language_')"
						>
							−
						</button>
					</div>

					<input 
						name="language1" 
						class="form__item" 
						type="text" 
						placeholder="Idioma*" 
						required
					>
					
					<div id="generated-language"></div>

					<input 
						id="languages-amount"
						name="languagesAmount" 
						type="hidden" 
						value="1" 
					>
				</div>

				<div class="form__column">
					<div class="form__btn-container">
						<button 
							type="button" 
							class="form__btn form__btn--modifier form__btn--modifier-add" 
							onclick="addTextField('#education-amount', 'Formación', 'education', 'education_', '#generated-education')"
						>
							+
						</button>
						<button 
							type="button" 
							class="form__btn form__btn--modifier form__btn--modifier-remove" 
							onclick="removeTextField('#education-amount', '#education_')"
						>
							−
						</button>
					</div>

					<input 
						name="education1" 
						class="form__item" 
						type="text" 
						placeholder="Formación*" 
						required
					>

					<div id="generated-education"></div>

					<input 	
						id="education-amount"
						name="educationAmount" 
						type="hidden" 
						value="1" 
					>
				</div>
			</div>

			<textarea 
				name="experience" 
				rows="4" 
				cols="100" 
				placeholder="Habla un poco sobre tu experiencia…*" 
				required
			></textarea>
			
			<button 
				name="submit" 
				class="form__btn form__btn--submit" 
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
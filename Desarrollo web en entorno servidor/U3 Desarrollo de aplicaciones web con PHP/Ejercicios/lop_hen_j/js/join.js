$("#sign_up__submit--visible").on("click", () => {
	const isUsernameEmpty = $("#sign_up__username").val() == "";
	const isUsernamePattern = /^[\w-]*$/.test($("#sign_up__username").val());
	const isUsernameTooLong = $("#sign_up__username").val().length > 20;

	const isPasswordEmpty = $("#sign_up__password").val() == "";
	const isPasswordValEmpty = $("#sign_up__password--val").val() == "";
	const arePasswordsEqual = $("#sign_up__password").val() === $("#sign_up__password--val").val();

	const isUsernameValid = !isUsernameEmpty && isUsernamePattern && !isUsernameTooLong;
	const arePasswordsValid = !isPasswordEmpty && !isPasswordValEmpty && arePasswordsEqual;

	if (isUsernameValid && arePasswordsValid) {
		$("#sign_up__submit--invisible").click();
	} else {		
		if (isUsernameEmpty || !isUsernamePattern || isUsernameTooLong) {
			$("#sign_up__username").addClass("is-invalid");
			
			if (isUsernameEmpty) {
				$("#username__feedback").text("El campo no puede estar vacío.");
			} else if (!isUsernamePattern) {
				$("#username__feedback").text("El campo solo puede contener letras, números, '-' y '_'");
			} else if (isUsernameTooLong) {
				$("#username__feedback").text("El campo tiene que tener menos de 20 caracteres.");
			}
		} else {
			// Nombre de usuario válido
			$("#sign_up__username").removeClass("is-invalid");
		} 

		if (isPasswordEmpty || isPasswordValEmpty) {		
			if (isPasswordEmpty) {
				$("#sign_up__password").addClass("is-invalid");
			} else {
				$("#sign_up__password").removeClass("is-invalid");
			}
		
			if (isPasswordValEmpty) {
				$("#sign_up__password--val").addClass("is-invalid");
				$("#password__feedback--val").text("La contraseña no puede estar vacía");
			} else {
				$("#sign_up__password--val").removeClass("is-invalid");
			}
		/** 
		 * Se separa 'arePasswordsEqual' en la comprobación 
		 * porque si dos contraseñas están vacías, se considera
		 * que sus valores son los mismos.
		 */
		} else if (!arePasswordsEqual) {
			$("#sign_up__password").addClass("is-invalid");
			$("#password__feedback").addClass("d-none");
			$("#sign_up__password--val").addClass("is-invalid");
			$("#password__feedback--val").text("Las contraseñas no coinciden");
		} else {
			// Las contraseñas son válidas
			$("#sign_up__password").removeClass("is-invalid");
			$("#password__feedback").removeClass("d-none");
			$("#sign_up__password--val").removeClass("is-invalid");
		}
	}
}); 
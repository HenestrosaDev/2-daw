<?php if (!empty($e_invalid_username) || !empty($e_user_exists) || !empty($e_empty_password)) { ?>
	<script>
		document.getElementById('button--sign_up').click();
	</script>
<?php } else if (!empty($e_login_empty_field) || !empty($e_username_not_match) || !empty($e_password_not_match) || !empty($e_inactive_user)) { ?>
	<script>
		document.getElementById('button--login').click();
	</script>
<?php } ?>
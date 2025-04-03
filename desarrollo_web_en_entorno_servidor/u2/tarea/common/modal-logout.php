<?php
if (isset($_POST["logout_submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
	require_once("{$relative}/php/close_session.php");
	close_session();
}
?>

<div
	class="modal fade"
	id="logout__modal"
	tabindex="-1"
	aria-labelledby="logout__title"
	aria-hidden="true"
>
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5
					class="modal-title"
					id="logout__title"
				>
					Cerrar sesión
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
					<p>¿Estás seguro?</p>
				</div>
				
				<div class="modal-footer">
					<button
						type="button"
						class="btn btn-secondary"
						data-bs-dismiss="modal"
					>
						No
					</button>

					<button
						type="submit"
						name="logout_submit"
						value="logout_submit"
						class="btn btn-primary"
					>
						Sí
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

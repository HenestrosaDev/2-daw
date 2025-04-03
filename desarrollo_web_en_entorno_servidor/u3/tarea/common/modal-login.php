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
					Iniciar sesión
				</h5>
				<button 
					type="button" 
					class="btn-close" 
					data-bs-dismiss="modal" 
					aria-label="Close"
				></button>
			</div>

			<form 
				method="post" 
				action="<?= $relative ?>/php/login.php"
			>
				<div class="modal-body">
					<div class="form-floating">
						<input 
							id="login__username" 
							name="login_username" 
							type="text" 
							class="form-control" 
							maxlength="20" 
							required
						>
						<label for="login__username">Nombre de usuario</label>
					</div>

					<div class="form-floating">
						<input 
							id="login__password" 
							name="login_password" 
							type="password" 
							class="form-control" 
							required
						>
						<label for="login__password">Contraseña</label>
					</div>

					<?php if (!empty($_SESSION["login_exception"])) { ?>
						<div 
							class="alert alert-danger text-center text-break" 
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
								<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
							</svg>
							<?= $_SESSION["login_exception"] ?>
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
						type="submit" 
						name="login_submit" 
						value="<?= $_SESSION["redirect_from_php"] ?>" 
						class="btn btn-primary"
					>
						Iniciar
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
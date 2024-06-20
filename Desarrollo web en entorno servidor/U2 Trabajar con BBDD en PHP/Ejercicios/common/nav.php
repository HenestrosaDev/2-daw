<?php
function load_page($folder) {
	$user_page = "/{$folder}/user.php";
	if (!isset($_SESSION["user_role"])) {
		return $user_page;
	} else {
		return ($_SESSION["user_role"] == 'A' ? "/{$folder}/admin.php" : $user_page);
	}
}
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-2">
	<div class="container-fluid">
		<a 
			class="navbar-brand" 
			href="<?= $relative . "/index.php" ?>"
		>
			Unidad 2 | Ejercicios
		</a>

		<button 
			class="navbar-toggler" 
			type="button" 
			data-bs-toggle="collapse" 
			data-bs-target="#navbarCollapse" 
			aria-controls="navbarCollapse" 
			aria-expanded="false" 
			aria-label="Toggle navigation"
		>
			<span class="navbar-toggler-icon"></span>
		</button>

		<div 
			id="navbarCollapse"
			class="collapse navbar-collapse" 
		>
			<ul class="navbar-nav me-auto mb-2 mb-md-0">
				<li class="nav-item">
					<a 
						class="nav-link <?= (!empty($active) && $active == 1) ? "active" : "" ?>" 
						href="<?= $relative . load_page("1_test") ?>"
					>
						Test
					</a>
				</li>

				<li class="nav-item">
					<a 
						class="nav-link <?= (!empty($active) && $active == 2) ? "active" : "" ?>" 
						href="<?= $relative . load_page("2_reservas") ?>"
					>
						Reserva de coches
					</a>
				</li>

				<li class="nav-item">
					<a 
						class="nav-link <?= (!empty($active) && $active == 3) ? "active" : "" ?>" 
						href="<?= $relative . load_page("3_pizzeria") ?>"
					>
						Pizzería
					</a>
				</li>
			</ul>

			<ul class="navbar-nav">
				<?php if (!empty($showCart)) { ?>
					<li class="nav-item dropdown">
						<button 
							id="cart" 
							class="btn btn-secondary dropdown-toggle" 
							data-bs-toggle="dropdown" 
							type="button" 
							aria-expanded="false"
						> 
							<span class="bi-cart"></span> 
							7 - Items
						</button>

						<ul 
							class="dropdown-menu dropdown-menu-end dropdown-cart" 
							aria-labelledby="cart"
						>
							<li>
								<span class="item">
									<span class="item-left">
										<img 
											src="http://lorempixel.com/50/50/" 
											alt="" 
										/>
										<span class="item-info">
											<span>Item name</span>
											<span>23$</span>
										</span>
									</span>

									<span class="item-right">
										<button class="btn btn-sm btn-close float-right"></button>
									</span>
								</span>
							</li>

							<li>
								<span class="item">
									<span class="item-left">
										<img 
											src="http://lorempixel.com/50/50/" 
											alt="" 
										/>
										<span class="item-info">
											<span>Item name</span>
											<span>23$</span>
										</span>
									</span>

									<span class="item-right">
										<button class="btn btn-sm btn-close float-right"></button>
									</span>
								</span>
							</li>

							<li>
								<span class="item">
									<span class="item-left">
										<img 
											src="http://lorempixel.com/50/50/" 
											alt="" 
										/>
										<span class="item-info">
											<span>Item name</span>
											<span>23$</span>
										</span>
									</span>

									<span class="item-right">
										<button class="btn btn-sm btn-close float-right"></button>
									</span>
								</span>
							</li>

							<li>
								<span class="item">
									<span class="item-left">
										<img 
											src="http://lorempixel.com/50/50/" 
											alt="" 
										/>
										<span class="item-info">
											<span>Item name</span>
											<span>23$</span>
										</span>
									</span>

									<span class="item-right">
										<button class="btn btn-sm btn-close float-right"></button>
									</span>
								</span>
							</li>

							<li>
								<hr class="dropdown-divider">
							</li>

							<li>
								<a 
									class="dropdown-item text-center" 
									href=""
								>
									Confirmar pedido
								</a>
							</li>
						</ul>
					</li>
				<?php } ?>

				<?php if (!empty($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"] == true) { ?>
					<li class="nav-item">
						<button 
							type="button" 
							class="btn <?= (($_SESSION["user_role"] === 'U') ? "btn-outline-light" : "btn-outline-warning") ?>" 
							style="opacity: 1 !important;" 
							disabled
						>
							Registrado como: <?= $_SESSION["username"] ?>
						</button>
					</li>

					<li class="nav-item">
						<a 
							id="button--logout" 
							type="button" 
							class="btn btn-danger" 
							data-bs-toggle="modal" 
							data-bs-target="#logout__modal"
						>
							Cerrar sesión
						</a>
					</li>
				<?php } else { ?>
					<li class="nav-item">
						<a 
							id="button--sign_up" 
							type="button" 
							class="btn btn-primary btn-success" 
							data-bs-toggle="modal" 
							data-bs-target="#sign_up__modal"
						>
							Regístrate
						</a>
					</li>

					<li class="nav-item">
						<a 
							id="button--login" 
							type="button" 
							class="btn btn-primary" 
							data-bs-toggle="modal" 
							data-bs-target="#login__modal"
						>
							Iniciar sesión
						</a>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
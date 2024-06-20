<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	<div class="container-fluid">
		<a 
			class="navbar-brand" 
			href="<?= $relative . "/index.php" ?>"
		>
			Unidad 3 | Ejercicios
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
				<li class="nav-item dropdown">
					<a 
						id="nav__item--1" 
						class="nav-link dropdown-toggle <?= (!empty($active) && $active == 1) ? "active" : "" ?>" 
						data-bs-toggle="dropdown" 
						aria-expanded="false"
					>
						1
					</a>
					<ul 
						class="dropdown-menu" 
						aria-labelledby="nav__item--1"
					>
						<li>
							<a 
								class="dropdown-item" 
								href="<?= $relative . "/1/a/1a.php" ?>"
							>
								a
							</a>
						</li>
						<li>
							<a 
								class="dropdown-item" 
								href="<?= $relative . "/1/b/1b.php" ?>"
							>
								b
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item">
					<a 
						class="nav-link <?= (!empty($active) && $active == 2) ? "active" : "" ?>" 
						href="<?= $relative . "/2/2.php" ?>"
					>
						2
					</a>
				</li>

				<li class="nav-item">
					<a 
						class="nav-link <?= (!empty($active) && $active == 3) ? "active" : "" ?>" 
						href="<?= $relative . "/3/3.php" ?>"
					>
						3
					</a>
				</li>

				<li class="nav-item">
					<a 
						class="nav-link <?= (!empty($active) && $active == 4) ? "active" : "" ?>" 
						href="<?= $relative . "/4/4.php" ?>"
					>
						4
					</a>
				</li>

				<li class="nav-item">
					<a 
					class="nav-link <?= (!empty($active) && $active == 5) ? "active" : "" ?>" 
					href="<?= $relative . "/5/admin.php" ?>"
					>
						5
					</a>
				</li>
			</ul>

			<ul class="navbar-nav">
				<?php if (!empty($show_cart)) { ?>
					<li class="nav-item dropdown">
						<button 
							id="cart" 
							class="btn btn-secondary dropdown-toggle me-2 position-relative" 
							data-bs-toggle="dropdown" 
							type="button" 
							aria-expanded="false"
						>
							<span class="bi-cart"></span>
							<span 
								id="cart__number" 
								class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger d-none"
							>
								7
								<span class="visually-hidden">productos en el carro</span>
							</span>
						</button>

						<ul 
							id="cart__list" 
							class="dropdown-menu dropdown-menu-end dropdown-cart" 
							aria-labelledby="cart"
						>
							<li>
								<a 
									id="cart__confirm" 
									class="dropdown-item text-center d-none"
								>
									Confirmar pedido
								</a>
							</li>
							
							<li>
								<a 
									id="cart__empty" 
									class="dropdown-item text-center" 
									href=""
								>
									La cesta está vacía
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
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
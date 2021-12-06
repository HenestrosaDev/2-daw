<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
	<div class="container-fluid">
		<a class="navbar-brand" href="#">Unidad 2 | Ejercicios</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav me-auto mb-2 mb-md-0">
				<li class="nav-item">
					<a class="nav-link <?= $active == 1 ? "active" : "" ?>" href="<?= $relative ?>/1_test/user.php">Test</a> <!-- class="nav-link active" -->
				</li>
				<li class="nav-item">
					<a class="nav-link <?= $active == 2 ? "active" : "" ?>" href="<?= $relative ?>/2_reservas/user.php">Reserva de coches</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= $active == 3 ? "active" : "" ?>" href="<?= $relative ?>/3_pizzeria/user.php">Pizzería</a>
				</li>
			</ul>
			<ul class="navbar-nav">
				
				<?php if (isset($showCart)) { ?>
				<li class="nav-item dropdown">
					<button class="btn btn-secondary dropdown-toggle" id="cart" data-bs-toggle="dropdown" type="button" aria-expanded="false"> <span class="bi-cart"></span> 7 - Items</button>
					<ul class="dropdown-menu dropdown-menu-end dropdown-cart" aria-labelledby="cart">
						<li>
							<span class="item">
								<span class="item-left">
									<img src="http://lorempixel.com/50/50/" alt="" />
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
									<img src="http://lorempixel.com/50/50/" alt="" />
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
									<img src="http://lorempixel.com/50/50/" alt="" />
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
									<img src="http://lorempixel.com/50/50/" alt="" />
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
						<li><a class="dropdown-item text-center" href="">Confirmar pedido</a></li>
					</ul>
				</li>
				<?php } ?>

				<li class="nav-item">
					<a type="button" id="button--sign-up" class="btn btn-primary btn-success" data-bs-toggle="modal" data-bs-target="#sign-up__modal">Regístrate</a>
				</li>
				<li class="nav-item">
					<a type="button" id="button--login" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login__modal">Iniciar sesión</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
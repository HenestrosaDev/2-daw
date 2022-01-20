<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-2">
	<div class="container-fluid">
		<a class="navbar-brand" href="<?= $relative . "/index.php" ?>">Unidad 2 | Ejercicios</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav me-auto mb-2 mb-md-0">
				<li class="nav-item dropdown">
					<a id="nav__item--1" class="nav-link dropdown-toggle <?= (!empty($active) && $active == 1) ? "active" : "" ?>" data-bs-toggle="dropdown" aria-expanded="false">
						1
					</a>
					<ul class="dropdown-menu" aria-labelledby="nav__item--1">
						<li><a class="dropdown-item" href="<?= $relative . "/1/a/1a.php" ?>">a</a></li>
						<li><a class="dropdown-item" href="<?= $relative . "/1/b/1b.php" ?>">b</a></li>
					</ul>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= (!empty($active) && $active == 2) ? "active" : "" ?>" href="<?= $relative . "2/2.php" ?>">
						2
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= (!empty($active) && $active == 3) ? "active" : "" ?>" href="<?= $relative . "3/3.php" ?>">
						3
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= (!empty($active) && $active == 4) ? "active" : "" ?>" href="<?= $relative . "4/4.php" ?>">
						4
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= (!empty($active) && $active == 5) ? "active" : "" ?>" href="<?= $relative . "5/5.php" ?>">
						5
					</a>
				</li>
			</ul>
			<ul class="navbar-nav">

				<?php if (!empty($showCart)) { ?>
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
			</ul>
		</div>
	</div>
</nav>
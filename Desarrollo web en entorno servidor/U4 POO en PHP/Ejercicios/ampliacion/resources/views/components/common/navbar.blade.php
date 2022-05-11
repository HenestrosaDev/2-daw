<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<div class="container">
		<a 
			class="navbar-brand" 
			href="{{ route('index') }}">
			Occidental Image
		</a>
		<button 
			class="navbar-toggler" 
			type="button" 
			data-bs-toggle="collapse" 
			data-bs-target="#navbarColor01" 
			aria-controls="navbarColor01" 
			aria-expanded="false" 
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div
			id="navbarColor01" 
			class="collapse navbar-collapse">
			<ul class="navbar-nav ms-auto">
				@guest
					<li class="nav-item me-2">
						<a 
							href="{{ route('login') }}" 
							type="button" 
							class="btn btn-light">
							Iniciar sesión
						</a>
					</li>
					<li class="nav-item">
						<a 
							href="{{ route('register') }}" 
							type="button" 
							class="btn btn-secondary">
							Registrarse
						</a>
					</li>
				@else
					<li class="nav-item dropdown">
						<a 
							class="nav-link dropdown-toggle" 
							data-bs-toggle="dropdown" 
							href="#" 
							role="button" 
							aria-haspopup="true" 
							aria-expanded="false">
							{{ Auth::user()->name }}
						</a>
						<div class="dropdown-menu">
							@if (Auth::user()->role_id == 1)
								<a 
									class="dropdown-item" 
									href="{{ route('ticket.index') }}">
									Ver entradas
								</a>
								<a 
									class="dropdown-item" 
									href="{{ route('film.create') }}">
									Añadir película
								</a>
								<div class="dropdown-divider"></div>
							@endif
							<form 
								method="POST" 
								action="{{ route('logout') }}">
								@csrf
								<a 
									onclick="event.preventDefault();this.closest('form').submit();"
									href="route('logout')" 
									class="dropdown-item">
									Cerrar sesión
								</a>
							</form>
						</div>
					</li>
				@endauth
      </ul>
		</div>
	</div>
</nav>
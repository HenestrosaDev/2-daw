<x-common.app page-title="Recuperar contraseña">
	<x-auth.auth-card title="Recuperar contraseña">

		<div class="mb-4 text-sm text-gray-600">
			¿Olvidaste la contraseña? No hay problema. Introduce tu dirección de email para que podamos enviarte un correo que contendrá un enlace en el que podrás restablecer la contraseña.
		</div>

		<!-- Session Status -->
		<x-auth.auth-session-status class="mb-4" :status="session('status')" />

		<!-- Validation Errors -->
		<x-auth.auth-validation-errors class="mb-4" :errors="$errors" />

		<form method="POST" action="{{ route('password.email') }}">
			@csrf

			<!-- Email Address -->
			<div class="input-group">
				<x-auth.icon class="bi-envelope-fill" />
				<x-auth.input 
					id="email" 
					type="email" 
					placeholder="Email"
					name="email" 
					:value="old('email')" 
					required />
			</div>

			<div class="d-flex align-center justify-content-end mt-4">
				<x-auth.button>
					Mandar enlace al email
				</x-auth.button>
			</div>
		</form>
	</x-auth.auth-card>
</x-common.app>

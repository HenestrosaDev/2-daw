<x-common.app page-title="Registro">
	<x-auth.auth-card title="Registro">
		<!-- Validation Errors -->
		<x-auth.auth-validation-errors 
			class="mb-4" 
			:errors="$errors" 
		/>

		<!-- Credentials -->
		<x-common.alert class="alert-secondary">
			<h4 class="alert-heading">Credenciales</h4>
			<p class="mb-0">admin@admin.com / 123456789</p>
			<p class="mb-0">user@user.com / 123456789</p>
		</x-common.alert>

		<form 
			method="POST" 
			action="{{ route('register') }}"
		>
			@csrf

			<!-- Name -->
			<div class="my-3 input-group">
				<x-auth.icon class="bi-person-fill" />
				<x-auth.input 
					id="name" 
					type="text" 
					name="name"
					placeholder="Nombre de usuario" 
					:value="old('name')" 
					required 
					autofocus 
				/>
			</div>

			<!-- Email Address -->
			<div class="mb-3 input-group">
				<x-auth.icon class="bi-envelope-fill" />
				<x-auth.input 
					id="email" 
					type="email" 
					placeholder="Email"
					name="email" 
					:value="old('email')" 
					required 
				/>
			</div>

			<!-- Password -->
			<div class="mb-3 input-group">
				<x-auth.icon class="bi-lock-fill" />
				<x-auth.input 
					id="password" 
					type="password"
					placeholder="Contraseña"
					name="password"
					required 
					autocomplete="new-password" 
				/>
			</div>

			<!-- Confirm Password -->
			<div class="mb-3 input-group">
				<x-auth.icon class="bi-lock-fill" />
				<x-auth.input 
					id="password_confirmation" 
					type="password"
					placeholder="Confirmar contraseña"
					name="password_confirmation" 
					required 
				/>
			</div>

			<!-- Button -->
			<div class="mt-4 mb-3 text-center">
				<x-auth.button class="col-12">
					Registrarse
				</x-auth.button>
			</div>
		</form>

		<div class="text-center">
			<p class="divider-text">
				<span class="bg-primary">O</span>
			</p>
			<a href="{{ route('login') }}">¿Ya tienes cuenta?</a>
		</div>
	</x-auth.auth-card>
</x-common.app>

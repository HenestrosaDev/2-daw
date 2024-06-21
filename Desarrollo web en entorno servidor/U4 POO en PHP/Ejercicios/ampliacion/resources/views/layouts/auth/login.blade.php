<x-common.app page-title="Iniciar sesión">
	<x-auth.auth-card title="Iniciar sesión">
		<!-- Session Status -->
		<x-auth.auth-session-status 
			class="mb-4" 
			:status="session('status')" 
		/>

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
			action="{{ route('login') }}"
		>
			@csrf

			<!-- Email Address -->
			<div class="my-3 input-group">
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
					autocomplete="current-password" 
				/>
			</div>

			<!-- Remember Me -->
			<div class="form-check">
				<input 
					id="remember_me" 
					type="checkbox" 
					class="form-check-input me-2"
					name="remember"
				>
				<label 
					class="form-check-label" 
					for="remember_me"
				>
					Recuérdame
				</label>
			</div>

			<div class="d-flex justify-content-around mt-3">
				@if (Route::has('password.request'))
					<a 
						class="text-decoration-underline my-auto text-info" 
						href="{{ route('password.request') }}"
					>
						¿Olvidaste tu contraseña?
					</a>
				@endif

				<x-auth.button>
					Iniciar sesión
				</x-auth.button>
			</div>
		</form>
	</x-auth.auth-card>
</x-common.app>

<x-common.app page-title="Confirmar contraseña">
	<x-auth.auth-card title="Confirmar contraseña">

		<div class="mb-4 text-sm text-gray-600">
			{{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
		</div>

		<!-- Validation Errors -->
		<x-auth.auth-validation-errors class="mb-4" :errors="$errors" />

		<form method="POST" action="{{ route('password.confirm') }}">
			@csrf

			<!-- Password -->
			<div>
				<x-auth.icon for="password" :value="__('Password')" />
				<x-auth.input 
					id="password" 
					class="block mt-1 w-full"
					type="password"
					name="password"
					required 
					autocomplete="current-password" />
			</div>

			<div class="flex justify-end mt-4">
				<x-auth.button>
					{{ __('Confirm') }}
				</x-auth.button>
			</div>
		</form>
	</x-auth.auth-card>
</x-common.app>

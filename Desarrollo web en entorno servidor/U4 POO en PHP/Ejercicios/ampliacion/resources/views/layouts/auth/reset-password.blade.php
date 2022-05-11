<x-common.app page-title="Resetear contraseña">
	<x-auth.auth-card title="Resetear contraseña">

		<!-- Validation Errors -->
		<x-auth.auth-validation-errors class="mb-4" :errors="$errors" />

		<form method="POST" action="{{ route('password.update') }}">
			@csrf

			<!-- Password Reset Token -->
			<input type="hidden" name="token" value="{{ $request->route('token') }}">

			<!-- Email Address -->
			<div>
				<x-auth.icon for="email" :value="__('Email')" />
				<x-auth.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
			</div>

			<!-- Password -->
			<div class="mt-4">
				<x-auth.icon for="password" :value="__('Password')" />
				<x-auth.input id="password" class="block mt-1 w-full" type="password" name="password" required />
			</div>

			<!-- Confirm Password -->
			<div class="mt-4">
				<x-auth.icon for="password_confirmation" :value="__('Confirm Password')" />
				<x-auth.input 
					id="password_confirmation" 
					class="block mt-1 w-full"
					type="password"
					name="password_confirmation" 
					required />
			</div>

			<div class="flex items-center justify-end mt-4">
				<x-auth.button>
					{{ __('Reset Password') }}
				</x-auth.button>
			</div>
		</form>
	</x-auth.auth-card>
</x-common.app>

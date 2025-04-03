<x-guest-layout>
	<!-- Session Status -->
	<x-auth-session-status
		class="mb-4"
		:status="session('status')"
	/>

	<form
		method="POST"
		action="{{ route('login') }}"
	>
		@csrf

		<!-- Email Address -->
		<div>
			<x-input-label
				for="email"
				:value="__('Email')"
			/>

			<x-text-input
				id="email"
				class="mt-1 block w-full"
				name="email"
				type="email"
				:value="old('email')"
				required
				autofocus
				autocomplete="username"
			/>
			
			<x-input-error
				class="mt-2"
				:messages="$errors->get('email')"
			/>
		</div>

		<!-- Password -->
		<div class="mt-4">
			<x-input-label
				for="password"
				:value="__('Password')"
			/>

			<x-text-input
				id="password"
				class="mt-1 block w-full"
				name="password"
				type="password"
				required
				autocomplete="current-password"
			/>

			<x-input-error
				class="mt-2"
				:messages="$errors->get('password')"
			/>
		</div>

		<!-- Remember Me -->
		<div class="mt-4 block">
			<label
				class="inline-flex items-center"
				for="remember_me"
			>
				<input
					id="remember_me"
					class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
					name="remember"
					type="checkbox"
				>
				<span class="ms-2 text-sm text-gray-600">
					{{ __('Remember me') }}
				</span>
			</label>
		</div>

		<div class="mt-4 flex items-center justify-end">
			@if (Route::has('password.request'))
				<a
					class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
					href="{{ route('password.request') }}"
				>
					{{ __('Forgot your password?') }}
				</a>
			@endif

			<x-primary-button class="ms-3">
				{{ __('Log in') }}
			</x-primary-button>
		</div>
	</form>
</x-guest-layout>

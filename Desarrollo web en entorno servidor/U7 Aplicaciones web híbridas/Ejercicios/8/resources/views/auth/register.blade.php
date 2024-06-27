<x-guest-layout>
	<form
		method="POST"
		action="{{ route('register') }}"
	>
		@csrf

		<!-- Name -->
		<div>
			<x-input-label
				for="nombre"
				:value="__('Name')"
			/>

			<x-text-input
				id="nombre"
				class="mt-1 block w-full"
				type="text"
				name="nombre"
				:value="old('nombre')"
				required
				autofocus
				autocomplete="name"
			/>

			<x-input-error
				:messages="$errors->get('nombre')"
				class="mt-2"
			/>
		</div>

		<!-- Last Name 1 -->
		<div class="mt-4">
			<x-input-label
				for="apellido1"
				:value="__('Primer Apellido')"
			/>

			<x-text-input
				id="apellido1"
				class="mt-1 block w-full"
				type="text"
				name="apellido1"
				:value="old('apellido1')"
				required
			/>

			<x-input-error
				:messages="$errors->get('apellido1')"
				class="mt-2"
			/>
		</div>

		<!-- Last Name 2 -->
		<div class="mt-4">
			<x-input-label
				for="apellido2"
				:value="__('Segundo Apellido')"
			/>

			<x-text-input
				id="apellido2"
				class="mt-1 block w-full"
				type="text"
				name="apellido2"
				:value="old('apellido2')"
				required
			/>

			<x-input-error
				:messages="$errors->get('apellido2')"
				class="mt-2"
			/>
		</div>

		<!-- Email Address -->
		<div class="mt-4">
			<x-input-label
				for="email"
				:value="__('Email')"
			/>

			<x-text-input
				id="email"
				class="mt-1 block w-full"
				type="email"
				name="email"
				:value="old('email')"
				required
				autocomplete="username"
			/>

			<x-input-error
				:messages="$errors->get('email')"
				class="mt-2"
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
				type="password"
				name="password"
				required
				autocomplete="new-password"
			/>

			<x-input-error
				:messages="$errors->get('password')"
				class="mt-2"
			/>
		</div>

		<!-- Confirm Password -->
		<div class="mt-4">
			<x-input-label
				for="password_confirmation"
				:value="__('Confirm Password')"
			/>

			<x-text-input
				id="password_confirmation"
				name="password_confirmation"
				class="mt-1 block w-full"
				type="password"
				required
				autocomplete="new-password"
			/>

			<x-input-error
				:messages="$errors->get('password_confirmation')"
				class="mt-2"
			/>
		</div>

		<div class="mt-4">
			<span class="block text-sm font-medium text-gray-700">
				{{ __('Role') }}
			</span>

			<div class="mt-1">
				<label class="inline-flex items-center">
					<input
						type="radio"
						class="form-radio"
						name="role"
						value="alumno"
						checked
					>
					<span class="ml-2">Alumno</span>
				</label>

				<label class="ml-6 inline-flex items-center">
					<input
						type="radio"
						class="form-radio"
						name="role"
						value="profesor"
					>
					<span class="ml-2">Profesor</span>
				</label>
			</div>
		</div>

		<div class="mt-4 flex items-center justify-end">
			<a
				class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
				href="{{ route('login') }}"
			>
				{{ __('Already registered?') }}
			</a>

			<x-primary-button class="ms-4">
				{{ __('Register') }}
			</x-primary-button>
		</div>
	</form>
</x-guest-layout>

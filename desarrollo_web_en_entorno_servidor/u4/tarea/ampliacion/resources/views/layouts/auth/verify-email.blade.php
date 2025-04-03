<x-common.app page-title="Verificar email">
	<x-auth.auth-card title="Verificar email">
		<div class="mb-4 text-sm text-gray-600">
			{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
		</div>

		@if (session('status') == 'verification-link-sent')
			<div class="mb-4 text-sm font-medium text-green-600">
				{{ __('A new verification link has been sent to the email address you provided during registration.') }}
			</div>
		@endif

		<div class="mt-4 flex items-center justify-between">
			<form
				method="POST"
				action="{{ route('verification.send') }}"
			>
				@csrf

				<div>
					<x-auth.button>
						{{ __('Resend Verification Email') }}
					</x-auth.button>
				</div>
			</form>

			<form
				method="POST"
				action="{{ route('logout') }}"
			>
				@csrf

				<button
					type="submit"
					class="text-sm text-gray-600 underline hover:text-gray-900"
				>
					{{ __('Log Out') }}
				</button>
			</form>
		</div>
	</x-auth.auth-card>
</x-common.app>

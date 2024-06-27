<x-app-layout>
	<div class="flex h-full items-center justify-center px-4">
		<div class="mt-8 text-center">
			<h1 class="mb-4 text-4xl font-bold">Bienvenido al Informe personal de salud</h1>
			<p class="mb-6">Controla tu salud con facilidad. Calcula tu IMC y tu tasa metabólica basal.</p>
			<div>
				<a
					href="{{ route('login') }}"
					class="mr-2 rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700"
				>
					Iniciar sesión
				</a>
				<a
					href="{{ route('register') }}"
					class="rounded bg-green-500 px-4 py-2 font-bold text-white hover:bg-green-700"
				>
					Registrarse
				</a>
			</div>
		</div>
	</div>
</x-app-layout>

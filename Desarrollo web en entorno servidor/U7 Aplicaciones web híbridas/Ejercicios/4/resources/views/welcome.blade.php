<x-app-layout>
	<div class="flex justify-center items-center h-full px-4">
		<div class="text-center mt-8">
			<h1 class="text-4xl font-bold mb-4">Bienvenido al Informe personal de salud</h1>
			<p class="mb-6">Controla tu salud con facilidad. Calcula tu IMC y tu tasa metabólica basal.</p>
			<div>
				<a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
					Iniciar sesión
				</a>
				<a href="{{ route('register') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
					Registrarse
				</a>
			</div>
		</div>
	</div>
</x-app-layout>

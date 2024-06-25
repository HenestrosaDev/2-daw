<x-app-layout>
	<div class="max-w-lg mx-auto py-8 px-4 sm:px-0">
		<h1 class="text-3xl font-bold mb-4 text-center">Datos Personales</h1>

		<form
			method="POST"
			action="{{ route('health-report.calculate') }}"
			class="p-6 bg-white rounded shadow-md"
		>
			@csrf

			<div class="sm:space-y-0 space-y-3 sm:gap-4 sm:grid sm:grid-cols-2">
				<div>
					<label
						for="gender"
						class="block text-gray-700"
					>
						Género
					</label>
					<select
						id="gender"
						name="gender"
						class="block mt-1 w-full rounded border border-gray-400"
					>
						<option value="male">Hombre</option>
						<option value="female">Mujer</option>
					</select>
				</div>

				<div>
					<label
						for="age"
						class="block text-gray-700"
					>
						Edad
					</label>
					<input
						id="age"
						name="age"
						type="number"
						class="block mt-1 w-full rounded border border-gray-400"
						required
					/>
				</div>

				<div>
					<label
						for="height"
						class="block text-gray-700"
					>
						Altura (cm)
					</label>
					<input
						id="height"
						name="height"
						type="number"
						class="block mt-1 w-full rounded border border-gray-400"
						required
					/>
				</div>

				<div>
					<label
						for="weight"
						class="block text-gray-700"
					>
						Peso (kg)
					</label>
					<input
						id="weight"
						name="weight"
						type="number"
						class="block mt-1 w-full rounded border border-gray-400"
						required
					/>
				</div>
			</div>

			<button
				type="submit"
				class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full mt-7"
			>
				Calcular
			</button>
		</form>

		@if (session('report'))
			<div class="mt-10">
				<h2 class="text-3xl font-bold mb-4 text-center">Informe de Salud Personal</h2>

				<div class="p-6 rounded shadow-md bg-white">
					<p>
						<strong>IMC:</strong> {{ session('report')['bmi'] }}
					</p>
					<p>
						<strong>Tasa metabólica basal:</strong> 
						{{ session('report')['bmr'] }} kcal/day
					</p>
				</div>
			</div>
		@endif
	</div>
</x-app-layout>

<x-app-layout>
	<div class="mx-auto max-w-lg px-4 py-8 sm:px-0">
		<h1 class="mb-4 text-center text-3xl font-bold">Datos Personales</h1>

		<form
			method="POST"
			action="{{ route('health-report.calculate') }}"
			class="rounded bg-white p-6 shadow-md"
		>
			@csrf

			<div class="space-y-3 sm:grid sm:grid-cols-2 sm:gap-4 sm:space-y-0">
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
						class="mt-1 block w-full rounded border border-gray-400"
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
						class="mt-1 block w-full rounded border border-gray-400"
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
						class="mt-1 block w-full rounded border border-gray-400"
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
						class="mt-1 block w-full rounded border border-gray-400"
						required
					/>
				</div>
			</div>

			<button
				type="submit"
				class="mt-7 w-full rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700"
			>
				Calcular
			</button>
		</form>

		@if (session('report'))
			<div class="mt-10">
				<h2 class="mb-4 text-center text-3xl font-bold">Informe de Salud Personal</h2>

				<div class="rounded bg-white p-6 shadow-md">
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

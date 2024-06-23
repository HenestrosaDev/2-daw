<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@vite('resources/css/app.css')
</head>

<body class="bg-gray-50">
	<div class="max-w-lg mx-auto p-4">
		<h2 class="text-2xl font-bold mb-4">Dirección de envío</h2>
		<form action="{{ route('form.handle') }}" method="POST">
			@csrf

			<div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
				<div>
					<label 
						for="name" 
						class="block text-sm font-medium text-gray-700"
					>
						Nombre
					</label>
					<input 
						id="name"
						name="name"
						type="text" 
						class="mt-1 pl-2 h-7 block w-full border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" 
						required
					/>
					@error('name')
						<span class="text-red-500 text-sm">{{ $message }}</span>
					@enderror
				</div>

				<div>
					<label 
						for="last_name" 
						class="block text-sm font-medium text-gray-700"
					>
						Apellidos
					</label>
					<input 
						id="last_name"
						name="last_name"
						type="text" 
						class="mt-1 pl-2 h-7 block w-full border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" 
						required
					/>
					@error('last_name')
						<span class="text-red-500 text-sm">{{ $message }}</span>
					@enderror
				</div>
			</div>

			<div class="mt-4">
				<label 
					for="username" 
					class="block text-sm font-medium text-gray-700"
				>
					Nombre de usuario
				</label>
				<div class="relative mt-1 rounded-md shadow-sm">
					<span class="absolute inset-y-0 left-0 pl-2 pr-2 pb-0.5 border border-gray-300 bg-gray-200 flex items-center rounded-l text-gray-500">@</span>
					<input 
						id="username"
						name="username"
						placeholder="Nombre de usuario"
						type="text" 
						class="pl-10 block w-full h-8 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" 
						required
					/>
				</div>
				@error('username')
					<span class="text-red-500 text-sm">{{ $message }}</span>
				@enderror
			</div>

			<div class="mt-4">
				<label 
					for="email" 
					class="block text-sm font-medium text-gray-700"
				>
					Email <span class="text-gray-500">(opcional)</span>
				</label>
				<input 
					id="email"
					name="email"
					placeholder="usuario@ejemplo.com"
					type="email" 
					class="mt-1 pl-2 h-7 block w-full border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" 
				/>
				@error('email')
					<span class="text-red-500 text-sm">{{ $message }}</span>
				@enderror
			</div>

			<div class="mt-4">
				<label 
					for="address" 
					class="block text-sm font-medium text-gray-700"
				>
					Dirección
				</label>
				<input 
					id="address"
					name="address"
					type="text" 
					class="mt-1 pl-2 h-7 block w-full border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" 
					required
				/>
				@error('address')
					<span class="text-red-500 text-sm">{{ $message }}</span>
				@enderror
			</div>

			<div class="mt-4">
				<label 
					for="address2" 
					class="block text-sm font-medium text-gray-700"
				>
					Dirección 2 (opcional)
				</label>
				<input 
					id="address2"
					name="address2"
					type="text" 
					class="mt-1 pl-2 h-7 block w-full border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" 
				/>
				@error('address2')
					<span class="text-red-500 text-sm">{{ $message }}</span>
				@enderror
			</div>

			<div class="grid grid-cols-1 gap-4 sm:grid-cols-7 mt-4">
				<div class="sm:col-span-3">
					<label 
						for="country" 
						class="block text-sm font-medium text-gray-700"
					>
						País
					</label>
					<select 
						id="country"
						name="country"
						class="mt-1 h-7 text-xs block w-full border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500"
						required
					>
						<option>Escoger...</option>
						<option value="ES">España</option>
						<option value="MX">México</option>
					</select>
					@error('country')
						<span class="text-red-500 text-sm">{{ $message }}</span>
					@enderror
				</div>

				<div class="sm:col-span-2">
					<label 
						for="province" 
						class="block text-sm font-medium text-gray-700"
					>
						Provincia
					</label>
					<select 
						id="province"
						name="province"
						class="mt-1 h-7 text-xs block w-full border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500"
						required
					>
						<option>Escoger...</option>
						<option value="Almería">Almería</option>
						<option value="Málaga">Málaga</option>
						<option value="Sevilla">Sevilla</option>
						<option value="Córdoba">Córdoba</option>
						<option value="Jaén">Jaén</option>
						<option value="Granada">Granada</option>
						<option value="Huelva">Huelva</option>
						<option value="Cádiz">Cádiz</option>
					</select>
					@error('province')
						<span class="text-red-500 text-sm">{{ $message }}</span>
					@enderror
				</div>

				<div class="sm:col-span-2">
					<label 
						for="zip_code" 
						class="block text-sm font-medium text-gray-700"
					>
						Código postal
					</label>
					<input 
						id="zip_code"
						name="zip_code"
						type="text" 
						class="mt-1 pl-2 h-7 block w-full border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" 
						required
					/>
					@error('zip_code')
						<span class="text-red-500 text-sm">{{ $message }}</span>
					@enderror
				</div>
			</div>

			<hr class="my-8">

			<div class="mt-4 flex items-center">
				<input 
					id="same_address" 
					name="same_address"
					type="checkbox"
					class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" 
				/>
				<label 
					for="same_address" 
					class="ml-2 block text-sm text-gray-900"
				>
					La dirección de envío es la misma que mi dirección de facturación
				</label>
			</div>
			<div class="mt-4 flex items-center">
				<input 
					id="save_info" 
					name="save_info"
					type="checkbox"
					class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" 
				/>
				<label 
					for="save_info" 
					class="ml-2 block text-sm text-gray-900"
				>
					Guarda esta información para la próxima vez
				</label>
			</div>

			<hr class="my-5">

			<h2 class="text-2xl font-bold mb-4">Pago</h2>

			<div class="mt-4">
				<div class="flex items-center">
					<input 
						id="credit_card" 
						name="payment_method"
						value="Tarjeta de crédito"
						type="radio"
						class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500" 
						checked 
					/>
					<label 
						for="credit_card" 
						class="ml-2 block text-sm text-gray-900"
					>
						Tarjeta de crédito
					</label>
				</div>

				<div class="flex items-center mt-2">
					<input 
						id="debit_card" 
						name="payment_method" 
						value="Tarjeta de débito"
						type="radio"
						class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500" 
					/>
					<label 
						for="debit_card" 
						class="ml-2 block text-sm text-gray-900"
					>
						Tarjeta de débito
					</label>
				</div>
				
				<div class="flex items-center mt-2">
					<input 
						id="paypal" 
						name="payment_method" 
						value="PayPal"
						type="radio" 
						class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500" 
					/>
					<label 
						for="paypal" 
						class="ml-2 block text-sm text-gray-900"
					>
						PayPal
					</label>
				</div>
			</div>

			<div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
				<div>
					<label
						for="cardholder_name"
						class="block text-sm font-medium text-gray-700"
					>
						Nombre en la tarjeta
					</label>
					<input
						id="cardholder_name"
						name="cardholder_name"
						type="text"
						class="mt-1 pl-2 h-7 block w-full border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500"
						required
					/>
					<p class="mt-0.5 text-gray-500 text-[0.62rem]">Nombre completo como se muestra en la tarjeta</p>
					@error('cardholder_name')
						<span class="text-red-500 text-sm">{{ $message }}</span>
					@enderror
				</div>

				<div>
					<label
						for="credit_card_number"
						class="block text-sm font-medium text-gray-700"
					>
						Número de tarjeta de crédito
					</label>
					<input
						id="credit_card_number"
						name="credit_card_number"
						type="text"
						class="mt-1 pl-2 h-7 block w-full border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500"
						required
					/>
					@error('credit_card_number')
						<span class="text-red-500 text-sm">{{ $message }}</span>
					@enderror
				</div>
			</div>

			<div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-4">
				<div>
					<label
						for="expiration_date"
						class="block text-sm font-medium text-gray-700"
					>
						Vencimiento
					</label>
					<input
						id="expiration_date"
						name="expiration_date"
						type="text"
						class="mt-1 pl-2 h-7 block w-full border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500"
						required
					/>
					@error('expiration_date')
						<span class="text-red-500 text-sm">{{ $message }}</span>
					@enderror
				</div>

				<div>
					<label
						for="cvv"
						class="block text-sm font-medium text-gray-700"						
					>
						CVV
					</label>
					<input
						id="cvv"
						name="cvv"
						type="text"
						class="mt-1 pl-2 h-7 block w-full border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500"
						required
					/>
					@error('cvv')
						<span class="text-red-500 text-sm">{{ $message }}</span>
					@enderror
				</div>
			</div>

			<hr class="mt-7">

			<div class="mt-5">
				<button
					type="submit"
					class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
				>
					Continuar
				</button>
			</div>
		</form>
	</div>
</body>

</html>
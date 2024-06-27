<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1.0"
	/>
	<title>Datos Validados</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
	<div class="mx-auto max-w-lg p-4">
		<h2 class="mb-4 text-2xl font-bold">Datos Validados</h2>
		<div>
			<p>
				<strong>Nombre:</strong>
				{{ $validated['name'] }}
			</p>
			<p>
				<strong>Apellidos:</strong>
				{{ $validated['last_name'] }}
			</p>
			<p>
				<strong>Nombre de usuario:</strong>
				{{ $validated['username'] }}
			</p>
			<p>
				<strong>Email:</strong>
				{{ $validated['email'] ?? 'N/A' }}
			</p>
			<p>
				<strong>Dirección:</strong>
				{{ $validated['address'] }}
			</p>
			<p>
				<strong>Dirección 2:</strong>
				{{ $validated['address2'] ?? 'N/A' }}
			</p>
			<p>
				<strong>País:</strong>
				{{ $validated['country'] }}
			</p>
			<p>
				<strong>Provincia:</strong>
				{{ $validated['province'] }}
			</p>
			<p>
				<strong>Código postal:</strong>
				{{ $validated['zip_code'] }}
			</p>
			<p>
				<strong>¿Misma dirección?</strong>
				@if ($validated['same_address'] ?? null)
					Sí
				@else
					No
				@endif
			</p>
			<p>
				<strong>¿Guardar info?</strong>
				@if ($validated['save_info'] ?? null)
					Sí
				@else
					No
				@endif
			</p>
			<p>
				<strong>Método de pago:</strong>
				{{ $validated['payment_method'] }}
			</p>
			<p>
				<strong>Nombre en la tarjeta:</strong>
				{{ $validated['cardholder_name'] }}
			</p>
			<p>
				<strong>Número de tarjeta de crédito:</strong>
				{{ $validated['credit_card_number'] }}
			</p>
			<p>
				<strong>Vencimiento:</strong>
				{{ $validated['expiration_date'] }}
			</p>
			<p>
				<strong>CVV:</strong>
				{{ $validated['cvv'] }}
			</p>
		</div>
		<div class="mt-8">
			<a
				href="{{ route('form.show') }}"
				class="w-full rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
			>
				Volver al formulario
			</a>
		</div>
	</div>
</body>

</html>

@extends('layouts.app')

@section('content')
	<div class="mx-auto mb-4 max-w-2xl rounded bg-white px-8 pb-8 pt-6 shadow-md">
		<h2 class="mb-4 text-center text-3xl font-bold">Contacto</h2>

		<div class="mb-4">
			<p class="text-lg font-semibold text-gray-800">Dirección</p>
			<p class="text-gray-700">123 Store Street, City, Country</p>
		</div>

		<div class="mb-4">
			<p class="text-lg font-semibold text-gray-800">Teléfono</p>
			<p class="text-gray-700">+1234567890</p>
		</div>

		<div class="mb-4">
			<p class="text-lg font-semibold text-gray-800">Email</p>
			<p class="text-gray-700">info@videogamestore.com</p>
		</div>

		<div class="mb-4">
			<iframe
				src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d101391.5531335935!2d-122.21775102022664!3d37.425621402844165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb07b9dba1c39%3A0xe1ff55235f576cf!2sPalo%20Alto%2C%20CA%2C%20USA!5e0!3m2!1sen!2ses!4v1719319204652!5m2!1sen!2ses"
				width="600"
				height="450"
				style="border: 0"
				allowfullscreen=""
				loading="lazy"
			></iframe>
		</div>
	</div>
@endsection

<x-common.app page-title="Cartelera">
	<x-common.header>
		Cartelera
	</x-common.header>

	<main>
		@if(session('bought'))
			<x-common.alert class="alert-success">
				<p>{{ session('bought') }}</p>
			</x-common.alert>
		@endif

		<div class="row row-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mt-2">
			@foreach ($films as $film)
				<x-film.poster :film="$film"/>
			@endforeach
		</div>
	</main>
</x-common.app>
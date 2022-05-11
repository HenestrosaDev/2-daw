<div class="col">
	<div {{ $attributes->merge(['class' => 'card mb-3 text-center' ]) }}>
		<div class="card-img-top">
			<img src="{{ asset($film->image->path) }}" class="w-auto" alt="{{ $film->name }} poster">
		</div>
		<div class="card-body">
			<a href="{{ route('film.show', [$film->slug]) }}" class="card-title stretched-link fs-5">{{ $film->name }}</a>
			{{-- <a href="{{ route('film.show', $film->id) }}" class="card-title stretched-link fs-5">{{ $film->name }}</a> --}}
			<h6 class="card-subtitle text-muted">{{ $film->director }}</h6>
		</div>
	</div>
</div>
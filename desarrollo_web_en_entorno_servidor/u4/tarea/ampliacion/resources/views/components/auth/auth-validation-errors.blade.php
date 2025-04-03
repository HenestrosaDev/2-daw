@props(['errors'])

@if ($errors->any())
	<div {{ $attributes->merge(['class' => 'alert alert-danger rounded-3']) }}>
		<div>
			Ups… Parece que algo salió mal
		</div>

		<ul class="mt-2">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

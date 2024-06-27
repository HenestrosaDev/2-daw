<x-common.app :page-title="$film->name">
	<x-film.modal-tickets :filmId="$film->id" />

	<main class="pb-md-4 mx-auto p-3">
		@if ($errors->any())
			<x-common.alert class="alert-danger">
				@foreach ($errors->all() as $error)
					<p>{{ $error }}</p>
				@endforeach
			</x-common.alert>
		@endif

		<div class="row">
			<div class="col-12 col-md-3 mb-md-0 mb-4 text-center">
				<img
					src="{{ asset($film->image->path) }}"
					class=""
					alt="{{ $film->name }} poster"
				>
			</div>

			<div class="col-12 col-md-9">
				<section
					id="film-header"
					class="mb-3"
				>
					<h1>{{ $film->name }}</h1>
					<p>
						<u class="me-2">{{ $film->release_year }}</u> Dirigida por <u>{{ $film->director }}</u>
					</p>
				</section>

				<section
					id="film-description"
					class="mb-3"
				>
					{{ $film->description }}
				</section>

				<section id="film-buy-ticket">
					<button
						type="button"
						class="btn btn-secondary"
						tabindex="0"
						data-bs-toggle="modal"
						data-bs-target="#ticket-modal"
						role="button"
					>
						Comprar entrada
					</button>

					@auth
						@if (Auth::user()->role_id == 1)
							<form
								action="{{ route('film.destroy', $film->id) }}"
								method="post"
								class="d-inline"
							>
								@csrf
								@method('DELETE')
								<button
									type="submit"
									class="btn btn-danger ms-3"
									role="button"
								>
									Eliminar película
								</button>
							</form>
						@endif
					@endauth
				</section>
			</div>
		</div>
	</main>
</x-common.app>

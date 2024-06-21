<x-common.app page-title="Añadir película">
	<main class="p-3 pb-md-4 mx-auto">
		<form 
			class="mini-container mx-auto" 
			method="post" 
			action="{{ route('film.store') }}" 
			enctype="multipart/form-data"
		>
			<x-film.validation-errors />
			@csrf

			<div class="form-group">
				<label 
					for="film-name" 
					class="form-label"
				>
					Título
				</label>
				<input 
					id="film-name" 
					name="name"
					type="text" 
					value="{{ old('name') }}"
					class="form-control" 
					placeholder="Título"
				>
			</div>

			<div class="mt-4">
				<label 
					for="film-director" 
					class="form-label"
				>
					Director
				</label>
				<input 
					id="film-director" 
					name="director"
					type="name" 
					value="{{ old('name') }}"
					class="form-control" 
					placeholder="Director"
				>
			</div>

			<div class="mt-4">
				<label 
					for="film-description" 
					class="form-label"
				>
					Sinopsis
				</label>
				<textarea 
					id="film-description"
					name="description"
					class="form-control" 
					rows="3"
				>
					{{ old('description') }}
				</textarea>
			</div>

			<div class="mt-4">
				<label 
					for="film-runtime" 
					class="form-label"
				>
					Duración <small>(en minutos)</small>
				</label>
				<input 
					id="film-runtime" 
					name="runtime"
					type="number" 
					value="{{ old('runtime') }}"
					min="1" 
					max="999" 
					step="1"
					class="form-control" 
					placeholder="Duración (en minutos)"
				>
			</div>

			<div class="mt-4">
				<label 
					for="film-release-year" 
					class="form-label"
				>
					Año de lanzamiento
				</label>
				<input 
					id="film-release-year" 
					name="release_year"
					type="number" 
					value="{{ old('release_year') }}"
					min="1900" 
					max="2099" 
					step="1"
					class="form-control" 
					placeholder="Año de lanzamiento"
				>
			</div>

			<div class="row mt-4">
				<label 
					for="film-poster" 
					class="col-12 form-label"
				>
					Póster
				</label>
			</div>

			<div class="w-100 text-center">
				<img 
					id="film-poster-preview" 
					src="{{ asset("images/posters/default.png") }}"
					alt="Preview poster"
					width="220" 
					height="330" 
				/>
			</div>

			<div class="row mt-4">
				<input 
					id="film-poster"
					name="poster"
					class="form-control" 
					type="file"
					value="{{ old('poster') }}"
					accept="image/png, image/jpeg"
					onchange="document.getElementById('film-poster-preview').src = window.URL.createObjectURL(this.files[0])"
				>
			</div>

			<div class="d-flex justify-content-around mt-5">
				<button 
					class="col-4 btn btn-secondary" 
					type="reset"
				>
					Reset
				</button>
				<button 
					class="col-4 btn btn-primary" 
					type="submit" 
					name="film_submit"
				>
					Crear película
				</button>
			</div>
		</form>
	</main>
</x-common.app>
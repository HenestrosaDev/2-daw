@props(['filmId'])

<div
	id="ticket-modal"
	class="modal fade"
	tabindex="-1"
	aria-labelledby="ticket-title"
	aria-hidden="true"
>
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5
					id="ticket-title"
					class="modal-title"
				>
					¿Cuántas entradas quieres?
				</h5>
				<button
					type="button"
					class="btn-close"
					data-bs-dismiss="modal"
					aria-label="Close"
				>
				</button>
			</div>

			<form
				action="{{ route('ticket.store') }}"
				method="post"
			>
				@csrf
				<div class="modal-body">
					<div class="text-center">
						<input
							id="ticket-film-id"
							name="film_id"
							value="{{ $filmId }}"
							type="hidden"
						>
						<input
							id="ticket-user-id"
							name="user_id"
							@auth
value="{{ Auth::user()->id }}" @endauth
							type="hidden"
						>
						<input
							id="ticket-amount"
							name="amount"
							type="number"
							step="1"
							aria-label="Número de entradas"
							class="form-control"
							placeholder="Número de entradas"
							min="1"
							max="99"
						>
						@guest
							<p class="text-danger pt-2">
								Necesitas registrarte para poder comprar una entrada.
							</p>
						@endguest
					</div>
				</div>

				<div class="modal-footer">
					<button
						type="button"
						class="btn btn-primary"
						data-bs-dismiss="modal"
					>
						Cancelar
					</button>
					<button
						id="ticket-submit"
						type="submit"
						name="submit"
						class="btn btn-secondary @guest disabled @endguest"
					>
						Comprar
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

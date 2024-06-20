const newItemId = (type) => {
	const lastElementId = $(`#${type}__inputs > div`).last().attr("id");
	const newId = lastElementId.split("--");
	return parseInt(newId[newId.length - 1]) + 1;
};

$("[id*='__add']").on("click", (e) => {
	const dataType = e.currentTarget.id.split("__");
	const id = newItemId(dataType[0]);

	const start = $(`#${dataType[0]}__inputs`);
	const newRow = $(`
		<div id="${dataType[0]}--${id}" class="row g-3 px-3 mb-3">
			<div class="col-md-4">
				<label 
					for="${dataType[0]}__date--${id}" 
					class="form-label"
				>
					Fecha
				</label>
				<input 
					id="${dataType[0]}__date--${id}" 
					name="${dataType[0]}_date[]" 
					type="date" 
					class="form-control"
				>
			</div>

			<div class="col-md-4">
				<label 
					for="${dataType[0]}__description--${id}" 
					class="form-label"
				>
					Descripción
				</label>
				<input 
					id="${dataType[0]}__description--${id}" 
					name="${dataType[0]}_description[]" 
					type="text" 
					class="form-control"
				>
			</div>

			<div class="col-md-3">
				<label 
					for="${dataType[0]}__amount--${id}" 
					class="form-label"
				>
					Cantidad
				</label>
				<input 
					id="${dataType[0]}__amount--${id}" 
					name="${dataType[0]}_amount[]" 
					type="number" 
					step=".01" 
					class="form-control"
				>
			</div>

			<div class="col-md-1 d-flex justify-content-center">
				<button 
					id="${dataType[0]}__remove--${id}" 
					class="btn btn-danger" 
					type="button"
				>
					<i class="bi bi-trash-fill"></i>
				</button>
			</div>
		</div>
	`);

	$(start).append(newRow);
});

$(document).on("click", "[id*='remove']", (e) => {
	const dataType = e.currentTarget.id.split("__");
	const id = e.currentTarget.id.split("--");
	$(`#${dataType[0]}--${id[id.length - 1]}`).remove();
});

$("#reset__button").on("click", () => {
	if (confirm("Los datos introducidos se borrarán, ¿deseas continuar?")) {
		$("#form").trigger("reset");
	}
});

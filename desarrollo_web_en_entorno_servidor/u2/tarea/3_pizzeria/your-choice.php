<main>
	<div class="row g-5">
		<?php include "./cart.html" ?>

		<div class="col-md-7 col-lg-8" id="ingredients">
			<div id="ingredients__header">
				<h4>¿Qué ingredientes ponemos?</h4>

				<p class="text-muted">
					El número asociado al ingrediente indica raciones, no unidades
				</p>
			</div>

			<div id="ingredients__content">
				<ul>
					<li>
						<img 
							src="img/ingredients/york.png" 
							alt="" 
							title="York"
						/>
						York
						
						<div class="input-group justify-content-center">
							<button 
								type="button" 
								class="btn btn-danger btn-number" 
								disabled="disabled" 
								data-type="minus" 
								data-field="york"
							>
								<span class="bi-dash"></span>
							</button>

							<input 
								name="york" 
								value="0" 
								type="text" 
								aria-label="Cantidad de york" 
								class="form-control input-number text-center d-none" 
								min="0" 
								max="1"
							>
							<button 
								type="button" 
								class="btn btn-success btn-number" 
								data-type="plus" 
								data-field="york"
							>
								<span class="bi-plus"></span>
							</button>
						</div>
					</li>

					<li>
						<img 
							src="img/ingredients/bacon.png" 
							alt="" 
							title="Bacon"
						/>
						Bacon
						
						<div class="input-group justify-content-center">
							<button 
								type="button" 
								class="btn btn-danger btn-number" 
								disabled="disabled" 
								data-type="minus" 
								data-field="bacon"
							>
								<span class="bi-dash"></span>
							</button>

							<input 
								name="bacon" 
								value="0" 
								type="text" 
								aria-label="Cantidad de bacon" 
								class="form-control input-number text-center d-none" 
								min="0" 
								max="1"
							>
							<button 
								type="button" 
								class="btn btn-success btn-number" 
								data-type="plus" 
								data-field="bacon"
							>
								<span class="bi-plus"></span>
							</button>
						</div>
					</li>

					<li>
						<img
							src="img/ingredients/chicken.png"
							alt=""
							title="Pollo a la parrilla"
						/>
						Pollo a la parrilla

						<div class="input-group justify-content-center">
							<button
								type="button"
								class="btn btn-danger btn-number"
								disabled="disabled"
								data-type="minus"
								data-field="chicken"
							>
								<span class="bi-dash"></span>
							</button>

							<input
								name="chicken"
								value="0"
								type="text"
								aria-label="Cantidad de pollo a la parrilla"
								class="form-control input-number text-center d-none"
								min="0"
								max="1"
							/>

							<button
								type="button"
								class="btn btn-success btn-number"
								data-type="plus"
								data-field="chicken"
							>
								<span class="bi-plus"></span>
							</button>
						</div>
					</li>

					<li>
						<img
							src="img/ingredients/serrano-ham.png"
							alt=""
							title="Jamón serrano"
						/>
						Jamón serrano

						<div class="input-group justify-content-center">
							<button
								type="button"
								class="btn btn-danger btn-number"
								disabled="disabled"
								data-type="minus"
								data-field="serrano_ham"
							>
								<span class="bi-dash"></span>
							</button>

							<input
								name="serrano_ham"
								value="0"
								type="text"
								aria-label="Cantidad de jamón serrano"
								class="form-control input-number text-center d-none"
								min="0"
								max="1"
							/>

							<button
								type="button"
								class="btn btn-success btn-number"
								data-type="plus"
								data-field="serrano_ham"
							>
								<span class="bi-plus"></span>
							</button>
						</div>
					</li>

					<li>
						<img
							src="img/ingredients/tuna.png"
							alt=""
							title="Atún"
						/>
						Atún

						<div class="input-group justify-content-center">
							<button
								type="button"
								class="btn btn-danger btn-number"
								disabled="disabled"
								data-type="minus"
								data-field="tuna"
							>
								<span class="bi-dash"></span>
							</button>

							<input
								name="tuna"
								value="0"
								type="text"
								aria-label="Cantidad de atún"
								class="form-control input-number text-center d-none"
								min="0"
								max="1"
							/>

							<button
								type="button"
								class="btn btn-success btn-number"
								data-type="plus"
								data-field="tuna"
							>
								<span class="bi-plus"></span>
							</button>
						</div>
					</li>

					<li>
						<img
							src="img/ingredients/anchovies.png"
							alt=""
							title="Anchoas"
						/>
						Anchoas

						<div class="input-group justify-content-center">
							<button
								type="button"
								class="btn btn-danger btn-number"
								disabled="disabled"
								data-type="minus"
								data-field="anchovies"
							>
								<span class="bi-dash"></span>
							</button>

							<input
								name="anchovies"
								value="0"
								type="text"
								aria-label="Cantidad de anchoas"
								class="form-control input-number text-center d-none"
								min="0"
								max="1"
							/>

							<button
								type="button"
								class="btn btn-success btn-number"
								data-type="plus"
								data-field="anchovies"
							>
								<span class="bi-plus"></span>
							</button>
						</div>
					</li>

					<li>
						<img
							src="img/ingredients/mushroom.png"
							alt=""
							title="Champiñón"
						/>
						Champiñón

						<div class="input-group justify-content-center">
							<button
								type="button"
								class="btn btn-danger btn-number"
								disabled="disabled"
								data-type="minus"
								data-field="mushroom"
							>
								<span class="bi-dash"></span>
							</button>

							<input
								name="mushroom"
								value="0"
								type="text"
								aria-label="Cantidad de champiñón"
								class="form-control input-number text-center d-none"
								min="0"
								max="1"
							/>

							<button
								type="button"
								class="btn btn-success btn-number"
								data-type="plus"
								data-field="mushroom"
							>
								<span class="bi-plus"></span>
							</button>
						</div>
					</li>

					<li>
						<img
							src="img/ingredients/tomato.png"
							alt=""
							title="Tomate"
						/>
						Tomate

						<div class="input-group justify-content-center">
							<button
								type="button"
								class="btn btn-danger btn-number"
								disabled="disabled"
								data-type="minus"
								data-field="tomato"
							>
								<span class="bi-dash"></span>
							</button>

							<input
								name="tomato"
								value="0"
								type="text"
								aria-label="Cantidad de tomate"
								class="form-control input-number text-center d-none"
								min="0"
								max="1"
							/>

							<button
								type="button"
								class="btn btn-success btn-number"
								data-type="plus"
								data-field="tomato"
							>
								<span class="bi-plus"></span>
							</button>
						</div>
					</li>

					<li>
						<img
							src="img/ingredients/pineapple.png"
							alt=""
							title="Piña"
						/>
						Piña

						<div class="input-group justify-content-center">
							<button
								type="button"
								class="btn btn-danger btn-number"
								disabled="disabled"
								data-type="minus"
								data-field="pineapple"
							>
								<span class="bi-dash"></span>
							</button>
							
							<input
								name="pineapple"
								value="0"
								type="text"
								aria-label="Cantidad de piña"
								class="form-control input-number text-center d-none"
								min="0"
								max="1"
							/>

							<button
								type="button"
								class="btn btn-success btn-number"
								data-type="plus"
								data-field="pineapple"
							>
								<span class="bi-plus"></span>
							</button>
						</div>
					</li>

					<li>
						<img
							src="img/ingredients/onion.png"
							alt=""
							title="Cebolla"
						/>
						Cebolla

						<div class="input-group justify-content-center">
							<button
								type="button"
								class="btn btn-danger btn-number"
								disabled="disabled"
								data-type="minus"
								data-field="onion"
							>
								<span class="bi-dash"></span>
							</button>

							<input
								name="onion"
								type="text"
								aria-label="Cantidad de cebolla"
								class="form-control input-number text-center d-none"
								value="0"
								min="0"
								max="1"
							/>

							<button
								type="button"
								class="btn btn-success btn-number"
								data-type="plus"
								data-field="onion"
							>
								<span class="bi-plus"></span>
							</button>
						</div>
					</li>

					<li>
						<img
							src="img/ingredients/green-pepper.png"
							alt=""
							title="Pimiento verde"
						/>
						Pimiento verde

						<div class="input-group justify-content-center">
							<button
								type="button"
								class="btn btn-danger btn-number"
								disabled="disabled"
								data-type="minus"
								data-field="green_pepper"
							>
								<span class="bi-dash"></span>
							</button>

							<input
								name="green_pepper"
								type="text"
								aria-label="Cantidad de pimiento verde"
								class="form-control input-number text-center d-none"
								value="0"
								min="0"
								max="1"
							/>

							<button
								type="button"
								class="btn btn-success btn-number"
								data-type="plus"
								data-field="green_pepper"
							>
								<span class="bi-plus"></span>
							</button>
						</div>
					</li>
					<li>
						<img
							src="img/ingredients/black-olives.png"
							alt=""
							title="Aceitunas negras"
						/>
						
						Aceitunas negras

						<div class="input-group justify-content-center">
							<button
								type="button"
								class="btn btn-danger btn-number"
								disabled="disabled"
								data-type="minus"
								data-field="black_olives"
							>
								<span class="bi-dash"></span>
							</button>

							<input
								type="text"
								name="black_olives"
								aria-label="Cantidad de aceitunas negras"
								class="form-control input-number text-center d-none"
								value="0"
								min="0"
								max="1"
							/>

							<button
								type="button"
								class="btn btn-success btn-number"
								data-type="plus"
								data-field="black_olives"
							>
								<span class="bi-plus"></span>
							</button>
						</div>
					</li>
				</ul>
			</div>
			
			<button
				class="w-100 btn btn-primary btn-lg mt-4"
				type="submit"
				name="choice_submit"
				value="choice_submit"
			>
				Enviar
			</button>
		</div>
	</div>
</main>

<!-- Modal -->
<div class="modal fade" id="modal_filtros_estudiantes" tabindex="-1" aria-labelledby="filtros_estudiantes" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="filtros_estudiantes">Reporte de estudiantes</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="reporte_estudiantes" action="../../controladores/reportes/control_reportes.php" method="post">
					<p class="h5 mb-3">
						¿Qué datos quiere incluir en el reporte?
					</p>


					<!-- Datos personales del estudiante -->


					<span class="form-label">Datos del estudiante:</span>

					<fieldset id="datos_estudiante" class="py-2">

						<div class="px-3">

							<!-- Dirección -->
							<div class="form-check">
								<input 
									id="incluir_direccion" 
									name="incluir_direccion" 
									class="form-check-input" 
									type="checkbox" 
									checked
								>
								<label class="form-check-label" for="incluir_direccion">
									Dirección
								</label>
							</div>


							<!-- Correo electrónico -->
							<div class="form-check">
								<input 
									id="incluir_email" 
									name="incluir_email" 
									class="form-check-input" 
									type="checkbox" 
									
									checked
								>
								<label class="form-check-label" for="incluir_email">
									Correo electrónico
								</label>
							</div>


							<!-- Teléfonos -->
							<div class="form-check">
								<input 
									id="incluir_telefonos" 
									name="incluir_telefonos" 
									class="form-check-input" 
									type="checkbox" 
									checked
								>
								<label class="form-check-label" for="incluir_telefonos">
									Teléfonos
								</label>
							</div>


							<!-- Observaciones -->
							<div class="form-check mb-2">
								<input 
									id="incluir_observaciones" 
									name="incluir_observaciones" 
									class="form-check-input" 
									type="checkbox" 
									checked
								>
								<label class="form-check-label" for="incluir_observaciones">
									Observaciones
								</label>
							</div>

						</div>

						<p class="form-text small">Los datos personales como nombres, apellidos, cédula y año no pueden ser excluidos del reporte</p>

					</fieldset>
					

					<!-- Datos adicionales -->


					<!-- Datos sociales -->
					<div class="form-check form-switch">
						<input 
							id="incluir_d_sociales" 
							name="incluir_d_sociales" 
							class="form-check-input" 
							type="checkbox" 
							checked
						>
						<label class="form-check-label" for="incluir_d_sociales">Incluir datos sociales</label>
					</div>


					<!-- Datos académicos -->
					<div class="form-check form-switch">
						<input 
							id="incluir_d_academicos" 
							name="incluir_d_academicos" 
							class="form-check-input" 
							type="checkbox" 
							checked
						>
						<label class="form-check-label" for="incluir_d_academicos">Incluir datos académicos</label>
					</div>


					<!-- Datos de salud -->
					<div class="form-check form-switch">
						<input 
							id="incluir_d_salud" 
							name="incluir_d_salud" 
							class="form-check-input" 
							type="checkbox" 
							checked
						>
						<label class="form-check-label" for="incluir_d_salud">Incluir datos de salud</label>
					</div>

					<fieldset id="datos_salud" class="px-3 p-2">
						

						<!-- Ficha médica general -->
						<div class="form-check">
							<input 
								id="incluir_f_medica" 
								name="incluir_f_medica" 
								class="form-check-input filtros-salud" 
								type="checkbox" 
								checked
							>
							<label class="form-check-label" for="incluir_f_medica">
								Ficha médica general.
							</label>
						</div>
						

						<!-- Tallas de ropa -->
						<div class="form-check">
							<input 
								id="incluir_tallas" 
								name="incluir_tallas" 
								class="form-check-input filtros-salud" 
								type="checkbox" 
								checked
							>
							<label class="form-check-label" for="incluir_tallas">
								Tallas de ropa
							</label>
						</div>
						

						<!-- Medidas antropométricas -->
						<div class="form-check">
							<input 
								id="incluir_antropometria" 
								name="incluir_antropometria" 
								class="form-check-input filtros-salud" 
								type="checkbox" 
								checked
							>
							<label class="form-check-label" for="incluir_antropometria">
								Medidas antropométricas
							</label>
						</div>
						

						<!-- Condiciones de salud -->
						<div class="form-check">
							<input 
								id="incluir_cond_salud" 
								name="incluir_cond_salud" 
								class="form-check-input filtros-salud" 
								type="checkbox" 
								checked
							>
							<label class="form-check-label" for="incluir_cond_salud">
								Condiciones de salud
							</label>
						</div>
						

						<!-- Vacunas aplicadas (Generales). -->
						<div class="form-check">
							<input 
								id="incluir_vacunas" 
								name="incluir_vacunas" 
								class="form-check-input filtros-salud" 
								type="checkbox" 
								checked
							>
							<label class="form-check-label" for="incluir_vacunas">
								Vacunas aplicadas (Generales).
							</label>
						</div>
						

						<!-- Vacunación contra el Covid-19 -->
						<div class="form-check">
							<input 
								id="incluir_vac_covid_19" 
								name="incluir_vac_covid_19" 
								class="form-check-input filtros-salud" 
								type="checkbox" 
								checked
							>
							<label class="form-check-label" for="incluir_vac_covid_19">
								Vacunación contra el Covid-19
							</label>
						</div>


					</fieldset>


					<!-- Datos del representante -->
					<div class="form-check form-switch">
						<input 
							id="incluir_d_representante" 
							name="incluir_d_representante" 
							class="form-check-input" 
							type="checkbox" 
							checked
						>
						<label class="form-check-label" for="incluir_d_representante">Incluir datos del representante</label>
					</div>


					<!-- Datos de los padres -->
					<div class="form-check form-switch">
						<input 
							id="incluir_d_padres" 
							name="incluir_d_padres" 
							class="form-check-input" 
							type="checkbox" 
							checked
						>
						<label class="form-check-label" for="incluir_d_padres">Incluir datos de los padres</label>
					</div>


					<p class="h5 my-3">
						Aplicar filtros:
					</p>


					<!-- Año que cursa -->
					<div class="row mb-2">
						<div class="col-12 col-md-5">
							<label class="form-label" for="filtro_anio">Año que cursa:</label>
						</div>
						<div class="col-12 col-md-7">
							<select id="filtro_anio" name="filtro_anio" class="form-select" required>
								<option value="Cualquiera">Cualquiera</option>
								<option value="Primer año">Primer año</option>
								<option value="Segundo año">Segundo año</option>
								<option value="Tercer año">Tercer año</option>
								<option value="Cuarto año">Cuarto año</option>
								<option value="Quinto año">Quinto año</option>
							</select>
						</div>
					</div>


					<!-- Género -->
					<div class="row mb-2">
						<div class="col-12 col-md-5">
							<label class="form-label" for="filtro_genero">Género:</label>
						</div>
						<div class="col-12 col-md-7">
							<select id="filtro_genero" name="filtro_genero" class="form-select" required>
								<option value="Cualquiera">Cualquiera</option>
								<option value="F">Hembras</option>
								<option value="M">Varones</option>
							</select>
						</div>
					</div>

					<input type="hidden" name="reporte" value="estudiantes">
					
				</form>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
				<button id="b_r_estudiantes" type="submit" class="btn btn-success" form="reporte_estudiantes">
					Generar Reporte
					<i class="fa-solid fa-file-excel fa-lg ms-2"></i>
				</button>
			</div>

		</div>
	</div>
</div>
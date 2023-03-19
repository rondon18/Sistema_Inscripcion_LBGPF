<!-- Modal -->
<div class="modal fade" id="modal_filtros_padres" tabindex="-1" aria-labelledby="filtros_padres" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="filtros_padres">Reporte de padres y madres</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="reporte_padres" action="../../controladores/reportes/control_reportes.php" method="post">
					<p class="h5 mb-3">
						¿Qué datos quiere incluir en el reporte?
					</p>


					<!-- Datos personales del estudiante -->


					<span class="form-label">Datos del representante:</span>

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

						</div>

						<p class="form-text small">Los datos personales como nombres, apellidos y cédula no pueden ser excluidos del reporte</p>

					</fieldset>
					

					<!-- Datos adicionales -->


					<!-- Datos laborales -->
					<div class="form-check form-switch">
						<input 
							id="incluir_d_laborales" 
							name="incluir_d_laborales" 
							class="form-check-input" 
							type="checkbox" 
							checked
						>
						<label class="form-check-label" for="incluir_d_laborales">
							Incluir datos laborales
						</label>
					</div>


					<!-- Datos de vivienda -->
					<div class="form-check form-switch">
						<input 
							id="incluir_d_vivienda" 
							name="incluir_d_vivienda" 
							class="form-check-input" 
							type="checkbox" 
							checked
						>
						<label class="form-check-label" for="incluir_d_vivienda">
							Incluir datos de vivienda
						</label>
					</div>


					<p class="h5 my-3">
						Aplicar filtros:
					</p>


					<!-- Año que cursa -->
					<div class="row mb-2">
						<div class="col-12 col-md-5">
							<label class="form-label" for="filtro_anio">Año que cursa su hijo:</label>
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


					<div class="row mb-2">
	       		<div class="col-5">
	       			<label for="filtro_seccion">
			       		Sección que cursa su hijo:
			       	</label>
	       		</div>
	       		<div class="col-7">
	       			<select class="form-select" name="filtro_seccion" id="filtro_seccion">
			       		<option value="Cualquiera">Cualquiera</option>
			       		<option value="A">A</option>
			       		<option value="B">B</option>
			       		<option value="C">C</option>
			       		<option value="D">D</option>
			       	</select>
	       		</div>
	       	</div>

					<!-- Género -->
					<div class="row mb-2">
						<div class="col-12 col-md-5">
							<label class="form-label" for="filtro_relacion">Parentesco:</label>
						</div>
						<div class="col-12 col-md-7">
							<select id="filtro_parentesco" name="filtro_parentesco" class="form-select" required>
								<option value="Cualquiera">Cualquiera</option>
								<option value="Padre">Padre</option>
								<option value="Madre">Madre</option>
							</select>
						</div>
					</div>

					<input type="hidden" name="reporte" value="padres">
					
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
				<button id="b_r_padres" type="submit" class="btn btn-success" form="reporte_padres">
					Generar Reporte
					<i class="fa-solid fa-file-excel fa-lg ms-2"></i>
				</button>
			</div>
		</div>
	</div>
</div>
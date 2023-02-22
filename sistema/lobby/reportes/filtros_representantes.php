<!-- Modal -->
<div 
	id="modal_filtros_representantes" 
	class="modal fade" 
	tabindex="-1" 
	aria-labelledby="filtros_representantes" 
	aria-hidden="true"
>
	<div class="modal-dialog modal-md modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 
					id="filtros_representantes"
					class="modal-title" 
				>
					Reporte de representantes
				</h5>
				<button 
					type="button" 
					class="btn-close" 
					data-bs-dismiss="modal" 
					aria-label="Close"
				></button>
			</div>
			<div class="modal-body">
				<form id="reporte_representantes" action="../../controladores/reportes/control_reportes.php" method="post">
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


							<!-- Carnet de la patria -->
							<div class="form-check">
								<input 
									id="incluir_c_patria" 
									name="incluir_c_patria" 
									class="form-check-input" 
									type="checkbox" 
									checked
								>
								<label class="form-check-label" for="incluir_c_patria">
									Carnet de la patria
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


					<!-- Datos economicos -->
					<div class="form-check form-switch">
						<input 
							id="incluir_d_economicos" 
							name="incluir_d_economicos" 
							class="form-check-input" 
							type="checkbox" 
							checked
						>
						<label class="form-check-label" for="incluir_d_economicos">
							Incluir datos economicos
						</label>
					</div>


					<!-- Datos del contacto auxiliar -->
					<div class="form-check form-switch">
						<input 
							id="incluir_c_aux" 
							name="incluir_c_aux" 
							class="form-check-input" 
							type="checkbox" 
							checked
						>
						<label class="form-check-label" for="incluir_c_aux">
							Incluir contacto auxiliar
						</label>
					</div>


					<p class="h5 my-3">
						Aplicar filtros:
					</p>


					<!-- Año que cursa -->
					<div class="row mb-2">
						<div class="col-12 col-md-5">
							<label class="form-label" for="filtro_representados">Representa a más de un estudiante:</label>
						</div>
						<div class="col-12 col-md-7">
							<select id="filtro_representados" name="filtro_representados" class="form-select" required>
								<option value="Cualquiera">Cualquiera</option>
								<option value="Si">Si</option>
								<option value="No">No</option>
							</select>
						</div>
					</div>


					<!-- Año que cursa -->
					<div class="row mb-2">
						<div class="col-12 col-md-5">
							<label class="form-label" for="filtro_trabajo">El representante trabaja:</label>
						</div>
						<div class="col-12 col-md-7">
							<select id="filtro_trabajo" name="filtro_trabajo" class="form-select" required>
								<option value="Cualquiera">Cualquiera</option>
								<option value="Si">Si</option>
								<option value="No">No</option>
							</select>
						</div>
					</div>


					<!-- Género -->
					<div class="row mb-2">
						<div class="col-12 col-md-5">
							<label class="form-label" for="filtro_relacion">Relación:</label>
						</div>
						<div class="col-12 col-md-7">
							<select id="filtro_relacion" name="filtro_relacion" class="form-select" required>
								<option value="Cualquiera">Cualquiera</option>
								<option value="Padre">Padre</option>
								<option value="Madre">Madre</option>
								<option value="Otro">Otro</option>
							</select>
						</div>
					</div>

					<input type="hidden" name="reporte" value="representantes">
					
				</form>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
				<button id="b_r_representantes" type="submit" class="btn btn-success" form="reporte_representantes">
					Generar Reporte
					<i class="fa-solid fa-file-excel fa-lg ms-2"></i>
				</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div 
	id="modal_filtros_nomina_estudiantil"
	class="modal fade" 
	tabindex="-1" 
	aria-labelledby="filtros_nomina_estudiantil"
	aria-hidden="true"
>
	<div class="modal-dialog modal-md modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 
					id="filtros_nomina_estudiantil"
					class="modal-title" 
				>
					Nómina estudiantíl
				</h5>
				<button 
					type="button" 
					class="btn-close" 
					data-bs-dismiss="modal" 
					aria-label="Close"
				></button>
			</div>
			<div class="modal-body">
				<form id="nomina_estudiantil" action="../../controladores/reportes/control_reportes.php" method="post">
					<p class="h5 mb-4">
						¿De qué año desea general la nómina estudiantil?
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


					<div class="row mb-2">
	       		<div class="col-5">
	       			<label for="filtro_seccion">
			       		Sección actual
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


					<input type="hidden" name="reporte" value="nomina_estudiantil">
					
				</form>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
				<button id="b_r_nomina_estudiantil" type="submit" class="btn btn-danger" form="nomina_estudiantil">
					Generar Reporte
					<i class="fa-solid fa-file-pdf fa-lg ms-2"></i>
				</button>
			</div>
		</div>
	</div>
</div>
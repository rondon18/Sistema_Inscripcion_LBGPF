<!-- Modal -->
<div class="modal fade" id="filtros_estadistica_est" tabindex="-1" aria-labelledby="filtros_est_label" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="filtros_estadistica_est_label">Opciones de estadistica de estudiantes</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="opciones_estadistica_est" action="ver_estadisticas.php" method="post">
					<div class="mb-3">
						<label for="estadistica_est" class="form-label">Estadistica a consultar:</label>
						<select class="form-select" id="estadistica_est" name="estadistica_est" required>
							<option>Estadisticas generales</option>
							<option>Estadisticas sociales</option>
							<option>Estadisticas médicas</option>
						</select>
					 </div>
					 <div class="mb-3">
						<label for="anio_est" class="form-label">Año a consultar:</label>
						<select class="form-select" id="anio_est" name="anio_est" required>
							<option>Global</option>
							<option>Primer año</option>
							<option>Segundo año</option>
							<option>Tercer año</option>
							<option>Cuarto año</option>
							<option>Quinto año</option>
						</select>
					 </div>
					 <div class="mb-3">
						<label for="seccion_est" class="form-label">Sección a consultar:</label>
						<select class="form-select" id="seccion_est" name="seccion_est" required disabled>
							<option>Global</option>
							<option>A</option>
							<option>B</option>
							<option>C</option>
							<option>D</option>
						</select>
					 </div>
					 <input type="hidden" name="estadistica" value="estudiantes">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary" form="opciones_estadistica_est">Consultar</button>
			</div>
		</div>
	</div>
</div>
<script defer>
	//Habilita/Deshabilita el campo de otro vinculo del representante
	$(document).ready(function(){
		$('#opciones_estadistica_est').change(function(){
			selected_value = $("select#anio_est>option:selected").val();
			if (selected_value != 'Global') {
				$("select#seccion_est").prop("disabled",false);
			}
			else {
				$("select#seccion_est").prop("disabled",true);
			}
			console.log(selected_value);
		});
	});
</script>

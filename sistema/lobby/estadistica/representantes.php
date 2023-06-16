<!-- Modal -->
<div class="modal fade" id="filtros_estadistica_rep" tabindex="-1" aria-labelledby="filtros_rep_label" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="filtros_estadistica_rep_label">Opciones de estadistica de representantes</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="opciones_estadistica_rep" action="ver_estadisticas.php" method="post">
					<div class="mb-3">
						<label for="estadistica_rep" class="form-label">Estadistica a consultar:</label>
						<select class="form-select" id="estadistica_rep" name="estadistica_rep" required>
							<option>Estadisticas generales</option>
							<option>Estadisticas sociales</option>
							<option>Estadisticas económicas</option>
						</select>
					 </div>
					 <div class="mb-3">
						<label for="anio_rep" class="form-label">Año a consultar:</label>
						<select class="form-select" id="anio_rep" name="anio_rep" required>
							<option>Global</option>
							<option>Primer año</option>
							<option>Segundo año</option>
							<option>Tercer año</option>
							<option>Cuarto año</option>
							<option>Quinto año</option>
						</select>
					 </div>
					 <input type="hidden" name="estadistica" value="representantes">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary" form="opciones_estadistica_rep">Consultar</button>
			</div>
		</div>
	</div>
</div>
<script defer>

</script>

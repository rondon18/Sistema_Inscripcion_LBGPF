<!-- Estudiantes por género (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Población académica por género (Global).</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-5 mx-auto mb-3">
					<canvas id="dist_genero_global" class="mx-auto"></canvas>
				</div>
				<div class="col-12">
					
					<table class="table table-sm table-bordered table-striped table-responsive">
						<thead>
							<tr>
								<th><span class="badge" style="background: #36a2eb;"> </span> Hembras</th>
								<th><span class="badge" style="background: #ff6384;"> </span> Varones</th>
								<th>Total de estudiantes</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $estudiantes->get_nro_hembras();?></td>
								<td><?php echo $estudiantes->get_nro_varones();?></td>
								<td><?php echo $estudiantes->get_nro_estudiantes();?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!-- datos de la gráfica -->
			<script type="text/javascript" defer>
				const dist_genero_global = document.getElementById('dist_genero_global');
				new Chart(dist_genero_global, {
					type: 'doughnut',
					data: {
					datasets: [{
						label: 'Número de estudiantes',
						data: [
							<?php echo $estudiantes->get_nro_varones("Cualquiera","Cualquiera");?>,
							<?php echo $estudiantes->get_nro_hembras("Cualquiera","Cualquiera");?>,
						],
						borderWidth: 1
					}]
				},
				options: {
					responsive: true,
				}
				});
			</script>
		</div>
	</div>
</div>
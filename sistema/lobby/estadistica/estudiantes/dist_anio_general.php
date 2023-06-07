<!-- Contenedor con la grafica y tabla de valores de : -->


<!-- Estudiantes por género (general) -->

<div class="col-12 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Población académica por año.</p>
		</div>
		<div class="card-body">
			<!-- Estudiantes por grado -->
			<div class="row">
				<div class="col-8 col-md-4 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="grafico1" class="mx-auto"></canvas>
				</div>
				<div class="col-12 col-md-8">
					<table class="table table-sm table-bordered table-striped table-responsive">
						<thead>
							<th>Año</th>
							<th>Número de estudiantes</th>
						</thead>
						<tbody>
							<tr>
								<th><span class="badge" style="background: #36a2eb;"> </span> Primer año</th>
								<td><?php echo $estudiantes->get_nro_estudiantes("Primer año");?></td>
							</tr>
							<tr>
								<th><span class="badge" style="background: #ff6384;"> </span> Segundo año</th>
								<td><?php echo $estudiantes->get_nro_estudiantes("Segundo año");?></td>
							</tr>
							<tr>
								<th><span class="badge" style="background: #ff9f40;"> </span> Tercer año</th>
								<td><?php echo $estudiantes->get_nro_estudiantes("Tercer año");?></td>
							</tr>
							<tr>
								<th><span class="badge" style="background: #ffcd56;"> </span> Cuarto año</th>
								<td><?php echo $estudiantes->get_nro_estudiantes("Cuarto año");?></td>
							</tr>
							<tr>
								<th><span class="badge" style="background: #4bc0c0;"> </span> Quinto año</th>
								<td><?php echo $estudiantes->get_nro_estudiantes("Quinto año");?></td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<th>Total de estudiantes</th>
								<td><?php echo $estudiantes->get_nro_estudiantes();?></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>


			<!-- datos de la gráfica -->
			<script type="text/javascript" defer>
				const graf1 = document.getElementById('grafico1');

			  new Chart(graf1, {
			    type: 'doughnut',
			    data: {
			      datasets: [{
			        label: 'Número de estudiantes',
			        data: [
								<?php echo $estudiantes->get_nro_estudiantes("Primer año");?>,
								<?php echo $estudiantes->get_nro_estudiantes("Segundo año");?>,
								<?php echo $estudiantes->get_nro_estudiantes("Tercer año");?>,
								<?php echo $estudiantes->get_nro_estudiantes("Cuarto año");?>,
								<?php echo $estudiantes->get_nro_estudiantes("Quinto año");?>,
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


		

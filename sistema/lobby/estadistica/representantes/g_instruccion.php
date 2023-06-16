
<!-- Estudiantes por género (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Representantes según su grado de instrucción</p>
		</div>
		<div class="card-body">
			<!-- Estudiantes por género (general) -->
			<div class="row">
				<div class="col-5 mx-auto mb-3">
					<canvas id="nro_representados" class="mx-auto"></canvas>
				</div>
				<div class="col-12">
					
					<table class="table table-sm table-bordered table-striped table-responsive">
						<thead>
							<tr>
								<th><span class="badge" style="background: #36a2eb;"> </span> Primaria</th>
								<th><span class="badge" style="background: #ff6384;"> </span> Bachillerato</th>
								<th><span class="badge" style="background: #ff9f40;"> </span> Universitario</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $representantes->get_nro_r_g_academico("Primaria");?></td>
								<td><?php echo $representantes->get_nro_r_g_academico("Bachillerato");?></td>
								<td><?php echo $representantes->get_nro_r_g_academico("Universitario");?></td>
								<td><?php echo $representantes->get_nro_representantes();?></td>
							</tr>
						</tbody>
						<tbody>
					</table>
				</div>
			</div>


			<!-- datos de la gráfica -->
			<script type="text/javascript" defer>
				const nro_representados = document.getElementById('nro_representados');

			  new Chart(nro_representados, {
			    type: 'doughnut',
			    data: {
			      datasets: [{
			        label: 'Nro. de representantes',
			        data: [
			        	<?php echo $representantes->get_nro_r_g_academico("Primaria");?>,
			        	<?php echo $representantes->get_nro_r_g_academico("Bachillerato");?>,
			        	<?php echo $representantes->get_nro_r_g_academico("Universitario");?>,
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


		


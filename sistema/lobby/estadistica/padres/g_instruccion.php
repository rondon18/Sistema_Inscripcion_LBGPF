
<!-- Estudiantes por género (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Padres por grado de instrucción</p>
		</div>
		<div class="card-body">
			<!-- Estudiantes por género (general) -->
			<div class="row">
				<div class="col-5 mx-auto mb-3">
					<canvas id="nro_grado_acad" class="mx-auto"></canvas>
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
								<td><?php echo $nro_primaria = $padres->get_nro_p_g_academico("Primaria");?></td>
								<td><?php echo $nro_bachillerato = $padres->get_nro_p_g_academico("Bachillerato");?></td>
								<td><?php echo $nro_universitario = $padres->get_nro_p_g_academico("Universitario");?></td>
								<td><?php echo $nro_primaria + $nro_bachillerato + $nro_universitario;?></td>
							</tr>
						</tbody>
						<tbody>
					</table>
					<span class="small text-muted">Nota: En esta estadística no se contemplan padres con cédulas provicionales.</span>
				</div>
			</div>


			<!-- datos de la gráfica -->
			<script type="text/javascript" defer>
				const nro_grado_acad = document.getElementById('nro_grado_acad');

			  new Chart(nro_grado_acad, {
			    type: 'doughnut',
			    data: {
			      datasets: [{
			        label: 'Nro. de padres',
			        data: [
			        	<?php echo $nro_primaria;?>,
			        	<?php echo $nro_bachillerato;?>,
			        	<?php echo $nro_universitario;?>,
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


		


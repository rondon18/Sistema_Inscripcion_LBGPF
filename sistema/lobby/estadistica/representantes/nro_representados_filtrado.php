
<!-- Estudiantes por género (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Representantes por número de representados en el año</p>
		</div>
		<div class="card-body">
			<!-- Estudiantes por género (general) -->
			<div class="row">
				<div class="col-5 mx-auto mb-3">
					<canvas id="grado_instruccion" class="mx-auto"></canvas>
				</div>
				<div class="col-12">
					
					<table class="table table-sm table-bordered table-striped table-responsive">
						<thead>
							<tr>
								<th><span class="badge" style="background: #36a2eb;"> </span> 1 Rep.</th>
								<th><span class="badge" style="background: #ff6384;"> </span> 2 Rep.</th>
								<th><span class="badge" style="background: #ff9f40;"> </span> Al menos 3 Rep.</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $representantes->get_nro_representados(1,$anio,$seccion);?></td>
								<td><?php echo $representantes->get_nro_representados(2,$anio,$seccion);?></td>
								<td><?php echo $representantes->get_nro_representados(3,$anio,$seccion);?></td>
								<td><?php echo $representantes->get_nro_representantes($anio,$seccion);?></td>
							</tr>
						</tbody>
						<tbody>
					</table>
				</div>
			</div>


			<!-- datos de la gráfica -->
			<script type="text/javascript" defer>
				const grado_instruccion = document.getElementById('grado_instruccion');

			  new Chart(grado_instruccion, {
			    type: 'doughnut',
			    data: {
			      datasets: [{
			        label: 'Nro. de representantes',
			        data: [
			        	<?php echo $representantes->get_nro_representados(1,$anio,$seccion);?>,
			        	<?php echo $representantes->get_nro_representados(2,$anio,$seccion);?>,
			        	<?php echo $representantes->get_nro_representados(3,$anio,$seccion);?>,
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


		


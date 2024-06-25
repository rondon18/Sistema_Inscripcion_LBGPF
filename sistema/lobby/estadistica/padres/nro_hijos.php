
<!-- Estudiantes por género (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Padres por número de hijos</p>
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
								<th><span class="badge" style="background: #36a2eb;"> </span> 0 Hijos.</th>
								<th><span class="badge" style="background: #ff6384;"> </span> 1 Hijo.</th>
								<th><span class="badge" style="background: #ff9f40;"> </span> 2 Hijos.</th>
								<th><span class="badge" style="background: #ffcd56;"> </span> Al menos 3 Hijos.</th>
								<th>Total</th>
							</tr>
						</thead>
						<?php
							$total_padres = $padres->get_nro_padres();
							$hijos_1 = $padres->get_nro_hijos(1);
							$hijos_2 = $padres->get_nro_hijos(2);
							$hijos_3 = $padres->get_nro_hijos(3);
							$hijos_0 = $total_padres - ($hijos_1 + $hijos_2 + $hijos_3);
						?>
						<tbody>
							<tr>

								<td><?php echo $hijos_0;?></td>
								<td><?php echo $hijos_1;?></td>
								<td><?php echo $hijos_2;?></td>
								<td><?php echo $hijos_3;?></td>
								<td><?php echo $hijos_1 + $hijos_2 + $hijos_3 + $hijos_0;?></td>
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
			        label: 'Nro. de padres',
			        data: [

			        	<?php echo $hijos_0;?>,
			        	<?php echo $hijos_1;?>,
			        	<?php echo $hijos_2;?>,
			        	<?php echo $hijos_3;?>,
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


		


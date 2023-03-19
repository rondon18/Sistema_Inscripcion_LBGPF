
<!-- Estudiantes por género (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Representantes que cuentan con carnet de la patria</p>
		</div>
		<div class="card-body">
			<!-- Estudiantes por género (general) -->
			<div class="row">
				<div class="col-5 mx-auto mb-3">
					<canvas id="carnet_patria" class="mx-auto"></canvas>
				</div>
				<div class="col-12">
					
					<table class="table table-sm table-bordered table-striped table-responsive">
						<thead>
							<tr>
								<th><span class="badge" style="background: #36a2eb;"> </span> Si</th>
								<th><span class="badge" style="background: #ff6384;"> </span> No</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $representantes->get_nro_r_c_carnet_p();?></td>
								<td><?php echo $representantes->get_nro_representantes() - $representantes->get_nro_r_c_carnet_p();?></td>
								<td><?php echo $representantes->get_nro_representantes();?></td>
							</tr>
						</tbody>
						<tbody>
					</table>
				</div>
			</div>


			<!-- datos de la gráfica -->
			<script type="text/javascript" defer>
				const carnet_patria = document.getElementById('carnet_patria');

			  new Chart(carnet_patria, {
			    type: 'doughnut',
			    data: {
			      datasets: [{
			        label: 'Nro. de representantes',
			        data: [
			        	<?php echo $representantes->get_nro_r_c_carnet_p();?>,
			        	<?php echo $representantes->get_nro_representantes() - $representantes->get_nro_r_c_carnet_p();?>,
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


		


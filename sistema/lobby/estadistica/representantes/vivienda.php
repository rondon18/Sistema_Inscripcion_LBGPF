

<!-- Estudiantes por género (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Representantes según el tipo de su vivienda</p>
		</div>
		<div class="card-body">
			<!-- Estudiantes por género (general) -->
			<div class="row">
				<div class="col-5 mx-auto mb-3">
					<canvas id="tipo_vivienda" class="mx-auto"></canvas>
				</div>
				<div class="col-12">
					
					<table class="table table-sm table-bordered table-striped table-responsive">
						<thead>
							<tr>
								<th><span class="badge" style="background: #36a2eb;"> </span> Casa</th>
								<th><span class="badge" style="background: #ff6384;"> </span> Apartamento</th>
								<th><span class="badge" style="background: #ff9f40;"> </span> Rancho</th>
								<th><span class="badge" style="background: #ffcd56;"> </span> Quinta</th>
								<th><span class="badge" style="background: #44b4b4;"> </span> Habitación</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $representantes->get_nro_tipo_v("Casa");?></td>
								<td><?php echo $representantes->get_nro_tipo_v("Apartamento");?></td>
								<td><?php echo $representantes->get_nro_tipo_v("Rancho");?></td>
								<td><?php echo $representantes->get_nro_tipo_v("Quinta");?></td>
								<td><?php echo $representantes->get_nro_tipo_v("Habitación");?></td>
								<td><?php echo $representantes->get_nro_representantes();?></td>
							</tr>
						</tbody>
						<tbody>
					</table>
				</div>
			</div>


			<!-- datos de la gráfica -->
			<script type="text/javascript" defer>
				const tipo_vivienda = document.getElementById('tipo_vivienda');

			  new Chart(tipo_vivienda, {
			    type: 'doughnut',
			    data: {
			      datasets: [{
			        label: 'Nro. de representantes',
			        data: [
			        	<?php echo $representantes->get_nro_tipo_v("Casa");?>,
			        	<?php echo $representantes->get_nro_tipo_v("Apartamento");?>,
			        	<?php echo $representantes->get_nro_tipo_v("Rancho");?>,
			        	<?php echo $representantes->get_nro_tipo_v("Quinta");?>,
			        	<?php echo $representantes->get_nro_tipo_v("Habitación");?>,
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

<!-- Estudiantes por género (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Representantes según las condiciones de su vivienda</p>
		</div>
		<div class="card-body">
			<!-- Estudiantes por género (general) -->
			<div class="row">
				<div class="col-5 mx-auto mb-3">
					<canvas id="cond_vivienda" class="mx-auto"></canvas>
				</div>
				<div class="col-12">
					
					<table class="table table-sm table-bordered table-striped table-responsive">
						<thead>
							<tr>
								<th><span class="badge" style="background: #36a2eb;"> </span> Buena</th>
								<th><span class="badge" style="background: #ff6384;"> </span> Regular</th>
								<th><span class="badge" style="background: #ff9f40;"> </span> Mala</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $representantes->get_nro_condicion_v("Buena");?></td>
								<td><?php echo $representantes->get_nro_condicion_v("Regular");?></td>
								<td><?php echo $representantes->get_nro_condicion_v("Mala");?></td>
								<td><?php echo $representantes->get_nro_representantes();?></td>
							</tr>
						</tbody>
						<tbody>
					</table>
				</div>
			</div>


			<!-- datos de la gráfica -->
			<script type="text/javascript" defer>
				const cond_vivienda = document.getElementById('cond_vivienda');

			  new Chart(cond_vivienda, {
			    type: 'doughnut',
			    data: {
			      datasets: [{
			        label: 'Nro. de representantes',
			        data: [
			        	<?php echo $representantes->get_nro_condicion_v("Buena");?>,
			        	<?php echo $representantes->get_nro_condicion_v("Regular");?>,
			        	<?php echo $representantes->get_nro_condicion_v("Mala");?>,
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

<!-- Estudiantes por género (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Representantes según la tenencia de su vivienda</p>
		</div>
		<div class="card-body">
			<!-- Estudiantes por género (general) -->
			<div class="row">
				<div class="col-5 mx-auto mb-3">
					<canvas id="tenencia_vivienda" class="mx-auto"></canvas>
				</div>
				<div class="col-12">
					
					<table class="table table-sm table-bordered table-striped table-responsive">
						<thead>
							<tr>
								<th><span class="badge" style="background: #36a2eb;"> </span> Propia</th>
								<th><span class="badge" style="background: #ff6384;"> </span> Alquilada</th>
								<th><span class="badge" style="background: #ff9f40;"> </span> Prestada</th>
								<th><span class="badge" style="background: #ffcd56;"> </span> Otra</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $representantes->get_nro_tenencia_v("Propia");?></td>
								<td><?php echo $representantes->get_nro_tenencia_v("Alquilada");?></td>
								<td><?php echo $representantes->get_nro_tenencia_v("Prestada");?></td>
								<td><?php echo $representantes->get_nro_tenencia_v("Otra");?></td>
								<td><?php echo $representantes->get_nro_representantes();?></td>
							</tr>
						</tbody>
						<tbody>
					</table>
				</div>
			</div>


			<!-- datos de la gráfica -->
			<script type="text/javascript" defer>
				const tenencia_vivienda = document.getElementById('tenencia_vivienda');

			  new Chart(tenencia_vivienda, {
			    type: 'doughnut',
			    data: {
			      datasets: [{
			        label: 'Nro. de representantes',
			        data: [
			        	<?php echo $representantes->get_nro_tenencia_v("Propia");?>,
			        	<?php echo $representantes->get_nro_tenencia_v("Alquilada");?>,
			        	<?php echo $representantes->get_nro_tenencia_v("Prestada");?>,
			        	<?php echo $representantes->get_nro_tenencia_v("Otra");?>,
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


		


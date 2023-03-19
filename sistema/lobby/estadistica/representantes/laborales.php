

<!-- Estudiantes por género (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Representantes que cuentan con empleo</p>
		</div>
		<div class="card-body">
			<!-- Estudiantes por género (general) -->
			<div class="row">
				<div class="col-5 mx-auto mb-3">
					<canvas id="r_empleados" class="mx-auto"></canvas>
				</div>
				<div class="col-12">
					
					<table class="table table-sm table-bordered table-striped table-responsive">
						<thead>
							<tr>
								<th><span class="badge" style="background: #36a2eb;"> </span> Trabaja</th>
								<th><span class="badge" style="background: #ff6384;"> </span> No trabaja</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $representantes->get_nro_r_empleados();?></td>
								<td><?php echo $representantes->get_nro_representantes() - $representantes->get_nro_r_empleados();?></td>
								<td><?php echo $representantes->get_nro_representantes();?></td>
							</tr>
						</tbody>
						<tbody>
					</table>
				</div>
			</div>


			<!-- datos de la gráfica -->
			<script type="text/javascript" defer>
				const r_empleados = document.getElementById('r_empleados');

			  new Chart(r_empleados, {
			    type: 'doughnut',
			    data: {
			      datasets: [{
			        label: 'Nro. de representantes',
			        data: [
								<?php echo $representantes->get_nro_r_empleados();?>,
								<?php echo $representantes->get_nro_representantes() - $representantes->get_nro_r_empleados();?>,
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
			<p class="h6">Representantes por remuneración</p>
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
								<th><span class="badge" style="background: #36a2eb;"> </span> Sin sueldo</th>
								<th><span class="badge" style="background: #ff6384;"> </span> 1 sueldo</th>
								<th><span class="badge" style="background: #ff9f40;"> </span> Al menos 2 sueldos</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $representantes->get_nro_sueldos_rem(0,true);?></td>
								<td><?php echo $representantes->get_nro_sueldos_rem(1,true);?></td>
								<td><?php echo $representantes->get_nro_sueldos_rem(2,false);?></td>
								<td><?php echo $representantes->get_nro_r_empleados();?></td>
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
			        	<?php echo $representantes->get_nro_sueldos_rem(1);?>,
			        	<?php echo $representantes->get_nro_sueldos_rem(1);?>,
			        	<?php echo $representantes->get_nro_sueldos_rem(1);?>,
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
			<p class="h6">Representantes por tipo de remuneración</p>
		</div>
		<div class="card-body">
			<!-- Estudiantes por género (general) -->
			<div class="row">
				<div class="col-5 mx-auto mb-3">
					<canvas id="tipo_remuneracion" class="mx-auto"></canvas>
				</div>
				<div class="col-12">
					
					<table class="table table-sm table-bordered table-striped table-responsive">
						<thead>
							<tr>
								<th><span class="badge" style="background: #36a2eb;"> </span> Diaria</th>
								<th><span class="badge" style="background: #ff6384;"> </span> Semanal</th>
								<th><span class="badge" style="background: #ff9f40;"> </span> Quincenal</th>
								<th><span class="badge" style="background: #ffcd56;"> </span> Mensual</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $representantes->get_nro_frec_rem("Diaria");?></td>
								<td><?php echo $representantes->get_nro_frec_rem("Semanal");?></td>
								<td><?php echo $representantes->get_nro_frec_rem("Quincenal");?></td>
								<td><?php echo $representantes->get_nro_frec_rem("Mensual");?></td>
								<td><?php echo $representantes->get_nro_r_empleados();?></td>
							</tr>
						</tbody>
						<tbody>
					</table>
				</div>
			</div>


			<!-- datos de la gráfica -->
			<script type="text/javascript" defer>
				const tipo_remuneracion = document.getElementById('tipo_remuneracion');

			  new Chart(tipo_remuneracion, {
			    type: 'doughnut',
			    data: {
			      datasets: [{
			        label: 'Nro. de representantes',
			        data: [
			        	<?php echo $representantes->get_nro_frec_rem("Diaria");?>,
			        	<?php echo $representantes->get_nro_frec_rem("Semanal");?>,
			        	<?php echo $representantes->get_nro_frec_rem("Quincenal");?>,
			        	<?php echo $representantes->get_nro_frec_rem("Mensual");?>,
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


		


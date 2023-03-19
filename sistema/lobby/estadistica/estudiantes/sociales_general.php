<!-- Estudiantes por género (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Estudiantes que cuentan con canaima (Global).</p>
		</div>
		<div class="card-body">
			<!-- Estudiantes con canaima (general) -->
			<div class="row">
				<div class="col-5 mx-auto mb-3">
					<canvas id="t_canaima_general" class="mx-auto"></canvas>
				</div>
				<div class="col-12">					
					<table class="table table-sm table-bordered table-striped table-responsive">
						<thead>
							<tr>
								<th><span class="badge" style="background: #36a2eb;"> </span> Si tiene</th>
								<th><span class="badge" style="background: #ff6384;"> </span> No tiene</th>
								<th>Total de estudiantes</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $estudiantes->get_nro_e_c_canaima();?></td>
								<td><?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_e_c_canaima();?></td>
								<td><?php echo $estudiantes->get_nro_estudiantes();?></td>
							</tr>
						</tbody>
						<tbody>
					</table>
				</div>
			</div>


			<!-- datos de la gráfica -->
			<script type="text/javascript" defer>
				const t_canaima_general = document.getElementById('t_canaima_general');

			  new Chart(t_canaima_general, {
			    type: 'doughnut',
			    data: {
			      datasets: [{
			        label: 'Número de estudiantes',
			        data: [
			        	<?php echo $estudiantes->get_nro_e_c_canaima();?>,
								<?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_e_c_canaima();?>,
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
			<p class="h6">Estudiantes que cuentan con acceso a internet (Global).</p>
		</div>
		<div class="card-body">
			<!-- Estudiantes con acceso a internet (general) -->
			<div class="row">
				<div class="col-5 mx-auto mb-3">
					<canvas id="t_internet_general" class="mx-auto"></canvas>
				</div>
				<div class="col-12">					
					<table class="table table-sm table-bordered table-striped table-responsive">
						<thead>
							<tr>
								<th><span class="badge" style="background: #36a2eb;"> </span> Si tiene</th>
								<th><span class="badge" style="background: #ff6384;"> </span> No tiene</th>
								<th>Total de estudiantes</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $estudiantes->get_nro_e_c_internet();?></td>
								<td><?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_e_c_internet();?></td>
								<td><?php echo $estudiantes->get_nro_estudiantes();?></td>
							</tr>
						</tbody>
						<tbody>
					</table>
				</div>
			</div>


			<!-- datos de la gráfica -->
			<script type="text/javascript" defer>
				const t_internet_general = document.getElementById('t_internet_general');

			  new Chart(t_internet_general, {
			    type: 'doughnut',
			    data: {
			      datasets: [{
			        label: 'Número de estudiantes',
			        data: [
			        	<?php echo $estudiantes->get_nro_e_c_internet();?>,
								<?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_e_c_internet();?>,
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
			<p class="h6">Estudiantes que cuentan con carnet de la patria (Global).</p>
		</div>
		<div class="card-body">
			<!-- Estudiantes con carnet de la patria (general) -->
			<div class="row">
				<div class="col-5 mx-auto mb-3">
					<canvas id="t_c_patria_general" class="mx-auto"></canvas>
				</div>
				<div class="col-12">					
					<table class="table table-sm table-bordered table-striped table-responsive">
						<thead>
							<tr>
								<th><span class="badge" style="background: #36a2eb;"> </span> Si tiene</th>
								<th><span class="badge" style="background: #ff6384;"> </span> No tiene</th>
								<th>Total de estudiantes</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $estudiantes->get_nro_e_c_carnet_p();?></td>
								<td><?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_e_c_carnet_p();?></td>
								<td><?php echo $estudiantes->get_nro_estudiantes();?></td>
							</tr>
						</tbody>
						<tbody>
					</table>
				</div>
			</div>


			<!-- datos de la gráfica -->
			<script type="text/javascript" defer>
				const t_c_patria_general = document.getElementById('t_c_patria_general');

			  new Chart(t_c_patria_general, {
			    type: 'doughnut',
			    data: {
			      datasets: [{
			        label: 'Número de estudiantes',
			        data: [
			        	<?php echo $estudiantes->get_nro_e_c_carnet_p();?>,
								<?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_e_c_carnet_p();?>,
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



		






		



			


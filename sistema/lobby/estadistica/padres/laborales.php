

<!-- Estudiantes por género (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Padres que cuentan con empleo</p>
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
								<td><?php echo $empleados = $padres->get_nro_p_empleados();?></td>
								<td><?php echo $desempleados = $padres->get_nro_padres() - $padres->get_nro_p_empleados();?></td>
								<td><?php echo $padres->get_nro_padres();?></td>
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
			        label: 'Nro. de padres',
			        data: [
								<?php echo $empleados;?>,
								<?php echo $desempleados;?>,
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
			<p class="h6">Padres que cuentan con empleo por remuneración</p>
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
								<td><?php echo $padres->get_nro_sueldos_rem(0,true);?></td>
								<td><?php echo $padres->get_nro_sueldos_rem(1,true);?></td>
								<td><?php echo $padres->get_nro_sueldos_rem(2,false);?></td>
								<td><?php echo $padres->get_nro_p_empleados();?></td>
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
			        label: 'Nro. de padres',
			        data: [
			        	<?php echo $padres->get_nro_sueldos_rem(1);?>,
			        	<?php echo $padres->get_nro_sueldos_rem(1);?>,
			        	<?php echo $padres->get_nro_sueldos_rem(1);?>,
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
			<p class="h6">Padres por tipo de remuneración</p>
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
								<th><span class="badge" style="background: #4bc0c0;"> </span> Otra</th>
								<th>Total</th>
							</tr>
						</thead>
						<?php
							$nro_padres_empleados = $padres->get_nro_p_empleados();
							$f_pago_diaria = $padres->get_nro_frec_rem("Diaria");
							$f_pago_semanal = $padres->get_nro_frec_rem("Semanal");
							$f_pago_quincenal = $padres->get_nro_frec_rem("Quincenal");
							$f_pago_mensual = $padres->get_nro_frec_rem("Mensual");
							$f_pago_otra = $nro_padres_empleados - ($f_pago_diaria+$f_pago_mensual+$f_pago_semanal+$f_pago_quincenal);
						?>
						<tbody>
							<tr>
								<td><?php echo $f_pago_diaria;?></td>
								<td><?php echo $f_pago_semanal;?></td>
								<td><?php echo $f_pago_quincenal;?></td>
								<td><?php echo $f_pago_mensual;?></td>
								<td><?php echo $f_pago_otra;?></td>
								<td><?php echo $padres->get_nro_p_empleados();?></td>
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
			        label: 'Nro. de padres',
			        data: [
			        	<?php echo $f_pago_diaria;?>,
			        	<?php echo $f_pago_semanal;?>,
			        	<?php echo $f_pago_quincenal;?>,
			        	<?php echo $f_pago_mensual;?>,
			        	<?php echo $f_pago_otra;?>,
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


		


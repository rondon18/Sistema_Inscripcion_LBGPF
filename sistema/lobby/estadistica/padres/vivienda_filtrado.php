

<!-- Estudiantes por género (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Padres por tipo de vivienda</p>
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
								<th><span class="badge" style="background: #9966ff;"> </span> Otro / No especifica</th>
								<th>Total</th>
							</tr>
						</thead>
						<?php
							$nro_padres = $padres->get_nro_padres($anio,$seccion);
							$nro_casa = $padres->get_nro_tipo_v("Casa",$anio,$seccion);
							$nro_apartamento = $padres->get_nro_tipo_v("Apartamento",$anio,$seccion);
							$nro_rancho = $padres->get_nro_tipo_v("Rancho",$anio,$seccion);
							$nro_quinta = $padres->get_nro_tipo_v("Quinta",$anio,$seccion);
							$nro_habitación = $padres->get_nro_tipo_v("Habitación",$anio,$seccion);
							$nro_otro = $nro_padres - ($nro_casa+$nro_apartamento+$nro_rancho+$nro_quinta+$nro_habitación);
						?>
						<tbody>
							<tr>
								<td><?php echo $nro_casa;?></td>
								<td><?php echo $nro_apartamento;?></td>
								<td><?php echo $nro_rancho;?></td>
								<td><?php echo $nro_quinta;?></td>
								<td><?php echo $nro_habitación;?></td>
								<td><?php echo $nro_otro;?></td>
								<td><?php echo $padres->get_nro_padres($anio,$seccion);?></td>
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
			        label: 'Nro. de padres',
			        data: [
			        	<?php echo $nro_casa;?>,
			        	<?php echo $nro_apartamento;?>,
			        	<?php echo $nro_rancho;?>,
			        	<?php echo $nro_quinta;?>,
			        	<?php echo $nro_habitación;?>,
			        	<?php echo $nro_otro;?>,
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
			<p class="h6">Padres por condición de vivienda</p>
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
								<th><span class="badge" style="background: #ffcd56;"> </span> Otro / No especifica</th>
								<th>Total</th>
							</tr>
						</thead>
						<?php
							$cond_v_buena = $padres->get_nro_condicion_v("Buena",$anio,$seccion);
							$cond_v_regular = $padres->get_nro_condicion_v("Regular",$anio,$seccion);
							$cond_v_mala = $padres->get_nro_condicion_v("Mala",$anio,$seccion);
							$cond_v_otra = $nro_padres - ($cond_v_buena + $cond_v_regular + $cond_v_mala);
						?>
						<tbody>
							<tr>
								<td><?php echo $cond_v_buena;?></td>
								<td><?php echo $cond_v_regular;?></td>
								<td><?php echo $cond_v_mala;?></td>
								<td><?php echo $cond_v_otra;?></td>
								<td><?php echo $padres->get_nro_padres($anio,$seccion);?></td>
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
			        	<?php echo $cond_v_buena;?>,
			        	<?php echo $cond_v_regular;?>,
			        	<?php echo $cond_v_mala;?>,
			        	<?php echo $cond_v_otra;?>,
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
			<p class="h6">Padres por tenencia de vivienda</p>
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
								<td><?php echo $padres->get_nro_tenencia_v("Propia",$anio,$seccion);?></td>
								<td><?php echo $padres->get_nro_tenencia_v("Alquilada",$anio,$seccion);?></td>
								<td><?php echo $padres->get_nro_tenencia_v("Prestada",$anio,$seccion);?></td>
								<td><?php echo $padres->get_nro_tenencia_v("Otra",$anio,$seccion);?></td>
								<td><?php echo $padres->get_nro_padres($anio,$seccion);?></td>
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
			        label: 'Nro. de padres',
			        data: [
			        	<?php echo $padres->get_nro_tenencia_v("Propia",$anio,$seccion);?>,
			        	<?php echo $padres->get_nro_tenencia_v("Alquilada",$anio,$seccion);?>,
			        	<?php echo $padres->get_nro_tenencia_v("Prestada",$anio,$seccion);?>,
			        	<?php echo $padres->get_nro_tenencia_v("Otra",$anio,$seccion);?>,
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


		


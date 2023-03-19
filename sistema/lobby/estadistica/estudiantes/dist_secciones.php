
<?php 

	$anio_seccion = strtolower(str_replace(" ", "_", $anio)."_".$seccion);
	
?>


<!-- Contenedor con la grafica y tabla de valores de : -->


<!-- Estudiantes por género (general) -->

<div class="col-12 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Población académica de <?php echo strtolower($anio);?> (<?php echo $seccion;?>).</p>
		</div>
		<div class="card-body">
			<!-- Estudiantes por grado (Global) -->
			<div class="row">
				<div class="col-8 col-md-4 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="dist_<?php echo $anio_seccion;?>" class="mx-auto"></canvas>
				</div>
				<div class="col-12 col-md-8">
					<table class="table table-sm table-bordered table-striped table-responsive">
						<thead>
							<th>Año</th>
							<th>Número de estudiantes</th>
						</thead>
						<tbody>
							<tr>
								<th><span class="badge" style="background: #36a2eb;"> </span> Seccion "A"</th>
								<td><?php echo $estudiantes->get_nro_estudiantes($anio, "A");?></td>
							</tr>
							<tr>
								<th><span class="badge" style="background: #ff6384;"> </span> Seccion "B"</th>
								<td><?php echo $estudiantes->get_nro_estudiantes($anio, "B");?></td>
							</tr>
							<tr>
								<th><span class="badge" style="background: #ff9f40;"> </span> Seccion "C"</th>
								<td><?php echo $estudiantes->get_nro_estudiantes($anio, "C");?></td>
							</tr>
							<tr>
								<th><span class="badge" style="background: #ffcd56;"> </span> Seccion "D"</th>
								<td><?php echo $estudiantes->get_nro_estudiantes($anio, "D");?></td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<th>Total de estudiantes</th>
								<td><?php echo $estudiantes->get_nro_estudiantes($anio);?></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>


			<!-- datos de la gráfica -->
			<script type="text/javascript" defer>
				const dist_<?php echo $anio_seccion;?> = document.getElementById('dist_<?php echo $anio_seccion;?>');

			  new Chart(dist_<?php echo $anio_seccion;?>, {
			    type: 'doughnut',
			    data: {
			      datasets: [{
			        label: 'Número de estudiantes',
			        data: [
								<?php echo $estudiantes->get_nro_estudiantes($anio, "A");?>,
								<?php echo $estudiantes->get_nro_estudiantes($anio, "B");?>,
								<?php echo $estudiantes->get_nro_estudiantes($anio, "C");?>,
								<?php echo $estudiantes->get_nro_estudiantes($anio, "D");?>,
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


		

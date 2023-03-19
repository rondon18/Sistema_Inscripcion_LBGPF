
<?php 

	$anio_seccion = strtolower(str_replace(" ", "_", $anio)."_".$seccion);
	
?>

<!-- Estudiantes por género (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Estudiantes repitentes (Global).</p>
		</div>
		<div class="card-body">
			<!-- Estudiantes por género (general) -->
			<div class="row">
				<div class="col-5 mx-auto mb-3">
					<canvas id="repitentes_<?php echo $anio_seccion;?>" class="mx-auto"></canvas>
				</div>
				<div class="col-12">
					
					<table class="table table-sm table-bordered table-striped table-responsive">
						<thead>
							<tr>
								<th><span class="badge" style="background: #36a2eb;"> </span> Repite</th>
								<th><span class="badge" style="background: #ff6384;"> </span> No repite</th>
								<th>Total de estudiantes</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $estudiantes->get_nro_repitentes($anio,$seccion);?></td>
								<td><?php echo $estudiantes->get_nro_estudiantes($anio,$seccion) - $estudiantes->get_nro_repitentes($anio,$seccion);?></td>
								<td><?php echo $estudiantes->get_nro_estudiantes($anio,$seccion);?></td>
							</tr>
						</tbody>
						<tbody>
					</table>
				</div>
			</div>


			<!-- datos de la gráfica -->
			<script type="text/javascript" defer>
				const repitentes_<?php echo $anio_seccion;?> = document.getElementById('repitentes_<?php echo $anio_seccion;?>');

			  new Chart(repitentes_<?php echo $anio_seccion;?>, {
			    type: 'doughnut',
			    data: {
			      datasets: [{
			        label: 'Número de estudiantes',
			        data: [
			        	<?php echo $estudiantes->get_nro_repitentes($anio,$seccion);?>,
								<?php echo $estudiantes->get_nro_estudiantes($anio,$seccion) - $estudiantes->get_nro_repitentes($anio,$seccion);?>,
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


		


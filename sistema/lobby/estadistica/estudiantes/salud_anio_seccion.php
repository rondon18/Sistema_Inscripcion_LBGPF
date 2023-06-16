
<!-- Estudiantes por género (general) -->
<div class="row my-4">
	<div class="col-3">
		<canvas id="repitentes_general" class="mx-auto"></canvas>
	</div>
	<div class="col-9">
		<p class="h5">Estudiantes repitentes.</p>
		
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th><span class="badge" style="background: #36a2eb;"> </span> Repite</th>
					<th><span class="badge" style="background: #ff6384;"> </span> No repite</th>
					<th>Total de estudiantes</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $estudiantes->get_nro_repitentes();?></td>
					<td><?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_repitentes();?></td>
					<td><?php echo $estudiantes->get_nro_estudiantes();?></td>
				</tr>
			</tbody>
			<tbody>
		</table>
	</div>
</div>


<!-- datos de la gráfica -->
<script type="text/javascript" defer>
	const repitentes_general = document.getElementById('repitentes_general');

  new Chart(repitentes_general, {
    type: 'doughnut',
    data: {
      datasets: [{
        label: 'Número de estudiantes',
        data: [
        	<?php echo $estudiantes->get_nro_repitentes();?>,
					<?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_repitentes();?>,
      	],
        borderWidth: 1
      }]
    },
    options: {
    	responsive: true,
    }
  });
</script>


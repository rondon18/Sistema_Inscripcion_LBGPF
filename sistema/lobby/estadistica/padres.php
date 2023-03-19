
<!-- Contenedor con la grafica y tabla de valores de : -->
<div class="row">
	<div class="col-3">
		<canvas id="grafico1" class="mx-auto"></canvas>
	</div>
	<div class="col-9">
		<p class="h5">Población académica por género.</p>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>item 1</th>
					<th>item 2</th>
					<th>item 3</th>
					<th>item 4</th>
					<th>item 5</th>
					<th>item 6</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>item 1</td>
					<td>item 2</td>
					<td>item 3</td>
					<td>item 4</td>
					<td>item 5</td>
					<td>item 6</td>
				</tr>
				<tr>
					<td>item 1</td>
					<td>item 2</td>
					<td>item 3</td>
					<td>item 4</td>
					<td>item 5</td>
					<td>item 6</td>
				</tr>
				<?php var_dump($estudiantes->get_nro_hembras("Cualquiera","Cualquiera")) ?>
				<?php var_dump($estudiantes->get_nro_varones("Cualquiera","Cualquiera")) ?>
			</tbody>
		</table>
	</div>
</div>

<!-- datos de la gráfica -->
<script type="text/javascript" defer>
	const ctx = document.getElementById('grafico1');

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
    	responsive: true,
    }
  });
</script>
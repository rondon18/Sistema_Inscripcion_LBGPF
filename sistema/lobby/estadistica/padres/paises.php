
<!-- Estudiantes por género (general) -->
<div class="col-md-12 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Padres por país en que residen</p>
		</div>
		<div class="card-body">
			<!-- Estudiantes por género (general) -->
			<div class="row">
				<div class="col-12 col-md-4 mx-auto mb-3">
					<canvas id="paises" class="mx-auto"></canvas>
				</div>
				<div class="col-12 col-md-8">
					<div class="table-responsive">
						<table id="tabla_paises" class="table table-sm table-bordered table-striped">
							<thead class="text-nowrap">
								<tr>
									<th class="text-center">País</th>
									<th class="text-center">Número de padres</th>
								</tr>
							</thead>

							<tbody class="text-nowrap">
								<?php 
									$lista_paises = $padres->get_nro_p_paises(); 
									$i = 0;
								?>
								<?php foreach ($lista_paises as $pais): ?>
									<tr>
										<th>
											<span class="badge" style="background: <?php echo $array_colores[$i];?>;"> </span> 
											<?php echo $pais['pais_residencia']; ?>
										</th>
										<td class="text-center">
											<?php echo $pais['nro_padres'];?>
										</td>
									</tr>
									<?php $i++; ?>
								<?php endforeach ?>
							</tbody>
							<tfoot>
								<tr>
									<th>Total de padres</th>
									<td class="text-center">
										<?php echo $padres->get_nro_padres();?>
									</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>


			<!-- datos de la gráfica -->
			<script type="text/javascript" defer>

				const paises = document.getElementById('paises');

			  new Chart(paises, {
			    type: 'doughnut',
			    data: {
			      datasets: [{
			        label: 'Nro. de padres',
			        data: [
			        	<?php $i = 0; ?>
			        	<?php foreach ($lista_paises as $pais): ?>
									<?php echo $pais['nro_padres'];?>,
									<?php $i++; ?>
								<?php endforeach ?>
			  	],
			        borderWidth: 1,
			        // se establecen manualmente dado que a partir del octavo valor se repiten los colores del primero
			      	backgroundColor: [
			      		<?php

			      			$j = 0;

			      			while ($j <= $i) {
			      				echo '"' . $array_colores[$j]. '"' . ',';
			      				$j++;
			      			}

			      		?>
			      	],
			      }]
			    },
			    options: {
			    	responsive: true,
			    }
			  });

				$(document).ready(function() {
			    $('#tabla_paises').DataTable({
		    		"order": [1, 'desc'],
		        "paging": true,
		        "searching": true,
		        "pageLength": 5,
		        "lengthChange": false,
		        "language": {"url": "../../js/datatables-español.json"},
			    });
				} );
			</script>
		</div>
	</div>
</div>


		


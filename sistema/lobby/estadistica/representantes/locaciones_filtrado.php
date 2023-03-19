
<!-- Estudiantes por género (general) -->
<div class="col-md-12 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Representantes por municipio</p>
		</div>
		<div class="card-body">
			<!-- Estudiantes por género (general) -->
			<div class="row">
				<div class="col-12 col-md-4 mx-auto mb-3">
					<canvas id="locaciones" class="mx-auto"></canvas>
				</div>
				<div class="col-12 col-md-8">
					<div class="table-responsive">
						<table id="tabla_locaciones" class="table table-sm table-bordered table-striped">
							<thead class="text-nowrap">
								<tr>
									<th class="text-center">Municipio</th>
									<th class="text-center">Número de representantes</th>
								</tr>
							</thead>

							<tbody class="text-nowrap">
								<tr>
									<th><span class="badge" style="background: #36a2eb;"> </span> Alberto Adriani</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Alberto Adriani",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #ff6384;"> </span> Andrés Bello</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Andrés Bello",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #ff9f40;"> </span> Antonio Pinto Salinas</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Antonio Pinto Salinas",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #ffcd56;"> </span> Aricagua</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Aricagua",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #4bc0c0;"> </span> Arzobispo Chacón</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Arzobispo Chacón",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #9966ff;"> </span> Campo Elías</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Campo Elías",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #c9cbcf;"> </span> Caracciolo Parra Olmedo</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Caracciolo Parra Olmedo",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #a05d89;"> </span> Cardenal Quintero</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Cardenal Quintero",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #2f9cb9;"> </span> Guaraque</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Guaraque",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #ff6f69;"> </span> Julio César Salas</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Julio César Salas",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #77c9d4;"> </span> Justo Briceño</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Justo Briceño",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #b3d3c6;"> </span> Libertador</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Libertador",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #35518f;"> </span> Miranda</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Miranda",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #669bbc;"> </span> Obispo Ramos de Lora</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Obispo Ramos de Lora",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #3d3e3e;"> </span> Padre Noguera</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Padre Noguera",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #7dbbc3;"> </span> Pueblo Llano</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Pueblo Llano",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #a64b3c;"> </span> Rangel</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Rangel",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #f5e6ca;"> </span> Rivas Dávila</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Rivas Dávila",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #029386;"> </span> Santos Marquina</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Santos Marquina",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #ff00cc;"> </span> Sucre</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Sucre",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #8a3cc3;"> </span> Tovar</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Tovar",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #d98247;"> </span> Tulio Febres Cordero</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Tulio Febres Cordero",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #41ab7b;"> </span> Zea</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Zea",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #5452ff;"> </span> Otro</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Otro",$anio,$seccion);?>
									</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th>Total de representantes</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_representantes($anio,$seccion);?>
									</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>


			<!-- datos de la gráfica -->
			<script type="text/javascript" defer>

				const locaciones = document.getElementById('locaciones');

			  new Chart(locaciones, {
			    type: 'doughnut',
			    data: {
			      datasets: [{
			        label: 'Nro. de representantes',
			        data: [
								<?php echo $representantes->get_nro_r_municipio("Alberto Adriani",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Andrés Bello",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Antonio Pinto Salinas",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Aricagua",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Arzobispo Chacón",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Campo Elías",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Caracciolo Parra Olmedo",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Cardenal Quintero",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Guaraque",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Julio César Salas",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Justo Briceño",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Libertador",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Miranda",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Obispo Ramos de Lora",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Padre Noguera",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Pueblo Llano",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Rangel",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Rivas Dávila",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Santos Marquina",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Sucre",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Tovar",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Tulio Febres Cordero",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Zea",$anio,$seccion);?>,
								<?php echo $representantes->get_nro_r_municipio("Otro",$anio,$seccion);?>,
			  	],
			        borderWidth: 1,
			        // se establecen manualmente dado que a partir del octavo valor se repiten los colores del primero
			      	backgroundColor: [
								"#36a2eb",
								"#ff6384",
								"#ff9f40",
								"#ffcd56",
								"#4bc0c0",
								"#9966ff",
								"#c9cbcf",
								"#a05d89",
								"#2f9cb9",
								"#ff6f69",
								"#77c9d4",
								"#b3d3c6",
								"#35518f",
								"#669bbc",
								"#3d3e3e",
								"#7dbbc3",
								"#a64b3c",
								"#f5e6ca",
								"#029386",
								"#ff00cc",
								"#8a3cc3",
								"#d98247",
								"#41ab7b",
								"#5452ff",
			      	],
			      }]
			    },
			    options: {
			    	responsive: true,
			    }
			  });

				$(document).ready(function() {
			    $('#tabla_locaciones').DataTable({
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


		


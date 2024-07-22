
<!-- Estudiantes por género (general) -->
<div class="col-md-12 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Representantes según el municipio en que viven</p>
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
										<?php echo $representantes->get_nro_r_municipio("AAD");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #ff6384;"> </span> Andrés Bello</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("ABE");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #ff9f40;"> </span> Antonio Pinto Salinas</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("APS");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #ffcd56;"> </span> Aricagua</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("ARI");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #4bc0c0;"> </span> Arzobispo Chacón</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("ACH");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #9966ff;"> </span> Campo Elías</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("CEL");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #c9cbcf;"> </span> Caracciolo Parra Olmedo</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("CPO");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #a05d89;"> </span> Cardenal Quintero</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("CQU");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #2f9cb9;"> </span> Guaraque</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("GUA");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #ff6f69;"> </span> Julio César Salas</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("JCS");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #77c9d4;"> </span> Justo Briceño</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("JBR");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #b3d3c6;"> </span> Libertador</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("LIB");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #35518f;"> </span> Miranda</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("MIR");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #669bbc;"> </span> Obispo Ramos de Lora</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("ORL");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #3d3e3e;"> </span> Padre Noguera</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("PNO");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #7dbbc3;"> </span> Pueblo Llano</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("PLL");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #a64b3c;"> </span> Rangel</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("RAN");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #f5e6ca;"> </span> Rivas Dávila</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("RDA");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #029386;"> </span> Santos Marquina</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("SMA");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #ff00cc;"> </span> Sucre</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("SUC");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #8a3cc3;"> </span> Tovar</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("TOV");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #d98247;"> </span> Tulio Febres Cordero</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("TFC");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #41ab7b;"> </span> Zea</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("ZEA");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #5452ff;"> </span> Otro</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_r_municipio("Otro");?>
									</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th>Total de representantes</th>
									<td class="text-center">
										<?php echo $representantes->get_nro_representantes();?>
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
								<?php echo $representantes->get_nro_r_municipio("AAD");?>,
								<?php echo $representantes->get_nro_r_municipio("ABE");?>,
								<?php echo $representantes->get_nro_r_municipio("APS");?>,
								<?php echo $representantes->get_nro_r_municipio("ARI");?>,
								<?php echo $representantes->get_nro_r_municipio("ACH");?>,
								<?php echo $representantes->get_nro_r_municipio("CEL");?>,
								<?php echo $representantes->get_nro_r_municipio("CPO");?>,
								<?php echo $representantes->get_nro_r_municipio("CQU");?>,
								<?php echo $representantes->get_nro_r_municipio("GUA");?>,
								<?php echo $representantes->get_nro_r_municipio("JCS");?>,
								<?php echo $representantes->get_nro_r_municipio("JBR");?>,
								<?php echo $representantes->get_nro_r_municipio("LIB");?>,
								<?php echo $representantes->get_nro_r_municipio("MIR");?>,
								<?php echo $representantes->get_nro_r_municipio("ORL");?>,
								<?php echo $representantes->get_nro_r_municipio("PNO");?>,
								<?php echo $representantes->get_nro_r_municipio("PLL");?>,
								<?php echo $representantes->get_nro_r_municipio("RAN");?>,
								<?php echo $representantes->get_nro_r_municipio("RDA");?>,
								<?php echo $representantes->get_nro_r_municipio("SMA");?>,
								<?php echo $representantes->get_nro_r_municipio("SUC");?>,
								<?php echo $representantes->get_nro_r_municipio("TOV");?>,
								<?php echo $representantes->get_nro_r_municipio("TFC");?>,
								<?php echo $representantes->get_nro_r_municipio("ZEA");?>,
								<?php echo $representantes->get_nro_r_municipio("Otro");?>,
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


		


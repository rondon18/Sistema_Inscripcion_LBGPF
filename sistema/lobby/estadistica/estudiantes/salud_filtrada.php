<?php 

	$anio_seccion = strtolower(str_replace(" ", "_", $anio)."_".$seccion);

?>

<!-- Estudiantes por IMC (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Estudiantes que cuentan con indice de masa corporal saludable (<?php echo $anio;?>).</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="imc_s_<?php echo $anio_seccion;?>" class="mx-auto"></canvas>
				</div>
				<div class="col-12">
					<div class="table-responsive">
						
					</div>
					<table class="table table-sm table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th><span class="badge" style="background: #36a2eb;"> </span> Si tiene</th>
								<th><span class="badge" style="background: #ff6384;"> </span> No tiene</th>
								<th>Total de estudiantes</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $estudiantes->get_nro_imc_saludable($anio,$seccion);?></td>
								<td><?php echo $estudiantes->get_nro_estudiantes($anio,$seccion) - $estudiantes->get_nro_imc_saludable($anio,$seccion);?></td>
								<td><?php echo $estudiantes->get_nro_estudiantes($anio,$seccion);?></td>
							</tr>
						</tbody>
						<tbody>
					</table>
				</div>
				<!-- datos de la gráfica -->
				<script type="text/javascript" defer>
					const imc_s_<?php echo $anio_seccion;?> = document.getElementById('imc_s_<?php echo $anio_seccion;?>');

				  new Chart(imc_s_<?php echo $anio_seccion;?>, {
				    type: 'doughnut',
				    data: {
				      datasets: [{
				        label: 'Número de estudiantes',
				        data: [
				        	<?php echo $estudiantes->get_nro_imc_saludable($anio,$seccion);?>,
									<?php echo $estudiantes->get_nro_estudiantes($anio,$seccion) - $estudiantes->get_nro_imc_saludable($anio,$seccion);?>,
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
</div>

<!-- Estudiantes con padecimientos (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Estudiantes que padecen alguna enfermedad (<?php echo $anio;?>).</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="enfermedad_<?php echo $anio_seccion;?>" class="mx-auto"></canvas>
				</div>
				<div class="col-12">
					<div class="table-responsive">
						<table class="table table-sm table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th><span class="badge" style="background: #36a2eb;"> </span> Si tiene</th>
									<th><span class="badge" style="background: #ff6384;"> </span> No tiene</th>
									<th>Total de estudiantes</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $estudiantes->get_nro_e_c_padecimiento($anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes($anio,$seccion) - $estudiantes->get_nro_e_c_padecimiento($anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes($anio,$seccion);?></td>
								</tr>
							</tbody>
							<tbody>
						</table>						
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const enfermedad_<?php echo $anio_seccion;?> = document.getElementById('enfermedad_<?php echo $anio_seccion;?>');

						  new Chart(enfermedad_<?php echo $anio_seccion;?>, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
						        	<?php echo $estudiantes->get_nro_e_c_padecimiento($anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_estudiantes($anio,$seccion) - $estudiantes->get_nro_e_c_padecimiento($anio,$seccion);?>,
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
		</div>
	</div>
</div>

<!-- Estudiantes por tipo de sangre (general) -->
<div class="col-md-12 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Estudiantes según su tipo de sangre (<?php echo $anio;?>).</p>
		</div>
		<div class="card-body">
			<!-- Estudiantes con carnet de la patria (general) -->
			<div class="row">
				<div class="col-8 col-md-4 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="t_sangre_<?php echo $anio_seccion;?>" class="mx-auto"></canvas>
				</div>
				<div class="col-12 col-md-8">
					<div class="table-responsive">
						<table class="table table-sm table-bordered table-striped">
							<thead class="text-nowrap">
								<tr>
									<th class="text-center">Grupo sanguíneo</th>
									<th class="text-center">Número de estudiantes</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th><span class="badge" style="background: #36a2eb;"> </span> A+</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_tipo_sangre("A+",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #ff6384;"> </span> A-</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_tipo_sangre("A-",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #ff9f40;"> </span> B+</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_tipo_sangre("B+",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #ffcd56;"> </span> B-</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_tipo_sangre("B-",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #4bc0c0;"> </span> AB+</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_tipo_sangre("AB+",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #9966ff;"> </span> AB-</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_tipo_sangre("AB-",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #c9cbcf;"> </span> O+</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_tipo_sangre("O+",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #a05d89;"> </span> O-</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_tipo_sangre("O-",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #2f9cb9;"> </span> Desconocido</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_tipo_sangre("NCN",$anio,$seccion);?>
									</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th>Total de estudiantes</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_estudiantes($anio,$seccion);?>
									</td>
								</tr>
							</tfoot>
						</table>
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const t_sangre_<?php echo $anio_seccion;?> = document.getElementById('t_sangre_<?php echo $anio_seccion;?>');

						  new Chart(t_sangre_<?php echo $anio_seccion;?>, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_tipo_sangre("A+",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_tipo_sangre("A-",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_tipo_sangre("B+",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_tipo_sangre("B-",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_tipo_sangre("AB+",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_tipo_sangre("AB-",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_tipo_sangre("O+",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_tipo_sangre("O-",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_tipo_sangre("NCN",$anio,$seccion);?>,
						      	],
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


		</div>
	</div>
</div>



<!-- Estudiantes por lateralidad (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Estudiantes según su lateralidad (<?php echo $anio;?>).</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="lateralidad_<?php echo $anio_seccion;?>" class="mx-auto"></canvas>
				</div>
				<div class="col-12">
					<div class="table-responsive">
						<table class="table table-sm table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th><span class="badge" style="background: #36a2eb;"> </span> Zurdo</th>
									<th><span class="badge" style="background: #ff6384;"> </span> Diestro</th>
									<th><span class="badge" style="background: #ff9f40;;"> </span> Ambidextro</th>
									<th>Total de estudiantes</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $estudiantes->get_nro_lateralidad("Zurdo",$anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_lateralidad("Diestro",$anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_lateralidad("Ambidextro",$anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes($anio,$seccion);?></td>
								</tr>
							</tbody>
							<tbody>
						</table>						
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const lateralidad_<?php echo $anio_seccion;?> = document.getElementById('lateralidad_<?php echo $anio_seccion;?>');

						  new Chart(lateralidad_<?php echo $anio_seccion;?>, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_lateralidad("Zurdo");?>,
											<?php echo $estudiantes->get_nro_lateralidad("Diestro");?>,
											<?php echo $estudiantes->get_nro_lateralidad("Ambidextro");?>,
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
		</div>
	</div>
</div>



<!-- Vacunados contra el covid-19 (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Estudiantes vacunados contra el Covid-19 (<?php echo $anio;?>).</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="vac_covid_19_<?php echo $anio_seccion;?>" class="mx-auto"></canvas>
				</div>
				<div class="col-12">
					<div class="table-responsive">
						<table class="table table-sm table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th><span class="badge" style="background: #36a2eb;"> </span> Vacunados</th>
									<th><span class="badge" style="background: #ff6384;"> </span> No vacunados</th>
									<th>Total de estudiantes</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $estudiantes->get_nro_vacunados_c19("Cualquiera",$anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes($anio,$seccion) - $estudiantes->get_nro_vacunados_c19("Cualquiera",$anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes($anio,$seccion);?></td>
								</tr>
							</tbody>
							<tbody>
						</table>						
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const vac_covid_19_<?php echo $anio_seccion;?> = document.getElementById('vac_covid_19_<?php echo $anio_seccion;?>');

						  new Chart(vac_covid_19_<?php echo $anio_seccion;?>, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_vacunados_c19("Cualquiera",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_estudiantes($anio,$seccion) - $estudiantes->get_nro_vacunados_c19("Cualquiera",$anio,$seccion);?>,
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
		</div>
	</div>
</div>



<!-- Estudiantes por vacuna contra el covid-19 aplicada (general) -->
<div class="col-md-12 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Estudiantes según la vacuna contra el Covid-19 aplicada (<?php echo $anio;?>).</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-4 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="vac_apl_covid_19_<?php echo $anio_seccion;?>" class="mx-auto"></canvas>
				</div>
				<div class="col-12 col-md-8">
					<div class="table-responsive">
						<table class="table table-sm table-bordered table-striped">
							<thead class="text-nowrap">
								<tr>
									<th class="text-center">Nombre de la vacuna</th>
									<th class="text-center">Número de estudiantes</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th><span class="badge" style="background: #36a2eb;"> </span> Pfizer/BioNTech</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("Pfizer/BioNTech",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #ff6384;"> </span> Moderna</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("Moderna",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #ff9f40;"> </span> AztraZeneca</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("AztraZeneca",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #ffcd56;"> </span> Janssen</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("Janssen",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #4bc0c0;"> </span> Sinopharm</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("Sinopharm",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #9966ff;"> </span> Sinovac</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("Sinovac",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #c9cbcf;"> </span> Bharat</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("Bharat",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #a05d89;"> </span> CanSinoBIO</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("CanSinoBIO",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #2f9cb9;"> </span> Valneva</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("Valneva",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #7fdbff;"> </span> Novavax</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("Novavax",$anio,$seccion);?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #d688cb ;"> </span> Otra vacuna</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("Otra",$anio,$seccion);?>
									</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th>Total de estudiantes vacunados</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("Cualquiera",$anio,$seccion);?>
									</td>
								</tr>
							</tfoot>
						</table>					
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const vac_apl_covid_19_<?php echo $anio_seccion;?> = document.getElementById('vac_apl_covid_19_<?php echo $anio_seccion;?>');

						  new Chart(vac_apl_covid_19_<?php echo $anio_seccion;?>, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_vacunados_c19("Pfizer/BioNTech",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_vacunados_c19("Moderna",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_vacunados_c19("AztraZeneca",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_vacunados_c19("Janssen",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_vacunados_c19("Sinopharm",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_vacunados_c19("Sinovac",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_vacunados_c19("Bharat",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_vacunados_c19("CanSinoBIO",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_vacunados_c19("Valneva",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_vacunados_c19("Novavax",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_vacunados_c19("Otra",$anio,$seccion);?>,
						      	],
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
											"#7fdbff",
											"#d688cb",
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
		</div>
	</div>
</div>



<!-- Estudiantes por dosis recibidas contra el covid-19 (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Estudiantes según dosis de vacuna contra el Covid-19 aplicadas (<?php echo $anio;?>).</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="dosis_anti_covid_19_<?php echo $anio_seccion;?>" class="mx-auto"></canvas>
				</div>
				<div class="col-12">
					<div class="table-responsive">
						<table class="table table-sm table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th><span class="badge" style="background: #36a2eb;"> </span> 1 Dosis</th>
									<th><span class="badge" style="background: #ff6384;"> </span> 2 Dosis</th>
									<th><span class="badge" style="background: #ff9f40;"> </span> 3 o más dosis</th>
									<th><span class="badge" style="background: #ffcd56;"> </span> Ninguna dosis</th>
									<th>Total de estudiantes</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $estudiantes->get_nro_dosis_anti_c19(1,true,$anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_dosis_anti_c19(2,true,$anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_dosis_anti_c19(3,false,$anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_dosis_anti_c19(0,true,$anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes($anio,$seccion);?></td>
								</tr>
							</tbody>
							<tbody>
						</table>						
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const dosis_anti_covid_19_<?php echo $anio_seccion;?> = document.getElementById('dosis_anti_covid_19_<?php echo $anio_seccion;?>');

						  new Chart(dosis_anti_covid_19_<?php echo $anio_seccion;?>, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_dosis_anti_c19(1,true,$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_dosis_anti_c19(2,true,$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_dosis_anti_c19(3,false,$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_dosis_anti_c19(0,true,$anio,$seccion);?>,
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
		</div>
	</div>
</div>


<!-- Estudiantes con dieta especial (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Estudiantes que cuentan con una dieta especial (<?php echo $anio;?>).</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="dieta_especial_<?php echo $anio_seccion;?>" class="mx-auto"></canvas>
				</div>
				<div class="col-12">
					<div class="table-responsive">
						<table class="table table-sm table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th><span class="badge" style="background: #36a2eb;"> </span> Tiene dieta</th>
									<th><span class="badge" style="background: #ff6384;"> </span> No 
									tiene dieta</th>
									<th>Total de estudiantes</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $estudiantes->get_nro_e_c_dieta_e($anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes($anio,$seccion) - $estudiantes->get_nro_e_c_dieta_e($anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes($anio,$seccion);?></td>
								</tr>
							</tbody>
							<tbody>
						</table>						
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const dieta_especial_<?php echo $anio_seccion;?> = document.getElementById('dieta_especial_<?php echo $anio_seccion;?>');

						  new Chart(dieta_especial_<?php echo $anio_seccion;?>, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_e_c_dieta_e($anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_estudiantes($anio,$seccion) - $estudiantes->get_nro_e_c_dieta_e($anio,$seccion);?>,
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
		</div>
	</div>
</div>


<!-- Estudiantes con algún padecimiento (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Estudiantes que tienen algún padecimiento (<?php echo $anio;?>).</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="padecimiento_<?php echo $anio_seccion;?>" class="mx-auto"></canvas>
				</div>
				<div class="col-12">
					<div class="table-responsive">
						<table class="table table-sm table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th><span class="badge" style="background: #36a2eb;"> </span> Poseen</th>
									<th><span class="badge" style="background: #ff6384;"> </span> No poseen</th>
									<th>Total de estudiantes</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $estudiantes->get_nro_e_c_padecimiento($anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes($anio,$seccion) - $estudiantes->get_nro_e_c_padecimiento($anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes($anio,$seccion);?></td>
								</tr>
							</tbody>
							<tbody>
						</table>						
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const padecimiento_<?php echo $anio_seccion;?> = document.getElementById('padecimiento_<?php echo $anio_seccion;?>');

						  new Chart(padecimiento_<?php echo $anio_seccion;?>, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_e_c_padecimiento($anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_estudiantes($anio,$seccion) - $estudiantes->get_nro_e_c_padecimiento($anio,$seccion);?>,
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
		</div>
	</div>
</div>


<!-- Estudiantes con algún impedimento físico (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Estudiantes con algún impedimento físico (<?php echo $anio;?>).</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="impedimento_<?php echo $anio_seccion;?>" class="mx-auto"></canvas>
				</div>
				<div class="col-12">
					<div class="table-responsive">
						<table class="table table-sm table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th><span class="badge" style="background: #36a2eb;"> </span> Tiene</th>
									<th><span class="badge" style="background: #ff6384;"> </span> No tiene</th>
									<th>Total de estudiantes</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $estudiantes->get_nro_e_c_impedimento_f($anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes($anio,$seccion) - $estudiantes->get_nro_e_c_impedimento_f($anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes($anio,$seccion);?></td>
								</tr>
							</tbody>
							<tbody>
						</table>						
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const impedimento_<?php echo $anio_seccion;?> = document.getElementById('impedimento_<?php echo $anio_seccion;?>');

						  new Chart(impedimento_<?php echo $anio_seccion;?>, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_e_c_impedimento_f($anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_estudiantes($anio,$seccion) - $estudiantes->get_nro_e_c_impedimento_f($anio,$seccion);?>,
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
		</div>
	</div>
</div>


<!-- Estudiantes con alguna necesidad educativa especial (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Estudiantes con alguna necesidad educativa especial (<?php echo $anio;?>).</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="necesidad_educativa_<?php echo $anio_seccion;?>" class="mx-auto"></canvas>
				</div>
				<div class="col-12">
					<div class="table-responsive">
						<table class="table table-sm table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th><span class="badge" style="background: #36a2eb;"> </span> Tiene</th>
									<th><span class="badge" style="background: #ff6384;"> </span> No tiene</th>
									<th>Total de estudiantes</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $estudiantes->get_nro_e_c_n_educativa($anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes($anio,$seccion) - $estudiantes->get_nro_e_c_n_educativa($anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes($anio,$seccion);?></td>
								</tr>
							</tbody>
							<tbody>
						</table>						
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const necesidad_educativa_<?php echo $anio_seccion;?> = document.getElementById('necesidad_educativa_<?php echo $anio_seccion;?>');

						  new Chart(necesidad_educativa_<?php echo $anio_seccion;?>, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_e_c_n_educativa($anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_estudiantes($anio,$seccion) - $estudiantes->get_nro_e_c_n_educativa($anio,$seccion);?>,
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
		</div>
	</div>
</div>


<!-- Estudiantes por condición de la vista (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Estudiantes por condición de la vista (<?php echo $anio;?>).</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="cond_vista_<?php echo $anio_seccion;?>" class="mx-auto"></canvas>
				</div>
				<div class="col-12">
					<div class="table-responsive">
						<table class="table table-sm table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th><span class="badge" style="background: #36a2eb;"> </span> Buena</th>
									<th><span class="badge" style="background: #ff6384;"> </span> Regular</th>
									<th><span class="badge" style="background: #ff9f40;"> </span> Mala</th>
									<th>Total de estudiantes</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $estudiantes->get_nro_c_vista("Buena",$anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_c_vista("Regular",$anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_c_vista("Mala",$anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes($anio,$seccion);?></td>
								</tr>
							</tbody>
							<tbody>
						</table>						
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const cond_vista_<?php echo $anio_seccion;?> = document.getElementById('cond_vista_<?php echo $anio_seccion;?>');

						  new Chart(cond_vista_<?php echo $anio_seccion;?>, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_c_vista("Buena",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_c_vista("Regular",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_c_vista("Mala",$anio,$seccion);?>,
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
		</div>
	</div>
</div>


<!-- Estudiantes por condición dental (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Estudiantes por condición dental (<?php echo $anio;?>).</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="cond_dental_<?php echo $anio_seccion;?>" class="mx-auto"></canvas>
				</div>
				<div class="col-12">
					<div class="table-responsive">
						<table class="table table-sm table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th><span class="badge" style="background: #36a2eb;"> </span> Buena</th>
									<th><span class="badge" style="background: #ff6384;"> </span> Regular</th>
									<th><span class="badge" style="background: #ff9f40;"> </span> Mala</th>
									<th>Total de estudiantes</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $estudiantes->get_nro_c_dental("Buena",$anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_c_dental("Regular",$anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_c_dental("Mala",$anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes($anio,$seccion);?></td>
								</tr>
							</tbody>
							<tbody>
						</table>						
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const cond_dental_<?php echo $anio_seccion;?> = document.getElementById('cond_dental_<?php echo $anio_seccion;?>');

						  new Chart(cond_dental_<?php echo $anio_seccion;?>, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_c_dental("Buena",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_c_dental("Regular",$anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_c_dental("Mala",$anio,$seccion);?>,
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
		</div>
	</div>
</div>


<!-- Estudiantes con carnet de discapacidad (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Estudiantes con carnet de discapacidad (<?php echo $anio;?>).</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="c_discapacidad_<?php echo $anio_seccion;?>" class="mx-auto"></canvas>
				</div>
				<div class="col-12">
					<div class="table-responsive">
						<table class="table table-sm table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th><span class="badge" style="background: #36a2eb;"> </span> Tiene</th>
									<th><span class="badge" style="background: #ff6384;"> </span> No tiene</th>
									<th>Total de estudiantes</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $estudiantes->get_nro_e_c_carnet_d($anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes($anio,$seccion) - $estudiantes->get_nro_e_c_carnet_d($anio,$seccion);?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes($anio,$seccion);?></td>
								</tr>
							</tbody>
							<tbody>
						</table>						
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const c_discapacidad_<?php echo $anio_seccion;?> = document.getElementById('c_discapacidad_<?php echo $anio_seccion;?>');

						  new Chart(c_discapacidad_<?php echo $anio_seccion;?>, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_e_c_carnet_d($anio,$seccion);?>,
											<?php echo $estudiantes->get_nro_estudiantes($anio,$seccion) - $estudiantes->get_nro_e_c_carnet_d($anio,$seccion);?>,
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
		</div>
	</div>
</div>








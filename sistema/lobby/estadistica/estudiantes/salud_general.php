

<!-- Estudiantes por IMC (general) -->
<div class="col-md-6 p-2 my-4">
	<div class="card">
		<div class="card-header">
			<p class="h6">Estudiantes que cuentan con IMC saludable.</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="imc_s_general" class="mx-auto"></canvas>
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
								<td><?php echo $estudiantes->get_nro_imc_saludable();?></td>
								<td><?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_imc_saludable();?></td>
								<td><?php echo $estudiantes->get_nro_estudiantes();?></td>
							</tr>
						</tbody>
						<tbody>
					</table>
				</div>
				<!-- datos de la gráfica -->
				<script type="text/javascript" defer>
					const imc_s_general = document.getElementById('imc_s_general');

				  new Chart(imc_s_general, {
				    type: 'doughnut',
				    data: {
				      datasets: [{
				        label: 'Número de estudiantes',
				        data: [
				        	<?php echo $estudiantes->get_nro_imc_saludable();?>,
									<?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_imc_saludable();?>,
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
			<p class="h6">Estudiantes que padecen alguna enfermedad.</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="enfermedad_general" class="mx-auto"></canvas>
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
									<td><?php echo $estudiantes->get_nro_e_c_padecimiento();?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_e_c_padecimiento();?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes();?></td>
								</tr>
							</tbody>
							<tbody>
						</table>						
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const enfermedad_general = document.getElementById('enfermedad_general');

						  new Chart(enfermedad_general, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
						        	<?php echo $estudiantes->get_nro_e_c_padecimiento();?>,
											<?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_e_c_padecimiento();?>,
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
			<p class="h6">Estudiantes según su tipo de sangre.</p>
		</div>
		<div class="card-body">
			<!-- Estudiantes con carnet de la patria (general) -->
			<div class="row">
				<div class="col-8 col-md-4 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="t_sangre_general" class="mx-auto"></canvas>
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
										<?php echo $estudiantes->get_nro_tipo_sangre("A+");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #ff6384;"> </span> A-</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_tipo_sangre("A-");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #ff9f40;"> </span> B+</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_tipo_sangre("B+");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #ffcd56;"> </span> B-</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_tipo_sangre("B-");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #4bc0c0;"> </span> AB+</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_tipo_sangre("AB+");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #9966ff;"> </span> AB-</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_tipo_sangre("AB-");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #c9cbcf;"> </span> O+</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_tipo_sangre("O+");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #a05d89;"> </span> O-</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_tipo_sangre("O-");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #2f9cb9;"> </span> Desconocido</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_tipo_sangre("NCNC");?>
									</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th>Total de estudiantes</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_estudiantes();?>
									</td>
								</tr>
							</tfoot>
						</table>
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const t_sangre_general = document.getElementById('t_sangre_general');

						  new Chart(t_sangre_general, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_tipo_sangre("A+");?>,
											<?php echo $estudiantes->get_nro_tipo_sangre("A-");?>,
											<?php echo $estudiantes->get_nro_tipo_sangre("B+");?>,
											<?php echo $estudiantes->get_nro_tipo_sangre("B-");?>,
											<?php echo $estudiantes->get_nro_tipo_sangre("AB+");?>,
											<?php echo $estudiantes->get_nro_tipo_sangre("AB-");?>,
											<?php echo $estudiantes->get_nro_tipo_sangre("O+");?>,
											<?php echo $estudiantes->get_nro_tipo_sangre("O-");?>,
											<?php echo $estudiantes->get_nro_tipo_sangre("NCNC");?>,
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
			<p class="h6">Estudiantes según su lateralidad.</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="lateralidad_general" class="mx-auto"></canvas>
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
									<td><?php echo $estudiantes->get_nro_lateralidad("Zurdo");?></td>
									<td><?php echo $estudiantes->get_nro_lateralidad("Diestro");?></td>
									<td><?php echo $estudiantes->get_nro_lateralidad("Ambidextro");?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes();?></td>
								</tr>
							</tbody>
							<tbody>
						</table>						
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const lateralidad_general = document.getElementById('lateralidad_general');

						  new Chart(lateralidad_general, {
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
			<p class="h6">Estudiantes vacunados contra el Covid-19.</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="vac_covid_19_general" class="mx-auto"></canvas>
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
									<td><?php echo $estudiantes->get_nro_vacunados_c19();?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_vacunados_c19();?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes();?></td>
								</tr>
							</tbody>
							<tbody>
						</table>						
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const vac_covid_19_general = document.getElementById('vac_covid_19_general');

						  new Chart(vac_covid_19_general, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_vacunados_c19();?>,
											<?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_vacunados_c19();?>,
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
			<p class="h6">Estudiantes según dosis de vacuna contra el Covid-19 aplicadas.</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-4 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="vac_apl_covid_19_general" class="mx-auto"></canvas>
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
									<th><span class="badge" style="background: #36a2eb;"> </span> Pfizer/BioNTech</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("Pfizer/BioNTech");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #ff6384;"> </span> Moderna</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("Moderna");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #ff9f40;"> </span> AztraZeneca</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("AztraZeneca");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #ffcd56;"> </span> Janssen</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("Janssen");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #4bc0c0;"> </span> Sinopharm</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("Sinopharm");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #9966ff;"> </span> Sinovac</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("Sinovac");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #c9cbcf;"> </span> Bharat</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("Bharat");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #a05d89;"> </span> CanSinoBIO</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("CanSinoBIO");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #2f9cb9;"> </span> Valneva</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("Valneva");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #7fdbff;"> </span> Novavax</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("Novavax");?>
									</td>
								</tr>
								<tr>
									<th><span class="badge" style="background: #d688cb ;"> </span> Otra vacuna</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_vacunados_c19("Otra");?>
									</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th>Total de estudiantes</th>
									<td class="text-center">
										<?php echo $estudiantes->get_nro_estudiantes();?>
									</td>
								</tr>
							</tfoot>
						</table>					
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const vac_apl_covid_19_general = document.getElementById('vac_apl_covid_19_general');

						  new Chart(vac_apl_covid_19_general, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_vacunados_c19("Pfizer/BioNTech");?>,
											<?php echo $estudiantes->get_nro_vacunados_c19("Moderna");?>,
											<?php echo $estudiantes->get_nro_vacunados_c19("AztraZeneca");?>,
											<?php echo $estudiantes->get_nro_vacunados_c19("Janssen");?>,
											<?php echo $estudiantes->get_nro_vacunados_c19("Sinopharm");?>,
											<?php echo $estudiantes->get_nro_vacunados_c19("Sinovac");?>,
											<?php echo $estudiantes->get_nro_vacunados_c19("Bharat");?>,
											<?php echo $estudiantes->get_nro_vacunados_c19("CanSinoBIO");?>,
											<?php echo $estudiantes->get_nro_vacunados_c19("Valneva");?>,
											<?php echo $estudiantes->get_nro_vacunados_c19("Novavax");?>,
											<?php echo $estudiantes->get_nro_vacunados_c19("Otra");?>,
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
			<p class="h6">Estudiantes según dosis de vacuna contra el Covid-19 aplicadas.</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="dosis_anti_covid_19_general" class="mx-auto"></canvas>
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
									<td><?php echo $estudiantes->get_nro_dosis_anti_c19(1,true);?></td>
									<td><?php echo $estudiantes->get_nro_dosis_anti_c19(2,true);?></td>
									<td><?php echo $estudiantes->get_nro_dosis_anti_c19(3,false);?></td>
									<td><?php echo $estudiantes->get_nro_dosis_anti_c19(0,true);?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes();?></td>
								</tr>
							</tbody>
							<tbody>
						</table>						
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const dosis_anti_covid_19_general = document.getElementById('dosis_anti_covid_19_general');

						  new Chart(dosis_anti_covid_19_general, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_dosis_anti_c19(1,true);?>,
											<?php echo $estudiantes->get_nro_dosis_anti_c19(2,true);?>,
											<?php echo $estudiantes->get_nro_dosis_anti_c19(3,false);?>,
											<?php echo $estudiantes->get_nro_dosis_anti_c19(0,true);?>,
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
			<p class="h6">Estudiantes que cuentan con una dieta especial.</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="dieta_especial_general" class="mx-auto"></canvas>
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
									<td><?php echo $estudiantes->get_nro_e_c_dieta_e();?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_e_c_dieta_e();?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes();?></td>
								</tr>
							</tbody>
							<tbody>
						</table>						
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const dieta_especial_general = document.getElementById('dieta_especial_general');

						  new Chart(dieta_especial_general, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_e_c_dieta_e();?>,
											<?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_e_c_dieta_e();?>,
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
			<p class="h6">Estudiantes que tienen algún padecimiento.</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="padecimiento_general" class="mx-auto"></canvas>
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
									<td><?php echo $estudiantes->get_nro_e_c_padecimiento();?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_e_c_padecimiento();?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes();?></td>
								</tr>
							</tbody>
							<tbody>
						</table>						
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const padecimiento_general = document.getElementById('padecimiento_general');

						  new Chart(padecimiento_general, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_e_c_padecimiento();?>,
											<?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_e_c_padecimiento();?>,
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
			<p class="h6">Estudiantes con algún impedimento físico.</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="impedimento_general" class="mx-auto"></canvas>
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
									<td><?php echo $estudiantes->get_nro_e_c_impedimento_f();?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_e_c_impedimento_f();?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes();?></td>
								</tr>
							</tbody>
							<tbody>
						</table>						
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const impedimento_general = document.getElementById('impedimento_general');

						  new Chart(impedimento_general, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_e_c_impedimento_f();?>,
											<?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_e_c_impedimento_f();?>,
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
			<p class="h6">Estudiantes con alguna necesidad educativa especial.</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="necesidad_educativa_general" class="mx-auto"></canvas>
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
									<td><?php echo $estudiantes->get_nro_e_c_n_educativa();?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_e_c_n_educativa();?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes();?></td>
								</tr>
							</tbody>
							<tbody>
						</table>						
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const necesidad_educativa_general = document.getElementById('necesidad_educativa_general');

						  new Chart(necesidad_educativa_general, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_e_c_n_educativa();?>,
											<?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_e_c_n_educativa();?>,
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
			<p class="h6">Estudiantes por condición de la vista.</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="cond_vista_general" class="mx-auto"></canvas>
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
									<td><?php echo $estudiantes->get_nro_c_vista("Buena");?></td>
									<td><?php echo $estudiantes->get_nro_c_vista("Regular");?></td>
									<td><?php echo $estudiantes->get_nro_c_vista("Mala");?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes();?></td>
								</tr>
							</tbody>
							<tbody>
						</table>						
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const cond_vista_general = document.getElementById('cond_vista_general');

						  new Chart(cond_vista_general, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_c_vista("Buena");?>,
											<?php echo $estudiantes->get_nro_c_vista("Regular");?>,
											<?php echo $estudiantes->get_nro_c_vista("Mala");?>,
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
			<p class="h6">Estudiantes por condición dental.</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="cond_dental_general" class="mx-auto"></canvas>
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
									<td><?php echo $estudiantes->get_nro_c_dental("Buena");?></td>
									<td><?php echo $estudiantes->get_nro_c_dental("Regular");?></td>
									<td><?php echo $estudiantes->get_nro_c_dental("Mala");?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes();?></td>
								</tr>
							</tbody>
							<tbody>
						</table>						
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const cond_dental_general = document.getElementById('cond_dental_general');

						  new Chart(cond_dental_general, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_c_dental("Buena");?>,
											<?php echo $estudiantes->get_nro_c_dental("Regular");?>,
											<?php echo $estudiantes->get_nro_c_dental("Mala");?>,
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
			<p class="h6">Estudiantes con carnet de discapacidad.</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-8 col-md-5 mx-auto mb-3 d-flex justify-content-center align-items-center">
					<canvas id="c_discapacidad_general" class="mx-auto"></canvas>
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
									<td><?php echo $estudiantes->get_nro_e_c_carnet_d();?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_e_c_carnet_d();?></td>
									<td><?php echo $estudiantes->get_nro_estudiantes();?></td>
								</tr>
							</tbody>
							<tbody>
						</table>						
						<!-- datos de la gráfica -->
						<script type="text/javascript" defer>
							const c_discapacidad_general = document.getElementById('c_discapacidad_general');

						  new Chart(c_discapacidad_general, {
						    type: 'doughnut',
						    data: {
						      datasets: [{
						        label: 'Número de estudiantes',
						        data: [
											<?php echo $estudiantes->get_nro_e_c_carnet_d();?>,
											<?php echo $estudiantes->get_nro_estudiantes() - $estudiantes->get_nro_e_c_carnet_d();?>,
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








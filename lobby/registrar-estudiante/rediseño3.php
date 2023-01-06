<?php
// session_start();
// if (!$_SESSION['login']) {
// 	header('Location: ../index.php');
// 	exit();
// }

$nivel = 2;

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Paso 2 - Datos de padre y madre</title>
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/all.min.css"/>
		<link rel="icon" type="img/png" href="../../img/icono.png">
	</head>
	<body>
		<main class="d-flex flex-column justify-content-between vh-100">
			<?php include('../../header.php'); ?>
			<div class="container-md">	
				<div class="card">
					<!-- Titulo del contenedor -->
					<div class="card-header text-center">
						<b class="fs-4">Formulario de registro - Padres</b>
					</div>
					<div class="card-body">
						<div class="row">
							

							<!-- Selector de seccion -->
							<div class="col-12 col-lg-3">
								<ul class="nav flex-lg-column nav-pills nav-fill mb-4 gap-2">
									<li class="nav-item">
										<span id="link5" class="nav-link active">Datos del padre</span>
									</li>
									<li class="nav-item">
										<span id="link6" class="nav-link">Datos de la madre</span>
									</li>
								</ul>
							</div>
							
							<!-- Contenedor del formulario -->
							<div class="col-12 col-lg-9 py-0" style="max-height: 60vh; overflow-y: auto;">
								<form id="formulario_padres" action="test.php" method="POST" autocomplete="off">
									
									<!--Datos del padre-->
									<section id="seccion1" class="row my-2">
										<div class="row mb-4">
											<div class="col-12">
												<span class="h5 mb-3">
													<i class="fa-solid fa-people-roof fa-xl"></i> 
													Datos del padre.
												</span>
											</div>
										</div>


										<!-- Nombres -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">Nombres:</label>
											</div>
											<!-- Primer nombre -->
											<div class="col-12 col-lg-5">
												<input 
													class="form-control mb-2" 
													type="text" 
													name="primer_nombre_padre"
													placeholder="Primer nombre"
												>
											</div>
											<!-- Segundo nombre -->
											<div class="col-12 col-lg-5">
												<input 
													class="form-control mb-2" 
													type="text" 
													name="segundo_nombre_padre"
													placeholder="Segundo nombre"
												>
											</div>
										</div>


										<!-- Apellidos -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">Apellidos:</label>
											</div>
											<!-- Primer apellido -->
											<div class="col-12 col-lg-5">
												<input 
													class="form-control mb-2" 
													type="text" 
													name="primer_apellido_padre"
													placeholder="Primer apellido"
												>
											</div>
											<!-- Segundo apellido -->
											<div class="col-12 col-lg-5">
												<input 
													class="form-control mb-2" 
													type="text" 
													name="segundo_apellido_padre"
													placeholder="Segundo apellido"
												>
											</div>
										</div>


										<!-- Cedula -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">Cedula:</label>
											</div>
											<div class="col-12 col-lg-10">
												<div class="input-group">
													<!-- Nacionalidad -->
													<select class="form-select" id="nacionalidad_padre" name="nacionalidad_padre">
														<option selected disabled value="">Nacionalidad</option>
														<option value="V">V</option>
														<option value="E">E</option>
													</select>
													<!-- Número de cedula -->
													<input 
														id="cedula_padre"
														class="form-control" 
														type="text" 
														name="cedula_padre" 
														maxlength="8" 
														minlength="7"
													>
												</div>
											</div>
										</div>


										<!-- Fecha y lugar de nacimiento -->
										<div class="row mb-4">
											<!-- Fecha de nacimiento -->
											<div class="col-12 col-lg-4">
												<label for="" class="form-label">Fecha de nacimiento:</label>
												<input class="form-control mb-2" type="date" name="fecha_nacimiento_padre"
													min="<?php echo date('Y')-100 .'-01-01'?>" max="<?php echo date('Y')-18 .'-01-01'?>"
													title="Debe tener al menos 18 años.">
											</div>
											<!-- Lugar de nacimiento -->
											<div class="col-12 col-lg-8">
												<label for="" class="form-label">Lugar de nacimiento:</label>
												<input class="form-control mb-2" type="text" name="lugar_nacimiento_padre">
											</div>
										</div>


										<!-- Correo electronico -->
										<div class="row mb-4">
											<div class="col-12 col-lg-3">
												<label for="" class="form-label">Correo electronico:</label>
											</div>
											<div class="col-12 col-lg-9">
												<input class="form-control" type="email" name="correo_electronico_padre">
											</div>
										</div>


										<!-- Telefonos -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<label for="" class="form-label mb-3">Números de telefono:</label>
											</div>
											<datalist id="prefijos">
												<!--Moviles-->
												<option value="0412">
												<option value="0414">
												<option value="0416">
												<option value="0424">
												<option value="0426">

													<!--Fijos-->
												<option value="0271">
												<option value="0274">
												<option value="0275">
											</datalist>
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">Principal:</label>
											</div>
											<div class="col-12 col-lg-10">
												<div class="input-group mb-2">
													<!--Prefijo-->
													<input class="form-control mb-2 form-control-sm" type="text" name="prefijo_principal_padre"
														list="prefijos" minlength="4" maxlength="4" placeholder="Prefijo telefonico"
														title="Solo ingresar caracteres numericos">
													<!--Número-->
													<input class="form-control mb-2 form-control-sm w-auto" type="tel" name="telefono_principal_padre"
														minlength="7" maxlength="7" placeholder="Telefono principal">
												</div>
											</div>
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">Secundario:</label>
											</div>
											<div class="col-12 col-lg-10">
												<!--Telefono secundario-->
												<div class="input-group mb-2">
													<!--Prefijo-->
													<input class="form-control mb-2 form-control-sm" type="text" name="prefijo_secundario_padre"
														list="prefijos" minlength="4" maxlength="4" placeholder="Prefijo telefonico"
														title="Solo ingresar caracteres numericos">
													<!--Número-->
													<input class="form-control mb-2 form-control-sm w-auto" type="tel" name="telefono_secundario_padre"
														minlength="7" maxlength="7" placeholder="Telefono secundario">
												</div>
											</div>
										</div>	


										<!-- Estado civil -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">Estado civil:</label>
											</div>
											<div class="col-12 col-lg-10">
												<select class="form-select" name="estado_civil_padre">
													<option selected disabled value="">Seleccione una opcion</option>
													<option value="Soltero(a)">Soltero(a)</option>
													<option value="Casado(a)">Casado(a)</option>
													<option value="Divorciado(a)">Divorciado(a)</option>
													<option value="Viudo(a)">Viudo(a)</option>
												</select>
											</div>
										</div>


										<!-- Grado de instruccion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-3">
												<label for="" class="form-label">Grado de instruccion:</label>
											</div>
											<div class="col-12 col-lg-9">
												<div class="form-check form-check-inline">
													<input 
														class="form-check-input" 
														type="radio" 
														name="grado_instruccion_pa"
														value="Primaria"
													>
													<label class="form-label">Primaria </label>
												</div>
												<div class="form-check form-check-inline">
													<input 
														class="form-check-input" 
														type="radio" 
														name="grado_instruccion_pa"	
														value="Bachillerato"
													>
													<label class="form-label">Bachillerato </label>
												</div>
												<div class="form-check form-check-inline">
													<input 
														class="form-check-input" 
														type="radio" 
														name="grado_instruccion_pa"
														value="Universitario"
													>
													<label class="form-label">Universitario </label>
												</div>
											</div>
										</div>



										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">Direccion de residencia:</label>
											</div>
											<div class="col-12 col-lg-10">
												<textarea class="form-control mb-2" name="direccion_padre"></textarea>
											</div>
										</div>


										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<label class="form-label">¿Se encuentra en el pais?:</label>
											</div>
											<div class="col-12 col-lg-8">
												<div class="input-group mb-2">
													<select class="form-select" name="reside_en_el_pais_pa">
														<option selected disabled value="">Seleccione una opcion</option>
														<option value="Si">Si</option>
														<option value="No">No</option>
													</select>
													<input class="form-control" type="text" name="pais_pa" id="pais_pa"
														placeholder="¿En que pais?">
											</div>
											<div class="col-12">
												<span class="form-text">En caso de estar fuera del pais, especifique en cuál se encuentra</span>
											</div>
										</div>	


										<div class="row my-4">
											<div class="col-12">
												<span class="h5 mb-3">
													<i class="fa-solid fa-house fa-xl"></i> 
													Datos de vivienda.
												</span>
											</div>
										</div>


										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<label for="" class="form-label">Condiciones de la vivienda:</label>
											</div>
											<div class="col-12 col-lg-8">
												<div class="form-check form-check-inline">
													<label class="form-label">Buena </label>
													<input class="form-check-input" type="radio" name="condicion_vivienda_pa"
														value="Buena">
												</div>
												<div class="form-check form-check-inline">
													<label class="form-label">Regular </label>
													<input class="form-check-input" type="radio" name="condicion_vivienda_pa"
														value="Regular">
												</div>
												<div class="form-check form-check-inline">
													<label class="form-label">Mala </label>
													<input class="form-check-input" type="radio" name="condicion_vivienda_pa"
														value="Mala">
												</div>
											</div>
										</div>


										<div class="row mb-4">
											<div class="col-12 col-lg-3">
												<label for="" class="form-label">Tipo de vivienda:</label>
											</div>
											<div class="col-12 col-lg-9">
												<div class="form-check form-check-inline">
													<label class="form-label">Casa </label>
													<input class="form-check-input" type="radio" name="tipo_vivienda_pa"
														value="Casa">
												</div>
												<div class="form-check form-check-inline">
													<label class="form-label">Apartamento </label>
													<input class="form-check-input" type="radio" name="tipo_vivienda_pa"
														value="Apartamento">
												</div>
												<div class="form-check form-check-inline">
													<label class="form-label">Rancho </label>
													<input class="form-check-input" type="radio" name="tipo_vivienda_pa"
														value="Rancho">
												</div>
												<div class="form-check form-check-inline">
													<label class="form-label">Quinta </label>
													<input class="form-check-input" type="radio" name="tipo_vivienda_pa"
														value="Quinta">
												</div>
												<div class="form-check form-check-inline">
													<label class="form-label">Habitacion </label>
													<input class="form-check-input" type="radio" name="tipo_vivienda_pa"
														value="Habitacion">
												</div>
											</div>
										</div>


										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<label for="" class="form-label">Tenencia de la vivienda:</label>
											</div>
											<div class="col-12 col-lg-8">
												<div class="input-group">
													<select class="form-select" name="tenencia_vivienda_pa">
														<option selected disabled value="">Seleccione una opcion</option>
														<option value="Propia">Propia</option>
														<option value="Alquilada">Alquilada</option>
														<option value="Prestada">Prestada</option>
														<option value="Otro">Otro</option>
													</select>
													<input class="form-control" type="text" name="tenencia_vivienda_pa_otro"
														maxlength="12" minlength="3" placeholder="En Caso de ser otro, especifique">
												</div>
											</div>
										</div>
										

										<hr>

										<div class="row my-4">
											<div class="col-12">
												<span class="h5 mb-3">
													<i class="fa-solid fa-briefcase fa-xl me-2"></i> 
													Datos Laborales.
												</span>
											</div>
										</div>

										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">¿Trabaja?:</label>
											</div>
											<div class="col-12 col-lg-10">
												<div class="form-check form-check-inline">
													<label class="form-label">Si </label>
													<input class="form-check-input" type="radio" name="padre_trabaja" value="Si">
												</div>
												<div class="form-check form-check-inline">
													<label class="form-label">No </label>
													<input class="form-check-input" type="radio" name="padre_trabaja" value="No">
												</div>
											</div>
											<div class="col-12">
												<span class="form-text">En caso de marcar NO, se inhabilitaran los campos y se establecerá como desempleado.</span>
											</div>
										</div>

										<fieldset id="laborales_padre">
											<div class="row mb-4">
												<div class="col-12 col-lg-3">
													<label for="" class="form-label">Cargo que ocupa:</label>
												</div>
												<div class="col-12 col-lg-9">
													<input class="form-control mb-2" type="text" name="empleo_pa" id="empleo_pa"
													maxlength="60" minlength="3">
												</div>
											</div>


											<div class="row mb-4">
												<div class="col-12 col-lg-3">
													<label for="" class="form-label">Telefono del trabajo:</label>
												</div>
												<div class="col-12 col-lg-9">
													<div class="input-group mb-2">
														<!--Prefijo-->
														<input class="form-control" type="text" name="prefijo_trabajo_pa"
															id="prefijo_trabajo_pa" list="prefijos" pattern="[0-9]+" maxlength="4"
															placeholder="Prefijo telefonico" title="Solo ingresar caracteres numericos">
														<!--Número-->
														<input class="form-control" type="tel" name="telefono_trabajo_pa"
															id="telefono_trabajo_pa" placeholder="Telefono principal" pattern="[0-9]+"
															maxlength="7" minlength="7">
													</div>
												</div>
											</div>


											<div class="row mb-4">
												<div class="col-12 col-lg-3">
													<label for="" class="form-label">Lugar del trabajo:</label>
												</div>
												<div class="col-12 col-lg-9">
													<textarea class="form-control mb-2" name="lugar_trabajo_pa" id="lugar_trabajo_pa"
													maxlength="180" minlength="3"></textarea>
												</div>
											</div>

											<div class="row mb-4">
												<div class="col-12 col-lg-2">
													<label for="" class="form-label">Remuneracion:</label>
												</div>
												<div class="col-12 col-lg-10">
													<div class="input-group mb-2">
														<!--Remuneracion en base a sueldos minimos del padre-->
														<input class="form-control text-end" type="number" name="remuneracion_pa"
															id="remuneracion_pa" placeholder="Salarios minimos" min="0" step="1">
														<!--Tipo de Remuneracion del padre-->
														<select class="form-select" name="tipo_remuneracion_pa">
															<option value="Diaria">Remuneracion diaria</option>
															<option value="Semanal">Remuneracion semanal</option>
															<option value="Quincenal">Remuneracion quincenal</option>
															<option value="Mensual">Remuneracion mensual</option>
														</select>
													</div>
												</div>
											</div>
										</fieldset>
									</section>
									

									<!--Datos de la madre-->
									<section id="seccion2" class="row my-2" style="display:none;">
										<div class="row mb-4">
											<div class="col-12">
												<span class="h5 mb-3">
													<i class="fa-solid fa-people-roof fa-xl"></i> 
													Datos de la madre.
												</span>
											</div>
										</div>


										<!-- Nombres -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">Nombres:</label>
											</div>
											<!-- Primer nombre -->
											<div class="col-12 col-lg-5">
												<input 
													class="form-control mb-2" 
													type="text" 
													name="primer_nombre_madre"
													placeholder="Primer nombre"
												>
											</div>
											<!-- Segundo nombre -->
											<div class="col-12 col-lg-5">
												<input 
													class="form-control mb-2" 
													type="text" 
													name="segundo_nombre_madre"
													placeholder="Segundo nombre"
												>
											</div>
										</div>


										<!-- Apellidos -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">Apellidos:</label>
											</div>
											<!-- Primer apellido -->
											<div class="col-12 col-lg-5">
												<input 
													class="form-control mb-2" 
													type="text" 
													name="primer_apellido_madre"
													placeholder="Primer apellido"
												>
											</div>
											<!-- Segundo apellido -->
											<div class="col-12 col-lg-5">
												<input 
													class="form-control mb-2" 
													type="text" 
													name="segundo_apellido_madre"
													placeholder="Segundo apellido"
												>
											</div>
										</div>


										<!-- Cedula -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">Cedula:</label>
											</div>
											<div class="col-12 col-lg-10">
												<div class="input-group">
													<!-- Nacionalidad -->
													<select class="form-select" id="nacionalidad_madre" name="nacionalidad_madre">
														<option selected disabled value="">Nacionalidad</option>
														<option value="V">V</option>
														<option value="E">E</option>
													</select>
													<!-- Número de cedula -->
													<input 
														id="cedula_madre"
														class="form-control" 
														type="text" 
														name="cedula_madre" 
														maxlength="8" 
														minlength="7"
													>
												</div>
											</div>
										</div>


										<!-- Fecha y lugar de nacimiento -->
										<div class="row mb-4">
											<!-- Fecha de nacimiento -->
											<div class="col-12 col-lg-4">
												<label for="" class="form-label">Fecha de nacimiento:</label>
												<input class="form-control mb-2" type="date" name="fecha_nacimiento_madre"
													min="<?php echo date('Y')-100 .'-01-01'?>" max="<?php echo date('Y')-18 .'-01-01'?>"
													title="Debe tener al menos 18 años.">
											</div>
											<!-- Lugar de nacimiento -->
											<div class="col-12 col-lg-8">
												<label for="" class="form-label">Lugar de nacimiento:</label>
												<input class="form-control mb-2" type="text" name="lugar_nacimiento_madre">
											</div>
										</div>


										<!-- Correo electronico -->
										<div class="row mb-4">
											<div class="col-12 col-lg-3">
												<label for="" class="form-label">Correo electronico:</label>
											</div>
											<div class="col-12 col-lg-9">
												<input class="form-control" type="email" name="correo_electronico_madre">
											</div>
										</div>


										<!-- Telefonos -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<label for="" class="form-label mb-3">Números de telefono:</label>
											</div>
											<datalist id="prefijos">
												<!--Moviles-->
												<option value="0412">
												<option value="0414">
												<option value="0416">
												<option value="0424">
												<option value="0426">

													<!--Fijos-->
												<option value="0271">
												<option value="0274">
												<option value="0275">
											</datalist>
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">Principal:</label>
											</div>
											<div class="col-12 col-lg-10">
												<div class="input-group mb-2">
													<!--Prefijo-->
													<input class="form-control mb-2 form-control-sm" type="text" name="prefijo_principal_madre"
														list="prefijos" minlength="4" maxlength="4" placeholder="Prefijo telefonico"
														title="Solo ingresar caracteres numericos">
													<!--Número-->
													<input class="form-control mb-2 form-control-sm w-auto" type="tel" name="telefono_principal_madre"
														minlength="7" maxlength="7" placeholder="Telefono principal">
												</div>
											</div>
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">Secundario:</label>
											</div>
											<div class="col-12 col-lg-10">
												<!--Telefono secundario-->
												<div class="input-group mb-2">
													<!--Prefijo-->
													<input class="form-control mb-2 form-control-sm" type="text" name="prefijo_secundario_madre"
														list="prefijos" minlength="4" maxlength="4" placeholder="Prefijo telefonico"
														title="Solo ingresar caracteres numericos">
													<!--Número-->
													<input class="form-control mb-2 form-control-sm w-auto" type="tel" name="telefono_secundario_madre"
														minlength="7" maxlength="7" placeholder="Telefono secundario">
												</div>
											</div>
										</div>	


										<!-- Estado civil -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">Estado civil:</label>
											</div>
											<div class="col-12 col-lg-10">
												<select class="form-select" name="estado_civil_madre">
													<option selected disabled value="">Seleccione una opcion</option>
													<option value="Soltero(a)">Soltero(a)</option>
													<option value="Casado(a)">Casado(a)</option>
													<option value="Divorciado(a)">Divorciado(a)</option>
													<option value="Viudo(a)">Viudo(a)</option>
												</select>
											</div>
										</div>


										<!-- Grado de instruccion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-3">
												<label for="" class="form-label">Grado de instruccion:</label>
											</div>
											<div class="col-12 col-lg-9">
												<div class="form-check form-check-inline">
													<input 
														class="form-check-input" 
														type="radio" 
														name="grado_instruccion_ma"
														value="Primaria"
													>
													<label class="form-label">Primaria </label>
												</div>
												<div class="form-check form-check-inline">
													<input 
														class="form-check-input" 
														type="radio" 
														name="grado_instruccion_ma"	
														value="Bachillerato"
													>
													<label class="form-label">Bachillerato </label>
												</div>
												<div class="form-check form-check-inline">
													<input 
														class="form-check-input" 
														type="radio" 
														name="grado_instruccion_ma"
														value="Universitario"
													>
													<label class="form-label">Universitario </label>
												</div>
											</div>
										</div>



										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">Direccion de residencia:</label>
											</div>
											<div class="col-12 col-lg-10">
												<textarea class="form-control mb-2" name="direccion_madre"></textarea>
											</div>
										</div>


										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<label class="form-label">¿Se encuentra en el pais?:</label>
											</div>
											<div class="col-12 col-lg-8">
												<div class="input-group mb-2">
													<select class="form-select" name="reside_en_el_pais_ma">
														<option selected disabled value="">Seleccione una opcion</option>
														<option value="Si">Si</option>
														<option value="No">No</option>
													</select>
													<input class="form-control" type="text" name="pais_ma" id="pais_ma"
														placeholder="¿En que pais?">
											</div>
											<div class="col-12">
												<span class="form-text">En caso de estar fuera del pais, especifique en cuál se encuentra</span>
											</div>
										</div>	


										<div class="row my-4">
											<div class="col-12">
												<span class="h5 mb-3">
													<i class="fa-solid fa-house fa-xl"></i> 
													Datos de vivienda.
												</span>
											</div>
										</div>


										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<label for="" class="form-label">Condiciones de la vivienda:</label>
											</div>
											<div class="col-12 col-lg-8">
												<div class="form-check form-check-inline">
													<label class="form-label">Buena </label>
													<input class="form-check-input" type="radio" name="condicion_vivienda_ma"
														value="Buena">
												</div>
												<div class="form-check form-check-inline">
													<label class="form-label">Regular </label>
													<input class="form-check-input" type="radio" name="condicion_vivienda_ma"
														value="Regular">
												</div>
												<div class="form-check form-check-inline">
													<label class="form-label">Mala </label>
													<input class="form-check-input" type="radio" name="condicion_vivienda_ma"
														value="Mala">
												</div>
											</div>
										</div>


										<div class="row mb-4">
											<div class="col-12 col-lg-3">
												<label for="" class="form-label">Tipo de vivienda:</label>
											</div>
											<div class="col-12 col-lg-9">
												<div class="form-check form-check-inline">
													<label class="form-label">Casa </label>
													<input class="form-check-input" type="radio" name="tipo_vivienda_ma"
														value="Casa">
												</div>
												<div class="form-check form-check-inline">
													<label class="form-label">Apartamento </label>
													<input class="form-check-input" type="radio" name="tipo_vivienda_ma"
														value="Apartamento">
												</div>
												<div class="form-check form-check-inline">
													<label class="form-label">Rancho </label>
													<input class="form-check-input" type="radio" name="tipo_vivienda_ma"
														value="Rancho">
												</div>
												<div class="form-check form-check-inline">
													<label class="form-label">Quinta </label>
													<input class="form-check-input" type="radio" name="tipo_vivienda_ma"
														value="Quinta">
												</div>
												<div class="form-check form-check-inline">
													<label class="form-label">Habitacion </label>
													<input class="form-check-input" type="radio" name="tipo_vivienda_ma"
														value="Habitacion">
												</div>
											</div>
										</div>


										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<label for="" class="form-label">Tenencia de la vivienda:</label>
											</div>
											<div class="col-12 col-lg-8">
												<div class="input-group">
													<select class="form-select" name="tenencia_vivienda_ma">
														<option selected disabled value="">Seleccione una opcion</option>
														<option value="Propia">Propia</option>
														<option value="Alquilada">Alquilada</option>
														<option value="Prestada">Prestada</option>
														<option value="Otro">Otro</option>
													</select>
													<input class="form-control" type="text" name="tenencia_vivienda_ma_otro"
														maxlength="12" minlength="3" placeholder="En Caso de ser otro, especifique">
												</div>
											</div>
										</div>
										

										<hr>

										<div class="row my-4">
											<div class="col-12">
												<span class="h5 mb-3">
													<i class="fa-solid fa-briefcase fa-xl me-2"></i> 
													Datos Laborales.
												</span>
											</div>
										</div>

										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">¿Trabaja?:</label>
											</div>
											<div class="col-12 col-lg-10">
												<div class="form-check form-check-inline">
													<label class="form-label">Si </label>
													<input class="form-check-input" type="radio" name="madre_trabaja" value="Si">
												</div>
												<div class="form-check form-check-inline">
													<label class="form-label">No </label>
													<input class="form-check-input" type="radio" name="madre_trabaja" value="No">
												</div>
											</div>
											<div class="col-12">
												<span class="form-text">En caso de marcar NO, se inhabilitaran los campos y se establecerá como desempleado.</span>
											</div>
										</div>

										<fieldset id="laborales_madre">
											<div class="row mb-4">
												<div class="col-12 col-lg-3">
													<label for="" class="form-label">Cargo que ocupa:</label>
												</div>
												<div class="col-12 col-lg-9">
													<input class="form-control mb-2" type="text" name="empleo_ma" id="empleo_ma"
													maxlength="60" minlength="3">
												</div>
											</div>


											<div class="row mb-4">
												<div class="col-12 col-lg-3">
													<label for="" class="form-label">Telefono del trabajo:</label>
												</div>
												<div class="col-12 col-lg-9">
													<div class="input-group mb-2">
														<!--Prefijo-->
														<input class="form-control" type="text" name="prefijo_trabajo_ma"
															id="prefijo_trabajo_ma" list="prefijos" pattern="[0-9]+" maxlength="4"
															placeholder="Prefijo telefonico" title="Solo ingresar caracteres numericos">
														<!--Número-->
														<input class="form-control" type="tel" name="telefono_trabajo_ma"
															id="telefono_trabajo_ma" placeholder="Telefono principal" pattern="[0-9]+"
															maxlength="7" minlength="7">
													</div>
												</div>
											</div>


											<div class="row mb-4">
												<div class="col-12 col-lg-3">
													<label for="" class="form-label">Lugar del trabajo:</label>
												</div>
												<div class="col-12 col-lg-9">
													<textarea class="form-control mb-2" name="lugar_trabajo_ma" id="lugar_trabajo_ma"
													maxlength="180" minlength="3"></textarea>
												</div>
											</div>

											<div class="row mb-4">
												<div class="col-12 col-lg-2">
													<label for="" class="form-label">Remuneracion:</label>
												</div>
												<div class="col-12 col-lg-10">
													<div class="input-group mb-2">
														<!--Remuneracion en base a sueldos minimos del madre-->
														<input class="form-control text-end" type="number" name="remuneracion_ma"
															id="remuneracion_ma" placeholder="Salarios minimos" min="0" step="1">
														<!--Tipo de Remuneracion del madre-->
														<select class="form-select" name="tipo_remuneracion_ma">
															<option value="Diaria">Remuneracion diaria</option>
															<option value="Semanal">Remuneracion semanal</option>
															<option value="Quincenal">Remuneracion quincenal</option>
															<option value="Mensual">Remuneracion mensual</option>
														</select>
													</div>
												</div>
											</div>
										</fieldset>
									</section>

								</form>
							</div>
						</div>
					</div>
					<div class="card-footer nav justify-content-md-between">
						<a class="btn btn-primary" href="../index.php">
							<i class="fa-solid fa-lg me-2 fa-home"></i>
							Volver al inicio
						</a>
						<div class="ms-auto">
							<button id="boton_anterior" class="btn btn-primary" type="button">
								<i class="fa-solid fa-lg me-2 fa-backward"></i>
								Anterior
							</button>
							<button id="boton_siguiente" class="btn btn-primary" type="button">
								Siguiente
								<i class="fa-solid fa-lg ms-2 fa-forward"></i>
							</button>
							<button id="boton_guardar" class="btn btn-primary" type="button" style="display:none;">
								Guardar y continuar
								<i class="fa-solid fa-lg ms-2 fa-floppy-disk"></i>
							</button>
						</div>
					</div>
				</div>
				
			</div>
			<?php include('../../footer.php'); ?>
			<?php include('../../ayuda.php'); ?>
		</main>
		<script type="text/javascript" src="../../js/sweetalert2.js"></script>
		<script type="text/javascript" src="../../js/jquery-3.6.1.min.js"></script>
		<script type="text/javascript" src="../../js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="../../js/additional-methods.min.js"></script>
		<script type="text/javascript" src="../../js/messages_es.min.js"></script>
		<script type="text/javascript" src="../../js/validaciones_padres.js"></script>
		<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
	</body>
</html>
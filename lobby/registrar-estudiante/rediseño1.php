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
		<title>Paso 1 - Datos del representante</title>
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
						<b class="fs-4">Formulario de registro - Representante</b>
					</div>
					<div class="card-body">
						<div class="row">
							

							<!-- Selector de seccion -->
							<div class="col-12 col-lg-3">
								<ul class="nav flex-lg-column nav-pills nav-fill mb-4 gap-2">
									<li class="nav-item">
										<span id="link1" class="nav-link active" href="#">Datos personales</span>
									</li>
									<li class="nav-item">
										<span id="link2" class="nav-link" href="#">Datos de contacto</span>
									</li>
									<li class="nav-item">
										<span id="link3" class="nav-link" href="#">Datos de vivienda</span>
									</li>
									<li class="nav-item">
										<span id="link4" class="nav-link" href="#">Datos economicos</span>
									</li>
									<li class="nav-item">
										<span id="link5" class="nav-link" href="#">Contacto auxiliar</span>
									</li>
								</ul>
							</div>
							
							<!-- Contenedor del formulario -->
							<div class="col-12 col-lg-9 py-0" style="max-height: 60vh; overflow-y: auto;">
								<form id="formulariorepresentante" action="test.php" method="POST" autocomplete="off">
									
									<!-- Seccion de datos personales -->
									<section id="seccion1" class="row my-2">
										
										<!-- Titulo de la seccion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="h5">
													<i class="fa-solid fa-person fa-xl me-2"></i>
													Datos personales
												</span>
											</div>
										</div>
										

										<!-- Nombres -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="" class="form-label requerido">Nombres:</label>
											</div>
											<!-- Primer nombre -->
											<div class="col-12 col-lg-5">
												<input 
													id="primer_nombre_r" 
													class="mb-2 form-control" 
													type="text" 
													name="primer_nombre_r" 
													placeholder="Primer nombre" 
													minlength="3" 
													maxlength="40" 
													required
												>
											</div>
											<!-- Segundo nombre -->
											<div class="col-12 col-lg-5">
												<input 
													id="segundo_nombre_r" 
													class="mb-2 form-control" 
													type="text" 
													name="segundo_nombre_r" 
													placeholder="Segundo nombre" 
													minlength="3" 
													maxlength="40" 
												>
											</div>
										</div>
										

										<!-- Apellidos -->
										<div class="row mb-2">
											<div class="col-12 col-lg-2">
												<label for="" class="form-label requerido">Apellidos:</label>
											</div>
											<!-- Primer apellido -->
											<div class="col-12 col-lg-5">
												<input 
													id="primer_apellido_r" 
													class="mb-2 form-control" 
													type="text" 
													name="primer_apellido_r" 
													placeholder="Primer apellido" 
													minlength="3" 
													maxlength="40" 
													required
												>
											</div>
											<!-- Segundo apellido -->
											<div class="col-12 col-lg-5">
												<input 
													id="segundo_apellido_r" 
													class="mb-2 form-control" 
													type="text" 
													name="segundo_apellido_r" 
													placeholder="Segundo apellido" 
													minlength="3" 
													maxlength="40" 
												>
											</div>
										</div>

										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="form-text">Solo son obligatorios primer nombre y primer apellido.</span>
											</div>
										</div>


										<!-- Cedula -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label class="form-label requerido">Cedula:</label>
											</div>
											<div class="col-12 col-lg-3">
													<!-- Nacionalidad -->
													<select 
														id="nacionalidad_r" 
														class="form-select" 
														name="nacionalidad_r" 
														required
													>
														<option selected disabled value="">Nacionalidad</option>
														<option value="V">V</option>
														<option value="E">E</option>
													</select>
											</div>
											<div class="col-12 col-lg-7">

													<!-- Número de cedula -->
													<input 
														id="cedula_r" 
														class="form-control" 
														type="text" 
														name="cedula_r" 
														maxlength="8" 
														minlength="6" 
														placeholder="Número de cedula"
														required 
													>
											</div>
											<div class="col-12 col-lg-12 mt-2">
												<span class="form-text">La cédula consta de una nacionalidad y de un número con alrededor de 6 a 8 dígitos.</span>
											</div>
										</div>



										<!-- Genero y estado civil -->
										<div class="row mb-4">
											<!-- Genero -->
											<div class="col-12 col-lg-2">
												<p class="form-label requerido">Genero:</p>
											</div>
											<div class="col-12 col-lg-3">
												<!-- Femenino-->
												<div class="form-check form-check-inline">
													<label for="genero_f" class="form-label">F</label>
													<input 
														id="genero_f" 
														class="form-check-input" 
														type="radio" 
														name="genero_r" 
														value="F" 
														required
													>
												</div>
												<!-- Masculino -->
												<div class="form-check form-check-inline">
													<label for="genero_m" class="form-label">M</label>
													<input 
														id="genero_m" 
														class="form-check-input" 
														type="radio" 
														name="genero_r" 
														value="M" 
														required
													>
												</div>
												<label id="genero_r-error" class="error w-100" style="display:none;" for="genero_r"></label>
											</div>
											<!-- Estado civil -->
											<div class="col-12 col-lg-3">
												<label class="form-label requerido">Estado civil:</label>
											</div>
											<div class="col-12 col-lg-4">
												<select 
													class="form-select" 
													name="estado_civil_r" 
													required
												>
													<option selected disabled value="">Seleccione una opcion</option>
													<option value="Soltero(a)">Soltero(a)</option>
													<option value="Casado(a)">Casado(a)</option>
													<option value="Divorciado(a)">Divorciado(a)</option>
													<option value="Viudo(a)">Viudo(a)</option>
												</select>
											</div>
										</div>
										

										<!-- Fecha y lugar de nacimiento -->
										<div class="row mb-4">
											<!-- Fecha de nacimiento -->
											<div class="col-12 col-lg-4">
												<label for="fecha_nacimiento_r" class="form-label requerido">Fecha de nacimiento:</label>
												<input 
													id="fecha_nacimiento_r" 
													class="mb-2 form-control" 
													type="date" 
													name="fecha_nacimiento_r" 
													min="<?php echo date('Y')-100 .'-01-01'?>" 
													max="<?php echo date('Y')-18 .'-01-01'?>"
													required
												>
											</div>
											<!-- Lugar de nacimiento -->
											<div class="col-12 col-lg-8">
												<label class="form-label requerido">Lugar de nacimiento:</label>
												<input 
													id="lugar_nacimiento_r" 
													class="mb-2 form-control" 
													type="text" 
													name="lugar_nacimiento_r" 
													maxlength="150" 
													minlength="3"
													placeholder="Estado, ciudad" 
													required
												>
											</div>
										</div>
										

										<!-- Grado de instruccion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<span class="form-label requerido">Grado de instruccion:</span>
											</div>
											<div class="col-12 col-lg-8">
												<!-- Primaria -->
												<div class="form-check form-check-inline">
													<label for="grado_primaria" class="form-label">Primaria </label>
													<input 
														id="grado_primaria" 
														class="form-check-input" 
														type="radio" 
														name="grado_instruccion_r" 
														value="Primaria" 
														required
													>
												</div>
												<!-- Bachillerato -->
												<div class="form-check form-check-inline">
													<label for="grado_bachillerato" class="form-label">Bachillerato </label>
													<input 
														id="grado_bachillerato" 
														class="form-check-input" 
														type="radio" 
														name="grado_instruccion_r" 
														value="Bachillerato" 
														required
													>
												</div>
												<!-- Universitario -->
												<div class="form-check form-check-inline">
													<label for="grado_universitario" class="form-label">Universitario </label>
													<input 
														id="grado_universitario" 
														class="form-check-input" 
														type="radio" 
														name="grado_instruccion_r" 
														value="Universitario" 
														required
													>
												</div>
												<label id="grado_instruccion_r-error" class="error w-100" style="display:none;" for="grado_instruccion_r"></label>
											</div>
										</div>
										
										
										<!-- Vinculo con el estudiante -->
										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<label class="form-label requerido">Vínculo con el estudiante:</label>
											</div>

											<div class="col-12 col-lg-3">
												<select name="vinculo_r" id="" class="form-select" required>
													<option value="" selected disabled>Vínculo</option>
													<option value="Madre">Madre</option>
													<option value="Padre">Padre</option>
													<option value="Tío(a)">Tío(a)</option>
													<option value="Abuelo(a)">Abuelo(a)</option>
													<option value="Otro">Otro</option>
												</select>
											</div>
											<div class="col-12 col-lg-5">
												<input id="vinculo_otro" name="vinculo_otro" type="text" class="form-control" placeholder="En caso de ser otro, especifique" required disabled>
											</div>
										</div>
										

										<!-- Carnet de la patria -->
										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<span class="form-label">Carnet de la patria:</span>
											</div>
											<!-- Codigo de carnet de la patria -->
											<div class="col-12 col-lg-4">
												<input 
													id="codigo_carnet_patria_r" 
													class="mb-2 form-control" 
													type="text" 
													name="codigo_carnet_patria_r" 
													placeholder="Codigo" 
													minlength="10"
													maxlength="10"
												>
											</div>
											<!-- Serial del carnet de la patria -->
											<div class="col-12 col-lg-4">
												<input 
													id="serial_carnet_patria_r" 
													class="mb-2 form-control" 
													type="text" 
													name="serial_carnet_patria_r" 
													placeholder="Serial" 
													minlength="10" 
													maxlength="10"
												>
											</div>
											<div class="col-12 col-lg-12">
												<span class="form-text">En caso de no tener, dejar vacío.</span>
											</div>
										</div>
									</section>
									

									<!-- Seccion de datos de contacto -->
									<section id="seccion2" class="row my-2" style="display:none;">
										<!-- Titulo de la seccion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="h5">
													<i class="fa-solid fa-address-book fa-xl me-2"></i>
													Datos de contacto
												</span>
											</div>
										</div>
										

										<!-- Direccion de residencia -->
										<div class="row mb-4">
											<!-- <div class="col-12 col-lg-12">
												<label class="form-label">Direccion de residencia:</label>
												<textarea id="direccion_r" class="mb-2 form-control" name="direccion_r" rows="2" minlength="10" required style="resize: none;"></textarea>
											</div> -->

											<div class="col-12 col-lg-4 mb-2">
												<label for="municipio" class="form-label requerido">Municipio:</label>
												<select 
													id="municipio" 
													name="municipio" 
													type="text" 
													class="form-select" 
													placeholder="estado"
													required 
												>
													<option value="">Municipio en que vive</option>
													<optgroup label="Municipios de Mérida" class="small">
														<option value="AAD">Alberto Adriani</option>
														<option value="ABE">Andrés Bello</option>
														<option value="APS">Antonio Pinto Salinas</option>
														<option value="ARI">Aricagua</option>
														<option value="ACH">Arzobispo Chacón</option>
														<option value="CEL">Campo Elías</option>
														<option value="CPO">Caracciolo Parra Olmedo</option>
														<option value="CQU">Cardenal Quintero</option>
														<option value="GUA">Guaraque</option>
														<option value="JCS">Julio César Salas</option>
														<option value="JBR">Justo Briceño</option>
														<option value="LIB">Libertador</option>
														<option value="MIR">Miranda</option>
														<option value="ORL">Obispo Ramos De Lora</option>
														<option value="PNO">Padre Noguera</option>
														<option value="PLL">Pueblo Llano</option>
														<option value="RAN">Rangel</option>
														<option value="RDA">Rivas Dávila</option>
														<option value="SMA">Santos Marquina</option>
														<option value="SUC">Sucre</option>
														<option value="TOV">Tovar</option>
														<option value="TFC">Tulio Febres Cordero</option>
														<option value="ZEA">Zea</option>
													</optgroup>
												</select>
											</div>


											<div class="col-12 col-lg-4 mb-2">
												<label for="parroquia" class="form-label requerido">Parroquia:</label>
												<select 
													id="parroquia" 
													name="parroquia" 
													type="text" 
													class="form-select" 
													placeholder="estado"
													required
													disabled 
												>
													<option value="">Parroquia en que vive</option>
														<!-- Alberto Adriani -->
														<optgroup id="AAD" class="small" label="Alberto Adriani" disabled>
														   <option value="Presidente Betancourt">Presidente Betancourt</option>
														   <option value="Presidente Páez">Presidente Páez</option>
														   <option value="Presidente Rómulo Gallegos">Presidente Rómulo Gallegos</option>
														   <option value="Gabriel Picon Gonzalez">Gabriel Picon Gonzalez</option>
														   <option value="Hector Amable Mora">Hector Amable Mora</option>
														   <option value="Jose Nucete Sardi">Jose Nucete Sardi</option>
														   <option value="Pulido Mendez">Pulido Mendez</option>
														</optgroup>

														<!-- Andrés Bello -->
														<optgroup id="ABE" class="small" label="Andrés Bello" disabled>
														   <option value="La Azulita">La Azulita</option>
														</optgroup>

														<!-- Antonio Pinto Salinas -->
														<optgroup id="APS" class="small" label="Antonio Pinto Salinas" disabled>
														   <option value="Santa Cruz De Mora">Santa Cruz De Mora</option>
														   <option value="Mesa Bolivar">Mesa Bolivar</option>
														   <option value="Mesa De Las Palmas">Mesa De Las Palmas</option>
														</optgroup>

														<!-- Aricagua -->
														<optgroup id="ARI" class="small" label="Aricagua" disabled>
														   <option value="Aricagua">Aricagua</option>
														   <option value="San Antonio">San Antonio</option>
														</optgroup>

														<!-- Arzobispo Chacón -->
														<optgroup id="ACH" class="small" label="Arzobispo Chacón" disabled>
														   <option value="Canagua">Canagua</option>
														   <option value="Capuri">Capuri</option>
														   <option value="Chacantá ">Chacantá </option>
														   <option value="El Molino">El Molino</option>
														   <option value="Guaimaral">Guaimaral</option>
														   <option value="Mucutuy">Mucutuy</option>
														   <option value="Mucuchachi">Mucuchachi</option>
														</optgroup>

														<!-- Campo Elías -->
														<optgroup id="CEL" class="small" label="Campo Elías" disabled>
														   <option value="Fernandez Peña">Fernandez Peña</option>
														   <option value="Matriz">Matriz</option>
														   <option value="Montalban">Montalban</option>
														   <option value="Acequias">Acequias</option>
														   <option value="Jaji">Jaji</option>
														   <option value="La Mesa">La Mesa</option>
														   <option value="San Jose Del Sur">San Jose Del Sur</option>
														</optgroup>

														<!-- Caracciolo Parra Olmedo -->
														<optgroup id="CPO" class="small" label="Caracciolo Parra Olmedo" disabled>
														   <option value="Tucani">Tucani</option>
														   <option value="Florencio Ramirez">Florencio Ramirez</option>
														</optgroup>

														<!-- Cardenal Quintero -->
														<optgroup id="CQU" class="small" label="Cardenal Quintero" disabled>
														   <option value="Santo Domingo">Santo Domingo</option>
														   <option value="Las Piedras">Las Piedras</option>
														</optgroup>

														<!-- Guaraque -->
														<optgroup id="GUA" class="small" label="Guaraque" disabled>
														   <option value="Guaraque">Guaraque</option>
														   <option value="Mesa De Quintero">Mesa De Quintero</option>
														   <option value="Rio Negro">Rio Negro</option>
														</optgroup>

														<!-- Julio César Salas -->
														<optgroup id="JCS" class="small" label="Julio César Salas" disabled>
														   <option value="Arapuey">Arapuey</option>
														   <option value="Palmira">Palmira</option>
														</optgroup>

														<!-- Justo Briceño -->
														<optgroup id="JBR" class="small" label="Justo Briceño" disabled>
														   <option value="Torondoy">Torondoy</option>
														   <option value="San Cristobal De Torondoy">San Cristobal De Torondoy</option>
														</optgroup>

														<!-- Libertador -->
														<optgroup id="LIB" class="small" label="Libertador" disabled>
														   <option value="Antonio Spinetti Dini">Antonio Spinetti Dini</option>
														   <option value="Arias">Arias</option>
														   <option value="Caracciolo Parra Perez">Caracciolo Parra Perez</option>
														   <option value="Domingo Peña">Domingo Peña</option>
														   <option value="El Llano ">El Llano </option>
														   <option value="Gonzalo Picon Febres">Gonzalo Picon Febres</option>
														   <option value="Jacinto Plaza">Jacinto Plaza</option>
														   <option value="Juan Rodriguez Suarez">Juan Rodriguez Suarez</option>
														   <option value="Lasso De La Vega">Lasso De La Vega</option>
														   <option value="Mariano Picon Salas">Mariano Picon Salas</option>
														   <option value="Milla">Milla</option>
														   <option value="Osuna Rodriguez">Osuna Rodriguez</option>
														   <option value="Sagrario">Sagrario</option>
														   <option value="El Morro">El Morro</option>
														   <option value="Los Nevados">Los Nevados</option>
														</optgroup>

														<!-- Miranda -->
														<optgroup id="MIR" class="small" label="Miranda" disabled>
														   <option value="Timotes">Timotes</option>
														   <option value="Andres Eloy Blanco">Andres Eloy Blanco</option>
														   <option value="La Venta">La Venta</option>
														   <option value="Piñango">Piñango</option>
														</optgroup>

														<!-- Obispo Ramos De Lora -->
														<optgroup id="ORL" class="small" label="Obispo Ramos De Lora" disabled>
														   <option value="Santa Elena De Arenales">Santa Elena De Arenales</option>
														   <option value="Eloy Paredes">Eloy Paredes</option>
														   <option value="San Rafael De Alcazar">San Rafael De Alcazar</option>
														</optgroup>

														<!-- Padre Noguera -->
														<optgroup id="PNO" class="small" label="Padre Noguera" disabled>
														   <option value="Santa Maria De Caparo">Santa Maria De Caparo</option>
														</optgroup>

														<!-- Pueblo Llano -->
														<optgroup id="PLL" class="small" label="Pueblo Llano" disabled>
														   <option value="Pueblo Llano">Pueblo Llano</option>
														</optgroup>

														<!-- Rangel -->
														<optgroup id="RAN" class="small" label="Rangel" disabled>
														   <option value="Mucuchies">Mucuchies</option>
														   <option value="Cacute">Cacute</option>
														   <option value="La Toma">La Toma</option>
														   <option value="Mucuruba">Mucuruba</option>
														   <option value="San Rafael">San Rafael</option>
														</optgroup>

														<!-- Rivas Dávila -->
														<optgroup id="RDA" class="small" label="Rivas Dávila" disabled>
														   <option value="Bailadores">Bailadores</option>
														   <option value="Geronimo Maldonado">Geronimo Maldonado</option>
														</optgroup>

														<!-- Santos Marquina -->
														<optgroup id="SMA" class="small" label="Santos Marquina" disabled>
														   <option value="Tabay">Tabay</option>
														</optgroup>

														<!-- Sucre -->
														<optgroup id="SUC" class="small" label="Sucre" disabled>
														   <option value="Lagunillas">Lagunillas</option>
														   <option value="Chiguara">Chiguara</option>
														   <option value="Estanquez">Estanquez</option>
														   <option value="La Trampa">La Trampa</option>
														   <option value="Pueblo Nuevo Del Sur">Pueblo Nuevo Del Sur</option>
														   <option value="San Juan">San Juan</option>
														</optgroup>

														<!-- Tovar -->
														<optgroup id="TOV" class="small" label="Tovar" disabled>
														   <option value="Tovar">Tovar</option>
														   <option value="El Amparo">El Amparo</option>
														   <option value="El Llano">El Llano</option>
														   <option value="San Francisco">San Francisco</option>
														</optgroup>

														<!-- Tulio Febres Cordero -->
														<optgroup id="TFC" class="small" label="Tulio Febres Cordero" disabled>
														   <option value="Nueva Bolivia">Nueva Bolivia</option>
														   <option value="Independencia">Independencia</option>
														   <option value="Maria De La Concepcion Palacios B">Maria De La Concepcion Palacios B</option>
														   <option value="Santa Apolonia">Santa Apolonia</option>
														</optgroup>

														<!-- Zea -->
														<optgroup id="ZEA" class="small" label="Zea" disabled>
														   <option value="Zea">Zea</option>
														   <option value="Caño El Tigre">Caño El Tigre</option>
														</optgroup>
												</select>
											</div>


											<div class="col-12 col-lg-4 mb-2">
												<label for="sector" class="form-label">Sector:</label>
												<input 
													id="sector" 
													name="sector" 
													type="text" 
													class="form-control" 
													placeholder="Sector donde vive"
													minlength="1" 
												>
											</div>


											<div class="col-12 col-lg-4 mb-2">
												<label for="calle" class="form-label">Calle:</label>
												<input 
													id="calle" 
													name="calle" 
													type="text" 
													class="form-control" 
													placeholder="Calle"
													minlength="1" 
												>
											</div>


											<div class="col-12 col-lg-4 mb-2">
												<label for="" class="form-label">Número de casa:</label>
												<input 
													id="nro_casa" 
													name="nro_casa" 
													type="text" 
													class="form-control" 
													placeholder="Número de casa"
													minlength="1" 
												>
											</div>


											<div class="col-12 col-lg-4 mb-2">
												<label for="" class="form-label">Punto de referencia:</label>
												<input 
													id="punto_referencia" 
													name="punto_referencia" 
													type="text" 
													class="form-control" 
													placeholder="Punto de referencia"
													minlength="1" 
												>
											</div>
										</div>
										
										<!-- sugerencias de prefijo -->
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

										<!-- Telefonos -->
										<div class="row">
											<div class="col-12 col-lg-12">
												<label class="form-label mb-3">Números de telefono:</label>
											</div>
										</div>
										<div class="row">
											<!-- Telefono principal -->
											<div class="col-12 col-lg-2 mb-2">
												<label class="form-label requerido">Principal:</label>
											</div>
											<div class="col-12 col-lg-3 mb-2">
												<input 
													id="prefijo_principal_r" 
													class="form-control form-control-sm" 
													type="text" 
													name="prefijo_principal_r" 
													list="prefijos" 
													maxlength="4" 
													placeholder="Prefijo" 
													required
												>
											</div>
											<div class="col-12 col-lg-7 mb-2">
												<input 
													id="telefono_principal_r" 
													class="form-control form-control-sm" 
													type="tel" 
													name="telefono_principal_r" 
													placeholder="Número" 
													maxlength="12" 
													minlength="7" 
													required
												>
											</div>
										</div>
										<div class="row">
											<!-- Telefono secundario -->
											<div class="col-12 col-lg-2 mb-2">
												<label class="form-label">Secundario:</label>
											</div>
											<div class="col-12 col-lg-3 mb-2">
												<input 
													id="prefijo_secundario_r" 
													class="form-control form-control-sm" 
													type="text" 
													name="prefijo_secundario_r"  
													list="prefijos" 
													maxlength="4" 
													placeholder="Prefijo"
												>
											</div>
											<div class="col-12 col-lg-7 mb-2">
												<input 
													id="telefono_secundario_r" 
													class="form-control form-control-sm" 
													type="tel" 
													name="telefono_secundario_r" 
													placeholder="Número" 
													maxlength="12" 
													minlength="7"
												>
											</div>
										</div>
										<div class="row mb-2">
											<!-- Telefono auxiliar -->
											<div class="col-12 col-lg-2 mb-2">
												<label class="form-label">Auxiliar:</label>
											</div>
											<div class="col-12 col-lg-3 mb-2">
												<input 
													id="prefijo_auxiliar_r" 
													class="form-control form-control-sm" 
													type="text" 
													name="prefijo_auxiliar_r"  
													list="prefijos" 
													maxlength="4" 
													placeholder="Prefijo"
												>
											</div>
											<div class="col-12 col-lg-7 mb-2">
												<input 
													id="telefono_auxiliar_r" 
													class="form-control form-control-sm" 
													type="tel" 
													name="telefono_auxiliar_r" 
													placeholder="Número" 
													maxlength="12" 
													minlength="7"
												>
											</div>
											<!-- Informacion adicional -->
											<span class="form-text">En el caso de telefonos extranjeros, ingresar el codigo en el campo de prefijo rellenando con ceros a la izquierda. Ejemplo: 0052 (Mexico)</span>
										</div>
										

										<!-- Correo -->
										<div class="row my-4">
											<div class="col-12 col-lg-3">
												<label class="form-label">Correo electronico:</label>
											</div>
											<div class="col-12 col-lg-9">
												<input 
													id="correo_electronico_r" 
													class="mb-2 form-control" 
													type="email" 
													name="correo_electronico_r" 
													minlength="15" 
													placeholder="correo.ejemplo_1@dominio.com" 
												>
											</div>
										</div>
									</section>
									

									<!-- Seccion de datos de vivienda -->
									<section id="seccion3" class="row my-2" style="display:none;">
										<!-- Titulo de la seccion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="h5">
													<i class="fa-solid fa-house-circle-check fa-xl me-2"></i>
													Datos de vivienda
												</span>
											</div>
										</div>
										

										<!-- Condiciones de la vivienda -->
										<div class="row mb-4">
											<div class="col-12 col-lg-5">
												<label class="form-label requerido">Condiciones de la vivienda:</label>
											</div>
											<div class="col-12 col-lg-7">
												<!-- Condicion Buena -->
												<div class="form-check form-check-inline">
													<label for="cond_v_buenas" class="form-label">Buena </label>
													<input 
														id="cond_v_buenas" 
														class="form-check-input" 
														type="radio" 
														name="condicion_vivienda_r" 
														value="Buena" 
														required
													>
												</div>
												<!-- Condicion Regular -->
												<div class="form-check form-check-inline">
													<label for="cond_v_regular" class="form-label">Regular </label>
													<input 
														id="cond_v_regular" 
														class="form-check-input" 
														type="radio" 
														name="condicion_vivienda_r" 
														value="Regular" 
														required
													>
												</div>
												<!-- Condicion Mala -->
												<div class="form-check form-check-inline">
													<label for="cond_v_mala" class="form-label">Mala </label>
													<input 
														id="cond_v_mala" 
														class="form-check-input" 
														type="radio" 
														name="condicion_vivienda_r" 
														value="Mala" 
														required
													>
												</div>
												<label id="condicion_vivienda_r-error" class="error w-100" style="display:none;" for="condicion_vivienda_r"></label>
											</div>
										</div>
										

										<!-- Tipo de vivienda -->
										<div class="row mb-4">
											<div class="col-12 col-lg-3">
												<label class="form-label requerido">Tipo de vivienda:</label>
											</div>
											<div class="col-12 col-lg-9">
												<!-- Caso: Casa -->
												<div class="form-check form-check-inline">
													<label for="v_casa" class="form-label">Casa </label>
													<input 
														id="v_casa" 
														class="form-check-input" 
														type="radio" 
														name="tipo_vivienda_r" 
														value="Casa" 
														required
													>
												</div>
												<!-- Caso: Apartamento -->
												<div class="form-check form-check-inline">
													<label for="v_apart" class="form-label">Apartamento </label>
													<input 
														id="v_apart" 
														class="form-check-input" 
														type="radio" 
														name="tipo_vivienda_r" 
														value="Apartamento" 
														required
													>
												</div>
												<!-- Caso: Rancho -->
												<div class="form-check form-check-inline">
													<label for="v_rancho" class="form-label">Rancho </label>
													<input 
														id="v_rancho" 
														class="form-check-input" 
														type="radio" 
														name="tipo_vivienda_r" 
														value="Rancho" 
														required
													>
												</div>
												<!-- Caso: Quinta -->
												<div class="form-check form-check-inline">
													<label for="v_quinta" class="form-label">Quinta </label>
													<input 
														id="v_quinta" 
														class="form-check-input" 
														type="radio" 
														name="tipo_vivienda_r" 
														value="Quinta" 
														required
													>
												</div>
												<!-- Caso: Habitacion -->
												<div class="form-check form-check-inline">
													<label for="v_hab" class="form-label">Habitacion </label>
													<input 
														id="v_hab" 
														class="form-check-input" 
														type="radio" 
														name="tipo_vivienda_r" 
														value="Habitacion" 
														required
													>
												</div>
												<label id="tipo_vivienda_r-error" class="error w-100" style="display:none;" for="tipo_vivienda_r"></label>
											</div>
										</div>
										<!-- Tenencia de la vivienda -->
										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<label class="form-label requerido">Tenencia de la vivienda:</label>
											</div>
											<div class="col-12 col-lg-4">
												<!-- Tenencia de vivienda -->
												<select 
													id="tenencia_vivienda_r" 
													class="form-select" 
													name="tenencia_vivienda_r" 
													required
												>
													<option selected disabled value="">Seleccione una opcion</option>
													<option value="Propia">Propia</option>
													<option value="Alquilada">Alquilada</option>
													<option value="Prestada">Prestada</option>
													<option value="Otro">Otro</option>
												</select>
											</div>
											<div class="col-12 col-lg-4">
												<!-- Tenencia - Otra -->
												<input 
													id="tenencia_vivienda_r_otro" 
													class="form-control w-auto" 
													type="text" 
													name="tenencia_vivienda_r_otro" 
													maxlength="12" 
													minlength="3" 
													placeholder="En caso de ser otro, especifique"
													required 
													disabled 
												>
											</div>
										</div>
									</section>
									
									<!-- Seccion de datos economicos -->
									<section id="seccion4" class="row my-2" style="display:none;">

										<!-- Titulo de la seccion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="h5">
													<i class="fa-solid fa-piggy-bank fa-xl me-2"></i>
													Datos laborales
												</span>
											</div>
										</div>


										<!-- Representante trabaja -->
										<div class="row mb-4">
											<div class="col-12 col-lg-auto">
												<label class="form-label requerido">Trabaja:</label>
											</div>
											<div class="col-12 col-lg-auto">
												<!-- Caso: Si -->
												<div class="form-check form-check-inline">
													<label for="trabaja_s" class="form-label">Si </label>
													<input 
														id="trabaja_s" 
														class="form-check-input" 
														type="radio" 
														name="representante_trabaja" 
														value="Si" 
														required
													>
												</div>
												<!-- Caso: No -->
												<div class="form-check form-check-inline">
													<label for="trabaja_n" class="form-label">No </label>
													<input 
														id="trabaja_n" 
														class="form-check-input" 
														type="radio" 
														name="representante_trabaja" 
														value="No" 
														required
													>
												</div>
												<label id="representante_trabaja-error" class="error w-100" style="display:none;" for="representante_trabaja"></label>
											</div>
											<!-- Informacion adicional -->
											<span class="form-text">En caso de marcar <b>No</b>, se establecerá como desempleado.</span>
										</div>


										<!-- Campos si el representante trabaja -->
										<fieldset id="datos_trabajo" disabled style="display: none;">
											
											<!-- Cargo que ocupa -->
											<div class="row mb-4">
												<div class="col-12 col-lg-3">
													<label class="form-label requerido">Cargo que ocupa:</label>
												</div>
												<div class="col-12 col-lg-9">
													<input 
														id="empleo_r" 
														class="mb-2 form-control" 
														type="text" 
														name="empleo_r" 
														maxlength="60" 
														minlength="3"
														required 
													>
												</div>
											</div>
											

											<!-- Telefono del trabajo -->
											<div class="row mb-4">
												<div class="col-12 col-lg-3">
													<label class="form-label">Telefono del trabajo:</label>
												</div>
												<div class="col-12 col-lg-3">
													<input 
														id="prefijo_trabajo_r" 
														class="form-control form-control-sm" 
														type="text" 
														name="prefijo_trabajo_r"  
														list="prefijos" 
														maxlength="4" 
														placeholder="Prefijo"
													>
												</div>
												<div class="col-12 col-lg-6">
													<input 
														id="telefono_trabajo_r" 
														class="form-control form-control-sm" 
														type="tel" 
														name="telefono_trabajo_r" 
														placeholder="Número" 
														maxlength="12" 
														minlength="7"
													>
												</div>
												<!-- Informacion adicional -->
												<span class="form-text">En el caso de telefonos extranjeros, ingresar el codigo en el campo de prefijo rellenando con ceros a la izquierda. Ejemplo: 0052 (Mexico)</span>
											</div>
											

											<!-- Lugar del trabajo -->
											<div class="row mb-4">
												<div class="col-12 col-lg-12">
													<label class="form-label requerido">Lugar del trabajo:</label>
													<textarea 
														id="lugar_trabajo_r" 
														class="mb-2 form-control" 
														name="lugar_trabajo_r" 
														rows="2" 
														maxlength="180" 
														minlength="3" 
														style="resize: none;"
														required 
													></textarea>
												</div>
											</div>
											

											<!-- Remuneracion y tipo -->
											<div class="row mb-4">
												<div class="col-12 col-lg-6">
													<!-- Cantidad de sueldos mínimos como remuneracion -->
													<label class="form-label requerido">Remuneracion:</label>
													<input 
														id="remuneracion_r" 
														class="mb-2 form-control text-end" 
														type="number" 
														name="remuneracion_r" 
														placeholder="Ingrese un numero..." 
														min="0" 
														step="0.5"
														required 
													>
													<label id="remuneracion_r-error" class="error w-100" style="display:none;" for="remuneracion_r"></label>
													<!-- Informacion adicional -->
													<span class="form-text">Remuneracion aproximada en sueldos mínimos.</span>
												</div>
												<!-- Tipo de remuneracion -->
												<div class="col-12 col-lg-6">
													<label class="form-label requerido">Tipo de remuneracion:</label>
													<select class="form-select" name="tipo_remuneracion_r" required>
														<option value="" selected disabled>Frecuencia de la remuneracion</option>
														<option value="Diaria">Diaria</option>
														<option value="Semanal">Semanal</option>
														<option value="Quincenal">Quincenal</option>
														<option value="Mensual">Mensual</option>
													</select>
												</div>
											</div>
										</fieldset>

										<!-- Titulo de la seccion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="h5"><i class="fa-solid fa-piggy-bank fa-xl me-2"></i>Datos económicos</span>
											</div>
										</div>

										<!-- representante suministra datos bancarios -->
										<div class="row mb-4">
											<div class="col-12 col-lg-auto">
												<label class="form-label requerido">¿Desea agregar información bancaria?:</label>
											</div>
											<div class="col-12 col-lg-auto">
												<!-- Caso: Si -->
												<div class="form-check form-check-inline">
													<label for="trabaja_s" class="form-label">Si </label>
													<input 
														id="bancarios_s" 
														class="form-check-input" 
														type="radio" 
														name="sum_bancario" 
														value="Si" 
														required
													>
												</div>
												<!-- Caso: No -->
												<div class="form-check form-check-inline">
													<label for="trabaja_n" class="form-label">No </label>
													<input 
														id="bancarios_n" 
														class="form-check-input" 
														type="radio" 
														name="sum_bancario" 
														value="No" 
														required
													>
												</div>
												<label id="sum_bancario-error" class="error w-100" style="display:none;" for="sum_bancario"></label>
											</div>
											<!-- Información adicional -->
											<span class="form-text">Esta información es opcional y tiene el motivo de las becas...</span>
										</div>

										<fieldset id="datos_bancarios" disabled style="display: none;">

											<!-- Banco -->
											<div class="row mb-4">
												<div class="col-12 col-lg-2">
													<label class="form-label requerido">Banco:</label>
												</div>
												<div class="col-12 col-lg-10">
													<select class="form-select" name="banco" required>
														<option selected disabled value="">Seleccione una opcion</option>
														<option value="Banco de Venezuela S.A.">Banco de Venezuela S.A.</option>
														<option value="Venezolano de Credito S.A.">Venezolano de Credito S.A.</option>
														<option value="Banco Mercantil, C.A">Banco Mercantil, C.A</option>
														<option value="Banco Provincial, S.A.">Banco Provincial, S.A.</option>
														<option value="Bancaribe C.A.">Bancaribe C.A.</option>
														<option value="Banco Exterior C.A.">Banco Exterior C.A.</option>
														<option value="Banco Occidental de Descuento, C.A.">Banco Occidental de Descuento, C.A.</option>
														<option value="Banco Caroní C.A.">Banco Caroní C.A.</option>
														<option value="Banesco S.A.C.A.">Banesco S.A.C.A.</option>
														<option value="Banco Sofitasa C.A.">Banco Sofitasa C.A.</option>
														<option value="Banco Plaza C.A.">Banco Plaza C.A.</option>
														<option value="Banco de la Gente Emprendedora C.A. - Bangente">Banco de la Gente Emprendedora C.A. - Bangente</option>
														<option value="Banco del Pueblo Soberano, C.A.">Banco del Pueblo Soberano, C.A.</option>
														<option value="Banco Fondo Común C.A.">Banco Fondo Común C.A.</option>
														<option value="100% Banco, C.A.">100% Banco, C.A.</option>
														<option value="DelSur, C.A.">DelSur, C.A.</option>
														<option value="Banco del Tesoro, C.A.">Banco del Tesoro, C.A.</option>
														<option value="Banco Agrícola de Venezuela, C.A">Banco Agrícola de Venezuela, C.A</option>
														<option value="Bancrecer, S.A.">Bancrecer, S.A.</option>
														<option value="Mi Banco C.A.">Mi Banco C.A.</option>
														<option value="Banco Activo, C.A.">Banco Activo, C.A.</option>
														<option value="Bancamiga, C.A.">Bancamiga, C.A.</option>
														<option value="Banco Internacional de Desarrollo, C.A.">Banco Internacional de Desarrollo, C.A.</option>
														<option value="Banplus, C.A.">Banplus, C.A.</option>
														<option value="Banco Bicentenario C.A.">Banco Bicentenario C.A.</option>
														<option value="Banco de la Fuerza Armada Nacional Bolivariana - BANFANB">Banco de la Fuerza Armada Nacional Bolivariana - BANFANB</option>
														<option value="Citibank N.A.">Citibank N.A.</option>
														<option value="Banco Nacional de Credito, C.A.">Banco Nacional de Credito, C.A.</option>
														<option value="Instituto Municipal de Credito Popular">Instituto Municipal de Credito Popular</option>
													</select>
												</div>
											</div>
											<!-- Tipo de cuenta -->
											<div class="row mb-4">
												<div class="col-12 col-lg-auto">
													<label class="form-label requerido">Tipo de cuenta:</label>
												</div>
												<div class="col-12 col-lg-auto">
													<div class="form-check form-check-inline">
														<label for="cta_ahorro" class="form-label">Ahorro </label>
														<input 
															id="cta_ahorro" 
															class="form-check-input" 
															type="radio" 
															name="tipo_cuenta" 
															value="Ahorro" 
															required 
														>
													</div>
													<div class="form-check form-check-inline">
														<label for="cta_corriente" class="form-label">Corriente </label>
														<input 
															id="cta_corriente" 
															class="form-check-input" 
															type="radio" 
															name="tipo_cuenta" 
															value="Corriente" 
															required 
														>
													</div>
												</div>
											</div>
											<!-- Número de cuenta -->
											<div class="row mb-4">
												<div class="col-12 col-lg-3">
													<label class="form-label">Número de cuenta:</label>
												</div>
												<div class="col-12 col-lg-9">
													<input 
														id="nro_cuenta" 
														class="mb-2 form-control" 
														type="text" 
														name="nro_cuenta" 
														minlength="20" 
														maxlength="20" 
														placeholder="0123-XXXXXXXXXXXXXX"  
													>
												</div>
												<!-- Informacion adicional -->
												<span class="form-text">En caso de no recordarlo, dejar en blanco.</span>
											</div>
											
										</fieldset>

									</section>
									

									<!-- Datos del contacto auxiliar -->
									<section id="seccion5" class="row my-2" style="display:none;">
										<!-- Titulo de la seccion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="h5">
													<i class="fa-solid fa-handshake-angle fa-xl me-2"></i>
													Contacto auxiliar
												</span>
											</div>
										</div>
										

										<!-- Nombres del contacto auxiliar -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label class="form-label requerido">Nombres:</label>
											</div>
											<!-- Primer nombre -->
											<div class="col-12 col-lg-5">
												<input 
													id="primer_nombre_aux" 
													class="mb-2 form-control" 
													type="text" 
													name="primer_nombre_aux" 
													placeholder="Primer nombre" 
													minlength="3" 
													maxlength="40" 
													required
												>
											</div>
											<!-- Segundo nombre -->
											<div class="col-12 col-lg-5">
												<input 
													id="segundo_nombre_aux" 
													class="mb-2 form-control" 
													type="text" 
													name="segundo_nombre_aux" 
													placeholder="Segundo nombre" 
													minlength="3" 
													maxlength="40" 
												>
											</div>
										</div>
										<!-- Apellidos del contacto auxiliar -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label class="form-label requerido">Apellidos:</label>
											</div>
											<!-- Primer apellido -->
											<div class="col-12 col-lg-5">
												<input 
													id="primer_apellido_aux" 
													class="mb-2 form-control" 
													type="text" 
													name="primer_apellido_aux" 
													placeholder="Primer apellido" 
													minlength="3" 
													maxlength="40" 
													required
												>
											</div>
											<!-- Segundo apellido -->
											<div class="col-12 col-lg-5">
												<input 
													id="segundo_apellido_aux" 
													class="mb-2 form-control" 
													type="text" 
													name="segundo_apellido_aux" 
													placeholder="Segundo apellido" 
													minlength="3"
													maxlength="40"  
												>
											</div>
										</div>

										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="form-text">Solo son obligatorios primer nombre y primer apellido.</span>
											</div>
										</div>
										

										<!-- Telefono del contacto auxiliar -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label class="form-label requerido">Telefono:</label>
											</div>
											<div class="col-12 col-lg-3">
												<input 
													id="prefijo_principal_aux" 
													class="form-control form-control-sm" 
													type="text" 
													name="prefijo_principal_aux" 
													list="prefijos" 
													maxlength="4" 
													placeholder="Prefijo" 
													required
												>
											</div>
											<div class="col-12 col-lg-7">
												<input 
													id="telefono_principal_aux" 
													class="form-control form-control-sm" 
													type="tel" 
													name="telefono_principal_aux" 
													placeholder="Número" 
													maxlength="7" 
													minlength="7" 
													required
												>
											</div>
											<!-- Informacion adicional -->
											<span class="form-text">El número de telefono del contacto auxiliar debe ser local.</span>
										</div>
										

										<!-- Relacion del representante con el contacto auxiliar -->
										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<label class="form-label requerido">Relacion con la persona:</label>
											</div>
											<div class="col-12 col-lg-8">
												<input 
													id="relacion_auxiliar" 
													class="mb-2 form-control" 
													type="text" 
													name="relacion_auxiliar" 
													placeholder="Vecino, familiar, etc." 
													maxlength="12" 
													minlength="3" 
													required
												>
											</div>
										</div>

									</section>
									<input type="hidden" name="datos_representante" value="Datos_Representante">
								</form>
							</div>
						</div>
					</div>
					<div class="card-footer nav justify-content-md-between">
						<a class="btn btn-primary" href="../index.php">
							<i class="fa-solid fa-xl me-2 fa-home"></i>
							Volver al inicio
						</a>
						<div class="ms-auto">
							<button id="boton_anterior" class="btn btn-primary" type="button">
								<i class="fa-solid fa-xl me-2 fa-backward"></i>
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
			<?php include '../../ayuda.php'; ?>
		</main>
		<script type="text/javascript" src="../../js/sweetalert2.js"></script>
		<script type="text/javascript" src="../../js/jquery-3.6.1.min.js"></script>
		<script type="text/javascript" src="../../js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="../../js/additional-methods.min.js"></script>
		<script type="text/javascript" src="../../js/messages_es.min.js"></script>
		<script type="text/javascript" src="../../js/validaciones_representante.js"></script>
		<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
	</body>
</html>
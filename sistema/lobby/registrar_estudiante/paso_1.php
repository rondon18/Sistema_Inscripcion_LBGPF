<?php

include("funciones.php");
session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

$nivel = 2;

// El formulario redirecciona a sí mismo, luego al paso 2 una vez se asignan las variables de sesión

// Verificación al momento de enviar el formulario
if (isset($_POST['paso_1'])) {
	// Check de que el paso fue completado
	$_SESSION['orden'] = "insertar";
	$_SESSION['paso_1'] = $_POST['paso_1'];
	

	// Se almacenan los datos del formulario en un arreglo
	$datos_representante = [];
	foreach ($_POST as $indice => $valor) {
		$datos_representante[$indice]= $valor;
	}

	// Se anexan como arreglo de arreglos en una variable de sesión
	$_SESSION['datos_inscripcion']['datos_representante'] = $datos_representante;

	// Redirecciona al paso 2
	header('Location: paso_2.php');
}

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
			<?php include('../../header.php');?>
			<div class="container-md">	
				<div class="card">
					<!-- Titulo del contenedor -->
					<div class="card-header text-center">
						<b class="fs-4">Formulario de registro - Representante</b>
					</div>
					<div class="card-body">
						<div class="row">

							<!-- Selector de sección -->
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
										<span id="link4" class="nav-link" href="#">Datos económicos</span>
									</li>
									<li class="nav-item">
										<span id="link5" class="nav-link" href="#">Contacto auxiliar</span>
									</li>
								</ul>
							</div>
							
							<!-- Contenedor del formulario -->
							<div class="col-12 col-lg-9 py-0" style="max-height: 60vh; overflow-y: auto;">
								<form id="formulariorepresentante" action="paso_1.php" method="POST">
									
									<!-- Sección de datos personales -->
									<section id="seccion1" class="row my-2">
										
										<!-- Titulo de la sección -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="h5">
													<i class="fa-solid fa-person fa-xl me-2"></i>
													Datos personales
												</span>
											</div>
										</div>

										<!-- Cédula -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label class="form-label requerido">Cédula:</label>
											</div>

											<div class="col-12 col-lg-3">
													<!-- Nacionalidad -->
													<select
														id="nacionalidad_r"
														class="form-select"
														name="nacionalidad_r"
														required
													>
														<option value="">Nacionalidad</option>
														<option value="V" <?php dato_sesion_opt("V","nacionalidad_r","s");?>>V</option>
														<option value="E" <?php dato_sesion_opt("E","nacionalidad_r","s");?>>E</option>
													</select>
											</div>
											<div class="col-12 col-lg-7">

													<!-- Número de cédula -->
													<input
														id="cedula_r"
														class="form-control"
														type="text"
														name="cedula_r"
														maxlength="8"
														minlength="7"
														placeholder="Número de cedula"
														required
														value="<?php echo dato_sesion_i("cedula_r");?>"
													>
											</div>

											<div class="col-12 col-lg-12 mt-2 p-0">
												<span class="form-text">La cédula consta de una nacionalidad y de un número con alrededor de 7 a 8 dígitos.</span>
											</div>
										</div>

										<!-- Nombres -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label class="form-label requerido">Nombres:</label>
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
													value="<?php echo dato_sesion_i("primer_nombre_r");?>" 
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
													value="<?php echo dato_sesion_i("segundo_nombre_r");?>"  
												>
											</div>
										</div>
										

										<!-- Apellidos -->
										<div class="row mb-2">
											<div class="col-12 col-lg-2">
												<label class="form-label requerido">Apellidos:</label>
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
													value="<?php echo dato_sesion_i("primer_apellido_r");?>" 
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
													value="<?php echo dato_sesion_i("segundo_apellido_r");?>" 
												>
											</div>
										</div>

										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="form-text">Solo son obligatorios primer nombre y primer apellido.</span>
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
														<?php dato_sesion_opt("F","genero_r","rc");?>
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
														<?php dato_sesion_opt("M","genero_r","rc");?>
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
													<option value="">Seleccione una opción</option>
													<option value="Soltero(a)" <?php dato_sesion_opt("Soltero(a)","estado_civil_r","s");?>>Soltero(a)</option>
													<option value="Casado(a)" <?php dato_sesion_opt("Casado(a)","estado_civil_r","s");?>>Casado(a)</option>
													<option value="Divorciado(a)" <?php dato_sesion_opt("Divorciado(a)","estado_civil_r","s");?>>Divorciado(a)</option>
													<option value="Viudo(a)" <?php dato_sesion_opt("Viudo(a)","estado_civil_r","s");?>>Viudo(a)</option>
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
													value="<?php echo dato_sesion_i("fecha_nacimiento_r");?>"
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
													value="<?php echo dato_sesion_i("lugar_nacimiento_r");?>"
												>
											</div>
										</div>
										

										<!-- Grado de instrucción -->
										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<span class="form-label requerido">Grado de instrucción:</span>
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
														<?php dato_sesion_opt("Primaria","grado_instruccion_r","rc");?>
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
														<?php dato_sesion_opt("Bachillerato","grado_instruccion_r","rc");?>
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
														<?php dato_sesion_opt("Universitario","grado_instruccion_r","rc");?>
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
													<option value="">Vínculo</option>
													<option value="Madre" <?php dato_sesion_opt("Madre","vinculo_r","s");?>>Madre</option>
													<option value="Padre" <?php dato_sesion_opt("Padre","vinculo_r","s");?>>Padre</option>
													<option value="Tío(a)" <?php dato_sesion_opt("Tío(a)","vinculo_r","s");?>>Tío(a)</option>
													<option value="Abuelo(a)" <?php dato_sesion_opt("Abuelo(a)","vinculo_r","s");?>>Abuelo(a)</option>
													<option value="Otro" <?php dato_sesion_opt("Otro","vinculo_r","s");?>>Otro</option>
												</select>
											</div>
											<div class="col-12 col-lg-5">
												<input 
												id="vinculo_otro" 
												name="vinculo_otro" 
												type="text" 
												class="form-control" 
												placeholder="En caso de ser otro, especifique" 
												required 
												value="<?php echo dato_sesion_i("vinculo_otro");?>"
												<?php if(dato_sesion_i("vinculo_r") != "Otro"){echo "disabled";} ?>
												>
											</div>
										</div>
										

										<!-- Carnet de la patria -->
										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<span class="form-label">Carnet de la patria:</span>
											</div>
											<!-- Código de carnet de la patria -->
											<div class="col-12 col-lg-4">
												<input 
													id="codigo_carnet_patria_r" 
													class="mb-2 form-control" 
													type="text" 
													name="codigo_carnet_patria_r" 
													placeholder="Codigo" 
													minlength="10"
													maxlength="10"
													value="<?php echo dato_sesion_i("codigo_carnet_patria_r");?>"
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
													value="<?php echo dato_sesion_i("serial_carnet_patria_r");?>"
												>
											</div>
											<div class="col-12 col-lg-12">
												<span class="form-text">En caso de no tener, dejar vacío.</span>
											</div>
										</div>
									</section>
									

									<!-- Sección de datos de contacto -->
									<section id="seccion2" class="row my-2" style="display:none;">
										<!-- Titulo de la sección -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="h5">
													<i class="fa-solid fa-address-book fa-xl me-2"></i>
													Datos de contacto
												</span>
											</div>
										</div>
										

										<!-- Dirección de residencia -->
										<div class="row mb-4">
											<div class="col-12 col-lg-4 mb-2">
												<label for="municipio" class="form-label requerido">Municipio:</label>
												<select 
													id="municipio" 
													name="municipio" 
													type="text" 
													class="form-select" 
													required 
												>
													<option value="">Municipio en que vive</option>
													<optgroup label="Municipios de Mérida" class="small">
														<option value="AAD" <?php dato_sesion_opt("AAD","municipio","s");?>>Alberto Adriani</option>
														<option value="ABE" <?php dato_sesion_opt("ABE","municipio","s");?>>Andrés Bello</option>
														<option value="APS" <?php dato_sesion_opt("APS","municipio","s");?>>Antonio Pinto Salinas</option>
														<option value="ARI" <?php dato_sesion_opt("ARI","municipio","s");?>>Aricagua</option>
														<option value="ACH" <?php dato_sesion_opt("ACH","municipio","s");?>>Arzobispo Chacón</option>
														<option value="CEL" <?php dato_sesion_opt("CEL","municipio","s");?>>Campo Elías</option>
														<option value="CPO" <?php dato_sesion_opt("CPO","municipio","s");?>>Caracciolo Parra Olmedo</option>
														<option value="CQU" <?php dato_sesion_opt("CQU","municipio","s");?>>Cardenal Quintero</option>
														<option value="GUA" <?php dato_sesion_opt("GUA","municipio","s");?>>Guaraque</option>
														<option value="JCS" <?php dato_sesion_opt("JCS","municipio","s");?>>Julio César Salas</option>
														<option value="JBR" <?php dato_sesion_opt("JBR","municipio","s");?>>Justo Briceño</option>
														<option value="LIB" <?php dato_sesion_opt("LIB","municipio","s");?>>Libertador</option>
														<option value="MIR" <?php dato_sesion_opt("MIR","municipio","s");?>>Miranda</option>
														<option value="ORL" <?php dato_sesion_opt("ORL","municipio","s");?>>Obispo Ramos De Lora</option>
														<option value="PNO" <?php dato_sesion_opt("PNO","municipio","s");?>>Padre Noguera</option>
														<option value="PLL" <?php dato_sesion_opt("PLL","municipio","s");?>>Pueblo Llano</option>
														<option value="RAN" <?php dato_sesion_opt("RAN","municipio","s");?>>Rangel</option>
														<option value="RDA" <?php dato_sesion_opt("RDA","municipio","s");?>>Rivas Dávila</option>
														<option value="SMA" <?php dato_sesion_opt("SMA","municipio","s");?>>Santos Marquina</option>
														<option value="SUC" <?php dato_sesion_opt("SUC","municipio","s");?>>Sucre</option>
														<option value="TOV" <?php dato_sesion_opt("TOV","municipio","s");?>>Tovar</option>
														<option value="TFC" <?php dato_sesion_opt("TFC","municipio","s");?>>Tulio Febres Cordero</option>
														<option value="ZEA" <?php dato_sesion_opt("ZEA","municipio","s");?>>Zea</option>
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
													required
													<?php if(empty(dato_sesion_i("parroquia"))){echo "disabled";} ?> 
												>
													<option value="">Parroquia en que vive</option>
														<!-- Alberto Adriani -->
														<optgroup id="AAD" class="small" label="Alberto Adriani" <?php if(dato_sesion_i("municipio") != "AAD"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("Presidente Betancourt","parroquia","s");?> value="Presidente Betancourt">Presidente Betancourt</option>
														   <option <?php dato_sesion_opt("Presidente Páez","parroquia","s");?> value="Presidente Páez">Presidente Páez</option>
														   <option <?php dato_sesion_opt("Presidente Rómulo Gallegos","parroquia","s");?> value="Presidente Rómulo Gallegos">Presidente Rómulo Gallegos</option>
														   <option <?php dato_sesion_opt("Gabriel Picón Gonzalez","parroquia","s");?> value="Gabriel Picón Gonzalez">Gabriel Picón Gonzalez</option>
														   <option <?php dato_sesion_opt("Hector Amable Mora","parroquia","s");?> value="Hector Amable Mora">Hector Amable Mora</option>
														   <option <?php dato_sesion_opt("Jose Nucete Sardi","parroquia","s");?> value="Jose Nucete Sardi">Jose Nucete Sardi</option>
														   <option <?php dato_sesion_opt("Pulido Mendez","parroquia","s");?> value="Pulido Mendez">Pulido Mendez</option>
														</optgroup>

														<!-- Andrés Bello -->
														<optgroup id="ABE" class="small" label="Andrés Bello" <?php if(dato_sesion_i("municipio") != "ABE"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("La Azulita","parroquia","s");?> value="La Azulita">La Azulita</option>
														</optgroup>

														<!-- Antonio Pinto Salinas -->
														<optgroup id="APS" class="small" label="Antonio Pinto Salinas" <?php if(dato_sesion_i("municipio") != "APS"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("Santa Cruz De Mora","parroquia","s");?> value="Santa Cruz De Mora">Santa Cruz De Mora</option>
														   <option <?php dato_sesion_opt("Mesa Bolívar","parroquia","s");?> value="Mesa Bolívar">Mesa Bolívar</option>
														   <option <?php dato_sesion_opt("Mesa De Las Palmas","parroquia","s");?> value="Mesa De Las Palmas">Mesa De Las Palmas</option>
														</optgroup>

														<!-- Aricagua -->
														<optgroup id="ARI" class="small" label="Aricagua" <?php if(dato_sesion_i("municipio") != "ARI"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("Aricagua","parroquia","s");?> value="Aricagua">Aricagua</option>
														   <option <?php dato_sesion_opt("San Antonio","parroquia","s");?> value="San Antonio">San Antonio</option>
														</optgroup>

														<!-- Arzobispo Chacón -->
														<optgroup id="ACH" class="small" label="Arzobispo Chacón" <?php if(dato_sesion_i("municipio") != "ACH"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("Canaguá","parroquia","s");?> value="Canaguá">Canaguá</option>
														   <option <?php dato_sesion_opt("Capuri","parroquia","s");?> value="Capuri">Capuri</option>
														   <option <?php dato_sesion_opt("Chacantá","parroquia","s");?> value="Chacantá ">Chacantá </option>
														   <option <?php dato_sesion_opt("El Molino","parroquia","s");?> value="El Molino">El Molino</option>
														   <option <?php dato_sesion_opt("Guaimaral","parroquia","s");?> value="Guaimaral">Guaimaral</option>
														   <option <?php dato_sesion_opt("Mucutuy","parroquia","s");?> value="Mucutuy">Mucutuy</option>
														   <option <?php dato_sesion_opt("Mucuchachi","parroquia","s");?> value="Mucuchachi">Mucuchachi</option>
														</optgroup>

														<!-- Campo Elías -->
														<optgroup id="CEL" class="small" label="Campo Elías" <?php if(dato_sesion_i("municipio") != "CEL"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("Fernández Peña","parroquia","s");?> value="Fernández Peña">Fernández Peña</option>
														   <option <?php dato_sesion_opt("Matriz","parroquia","s");?> value="Matriz">Matriz</option>
														   <option <?php dato_sesion_opt("Montalbán","parroquia","s");?> value="Montalbán">Montalbán</option>
														   <option <?php dato_sesion_opt("Acequias","parroquia","s");?> value="Acequias">Acequias</option>
														   <option <?php dato_sesion_opt("Jají","parroquia","s");?> value="Jají">Jají</option>
														   <option <?php dato_sesion_opt("La Mesa","parroquia","s");?> value="La Mesa">La Mesa</option>
														   <option <?php dato_sesion_opt("San Jose Del Sur","parroquia","s");?> value="San Jose Del Sur">San Jose Del Sur</option>
														</optgroup>

														<!-- Caracciolo Parra Olmedo -->
														<optgroup id="CPO" class="small" label="Caracciolo Parra Olmedo" <?php if(dato_sesion_i("municipio") != "CPO"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("Tucaní","parroquia","s");?> value="Tucaní">Tucaní</option>
														   <option <?php dato_sesion_opt("Florencio Ramírez","parroquia","s");?> value="Florencio Ramírez">Florencio Ramírez</option>
														</optgroup>

														<!-- Cardenal Quintero -->
														<optgroup id="CQU" class="small" label="Cardenal Quintero" <?php if(dato_sesion_i("municipio") != "CQU"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("Santo Domingo","parroquia","s");?> value="Santo Domingo">Santo Domingo</option>
														   <option <?php dato_sesion_opt("Las Piedras","parroquia","s");?> value="Las Piedras">Las Piedras</option>
														</optgroup>

														<!-- Guaraque -->
														<optgroup id="GUA" class="small" label="Guaraque" <?php if(dato_sesion_i("municipio") != "GUA"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("Guaraque","parroquia","s");?> value="Guaraque">Guaraque</option>
														   <option <?php dato_sesion_opt("Mesa De Quintero","parroquia","s");?> value="Mesa De Quintero">Mesa De Quintero</option>
														   <option <?php dato_sesion_opt("Río Negro","parroquia","s");?> value="Río Negro">Río Negro</option>
														</optgroup>

														<!-- Julio César Salas -->
														<optgroup id="JCS" class="small" label="Julio César Salas" <?php if(dato_sesion_i("municipio") != "JCS"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("Arapuey","parroquia","s");?> value="Arapuey">Arapuey</option>
														   <option <?php dato_sesion_opt("Palmira","parroquia","s");?> value="Palmira">Palmira</option>
														</optgroup>

														<!-- Justo Briceño -->
														<optgroup id="JBR" class="small" label="Justo Briceño" <?php if(dato_sesion_i("municipio") != "JBR"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("Torondoy","parroquia","s");?> value="Torondoy">Torondoy</option>
														   <option <?php dato_sesion_opt("San Cristobal De Torondoy","parroquia","s");?> value="San Cristobal De Torondoy">San Cristobal De Torondoy</option>
														</optgroup>

														<!-- Libertador -->
														<optgroup id="LIB" class="small" label="Libertador" <?php if(dato_sesion_i("municipio") != "LIB"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("Antonio Spinetti Dini","parroquia","s");?> value="Antonio Spinetti Dini">Antonio Spinetti Dini</option>
														   <option <?php dato_sesion_opt("Arias","parroquia","s");?> value="Arias">Arias</option>
														   <option <?php dato_sesion_opt("Caracciolo Parra Pérez","parroquia","s");?> value="Caracciolo Parra Pérez">Caracciolo Parra Pérez</option>
														   <option <?php dato_sesion_opt("Domingo Peña","parroquia","s");?> value="Domingo Peña">Domingo Peña</option>
														   <option <?php dato_sesion_opt("El Llano","parroquia","s");?> value="El Llano">El Llano</option>
														   <option <?php dato_sesion_opt("Gonzalo Picón Febres","parroquia","s");?> value="Gonzalo Picón Febres">Gonzalo Picón Febres</option>
														   <option <?php dato_sesion_opt("Jacinto Plaza","parroquia","s");?> value="Jacinto Plaza">Jacinto Plaza</option>
														   <option <?php dato_sesion_opt("Juan Rodríguez Suárez","parroquia","s");?> value="Juan Rodríguez Suárez">Juan Rodríguez Suárez</option>
														   <option <?php dato_sesion_opt("Lasso De La Vega","parroquia","s");?> value="Lasso De La Vega">Lasso De La Vega</option>
														   <option <?php dato_sesion_opt("Mariano Picón Salas","parroquia","s");?> value="Mariano Picón Salas">Mariano Picón Salas</option>
														   <option <?php dato_sesion_opt("Milla","parroquia","s");?> value="Milla">Milla</option>
														   <option <?php dato_sesion_opt("Osuna Rodríguez","parroquia","s");?> value="Osuna Rodríguez">Osuna Rodríguez</option>
														   <option <?php dato_sesion_opt("Sagrario","parroquia","s");?> value="Sagrario">Sagrario</option>
														   <option <?php dato_sesion_opt("El Morro","parroquia","s");?> value="El Morro">El Morro</option>
														   <option <?php dato_sesion_opt("Los Nevados","parroquia","s");?> value="Los Nevados">Los Nevados</option>
														</optgroup>

														<!-- Miranda -->
														<optgroup id="MIR" class="small" label="Miranda" <?php if(dato_sesion_i("municipio") != "MIR"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("Timotes","parroquia","s");?> value="Timotes">Timotes</option>
														   <option <?php dato_sesion_opt("Andrés Eloy Blanco","parroquia","s");?> value="Andres Eloy Blanco">Andrés Eloy Blanco</option>
														   <option <?php dato_sesion_opt("La Venta","parroquia","s");?> value="La Venta">La Venta</option>
														   <option <?php dato_sesion_opt("Piñango","parroquia","s");?> value="Piñango">Piñango</option>
														</optgroup>

														<!-- Obispo Ramos De Lora -->
														<optgroup id="ORL" class="small" label="Obispo Ramos De Lora" <?php if(dato_sesion_i("municipio") != "ORL"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("Santa Elena De Arenales","parroquia","s");?> value="Santa Elena De Arenales">Santa Elena De Arenales</option>
														   <option <?php dato_sesion_opt("Eloy Paredes","parroquia","s");?> value="Eloy Paredes">Eloy Paredes</option>
														   <option <?php dato_sesion_opt("San Rafael De Alcázar","parroquia","s");?> value="San Rafael De Alcázar">San Rafael De Alcázar</option>
														</optgroup>

														<!-- Padre Noguera -->
														<optgroup id="PNO" class="small" label="Padre Noguera" <?php if(dato_sesion_i("municipio") != "PNO"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("Santa María De Caparo","parroquia","s");?> value="Santa María De Caparo">Santa María De Caparo</option>
														</optgroup>

														<!-- Pueblo Llano -->
														<optgroup id="PLL" class="small" label="Pueblo Llano" <?php if(dato_sesion_i("municipio") != "PLL"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("Pueblo Llano","parroquia","s");?> value="Pueblo Llano">Pueblo Llano</option>
														</optgroup>

														<!-- Rangel -->
														<optgroup id="RAN" class="small" label="Rangel" <?php if(dato_sesion_i("municipio") != "RAN"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("Mucuchies","parroquia","s");?> value="Mucuchies">Mucuchies</option>
														   <option <?php dato_sesion_opt("Cacute","parroquia","s");?> value="Cacute">Cacute</option>
														   <option <?php dato_sesion_opt("La Toma","parroquia","s");?> value="La Toma">La Toma</option>
														   <option <?php dato_sesion_opt("Mucuruba","parroquia","s");?> value="Mucuruba">Mucuruba</option>
														   <option <?php dato_sesion_opt("San Rafael","parroquia","s");?> value="San Rafael">San Rafael</option>
														</optgroup>

														<!-- Rivas Dávila -->
														<optgroup id="RDA" class="small" label="Rivas Dávila" <?php if(dato_sesion_i("municipio") != "RDA"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("Bailadores","parroquia","s");?> value="Bailadores">Bailadores</option>
														   <option <?php dato_sesion_opt("Geronimo Maldonado","parroquia","s");?> value="Geronimo Maldonado">Geronimo Maldonado</option>
														</optgroup>

														<!-- Santos Marquina -->
														<optgroup id="SMA" class="small" label="Santos Marquina" <?php if(dato_sesion_i("municipio") != "SMA"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("Tabay","parroquia","s");?> value="Tabay">Tabay</option>
														</optgroup>

														<!-- Sucre -->
														<optgroup id="SUC" class="small" label="Sucre" <?php if(dato_sesion_i("municipio") != "SUC"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("Lagunillas","parroquia","s");?> value="Lagunillas">Lagunillas</option>
														   <option <?php dato_sesion_opt("Chiguará","parroquia","s");?> value="Chiguará">Chiguará</option>
														   <option <?php dato_sesion_opt("Estanquez","parroquia","s");?> value="Estanquez">Estanquez</option>
														   <option <?php dato_sesion_opt("La Trampa","parroquia","s");?> value="La Trampa">La Trampa</option>
														   <option <?php dato_sesion_opt("Pueblo Nuevo Del Sur","parroquia","s");?> value="Pueblo Nuevo Del Sur">Pueblo Nuevo Del Sur</option>
														   <option <?php dato_sesion_opt("San Juan","parroquia","s");?> value="San Juan">San Juan</option>
														</optgroup>

														<!-- Tovar -->
														<optgroup id="TOV" class="small" label="Tovar" <?php if(dato_sesion_i("municipio") != "TOV"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("Tovar","parroquia","s");?> value="Tovar">Tovar</option>
														   <option <?php dato_sesion_opt("El Amparo","parroquia","s");?> value="El Amparo">El Amparo</option>
														   <option <?php dato_sesion_opt("El Llano","parroquia","s");?> value="El Llano">El Llano</option>
														   <option <?php dato_sesion_opt("San Francisco","parroquia","s");?> value="San Francisco">San Francisco</option>
														</optgroup>

														<!-- Tulio Febres Cordero -->
														<optgroup id="TFC" class="small" label="Tulio Febres Cordero" <?php if(dato_sesion_i("municipio") != "TFC"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("Nueva Bolivia","parroquia","s");?> value="Nueva Bolivia">Nueva Bolivia</option>
														   <option <?php dato_sesion_opt("Independencia","parroquia","s");?> value="Independencia">Independencia</option>
														   <option <?php dato_sesion_opt("María De La Concepción Palacios B","parroquia","s");?> value="María De La Concepcion Palacios B">María De La Concepción Palacios B</option>
														   <option <?php dato_sesion_opt("Santa Apolonia","parroquia","s");?> value="Santa Apolonia">Santa Apolonia</option>
														</optgroup>

														<!-- Zea -->
														<optgroup id="ZEA" class="small" label="Zea" <?php if(dato_sesion_i("municipio") != "ZEA"){echo "disabled";} ?>>
														   <option <?php dato_sesion_opt("Zea","parroquia","s");?> value="Zea">Zea</option>
														   <option <?php dato_sesion_opt("Caño El Tigre","parroquia","s");?> value="Caño El Tigre">Caño El Tigre</option>
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
													value="<?php echo dato_sesion_i("sector");?>" 
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
													value="<?php echo dato_sesion_i("calle");?>" 
												>
											</div>


											<div class="col-12 col-lg-4 mb-2">
												<label for="nro_casa" class="form-label">Número de casa:</label>
												<input 
													id="nro_casa" 
													name="nro_casa" 
													type="text" 
													class="form-control" 
													placeholder="Número de casa"
													minlength="1"
													value="<?php echo dato_sesion_i("nro_casa");?>" 
												>
											</div>


											<div class="col-12 col-lg-4 mb-2">
												<label for="punto_referencia" class="form-label">Punto de referencia:</label>
												<input 
													id="punto_referencia" 
													name="punto_referencia" 
													type="text" 
													class="form-control" 
													placeholder="Punto de referencia"
													minlength="1"
													value="<?php echo dato_sesion_i("punto_referencia");?>" 
												>
											</div>
										</div>
										
										<!-- sugerencias de prefijo -->
										<datalist id="prefijos">
											<!--Móviles-->
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

										<!-- Teléfonos -->
										<div class="row">
											<div class="col-12 col-lg-12">
												<label class="form-label mb-3">Números de teléfono:</label>
											</div>
										</div>
										<div class="row">
											<!-- Teléfono principal -->
											<div class="col-12 col-lg-2 mb-2">
												<label class="form-label requerido">Principal:</label>
											</div>
											<div class="col-12 col-lg-3 mb-2">
												<input 
													id="prefijo_principal_r" 
													class="form-control form-control-sm" 
													type="tel" 
													name="prefijo_principal_r" 
													list="prefijos" 
													maxlength="4" 
													placeholder="Prefijo" 
													required
													value="<?php echo dato_sesion_i("prefijo_principal_r");?>" 
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
													value="<?php echo dato_sesion_i("telefono_principal_r");?>" 
												>
											</div>
										</div>

											<!-- Teléfono secundario -->
										<div class="row">
											<div class="col-12 col-lg-2 mb-2">
												<label class="form-label">Secundario:</label>
											</div>
											<div class="col-12 col-lg-3 mb-2">
												<input 
													id="prefijo_secundario_r" 
													class="form-control form-control-sm" 
													type="tel" 
													name="prefijo_secundario_r"  
													list="prefijos" 
													maxlength="4" 
													placeholder="Prefijo"
													value="<?php echo dato_sesion_i("prefijo_secundario_r");?>" 
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
													value="<?php echo dato_sesion_i("telefono_secundario_r");?>" 
												>
											</div>
										</div>

											<!-- Teléfono auxiliar -->
										<div class="row mb-2">
											<div class="col-12 col-lg-2 mb-2">
												<label class="form-label">Auxiliar:</label>
											</div>
											<div class="col-12 col-lg-3 mb-2">
												<input 
													id="prefijo_auxiliar_r" 
													class="form-control form-control-sm" 
													type="tel" 
													name="prefijo_auxiliar_r"  
													list="prefijos" 
													maxlength="4" 
													placeholder="Prefijo"
													value="<?php echo dato_sesion_i("prefijo_auxiliar_r");?>" 
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
													value="<?php echo dato_sesion_i("telefono_auxiliar_r");?>" 
												>
											</div>
										</div>
										

										<!-- Correo -->
										<div class="row my-4">
											<div class="col-12 col-lg-3">
												<label class="form-label">Correo electrónico:</label>
											</div>
											<div class="col-12 col-lg-9">
												<input 
													id="correo_electronico_r" 
													class="mb-2 form-control" 
													type="email" 
													name="correo_electronico_r" 
													minlength="10" 
													placeholder="correo.ejemplo_1@dominio.com" 
													value="<?php echo dato_sesion_i("correo_electronico_r");?>" 
												>
											</div>
										</div>
									</section>
									

									<!-- Sección de datos de vivienda -->
									<section id="seccion3" class="row my-2" style="display:none;">
										<!-- Titulo de la sección -->
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
												<!-- Condición Buena -->
												<div class="form-check form-check-inline">
													<label for="cond_v_buenas" class="form-label">Buena </label>
													<input 
														id="cond_v_buenas" 
														class="form-check-input" 
														type="radio" 
														name="condicion_vivienda_r" 
														value="Buena" 
														required
														<?php dato_sesion_opt("Buena","condicion_vivienda_r","rc");?>
													>
												</div>
												<!-- Condición Regular -->
												<div class="form-check form-check-inline">
													<label for="cond_v_regular" class="form-label">Regular </label>
													<input 
														id="cond_v_regular" 
														class="form-check-input" 
														type="radio" 
														name="condicion_vivienda_r" 
														value="Regular" 
														required
														<?php dato_sesion_opt("Regular","condicion_vivienda_r","rc");?>
													>
												</div>
												<!-- Condición Mala -->
												<div class="form-check form-check-inline">
													<label for="cond_v_mala" class="form-label">Mala </label>
													<input 
														id="cond_v_mala" 
														class="form-check-input" 
														type="radio" 
														name="condicion_vivienda_r" 
														value="Mala" 
														required
														<?php dato_sesion_opt("Mala","condicion_vivienda_r","rc");?>
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
														<?php dato_sesion_opt("Casa","tipo_vivienda_r","rc");?>
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
														<?php dato_sesion_opt("Apartamento","tipo_vivienda_r","rc");?>
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
														<?php dato_sesion_opt("Rancho","tipo_vivienda_r","rc");?>
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
														<?php dato_sesion_opt("Quinta","tipo_vivienda_r","rc");?>
													>
												</div>
												<!-- Caso: Habitación -->
												<div class="form-check form-check-inline">
													<label for="v_hab" class="form-label">Habitación </label>
													<input 
														id="v_hab" 
														class="form-check-input" 
														type="radio" 
														name="tipo_vivienda_r" 
														value="Habitación" 
														required
														<?php dato_sesion_opt("Habitación","tipo_vivienda_r","rc");?>
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
													<?php dato_sesion_opt("F","tenencia_vivienda_r","s");?>
													<option value="">Seleccione una opción</option>
													<option <?php dato_sesion_opt("Propia","tenencia_vivienda_r","s");?> value="Propia">Propia</option>
													<option <?php dato_sesion_opt("Alquilada","tenencia_vivienda_r","s");?> value="Alquilada">Alquilada</option>
													<option <?php dato_sesion_opt("Prestada","tenencia_vivienda_r","s");?> value="Prestada">Prestada</option>
													<option <?php dato_sesion_opt("Otro","tenencia_vivienda_r","s");?> value="Otro">Otro</option>
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
													<?php if(dato_sesion_i("tenencia_vivienda_r") != "Otro"){echo "disabled";} ?> 
												>
											</div>
										</div>
									</section>
									
									<!-- Sección de datos económicos -->
									<section id="seccion4" class="row my-2" style="display:none;">

										<!-- Titulo de la sección -->
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
														<?php dato_sesion_opt("Si","representante_trabaja","rc");?>
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
														<?php dato_sesion_opt("No","representante_trabaja","rc");?>
													>
												</div>
												<label id="representante_trabaja-error" class="error w-100" style="display:none;" for="representante_trabaja"></label>
											</div>
											<!-- Información adicional -->
											<span class="form-text">En caso de marcar <b>No</b>, se establecerá como desempleado.</span>
										</div>


										<!-- Campos si el representante trabaja -->
										<fieldset id="datos_trabajo" <?php if(dato_sesion_i("representante_trabaja") == "No"){echo 'disabled style="display: none;"';} ?> >
											
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
														value="<?php echo dato_sesion_i("empleo_r");?>"
													>
												</div>
											</div>
											

											<!-- Teléfono del trabajo -->
											<div class="row mb-4">
												<div class="col-12 col-lg-3">
													<label class="form-label">Teléfono del trabajo:</label>
												</div>
												<div class="col-12 col-lg-3">
													<input 
														id="prefijo_trabajo_r" 
														class="form-control form-control-sm" 
														type="tel" 
														name="prefijo_trabajo_r"  
														list="prefijos" 
														maxlength="4" 
														placeholder="Prefijo"
														value="<?php echo dato_sesion_i("prefijo_trabajo_r");?>"
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
														value="<?php echo dato_sesion_i("telefono_trabajo_r");?>"
													>
												</div>
												<!-- Información adicional -->
												<span class="form-text">En el caso de teléfonos extranjeros, ingresar el código en el campo de prefijo rellenando con ceros a la izquierda. Ejemplo: 0052 (México)</span>
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
													><?php echo dato_sesion_i("lugar_trabajo_r");?></textarea>
												</div>
											</div>
											

											<!-- Remuneración y tipo -->
											<div class="row mb-4">
												<div class="col-12 col-lg-6">
													<!-- Cantidad de sueldos mínimos como remuneración -->
													<label class="form-label requerido">Remuneración:</label>
													<input 
														id="remuneracion_r" 
														class="mb-2 form-control text-end" 
														type="number" 
														name="remuneracion_r" 
														placeholder="Ingrese un numero..." 
														min="0" 
														step="0.5"
														required 
														value="<?php echo dato_sesion_i("remuneracion_r");?>"
													>
													<label id="remuneracion_r-error" class="error w-100" style="display:none;" for="remuneracion_r"></label>
													<!-- Información adicional -->
													<span class="form-text">Remuneración aproximada en sueldos mínimos.</span>
												</div>
												<!-- Tipo de remuneración -->
												<div class="col-12 col-lg-6">
													<label class="form-label requerido">Tipo de remuneración:</label>
													<select class="form-select" name="tipo_remuneracion_r" required>
														<option value="">Frecuencia de la remuneración</option>
														<option <?php dato_sesion_opt("Diaria","tipo_remuneracion_r","s");?> value="Diaria">Diaria</option>
														<option <?php dato_sesion_opt("Semanal","tipo_remuneracion_r","s");?> value="Semanal">Semanal</option>
														<option <?php dato_sesion_opt("Quincenal","tipo_remuneracion_r","s");?> value="Quincenal">Quincenal</option>
														<option <?php dato_sesion_opt("Mensual","tipo_remuneracion_r","s");?> value="Mensual">Mensual</option>
													</select>
												</div>
											</div>
										</fieldset>

										<!-- Titulo de la sección -->
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
													<label for="bancarios_s" class="form-label">Si </label>
													<input 
														id="bancarios_s" 
														class="form-check-input" 
														type="radio" 
														name="sum_bancario" 
														value="Si" 
														required
														<?php dato_sesion_opt("Si","representante_trabaja","rc");?>
													>
												</div>
												<!-- Caso: No -->
												<div class="form-check form-check-inline">
													<label for="bancarios_n" class="form-label">No </label>
													<input 
														id="bancarios_n" 
														class="form-check-input" 
														type="radio" 
														name="sum_bancario" 
														value="No" 
														required
														<?php dato_sesion_opt("No","representante_trabaja","rc");?>
													>
												</div>
												<label id="sum_bancario-error" class="error w-100" style="display:none;" for="sum_bancario"></label>
											</div>
											<!-- Información adicional -->
											<span class="form-text">Esta información es opcional y tiene el motivo de las becas...</span>
										</div>

										<fieldset id="datos_bancarios" <?php if(dato_sesion_i("sum_bancario") == "No"){echo 'disabled style="display: none;"';} ?>>

											<!-- Banco -->
											<div class="row mb-4">
												<div class="col-12 col-lg-5">
													<label class="form-label requerido">Banco:</label>
												</div>
												<div class="col-12 col-lg-7">
													<select class="form-select" name="banco" required>
														<option value="">Seleccione una opción</option>
														
														<option <?php dato_sesion_opt("Banco de Venezuela S.A.","banco","s");?> value="Banco de Venezuela S.A."
														>Banco de Venezuela S.A.</option>
														
														<option <?php dato_sesion_opt("Venezolano de Crédito S.A.","banco","s");?> value="Venezolano de Crédito S.A."
														>Venezolano de Crédito S.A.</option>
														
														<option <?php dato_sesion_opt("Banco Mercantil, C.A","banco","s");?> value="Banco Mercantil, C.A"
														>Banco Mercantil, C.A</option>
														
														<option <?php dato_sesion_opt("Banco Provincial, S.A.","banco","s");?> value="Banco Provincial, S.A."
														>Banco Provincial, S.A.</option>
														
														<option <?php dato_sesion_opt("Bancaribe C.A.","banco","s");?> value="Bancaribe C.A."
														>Bancaribe C.A.</option>
														
														<option <?php dato_sesion_opt("Banco Exterior C.A.","banco","s");?> value="Banco Exterior C.A."
														>Banco Exterior C.A.</option>
														
														<option <?php dato_sesion_opt("Banco Occidental de Descuento, C.A.","banco","s");?> value="Banco Occidental de Descuento, C.A."
														>Banco Occidental de Descuento, C.A.</option>
														
														<option <?php dato_sesion_opt("Banco Caroní C.A.","banco","s");?> value="Banco Caroní C.A."
														>Banco Caroní C.A.</option>
														
														<option <?php dato_sesion_opt("Banesco S.A.C.A.","banco","s");?> value="Banesco S.A.C.A."
														>Banesco S.A.C.A.</option>
														
														<option <?php dato_sesion_opt("Banco Sofitasa C.A.","banco","s");?> value="Banco Sofitasa C.A."
														>Banco Sofitasa C.A.</option>
														
														<option <?php dato_sesion_opt("Banco Plaza C.A.","banco","s");?> value="Banco Plaza C.A."
														>Banco Plaza C.A.</option>
														
														<option <?php dato_sesion_opt("Banco de la Gente Emprendedora C.A. - Bangente","banco","s");?> value="Banco de la Gente Emprendedora C.A. - Bangente"
														>Banco de la Gente Emprendedora C.A. - Bangente</option>
														
														<option <?php dato_sesion_opt("Banco del Pueblo Soberano, C.A.","banco","s");?> value="Banco del Pueblo Soberano, C.A."
														>Banco del Pueblo Soberano, C.A.</option>
														
														<option <?php dato_sesion_opt("Banco Fondo Común C.A.","banco","s");?> value="Banco Fondo Común C.A."
														>Banco Fondo Común C.A.</option>
														
														<option <?php dato_sesion_opt("100% Banco, C.A.","banco","s");?> value="100% Banco, C.A."
														>100% Banco, C.A.</option>
														
														<option <?php dato_sesion_opt("DelSur, C.A.","banco","s");?> value="DelSur, C.A."
														>DelSur, C.A.</option>
														
														<option <?php dato_sesion_opt("Banco del Tesoro, C.A.","banco","s");?> value="Banco del Tesoro, C.A."
														>Banco del Tesoro, C.A.</option>
														
														<option <?php dato_sesion_opt("Banco Agrícola de Venezuela, C.A","banco","s");?> value="Banco Agrícola de Venezuela, C.A"
														>Banco Agrícola de Venezuela, C.A</option>
														
														<option <?php dato_sesion_opt("Bancrecer, S.A.","banco","s");?> value="Bancrecer, S.A."
														>Bancrecer, S.A.</option>
														
														<option <?php dato_sesion_opt("Mi Banco C.A.","banco","s");?> value="Mi Banco C.A."
														>Mi Banco C.A.</option>
														
														<option <?php dato_sesion_opt("Banco Activo, C.A.","banco","s");?> value="Banco Activo, C.A."
														>Banco Activo, C.A.</option>
														
														<option <?php dato_sesion_opt("Bancamiga, C.A.","banco","s");?> value="Bancamiga, C.A."
														>Bancamiga, C.A.</option>
														
														<option <?php dato_sesion_opt("Banco Internacional de Desarrollo, C.A.","banco","s");?> value="Banco Internacional de Desarrollo, C.A."
														>Banco Internacional de Desarrollo, C.A.</option>
														
														<option <?php dato_sesion_opt("Banplus, C.A.","banco","s");?> value="Banplus, C.A."
														>Banplus, C.A.</option>
														
														<option <?php dato_sesion_opt("Banco Bicentenario C.A.","banco","s");?> value="Banco Bicentenario C.A."
														>Banco Bicentenario C.A.</option>
														
														<option <?php dato_sesion_opt("Banco de la Fuerza Armada Nacional Bolivariana - BANFANB","banco","s");?> value="Banco de la Fuerza Armada Nacional Bolivariana - BANFANB"
														>Banco de la Fuerza Armada Nacional Bolivariana - BANFANB</option>
														
														<option <?php dato_sesion_opt("Citibank N.A.","banco","s");?> value="Citibank N.A."
														>Citibank N.A.</option>
														
														<option <?php dato_sesion_opt("Banco Nacional de Crédito, C.A.","banco","s");?> value="Banco Nacional de Crédito, C.A."
														>Banco Nacional de Crédito, C.A.</option>
														
														<option <?php dato_sesion_opt("Instituto Municipal de Crédito Popular","banco","s");?> value="Instituto Municipal de Crédito Popular"
														>Instituto Municipal de Crédito Popular</option>
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
															<?php dato_sesion_opt("Ahorro","tipo_cuenta","rc");?>
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
															<?php dato_sesion_opt("Corriente","tipo_cuenta","rc");?>
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
														value="<?php echo dato_sesion_i("nro_cuenta");?>"
													>
												</div>
												<!-- Información adicional -->
												<span class="form-text">En caso de no recordarlo, dejar en blanco.</span>
											</div>
											
										</fieldset>

									</section>
									

									<!-- Datos del contacto auxiliar -->
									<section id="seccion5" class="row my-2" style="display:none;">
										<!-- Titulo de la sección -->
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
											<div class="col-12 col-lg-4">
												<label class="form-label requerido">Nombre:</label>
											</div>
											<!-- Primer nombre -->
											<div class="col-12 col-lg-8">
												<input 
													id="primer_nombre_aux" 
													class="mb-2 form-control" 
													type="text" 
													name="primer_nombre_aux" 
													placeholder="Primer nombre" 
													minlength="3" 
													maxlength="40" 
													required
													value="<?php echo dato_sesion_i("primer_nombre_aux");?>"
												>
											</div>
										</div>
										<!-- Apellidos del contacto auxiliar -->
										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<label class="form-label requerido">Apellido:</label>
											</div>
											<!-- Primer apellido -->
											<div class="col-12 col-lg-8">
												<input 
													id="primer_apellido_aux" 
													class="mb-2 form-control" 
													type="text" 
													name="primer_apellido_aux" 
													placeholder="Primer apellido" 
													minlength="3" 
													maxlength="40" 
													required
													value="<?php echo dato_sesion_i("primer_apellido_aux");?>"
												>
											</div>
										</div>

										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="form-text">Solo son obligatorios primer nombre y primer apellido.</span>
											</div>
										</div>
										

										<!-- Teléfono del contacto auxiliar -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label class="form-label requerido">Teléfono:</label>
											</div>
											<div class="col-12 col-lg-3">
												<input 
													id="prefijo_principal_aux" 
													class="form-control form-control-sm" 
													type="tel" 
													name="prefijo_principal_aux" 
													list="prefijos" 
													maxlength="4" 
													placeholder="Prefijo" 
													required
													value="<?php echo dato_sesion_i("prefijo_principal_aux");?>"
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
													value="<?php echo dato_sesion_i("telefono_principal_aux");?>"
												>
											</div>
											<!-- Información adicional -->
											<span class="form-text">El número de teléfono del contacto auxiliar debe ser local.</span>
										</div>
										

										<!-- Relación del representante con el contacto auxiliar -->
										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<label class="form-label requerido">Relación con la persona:</label>
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
													value="<?php echo dato_sesion_i("relacion_auxiliar");?>"
												>
											</div>
										</div>

									</section>
									<input type="hidden" name="paso_1" value="paso_1">
									<input type="hidden" name="orden" value="insertar">
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
			<?php include('../../footer.php');?>
			<?php include '../../ayuda.php';?>
		</main>
		<script type="text/javascript" src="../../js/sweetalert2.js"></script>
		<script type="text/javascript" src="../../js/jquery-3.6.1.min.js"></script>
		<script type="text/javascript" src="../../js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="../../js/validaciones/additional-methods.min.js"></script>
		<script type="text/javascript" src="../../js/messages_es.min.js"></script>
		<script type="text/javascript" src="../../js/validaciones/validaciones_representante.js"></script>
		<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="../../js/logout_inactividad.js"></script>
	</body>
</html>
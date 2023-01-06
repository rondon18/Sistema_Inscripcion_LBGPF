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
		<title>Paso 3 - Datos del estudiante</title>
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
						<b class="fs-4">Formulario de registro - Estudiante</b>
					</div>
					<div class="card-body">
						<div class="row">
							

							<!-- Selector de seccion -->
							<div class="col-12 col-lg-3">
								<ul class="nav flex-lg-column nav-pills nav-fill mb-4 gap-2">
									<li class="nav-item">
										<span id="link1" class="nav-link active">Datos personales</span>
									</li>
									<li class="nav-item">
										<span id="link2" class="nav-link">Datos de contacto</span>
									</li>
									<li class="nav-item">
										<span id="link3" class="nav-link">Datos sociales</span>
									</li>
									<li class="nav-item">
										<span id="link4" class="nav-link">Datos académicos</span>
									</li>
									<li class="nav-item">
										<span id="link5" class="nav-link">Datos de salud</span>
									</li>
									<li class="nav-item">
										<span id="link6" class="nav-link">Observaciones</span>
									</li>
								</ul>
							</div>
							
							<!-- Contenedor del formulario -->
							<div class="col-12 col-lg-9 py-0" style="max-height: 60vh; overflow-y: auto;">
								<form id="formulario_estudiantes" action="test.php" method="POST" autocomplete="off">
									
									<!-- Datos personales -->
									<section id="seccion1" class="row my-2">

										<div class="row mb-4">
											<div class="col-12">
												<span class="h5 mb-3">
													<i class="fas fa-address-card fa-xl me-2"></i>
													Datos personales.
												</span>
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
													id="primer_nombre_est" 
													class="form-control" 
													type="text" 
													name="primer_nombre_est" 
													placeholder="Primer nombre" 
													required
												>
											</div>
											<!-- Segundo nombre -->
											<div class="col-12 col-lg-5">
												<input 
													id="segundo_nombre_est" 
													class="form-control" 
													type="text" 
													name="segundo_nombre_est"
													placeholder="Segundo nombre" 
												>
											</div>
										</div>


										<!-- Apellidos -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label class="form-label requerido">Apellidos:</label>
											</div>
											<!-- Primer apellido -->
											<div class="col-12 col-lg-5">
												<input 
													id="primer_apellido_est" 
													class="form-control" 
													type="text" 
													name="primer_apellido_est"
													placeholder="Primer apellido"
													required 
												>
											</div>
											<!-- Segundo apellido -->
											<div class="col-12 col-lg-5">
												<input 
													class="form-control" 
													type="text" 
													name="segundo_apellido_est"
													id="segundo_apellido_est" 
													placeholder="Segundo apellido"
												>
											</div>
										</div>
										

										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="form-text">Solo son obligatorios primer nombre y primer apellido.</span>
											</div>
										</div>


										<!-- Cédula -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label class="form-label requerido">Cédula:</label>
											</div>
											<div class="col-12 col-lg-3">
													<!-- NacionalIdad -->
													<select 
														id="nacionalidad_r" 
														class="form-select" 
														name="nacionalidad_est" 
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
														id="cedula_est"
														class="form-control" 
														type="text" 
														name="cedula_est" 
														maxlength="8" 
														minlength="7"
														placeholder="Número de cedula" 
														required
													>
											</div>
											<div class="col-12 col-lg-12 mt-2 mb-2">
												<span class="form-text">La cédula consta de una nacionalidad y de un número con alrededor de al menos 7 a 8 dígitos.</span>
											</div>
										</div>


										<!-- Genero -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label class="form-label requerido">Genero:</label>
											</div>
											<div class="col-12 col-lg-10">
												<!-- Femenino -->
												<div class="form-check form-check-inline">
													<input 
														id="genero_est_f" 
														class="form-check-input" 
														type="radio"
														name="genero_est" 
														value="F" 
														required
													>
													<label for="genero_est_f" class="form-label">Femenino</label>
												</div>
												<!-- Masculino -->
												<div class="form-check form-check-inline">
													<input 
														id="genero_est_m" 
														class="form-check-input" 
														type="radio"
														name="genero_est" 
														value="M" 
														required
													>
													<label for="genero_est_m" class="form-label">Masculino</label>
												</div>
												<label id="genero_est-error" class="error w-100" style="display:none;" for="genero_est"></label>
											</div>
										</div>


										<!-- Fecha y lugar de nacimiento -->
										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<label for="fecha_nacimiento_est" class="form-label requerido">Fecha de nacimiento:</label>
												<input 
													id="fecha_nacimiento_est" 
													class="form-control" 
													type="date" name="fecha_nacimiento_est"
													min="<?php echo date('Y')-19 .'-01-01'?>"
													max="<?php echo date('Y')-10 .'-01-01'?>" 
													required
												>
											</div>
											<div class="col-12 col-lg-8">
												<label for="lugar_nacimiento_est" class="form-label requerido">Lugar de nacimiento:</label>
												<input class="form-control" type="text" name="lugar_nacimiento_est"
													id="lugar_nacimiento_est" placeholder="Estado, ciudad." required>
											</div>
										</div>
									</section>

									<!-- Datos de contacto -->
									<section id="seccion2" class="row my-2" style="display:none;">
										<div class="row mb-4">
											<div class="col-12">
												<span class="h5 mb-3">
													<i class="fas fa-school fa-xl me-2"></i>
													Datos de contacto.
												</span>
											</div>
										</div>


										<!-- Correo electrónico -->
										<div class="row mb-4">
											<div class="col-12 col-lg-3">
												<label for="correo_electronico_est" class="form-label">Correo electrónico:</label>
											</div>
											<div class="col-12 col-lg-9">
												<input 
													id="correo_electronico_est" 
													class="form-control" 
													type="email" 
													name="correo_electronico_est"
													placeholder="correo_ejemplo@dominio.com" 
												>
											</div>
										</div>

										<!-- Teléfonos -->
										<div class="row mb-2">
											<div class="col-12 col-lg-12">
												<label class="form-label mb-3">Números de telefono:</label>
											</div>
											<!-- Telefono principal -->
											<div class="col-12 col-lg-2 mb-3">
												<label class="form-label">Principal:</label>
											</div>
											<!--Telefono principal-->
											<div class="col-12 col-lg-3 mb-3">
												<!--Prefijo-->
												<input 
													id="prefijo_principal_est" 
													class="form-control form-control-sm" 
													type="text" 
													name="prefijo_principal_est"
													list="prefijos-estudiante" 
													minlength="4"
													maxlength="4" 
													placeholder="Prefijo"
												>
											</div>
											<div class="col-12 col-lg-7 mb-3">
												<!--Número-->
												<input 
													id="telefono_principal_est" 
													class="form-control form-control-sm" 
													type="tel" 
													name="telefono_principal_est"
													minlength="7" 
													maxlength="7"
													placeholder="Número telefonico" 
												>
											</div>
											<!-- Telefono secundario -->
											<div class="col-12 col-lg-2 mb-3">
												<label class="form-label">Secundario:</label>
											</div>
											<div class="col-12 col-lg-3 mb-3">
												<!--Prefijo-->
												<input 
													id="prefijo_secundario_est" 
													class="form-control form-control-sm" 
													type="text" 
													name="prefijo_secundario_est"
													list="prefijos-estudiante" 
													minlength="4"
													maxlength="4" 
													placeholder="Prefijo"
												>
											</div>
											<div class="col-12 col-lg-7 mb-3">
												<!--Número-->
												<input 
													id="telefono_secundario_est" 
													class="form-control form-control-sm" 
													type="tel" 
													name="telefono_secundario_est"
													minlength="7" 
													maxlength="7"
													placeholder="Número telefonico" 
												>
											</div>
										</div>


										<div class="row mb-4">
											<div class="col-12 col-lg-12 mt-2">
												<span class="form-text">No es obligatorio que el estudiante posea un correo electrónico y/o número propio de teléfono, sin embargo este resulta de utilidad.</span>
											</div>
										</div>
									</section>

									<!-- Datos sociales -->
									<section id="seccion3" class="row my-2" style="display:none;">
										
										<!--Datos sociales-->
										<div class="row mb-4">
											<div class="col-12">
												<span class="h5 mb-3">
													<i class="fa-solid fa-users fa-xl me-2"></i>
													Datos sociales.
												</span>
											</div>
										</div>
										
										
										<!-- Domicilio -->
										<div class="row mb-4">
											<div class="col-12 col-lg-3">
												<label class="form-label requerido">¿Con quién vive?:</label>
											</div>
											<div class="col-12 col-lg-9">
												<div class="form-check form-check-inline">
													<input
														id="domicilio_representante" 
														class="form-check-input" 
														type="radio" 
														name="domicilio" 
														value="representante"
														required
													>
													<label for="domicilio_representante" class="form-label">Representante </label>
												</div>

												<div class="form-check form-check-inline">
													<input
														id="domicilio_padre" 
														class="form-check-input" 
														type="radio" 
														name="domicilio" 
														value="padre"
														required
													>
													<label for="domicilio_padre" class="form-label">Padre </label>
												</div>

												<div class="form-check form-check-inline">
													<input
														id="domicilio_madre" 
														class="form-check-input" 
														type="radio" 
														name="domicilio" 
														value="madre"
														required
													>
													<label for="domicilio_madre" class="form-label">Madre </label>
												</div>

												<div class="form-check form-check-inline">
													<input
														id="domicilio_otro" 
														class="form-check-input" 
														type="radio" 
														name="domicilio" 
														value="otro"
														required
													>
													<label for="domicilio_otro" class="form-label">Otro </label>
												</div>
												<label id="domicilio-error" class="error w-100" style="display:none;" for="domicilio"></label>
											</div>
											<span class="form-text">En caso de seleccionar representante, madre o padre, se asumirá la que la direccion que vive el estudiante es esta, en dado caso de ser otra, seleccione otro y especifique.</span>
										</div>
										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<label for="direccion_est" class="form-label requerido">Lugar de domicilio:</label>
											</div>
											<div class="col-12 col-lg-8">
												<input 
													id="direccion_est"
													class="form-control" 
													name="direccion_est" 
													required
													disabled 
												>
											</div>
										</div>


										<!-- Con quien vive -->
										<div class="row mb-4">
											<div class="col-12 col-lg-6">
												<label for="con_quien_vive" class="form-label requerido">¿Con quienes hace vida en su hogar?:</label>
											</div>
											<div class="col-12 col-lg-6">
												<input 
													id="con_quien_vive"
													class="form-control" 
													type="text" 
													name="con_quien_vive" 
													required
												>
											</div>
										</div>


										<!-- Tiene Canaima -->
										<div class="row mb-4">
											<div class="col-12 col-lg-3">
												<label class="form-label requerido">¿Tiene Canaima?:</label>
											</div>
											<div class="col-12 col-lg-9">

												<div class="form-check form-check-inline">
													<input 
														id="tiene_canaima_si" 
														class="form-check-input" 
														type="radio" 
														name="tiene_canaima" 
														value="Si"
														required
													>
													<label for="tiene_canaima_si" class="form-label">Si </label>
												</div>

												<div class="form-check form-check-inline">
													<input 
														id="tiene_canaima_no" 
														class="form-check-input" 
														type="radio" 
														name="tiene_canaima" 
														value="No"
														required
													>
													<label for="tiene_canaima_no" class="form-label">No </label>
												</div>
												<label id="tiene_canaima-error" class="error w-100" style="display:none;" for="tiene_canaima"></label>
											</div>
										</div>


										<!-- Condiciones de la Canaima -->
										<div class="row mb-4">
											<div class="col-12 col-lg-5">
												<label for="condiciones_canaima" class="form-label requerido">¿En que condiciones?:</label>
											</div>
											<div class="col-12 col-lg-7">
												<select id="condiciones_canaima" class="form-select mb-2" name="condiciones_canaima" required disabled>
														<option selected disabled value="">Seleccione una opcion</option>
														<option value="Muy buenas Condiciones">Muy buenas Condiciones</option>
														<option value="Buenas Condiciones">Buenas Condiciones</option>
														<option value="Malas Condiciones">Malas Condiciones</option>
														<option value="Muy malas Condiciones">Muy malas Condiciones</option>
													</select>
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
													id="codigo_carnet_patria_est" 
													class="form-control" 
													type="text" 
													name="codigo_carnet_patria_est"
													placeholder="Codigo" 
													minlength="10" 
													maxlength="10"
												>
											</div>
											<!-- Serial del carnet de la patria -->
											<div class="col-12 col-lg-4">
												<input 
													id="serial_carnet_patria_est" 
													class="form-control" 
													type="text" 
													name="serial_carnet_patria_est"
													placeholder="Serial" 
													minlength="10" 
													maxlength="10"
												>
											</div>
											<div class="col-12 col-lg-12">
												<span class="form-text">En caso de no tener, dejar vacío.</span>
											</div>
										</div>


										<!-- Acceso a internet -->
										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<label class="form-label requerido">¿Tiene acceso a internet?:</label>
											</div>
											<div class="col-12 col-lg-8">
												<div class="form-check form-check-inline">
													<input 
														id="internet_vivienda_si" 
														class="form-check-input" 
														type="radio" 
														name="internet_vivienda" 
														value="Si"
														required
													>
													<label for="internet_vivienda_si" class="form-label">Si </label>
												</div>
												<div class="form-check form-check-inline">
													<input 
														id="internet_vivienda_no" 
														class="form-check-input" 
														type="radio" 
														name="internet_vivienda" 
														value="No"
														required
													>
													<label for="internet_vivienda_no" class="form-label">No </label>
												</div>
												<label id="internet_vivienda-error" class="error w-100" style="display:none;" for="internet_vivienda"></label>
											</div>
										</div>	
									</section>

									<!-- Datos académicos -->
									<section id="seccion4" class="row my-2" style="display:none;">

										<div class="row mb-4">
											<div class="col-12">
												<span class="h5 mb-3">
													<i class="fas fa-school fa-xl me-2"></i>
													Datos académicos.
												</span>
											</div>
										</div>

										<!-- Año a cursar -->
										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<label for="grado_a_cursar" class="form-label requerido">¿Que año va a cursar?:</label>
											</div>
											<div class="col-12 col-lg-8">
												<select class="form-select mb-2" name="grado_a_cursar" required>
													<option selected disabled value="">Seleccione una opcion</option>
													<option value="Primer año">Primer año</option>
													<option value="Segundo año">Segundo año</option>
													<option value="Tercer año">Tercer año</option>
													<option value="Cuarto año">Cuarto año</option>
													<option value="Quinto año">Quinto año</option>
												</select>
											</div>
										</div>

										<!-- Plantel de procedencia -->
										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<label for="plantel_procedencia" class="form-label requerido">Plantel de procedencia:</label>
											</div>
											<div class="col-12 col-lg-8">
												<input 
													id="plantel_procedencia"
													class="form-control no-resize mb-2"
													rows="2"
													minlength="10"
													maxlength="180" 
													name="plantel_procedencia" 
													placeholder="Institucion en que cursó primaria" 
													required
												>
											</div>
										</div>
										
										<!-- Estudiante repitente -->
										<div class="row mb-3">
											<!-- ¿El estudiante es repitente? -->
											<div class="col-12 col-lg-5">
												<label class="form-label requerido mb-3">¿El estudiante es repitente?:</label>
											</div>
											<div class="col-12 col-lg-7">
												<!-- Femenino -->
												<div class="form-check form-check-inline">
													<input 
														id="repitente_si" 
														class="form-check-input" 
														type="radio"
														name="repitente" 
														value="Si" 
														required
													>
													<label for="repitente_si" class="form-label">Si</label>
												</div>
												<!-- Femenino -->
												<div class="form-check form-check-inline">
													<input 
														id="repitente_no" 
														class="form-check-input" 
														type="radio"
														name="repitente" 
														value="No" 
														required
													>
													<label for="repitente_no" class="form-label">No</label>
												</div>
												<label id="repitente-error" class="error w-100" style="display:none;" for="repitente"></label>
											</div>
										</div>

										<fieldset id="estudiante_repitente" class="row m-0 p-0"  disabled>
											<div class="row mb-4">
												<!-- ¿Que año repite? -->
												<div class="col-12 col-lg-4">
													<label for="a_repetido" class="form-label requerido">¿Que año repite?:</label>
												</div>
												<div class="col-12 col-lg-8">
													<select
														id="a_repetido" 
														class="form-select" 
														type="text" 
														name="a_repetido"
														list="grados" 
														placeholder="¿Que año repite?"
														required 
													>
														<option value="">Año repetido</option>
														<option value="Primer año">Primer año</option>
														<option value="Segundo año">Segundo año</option>
														<option value="Tercer año">Tercer año</option>
														<option value="Cuarto año">Cuarto año</option>
														<option value="Quinto año">Quinto año</option>
													</select>
												</div>
											</div>

											<div class="row mb-4">
												<!-- ¿Que materias? -->
												<div class="col-12 col-lg-4">
													<label for="materias_repitente" class="form-label">¿Que materias?:</label>
												</div>
												<div class="col-12 col-lg-8">
													<input 
														id="materias_repitente" 
														class="form-control" 
														type="text" 
														name="materias_repitente"
														placeholder="¿Cuáles materias repite?"
													>
												</div>
											</div>
											<div class="row mb-4">
												<!-- Materias pendientes -->
												<div class="col-12 col-lg-4">
													<label for="materias_pendientes" class="form-label">Materias pendientes:</label>
												</div>
												<div class="col-12 col-lg-8">
													<input 
														id="materias_pendientes" 
														class="form-control" 
														type="text"
														name="materias_pendientes" 
														placeholder="¿Cuáles materias tiene pendientes?"
													>
												</div>
											</div>
											<span class="form-text">En el caso de materias con que repite o tiene pendientes, si no sabe cuales son o no las recuerda. Dejar vacíos esos campos</span>
										</fieldset>
									</section>

									<!-- Ficha Medica -->
									<section id="seccion5" class="row my-2" style="display:none;">
										
										<!--Datos de salud-->
										<div class="row mb-4">
											<div class="col-12">
												<span class="h5 mb-3">
													<i class="fas fa-plus-square fa-xl me-2"></i>
													Datos de salud.
												</span>
											</div>
										</div>


										<!-- Medidas antropometricas -->
										<div class="row mb-3">
											<div class="col-12 col-lg-12">
												<label class="form-label mb-3">Medidas antropometricas:</label>
											</div>
										</div>
										<div class="row mb-4">
											<!-- Talla (Estatura) -->
											<div class="col-12 col-lg-6 mb-3">
												<label for="talla" class="form-label">Talla (Estatura):</label>
												<input 
													id="talla"
													class="form-control" 
													type="number" 
													name="talla" 
													placeholder="Talla(cm)" 
													maxlength="5"
													min="60"
													max="300"
													step="1" 
												>
											</div>
											<!-- Peso -->
											<div class="col-12 col-lg-6 mb-3">
												<label for="peso" class="form-label">Peso:</label>
												<input 
													id="peso"
													class="form-control" 
													type="number" 
													name="peso" 
													placeholder="Peso(kg)" 
													maxlength="5"
													min="20"
													max="180"
													step="0.5" 
												>
											</div>

											<!-- Índice de masa corporal -->
											<div class="col-12 col-lg-6 mb-3">
												<label for="indice" class="form-label">Índice de masa corporal:</label>
												<input 
													id="indice"
													class="form-control" 
													type="number" 
													name="indice" 
													placeholder="Índice" 
													maxlength="5"
													min="0"
													max="100" 
												>
											</div>

											<!-- Circunferencia braquial -->
											<div class="col-12 col-lg-6 mb-3">
												<label for="c_braquial" class="form-label">Circunferencia braquial:</label>
												<input 
													id="c_braquial"
													class="form-control" 
													type="number" 
													name="c_braquial" 
													placeholder="Circ. del brazo" 
													maxlength="5" 
													max="30"
													min="8"
												>
											</div>

											<span class="form-text">
												-El índice(IMC) se calcula automáticamente al ingresar talla y peso, y puede ser editado si no es lo suficientemente preciso.
												<br>
												-En el caso de no conocer la talla, peso, índice(IMC), circunferencia braquial del estudiante. Dejar vacíos esos campos.
											</span>
										</div>
										
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="form-label mb-3">
													Tallas:
												</span>
											</div>
										</div>
										<div class="row mb-4">
											<!-- Talla de pantalón -->
											<div class="col-12 col-lg-4">
												<label for="talla_pantalon" class="form-label">Talla de pantalón:</label>
												<input 
													id="talla_pantalon" 
													class="form-control" 
													type="text" 
													name="talla_pantalon"
													placeholder="Pantalon" 
													maxlength="5" 
												>
											</div>
											<!-- Talla de camisa -->
											<div class="col-12 col-lg-4">
												<label for="talla_camisa" class="form-label">Talla de camisa:</label>
												<input 
													id="talla_camisa"
													class="form-control" 
													type="text" 
													name="talla_camisa" 
													placeholder="Camisa" 
													maxlength="5" 
												>
											</div>
											<!-- Talla de zapatos -->
											<div class="col-12 col-lg-4">
												<label for="talla_zapatos" class="form-label">Talla de zapatos:</label>
												<input 
													id="talla_zapatos"
													class="form-control" 
													type="text" 
													name="talla_zapatos" 
													placeholder="Zapatos" 
													maxlength="5" 
												>
											</div>
										</div>
										

										<!-- Enfermedad -->
										<div class="row mb-4">
											<div class="col-12 col-lg-5">
												<label for="enfermedad" class="form-label">¿Padece alguna enfermedad?:</label>
											</div>
											<div class="col-12 col-lg-7">
												<input 
													id="enfermedad" 
													class="form-control" 
													type="text" 
													name="enfermedad"
													placeholder="Enfermedad que padece"
													minlength="3"
													maxlength="50" 
												>
											</div>
											<div class="col-12 col-lg-12">
												<span class="form-text">En caso de no padecer ninguna, dejar vacío.</span>
											</div>
										</div>
										

										<!-- Tipo de sangre -->
										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<label class="form-label requerido">Tipo de sangre:</label>
											</div>
											<div class="col-12 col-lg-4">
												<select class="form-select" name="grupo_sanguineo" required>
													<option selected disabled value="">Grupo sanguíneo</option>
													<option value="O">O</option>
													<option value="A">A</option>
													<option value="B">B</option>
													<option value="AB">AB</option>
													<option value="NC">No conocido</option>
												</select>
											</div>
											<div class="col-12 col-lg-4">
												<select class="form-select" name="factor_rhesus" required>
													<option selected disabled value="">Factor Rhesus</option>
													<option value="+">+</option>
													<option value="-">-</option>
													<option value="N">No conocido</option>
												</select>
											</div>
										</div>
										

										<!-- Lateralidad -->
										<div class="row mb-4">
											<div class="col-12 col-lg-5">
												<label class="form-label requerido">Lateralidad:</label>
											</div>
											<div class="col-12 col-lg-7">
												<div class="form-check form-check-inline">
													<input 
														id="lateralidad_a" 
														class="form-check-input" 
														type="radio" 
														name="lateralidad"
														value="Ambidextro" 
														required
													>
													<label for="lateralidad_a" class="form-label">Ambidextro</label>
												</div>
												
												<div class="form-check form-check-inline">
													<input 
														id="lateralidad_d" 
														class="form-check-input" 
														type="radio" 
														name="lateralidad" 
														value="Diestro"
														required
													>
													<label for="lateralidad_d" class="form-label">Diestro</label>
												</div>
												
												<div class="form-check form-check-inline">
													<input 
														id="lateralidad_z" 
														class="form-check-input" 
														type="radio" 
														name="lateralidad" 
														value="Zurdo"
														required
													>
													<label for="lateralidad_z" class="form-label">Zurdo</label>
												</div>
												<label id="lateralidad-error" class="error w-100" style="display:none;" for="lateralidad"></label>
											</div>
										</div>


										<!-- Condición de la dentadura -->
										<div class="row mb-4">
											<div class="col-12 col-lg-5">
												<label class="form-label requerido">Condición de la dentadura:</label>
											</div>
											<div class="col-12 col-lg-7">
												<div class="form-check form-check-inline">
													<input 
														id="dentadura_b" 
														class="form-check-input" 
														type="radio" 
														name="dentadura"
														value="Buena"
														required
													>
													<label for="dentadura_b" class="form-label">Buena </label>
												</div>
												<div class="form-check form-check-inline">
													<input 
														id="dentadura_r" 
														class="form-check-input" 
														type="radio" 
														name="dentadura"
														value="Regular"
														required
													>
													<label for="dentadura_r" class="form-label">Regular </label>
												</div>
												<div class="form-check form-check-inline">
													<input 
														id="dentadura_m" 
														class="form-check-input" 
														type="radio" 
														name="dentadura"
														value="Mala"
														required
													>
													<label for="dentadura_m" class="form-label">Mala </label>
												</div>
												<label id="dentadura-error" class="error w-100" style="display:none;" for="dentadura"></label>									
											</div>
										</div>
										

										<!-- Condición de la vista -->
										<div class="row mb-4">
											<div class="col-12 col-lg-5">
												<label class="form-label requerido">Condición de la vista:</label>
											</div>
											<div class="col-12 col-lg-7">
												<div class="form-check form-check-inline">
													<input
														id="vista_b" 
														class="form-check-input" 
														type="radio" 
														name="vista"
														value="Buena" 
														required
													>
													<label for="vista_b" class="form-label">Buena </label>
												</div>
												<div class="form-check form-check-inline">
													<input
														id="vista_r" 
														class="form-check-input" 
														type="radio" 
														name="vista"
														value="Regular" 
														required
													>
													<label for="vista_r" class="form-label">Regular </label>
												</div>
												<div class="form-check form-check-inline">
													<input
														id="vista_m" 
														class="form-check-input" 
														type="radio" 
														name="vista"
														value="Mala" 
														required
													>
													<label for="vista_m" class="form-label">Mala </label>
												</div>
												<label id="vista-error" class="error w-100" style="display:none;" for="vista"></label>								
											</div>
										</div>
										
										<!-- Condiciones de salud / discapacidades -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<label class="form-label mb-3">¿Presenta alguna de estas condiciones?:</label>
											</div>
											<div class="row row-cols-1 row-cols-lg-4 px-5 justify-content-between">
												<div class="col form-check form-check-inline">
													<input 
														id="cond_visual" 
														class="form-check-input" 
														type="checkbox" 
														name="condiciones_salud[]"
														value="Visual"
													>
													<label for="cond_visual" class="form-label">Visual </label>
												</div>
												<div class="col form-check form-check-inline">
													<input 
														id="cond_motora" 
														class="form-check-input" 
														type="checkbox" 
														name="condiciones_salud[]"
														value="Motora"
													>
													<label for="cond_motora" class="form-label">Motora </label>
												</div>
												<div class="col form-check form-check-inline">
													<input 
														id="cond_auditiva" 
														class="form-check-input" 
														type="checkbox" 
														name="condiciones_salud[]"
														value="Auditiva"
													>
													<label for="cond_auditiva" class="form-label">Auditiva </label>
												</div>
												<div class="col form-check form-check-inline">
													<input 
														id="cond_escritura" 
														class="form-check-input" 
														type="checkbox" 
														name="condiciones_salud[]"
														value="Escritura"
													>
													<label for="cond_escritura" class="form-label">Escritura </label>
												</div>
												<div class="col form-check form-check-inline">
													<input 
														id="cond_lectura" 
														class="form-check-input" 
														type="checkbox" 
														name="condiciones_salud[]"
														value="Lectura"
													>
													<label for="cond_lectura" class="form-label">Lectura </label>
												</div>
												<div class="col form-check form-check-inline">
													<input 
														id="cond_lenguaje" 
														class="form-check-input" 
														type="checkbox" 
														name="condiciones_salud[]"
														value="Lenguaje"
													>
													<label for="cond_lenguaje" class="form-label">Lenguaje </label>
												</div>
												<div class="col form-check form-check-inline">
													<input 
														id="cond_embarazo" 
														class="form-check-input" 
														type="checkbox" 
														name="condiciones_salud[]"
														value="Embarazo"
													>
													<label for="cond_embarazo" class="form-label">Embarazo </label>
												</div>
											</div>
										</div>
										

										<!-- Necesidad educativa especial -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<label for="necesidad_educativa" class="form-label mb-3">¿Presenta alguna necesidad educativa especial?:</label>
											</div>
											<div class="col-12 col-lg-12">
												<input 
													id="necesidad_educativa" 
													class="form-control" 
													type="text" 
													name="necesidad_educativa"
													placeholder="¿Cuál necesidad educativa?"
													minlength="3"
													maxlength="180" 
												>
											</div>
										</div>
										

										<!-- Es atendido por otra institución  -->
										<div class="row mb-4">
											<div class="col-12 col-lg-5">
												<label for="institucion_medica" class="form-label">¿Es atendido por otra institución?:</label>
											</div>
											<div class="col-12 col-lg-7">
												<input 
													id="institucion_medica" 
													class="form-control" 
													type="text" 
													name="institucion_medica"
													placeholder="¿Cuál institucion?"
													minlength="3"
													maxlength="180"
												>
											</div>
										</div>


										<!--Datos de salud-->
										<div class="row my-4">
											<div class="col-12">
												<span class="h5 mb-3">
													<i class="fas fa-syringe fa-xl me-2"></i>
													Datos de vacunación.
												</span>
											</div>
										</div>							

										<!-- Vacunacion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="form-label">¿Cuales de estas vacunas ha recibido el estudiante?</span>
											</div>
										</div>
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<div class="form-check mb-2 mx-md-4">
													<input class="form-check-input" type="checkbox" value="" id="vph">
													<label class="form-check-label" for="vph">
														Vacuna contra Virus del papiloma humano, VPH
													</label>
												</div>
												<div class="form-check mb-2 mx-md-4">
													<input class="form-check-input" type="checkbox" value="" id="tdap">
													<label class="form-check-label" for="tdap">
														Vacuna contra Tétanos, difteria y tos ferina o pertussis (Tdap)
													</label>
												</div>
												<div class="form-check mb-2 mx-md-4">
													<input class="form-check-input" type="checkbox" value="" id="menacwy">
													<label class="form-check-label" for="menacwy">
														Vacuna contra Enfermedad meningococica (MenACWY)
													</label>
												</div>
												<div class="form-check mb-2 mx-md-4">
													<input class="form-check-input" type="checkbox" value="" id="hep_a">
													<label class="form-check-label" for="hep_a">
														Vacuna contra Hepatitis A (HepA)
													</label>
												</div>
												<div class="form-check mb-2 mx-md-4">
													<input class="form-check-input" type="checkbox" value="" id="hep_b">
													<label class="form-check-label" for="hep_b">
														Vacuna contra Hepatitis B (HepB)
													</label>
												</div>
												<div class="form-check mb-2 mx-md-4">
													<input class="form-check-input" type="checkbox" value="" id="ipv">
													<label class="form-check-label" for="ipv">
														Vacuna contra Poliomielitis (IPV)
													</label>
												</div>
												<div class="form-check mb-2 mx-md-4">
													<input class="form-check-input" type="checkbox" value="" id="mmr">
													<label class="form-check-label" for="mmr">
														Vacuna contra Sarampión, paperas, rubéola (MMR)
													</label>
												</div>
												<div class="form-check mb-2 mx-md-4">
													<input class="form-check-input" type="checkbox" value="" id="varicela">
													<label class="form-check-label" for="varicela">
														Vacuna contra Varicela
													</label>
												</div>
												<div class="form-check mb-2 mx-md-4">
													<input class="form-check-input" type="checkbox" value="" id="antiamarilica">
													<label class="form-check-label" for="antiamarilica">
														Vacuna Antiamarílica
													</label>
												</div>
											</div>
										</div>
										

										<!-- Vacunación COVID-19 -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<i class="fa-solid fa-virus-covid-slash fa-lg me-1"></i>
												<label class="form-label mb-3 h5">Vacunación contra la COVID-19:</label>
											</div> 
										</div>
										<div class="row mb-4">
											<div class="col-12 col-lg-3">
												<!-- Vacuna aplicada -->
												<label for="vacuna" class="form-label">Vacuna aplicada:</label>
											</div>
											<div class="col-12 col-lg-5">
												<select 
													id="vacuna"
													class="form-select" 
													name="vacuna" 
												>
													<option class="small" value="" selected disabled>Vacuna contra covid19 aplicada</option>
													<option class="small" value="NV">No vacunado</option>
													<option class="small" value="Pfizer/BioNTech">Pfizer/BioNTech</option>
													<option class="small" value="Moderna">Moderna</option>
													<option class="small" value="AztraZeneca">AztraZeneca</option>
													<option class="small" value="Janssen">Janssen</option>
													<option class="small" value="Sinopharm">Sinopharm</option>
													<option class="small" value="Sinovac">Sinovac</option>
													<option class="small" value="Bharat">Bharat</option>
													<option class="small" value="CanSinoBIO">CanSinoBIO</option>
													<option class="small" value="Valneva">Valneva</option>
													<option class="small" value="Novavax">Novavax</option>
													<option class="small" value="Otra">Otra</option>
												</select>
											</div>
											
											<div class="col-12 col-lg-4">
												<!-- Otra vacuna no listada -->
												<input 
													id="vacuna_otra"
													class="form-control" 
													type="text" 
													name="vacuna_otra" 
													placeholder="Otra vacuna" 
													maxlength="15"
													required 
													disabled 
												>
											</div>
										</div>

										<div class="row mb-4">

											<!-- Dosis -->
											<div class="col-12 col-lg-6">
												<label for="dosis" class="form-label">Dosis aplicadas:</label>
												<input 
													id="dosis"
													class="form-control" 
													type="number" 
													name="dosis" 
													placeholder="Número de dosis aplicadas" 
													min="0" 
													max="10" 
													step="1"
													disabled 
												>
											</div>
											<!-- Lote -->
											<div class="col-12 col-lg-6">
												<label for="lote" class="form-label">Lote de vacuna (Última):</label>
												<input 
													id="lote"
													class="form-control" 
													type="text" 
													name="lote" 
													placeholder="Código de lote de vacuna" 
													minlength="15"
													maxlength="15"
													disabled 
												>
											</div>
										</div>

										<div class="row mb-4">
											<!-- Información adicional -->
											<div class="col-12 col-lg-12">
												<span class="form-text mt-3">En caso de no estar vacunado, seleccionar no vacunado en la lista de opciones. De no recordar dosis o número de lote, dejar en blanco.</span>
											</div>
										</div>
										
										<!-- Dieta especial -->
										<div class="row mb-4">
											<div class="col-12 col-lg-5">
												<label for="dieta_especial" class="form-label">¿Tiene alguna dieta especial?:</label>
											</div>
											<div class="col-12 col-lg-7">
												<input 
													id="dieta_especial" 
													class="form-control" 
													type="text" 
													name="dieta_especial"
													placeholder="¿Que dieta?"
													minlength="3"
													maxlength="180"
												>
											</div>
										</div>
										
										<!-- Carnet de discapacidad -->
										<div class="row mb-4">
											<div class="col-12 col-lg-5">
												<label for="nro_carnet_discapacidad" class="form-label">¿Posee carnet de discapacidad?:</label>
											</div>
											<div class="col-12 col-lg-7">
												<input 
													id="nro_carnet_discapacidad" 
													class="form-control" 
													type="text" 
													name="nro_carnet_discapacidad"
													placeholder="Número de carnet" 
													maxlength="25"
												>
											</div>
										</div>
									</section>

									<!-- Observaciones -->
									<section id="seccion6" class="row my-2" style="display:none;">
										
										<div class="row mb-4">
											<div class="col-12">
												<span class="h5 mb-3">
													<i class="fa-solid fa-eye fa-xl me-2"></i>
													Observaciones.
												</span>
											</div>
										</div>
										

										<!-- Informacion de la seccion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<label class="form-label text-muted">
													<small>
														Realice una descripcion general de su representado, mencionando características en el
														aspecto social, físico, personal, familiar y academico que a usted le gustaría dar a
														conocer a los docentes de la institucion. La misma no puede exceder los 150 caracteres
													</small>
												</label>
											</div>
										</div>


										<!-- Social -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="observaciones_social" class="form-label">Social:</label>
											</div>
											<div class="col-12 col-lg-10">
												<textarea 
													id="observaciones_social" 
													class="form-control" 
													name="observaciones_social" 
													cols="30" 
													rows="2"
													maxlength="150"
												>
												</textarea>
											</div>
										</div>


										<!-- Físico -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="observaciones_fisico" class="form-label">Físico:</label>
											</div>
											<div class="col-12 col-lg-10">
												<textarea 
													id="observaciones_fisico" 
													class="form-control" 
													name="observaciones_fisico" 
													cols="30" 
													rows="2"
													maxlength="150"
												>
												</textarea>
											</div>
										</div>


										<!-- Personal -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="observaciones_personal" class="form-label">Personal:</label>
											</div>
											<div class="col-12 col-lg-10">
												<textarea 
													id="observaciones_personal" 
													class="form-control" 
													name="observaciones_personal" 
													cols="30" 
													rows="2"
													maxlength="150"
												>
												</textarea>
											</div>
										</div>


										<!-- Familiar -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="observaciones_familiar" class="form-label">Familiar:</label>
											</div>
											<div class="col-12 col-lg-10">
												<textarea 
													id="observaciones_familiar" 
													class="form-control" 
													name="observaciones_familiar" 
													cols="30" 
													rows="2"
													maxlength="150"
												>
												</textarea>
											</div>
										</div>


										<!-- Academico -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="observaciones_academico" class="form-label">Academico:</label>
											</div>
											<div class="col-12 col-lg-10">
												<textarea 
													id="observaciones_academico" 
													class="form-control" 
													name="observaciones_academico" 
													cols="30" 
													rows="2"
													maxlength="150"
												>
												</textarea>
											</div>
										</div>


										<!-- Otra -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="observaciones_otra" class="form-label">Otra:</label>
											</div>
											<div class="col-12 col-lg-10">
												<textarea 
													id="observaciones_otra" 
													class="form-control" 
													name="observaciones_otra" 
													cols="30" 
													rows="2"
													maxlength="150"
												>
												</textarea>
											</div>
										</div>								
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
							<button id="boton_guardar" class="btn btn-primary" type="button" >
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
		<script type="text/javascript" src="../../js/validaciones_estudiante.js"></script>
		<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
	</body>
</html>
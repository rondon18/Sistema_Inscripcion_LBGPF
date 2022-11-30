<?php

// session_start();

// if (!$_SESSION['login']) {
// 	header('Location: ../index.php');
// 	exit();
// }

// if (!isset($_POST['Datos_Representante'])) {
// 	header('Location: paso-1.php');
// }

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Registrar nuevo estudiante</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../../css/estilos.css" />
	<link rel="stylesheet" type="text/css" href="../../css/all.min.css" />
	<link rel="icon" type="img/png" href="../../img/distintivo-LGPF.png">
</head>

<body>
	<main style="max-height: 100vh; overflow-y: auto;">
		<!--Banner-->
		<header
			class="w-100 bg-white d-flex justify-content-center justify-content-md-between shadow p-1 position-absolute top-0"
			style="z-index:1000;">
			<div>
				<img src="../../img/banner-gobierno.png" alt="" height="42" class="d-none d-md-inline-block align-text-top">
				<img src="../../img/banner-MPPE.png" alt="" height="42" class="d-none d-md-inline-block align-text-top">
			</div>
			<img src="../../img/banner-LGPF.png" alt="" height="42" class="d-inline-block align-text-top">
		</header>

		<div class="container-md py-3 px-xl-5 my-5 mb-lg-0">
			<div class="card">
				<!--Datos del representante-->
				<div class="card-header text-center">
					<b class="fs-4">Formulario de registro - Estudiante y Padres</b>
				</div>

				<div class="card-body">
					<div class="row">
						<!-- Selector de seccion -->
						<div class="col-12 col-lg-3">
							<ul class="nav flex-lg-column nav-pills nav-fill mb-4 gap-2">
								<li class="nav-item w-100">
									<u class="w-100">Datos del estudiante</u>
								</li>
								<li class="nav-item">
									<a id="link1" class="nav-link active" href="#">Datos personales</a>
								</li>
								<li class="nav-item">
									<a id="link2" class="nav-link" href="#">Datos sociales</a>
								</li>
								<li class="nav-item">
									<a id="link3" class="nav-link" href="#">Datos de salud</a>
								</li>
								<li class="nav-item">
									<a id="link4" class="nav-link" href="#">Observaciones</a>
								</li>

								<li class="nav-item w-100">
									<u class="w-100">Datos de los padres</u>
								</li>

								<li class="nav-item">
									<a id="link5" class="nav-link" href="#">Datos del padre</a>
								</li>
								<li class="nav-item">
									<a id="link6" class="nav-link" href="#">Datos de la madre</a>
								</li>
							</ul>
						</div>
						<!-- Contenedor del formulario -->
						<div class="col-12 col-lg-9 py-0" style="max-height: 60vh; overflow-y: auto;">
							<form id="Formulario_Est_Padres" action="test.php" method="POST">


								<!-- Datos personales del estudiante -->
								<section id="seccion1" class="row my-2">

									<div class="row mb-4">
										<div class="col-12">
											<span class="h5 mb-3">
												<i class="fas fa-address-card fa-xl"></i>
												Datos personales.
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
												id="Primer_Nombre_Est" 
												class="form-control mb-2" 
												type="text" 
												name="Primer_Nombre_Est" 
												placeholder="Primer nombre" 
												required
											>
										</div>
										<!-- Segundo nombre -->
										<div class="col-12 col-lg-5">
											<input 
												id="Segundo_Nombre_Est" 
												class="form-control mb-2" 
												type="text" 
												name="Segundo_Nombre_Est"
												placeholder="Segundo nombre" 
												required
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
												id="Primer_Apellido_Est" 
												class="form-control mb-2" 
												type="text" 
												name="Primer_Apellido_Est"
												placeholder="Primer apellido"
											>
										</div>
										<!-- Segundo apellido -->
										<div class="col-12 col-lg-5">
											<input 
												class="form-control mb-2" 
												type="text" 
												name="Segundo_Apellido_Est"
												id="Segundo_Apellido_Est" 
												placeholder="Segundo apellido"
											>
										</div>
									</div>


									<!-- Cédula -->
									<div class="row mb-4">
										<div class="col-12 col-lg-2">
											<label for="" class="form-label">Cédula:</label>
										</div>
										<div class="col-12 col-lg-10">
											<div class="input-group mb-2">
												<!-- Tipo de Cédula -->
												<select 
													id="Tipo_Cédula_R" 
													class="form-select" 
													name="Tipo_Cédula_Est" 
													required
												>
													<option selected disabled value="">Tipo de cédula</option>
													<option value="V">V</option>
													<option value="E">E</option>
												</select>
												<!-- Número de cédula -->
												<input 
													id="Cédula_Est"
													class="form-control w-auto" 
													type="text" 
													name="Cédula_Est" 
													maxlength="8" 
													minlength="7" 
													required
												>
											</div>
										</div>
									</div>


									<!-- Género -->
									<div class="row mb-4">
										<div class="col-12 col-lg-2">
											<label for="" class="form-label">Género:</label>
										</div>
										<div class="col-12 col-lg-10">
											<!-- Femenino -->
											<div class="form-check form-check-inline">
												<input 
													id="Género_Est_F" 
													class="form-check-input" 
													type="radio"
													name="Género_Est" 
													value="F" 
													required
												>
												<label for="Género_Est_F" class="form-label">Femenino</label>
											</div>
											<!-- Masculino -->
											<div class="form-check form-check-inline">
												<input 
													id="Género_Est_M" 
													class="form-check-input" 
													type="radio"
													name="Género_Est" 
													value="M" 
													required
												>
												<label for="Género_Est_M" class="form-label">Masculino</label>
											</div>
										</div>
									</div>


									<!-- Fecha y lugar de nacimiento -->
									<div class="row mb-4">
										<div class="col-12 col-lg-4">
											<label for="Fecha_Nacimiento_Est" class="form-label">Fecha de nacimiento:</label>
											<input 
												id="Fecha_Nacimiento_Est" 
												class="form-control mb-2" 
												type="date" name="Fecha_Nacimiento_Est"
												min="<?php echo date('Y')-19 .'-01-01'?>"
												max="<?php echo date('Y')-10 .'-01-01'?>" 
												title="Debe tener al menos 12 años."
												required
											>
										</div>
										<div class="col-12 col-lg-8">
											<label for="" class="form-label">Lugar de nacimiento:</label>
											<input class="form-control mb-2" type="text" name="Lugar_Nacimiento_Est"
												id="Lugar_Nacimiento_Est" required>
										</div>
										<div class="col-12 col-lg-5">
											
										</div>
									</div>


									<!-- Correo electrónico -->
									<div class="row mb-4">
										<div class="col-12 col-lg-3">
											<label for="" class="form-label">Correo electrónico:</label>
										</div>
										<div class="col-12 col-lg-9">
											<input 
												id="Correo_electrónico_Est" 
												class="form-control mb-2" 
												type="email" 
												name="Correo_electrónico_Est"
												placeholder="correo_ejemplo@dominio.com" 
												required
											>
										</div>
									</div>

									<!-- Teléfonos -->
									<div class="row mb-4">
										<div class="col-12 col-lg-12">
											<label class="form-label mb-3">Números de teléfono:</label>
										</div>
										<!-- Teléfono principal -->
										<div class="col-12 col-lg-2">
											<label class="form-label">Principal:</label>
										</div>
										<div class="col-12 col-lg-10">
											<!--Teléfono principal-->
											<div class="input-group mb-2">
												<!--Prefijo-->
												<input 
													id="Prefijo_Principal_Est" 
													class="form-control mb-2 form-control-sm" 
													type="text" 
													name="Prefijo_Principal_Est"
													list="prefijos-estudiante" 
													minlength="4"
													maxlength="4" 
													placeholder="Prefijo telefónico"
													title="Solo ingresar caracteres numericos" 
													required
												>
												<!--Número-->
												<input 
													id="Teléfono_Principal_Est" 
													class="form-control mb-2 form-control-sm w-auto" 
													type="tel" 
													name="Teléfono_Principal_Est"
													minlength="7" 
													maxlength="7"
													placeholder="Teléfono principal" 
													required
												>
											</div>
										</div>
										<!-- Teléfono secundario -->
										<div class="col-12 col-lg-2">
											<label class="form-label">Secundario:</label>
										</div>
										<div class="col-12 col-lg-10">
											<!--Teléfono principal-->
											<div class="input-group mb-2">
												<!--Prefijo-->
												<input 
													id="Prefijo_Secundario_Est" 
													class="form-control mb-2 form-control-sm" 
													type="text" 
													name="Prefijo_Secundario_Est"
													list="prefijos-estudiante" 
													minlength="4"
													maxlength="4" 
													placeholder="Prefijo telefónico"
													title="Solo ingresar caracteres numericos" 
													required
												>
												<!--Número-->
												<input 
													id="Teléfono_Secundario_Est" 
													class="form-control mb-2 form-control-sm w-auto" 
													type="tel" 
													name="Teléfono_Secundario_Est"
													minlength="7" 
													maxlength="7"
													placeholder="Teléfono secundario" 
													required
												>
											</div>
										</div>
									</div>


									<!-- Año a cursar -->
									<div class="row mb-4">
										<div class="col-12 col-lg-3">
											<label for="" class="form-label">Año a cursar:</label>
										</div>
										<div class="col-12 col-lg-9">
											<select class="form-select mb-2" name="Grado_A_Cursar" required>
												<option selected disabled value="">Seleccione una opción</option>
												<option value="Primer año">Primer año</option>
												<option value="Segundo año">Segundo año</option>
												<option value="Tercer año">Tercer año</option>
												<option value="Cuarto año">Cuarto año</option>
												<option value="Quinto año">Quinto año</option>
											</select>
										</div>
									</div>


									<!-- Estudiante repitente -->
									<div class="row mb-4">
										<!-- ¿El estudiante es repitente? -->
										<div class="col-12 col-lg-12">
											<label for="" class="form-label mb-3">¿El estudiante es repitente?:</label>
										</div>
										<!-- ¿Qué materias? -->
										<div class="col-12 col-lg-3">
											<label for="" class="form-label">¿Qué materias?:</label>
										</div>
										<div class="col-12 col-lg-9">
											<input 
												id="Materias_Repitente" 
												class="form-control mb-2" 
												type="text" 
												name="Materias_Repitente"
												placeholder="¿Cuáles materias?"
											>
										</div>
										<!-- ¿Qué año repite? -->
										<div class="col-12 col-lg-3">
											<label for="" class="form-label">¿Qué año repite?:</label>
										</div>
										<div class="col-12 col-lg-9">
											<input 
												id="Año_Repitente" 
												class="form-control mb-2" 
												type="text" 
												name="Año_Repitente"
												list="grados" 
												placeholder="¿Qué año repite?"
											>
											<datalist id="grados">
												<option value="Primer año"></option>
												<option value="Segundo año"></option>
												<option value="Tercer año"></option>
												<option value="Cuarto año"></option>
												<option value="Quinto año"></option>
											</datalist>
										</div>
									</div>

									<!-- Materias pendientes -->
									<div class="row mb-4">
										<div class="col-12 col-lg-3">
											<label for="" class="form-label">Materias pendientes:</label>
										</div>
										<div class="col-12 col-lg-9">
											<input 
												id="Materias_Pendientes" 
												class="form-control" 
												type="text"
												name="Materias_Pendientes" 
												placeholder="¿Cuáles?"
											>
										</div>
									</div>


									<!-- Plantel de procedencia -->
									<div class="row mb-4">
										<div class="col-12 col-lg-4">
											<label for="" class="form-label">Plantel de procedencia:</label>
										</div>
										<div class="col-12 col-lg-8">
											<textarea 
												id="Plantel_Procedencia"
												class="form-control mb-2" 
												name="Plantel_Procedencia" 
												required
											></textarea>
										</div>
									</div>
								</section>

								<!-- Datos sociales del estudiante -->
								<section id="seccion2" class="row my-2" style="display:none;">
									
									<!--Datos sociales-->
									<div class="row mb-4">
										<div class="col-12">
											<span class="h5 mb-3">
												<i class="fa-solid fa-users fa-xl"></i>
												Datos sociales.
											</span>
										</div>
									</div>
									
									
									<!-- Domicilio -->
									<div class="row mb-4">
										<div class="col-12 col-lg-3">
											<label for="" class="form-label">Lugar de domicilio:</label>
										</div>
										<div class="col-12 col-lg-9">
											<textarea 
												id="Dirección_Est"
												class="form-control" 
												name="Dirección_Est" 
												required
											></textarea>
										</div>
									</div>


									<!-- Con quien vive -->
									<div class="row mb-4">
										<div class="col-12 col-lg-3">
											<label for="" class="form-label">¿Con quién vive?:</label>
										</div>
										<div class="col-12 col-lg-9">
											<input 
												id="Con_Quién_Vive"
												class="form-control mb-2" 
												type="text" 
												name="Con_Quién_Vive" 
												required
											>
										</div>
									</div>


									<!-- Tiene Canaima -->
									<div class="row mb-4">
										<div class="col-12 col-lg-3">
											<label for="" class="form-label">¿Tiene Canaima?:</label>
										</div>
										<div class="col-12 col-lg-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="Tiene_Canaima" value="Si"
													required>
												<label class="form-label">Si </label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="Tiene_Canaima" value="No"
													required>
												<label class="form-label">No </label>
											</div>
										</div>
									</div>


									<!-- Condiciones de la Canaima -->
									<div class="row mb-4">
										<div class="col-12 col-lg-3">
											<label for="" class="form-label">¿En qué condiciones?:</label>
										</div>
										<div class="col-12 col-lg-9">
											<select class="form-select mb-2" name="Condiciones_Canaima">
													<option selected disabled value="">Seleccione una opción</option>
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
										<!-- Código de carnet de la patria -->
										<div class="col-12 col-lg-4">
											<input 
												id="Código_Carnet_Patria_Est" 
												class="form-control w-auto" 
												type="text" 
												name="Código_Carnet_Patria_Est"
												placeholder="Código" 
												minlength="10" 
												maxlength="10"
											>
										</div>
										<!-- Serial del carnet de la patria -->
										<div class="col-12 col-lg-4">
											<input 
												id="Serial_Carnet_Patria_Est" 
												class="form-control w-auto" 
												type="text" 
												name="Serial_Carnet_Patria_Est"
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
											<label for="" class="form-label">¿Tiene acceso a internet?:</label>
										</div>
										<div class="col-12 col-lg-8">
											<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio" name="Internet_Vivienda" value="Si"
														required>
													<label class="form-label">Si </label>
												</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="Internet_Vivienda" value="No"
													required>
												<label class="form-label">No </label>
											</div>
										</div>
									</div>	
								</section>

								<section id="seccion3" class="row my-2" style="display:none;">
									
									<!--Datos de salud-->
									<div class="row mb-4">
										<div class="col-12">
											<span class="h5 mb-3">
												<i class="fas fa-plus-square fa-xl"></i>
												Datos de salud.
											</span>
										</div>
									</div>


									<!-- Medidas antropométricas -->
									<div class="row mb-4">
										<div class="col-12 col-lg-12">
											<label for="" class="form-label mb-3">Medidas antropométricas:</label>
										</div>
										<!-- Índice de masa corporal -->
										<div class="col-12 col-lg-6">
											<label for="" class="form-label">Índice de masa corporal:</label>
											<input 
												id="Índice"
												class="form-control mb-2" 
												type="number" 
												name="Índice" 
												placeholder="Índice" 
												maxlength="5"
												required 
											>
										</div>
										<!-- Talla (Estatura) -->
										<div class="col-12 col-lg-6">
											<label for="" class="form-label">Talla (Estatura):</label>
											<input 
												id="Talla"
												class="form-control mb-2" 
												type="number" 
												name="Talla" 
												placeholder="Talla(cm)" 
												maxlength="5"
												required 
											>
										</div>
										<!-- Peso -->
										<div class="col-12 col-lg-6">
											<label for="" class="form-label">Peso:</label>
											<input 
												id="Peso"
												class="form-control mb-2" 
												type="number" 
												name="Peso" 
												placeholder="Peso(kg)" 
												maxlength="5"
												required 
											>
										</div>
										<!-- Circunferencia braquial -->
										<div class="col-12 col-lg-6">
											<label for="" class="form-label">Circunferencia braquial:</label>
											<input 
												id="C_Braquial(cm)"
												class="form-control mb-2" 
												type="number" 
												name="C_Braquial" 
												placeholder="C.brazo" 
												maxlength="5"
												required 
											>
										</div>
									</div>
									
									<div class="row mb-4">
										<div class="col-12 col-lg-12">
											<label for="" class="form-label mb-3">Tallas:</label>
										</div>
										<!-- Talla de pantalón -->
										<div class="col-12 col-lg-4">
											<label for="" class="form-label">Talla de pantalón:</label>
											<input 
												id="Talla_Pantalón" 
												class="form-control mb-2" 
												type="text" 
												name="Talla_Pantalón"
												placeholder="Pantalón" 
												maxlength="5"
												required 
											>
										</div>
										<!-- Talla de camisa -->
										<div class="col-12 col-lg-4">
											<label for="" class="form-label">Talla de camisa:</label>
											<input 
												id="Talla_Camisa"
												class="form-control mb-2" 
												type="text" 
												name="Talla_Camisa" 
												placeholder="Camisa" 
												maxlength="5"
												required 
											>
										</div>
										<!-- Talla de zapatos -->
										<div class="col-12 col-lg-4">
											<label for="" class="form-label">Talla de zapatos:</label>
											<input 
												id="Talla_Zapatos"
												class="form-control mb-2" 
												type="text" 
												name="Talla_Zapatos" 
												placeholder="Zapatos" 
												maxlength="5"
												required 
											>
										</div>
									</div>
									

									<!-- Enfermedad -->
									<div class="row mb-4">
										<div class="col-12 col-lg-4">
											<label for="" class="form-label">¿Padece alguna enfermedad?:</label>
										</div>
										<div class="col-12 col-lg-8">
											<input 
												class="form-control" 
												type="text" 
												name="Cual_Enfermedad"
												id="Cual_Enfermedad" 
												placeholder="¿Cuál enfermedad?"
											>
										</div>
										<div class="col-12 col-lg-12">
											<span class="form-text">En caso de no padecer ninguna, dejar vacío.</span>
										</div>
									</div>
									

									<!-- Tipo de sangre -->
									<div class="row mb-4">
										<div class="col-12 col-lg-4">
											<label for="" class="form-label">Tipo de sangre:</label>
										</div>
										<div class="col-12 col-lg-4">
											<select class="form-select" name="Grupo_Sanguineo" required>
												<option selected disabled value="">Grupo sanguíneo</option>
												<option value="O">O</option>
												<option value="A">A</option>
												<option value="B">B</option>
												<option value="AB">AB</option>
												<option value="NC">No conocido</option>
											</select>
										</div>
										<div class="col-12 col-lg-4">
											<select class="form-select" name="Factor_Rhesus" required>
												<option selected disabled value="">Factor Rhesus</option>
												<option value="+">+</option>
												<option value="-">-</option>
												<option value="N">No conocido</option>
											</select>
										</div>
									</div>
									

									<!-- Lateralidad -->
									<div class="row mb-4">
										<div class="col-12 col-lg-2">
											<label for="" class="form-label">Lateralidad:</label>
										</div>
										<div class="col-12 col-lg-10">
											<div class="form-check form-check-inline">
												<label class="form-label">Ambidextro </label>
												<input 
													class="form-check-input" 
													type="radio" 
													name="Lateralidad"
													value="Ambidextro" 
													required
												>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-label">Diestro </label>
												<input 
													class="form-check-input" 
													type="radio" 
													name="Lateralidad" 
													value="Diestro"
													required
												>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-label">Zurdo </label>
												<input 
													class="form-check-input" 
													type="radio" 
													name="Lateralidad" 
													value="Zurdo"
													required
												>
											</div>
										</div>
									</div>


									<!-- Condición de la dentadura -->
									<div class="row mb-4">
										<div class="col-12 col-lg-4">
											<label for="" class="form-label">Condición de la dentadura:</label>
										</div>
										<div class="col-12 col-lg-8">
											<div class="form-check form-check-inline">
												<label class="form-label">Buena </label>
												<input 
													class="form-check-input" 
													type="radio" 
													name="Condición_Dentadura"
													value="Buena" 
													required
												>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-label">Regular </label>
												<input 
													class="form-check-input" 
													type="radio" 
													name="Condición_Dentadura"
													value="Regular" 
													required
												>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-label">Mala </label>
												<input 
													class="form-check-input" 
													type="radio" 
													name="Condición_Dentadura"
													value="Mala" 
													required
												>
											</div>										
										</div>
									</div>
									

									<!-- Condición de la vista -->
									<div class="row mb-4">
										<div class="col-12 col-lg-4">
											<label for="" class="form-label">Condición de la vista:</label>
										</div>
										<div class="col-12 col-lg-8">
											<div class="form-check form-check-inline">
												<label class="form-label">Buena </label>
												<input 
													class="form-check-input" 
													type="radio" 
													name="Condición_Vista"
													value="Buena" 
													required
												>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-label">Regular </label>
												<input 
													class="form-check-input" 
													type="radio" 
													name="Condición_Vista"
													value="Regular" 
													required
												>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-label">Mala </label>
												<input 
													class="form-check-input" 
													type="radio" 
													name="Condición_Vista"
													value="Mala" 
													required
												>
											</div>										
										</div>
									</div>
									
									<div class="row mb-4">
										<div class="col-12 col-lg-12">
											<label for="" class="form-label mb-3">¿Presenta alguna de estas condiciones?:</label>
										</div>
										<div class="col-12 col-lg-12">
											<div class="form-check form-check-inline">
													<label class="form-label">Visual </label>
													<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]"
														value="Visual">
												</div>
												<div class="form-check form-check-inline">
													<label class="form-label">Motora </label>
													<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]"
														value="Motora">
												</div>
												<div class="form-check form-check-inline">
													<label class="form-label">Auditiva </label>
													<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]"
														value="Auditiva">
												</div>
												<div class="form-check form-check-inline">
													<label class="form-label">Escritura </label>
													<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]"
														value="Escritura">
												</div>
												<div class="form-check form-check-inline">
													<label class="form-label">Lectura </label>
													<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]"
														value="Lectura">
												</div>
												<div class="form-check form-check-inline">
													<label class="form-label">Lenguaje </label>
													<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]"
														value="Lenguaje">
												</div>
												<div class="form-check form-check-inline">
													<label class="form-label">Embarazo </label>
													<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]"
														value="Embarazo">
												</div>
												<div class="form-check form-check-inline">
													<label class="form-label">Educativa especial</label>
													<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]"
														value="Educativa especial">
												</div>
										</div>
									</div>
									

									<!-- Necesidad educativa especial -->
									<div class="row mb-4">
										<div class="col-12 col-lg-12">
											<label for="" class="form-label mb-3">Presenta alguna de estas necesidades educativas especiales:</label>
										</div>
										<div class="col-12 col-lg-12">
											<input 
												id="Necesidad_educativa" 
												class="form-control mb-2" 
												type="text" 
												name="Necesidad_educativa"
												placeholder="¿Cuál necesidad educativa?"
											>
										</div>
									</div>
									

									<!-- Es atendido por otra institución  -->
									<div class="row mb-4">
										<div class="col-12 col-lg-5">
											<label for="" class="form-label">¿Es atendido por otra institución?:</label>
										</div>
										<div class="col-12 col-lg-7">
											<input 
												class="form-control" 
												type="text" 
												name="Institución_médica"
												id="Institución_médica" 
												placeholder="¿Cuál institución?"
											>
										</div>
									</div>
									

									<!-- Vacunación -->
									<div class="row mb-4">
										<div class="col-12 col-lg-12">
											<label for="" class="form-label mb-3">Vacunación COVID-19:</label>
										</div> 
										<div class="col-12 col-lg-4">
											<datalist id="sugerencias_vacunas">
												<option value="Pfizer/BioNTech">
												<option value="Moderna">
												<option value="AztraZeneca">
												<option value="Janssen">
												<option value="Sinopharm">
												<option value="Sinovac">
												<option value="Bharat">
												<option value="CanSinoBIO">
												<option value="Valneva">
												<option value="Novavax">
											</datalist>
											<!-- Vacuna aplicada -->
											<label for="" class="form-label">Vacuna aplicada:</label>
											<input 
												id="Vacuna"
												class="form-control" 
												type="text" 
												name="Vacuna" 
												list="sugerencias_vacunas" 
												placeholder="¿Cuál vacuna?" 
												maxlength="15"
											>
										</div>
										<!-- Dosis -->
										<div class="col-12 col-lg-4">
											<label for="" class="form-label">Dosis aplicadas:</label>
											<input 
												id="Dosis"
												class="form-control" 
												type="number" 
												name="Dosis" 
												placeholder="Ingrese un numero..." 
												min="0" 
												step="1"
											>
										</div>
										<!-- Lote -->
										<div class="col-12 col-lg-4">
											<label for="" class="form-label">Lote de vacuna (Última):</label>
											<input 
												id="Lote"
												class="form-control" 
												type="text" 
												name="Lote" 
												placeholder="Código de lote" 
												maxlength="15"
											>
										</div>
										<!-- Información adicional -->
										<div class="col-12 col-lg-12">
											<span class="form-text mt-3">En caso de no estar vacunado, dejar vacío.</span>
										</div>
									</div>


									<!-- Dieta especial -->
									<div class="row mb-4">
										<div class="col-12 col-lg-4">
											<label for="" class="form-label">¿Tiene alguna dieta especial?:</label>
										</div>
										<div class="col-12 col-lg-8">
											<input 
											class="form-control" type="text" name="Dieta_Especial"
													id="Dieta_Especial" placeholder="¿Qué dieta?">
										</div>
									</div>
									
									<!-- Posee carnet de discapacidad -->
									<div class="row mb-4">
										<div class="col-12 col-lg-5">
											<label for="" class="form-label">¿Posee carnet de discapacidad?:</label>
										</div>
										<div class="col-12 col-lg-7">
											<input 
												id="Nro_Carnet_Discapacidad" 
												class="form-control" 
												type="text" 
												name="Nro_Carnet_Discapacidad"
												placeholder="Número de carnet" 
												maxlength="25"
											>
										</div>
									</div>
								</section>

								<section id="seccion4" class="row my-2" style="display:none;">
									
									<div class="row mb-4">
										<div class="col-12">
											<span class="h5 mb-3">
												<i class="fa-solid fa-eye fa-xl"></i>
												Observaciones.
											</span>
										</div>
									</div>
									

									<!-- Información de la sección -->
									<div class="row mb-4">
										<div class="col-12 col-lg-12">
											<label class="form-label text-muted">
												<small>
													Realice una descripción general de su representado, mencionando características en el
													aspecto social, físico, personal, familiar y académico que a usted le gustaría dar a
													conocer a los docentes de la institución. La misma no puede exceder los 150 caracteres
												</small>
											</label>
										</div>
									</div>


									<!-- Social -->
									<div class="row mb-4">
										<div class="col-12 col-lg-2">
											<label for="" class="form-label">Social:</label>
										</div>
										<div class="col-12 col-lg-10">
											<textarea name="observaciones_Social" id="observaciones_Social" cols="30" rows="2"
										class="form-control mb-2" maxlength="150"></textarea>
										</div>
									</div>


									<!-- Físico -->
									<div class="row mb-4">
										<div class="col-12 col-lg-2">
											<label for="" class="form-label">Físico:</label>
										</div>
										<div class="col-12 col-lg-10">
											<textarea name="observaciones_Fisico" id="observaciones_Fisico" cols="30" rows="2"
										class="form-control mb-2" maxlength="150"></textarea>
										</div>
									</div>


									<!-- Personal -->
									<div class="row mb-4">
										<div class="col-12 col-lg-2">
											<label for="" class="form-label">Personal:</label>
										</div>
										<div class="col-12 col-lg-10">
											<textarea name="observaciones_Personal" id="observaciones_Personal" cols="30" rows="2"
										class="form-control mb-2" maxlength="150"></textarea>
										</div>
									</div>


									<!-- Familiar -->
									<div class="row mb-4">
										<div class="col-12 col-lg-2">
											<label for="" class="form-label">Familiar:</label>
										</div>
										<div class="col-12 col-lg-10">
											<textarea name="observaciones_Familiar" id="observaciones_Familiar" cols="30" rows="2"
										class="form-control mb-2" maxlength="150"></textarea>
										</div>
									</div>


									<!-- Académico -->
									<div class="row mb-4">
										<div class="col-12 col-lg-2">
											<label for="" class="form-label">Académico:</label>
										</div>
										<div class="col-12 col-lg-10">
											<textarea name="observaciones_Academico" id="observaciones_Academico" cols="30" rows="2"
										class="form-control mb-2" maxlength="150"></textarea>
										</div>
									</div>


									<!-- Otra -->
									<div class="row mb-4">
										<div class="col-12 col-lg-2">
											<label for="" class="form-label">Otra:</label>
										</div>
										<div class="col-12 col-lg-10">
											<textarea name="observaciones_Otra" id="observaciones_Otra" cols="30" rows="2"
										class="form-control mb-2" maxlength="150"></textarea>
										</div>
									</div>								
								</section>

								<section id="seccion5" class="row my-2" style="display:none;">
									<!--Datos del padre-->
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
												name="Primer_Nombre_Padre"
												placeholder="Primer nombre"
											>
										</div>
										<!-- Segundo nombre -->
										<div class="col-12 col-lg-5">
											<input 
												class="form-control mb-2" 
												type="text" 
												name="Segundo_Nombre_Padre"
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
												name="Primer_Apellido_Padre"
												placeholder="Primer apellido"
											>
										</div>
										<!-- Segundo apellido -->
										<div class="col-12 col-lg-5">
											<input 
												class="form-control mb-2" 
												type="text" 
												name="Segundo_Apellido_Padre"
												placeholder="Segundo apellido"
											>
										</div>
									</div>


									<!-- Cédula -->
									<div class="row mb-4">
										<div class="col-12 col-lg-2">
											<label for="" class="form-label">Cédula:</label>
										</div>
										<div class="col-12 col-lg-10">
											<div class="input-group">
												<!-- Tipo de cédula -->
												<select class="form-select" id="Tipo_Cédula_Padre" name="Tipo_Cédula_Padre">
													<option selected disabled value="">Tipo de cédula</option>
													<option value="V">V</option>
													<option value="E">E</option>
												</select>
												<!-- Número de cédula -->
												<input 
													id="Cédula_Padre"
													class="form-control w-auto" 
													type="text" 
													name="Cédula_Padre" 
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
											<input class="form-control mb-2" type="date" name="Fecha_Nacimiento_Padre"
												min="<?php echo date('Y')-100 .'-01-01'?>" max="<?php echo date('Y')-18 .'-01-01'?>"
												title="Debe tener al menos 18 años.">
										</div>
										<!-- Lugar de nacimiento -->
										<div class="col-12 col-lg-8">
											<label for="" class="form-label">Lugar de nacimiento:</label>
											<input class="form-control mb-2" type="text" name="Lugar_Nacimiento_Padre">
										</div>
									</div>


									<!-- Correo electrónico -->
									<div class="row mb-4">
										<div class="col-12 col-lg-3">
											<label for="" class="form-label">Correo electrónico:</label>
										</div>
										<div class="col-12 col-lg-9">
											<input class="form-control" type="email" name="Correo_electrónico_Padre">
										</div>
									</div>


									<!-- Teléfonos -->
									<div class="row mb-4">
										<div class="col-12 col-lg-12">
											<label for="" class="form-label mb-3">Números de teléfono:</label>
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
												<input class="form-control mb-2 form-control-sm" type="text" name="Prefijo_Principal_Padre"
													list="prefijos" minlength="4" maxlength="4" placeholder="Prefijo telefónico"
													title="Solo ingresar caracteres numericos">
												<!--Número-->
												<input class="form-control mb-2 form-control-sm w-auto" type="tel" name="Teléfono_Principal_Padre"
													minlength="7" maxlength="7" placeholder="Teléfono principal">
											</div>
										</div>
										<div class="col-12 col-lg-2">
											<label for="" class="form-label">Secundario:</label>
										</div>
										<div class="col-12 col-lg-10">
											<!--Teléfono secundario-->
											<div class="input-group mb-2">
												<!--Prefijo-->
												<input class="form-control mb-2 form-control-sm" type="text" name="Prefijo_Secundario_Padre"
													list="prefijos" minlength="4" maxlength="4" placeholder="Prefijo telefónico"
													title="Solo ingresar caracteres numericos">
												<!--Número-->
												<input class="form-control mb-2 form-control-sm w-auto" type="tel" name="Teléfono_Secundario_Padre"
													minlength="7" maxlength="7" placeholder="Teléfono secundario">
											</div>
										</div>
									</div>	


									<!-- Estado civil -->
									<div class="row mb-4">
										<div class="col-12 col-lg-2">
											<label for="" class="form-label">Estado civil:</label>
										</div>
										<div class="col-12 col-lg-10">
											<select class="form-select" name="Estado_Civil_Padre">
												<option selected disabled value="">Seleccione una opción</option>
												<option value="Soltero(a)">Soltero(a)</option>
												<option value="Casado(a)">Casado(a)</option>
												<option value="Divorciado(a)">Divorciado(a)</option>
												<option value="Viudo(a)">Viudo(a)</option>
											</select>
										</div>
									</div>


									<!-- Grado de instrucción -->
									<div class="row mb-4">
										<div class="col-12 col-lg-3">
											<label for="" class="form-label">Grado de instrucción:</label>
										</div>
										<div class="col-12 col-lg-9">
											<div class="form-check form-check-inline">
												<input 
													class="form-check-input" 
													type="radio" 
													name="Grado_Instrucción_Pa"
													value="Primaria"
												>
												<label class="form-label">Primaria </label>
											</div>
											<div class="form-check form-check-inline">
												<input 
													class="form-check-input" 
													type="radio" 
													name="Grado_Instrucción_Pa"	
													value="Bachillerato"
												>
												<label class="form-label">Bachillerato </label>
											</div>
											<div class="form-check form-check-inline">
												<input 
													class="form-check-input" 
													type="radio" 
													name="Grado_Instrucción_Pa"
													value="Universitario"
												>
												<label class="form-label">Universitario </label>
											</div>
										</div>
									</div>



									<div class="row mb-4">
										<div class="col-12 col-lg-2">
											<label for="" class="form-label">Dirección de residencia:</label>
										</div>
										<div class="col-12 col-lg-10">
											<textarea class="form-control mb-2" name="Dirección_Padre"></textarea>
										</div>
									</div>


									<div class="row mb-4">
										<div class="col-12 col-lg-4">
											<label class="form-label">¿Se encuentra en el país?:</label>
										</div>
										<div class="col-12 col-lg-8">
											<div class="input-group mb-2">
												<select class="form-select" name="Reside_En_El_País_Pa">
													<option selected disabled value="">Seleccione una opción</option>
													<option value="Si">Si</option>
													<option value="No">No</option>
												</select>
												<input class="form-control" type="text" name="País_Pa" id="País_Pa"
													placeholder="¿En qué país?">
										</div>
										<div class="col-12">
											<span class="form-text">En caso de estar fuera del país, especifique en cuál se encuentra</span>
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
												<input class="form-check-input" type="radio" name="Condición_vivienda_Pa"
													value="Buena">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-label">Regular </label>
												<input class="form-check-input" type="radio" name="Condición_vivienda_Pa"
													value="Regular">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-label">Mala </label>
												<input class="form-check-input" type="radio" name="Condición_vivienda_Pa"
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
												<input class="form-check-input" type="radio" name="Tipo_Vivienda_Pa"
													value="Casa">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-label">Apartamento </label>
												<input class="form-check-input" type="radio" name="Tipo_Vivienda_Pa"
													value="Apartamento">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-label">Rancho </label>
												<input class="form-check-input" type="radio" name="Tipo_Vivienda_Pa"
													value="Rancho">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-label">Quinta </label>
												<input class="form-check-input" type="radio" name="Tipo_Vivienda_Pa"
													value="Quinta">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-label">Habitación </label>
												<input class="form-check-input" type="radio" name="Tipo_Vivienda_Pa"
													value="Habitación">
											</div>
										</div>
									</div>


									<div class="row mb-4">
										<div class="col-12 col-lg-4">
											<label for="" class="form-label">Tenencia de la vivienda:</label>
										</div>
										<div class="col-12 col-lg-8">
											<div class="input-group">
												<select class="form-select" name="Tenencia_vivienda_Pa">
													<option selected disabled value="">Seleccione una opción</option>
													<option value="Propia">Propia</option>
													<option value="Alquilada">Alquilada</option>
													<option value="Prestada">Prestada</option>
													<option value="Otro">Otro</option>
												</select>
												<input class="form-control" type="text" name="Tenencia_vivienda_Pa_Otro"
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
												<input class="form-check-input" type="radio" name="Padre_Trabaja" value="Si">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-label">No </label>
												<input class="form-check-input" type="radio" name="Padre_Trabaja" value="No">
											</div>
										</div>
										<div class="col-12">
											<span class="form-text">En caso de marcar NO, se inhabilitaran los campos y se establecerá como desempleado.</span>
										</div>
									</div>

									<fieldset id="Laborales_Padre">
										<div class="row mb-4">
											<div class="col-12 col-lg-3">
												<label for="" class="form-label">Cargo que ocupa:</label>
											</div>
											<div class="col-12 col-lg-9">
												<input class="form-control mb-2" type="text" name="Empleo_Pa" id="Empleo_Pa"
												maxlength="60" minlength="3">
											</div>
										</div>


										<div class="row mb-4">
											<div class="col-12 col-lg-3">
												<label for="" class="form-label">Teléfono del trabajo:</label>
											</div>
											<div class="col-12 col-lg-9">
												<div class="input-group mb-2">
													<!--Prefijo-->
													<input class="form-control" type="text" name="Prefijo_Trabajo_Pa"
														id="Prefijo_Trabajo_Pa" list="prefijos" pattern="[0-9]+" maxlength="4"
														placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos">
													<!--Número-->
													<input class="form-control w-auto" type="tel" name="Teléfono_Trabajo_Pa"
														id="Teléfono_Trabajo_Pa" placeholder="Teléfono principal" pattern="[0-9]+"
														maxlength="7" minlength="7">
												</div>
											</div>
										</div>


										<div class="row mb-4">
											<div class="col-12 col-lg-3">
												<label for="" class="form-label">Lugar del trabajo:</label>
											</div>
											<div class="col-12 col-lg-9">
												<textarea class="form-control mb-2" name="Lugar_Trabajo_Pa" id="Lugar_Trabajo_Pa"
												maxlength="180" minlength="3"></textarea>
											</div>
										</div>

										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">Remuneración:</label>
											</div>
											<div class="col-12 col-lg-10">
												<div class="input-group mb-2">
													<!--Remuneración en base a sueldos minimos del padre-->
													<input class="form-control text-end" type="number" name="Remuneración_Pa"
														id="Remuneración_Pa" placeholder="Salarios mínimos" min="0" step="1">
													<!--Tipo de Remuneración del padre-->
													<select class="form-select" name="Tipo_Remuneración_Pa">
														<option value="Diaria">Remuneración diaria</option>
														<option value="Semanal">Remuneración semanal</option>
														<option value="Quincenal">Remuneración quincenal</option>
														<option value="Mensual">Remuneración mensual</option>
													</select>
												</div>
											</div>
										</div>
									</fieldset>
								</section>
								

								<section id="seccion6" class="row my-2" style="display:none;">
									<!--Datos del madre-->
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
												name="Primer_Nombre_Madre"
												placeholder="Primer nombre"
											>
										</div>
										<!-- Segundo nombre -->
										<div class="col-12 col-lg-5">
											<input 
												class="form-control mb-2" 
												type="text" 
												name="Segundo_Nombre_Madre"
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
												name="Primer_Apellido_Madre"
												placeholder="Primer apellido"
											>
										</div>
										<!-- Segundo apellido -->
										<div class="col-12 col-lg-5">
											<input 
												class="form-control mb-2" 
												type="text" 
												name="Segundo_Apellido_Madre"
												placeholder="Segundo apellido"
											>
										</div>
									</div>


									<!-- Cédula -->
									<div class="row mb-4">
										<div class="col-12 col-lg-2">
											<label for="" class="form-label">Cédula:</label>
										</div>
										<div class="col-12 col-lg-10">
											<div class="input-group">
												<!-- Tipo de cédula -->
												<select class="form-select" id="Tipo_Cédula_Madre" name="Tipo_Cédula_Madre">
													<option selected disabled value="">Tipo de cédula</option>
													<option value="V">V</option>
													<option value="E">E</option>
												</select>
												<!-- Número de cédula -->
												<input 
													id="Cédula_Madre"
													class="form-control w-auto" 
													type="text" 
													name="Cédula_Madre" 
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
											<input class="form-control mb-2" type="date" name="Fecha_Nacimiento_Madre"
												min="<?php echo date('Y')-100 .'-01-01'?>" max="<?php echo date('Y')-18 .'-01-01'?>"
												title="Debe tener al menos 18 años.">
										</div>
										<!-- Lugar de nacimiento -->
										<div class="col-12 col-lg-8">
											<label for="" class="form-label">Lugar de nacimiento:</label>
											<input class="form-control mb-2" type="text" name="Lugar_Nacimiento_Madre">
										</div>
									</div>


									<!-- Correo electrónico -->
									<div class="row mb-4">
										<div class="col-12 col-lg-3">
											<label for="" class="form-label">Correo electrónico:</label>
										</div>
										<div class="col-12 col-lg-9">
											<input class="form-control" type="email" name="Correo_electrónico_Madre">
										</div>
									</div>


									<!-- Teléfonos -->
									<div class="row mb-4">
										<div class="col-12 col-lg-12">
											<label for="" class="form-label mb-3">Números de teléfono:</label>
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
												<input class="form-control mb-2 form-control-sm" type="text" name="Prefijo_Principal_Madre"
													list="prefijos" minlength="4" maxlength="4" placeholder="Prefijo telefónico"
													title="Solo ingresar caracteres numericos">
												<!--Número-->
												<input class="form-control mb-2 form-control-sm w-auto" type="tel" name="Teléfono_Principal_Madre"
													minlength="7" maxlength="7" placeholder="Teléfono principal">
											</div>
										</div>
										<div class="col-12 col-lg-2">
											<label for="" class="form-label">Secundario:</label>
										</div>
										<div class="col-12 col-lg-10">
											<!--Teléfono secundario-->
											<div class="input-group mb-2">
												<!--Prefijo-->
												<input class="form-control mb-2 form-control-sm" type="text" name="Prefijo_Secundario_Madre"
													list="prefijos" minlength="4" maxlength="4" placeholder="Prefijo telefónico"
													title="Solo ingresar caracteres numericos">
												<!--Número-->
												<input class="form-control mb-2 form-control-sm w-auto" type="tel" name="Teléfono_Secundario_Madre"
													minlength="7" maxlength="7" placeholder="Teléfono secundario">
											</div>
										</div>
									</div>	


									<!-- Estado civil -->
									<div class="row mb-4">
										<div class="col-12 col-lg-2">
											<label for="" class="form-label">Estado civil:</label>
										</div>
										<div class="col-12 col-lg-10">
											<select class="form-select" name="Estado_Civil_Madre">
												<option selected disabled value="">Seleccione una opción</option>
												<option value="Soltero(a)">Soltero(a)</option>
												<option value="Casado(a)">Casado(a)</option>
												<option value="Divorciado(a)">Divorciado(a)</option>
												<option value="Viudo(a)">Viudo(a)</option>
											</select>
										</div>
									</div>


									<!-- Grado de instrucción -->
									<div class="row mb-4">
										<div class="col-12 col-lg-3">
											<label for="" class="form-label">Grado de instrucción:</label>
										</div>
										<div class="col-12 col-lg-9">
											<div class="form-check form-check-inline">
												<input 
													class="form-check-input" 
													type="radio" 
													name="Grado_Instrucción_Ma"
													value="Primaria"
												>
												<label class="form-label">Primaria </label>
											</div>
											<div class="form-check form-check-inline">
												<input 
													class="form-check-input" 
													type="radio" 
													name="Grado_Instrucción_Ma"	
													value="Bachillerato"
												>
												<label class="form-label">Bachillerato </label>
											</div>
											<div class="form-check form-check-inline">
												<input 
													class="form-check-input" 
													type="radio" 
													name="Grado_Instrucción_Ma"
													value="Universitario"
												>
												<label class="form-label">Universitario </label>
											</div>
										</div>
									</div>



									<div class="row mb-4">
										<div class="col-12 col-lg-2">
											<label for="" class="form-label">Dirección de residencia:</label>
										</div>
										<div class="col-12 col-lg-10">
											<textarea class="form-control mb-2" name="Dirección_Madre"></textarea>
										</div>
									</div>


									<div class="row mb-4">
										<div class="col-12 col-lg-4">
											<label class="form-label">¿Se encuentra en el país?:</label>
										</div>
										<div class="col-12 col-lg-8">
											<div class="input-group mb-2">
												<select class="form-select" name="Reside_En_El_País_Ma">
													<option selected disabled value="">Seleccione una opción</option>
													<option value="Si">Si</option>
													<option value="No">No</option>
												</select>
												<input class="form-control" type="text" name="País_Ma" id="País_Ma"
													placeholder="¿En qué país?">
										</div>
										<div class="col-12">
											<span class="form-text">En caso de estar fuera del país, especifique en cuál se encuentra</span>
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
												<input class="form-check-input" type="radio" name="Condición_vivienda_Ma"
													value="Buena">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-label">Regular </label>
												<input class="form-check-input" type="radio" name="Condición_vivienda_Ma"
													value="Regular">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-label">Mala </label>
												<input class="form-check-input" type="radio" name="Condición_vivienda_Ma"
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
												<input class="form-check-input" type="radio" name="Tipo_Vivienda_Ma"
													value="Casa">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-label">Apartamento </label>
												<input class="form-check-input" type="radio" name="Tipo_Vivienda_Ma"
													value="Apartamento">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-label">Rancho </label>
												<input class="form-check-input" type="radio" name="Tipo_Vivienda_Ma"
													value="Rancho">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-label">Quinta </label>
												<input class="form-check-input" type="radio" name="Tipo_Vivienda_Ma"
													value="Quinta">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-label">Habitación </label>
												<input class="form-check-input" type="radio" name="Tipo_Vivienda_Ma"
													value="Habitación">
											</div>
										</div>
									</div>


									<div class="row mb-4">
										<div class="col-12 col-lg-4">
											<label for="" class="form-label">Tenencia de la vivienda:</label>
										</div>
										<div class="col-12 col-lg-8">
											<div class="input-group">
												<select class="form-select" name="Tenencia_vivienda_Ma">
													<option selected disabled value="">Seleccione una opción</option>
													<option value="Propia">Propia</option>
													<option value="Alquilada">Alquilada</option>
													<option value="Prestada">Prestada</option>
													<option value="Otro">Otro</option>
												</select>
												<input class="form-control" type="text" name="Tenencia_vivienda_Ma_Otro"
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
												<input class="form-check-input" type="radio" name="Madre_Trabaja" value="Si">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-label">No </label>
												<input class="form-check-input" type="radio" name="Madre_Trabaja" value="No">
											</div>
										</div>
										<div class="col-12">
											<span class="form-text">En caso de marcar NO, se inhabilitaran los campos y se establecerá como desempleado.</span>
										</div>
									</div>

									<fieldset id="Laborales_Madre">
										<div class="row mb-4">
											<div class="col-12 col-lg-3">
												<label for="" class="form-label">Cargo que ocupa:</label>
											</div>
											<div class="col-12 col-lg-9">
												<input class="form-control mb-2" type="text" name="Empleo_Ma" id="Empleo_Ma"
												maxlength="60" minlength="3">
											</div>
										</div>


										<div class="row mb-4">
											<div class="col-12 col-lg-3">
												<label for="" class="form-label">Teléfono del trabajo:</label>
											</div>
											<div class="col-12 col-lg-9">
												<div class="input-group mb-2">
													<!--Prefijo-->
													<input class="form-control" type="text" name="Prefijo_Trabajo_Ma"
														id="Prefijo_Trabajo_Ma" list="prefijos" pattern="[0-9]+" maxlength="4"
														placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos">
													<!--Número-->
													<input class="form-control w-auto" type="tel" name="Teléfono_Trabajo_Ma"
														id="Teléfono_Trabajo_Ma" placeholder="Teléfono principal" pattern="[0-9]+"
														maxlength="7" minlength="7">
												</div>
											</div>
										</div>


										<div class="row mb-4">
											<div class="col-12 col-lg-3">
												<label for="" class="form-label">Lugar del trabajo:</label>
											</div>
											<div class="col-12 col-lg-9">
												<textarea class="form-control mb-2" name="Lugar_Trabajo_Ma" id="Lugar_Trabajo_Ma"
												maxlength="180" minlength="3"></textarea>
											</div>
										</div>

										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">Remuneración:</label>
											</div>
											<div class="col-12 col-lg-10">
												<div class="input-group mb-2">
													<!--Remuneración en base a sueldos minimos del madre-->
													<input class="form-control text-end" type="number" name="Remuneración_Ma"
														id="Remuneración_Ma" placeholder="Salarios mínimos" min="0" step="1">
													<!--Tipo de Remuneración del madre-->
													<select class="form-select" name="Tipo_Remuneración_Ma">
														<option value="Diaria">Remuneración diaria</option>
														<option value="Semanal">Remuneración semanal</option>
														<option value="Quincenal">Remuneración quincenal</option>
														<option value="Mensual">Remuneración mensual</option>
													</select>
												</div>
											</div>
										</div>
									</fieldset>
								</section>


								<!-- datos del representante -->
								<input type="hidden" name="Vinculo_R" value="<?php echo $_POST['Vinculo_R']?>">
								<input type="hidden" name="Primer_Nombre_R" value="<?php echo $_POST['Primer_Nombre_R']?>">
								<input type="hidden" name="Segundo_Nombre_R" value="<?php echo $_POST['Segundo_Nombre_R']?>">
								<input type="hidden" name="Primer_Apellido_R" value="<?php echo $_POST['Primer_Apellido_R']?>">
								<input type="hidden" name="Segundo_Apellido_R" value="<?php echo $_POST['Segundo_Apellido_R']?>">
								<input type="hidden" name="Género_R" value="<?php echo $_POST['Género_R']?>">
								<input type="hidden" name="Tipo_Cédula_R" value="<?php echo $_POST['Tipo_Cédula_R']?>">
								<input type="hidden" name="Cédula_R" value="<?php echo $_POST['Cédula_R']?>">
								<input type="hidden" name="Fecha_Nacimiento_R" value="<?php echo $_POST['Fecha_Nacimiento_R']?>">
								<input type="hidden" name="Lugar_Nacimiento_R" value="<?php echo $_POST['Lugar_Nacimiento_R']?>">
								<input type="hidden" name="Correo_electrónico_R" value="<?php echo $_POST['Correo_electrónico_R']?>">
								<input type="hidden" name="Estado_Civil_R" value="<?php echo $_POST['Estado_Civil_R']?>">
								<input type="hidden" name="Dirección_R" value="<?php echo $_POST['Dirección_R']?>">
								<input type="hidden" name="Prefijo_Principal_R" value="<?php echo $_POST['Prefijo_Principal_R']?>">
								<input type="hidden" name="Teléfono_Principal_R" value="<?php echo $_POST['Teléfono_Principal_R']?>">
								<input type="hidden" name="Prefijo_Secundario_R" value="<?php echo $_POST['Prefijo_Secundario_R']?>">
								<input type="hidden" name="Teléfono_Secundario_R" value="<?php echo $_POST['Teléfono_Secundario_R']?>">
								<input type="hidden" name="Prefijo_Auxiliar_R" value="<?php echo $_POST['Prefijo_Auxiliar_R']?>">
								<input type="hidden" name="Teléfono_Auxiliar_R" value="<?php echo $_POST['Teléfono_Auxiliar_R']?>">
								<input type="hidden" name="Grado_Instrucción_R" value="<?php echo $_POST['Grado_Instrucción_R']?>">
								<input type="hidden" name="Tiene_Carnet_Patria_R" value="<?php echo $_POST['Tiene_Carnet_Patria_R']?>">
								<input type="hidden" name="Código_Carnet_Patria_R" value="<?php echo $_POST['Código_Carnet_Patria_R']?>">
								<input type="hidden" name="Serial_Carnet_Patria_R" value="<?php echo $_POST['Serial_Carnet_Patria_R']?>">
								<input type="hidden" name="Condición_vivienda_R" value="<?php echo $_POST['Condición_vivienda_R']?>">
								<input type="hidden" name="Tipo_Vivienda_R" value="<?php echo $_POST['Tipo_Vivienda_R']?>">
								<input type="hidden" name="Tenencia_vivienda_R" value="<?php echo $_POST['Tenencia_vivienda_R']?>">
								<input type="hidden" name="Tenencia_vivienda_R_Otro" value="<?php echo $_POST['Tenencia_vivienda_R_Otro']?>">
								<input type="hidden" name="Banco" value="<?php echo $_POST['Banco']?>">
								<input type="hidden" name="Tipo_Cuenta" value="<?php echo $_POST['Tipo_Cuenta']?>">
								<input type="hidden" name="Nro_Cuenta" value="<?php echo $_POST['Nro_Cuenta']?>">
								<input type="hidden" name="Representante_Trabaja" value="<?php echo $_POST['Representante_Trabaja']?>">
								<input type="hidden" name="Empleo_R" value="<?php echo $_POST['Empleo_R']?>">
								<input type="hidden" name="Prefijo_Trabajo_R" value="<?php echo $_POST['Prefijo_Trabajo_R']?>">
								<input type="hidden" name="Teléfono_Trabajo_R" value="<?php echo $_POST['Teléfono_Trabajo_R']?>">
								<input type="hidden" name="Lugar_Trabajo_R" value="<?php echo $_POST['Lugar_Trabajo_R']?>">
								<input type="hidden" name="Remuneración_R" value="<?php echo $_POST['Remuneración_R']?>">
								<input type="hidden" name="Tipo_Remuneración_R" value="<?php echo $_POST['Tipo_Remuneración_R']?>">
								<input type="hidden" name="Primer_Nombre_Aux" value="<?php echo $_POST['Primer_Nombre_Aux']?>">
								<input type="hidden" name="Segundo_Nombre_Aux" value="<?php echo $_POST['Segundo_Nombre_Aux']?>">
								<input type="hidden" name="Primer_Apellido_Aux" value="<?php echo $_POST['Primer_Apellido_Aux']?>">
								<input type="hidden" name="Segundo_Apellido_Aux" value="<?php echo $_POST['Segundo_Apellido_Aux']?>">
								<input type="hidden" name="Prefijo_Principal_Aux" value="<?php echo $_POST['Prefijo_Principal_Aux']?>">
								<input type="hidden" name="Teléfono_Principal_Aux" value="<?php echo $_POST['Teléfono_Principal_Aux']?>">
								<input type="hidden" name="Relación_Auxiliar" value="<?php echo $_POST['Relación_Auxiliar']?>">
							</form>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<input type="hidden" name="orden" value="Insertar">
					<a class="btn btn-primary" href="../index.php">Volver al inicio</a>
					<button id="B_enviar_2" class="btn btn-primary" type="button">Guardar y continuar</button>
				</div>
			</div>
		</div>

		<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-fixed bottom-0"
			style="z-index: 100;">
			<span class="text-white">Sistema de inscripción L.B. G.P.F - <i class="far fa-copyright"></i>
				2022-<?php echo date("Y"); ?></span>
		</footer>
		<?php include '../../ayuda.php'; ?>
	</main>
	<script type="text/javascript" src="../../js/sweetalert2.js"></script>
	<script type="text/javascript" src="../../js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="../../js/validaciones-inscripcion.js"></script>
	<script type="text/javascript" src="../../js/validaciones-estudiante.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
</body>

</html>
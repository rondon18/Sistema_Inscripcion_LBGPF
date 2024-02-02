<?php 

	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../index.php');
		exit();
	}

	if (isset(
				$_POST['editar_padre'],
				$_POST['cedula'],
			)
		) {

			require('../../controladores/conexion.php');
			require('../../clases/bitacora.php');

			require('../../clases/antropometria_est.php');
			require('../../clases/carnet_patria.php');
			require('../../clases/condiciones_est.php');
			require('../../clases/contactos_aux.php');
			require('../../clases/datos_economicos.php');
			require('../../clases/datos_laborales.php');
			require('../../clases/datos_salud.php');
			require('../../clases/datos_sociales.php');
			require('../../clases/datos_vivienda.php');
			require('../../clases/direcciones.php');
			require('../../clases/estudiantes.php');
			require('../../clases/grado_a_cursar_est.php');
			require('../../clases/observaciones_est.php');
			require('../../clases/padres.php');
			require('../../clases/per_academico.php');
			require('../../clases/personas.php');
			require('../../clases/representantes.php');
			require('../../clases/tallas_est.php');
			require('../../clases/telefonos.php');
			require('../../clases/vac_covid19_est.php');
			require('../../clases/vacunas_est.php');

			$padres = new padres();
			$personas = new personas();
			$telefonos = new telefonos();

			// padre
			$padres->set_cedula_persona($_POST['cedula']);
			$_SESSION['datos_padre'] = $padres->consultar_padres();

			$telefonos->set_cedula_persona($_POST['cedula']);
			$_SESSION['tlfs_padre'] = $telefonos->consultar_telefonos();

			$_SESSION['parentezco'] = $_POST['rol'];

			$_SESSION['editar_registro'] = true;

		include("../editar_registro/funciones.php");

	}
	else {
		header("Location: ../index.php");
	}
?>

<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Editar padres</title>
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
						<b class="fs-5">Formulario de edición - Padres</b>
					</div>
					<div class="card-body">

						<div class="row">

							<!-- Selector de sección -->
							<div class="col-12 col-lg-3">
								<ul class="nav flex-lg-column nav-pills nav-fill mb-4 gap-2">
									<li class="nav-item">
										<span id="link1" class="nav-link active">Datos del padre</span>
									</li>
								</ul>
							</div>

							<!-- Contenedor del formulario -->
							<div class="col-12 col-lg-9 py-0" style="max-height: 60vh; overflow-y: auto;">
								<form id="formulario_padres" action="../../controladores/registros/editar/editar_padre.php" method="POST">

									<!--Datos del padre-->
									<section id="seccion1" class="row my-2">
										<div class="row mb-5">
											<div class="col-12">
												<span class="h5 mb-3">
													<i class="fa-solid fa-people-roof fa-xl me-2"></i>
													Datos del padre.
												</span>
											</div>
										</div>

										<?php if (dato_input("relacion_representante","de") != "Padre"): ?>
										<fieldset id="datos">
											<!-- Nombres -->
											<div class="row mb-4">
												<div class="col-12 col-lg-2">
													<label class="form-label requerido">Nombres:</label>
												</div>
												<!-- Primer nombre -->
												<div class="col-12 col-lg-5">
													<input
														id="primer_nombre"
														class="form-control mb-2"
														type="text"
														name="primer_nombre"
														placeholder="Primer nombre"
														value="<?php echo dato_input("p_nombre","dp");?>"
													>
												</div>
												<!-- Segundo nombre -->
												<div class="col-12 col-lg-5">
													<input
														id="segundo_nombre"
														class="form-control mb-2"
														type="text"
														name="segundo_nombre"
														placeholder="Segundo nombre"
														value="<?php echo dato_input("s_nombre","dp");?>"
													>
												</div>
											</div>


											<!-- Apellidos -->
											<div class="row mb-4">
												<div class="col-12 col-lg-2">
													<label class="form-label">Apellidos:</label>
												</div>
												<!-- Primer apellido -->
												<div class="col-12 col-lg-5">
													<input
														id="primer_apellido"
														class="form-control mb-2"
														type="text"
														name="primer_apellido"
														placeholder="Primer apellido"
														value="<?php echo dato_input("p_apellido","dp");?>"
													>
												</div>
												<!-- Segundo apellido -->
												<div class="col-12 col-lg-5">
													<input
														id="segundo_apellido"
														class="form-control mb-2"
														type="text"
														name="segundo_apellido"
														placeholder="Segundo apellido"
														value="<?php echo dato_input("s_apellido","dp");?>"
													>
												</div>
											</div>


											<!-- Cédula -->
											<div class="row mb-4">
												<div class="col-12 col-lg-2">
													<label class="form-label requerido">Cédula:</label>
												</div>

												<?php
													$nac = trim(dato_input("cedula","dp"),"0123456789");
													$nro_c = trim(dato_input("cedula","dp"),"VE");
												?>


												<!-- Nacionalidad -->
												<div class="col-12 col-lg-3">
													<select
														id="nacionalidad"
														class="form-select"
														name="nacionalidad"
														required
													>
														<option selected value="">Nacionalidad</option>
														<option value="V" <?php if ($nac == "V") {echo "selected";}?>>V</option>
														<option value="E" <?php if ($nac == "E") {echo "selected";}?>>E</option>
													</select>
												</div>

												<!-- Número de cédula -->
												<div class="col-12 col-lg-7">
													<input
														id="cedula"
														class="form-control"
														type="text"
														name="cedula"
														maxlength="8"
														minlength="3"
														placeholder="Número de cedula"
														required
														value="<?php echo $nro_c;?>"
													>
												</div>

												<input type="hidden" name="cedula_inicial" value="<?php echo dato_input("cedula","dp"); ?>">

											</div>


											<!-- Fecha y lugar de nacimiento -->
											<div class="row mb-4">
												<!-- Fecha de nacimiento -->
												<div class="col-12 col-lg-4">
													<label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
													<input
														id="fecha_nacimiento"
														class="form-control mb-2"
														type="date"
														name="fecha_nacimiento"
														min="<?php echo date('Y')-100 .'-01-01'?>"
														max="<?php echo date('Y')-18 .'-01-01'?>"
														value="<?php echo dato_input("fecha_nacimiento","dp");?>"
													>
												</div>
												<!-- Lugar de nacimiento -->
												<div class="col-12 col-lg-8">
													<label for="lugar_nacimiento" class="form-label">Lugar de nacimiento:</label>
													<input
														id="lugar_nacimiento"
														class="mb-2 form-control"
														type="text"
														name="lugar_nacimiento"
														maxlength="150"
														minlength="3"
														placeholder="Estado, ciudad"
														value="<?php echo dato_input("lugar_nacimiento","dp");?>"
													>
												</div>
											</div>

											<!-- Estado civil -->
											<div class="row mb-4">
												<div class="col-12 col-lg-5">
													<label for="estado_civil" class="form-label">Estado civil:</label>
												</div>
												<div class="col-12 col-lg-7">
													<select
														id="estado_civil"
														class="form-select"
														name="estado_civil"
													>
														<option selected value="">Seleccione una opción</option>
														<option <?php dato_option("Soltero(a)","estado_civil","s","dp");?> value="Soltero(a)">Soltero(a)</option>
														<option <?php dato_option("Casado(a)","estado_civil","s","dp");?> value="Casado(a)">Casado(a)</option>
														<option <?php dato_option("Divorciado(a)","estado_civil","s","dp");?> value="Divorciado(a)">Divorciado(a)</option>
														<option <?php dato_option("Viudo(a)","estado_civil","s","dp");?> value="Viudo(a)">Viudo(a)</option>
													</select>
												</div>
											</div>

											<!-- Grado de instrucción -->
											<div class="row mb-4">
												<div class="col-12 col-lg-5">
													<label class="form-label">Grado de instrucción:</label>
												</div>
												<div class="col-12 col-lg-7">
													<div class="form-check form-check-inline">
														<input
															id="grado_instruccion_p"
															class="form-check-input"
															type="radio"
															name="grado_instruccion"
															value="Primaria"
															<?php dato_option("Primaria","grado_academico","rc","dp");?>
														>
														<label for="grado_instruccion_p" class="form-label">Primaria</label>
													</div>
													<div class="form-check form-check-inline">
														<input
															id="grado_instruccion_p_b"
															class="form-check-input"
															type="radio"
															name="grado_instruccion"
															value="Bachillerato"
															<?php dato_option("Bachillerato","grado_academico","rc","dp");?>
														>
														<label for="grado_instruccion_p_b" class="form-label">Bachillerato</label>
													</div>
													<div class="form-check form-check-inline">
														<input
															id="grado_instruccion_p_u"
															class="form-check-input"
															type="radio"
															name="grado_instruccion"
															value="Universitario"
															<?php dato_option("Universitario","grado_academico","rc","dp");?>
														>
														<label for="grado_instruccion_p_u" class="form-label">Universitario</label>
													</div>
												</div>
											</div>

											<div class="row mt-5 mb-4">
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
													<label for="correo_electronico" class="form-label">Correo electrónico:</label>
												</div>
												<div class="col-12 col-lg-9">
													<input
														id="correo_electronico"
														class="form-control"
														type="email"
														name="correo_electronico"
														placeholder="correo_ejemplo@dominio.com"
														value="<?php echo dato_input("email","dp");?>"
													>
												</div>
											</div>

											<!-- Teléfonos -->
											<div class="row">
												<div class="col-12 col-lg-12">
													<label class="form-label mb-3">Números de teléfono:</label>
												</div>
											</div>
											<div class="row">
												<!-- Teléfono principal -->
												<div class="col-12 col-lg-2 mb-2">
													<label class="form-label">Principal:</label>
												</div>
												<div class="col-12 col-lg-3 mb-2">
													<input
														id="prefijo_principal"
														class="form-control form-control-sm"
														type="text"
														name="prefijo_principal"
														list="prefijos"
														maxlength="4"
														placeholder="Prefijo"
														value="<?php echo $_SESSION['tlfs_padre'][0]["prefijo"];?>"
													>
												</div>
												<div class="col-12 col-lg-7 mb-2">
													<input
														id="telefono_principal"
														class="form-control form-control-sm"
														type="tel"
														name="telefono_principal"
														placeholder="Número"
														maxlength="12"
														minlength="7"
														value="<?php echo $_SESSION['tlfs_padre'][0]["numero"];?>"
													>
												</div>
											</div>
											<div class="row">
												<!-- Teléfono secundario -->
												<div class="col-12 col-lg-2 mb-2">
													<label class="form-label">Secundario:</label>
												</div>
												<div class="col-12 col-lg-3 mb-2">
													<input
														id="prefijo_secundario"
														class="form-control form-control-sm"
														type="text"
														name="prefijo_secundario"
														list="prefijos"
														maxlength="4"
														placeholder="Prefijo"
														value="<?php echo $_SESSION['tlfs_padre'][1]["prefijo"];?>"
													>
												</div>
												<div class="col-12 col-lg-7 mb-2">
													<input
														id="telefono_secundario"
														class="form-control form-control-sm"
														type="tel"
														name="telefono_secundario"
														placeholder="Número"
														maxlength="12"
														minlength="7"
														value="<?php echo $_SESSION['tlfs_padre'][1]["numero"];?>"
													>
												</div>
											</div>


											<div class="row mt-5 my-4">
												<div class="col-12">
													<span class="h5 mb-3">
														<i class="fa-solid fa-house fa-xl me-2"></i>
														Datos de vivienda.
													</span>
												</div>
											</div>

											<div class="row mb-4">
												<div class="col-12 col-lg-12">
													<label for="direccion" class="form-label">Dirección de residencia:</label>
													<textarea
														id="direccion"
														class="form-control mb-2"
														name="direccion"
														rows="2"
														maxlength="180"
														style="resize:none;"
													><?php echo dato_input("punto_referencia","dp");?></textarea>
												</div>
											</div>


											<div class="row mb-4">
												<div class="col-12 col-lg-4">
													<label class="form-label">¿Se encuentra en el país?:</label>
												</div>
												<div class="col-12 col-lg-4">
													<select
														id="reside_en_el_pais"
														class="form-select"
														name="reside_en_el_pais"
													>
														<option selected value="">Seleccione una opción</option>
														<option <?php if ($_SESSION["datos_padre"]["pais_residencia"] == "No conocido" or empty($_SESSION["datos_padre"]["pais_residencia"])) {echo "selected";}?> value="NC">Desconoce</option>
														<option <?php if ($_SESSION["datos_padre"]["pais_residencia"] == "Venezuela") {echo "selected";}?> value="Si">Si</option>
														<option
															<?php
																if ($_SESSION["datos_padre"]["pais_residencia"] != "No conocido" and $_SESSION["datos_padre"]["pais_residencia"] != "Venezuela" and !empty($_SESSION["datos_padre"]["pais_residencia"])) {
																	echo "selected";
																}
															?>
															value="No"
														>No</option>
													</select>
												</div>
												<div class="col-12 col-lg-4">
													<!-- Lista de países latinoamericanos como sugerencias al especificar el país -->
													<datalist id="paises">
														<option value="Antigua y Barbuda">
														<option value="Argentina">
														<option value="Aruba">
														<option value="Bahamas">
														<option value="Barbados">
														<option value="Belice">
														<option value="Bolivia">
														<option value="Brasil">
														<option value="Chile">
														<option value="Colombia">
														<option value="Costa Rica">
														<option value="Cuba">
														<option value="Dominica">
														<option value="Ecuador">
														<option value="El Salvador">
														<option value="Grenada">
														<option value="Guadalupe">
														<option value="Guatemala">
														<option value="Guyana">
														<option value="Guyana Francesa">
														<option value="Haití">
														<option value="Honduras">
														<option value="Islas Caimán">
														<option value="Islas Turcas y Caicos">
														<option value="Islas Vírgenes">
														<option value="Jamaica">
														<option value="Martinica">
														<option value="México">
														<option value="Nicaragua">
														<option value="Panamá">
														<option value="Paraguay">
														<option value="Perú">
														<option value="Puerto Rico">
														<option value="República Dominicana">
														<option value="San Bartolomé">
														<option value="San Cristóbal y Nieves">
														<option value="San Vicente y las Granadinas">
														<option value="Santa Lucía">
														<option value="Suriname">
														<option value="Trinidad y Tobago">
														<option value="Uruguay">
													</datalist>

													<input
														id="pais"
														class="form-control"
														type="text"
														name="pais"
														placeholder="¿En que pais?"
														list="paises"
														required
														<?php if (
															$_SESSION["datos_padre"]["pais_residencia"] != "No conocido" and
															$_SESSION["datos_padre"]["pais_residencia"] != "Venezuela"): ?>
														value="<?php echo dato_input("pais_residencia","dp");?>"
														<?php else: ?>
														disabled
														<?php endif ?>
													>
												</div>
											</div>
											<div class="row mb-4">
												<div class="col-12">
													<span class="form-text">En caso de indicar que está fuera del país, debe especificar en que país se encuentra</span>
												</div>
											</div>

											<!-- Condiciones de la vivienda -->
											<div class="row mb-4">
												<div class="col-12 col-lg-5">
													<label class="form-label">Condiciones de la vivienda:</label>
												</div>
												<div class="col-12 col-lg-7">
													<!-- Condición Buena -->
													<div class="form-check form-check-inline">
														<label for="cond_v_p_buenas" class="form-label">Buena </label>
														<input
															id="cond_v_p_buenas"
															class="form-check-input"
															type="radio"
															name="condicion_vivienda"
															value="Buena"
															<?php dato_option("Buena","condicion","rc","dp");?>
														>
													</div>
													<!-- Condición Regular -->
													<div class="form-check form-check-inline">
														<label for="cond_v_p_regular" class="form-label">Regular </label>
														<input
															id="cond_v_p_regular"
															class="form-check-input"
															type="radio"
															name="condicion_vivienda"
															value="Regular"
															<?php dato_option("Regular","condicion","rc","dp");?>
														>
													</div>
													<!-- Condición Mala -->
													<div class="form-check form-check-inline">
														<label for="cond_v_p_mala" class="form-label">Mala </label>
														<input
															id="cond_v_p_mala"
															class="form-check-input"
															type="radio"
															name="condicion_vivienda"
															value="Mala"
															<?php dato_option("Mala","condicion","rc","dp");?>
														>
													</div>
													<label id="condicion_vivienda_p-error" class="error w-100" style="display:none;" for="condicion_vivienda"></label>
												</div>
											</div>


											<!-- Tipo de vivienda -->
											<div class="row mb-4">
												<div class="col-12 col-lg-3">
													<label class="form-label">Tipo de vivienda:</label>
												</div>
												<div class="col-12 col-lg-9">
													<!-- Caso: Casa -->
													<div class="form-check form-check-inline">
														<label for="v_p_casa" class="form-label">Casa </label>
														<input
															id="v_p_casa"
															class="form-check-input"
															type="radio"
															name="tipo_vivienda"
															value="Casa"
															<?php dato_option("Casa","tipo","rc","dp");?>
														>
													</div>
													<!-- Caso: Apartamento -->
													<div class="form-check form-check-inline">
														<label for="v_p_apart" class="form-label">Apartamento </label>
														<input
															id="v_p_apart"
															class="form-check-input"
															type="radio"
															name="tipo_vivienda"
															value="Apartamento"
															<?php dato_option("Apartamento","tipo","rc","dp");?>
														>
													</div>
													<!-- Caso: Rancho -->
													<div class="form-check form-check-inline">
														<label for="v_p_rancho" class="form-label">Rancho </label>
														<input
															id="v_p_rancho"
															class="form-check-input"
															type="radio"
															name="tipo_vivienda"
															value="Rancho"
															<?php dato_option("Rancho","tipo","rc","dp");?>
														>
													</div>
													<!-- Caso: Quinta -->
													<div class="form-check form-check-inline">
														<label for="v_p_quinta" class="form-label">Quinta </label>
														<input
															id="v_p_quinta"
															class="form-check-input"
															type="radio"
															name="tipo_vivienda"
															value="Quinta"
															<?php dato_option("Quinta","tipo","rc","dp");?>
														>
													</div>
													<!-- Caso: Habitación -->
													<div class="form-check form-check-inline">
														<label for="v_p_hab" class="form-label">Habitación </label>
														<input
															id="v_p_hab"
															class="form-check-input"
															type="radio"
															name="tipo_vivienda"
															value="Habitacion"
															<?php dato_option("Habitacion","tipo","rc","dp");?>
														>
													</div>
													<label id="tipo_vivienda_p-error" class="error w-100" style="display:none;" for="tipo_vivienda"></label>
												</div>
											</div>

											<!-- Tenencia de la vivienda -->
											<div class="row mb-4">
												<div class="col-12 col-lg-4">
													<label class="form-label">Tenencia de la vivienda:</label>
												</div>
												<div class="col-12 col-lg-4">
													<!-- Tenencia de vivienda -->
													<select
														id="tenencia_vivienda"
														class="form-select"
														name="tenencia_vivienda"
													>
														<option selected value="">Seleccione una opción</option>
														<option <?php dato_option("NC","tenencia","s","dp");?> value="NC">Desconoce</option>
														<option <?php dato_option("Propia","tenencia","s","dp");?> value="Propia">Propia</option>
														<option <?php dato_option("Alquilada","tenencia","s","dp");?> value="Alquilada">Alquilada</option>
														<option <?php dato_option("Prestada","tenencia","s","dp");?> value="Prestada">Prestada</option>
														<option <?php dato_option("Otro","tenencia","s","dp");?> value="Otro">Otro</option>
													</select>
												</div>
												<div class="col-12 col-lg-4">
													<!-- Tenencia - Otra -->
													<input
														id="tenencia_vivienda_p_otro"
														class="form-control"
														type="text"
														name="tenencia_vivienda_p_otro"
														maxlength="12"
														minlength="3"
														placeholder="En caso de ser otro, especifique"
														required
														<?php if (dato_input("tenencia","dp") == "Otro"): ?>
														value="<?php echo dato_input("tenencia","dp");?>"
														<?php else: ?>
														disabled
														<?php endif ?>
													>
												</div>
											</div>


											<!-- Datos laborales -->
											<div class="row mt-5 mb-4">
												<div class="col-12 col-lg-12">
													<span class="h5">
														<i class="fa-solid fa-briefcase fa-xl me-2"></i>
														Datos laborales
													</span>
												</div>
											</div>


											<!-- Padre trabaja -->
											<div class="row mb-4">
												<div class="col-12 col-lg-auto">
													<label class="form-label requerido">Trabaja:</label>
												</div>
												<div class="col-12 col-lg-auto">
													<!-- Caso: Si -->
													<div class="form-check form-check-inline">
														<label for="p_trabaja_s" class="form-label">Si </label>
														<input
															id="p_trabaja_s"
															class="form-check-input"
															type="radio"
															name="padre_trabaja"
															value="Si"
															required
															<?php if (!empty($_SESSION["datos_padre"]["empleo"])) {echo "checked";};?>
														>
													</div>
													<!-- Caso: No -->
													<div class="form-check form-check-inline">
														<label for="p_trabaja_n" class="form-label">No </label>
														<input
															id="p_trabaja_n"
															class="form-check-input"
															type="radio"
															name="padre_trabaja"
															value="No"
															required
															<?php if (empty($_SESSION["datos_padre"]["empleo"])) {echo "checked";};?>
														>
													</div>
													<label id="padre_trabaja-error" class="error w-100" style="display:none;" for="padre_trabaja"></label>
												</div>
												<!-- Información adicional -->
												<span class="form-text">
													-En caso de marcar <b>No</b>, se establecerá como desempleado.
													<br>
													-De no saber si trabaja, marcar <b>No</b>.</span>
											</div>


											<!-- Campos si el padre trabaja -->
											<fieldset id="datos_trabajo" <?php if (empty($_SESSION["datos_padre"]["empleo"])) {echo 'disabled style="display: none;"';};?>>

												<!-- Cargo que ocupa -->
												<div class="row mb-4">
													<div class="col-12 col-lg-3">
														<label class="form-label requerido">Cargo que ocupa:</label>
													</div>
													<div class="col-12 col-lg-9">
														<input
															id="empleo"
															class="mb-2 form-control"
															type="text"
															name="empleo"
															maxlength="60"
															minlength="3"
															required
															value="<?php echo dato_input("empleo","dp");?>"
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
															id="prefijo_trabajo"
															class="form-control form-control-sm"
															type="text"
															name="prefijo_trabajo"
															list="prefijos"
															maxlength="4"
															placeholder="Prefijo"
															value="<?php echo $_SESSION['tlfs_padre'][2]["prefijo"];?>"
														>
													</div>
													<div class="col-12 col-lg-6">
														<input
															id="telefono_trabajo"
															class="form-control form-control-sm"
															type="tel"
															name="telefono_trabajo"
															placeholder="Número"
															maxlength="12"
															minlength="7"
															value="<?php echo $_SESSION['tlfs_padre'][2]["numero"];?>"
														>
													</div>
													<!-- Información adicional -->
													<span class="form-text">En el caso de teléfonos extranjeros, ingresar el código en el campo de prefijo rellenando con ceros a la izquierda. Ejemplo: 0052 (México)</span>
												</div>


												<!-- Lugar del trabajo -->
												<div class="row mb-4">
													<div class="col-12 col-lg-12">
														<label class="form-label">Lugar del trabajo:</label>
														<textarea
															id="lugar_trabajo"
															class="mb-2 form-control"
															name="lugar_trabajo"
															rows="2"
															maxlength="180"
															minlength="3"
															style="resize: none;"
														><?php echo dato_input("lugar_trabajo","dp");?></textarea>
													</div>
												</div>


												<!-- Remuneración y tipo -->
												<div class="row mb-4">
													<div class="col-12 col-lg-6">
														<!-- Cantidad de sueldos mínimos como remuneración -->
														<label class="form-label">Remuneración:</label>
														<input
															id="remuneracion"
															class="mb-2 form-control text-end"
															type="number"
															name="remuneracion"
															placeholder="Ingrese un numero..."
															min="0"
															step="0.5"
															value="<?php echo dato_input("remuneracion","dp");?>"
														>
														<label id="remuneracion_r-error" class="error w-100" style="display:none;" for="remuneracion"></label>
														<!-- Información adicional -->
														<span class="form-text">Remuneración aproximada en sueldos mínimos.</span>
													</div>
													<!-- Tipo de remuneración -->
													<div class="col-12 col-lg-6">
														<label class="form-label">Tipo de remuneración:</label>
														<select
															id="tipo_remuneracion"
															class="form-select"
															name="tipo_remuneracion"
														>
															<option value="" selected>Frecuencia de la remuneración</option>
															<option <?php dato_option("Diaria","tipo_remuneracion","s","dp");?> value="Diaria">Diaria</option>
															<option <?php dato_option("Semanal","tipo_remuneracion","s","dp");?> value="Semanal">Semanal</option>
															<option <?php dato_option("Quincenal","tipo_remuneracion","s","dp");?> value="Quincenal">Quincenal</option>
															<option <?php dato_option("Mensual","tipo_remuneracion","s","dp");?> value="Mensual">Mensual</option>
														</select>
													</div>
												</div>
											</fieldset>

										</fieldset>
										<?php endif ?>
									</section>
									<input type="hidden" name="rol" value="<?php echo $_SESSION['parentezco']; ?>">
								</form>
							</div>
						</div>
					</div>
					<div class="card-footer nav justify-content-md-between">
						<a class="btn btn-primary d-inline-block" href="../consultar/index.php?sec=pad">
							<i class="fa-solid fa-lg me-2 fa-home"></i>
							Volver al inicio
						</a>
						<div class="ms-auto">
							<button id="boton_guardar" class="btn btn-primary" type="button">
								Guardar y continuar
								<i class="fa-solid fa-lg ms-2 fa-floppy-disk"></i>
							</button>
						</div>
					</div>
				</div>

			</div>
			<?php include('../../footer.php');?>
			<?php include('../../ayuda.php');?>
		</main>
		<script type="text/javascript" src="../../js/sweetalert2.js"></script>
		<script type="text/javascript" src="../../js/jquery-3.7.1.min.js"></script>
		<script type="text/javascript" src="../../js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="../../js/validaciones/additional-methods.min.js"></script>
		<script type="text/javascript" src="../../js/messages_es.min.js"></script>
		<script type="text/javascript" src="../../js/validaciones/validaciones_editar_padre.js"></script>
		<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="../../js/logout_inactividad.js"></script>
	</body>
</html>
<?php

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

if (!isset($_POST['Datos_Representante'])) {
	header('Location: paso-1.php');
}

require('../../clases/personas.php');
require('../../clases/Estudiante.php');
require('../../clases/representantes.php');
require('../../clases/carnet-patria.php');
require('../../clases/económicos-representantes.php');
require('../../clases/laborales.php');
require('../../clases/laborales-madres.php');
require('../../clases/laborales-padres.php');
require('../../clases/Padre.php');
require('../../clases/madre.php');
require('../../clases/ficha-médica.php');
require('../../clases/sociales-Estudiantes.php');
require('../../clases/tallas-Estudiantes.php');
require('../../clases/observaciones-estudiantes.php');
require('../../clases/grado.php');
require('../../clases/vivienda.php');
require('../../clases/vivienda-madres.php');
require('../../clases/vivienda-padres.php');
require('../../clases/contactos-auxiliares.php');
require('../../clases/año-escolar.php');
require('../../clases/Estudiantes-repitentes.php');
require('../../clases/teléfonos.php');

require('../../controladores/conexion.php');

require('../../clases/bitácora.php');

$conexion = conectarBD();


$Estudiante = new Estudiantes();
$CarnetPatria = new CarnetPatria();
$Representante = new Representantes();
$Economicos = new DatosEconómicos();
$Laborales = new DatosLaborales();
$Laborales_Pa = new DatosLaboralesPadres();
$Laborales_Ma = new DatosLaboralesMadres();
$Padre = new Padre();
$Madre = new Madre();
$Estudiantes_repitente = new EstudiantesRepitentes();
$Grado = new GradoAcadémico();
$Año = new Año_Escolar();
$Telefonos = new Teléfonos();

$datos_Médicos = new FichaMédica();
$Datos_sociales = new DatosSociales();
$Datos_Tallas = new TallasEstudiante();
$Observaciones = new Observaciones();

$Datos_vivienda = new DatosVivienda();
$Datos_vivienda_Ma = new DatosViviendaMa();
$Datos_vivienda_Pa = new DatosViviendaPa();
$Datos_Auxiliar = new ContactoAuxiliar();

#Hacer algo parecido para llamar numeros de representantes y Padre
$Estudiante = $Estudiante->consultarEstudiante($_POST['Cédula_Estudiante']);
$padre = $Padre->consultarPadre($_POST['id_padre']);
$madre = $Madre->consultarMadre($_POST['id_madre']);

$carnetpatria_Est = $CarnetPatria->consultarCarnetPatria($_POST['Cédula_Estudiante']);

$Estudiantes_repitente = $Estudiantes_repitente->consultarEstudiantesRepitentes($_POST['id_Estudiante']);
$grado = $Grado->consultarGrado($_POST['id_Estudiante']);
$telefonos_Est = $Telefonos->consultarTeléfonos($_POST['Cédula_Estudiante']);
$telefonos_re = $Telefonos->consultarTeléfonosRepresentanteID($_POST['id_representante']);
$telefonos_pa = $Telefonos->consultarTeléfonosPadreID($_POST['id_padre']);
$telefonos_ma = $Telefonos->consultarTeléfonosMadreID($_POST['id_madre']);

$datos_Médicos = $datos_Médicos->consultarFicha_Médica($_POST['id_Estudiante']);
$datos_sociales = $Datos_sociales->consultarDatosSociales($_POST['id_Estudiante']);
$datos_tallas = $Datos_Tallas->consultarTallasEstudiante($_POST['id_Estudiante']);
$datos_observaciones = $Observaciones->consultarObservaciones($_POST['id_Estudiante']);


$datos_vivienda = $Datos_vivienda->consultarDatosvivienda_R($_POST['id_representante']);
$datos_vivienda_ma = $Datos_vivienda_Ma->consultarDatosvivienda_Ma($_POST['id_madre']);
$datos_vivienda_pa = $Datos_vivienda_Pa->consultarDatosvivienda_Pa($_POST['id_padre']);

$datos_representante = $Representante->consultarRepresentanteID($_POST['id_representante']);

$datos_auxiliar = $Datos_Auxiliar->consultarContactoAuxiliar($_POST['id_representante'],$_POST['id_Estudiante']);

$datos_economicos = $Economicos->consultarDatosEconómicos($_POST['id_representante']);
$datos_laborales = $Laborales->consultarDatosLaborales($_POST['id_representante']);
$datos_laborales_ma = $Laborales_Ma->consultarDatosLaborales_Ma($_POST['id_madre']);
$datos_laborales_pa = $Laborales_Pa->consultarDatosLaborales_Pa($_POST['id_padre']);

$carnetpatria_pa = $CarnetPatria->consultarCarnetPatria($datos_representante['Cédula']);
$hijos_pa = $Padre->consultarHijos($_POST['id_padre']);
$hijos_ma = $Madre->consultarHijosMa($_POST['id_madre']);

$fecha_actual = date("Y-m-d");
$fecha_nacimiento_est = $Estudiante['Fecha_Nacimiento'];
$fecha_nacimiento_re = $datos_representante['Fecha_Nacimiento'];
$fecha_nacimiento_pa = $padre['Fecha_Nacimiento'];
$fecha_nacimiento_ma = $madre['Fecha_Nacimiento'];
$edad_diff_est = date_diff(date_create($fecha_nacimiento_est), date_create($fecha_actual));
$edad_diff_re = date_diff(date_create($fecha_nacimiento_re), date_create($fecha_actual));
$edad_diff_pa = date_diff(date_create($fecha_nacimiento_pa), date_create($fecha_actual));
$edad_diff_ma = date_diff(date_create($fecha_nacimiento_ma), date_create($fecha_actual));


function condiciones($condicion_b,$datos_Médicos) {
	if (!empty($datos_Médicos)) {
		$condiciones = explode(", ",$datos_Médicos);
		foreach ($condiciones as $condicion) {
			if ($condicion == $condicion_b) {
				echo "checked";
			}
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar datos de estudiante</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/colores.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/all.min.css"/>
	<link rel="icon" type="img/png" href="../../img/distintivo-LGPF.png">
</head>
<style type="text/css">
	input:invalid , select:invalid , textarea:invalid {
		border: red 2px solid !important;
	}
	input[required=""], select[required=""], textarea[required=""] {
		border: yellowgreen 2px solid ;
	}	

	input:valid, select:valid {
		border: green 2px solid !important;
	}
</style>
<body>
	<!--Banner-->
	<header class="w-100 bg-white d-flex justify-content-between shadow p-1 position-fixed top-0" style="z-index:1000;">
		<div>
			<img src="../../img/banner-gobierno.png" alt=""  height="42" class="d-inline-block align-text-top">
			<img src="../../img/banner-MPPE.png" alt=""  height="42" class="d-inline-block align-text-top">
		</div>
		<img src="../../img/banner-LGPF.png" alt=""  height="42" class="d-inline-block align-text-top">
	</header>
	<form id="FormularioEstudiante" class="card" action="../../controladores/control-registros.php" method="POST" onsubmit="enviar();" style="max-width: 600px; margin: 74px auto;">
			<div class="card-header py-3">
				<h3>Formulario de registro estudiante y padres.</h3>
			</div>
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a id="link1" class="nav-link active" href="#" onclick="seccion('seccion1')">Datos del estudiante</a>
				</li>
				<li class="nav-item">
					<a id="link2" class="nav-link" href="#" onclick="seccion('seccion2')">Datos Sociales</a>
				</li>
				<li class="nav-item">
					<a id="link3" class="nav-link" href="#" onclick="seccion('seccion3')">Datos de salud</a>
				</li>
				<li class="nav-item">
					<a id="link5" class="nav-link" href="#" onclick="seccion('seccion5')">Observaciones</a>
				</li>
				<li class="nav-item">
					<a id="link4" class="nav-link" href="#" onclick="seccion('seccion4')">Datos Padre</a>
				</li>
				<li class="nav-item">
					<a id="link6" class="nav-link" href="#" onclick="seccion('seccion6')">Datos Madre</a>
				</li>
			</ul>
			<div class="card-body">
				<section id="seccion1">
					<h5 class="mb-3"><i class="fas fa-address-card fa-xl"></i> Datos personales.</h5>
					<div>
						<div>
							<label class="form-label">Nombres: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<div class="input-group">
								<input class="form-control mb-2" type="text" name="Primer_Nombre_Est" id="Primer_Nombre_Est" placeholder="Primer nombre" required value="<?php echo $Estudiante['Primer_Nombre'] ?>">
								<input class="form-control mb-2" type="text" name="Segundo_Nombre_Est" id="Segundo_Nombre_Est" placeholder="Segundo nombre" required value="<?php echo $Estudiante['Segundo_Nombre'] ?>">
							</div>
						</div>
						<div>
							<label class="form-label">Apellidos: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<div class="input-group">
								<input class="form-control mb-2" type="text" name="Primer_Apellido_Est" id="Primer_Apellido_Est" placeholder="Primer apellido" value="<?php echo $Estudiante['Primer_Apellido'] ?>">
								<input class="form-control mb-2" type="text" name="Segundo_Apellido_Est" id="Segundo_Apellido_Est" placeholder="Segundo apellido" value="<?php echo $Estudiante['Segundo_Apellido'] ?>">
							</div>
						</div>
						<div>
							<label class="form-label">Cédula:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<?php
							#Separa la cédula del caracter que indica si es venezolana o extranjera
							$tipo_Cédula = substr($Estudiante['Cédula'],0,1);
							$Cédula			= substr($Estudiante['Cédula'],1,strlen($Estudiante['Cédula'])-1);
						 	?>
							<div class="input-group mb-2">
								<select class="form-select" id="Tipo_Cédula_R" name="Tipo_Cédula_Est" required>
									<option selected disabled value="">Tipo de cédula</option>
									<option <?php if($tipo_Cédula == "V"){echo "selected";} ?> value="V">V</option>
									<option <?php if($tipo_Cédula == "E"){echo "selected";} ?> value="E">E</option>
								</select>
								<input type="text" class="form-control w-auto" name="Cédula_Est" id="Cédula_Est" maxlength="8" required value="<?php echo $Cédula; ?>">
							</div>
						</div>
						<div>
							<p class="form-label">Género: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></p>
							<div class="pt-2 px-2 pb-0 mb-2 bg-light border rounded mb-1">
								<div class="form-check form-check-inline">
									<input class="form-check-input" class="form-check-input" type="radio" name="Género_Est" value="F" required <?php if($Estudiante['Género'] == "F"){echo "checked";} ?>>
									<label class="form-label">F</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" class="form-check-input" type="radio" name="Género_Est" value="M" required <?php if($Estudiante['Género'] == "M"){echo "checked";} ?>>
									<label class="form-label">M</label>
								</div>
							</div>
						</div>
						<div>
							<label class="form-label">Fecha de nacimiento: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>

							<input class="form-control mb-2" type="date" name="Fecha_Nacimiento_Est" id="Fecha_Nacimiento_Est" min="<?php echo date('Y')-19 .'-01-01'?>" max="<?php echo date('Y')-10 .'-01-01'?>" title="Debe tener al menos 12 años." required value="<?php echo $Estudiante['Fecha_Nacimiento'] ?>">
						</div>
						<div>
							<label class="form-label">Lugar de nacimiento: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<input class="form-control mb-2" type="text" name="Lugar_Nacimiento_Est" id="Lugar_Nacimiento_Est" required value="<?php echo $Estudiante['Lugar_Nacimiento'] ?>">
						</div>
						<div>
							<label class="form-label">Correo electrónico: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<input class="form-control mb-2" type="text" name="Correo_electrónico_Est" id="Correo_electrónico_Est" required value="<?php echo $Estudiante['Correo_Electrónico'] ?>">
						</div>
						<div>
							<div>
								<datalist id="prefijos-estudiante">
									<!--Moviles-->
									<option value="0416">
									<option value="0426">
									<option value="0414">
									<option value="0412">
								</datalist>

								<label>Teléfonos: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>

								<!--Teléfono principal-->
								<div class="input-group mb-2">
									<!--Prefijo-->
									<input class="form-control" type="text" name="Prefijo_Principal_Est" id="Prefijo_Principal_Est" list="prefijos-estudiante" minlength="4" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos" required value="<?php echo $telefonos_Est[0]['Prefijo'] ?>">
									<!--Número-->
									<input class="form-control w-auto" type="tel" name="Teléfono_Principal_Est" id="Teléfono_Principal_Est" minlength="7" maxlength="7" placeholder="Teléfono principal" required value="<?php echo $telefonos_Est[0]['Número_Telefónico'] ?>">
								</div>

								<!--Teléfono secundario-->
								<div class="input-group mb-2">
									<!--Prefijo-->
									<input class="form-control" type="text" name="Prefijo_Secundario_Est" id="Prefijo_Secundario_Est" list="prefijos-estudiante" minlength="4" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos" required value="<?php echo $telefonos_Est[1]['Prefijo'] ?>">
									<!--Número-->
									<input class="form-control w-auto" type="tel" name="Teléfono_Secundario_Est" id="Teléfono_Secundario_Est" minlength="7" maxlength="7" placeholder="Teléfono secundario" required value="<?php echo $telefonos_Est[1]['Número_Telefónico'] ?>">
								</div>
							</div>
						</div>
						<div>
							<label class="form-label">Año a cursar: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<select class="form-select mb-2" name="Grado_A_Cursar" required>
								<option selected disabled value="">Seleccione una opción</option>
								<option <?php if($grado['Grado_A_Cursar'] == "Primer año"){echo "selected";} ?> value="Primer año">Primer año</option>
								<option <?php if($grado['Grado_A_Cursar'] == "Segundo año"){echo "selected";} ?> value="Segundo año">Segundo año</option>
								<option <?php if($grado['Grado_A_Cursar'] == "Tercer año"){echo "selected";} ?> value="Tercer año">Tercer año</option>
								<option <?php if($grado['Grado_A_Cursar'] == "Cuarto año"){echo "selected";} ?> value="Cuarto año">Cuarto año</option>
								<option <?php if($grado['Grado_A_Cursar'] == "Quinto año"){echo "selected";} ?> value="Quinto año">Quinto año</option>
							</select>
						</div>

						<div>
							<p class="form-label">¿El estudiante es repitente?: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></p>
							<div class="input-group mb-2">
								<select class="form-select" name="Estudiante_Repitente" required>
									<option selected disabled value="">Seleccione una opción</option>
									<option value="Si" <?php if(!empty($Estudiantes_repitente['Que_Materias_Repite']) and !empty($Estudiantes_repitente['Año_Repetido'])){echo "selected";} ?>>Si</option>
									<option value="No" <?php if(empty($Estudiantes_repitente['Que_Materias_Repite']) and empty($Estudiantes_repitente['Año_Repetido'])){echo "selected";} ?>>No</option>
								</select>
							<input class="form-control w-auto" type="text" name="Materias_Repitente" id="Materias_Repitente" placeholder="¿Cuáles materias?" value="<?php echo $Estudiantes_repitente['Que_Materias_Repite'] ?>">
								<input class="form-control w-auto" type="text" name="Año_Repitente" id="Año_Repitente" list="grados" placeholder="¿Qué año repite?" value="<?php echo $Estudiantes_repitente['Año_Repetido'] ?>">
								<datalist id="grados">
								  <option value="Primer año"></option>
								  <option value="Segundo año"></option>
								  <option value="Tercer año"></option>
								  <option value="Cuarto año"></option>
								  <option value="Quinto año"></option>
								</datalist>
							</div>
						</div>
						<div>
							<p class="form-label">¿Tiene materias pendientes? <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></p>
							<div class="input-group mb-2">
								<select class="form-select" name="Tiene_Materias_Pendientes" required>
									<option selected disabled value="">Seleccione una opción</option>
									<option value="Si" <?php if(!empty($Estudiantes_repitente['Materias_Pendientes'])){echo "selected";} ?>>Si</option>
									<option value="No" <?php if(empty($Estudiantes_repitente['Materias_Pendientes'])){echo "selected";} ?>>No</option>
								</select>
								<input id="Materias_Pendientes" class="form-control w-auto" type="text" name="Materias_Pendientes" placeholder="¿Cuáles?" value="<?php echo $Estudiantes_repitente['Materias_Pendientes']?>">
							</div>
						</div>
						<div>
							<label class="form-label">Plantel de procedencia: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<textarea class="form-control mb-2" name="Plantel_Procedencia" id="Plantel_Procedencia" required><?php echo $Estudiante['Plantel_Procedencia']; ?></textarea>
						</div>
					</div>
				</section>
				<section id="seccion2" style="display:none;">
					<!--Datos sociales-->
					<h5 class="mb-3"><i class="fa-solid fa-users fa-xl"></i> Datos sociales.</h5>
					<div>
						<!--Dirección de residencia-->
						<div>
							<label class="form-label">Lugar de domicilio: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<textarea class="form-control mb-2" name="Dirección_Est" id="Dirección_Est" required><?php echo $Estudiante['Dirección']; ?></textarea>
						</div>
						<div>
							<label class="form-label">¿Con quién vive?: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<input class="form-control mb-2" type="text" name="Con_Quién_Vive" id="Con_Quién_Vive" required value="<?php echo $Estudiante['Con_Quién_Vive']; ?>">
						</div>
						<div>
							<span class="form-label">¿Tiene canaima? <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>

							<div class="pt-2 px-2 pb-0 mb-2 bg-light border rounded mb-2">
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="Tiene_Canaima" value="Si" required <?php if($datos_sociales['Posee_Canaima'] == "Si"){echo "checked";} ?>>
									<label class="form-label">Si </label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="Tiene_Canaima" value="No" required <?php if($datos_sociales['Posee_Canaima'] == "No"){echo "checked";} ?>>
									<label class="form-label">No </label>
								</div>
							</div>
							<div>
								<label class="form-label">¿En que Condiciones?</label>
								<?php var_dump($datos_sociales['Condición_Canaima']); ?>
								<select class="form-select mb-2" name="Condiciones_Canaima" >
									<option selected disabled value="">Seleccione una opción</option>
									<option <?php if($datos_sociales['Condición_Canaima'] == "Muy buenas Condiciones"){echo "selected";} ?> value="Muy buenas Condiciones">Muy buenas Condiciones</option>
									<option <?php if($datos_sociales['Condición_Canaima'] == "Buenas Condiciones"){echo "selected";} ?> value="Buenas Condiciones">Buenas Condiciones</option>
									<option <?php if($datos_sociales['Condición_Canaima'] == "Malas Condiciones"){echo "selected";} ?> value="Malas Condiciones">Malas Condiciones</option>
									<option <?php if($datos_sociales['Condición_Canaima'] == "Muy malas Condiciones"){echo "selected";} ?> value="Muy malas Condiciones">Muy malas Condiciones</option>
								</select>
							</div>
						</div>
						<!--Carnet de la patria-->
						<div>
							<span class="form-label">Carnet de la patria: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="input-group mb-2">
								<select class="form-select" name="Tiene_Carnet_Patria_Est" required>
									<option selected disabled value="">Seleccione una opción</option>
									<option <?php if(!empty($carnetpatria_Est['Código_Carnet']) and !empty($carnetpatria_Est['Serial_Carnet'])){echo "selected";} ?> value="Si">Si tiene</option>
									<option <?php if(empty($carnetpatria_Est['Código_Carnet']) and empty($carnetpatria_Est['Serial_Carnet'])){echo "selected";} ?> value="No">No tiene</option>
								</select>
								<input class="form-control w-auto" type="text" name="Código_Carnet_Patria_Est" id="Código_Carnet_Patria_Est" placeholder="Código" minlength="10" maxlength="10" value="<?php echo $carnetpatria_Est['Código_Carnet'] ?>">
								<input class="form-control w-auto" type="text" name="Serial_Carnet_Patria_Est" id="Serial_Carnet_Patria_Est" placeholder="Serial" minlength="10" maxlength="10" value="<?php echo $carnetpatria_Est['Serial_Carnet'] ?>">
							</div>
						</div>
						<!--Conexión a internet-->
						<div>
							<span class="form-label">Cuenta con conexión a internet en su vivienda: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="pt-2 px-2 pb-0 mb-2 bg-light border rounded mb-2">
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="Internet_Vivienda" value="Si" required <?php if($datos_sociales['Acceso_Internet'] == "Si"){echo "checked";} ?>>
									<label class="form-label">Si </label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="Internet_Vivienda" value="No" required <?php if($datos_sociales['Acceso_Internet'] == "No"){echo "checked";} ?>>
									<label class="form-label">No </label>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section id="seccion3" style="display:none;">
					<!--Datos de salud-->
					<h5 class="mb-3"><i class="fas fa-plus-square fa-xl"></i> Datos de salud.</h5>
					<div>
						<div>
							<label class="form-label">Datos antropométricos: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<div class="input-group mb-2">
								<input class="form-control mb-2" type="text" name="Índice" id="Índice" placeholder="Índice" required maxlength="5" value="<?php echo $datos_Médicos['Índice'] ?>">
								<input class="form-control mb-2" type="text" name="Talla" id="Talla" placeholder="Talla(cm)" required maxlength="5" value="<?php echo $datos_Médicos['Estatura'] ?>">
								<input class="form-control mb-2" type="text" name="Peso" id="Peso" placeholder="Peso(kg)" required maxlength="5" value="<?php echo $datos_Médicos['Peso'] ?>">
								<input class="form-control mb-2" type="text" name="C_Braquial" id="C_Braquial(cm)" placeholder="C.brazo" required maxlength="5" value="<?php echo $datos_Médicos['Circ_Braquial'] ?>">
							</div>
						</div>
						<div>
							<label class="form-label">Tallas: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<div class="input-group mb-2">
								<input class="form-control mb-2" type="text" name="Talla_Pantalón" id="Talla_Pantalón" placeholder="Pantalón" required maxlength="5" value="<?php echo $datos_tallas['Talla_Pantalón'] ?>">
								<input class="form-control mb-2" type="text" name="Talla_Camisa" id="Talla_Camisa" placeholder="Camisa" required maxlength="5" value="<?php echo $datos_tallas['Talla_Camisa'] ?>">
								<input class="form-control mb-2" type="text" name="Talla_Zapatos" id="Talla_Zapatos" placeholder="Zapatos" required maxlength="5" value="<?php echo $datos_tallas['Talla_Zapatos'] ?>">
							</div>
						</div>
						<div>
							<span class="form-label">¿Padece alguna enfermedad?: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="input-group mb-2">
								<select class="form-select" name="Padece_Enfermedad" required>
									<option selected disabled value="">Seleccione una opción</option>
									<option <?php if(!empty($datos_Médicos['Enfermedad'])){echo "selected";} ?> value="Si">Si</option>
									<option <?php if(empty($datos_Médicos['Enfermedad'])){echo "selected";} ?> value="No">No</option>
								</select>
								<input class="form-control w-auto" type="text" name="Cual_Enfermedad" id="Cual_Enfermedad" placeholder="¿Cuál enfermedad?" value="<?php echo $datos_Médicos['Enfermedad']; ?>">
							</div>
						</div>
						<div>
							<span class="form-label">¿Fue vacunado contra el COVID-19?: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="input-group mb-2">
								<select class="form-select" name="Vacunado" required>
									<option selected disabled value="">Seleccione una opción</option>
									<option <?php if($datos_Médicos['Vacunado'] == "Si"){echo "selected";} ?> value="Si">Si</option>
									<option <?php if($datos_Médicos['Vacunado'] == "No"){echo "selected";} ?> value="No">No</option>
								</select>
								<input class="form-control w-auto" type="text" name="Vacuna" id="Vacuna" value="<?php echo $datos_Médicos['Vacuna']; ?>">
							</div>
								<label class="form-label">Dosis aplicadas: </label>
								<div class="input-group mb-2">
									<input class="form-control text" type="number" name="Dosis" id="Dosis" placeholder="Ingrese un numero..." min="0" step="1" value="<?php echo $datos_Médicos['Dosis']; ?>">
									<span class="input-group-text">Lote: </span>
									<input class="form-control text" type="text" name="Lote" id="Lote" value="<?php echo $datos_Médicos['Lote']; ?>">
								</div class="input-group mb-2">
						</div>
						<div>
							<span class="form-label">Tipo de sangre: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="input-group mb-2">
								<select class="form-select" name="Grupo_Sanguineo" required>
									<?php
									$sangre = substr($datos_Médicos['Tipo_Sangre'],0,-1);
									$factor = trim($datos_Médicos['Tipo_Sangre'], "ABO");
									 ?>
									<option selected disabled value="">Seleccione una opción</option>
									<option <?php if($sangre == "O"){echo "selected";} ?> value="O">O</option>
									<option <?php if($sangre == "A"){echo "selected";} ?> value="A">A</option>
									<option <?php if($sangre == "B"){echo "selected";} ?> value="B">B</option>
									<option <?php if($sangre == "AB"){echo "selected";} ?> value="AB">AB</option>
									<option <?php if($sangre == "NC"){echo "selected";} ?> value="NC">NC</option>									
								</select>
								<span class="input-group-text">Factor Rhesus: </span>
								<select class="form-select" name="Factor_Rhesus" required>
									<option selected disabled value="">Seleccione una opción</option>
									<option <?php if($factor == "+"){echo "selected";}?> value="+">+</option>
									<option <?php if($factor == "-"){echo "selected";}?> value="-">-</option>
									<option <?php if($factor == "N"){echo "selected";}?> value="N">N</option>									
								</select>
							</div>
						</div>
						<div>
							<span class="form-label">Lateralidad: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="pt-2 px-2 pb-0 mb-2 bg-light border rounded">
								<div class="form-check form-check-inline">
									<label class="form-label">Ambidextro </label>
									<input class="form-check-input" type="radio" name="Lateralidad" value="Ambidextro" required <?php if($datos_Médicos['Lateralidad'] == "Ambidextro"){echo "checked";} ?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Diestro </label>
									<input class="form-check-input" type="radio" name="Lateralidad" value="Diestro" required <?php if($datos_Médicos['Lateralidad'] == "Diestro"){echo "checked";} ?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Zurdo </label>
									<input class="form-check-input" type="radio" name="Lateralidad" value="Zurdo" required <?php if($datos_Médicos['Lateralidad'] == "Zurdo"){echo "checked";} ?>>
								</div>
							</div>
						</div>
						<div>
							<span class="form-label">Condición de la dentadura: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="pt-2 px-2 pb-0 mb-2 bg-light border rounded">
								<div class="form-check form-check-inline">
									<label class="form-label">Buena </label>
									<input class="form-check-input" type="radio" name="Condición_Dentadura" value="Buena" required <?php if($datos_Médicos['Cond_Dental'] == "Buena"){echo "checked";} ?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Regular </label>
									<input class="form-check-input" type="radio" name="Condición_Dentadura" value="Regular" required <?php if($datos_Médicos['Cond_Dental'] == "Regular"){echo "checked";} ?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Mala </label>
									<input class="form-check-input" type="radio" name="Condición_Dentadura" value="Mala" required <?php if($datos_Médicos['Cond_Dental'] == "Mala"){echo "checked";} ?>>
								</div>
							</div>
						</div>
						<div>
								<span class="form-label">Condición oftalmológicas: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
								<div class="pt-2 px-2 pb-0 mb-2 bg-light border rounded">
									<div class="form-check form-check-inline">
										<label class="form-label">Buena </label>
										<input class="form-check-input" type="radio" name="Condición_Vista" value="Buena" required <?php if($datos_Médicos['Cond_Vista'] == "Buena"){echo "checked";} ?>>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-label">Regular </label>
										<input class="form-check-input" type="radio" name="Condición_Vista" value="Regular" required <?php if($datos_Médicos['Cond_Vista'] == "Regular"){echo "checked";} ?>>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-label">Mala </label>
										<input class="form-check-input" type="radio" name="Condición_Vista" value="Mala" required <?php if($datos_Médicos['Cond_Vista'] == "Mala"){echo "checked";} ?>>
									</div>
								</div>
						</div>
						<div>
							<span class="form-label">Presenta alguna de estas condiciones: </span>
							<div class="pt-2 px-2 pb-0 mb-2 bg-light border rounded">

								<div class="form-check form-check-inline">
									<label class="form-label">Visual </label>
									<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Visual" <?php condiciones("Visual",$datos_Médicos['Impedimento_Físico']);?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Motora </label>
									<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Motora" <?php condiciones("Motora",$datos_Médicos['Impedimento_Físico']);?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Auditiva </label>
									<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Auditiva" <?php condiciones("Auditiva",$datos_Médicos['Impedimento_Físico']);?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Escritura </label>
									<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Escritura" <?php condiciones("Escritura",$datos_Médicos['Impedimento_Físico']);?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Lectura </label>
									<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Lectura" <?php condiciones("Lectura",$datos_Médicos['Impedimento_Físico']);?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Lenguaje </label>
									<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Lenguaje" <?php condiciones("Lenguaje",$datos_Médicos['Impedimento_Físico']);?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Embarazo </label>
									<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Embarazo" <?php condiciones("Embarazo",$datos_Médicos['Impedimento_Físico']);?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Educativa especial</label>
									<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Educativa especial" <?php condiciones("Educativa especial",$datos_Médicos['Impedimento_Físico']);?>>
								</div>
							</div>
							<span class="form-label">Presenta alguna de estas necesidades educativas especiales: </span>
								<input class="form-control mb-2" type="text" name="Necesidad_educativa" id="Necesidad_educativa" placeholder="¿Cuál necesidad educativa?" value="<?php echo $datos_Médicos['Necesidad_educativa']; ?>">							
							<div>
							</div>
						</div>
						<div>
							<span class="form-label">Es atendido por otra institución: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="input-group mb-2">
								<?php print_r($datos_Médicos['Institución_Médica']); ?>
								<select class="form-select" name="Recibe_Atención_Inst">
									<option selected disabled value="">Seleccione una opción</option>
									<option value="Si" <?php if(!empty($datos_Médicos['Institución_Médica'])){echo "selected";} ?>>Si</option>
									<option value="No" <?php if(empty($datos_Médicos['Institución_Médica'])){echo "selected";} ?>>No</option>
								</select>
								<input class="form-control w-auto" type="text" name="Institución_médica" id="Institución_médica" placeholder="¿Cuál institución?" value="<?php echo $datos_Médicos['Institución_Médica']; ?>">
							</div>
						</div>
						<div>
							<span class="form-label">¿Tiene alguna dieta especial?: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="input-group mb-2">
								<select class="form-select" name="Tiene_Dieta_Especial">
									<option selected disabled value="">Seleccione una opción</option>
									<option value="Si" <?php if(!empty($datos_Médicos['Dieta_Especial'])){echo "selected";} ?>>Si</option>
									<option value="No" <?php if(empty($datos_Médicos['Dieta_Especial'])){echo "selected";} ?>>No</option>
								</select>
								<input class="form-control w-auto" type="text" name="Dieta_Especial" id="Dieta_Especial" placeholder="¿Qué dieta?" value="<?php echo $datos_Médicos['Dieta_Especial'];?>">
							</div>
						</div>
						<div>
							<span class="form-label">Posee carnet de discapacidad: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="input-group mb-2">
								<select class="form-select" name="Tiene_Carnet_Discapacidad">
									<option selected disabled value="">Seleccione una opción</option>
									<option value="Si" <?php if(!empty($datos_Médicos['Carnet_Discapacidad'])){echo "selected";} ?>>Si</option>
									<option value="No" <?php if(empty($datos_Médicos['Carnet_Discapacidad'])){echo "selected";} ?>>No</option>
								</select>
								<input class="form-control w-auto" type="text" name="Nro_Carnet_Discapacidad" id="Nro_Carnet_Discapacidad" placeholder="Nro. de carnet" maxlength="25" value="<?php echo $datos_Médicos['Carnet_Discapacidad'];?>">
							</div>
						</div>
					</div>
				</section>
				<section id="seccion5" style="display:none;">
						<div>
							<h5 class="mb-3"><i class="fa-solid fa-eye fa-xl"></i> Observaciones: </h5>
							<label class="form-label text-muted">
								<small>
									Realice una descripción general de su representado, mencionando características en el aspecto social, físico, personal, familiar y académico que a usted le gustaria dar a  conocer a los docentes de la institución. La misma no puede exceder los 150 carácteres
								</small>
							</label>

							<label class="form-label"> Social: </label>
							<textarea name="observaciones_Social" id="observaciones_Social" cols="30" rows="3" class="form-control mb-2" maxlength="150"><?php echo $datos_observaciones['Social']; ?></textarea>

							<label class="form-label"> Físico: </label>
							<textarea name="observaciones_Fisico" id="observaciones_Fisico" cols="30" rows="3" class="form-control mb-2" maxlength="150"><?php echo $datos_observaciones['Físico']; ?></textarea>

							<label class="form-label"> Personal: </label>
							<textarea name="observaciones_Personal" id="observaciones_Personal" cols="30" rows="3" class="form-control mb-2" maxlength="150"><?php echo $datos_observaciones['Personal']; ?></textarea>

							<label class="form-label"> Familiar: </label>
							<textarea name="observaciones_Familiar" id="observaciones_Familiar" cols="30" rows="3" class="form-control mb-2" maxlength="150"><?php echo $datos_observaciones['Familiar']; ?></textarea>

							<label class="form-label"> Académico: </label>
							<textarea name="observaciones_Academico" id="observaciones_Academico" cols="30" rows="3" class="form-control mb-2" maxlength="150"><?php echo $datos_observaciones['Académico']; ?></textarea>

							<label class="form-label"> Otra: </label>
							<textarea name="observaciones_Otra" id="observaciones_Otra" cols="30" rows="3" class="form-control mb-2" maxlength="150"><?php echo $datos_observaciones['Otra']; ?></textarea>
						</div>
				</section>
				<section id="seccion4" style="display:none;">
					<!--Datos del padre-->
					<h5 class="mb-3"><i class="fa-solid fa-people-roof fa-xl"></i> Datos Padre.</h5>

					<div>
						<div>
							<!--Nombres del padre-->
							<div>
								<label class="form-label">Nombres:</label>
								<div class="input-group">
									<input class="form-control mb-2" type="text" name="Primer_Nombre_Padre" placeholder="Primer nombre" value="<?php echo $padre['Primer_Nombre'] ?>">
									<input class="form-control mb-2" type="text" name="Segundo_Nombre_Padre" placeholder="Segundo nombre" value="<?php echo $padre['Segundo_Nombre'] ?>">
								</div>

							</div>

							<!--Apellidos del padre-->
							<div>
								<label class="form-label">Apellidos:</label>
								<div class="input-group">
									<input class="form-control mb-2" type="text" name="Primer_Apellido_Padre" placeholder="Primer apellido" value="<?php echo $padre['Primer_Apellido'] ?>">
									<input class="form-control mb-2" type="text" name="Segundo_Apellido_Padre" placeholder="Segundo apellido" value="<?php echo $padre['Segundo_Apellido'] ?>">
								</div>
							</div>
							<!--Cédula del padre-->
							<div>
								<label class="form-label">Cédula:</label>
								<div class="input-group mb-2">
									<?php
									#Separa la cédula del caracter que indica si es venezolana o extranjera
									$tipo_Cédula_Pa = substr($padre['Cédula'],0,1);
									$Cédula_Pa			= substr($padre['Cédula'],1,strlen($padre['Cédula'])-1);
								 	?>
									<select class="form-select" id="Tipo_Cédula_Padre" name="Tipo_Cédula_Padre">
										<option selected disabled value="">Tipo de cédula</option>
										<option <?php if($tipo_Cédula_Pa == "V"){echo "selected";} ?> value="V">V</option>
										<option <?php if($tipo_Cédula_Pa == "E"){echo "selected";} ?> value="E">E</option>
									</select>
									<input type="text" class="form-control w-auto" name="Cédula_Padre" id="Cédula_Est" maxlength="8" value="<?php echo $Cédula_Pa; ?>">
								</div>
							</div>
							<!--Fecha de nacimiento del padre-->
							<div>
								<label class="form-label">Fecha de nacimiento:</label>
								<input class="form-control mb-2" type="date" name="Fecha_Nacimiento_Padre" min="<?php echo date('Y')-100 .'-01-01'?>" max="<?php echo date('Y')-18 .'-01-01'?>" title="Debe tener al menos 18 años." value="<?php echo $padre['Fecha_Nacimiento'] ?>">
							</div>

							<!--Lugar de nacimiento del padre-->
							<div>
								<label class="form-label">Lugar de nacimiento:</label>
								<input class="form-control mb-2" type="text" name="Lugar_Nacimiento_Padre" value="<?php echo $padre['Lugar_Nacimiento'] ?>">
							</div>

							<!--Correo electrónico del padre-->
							<div>
								<label class="form-label">Correo electrónico:</label>
								<input class="form-control mb-2" type="email" name="Correo_electrónico_Padre" value="<?php echo $padre['Correo_Electrónico'] ?>">
							</div>
						</div>
						<!--Teléfono principal-->
						<div>
							<datalist id="prefijos">
								<!--Moviles-->
								<option value="0416">
								<option value="0426">
								<option value="0414">
								<option value="0412">

								<!--Fijos-->
								<option value="0271">
								<option value="0274">
								<option value="0275">
							</datalist>
							<label>Teléfonos:</label>
							<div class="input-group mb-2">
								<!--Prefijo-->
								<input class="form-control" type="text" name="Prefijo_Principal_Padre" list="prefijos" minlength="4" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos" value="<?php echo $telefonos_pa[0]['Prefijo'] ?>">
								<!--Número-->
								<input class="form-control w-auto" type="tel" name="Teléfono_Principal_Padre" minlength="7" maxlength="7" placeholder="Teléfono principal" value="<?php echo $telefonos_pa[0]['Número_Telefónico'] ?>">
							</div>
							<!--Teléfono secundario-->
							<div class="input-group mb-2">
								<!--Prefijo-->
								<input class="form-control" type="text" name="Prefijo_Secundario_Padre" list="prefijos" minlength="4" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos" value="<?php echo $telefonos_pa[1]['Prefijo'] ?>">
								<!--Número-->
								<input class="form-control w-auto" type="tel" name="Teléfono_Secundario_Padre" minlength="7" maxlength="7" placeholder="Teléfono secundario" value="<?php echo $telefonos_pa[1]['Número_Telefónico'] ?>">
							</div>
						</div>

						<!--Estado civil del padre-->
						<div>
							<label class="form-label">Estado civil:</label>
							<select class="form-select" name="Estado_Civil_Padre">
								<option selected disabled value="">Seleccione una opción</option>
								<option <?php if($padre['Estado_Civil'] == "Soltero(a)") {echo "selected";} ?> value="Soltero(a)">Soltero(a)</option>
								<option <?php if($padre['Estado_Civil'] == "Casado(a)") {echo "selected";} ?> value="Casado(a)">Casado(a)</option>
								<option <?php if($padre['Estado_Civil'] == "Divorciado(a)") {echo "selected";} ?> value="Divorciado(a)">Divorciado(a)</option>
								<option <?php if($padre['Estado_Civil'] == "Viudo(a)") {echo "selected";} ?> value="Viudo(a)">Viudo(a)</option>
							</select>
						</div>

						<!--Grado de instrucción del padre-->

						<div>
							<span>Grado de instrucción:</span>
							<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
								<div class="form-check form-check-inline">
									<label class="form-label">Primaria </label>
									<input class="form-check-input" type="radio" name="Grado_Instrucción_Pa" <?php if($padre['Grado_Académico'] == "Primaria") {echo "checked";} ?>  value="Primaria">
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Bachillerato </label>
									<input class="form-check-input" type="radio" name="Grado_Instrucción_Pa" <?php if($padre['Grado_Académico'] == "Bachillerato") {echo "checked";} ?> value="Bachillerato">
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Universitario </label>
									<input class="form-check-input" type="radio" name="Grado_Instrucción_Pa" <?php if($padre['Grado_Académico'] == "Universitario") {echo "checked";} ?> value="Universitario">
								</div>
							</div>
						</div>							

						<!--Dirección de residencia del padre-->
						<div>
							<label class="form-label">Dirección de residencia:</label>
							<textarea class="form-control mb-2"name="Dirección_Padre"><?php echo $padre['Dirección']; ?></textarea>
						</div>

						<!--Se encuentra el padre en el país-->
						<div>
							<span class="form-label">¿Se encuentra en el país?:</span>
							<div class="input-group mb-2">
								<select class="form-select" name="Reside_En_El_País_Pa">
									<option selected disabled value="">Seleccione una opción</option>
									<option value="Si" <?php if($padre['País_Residencia'] == "Venezuela"){echo "selected";} ?>>Si</option>
									<option value="No" <?php if($padre['País_Residencia'] != "Venezuela" && $padre['País_Residencia'] != ""){echo "selected";} ?>>No</option>
								</select>
								<input class="form-control w-auto" type="text" name="País_Pa" id="País_Pa" placeholder="En Caso de estar fuera del país, especifique en cuál se encuentra" value="<?php if($padre['País_Residencia'] != "Venezuela"){echo $padre['País_Residencia'];} ?>"

							</div>
						</div>
					</div>

							<h5>Datos de vivienda.</h5>

							<span>Condiciones de la vivienda:</span>
							<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
								<div class="form-check form-check-inline">
									<label class="form-label">Buena </label>
									<input class="form-check-input" type="radio" name="Condición_vivienda_Pa" value="Buena" <?php if($datos_vivienda_pa['Condiciones_Vivienda'] == "Buena"){echo "checked";} ?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Regular </label>
									<input class="form-check-input" type="radio" name="Condición_vivienda_Pa" value="Regular" <?php if($datos_vivienda_pa['Condiciones_Vivienda'] == "Regular"){echo "checked";} ?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Mala </label>
									<input class="form-check-input" type="radio" name="Condición_vivienda_Pa" value="Mala" <?php if($datos_vivienda_pa['Condiciones_Vivienda'] == "Mala"){echo "checked";} ?>>
								</div>
							</div>
							<span>Tipo de vivienda:</span>
							<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
								<div class="form-check form-check-inline">
									<label class="form-label">Casa </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_Pa" value="Casa" <?php if($datos_vivienda_pa['Tipo_Vivienda'] == "Casa"){echo "checked";} ?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Apartamento </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_Pa" value="Apartamento" <?php if($datos_vivienda_pa['Tipo_Vivienda'] == "Apartamento"){echo "checked";} ?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Rancho </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_Pa" value="Rancho" <?php if($datos_vivienda_pa['Tipo_Vivienda'] == "Rancho"){echo "checked";} ?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Quinta </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_Pa" value="Quinta" <?php if($datos_vivienda_pa['Tipo_Vivienda'] == "Quinta"){echo "checked";} ?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Habitación </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_Pa" value="Habitación" <?php if($datos_vivienda_pa['Tipo_Vivienda'] == "Habitación"){echo "checked";} ?>>
								</div>
							</div>
							<span>Tenencia de la vivienda:</span>
							<div class="input-group mb-3">
								<select class="form-select" name="Tenencia_vivienda_Pa">
									<option selected disabled value="">Seleccione una opción</option>
									<option <?php if($datos_vivienda_pa['Tenencia_Vivienda'] == "Propia"){echo "selected";} ?> value="Propia">Propia</option>
									<option <?php if($datos_vivienda_pa['Tenencia_Vivienda'] == "Alquilada"){echo "selected";} ?> value="Alquilada">Alquilada</option>
									<option <?php if($datos_vivienda_pa['Tenencia_Vivienda'] == "Prestada"){echo "selected";} ?> value="Prestada">Prestada</option>
									<option <?php if($datos_vivienda_pa['Tenencia_Vivienda'] == "Otro"){echo "selected";} ?> value="Otro">Otro</option>
								</select>
								<input class="form-control" type="text" name="Tenencia_vivienda_Pa_Otro" maxlength="12" minlength="3" placeholder="En Caso de ser otro, especifique" <?php if($datos_vivienda_pa['Tenencia_Vivienda'] != "Propia" and $datos_vivienda_pa['Tenencia_Vivienda'] != "Alquilada" and $datos_vivienda_pa['Tenencia_Vivienda'] != "Prestada" and $datos_vivienda_pa['Tenencia_Vivienda'] != "Otro"){echo "selected";} ?>>
							</div>
						</div>
						<h5>Datos laborales.</h5>
						<!--Trabaja el padre-->
						<div>
							<span>Trabaja:</span>
							<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
								<div class="form-check form-check-inline">
									<label class="form-label">Si </label>
									<input class="form-check-input" type="radio" name="Padre_Trabaja" value="Si" <?php if($datos_laborales_pa['Empleo'] != "Desempleado" && $datos_laborales_pa['Empleo'] != ""){echo "checked";} ?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">No </label>
									<input class="form-check-input" type="radio" name="Padre_Trabaja" value="No" <?php if($datos_laborales_pa['Empleo'] == "Desempleado"){echo "checked";} ?>>
								</div>
							</div>
						</div>
						<!--Cargo que ocupa el padre-->
						<div>
							<label class="form-label">Cargo que ocupa:</label>
							<input class="form-control mb-2" type="text" name="Empleo_Pa" id="Empleo_Pa" maxlength="60" minlength="3" value="<?php echo $datos_laborales_pa['Empleo']; ?>">
						</div>
						<!--Teléfono del trabajo del padre-->
						<div>
							<label class="form-label">Teléfono del trabajo:</label>
							<!--Teléfono principal-->
							<div class="input-group mb-2">
								<!--Prefijo-->
								<input class="form-control" type="text" name="Prefijo_Trabajo_Pa" id="Prefijo_Trabajo_Pa" list="prefijos" pattern="[0-9]+" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos" value="<?php if($datos_laborales_pa['Empleo'] != "Desempleado") {echo $telefonos_pa[2]['Prefijo'];} ?>">
								<!--Número-->
								<input class="form-control w-auto" type="tel" name="Teléfono_Trabajo_Pa" id="Teléfono_Trabajo_Pa" placeholder="Teléfono principal" pattern="[0-9]+" maxlength="7" minlength="7" value="<?php if($datos_laborales_pa['Empleo'] != "Desempleado") {echo $telefonos_pa[2]['Número_Telefónico'];} ?>">
							</div>
						</div>
						<!--Lugar en el que trabaja el padre-->
						<div>
							<label class="form-label">Lugar del trabajo:</label>
							<textarea class="form-control mb-2" name="Lugar_Trabajo_Pa" id="Lugar_Trabajo_Pa" maxlength="55" minlength="3"><?php echo $datos_laborales_pa['Lugar_Trabajo'] ?></textarea>
						</div>
						<!--Remuneración del trabajo del padre-->
						<div>
							<label class="form-label">Remuneración:</label>
							<div class="input-group mb-2">
								<!--Remuneración en base a sueldos minimos del padre-->
								<input class="form-control text-end" type="number" name="Remuneración_Pa" id="Remuneración_Pa" placeholder="Ingrese un numero..." min="0" step="1" value="<?php echo $datos_laborales_pa['Remuneración'] ?>">
								<span class="input-group-text mb-2-text">Salarios mínimos</span>
								<!--Tipo de Remuneración del padre-->
								<select class="form-select" name="Tipo_Remuneración_Pa">
									<option <?php if($datos_laborales_pa['Tipo_Remuneración'] == "Diaria"){echo "selected";} ?> value="Diaria">Remuneración diaria</option>
									<option <?php if($datos_laborales_pa['Tipo_Remuneración'] == "Semanal"){echo "selected";} ?> value="Semanal">Remuneración semanal</option>
									<option <?php if($datos_laborales_pa['Tipo_Remuneración'] == "Quincenal"){echo "selected";} ?> value="Quincenal">Remuneración quincenal</option>
									<option <?php if($datos_laborales_pa['Tipo_Remuneración'] == "Mensual"){echo "selected";} ?> value="Mensual">Remuneración mensual</option>
								</select>
							</div>
						</div>
				</section>
				<section id="seccion6" style="display:none;">
					<!--Datos de la madre-->
					<h5 class="mb-3"><i class="fa-solid fa-people-roof fa-xl"></i> Datos Madre.</h5>

					<div>
						<div>
							<!--Nombres de la madre-->
							<div>
								<label class="form-label">Nombres:</label>
								<div class="input-group">
									<input class="form-control mb-2" type="text" name="Primer_Nombre_Madre" placeholder="Primer nombre" value="<?php echo $madre['Primer_Nombre'] ?>">
									<input class="form-control mb-2" type="text" name="Segundo_Nombre_Madre" placeholder="Segundo nombre" value="<?php echo $madre['Segundo_Nombre'] ?>">
								</div>

							</div>

							<!--Apellidos de la madre-->
							<div>
								<label class="form-label">Apellidos:</label>
								<div class="input-group">
									<input class="form-control mb-2" type="text" name="Primer_Apellido_Madre" placeholder="Primer apellido" value="<?php echo $madre['Primer_Apellido'] ?>">
									<input class="form-control mb-2" type="text" name="Segundo_Apellido_Madre" placeholder="Segundo apellido" value="<?php echo $madre['Segundo_Apellido'] ?>">
								</div>
							</div>
							<!--Cédula de la madre-->
							<div>
								<label class="form-label">Cédula:</label>
								<div class="input-group mb-2">
									<?php
									#Separa la cédula del caracter que indica si es venezolana o extranjera
									$tipo_Cédula_Ma = substr($madre['Cédula'],0,1);
									$Cédula_Ma			= substr($madre['Cédula'],1,strlen($madre['Cédula'])-1);
								 	?>
									<select class="form-select" id="Tipo_Cédula_Madre" name="Tipo_Cédula_Madre">
										<option selected disabled value="">Tipo de cédula</option>
										<option <?php if($tipo_Cédula_Ma == "V"){echo "selected";} ?> value="V">V</option>
										<option <?php if($tipo_Cédula_Ma == "E"){echo "selected";} ?> value="E">E</option>
									</select>
									<input type="text" class="form-control w-auto" name="Cédula_Madre" id="Cédula_Est" maxlength="8" value="<?php echo $Cédula_Ma; ?>">
								</div>
							</div>
							<!--Fecha de nacimiento de la madre-->
							<div>
								<label class="form-label">Fecha de nacimiento:</label>
								<input class="form-control mb-2" type="date" name="Fecha_Nacimiento_Madre" min="<?php echo date('Y')-100 .'-01-01'?>" max="<?php echo date('Y')-18 .'-01-01'?>" title="Debe tener al menos 18 años." value="<?php echo $madre['Fecha_Nacimiento'] ?>">
							</div>

							<!--Lugar de nacimiento de la madre-->
							<div>
								<label class="form-label">Lugar de nacimiento:</label>
								<input class="form-control mb-2" type="text" name="Lugar_Nacimiento_Madre" value="<?php echo $madre['Lugar_Nacimiento'] ?>">
							</div>

							<!--Correo electrónico de la madre-->
							<div>
								<label class="form-label">Correo electrónico:</label>
								<input class="form-control mb-2" type="email" name="Correo_electrónico_Madre" value="<?php echo $madre['Correo_Electrónico'] ?>">
							</div>
						</div>
						<!--Teléfono principal-->
						<div>
							<datalist id="prefijos">
								<!--Moviles-->
								<option value="0416">
								<option value="0426">
								<option value="0414">
								<option value="0412">

								<!--Fijos-->
								<option value="0271">
								<option value="0274">
								<option value="0275">
							</datalist>
							<label>Teléfonos:</label>
							<div class="input-group mb-2">
								<!--Prefijo-->
								<input class="form-control" type="text" name="Prefijo_Principal_Madre" list="prefijos" minlength="4" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos" value="<?php echo $telefonos_ma[0]['Prefijo'] ?>">
								<!--Número-->
								<input class="form-control w-auto" type="tel" name="Teléfono_Principal_Madre" minlength="7" maxlength="7" placeholder="Teléfono principal" value="<?php echo $telefonos_ma[0]['Número_Telefónico'] ?>">
							</div>
							<!--Teléfono secundario-->
							<div class="input-group mb-2">
								<!--Prefijo-->
								<input class="form-control" type="text" name="Prefijo_Secundario_Madre" list="prefijos" minlength="4" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos" value="<?php echo $telefonos_ma[1]['Prefijo'] ?>">
								<!--Número-->
								<input class="form-control w-auto" type="tel" name="Teléfono_Secundario_Madre" minlength="7" maxlength="7" placeholder="Teléfono secundario" value="<?php echo $telefonos_ma[1]['Número_Telefónico'] ?>">
							</div>
						</div>

						<!--Estado civil de la madre-->
						<div>
							<label class="form-label">Estado civil:</label>
							<select class="form-select" name="Estado_Civil_Madre">
								<option selected disabled value="">Seleccione una opción</option>
								<option <?php if($madre['Estado_Civil'] == "Soltero(a)") {echo "selected";} ?> value="Soltero(a)">Soltero(a)</option>
								<option <?php if($madre['Estado_Civil'] == "Casado(a)") {echo "selected";} ?> value="Casado(a)">Casado(a)</option>
								<option <?php if($madre['Estado_Civil'] == "Divorciado(a)") {echo "selected";} ?> value="Divorciado(a)">Divorciado(a)</option>
								<option <?php if($madre['Estado_Civil'] == "Viudo(a)") {echo "selected";} ?> value="Viudo(a)">Viudo(a)</option>
							</select>
						</div>

						<!--Grado de instrucción de la madre-->

						<div>
							<span>Grado de instrucción:</span>
							<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
								<div class="form-check form-check-inline">
									<label class="form-label">Primaria </label>
									<input class="form-check-input" type="radio" name="Grado_Instrucción_Ma" <?php if($madre['Grado_Académico'] == "Primaria") {echo "checked";} ?> value="Primaria">
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Bachillerato </label>
									<input class="form-check-input" type="radio" name="Grado_Instrucción_Ma" <?php if($madre['Grado_Académico'] == "Bachillerato") {echo "checked";} ?> value="Bachillerato">
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Universitario </label>
									<input class="form-check-input" type="radio" name="Grado_Instrucción_Ma" <?php if($madre['Grado_Académico'] == "Universitario") {echo "checked";} ?> value="Universitario">
								</div>
							</div>
						</div>							

						<!--Dirección de residencia de la madre-->
						<div>
							<label class="form-label">Dirección de residencia:</label>
							<textarea class="form-control mb-2"name="Dirección_Madre"><?php echo $madre['Dirección']; ?></textarea>
						</div>

						<!--Se encuentra la madre en el país-->
						<div>
							<span class="form-label">¿Se encuentra en el país?:</span>
							<div class="input-group mb-2">
								<select class="form-select" name="Reside_En_El_País_Ma">
									<option selected disabled value="">Seleccione una opción</option>
									<option value="Si" <?php if($madre['País_Residencia'] == "Venezuela"){echo "selected";} ?>>Si</option>
									<option value="No" <?php if($madre['País_Residencia'] != "Venezuela" && $madre['País_Residencia'] != ""){echo "selected";} ?>>No</option>
								</select>
								<input class="form-control w-auto" type="text" name="País_Ma" id="País_Ma" placeholder="En Caso de estar fuera del país, especifique en cuál se encuentra" value="<?php if($madre['País_Residencia'] != "Venezuela"){echo $madre['País_Residencia'];} ?>"

							</div>
						</div>
					</div>

							<h5>Datos de vivienda.</h5>

							<span>Condiciones de la vivienda:</span>
							<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
								<div class="form-check form-check-inline">
									<label class="form-label">Buena </label>
									<input class="form-check-input" type="radio" name="Condición_vivienda_Ma" value="Buena" <?php if($datos_vivienda_ma['Condiciones_Vivienda'] == "Buena"){echo "checked";} ?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Regular </label>
									<input class="form-check-input" type="radio" name="Condición_vivienda_Ma" value="Regular" <?php if($datos_vivienda_ma['Condiciones_Vivienda'] == "Regular"){echo "checked";} ?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Mala </label>
									<input class="form-check-input" type="radio" name="Condición_vivienda_Ma" value="Mala" <?php if($datos_vivienda_ma['Condiciones_Vivienda'] == "Mala"){echo "checked";} ?>>
								</div>
							</div>
							<span>Tipo de vivienda:</span>
							<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
								<div class="form-check form-check-inline">
									<label class="form-label">Casa </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_Ma" value="Casa" <?php if($datos_vivienda_ma['Tipo_Vivienda'] == "Casa"){echo "checked";} ?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Apartamento </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_Ma" value="Apartamento" <?php if($datos_vivienda_ma['Tipo_Vivienda'] == "Apartamento"){echo "checked";} ?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Rancho </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_Ma" value="Rancho" <?php if($datos_vivienda_ma['Tipo_Vivienda'] == "Rancho"){echo "checked";} ?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Quinta </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_Ma" value="Quinta" <?php if($datos_vivienda_ma['Tipo_Vivienda'] == "Quinta"){echo "checked";} ?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Habitación </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_Ma" value="Habitación" <?php if($datos_vivienda_ma['Tipo_Vivienda'] == "Habitación"){echo "checked";} ?>>
								</div>
							</div>
							<span>Tenencia de la vivienda:</span>
							<div class="input-group mb-3">
								<select class="form-select" name="Tenencia_vivienda_Ma">
									<option selected disabled value="">Seleccione una opción</option>
									<option <?php if($datos_vivienda_ma['Tenencia_Vivienda'] == "Propia"){echo "selected";} ?> value="Propia">Propia</option>
									<option <?php if($datos_vivienda_ma['Tenencia_Vivienda'] == "Alquilada"){echo "selected";} ?> value="Alquilada">Alquilada</option>
									<option <?php if($datos_vivienda_ma['Tenencia_Vivienda'] == "Prestada"){echo "selected";} ?> value="Prestada">Prestada</option>
									<option <?php if($datos_vivienda_ma['Tenencia_Vivienda'] == "Otro"){echo "selected";} ?> value="Otro">Otro</option>
								</select>
								<input class="form-control" type="text" name="Tenencia_vivienda_Ma_Otro" maxlength="12" minlength="3" placeholder="En Caso de ser otro, especifique" <?php if($datos_vivienda_ma['Tenencia_Vivienda'] != "Propia" and $datos_vivienda_ma['Tenencia_Vivienda'] != "Alquilada" and $datos_vivienda_ma['Tenencia_Vivienda'] != "Prestada" and $datos_vivienda_ma['Tenencia_Vivienda'] != "Otro"){echo "selected";} ?>>
							</div>
						</div>

						<h5>Datos laborales.</h5>
						<!--Trabaja la madre-->
						<div>
							<span>Trabaja:</span>
							<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
								<div class="form-check form-check-inline">
									<label class="form-label">Si </label>
									<input class="form-check-input" type="radio" name="Madre_Trabaja" value="Si" <?php if($datos_laborales_ma['Empleo'] != "Desempleado" && $datos_laborales_ma['Empleo'] != ""){echo "checked";} ?>>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">No </label>
									<input class="form-check-input" type="radio" name="Madre_Trabaja" value="No" <?php if($datos_laborales_ma['Empleo'] == "Desempleado"){echo "checked";} ?>>
								</div>
							</div>
						</div>
						<!--Cargo que ocupa la madre-->
						<div>
							<label class="form-label">Cargo que ocupa:</label>
							<input class="form-control mb-2" type="text" name="Empleo_Ma" id="Empleo_Ma" maxlength="60" minlength="3" value="<?php echo $datos_laborales_ma['Empleo']; ?>">
						</div>
						<!--Teléfono del trabajo de la madre-->
						<div>
							<label class="form-label">Teléfono del trabajo:</label>
							<!--Teléfono principal-->
							<div class="input-group mb-2">
								<!--Prefijo-->
								<input class="form-control" type="text" name="Prefijo_Trabajo_Ma" id="Prefijo_Trabajo_Ma" list="prefijos" pattern="[0-9]+" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos" value="<?php if($datos_laborales_ma['Empleo'] != "Desempleado") {echo $telefonos_ma[2]['Prefijo'];} ?>">
								<!--Número-->
								<input class="form-control w-auto" type="tel" name="Teléfono_Trabajo_Ma" id="Teléfono_Trabajo_Ma" placeholder="Teléfono principal" pattern="[0-9]+" maxlength="7" minlength="7" value="<?php if($datos_laborales_ma['Empleo'] != "Desempleado") {echo $telefonos_ma[2]['Número_Telefónico'];} ?>">
							</div>
						</div>
						<!--Lugar en el que trabaja la madre-->
						<div>
							<label class="form-label">Lugar del trabajo:</label>
							<textarea class="form-control mb-2" name="Lugar_Trabajo_Ma" id="Lugar_Trabajo_Ma" maxlength="55" minlength="3"><?php echo $datos_laborales_ma['Lugar_Trabajo'] ?></textarea>
						</div>
						<!--Remuneración del trabajo de la madre-->
						<div>
							<label class="form-label">Remuneración:</label>
							<div class="input-group mb-2">
								<!--Remuneración en base a sueldos minimos de la madre-->
								<input class="form-control text-end" type="number" name="Remuneración_Ma" id="Remuneración_Ma" placeholder="Ingrese un numero..." min="0" step="1" value="<?php echo $datos_laborales_ma['Remuneración'] ?>">
								<span class="input-group-text mb-2-text">Salarios mínimos</span>
								<!--Tipo de Remuneración de la madre-->
								<select class="form-select" name="Tipo_Remuneración_Ma">
									<option <?php if($datos_laborales_ma['Tipo_Remuneración'] == "Diaria"){echo "selected";} ?> value="Diaria">Remuneración diaria</option>
									<option <?php if($datos_laborales_ma['Tipo_Remuneración'] == "Semanal"){echo "selected";} ?> value="Semanal">Remuneración semanal</option>
									<option <?php if($datos_laborales_ma['Tipo_Remuneración'] == "Quincenal"){echo "selected";} ?> value="Quincenal">Remuneración quincenal</option>
									<option <?php if($datos_laborales_ma['Tipo_Remuneración'] == "Mensual"){echo "selected";} ?> value="Mensual">Remuneración mensual</option>
								</select>
							</div>
						</div>
				</section>

			</div>
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
			<input type="hidden" name="Tipo_Vivienda" value="<?php echo $_POST['Tipo_Vivienda']?>">
			<input type="hidden" name="Tenencia_Vivienda" value="<?php echo $_POST['Tenencia_vivienda']?>">
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
			<input type="hidden" name="Tipo_Remuneración" value="<?php echo $_POST['Tipo_Remuneración']?>">
			<input type="hidden" name="Primer_Nombre_Aux" value="<?php echo $_POST['Primer_Nombre_Aux']?>">
			<input type="hidden" name="Segundo_Nombre_Aux" value="<?php echo $_POST['Segundo_Nombre_Aux']?>">
			<input type="hidden" name="Primer_Apellido_Aux" value="<?php echo $_POST['Primer_Apellido_Aux']?>">
			<input type="hidden" name="Segundo_Apellido_Aux" value="<?php echo $_POST['Segundo_Apellido_Aux']?>">
			<input type="hidden" name="Relación_Auxiliar" value="<?php echo $_POST['Relación_Auxiliar']?>">
			<!--Botón para guardar-->
			<div class="card-footer">
				<input type="hidden" name="orden" value="Editar">
				<button class="btn btn-primary" type="submit" onclick="enviar();">Registrar estudiante</button>
			</div>

 <!-- 			<php print_r($datos_vivienda);?> -->
		</form>
		<!--Footer-->
		<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-fixed bottom-0">
			<span class="text-white">Sistema de inscripción L.B. G.P.F - <i class="far fa-copyright"></i> 2022-<?php echo date("Y"); ?></span>
		</footer>
		<?php include '../../ayuda.php';?>
<script type="text/javascript" src="../../js/sweetalert2.js"></script>
<script type="text/javascript" src="../../js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../../js/validaciones-estudiante.js"></script>
<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
<script>
function enviar() {
	var FormularioEstudiante = document.getElementById("FormularioEstudiante");
	var a = document.getElementById("seccion1");
	var b = document.getElementById("seccion2");
	var c = document.getElementById("seccion3");
	var d = document.getElementById("seccion4");
	var e = document.getElementById("seccion5");
	var f = document.getElementById("seccion6");


	a.style.display = "block";
	b.style.display = "block";
	c.style.display = "block";
	d.style.display = "block";
	e.style.display = "block";
	f.style.display = "block";

	if (FormularioEstudiante.checkValidity()) {
		FormularioEstudiante.submit();
	}
	else {
		Swal.fire(
	      'Atención',
	      'Faltan campos por llenar',
	      'info'
	    );
	}

	a.style.display = "block";
	b.style.display = "none";
	c.style.display = "none";
	d.style.display = "none";
	e.style.display = "none";
	f.style.display = "none";

}
	function seccion(seccion) {

		//secciones
		var a = document.getElementById("seccion1");
		var b = document.getElementById("seccion2");
		var c = document.getElementById("seccion3");
		var d = document.getElementById("seccion4");
		var e = document.getElementById("seccion5");
		var f = document.getElementById("seccion6");


		//botones en la navegación
		var link_a = document.getElementById("link1");
		var link_b = document.getElementById("link2");
		var link_c = document.getElementById("link3");
		var link_d = document.getElementById("link4");
		var link_e = document.getElementById("link5");
		var link_f = document.getElementById("link6");


		//seccion seleccionada como activa(seccion 1 por defecto)
		var seccion = document.getElementById(seccion);

		a.style.display = "none";
		b.style.display = "none";
		c.style.display = "none";
		d.style.display = "none";
		e.style.display = "none";
		f.style.display = "none";

		link_a.classList.remove("active");
		link_b.classList.remove("active");
		link_c.classList.remove("active");
		link_d.classList.remove("active");
		link_e.classList.remove("active");
		link_f.classList.remove("active");


		if (seccion == a) {
			a.style.display = "block";
			link_a.classList.add("active");
		}
		else if (seccion == b) {
			b.style.display = "block";
			link_b.classList.add("active");
		}
		else if (seccion == c) {
			c.style.display = "block";
			link_c.classList.add("active");
		}
		else if (seccion == d) {
			d.style.display = "block";
			link_d.classList.add("active");
		}
		else if (seccion == e) {
			e.style.display = "block";
			link_e.classList.add("active");
		}
		else if (seccion == f) {
			f.style.display = "block";
			link_f.classList.add("active");
		}
	}
</script>
</body>
</html>

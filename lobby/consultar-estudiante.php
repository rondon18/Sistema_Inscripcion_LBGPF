<?php

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

require('../clases/personas.php');
require('../clases/Estudiante.php');
require('../clases/representantes.php');
require('../clases/carnet-patria.php');
require('../clases/económicos-representantes.php');
require('../clases/laborales.php');
require('../clases/laborales-madres.php');
require('../clases/laborales-padres.php');
require('../clases/Padre.php');
require('../clases/madre.php');
require('../clases/ficha-médica.php');
require('../clases/sociales-Estudiantes.php');
require('../clases/tallas-Estudiantes.php');
require('../clases/grado.php');
require('../clases/vivienda.php');
require('../clases/vivienda-madres.php');
require('../clases/vivienda-padres.php');
require('../clases/contactos-auxiliares.php');
require('../clases/año-escolar.php');
require('../clases/Estudiantes-repitentes.php');
require('../clases/teléfonos.php');

require('../controladores/conexion.php');

require('../clases/bitácora.php');

$conexion = conectarBD();

$Estudiante = new Estudiantes();
$CarnetPatria = new CarnetPatria();
$Representante = new Representantes();
$Economicos = new DatosEconómicos();
$Laborales = new DatosLaborales();
$Laborales_Ma = new DatosLaboralesMadres();
$Laborales_Pa = new DatosLaboralesPadres();
$Padre = new Padre();
$Madre = new Madre();
$Estudiantes_repitente = new EstudiantesRepitentes();
$Grado = new GradoAcadémico();
$Año = new Año_Escolar();
$Telefonos = new Teléfonos();

$datos_Médicos = new FichaMédica();
$Datos_sociales = new DatosSociales();
$Datos_Tallas = new TallasEstudiante();
$Datos_vivienda = new DatosVivienda();
$Datos_vivienda_Ma = new DatosViviendaMa();
$Datos_vivienda_Pa = new DatosViviendaPa();
$Datos_Auxiliar = new ContactoAuxiliar();

#Hacer algo parecido para llamar numeros de representantes y Padre
$Estudiante = $Estudiante->consultarEstudiante($_POST['Cédula_Estudiante']);
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
$datos_vivienda = $Datos_vivienda->consultarDatosvivienda_R($_POST['id_representante']);
$datos_vivienda_ma = $Datos_vivienda_Ma->consultarDatosvivienda_Ma($_POST['id_madre']);
$datos_vivienda_pa = $Datos_vivienda_Pa->consultarDatosvivienda_Pa($_POST['id_padre']);

$datos_representante = $Representante->consultarRepresentanteID($_POST['id_representante']);
$datos_madre = $Madre->consultarMadre($_POST['id_madre']);
$datos_padre = $Padre->consultarPadre($_POST['id_padre']);



$datos_auxiliar = $Datos_Auxiliar->consultarContactoAuxiliar($_POST['id_representante'],$_POST['id_Estudiante']);

$datos_economicos = $Economicos->consultarDatosEconómicos($_POST['id_representante']);
$datos_laborales = $Laborales->consultarDatosLaborales($_POST['id_representante']);
$datos_laborales_ma = $Laborales_Ma->consultarDatosLaborales_Ma($_POST['id_madre']);
$datos_laborales_pa = $Laborales_Pa->consultarDatosLaborales_Pa($_POST['id_padre']);

$padre = $Padre->consultarPadre($_POST['id_padre']);
$madre = $Madre->consultarMadre($_POST['id_madre']);
$carnetpatria_re = $CarnetPatria->consultarCarnetPatria($datos_representante['Cédula']);
$hijos_re = $Representante->numeroRepresentados($_POST['id_representante']);
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

$carnet_Est = "";
if (empty($carnetpatria_Est['Código_Carnet']) AND empty($carnetpatria_Est['Serial_Carnet'])) {
  $carnet_Est = "No";
}
else {
  $carnet_Est = "Si";
}

if (empty($carnetpatria_re['Código_Carnet']) AND empty($carnetpatria_re['Serial_Carnet'])) {
  $carnet_re = "No";
}
else {
  $carnet_re = "Si";
}

if (empty($datos_Médicos['Institución_médica'])) {
    $Institución = "No";
}
else {
    $Institución = "Si";
}

if (empty($datos_Médicos['Carnet_Discapacidad'])) {
    $carnet_dis = "No";
}
else {
    $carnet_dis = "Si";
}

if (empty($datos_laborales['Empleo']) || $datos_laborales['Empleo']=="Desempleado") {
    $tiene_empleo = "No";
}
else {
    $tiene_empleo = "Si";
}

if (empty($datos_laborales_pa['Empleo']) || $datos_laborales_pa['Empleo']=="Desempleado") {
    $tiene_empleo_pa = "No";
}
else {
    $tiene_empleo_pa = "Si";
}

if (empty($datos_laborales_ma['Empleo']) || $datos_laborales_ma['Empleo']=="Desempleado") {
    $tiene_empleo_ma = "No";
}
else {
    $tiene_empleo_ma = "Si";
}

if ($padre['País_Residencia'] == "Venezuela") {
    $SeEncuentraEnElPais_pa = "Si";
}
else {
    $SeEncuentraEnElPais_pa = "No";
}

if ($madre['País_Residencia'] == "Venezuela") {
    $SeEncuentraEnElPais_ma = "Si";
}
else {
    $SeEncuentraEnElPais_ma = "No";
}

if (empty($estudiantes_repitente['Que_Materias_Repite'])) {
    $mat_repitente = "No";
}
else {
   $mat_repitente = "Si";
}
if (empty($estudiantes_repitente['Que_Materias_Repite'])) {
    $mat_pendientes = "No";
}
else {
   $mat_pendientes = "Si";
}

if (empty( $datos_Médicos['Enfermedad'])) {
    $PadeceEnfermedad = "No";
}
else {
    $PadeceEnfermedad = "Si";
}

if ($hijos_re>1) {
    $TieneMasHijos_re = "Si";
}
else {
    $TieneMasHijos_re = "No";
}

if ($hijos_pa>1) {
    $TieneMasHijos_pa = "Si";
}
else {
    $TieneMasHijos_pa = "No";
}

if ($hijos_ma>1) {
    $TieneMasHijos_ma = "Si";
}
else {
    $TieneMasHijos_ma = "No";
}

$Año_actual = date("Y");
$Inicio_Año_Escolar = $Año_actual;
$Fin_Año_Escolar = $Año_actual+1;

function telefono($prefijo,$numero) {
  if (empty($prefijo) and empty($numero)) {
    $telefono = "";
  }
  else {
    $telefono = "$prefijo-$numero";
  }
  return $telefono;
}

desconectarBD($conexion);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Consultar estudiante</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/colores.css"/>
	<link rel="stylesheet" type="text/css" href="../css/all.min.css"/>
	<link rel="icon" type="img/png" href="../img/distintivo-LGPF.png">
</head>
<body>
	<!--Banner-->
	<header class="w-100 bg-white d-flex justify-content-between shadow p-1 position-fixed top-0" style="z-index:1000;">

		<div>
			<img src="../img/banner-gobierno.png" alt=""  height="42" class="d-inline-block align-text-top">
			<img src="../img/banner-MPPE.png" alt=""  height="42" class="d-inline-block align-text-top">
		</div>
		<img src="../img/banner-LGPF.png" alt=""  height="42" class="d-inline-block align-text-top">
	</header>
	<div class="card" style="width: 80%; margin: 60px auto;">
		<div class="card-header">
			<h3>Datos de inscripción del Estudiante</h3>
		</div>
		<div class="card-body">
			<table id="Estudiante" class="table table-bordered table-striped table-hover" style="max-width:100%;">
				<tbody>
					<tr class="table-primary">
						<th colspan="4">Datos del Estudiante</th>
					</tr>

					<tr>
						<td>Nombres: <?php echo $Estudiante['Primer_Nombre']." ".$Estudiante['Segundo_Nombre']?></td>
						<td>Apellidos: <?php echo $Estudiante['Primer_Apellido']." ".$Estudiante['Segundo_Apellido']?></td>
						<td>Cédula: <?php echo $Estudiante['Cédula']?></td>
						<td>Edad: <?php echo $edad_diff_est->format('%y')?> años</td>
					</tr>

					<tr>
						<td colspan="2">Fecha Nacimiento: <?php echo $Estudiante['Fecha_Nacimiento']?></td>
						<td colspan="2">Lugar Nacimiento: <?php echo $Estudiante['Lugar_Nacimiento']?></td>
					</tr>

					<tr>
						<td colspan="4">Dirección: <?php echo $Estudiante['Dirección']?></td>
					</tr>

					<tr>
						<td colspan="4">Correo Electrónico: <?php echo $Estudiante['Correo_Electrónico']?></td>
					</tr>

					<tr>
						<td colspan="2">Teléfono Principal: <?php echo telefono($telefonos_Est[0]['Prefijo'],$telefonos_Est[0]['Número_Telefónico'])?></td>
						<td colspan="2">Teléfono Secundario: <?php echo telefono($telefonos_Est[1]['Prefijo'],$telefonos_Est[1]['Número_Telefónico'])?></td>
					</tr>

					<tr>
						<td colspan="1">Repite: <?php echo $mat_repitente?> </td>
						<td colspan="1"> Cuáles Materias: <?php echo $Estudiantes_repitente['Que_Materias_Repite'] ?> </td>
						<td colspan="2"> Qué Año Repite: <?php echo $Estudiantes_repitente['Año_Repetido'] ?> </td>
					</tr>

					<tr>
						<td colspan="1"> Materias Pendientes: <?php echo $mat_pendientes ?> </td>
						<td colspan="3"> Cuáles Materias Pendientes: <?php echo $Estudiantes_repitente['Materias_Pendientes'] ?> </td>
					</tr>

					<tr>
						<td>Plantel Procedencia: <?php echo $Estudiante['Plantel_Procedencia']?></td>
						<td>Año a cursar: <?php echo $grado['Grado_A_Cursar']?></td>
						<td colspan="2">Periodo académico: <?php echo $Año->getInicio_Año_Escolar()."-".$Año->getFin_Año_Escolar()?></td>
					</tr>

					<tr class="table-primary">
						<th colspan="4">Datos sociales</th>
					</tr>

					<tr>
						<td colspan="2"> Lugar de Domicilio: <?php echo $Estudiante['Dirección'] ?></td>
						<td colspan="2"> Con Quién vive: <?php echo $Estudiante['Con_Quién_Vive'] ?></td>
					</tr>

					<tr>
						<td>Posee Canaima: <?php echo $datos_sociales['Posee_Canaima']?> </td>
						<td colspan="3">Condición Canaima: <?php echo $datos_sociales['Condición_Canaima']?> </td>
					</tr>

					<tr>
						<td>Posee Carnet Patria: <?php echo $carnet_Est?> </td>
						<td colspan="1">Código Carnet Patria: <?php echo $carnetpatria_Est['Código_Carnet']?> </td>
						<td colspan="2">Serial Carnet Patria: <?php echo $carnetpatria_Est['Serial_Carnet']?> </td>
					</tr>

					<tr>
						<td colspan="4">Acceso Internet: <?php echo $datos_sociales['Acceso_Internet']?> </td>
					</tr>

					<tr class="table-primary">
						<th colspan="4">Datos de Salud</th>
					</tr>

					<tr>
						<td>Índice: <?php echo $datos_Médicos['Índice'] ?> </td>
						<td>Talla: <?php echo $datos_Médicos['Estatura'] ?> CM</td>
						<td>Peso: <?php echo $datos_Médicos['Peso'] ?> KG</td>
						<td>C. Brazo: <?php echo $datos_Médicos['Circ_Braquial'] ?> CM</td>
					</tr>

					<tr>
						<td colspan="1">Talla Camisa: <?php echo $datos_tallas['Talla_Camisa']?> </td>
						<td colspan="1">Talla Pantalón: <?php echo $datos_tallas['Talla_Pantalón']?> </td>
						<td colspan="2">Talla Zapatos: <?php echo $datos_tallas['Talla_Zapatos']?> </td>
					</tr>

					<tr>
						<td colspan="1">Padece Alguna Enfermedad: <?php echo $PadeceEnfermedad ?> </td>
						<td colspan="3">Enfermedad: <?php echo $datos_Médicos['Enfermedad'] ?> </td>
					</tr>

					<tr>
						<td colspan="1">Tipo Sangre: <?php echo $datos_Médicos['Tipo_Sangre']?></td>
						<td colspan="3">Lateralidad: <?php echo $datos_Médicos['Lateralidad']?> </td>
					</tr>

					<tr>
						<td colspan="1">¿Fue vacunado contra el COVID-19?: <?php echo $datos_Médicos['Vacunado']?></td>
						<td colspan="1">¿Cuál vacuna? <?php echo $datos_Médicos['Vacuna']?> </td>
						<td colspan="1">Dosis aplicadas: <?php echo $datos_Médicos['Dosis']?></td>
						<td colspan="1">Lote: <?php echo $datos_Médicos['Lote']?> </td>
					</tr>

					<tr>
						<td colspan="4">Dieta Especial: <?php echo $datos_Médicos['Dieta_Especial']?></td>
					</tr>

					<tr>
						<td colspan="4">Impedimento Físico: <?php echo $datos_Médicos['Impedimento_Físico']?></td>
					</tr>

					<tr>
						<td colspan="4">Necesidad educativa especial: <?php echo $datos_Médicos['Necesidad_educativa']?></td>
					</tr>					

					<tr>
						<td colspan="1">Cond Vista: <?php echo $datos_Médicos['Cond_Vista']?></td>
						<td colspan="3">Cond Dental: <?php echo $datos_Médicos['Cond_Dental']?></td>
					</tr>

					<tr>
						<td colspan="1">Posee Carnet de Discapacidad <?php echo $carnet_dis?></td>
						<td colspan="3">Carnet Discapacidad: <?php echo $datos_Médicos['Carnet_Discapacidad']?></td>
					</tr>

					<tr>
						<td colspan="4">Institución Médica: <?php echo $datos_Médicos['Institución_Médica']?></td>
					</tr>

					<tr class="table-primary">
						<th colspan="4">Datos del representante</th>
					</tr>

					<tr>
						<td colspan="1">Nombres: <?php echo $datos_representante['Primer_Nombre']. ' ' . $datos_representante['Segundo_Nombre']?></td>
						<td colspan="1">Apellidos: <?php echo $datos_representante['Primer_Apellido'] . ' ' . $datos_representante['Segundo_Apellido']?></td>
						<td colspan="1">Cédula: <?php echo $datos_representante['Cédula']?></td>
						<td colspan="1">Edad: <?php echo $edad_diff_re->format('%y')?> Años</td>
					</tr>


					<tr>
						<td>Vínculo con el estudiante: <?php echo $Estudiante['Relación_Representante'] ?></td>
						<td colspan="1">Teléfono Principal: <?php echo telefono($telefonos_re[0]['Prefijo'],$telefonos_re[0]['Número_Telefónico'])?></td>
						<td colspan="2">Teléfono Secundario: <?php echo telefono($telefonos_re[1]['Prefijo'],$telefonos_re[1]['Número_Telefónico'])?></td>
					</tr>


					<tr>
						<td colspan="1">Fecha Nacimiento: <?php echo $datos_representante['Fecha_Nacimiento']?></td>
						<td colspan="2">Lugar Nacimiento: <?php echo $datos_representante['Lugar_Nacimiento']?></td>
						<td colspan="1">Estado Civil: <?php echo $datos_representante['Estado_Civil']?></td>
					</tr>

					<tr>
						<td colspan="4">Dirección: <?php echo $datos_representante['Dirección']?></td>
					</tr>

					<tr>
						<td colspan="4">Correo Electrónico: <?php echo $datos_representante['Correo_Electrónico']?></td>
					</tr>

					<tr>
						<td>Banco: <?php echo $datos_economicos['Banco']?></td>
						<td>Tipo Cuenta: <?php echo $datos_economicos['Tipo_Cuenta']?></td>
						<td colspan="2">Cta Bancaria: <?php echo $datos_economicos['Cta_Bancaria']?></td>
					</tr>
					<tr>
						<td> Posee carnet de la patria: <?php echo $carnet_re?></td>
						<td> Código carnet de la patria: <?php echo $carnetpatria_re['Código_Carnet']?></td>
						<td> Serial carnet de la patria: <?php echo $carnetpatria_re['Serial_Carnet']?></td>
						<td> Tiene más representados en el plantel: <?php echo $TieneMasHijos_re?></td>
					</tr>

					<tr class="table-primary">
						<th colspan="4">Datos laborales del representante</th>
					</tr>

					<tr>
						<td>Trabaja: <?php echo $tiene_empleo?></td>
						<td colspan="3">En qué se desempeña: <?php echo $datos_laborales['Empleo']?></td>
					</tr>

					<tr>
						<td colspan="1">Teléfono Trabajo: <?php echo telefono($telefonos_re[3]['Prefijo'],$telefonos_re[3]['Número_Telefónico'])?></td>
						<td colspan="3">Lugar Trabajo: <?php echo $datos_laborales['Lugar_Trabajo']?></td>
					</tr>

					<tr>
						<td colspan="1">Grado de Instrucción: <?php echo $datos_representante['Grado_Académico']?></td>
						<td colspan="1">Remuneración: (Cuántos sueldos mínimos): <?php echo $datos_laborales['Remuneración']?></td>
						<td colspan="2">Tipo Remuneración: <?php echo $datos_laborales['Tipo_Remuneración']?></td>
					</tr>

					<tr class="table-primary">
						<th colspan="4">Datos vivienda del representante</th>
					</tr>

					<tr>
						<td> Condiciones de la vivienda: <?php echo $datos_vivienda['Condiciones_Vivienda']?></td>
						<td> Tipo de vivienda: <?php echo $datos_vivienda['Tipo_Vivienda']?></td>
						<td colspan="2"> Tenencia de la vivienda: <?php echo $datos_vivienda['Tenencia_Vivienda']?></td>
					</tr>

					<tr class="table-primary">
						<th colspan="4">Otro contacto para emergencias</th>
					</tr>

					<tr>
						<td>
							Relación: 
							<?php echo $datos_auxiliar['Relación'] ?? NULL?>								
						</td>
						<td colspan="2"> 
							Nombre: 
							<?php echo $datos_auxiliar['Primer_Nombre'] ?? NULL; ?> 
							<?php echo $datos_auxiliar['Primer_Apellido'] ?? NULL; ?> 
						</td>
						<td colspan="2">
							Teléfono Principal: 
						<?php 

							try {
								if (!isset($datos_auxiliar['Prefijo'],$datos_auxiliar['Número_Telefónico'])) {
									throw new Exception('nulo');
								}
								else {
									echo telefono($datos_auxiliar['Prefijo'],$datos_auxiliar['Número_Telefónico']);
								}
							} catch (Exception $e) {
								echo ("No tiene");
							}

						?>		
						</td>
					</tr>

					<tr class="table-primary">
						<th colspan="4">Datos del padre</th>
					</tr>

					<tr>
						<td>Nombres: <?php echo $padre['Primer_Nombre'] . ' ' . $padre['Segundo_Nombre']?></td>
						<td>Apellidos: <?php echo $padre['Primer_Apellido'] . ' ' . $padre['Segundo_Apellido']?></td>
						<td>Cédula: <?php echo $padre['Cédula']?></td>
						<td>Edad: <?php echo $edad_diff_pa->format('%y')?> Años</td>
					</tr>

					<tr>
						<td colspan="2">
							Teléfono Principal: 
						<?php 

							try {
								if (!isset($telefonos_pa[0]['Prefijo'],$telefonos_pa[0]['Núpero_Telefónico'])) {
									throw new Exception('nulo');
								}
								else {
									echo telefono($telefonos_pa[0]['Prefijo'],$telefonos_pa[0]['Número_Telefónico']);
								}
							} catch (Exception $e) {
								echo ("No tiene");
							}

						?>		
						</td>
						<td colspan="2">
							Teléfono Secundario: 
						<?php 

							try {
								if (!isset($telefonos_pa[1]['Prefijo'],$telefonos_pa[1]['Número_Telefónico'])) {
									throw new Exception('nulo');
								}
								else {
									echo telefono($telefonos_pa[1]['Prefijo'],$telefonos_pa[1]['Número_Telefónico']);
								}
							} catch (Exception $e) {
								echo ("No tiene");
							}

						?>		
						</td>
					</tr>

					<tr>
						<td>Fecha Nacimiento: <?php echo $padre['Fecha_Nacimiento']?></td>
						<td colspan="2">Lugar Nacimiento: <?php echo $padre['Lugar_Nacimiento']?></td>
						<td colspan="2">Estado Civil: <?php echo $padre['Estado_Civil']?></td>
					</tr>

					<tr>
						<td colspan="2">Dirección: <?php echo $padre['Dirección']?></td>
						<td colspan="2">Correo Electrónico: <?php echo $padre['Correo_Electrónico']?></td>
					</tr>

					<tr>
						<td>Se encuentra en el país: <?php echo $SeEncuentraEnElPais_pa?></td>
						<td colspan="2"> 
						<?php
							if ($padre['País_Residencia'] == "Venezuela") {
								echo "Dónde: " ;
							}
							else {
								echo 'Dónde: ' . $padre['País_Residencia'];
							} 
						?>
						<td> Tiene más hijos en el plantel: <?php echo $TieneMasHijos_pa?></td>
					</tr>

					<tr class="table-primary">
						<th colspan="4">Datos laborales del padre</th>
					</tr>

					<tr>
						<td>Trabaja: <?php echo $tiene_empleo_pa?></td>
						<td colspan="3">En qué se desempeña: <?php echo $datos_laborales_pa['Empleo']?></td>
					</tr>

					<tr>
						<td colspan="2">
							Teléfono del trabajo: 
						<?php 

							try {
								if (!isset($telefonos_pa[2]['Prefijo'],$telefonos_pa[2]['Número_Telefónico'])) {
									throw new Exception('nulo');
								}
								else {
									echo telefono($telefonos_pa[2]['Prefijo'],$telefonos_pa[2]['Número_Telefónico']);
								}
							} catch (Exception $e) {
								echo ("No tiene");
							}

						?>		
						</td>
						<td colspan="3">Lugar Trabajo: <?php echo $datos_laborales_pa['Lugar_Trabajo']?></td>
					</tr>

					<tr>
						<td colspan="1">Grado de Instrucción: <?php echo $datos_padre['Grado_Académico']?></td>
						<td colspan="1">Remuneración: (Cuántos sueldos mínimos): <?php echo $datos_laborales_pa['Remuneración']?></td>
						<td colspan="2">Tipo Remuneración: <?php echo $datos_laborales_pa['Tipo_Remuneración']?></td>
					</tr>

					<tr class="table-primary">
						<th colspan="4">Datos vivienda del padre</th>
					</tr>

					<tr>
						<td> Condiciones de la vivienda: <?php echo $datos_vivienda_pa['Condiciones_Vivienda']?></td>
						<td> Tipo de vivienda: <?php echo $datos_vivienda_pa['Tipo_Vivienda']?></td>
						<td colspan="2"> Tenencia de la vivienda: <?php echo $datos_vivienda_pa['Tenencia_Vivienda']?></td>
					</tr>


					<tr class="table-primary">
						<th colspan="4">Datos de la madre</th>
					</tr>

					<tr>
						<td>Nombres: <?php echo $madre['Primer_Nombre'] . ' ' . $madre['Segundo_Nombre']?></td>
						<td>Apellidos: <?php echo $madre['Primer_Apellido'] . ' ' . $madre['Segundo_Apellido']?></td>
						<td>Cédula: <?php echo $madre['Cédula']?></td>
						<td>Edad: <?php echo $edad_diff_ma->format('%y')?> Años</td>
					</tr>

					<tr>
						<td colspan="2">
							Teléfono Principal: 
						<?php 

							try {
								if (!isset($telefonos_ma[0]['Prefijo'],$telefonos_ma[0]['Número_Telefónico'])) {
									throw new Exception('nulo');
								}
								else {
									echo telefono($telefonos_ma[0]['Prefijo'],$telefonos_ma[0]['Número_Telefónico']);
								}
							} catch (Exception $e) {
								echo ("No tiene");
							}

						?>		
						</td>
						<td colspan="2">
							Teléfono Secundario: 
						<?php 

							try {
								if (!isset($telefonos_ma[1]['Prefijo'],$telefonos_ma[1]['Número_Telefónico'])) {
									throw new Exception('nulo');
								}
								else {
									echo telefono($telefonos_ma[1]['Prefijo'],$telefonos_ma[1]['Número_Telefónico']);
								}
							} catch (Exception $e) {
								echo ("No tiene");
							}

						?>		
						</td>
					</tr>

					<tr>
						<td>Fecha Nacimiento: <?php echo $madre['Fecha_Nacimiento']?></td>
						<td colspan="2">Lugar Nacimiento: <?php echo $madre['Lugar_Nacimiento']?></td>
						<td colspan="2">Estado Civil: <?php echo $madre['Estado_Civil']?></td>
					</tr>

					<tr>
						<td colspan="2">Dirección: <?php echo $madre['Dirección']?></td>
						<td colspan="2">Correo Electrónico: <?php echo $madre['Correo_Electrónico']?></td>
					</tr>

					<tr>
						<td>Se encuentra en el país: <?php echo $SeEncuentraEnElPais_ma?></td>
						<td colspan="2"> <?php
									if ($madre['País_Residencia'] == "Venezuela") {
    									echo "Dónde: " ;
									}
									else {
    									echo 'Dónde: ' . $madre['País_Residencia'];
									} ?>
						<td> Tiene más hijos en el plantel: <?php echo $TieneMasHijos_ma?></td>									
					</tr>

					<tr class="table-primary">
						<th colspan="4">Datos laborales de la madre</th>
					</tr>

					<tr>
						<td>Trabaja: <?php echo $tiene_empleo_ma?></td>
						<td colspan="3">En qué se desempeña: <?php echo $datos_laborales_ma['Empleo']?></td>
					</tr>


	
					<tr>
						<td colspan="1">Teléfono Trabajo: 
						<?php 

							try {
								if (!isset($telefonos_ma[2]['Prefijo'],$telefonos_ma[2]['Número_Telefónico'])) {
									throw new Exception('nulo');
								}
								else {
									echo telefono($telefonos_ma[2]['Prefijo'],$telefonos_ma[2]['Número_Telefónico']);
								}
							} catch (Exception $e) {
								echo ("No tiene");
							}

						?>
						</td>
						<td colspan="3">Lugar Trabajo: <?php echo $datos_laborales_ma['Lugar_Trabajo']?></td>
					</tr>

					<tr>
						<td colspan="1">Grado de Instrucción: <?php echo $datos_madre['Grado_Académico']?></td>
						<td colspan="1">Remuneración: (Cuántos sueldos mínimos): <?php echo $datos_laborales_ma['Remuneración']?></td>
						<td colspan="2">Tipo Remuneración: <?php echo $datos_laborales_ma['Tipo_Remuneración']?></td>
					</tr>

					<tr class="table-primary">
						<th colspan="4">Datos vivienda de la madre</th>
					</tr>

					<tr>
						<td> Condiciones de la vivienda: <?php echo $datos_vivienda_ma['Condiciones_Vivienda']?></td>
						<td> Tipo de vivienda: <?php echo $datos_vivienda_ma['Tipo_Vivienda']?></td>
						<td colspan="2"> Tenencia de la vivienda: <?php echo $datos_vivienda_ma['Tenencia_Vivienda']?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="card-footer">
			<a class="btn btn-primary" href="consultar.php">Volver a consultar</a>
		</div>
	</div>
	<!--Footer-->
	<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-fixed bottom-0">
		<span class="text-white">Sistema de inscripción L.B. G.P.F <i class="far fa-copyright"></i> 2022 - <?php echo date("Y"); ?></span>
	</footer>
	<?php include '../ayuda.php'; ?>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>

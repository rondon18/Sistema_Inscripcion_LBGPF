<?php

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

require('../clases/Estudiante.php');
require('../clases/representantes.php');
require('../clases/carnet-patria.php');
require('../clases/económicos-representantes.php');
require('../clases/laborales-representantes.php');
require('../clases/padres.php');
require('../clases/ficha-médica.php');
require('../clases/sociales-Estudiantes.php');
require('../clases/tallas-Estudiantes.php');
require('../clases/grado.php');
require('../clases/vivienda-representantes.php');
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
$Padre = new Padres();
$Estudiantes_repitente = new EstudiantesRepitentes();
$Grado = new GradoAcadémico();
$Año = new Año_Escolar();
$Telefonos = new Teléfonos();

$datos_Medicos = new FichaMédica();
$Datos_sociales = new DatosSociales();
$Datos_Tallas = new TallasEstudiante();
$Datos_vivienda = new DatosVivienda();
$Datos_Auxiliar = new ContactoAuxiliar();

#Hacer algo parecido para llamar numeros de representantes y padres
$Estudiante = $Estudiante->consultarEstudiante($_POST['Cédula_Estudiante']);
$carnetpatria_Est = $CarnetPatria->consultarCarnetPatria($_POST['Cédula_Estudiante']);

$Estudiantes_repitente = $Estudiantes_repitente->consultarEstudiantesRepitentes($_POST['id_Estudiante']);
$grado = $Grado->consultarGrado($_POST['id_Estudiante']);
$telefonos_Est = $Telefonos->consultarTeléfonos($_POST['Cédula_Estudiante']);
$telefonos_re = $Telefonos->consultarTeléfonosRepresentanteID($_POST['id_representante']);
$telefonos_pa = $Telefonos->consultarTeléfonosPadreID($_POST['id_padre']);

$datos_medicos = $datos_Medicos->consultarFicha_Médica($_POST['id_Estudiante']);
$datos_sociales = $Datos_sociales->consultarDatosSociales($_POST['id_Estudiante']);
$datos_tallas = $Datos_Tallas->consultarTallasEstudiante($_POST['id_Estudiante']);
$datos_vivienda = $Datos_vivienda->consultarDatosvivienda($_POST['id_representante']);

$datos_representante = $Representante->consultarRepresentanteID($_POST['id_representante']);

$datos_auxiliar = $Datos_Auxiliar->consultarContactoAuxiliar($_POST['id_representante']);
$contacto_aux = new Personas();
$dat_contacto_aux = $contacto_aux->consultarPersona($datos_auxiliar['Cédula_Persona']);

$datos_economicos = $Economicos->consultarDatosEconómicos($_POST['id_representante']);
$datos_laborales = $Laborales->consultarDatosLaborales($_POST['id_representante']);


$padre = $Padre->consultarPadres($_POST['id_padre']);
$carnetpatria_pa = $CarnetPatria->consultarCarnetPatria($padre['Cédula']);
$hijos = $Padre->consultarHijos($_POST['id_padre']);

function telefono($prefijo,$numero) {
  if (empty($prefijo) and empty($numero)) {
    $telefono = "";
  }
  else {
    $telefono = "$prefijo-$numero";
  }
  return $telefono;
}

if (empty($carnetpatria_Est['Código_Carnet']) AND empty($carnetpatria_Est['Serial_Carnet'])) {
  $carnet_Est = "No";
}
else {
  $carnet_Est = "Si";
}

if (empty($carnetpatria_pa['Código_Carnet']) AND empty($carnetpatria_pa['Serial_Carnet'])) {
  $carnet_pa = "No";
}
else {
  $carnet_pa = "Si";
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
</head>
<body>

	<div class="card" style="width: 80%; margin: auto;">
		<div class="card-header">
			<h3>Datos de inscripción del Estudiante</h3>
		</div>
		<div class="card-body">
			<table id="Estudiante" class="table table-bordered" style="max-width:100%;">
				<tbody>
					<tr>
						<th colspan="4">Datos del Estudiante</th>
					</tr>

					<tr>
						<td>Nombres: <?php echo $Estudiante['Primer_Nombre']." ".$Estudiante['Segundo_Nombre']?></td>
						<td>Apellidos: <?php echo $Estudiante['Primer_Apellido']." ".$Estudiante['Segundo_Apellido']?></td>
						<td>Cédula: <?php echo $Estudiante['Cédula']?></td>
						<td>Género: <?php echo $Estudiante['Género']?></td>
					</tr>

					<tr>
						<td colspan="2">Fecha Nacimiento: <?php echo $Estudiante['Fecha_Nacimiento']?></td>
						<td colspan="2">Lugar Nacimiento: <?php echo $Estudiante['Lugar_Nacimiento']?></td>
					</tr>

					<tr>
						<td colspan="4">Dirección: <?php echo $Estudiante['Dirección']?></td>
					</tr>

					<tr>
						<td colspan="2">Correo Electrónico: <?php echo $Estudiante['Correo_Electrónico']?></td>
						<td colspan="2">Estado Civil: <?php echo $Estudiante['Estado_Civil']?></td>
					</tr>

					<tr>
						<td colspan="2">Teléfono Principal: <?php #echo $Estudiante['Teléfono_Principal']?></td>
						<td colspan="2">Teléfono Auxiliar: <?php #echo $Estudiante['Teléfono_Auxiliar']?></td>
					</tr>

					<tr>
						<td>Plantel Procedencia: <?php echo $Estudiante['Plantel_Procedencia']?></td>
						<td>Año a cursar: <?php echo $grado['Grado_A_Cursar']?></td>
						<td colspan="2">Periodo academico: <?php echo $Año->getInicio_Año_Escolar()."-".$Año->getFin_Año_Escolar()?></td>
					</tr>

					<tr>
						<th colspan="4">Datos médicos</th>
					</tr>

					<tr>
						<td>Estatura: <?php echo $datos_medicos['Estatura'] ?> </td>
						<td>Peso: <?php echo $datos_medicos['Peso'] ?> </td>
						<td>Indice: <?php echo $datos_medicos['Índice'] ?> </td>
						<td>Circ Braquial: <?php echo $datos_medicos['Circ_Braquial'] ?> </td>
					</tr>

					<tr>
						<td>Lateralidad: <?php echo $datos_medicos['Lateralidad'] ?> </td>
						<td>Tipo Sangre: <?php echo $datos_medicos['Tipo_Sangre']?></td>
					</tr>

					<tr>
						<td colspan="4">Medicación: <?php echo $datos_medicos['Medicación']?></td>
					</tr>

					<tr>
						<td colspan="4">Dieta Especial: <?php echo $datos_medicos['Dieta_Especial']?></td>
					</tr>

					<tr>
						<td colspan="4">Impedimento Físico: <?php echo $datos_medicos['Impedimento_Físico']?></td>
					</tr>

					<tr>
						<td colspan="4">Alergias: <?php echo $datos_medicos['Alergias']?></td>
					</tr>

					<tr>
						<td>Cond Vista: <?php echo $datos_medicos['Cond_Vista']?></td>
						<td>Cond Dental: <?php echo $datos_medicos['Cond_Dental']?></td>
						<td colspan="2">Carnet Discapacidad: <?php echo $datos_medicos['Carnet_Discapacidad']?></td>
					</tr>

					<tr>
						<td colspan="4">Institución Médica: <?php echo $datos_medicos['Institución_Médica']?></td>
					</tr>

					<tr>
						<th colspan="4">Datos sociales</th>
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

					<tr>
						<th colspan="4">Tallas</th>
					</tr>

					<tr>
						<td>Talla Camisa: <?php echo $datos_tallas['Talla_Camisa']?> </td>
						<td>Talla Pantalón: <?php echo $datos_tallas['Talla_Pantalón']?> </td>
						<td>Talla Zapatos: <?php echo $datos_tallas['Talla_Zapatos']?> </td>
					</tr>

					<tr>
						<th colspan="4">Datos del representante</th>
					</tr>

					<tr>
						<td>Nombres: <?php echo $datos_representante['Primer_Nombre']. ' ' . $datos_representante['Segundo_Nombre']?></td>
						<td>Apellidos: <?php echo $datos_representante['Primer_Apellido'] . ' ' . $datos_representante['Segundo_Apellido']?></td>
						<td>Cédula: <?php echo $datos_representante['Cédula']?></td>
						<td>Género: <?php echo $datos_representante['Género']?></td>
					</tr>

					<tr>
						<td colspan="2">Fecha Nacimiento: <?php echo $datos_representante['Fecha_Nacimiento']?></td>
						<td colspan="2">Lugar Nacimiento: <?php echo $datos_representante['Lugar_Nacimiento']?></td>
					</tr>

					<tr>
						<td colspan="4">Dirección: <?php echo $datos_representante['Dirección']?></td>
					</tr>

					<tr>
						<td colspan="2">Correo Electrónico: <?php echo $datos_representante['Correo_Electrónico']?></td>
						<td colspan="2">Estado Civil: <?php echo $datos_representante['Estado_Civil']?></td>
					</tr>

					<tr>
						<td colspan="2">Teléfono Principal: <?php echo telefono($telefonos_re[0]['Prefijo'],$telefonos_re[0]['Número_Telefónico'])?></td>
						<td colspan="2">Teléfono Auxiliar: <?php echo telefono($telefonos_re[1]['Prefijo'],$telefonos_re[1]['Número_Telefónico'])?></td>
					</tr>

					<tr>
						<th colspan="4">Datos economicos</th>
					</tr>

					<tr>
						<td>Banco: <?php echo $datos_economicos['Banco']?></td>
						<td>Tipo Cuenta: <?php echo $datos_economicos['Tipo_Cuenta']?></td>
						<td colspan="2">Cta Bancaria: <?php echo $datos_economicos['Cta_Bancaria']?></td>
					</tr>

					<tr>
						<td colspan="4">Grado de Instrucción: <?php echo $datos_representante['Grado_Académico']?></td>
					</tr>

					<tr>
						<td colspan="2">Empleo: <?php echo $datos_laborales['Empleo']?></td>
						<td colspan="2">Teléfono Trabajo: <?php echo telefono($telefonos_re[3]['Prefijo'],$telefonos_re[3]['Número_Telefónico'])?></td>
					</tr>

					<tr>
						<td colspan="2">Remuneración (Cuántos sueldos mínimos): <?php echo $datos_laborales['Remuneración']?></td>
						<td colspan="2">Tipo Remuneración: <?php echo $datos_laborales['Tipo_Remuneración']?></td>
					</tr>

					<tr>
						<td colspan="4">Lugar Trabajo: <?php echo $datos_laborales['Lugar_Trabajo']?></td>
					</tr>

					<tr>
						<th colspan="4">Datos del padre o madre</th>
					</tr>

					<tr>
						<td>Nombres: <?php echo $padre['Primer_Nombre'] . ' ' . $padre['Segundo_Nombre']?></td>
						<td>Apellidos: <?php echo $padre['Primer_Apellido'] . ' ' . $padre['Segundo_Apellido']?></td>
						<td>Cédula: <?php echo $padre['Cédula']?></td>
						<td>Género: <?php echo $padre['Género']?></td>
					</tr>

					<tr>
						<td>Fecha Nacimiento: <?php echo $padre['Fecha_Nacimiento']?></td>
						<td colspan="2">Lugar Nacimiento: <?php echo $padre['Lugar_Nacimiento']?></td>
						<td colspan="2">Parentesco: <?php echo $Estudiante['Relación_Padre']?></td>
					</tr>

					<tr>
						<td colspan="4">Dirección: <?php echo $padre['Dirección']?></td>
					</tr>

					<tr>
						<td colspan="2">Correo Electrónico: <?php echo $padre['Correo_Electrónico']?></td>
						<td colspan="2">Estado Civil: <?php echo $padre['Estado_Civil']?></td>
					</tr>

					<tr>
						<td colspan="2">Teléfono Principal: <?php echo $telefonos_pa[0]['Prefijo'] . '-' . $telefonos_pa[0]['Número_Telefónico']?></td>
						<td colspan="2">Teléfono Auxiliar: <?php echo $telefonos_pa[1]['Prefijo'] . '-' . $telefonos_pa[1]['Número_Telefónico']?></td>
					</tr>

				</tbody>
			</table>
		</div>
		<div class="card-footer">
			<a class="btn btn-primary" href="consultar.php">Volver a consultar</a>
		</div>
		</div>
	</div>
<script type="text/javascript" src="../js/bootstrap.bundle.min"></script>
</body>
</html>

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
require('../clases/Teléfonos.php');

require('../controladores/conexion.php');

require('../clases/bitácora.php');

$conexion = conectarBD();

$Estudiante = new Estudiantes();
$CarnetPatria = new CarnetPatria();
$Representante = new Representantes();
$económicos = new Datoseconómicos();
$Laborales = new DatosLaborales();
$Padre = new Padres();
$Estudiantes_repitente = new EstudiantesRepitentes();
$Grado = new GradoAcadémico();
$Año = new Año_Escolar();
$Teléfonos = new Teléfonos();

$datos_Médicos = new Fichamédica();
$Datos_sociales = new DatosSociales();
$Datos_Tallas = new TallasEstudiante();
$Datos_vivienda = new DatosVivienda();
$Datos_Auxiliar = new ContactoAuxiliar();

$Estudiante = $Estudiante->consultarEstudiante($_POST['Cédula_Estudiante']);
$carnetpatria_Est = $CarnetPatria->consultarCarnetPatria($_POST['Cédula_Estudiante']);

$Estudiantes_repitente = $Estudiantes_repitente->consultarEstudiantesRepitentes($_POST['id_Estudiante']);
$grado = $Grado->consultarGrado($_POST['id_Estudiante']);
$Teléfonos_Est = $Teléfonos->consultarTeléfonos($_POST['Cédula_Estudiante']);
$Teléfonos_re = $Teléfonos->consultarTeléfonosRepresentanteID($_POST['id_representante']);
$Teléfonos_pa = $Teléfonos->consultarTeléfonosPadreID($_POST['id_padre']);

$datos_Médicos = $datos_Médicos->consultarFicha_médica($_POST['id_Estudiante']);
$datos_sociales = $Datos_sociales->consultarDatosSociales($_POST['id_Estudiante']);
$datos_tallas = $Datos_Tallas->consultarTallasEstudiante($_POST['id_Estudiante']);
$datos_vivienda = $Datos_vivienda->consultarDatosvivienda($_POST['id_representante']);

$datos_representante = $Representante->consultarRepresentanteID($_POST['id_representante']);

$datos_auxiliar = $Datos_Auxiliar->consultarContactoAuxiliar($_POST['id_representante']);
$contacto_aux = new Personas();
$dat_contacto_aux = $contacto_aux->consultarPersona($datos_auxiliar['Cédula_Persona']);

$datos_económicos = $económicos->consultarDatoseconómicos($_POST['id_representante']);
$datos_laborales = $Laborales->consultarDatosLaborales($_POST['id_representante']);


$padre = $Padre->consultarPadres($_POST['id_padre']);
$carnetpatria_pa = $CarnetPatria->consultarCarnetPatria($padre['Cédula']);
$hijos = $Padre->consultarHijos($_POST['id_padre']);

function Teléfono($prefijo,$numero) {
  if (empty($prefijo) and empty($numero)) {
    $Teléfono = "";
  }
  else {
    $Teléfono = "$prefijo-$numero";
  }
  return $Teléfono;
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


function calculaedad($fechanacimiento){
  list($ano,$mes,$dia) = explode("-",$fechanacimiento);
  $ano_diferencia  = date("Y") - $ano;
  $mes_diferencia = date("m") - $mes;
  $dia_diferencia   = date("d") - $dia;
  if ($dia_diferencia < 0 || $mes_diferencia < 0)
    $ano_diferencia--;
  return $ano_diferencia;
}


desconectarBD($conexion);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Consultar registros</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/colores.css"/>
</head>
<body>

	<div class="card" style="max-width: 90%; margin: 60px auto;">
		<div class="card-header">
			<h3>Datos de inscripción del Estudiante</h3>
		</div>
		<div class="card-body">
<<<<<<< HEAD
			<table id="estudiante" class="table table-bordered w-100" style="max-width:100%;">
				<tr>
					<th colspan="4">Datos del estudiante</th>
				</tr>
				<tr>
					<td colspan="2">Nombres: <?php echo $estudiante['Primer_Nombre']." ".$estudiante['Segundo_Nombre']?></td>
					<td colspan="2">Apellidos: <?php echo $estudiante['Primer_Apellido']." ".$estudiante['Segundo_Apellido']?></td>
				</tr>
				<tr>
					<td>Cédula: <?php echo $estudiante['Cédula']?></td>
					<td>Edad: <?php echo calculaedad($estudiante['Fecha_Nacimiento'])." Años"; ?></td>
					<td>Teléfonos: <?php echo "";?></td>
				</tr>
				<tr>
					<td>Género: <?php echo $estudiante['Género']?></td>
				</tr>
			</table>
			<table id="estudiante" class="table table-bordered w-100" style="max-width:100%;">

				<tr>
					<td>Fecha_Nacimiento: <?php echo $estudiante['Fecha_Nacimiento']?></td>
					<td>Lugar_Nacimiento: <?php echo $estudiante['Lugar_Nacimiento']?></td>
				</tr>
				<tr>
					<td>Dirección: <?php echo $estudiante['Dirección']?></td>
				</tr>
				<tr>
					<td>Correo_Electronico: <?php echo $estudiante['Correo_Electrónico']?></td>
					<td>Estado_Civil: <?php echo $estudiante['Estado_Civil']?></td>
				</tr>
				<tr>
					<td>Teléfono_Principal: <?php #echo $estudiante['Teléfono_Principal']?></td>
					<td>Teléfono_Auxiliar: <?php #echo $estudiante['Teléfono_Auxiliar']?></td>
				</tr>
				<tr>
					<td>Plantel_Procedencia: <?php echo $estudiante['Plantel_Procedencia']?></td>
					<td>Año a cursar: <?php #echo $grado['Grado_A_Cursar']?></td>
					<td>Periodo academico: <?php echo $Año->getInicio_Año_Escolar()."-".$Año->getFin_Año_Escolar()?></td>
				</tr>
				<tr>
					<th>Datos médicos</th>
				</tr>
				<tr>
					<td>Estatura: <?php echo $datos_salud['Estatura'] ?> </td>
					<td>Peso: <?php echo $datos_salud['Peso'] ?> </td>
					<td>Indice: <?php echo $datos_salud['Indice'] ?> </td>
					<td>Circ_Braquial: <?php echo $datos_salud['Circ_Braquial'] ?> </td>
				</tr>
				<tr>
					<td>Lateralidad: <?php echo $datos_salud['Lateralidad'] ?> </td>
					<td>Tipo_Sangre: <?php echo $datos_salud['Tipo_Sangre']?></td>
				</tr>
				<tr>
					<td>Medicación: <?php echo $datos_salud['Medicación']?></td>
				</tr>
				<tr>
					<td>Dieta_Especial: <?php echo $datos_salud['Dieta_Especial']?></td>
				</tr>
				<tr>
					<td>Impedimento_Físico: <?php echo $datos_salud['Impedimento_Físico']?></td>
				</tr>
				<tr>
					<td>Alergias: <?php echo $datos_salud['Alergias']?></td>
				</tr>
				<tr>
					<td>Cond_Vista: <?php echo $datos_salud['Cond_Vista']?></td>
					<td>Cond_Dental: <?php echo $datos_salud['Cond_Dental']?></td>
					<td>Carnet_Discapacidad: <?php echo $datos_salud['Carnet_Discapacidad']?></td>
				</tr>
				<tr>
					<td>Institucion_Medica: <?php echo $datos_salud['Institucion_Medica']?></td>
				</tr>
=======
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
						<td colspan="2">Período Académico: <?php echo $Año->getInicio_Año_Escolar()."-".$Año->getFin_Año_Escolar()?></td>
					</tr>
					<tr>
						<th colspan="4">Datos médicos</th>
					</tr>
					<tr>
						<td>Estatura: <?php echo $datos_Médicos['Estatura'] ?> </td>
						<td>Peso: <?php echo $datos_Médicos['Peso'] ?> </td>
						<td>Índice: <?php echo $datos_Médicos['Índice'] ?> </td>
						<td>Circ Braquial: <?php echo $datos_Médicos['Circ_Braquial'] ?> </td>
					</tr>
					<tr>
						<td>Lateralidad: <?php echo $datos_Médicos['Lateralidad'] ?> </td>
						<td>Tipo Sangre: <?php echo $datos_Médicos['Tipo_Sangre']?></td>
					</tr>
					<tr>
						<td colspan="4">médicación: <?php echo $datos_Médicos['médicación']?></td>
					</tr>
					<tr>
						<td colspan="4">Dieta Especial: <?php echo $datos_Médicos['Dieta_Especial']?></td>
					</tr>
					<tr>
						<td colspan="4">Impedimento Físico: <?php echo $datos_Médicos['Impedimento_Físico']?></td>
					</tr>
					<tr>
						<td colspan="4">Alergias: <?php echo $datos_Médicos['Alergias']?></td>
					</tr>
						<td>Cond Vista: <?php echo $datos_Médicos['Cond_Vista']?></td>
						<td>Cond Dental: <?php echo $datos_Médicos['Cond_Dental']?></td>
						<td colspan="2">Carnet Discapacidad: <?php echo $datos_Médicos['Carnet_Discapacidad']?></td>
					</tr>
					<tr>
						<td colspan="4">Institución médica: <?php echo $datos_Médicos['Institución_médica']?></td>
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
						<td colspan="2">Teléfono Principal: <?php echo Teléfono($Teléfonos_re[0]['Prefijo'],$Teléfonos_re[0]['Número_Telefónico'])?></td>
						<td colspan="2">Teléfono Auxiliar: <?php echo Teléfono($Teléfonos_re[1]['Prefijo'],$Teléfonos_re[1]['Número_Telefónico'])?></td>
					</tr>
					<tr>
						<th colspan="4">Datos económicos</th>
					</tr>
					<tr>
						<td>Banco: <?php echo $datos_económicos['Banco']?></td>
						<td>Tipo Cuenta: <?php echo $datos_económicos['Tipo_Cuenta']?></td>
						<td colspan="2">Cta Bancaria: <?php echo $datos_económicos['Cta_Bancaria']?></td>
					</tr>
					<tr>
						<td colspan="4">Grado Inst: <?php echo $datos_representante['Grado_Académico']?></td>
					</tr>
					<tr>
						<td colspan="2">Empleo: <?php echo $datos_laborales['Empleo']?></td>
						<td colspan="2">Teléfono Trabajo: <?php echo Teléfono($Teléfonos_re[3]['Prefijo'],$Teléfonos_re[3]['Número_Telefónico'])?></td>
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
						<td colspan="2">Teléfono Principal: <?php echo $Teléfonos_pa[0]['Prefijo'] . '-' . $Teléfonos_pa[0]['Número_Telefónico']?></td>
						<td colspan="2">Teléfono Auxiliar: <?php echo $Teléfonos_pa[1]['Prefijo'] . '-' . $Teléfonos_pa[1]['Número_Telefónico']?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="card-footer">
			<div class="card text-center" style="width: 100%; margin-top: 20px;">
			<a class="btn btn-primary" href="consultar.php">Volver a consultar</a>
		</div>
		</div>
>>>>>>> 87807ec40e922f63ad2a26eddf23958b08baddff

				<tr>
					<th>Datos sociales</th>
				</tr>
				<tr>
					<td>Posee_Canaima: <?php echo $datos_sociales['Posee_Canaima']?> </td>
					<td>Condicion_Canaima: <?php echo $datos_sociales['Condicion_Canaima']?> </td>
				</tr>
				<tr>
					<td>Posee_Carnet_Patria: <?php echo $datos_sociales['Posee_Carnet_Patria']?> </td>
					<td>Codigo_Carnet_Patria: <?php echo $datos_sociales['Codigo_Carnet_Patria']?> </td>
					<td>Serial_Carnet_Patria: <?php echo $datos_sociales['Serial_Carnet_Patria']?> </td>
				</tr>
				<tr>
					<td>Acceso_Internet: <?php echo $datos_sociales['Acceso_Internet']?> </td>
				</tr>
				<tr>
					<th>Tallas</th>
				</tr>
				<tr>
					<td>Talla_Camisa: <?php echo $datos_tallas['Talla_Camisa']?> </td>
					<td>Talla_Pantalón: <?php echo $datos_tallas['Talla_Pantalón']?> </td>
					<td>Talla_Zapatos: <?php echo $datos_tallas['Talla_Zapatos']?> </td>
				</tr>
				<tr>
					<th>Datos del representante</th>
				</tr>
				<tr>
					<td>Nombres: <?php echo $representante['Primer_Nombre']?></td>
					<td>Apellidos: <?php echo $representante['Apellidos']?></td>
					<td>Cédula: <?php echo $representante['Cédula']?></td>
					<td>Género: <?php echo $representante['Género']?></td>
				</tr>
				<tr>
					<td>Fecha_Nacimiento: <?php echo $representante['Fecha_Nacimiento']?></td>
					<td>Lugar_Nacimiento: <?php echo $representante['Lugar_Nacimiento']?></td>
				</tr>
				<tr>
					<td>Dirección: <?php echo $representante['Dirección']?></td>
				</tr>
				<tr>
					<td>Correo_Electronico: <?php echo $representante['Correo_Electronico']?></td>
					<td>Estado_Civil: <?php echo $representante['Estado_Civil']?></td>
				</tr>
				<tr>
					<td>Teléfono_Principal: <?php echo $representante['Teléfono_Principal']?></td>
					<td>Teléfono_Auxiliar: <?php echo $representante['Teléfono_Auxiliar']?></td>
				</tr>
				<tr>
					<th>Datos economicos</th>
				</tr>
				<tr>
					<td>Banco: <?php echo $representante['Banco']?></td>
					<td>Tipo_Cuenta: <?php echo $representante['Tipo_Cuenta']?></td>
					<td>Cta_Bancaria: <?php echo $representante['Cta_Bancaria']?></td>
				</tr>
				<tr>
					<td>Grado_Inst: <?php echo $representante['Grado_Inst']?></td>
				</tr>
				<tr>
					<td>Empleo: <?php echo $representante['Empleo']?></td>
					<td>Teléfono_Trabajo: <?php echo $representante['Teléfono_Trabajo']?></td>
				</tr>
				<tr>
					<td>Remuneracion: <?php echo $representante['Remuneracion']?> Bs. (Aprox.)</td>
					<td>Tipo_Remuneración: <?php echo $representante['Tipo_Remuneración']?></td>
				</tr>
				<tr>
					<td>Lugar_Trabajo: <?php echo $representante['Lugar_Trabajo']?></td>
				</tr>
				<tr>
					<th>Datos del padre o madre</th>
				</tr>
				<tr>
					<td>Nombres: <?php echo $padre['Primer_Nombre']?></td>
					<td>Apellidos: <?php echo $padre['Apellidos']?></td>
					<td>Cédula: <?php echo $padre['Cédula']?></td>
					<td>Género: <?php echo $padre['Género']?></td>
				</tr>
				<tr>
					<td>Fecha_Nacimiento: <?php echo $padre['Fecha_Nacimiento']?></td>
					<td>Lugar_Nacimiento: <?php echo $padre['Lugar_Nacimiento']?></td>
					<td>Parentezco: <?php echo $padre['Parentezco']?></td>
				</tr>
				<tr>
					<td>Dirección: <?php echo $padre['Dirección']?></td>
				</tr>
				<tr>
					<td>Correo_Electronico: <?php echo $padre['Correo_Electronico']?></td>
					<td>Estado_Civil: <?php echo $padre['Estado_Civil']?></td>
				</tr>
				<tr>
					<td>Teléfono_Principal: <?php echo $padre['Teléfono_Principal']?></td>
					<td>Teléfono_Auxiliar: <?php echo $padre['Teléfono_Auxiliar']?></td>
				</tr>
			</table>
		</div>
		<div class="card-footer">

		</div>
	</div>
<script type="text/javascript" src="../js/bootstrap.bundle.min"></script>
</body>
</html>

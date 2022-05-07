<?php

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

require('../clases/estudiante.php');
require('../clases/representantes.php');
require('../clases/padres.php');

require('../clases/ficha-medica.php');
require('../clases/sociales-estudiantes.php');
require('../clases/tallas-estudiantes.php');

require('../clases/carnet-patria.php');

require('../clases/grado.php');
require('../clases/año-escolar.php');
require('../clases/estudiantes-repitentes.php');

require('../controladores/conexion.php');

$conexion = conectarBD();

$Estudiante = new Estudiantes();
$Representante = new Representantes();
$Padre = new Padres();

$Datos_salud = new FichaMedica();
$Datos_sociales = new DatosSociales();
$Datos_Tallas = new TallasEstudiante();
$Estudiante_repitente = new EstudiantesRepitentes();
$Grado = new GradoAcademico();
$Año = new Año_Escolar();
$Carnet =

$estudiante = $Estudiante->consultarEstudiante($_POST['cedula_Estudiante']);

$datos_salud = $Datos_salud->consultarFicha_Medica($estudiante['idEstudiantes']);
$datos_sociales = $Datos_sociales->consultarDatosSociales($estudiante['idEstudiantes']);
$datos_tallas = $Datos_Tallas->consultarTallasEstudiante($estudiante['idEstudiantes']);

$representante = $Representante->consultarRepresentante($_POST['id_representante']);

$estudiante_repitente = $Estudiante_repitente->consultarEstudiantesRepitentes($_POST['cedula_Estudiante']);
$grado = $Grado->consultarGrado($_POST['cedula_Estudiante']);

$padre = $Padre->consultarPadres($estudiante['idPadre']);

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

	<div class="card" style="width: 80%; margin: auto;">
		<div class="card-header">
			<h3>Datos de inscripción del estudiante</h3>
		</div>
		<div class="card-body">
			<table id="estudiante" class="table table-bordered" style="max-width:100%;">
				<tbody>
					<tr>
						<th colspan="4">Datos del estudiante</th>
					</tr>
					<tr>
						<td>Nombres: <?php echo $estudiante['Primer_Nombre']." ".$estudiante['Segundo_Nombre']?></td>
						<td>Apellidos: <?php echo $estudiante['Primer_Apellido']." ".$estudiante['Segundo_Apellido']?></td>
						<td>Cédula: <?php echo $estudiante['Cédula']?></td>
						<td>Género: <?php echo $estudiante['Género']?></td>
					</tr>
					<tr>
						<td colspan="2">Fecha_Nacimiento: <?php echo $estudiante['Fecha_Nacimiento']?></td>
						<td colspan="2">Lugar_Nacimiento: <?php echo $estudiante['Lugar_Nacimiento']?></td>
					</tr>
					<tr>
						<td colspan="4">Dirección: <?php echo $estudiante['Dirección']?></td>
					</tr>
					<tr>
						<td colspan="2">Correo_Electronico: <?php echo $estudiante['Correo_Electrónico']?></td>
						<td colspan="2">Estado_Civil: <?php echo $estudiante['Estado_Civil']?></td>
					</tr>
					<tr>
						<td colspan="2">Teléfono_Principal: <?php #echo $estudiante['Teléfono_Principal']?></td>
						<td colspan="2">Teléfono_Auxiliar: <?php #echo $estudiante['Teléfono_Auxiliar']?></td>
					</tr>
					<tr>
						<td>Plantel_Procedencia: <?php echo $estudiante['Plantel_Procedencia']?></td>
						<td>Año a cursar: <?php #echo $grado['Grado_A_Cursar']?></td>
						<td colspan="2">Periodo academico: <?php echo $Año->getInicio_Año_Escolar()."-".$Año->getFin_Año_Escolar()?></td>
					</tr>
					<tr>
						<th colspan="4">Datos médicos</th>
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
						<td colspan="4">Medicación: <?php echo $datos_salud['Medicación']?></td>
					</tr>
					<tr>
						<td colspan="4">Dieta_Especial: <?php echo $datos_salud['Dieta_Especial']?></td>
					</tr>
					<tr>
						<td colspan="4">Impedimento_Físico: <?php echo $datos_salud['Impedimento_Físico']?></td>
					</tr>
					<tr>
						<td colspan="4">Alergias: <?php echo $datos_salud['Alergias']?></td>
					</tr>
						<td>Cond_Vista: <?php echo $datos_salud['Cond_Vista']?></td>
						<td>Cond_Dental: <?php echo $datos_salud['Cond_Dental']?></td>
						<td colspan="2">Carnet_Discapacidad: <?php echo $datos_salud['Carnet_Discapacidad']?></td>
					</tr>
					<tr>
						<td colspan="4">Institucion_Medica: <?php echo $datos_salud['Institucion_Medica']?></td>
					</tr>

					<tr>
						<th colspan="4">Datos sociales</th>
					</tr>
					<tr>
						<td>Posee_Canaima: <?php echo $datos_sociales['Posee_Canaima']?> </td>
						<td colspan="3">Condicion_Canaima: <?php echo $datos_sociales['Condicion_Canaima']?> </td>
					</tr>
					<tr>
						<td>Posee_Carnet_Patria: <?php echo $datos_sociales['Posee_Carnet_Patria']?> </td>
						<td colspan="1">Codigo_Carnet_Patria: <?php echo $datos_sociales['Codigo_Carnet_Patria']?> </td>
						<td colspan="2">Serial_Carnet_Patria: <?php echo $datos_sociales['Serial_Carnet_Patria']?> </td>
					</tr>
					<tr>
						<td colspan="4">Acceso_Internet: <?php echo $datos_sociales['Acceso_Internet']?> </td>
					</tr>
					<tr>
						<th colspan="4">Tallas</th>
					</tr>
					<tr>
						<td>Talla_Camisa: <?php echo $datos_tallas['Talla_Camisa']?> </td>
						<td>Talla_Pantalón: <?php echo $datos_tallas['Talla_Pantalón']?> </td>
						<td>Talla_Zapatos: <?php echo $datos_tallas['Talla_Zapatos']?> </td>
					</tr>
					<tr>
						<th colspan="4">Datos del representante</th>
					</tr>
					<tr>
						<td>Nombres: <?php echo $representante['Primer_Nombre']?></td>
						<td>Apellidos: <?php echo $representante['Apellidos']?></td>
						<td>Cédula: <?php echo $representante['Cédula']?></td>
						<td>Género: <?php echo $representante['Género']?></td>
					</tr>
					<tr>
						<td colspan="2">Fecha_Nacimiento: <?php echo $representante['Fecha_Nacimiento']?></td>
						<td colspan="2">Lugar_Nacimiento: <?php echo $representante['Lugar_Nacimiento']?></td>
					</tr>
					<tr>
						<td colspan="4">Dirección: <?php echo $representante['Dirección']?></td>
					</tr>
					<tr>
						<td colspan="2">Correo_Electronico: <?php echo $representante['Correo_Electronico']?></td>
						<td colspan="2">Estado_Civil: <?php echo $representante['Estado_Civil']?></td>
					</tr>
					<tr>
						<td colspan="2">Teléfono_Principal: <?php echo $representante['Teléfono_Principal']?></td>
						<td colspan="2">Teléfono_Auxiliar: <?php echo $representante['Teléfono_Auxiliar']?></td>
					</tr>
					<tr>
						<th colspan="4">Datos economicos</th>
					</tr>
					<tr>
						<td>Banco: <?php echo $representante['Banco']?></td>
						<td>Tipo_Cuenta: <?php echo $representante['Tipo_Cuenta']?></td>
						<td colspan="2">Cta_Bancaria: <?php echo $representante['Cta_Bancaria']?></td>
					</tr>
					<tr>
						<td colspan="4">Grado_Inst: <?php echo $representante['Grado_Inst']?></td>
					</tr>
					<tr>
						<td colspan="2">Empleo: <?php echo $representante['Empleo']?></td>
						<td colspan="2">Teléfono_Trabajo: <?php echo $representante['Teléfono_Trabajo']?></td>
					</tr>
					<tr>
						<td colspan="2">Remuneracion: <?php echo $representante['Remuneracion']?> Bs. (Aprox.)</td>
						<td colspan="2">Tipo_Remuneración: <?php echo $representante['Tipo_Remuneración']?></td>
					</tr>
					<tr>
						<td colspan="4">Lugar_Trabajo: <?php echo $representante['Lugar_Trabajo']?></td>
					</tr>
					<tr>
						<th colspan="4">Datos del padre o madre</th>
					</tr>
					<tr>
						<td>Nombres: <?php echo $padre['Primer_Nombre']?></td>
						<td>Apellidos: <?php echo $padre['Apellidos']?></td>
						<td>Cédula: <?php echo $padre['Cédula']?></td>
						<td>Género: <?php echo $padre['Género']?></td>
					</tr>
					<tr>
						<td>Fecha_Nacimiento: <?php echo $padre['Fecha_Nacimiento']?></td>
						<td colspan="2">Lugar_Nacimiento: <?php echo $padre['Lugar_Nacimiento']?></td>
						<td colspan="2">Parentezco: <?php echo $padre['Parentezco']?></td>
					</tr>
					<tr>
						<td colspan="4">Dirección: <?php echo $padre['Dirección']?></td>
					</tr>
					<tr>
						<td colspan="2">Correo_Electronico: <?php echo $padre['Correo_Electronico']?></td>
						<td colspan="2">Estado_Civil: <?php echo $padre['Estado_Civil']?></td>
					</tr>
					<tr>
						<td colspan="2">Teléfono_Principal: <?php echo $padre['Teléfono_Principal']?></td>
						<td colspan="2">Teléfono_Auxiliar: <?php echo $padre['Teléfono_Auxiliar']?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="card-footer">

		</div>


		</div>
	</div>
<script type="text/javascript" src="../js/bootstrap.bundle.min"></script>
</body>
</html>

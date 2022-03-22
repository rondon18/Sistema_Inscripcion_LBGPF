<?php 

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

require('../clases/alumno.php');
require('../clases/representantes.php');
require('../clases/padres.php');
require('../controladores/conexion.php');
$conexion = conectarBD();

$Alumno = new Alumnos();
$Representante = new Representantes();
$Padre = new Padres();



$alumno = $Alumno->consultarAlumno($_POST['id_alumno']);
$representante = $Representante->consultarRepresentante($_POST['id_representante']);


desconectarBD($conexion);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Consultar registros
	</title>
</head>
<body>

	<table border="1" cellpadding="8" align="center">
		<tr>
			<th colspan="4">Datos del alumno</th>
		</tr>
		<tr>
			<td>Nombres: <?php echo $alumno['Nombres']?></td>
			<td>Apellidos: <?php echo $alumno['Apellidos']?></td>
			<td>Cédula: <?php echo $alumno['Cédula']?></td>
			<td>Género: <?php echo $alumno['Género']?></td>
		</tr>
		<tr>
			<td colspan="2">Fecha_Nacimiento: <?php echo $alumno['Fecha_Nacimiento']?></td>
			<td colspan="2">Lugar_Nacimiento: <?php echo $alumno['Lugar_Nacimiento']?></td>
		</tr>
		<tr>
			<td colspan="4">Dirección: <?php echo $alumno['Dirección']?></td>
		</tr>
		<tr>
			<td colspan="2">Correo_Electronico: <?php echo $alumno['Correo_Electronico']?></td>
			<td colspan="2">Estado_Civil: <?php echo $alumno['Estado_Civil']?></td>
		</tr>
		<tr>
			<td colspan="2">Teléfono_Principal: <?php echo $alumno['Teléfono_Principal']?></td>
			<td colspan="2">Teléfono_Auxiliar: <?php echo $alumno['Teléfono_Auxiliar']?></td>
		</tr>
		<tr>
			<td colspan="4">Plantel_Procedencia: <?php echo $alumno['Plantel_Procedencia']?></td>
		</tr>
		<tr>
			<th colspan="4">Datos del representante</th>
		</tr>
		<tr>
			<td>Nombres: <?php echo $representante['Nombres']?></td>
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
			<th colspan="4">Datos médicos</th>
		</tr>
		<tr>
			<th colspan="4">Datos sociales</th>
		</tr>
		<tr>
			<th colspan="4">Tallas</th>
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
	</table>

</body>
</html>
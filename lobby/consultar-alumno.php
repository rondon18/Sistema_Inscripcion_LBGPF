<?php 

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

require('../clases/alumno.php');
require('../clases/representantes.php');
require('../clases/padres.php');
require('../clases/ficha-medica.php');
require('../clases/sociales-alumnos.php');
require('../clases/tallas-alumnos.php');
require('../controladores/conexion.php');
$conexion = conectarBD();

$Alumno = new Alumnos();
$Representante = new Representantes();
$Padre = new Padres();

$Datos_medicos = new FichaMedica();
$Datos_sociales = new DatosSociales();
$Datos_Tallas = new TallasAlumno();

$alumno = $Alumno->consultarAlumno($_POST['id_alumno']);

$datos_medicos = $Datos_medicos->consultarFicha_Medica($_POST['id_alumno']);
$datos_sociales = $Datos_sociales->consultarDatosSociales($_POST['id_alumno']);
$datos_tallas = $Datos_Tallas->consultarTallasAlumno($_POST['id_alumno']);

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

	<table border="1" cellpadding="8" align="center" style="max-width: 70%;">
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
			<th colspan="4">Datos médicos</th>
		</tr>
		<tr>
			<td>Estatura: <?php echo $datos_medicos['Estatura'] ?> </td>
			<td>Peso: <?php echo $datos_medicos['Peso'] ?> </td>
			<td>Indice: <?php echo $datos_medicos['Indice'] ?> </td>
			<td>Circ_Braquial: <?php echo $datos_medicos['Circ_Braquial'] ?> </td>
		</tr>
		<tr>
			<td>Lateralidad: <?php echo $datos_medicos['Lateralidad'] ?> </td>
			<td>Tipo_Sangre: <?php echo $datos_medicos['Tipo_Sangre']?></td>
		</tr>
		<tr>
			<td colspan="4">Medicación: <?php echo $datos_medicos['Medicación']?></td>
		</tr>
		<tr>
			<td colspan="4">Dieta_Especial: <?php echo $datos_medicos['Dieta_Especial']?></td>
		</tr>
		<tr>
			<td colspan="4">Impedimento_Físico: <?php echo $datos_medicos['Impedimento_Físico']?></td>
		</tr>
		<tr>
			<td colspan="4">Alergias: <?php echo $datos_medicos['Alergias']?></td>
		</tr>
			<td>Cond_Vista: <?php echo $datos_medicos['Cond_Vista']?></td>
			<td>Cond_Dental: <?php echo $datos_medicos['Cond_Dental']?></td>
			<td colspan="2">Carnet_Discapacidad: <?php echo $datos_medicos['Carnet_Discapacidad']?></td>
		</tr>
		<tr>
			<td colspan="4">Institucion_Medica: <?php echo $datos_medicos['Institucion_Medica']?></td>
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
			<th colspan="4">Datos del padre o madre</th>
		</tr>
		<tr>
			<form action="">
				<input type="hidden" name="id_alumno" value="<?php echo $_POST['id_alumno'];?>">
				<td><input type="submit" name="Editar alumno" value="Editar alumno"></td>
				<td><input type="submit" name="Eliminar alumno" value="Eliminar alumno"></td>
				<td><input type="submit" name="Generar planilla" value="Generar planilla"></td>
				<td><a href="../index.php">Volver al menú</a></td>
			</form>
		</tr>
	</table>

</body>
</html>
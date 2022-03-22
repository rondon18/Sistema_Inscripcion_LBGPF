<?php 

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

require("../clases/alumno.php");
require("../controladores/conexion.php");

$conexion = conectarBD();
$alumno = new Alumnos();

$listaAlumnos = $alumno->mostrarAlumnos();

desconectarBD($conexion);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Consultar registros</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<div style="max-width: 100%; overflow-x: auto; margin: auto;">
		<table style="min-width: 100%;" border="1" cellpadding="12">
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Cédula</th>
			<th>Fecha de nacimiento</th>
			<th>Lugar de nacimiento</th>
			<th>Genero</th>
			<th>Dirección</th>
			<th>Plantel de procedencia</th>
			<th>Acciones</th>
		<?php foreach ($listaAlumnos as $alumno): ?>	
			<?php if ($alumno[15] == $_SESSION['representante'][0]): ?>
			<tr>
				<td><?php echo $alumno[1]; ?></td>
				<td><?php echo $alumno[2]; ?></td>
				<td><?php echo $alumno[3]; ?></td>
				<td><?php echo $alumno[4]; ?></td>
				<td><?php echo $alumno[5]; ?></td>
				<td><?php echo $alumno[6]; ?></td>
				<td><?php echo $alumno[8]; ?></td>
				<td><?php echo $alumno[13]; ?></td>
				<td>
					<form action="consultar-alumno.php" method="POST">
						<input type="submit" name="Consultar" value="Consultar">
						<input type="hidden" name="id_alumno" value="<?php echo $alumno[12] ?>">
						<input type="hidden" name="id_representante" value="<?php echo $alumno[15] ?>">
						<input type="hidden" name="id_padre" value="<?php echo $alumno[16] ?>">
					</form>
				</td>
			</tr>
			<?php endif ?>
		<?php endforeach ?>
		</table>	
	</div>
	
	<a href="index.php">Volver</a>

</body>
</html>
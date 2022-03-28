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
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jqc-1.12.4/dt-1.11.5/r-2.2.9/datatables.min.css"/>
</head>
<body>
	<div style="width: 80%; margin: auto;">
		<table id="tabla" class="table table-striped" style="max-width: 100%;" border="1" cellpadding="12">
			<thead>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Cédula</th>
				<th>Fecha de nacimiento</th>
				<th>Lugar de nacimiento</th>
				<th>Genero</th>
				<th>Dirección</th>
				<th>Plantel de procedencia</th>
				<th>Acciones</th>
			</thead>
			<tbody style="min-width: 100%;">
		<?php foreach ($listaAlumnos as $alumno): ?>	
			<?php if (($alumno[15] == $_SESSION['representante'][0]) or ($_SESSION['usuario'][2] == 2)): 
			#si el id del representante coincide con el vinculado al alumno se muestra. 
			#Se muestran todos si el usuario es un administrador?>			
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
						<form action="consultar-alumno.php" method="POST" style="display: inline-block;">
							<input type="hidden" name="id_alumno" value="<?php echo $alumno[12] ?>">
							<input type="hidden" name="id_representante" value="<?php echo $alumno[15] ?>">
							<input type="hidden" name="id_padre" value="<?php echo $alumno[16] ?>">
							<input type="submit" name="Consultar" value="Consultar">
						</form>
						
						<form action="editar-alumno.php" method="POST" style="display: inline-block;">
							<input type="hidden" name="id_alumno" value="<?php echo $alumno[12] ?>">
							<input type="hidden" name="id_representante" value="<?php echo $alumno[15] ?>">
							<input type="hidden" name="id_padre" value="<?php echo $alumno[16] ?>">
							<input type="submit" name="orden" value="Editar">
						</form>
						
						<form action="../controladores/control-alumnos.php" method="POST" style="display: inline-block;">
							<input type="hidden" name="id_alumno" value="<?php echo $alumno[12] ?>">
							<input type="hidden" name="id_representante" value="<?php echo $alumno[15] ?>">
							<input type="hidden" name="id_padre" value="<?php echo $alumno[16] ?>">
							<input type="submit" name="orden" value="Eliminar">
						</form>
						
						<form action="" method="POST" style="display: inline-block;">
							<input type="hidden" name="id_alumno" value="<?php echo $alumno[12] ?>">
							<input type="hidden" name="id_representante" value="<?php echo $alumno[15] ?>">
							<input type="hidden" name="id_padre" value="<?php echo $alumno[16] ?>">
							<input type="submit" name="Generar planilla" value="Generar planilla">
						</form>
					</td>
				</tr>
			<?php endif ?>
		<?php endforeach ?>
			
			</tbody>
		</table>	
	</div>
	<a href="index.php">Volver</a>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jqc-1.12.4/dt-1.11.5/r-2.2.9/datatables.min.js"></script>


<script type="text/javascript">
$(document).ready( function () {
	$('#tabla').DataTable({
		responsive: true,
		"language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.7/i18n/Spanish.json"
        }
	});
} );
</script>
</body>
</html>
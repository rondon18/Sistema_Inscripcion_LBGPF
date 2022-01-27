<?php 

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

require("../php/crud-alumnos.php");
$conexion	= conectarBD();
$crud 		= new CrudAlumnos();

if (isset($_POST['buscar'])) {
	if ($_POST['buscar'] != '') {
		echo$_POST['ordenamiento'];
		$registros = $crud->consultarAlumnos($_POST['buscar'],$_POST['ordenamiento'],$_POST['criterio']);
	}
	else {
		$registros = $crud->consultarAlumnos(NULL,$_POST['ordenamiento'],$_POST['criterio']);
	}
}
else {
	$registros 	= $crud->mostrarTodos();
}
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

	<form action="consultar.php" method="POST">
		<table border="1" cellpadding="10" style="margin: auto; overflow-x:scroll; font-size: 95%;">
	
			<tr>
	
				<th colspan="7">Buscador</th>
	
			</tr>
			
			<tr>
			
				<td><label>Buscar:</label></td>
				<td colspan="5"><input type="search" name="buscar"></td>
				<td><input type="submit" name="" id="" value="Buscar"></td>
	
			</tr>			

			<tr>
				<td>Ordenar por:</td>
				<td colspan="3">
					<select name="ordenamiento" id="">
						<option value="1">Por defecto</option>
						<option value="2">Ordenar por Nombres</option>
						<option value="3">Ordenar por Apellidos</option>
						<option value="4">Ordenar por Cédula</option>
						<option value="5">Ordenar por Cédula del representante</option>
						<option value="6">Ordenar por Grado a cursar</option>
						<option value="7">Ordenar por Tipo de inscripción</option>
					</select>
				</td>
				<td colspan="3">
					<select name="criterio" id="">
						<option value="1">Ascendente</option>
						<option value="2">Descendente</option>
					</select>
				</td>
			</tr>

		</table>
	
	</form>

	<hr>

	<table border="1" cellpadding="5" style="margin: auto; overflow-x:scroll; font-size: 80%; text-align:center;">

		<tr>
			<th>ID</th>
			<th colspan="2">NOMBRES</th>
			<th colspan="2">APELLIDOS</th>
			<th>GENERO</th>
			<th>CEDULA</th>
			<th>CEDULA DEL REPRESENTANTE</th>
			<th>GRADO A CURSAR</th>
			<th>TIPO DE INSCRIPCIÓN</th>
			
			<th>ACCIONES</th>
		</tr>
		<?php foreach ($registros as $alumno): ?>
		<tr>
			<td><?php echo $alumno->id; ?></td>
			<td colspan="2"><?php echo $alumno->PrimerNombre." ".$alumno->SegundoNombre;;?></td>
			<td colspan="2"><?php echo $alumno->PrimerApellido." ".$alumno->SegundoApellido;?></td>
			
			<td><?php echo $alumno->Genero;?></td>
			<td><?php echo $alumno->Cedula;?></td>
			<td><?php echo $alumno->CedulaRepresentante;?></td>
			<td><?php echo $alumno->Grado;?></td>
			<td><?php echo $alumno->TipoInscripcion;?></td>
			
			<td>
				<form action="ver-alumno.php" method="POST">
					<input type="submit" name="Mostrar" value="Mostrar">
					<input type="hidden" name="alumno" value="<?php echo $alumno->id;?>"> 
				</form>
			</td>

		</tr>
		<?php endforeach ?>
		<tr>
			<td><a href="index.php">Volver</a></td>
		</tr>

	</table>
</body>
</html>
<?php 

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

require("../php/crud-usuarios.php");
$conexion	= conectarBD();
$crud 		= new CrudUsuarios();

if (isset($_POST['buscar'])) {
	if ($_POST['buscar'] != '') {
		$registros = $crud->consultarUsuarios($_POST['buscar'],$_POST['ordenamiento'],$_POST['criterio']);
	}
	else {
		$registros 	= $crud->mostrarTodos($_POST['criterio']);
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
		<table border="1" cellpadding="10" style="margin: auto; overflow-x:scroll; font-size: 85%;">
	
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
						<option value="5">Ordenar por Correo</option>
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

	<table border="1" cellpadding="10" style="margin: auto; overflow-x:scroll; font-size: 85%;">

		<tr>
			<th>ID</th>
			<th colspan="2">NOMBRES</th>
			<th colspan="2">APELLIDOS</th>
			<th>CEDULA</th>
			<th>EMAIL</th>
			<th>TELEFONOS</th>
			
			<th>ACCIONES</th>
		</tr>
		<?php foreach ($registros as $usuario): ?>
		<tr>
			<td><?php echo $usuario->id; ?></td>
			<td colspan="2"><?php echo $usuario->PrimerNombre." ".$usuario->SegundoNombre;;?></td>
			<td colspan="2"><?php echo $usuario->PrimerApellido." ".$usuario->SegundoApellido;?></td>
			
			<td><?php echo $usuario->Cedula;?></td>
			
			<td><?php echo $usuario->Correo;?></td>
			
			<td><?php echo $usuario->Telefono1."<hr>".$usuario->Telefono2;?></td>
			
			<td>
				<form>
					<input type="submit" name="MOSTRAR" value="Mostrar">
					<input type="submit" name="EDITAR" value="Editar">
					<input type="submit" name="ELIMINAR" value="Eliminar">
					<input type="hidden" name="usuario" value="<?php echo $usuario->id;?>"> 
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
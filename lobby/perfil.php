<?php 
session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Perfil del usuario</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/colores.css"/>
</head>
<body>
	<div class="card" style="max-width: 600px; margin: 74px auto;">
		<div class="card-header">
			<h4>Perfil de usuario</h4>
		</div>
		<div class="card-body">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<b>Nombres:</b>
					<span><?php echo  $_SESSION['persona'][1]?></span>
				</li>
				<li class="list-group-item">
					<b>Apellidos:</b>
					<span><?php echo  $_SESSION['persona'][2]?></span>
				</li>
				<li class="list-group-item">
					<b>Cedula de identidad:</b>
					<span><?php echo $_SESSION['persona'][3]?></span>
				</li>
				<li class="list-group-item">
					<b>Fecha de nacimiento:</b>
					<span><?php echo $_SESSION['persona'][4]?></span>
				</li>
				<li class="list-group-item">
					<b>Lugar de nacimiento:</b>
					<span><?php echo $_SESSION['persona'][5]?></span>
				</li>
				<li class="list-group-item">
					<b>Genero:</b>
					<span><?php echo $_SESSION['persona'][6]?></span>
				</li>
				<li class="list-group-item">
					<b>Correo electronico:</b>
					<span><?php echo $_SESSION['persona'][7]?></span>
				</li>
				<li class="list-group-item">
					<b>Dirección de residencia:</b>
					<span><?php echo $_SESSION['persona'][8]?></span>
				</li>
				<li class="list-group-item">
					<b>Telefonos principal:</b>
					<span><?php echo $_SESSION['persona'][9];?></span>
				</li>
				<li class="list-group-item">
					<b>Telefono auxiliar:</b>
					<span><?php echo $_SESSION['persona'][10] ?></span>
				</li>
				<li class="list-group-item">
					<b>Privilegios:</b>
					<span><?php if ($_SESSION['usuario'][2] == "2") {echo "Administrador";}elseif ($_SESSION['usuario'][2] == "1") {echo "Representante";}else {echo "error";};?></span>
				</li>
			</ul>
		</div>
		<div class="card-footer">
			<a class="btn btn-primary" href="index.php">Volver</a>
			<a class="btn btn-primary" href="editar-perfil.php">Editar perfil</a>
			<?php if ($_SESSION['usuario'][2] == "1"): ?>
			<form class="d-inline" action="../controladores/control-usuarios.php" method="POST">
				<input class="btn btn-primary" type="submit" name="DarseDeBaja" value="Darse de baja">
				<input type="hidden" name="orden" value="Eliminar">
			</form>
			<?php endif;?>
		</div>
	</div>
</body>
</html>
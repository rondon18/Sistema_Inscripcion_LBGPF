<?php

require("controladores/conexion.php");
require("clases/usuario.php");

$usuario = new Usuarios();

if (isset($_POST['cedula'])) {
	$datos_usuario = $usuario->consultarUsuario($_POST['cedula']);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ingresar al sistema</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/colores.css"/>
</head>
<body>
	<form class="w-100 h-100 d-flex" action="recuperar-clave.php" method="POST" style="min-height: 100vh;">
		<div class="card text-center m-auto" style="max-width:500px; min-width: 300px; margin:auto;">
			<div class="card-header">
				<img src="https://picsum.photos/24" class="float-start d-inline">
				<b>Ingresar al sistema</b>
			</div>
			<div class="card-body">
				<p class="card-text">
					<table class="table table-borderless w-100">

						<?php if (!isset($_POST['cedula']) or $datos_usuario == NULL): ?>
						<tr>
							<td class="text-end">Cedula:</td>
							<td><input class="block" type="text" name="cedula" required></td>
						</tr>
						<?php if($datos_usuario == NULL): ?>
						<tr>
							<td colspan="2"><small>Usuario inexistente</small></td>
						</tr>
						<?php endif; ?>
						<?php elseif($datos_usuario != NULL): ?>
						<tr>
								<td>Preguntas de seguridad del usuario con CI:<?php echo $datos_usuario['Cedula_Persona'];?></td>
						</tr>
						<tr>
							<td class="text-start">
								<label class="form-input mb-1"><b>Pregunta 1:</b></label>
								<u><?php echo $datos_usuario['Pregunta_Seg_1']; ?></uu>
								<input class="form-control mb-2" type="text" name="clave" required>
							</td>
						</tr>
						<tr>
							<td class="text-start">
								<label class="form-input mb-1"><b>Pregunta 2:</b></label>
								<u><?php echo $datos_usuario['Pregunta_Seg_2']; ?></u>
								<input class="form-control mb-2" type="text" name="clave" required>
							</td>
						</tr>
						<?php endif; ?>
					</table>
				</p>
			</div>
			<div class="card-footer">
				<input class="btn btn-primary" type="submit" name="Ingresar" value="Ingresar">
				<a class="btn btn-primary" href="index.php">Volver</a
			</div>
		</div>
	</form>
	<?php #include("ayuda.php"); ?>
</body>
</html>

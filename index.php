<?php
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
	<form class="w-100 h-100 d-flex" action="controladores/login.php" method="POST" style="min-height: 100vh;">
		<div class="card text-center m-auto" style="max-width:400px; margin:auto;">
			<div class="card-header">
				<img src="https://picsum.photos/24" class="float-start d-inline">
				<b>Ingresar al sistema</b>
			</div>
			<div class="card-body">
				<p class="card-text">
					<table class="table table-borderless">
						<tr>
							<td class="text-end">Cedula:</td>
							<td><input class="block" type="text" name="cedula" required></td>
						</tr>
						<tr>
							<td class="text-end">Clave:</td>
							<td><input class="block" type="password" name="clave" required></td>
						</tr>
						</tr>
						<tr>
							<td colspan="2">
									<small><a class="" href="recuperar-clave.php">No recuerdo mi contraseña</a></small
							</td>
						</tr>
					</table>
				</p>
			</div>
			<div class="card-footer">
				<input class="btn btn-primary" type="submit" name="Ingresar" value="Ingresar">
				<a class="btn btn-primary" href="registrarse/registrarse.php">Registrarse</a>

			</div>
		</div>
	</form>
	<?php #include("ayuda.php"); ?>
</body>
</html>

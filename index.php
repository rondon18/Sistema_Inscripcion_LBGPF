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
	<link rel="stylesheet" type="text/css" href="css/all.min.css"/>
</head>
<body>
	<header class="">

	</header>
	<form class="w-100 h-100 d-flex" action="controladores/login.php" method="POST" style="min-height: 100vh;">
		<div class="card text-center m-auto" style="max-width:400px; margin:auto;">
			<div class="card-header">
				<img src="https://picsum.photos/24" class="float-start d-inline">
				<b>Ingresar al sistema</b>
			</div>
			<div class="card-body pt-2 pb-0">
					<table class="table table-borderless table-sm mb-1">
						<tr>
							<td>
								<i class="fa-solid fa-5x fa-circle-user mt-0 mb-2"></i>
							</td>
						</tr>
						<tr>
							<td class="input-group">
								<span class="input-group-text text-center" title="Cédula de usuario">
									<i class="fa-solid fa-circle-user fa-lg"></i>
								</span>
								<input class="form-control" type="text" name="cedula" placeholder="Cédula de usuario" required>
							</td>
						</tr>
						<tr>
							<td class="input-group">
								<span class="input-group-text text-center" title="Clave">
									<i class="fa-solid fa-lock fa-lg"></i>
								</span>
								<input class="form-control" type="password" name="clave" placeholder="Clave" required>
							</td>
						</tr>
						<tr>
							<td class="text-start">
								<small><a class="text-muted" href="recuperar-clave.php">¿Contraseña olvidada?</a></small>
							</td>
						</tr>
					</table>
			</div>
			<div class="card-footer">
				<input class="btn btn-primary" type="submit" name="Ingresar" value="Ingresar">
				<a class="btn btn-primary" href="registrarse/registrarse.php">Registrarse</a>
			</div>
		</div>
	</form>
</body>
</html>

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
	<link rel="icon" type="img/png" href="img/distintivo-LGPF.png">
</head>
<body>
	<!--Banner-->
	<header class="w-100 bg-white d-flex justify-content-center justify-content-md-between shadow p-1 position-fixed top-0" style="z-index:1000;">
		<div>
			<img src="img/banner-gobierno.png" alt=""  height="42" class="d-inline-block align-text-top">
			<img src="img/banner-MPPE.png" alt=""  height="42" class="d-inline-block align-text-top">
		</div>
		<img src="img/banner-LGPF.png" alt=""  height="42" class="d-inline-block align-text-top">
	</header>

	<form class="w-100 h-100 d-flex" action="controladores/login.php" method="POST" style="min-height: 100vh;">
		<div class="card text-center m-auto" style="max-width:400px; margin:auto;">
			<div class="card-header">
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
								<select class="form-select w-auto" name="Tipo_Cédula" required>
									<option value="V">V</option>
									<option value="E">E</option>
								</select>
								<input class="form-control w-auto" type="text" id="Cédula" name="Cédula" placeholder="Cédula de usuario" maxlength="15" required>
							</td>
						</tr>
						<tr>
							<td class="input-group">
								<span class="input-group-text text-center" title="Clave">
									<i class="fa-solid fa-lock fa-lg"></i>
								</span>
								<input class="form-control" type="password" id="clave" name="clave" placeholder="Clave" required>
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
			</div>
		</div>
	</form>

	<!--Footer-->
	<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-fixed bottom-0">
		<span class="text-white">Sistema de inscripción L.B. G.P.F - <i class="far fa-copyright"></i> 2022-<?php echo date("Y"); ?></span>
	</footer>
	<?php include 'ayuda.php'; ?>
<script type="text/javascript" src="js/sweetalert2.js"></script>
<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/validaciones.js"></script>
<?php if (isset($_GET['error'])): ?>
<script type="text/javascript" defer>
	Swal.fire(
      'Error',
      'Cédula o clave incorrecta',
      'warning'
    );
</script>
<?php elseif(isset($_GET['error_pregunta'])): ?>
<script type="text/javascript" defer>
	Swal.fire(
      'Error',
      'Las respuestas ingresadas no coinciden',
      'warning'
    );
</script>
<?php endif ?>
</body>
</html>

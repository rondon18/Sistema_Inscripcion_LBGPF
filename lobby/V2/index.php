<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Página de inicio</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/colores.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/all.min.css"/>
	<link rel="icon" type="img/png" href="../../img/distintivo-LGPF.png">
</head>

<body class="d-flex justify-content-center align-items-center light-primary-color" style="min-height: 100vh;">
	<!--Banner-->
	<header class="w-100 bg-white d-flex justify-content-center justify-content-md-between shadow p-1 position-fixed top-0" style="z-index:1000;">
		<div>
			<img src="../../img/banner-gobierno.png" alt=""  height="42" class="d-inline-block align-text-top">
			<img src="../../img/banner-MPPE.png" alt=""  height="42" class="d-inline-block align-text-top">
		</div>
		<img src="../../img/banner-LGPF.png" alt=""  height="42" class="d-inline-block align-text-top">
	</header>

	<div class="card text-center m-auto" style="max-width:620px; margin:auto;">
		<div class="card-header">

			<b>Menú principal</b>
		</div>
		<div class="card-body">

			<p class="card-text">
				<span>Bienvenido(a), .</span>
			</p>

			<ul class="list-group">
				<li class="list-group-item bg-info">
					<p class="mb-0">¿Qué desea hacer?</p>
				</li>
				<li class="list-group-item">
					<div class="row">
						<div class="col-6 col-sm-4 col-md my-1">
							<a class="btn btn-sm bg-primary text-white p-2 w-100 h-100" href="perfil.php">
								<i class="fas fa-address-card fa-2x mb-1"></i>
								<p class="mb-0">Ver mi perfil</p>
							</a>
						</div>

						<div class="col-6 col-sm-4 col-md my-1">
							<a class="btn btn-sm bg-primary text-white p-2 w-100 h-100" href="perfil.php">
								<i class="fas fa-user-plus fa-2x mb-1"></i>
								<p class="mb-0">Registrar estudiante</p>
							</a>
						</div>

						<div class="col-6 col-sm-4 col-md my-1">
							<a class="btn btn-sm bg-primary text-white p-2 w-100 h-100" href="consultar.php">
								<i class="fas fa-search fa-2x mb-1"></i>
								<p class="mb-0">Hacer una consulta</p>
							</a>
						</div>
						<div class="col-6 col-sm-4 col-md my-1">
							<a class="btn btn-sm bg-primary text-white p-2 w-100 h-100" href="consultar.php">
								<i class="fas fa-wrench fa-2x mb-1"></i>
								<p class="mb-0">Hacer mantenimiento</p>
							</a>
						</div>
						<div class="col-6 col-sm-4 col-md my-1">
							<a class="btn btn-sm bg-primary text-white p-2 w-100 h-100" href="../../controladores/logout.php">
								<i class="fas fa-door-open fa-2x mb-1"></i>
								<p class="mb-0">Cerrar Sesión</p>
							</a>
						</div>
					</div>
				</li>
				<li class="list-group-item bg-info">
					<p class="mb-0">Acciones de mantenimiento</p>
				</li>

				<li class="list-group-item">
					<div class="text-start">

						<form class="d-inline" action="../../controladores/control-mantenimiento.php" method="POST" target="_blank">
							<button type="submit" class="btn btn-primary mb-2" name="orden" value="Respaldar">
								Generar respaldo <i class="fas fa-download fa-lg"></i>
							</button>
						</form>

						<form id="Restaurar" class="d-inline" action="../../controladores/control-mantenimiento.php" method="POST" >
							<div class="input-group">

								<select class="form-select" name="" placeholder="Seleccione el punto de restauración">
									<option value="">Seleccione el punto de restauración</option>
									<!--Timestamp del respaldo-->
									<option value="">1-1-1</option>
									<option value="">2-2-2</option>
									<option value="">3-3-3</option>
									<option value="">4-4-4</option>
									<option value="">5-5-5</option>
									<option value="">6-6-6</option>
									<option value="">7-7-7</option>
									<option value="">8-8-8</option>
									<option value="">Respaldo Base</option>
								</select>
								<button class="btn btn-primary" name="orden" value="Restaurar" onclick="confirmacion()">
									Restaurar base de datos <i class="fas fa-database fa-lg"></i>
								</button>
							</div>

						</form>
					</div>

				</li>
			</ul>
		</div>

		<div class="card-footer">
			<span class="text-muted">Sistema de inscripción L.B. G.P.F</span>
		</div>

	</div>

	<!--Footer-->
	<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-fixed bottom-0">
		<span class="text-white">Sistema de inscripción L.B. G.P.F - </span>
	</footer>
</body>
<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	function confirmacion() {
		//Pregunta si desea realizar la acción la cancela si selecciona NO
		document.getElementById("Restaurar").addEventListener("click", function(event){
			if(!confirm("¿Esta seguro de realizar esta acción? Se generará un respaldo antes de restaurar.")){
				event.preventDefault();
			}
		});
	}
</script>
</html>

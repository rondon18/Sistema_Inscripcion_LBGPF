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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Página de inicio</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/colores.css"/>
</head>
<body class="d-flex justify-content-center align-items-center light-primary-color" style="min-height: 100vh;">
	<div class="card text-center m-auto" style="max-width:575px; margin:auto;">
		<div class="card-header default-primary-color">
			<img src="https://picsum.photos/24" class="float-start d-inline">
			<b>Menú principal</b>
		</div>
		<div class="card-body">
			
			<p class="card-text">
				<span>Bienvenido, <?php echo $_SESSION['persona']['Primer_Nombre']." ".$_SESSION['persona']['Primer_Apellido']; ?>.</span>
			</p>

			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<p>¿Qué desea hacer?</p>
					<a class="btn btn-sm dark-primary-color text-white" href="perfil.php">Ver perfil</a>
					<a class="btn btn-sm dark-primary-color text-white" href="registrar-estudiante/paso-1.php">Registrar estudiante</a>
					<?php if ($_SESSION['usuario']['Privilegios'] == 2): ?>
					<a class="btn btn-sm dark-primary-color text-white" href="consultar.php">Consultar estudiantes</a>
					<?php elseif ($_SESSION['usuario']['Privilegios'] == 1): ?>
					<a class="btn btn-sm dark-primary-color text-white" href="consultar.php">Gestionar registros</a>
					<?php endif;?>
					<a class="btn btn-sm dark-primary-color text-white" href="../controladores/logout.php">Cerrar sesión</a>
				</li>
				
				<?php if ($_SESSION['usuario']['Privilegios'] == 2): ?>
				
				<li class="list-group-item">
					<p>Mantenimiento</p>
					<form class="d-inline" action="../controladores/control-mantenimiento.php" method="POST" target="_blank">
						<button type="submit" class="btn btn-sm dark-primary-color text-white" name="orden" value="Respaldar">Generar respaldo</button>
					</form>
					<form id="Restaurar" class="d-inline" action="../controladores/control-mantenimiento.php" method="POST" >
						<button class="btn btn-sm dark-primary-color text-white" name="orden" value="Restaurar" onclick="confirmacion()">Restaurar base de datos</button>
					</form>
				</li>
				<?php endif ?>
			</ul>
		</div>
	
		<div class="card-footer accent-color">
			<span class="text-muted">Sistema de inscripción L.B. GPF</span>
		</div>
	
	</div>

		
		

</body>
<script type="text/javascript">
	function confirmacion() {
		//Pregunta si desea realizar la acción la cancela si selecciona NO
		document.getElementById("Restaurar").addEventListener("click", function(event){
			if(!confirm("¿Esta seguro de realizar esta acción?")){
				event.preventDefault();
			}
		});
	}
</script>
</html>
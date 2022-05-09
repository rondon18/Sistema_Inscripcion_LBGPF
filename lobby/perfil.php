<?php
session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

require('../clases/bitácora.php');
require('../controladores/conexion.php');
$bitácora = new bitácora();
$_SESSION['acciones'] .= ', Visita perfil';
$bitácora->actualizar_bitácora($_SESSION['acciones'],$_SESSION['idbitácora']);

function Teléfonos($prefijo,$Teléfono) {
	if (!empty($prefijo) and !empty($Teléfono)) {
		echo $prefijo."-".$Teléfono;
	}
	else {
		echo "N/A";
	}
}

function privilegios($privilegios) {
	if ($privilegios == 1) {
		echo "Administrador";
	}
	elseif ($privilegios == 2) {
		echo "Usuario";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Perfil del usuario</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/colores.css"/>
	<link rel="stylesheet" type="text/css" href="../css/all.min.css"/>
</head>
<body>
	<!--Banner-->
	<header class="w-100 bg-white d-flex justify-content-between shadow p-1 position-fixed top-0" style="z-index:1000;">
		<div>
			<img src="../img/banner-gobierno.png" alt=""  height="42" class="d-inline-block align-text-top">
			<img src="../img/banner-MPPE.png" alt=""  height="42" class="d-inline-block align-text-top">
		</div>
		<img src="../img/banner-LGPF.png" alt=""  height="42" class="d-inline-block align-text-top">
	</header>
	<div class="card" style="max-width: 600px; margin: 74px auto;">
		<div class="card-header">
			<h4>Perfil de usuario</h4>
		</div>
		<?php if ($_SESSION['usuario']['Privilegios'] == 2): ?>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a id="link1" class="nav-link active" href="#" onclick="seccion('seccion1')">Datos personales</a>
			</li>
			<li class="nav-item">
				<a id="link2" class="nav-link" href="#" onclick="seccion('seccion2')">Datos de usuario</a>
			</li>
		</ul>
		<?php else: ?>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<p class="nav-link active">Datos personales</p>
			</li>
		</ul>
		<?php endif ?>
		<div class="card-body">
			<section id="seccion1">
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<b>Nombres:</b>
						<span><?php echo $_SESSION['persona']['Primer_Nombre']." ".$_SESSION['persona']['Segundo_Nombre']?></span>
					</li>
					<li class="list-group-item">
						<b>Apellidos:</b>
						<span><?php echo $_SESSION['persona']['Primer_Apellido']." ".$_SESSION['persona']['Segundo_Apellido']?></span>
					</li>
					<li class="list-group-item">
						<b>Cédula de identidad:</b>
						<span><?php echo $_SESSION['persona']['Cédula']?></span>
					</li>
					<li class="list-group-item">
						<b>Fecha de nacimiento:</b>
						<span><?php echo $_SESSION['persona']['Fecha_Nacimiento']?></span>
					</li>
					<li class="list-group-item">
						<b>Género:</b>
						<span><?php echo $_SESSION['persona']['Género']?></span>
					</li>
					<li class="list-group-item">
						<b>Correo electrónico:</b>
						<span><?php echo $_SESSION['persona']['Correo_Electrónico']?></span>
					</li>
					</li>
					<li class="list-group-item">
						<b>Privilegios:</b>
						<span><?php privilegios($_SESSION['usuario']['Privilegios']); ?></span>
					</li>
			</section>
			<section id="seccion2"style="display:none;">
				<h5>Pregunta de seguridad 1:</h5>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<b><?php echo $_SESSION['usuario']['Pregunta_Seg_1'];?>:</b>
						<span><?php echo $_SESSION['usuario']['Respuesta_1'];?></span>
					</li>
				</ul>
				<h5>Pregunta de seguridad 2:</h5>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<b><?php echo $_SESSION['usuario']['Pregunta_Seg_2'];?>:</b>
						<span><?php echo $_SESSION['usuario']['Respuesta_2'];?></span>
					</li>
				</ul>
			</section>
		</div>
		<div class="card-footer">
			<a class="btn btn-primary" href="index.php">Volver <i class="fas fa-home"></i></a>
			<a class="btn btn-primary" href="editar-perfil.php">Editar perfil <i class="fas fa-user-edit"></i></a>
			<form class="d-inline" action="../controladores/control-usuarios.php" method="POST">
				<button class="btn btn-primary" type="submit" name="DarseDeBaja" onclick="return confirmacion();">Darse de baja <i class="fas fa-user-minus"></i></button>
				<input type="hidden" name="orden" value="Eliminar">
			</form>
		</div>
	</div>
	<!--Footer-->
	<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-fixed bottom-0">
		<span class="text-white">Sistema de inscripción L.B. G.P.F - <?php echo date("Y"); ?></span>
	</footer>
	<?php include '../ayuda.php'; ?>
	<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
<script>
function confirmacion() {
	//Pregunta si desea realizar la acción la cancela si selecciona NO
	if(confirm("¿Desea realizar esta accion?")) {
		alert("Acción ejecutada");
		return true;
	}
	else {
		alert("Acción cancelada");
		return false;
	}
}
function seccion(seccion) {

		//secciones
		var a = document.getElementById("seccion1");
		var b = document.getElementById("seccion2");

		//botones en la navegación
		var link_a = document.getElementById("link1");
		var link_b = document.getElementById("link2");

		//seccion seleccionada como activa(seccion 1 por defecto)
		var seccion = document.getElementById(seccion);

		a.style.display = "none";
		b.style.display = "none";

		link_a.classList.remove("active");
		link_b.classList.remove("active");

		if (seccion == a) {
			a.style.display = "block";
			link_a.classList.add("active");
		}
		else if (seccion == b) {
			b.style.display = "block";
			link_b.classList.add("active");
		}
	}
</script>
</body>
</html>

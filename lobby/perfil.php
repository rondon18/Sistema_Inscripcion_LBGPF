<?php
session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}


function calculaedad($fechanacimiento){
  list($ano,$mes,$dia) = explode("-",$fechanacimiento);
  $año_diferencia  = date("Y") - $ano;
  $mes_diferencia = date("m") - $mes;
  $dia_diferencia   = date("d") - $dia;
  if ($dia_diferencia < 0 || $mes_diferencia < 0)
    $año_diferencia--;
  return $año_diferencia;
}

function telefonos($prefijo,$telefono) {
	if (!empty($prefijo) and !empty($telefono)) {
		echo $prefijo."-".$telefono;
	}
	else {
		echo "N/A";
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
</head>
<body>
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
				<a id="link2" class="nav-link" href="#" onclick="seccion('seccion2')">Datos de representante</a>
			</li>
			<li class="nav-item">
				<a id="link3" class="nav-link" href="#" onclick="seccion('seccion3')">Datos adicionales</a>
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
						<b>Cedula de identidad:</b>
						<span><?php echo $_SESSION['persona']['Cédula']?></span>
					</li>
					<li class="list-group-item">
						<b>Fecha de nacimiento:</b>
						<span><?php echo $_SESSION['persona']['Fecha_Nacimiento']?></span>
					</li>
					<li class="list-group-item">
						<b>Lugar de nacimiento:</b>
						<span><?php echo $_SESSION['persona']['Lugar_Nacimiento']?></span>
					</li>
					<li class="list-group-item">
						<b>Genero:</b>
						<span><?php echo $_SESSION['persona']['Género']?></span>
					</li>
					<li class="list-group-item">
						<b>Correo electrónico:</b>
						<span><?php echo $_SESSION['persona']['Correo_Electrónico']?></span>
					</li>
					<li class="list-group-item">
						<b>Dirección de residencia:</b>
						<span><?php echo $_SESSION['persona']['Dirección']?></span>
					</li>
					<?php if ($_SESSION['usuario']['Privilegios'] == 2): ?>
					<li class="list-group-item">
						<b>Teléfono principal:</b>
						<span><?php telefonos($_SESSION['telefonos'][0]['Prefijo'],$_SESSION['telefonos'][0]['Número_Telefónico']);?></span>
					</li>
					<li class="list-group-item">
						<b>Teléfono secundario:</b>
						<span><?php telefonos($_SESSION['telefonos'][1]['Prefijo'],$_SESSION['telefonos'][1]['Número_Telefónico']);?></span>
					</li>
					<li class="list-group-item">
						<b>Teléfono auxiliar:</b>
						<span><?php telefonos($_SESSION['telefonos'][2]['Prefijo'],$_SESSION['telefonos'][2]['Número_Telefónico']);?></span>
					</li>
					<li class="list-group-item">
						<b>Privilegios:</b>
						<span><?php if ($_SESSION['usuario']['Privilegios'] == "1") {echo "Administrador";}elseif ($_SESSION['usuario']['Privilegios'] == "2") {echo "Representante";}else {echo "error";};?></span>
					</li>
				</ul>
				<?php endif ?>
			</section>
			<?php if ($_SESSION['usuario']['Privilegios'] == 2): ?>
			<section id="seccion2" style="display: none;">
				Datos académicos
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<b>Grado de instrucción:</b>
						<span><?php echo $_SESSION['representante']['Grado_Academico']?></span>
					</li>
				</ul>
				Datos de vivienda
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<b>Condiciones de vivienda:</b>
						<span><?php echo $_SESSION['datos_vivienda']['Condiciones_Vivienda']?></span>
					</li>
					<li class="list-group-item">
						<b>Tipo de vivienda:</b>
						<span><?php echo $_SESSION['datos_vivienda']['Tipo_Vivienda']?></span>
					</li>
					<li class="list-group-item">
						<b>Tenencia de vivienda:</b>
						<span><?php echo $_SESSION['datos_vivienda']['Tenencia_Vivienda']?></span>
					</li>
				</ul>
				Datos económicos
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<b>Banco:</b>
						<span><?php echo $_SESSION['datos_economicos']['Banco']?></span>
					</li>
					<li class="list-group-item">
						<b>Tipo de cuenta:</b>
						<span><?php echo $_SESSION['datos_economicos']['Tipo_Cuenta']?></span>
					</li>
					<li class="list-group-item">
						<b>Número de cuenta:</b>
						<span><?php echo $_SESSION['datos_economicos']['Cta_Bancaria']?></span>
					</li>
				</ul>
				Datos laborales
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<b>Empleo actual:</b>
						<span><?php echo $_SESSION['datos_laborales']['Empleo']?></span>
					</li>
					<li class="list-group-item">
						<b>Dirección del trabajo:</b>
						<span><?php if(!empty($_SESSION['datos_laborales']['Lugar_Trabajo'])){ echo $_SESSION['datos_laborales']['Lugar_Trabajo'];} else { echo "N/A";}?></span>
					</li>
					<li class="list-group-item">
						<b>Remuneración:</b>
						<span><?php if(!empty($_SESSION['datos_laborales']['Remuneración'])){ echo $_SESSION['datos_laborales']['Remuneración']." Salarios minimos";} else { echo "N/A";}?></span>
					</li>
					<li class="list-group-item">
						<b>Tipo de remuneración:</b>
						<span><?php if(!empty($_SESSION['datos_laborales']['Tipo_Remuneración'])){ echo $_SESSION['datos_laborales']['Tipo_Remuneración'];} else { echo "N/A";}?></span>
					</li>
					</li>
					<li class="list-group-item">
						<b>Teléfono del trabajo:</b>
						<span><?php if(isset($_SESSION['telefonos'][3])){telefonos($_SESSION['telefonos'][3]['Prefijo'],$_SESSION['telefonos'][3]['Número_Telefónico']);}?></span>
					</li>
				</ul>
			</section>
			<section id="seccion3" style="display: none;">
				Contacto auxiliar
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<b>Nombres:</b>
						<span><?php echo $_SESSION['ContactoAuxiliar'][0]['Primer_Nombre']." ".$_SESSION['ContactoAuxiliar'][0]['Segundo_Nombre']?></span>
					</li>
					<li class="list-group-item">
						<b>Apellidos:</b>
						<span><?php echo $_SESSION['ContactoAuxiliar'][0]['Primer_Apellido']." ".$_SESSION['ContactoAuxiliar'][0]['Segundo_Apellido']?></span>
					</li>
					<li class="list-group-item">
						<b>Cédula de identidad:</b>
						<span><?php echo $_SESSION['ContactoAuxiliar'][0]['Cédula']?></span>
					</li>
					<li class="list-group-item">
						<b>Genero:</b>
						<span><?php echo $_SESSION['ContactoAuxiliar'][0]['Género']?></span>
					</li>
					<li class="list-group-item">
						<b>Correo electronico:</b>
						<span><?php echo $_SESSION['ContactoAuxiliar'][0]['Correo_Electrónico']?></span>
					</li>
					<li class="list-group-item">
						<b>Relación con la persona:</b>
						<span><?php echo $_SESSION['ContactoAuxiliar'][1]['Relación']?></span>
					</li>
					<li class="list-group-item">
						<b>Dirección de residencia:</b>
						<span><?php echo $_SESSION['ContactoAuxiliar'][0]['Dirección']?></span>
					</li>
					<li class="list-group-item">
						<b>Teléfono principal:</b>
						<?php /*foreach ($_SESSION['ContactoAuxiliar'][2] as $value): ?>
							<p><?php var_dump($value); ?></p>
						<?php endforeach;*/ ?>





						<span><?php if(isset($_SESSION['ContactoAuxiliar'][2][0])){telefonos($_SESSION['ContactoAuxiliar'][2][0]['Prefijo'],$_SESSION['ContactoAuxiliar'][2][0]['Número_Telefónico']);} ?></span>
					</li>
					<li class="list-group-item">
						<b>Teléfono secundario:</b>
						<span><?php if(isset($_SESSION['ContactoAuxiliar'][2][1])){telefonos($_SESSION['ContactoAuxiliar'][2][1]['Prefijo'],$_SESSION['ContactoAuxiliar'][2][1]['Número_Telefónico']);} ?></span>
					</li>
					<li class="list-group-item">
						<b>Teléfono auxiliar:</b>
						<span><?php if(isset($_SESSION['ContactoAuxiliar'][2][2])){telefonos($_SESSION['ContactoAuxiliar'][2][2]['Prefijo'],$_SESSION['ContactoAuxiliar'][2][2]['Número_Telefónico']);} ?></span>
					</li>
				</ul>
			</section>
			<?php endif ?>
		</div>
		<div class="card-footer">
			<a class="btn btn-primary" href="index.php">Volver</a>
			<a class="btn btn-primary" href="editar-perfil.php">Editar perfil</a>
			<form class="d-inline" action="../controladores/control-usuarios.php" method="POST">
				<input class="btn btn-primary" type="submit" name="DarseDeBaja" value="Darse de baja">
				<input type="hidden" name="orden" value="Eliminar">
			</form>
		</div>
	</div>
<script>
	function seccion(seccion) {

		//secciones
		var a = document.getElementById("seccion1");
		var b = document.getElementById("seccion2");
		var c = document.getElementById("seccion3");

		//botones en la navegación
		var link_a = document.getElementById("link1");
		var link_b = document.getElementById("link2");
		var link_c = document.getElementById("link3");

		//seccion seleccionada como activa(seccion 1 por defecto)
		var seccion = document.getElementById(seccion);

		a.style.display = "none";
		b.style.display = "none";
		c.style.display = "none";

		link_a.classList.remove("active");
		link_b.classList.remove("active");
		link_c.classList.remove("active");

		if (seccion == a) {
			a.style.display = "block";
			link_a.classList.add("active");
		}
		else if (seccion == b) {
			b.style.display = "block";
			link_b.classList.add("active");
		}
		else if (seccion == c) {
			c.style.display = "block";
			link_c.classList.add("active");
		}
	}
</script>
</body>
</html>

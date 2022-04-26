<?php

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}


if (isset($_POST['Paso_1'])) {
	$_SESSION['Primer_Nombre_Representante'] = $_POST["Primer_Nombre_Representante"];
	$_SESSION['Segundo_Nombre_Representante'] = $_POST["Segundo_Nombre_Representante"];
	$_SESSION['Primer_Apellido_Representante'] = $_POST["Primer_Apellido_Representante"];
	$_SESSION['Segundo_Apellido_Representante'] = $_POST["Segundo_Apellido_Representante"];
	$_SESSION['Genero_Representante'] = $_POST["Genero_Representante"];
	$_SESSION['Vinculo_Representante'] = $_POST["Vinculo_Representante"];
	$_SESSION['Otro_Vinculo'] = $_POST["Otro_Vinculo"];
	$_SESSION['Cédula_Representante'] = $_POST["Cédula_Representante"];
	$_SESSION['Fecha_Nacimiento_Representante'] = $_POST["Fecha_Nacimiento_Representante"];
	$_SESSION['Lugar_Nacimiento_Representante'] = $_POST["Lugar_Nacimiento_Representante"];
	$_SESSION['Correo_electrónico'] = $_POST["Correo_electrónico"];
	$_SESSION['Teléfono_Principal_Representante'] = $_POST["Teléfono_Principal_Representante"];
	$_SESSION['Teléfono_Auxiliar_Representante'] = $_POST["Teléfono_Auxiliar_Representante"];
	$_SESSION['Estado_Civil_Representante'] = $_POST["Estado_Civil_Representante"];
	$_SESSION['Direccion_Representante'] = $_POST["Direccion_Representante"];
	$_SESSION['Nombre_Contacto_Emergencia'] = $_POST["Nombre_Contacto_Emergencia"];
	$_SESSION['Relación_Auxiliar'] = $_POST["Relación_Auxiliar"];
	$_SESSION['Tfl_P_Contacto_Aux'] = $_POST["Tfl_P_Contacto_Aux"];
	$_SESSION['Tfl_S_Contacto_Aux'] = $_POST["Tfl_S_Contacto_Aux"];
	$_SESSION['Banco'] = $_POST["Banco"];
	$_SESSION['Tipo_Cuenta'] = $_POST["Tipo_Cuenta"];
	$_SESSION['Nro_Cuenta'] = $_POST["Nro_Cuenta"];

	$_SESSION['Paso_1'] = $_POST['Paso_1'];

	header('Location: paso-2.php');
}
if (isset($_SESSION['Paso1'],$_SESSION['Paso2'],$_SESSION['Paso3'],$_SESSION['Paso4'])) {
	$_SESSION['Primer_Nombre_Familiar'] = $_POST['Primer_Nombre_Familiar'];
	$_SESSION['Segundo_Nombre_Familiar'] = $_POST['Segundo_Nombre_Familiar'];
	$_SESSION['Primer_Apellido_Familiar'] = $_POST['Primer_Apellido_Familiar'];
	$_SESSION['Segundo_Apellido_Familiar'] = $_POST['Segundo_Apellido_Familiar'];
	$_SESSION['Genero_Familiar'] = $_POST['Genero_Familiar'];
	$_SESSION['Cédula_Familiar'] = $_POST['Cédula_Familiar'];
	$_SESSION['Fecha_Nacimiento_Familiar'] = $_POST['Fecha_Nacimiento_Familiar'];
	$_SESSION['Lugar_Nacimiento_Familiar'] = $_POST['Lugar_Nacimiento_Familiar'];
	$_SESSION['Correo_electrónico_Familiar'] = $_POST['Correo_electrónico_Familiar'];
	$_SESSION['Prefijo_Principal_Familiar'] = $_POST['Prefijo_Principal_Familiar'];
	$_SESSION['Teléfono_Principal_Familiar'] = $_POST['Teléfono_Principal_Familiar'];
	$_SESSION['Prefijo_Secundario_Familiar'] = $_POST['Prefijo_Secundario_Familiar'];
	$_SESSION['Teléfono_Secundario_Familiar'] = $_POST['Teléfono_Secundario_Familiar'];
	$_SESSION['Estado_Civil_Familiar'] = $_POST['Estado_Civil_Familiar'];
	$_SESSION['Direccion_Familiar'] = $_POST['Direccion_Familiar'];
	$_SESSION['Reside_En_El_País'] = $_POST['Reside_En_El_País'];
	$_SESSION['País'] = $_POST['País'];

	$_SESSION['Paso5'] = $_POST['Paso5'];
	header('Location: paso-6.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registrar nuevo estudiante</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/colores.css"/>
</head>
<body>

		<form class="card" action="paso-5.php" method="POST" style="max-width: 600px; margin: 74px auto;">

			<div class="card-header">
				<h4>Formulario de registro de estudiantes</h4>
			</div>

			<div class="card-body">
				

				<input type="hidden" name="Es_el_representante" value="Es_el_representante">
			</div>
			<!--Botón para guardar-->
			<div class="card-footer">
				<a href="" class="btn btn-sm btn-primary"><i class="fas fa-home fa-lg"></i> Volver al menú</a>
				<a href="" class="btn btn-sm btn-primary"><i class="fas fa-arrow-alt-circle-left fa-lg"></i> Volver al paso anterior</a>
				<button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-save fa-lg"></i> Guardar y continuar</button>
			</div>
		</form>

</body>
</html>

<!DOCTYPE html>

<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Paso 1 - Datos del representante</title>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/all.min.css"/>
	<link rel="icon" type="img/png" href="../../img/icono.png">
</head>
<body>
	<form id="formulariorepresentante" action="paso_1.php" method="POST">

		<!-- Cédula -->
		<div class="row mb-4">
			<div class="col-12 col-lg-2">
				<label class="form-label requerido">Cédula:</label>
			</div>
			<div class="col-12 col-lg-3">
					<!-- Nacionalidad -->
					<select
						id="nacionalidad_r"
						class="form-select"
						name="nacionalidad_r"
						required
					>
						<option value="">Nacionalidad</option>
						<option value="V">V</option>
						<option value="E">E</option>
					</select>
			</div>
			<div class="col-12 col-lg-7">

					<!-- Número de cédula -->
					<input
						id="cedula_r"
						class="form-control"
						type="text"
						name="cedula_r"
						maxlength="8"
						minlength="7"
						placeholder="Número de cedula"
						required
					>
			</div>
			<div class="col-12 col-lg-12 mt-2">
				<span class="form-text">La cédula consta de una nacionalidad y de un número con alrededor de 7 a 8 dígitos.</span>
			</div>
		</div>

	</form>

</body>
<script type="text/javascript" src="../../js/sweetalert2.js"></script>
<script type="text/javascript" src="../../js/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="../../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../../js/validaciones/additional-methods.min.js"></script>
<script type="text/javascript" src="../../js/messages_es.min.js"></script>
<script type="text/javascript" src="../../js/validaciones/validaciones_representante.js"></script>
<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>

<script>
	$(document).ready(function() {
		$("#nacionalidad").keyup(function() {
		  // Obtener el valor del campo de la cédula
		  var cedula = $("#cedula_r").val();
		  // Obtener el valor del campo de la nacionalidad
		  var nacionalidad = $("#nacionalidad_r").val();

		  // Realizar la consulta a la base de datos
		  $.ajax({
		    url: "/consultar.php",
		    type: "POST",
		    data: {
		      cedula: cedula,
		      nacionalidad: nacionalidad
		    },
		    success: function(respuesta) {
		      // Si la consulta devuelve resultados
		      if (respuesta.length > 0) {
		        // Mostrar un mensaje indicando que el registro ya existe
		        alert("El registro ya existe. ¿Desea autocompletar?");

		        // Autocompletar el campo con los datos del registro
		        $("#cedula").val(respuesta[0].cedula);
		        $("#nombre").val(respuesta[0].nombre);
		        $("#apellido").val(respuesta[0].apellido);
		      } else {
		        // Si la consulta no devuelve resultados
		        alert("El registro no existe.");
		      }
		    }
		  });
		});
		});

</script>

</html>



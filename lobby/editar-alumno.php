<?php 

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

require('../clases/alumno.php');
require('../clases/representantes.php');
require('../clases/padres.php');
require('../clases/ficha-medica.php');
require('../clases/sociales-alumnos.php');
require('../clases/tallas-alumnos.php');
require('../controladores/conexion.php');
$conexion = conectarBD();

$Alumno = new Alumnos();
$Representante = new Representantes();
$Padre = new Padres();

$Datos_medicos = new FichaMedica();
$Datos_sociales = new DatosSociales();
$Datos_Tallas = new TallasAlumno();

$alumno = $Alumno->consultarAlumno($_POST['id_alumno']);

$datos_medicos = $Datos_medicos->consultarFicha_Medica($_POST['id_alumno']);
$datos_sociales = $Datos_sociales->consultarDatosSociales($_POST['id_alumno']);
$datos_tallas = $Datos_Tallas->consultarTallasAlumno($_POST['id_alumno']);

$representante = $Representante->consultarRepresentante($_POST['id_representante']);


$padre = $Padre->consultarPadres($alumno['idPadre']);

$nombres_alumno = explode(" ",$alumno['Nombres']);
$apellidos_alumno = explode(" ",$alumno['Apellidos']);

$nombres_representante = explode(" ",$representante['Nombres']);
$apellidos_representante = explode(" ",$representante['Apellidos']);

$nombres_padre = explode(" ",$padre['Nombres']);
$apellidos_padre = explode(" ",$padre['Apellidos']);

desconectarBD($conexion);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Consultar registros
	</title>
</head>
<style type="text/css">
	div {
		padding: .4rem;
		margin: 16px 2px;
		border: solid 1px #000000AA;
	}
	html{
		font-family: Calibri;
	}
	input[type="text"], input[type="number"], input[type="tel"], textarea {
		display: inline-block;
		width: auto;
	}
</style>
<body>
	<form action="../controladores/control-alumnos.php" method="POST">
		<div style="width: 80%; max-height: 90vh; overflow-y: auto;">

			<div>Formulario de registro de alumnos</div>

			<div>

				<h1>Datos personales.</h1>

				<div>
					
					<div class="col-span-5 flex">
						<label class="border rounded-l-2xl p-2 bg-gray-300">Nombres:</label>
						<input type="text" name="Primer_Nombre_Alumno" placeholder="Primer nombre" class="w-full border p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>" required value="<?php echo $nombres_alumno[0] ?>">
						<input type="text" name="Segundo_Nombre_Alumno" placeholder="Segundo nombre" class="w-full border rounded-r-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>" required value="<?php echo $nombres_alumno[1] ?>">
					</div>
					<div class="col-span-5 flex">
						<label class="border rounded-l-2xl p-2 bg-gray-300">Apellidos:</label>
						<input type="text" name="Primer_Apellido_Alumno" placeholder="Primer apellido" class="w-full border p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>" required value="<?php echo $apellidos_alumno[0] ?>">
						<input type="text" name="Segundo_Apellido_Alumno" placeholder="Segundo apellido" class="w-full border rounded-r-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>" required value="<?php echo $apellidos_alumno[1] ?>">
					</div>
					
					<div class="col-span-3 flex">
						<label class="border rounded-l-2xl p-2 bg-gray-300">Cédula:</label>
						<input type="text" name="Cedula_Alumno" placeholder="Cédula de identidad" class="w-full border rounded-r-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>" required value="<?php echo $alumno['Cédula'] ?>">
					</div>
					<div>
						<span>Genero:</span><br>
						
						<label>F </label>
						<input type="radio" name="Genero_Alumno" value="F" required <?php if ($alumno['Género'] == "F") { echo "checked";} ?>>
						<label>M </label>
						<input type="radio" name="Genero_Alumno" value="M" required <?php if ($alumno['Género'] == "M") { echo "checked";} ?>>
					</div>
					<div class="col-span-5 flex">
						<label class="w-1/2 border rounded-l-2xl p-2 bg-gray-300">Fecha de nacimiento:</label>
						<input type="date" name="Fecha_Nacimiento_Alumno" class="w-full border rounded-r-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>" required value="<?php echo $alumno['Fecha_Nacimiento'] ?>">
					</div>
					<div class="col-span-5 flex">
						<label class="border rounded-l-2xl p-2 bg-gray-300">Lugar de nacimiento:</label>
						<input type="text" name="Lugar_Nacimiento_Alumno" class="w-full border rounded-r-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
					</div>
					<div class="col-span-5 flex">
						<label class="w-1/2 border rounded-l-2xl p-2 bg-gray-300">Correo electrónico:</label>
						<input type="text" name="Correo_electrónico_Alumno" class="w-full border rounded-r-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
					</div>
					<div class="col-span-5 flex">
						<label class="border rounded-l-2xl p-2 bg-gray-300">Teléfono:</label>
						<input type="tel" name="Teléfono_Principal_Alumno" placeholder="Movil" class="w-full border p-2" required value="<?php echo $alumno['Teléfono_Principal'] ?>">
						<input type="tel" name="Teléfono_Auxiliar_Alumno" placeholder="Fijo" class="w-full border rounded-r-2xl p-2" required value="<?php echo $alumno['Teléfono_Auxiliar'] ?>">
					</div>
					<div class="col-span-5 flex">
						<label class="w-1/2 border rounded-l-2xl p-2 bg-gray-300">Grado a cursar:</label>
						<select name="Grado_A_Cursar" class="w-full border rounded-r-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
							<option value="Primer año">Primer año</option>
							<option value="Segundo año">Segundo año</option>
							<option value="Tercer año">Tercer año</option>
							<option value="Cuarto año">Cuarto año</option>
							<option value="Quinto año">Quinto año</option>
						</select>
					</div>
					<div class="col-span-5 flex">
						<span class="border rounded-l-2xl p-2 bg-gray-300">¿El estudiante ha repetido algún año?:</span>

						<div class="flex justify-evenly items-center w-full border p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
							<div>
								<label>Si </label>
								<input type="radio" name="ALumno_Repitente" value="Si" required>

								<label>No </label>
								<input type="radio" name="ALumno_Repitente" value="No" required>
							</div>

							<span>¿Qué año repite?</span>
							<input type="text" name="Año_Repitente" class="
							w-full border rounded-r-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
						</div>
					</div>
					<div class="col-span-5 flex">
						<span class="border w-1/2 rounded-l-2xl p-2 bg-gray-300">¿Tiene materias pendientes?</span>

						<div class="flex justify-evenly items-center w-1/2 border p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
							<div>
								<label>Si </label>
								<input type="radio" name="Tiene_Materias_Pendientes" value="Si" required>

								<label>No </label>
								<input type="radio" name="Tiene_Materias_Pendientes" value="No" required>
							</div>
							<span>¿Cuales?</span>
							<input type="text" name="Materias_Pendientes" class="w-full border rounded-r-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
						</div>
					</div>
					
					<div class="col-span-5 flex flex-col">
						<label class="border w-full rounded-t-2xl p-2 bg-gray-300">Plantel de procedencia:</label><br>
						<textarea name="Plantel_Procedencia" class="w-full border rounded-b-2xl p-2 resize-none"></textarea>
					</div>

				</div>
				<!--Datos sociales-->
				<h1 class="text-2xl mb-3">Datos sociales.</h1>

				<div class="grid grid-cols-5 gap-2 text-sm">
					<!--Dirección de residencia-->
					<div class="col-span-5 flex flex-col">
						<label class="border w-full rounded-t-2xl p-2 bg-gray-300">Dirección de residencia:</label><br>
						<textarea name="Direccion_Alumno" class="w-full border rounded-b-2xl p-2 resize-none"></textarea>
					</div>
					<div class="col-span-5 flex">
						<span class="border rounded-l-2xl p-2 bg-gray-300">¿Tiene canaima?</span>

						<div class="flex justify-evenly items-center w-full border p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
							<div>
								<label>Si </label>
								<input type="radio" name="Tiene_Canaima" value="Si" required>

								<label>No </label>
								<input type="radio" name="Tiene_Canaima" value="No" required>
							</div>
							<label class="w-full border p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">¿En que condiciones?</label>
							<select name="Condiciones_Canaima" class="w-full border rounded-r-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
								<option value="Muy buenas condiciones">Muy buenas condiciones</option>
								<option value="Buenas condiciones">Buenas condiciones</option>
								<option value="Malas condiciones">Malas condiciones</option>
								<option value="Muy malas condiciones">Muy malas condiciones</option>
							</select>
						</div>
					</div>
					<!--Carnet de la patria-->
					<div class="col-span-5 flex">
						<span class="border w-full rounded-l-2xl p-2 bg-gray-300">Tiene carnet de la patria:</span>

						<div class="flex justify-evenly items-center w-full border p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
							<div>
								<label>Si </label>
								<input type="radio" name="Tiene_Carnet_Patria" value="Si" required>

								<label>No </label>
								<input type="radio" name="Tiene_Carnet_Patria" value="No" required>
							</div>
							<span>Código:</span>
							<input type="text" name="Codigo_Carnet_Patria" class="w-full border p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>"><br>
							<hr>
							<span>Serial:</span>
							<input type="text" name="Serial_Carnet_Patria" class="w-full border rounded-r-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
						</div>
					</div>
					<!--Conexión a internet-->
					<div class="col-span-5 flex">
						<span class="border w-full rounded-l-2xl p-2 bg-gray-300">Cuenta con conexión a internet en su vivienda:</span>

						<div class="flex justify-evenly items-center w-full border rounded-r-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
							<div>
								<label>Si </label>
								<input type="radio" name="Internet_Vivienda" value="Si" required>

								<label>No </label>
								<input type="radio" name="Internet_Vivienda" value="No" required>
							</div>
						</div>
						
				</div>
			</div>
		
			<!--Datos de salud-->
			<h1 class="text-2xl mb-3">Datos de salud.</h1>

			<div class="grid grid-cols-5 gap-2 text-sm">
				<div class="col-span-5 flex flex-col">
					<label class="border w-full rounded-t-2xl p-2 bg-gray-300">Antropométricos:</label>
					<div class="flex">
						<span class="border w-full rounded-bl-2xl p-2 bg-gray-300">Índice</span>
						<input type="text" name="Indice" placeholder="Índice" class="w-full border p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>"><br><hr>
						
						<span class="border w-full p-2 bg-gray-300">Talla</span>
						<input type="text" name="Talla" placeholder="Talla" class="w-full border p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>"><br><hr>
						<span class="border w-full p-2 bg-gray-300">Peso</span>
						<input type="text" name="Peso" placeholder="Peso" class="w-full border p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>"><br><hr>
						
						<span class="border w-full p-2 bg-gray-300">C.Brazo</span>
						<input type="text" name="C_Braquial" placeholder="C.brazo" class="w-full border rounded-br-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
					</div>
				</div>
				<div class="col-span-5 flex flex-col">
					<label class="border w-full rounded-t-2xl p-2 bg-gray-300">Tallas</label>
					<div class="flex">
						<span class="border w-full rounded-bl-2xl p-2 bg-gray-300">Pantalón</span>
						<input type="text" name="Talla_Pantalon" placeholder="Pantalón" class="w-full border p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>"><br><hr>
					
						<span class="border w-full p-2 bg-gray-300">Camisa</span>
						<input type="text" name="Talla_Camisa" placeholder="Camisa" class="w-full border p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>"><br><hr>
					
						<span class="border w-full p-2 bg-gray-300">Zapatos</span>
						<input type="text" name="Talla_Zapatos" placeholder="Zapatos" class="w-full border rounded-br-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
					</div>
				</div>
				<div class="col-span-5 flex">
						<span class="w-1/2 border rounded-l-2xl p-2 bg-gray-300">Padece alguna enfermedad:</span>

						<div class="flex justify-evenly items-center w-1/2 border p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
							<div>
								<label>Si </label>
								<input type="radio" name="Padece_Enfermedad" value="Si" required>

								<label>No </label>
								<input type="radio" name="Padece_Enfermedad" value="No" required>
							</div>
							<span>¿Cual?:</span><br>
							<input type="text" name="Cual_Enfermedad" class="
						w-full border rounded-r-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
						</div>
				</div>
				<!--Teléfono del familiar-->
					<div>
						<label>Alergias:</label><br>
						<input type="text" name="Alergias">
					</div>
				<div class="col-span-5 flex items-center">
						<span class="w-full border rounded-l-2xl p-2 bg-gray-300">Tipo de sangre:</span>
						<select name="Grupo_Sanguineo" class="w-full border p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
							<option value="O">O</option>
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="AB">AB</option>
						</select>
						<span class="border p-2 bg-gray-300">Rh</span>
						<select name="Factor_Rhesus" class="w-full border rounded-r-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
							<option value="+">+</option>
							<option value="-">-</option>
						</select>
				</div>
				<div class="col-span-5 flex">
						<span class="w-1/2 border rounded-l-2xl p-2 bg-gray-300">Lateralidad:</span>
						<div class="flex justify-evenly items-center w-full border rounded-r-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
							<div>
								<label>Ambidextro </label>
								<input type="radio" name="Lateralidad" value="Ambidextro" required>

								<label>Diestro </label>
								<input type="radio" name="Lateralidad" value="Diestro" required>

								<label>Zurdo </label>
								<input type="radio" name="Lateralidad" value="Zurdo" required>
							</div>
						</div>
				</div>
				<div class="col-span-5 flex">
						<span class="w-1/2 border rounded-l-2xl p-2 bg-gray-300">Condición de la dentadura:</span>
						<div class="flex justify-evenly items-center w-full border rounded-r-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
							<div>
								<label>Buena </label>
								<input type="radio" name="Condicion_Dentadura" value="Buena" required>

								<label>Regular </label>
								<input type="radio" name="Condicion_Dentadura" value="Regular" required>

								<label>Mala </label>
								<input type="radio" name="Condicion_Dentadura" value="Mala" required>
							</div>
						</div>
				</div>
				<div class="col-span-5 flex">
						<span class="w-1/2 border rounded-l-2xl p-2 bg-gray-300">Condición oftalmológicas:</span>
						<div class="flex justify-evenly items-center w-full border rounded-r-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
							<div>
								<label>Buena </label>
								<input type="radio" name="Condicion_Vista" value="Buena" required>

								<label>Regular </label>
								<input type="radio" name="Condicion_Vista" value="Regular" required>

								<label>Mala </label>
								<input type="radio" name="Condicion_Vista" value="Mala" required>
							</div>
						</div>
				</div>
				<div class="col-span-5 flex flex-col">
					<span class="border w-full rounded-t-2xl p-2 bg-gray-300">Presenta alguna de estas condiciones:</span>
					<div class="flex justify-evenly items-center w-full border rounded-b-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
						<div>
							<label>Visual </label>
							<input type="checkbox" name="Condiciones_Salud[]" value="Visual">

							<label>Motora </label>
							<input type="checkbox" name="Condiciones_Salud[]" value="Motora">

							<label>Auditiva </label>
							<input type="checkbox" name="Condiciones_Salud[]" value="Auditiva">

							<label>Escritura </label>
							<input type="checkbox" name="Condiciones_Salud[]" value="Escritura">

							<label>Lectura </label>
							<input type="checkbox" name="Condiciones_Salud[]" value="Lectura">

							<label>Embarazo </label>
							<input type="checkbox" name="Condiciones_Salud[]" value="Embarazo">
						</div>
					</div>
				</div>
				<div class="col-span-5 flex">
					<span class="w-1/2 border rounded-l-2xl p-2 bg-gray-300">Es atendido por otra institución:</span>

					<div class="flex justify-evenly items-center w-1/2 border p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
						<div>
							<label>Si </label>
							<input type="radio" name="Recibe_Atención_Inst" value="Si" required>

							<label>No </label>
							<input type="radio" name="Recibe_Atención_Inst" value="No" required>
						</div>
						<span>¿Cual institución?</span><br>
						<input type="text" name="Institucion_Medica" class="w-full border rounded-r-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
					</div>
				</div>
				<div class="col-span-5 flex">
					<span class="w-1/2 border rounded-l-2xl p-2 bg-gray-300">¿Recibe alguna medicacion especial?:</span>

					<div class="flex justify-evenly items-center w-1/2 border p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
						<div>
							<label>Si </label>
							<input type="radio" name="Recibe_Medicacion" value="Si" required>

							<label>No </label>
							<input type="radio" name="Recibe_Medicacion" value="No" required>
						</div>
						<span>¿Cual?</span><br>
						<input type="text" name="Medicacion" class="w-full border rounded-r-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
					</div>
				</div>
				<div class="col-span-5 flex">
					<span class="w-1/2 border rounded-l-2xl p-2 bg-gray-300">¿Tiene alguna dieta especial?:</span>

					<div class="flex justify-evenly items-center w-1/2 border p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
						<div>
							<label>Si </label>
							<input type="radio" name="Tiene_Dieta_Especial" value="Si" required>

							<label>No </label>
							<input type="radio" name="Tiene_Dieta_Especial" value="No" required>
						</div>
						<span>¿Cual?</span><br>
						<input type="text" name="Dieta_Especial" class="w-full border rounded-r-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
					</div>
				</div>
				<div class="col-span-5 flex">
					<span class="w-1/2 border rounded-l-2xl p-2 bg-gray-300">Posee carnet de discapacidad:</span>

					<div class="flex justify-evenly items-center w-1/2 border p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
						<div>
							<label>Si </label>
							<input type="radio" name="Tiene_Carnet_Discapacidad" value="Si" required>

							<label>No </label>
							<input type="radio" name="Tiene_Carnet_Discapacidad" value="No" required>
						</div>
						<span>Número de carnet de discapacidad:</span>
						<input type="text" name="Nro_Carnet_Discapacidad" class="w-full border rounded-r-2xl p-2" required value="<?php echo $alumno['Lugar_Nacimiento'] ?>">
					</div>

					
				</div>
				
			</div>

			<?php if (!$Es_el_representante): #Si el representante es el padre no se le pide otra vez el formulario, se asumen todos los campos?>
			<div>
				<!--Datos del padre o la madre-->
				<h1>Datos del padre o la madre.</h1>

				<div>
					<!--Nombres del familiar-->
					<div>
						<label>Nombres:</label><br>
						<input type="text" name="Primer_Nombre_Familiar" placeholder="Primer nombre">
						<input type="text" name="Segundo_Nombre_Familiar" placeholder="Segundo nombre">
					</div>

					<!--Apellidos del familiar-->
					<div>
						<label>Apellidos:</label><br>
						<input type="text" name="Primer_Apellido_Familiar" placeholder="Primer apellido">
						<input type="text" name="Segundo_Apellido_Familiar" placeholder="Segundo apellido">
					</div>

					<!--Genero del familiar-->
					<div>
								
							<p>Genero:</p>
							
							<label>F </label>
							<input type="radio" name="Genero_Familiar" value="F">

							<label>M </label>
							<input type="radio" name="Genero_Familiar" value="M">

					</div>

					<!--Vinculo con el estudiante del familiar-->
					<div>
						<span>Vinculo con el estudiante:</span>
						<div>
							<label>Madre </label>
							<input type="radio" name="Vinculo_Familiar" value="Madre">
							<label>Padre </label>
							<input type="radio" name="Vinculo_Familiar" value="Padre">
						</div>
					</div>

					<!--Cédula del familiar-->
					<div>
						<label>Cédula:</label><br>
						<input type="text" name="Cédula_Familiar" placeholder="Cédula de identidad">
					</div>

					<!--Fecha de nacimiento del familiar-->
					<div>
						<label>Fecha de nacimiento:</label><br>
						<input type="date" name="Fecha_Nacimiento_Familiar">
					</div>

					<!--Lugar de nacimiento del familiar-->
					<div>
						<label>Lugar de nacimiento:</label><br>
						<input type="text" name="Lugar_Nacimiento_Familiar">
					</div>

					<!--Correo electrónico del familiar-->
					<div>
						<label>Correo electrónico:</label><br>
						<input type="email" name="Correo_electrónico_Familiar">
					</div>

					<!--Teléfono del familiar-->
					<div>
						<label>Teléfono:</label><br>
						<input type="tel" name="Teléfono_Principal_Familiar" placeholder="Movil">
						<input type="tel" name="Teléfono_Auxiliar_Familiar" placeholder="Fijo">
					</div>

					<!--Estado civil del familiar-->
					<div>
						<label>Estado civil:</label><br>
						<select name="Estado_Civil_Familiar">
							<option value="Soltero(a)">Soltero(a)</option>
							<option value="Casado(a)">Casado(a)</option>
							<option value="Divorsiado(a)">Divorsiado(a)</option>
							<option value="Viudo(a)">Viudo(a)</option>
						</select>
					</div>
					
					<!--Dirección de residencia del Familiar-->
					<div>
						<label>Dirección de residencia:</label><br>
						<textarea name="Direccion_Familiar"></textarea>
					</div>
					
					<!--Se encuentra el familiar en el país-->
					<div>
						<span>Se encuentra en el país:</span>

						<div>
							<label>Si </label>
							<input type="radio" name="Reside_En_El_País" value="Si">
							<label>No </label>
							<input type="radio" name="Reside_En_El_País" value="No">
						</div>

						<input type="text" name="País" placeholder="¿Donde?" value="<?php echo $_SESSION['País'] ?? NULL;?>">
					</div>
				</div>
			</div>
			<?php else: ?>
			
			<?php endif ?>
		
		
		</form>
		
		</div>
		
		<table style="width: 100%; text-align: center;" border="1" cellpadding="6">
			<tr>
				<td></td>
				<td>
					<input type="reset" value="Restableser cambios">
				</td>
				<td>
					<input type="hidden" name="orden" value="Editar">
					<input type="submit" name="Guardar cambios" value="Guardar cambios">
				</td>
				<td><a href="index.php">Volver al menú</a></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

require('../clases/estudiante.php');
require('../clases/representantes.php');
require('../clases/padres.php');

require('../clases/ficha-médica.php');
require('../clases/sociales-estudiantes.php');
require('../clases/tallas-estudiantes.php');

require('../clases/grado.php');
require('../clases/año-escolar.php');
require('../clases/estudiantes-repitentes.php');

require('../controladores/conexion.php');

$conexion = conectarBD();

$Estudiante = new Estudiantes();
$Representante = new Representantes();
$Padre = new Padres();

$Datos_Médicos = new Fichamédica();
$Datos_sociales = new DatosSociales();
$Datos_Tallas = new TallasEstudiante();
$Estudiante_repitente = new EstudiantesRepitentes();
$Grado = new GradoAcadémico();
$Año = new Año_Escolar();

$estudiante = $Estudiante->consultarEstudiante($_POST['id_estudiante']);

$datos_Médicos = $Datos_Médicos->consultarFicha_médica($_POST['id_estudiante']);
$datos_sociales = $Datos_sociales->consultarDatosSociales($_POST['id_estudiante']);
$datos_tallas = $Datos_Tallas->consultarTallasEstudiante($_POST['id_estudiante']);

$representante = $Representante->consultarRepresentante($_POST['id_representante']);

$estudiante_repitente = $Estudiante_repitente->consultarEstudiantesRepitentes($_POST['id_estudiante']);
$grado = $Grado->consultarGrado($_POST['id_estudiante']);

$padre = $Padre->consultarPadres($estudiante['idPadre']);

$nombres_estudiante = explode(" ",$estudiante['Nombres']);
$apellidos_estudiante = explode(" ",$estudiante['Apellidos']);

$nombres_representante = explode(" ",$representante['Nombres']);
$apellidos_representante = explode(" ",$representante['Apellidos']);

$nombres_padre = explode(" ",$padre['Nombres']);
$apellidos_padre = explode(" ",$padre['Apellidos']);

desconectarBD($conexion);
var_dump($Año);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar Estudiante</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/colores.css"/>
	<link rel="icon" type="img/png" href="../img/distintivo-LGPF.png">
</head>
<body>

	<form class="card" action="../controladores/control-estudiantes.php" method="POST" style="max-width: 600px; margin: 75px auto;">
		<div class="card-header">
			<h4>Formulario de registro de estudiantes</h4>
			<h6><?php echo "Año Académico: (".$Año->getInicio_Año_Escolar()."-".$Año->getFin_Año_Escolar().")"; ?></h6>
		</div>
		<div class="card-body">

			<div>

				<h5>Datos personales.</h5>

				<div>

					<div>
						<label >Nombres:</label>
						<div class="input-group">
							<input class="form-control mb-2" type="text" name="Primer_Nombre_Estudiante" placeholder="Primer nombre" required value="<?php echo $nombres_estudiante[0] ?>">
							<input class="form-control mb-2" type="text" name="Segundo_Nombre_Estudiante" placeholder="Segundo nombre" required value="<?php echo $nombres_estudiante[1] ?>">
						</div>

					</div>
					<div>
						<label >Apellidos:</label>
						<div class="input-group">
							<input class="form-control mb-2" type="text" name="Primer_Apellido_Estudiante" placeholder="Primer apellido" required value="<?php echo $apellidos_estudiante[0] ?>">
							<input class="form-control mb-2" type="text" name="Segundo_Apellido_Estudiante" placeholder="Segundo apellido" required value="<?php echo $apellidos_estudiante[1] ?>">
						</div>
					</div>

					<div>
						<label >Cédula:</label>
						<input class="form-control mb-2" type="text" name="Cédula_Estudiante" placeholder="Cédula de identidad" required value="<?php echo $estudiante['Cédula'] ?>">
					</div>
					<div>
						<span>Género:</span>

						<div class="form-check">
							<label class="form-label">F </label>
							<input class="form-check-input" type="radio" name="Género_Estudiante" value="F" required <?php if ($estudiante['Género'] == "F") { echo "checked";} ?>>
						</div>
						<div class="form-check">
							<label class="form-label">M </label>
							<input class="form-check-input" type="radio" name="Género_Estudiante" value="M" required <?php if ($estudiante['Géneroa'] == "M") { echo "checked";} ?>>
						</div>


					</div>
					<div>
						<label class="form-label">Fecha de nacimiento:</label>
						<input class="form-control mb-2" type="date" name="Fecha_Nacimiento_Estudiante" required value="<?php echo $estudiante['Fecha_Nacimiento'] ?>" required value="<?php echo $estudiante['Fecha_Nacimiento'] ?>">
					</div>
					<div>
						<label class="form-label">Lugar de nacimiento:</label>
						<input class="form-control mb-2" type="text" name="Lugar_Nacimiento_Estudiante" value="<?php echo $estudiante['Lugar_Nacimiento'] ?>">
					</div>
					<div>
						<label class="form-label">Correo electrónico:</label>
						<input class="form-control mb-2" type="text" name="Correo_electrónico_Estudiante" required value="<?php echo $estudiante['Correo_Electrónico'] ?>">
					</div>
					<div>
						<label >Teléfono principal:</label>
						<input class="form-control mb-2" type="tel" name="Teléfono_Principal_Estudiante" placeholder="Movil" required value="<?php echo $estudiante['Teléfono_Principal'] ?>">
						<label >Teléfono auxiliar:</label>
						<input class="form-control mb-2" type="tel" name="Teléfono_Auxiliar_Estudiante" placeholder="Fijo" required value="<?php echo $estudiante['Teléfono_Auxiliar'] ?>">
					</div>
					<div>
						<label class="form-label">Grado a cursar:</label>
						<select class="form-select" name="Grado_A_Cursar" required >
							<option value="Primer año" <?php if($grado['Grado_A_Cursar'] == "Primer año"){ echo "selected";} ?>>Primer año</option>
							<option value="Segundo año" <?php if($grado['Grado_A_Cursar'] == "Segundo año"){ echo "selected";} ?>>Segundo año</option>
							<option value="Tercer año" <?php if($grado['Grado_A_Cursar'] == "Tercer año"){ echo "selected";} ?>>Tercer año</option>
							<option value="Cuarto año" <?php if($grado['Grado_A_Cursar'] == "Cuarto año"){ echo "selected";} ?>>Cuarto año</option>
							<option value="Quinto año" <?php if($grado['Grado_A_Cursar'] == "Quinto año"){ echo "selected";} ?>>Quinto año</option>
						</select>
					</div>
					<div>
						<span>¿Tiene materias pendientes?</span>

						<div class="form-check">
							<label class="form-label">Si </label>
							<input class="form-check-input" type="radio" name="Tiene_Materias_Pendientes" value="Si" required <?php if (!empty($estudiante['Lugar_Nacimiento'])) {	echo "checked";} ?>>
						</div>
						<div class="form-check">
							<label class="form-label">No </label>
							<input class="form-check-input" type="radio" name="Tiene_Materias_Pendientes" value="No" required <?php if (empty($estudiante['Lugar_Nacimiento'])) {	echo "checked";} ?>>
						</div>
						<span>¿Cuáles?</span>
						<input class="form-control mb-2" type="text" name="Materias_Pendientes" required value="<?php echo $estudiante_repitente["Materias_Pendientes"] ?>">
					</div>

					<div>
						<label class="form-label">Plantel de procedencia:</label>
						<textarea class="form-control mb-2" name="Plantel_Procedencia"><?php echo $estudiante['Plantel_Procedencia'] ?></textarea class="form-control mb-2">
					</div>

				</div>
				<!--Datos sociales-->
				<h5>Datos sociales.</h5>

				<div>
					<!--Dirección de residencia-->
					<div>
						<label class="form-label">Dirección de residencia:</label>
						<textarea class="form-control mb-2" name="Dirección_Estudiante"><?php echo $estudiante['Dirección'] ?></textarea class="form-control mb-2">
					</div>
					<div>
						<span >¿Tiene canaima?</span>

						<div>
							<div>
								<label class="form-label">Si </label>
								<input class="form-check-input" type="radio" name="Tiene_Canaima" value="Si" required <?php if ($datos_sociales['Posee_Canaima'] == "Si") { echo "checked";} ?>>

								<label class="form-label">No </label>
								<input class="form-check-input" type="radio" name="Tiene_Canaima" value="No" required <?php if ($datos_sociales['Posee_Canaima'] == "No") { echo "checked";} ?>>
							</div>
							<label required value="<?php echo $datos_sociales['Condición_Canaima'] ?>">¿En que Condiciones?</label>
							<select class="form-select" name="Condiciones_Canaima" required>
								<option value="Muy buenas Condiciones" <?php if($datos_sociales['Condición_Canaima'] == "Muy buenas Condiciones") {echo "selected";} ?>>Muy buenas Condiciones</option>
								<option value="Buenas Condiciones" <?php if($datos_sociales['Condición_Canaima'] == "Buenas Condiciones") {echo "selected";} ?>>Buenas Condiciones</option>
								<option value="Malas Condiciones" <?php if($datos_sociales['Condición_Canaima'] == "Malas Condiciones") {echo "selected";} ?>>Malas Condiciones</option>
								<option value="Muy malas Condiciones" <?php if($datos_sociales['Condición_Canaima'] == "Muy malas Condiciones") {echo "selected";} ?>>Muy malas Condiciones</option>
							</select>
						</div>
					</div>
					<!--Carnet de la patria-->
					<div>
						<span>Tiene carnet de la patria:</span>

						<div>
							<div>
								<label class="form-label">Si </label>
								<input class="form-check-input" type="radio" name="Tiene_Carnet_Patria" value="Si" required <?php if($datos_sociales['Posee_Carnet_Patria'] == "Si") {echo "checked";}?>>

								<label class="form-label">No </label>
								<input class="form-check-input" type="radio" name="Tiene_Carnet_Patria" value="No" required <?php if($datos_sociales['Posee_Carnet_Patria'] == "No") {echo "checked";}?>>
							</div>
							<span>Código:</span>
							<input class="form-control mb-2" type="text" name="Código_Carnet_Patria" required value="<?php echo $datos_sociales['Código_Carnet_Patria'] ?>">

							<span>Serial:</span>
							<input class="form-control mb-2" type="text" name="Serial_Carnet_Patria" required value="<?php echo $datos_sociales['Serial_Carnet_Patria'] ?>">
						</div>
					</div>
					<!--Conexión a internet-->
					<div>
						<span>Cuenta con conexión a internet en su vivienda:</span>

						<div>
							<div>
								<label class="form-label">Si </label>
								<input class="form-check-input" type="radio" name="Internet_Vivienda" value="Si" required <?php if($datos_sociales['Acceso_Internet'] == "Si") {echo "checked";}?>>

								<label class="form-label">No </label>
								<input class="form-check-input" type="radio" name="Internet_Vivienda" value="No" required <?php if($datos_sociales['Acceso_Internet'] == "No") {echo "checked";}?>>
							</div>
						</div>

				</div>
			</div>

			<!--Datos de salud-->
			<h5>Datos de salud.</h5>

			<div>
				<div>
					<label class="form-label">Antropométricos:</label>
					<div>
						<span>Índice</span>
						<input class="form-control mb-2" type="text" name="Índice" placeholder="Índice" required value="<?php echo $datos_Médicos['Índice'] ?>">

						<span>Talla</span>
						<input class="form-control mb-2" type="text" name="Talla" placeholder="Talla" required value="<?php echo $datos_Médicos['Estatura'] ?>">
						<span>Peso</span>
						<input class="form-control mb-2" type="text" name="Peso" placeholder="Peso" required value="<?php echo $datos_Médicos['Peso'] ?>">

						<span>C.Brazo</span>
						<input class="form-control mb-2" type="text" name="C_Braquial" placeholder="C.brazo" required value="<?php echo $datos_Médicos['Circ_Braquial'] ?>">
					</div>
				</div>
				<div>
					<label class="form-label">Tallas</label>
					<div>
						<span>Pantalón</span>
						<input class="form-control mb-2" type="text" name="Talla_Pantalón" placeholder="Pantalón" required value="<?php echo $datos_tallas['Talla_Pantalón'] ?>">

						<span>Camisa</span>
						<input class="form-control mb-2" type="text" name="Talla_Camisa" placeholder="Camisa" required value="<?php echo $datos_tallas['Talla_Camisa'] ?>">

						<span>Zapatos</span>
						<input class="form-control mb-2" type="text" name="Talla_Zapatos" placeholder="Zapatos" required value="<?php echo $datos_tallas['Talla_Zapatos'] ?>">
					</div>
				</div>
				<!--Teléfono del familiar-->
					<div>
						<label class="form-label">Alergias:</label>
						<input class="form-control mb-2" type="text" name="Alergias" value="<?php echo $datos_Médicos['Alergias'] ?>">
					</div>
				<div>
					<span>Tipo de sangre:</span>
					<div class="input-group">
						<?php $sangre = str_split($datos_Médicos['Tipo_Sangre']);?>
						<select class="form-select" name="Grupo_Sanguineo">
							<option value="O" <?php if($sangre[0] == "O") { echo "selected";} ?>>O</option>
							<option value="A" <?php if($sangre[0] == "A") { echo "selected";} ?>>A</option>
							<option value="B" <?php if($sangre[0] == "B") { echo "selected";} ?>>B</option>
							<option value="AB" <?php if($sangre[0] == "AB") { echo "selected";} ?>>AB</option>
						</select>
						<span class="input-group-text">Factor Rhesus:</span>
						<select class="form-select" name="Factor_Rhesus">
							<option value="+" <?php if($sangre[1] == "+") { echo "selected";} ?>>+</option>
							<option value="-" <?php if($sangre[1] == "-") { echo "selected";} ?>>-</option>
						</select>
					</div>


				</div>
				<div>
						<span>Lateralidad:</span>
						<div>
							<div>
								<label class="form-label">Ambidextro </label>
								<input class="form-check-input" type="radio" name="Lateralidad" value="Ambidextro" required <?php if($datos_Médicos['Lateralidad'] == "Ambidextro") {echo "checked";} ?>>

								<label class="form-label">Diestro </label>
								<input class="form-check-input" type="radio" name="Lateralidad" value="Diestro" required <?php if($datos_Médicos['Lateralidad'] == "Diestro") {echo "checked";} ?>>

								<label class="form-label">Zurdo </label>
								<input class="form-check-input" type="radio" name="Lateralidad" value="Zurdo" required <?php if($datos_Médicos['Lateralidad'] == "Zurdo") {echo "checked";} ?>>
							</div>
						</div>
				</div>
				<div>
						<span>Condición de la dentadura:</span>
						<div>
							<div>
								<label class="form-label">Buena </label>
								<input class="form-check-input" type="radio" name="Condición_Dentadura" value="Buena" required <?php if($datos_Médicos['Cond_Dental'] == "Buena") {echo "checked";} ?>>

								<label class="form-label">Regular </label>
								<input class="form-check-input" type="radio" name="Condición_Dentadura" value="Regular" required <?php if($datos_Médicos['Cond_Dental'] == "Regular") {echo "checked";} ?>>

								<label class="form-label">Mala </label>
								<input class="form-check-input" type="radio" name="Condición_Dentadura" value="Mala" required <?php if($datos_Médicos['Cond_Dental'] == "Mala") {echo "checked";} ?>>
							</div>
						</div>
				</div>
				<div>
						<span>Condición oftalmológicas:</span>
						<div>
							<div>
								<label class="form-label">Buena </label>
								<input class="form-check-input" type="radio" name="Condición_Vista" value="Buena" required <?php if($datos_Médicos['Cond_Vista'] == "Buena") {echo "checked";} ?>>

								<label class="form-label">Regular </label>
								<input class="form-check-input" type="radio" name="Condición_Vista" value="Regular" required <?php if($datos_Médicos['Cond_Vista'] == "Regular") {echo "checked";} ?>>

								<label class="form-label">Mala </label>
								<input class="form-check-input" type="radio" name="Condición_Vista" value="Mala" required <?php if($datos_Médicos['Cond_Vista'] == "Mala") {echo "checked";} ?>>
							</div>
						</div>
				</div>
				<div>
					<span>Presenta alguna de estas Condiciones:</span>

					<?php

						$Condiciones = str_replace(',', ' ', $datos_Médicos['Impedimento_Físico']);
						$Condiciones = explode(' ', $Condiciones);

						function CondicionesSalud($Condiciones) {
							$Visual = false;
							$Motora = false;
							$Auditiva = false;
							$Escritura = false;
							$Lectura = false;
							$Embarazo = false;
							foreach ($Condiciones as $Condición) {
								if ($Condición == 'Visual') {
									$Visual = true;
								}
								elseif ($Condición == 'Motora') {
									$Motora = true;
								}
								elseif ($Condición == 'Auditiva') {
									$Auditiva = true;
								}
								elseif ($Condición == 'Escritura') {
									$Escritura = true;
								}
								elseif ($Condición == 'Lectura') {
									$Lectura = true;
								}
								elseif ($Condición == 'Embarazo') {
									$Embarazo = true;
								}
							}

							$Condiciones_médicas = [$Visual,$Motora,$Auditiva,$Escritura,$Lectura,$Embarazo];
							return $Condiciones_médicas;

						}
						$Condiciones_médicas = CondicionesSalud($Condiciones);

					?>
					<div>
						<div>
							<label class="form-label">Visual </label>
							<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Visual" <?php if($Condiciones_médicas[0] == true){echo "checked";} ?>>

							<label class="form-label">Motora </label>
							<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Motora" <?php if($Condiciones_médicas[1] == true){echo "checked";} ?>>

							<label class="form-label">Auditiva </label>
							<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Auditiva" <?php if($Condiciones_médicas[2] == true){echo "checked";} ?>>

							<label class="form-label">Escritura </label>
							<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Escritura" <?php if($Condiciones_médicas[3] == true){echo "checked";} ?>>

							<label class="form-label">Lectura </label>
							<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Lectura" <?php if($Condiciones_médicas[4] == true){echo "checked";} ?>>

							<label class="form-label">Embarazo </label>
							<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Embarazo" <?php if($Condiciones_médicas[5] == true){echo "checked";} ?>>
						</div>
					</div>
				</div>
				<div>
					<span>Es atendido por otra institución:</span>

					<div>
						<div>
							<label class="form-label">Si </label>
							<input class="form-check-input" type="radio" name="Recibe_Atención_Inst" value="Si" required <?php if (!empty($datos_Médicos['Institución_médica'])) { echo "checked";} ?>>

							<label class="form-label">No </label>
							<input class="form-check-input" type="radio" name="Recibe_Atención_Inst" value="No" required <?php if (empty($datos_Médicos['Institución_médica'])) { echo "checked";} ?>>
						</div>
						<span>¿Cuál institución?</span>
						<input class="form-control mb-2" type="text" name="Institución_médica" required value="<?php echo $datos_Médicos['Institución_médica'] ?>">
					</div>
				</div>
				<div>
					<span>¿Recibe alguna médicación especial?:</span>

					<div>
						<div>
							<label class="form-label">Si </label>
							<input class="form-check-input" type="radio" name="Recibe_médicación" value="Si" required <?php if (!empty($datos_Médicos['médicación'])) { echo "checked";} ?>>

							<label class="form-label">No </label>
							<input class="form-check-input" type="radio" name="Recibe_médicación" value="No" required <?php if (empty($datos_Médicos['médicación'])) { echo "checked";} ?>>
						</div>
						<span>¿Cuál?</span>
						<input class="form-control mb-2" type="text" name="médicación" required value="<?php echo $datos_Médicos['médicación'] ?>">
					</div>
				</div>
				<div>
					<span>¿Tiene alguna dieta especial?:</span>

					<div>
						<div>
							<label class="form-label">Si </label>
							<input class="form-check-input" type="radio" name="Tiene_Dieta_Especial" value="Si" required>

							<label class="form-label">No </label>
							<input class="form-check-input" type="radio" name="Tiene_Dieta_Especial" value="No" required>
						</div>
						<span>¿Cuál?</span>
						<input class="form-control mb-2" type="text" name="Dieta_Especial">
					</div>
				</div>
				<div>
					<span>Posee carnet de discapacidad:</span>

					<div>
						<div>
							<label class="form-label">Si </label>
							<input class="form-check-input" type="radio" name="Tiene_Carnet_Discapacidad" value="Si" required>

							<label class="form-label">No </label>
							<input class="form-check-input" type="radio" name="Tiene_Carnet_Discapacidad" value="No" required>
						</div>
						<span>Número de carnet de discapacidad:</span>
						<input class="form-control mb-2" type="text" name="Nro_Carnet_Discapacidad">
					</div>


				</div>

			</div>

			<div>
				<!--Datos del padre o la madre-->
				<h5>Datos del padre o la madre.</h5>

				<div>
					<!--Nombres del familiar-->
					<div>
						<label class="form-label">Nombres:</label>
						<input class="form-control mb-2" type="text" name="Primer_Nombre_Familiar" placeholder="Primer nombre">
						<input class="form-control mb-2" type="text" name="Segundo_Nombre_Familiar" placeholder="Segundo nombre">
					</div>

					<!--Apellidos del familiar-->
					<div>
						<label class="form-label">Apellidos:</label>
						<input class="form-control mb-2" type="text" name="Primer_Apellido_Familiar" placeholder="Primer apellido">
						<input class="form-control mb-2" type="text" name="Segundo_Apellido_Familiar" placeholder="Segundo apellido">
					</div>

					<!--Género del familiar-->
					<div>

							<p>Género:</p>

							<label class="form-label">F </label>
							<input class="form-check-input" type="radio" name="Género_Familiar" value="F">

							<label class="form-label">M </label>
							<input class="form-check-input" type="radio" name="Género_Familiar" value="M">

					</div>

					<!--Vinculo con el estudiante del familiar-->
					<div>
						<span>Vinculo con el estudiante:</span>
						<div>
							<label class="form-label">Madre </label>
							<input class="form-check-input" type="radio" name="Vinculo_Familiar" value="Madre">
							<label class="form-label">Padre </label>
							<input class="form-check-input" type="radio" name="Vinculo_Familiar" value="Padre">
						</div>
					</div>

					<!--Cédula del familiar-->
					<div>
						<label class="form-label">Cédula:</label>
						<input class="form-control mb-2" type="text" name="Cédula_Familiar" placeholder="Cédula de identidad">
					</div>

					<!--Fecha de nacimiento del familiar-->
					<div>
						<label class="form-label">Fecha de nacimiento:</label>
						<input class="form-control mb-2" type="date" name="Fecha_Nacimiento_Familiar">
					</div>

					<!--Lugar de nacimiento del familiar-->
					<div>
						<label class="form-label">Lugar de nacimiento:</label>
						<input class="form-control mb-2" type="text" name="Lugar_Nacimiento_Familiar">
					</div>

					<!--Correo electrónico del familiar-->
					<div>
						<label class="form-label">Correo electrónico:</label>
						<input class="form-control" type="email" name="Correo_electrónico_Familiar" value="">
					</div>

					<!--Teléfono del familiar-->
					<div>
						<label class="form-label">Teléfono:</label>
						<input class="form-control mb-2" type="tel" name="Teléfono_Principal_Familiar" placeholder="Movil">
						<input class="form-control mb-2" type="tel" name="Teléfono_Auxiliar_Familiar" placeholder="Fijo">
					</div>

					<!--Estado civil del familiar-->
					<div>
						<label class="form-label">Estado civil:</label>
						<select class="form-select" name="Estado_Civil_Familiar">
							<option value="Soltero(a)">Soltero(a)</option>
							<option value="Casado(a)">Casado(a)</option>
							<option value="Divorsiado(a)">Divorsiado(a)</option>
							<option value="Viudo(a)">Viudo(a)</option>
						</select>
					</div>

					<!--Dirección de residencia del Familiar-->
					<div>
						<label class="form-label">Dirección de residencia:</label>
						<textarea class="form-control mb-2" name="Dirección_Familiar"></textarea class="form-control mb-2">
					</div>

					<!--Se encuentra el familiar en el país-->
					<div>
						<span>Se encuentra en el país:</span>

						<div>
							<label class="form-label">Si </label>
							<input class="form-check-input" type="radio" name="Reside_En_El_País" value="Si">
							<label class="form-label">No </label>
							<input class="form-check-input" type="radio" name="Reside_En_El_País" value="No">
						</div>

						<input class="form-control mb-2" type="text" name="País" placeholder="¿Donde?" value="<?php echo $_SESSION['País'] ?? NULL;?>">
					</div>
				</div>
			</div>

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

<?php

	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../../index.php');
		exit();
	}
	
	require('funciones.php');

	require('../../controladores/conexion.php');
	require('../../clases/bitacora.php');

	require('../../clases/antropometria_est.php');
	require('../../clases/carnet_patria.php');
	require('../../clases/condiciones_est.php');
	require('../../clases/contactos_aux.php');
	require('../../clases/datos_economicos.php');
	require('../../clases/datos_laborales.php');
	require('../../clases/datos_salud.php');
	require('../../clases/datos_sociales.php');
	require('../../clases/datos_vivienda.php');
	require('../../clases/direcciones.php');
	require('../../clases/estudiantes.php');
	require('../../clases/grado_a_cursar_est.php');
	require('../../clases/observaciones_est.php');
	require('../../clases/padres.php');
	require('../../clases/per_academico.php');
	require('../../clases/personas.php');
	require('../../clases/representantes.php');
	require('../../clases/tallas_est.php');
	require('../../clases/telefonos.php');
	require('../../clases/vac_covid19_est.php');
	require('../../clases/vacunas_est.php');

	$antropometria_est = new antropometria_est();
	$bitacora = new bitacora();
	$carnet_patria = new carnet_patria();
	$condiciones_est = new condiciones_est();
	$contactos_aux = new contactos_aux();
	$datos_economicos = new datos_economicos();
	$datos_laborales = new datos_laborales();
	$datos_salud = new datos_salud();
	$datos_sociales = new datos_sociales();
	$datos_vivienda = new datos_vivienda();
	$direcciones = new direcciones();
	$estudiantes = new estudiantes();
	$grado_a_cursar_est = new grado_a_cursar_est();
	$observaciones_est = new observaciones_est();
	$padres = new padres();
	$per_academico = new per_academico();
	$personas = new personas();
	$representantes = new representantes();
	$tallas_est = new tallas_est();
	$telefonos = new telefonos();
	$vac_covid19_est = new vac_covid19_est();
	$vacunas_est = new vacunas_est();

	// estudiante
	$estudiantes->set_cedula_persona($_POST['cedula']);
	$datos_estudiante = $estudiantes->consultar_estudiantes();

	$telefonos->set_cedula_persona($_POST['cedula']);
	$tlfs_estudiante = $telefonos->consultar_telefonos();

	
	// representante
	$representantes->set_cedula_persona($_POST['cedula_representante']);
	$datos_representante = $representantes->consultar_representantes();

	$telefonos->set_cedula_persona($_POST['cedula_representante']);
	$tlfs_representante = $telefonos->consultar_telefonos();

	
	// padre
	$padres->set_cedula_persona($_POST['cedula_padre']);
	$datos_padre = $padres->consultar_padres();

	$telefonos->set_cedula_persona($_POST['cedula_padre']);
	$tlfs_padre = $telefonos->consultar_telefonos();


	// madre
	$padres->set_cedula_persona($_POST['cedula_madre']);
	$datos_madre = $padres->consultar_padres();

	$telefonos->set_cedula_persona($_POST['cedula_madre']);
	$tlfs_madre = $telefonos->consultar_telefonos();


	$nivel = 2;

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Consultar estudiante</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/all.min.css"/>
	<link rel="icon" type="img/png" href="../../img/icono.png">
</head>
<body>


	<main class="d-flex flex-column justify-content-between vh-100">
			
			<?php include('../../header.php'); ?>
			
			<div class="container-md">
				<div class="card w-100">
					<div class="card-header text-center">
						<b class="fs-4">Consulta de registros</b>
					</div>
					<div class="card-body" style="max-height: 65vh; overflow-y:auto;">

						<table id="Estudiante" class="table table-bordered table-striped table-hover" style="max-width:100%;">
				<tbody>
					<tr class="table-primary">
						<th colspan="4">Datos del Estudiante</th>
					</tr>

					<tr>
						<td>Nombres: <?php echo $datos_estudiante['p_nombre']." ".$datos_estudiante['s_nombre'];?></td>
						<td>Apellidos: <?php echo $datos_estudiante['p_apellido']." ".$datos_estudiante['s_apellido'];?></td>
						<td>Cédula: <?php echo $datos_estudiante['cedula'];?></td>
						<td>Cédula escolar: <?php echo $datos_estudiante['cedula_escolar'];?></td>
					</tr>

					<tr>
						<td>Edad: <?php echo calcular_edad($datos_estudiante['fecha_nacimiento']);?> años</td>
						<td colspan="1">Fecha Nacimiento: <?php echo $datos_estudiante['fecha_nacimiento'];?></td>
						<td colspan="2">Lugar Nacimiento: <?php echo $datos_estudiante['lugar_nacimiento'];?></td>
					</tr>

					<?php 

						// Concatena la direccion completa con un espacio o con un vacio en caso de que el dato esté vacio

						$direccion = "";

						if (empty($datos_estudiante['estado'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_estudiante['estado']." ";
						}
						if (empty($datos_estudiante['municipio'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_estudiante['municipio']." ";
						}
						if (empty($datos_estudiante['parroquia'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_estudiante['parroquia']." ";
						}
						if (empty($datos_estudiante['sector'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_estudiante['sector']." ";
						}
						if (empty($datos_estudiante['calle'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_estudiante['calle']." ";
						}
						if (empty($datos_estudiante['nro_casa'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_estudiante['nro_casa']." ";
						}
						if (empty($datos_estudiante['punto_referencia'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_estudiante['punto_referencia']." ";
						}
					?>


					<tr>
						<td colspan="4">Dirección: <?php echo $direccion;?></td>
					</tr>

					<tr>
						<td colspan="4">Correo Electrónico: <?php echo $datos_estudiante['email'];?></td>
					</tr>

					<?php foreach ($tlfs_estudiante as $telefono_est): ?>
						<td>
							Teléfono <?php echo strtolower($telefono_est['relacion']);?>:
							<?php echo $telefono_est['prefijo']."-".$telefono_est['numero'];?> 
						</td>
					<?php endforeach ?>

					<tr>
						<td colspan="1">
							Repite: 
							<?php 
								// Si esta vacio no repite
								if(empty($datos_estudiante['grado_repetido'])) {
									echo "No repite";
								}
								else {
									echo "Si repite";
								}
							?> 
						</td>
						<td colspan="1"> Cuáles Materias: <?php echo $datos_estudiante['materias_repetidas'] ?> </td>
						<td colspan="2"> Qué Año Repite: <?php echo $datos_estudiante['grado_repetido'] ?> </td>
					</tr>

					<tr>

						<td colspan="1">
							Materias Pendientes: 
							<?php 
								// Si esta vacio no repite
								if(empty($datos_estudiante['materias_pendientes'])) {
									echo "No tiene materias pendientes";
								}
								else {;
									echo "Tiene materias pendientes";
								}
							?>
						</td>
						<td colspan="3"> ¿Cuáles Materias Pendientes?: <?php echo $datos_estudiante['materias_pendientes'] ?> </td>
					</tr>

					<tr>
						<td>Plantel de procedencia: <?php echo $datos_estudiante['plantel_proced'];?></td>
						<td>Año a cursar: <?php echo $datos_estudiante['grado_a_cursar'];?></td>
						
						<td colspan="2">
							Periodo académico: 
							<?php echo $datos_estudiante['id_per_academico'];?>
						</td>
					</tr>

					<tr class="table-primary">
						<th colspan="4">Datos sociales</th>
					</tr>

					<tr>
						<td colspan="2"> Con Quién vive: <?php echo $datos_estudiante['con_quien_vive'] ?></td>
					</tr>

					<tr>
						<td>Posee Canaima: <?php echo $datos_estudiante['tiene_canaima'];?> </td>
						<td colspan="3">Condición Canaima: <?php echo $datos_estudiante['condicion_canaima'];?> </td>
					</tr>

					<tr>
						<td>
							Posee Carnet Patria: 
							<?php 
								// Si esta vacio no repite
								if(empty($datos_estudiante['codigo_carnet']) and empty($datos_estudiante['serial_carnet']) ) {
									echo "No";
								}
								else {;
									echo "Si";
								}
							?>
						</td>
						<td colspan="1">Código Carnet Patria: <?php echo $datos_estudiante['codigo_carnet'];?> </td>
						<td colspan="2">Serial Carnet Patria: <?php echo $datos_estudiante['serial_carnet'];?> </td>
					</tr>

					<tr>
						<td colspan="4">Acceso Internet: <?php echo $datos_estudiante['acceso_internet'];?> </td>
					</tr>

					<tr class="table-primary">
						<th colspan="4">Datos de Salud</th>
					</tr>

					<tr>
						<td>Índice: <?php echo $datos_estudiante['indice_m_c'] ?> </td>
						<td>Talla: <?php echo $datos_estudiante['estatura'] ?> CM</td>
						<td>Peso: <?php echo $datos_estudiante['peso'] ?> KG</td>
						<td>C. Brazo: <?php echo $datos_estudiante['circ_braquial'] ?> CM</td>
					</tr>

					<tr>
						<td colspan="1">Talla Camisa: <?php echo $datos_estudiante['camisa'];?> </td>
						<td colspan="1">Talla Pantalón: <?php echo $datos_estudiante['pantalon'];?> </td>
						<td colspan="2">Talla Zapatos: <?php echo $datos_estudiante['calzado'];?> </td>
					</tr>

					<tr>
						<td colspan="1">
							Padece Alguna Enfermedad:
							<?php 
								// Si esta vacio no repite
								if(empty($datos_estudiante['padecimiento'])) {
									echo "No";
								}
								else {;
									echo "Si";
								}
							?>
						</td>
						<td colspan="3">Enfermedad: <?php echo $datos_estudiante['padecimiento'] ?> </td>
					</tr>

					<tr>
						<td colspan="1">Tipo Sangre: <?php echo $datos_estudiante['tipo_sangre'];?></td>
						<td colspan="3">Lateralidad: <?php echo $datos_estudiante['lateralidad'];?> </td>
					</tr>

					<tr>
						<td colspan="1">
							¿Fue vacunado contra el COVID-19?: 
							<?php 
								// Si esta vacio no repite
								if(($datos_estudiante['vac_aplicada']) == "NV") {
									echo "No";
								}
								else {;
									echo "Si";
								}
							?>
						</td>
						<td colspan="1">¿Cuál vacuna? <?php echo $datos_estudiante['vac_aplicada'];?> </td>
						<td colspan="1">Dosis aplicadas: <?php echo $datos_estudiante['dosis'];?></td>
						<td colspan="1">Lote: <?php echo $datos_estudiante['lote'];?> </td>
					</tr>

					<tr>
						<td colspan="4">Dieta Especial: <?php echo $datos_estudiante['dieta_especial'];?></td>
					</tr>

					<tr>
						<td colspan="4">Impedimento Físico: <?php echo $datos_estudiante['impedimento_fisico'];?></td>
					</tr>

					<tr>
						<td colspan="4">Necesidad educativa especial: <?php echo $datos_estudiante['necesidad_educativa'];?></td>
					</tr>					

					<tr>
						<td colspan="1">Cond Vista: <?php echo $datos_estudiante['condicion_vista'];?></td>
						<td colspan="3">Cond Dental: <?php echo $datos_estudiante['condicion_dental'];?></td>
					</tr>

					<tr>
						<td colspan="1">
							Posee Carnet de Discapacidad 
							<?php 
								// Si esta vacio no repite
								if(empty($datos_estudiante['carnet_discapacidad'])) {
									echo "No";
								}
								else {;
									echo "Si";
								}
							?>
						</td>
						<td colspan="3">Carnet Discapacidad: <?php echo $datos_estudiante['carnet_discapacidad'];?></td>
					</tr>

					<tr>
						<td colspan="4">Institución Médica: <?php echo $datos_estudiante['institucion_medica'];?></td>
					</tr>


					<tr class="table-primary">
						<th colspan="4">Datos del representante</th>
					</tr>

					<tr>
						<td colspan="1">Nombres: <?php echo $datos_representante['p_nombre'].' '. $datos_representante['s_nombre'];?></td>
						<td colspan="1">Apellidos: <?php echo $datos_representante['p_apellido'] .' '. $datos_representante['s_apellido'];?></td>
						<td colspan="1">Cédula: <?php echo $datos_representante['cedula'];?></td>
						<td>Edad: <?php echo calcular_edad($datos_representante['fecha_nacimiento']);?> años</td>
					</tr>


					<tr>
						<td>Vínculo con el estudiante: <?php echo $datos_estudiante['relacion_representante']; ?></td>
					</tr>

					<tr>
						<?php foreach ($tlfs_representante as $telefono_representante): ?>
						<td>
							Teléfono <?php echo strtolower($telefono_representante['relacion']);?>:
							<?php echo $telefono_representante['prefijo']."-".$telefono_representante['numero'];?> 
						</td>
						<?php endforeach ?>
					</tr>


					<tr>
						<td colspan="1">Fecha Nacimiento: <?php echo $datos_representante['fecha_nacimiento'];?></td>
						<td colspan="2">Lugar Nacimiento: <?php echo $datos_representante['lugar_nacimiento'];?></td>
						<td colspan="1">Estado Civil: <?php echo $datos_representante['estado_civil'];?></td>
					</tr>

					<?php 

						// Concatena la direccion completa con un espacio o con un vacio en caso de que el dato esté vacio

						$direccion = "";

						if (empty($datos_representante['estado'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_representante['estado']." ";
						}
						if (empty($datos_representante['municipio'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_representante['municipio']." ";
						}
						if (empty($datos_representante['parroquia'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_representante['parroquia']." ";
						}
						if (empty($datos_representante['sector'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_representante['sector']." ";
						}
						if (empty($datos_representante['calle'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_representante['calle']." ";
						}
						if (empty($datos_representante['nro_casa'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_representante['nro_casa']." ";
						}
						if (empty($datos_representante['punto_referencia'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_representante['punto_referencia']." ";
						}
					?>

					<tr>
						<td colspan="4">Dirección: <?php echo $direccion;?></td>
					</tr>

					<tr>
						<td colspan="4">Correo Electrónico: <?php echo $datos_representante['email'];?></td>
					</tr>

					<tr>
						<td>Banco: <?php echo $datos_representante['banco'];?></td>
						<td>Tipo Cuenta: <?php echo $datos_representante['tipo_cuenta'];?></td>
						<td colspan="2">Cta Bancaria: <?php echo $datos_representante['nro_cuenta'];?></td>
					</tr>
					<tr>
						<td>
							Posee carnet de la patria: 
							Trabaja: 
							<?php 
								// Si esta vacio no repite
								if(empty($datos_representante['codigo_carnet']) and empty($datos_representante['serial_carnet'])) {
									echo "No";
								}
								else {;
									echo "Si";
								}
							?>
						</td>
						<td> Código carnet de la patria: <?php echo $datos_representante['codigo_carnet'];?></td>
						<td> Serial carnet de la patria: <?php echo $datos_representante['serial_carnet'];?></td>
						<td> 
							Tiene más representados en el plantel: 
							<?php 
								// Si esta vacio no repite
								if($representantes->contar_representados() < 2) {
									echo "No";
								}
								else {;
									echo "Si";
								}
							?>							
						</td>
					</tr>

					<tr class="table-primary">
						<th colspan="4">Datos laborales del representante</th>
					</tr>

					<tr>
						<td>
							Trabaja: 
							<?php 
								// Si esta vacio no repite
								if(empty($datos_representante['empleo'])) {
									echo "No";
								}
								else {;
									echo "Si";
								}
							?>
						</td>
						<td colspan="3">En qué se desempeña: <?php echo $datos_representante['empleo'];?></td>
					</tr>

					<tr>
						<td colspan="1">Grado de Instrucción: <?php echo $datos_representante['grado_academico'];?></td>
						<td colspan="1">Remuneración: (Cuántos sueldos mínimos): <?php echo $datos_representante['remuneracion'];?></td>
						<td colspan="2">Tipo Remuneración: <?php echo $datos_representante['tipo_remuneracion'];?></td>
					</tr>

					<tr class="table-primary">
						<th colspan="4">Datos vivienda del representante</th>
					</tr>

					<tr>
						<td> Condiciones de la vivienda: <?php echo $datos_representante['condicion'];?></td>
						<td> Tipo de vivienda: <?php echo $datos_representante['tipo'];?></td>
						<td colspan="2"> Tenencia de la vivienda: <?php echo $datos_representante['tenencia'] ?? NULL?></td>
					</tr>

					<tr class="table-primary">
						<th colspan="4">Otro contacto para emergencias</th>
					</tr>

					<tr>
						<td>
							Relación: 
							<?php echo $datos_representante['relacion_aux'] ?? NULL?>								
						</td>
						<td colspan="2"> 
							Nombre: 
							<?php echo $datos_representante['nombre_aux'] ?? NULL; ?> 
							<?php echo $datos_representante['apellido_aux'] ?? NULL; ?> 
						</td>
						<td colspan="2">
							Teléfono: 
						<?php 

							try {
								if (!isset($datos_representante['pref_aux'],$datos_representante['numero_aux'])) {
									throw new Exception('nulo');
								}
								else {
									echo $datos_representante['pref_aux']."-".$datos_representante['numero_aux'];
								}
							} catch (Exception $e) {
								echo ("No tiene");
							}

						?>		
						</td>
					</tr>


					<tr class="table-primary">
						<th colspan="4">Datos del padre</th>
					</tr>

					<tr>
						<td colspan="1">Nombres: <?php echo $datos_padre['p_nombre'].' '. $datos_padre['s_nombre'];?></td>
						<td colspan="1">Apellidos: <?php echo $datos_padre['p_apellido'] .' '. $datos_padre['s_apellido'];?></td>
						<td colspan="1">Cédula: <?php echo $datos_padre['cedula'];?></td>
					</tr>

					<tr>
						<?php foreach ($tlfs_padre as $telefono_padre): ?>
						<td>
							Teléfono <?php echo strtolower($telefono_padre['relacion']);?>:
							<?php echo $telefono_padre['prefijo']."-".$telefono_padre['numero'];?> 
						</td>
						<?php endforeach ?>
					</tr>


					<tr>
						<td colspan="1">Fecha Nacimiento: <?php echo $datos_padre['fecha_nacimiento'];?></td>
						<td colspan="2">Lugar Nacimiento: <?php echo $datos_padre['lugar_nacimiento'];?></td>
						<td colspan="1">Estado Civil: <?php echo $datos_padre['estado_civil'];?></td>
					</tr>

					<?php 

						// Concatena la direccion completa con un espacio o con un vacio en caso de que el dato esté vacio

						$direccion = "";

						if (empty($datos_padre['estado'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_padre['estado']." ";
						}
						if (empty($datos_padre['municipio'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_padre['municipio']." ";
						}
						if (empty($datos_padre['parroquia'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_padre['parroquia']." ";
						}
						if (empty($datos_padre['sector'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_padre['sector']." ";
						}
						if (empty($datos_padre['calle'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_padre['calle']." ";
						}
						if (empty($datos_padre['nro_casa'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_padre['nro_casa']." ";
						}
						if (empty($datos_padre['punto_referencia'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_padre['punto_referencia']." ";
						}
						if ($datos_padre['pais_residencia'] == "Venezuela") {
							$direccion .= "";
						}
						else {
							$direccion .= "(".$datos_padre['pais_residencia'].") ";
						}
					?>

					<tr>
						<td colspan="4">Dirección: <?php echo $direccion;?></td>
					</tr>

					<tr>
						<td colspan="4">Correo Electrónico: <?php echo $datos_padre['email'];?></td>
					</tr>

					<tr>
						<td> 
							Tiene más hijos en el plantel: 
							<?php 
								// Si esta vacio no repite
								$padres->set_cedula_persona($_POST['cedula_padre']);
								if($padres->contar_hijos() < 2) {
									echo "No";
								}
								else {;
									echo "Si";
								}
							?>							
						</td>
					</tr>

					<tr class="table-primary">
						<th colspan="4">Datos laborales del padre</th>
					</tr>

					<tr>
						<td>
							Trabaja: 
							<?php 
								// Si esta vacio no repite
								if(empty($datos_padre['empleo'])) {
									echo "No";
								}
								else {;
									echo "Si";
								}
							?>
						</td>
						<td colspan="3">En qué se desempeña: <?php echo $datos_padre['empleo'];?></td>
					</tr>

					<tr>
						<td colspan="1">Grado de Instrucción: <?php echo $datos_padre['grado_academico'];?></td>
						<td colspan="1">Remuneración: (Cuántos sueldos mínimos): <?php echo $datos_padre['remuneracion'];?></td>
						<td colspan="2">Tipo Remuneración: <?php echo $datos_padre['tipo_remuneracion'];?></td>
					</tr>

					<tr class="table-primary">
						<th colspan="4">Datos vivienda del padre</th>
					</tr>

					<tr>
						<td> Condiciones de la vivienda: <?php echo $datos_padre['condicion'];?></td>
						<td> Tipo de vivienda: <?php echo $datos_padre['tipo'];?></td>
						<td colspan="2"> Tenencia de la vivienda: <?php echo $datos_padre['tenencia'] ?? NULL?></td>
					</tr>

					<tr class="table-primary">
						<th colspan="4">Datos del madre</th>
					</tr>

					<tr>
						<td colspan="1">Nombres: <?php echo $datos_madre['p_nombre'].' '. $datos_madre['s_nombre'];?></td>
						<td colspan="1">Apellidos: <?php echo $datos_madre['p_apellido'] .' '. $datos_madre['s_apellido'];?></td>
						<td colspan="1">Cédula: <?php echo $datos_madre['cedula'];?></td>
					</tr>

					<tr>
						<?php foreach ($tlfs_madre as $telefono_madre): ?>
						<td>
							Teléfono <?php echo strtolower($telefono_madre['relacion']);?>:
							<?php echo $telefono_madre['prefijo']."-".$telefono_madre['numero'];?> 
						</td>
						<?php endforeach ?>
					</tr>


					<tr>
						<td colspan="1">Fecha Nacimiento: <?php echo $datos_madre['fecha_nacimiento'];?></td>
						<td colspan="2">Lugar Nacimiento: <?php echo $datos_madre['lugar_nacimiento'];?></td>
						<td colspan="1">Estado Civil: <?php echo $datos_madre['estado_civil'];?></td>
					</tr>

					<?php 

						// Concatena la direccion completa con un espacio o con un vacio en caso de que el dato esté vacio

						$direccion = "";

						if (empty($datos_madre['estado'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_madre['estado']." ";
						}
						if (empty($datos_madre['municipio'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_madre['municipio']." ";
						}
						if (empty($datos_madre['parroquia'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_madre['parroquia']." ";
						}
						if (empty($datos_madre['sector'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_madre['sector']." ";
						}
						if (empty($datos_madre['calle'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_madre['calle']." ";
						}
						if (empty($datos_madre['nro_casa'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_madre['nro_casa']." ";
						}
						if (empty($datos_madre['punto_referencia'])) {
							$direccion .= "";
						}
						else {
							$direccion .= $datos_madre['punto_referencia']." ";
						}
						if ($datos_madre['pais_residencia'] == "Venezuela" or empty($datos_madre['pais_residencia'])) {
							$direccion .= "";
						}
						else {
							$direccion .= "(".$datos_madre['pais_residencia'].") ";
						}
					?>

					<tr>
						<td colspan="4">Dirección: <?php echo $direccion;?></td>
					</tr>

					<tr>
						<td colspan="4">Correo Electrónico: <?php echo $datos_madre['email'];?></td>
					</tr>

					<tr>
						<td> 
							Tiene más hijos en el plantel: 
							<?php 
								$padres->set_cedula_persona($_POST['cedula_madre']);
								// Si esta vacio no repite
								if($padres->contar_hijos() < 2) {
									echo "No";
								}
								else {;
									echo "Si";
								}
							?>							
						</td>
					</tr>

					<tr class="table-primary">
						<th colspan="4">Datos laborales de la madre</th>
					</tr>

					<tr>
						<td>
							Trabaja: 
							<?php 
								// Si esta vacio no repite
								if(empty($datos_madre['empleo'])) {
									echo "No";
								}
								else {;
									echo "Si";
								}
							?>
						</td>
						<td colspan="3">En qué se desempeña: <?php echo $datos_madre['empleo'];?></td>
					</tr>

					<tr>
						<td colspan="1">Grado de Instrucción: <?php echo $datos_madre['grado_academico'];?></td>
						<td colspan="1">Remuneración: (Cuántos sueldos mínimos): <?php echo $datos_madre['remuneracion'];?></td>
						<td colspan="2">Tipo Remuneración: <?php echo $datos_madre['tipo_remuneracion'];?></td>
					</tr>

					<tr class="table-primary">
						<th colspan="4">Datos vivienda del madre</th>
					</tr>

					<tr>
						<td> Condiciones de la vivienda: <?php echo $datos_madre['condicion'];?></td>
						<td> Tipo de vivienda: <?php echo $datos_madre['tipo'];?></td>
						<td colspan="2"> Tenencia de la vivienda: <?php echo $datos_madre['tenencia'] ?? NULL?></td>
					</tr>
				</tbody>
			</table>


						<div style="max-height 70vh;min-height 60vh; overflow-y: auto;">

						</div>

					</div>

					<div class="card-footer">
						<a href="../index.php" class="btn btn-primary">
							<i class="fa-solid fa-lg me-2 fa-home"></i>
							Menú principal
						</a>

						<!--Generar planilla de inscripción-->
						<form action="../../controladores/planillas/generar_planilla_estudiante.php" method="POST" style="display: inline-block;">
							
							<input type="hidden" name="cedula" value="<?php echo $datos_estudiante['cedula'];?>">
							<input type="hidden" name="cedula_padre" value="<?php echo $datos_padre['cedula'];?>">
							<input type="hidden" name="cedula_madre" value="<?php echo $datos_madre['cedula'];?>">
							<input type="hidden" name="cedula_representante" value="<?php echo $datos_representante['cedula'];?>">

							<button class="btn btn-danger" type="submit" name="Generar planilla">Generar planilla <i class="fas fa-file-pdf fa-lg ms-2"></i></button>

						</form>
						
						<!--Generar acta de compromiso-->
						<form action="../../controladores/planillas/generar_compromiso_representante.php" method="POST" style="display: inline-block;">

							<input type="hidden" name="cedula" value="<?php echo $datos_estudiante['cedula'];?>">
							<input type="hidden" name="cedula_representante" value="<?php echo $datos_representante['cedula'];?>">

							<button class="btn btn-danger" type="submit" name="Generar planilla de Compromiso">Generar planilla de compromiso <i class="fas fa-file-pdf fa-lg ms-2"></i></button>

						</form>

						<!-- Editar registro del estudiante -->
						<form action="../editar_estudiante/index.php" method="post" style="display: inline-block;">

							<input type="hidden" name="cedula" value="<?php echo $datos_estudiante['cedula'];?>">
							<input type="hidden" name="cedula_padre" value="<?php echo $datos_padre['cedula'];?>">
							<input type="hidden" name="cedula_madre" value="<?php echo $datos_madre['cedula'];?>">
							<input type="hidden" name="cedula_representante" value="<?php echo $datos_representante['cedula'];?>">

							<button class="btn btn-primary" type="submit" name="editar">Editar <i class="fas fa-pen fa-lg ms-2"></i></button>

						</form>
						<?php if ($_SESSION['datos_login']['privilegios'] <= 1): ?>
						
						<!-- Eliminar registro de estudiante -->
						<form action="#" method="post" style="display: inline-block;">

							<input type="hidden" name="cedula" value="<?php echo $datos_estudiante['cedula'];?>">
							<button class="btn btn-primary" type="submit" onclick="return confirmacion();" name="orden" value="eliminar">Eliminar <i class="fas fa-trash-can fa-lg ms-2"></i></button>

						</form>
						<?php endif;?>

					</div>
					
				</div>
			</div>
		</div>
		<?php include('../../footer.php'); ?>
		<?php include '../../ayuda.php'; ?>
	</main>

<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" defer>
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
</script>
</body>
</html>

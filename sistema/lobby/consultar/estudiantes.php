<?php
	if (!$_SESSION['login']) {
		header('Location: ../../index.php');
		exit();
	}
	if (!isset($_GET['sec'])) {
		header('Location: index.php');
	}


	if (isset($_POST['orden'])) {
		if ($_POST['orden'] == "eliminar") {

			$_SESSION['orden'] = $_POST['orden'];
			$_SESSION['eliminar_estudiante'] = $_POST['cedula'];

			header('Location: ../../controladores/registros/control_registros.php');
		}
	}



	require("../../clases/estudiantes.php");
	require("../../clases/representantes.php");
	require("../../clases/telefonos.php");

	$estudiantes = new estudiantes();


	if (isset($_POST['filtros_estudiantes'])) {

		$filtro_anio = $_POST['filtro_anio'];
		$filtro_seccion = $_POST['filtro_seccion'];
		$filtro_genero = $_POST['filtro_genero'];

		$lista_estudiantes = $estudiantes->filtrar_estudiantes($filtro_anio,$filtro_seccion,$filtro_genero);
	
	}
	else {
		$lista_estudiantes = $estudiantes->mostrar_estudiantes();
	}



?>						

<!-- Modal -->
<div class="modal fade" id="modal_filtros" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Filtrar consulta de estudiantes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form id="filtros_estudiantes" action="#" method="post">
       	

       	<div class="row mb-3">
       		<div class="col-5">
       			<label for="filtro_anio">
		       		Año que cursan	
		       	</label>
       		</div>
       		<div class="col-7">
       			<select class="form-select" name="filtro_anio" id="filtro_anio">
		       		<option value="Cualquiera">Cualquiera</option>
		       		<option value="Primer año">Primer año</option>
		       		<option value="Segundo año">Segundo año</option>
		       		<option value="Tercer año">Tercer año</option>
		       		<option value="Cuarto año">Cuarto año</option>
		       		<option value="Quinto año">Quinto año</option>
		       	</select>
       		</div>
       	</div>


       	<div class="row mb-3">
       		<div class="col-5">
       			<label for="filtro_seccion">
		       		Sección actual	
		       	</label>
       		</div>
       		<div class="col-7">
       			<select class="form-select" name="filtro_seccion" id="filtro_seccion">
		       		<option value="Cualquiera">Cualquiera</option>
		       		<option value="A">A</option>
		       		<option value="B">B</option>
		       		<option value="C">C</option>
		       		<option value="D">D</option>
		       	</select>
       		</div>
       	</div>


       	<div class="row mb-3">
       		<div class="col-5">
       			<label for="filtro_genero">
		       		Género	
		       	</label>
       		</div>
       		<div class="col-7">
       			<select class="form-select" name="filtro_genero" id="filtro_genero">
		       		<option value="Cualquiera">Cualquiera</option>
		       		<option value="F">Hembras</option>
		       		<option value="M">Varones</option>
		       	</select>
       		</div>
       	</div>

       	<input type="hidden" name="filtros_estudiantes">

       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" form="filtros_estudiantes">Aplicar filtros</button>
      </div>
    </div>
  </div>
</div>


<!-- Tabla volcada -->
<div class="table-responsive">
	<p class="h4 text-uppercase border-2 border-bottom border-dark text-center mb-3">
		Mostrando Estudiantes registrados
	</p>
	<table id="estudiantes" class="text-uppercase table table-striped table-bordered table-sm w-100" style="font-size: 95%;">
		<thead>
			<tr>
				<!-- Datos del estudiante -->
				<th>Cédula</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Fecha de nacimiento</th>
				<th>Edad</th>
				<th>Año a cursar</th>
				<th>Sección</th>
				<th>Género</th>
				<th>Correo electrónico</th>
				<th>Dirección de residencia</th>

				<!-- Ficha médica del estudiante -->
				<th>Talla de camisa</th>
				<th>Talla de pantalón</th>
				<th>Talla de zapatos</th>
				<th>Estatura</th>
				<th>Peso</th>
				<th>Índice</th>
				<th>Circ. Braquial</th>

				<th>Vacuna Covid-19</th>
				
				<th>Periodo académico</th>


				<th>Cédula de la madre</th>
				<th>Cédula del padre</th>
				<th>Cédula del representante</th>


				<!-- Botones de acción -->
				<th>Acciones</th>

			</tr>
		</thead>
		<tbody>
			<?php foreach ($lista_estudiantes as $estudiante):?>
			<tr>
				
				<!-- Datos del estudiante -->
				<td><?php echo $estudiante['cedula'];?></td>
				<td><?php echo $estudiante['p_nombre']." ".$estudiante['s_nombre'];?></td>
				<td><?php echo $estudiante['p_apellido']." ".$estudiante['s_apellido'];?></td>		
				<td><?php echo $estudiante['fecha_nacimiento'];?></td>
				<td><?php echo comprobar_vacio(calcular_edad($estudiante['fecha_nacimiento']),"E");?></td>
				<td><?php echo $estudiante['grado_a_cursar'];?></td>
				<td><?php echo $estudiante['seccion'];?></td>
				<td><?php echo genero($estudiante['genero']);?></td>
				<td><?php echo $estudiante['email'];?></td>

				<?php 

					// Concatena la direccion completa con un espacio o con un vacio en caso de que el dato esté vacio

					$direccion = "";

					if (empty($estudiante['estado'])) {
						$direccion .= "";
					}
					else {
						$direccion .= $estudiante['estado']." ";
					}
					if (empty($estudiante['municipio'])) {
						$direccion .= "";
					}
					else {
						$direccion .= $estudiante['municipio']." ";
					}
					if (empty($estudiante['parroquia'])) {
						$direccion .= "";
					}
					else {
						$direccion .= $estudiante['parroquia']." ";
					}
					if (empty($estudiante['sector'])) {
						$direccion .= "";
					}
					else {
						$direccion .= $estudiante['sector']." ";
					}
					if (empty($estudiante['calle'])) {
						$direccion .= "";
					}
					else {
						$direccion .= $estudiante['calle']." ";
					}
					if (empty($estudiante['nro_casa'])) {
						$direccion .= "";
					}
					else {
						$direccion .= $estudiante['nro_casa']." ";
					}
					if (empty($estudiante['punto_referencia'])) {
						$direccion .= "";
					}
					else {
						$direccion .= $estudiante['punto_referencia']." ";
					}
				?>

				<td><?php echo $direccion;?></td>

				<!-- Ficha médica del estudiante -->
				<td><?php echo $estudiante['camisa'];?></td>
				<td><?php echo $estudiante['pantalon'];?></td>
				<td><?php echo $estudiante['calzado'];?></td>
				<td><?php echo $estudiante['estatura'];?></td>
				<td><?php echo $estudiante['peso'];?></td>
				<td><?php echo $estudiante['indice_m_c'];?></td>
				<td><?php echo $estudiante['circ_braquial'];?></td>

				<?php  

					// Hace que se imprima No vacunado o la vacuna y dosis aplicadas en vez de NV

					if ($estudiante['vac_aplicada'] == "NV") {
						$vac_covid = "No vacunado";
					}
					else {
						$vac_covid = $estudiante['vac_aplicada']." (".$estudiante['dosis']." dosis)";
					}

				?>

				<td><?php echo $vac_covid;?></td>

				<!-- Periodo académico al que está registrado -->
				<td><?php echo $estudiante['id_per_academico'];?></td>

				<!-- identificadores de madre, padre y representante -->
				<td><?php echo $estudiante['cedula_padre'];?></td>
				<td><?php echo $estudiante['cedula_madre'];?></td>
				<td><?php echo $estudiante['cedula_representante'];?></td>

				<!-- Acciones -->
				<td>
					<!--Generar planilla de inscripción-->
					<form action="../../controladores/planillas/generar_planilla_estudiante.php" method="POST" style="display: inline-block;" target="_blank">
						<input type="hidden" name="cedula" value="<?php echo $estudiante['cedula'];?>">
						<input type="hidden" name="cedula_padre" value="<?php echo $estudiante['cedula_padre'];?>">
						<input type="hidden" name="cedula_madre" value="<?php echo $estudiante['cedula_madre'];?>">
						<input type="hidden" name="cedula_representante" value="<?php echo $estudiante['cedula_representante'];?>">

						<button class="btn btn-sm btn-danger" type="submit" name="Generar planilla">Generar planilla <i class="fas fa-file-pdf fa-lg ms-2"></i></button>

					</form>
					
					<!--Generar acta de compromiso-->
					<form action="../../controladores/planillas/generar_compromiso_representante.php" method="POST" style="display: inline-block;" target="_blank">

						<input type="hidden" name="cedula" value="<?php echo $estudiante['cedula'];?>">
						<input type="hidden" name="cedula_representante" value="<?php echo $estudiante['cedula_representante'];?>">

						<button class="btn btn-sm btn-danger" type="submit" name="Generar planilla de Compromiso">Generar planilla de compromiso <i class="fas fa-file-pdf fa-lg ms-2"></i></button>

					</form>

					<!-- Consultar información completa del estudiante -->
					<form action="consultar-estudiante.php" method="post" style="display: inline-block;">

						<input type="hidden" name="cedula" value="<?php echo $estudiante['cedula'];?>">
						<input type="hidden" name="cedula_padre" value="<?php echo $estudiante['cedula_padre'];?>">
						<input type="hidden" name="cedula_madre" value="<?php echo $estudiante['cedula_madre'];?>">
						<input type="hidden" name="cedula_representante" value="<?php echo $estudiante['cedula_representante'];?>">

						<button class="btn btn-sm btn-primary" type="submit" name="consultar">Consultar <i class="fas fa-magnifying-glass fa-lg ms-2"></i></button>

					</form>

					<!-- Editar registro del estudiante -->
					<form action="../editar_estudiante/index.php" method="post" style="display: inline-block;" target="_blank">

						<input type="hidden" name="cedula" value="<?php echo $estudiante['cedula'];?>">
						<input type="hidden" name="cedula_padre" value="<?php echo $estudiante['cedula_padre'];?>">
						<input type="hidden" name="cedula_madre" value="<?php echo $estudiante['cedula_madre'];?>">
						<input type="hidden" name="cedula_representante" value="<?php echo $estudiante['cedula_representante'];?>">

						<button class="btn btn-sm btn-primary" type="submit" name="editar">Editar <i class="fas fa-pen fa-lg ms-2"></i></button>

					</form>
					<?php if ($_SESSION['datos_login']['privilegios'] <= 1): ?>
					
					<!-- Eliminar registro de estudiante -->
					<form action="#" method="post" style="display: inline-block;">

						<input type="hidden" name="cedula" value="<?php echo $estudiante['cedula'];?>">
						<button class="btn btn-sm btn-primary" type="submit" onclick="return confirmacion();" name="orden" value="eliminar">Eliminar <i class="fas fa-trash-can fa-lg ms-2"></i></button>

					</form>
					<?php endif;?>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
							
<script src="../../datatables/datatables.min.js"></script>
<script src="../../js/consultas/consulta_estudiantes.js"></script>

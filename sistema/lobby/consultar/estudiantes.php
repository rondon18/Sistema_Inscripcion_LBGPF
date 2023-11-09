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
				<th>CÉDULA</th>
				<th>NOMBRES</th>
				<th>APELLIDOS</th>
				<th>FECHA DE NACIMIENTO</th>
				<th>EDAD</th>
				<th>AÑO A CURSAR</th>
				<th>SECCIÓN</th>
				<th>GÉNERO</th>
				<th>CORREO ELECTRÓNICO</th>
				<th>DIRECCIÓN DE RESIDENCIA</th>

				<!-- Ficha médica del estudiante -->
				<th>TALLA DE CAMISA</th>
				<th>TALLA DE PANTALÓN</th>
				<th>TALLA DE ZAPATOS</th>
				<th>ESTATURA</th>
				<th>PESO</th>
				<th>ÍNDICE</th>
				<th>CIRC. BRAQUIAL</th>

				<th>VACUNA COVID-19</th>

				<th>PERIODO ACADÉMICO</th>


				<th>CÉDULA DE LA MADRE</th>
				<th>CÉDULA DEL PADRE</th>
				<th>CÉDULA DEL REPRESENTANTE</th>


				<!-- Botones de acción -->
				<th>ACCIONES</th>

			</tr>
		</thead>
		<tbody>
			<?php foreach ($lista_estudiantes as $estudiante):?>
			<tr>

				<!-- Datos del estudiante -->
				<td><?php echo mb_strtoupper($estudiante['cedula']);?></td>
				<td><?php echo mb_strtoupper($estudiante['p_nombre']." ".$estudiante['s_nombre']);?></td>
				<td><?php echo mb_strtoupper($estudiante['p_apellido']." ".$estudiante['s_apellido']);?></td>
				<td><?php echo formatear_fecha($estudiante['fecha_nacimiento']);?></td>
				<td><?php echo mb_strtoupper(calcular_edad($estudiante['fecha_nacimiento']));?> AÑOS</td>
				<td><?php echo mb_strtoupper($estudiante['grado_a_cursar']);?></td>
				<td><?php echo mb_strtoupper($estudiante['seccion']);?></td>
				<td><?php echo mb_strtoupper(genero($estudiante['genero']));?></td>
				<td><?php echo mb_strtoupper($estudiante['email']);?></td>


				<td><?php echo mb_strtoupper(direccion_completa($estudiante));?></td>

				<!-- Ficha médica del estudiante -->
				<td><?php echo mb_strtoupper($estudiante['camisa']);?></td>
				<td><?php echo mb_strtoupper($estudiante['pantalon']);?></td>
				<td><?php echo mb_strtoupper($estudiante['calzado']);?></td>
				<td><?php echo mb_strtoupper($estudiante['estatura']);?></td>
				<td><?php echo mb_strtoupper($estudiante['peso']);?></td>
				<td><?php echo mb_strtoupper($estudiante['indice_m_c']);?></td>
				<td><?php echo mb_strtoupper($estudiante['circ_braquial']);?></td>

				<?php

					// Hace que se imprima No vacunado o la vacuna y dosis aplicadas en vez de NV

					if ($estudiante['vac_aplicada'] == "NV") {
						$vac_covid = "No vacunado";
					}
					else {
						$vac_covid = $estudiante['vac_aplicada']." (".$estudiante['dosis']." dosis)";
					}

				?>

				<td><?php echo mb_strtoupper($vac_covid);?></td>

				<!-- Periodo académico al que está registrado -->
				<td><?php echo mb_strtoupper($estudiante['id_per_academico']);?></td>

				<!-- identificadores de madre, padre y representante -->
				<td><?php echo mb_strtoupper($estudiante['cedula_madre']);?></td>
				<td><?php echo mb_strtoupper($estudiante['cedula_padre']);?></td>
				<td><?php echo mb_strtoupper($estudiante['cedula_representante']);?></td>

				<!-- Acciones -->
				<td>

					<div>

						<!-- Consultar información completa del estudiante -->
						<form
							id="consultar_registro_<?php echo $estudiante['cedula'];?>"
							action="consultar_estudiante.php"
							method="post"
							style="display: inline-block;"
						>
							<input type="hidden" name="cedula" value="<?php echo $estudiante['cedula'];?>">
							<input type="hidden" name="cedula_padre" value="<?php echo $estudiante['cedula_padre'];?>">
							<input type="hidden" name="cedula_madre" value="<?php echo $estudiante['cedula_madre'];?>">
							<input type="hidden" name="cedula_representante" value="<?php echo $estudiante['cedula_representante'];?>">
						</form>

						<!-- Editar registro del estudiante -->
						<form
							id="editar_registro_<?php echo $estudiante['cedula'];?>"
							action="../editar_estudiante/index.php"
							method="post"
							style="display: inline-block;"
						>
							<input type="hidden" name="cedula" value="<?php echo $estudiante['cedula'];?>">
							<input type="hidden" name="cedula_padre" value="<?php echo $estudiante['cedula_padre'];?>">
							<input type="hidden" name="cedula_madre" value="<?php echo $estudiante['cedula_madre'];?>">
							<input type="hidden" name="cedula_representante" value="<?php echo $estudiante['cedula_representante'];?>">
						</form>

						<form
							id="cambiar_representante_<?php echo $estudiante['cedula'];?>"
							action="../editar_estudiante/cambiar_representante.php"
							method="post"
							style="display: inline-block;"
						>
							<input type="hidden" name="cedula" value="<?php echo $estudiante['cedula'];?>">
						</form>

						<?php if ($_SESSION['datos_login']['privilegios'] <= 1): ?>

						<!-- Eliminar registro de estudiante -->
						<form
							id="eliminar_registro_<?php echo $estudiante['cedula'];?>"
							action="#"
							method="post"
							style="display: inline-block;"
							onsubmit="confirmar_envio(event)"
						>
							<input type="hidden" name="cedula" value="<?php echo $estudiante['cedula'];?>">
							<input type="hidden" name="orden" value="eliminar">
						</form>
						<?php endif;?>

					</div>


					<div class="btn-group btn-group-sm col-12 col-sm-auto" role="group" aria-label="Button group with nested dropdown">

						<button
							class="btn btn-sm btn-primary"
							type="submit"
							name="consultar"
							form="consultar_registro_<?php echo $estudiante['cedula'];?>"
						>
							Consultar
							<i class="fas fa-magnifying-glass fa-lg ms-2"></i>
						</button>

						<button
							class="btn btn-sm btn-primary"
							type="submit"
							name="editar"
							form="editar_registro_<?php echo $estudiante['cedula'];?>"
						>
							Editar
							<i class="fas fa-pen fa-lg ms-2"></i>
						</button>

						<div class="btn-group" role="group">

							<button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								<span class="d-none d-sm-inline">Más opciones</span>
							</button>

							<ul class="dropdown-menu">

								<li>
									<button
										class="dropdown-item"
										type="submit"
										form="cambiar_representante_<?php echo $estudiante['cedula'];?>"
									>
										<i class="fas fa-user-edit fa-lg ms-2"></i>
										Cambiar representante
									</button>
								</li>

								<li>
									<a class="dropdown-item" href="#">
										<i class="fas fa-graduation-cap fa-lg ms-2"></i>
										Promover
									</a>
								</li>

								<li>
									<button
										class="dropdown-item"
										type="submit"
										form="eliminar_registro_<?php echo $estudiante['cedula'];?>"
									>
										<i class="fas fa-trash-can fa-lg ms-2"></i>
										Eliminar
									</button>
								</li>

							</ul>
						</div>
					</div>

					<form action="../../controladores/control_planillaje.php" method="post">
						<div>
							<div class="input-group input-group-sm flex-nowrap">

								<!-- Texto de referencia -->
								<div class="input-group-text">
									<i class="fas fa-file fa-lg d-sm-none"></i>
									<span class="d-none d-sm-inline">Generación de planillas</span>
								</div>

								<!-- Selector de documento -->
								<select class="form-select" id="documento_solicitado" name="documento_solicitado" required>
									<option value="">Indique el documento requerido</option>
									<option value="1">Planilla de inscripción</option>
									<option value="2">Acta de compromiso</option>
									<option value="3">Todo el planillaje</option>
								</select>

								<input type="hidden" name="cedula" value="<?php echo $estudiante['cedula'];?>">
								<input type="hidden" name="cedula_padre" value="<?php echo $estudiante['cedula_padre'];?>">
								<input type="hidden" name="cedula_madre" value="<?php echo $estudiante['cedula_madre'];?>">
								<input type="hidden" name="cedula_representante" value="<?php echo $estudiante['cedula_representante'];?>">

								<!-- Botón para envíar la solicitud -->
								<button type="submit" class="btn btn-primary">
									<span class="d-none d-sm-inline">Solicitar documento</span>
									<i class="fas fa-paper-plane fa-lg ms-sm-1"></i>
								</button>

							</div>
						</div>
					</form>

				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
							
<script src="../../datatables/datatables.min.js" defer></script>
<script src="../../js/consultas/consulta_estudiantes.js" defer></script>
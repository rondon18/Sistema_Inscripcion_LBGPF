<?php
if (!$_SESSION['login']) {
	header('Location: ../../index.php');
	exit();
}
if (!isset($_GET['sec'])) {
	header('Location: index.php');
}

require("../../clases/estudiantes.php");
require("../../clases/representantes.php");
require("../../clases/telefonos.php");

$estudiante = new estudiantes();
$representante = new representantes();
$teléfonos = new telefonos();


?>							
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
				<th>Género</th>
				<th>Correo electrónico</th>
				<th>Teléfonos</th>
				<th>Dirección de residencia</th>

				<!-- Ficha médica del estudiante -->
				<th>Talla de camisa</th>
				<th>Talla de pantalón</th>
				<th>Talla de zapatos</th>
				<th>Estatura</th>
				<th>Peso</th>
				<th>Índice</th>
				<th>Circ. Braquial</th>
				<th>Vacunado</th>
				<th>Vacuna</th>
				<th>Dosis</th>
				<th>Lote</th>

				<!-- Datos del representante -->
				<th>Datos del representante</th>
				<th>Cédula</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Dirección</th>
				<th>Fecha de nacimiento</th>
				<th>Teléfonos</th>

				<!-- Botones de acción -->
				<th>Acciones</th>

			</tr>
		</thead>
		<tbody>
			<?php foreach ($listaEstudiantes as $estudiante):?>
			<tr>
				
				<!-- Datos del estudiante -->
				<?php
					$Teléfonos_Est = $Teléfonos->filtrar_telefonos($estudiante['Cédula'],$lista_telefonos); 
				?>
				<td><?php echo $estudiante['Cédula']; ?></td>
				
				<td>
					<?php echo $estudiante['Primer_Nombre']." ".$estudiante['Segundo_Nombre']; ?>
				</td>

				<td>
					<?php echo $estudiante['Primer_Apellido']." ".$estudiante['Segundo_Apellido']; ?>
				</td>
				
				<td><?php echo $estudiante['Fecha_Nacimiento']; ?></td>
				<td>
					<?php echo comprobarVacio(calculaedad($estudiante['Fecha_Nacimiento']),"E");?>
				</td>
				<td><?php echo $estudiante['Grado_A_Cursar']; ?></td>
				<td><?php echo Género($estudiante['Género']); ?></td>
				<td><?php echo $estudiante['Correo_Electrónico']; ?></td>
				
				<td>
				<?php 
					echo comprobarVacio(Teléfono($Teléfonos_Est[0]['Prefijo'],$Teléfonos_Est[0]['Número_Telefónico']));
					
					echo  " / ";  
					
					echo comprobarVacio(Teléfono($Teléfonos_Est[1]['Prefijo'],$Teléfonos_Est[1]['Número_Telefónico']));
				?>
				</td>

				<td><?php echo $estudiante['Dirección']; ?></td>

				<!-- Ficha médica del estudiante -->
				<td><?php echo $estudiante['Talla_Camisa']; ?></td>
				<td><?php echo $estudiante['Talla_Pantalón']; ?></td>
				<td><?php echo $estudiante['Talla_Zapatos']; ?></td>
				<td><?php echo $estudiante['Estatura']."cm"; ?></td>
				<td><?php echo $estudiante['Peso']."kg"; ?></td>
				<td><?php echo $estudiante['Índice']; ?></td>
				<td><?php echo $estudiante['Circ_Braquial']; ?></td>
				<td><?php echo $estudiante['Vacunado']; ?></td>
				<td><?php echo $estudiante['Vacuna']; ?></td>
				<td><?php echo comprobarVacio($estudiante['Dosis'],"D"); ?></td>
				<td><?php echo comprobarVacio($estudiante['Lote']); ?></td>

				<!-- Datos del representante del estudiante -->
				<?php $datosRepresentante = $representante->consultarRepresentanteID($estudiante['idRepresentante']);?>
				<?php $Teléfonos_re = $Teléfonos->filtrar_telefonos($datosRepresentante['Cédula'],$lista_telefonos); ?>
				
				<td></td>

				<td><?php echo $datosRepresentante['Cédula']; ?> </td>
				<td><?php echo $datosRepresentante['Primer_Nombre']." ".$datosRepresentante['Segundo_Nombre']; ?> </td>
				<td><?php echo $datosRepresentante['Primer_Apellido']." ".$datosRepresentante['Segundo_Apellido']; ?> </td>
				<td><?php echo $datosRepresentante['Dirección']; ?> </td>
				<td><?php echo $datosRepresentante['Fecha_Nacimiento']; ?> </td>
				
				<td>
				<?php 
					echo comprobarVacio(Teléfono($Teléfonos_re[0]['Prefijo'],$Teléfonos_re[0]['Número_Telefónico']));
					echo ' / '; 
					echo comprobarVacio(Teléfono($Teléfonos_re[1]['Prefijo'],$Teléfonos_re[1]['Número_Telefónico']));
					echo ' / '; 
					echo comprobarVacio(Teléfono($Teléfonos_re[2]['Prefijo'],$Teléfonos_re[2]['Número_Telefónico']));
				?>
				</td>

				<!-- Acciones -->
				<td>
					<!--Generar planilla de inscripción-->
					<form action="../../controladores/generar-planilla-estudiante.php" method="POST" style="display: inline-block;" target="_blank">
						<input type="hidden" name="Cédula_Estudiante" value="<?php echo $estudiante['Cédula']; ?>">
						<input type="hidden" name="id_Estudiante" value="<?php echo $estudiante['idEstudiantes']; ?>">
						<input type="hidden" name="id_representante" value="<?php echo $estudiante['idRepresentante']; ?>">
						<input type="hidden" name="id_padre" value="<?php echo $estudiante['idPadre']; ?>">
						<input type="hidden" name="id_madre" value="<?php echo $estudiante['idMadre']; ?>">
						<button class="btn btn-sm btn-danger" type="submit" name="Generar planilla">Generar planilla <i class="fas fa-file-pdf fa-lg ms-2"></i></button>
					</form>
					<form action="../../controladores/generar-compromiso-representante.php" method="POST" style="display: inline-block;" target="_blank">
						<input type="hidden" name="Cédula_Estudiante" value="<?php echo $estudiante['Cédula']; ?>">
						<input type="hidden" name="id_Estudiante" value="<?php echo $estudiante['idEstudiantes']; ?>">
						<input type="hidden" name="id_representante" value="<?php echo $estudiante['idRepresentante']; ?>">
						<button class="btn btn-sm btn-danger" type="submit" name="Generar planilla de Compromiso">Generar planilla de compromiso <i class="fas fa-file-pdf fa-lg ms-2"></i></button>
					</form>
					<form action="consultar-estudiante.php" method="post" style="display: inline-block;">
						<input type="hidden" name="Cédula_Estudiante" value="<?php echo $estudiante['Cédula']; ?>">
						<input type="hidden" name="id_Estudiante" value="<?php echo $estudiante['idEstudiantes']; ?>">
						<input type="hidden" name="id_representante" value="<?php echo $estudiante['idRepresentante']; ?>">
						<input type="hidden" name="id_padre" value="<?php echo $estudiante['idPadre']; ?>">
						<input type="hidden" name="id_madre" value="<?php echo $estudiante['idMadre']; ?>">
						<button class="btn btn-sm btn-primary" type="submit" name="Consultar">Consultar <i class="fas fa-magnifying-glass fa-lg ms-2"></i></button>
					</form>
					<form action="editar-estudiante/paso_1.php" method="post" style="display: inline-block;" target="_blank">
						<input type="hidden" name="Cédula_Estudiante" value="<?php echo $estudiante['Cédula']; ?>">
						<input type="hidden" name="id_Estudiante" value="<?php echo $estudiante['idEstudiantes']; ?>">
						<input type="hidden" name="id_representante" value="<?php echo $estudiante['idRepresentante']; ?>">
						<input type="hidden" name="id_padre" value="<?php echo $estudiante['idPadre']; ?>">
						<input type="hidden" name="id_madre" value="<?php echo $estudiante['idMadre']; ?>">
						<button class="btn btn-sm btn-primary" type="submit" name="Consultar" title="Funcion en mantenimiento">Editar <i class="fas fa-pen fa-lg ms-2"></i></button>
					</form>
					<?php if ($_SESSION['usuario']['Privilegios'] == 1): ?>
					<form action="../../controladores/control-registros.php" method="post" style="display: inline-block;">
						<input type="hidden" name="Cédula_Estudiante" value="<?php echo $estudiante['Cédula']; ?>">
						<button class="btn btn-sm btn-primary" type="submit" onclick="return confirmacion();" name="orden" value="Eliminar">Eliminar <i class="fas fa-trash-can fa-lg ms-2"></i></button>
					</form>
					<?php endif; ?>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
							
<script src="../../datatables/datatables.min.js"></script>
<script src="../../js/consulta-estudiantes.js"></script>

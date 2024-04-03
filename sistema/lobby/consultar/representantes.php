<?php

//comprobacion de sesion iniciada
if (!$_SESSION['login']) {
	header('Location: ../../index.php');
	exit();
}

require("../../clases/representantes.php");


//REGISTRO DE VISITA EN LA BITACORA
$bitacora = new bitacora();
$_SESSION['acciones'] .= ', Consulta estudiantes';
$bitacora->actualizar_bitacora($_SESSION['acciones'],$_SESSION['id_bitacora']);


//INSTACIACION DE LOS REPRESENTANTES Y LOS TELEFONOS
$representantes = new representantes();


$lista_representantes = $representantes->mostrar_representantes();

?>

<!-- Tabla volcada -->
<div class="table-responsive">
	<table id="representantes" class="text-uppercase table table-striped table-bordered table-sm w-100" style="font-size: 90%;">
		<thead class="text-truncate">
			<!-- Datos personales -->
			<th>CÉDULA</th>
			<th>NOMBRES</th>
			<th>APELLIDOS</th>
			<th>FECHA DE NACIMIENTO</th>
			<th>LUGAR DE NACIMIENTO</th>
			<th>GÉNERO</th>
			<th>CORREO ELECTRÓNICO</th>
			<th>DIRECCIÓN</th>
			<th>ESTADO CIVIL</th>
			<th>GRADO DE INSTRUCCIÓN</th>
			<th>AÑO DEL(OS) REPRESENTADO(S)</th>
			<th>EMPLEO</th>

			<!-- Acciones -->
			<th>ACCIONES</th>

		</thead>
		<tbody class="text-truncate">
			<?php foreach ($lista_representantes as $representante): ?>
			<tr>
				

				<td><?php echo mb_strtoupper($representante['cedula']);?></td>
				<td>
					<?php echo mb_strtoupper($representante['p_nombre'].' '.$representante['s_nombre']);?>
				</td>
				<td>
					<?php echo mb_strtoupper($representante['p_apellido'].' '.$representante['s_apellido']);?>
				</td>
				<td><?php echo mb_strtoupper(formatear_fecha($representante['fecha_nacimiento']));?></td>
				<td><?php echo mb_strtoupper($representante['lugar_nacimiento']);?></td>
				<td><?php echo mb_strtoupper(genero($representante['genero'])); ?></td>
				<td><?php echo mb_strtoupper($representante['email']);?></td>


				<td style="min-width: 100vw"><?php echo mb_strtoupper(direccion_completa($representante));?></td>
				<td><?php echo mb_strtoupper($representante['estado_civil']);?></td>
				<td><?php echo mb_strtoupper($representante['grado_academico']);?></td>
				
				<td>
					<?php

						//Cantidad de estudiantes que representa el representante

						$representantes->set_cedula_persona($representante['cedula']);
						$representados = $representantes->mostrar_representados();
						$grados_representados = [];

						foreach ($representados as $representado) {
							$grados_representados[] = $representado['grado_a_cursar'];
						}
						echo mb_strtoupper(implode(',', $grados_representados));

					?>
				</td>
				
				<td><?php echo mb_strtoupper($representante['empleo']);?></td>

				<!-- Acciones -->
				<td>
					<div class="d-inline-block">
						<form id="consultar_<?php echo $representante["cedula"];?>" action="consultar_representante.php" method="post"	>

							<input type="hidden" name="cedula" value="<?php echo $representante['cedula'];?>">
							<input type="hidden" name="accion" value="consultar">

						</form>
						<form
									id="editar_<?php echo $representante['cedula'];?>"
									action="../editar_representante/index.php"
									method="post"
									style="display: inline-block;"
								>
									<input type="hidden" name="editar_representante" value="editar_representante">
									<input type="hidden" name="cedula" value="<?php echo $estudiante['cedula_representante'];?>">
								</form>
						<button
							type="submit"
							role="button"
							class="btn btn-primary btn-sm"
							name="consultar"
							form="consultar_<?php echo $representante["cedula"];?>"
						>
							Consultar <i class="fas fa-magnifying-glass fa-lg ms-2"></i>
						</button>
						<button
							type="submit"
							role="button"
							class="btn btn-primary btn-sm"
							name="consultar"
							form="editar_<?php echo $representante["cedula"];?>"
						>
							Editar <i class="fas fa-pen fa-lg ms-2"></i>
						</button>
					</div>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

<script src="../../datatables/datatables.min.js" defer></script>
<script src="../../js/consultas/consulta_representantes.js" defer></script>

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
	<p class="h4 text-uppercase border-2 border-bottom border-dark text-center mb-3">
		Mostrando Representantes registrados
	</p>
	<table id="representantes" class="text-uppercase table table-striped table-bordered table-sm w-100" style="font-size: 95%;">
		<thead>
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

			<!-- Datos de vivienda -->
			<th>DATOS DE VIVIENDA</th>
			<th>TIPO DE VIVIENDA</th>
			<th>TENENCIA DE LA VIVIENDA</th>
			<th>CONDICIONES DE LA VIVIENDA</th>

			<!-- Datos laborales -->
			<th>DATOS LABORALES</th>
			<th>EMPLEO</th>
			<th>DIRECCIÓN DEL TRABAJO</th>
			<th>REMUNERACIÓN</th>
			<th>TIPO DE REMUNERACIÓN</th>

			<!-- Datos economicos -->
			<th>DATOS ECONOMICOS</th>
			<th>BANCO DE LA CUENTA</th>

			<!-- Acciones -->
			<th>ACCIONES</th>

		</thead>
		<tbody>
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
				
				<!-- Datos vivienda -->
				<td></td>

				<td><?php echo mb_strtoupper($representante['tipo']);?></td>
				<td><?php echo mb_strtoupper($representante['tenencia']);?></td>
				<td><?php echo mb_strtoupper($representante['condicion']);?></td>

				<!-- Datos laborales -->
				<td></td>
				
				<td><?php echo mb_strtoupper($representante['empleo']);?></td>
				<td>
					<?php echo mb_strtoupper(comprobar_vacio($representante['lugar_trabajo']));?>
				</td>
				<td>
					<?php echo mb_strtoupper(comprobar_vacio($representante['remuneracion'],"R"));?>
				</td>
				<td>
					<?php echo mb_strtoupper(comprobar_vacio($representante['tipo_remuneracion']));?>
				</td>
				
				<!-- Datos economicos -->
				<td></td>
				<td><?php echo mb_strtoupper($representante['banco']);?></td>

				<!-- Acciones -->
				<td>
					<div class="d-inline-block">
						<form action="consultar_representante.php" method="post"	>

							<input type="hidden" name="cedula" value="<?php echo $representante['cedula'];?>">
							<input type="hidden" name="accion" value="consultar">

							<button
								type="submit"
								role="button"
								class="btn btn-primary btn-sm"
								name="consultar"
							>
								Consultar <i class="fas fa-magnifying-glass fa-lg ms-2"></i>
							</button>
						</form>
					</div>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

<script src="../../datatables/datatables.min.js" defer></script>
<script src="../../js/consultas/consulta_representantes.js" defer></script>

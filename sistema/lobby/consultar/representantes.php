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
			<th>Cédula</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Fecha de nacimiento</th>
			<th>Lugar de nacimiento</th>
			<th>Género</th>
			<th>Correo Electrónico</th>
			<th>Dirección</th>
			<th>Estado civil</th>
			<th>Grado de instrucción</th>
			<th>Año del(os) representado(s)</th>

			<!-- Datos de vivienda -->
			<th>Datos de vivienda</th>
			<th>Tipo de vivienda</th>
			<th>Tenencia de la vivienda</th>
			<th>Condiciones de la vivienda</th>

			<!-- Datos laborales -->
			<th>Datos laborales</th>
			<th>Empleo</th>
			<th>Dirección del trabajo</th>
			<th>Remuneración</th>
			<th>Tipo de remuneración</th>

			<!-- Datos economicos -->
			<th>Datos economicos</th>
			<th>Banco de la cuenta</th>

			<!-- Acciones -->
			<th>Acciones</th>

		</thead>
		<tbody>
			<?php foreach ($lista_representantes as $representante): ?>
			<tr>
				

				<td><?php echo $representante['cedula'];?></td>
				<td>
					<?php echo $representante['p_nombre'].' '.$representante['s_nombre'];?>
				</td>
				<td>
					<?php echo $representante['p_apellido'].' '.$representante['s_apellido'];?>		
				</td>
				<td><?php echo $representante['fecha_nacimiento'];?></td>
				<td><?php echo $representante['lugar_nacimiento'];?></td>
				<td><?php echo genero($representante['genero']); ?></td>
				<td><?php echo $representante['email'];?></td>

				<?php 

					// Concatena la direccion completa con un espacio o con un vacio en caso de que el dato esté vacio

					$direccion = "";

					if (empty($representante['estado'])) {
						$direccion .= "";
					}
					else {
						$direccion .= $representante['estado']." ";
					}
					if (empty($representante['municipio'])) {
						$direccion .= "";
					}
					else {
						$direccion .= $representante['municipio']." ";
					}
					if (empty($representante['parroquia'])) {
						$direccion .= "";
					}
					else {
						$direccion .= $representante['parroquia']." ";
					}
					if (empty($representante['sector'])) {
						$direccion .= "";
					}
					else {
						$direccion .= $representante['sector']." ";
					}
					if (empty($representante['calle'])) {
						$direccion .= "";
					}
					else {
						$direccion .= $representante['calle']." ";
					}
					if (empty($representante['nro_casa'])) {
						$direccion .= "";
					}
					else {
						$direccion .= $representante['nro_casa']." ";
					}
					if (empty($representante['punto_referencia'])) {
						$direccion .= "";
					}
					else {
						$direccion .= $representante['punto_referencia']." ";
					}
				?>
				<td style="min-width: 100vw"><?php echo $direccion;?></td>
				<td><?php echo $representante['estado_civil'];?></td>
				<td><?php echo $representante['grado_academico'];?></td>
				
				<td>
					<?php

						//Cantidad de estudiantes que representa el representante

						$representantes->set_cedula_persona($representante['cedula']);
						$representados = $representantes->mostrar_representados();
						$grados_representados = [];

						foreach ($representados as $representado) {
							$grados_representados[] = $representado['grado_a_cursar'];
						}
						echo implode(',', $grados_representados);

					?>
				</td>
				
				<!-- Datos vivienda -->
				<td></td>

				<td><?php echo $representante['tipo'];?></td>
				<td><?php echo $representante['tenencia'];?></td>
				<td><?php echo $representante['condicion'];?></td>

				<!-- Datos laborales -->
				<td></td>
				
				<td><?php echo $representante['empleo'];?></td>
				<td>
					<?php echo comprobar_vacio($representante['lugar_trabajo']);?>
				</td>
				<td>
					<?php echo comprobar_vacio($representante['remuneracion'],"R");?>
				</td>
				<td>
					<?php echo comprobar_vacio($representante['tipo_remuneracion']);?>
				</td>
				
				<!-- Datos economicos -->
				<td></td>
				<td><?php echo $representante['banco'];?></td>

				<td>

					<!-- Consultar el representante -->
					<form action="#" method="post" target="_blank" class="d-inline-block">
						<input type="hidden" name="cedula" value="<?php echo $representante['cedula'];?>">
						<input type="hidden" name="accion" value="consultar">
						<button class="btn btn-sm btn-primary">Consultar</button>
					</form>

					<!-- Editar el representante -->
					<form action="#" method="post" target="_blank" class="d-inline-block">
						<input type="hidden" name="cedula" value="<?php echo $representante['cedula'];?>">
						<input type="hidden" name="accion" value="editar">
						<button class="btn btn-sm btn-primary">Editar</button>
					</form>

					<?php if ($representantes->contar_representados() < 1): ?>
					<!-- Eliminar el representante -->
					<form action="../../controladores/registros/control_representantes_padres.php" method="post" target="_blank" class="d-inline-block">
						<input type="hidden" name="cedula" value="<?php echo $representante['cedula'];?>">
						<input type="hidden" name="accion" value="eliminar">
						<button class="btn btn-sm btn-danger">Eliminar</button>
					</form>
					<?php endif ?>

				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

<script src="../../datatables/datatables.min.js"></script>
<script src="../../js/consultas/consulta_representantes.js"></script>

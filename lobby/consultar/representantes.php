<?php

//comprobacion de sesion iniciada
if (!$_SESSION['login']) {
	header('Location: ../../index.php');
	exit();
}

require("../../clases/representantes.php");
require("../../clases/teléfonos.php");


//REGISTRO DE VISITA EN LA BITACORA
$bitacora = new bitacora();
$_SESSION['acciones'] .= ', Consulta estudiantes';
$bitacora->actualizar_bitacora($_SESSION['acciones'],$_SESSION['id_bitacora']);


//INSTACIACION DE LOS REPRESENTANTES Y LOS TELEFONOS
$representante = new Representantes();
$Teléfonos = new Teléfonos();


$listaRepresentantes = $representante->mostrarRepresentantes();

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
			<th>Teléfonos</th>

			<!-- Datos de vivienda -->
			<th>Datos de vivienda</th>
			<th>Vivienda</th>
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

		</thead>
		<tbody>
			<?php foreach ($listaRepresentantes as $representante): ?>
			<tr>
				<?php
					//Cantidad dde estudiantes que tiene el representante
					$Representante = new Representantes();
					$representados = $Representante->mostrarRepresentados($representante['idRepresentantes']);
					$cont = 0;
					$coma = count($representados);

					//Números de telefono del representante
					$Teléfonos_re = $Teléfonos->consultarTeléfonosRepresentanteID($representante['idRepresentantes']); 
				?>

				<td><?php echo $representante['Cédula'];?></td>
				<td>
					<?php echo $representante['Primer_Nombre'].' '.$representante['Segundo_Nombre'];?>
				</td>
				<td>
					<?php echo $representante['Primer_Apellido'].' '.$representante['Segundo_Apellido'];?>		
				</td>
				<td><?php echo $representante['Fecha_Nacimiento'];?></td>
				<td><?php echo $representante['Lugar_Nacimiento'];?></td>
				<td><?php echo Género($representante['Género']); ?></td>
				<td><?php echo $representante['Correo_Electrónico'];?></td>
				<td style="min-width: 100vw"><?php echo $representante['Dirección'];?></td>
				<td><?php echo $representante['Estado_Civil'];?></td>
				<td><?php echo $representante['Grado_Académico'];?></td>
				
				<td>
					<?php foreach ($representados as $Representante):?>
						<?php
							echo $representados[$cont]['Grado_A_Cursar'];
							if (++$cont === $coma) {
								echo " " ;
							} 
							else {
								echo ", ";
							} 
						?>
					<?php endforeach; ?>
				</td>
				
				<td>
				<?php 
					echo comprobarVacio(Teléfono($Teléfonos_re[0]['Prefijo'],$Teléfonos_re[0]['Número_Telefónico']));
					
					echo  ' / ';
					
					echo comprobarVacio(Teléfono($Teléfonos_re[1]['Prefijo'],$Teléfonos_re[1]['Número_Telefónico']));
					
					echo  ' / ';
					
					echo comprobarVacio(Teléfono($Teléfonos_re[2]['Prefijo'],$Teléfonos_re[2]['Número_Telefónico']));
				?>
				</td>
				
				<!-- Datos vivienda -->
				<td></td>

				<td><?php echo $representante['Condiciones_Vivienda'];?></td>
				<td><?php echo $representante['Tipo_Vivienda'];?></td>
				<td><?php echo $representante['Tenencia_vivienda'];?></td>

				<!-- Datos laborales -->
				<td></td>
				
				<td><?php echo $representante['Empleo'];?></td>
				<td>
					<?php echo comprobarVacio($representante['Lugar_Trabajo']);?>
				</td>
				<td>
					<?php echo comprobarVacio($representante['Remuneración'],"R");?>
				</td>
				<td>
					<?php echo comprobarVacio($representante['Tipo_Remuneración']);?>
				</td>
				
				<!-- Datos economicos -->
				<td></td>
				
				<td><?php echo $representante['Banco'];?></td>

			
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

<script src="../../datatables/datatables.min.js"></script>
<script src="../../js/consulta-representantes.js"></script>

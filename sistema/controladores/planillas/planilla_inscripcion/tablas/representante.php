<?php

	$nombre_completo_representante = ucwords(strtolower(
		$datos_representante['p_nombre'] . " " .
		$datos_representante['s_nombre'] . " " .
		$datos_representante['p_apellido'] . " " .
		$datos_representante['s_apellido']
	));

?>

	<tr>
		<th class="text-center bg-success" colspan="6">Datos del representante</th>
	</tr>


	<tr>
		<td colspan="4">
			<b>
				Nombre completo:
			</b>
			<span>
				<?php echo $nombre_completo_representante; ?>
			</span>
		</td>
		<td colspan="2">
			<b>
				Cédula de identidad:
			</b>
			<span>
				<?php echo $datos_representante['cedula'] ?>
			</span>
		</td>
	</tr>

	<?php if (isset($configuracion) and $configuracion["mostrar_vinculo_representante"] == true): ?>
	<tr>
		<td colspan="6">
			<b>
				Vínculo con el estudiante:
			</b>
			<span>
				<?php echo $datos_estudiante['relacion_representante'] ?>
			</span>
		</td>
	</tr>
	<?php endif ?>

	<tr>
		<td colspan="2">
			<b>
				Edad:
			</b>
			<span>
				<?php echo calcular_edad($datos_representante['fecha_nacimiento']);?> años
			</span>
		</td>

		<td colspan="2">
			<b>
				Estado civil:
			</b>
			<span>
				<?php echo $datos_representante['estado_civil'];?>
			</span>
		</td>
		<td colspan="2">
			<b>
				Fecha de nacimiento:
			</b>
			<span>
				<?php echo formatear_fecha($datos_representante['fecha_nacimiento'])?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="6">
			<b>
				Lugar de nacimiento:
			</b>
			<span>
				<?php echo $datos_representante['lugar_nacimiento'];?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="6">
			<b>
				Números de teléfono:
			</b>
			<span>
				<?php echo listar_telefonos($tlfs_representante);?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="6">
			<b>
				Correo electrónico:
			</b>
			<span>
				<?php echo $datos_representante['email'];?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="6">
			<b>
				Dirección:
			</b>
			<span>
				<?php echo direccion_completa($datos_representante);?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="3">
			<b>
				En caso de emergencia llamar a:
			</b>
			<span>
				<?php echo $datos_representante['nombre_aux'];?>
				<?php echo $datos_representante['apellido_aux'];?>
			</span>
		</td>
		<td colspan="3">
			<b>
				Relación:
			</b>
			<span>
				<?php echo $datos_representante['relacion_aux'];?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="6">
			<b>
				Número de teléfono:
			</b>
			<span>
				<?php echo $datos_representante['pref_aux'];?>-<?php echo $datos_representante['numero_aux'];?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="6">
			<b>
				Grado de instrucción:
			</b>
			<span>
				<?php echo $datos_representante['grado_academico'];?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="1">
			<b>
				¿Trabaja?:
			</b>
			<span>
				<?php echo verificar_empleo($datos_representante);?>
			</span>
		</td>
		<td colspan="5">
			<b>
				¿En qué se desempeña?:
			</b>
			<span>
				<?php echo $datos_representante['empleo'];?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="6">
			<b>
				Lugar del trabajo:
			</b>
			<span>
				<?php echo $datos_representante['lugar_trabajo'];?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="3">
			<b>
				Remuneración en sueldos mínimos:
			</b>
			<span>
				<?php echo $datos_representante['remuneracion'];?>
			</span>
		</td>
		<td colspan="3">
			<b>
				Frecuencia de la remuneración:
			</b>
			<span>
				<?php echo $datos_representante['tipo_remuneracion'];?>
			</span>
		</td>
	</tr>




	<tr>
		<td colspan="1">
			<b>
				Datos bancarios
			</b>
		</td>
		<td colspan="3">
			<b>
				Banco:
			</b>
			<span>
				<?php echo $datos_representante['banco'];?>
			</span>
		</td>
		<td colspan="2">
			<b>
				Tipo de cuenta:
			</b>
			<span>
				<?php echo $datos_representante['tipo_cuenta'];?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="6">
			<b>
				Número de cuenta bancaria:
			</b>
			<span>
				<?php echo $datos_representante['nro_cuenta'];?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="2">
			<b>
				Condiciones de la vivienda:
			</b>
			<span>
				<?php echo $datos_representante['condicion'];?>
			</span>
		</td>
		<td colspan="2">
			<b>
				Tipo de vivienda:
			</b>
			<span>
				<?php echo $datos_representante['tipo'];?>
			</span>
		</td>
		<td colspan="2">
			<b>
				Tenencia de la vivienda:
			</b>
			<span>
				<?php echo $datos_representante['tenencia'];?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="2">
			<b>
				¿Tiene carnet de la patria?:
			</b>
			<span>
				<?php echo verificar_si_o_no($datos_representante['codigo_carnet']);?>
			</span>
		</td>
		<td colspan="2">
			<b>
				Código:
			</b>
			<span>
				<?php echo $datos_representante['codigo_carnet'];?>
			</span>
		</td>
		<td colspan="2">
			<b>
				Serial:
			</b>
			<span>
				<?php echo $datos_representante['serial_carnet'];?>
			</span>
		</td>
	</tr>

	<?php if (isset($configuracion) and $configuracion["listar_representados"] == true): ?>
		<?php
			$lista_representados = $representantes->mostrar_representados();
		?>
		<tr>
			<th class="text-center bg-success" colspan="6">Representados</th>
		</tr>
		<?php foreach ($lista_representados as $representado): ?>
			<tr>
				<td colspan="1">
					<b>
						Cédula:
					</b>
					<span>
						<?php
							echo $representado['cedula'];?>
					</span>
				</td>
				<td colspan="3">
					<b>
						Nombre y apellido:
					</b>
					<span>
						<?php
							echo
								$representado['p_nombre'] . " " .
								$representado['p_apellido']
						;?>
					</span>
				</td>
				<td colspan="2">
					<b>
						Año que cursa:
					</b>
					<span>
						<?php echo $representado['grado_a_cursar'];?>
					</span>
				</td>
			</tr>
		<?php endforeach ?>
	<?php endif ?>



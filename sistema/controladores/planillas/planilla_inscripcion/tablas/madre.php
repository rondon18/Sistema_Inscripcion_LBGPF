<?php

	$nombre_completo_madre = ucwords(strtolower(
		$datos_madre['p_nombre'] . " " .
		$datos_madre['s_nombre'] . " " .
		$datos_madre['p_apellido'] . " " .
		$datos_madre['s_apellido']
	));

	if ($datos_madre['pais_residencia'] == "Venezuela") {
		$redide_en_el_pais = "Si";
	}
	else {
		$redide_en_el_pais = "No";
	}

?>

	<tr>
		<th class="text-center bg-warning" colspan="6">Datos de la madre</th>
	</tr>


	<tr>
		<td colspan="4">
			<b>
				Nombre completo:
			</b>
			<span>
				<?php echo $nombre_completo_madre; ?>
			</span>
		</td>
		<td colspan="2">
			<b>
				Cédula de identidad:
			</b>
			<span>
				<?php echo $datos_madre['cedula']; ?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="2">
			<b>
				Edad:
			</b>
			<span>
				<?php echo calcular_edad($datos_madre['fecha_nacimiento']); ?> años
			</span>
		</td>

		<td colspan="2">
			<b>
				Estado civil:
			</b>
			<span>
				<?php echo $datos_madre['estado_civil']; ?>
			</span>
		</td>
		<td colspan="2">
			<b>
				Fecha de nacimiento:
			</b>
			<span>
				<?php echo formatear_fecha($datos_madre['fecha_nacimiento']); ?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="6">
			<b>
				Lugar de nacimiento:
			</b>
			<span>
				<?php echo $datos_madre['lugar_nacimiento']; ?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="6">
			<b>
				Números de teléfono:
			</b>
			<span>
				<?php echo listar_telefonos($tlfs_madre);?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="6">
			<b>
				Correo electrónico:
			</b>
			<span>
				<?php echo $datos_madre['email']; ?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="6">
			<b>
				Dirección:
			</b>
			<span>
				<?php echo direccion_completa($datos_madre);?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="2">
			<b>
				¿Se encuentra en el país?:
			</b>
			<span>
				<?php echo $redide_en_el_pais; ?>
			</span>
		</td>
		<td colspan="4">
			<b>
				¿En qué país?:
			</b>
			<span>
				<?php echo $datos_madre['pais_residencia']; ?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="6">
			<b>
				Grado de instrucción:
			</b>
			<span>
				<?php echo $datos_madre['grado_academico']; ?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="1">
			<b>
				¿Trabaja?:
			</b>
			<span>
				<?php echo verificar_empleo($datos_madre);?>
			</span>
		</td>
		<td colspan="5">
			<b>
				¿En qué se desempeña?:
			</b>
			<span>
				<?php echo $datos_madre['empleo']; ?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="6">
			<b>
				Lugar del trabajo:
			</b>
			<span>
				<?php echo $datos_madre['lugar_trabajo']; ?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="3">
			<b>
				Remuneración en sueldos mínimos:
			</b>
			<span>
				<?php echo $datos_madre['remuneracion']; ?>
			</span>
		</td>
		<td colspan="3">
			<b>
				Frecuencia de la remuneración:
			</b>
			<span>
				<?php echo $datos_madre['tipo_remuneracion']; ?>
			</span>
		</td>
	</tr>


	<tr>
		<td colspan="2">
			<b>
				Condiciones de la vivienda:
			</b>
			<span>
				<?php echo $datos_madre['condicion']; ?>
			</span>
		</td>
		<td colspan="2">
			<b>
				Tipo de vivienda:
			</b>
			<span>
				<?php echo $datos_madre['tipo']; ?>
			</span>
		</td>
		<td colspan="2">
			<b>
				Tenencia de la vivienda:
			</b>
			<span>
				<?php echo $datos_madre['tenencia']; ?>
			</span>
		</td>
	</tr>

	<?php if (isset($configuracion) and $configuracion["listar_hijos"] == true): ?>
		<?php
			$lista_hijos = $padres->mostrar_hijos();
		?>
		<tr>
			<th class="text-center bg-warning" colspan="6">Hijos regitrados</th>
		</tr>
		<?php foreach ($lista_hijos as $hijo): ?>
			<tr>
				<td colspan="1">
					<b>
						Cédula:
					</b>
					<span>
						<?php
							echo $hijo['cedula'];?>
					</span>
				</td>
				<td colspan="3">
					<b>
						Nombre y apellido:
					</b>
					<span>
						<?php
							echo
								$hijo['p_nombre'] . " " .
								$hijo['p_apellido']
						;?>
					</span>
				</td>
				<td colspan="2">
					<b>
						Año que cursa:
					</b>
					<span>
						<?php echo $hijo['grado_a_cursar'];?>
					</span>
				</td>
			</tr>
		<?php endforeach ?>
	<?php endif ?>
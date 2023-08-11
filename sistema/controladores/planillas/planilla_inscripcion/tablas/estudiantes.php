<?php


	$nombre_completo_estudiante = ucwords(strtolower(
		$datos_estudiante['p_nombre'] . " " .
		$datos_estudiante['s_nombre'] . " " .
		$datos_estudiante['p_apellido'] . " " .
		$datos_estudiante['s_apellido']
	));

	$anio_a_cursar = $datos_estudiante['grado_a_cursar'];

	$seccion = $datos_estudiante['seccion'];

	$estado_vacunas = otras_vacunas($vacunas_estudiante);

?>

<tr>
	<th class="text-center bg-info" colspan="6">Datos personales</th>
</tr>


<tr>
	<td colspan="4">
		<b>
			Nombre completo:
		</b>
		<span>
			<?php echo $nombre_completo_estudiante;?>
		</span>
	</td>
	<td colspan="2">
		<b>
			Cédula de identidad:
		</b>
		<span>
			<?php echo $datos_estudiante['cedula'];?>
		</span>
	</td>
</tr>


<tr>
	<td colspan="2">
		<b>
			Género:
		</b>
		<span>
			<?php echo genero($datos_estudiante['genero']);?>
		</span>
	</td>
	<td colspan="2">
		<b>
			Edad:
		</b>
		<span>
			<?php echo calcular_edad($datos_estudiante['fecha_nacimiento']);?> años
		</span>
	</td>
	<td colspan="2">
		<b>
			Fecha de nacimiento:
		</b>
		<span>
			<?php echo formatear_fecha($datos_estudiante['fecha_nacimiento']);?>
		</span>
	</td>
</tr>


<tr>
	<td colspan="6">
		<b>
			Lugar de nacimiento:
		</b>
		<span>
			<?php echo $datos_estudiante['lugar_nacimiento']?>
		</span>
	</td>
</tr>



<tr>
	<td colspan="6">
		<b>
			Números de teléfono:
		</b>
		<span>
			<?php echo listar_telefonos($tlfs_estudiante);?>
		</span>
	</td>
</tr>



<tr>
	<td colspan="6">
		<b>
			Correo electrónico:
		</b>
		<span>
			<?php echo $datos_estudiante['email']?>
		</span>
	</td>
</tr>


<tr>
	<th class="text-center bg-info" colspan="6">Datos académicos</th>
</tr>


<tr>
	<td colspan="3">
		<b>
			Año a cursar:
		</b>
		<span>
			<?php echo $anio_a_cursar;?>
		</span>
	</td>
	<td colspan="3">
		<b>
			Sección a cursar:
		</b>
		<span>
			Sección "<?php echo $seccion;?>"
		</span>
	</td>
</tr>


<tr>
	<td colspan="3">
		<b>
			¿El estudiante es repitiente?:
		</b>
		<span>
			<?php echo verificar_si_o_no($datos_estudiante['grado_repetido']);?>
		</span>
	</td>
	<td colspan="3">
		<b>
			¿Qué año repite?:
		</b>
		<span>
			<?php echo $datos_estudiante['grado_repetido'];?>
		</span>
	</td>
</tr>


<tr>
	<td colspan="6">
		<b>
			¿Qué materias repite?:
		</b>
		<span>
			<?php echo $datos_estudiante['materias_repetidas'];?>
		</span>
	</td>
</tr>


<tr>
	<td colspan="6">
		<b>
			¿Tiene materias pendientes?:
		</b>
		<span>
			<?php echo verificar_si_o_no($datos_estudiante['materias_pendientes']);?>
		</span>
	</td>
</tr>


<tr>
	<td colspan="6">
		<b>
			¿Qué materias?:
		</b>
		<u>
			<?php echo $datos_estudiante['materias_pendientes'];?>
		</u>
	</td>
</tr>


<tr>
	<td colspan="6">
		<b>
			Plantel de procedencia:
		</b>
		<span>
			<?php echo $datos_estudiante['plantel_proced'];?>
		</span>
	</td>
</tr>


<tr>
	<th class="text-center bg-info" colspan="6">Datos sociales</th>
</tr>


<tr>
	<td colspan="6">
		<b>
			Lugar de domicilio:
		</b>
		<span>
			<?php echo direccion_completa($datos_estudiante);?>
		</span>
	</td>
</tr>


<tr>
	<td colspan="6">
		<b>
			¿Con quién más vive?:
		</b>
		<span>
			<?php echo $datos_estudiante['con_quien_vive'];?>
		</span>
	</td>
</tr>


<tr>
	<td colspan="2">
		<b>
			¿Tiene Canaima?:
		</b>
		<span>
			<?php echo $datos_estudiante['tiene_canaima'];?>
		</span>
	</td>
	<td colspan="4">
		<b>
			¿En qué condiciones?:
		</b>
		<span>
			<?php echo $datos_estudiante['condicion_canaima'];?>
		</span>
	</td>
</tr>


<tr>
	<td colspan="2">
		<b>
			¿Tiene carnet de la patria?:
		</b>
		<span>
			<?php echo verificar_si_o_no($datos_estudiante['codigo_carnet']);?>
		</span>
	</td>
	<td colspan="2">
		<b>
			Código:
		</b>
		<span>
			<?php echo $datos_estudiante['codigo_carnet'];?>
		</span>
	</td>
	<td colspan="2">
		<b>
			Serial:
		</b>
		<span>
			<?php echo $datos_estudiante['serial_carnet'];?>
		</span>
	</td>
</tr>


<tr>
	<td colspan="6">
		<b>
			¿Cuenta con acceso a Internet?:
		</b>
		<span>
			<?php echo $datos_estudiante['acceso_internet'];?>
		</span>
	</td>
</tr>


<tr>
	<th class="text-center bg-info" colspan="6">Datos de salud</th>
</tr>


<tr>
	<td colspan="2">
		<b>
			Indice de masa corporal:
		</b>
		<span>
			<?php echo $datos_estudiante['indice_m_c'];?>
		</span>
	</td>
	<td colspan="2">
		<b>
			Talla(Estatura):
		</b>
		<span>
			<?php echo $datos_estudiante['estatura'];?> Cm
		</span>
	</td>
	<td colspan="1">
		<b>
			Peso:
		</b>
		<span>
			<?php echo $datos_estudiante['peso'];?> Kg
		</span>
	</td>
	<td colspan="1">
		<b>
			C. Brazo:
		</b>
		<span>
			<?php echo $datos_estudiante['circ_braquial'];?> Cm
		</span>
	</td>
</tr>


<tr>
	<td colspan="2">
		<b>
			Talla de Camisa:
		</b>
		<span>
			<?php echo $datos_estudiante['camisa'];?>
		</span>
	</td>
	<td colspan="2">
		<b>
			Talla de Pantalón:
		</b>
		<span>
			<?php echo $datos_estudiante['pantalon'];?>
		</span>
	</td>
	<td colspan="2">
		<b>
			Talla de Zapatos:
		</b>
		<span>
			<?php echo $datos_estudiante['calzado'];?>
		</span>
	</td>
</tr>


<tr>
	<td colspan="6">
		<b>
			¿Padece alguna enfermedad?:
		</b>
		<span>
			<?php echo $datos_estudiante['padecimiento'];?>
		</span>
	</td>
</tr>


<tr>
	<td colspan="2">
		<b>
			Tipo de sangre:
		</b>
		<span>
			<?php echo $datos_estudiante['tipo_sangre'];?>
		</span>
	</td>
	<td colspan="4">
		<b>
			Lateralidad:
		</b>
		<span>
			<?php echo $datos_estudiante['lateralidad'];?>
		</span>
	</td>
</tr>


<tr>
	<td colspan="2">
		<b>
			Condición de la dentadura:
		</b>
		<span>
			<?php echo $datos_estudiante['condicion_dental'];?>
		</span>
	</td>
	<td colspan="4">
		<b>
			Condición oftalmológica:
		</b>
		<span>
			<?php echo $datos_estudiante['condicion_vista'];?>
		</span>
	</td>
</tr>


<tr>
	<td colspan="6">
		<b>
			¿Presenta alguna condición de salud?:
		</b>
		<span>
			<?php echo condiciones_salud($datos_estudiante);?>
		</span>
	</td>
</tr>


<tr>
	<td colspan="6">
		<b>
			¿Presenta algún impedimento físico?:
		</b>
		<span>
			<?php echo $datos_estudiante['impedimento_fisico'];?>
		</span>
	</td>
</tr>


<tr>
	<td colspan="6">
		<b>
			¿Presenta alguna de necesidad educativa especial?:
		</b>
		<span>
			<?php echo $datos_estudiante['necesidad_educativa'];?>
		</span>
	</td>
</tr>


<tr>
	<td colspan="3">
		<b>
			¿Es atendido por otra institución?:
		</b>
		<span>
			<?php echo verificar_si_o_no($datos_estudiante['institucion_medica']);?>
		</span>
	</td>
	<td colspan="3">
		<b>
			¿Cuál institución?:
		</b>
		<span>
			<?php echo $datos_estudiante['institucion_medica'];?>
		</span>
	</td>
</tr>


<tr>
	<td colspan="2">
		<b>
			¿Posee carnet de discapacidad?:
		</b>
		<span>
			<?php echo verificar_si_o_no($datos_estudiante['carnet_discapacidad']);?>
		</span>
	</td>
	<td colspan="4">
		<b>
			¿Número de carnet?:
		</b>
		<span>
			<?php echo $datos_estudiante['carnet_discapacidad'];?>
		</span>
	</td>
</tr>


<tr>
	<td colspan="3">
		<b>
			Vacuna contra el Covid-19 aplicada:
		</b>
		<span>
			<?php echo $datos_estudiante['vac_aplicada'];?>
		</span>
	</td>
	<td colspan="1">
		<b>
			Dosis:
		</b>
		<span>
			<?php echo $datos_estudiante['dosis'];?>
		</span>
	</td>
	<td colspan="2">
		<b>
			Lote:
		</b>
		<span>
			<?php echo $datos_estudiante['lote'];?>
		</span>
	</td>
</tr>

<tr>
	<td colspan="2">
		<b>
			Otras vacunas aplicadas:
		</b>
	</td>
	<td colspan="1">
		<b>
			VPH:
		</b>
		<span>
			<?php echo $estado_vacunas['vph'];?>
		</span>
	</td>










	<td colspan="1">
		<b>
			TDAP:
		</b>
		<span>
			<?php echo $estado_vacunas['tdap'];?>
		</span>
	</td>
	<td colspan="1">
		<b>
			MENACWY:
		</b>
		<span>
			<?php echo $estado_vacunas['menacwy'];?>
		</span>
	</td>
	<td colspan="1">
		<b>
			HEPATITIS A:
		</b>
		<span>
			<?php echo $estado_vacunas['hep_a'];?>
		</span>
	</td>
</tr>


<tr>
	<td colspan="1">
		<b>
			HEPATITIS B:
		</b>
		<span>
			<?php echo $estado_vacunas['hep_b'];?>
		</span>
	</td>
	<td colspan="1">
		<b>
			IPV:
		</b>
		<span>
			<?php echo $estado_vacunas['ipv'];?>
		</span>
	</td>
	<td colspan="1">
		<b>
			MMR:
		</b>
		<span>
			<?php echo $estado_vacunas['mmr'];?>
		</span>
	</td>
	<td colspan="1">
		<b>
			VARICELA:
		</b>
		<span>
			<?php echo $estado_vacunas['varicela'];?>
		</span>
	</td>
	<td colspan="1">
		<b>
			ANTIAMARILICA:
		</b>
		<span>
			<?php echo $estado_vacunas['antiamarilica'];?>
		</span>
	</td>
	<td colspan="1">
		<b>
			ANTIGRIPAL:
		</b>
		<span>
			<?php echo $estado_vacunas['antigripal'];?>
		</span>
	</td>
</tr>
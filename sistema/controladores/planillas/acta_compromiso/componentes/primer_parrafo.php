<?php

	$nombre_completo_representante = ucwords(strtolower(
		$datos_representante['p_nombre'] . " " .
		$datos_representante['s_nombre'] . " " .
		$datos_representante['p_apellido'] . " " .
		$datos_representante['s_apellido']
	));

	$nombre_completo_estudiante = ucwords(strtolower(
		$datos_estudiante['p_nombre'] . " " .
		$datos_estudiante['s_nombre'] . " " .
		$datos_estudiante['p_apellido'] . " " .
		$datos_estudiante['s_apellido']
	));

	$anio_a_cursar = $datos_estudiante['grado_a_cursar'];

	$seccion = $datos_estudiante['seccion'];
?>

<p>
	Yo,	<b><?php echo $nombre_completo_representante;?> CI:<?php echo $datos_representante['cedula'];?></b>
	como representante del estudiante <b><?php echo $nombre_completo_estudiante;?></b> del año:
	<b><?php echo $anio_a_cursar;?></b>, sección: "<b><?php echo $seccion;?></b>", me comprometo a cumplir con lo siguiente:
</p>
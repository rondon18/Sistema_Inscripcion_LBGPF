<?php

	include "antropometria_est.php";
	include "bitacora.php";
	include "carnet_patria.php";
	include "condiciones_est.php";
	include "contactos_aux.php";
	include "datos_academicos.php";
	include "datos_economicos.php";
	include "datos_laborales.php";
	include "datos_salud.php";
	include "datos_sociales.php";
	include "datos_vivienda.php";
	include "direcciones.php";
	include "estudiantes.php";
	include "grado_a_cursar_est.php";
	include "inscripciones.php";
	include "mantenimiento.php";
	include "observaciones_est.php";
	include "padres.php";
	include "per_academico.php";
	include "personas.php";
	include "representantes.php";
	include "tallas_est.php";
	include "telefonos.php";
	include "usuarios.php";
	include "vac_covid19_est.php";
	include "vacunas_est.php";


	include "../logs/error_handler.php";
	include "../controladores/conexion.php";

	$personas = new personas();
	$telefonos = new telefonos();
	$carnet_patria = new carnet_patria();
	$datos_laborales = new datos_laborales();
	$datos_vivienda = new datos_vivienda();
	$direcciones = new direcciones();
	$representantes = new representantes();
	$contactos_aux = new contactos_aux();
	$datos_economicos = new datos_economicos();
	$padres = new padres();
	$estudiantes = new estudiantes();
	$antropometria_est = new antropometria_est();
	$condiciones_est = new condiciones_est();
	$datos_salud = new datos_salud();
	$datos_sociales = new datos_sociales();
	$datos_academicos = new datos_academicos();
	$grado_a_cursar_est = new grado_a_cursar_est();
	$observaciones_est = new observaciones_est();
	$tallas_est = new tallas_est();
	$vac_covid19_est = new vac_covid19_est();
	$vacunas_est = new vacunas_est();
	$inscripciones = new inscripciones();
	$per_academico = new per_academico();
	$usuarios = new usuarios();
	$bitacora = new bitacora();

 ?>
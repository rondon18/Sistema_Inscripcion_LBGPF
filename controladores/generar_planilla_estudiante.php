<?php

	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../index.php');
		exit();
	}

	require('../fpdf/fpdf.php');

	require('../lobby/consultar/funciones.php');

	require('../controladores/conexion.php');
	require('../clases/bitacora.php');

	require('../clases/antropometria_est.php');
	require('../clases/carnet_patria.php');
	require('../clases/condiciones_est.php');
	require('../clases/contactos_aux.php');
	require('../clases/datos_economicos.php');
	require('../clases/datos_laborales.php');
	require('../clases/datos_salud.php');
	require('../clases/datos_sociales.php');
	require('../clases/datos_vivienda.php');
	require('../clases/direcciones.php');
	require('../clases/estudiantes.php');
	require('../clases/grado_a_cursar_est.php');
	require('../clases/observaciones_est.php');
	require('../clases/padres.php');
	require('../clases/per_academico.php');
	require('../clases/personas.php');
	require('../clases/representantes.php');
	require('../clases/tallas_est.php');
	require('../clases/telefonos.php');
	require('../clases/vac_covid19_est.php');
	require('../clases/vacunas_est.php');

	$antropometria_est = new antropometria_est();
	$bitacora = new bitacora();
	$carnet_patria = new carnet_patria();
	$condiciones_est = new condiciones_est();
	$contactos_aux = new contactos_aux();
	$datos_economicos = new datos_economicos();
	$datos_laborales = new datos_laborales();
	$datos_salud = new datos_salud();
	$datos_sociales = new datos_sociales();
	$datos_vivienda = new datos_vivienda();
	$direcciones = new direcciones();
	$estudiantes = new estudiantes();
	$grado_a_cursar_est = new grado_a_cursar_est();
	$observaciones_est = new observaciones_est();
	$padres = new padres();
	$per_academico = new per_academico();
	$personas = new personas();
	$representantes = new representantes();
	$tallas_est = new tallas_est();
	$telefonos = new telefonos();
	$vac_covid19_est = new vac_covid19_est();
	$vacunas_est = new vacunas_est();

	if (!isset($_SESSION['var_planilla'])) {
		$_SESSION['var_planilla'] = [];
		foreach ($_POST as $dato => $valor) {
			$_SESSION['var_planilla'][$dato] = $valor;
		}
	}

	// var_dump($_SESSION['var_planilla']);


	// estudiante
	$estudiantes->set_cedula_persona($_SESSION['var_planilla']['cedula']);
	$datos_estudiante = $estudiantes->consultar_estudiantes();

	$telefonos->set_cedula_persona($_SESSION['var_planilla']['cedula']);
	$tlfs_estudiante = $telefonos->consultar_telefonos();

	
	// representante
	$representantes->set_cedula_persona($_SESSION['var_planilla']['cedula_representante']);
	$datos_representante = $representantes->consultar_representantes();

	$telefonos->set_cedula_persona($_SESSION['var_planilla']['cedula_representante']);
	$tlfs_representante = $telefonos->consultar_telefonos();

	
	// padre
	$padres->set_cedula_persona($_SESSION['var_planilla']['cedula_padre']);
	$datos_padre = $padres->consultar_padres();

	$telefonos->set_cedula_persona($_SESSION['var_planilla']['cedula_padre']);
	$tlfs_padre = $telefonos->consultar_telefonos();


	// madre
	$padres->set_cedula_persona($_SESSION['var_planilla']['cedula_madre']);
	$datos_madre = $padres->consultar_padres();

	$telefonos->set_cedula_persona($_SESSION['var_planilla']['cedula_madre']);
	$tlfs_madre = $telefonos->consultar_telefonos();

	class PDF extends FPDF
	{

	}

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','',18);
	$pdf->Image('../img/logo.jpg',30,5,150,20);
	$pdf->Ln(15);
	$pdf->Cell(0,6,utf8_decode('INSCRIPCIÓN AÑO ESCOLAR ' . $per_academico->get_inicio() . '-' . $per_academico->get_fin()),0,1,'C');
	$pdf->SetFont('Arial','',14);

	// #PARTE DEL ESTUDIANTE

	$pdf->Image('../img/foto.jpg',170,44,32,0);
	$pdf->Cell(0,20,utf8_decode('PLANILLA DEL ESTUDIANTE'),0,1,'C');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(50.1,44);
	$pdf->Cell(22,12,utf8_decode('1er año fecha'),1,0);
	$pdf->Cell(22,12,utf8_decode('2do año fecha'),1,0);
	$pdf->Cell(22,12,utf8_decode('3er año fecha'),1,0);
	$pdf->Cell(22,12,utf8_decode('4to año fecha'),1,0);
	$pdf->Cell(22,12,utf8_decode('5to año fecha'),1,1);
	$pdf->Multicell(40,6,utf8_decode("INDIQUE CON UNA X\nEL AÑO DE ESTUDIO"),1,0);
	$pdf->SetXY(50.1,56);
	$pdf->Cell(22,12,utf8_decode(' '),1,0);
	$pdf->Cell(22,12,utf8_decode(' '),1,0);
	$pdf->Cell(22,12,utf8_decode(' '),1,0);
	$pdf->Cell(22,12,utf8_decode(' '),1,0);
	$pdf->Cell(22,12,utf8_decode(' '),1,1);
	$pdf->Multicell(40,6,utf8_decode("SECCIÓN\n(DEJAR EN BLANCO)"),1,0);
	$pdf->SetXY(50.1,68);
	$pdf->Cell(22,12,utf8_decode(' '),1,0);
	$pdf->Cell(22,12,utf8_decode(' '),1,0);
	$pdf->Cell(22,12,utf8_decode(' '),1,0);
	$pdf->Cell(22,12,utf8_decode(' '),1,0);
	$pdf->Cell(22,12,utf8_decode(' '),1,1);
	$pdf->Ln(6);
	$pdf->SetFillColor(189,214,238);
	$pdf->SetFont('Arial','',14);

	// Datos del estudiante

	$pdf->Cell(0,6,utf8_decode('DATOS PERSONALES'),1,1,'C',1);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(0,6,utf8_decode('NOMBRES Y APELLIDOS DEL Estudiantes: ' . $datos_estudiante['p_nombre'].' '.$datos_estudiante['s_nombre'].' '.$datos_estudiante['p_apellido'].' '.$datos_estudiante['s_apellido']),1,1);
	$pdf->Cell(70,6,utf8_decode('CÉDULA DE IDENTIDAD: ' . $datos_estudiante['cedula']),1,0);
	$pdf->Cell(26,6,utf8_decode('EDAD: ' . calcular_edad($datos_estudiante['fecha_nacimiento'])." Años"),1,0);
	// OJO: LA CANTIDAD DEL ARREGLO VARIA

	$t_est = "";

	foreach ($tlfs_estudiante as $telefono_est){
		$t_est .= $telefono_est['prefijo']."-".$telefono_est['numero'];
		$t_est .= "  ";
	}


	$pdf->Cell(0,6,utf8_decode('TELÉFONOS, MÓVIL Y CASA: ' . $t_est),1,1);
	$pdf->Cell(57,6,utf8_decode('FECHA DE NACIMIENTO: ' .  $datos_estudiante['fecha_nacimiento']),1,0);
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(0,6,utf8_decode('LUGAR DE NACIMIENTO: ' . $datos_estudiante['lugar_nacimiento']),1,1);
	$pdf->Cell(0,6,utf8_decode('CORREO ELECTRÓNICO: ' . $datos_estudiante['email']),1,1);

	// Si esta vacio no repite
	if(empty($datos_estudiante['grado_repetido'])) {
		$mat_repitente = "No";
	}
	else {
		$mat_repitente = "Si";
	}

	// Si esta vacio no repite
	if(empty($datos_estudiante['materias_pendientes'])) {
		$mat_pendientes = "No";
	}
	else {
		$mat_pendientes = "Si";
	}

	$pdf->Cell(17,6,utf8_decode('REPITE: '. $mat_repitente),1,0);
	$pdf->Cell(140,6,utf8_decode('CUÁLES MATERIAS: ' . $datos_estudiante['materias_repetidas']),1,0);
	$pdf->Cell(0,6,utf8_decode('QUÉ AÑO REPITE: ' . $datos_estudiante['grado_repetido']),1,1);
	$pdf->Cell(37,6,utf8_decode('MATERIAS PENDIENTES: ' . $mat_pendientes),1,0);
	$pdf->Cell(0,6,utf8_decode('CUÁLES MATERIAS PENDIENTES: ' . $datos_estudiante['materias_pendientes']),1,1);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(0,6,utf8_decode('PLANTEL DE PROCEDENCIA: ' . $datos_estudiante['plantel_proced']),1,1);
	$pdf->Ln(6);

	$pdf->SetFont('Arial','',14);
	$pdf->Cell(0,6,utf8_decode('DATOS SOCIALES'),1,1,'C',1);
	$pdf->SetFont('Arial','',9);

	// Concatena la direccion completa con un espacio o con un vacio en caso de que el dato esté vacio

	$direccion = "";

	if (empty($datos_estudiante['estado'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_estudiante['estado']." ";
	}
	if (empty($datos_estudiante['municipio'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_estudiante['municipio']." ";
	}
	if (empty($datos_estudiante['parroquia'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_estudiante['parroquia']." ";
	}
	if (empty($datos_estudiante['sector'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_estudiante['sector']." ";
	}
	if (empty($datos_estudiante['calle'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_estudiante['calle']." ";
	}
	if (empty($datos_estudiante['nro_casa'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_estudiante['nro_casa']." ";
	}
	if (empty($datos_estudiante['punto_referencia'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_estudiante['punto_referencia']." ";
	}

	$pdf->Cell(0,6,utf8_decode('LUGAR DE DOMICILIO: ' . $direccion),1,1);
	$pdf->Cell(0,6,utf8_decode('CON QUIÉN VIVE: ' . $datos_estudiante['con_quien_vive']),1,1);
	$pdf->Cell(35,6,utf8_decode('TIENE CANAIMA: ' . $datos_estudiante['tiene_canaima']),1,0);
	$pdf->Cell(0,6,utf8_decode('CONDICIÓN DE LA CANAIMA: ' . $datos_estudiante['condicion_canaima']),1,1);

	// Si esta vacio no repite
	if(empty($datos_estudiante['codigo_carnet']) and empty($datos_estudiante['serial_carnet'])) {
		$carnet_Est = "No";
	}
	else {
		$carnet_Est = "Si";
	}

	$pdf->Cell(55,6,utf8_decode('POSEE CARNET DE LA PATRIA: ' . $carnet_Est),1,0);
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(66,6,utf8_decode('CÓDIGO: ' . $datos_estudiante['codigo_carnet']),1,0);
	$pdf->Cell(0,6,utf8_decode('SERIAL: ' . $datos_estudiante['serial_carnet']),1,1);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(0,6,utf8_decode('CUENTA CON ACCESO A INTERNET: ' . $datos_estudiante['acceso_internet']),1,1);
	$pdf->Ln(6);

	$pdf->SetFont('Arial','',14);
	$pdf->Cell(0,6,utf8_decode('DATOS DE SALUD'),1,1,'C',1);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(36,6,utf8_decode('ANTROPOMÉTRICOS'),1,0);
	$pdf->Cell(40,6,utf8_decode('ÍNDICE: ' . $datos_estudiante['indice_m_c']),1,0);
	$pdf->Cell(40,6,utf8_decode('TALLA: ' . $datos_estudiante['estatura']),1,0);
	$pdf->Cell(40,6,utf8_decode('PESO: ' . $datos_estudiante['peso']),1,0);
	$pdf->Cell(40,6,utf8_decode('C.BRAZO: ' . $datos_estudiante['circ_braquial']),1,1);
	$pdf->Cell(36,6,utf8_decode('TALLAS DE ROPA'),1,0);
	$pdf->Cell(53.3,6,utf8_decode('PANTALÓN: ' . $datos_estudiante['pantalon']),1,0);
	$pdf->Cell(53.3,6,utf8_decode('CAMISA: ' . $datos_estudiante['camisa']),1,0);
	$pdf->Cell(53.3,6,utf8_decode('ZAPATO: ' . $datos_estudiante['calzado']),1,1);
	
	$pdf->Cell(0,6,utf8_decode('ENFERMEDAD: ' . $datos_estudiante['padecimiento']),1,1);
	$pdf->Cell(38,6,utf8_decode('TIPO DE SANGRE: ' . $datos_estudiante['tipo_sangre']),1,0);
	$pdf->Cell(0,6,utf8_decode('LATERALIDAD: ' . $datos_estudiante['lateralidad']),1,1);
	$pdf->Cell(68,6,utf8_decode('CONDICIÓN DE LA DENTADURA: ' . $datos_estudiante['condicion_dental']),1,0);
	$pdf->Cell(0,6,utf8_decode('CONDICIÓN OFTALMOLÓGICA: ' . $datos_estudiante['condicion_vista']),1,1);
	$pdf->Cell(0,6,utf8_decode('PRESENTA ALGUNA CONDICION de salud: ' . rtrim($datos_estudiante['impedimento_fisico'],",") ),1,1);
	$pdf->Cell(0,6,utf8_decode('PRESENTA ALGUNA DE NECESIDAD EDUCATIVA ESPECIAL: ' . $datos_estudiante['necesidad_educativa']),1,1);
	
	if (empty( $datos_estudiante['institucion_medica'])) {
	    $institucion = "No";
	}
	else {
	    $institucion = "Si";
	}

	$pdf->Cell(70,6,utf8_decode('ES ATENDIDO POR OTRA INSTITUCIÓN: ' . $institucion ),1,0);
	$pdf->Cell(0,6,utf8_decode('CUÁL INSTITUCIÓN: ' . $datos_estudiante['institucion_medica']),1,1);
	
	if (empty($datos_estudiante['Carnet_Discapacidad'])) {
	    $carnet_dis = "No";
	}
	else {
	    $carnet_dis = "Si";
	}

	$pdf->Cell(65,6,utf8_decode('POSEE CARNET DE DISCAPACIDAD: ' . $carnet_dis ),1,0);
	$pdf->Cell(0,6,utf8_decode('NÚMERO DE CARNET: ' . $datos_estudiante['carnet_discapacidad']),1,1);

	$pdf->Cell(67,6,utf8_decode('VACUNACIÓN CONTRA EL COVID-19'),1,0);
	$pdf->Cell(129,6,utf8_decode('VACUNA APLICADA: ' . $datos_estudiante['vac_aplicada']),1,1);
	$pdf->Cell(55,6,utf8_decode('CUANTAS DOSIS: ' . $datos_estudiante['dosis']),1,0);
	$pdf->Cell(0,6,utf8_decode('LOTE: ' . $datos_estudiante['lote']),1,1);


	// Parte del representante

	$pdf->AddPage();
	$pdf->SetFont('Arial','',14);
	$pdf->SetFillColor(226,239,217);
	$pdf->Cell(0,10,utf8_decode('PLANILLA DEL REPRESENTANTE'),0,1,'C');

	$pdf->Ln(6);

	$pdf->Cell(0,6,utf8_decode('DATOS DEL PADRE'),1,1,'C',1);
	$pdf->SetFont('Arial','',9);

	// Datos del padre

	$pdf->Cell(0,6,utf8_decode('NOMBRES Y APELIDOS: '.$datos_padre['p_nombre'].' '.$datos_padre['s_nombre'].' '.$datos_padre['p_apellido'].' '.$datos_padre['s_apellido']),1,1);
	$pdf->Cell(64,6,utf8_decode('CÉDULA DE IDENTIDAD: ' . $datos_padre['cedula']),1,0);
	$pdf->Cell(40,6,utf8_decode('EDAD: ' . calcular_edad($datos_padre['fecha_nacimiento'])." Años"),1,0);
	$pdf->Cell(0,6,utf8_decode('FECHA DE NACIMIENTO: '.$datos_padre['fecha_nacimiento']),1,1);
	$pdf->SetFont('Arial','',8);

	$t_padre = "";

	foreach ($tlfs_padre as $telefono_padre){
		$t_padre .= $telefono_padre['prefijo']."-".$telefono_padre['numero'];
		$t_padre .= "  ";
	}

	$pdf->Cell(0,6,utf8_decode('TELÉFONOS: ' . $t_padre),1,1);

	$pdf->SetFont('Arial','',7);
	$pdf->Cell(90,6,utf8_decode('LUGAR DE NACIMIENTO: ' . $datos_padre['lugar_nacimiento']),1,0);
	$pdf->Cell(0,6,utf8_decode('CORREO ELECTRÓNICO: ' . $datos_padre['email']),1,1);
	$pdf->Cell(50,6,utf8_decode('ESTADO CIVIL: ' . $datos_padre['estado_civil']),1,0);


	// Concatena la direccion completa con un espacio o con un vacio en caso de que el dato esté vacio

	$direccion = "";

	if (empty($datos_padre['estado'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_padre['estado']." ";
	}
	if (empty($datos_padre['municipio'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_padre['municipio']." ";
	}
	if (empty($datos_padre['parroquia'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_padre['parroquia']." ";
	}
	if (empty($datos_padre['sector'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_padre['sector']." ";
	}
	if (empty($datos_padre['calle'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_padre['calle']." ";
	}
	if (empty($datos_padre['nro_casa'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_padre['nro_casa']." ";
	}
	if (empty($datos_padre['punto_referencia'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_padre['punto_referencia']." ";
	}


	$pdf->Cell(0,6,utf8_decode('DIRECCIÓN: ' . $direccion),1,1);


	if ($datos_padre['pais_residencia'] == "Venezuela") {
		$pais = "Si";
	}
	else {
		$pais = "No";
	}

	$pdf->Cell(50,6,utf8_decode('SE ENCUENTRA EN EL PAÍS: ' . $pais),1,0);

	if ($datos_padre['pais_residencia'] != "Venezuela") {
	    $pdf->Cell(0,6,utf8_decode('DÓNDE: ' . $datos_padre['pais_residencia']),1,1);
	}
	else {
		$pdf->Cell(0,6,"",1,1);
	}

	$pdf->Ln(6);

	$pdf->SetFont('Arial','',14);
	$pdf->Cell(0,6,utf8_decode('DATOS DE LA MADRE'),1,1,'C',1);
	$pdf->SetFont('Arial','',9);

	// Datos del padre

	$pdf->Cell(0,6,utf8_decode('NOMBRES Y APELIDOS: '.$datos_madre['p_nombre'].' '.$datos_madre['s_nombre'].' '.$datos_madre['p_apellido'].' '.$datos_madre['s_apellido']),1,1);
	$pdf->Cell(64,6,utf8_decode('CÉDULA DE IDENTIDAD: ' . $datos_madre['cedula']),1,0);
	$pdf->Cell(40,6,utf8_decode('EDAD: ' . calcular_edad($datos_madre['fecha_nacimiento'])." Años"),1,0);
	$pdf->Cell(0,6,utf8_decode('FECHA DE NACIMIENTO: '.$datos_madre['fecha_nacimiento']),1,1);
	$pdf->SetFont('Arial','',8);

	$t_madre = "";

	foreach ($tlfs_madre as $telefono_madre){
		$t_madre .= $telefono_madre['prefijo']."-".$telefono_madre['numero'];
		$t_madre .= "  ";
	}

	$pdf->Cell(0,6,utf8_decode('TELÉFONOS: ' . $t_madre),1,1);

	$pdf->SetFont('Arial','',7);
	$pdf->Cell(90,6,utf8_decode('LUGAR DE NACIMIENTO: ' . $datos_madre['lugar_nacimiento']),1,0);
	$pdf->Cell(0,6,utf8_decode('CORREO ELECTRÓNICO: ' . $datos_madre['email']),1,1);
	$pdf->Cell(50,6,utf8_decode('ESTADO CIVIL: ' . $datos_madre['estado_civil']),1,0);


	// Concatena la direccion completa con un espacio o con un vacio en caso de que el dato esté vacio

	$direccion = "";

	if (empty($datos_madre['estado'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_madre['estado']." ";
	}
	if (empty($datos_madre['municipio'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_madre['municipio']." ";
	}
	if (empty($datos_madre['parroquia'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_madre['parroquia']." ";
	}
	if (empty($datos_madre['sector'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_madre['sector']." ";
	}
	if (empty($datos_madre['calle'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_madre['calle']." ";
	}
	if (empty($datos_madre['nro_casa'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_madre['nro_casa']." ";
	}
	if (empty($datos_madre['punto_referencia'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_madre['punto_referencia']." ";
	}


	$pdf->Cell(0,6,utf8_decode('DIRECCIÓN: ' . $direccion),1,1);


	if ($datos_madre['pais_residencia'] == "Venezuela") {
		$pais = "Si";
	}
	else {
		$pais = "No";
	}

	$pdf->Cell(50,6,utf8_decode('SE ENCUENTRA EN EL PAÍS: ' . $pais),1,0);

	if ($datos_madre['pais_residencia'] != "Venezuela") {
	    $pdf->Cell(0,6,utf8_decode('DÓNDE: ' . $datos_madre['pais_residencia']),1,1);
	}
	else {
		$pdf->Cell(0,6,"",1,1);
	}

	// Parte del representante

	$pdf->Ln(6);

	$pdf->SetFont('Arial','',14);
	$pdf->Cell(0,6,utf8_decode('DATOS DEL REPRESENTANTE'),1,1,'C',1);
	$pdf->SetFont('Arial','',9);

	$pdf->Cell(0,6,utf8_decode('NOMBRES Y APELLIDOS DEL REPRESENTANTE: ' . $datos_representante['p_nombre'].' '.$datos_representante['s_nombre']. ' ' . $datos_representante['p_apellido'].' '.$datos_representante['s_apellido']),1,1);
	$pdf->Cell(90,6,utf8_decode('VÍNCULO CON EL ESTUDIANTE: ' . $datos_estudiante['relacion_representante']),1,0);
	$pdf->Cell(58,6,utf8_decode('CÉDULA DE IDENTIDAD: ' . $datos_representante['cedula']),1,0);
	$pdf->Cell(0,6,utf8_decode('EDAD: ' . calcular_edad($datos_representante['fecha_nacimiento']) . ' Años'),1,1);
	#CAMBIAR VARIABLE PARA LOS REPRESENTANTES

	$t_representante = "";

	foreach ($tlfs_representante as $telefono_representante){
		$t_representante .= $telefono_representante['prefijo']."-".$telefono_representante['numero'];
		$t_representante .= "  ";
	}

	$pdf->Cell(0,6,utf8_decode('TELÉFONOS: ' .  $t_representante),1,1);
	$pdf->Cell(0,6,utf8_decode('FECHA DE NACIMIENTO: ' .  $datos_representante['fecha_nacimiento']),1,1);
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(90,6,utf8_decode('LUGAR DE NACIMIENTO: ' . $datos_representante['lugar_nacimiento']),1,0);
	$pdf->Cell(0,6,utf8_decode('CORREO ELECTRÓNICO: ' . $datos_representante['email']),1,1);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(50,6,utf8_decode('ESTADO CIVIL: ' . $datos_representante['estado_civil']),1,0);
	$pdf->SetFont('Arial','',7);


	// Concatena la direccion completa con un espacio o con un vacio en caso de que el dato esté vacio

	$direccion = "";

	if (empty($datos_representante['estado'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_representante['estado']." ";
	}
	if (empty($datos_representante['municipio'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_representante['municipio']." ";
	}
	if (empty($datos_representante['parroquia'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_representante['parroquia']." ";
	}
	if (empty($datos_representante['sector'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_representante['sector']." ";
	}
	if (empty($datos_representante['calle'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_representante['calle']." ";
	}
	if (empty($datos_representante['nro_casa'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_representante['nro_casa']." ";
	}
	if (empty($datos_representante['punto_referencia'])) {
		$direccion .= "";
	}
	else {
		$direccion .= $datos_representante['punto_referencia']." ";
	}


	$pdf->Cell(0,6,utf8_decode('DIRECCIÓN: ' . $direccion),1,1);
	$pdf->Cell(50,6,utf8_decode('OTRO CONTACTO PARA EMERGENCIAS'),1,0,'C',1);
	$pdf->Cell(38,6,utf8_decode('PARENTESCO: ' . $datos_representante['relacion_aux']),1,0);
	$pdf->Cell(0,6,utf8_decode('NOMBRE: ' . $datos_representante['nombre_aux'].' '.$datos_representante['apellido_aux']),1,1);
	$pdf->Cell(0,6,utf8_decode('TELÉFONO: ' . $datos_representante['pref_aux'] . '-' . $datos_representante['numero_aux']),1,1);

	$pdf->Ln(6);

	$pdf->SetFont('Arial','',14);
	$pdf->Cell(0,6,utf8_decode('DATOS ECONÓMICOS'),1,1,'C',1);
	$pdf->SetFont('Arial','',9);
	
	
	$pdf->Cell(50,6,utf8_decode('TRABAJA: ' . $datos_representante['empleo']),1,0);
	$pdf->Cell(0,6,utf8_decode('EN QUÉ SE DESEMPEÑA: ' . $datos_representante['empleo']),1,1);


	$pdf->Cell(0,6,utf8_decode('LUGAR TRABAJO: ' . $datos_representante['lugar_trabajo']),1,1);
	$pdf->Cell(63,6,utf8_decode('GRADO DE INSTRUCCIÓN: ' . $datos_representante['grado_academico']),1,0);
	#AJUSTAR Índice DEL Teléfono Y VARIABLE PARA EL REPRESENTANTE
	$pdf->Cell(64,6,utf8_decode('REMUNERACIÓN (Sueldos mínimos): ' . $datos_representante['remuneracion']),1,0);
	$pdf->Cell(0,6,utf8_decode('TIPO DE REMUNERACIÓN: ' . $datos_representante['tipo_remuneracion']),1,1);

	$pdf->Cell(82,6,utf8_decode('BANCO: ' . $datos_representante['banco']),1,0);
	$pdf->Cell(0,6,utf8_decode('TIPO DE CUENTA: ' . $datos_representante['tipo_cuenta']),1,1);
	$pdf->Cell(0,6,utf8_decode('NÚMERO DE CUENTA BANCARIA: ' . $datos_representante['nro_cuenta']),1,1);

	// $pdf->Cell(0,6,utf8_decode('TIPO DE COLABORACIÓN QUE ESTA ENTREGANDO A LA INSTITUCIÓN (Dejar en blanco):'),'L,T,R',1,'C');
	// $pdf->SetFont('Arial','',8);
	// $pdf->Multicell(0,6,utf8_decode("DESINFECTANTE: SI____ LITRO NO_____ , CLORO: SI____ LITRO NO_____, CERA: SI____ LITRO NO_____, JABÓN SI____ LITRO NO____\nLAVAPLATOS: SI____ LITRO NO_____, DESENGRASANTE SI____ LITRO  NO_____, OTRO: ____________________________________\nARTÍCULOS DE OFICINA: LÁPIZ SI____ NO_____, LAPICERO SI____ NO_____, MARCADOR SI____ NO_____ OTRO__________________\nHOJAS BLANCAS: SI_______CANT APROX NO_____, HOJAS DE RECICLAJE: SI_______CANT APROX NO ______ \nDONARÁ UTENSILIOS PARA EL COMEDOR: CUCHARILLA: SI____  NO____ LO TRAERÁ DIARIO____, TENEDOR:  SI____  NO____ LO TRAERÁ DIARIO____"),'L,R,B',0);

	$pdf->Ln(6);

	$pdf->SetFont('Arial','',14);
	$pdf->Cell(0,6,utf8_decode('DATOS SOCIALES'),1,1,'C',1);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(65,6,utf8_decode('CONDICIONES DE LA VIVIENDA: ' . $datos_representante['condicion']),1,0);
	$pdf->Cell(65,6,utf8_decode('TIPO DE VIVIENDA: ' . $datos_representante['tipo']),1,0);
	$pdf->Cell(0,6,utf8_decode('TENENCIA DE LA VIVIENDA: ' . $datos_representante['tenencia']),1,1);
	$pdf->Cell(55,6,utf8_decode('CARNET DE LA PATRIA: '),1,0);
	

	if($representantes->contar_representados() < 2) {
	    $tiene_mas_hijos = "No";
	}
	else {
	    $tiene_mas_hijos = "Si";
	}

	$pdf->Cell(55,6,utf8_decode('CÓDIGO: ' . $datos_representante['codigo_carnet']),1,0);
	$pdf->Cell(0,6,utf8_decode('SERIAL: ' . $datos_representante['serial_carnet']),1,1);
	$pdf->Cell(100.9,6,utf8_decode('TIENE MÁS HIJOS ESTUDIANDO DENTRO DEL PLANTEL: ' . $tiene_mas_hijos),1,0);
	$pdf->Cell(19,6,utf8_decode('1ERO: '),1,0);
	$pdf->Cell(19,6,utf8_decode('2DO: '),1,0);
	$pdf->Cell(19,6,utf8_decode('3ERO: '),1,0);
	$pdf->Cell(19,6,utf8_decode('4TO: '),1,0);
	$pdf->Cell(19,6,utf8_decode('5TO: '),1,1);

	$inicio_p_acad = $per_academico->get_inicio();
	$fin_p_acad = $per_academico->get_fin();
	
	$pdf->AddPage();

	$pdf->SetFont('Arial','',14);
	$pdf->Cell(0,6,utf8_decode('INFORMACIÓN ADICIONAL'),1,1,'C',1);
	$pdf->SetFont('Arial','',9);


	$pdf->Cell(0,6,utf8_decode('ESTÁ DISPUESTO A PARTICIPAR EN EL CONSEJO EDUCATIVO DEL AÑO ' . $inicio_p_acad . '-' . $fin_p_acad . '                          SI______ NO_______'),1,1);
	$pdf->Cell(0,6,utf8_decode('ESTÁ DISPUESTO A PARTICIPAR EN EL MOVIMIENTO BOLIVARIANO DE FAMILIA                               SI______ NO_______'),1,1);

	$pdf->Cell(0,6,utf8_decode('SE COMPROMETE A PARTICIPAR EN TODAS LAS CONVOCATORIAS DEL PLANTEL                            SI______ NO_______'),1,1);
	$pdf->MultiCell(0,5.1,utf8_decode("ASISTIÓ AL TALLER DICTADO POR LA INSTITUCIÓN EN RELACIÓN A LAS NORMAS \nDE CONVIVENCIA, DERECHOS Y DEBERES DE PADRES, REPRESENTANTES Y ESTUDIANTES         SI______ NO_______"),1,1);
	$pdf->MultiCell(0,10.6,utf8_decode("RESPONSABLE DE LA INSCRIPCIÓN: (solo para personal de la institución)__________________________________\nFIRMA DEL REPRESENTANTE: _____________________________________\nFIRMA DEL ESTUDIANTE: _____________________________________\nFIRMA DEL RESPONSABLE DE LA INSTITUCIÓN: _____________________________________\n"),1,1);

	$pdf->SetFont('Arial','',14);
	$pdf->Ln(6);
	$pdf->Cell(0,6,utf8_decode('OBSERVACIONES'),1,1,'C',1);
	$pdf->SetFont('Arial','',9);
	$pdf->Multicell(0,6,utf8_decode("REALICE UNA DESCRIPCIÓN GENERAL DE SU REPRESENTADO, MENCIONANDO CARACTERÍSTICAS EN EL ASPECTO SOCIAL, FÍSICO, PERSONAL, FAMILIAR Y ACADÉMICO QUE A USTED LE GUSTARIA DAR A  CONOCER A LOS DOCENTES DE LA INSTITUCIÓN."),1,0);

	$pdf->MultiCell(0,6,utf8_decode("SOCIAL: \n" . $datos_estudiante['social']),1,1);
	$pdf->MultiCell(0,6,utf8_decode("FÍSICO: \n" . $datos_estudiante['fisico']),1,1);
	$pdf->MultiCell(0,6,utf8_decode("PERSONAL: \n" . $datos_estudiante['personal']),1,1);
	$pdf->MultiCell(0,6,utf8_decode("FAMILIAR: \n" . $datos_estudiante['familiar']),1,1);
	$pdf->MultiCell(0,6,utf8_decode("ACADÉMICO: \n" . $datos_estudiante['academico']),1,1);
	$pdf->MultiCell(0,6,utf8_decode("OTRA OBSERVACIÓN: \n" . $datos_estudiante['otra']),1,1);
	$pdf->SetFont('Arial','',14);
	$pdf->Cell(0,6,utf8_decode('REQUISITOS'),1,1,'C',1);
	$pdf->SetFont('Arial','',9);
	
	$pdf->MultiCell(0,6,utf8_decode("1.CÉDULA\n2.FICHA DE INSCRIPCIÓN\n3.CERTIFICADO DE PROMOCIÓN\n4.CERTIFICACIÓN DE CALIFICACIONES\n5.FOTOS\n6.PERMISO CEDNA\n6.INFORME MÉDICO"),1,0);

	$nombre_archivo = "Planilla de inscripcion ".$datos_estudiante['cedula'].".pdf";

  $pdf->Output('D', $nombre_archivo);

?>

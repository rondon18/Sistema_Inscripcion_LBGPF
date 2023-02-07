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
    $pdf->SetMargins(10,5,10);
    $pdf->AddPage();
    $pdf->Image('../img/logo.jpg',30,2,150,10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Ln(10);
    $pdf->Cell(0,6,utf8_decode('COMPROMISO DEL REPRESENTANTE'),0,1,'C');
    $pdf->Ln(15);
    $pdf->SetFont('Arial','',9);

    $pdf->MultiCell(0,5.5,utf8_decode('Yo, ' . $datos_representante['p_nombre'] . ' ' . $datos_representante['p_apellido'] . ' ' . 'C.I: ' . $datos_representante['cedula'] . ' como representante del estudiante ' . $datos_estudiante['p_nombre'] . ' ' . $datos_estudiante['s_nombre'] . ' ' . $datos_estudiante['p_apellido'] . ' ' . $datos_estudiante['s_apellido'] . ' del año: ' . $datos_estudiante['grado_a_cursar'] .' sección:_____, me comprometo a cumplir con lo siguiente:'),0,1);
    $pdf->Ln(3);

    $pdf->SetFont('Arial','',8,5);

    $pdf->SetX(12);
    $pdf->MultiCell(0,5.2,utf8_decode("a)  Hacer cumplir a mi representado con todas las exigencias establecidas en la Ley y por la institución, para cumplir con los objetivos académicos y aprobar su año escolar.\nb) Diariamente me comprometo a que mi representado realice todas las actividades asignadas por sus docentes, mediante las diversas herramientas establecida (cuadernos, classroom, correos y otros mecanismos utilizados en pro del aprendizaje de los estudiantes y su desarrollo holístico, acordados previamente por los docentes).\nc) Apoyar y hacer cumplir a mi representado con las asignaciones escolares en las fechas establecidas. En caso de incumplimiento estaría violando los derechos fundamentales de mi representado establecidos en la LOPNNA. De presentarse un hecho, caso fortuito o de fuerza mayor deberá ser notificado a la coordinación de año correspondiente en un lapso de 24 horas y presentar los soportes de acuerdo al caso.\nd) Cumplir con lo establecido en los artículos 3,5,8,54 de la LOPNNA, es decir, asistir a la institución para informarme en relación al rendimiento escolar y evolución académica de mi representado.\ne) Cumplir y hacer cumplir a mi representado con las normas de bioseguridad establecidas por la institución (uso de tapabocas, mascarilla o protector facial, alcohol, distanciamiento, evitar el contacto físico con los compañeros, cada estudiante debe portar su envase con agua para uso personal, tener un jabón de uso personal para el lavado de las manos, asistir ya desayunados, en caso de presentar algún síntoma relacionado con el Covid-19, notificar al coordinador y presentar constancia médica, en los lapsos pertinentes).\nf) Aportar voluntariamente con los rubros necesarios para apoyar el Programa de Alimentación escolar.\ng) De acuerdo a lo establecido en el Manual de Convivencia me comprometo a velar por la conservación preservación y mantenimiento de las aulas de clase de la institución educativa, así como colaborar de manera voluntaria en las jornadas que sean asignadas para tal fin.\nh) Retirar oportunamente los boletines de calificaciones en cada momento escolar, así como tomar las medidas correctivas necesarias en los casos que así lo ameriten en relación al rendimiento del estudiante.\ni) Velar porque mi representado tenga un comportamiento adecuado al portar el uniforme al salir de la institución.\nj) Reparar en su totalidad los daños ocasionados por mi representando en algún bien o inmueble de la institución.\nk) Facilitar datos fidedignos en el momento de la inscripción."),0,1);
    
    $pdf->Ln(3);

    $pdf->SetFont('Arial','',8.5);

    $pdf->Cell(0,5.5,utf8_decode("Otro compromiso:"),0,1);

    $pdf->MultiCell(0,5.5,utf8_decode('__________________________________________________________________________________________________________________________________________________________________________________________________________________________'));
    
    $pdf->Ln(3);
    
    $pdf->MultiCell(0,5.5,utf8_decode('De igual manera, doy constancia que he sido informado (a) de mis obligaciones como representante como lo establece la LOPNNA en el art 54 el cual dice: "Los padres, representantes o responsables tienen la obligación inmediata de garantizar la educación de los niños y adolescentes. En consecuencia, debe inscribirlos oportunamente en una escuela, plantel o instituto de educación, de conformidad con la ley, así como exigirles su asistencia regular a clases y participar activamente en su proceso educativo".'),0,1);
    $pdf->MultiCell(0,14,utf8_decode('En atención a lo antes expuesto y en señal de conformidad firman,'));

    // $pdf->MultiCell(0,6,utf8_decode("____________               _______________                 ______________                    ______________\nRepresentante                   Coordinadora                     Docente orientador                      Orientador(a)"),0,1);

    $pdf->Ln(2);


    $pdf->Cell(10,6,"",0,0);
    $pdf->Cell(35,6,utf8_decode(''),'B',0);
    $pdf->Cell(10,6,"",0,0);
    $pdf->Cell(35,6,utf8_decode(''),'B',0);
    $pdf->Cell(10,6,"",0,0);
    $pdf->Cell(35,6,utf8_decode(''),'B',0);
    $pdf->Cell(10,6,"",0,0);
    $pdf->Cell(35,6,utf8_decode(''),'B',1);

    $pdf->Cell(0,6,utf8_decode('                     Representante                              Coordinadora                            Docente orientador                            Orientador(a)'),0,1);

    $pdf->Ln(3);

    $fecha_actual = date("d-m-Y");

    date_default_timezone_set("America/Caracas");
    setlocale(LC_ALL, 'es_VE.UTF-8','esp');
    /* Convertimos la fecha a marca de tiempo */
    $marca = strtotime($fecha_actual);


    $fecha_expedicion = ucfirst(utf8_encode(strftime('%A'))).strftime('%e de %B de %Y', $marca);

    $pdf->Cell(0,6,utf8_decode('Fecha del compromiso: ' . $fecha_expedicion),0,1);
    $pdf->Cell(0,6,utf8_decode('Coordinación de ' . $datos_estudiante['grado_a_cursar'] . ''),0,1,'C');
    $pdf->Cell(0,6,utf8_decode('LCDA.'),0,1,'C');

    $nombre_archivo = "Acta de compromiso ".$datos_representante['cedula'].".pdf";

    $pdf->Output('D', $nombre_archivo);

?>
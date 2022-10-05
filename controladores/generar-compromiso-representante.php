<?php

session_start();

if (!$_SESSION['login']) {
    header('Location: ../index.php');
    exit();
}

require('../fpdf/fpdf.php');

require('../clases/personas.php');
require('../clases/estudiante.php');
require('../clases/representantes.php');
require('../clases/grado.php');

require('../controladores/conexion.php');

require('../clases/bitácora.php');

$conexion = conectarBD();

$Estudiante = new Estudiantes();
$Representante = new Representantes();
$Grado = new GradoAcadémico();

$estudiante = $Estudiante->consultarEstudiante($_POST['Cédula_Estudiante']);
$grado = $Grado->consultarGrado($_POST['id_Estudiante']);
$datos_representante = $Representante->consultarRepresentanteID($_POST['id_representante']);

$fecha_actual = date("d-m-Y");

if ($grado['Grado_A_Cursar'] == "Primer año") {
    $grado = "1";
} elseif ($grado['Grado_A_Cursar'] == "Segundo año") {
    $grado = "2";
} elseif ($grado['Grado_A_Cursar'] == "Tercer año") {
    $grado = "3";
} elseif ($grado['Grado_A_Cursar'] == "Cuarto año") {
    $grado = "4";
} elseif ($grado['Grado_A_Cursar'] == "Quinto año") {
    $grado = "5";
} else {
    $grado['Grado_A_Cursar'] = "Año no especificado";
}


class PDF extends FPDF
{

}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->SetMargins(10,5,10);
$pdf->AddPage();
$pdf->Image('../img/logo.jpg',30,2,150,10);
$pdf->SetFont('Arial','B',12);
$pdf->Ln(6);
$pdf->Cell(0,6,utf8_decode('COMPROMISO DEL REPRESENTANTE'),0,1,'C');
$pdf->SetFont('Arial','',11);

$pdf->MultiCell(0,5.5,utf8_decode('Yo, ' . $datos_representante['Primer_Nombre'] . ' ' . $datos_representante['Primer_Apellido'] . ' ' . 'C.I: ' . $datos_representante['Cédula'] . ' como representante del estudiante ' . $estudiante['Primer_Nombre'] . ' ' . $estudiante['Segundo_Nombre'] . ' ' . $estudiante['Primer_Apellido'] . ' ' . $estudiante['Segundo_Apellido'] . ' del año: ' . $grado .'° sección:_____, me comprometo a cumplir con lo siguiente:'),0,1);
$pdf->SetFont('Arial','',10);
$pdf->SetX(15);
$pdf->MultiCell(0,5.5,utf8_decode("a)  Hacer cumplir a mi representado con todas las exigencias establecidas en la Ley y por la institución, para cumplir con los objetivos académicos y aprobar su año escolar.\nb) Diariamente me comprometo a que mi representado realice todas las actividades asignadas por sus docentes, mediante las diversas herramientas establecida (cuadernos, classroom, correos y otros mecanismos utilizados en pro del aprendizaje de los estudiantes y su desarrollo holístico, acordados previamente por los docentes).\nc) Apoyar y hacer cumplir a mi representado con las asignaciones escolares en las fechas establecidas. En caso de incumplimiento estaría violando los derechos fundamentales de mi representado establecidos en la LOPNNA. De presentarse un hecho, caso fortuito o de fuerza mayor deberá ser notificado a la coordinación de año correspondiente en un lapso de 24 horas y presentar los soportes de acuerdo al caso.\nd) Cumplir con lo establecido en los artículos 3,5,8,54 de la LOPNNA, es decir, asistir a la institución para informarme en relación al rendimiento escolar y evolución académica de mi representado.\ne) Cumplir y hacer cumplir a mi representado con las normas de bioseguridad establecidas por la institución (uso de tapabocas, mascarilla o protector facial, alcohol, distanciamiento, evitar el contacto físico con los compañeros, cada estudiante debe portar su envase con agua para uso personal, tener un jabón de uso personal para el lavado de las manos, asistir ya desayunados, en caso de presentar algún síntoma relacionado con el Covid-19, notificar al coordinador y presentar constancia médica, en los lapsos pertinentes).\nf) Aportar voluntariamente con los rubros necesarios para apoyar el Programa de Alimentación escolar.\ng) De acuerdo a lo establecido en el Manual de Convivencia me comprometo a velar por la conservación preservación y mantenimiento de las aulas de clase de la institución educativa, así como colaborar de manera voluntaria en las jornadas que sean asignadas para tal fin.\nh) Retirar oportunamente los boletines de calificaciones en cada momento escolar, así como tomar las medidas correctivas necesarias en los casos que así lo ameriten en relación al rendimiento del estudiante.\ni) Velar porque mi representado tenga un comportamiento adecuado al portar el uniforme al salir de la institución.\nj) Reparar en su totalidad los daños ocasionados por mi representando en algún bien o inmueble de la institución.\nk) Facilitar datos fidedignos en el momento de la inscripción."),0,1);
$pdf->MultiCell(0,5.5,utf8_decode('Otro compromiso:
____________________________________________________________________________________________________________________________________________________________________________________________________
De igual manera, doy constancia que he sido informado (a) de mis obligaciones como representante como lo establece la LOPNNA en el art 54 el cual dice: "Los padres, representantes o responsables tienen la obligación inmediata de garantizar la educación de los niños y adolescentes. En consecuencia, debe inscribirlos oportunamente en una escuela, plantel o instituto de educación, de conformidad con la ley, así como exigirles su asistencia regular a clases y participar activamente en su proceso educativo".'),0,1);
$pdf->MultiCell(0,14,utf8_decode('En atención a lo antes expuesto y en señal de conformidad firman,'));
$pdf->MultiCell(0,6,utf8_decode("____________               _______________                 ______________                    ______________\nRepresentante                   Coordinadora                     Docente orientador                      Orientador(a)"),0,1);
$pdf->Cell(0,6,utf8_decode('Fecha del compromiso: ' . $fecha_actual),0,1);
$pdf->Cell(0,6,utf8_decode('COORDINACIÓN DE  ' . $grado . '° AÑO'),0,1,'C');
$pdf->Cell(0,6,utf8_decode('LCDA.'),0,1,'C');

$pdf->Output();

desconectarBD($conexion);

?>
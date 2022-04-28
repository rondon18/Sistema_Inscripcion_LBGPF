<?php

session_start();

if (!$_SESSION['login']) {
    header('Location: ../index.php');
    exit();
}

require('../fpdf/fpdf.php');

require('../clases/Estudiante.php');
require('../clases/representantes.php');
require('../clases/padres.php');
require('../clases/ficha-medica.php');
require('../clases/sociales-Estudiantes.php');
require('../clases/tallas-Estudiantes.php');
require('../clases/grado.php');
require('../clases/año-escolar.php');
require('../clases/Estudiantes-repitentes.php');

require('../controladores/conexion.php');

require('../clases/bitacora.php');

$conexion = conectarBD();

$Estudiante = new Estudiantes();
$Representante = new Representantes();
$Padre = new Padres();
$Estudiantes_repitente = new EstudiantesRepitentes();
$Grado = new GradoAcademico();
$Año = new Año_Escolar();

$datos_salud = new FichaMedica();
$Datos_sociales = new DatosSociales();
$Datos_Tallas = new TallasEstudiante();

$Estudiante = $Estudiante->consultarEstudiante($_POST['id_estudiante']);
$Estudiantes_repitente = $Estudiantes_repitente->consultarEstudiantesRepitentes($_POST['id_estudiante']);
$grado = $Grado->consultarGrado($_POST['id_estudiante']);

$datos_salud = $datos_salud->consultarFicha_Medica($_POST['id_estudiante']);
$datos_sociales = $Datos_sociales->consultarDatosSociales($_POST['id_estudiante']);
$datos_tallas = $Datos_Tallas->consultarTallasEstudiante($_POST['id_estudiante']);

$representante = $Representante->mostrarRepresentantes($_POST['id_representante']);


$padre = $Padre->mostrarPadres();

class PDF extends FPDF
{

function Header()
{
    $this->SetFont('Arial','',18);
    $this->Image('../img/logo.jpg',30,5,150,20);
    $this->Ln(20);
    $this->Cell(0,6,utf8_decode('INSCRIPCIÓN AÑO ESCOLAR 20__ - 20__'),0,1,'C');
    parent::Header();
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',14);
$pdf->Cell(0,20,utf8_decode('PLANILLA DEL Estudiantes'),0,1,'C');
$pdf->Setfillcolor(54,88,113);
$pdf->SetDrawColor(25,25,12);
$pdf->Cell(0,6,utf8_decode('DATOS PERSONALES'),1,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(0,6,utf8_decode('NOMBRES Y APELLIDOS DEL Estudiantes: ' . $Estudiante['Primer_Nombre'] . ' ' . $Estudiante['Segundo_Nombre']),1,1);
$pdf->Cell(56,6,utf8_decode('CÉDULA DE IDENTIDAD: ' . $Estudiante['Cedula_Est']),1,0);
$pdf->Cell(20,6,utf8_decode('GÉNERO: ' . $Estudiante['Género']),1,0);
$pdf->Cell(58,6,utf8_decode('TELÉFONO PRINCIPAL: ' . $Estudiante['Teléfono_Principal']),1,0);
$pdf->Cell(0,6,utf8_decode('TELÉFONO AUXILIAR: ' . $Estudiante['Teléfono_Auxiliar']),1,1);
$pdf->Cell(57,6,utf8_decode('FECHA DE NACIMIENTO: ' .  $Estudiante['Fecha_Nacimiento']),1,0);
$pdf->SetFont('Arial','',7);
$pdf->Cell(60,6,utf8_decode('LUGAR DE NACIMIENTO: ' . $Estudiante['Lugar_Nacimiento']),1,0);
$pdf->Cell(0,6,utf8_decode('CORREO ELECTRÓNICO: ' . $Estudiante['Correo_Electronico']),1,1,);
$pdf->SetFont('Arial','',9);
$pdf->Cell(0,6,utf8_decode('PLANTEL DE PROCEDENCIA: ' . $Estudiante['Plantel_Procedencia']),1,1,);

$pdf->SetFont('Arial','',14);
$pdf->Cell(0,6,utf8_decode('DATOS SOCIALES'),1,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(0,6,utf8_decode('LUGAR DE DOMICILIO: ' . $Estudiante['Dirección']),1,1,);

$pdf->Cell(35,6,utf8_decode('POSEE CANAIMA: ' . $datos_sociales['Posee_Canaima']),1,0,);
$pdf->Cell(0,6,utf8_decode('CONDICIÓN CANAIMA: ' . $datos_sociales['Condicion_Canaima']),1,1,);
$pdf->Cell(55,6,utf8_decode('POSEE CARNET DE LA PATRIA: ' . $datos_sociales['Posee_Carnet_Patria']),1,0,);
$pdf->SetFont('Arial','',7);
$pdf->Cell(66,6,utf8_decode('CODIGO CARNET DE LA PATRIA: ' . $datos_sociales['Codigo_Carnet_Patria']),1,0,);
$pdf->Cell(0,6,utf8_decode('SERIAL CARNET DE LA PATRIA: ' . $datos_sociales['Serial_Carnet_Patria']),1,1,);
$pdf->SetFont('Arial','',9);
$pdf->Cell(0,6,utf8_decode('CUENTA CON ACCESO A INTERNET: ' . $datos_sociales['Acceso_Internet']),1,1,);

$pdf->SetFont('Arial','',14);
$pdf->Cell(0,6,utf8_decode('DATOS DE SALUD'),1,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(30,6,utf8_decode('ESTATURA: ' . $datos_salud['Estatura']),1,0,);
$pdf->Cell(25,6,utf8_decode('PESO: ' . $datos_salud['Peso']),1,0,);
$pdf->Cell(30,6,utf8_decode('ÍNDICE: ' . $datos_salud['Indice']),1,0,);
$pdf->Cell(53,6,utf8_decode('PERIMETRO BRAQUIAL: ' . $datos_salud['Circ_Braquial']),1,0,);
$pdf->Cell(0,6,utf8_decode('LATERALIDAD: ' . $datos_salud['Lateralidad']),1,1,);
$pdf->Cell(38,6,utf8_decode('TIPO DE SANGRE: ' . $datos_salud['Tipo_Sangre']),1,0,);
$pdf->Cell(65,6,utf8_decode('MEDICACIÓN: ' . $datos_salud['Medicación']),1,0,);
$pdf->Cell(0,6,utf8_decode('DIETA ESPECIAL: ' . $datos_salud['Dieta_Especial']),1,1,);
$pdf->Cell(115,6,utf8_decode('IMPEDIMIENTO FÍSICO: ' . $datos_salud['Impedimento_Físico'] ),1,0,);
$pdf->Cell(0,6,utf8_decode('ALERGIAS: ' . $datos_salud['Alergias']),1,1,);
$pdf->Cell(50,6,utf8_decode('CONDICIÓN VISTA: ' . $datos_salud['Cond_Vista']),1,0,);
$pdf->Cell(55,6,utf8_decode('CONDICIÓN DENTAL: ' . $datos_salud['Cond_Dental']),1,0,);
$pdf->Cell(0,6,utf8_decode('CARNET DISCAPACIDAD: ' . $datos_salud['Carnet_Discapacidad']),1,1,);
$pdf->Cell(0,6,utf8_decode('INSTITUCIÓN MÉDICA: ' . $datos_salud['Institucion_Medica']),1,1,);

$pdf->SetFont('Arial','',14);
$pdf->Cell(0,6,utf8_decode('TALLAS'),1,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(50,6,utf8_decode('TALLA CAMISA: ' . $datos_tallas['Talla_Camisa']),1,0,);
$pdf->Cell(50,6,utf8_decode('TALLA PANTALÓN: ' . $datos_tallas['Talla_Pantalón']),1,0,);
$pdf->Cell(0,6,utf8_decode('TALLA ZAPATOS: ' . $datos_tallas['Talla_Zapatos']),1,1,);


$pdf->AddPage();
$pdf->SetFont('Arial','',14);
$pdf->Cell(0,20,utf8_decode('PLANILLA DEL REPRESENTANTE'),0,1,'C');
$pdf->Cell(0,6,utf8_decode('DATOS DEL REPRESENTANTE'),1,1,'C');
$pdf->SetFont('Arial','',9);

$pdf->Cell(0,6,utf8_decode('NOMBRES Y APELLIDOS DEL REPRESENTANTE: ' . $representante['Nombres'] . ' ' . $representante['Apellidos']),1,1,);
$pdf->Cell(56,6,utf8_decode('CÉDULA DE IDENTIDAD: ' . $representante['Cédula']),1,0);
$pdf->Cell(20,6,utf8_decode('GÉNERO: ' . $representante['Género']),1,0);
$pdf->Cell(58,6,utf8_decode('TELÉFONO PRINCIPAL: ' . $representante['Teléfono_Principal']),1,0);
$pdf->Cell(0,6,utf8_decode('TELÉFONO AUXILIAR: ' . $representante['Teléfono_Auxiliar']),1,1);
$pdf->Cell(57,6,utf8_decode('FECHA DE NACIMIENTO: ' .  $representante['Fecha_Nacimiento']),1,0);
$pdf->SetFont('Arial','',7);
$pdf->Cell(60,6,utf8_decode('LUGAR DE NACIMIENTO: ' . $representante['Lugar_Nacimiento']),1,0);
$pdf->Cell(0,6,utf8_decode('CORREO ELECTRÓNICO: ' . $representante['Correo_Electronico']),1,1,);
$pdf->SetFont('Arial','',9);
$pdf->Cell(70,6,utf8_decode('ESTADO CIVIL: ' . $representante['Estado_Civil']),1,0,);
$pdf->Cell(0,6,utf8_decode('LUGAR DE DOMICILIO: ' . $representante['Dirección']),1,1,);

$pdf->SetFont('Arial','',14);
$pdf->Cell(0,6,utf8_decode('DATOS DEL PADRE O LA MADRE'),1,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(0,6,utf8_decode('NOMBRES Y APELLIDOS DEL PADRE/MADRE: ' . $padre['Nombres'] . ' ' . $padre['Apellidos']),1,1,);
$pdf->Cell(56,6,utf8_decode('CÉDULA DE IDENTIDAD: ' . $padre['Cédula']),1,0);
$pdf->Cell(20,6,utf8_decode('GÉNERO: ' . $padre['Género']),1,0);
$pdf->Cell(58,6,utf8_decode('TELÉFONO PRINCIPAL: ' . $padre['Teléfono_Principal']),1,0);
$pdf->Cell(0,6,utf8_decode('TELÉFONO AUXILIAR: ' . $padre['Teléfono_Auxiliar']),1,1);
$pdf->Cell(57,6,utf8_decode('FECHA DE NACIMIENTO: ' .  $padre['Fecha_Nacimiento']),1,0);
$pdf->SetFont('Arial','',7);
$pdf->Cell(60,6,utf8_decode('LUGAR DE NACIMIENTO: ' . $padre['Lugar_Nacimiento']),1,0);
$pdf->Cell(0,6,utf8_decode('CORREO ELECTRÓNICO: ' . $padre['Correo_Electronico']),1,1,);
$pdf->SetFont('Arial','',9);
$pdf->Cell(70,6,utf8_decode('ESTADO CIVIL: ' . $padre['Estado_Civil']),1,0,);
$pdf->Cell(0,6,utf8_decode('LUGAR DE DOMICILIO: ' . $padre['Dirección']),1,1,);
$pdf->Cell(0,6,utf8_decode('PARENTEZCO: ' . $padre['Parentezco']),1,1,);

$pdf->SetFont('Arial','',14);
$pdf->Cell(0,6,utf8_decode('DATOS ECONÓMICOS'),1,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(65,6,utf8_decode('BANCO: ' . $representante['Banco']),1,0,);
$pdf->Cell(55,6,utf8_decode('TIPO DE CUENTA: ' . $representante['Tipo_Cuenta']),1,0,);
$pdf->Cell(0,6,utf8_decode('CTA. BANCARIA: ' . $representante['Cta_Bancaria']),1,1,);
$pdf->Cell(70,6,utf8_decode('GRADO DE INSTRUCCIÓN: ' . $representante['Grado_Inst']),1,0,);
$pdf->Cell(50,6,utf8_decode('EMPLEO: ' . $representante['Empleo']),1,0,);
$pdf->Cell(0,6,utf8_decode('TELÉFONO TRABAJO: ' . $representante['Teléfono_Trabajo']),1,1,);
$pdf->Cell(85,6,utf8_decode('REMUNERACIÓN (APROXIMADA): ' . $representante['Remuneracion'] . 'Bs.'),1,0,);
$pdf->Cell(0,6,utf8_decode('TIPO DE REMUNERACIÓN: ' . $representante['Tipo_Remuneración']),1,1,);
$pdf->Cell(0,6,utf8_decode('LUGAR TRABAJO: ' . $representante['Lugar_Trabajo']),1,1,);

$pdf->Output();

desconectarBD($conexion);

?>
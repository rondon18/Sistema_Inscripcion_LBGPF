<?php

session_start();

if (!$_SESSION['login']) {
    header('Location: ../index.php');
    exit();
}

require('../fpdf/fpdf.php');

require('../clases/estudiante.php');
require('../clases/representantes.php');
require('../clases/economicos-representantes.php');
require('../clases/laborales-representantes.php');
require('../clases/padres.php');
require('../clases/ficha-medica.php');
require('../clases/sociales-estudiantes.php');
require('../clases/tallas-estudiantes.php');
require('../clases/grado.php');
require('../clases/año-escolar.php');
require('../clases/Estudiantes-repitentes.php');
require('../clases/telefonos.php');

require('../controladores/conexion.php');

require('../clases/bitacora.php');

$conexion = conectarBD();

$Estudiante = new Estudiantes();
$Representante = new Representantes();
$Economicos = new DatosEconomicos();
$Laborales = new DatosLaborales();
$Padre = new Padres();
$Estudiantes_repitente = new EstudiantesRepitentes();
$Grado = new GradoAcademico();
$Año = new Año_Escolar();
$Telefonos = new Telefonos();

$datos_Medicos = new FichaMedica();
$Datos_sociales = new DatosSociales();
$Datos_Tallas = new TallasEstudiante();

$Estudiante = $Estudiante->consultarEstudiante($_POST['cedula_Estudiante']);
$Estudiantes_repitente = $Estudiantes_repitente->consultarEstudiantesRepitentes($_POST['cedula_Estudiante']);
$Año_inicio = $Año->getInicio_Año_Escolar();
$Año_fin = $Año->getFin_Año_Escolar();
$grado = $Grado->consultarGrado($_POST['cedula_Estudiante']);
$telefonos_Est = $Telefonos->consultarTelefonos($_POST['cedula_Estudiante']);

$datos_medicos = $datos_Medicos->consultarFicha_Medica($_POST['id_Estudiante']);
$Datos_sociales = $Datos_sociales->consultarDatosSociales($_POST['id_Estudiante']);
$datos_tallas = $Datos_Tallas->consultarTallasEstudiante($_POST['id_Estudiante']);

$representante = $Representante->consultarRepresentanteID($_POST['id_representante'],);
$economicos = $Economicos->consultarDatosEconomicos($_POST['id_representante']);
$laborales = $Laborales->consultarDatosLaborales($_POST['id_representante']);


$padre = $Padre->consultarPadres($_POST['id_padre']);

class PDF extends FPDF
{

function Header()
{
    $this->SetFont('Arial','',18);
    $this->Image('../img/logo.jpg',30,5,150,20);
    $this->Ln(20);
    $this->Cell(0,6,utf8_decode('INSCRIPCIÓN AÑO ESCOLAR '."-"),0,1,'C');
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
$pdf->Cell(0,6,utf8_decode('NOMBRES Y APELLIDOS DEL Estudiantes: ' . $Estudiante['Primer_Nombre'] . ' ' . $Estudiante['Segundo_Nombre'] . ' ' . $Estudiante['Primer_Apellido'] . ' ' . $Estudiante['Segundo_Apellido']),1,1);
$pdf->Cell(56,6,utf8_decode('CÉDULA DE IDENTIDAD: ' . $Estudiante['Cédula']),1,0);
$pdf->Cell(20,6,utf8_decode('GÉNERO: ' . $Estudiante['Género']),1,0);
$pdf->Cell(58,6,utf8_decode('TELÉFONOS, MÓVIL Y CASA: ' . $telefonos_Est['Número_Telefónico']),1,0);
$pdf->Cell(57,6,utf8_decode('FECHA DE NACIMIENTO: ' .  $Estudiante['Fecha_Nacimiento']),1,0);
$pdf->SetFont('Arial','',7);
$pdf->Cell(60,6,utf8_decode('LUGAR DE NACIMIENTO: ' . $Estudiante['Lugar_Nacimiento']),1,0);
$pdf->Cell(0,6,utf8_decode('CORREO ELECTRÓNICO: ' . $Estudiante['Correo_Electrónico']),1,1,);
$pdf->SetFont('Arial','',9);
$pdf->Cell(0,6,utf8_decode('PLANTEL DE PROCEDENCIA: ' . $Estudiante['Plantel_Procedencia']),1,1,);

$pdf->SetFont('Arial','',14);
$pdf->Cell(0,6,utf8_decode('DATOS SOCIALES'),1,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(0,6,utf8_decode('LUGAR DE DOMICILIO: ' . $Estudiante['Dirección']),1,1,);

$pdf->Cell(35,6,utf8_decode('POSEE CANAIMA: ' . $Datos_sociales['Posee_Canaima']),1,0,);
$pdf->Cell(0,6,utf8_decode('CONDICIÓN CANAIMA: ' . $Datos_sociales['Condicion_Canaima']),1,1,);
$pdf->Cell(55,6,utf8_decode('POSEE CARNET DE LA PATRIA: ' . $Datos_sociales['Posee_Carnet_Patria']),1,0,);
$pdf->SetFont('Arial','',7);
$pdf->Cell(66,6,utf8_decode('CODIGO CARNET DE LA PATRIA: ' . $Datos_sociales['Codigo_Carnet_Patria']),1,0,);
$pdf->Cell(0,6,utf8_decode('SERIAL CARNET DE LA PATRIA: ' . $Datos_sociales['Serial_Carnet_Patria']),1,1,);
$pdf->SetFont('Arial','',9);
$pdf->Cell(0,6,utf8_decode('CUENTA CON ACCESO A INTERNET: ' . $Datos_sociales['Acceso_Internet']),1,1,);

$pdf->SetFont('Arial','',14);
$pdf->Cell(0,6,utf8_decode('DATOS DE SALUD'),1,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(30,6,utf8_decode('ESTATURA: ' . $datos_medicos['Estatura']),1,0,);
$pdf->Cell(25,6,utf8_decode('PESO: ' . $datos_medicos['Peso']),1,0,);
$pdf->Cell(30,6,utf8_decode('ÍNDICE: ' . $datos_medicos['Indice']),1,0,);
$pdf->Cell(53,6,utf8_decode('PERIMETRO BRAQUIAL: ' . $datos_medicos['Circ_Braquial']),1,0,);
$pdf->Cell(0,6,utf8_decode('LATERALIDAD: ' . $datos_medicos['Lateralidad']),1,1,);
$pdf->Cell(38,6,utf8_decode('TIPO DE SANGRE: ' . $datos_medicos['Tipo_Sangre']),1,0,);
$pdf->Cell(65,6,utf8_decode('MEDICACIÓN: ' . $datos_medicos['Medicación']),1,0,);
$pdf->Cell(0,6,utf8_decode('DIETA ESPECIAL: ' . $datos_medicos['Dieta_Especial']),1,1,);
$pdf->Cell(115,6,utf8_decode('IMPEDIMIENTO FÍSICO: ' . $datos_medicos['Impedimento_Físico'] ),1,0,);
$pdf->Cell(0,6,utf8_decode('ALERGIAS: ' . $datos_medicos['Alergias']),1,1,);
$pdf->Cell(50,6,utf8_decode('CONDICIÓN VISTA: ' . $datos_medicos['Cond_Vista']),1,0,);
$pdf->Cell(55,6,utf8_decode('CONDICIÓN DENTAL: ' . $datos_medicos['Cond_Dental']),1,0,);
$pdf->Cell(0,6,utf8_decode('CARNET DISCAPACIDAD: ' . $datos_medicos['Carnet_Discapacidad']),1,1,);
$pdf->Cell(0,6,utf8_decode('INSTITUCIÓN MÉDICA: ' . $datos_medicos['Institucion_Medica']),1,1,);

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

$pdf->Cell(0,6,utf8_decode('NOMBRES Y APELLIDOS DEL REPRESENTANTE: ' . $representante['Primer_Nombre'] . ' ' . $representante['Segundo_Nombre']),1,1,);
$pdf->Cell(56,6,utf8_decode('CÉDULA DE IDENTIDAD: ' . $representante['Cédula']),1,0);
$pdf->Cell(20,6,utf8_decode('GÉNERO: ' . $representante['Género']),1,0);
$pdf->Cell(58,6,utf8_decode('TELÉFONO PRINCIPAL: ' . $representante['Teléfono_Principal']),1,0);
$pdf->Cell(0,6,utf8_decode('TELÉFONO AUXILIAR: ' . $representante['Teléfono_Auxiliar']),1,1);
$pdf->Cell(57,6,utf8_decode('FECHA DE NACIMIENTO: ' .  $representante['Fecha_Nacimiento']),1,0);
$pdf->SetFont('Arial','',7);
$pdf->Cell(60,6,utf8_decode('LUGAR DE NACIMIENTO: ' . $representante['Lugar_Nacimiento']),1,0);
$pdf->Cell(0,6,utf8_decode('CORREO ELECTRÓNICO: ' . $representante['Correo_Electrónico']),1,1,);
$pdf->SetFont('Arial','',9);
$pdf->Cell(70,6,utf8_decode('ESTADO CIVIL: ' . $representante['Estado_Civil']),1,0,);
$pdf->Cell(0,6,utf8_decode('LUGAR DE DOMICILIO: ' . $representante['Dirección']),1,1,);

$pdf->SetFont('Arial','',14);
$pdf->Cell(0,6,utf8_decode('DATOS DEL PADRE O LA MADRE'),1,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(0,6,utf8_decode('NOMBRES Y APELLIDOS DEL PADRE/MADRE: ' . $padre['Primer_Nombre'] . ' ' . $padre['Segundo_Nombre']),1,1,);
$pdf->Cell(56,6,utf8_decode('CÉDULA DE IDENTIDAD: ' . $padre['Cédula']),1,0);
$pdf->Cell(20,6,utf8_decode('GÉNERO: ' . $padre['Género']),1,0);
$pdf->Cell(58,6,utf8_decode('TELÉFONO PRINCIPAL: ' . $padre['Teléfono_Principal']),1,0);
$pdf->Cell(0,6,utf8_decode('TELÉFONO AUXILIAR: ' . $padre['Teléfono_Auxiliar']),1,1);
$pdf->Cell(57,6,utf8_decode('FECHA DE NACIMIENTO: ' .  $padre['Fecha_Nacimiento']),1,0);
$pdf->SetFont('Arial','',7);
$pdf->Cell(60,6,utf8_decode('LUGAR DE NACIMIENTO: ' . $padre['Lugar_Nacimiento']),1,0);
$pdf->Cell(0,6,utf8_decode('CORREO ELECTRÓNICO: ' . $padre['Correo_Electrónico']),1,1,);
$pdf->SetFont('Arial','',9);
$pdf->Cell(70,6,utf8_decode('ESTADO CIVIL: ' . $padre['Estado_Civil']),1,0,);
$pdf->Cell(0,6,utf8_decode('LUGAR DE DOMICILIO: ' . $padre['Dirección']),1,1,);
$pdf->Cell(0,6,utf8_decode('PARENTEZCO: ' . $padre['Parentezco']),1,1,);

$pdf->SetFont('Arial','',14);
$pdf->Cell(0,6,utf8_decode('DATOS ECONÓMICOS'),1,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(65,6,utf8_decode('BANCO: ' . $economicos['Banco']),1,0,);
$pdf->Cell(55,6,utf8_decode('TIPO DE CUENTA: ' . $economicos['Tipo_Cuenta']),1,0,);
$pdf->Cell(0,6,utf8_decode('CTA. BANCARIA: ' . $economicos['Cta_Bancaria']),1,1,);
$pdf->Cell(70,6,utf8_decode('GRADO DE INSTRUCCIÓN: ' . $representante['Grado_Academico']),1,0,);
$pdf->Cell(50,6,utf8_decode('EMPLEO: ' . $laborales['Empleo']),1,0,);
$pdf->Cell(0,6,utf8_decode('TELÉFONO TRABAJO: ' . $economicos['Teléfono_Trabajo']),1,1,);
$pdf->Cell(85,6,utf8_decode('REMUNERACIÓN (APROXIMADA): ' . $laborales['Remuneración'] . 'Bs.'),1,0,);
$pdf->Cell(0,6,utf8_decode('TIPO DE REMUNERACIÓN: ' . $laborales['Tipo_Remuneración']),1,1,);
$pdf->Cell(0,6,utf8_decode('LUGAR TRABAJO: ' . $laborales['Lugar_Trabajo']),1,1,);

$pdf->Output();

desconectarBD($conexion);

?>

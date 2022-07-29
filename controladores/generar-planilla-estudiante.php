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
require('../clases/carnet-patria.php');
require('../clases/económicos-representantes.php');
require('../clases/laborales.php');
require('../clases/madre.php');
require('../clases/padre.php');
require('../clases/ficha-médica.php');
require('../clases/sociales-estudiantes.php');
require('../clases/tallas-estudiantes.php');
require('../clases/grado.php');
require('../clases/vivienda.php');
require('../clases/contactos-auxiliares.php');
require('../clases/año-escolar.php');
require('../clases/Estudiantes-repitentes.php');
require('../clases/Teléfonos.php');
require('../clases/observaciones-estudiantes.php');

require('../controladores/conexion.php');

require('../clases/bitácora.php');

$conexion = conectarBD();

$Estudiante = new Estudiantes();
$CarnetPatria = new CarnetPatria();
$Representante = new Representantes();
$económicos = new Datoseconómicos();
$Laborales = new DatosLaborales();
$Padre = new Padre();
$Madre = new Madre();
$Estudiantes_repitente = new EstudiantesRepitentes();
$Grado = new GradoAcadémico();
$Año = new Año_Escolar();
$Teléfonos = new Teléfonos();
$Observaciones = new Observaciones();

$datos_Médicos = new Fichamédica();
$Datos_sociales = new DatosSociales();
$Datos_Tallas = new TallasEstudiante();
$Datos_vivienda = new DatosVivienda();
$Datos_Auxiliar = new ContactoAuxiliar();

#Hacer algo parecido para llamar numeros de representantes y Padre
$Estudiante = $Estudiante->consultarEstudiante($_POST['Cédula_Estudiante']);
$carnetpatria_Est = $CarnetPatria->consultarCarnetPatria($_POST['Cédula_Estudiante']);

$estudiantes_repitente = $Estudiantes_repitente->consultarEstudiantesRepitentes($_POST['id_Estudiante']);
$grado = $Grado->consultarGrado($_POST['id_Estudiante']);
$Teléfonos_Est = $Teléfonos->consultarTeléfonos($_POST['Cédula_Estudiante']);
$Teléfonos_re = $Teléfonos->consultarTeléfonosRepresentanteID($_POST['id_representante']);
$Teléfonos_pa = $Teléfonos->consultarTeléfonosPadreID($_POST['id_padre']);
$Teléfonos_ma = $Teléfonos->consultarTeléfonosMadreID($_POST['id_madre']);

$datos_Médicos = $datos_Médicos->consultarFicha_médica($_POST['id_Estudiante']);
$datos_sociales = $Datos_sociales->consultarDatosSociales($_POST['id_Estudiante']);
$observaciones_Est = $Observaciones->consultarObservaciones($_POST['id_Estudiante']);
$datos_tallas = $Datos_Tallas->consultarTallasEstudiante($_POST['id_Estudiante']);
$datos_vivienda = $Datos_vivienda->consultarDatosvivienda_R($_POST['id_representante']);

$datos_representante = $Representante->consultarRepresentanteID($_POST['id_representante']);

$datos_auxiliar = $Datos_Auxiliar->consultarContactoAuxiliar($_POST['id_representante']);
$contacto_aux = new Personas();
$Teléfonos_aux = $Teléfonos->consultarTeléfonos($datos_auxiliar['Cédula_Persona']);
$dat_contacto_aux = $contacto_aux->consultarPersona($datos_auxiliar['Cédula_Persona']);

$carnetpatria_re = $CarnetPatria->consultarCarnetPatria($datos_representante['Cédula']);
$datos_económicos = $económicos->consultarDatoseconómicos($_POST['id_representante']);
$datos_laborales = $Laborales->consultarDatosLaborales($_POST['id_representante']);


$padre = $Padre->consultarPadre($_POST['id_padre']);
$madre = $Madre->consultarMadre($_POST['id_madre']);
$hijos = $Representante->numeroRepresentados($_POST['id_representante']);

$fecha_actual = date("Y-m-d");
$fecha_nacimiento_est = $Estudiante['Fecha_Nacimiento'];
$fecha_nacimiento_re = $datos_representante['Fecha_Nacimiento'];
$fecha_nacimiento_pa = $padre['Fecha_Nacimiento'];
$fecha_nacimiento_ma = $madre['Fecha_Nacimiento'];
$edad_diff_est = date_diff(date_create($fecha_nacimiento_est), date_create($fecha_actual));
$edad_diff_re = date_diff(date_create($fecha_nacimiento_re), date_create($fecha_actual));
$edad_diff_pa = date_diff(date_create($fecha_nacimiento_pa), date_create($fecha_actual));
$edad_diff_ma = date_diff(date_create($fecha_nacimiento_ma), date_create($fecha_actual));

#Para rellenar el campo de si tiene carnet de la patria
$carnet_Est = "";
if (empty($carnetpatria_Est['Código_Carnet']) AND empty($carnetpatria_Est['Serial_Carnet'])) {
  $carnet_Est = "No";
}
else {
  $carnet_Est = "Si";
}

if (empty($carnetpatria_re['Código_Carnet']) AND empty($carnetpatria_re['Serial_Carnet'])) {
  $carnet_re = "No";
}
else {
  $carnet_re = "Si";
}

if (empty($datos_Médicos['Institución_médica'])) {
    $Institución = "No";
}
else {
    $Institución = "Si";
}

if (empty($datos_Médicos['Carnet_Discapacidad'])) {
    $carnet_dis = "No";
}
else {
    $carnet_dis = "Si";
}

if (empty($datos_laborales['Empleo']) || $datos_laborales['Empleo']=="Desempleado") {
    $tiene_empleo = "No";
}
else {
    $tiene_empleo = "Si";
}

if ($padre['País_Residencia'] == "Venezuela") {
    $SeEncuentraEnElPais = "Si";
}
else {
    $SeEncuentraEnElPais = "No";
}

if ($madre['País_Residencia'] == "Venezuela") {
    $SeEncuentraEnElPais_ma = "Si";
}
else {
    $SeEncuentraEnElPais_ma = "No";
}

$Año_actual = date("Y");
$Inicio_Año_Escolar = $Año_actual;
$Fin_Año_Escolar = $Año_actual+1;

function Teléfono($prefijo,$numero) {
  if (empty($prefijo) and empty($numero)) {
    $Teléfono = "";
  }
  else {
    $Teléfono = "$prefijo-$numero";
  }
  return $Teléfono;
}



class PDF extends FPDF
{

}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',18);
$pdf->Image('../img/logo.jpg',30,5,150,20);
$pdf->Ln(15);
$pdf->Cell(0,6,utf8_decode('INSCRIPCIÓN AÑO ESCOLAR ' . $Inicio_Año_Escolar . '-' . $Fin_Año_Escolar),0,1,'C');
$pdf->SetFont('Arial','',14);

#PARTE DEL ESTUDIANTE

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
$pdf->Cell(0,6,utf8_decode('DATOS PERSONALES'),1,1,'C',1);
$pdf->SetFont('Arial','',9);
$pdf->Cell(0,6,utf8_decode('NOMBRES Y APELLIDOS DEL Estudiantes: ' . $Estudiante['Primer_Nombre'] . ' ' . $Estudiante['Segundo_Nombre'] . ' ' . $Estudiante['Primer_Apellido'] . ' ' . $Estudiante['Segundo_Apellido']),1,1);
$pdf->Cell(56,6,utf8_decode('CÉDULA DE IDENTIDAD: ' . $Estudiante['Cédula']),1,0);
$pdf->Cell(26,6,utf8_decode('EDAD: ' . $edad_diff_est->format('%y')." Años"),1,0);
#                                                         OJO: LA CANTIDAD DEL ARREGLO VARIA

$pdf->Cell(0,6,utf8_decode('TELÉFONOS, MÓVIL Y CASA: ' . Teléfono($Teléfonos_Est[0]['Prefijo'],$Teléfonos_Est[0]['Número_Telefónico']) ." / ". Teléfono($Teléfonos_Est[0]['Prefijo'],$Teléfonos_Est[0]['Número_Telefónico'])),1,1);
$pdf->Cell(57,6,utf8_decode('FECHA DE NACIMIENTO: ' .  $Estudiante['Fecha_Nacimiento']),1,0);
$pdf->SetFont('Arial','',7);
$pdf->Cell(0,6,utf8_decode('LUGAR DE NACIMIENTO: ' . $Estudiante['Lugar_Nacimiento']),1,1);
$pdf->Cell(0,6,utf8_decode('CORREO ELECTRÓNICO: ' . $Estudiante['Correo_Electrónico']),1,1);
if (empty($estudiantes_repitente['Que_Materias_Repite'])) {
    $mat_repitente = "No";
}
else {
   $mat_repitente = "Si";
}
if (empty($estudiantes_repitente['Que_Materias_Repite'])) {
    $mat_pendientes = "No";
}
else {
   $mat_pendientes = "Si";
}


$pdf->Cell(17,6,utf8_decode('REPITE: '. $mat_repitente),1,0);
$pdf->Cell(140,6,utf8_decode('CUÁLES MATERIAS: ' . $estudiantes_repitente['Que_Materias_Repite']),1,0);
$pdf->Cell(0,6,utf8_decode('QUÉ AÑO REPITE: ' . $estudiantes_repitente['Año_Repetido']),1,1);
$pdf->Cell(37,6,utf8_decode('MATERIAS PENDIENTES: ' . $mat_pendientes),1,0);
$pdf->Cell(0,6,utf8_decode('CUÁLES MATERIAS PENDIENTES: ' . $estudiantes_repitente['Materias_Pendientes']),1,1);
$pdf->SetFont('Arial','',9);
$pdf->Cell(0,6,utf8_decode('PLANTEL DE PROCEDENCIA: ' . $Estudiante['Plantel_Procedencia']),1,1);
$pdf->Ln(6);

$pdf->SetFont('Arial','',14);
$pdf->Cell(0,6,utf8_decode('DATOS SOCIALES'),1,1,'C',1);
$pdf->SetFont('Arial','',9);
$pdf->Cell(0,6,utf8_decode('LUGAR DE DOMICILIO: ' . $Estudiante['Dirección']),1,1);
$pdf->Cell(65,6,utf8_decode('CON QUIÉN VIVE: ' . $Estudiante['Con_Quién_Vive']),1,0);
$pdf->Cell(35,6,utf8_decode('TIENE CANAIMA: ' . $datos_sociales['Posee_Canaima']),1,0);
$pdf->Cell(0,6,utf8_decode('CONDICIÓN DE LA CANAIMA: ' . $datos_sociales['Condición_Canaima']),1,1);
$pdf->Cell(55,6,utf8_decode('POSEE CARNET DE LA PATRIA: ' . $carnet_Est),1,0);
$pdf->SetFont('Arial','',7);
$pdf->Cell(66,6,utf8_decode('Código CARNET DE LA PATRIA: ' . $carnetpatria_Est['Código_Carnet']),1,0);
$pdf->Cell(0,6,utf8_decode('SERIAL CARNET DE LA PATRIA: ' . $carnetpatria_Est['Serial_Carnet']),1,1);
$pdf->SetFont('Arial','',9);
$pdf->Cell(0,6,utf8_decode('CUENTA CON ACCESO A INTERNET: ' . $datos_sociales['Acceso_Internet']),1,1);
$pdf->Ln(6);

$pdf->SetFont('Arial','',14);
$pdf->Cell(0,6,utf8_decode('DATOS DE SALUD'),1,1,'C',1);
$pdf->SetFont('Arial','',9);
$pdf->Cell(35,6,utf8_decode('ANTROPOMÉTRICOS'),1,0);
$pdf->Cell(22,6,utf8_decode('Índice: ' . $datos_Médicos['Índice']),1,0);
$pdf->Cell(22,6,utf8_decode('TALLA: ' . $datos_Médicos['Estatura']),1,0);
$pdf->Cell(20,6,utf8_decode('PESO: ' . $datos_Médicos['Peso']),1,0);
$pdf->Cell(24,6,utf8_decode('C.BRAZO: ' . $datos_Médicos['Circ_Braquial']),1,0);
$pdf->Cell(25,6,utf8_decode('PANTALÓN: ' . $datos_tallas['Talla_Pantalón']),1,0);
$pdf->Cell(21,6,utf8_decode('CAMISA: ' . $datos_tallas['Talla_Camisa']),1,0);
$pdf->Cell(0,6,utf8_decode('ZAPATO: ' . $datos_tallas['Talla_Zapatos']),1,1);
if (empty( $datos_Médicos['Enfermedad'])) {
    $PadeceEnfermedad = "No";
}
else {
    $PadeceEnfermedad = "Si";
}
$pdf->Cell(60,6,utf8_decode('PADECE ALGUNA ENFERMEDAD: ' . $PadeceEnfermedad),1,0);
$pdf->Cell(0,6,utf8_decode('ENFERMEDAD: ' . $datos_Médicos['Enfermedad']),1,1);
$pdf->Cell(38,6,utf8_decode('TIPO DE SANGRE: ' . $datos_Médicos['Tipo_Sangre']),1,0);
$pdf->Cell(0,6,utf8_decode('LATERALIDAD: ' . $datos_Médicos['Lateralidad']),1,1);
$pdf->Cell(68,6,utf8_decode('CONDICIÓN DE LA DENTADURA: ' . $datos_Médicos['Cond_Dental']),1,0);
$pdf->Cell(0,6,utf8_decode('CONDICIÓN OFTALMOLÓGICA: ' . $datos_Médicos['Cond_Vista']),1,1);
$pdf->Cell(0,6,utf8_decode('PRESENTA ALGUNA DE ESTAS CONDICIONES: ' . rtrim($datos_Médicos['Impedimento_Físico'],",") ),1,1);
$pdf->Cell(0,6,utf8_decode('PRESENTA ALGUNA DE ESTAS NECESIDADES EDUCATIVAS ESPECIALES: ' . $datos_Médicos['Necesidad_educativa']),1,1);
$pdf->Cell(70,6,utf8_decode('ES ATENDIDO POR OTRA INSTITUCIÓN: ' . $Institución ),1,0);
$pdf->Cell(0,6,utf8_decode('CUÁL INSTITUCIÓN: ' . $datos_Médicos['Institución_Médica']),1,1);
$pdf->Cell(65,6,utf8_decode('POSEE CARNET DE DISCAPACIDAD: ' . $carnet_dis ),1,0);
$pdf->Cell(0,6,utf8_decode('NÚMERO DE CARNET: ' . $datos_Médicos['Carnet_Discapacidad']),1,1);
$pdf->Cell(67,6,utf8_decode('FUE VACUNADO CONTRA EL COVID-19: ' . $datos_Médicos['Vacunado']),1,0);
$pdf->Cell(58,6,utf8_decode('CUÁL VACUNA: ' . $datos_Médicos['Vacuna']),1,0);
$pdf->Cell(33,6,utf8_decode('CUANTAS DOSIS: ' . $datos_Médicos['Dosis']),1,0);
$pdf->Cell(0,6,utf8_decode('LOTE: ' . $datos_Médicos['Lote']),1,1);


$pdf->AddPage();
$pdf->SetFont('Arial','',14);
$pdf->SetFillColor(226,239,217);
$pdf->Cell(0,10,utf8_decode('PLANILLA DEL REPRESENTANTE'),0,1,'C');

$pdf->Cell(0,6,utf8_decode('DATOS DEL PADRE'),1,1,'C',1);
$pdf->SetFont('Arial','',9);

#DATOS DEL PADRE

$pdf->Cell(0,6,utf8_decode('NOMBRES Y APELLIDOS: ' . $padre['Primer_Nombre'] . ' ' . $padre['Segundo_Nombre'] . ' ' . $padre['Primer_Apellido'] . ' ' . $padre['Segundo_Apellido']),1,1);
$pdf->Cell(56,6,utf8_decode('CÉDULA DE IDENTIDAD: ' . $padre['Cédula']),1,0);
$pdf->Cell(24,6,utf8_decode('EDAD: ' . $edad_diff_pa->format('%y')." Años"),1,0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(60,6,utf8_decode('TELÉFONOS: ' . $Teléfonos_pa[0]['Prefijo'] . '-' . $Teléfonos_pa[0]['Número_Telefónico'] . ' / ' . $Teléfonos_pa[1]['Prefijo'] . '-' . $Teléfonos_pa[1]['Número_Telefónico']),1,0);
$pdf->Cell(0,6,utf8_decode('FECHA DE NACIMIENTO: ' .  $padre['Fecha_Nacimiento']),1,1);
$pdf->SetFont('Arial','',7);
$pdf->Cell(90,6,utf8_decode('LUGAR DE NACIMIENTO: ' . $padre['Lugar_Nacimiento']),1,0);
$pdf->Cell(0,6,utf8_decode('CORREO ELECTRÓNICO: ' . $padre['Correo_Electrónico']),1,1);
$pdf->Cell(50,6,utf8_decode('ESTADO CIVIL: ' . $padre['Estado_Civil']),1,0);
$pdf->Cell(0,6,utf8_decode('DIRECCIÓN: ' . $padre['Dirección']),1,1);
$pdf->Cell(50,6,utf8_decode('SE ENCUENTRA EN EL PAÍS: ' . $SeEncuentraEnElPais),1,0);

if ($padre['País_Residencia'] == "Venezuela") {
    $pdf->Cell(0,6,utf8_decode('DÓNDE: '),1,1);
}
else {
    $pdf->Cell(0,6,utf8_decode('DÓNDE: ' . $padre['País_Residencia']),1,1);
}

$pdf->SetFont('Arial','',14);
$pdf->Cell(0,6,utf8_decode('DATOS DE LA MADRE'),1,1,'C',1);
$pdf->SetFont('Arial','',9);

#DATOS DE LA MADRE

$pdf->Cell(0,6,utf8_decode('NOMBRES Y APELLIDOS: ' . $madre['Primer_Nombre'] . ' ' . $madre['Segundo_Nombre'] . ' ' . $madre['Primer_Apellido'] . ' ' . $madre['Segundo_Apellido']),1,1);
$pdf->Cell(56,6,utf8_decode('CÉDULA DE IDENTIDAD: ' . $madre['Cédula']),1,0);
$pdf->Cell(24,6,utf8_decode('EDAD: ' . $edad_diff_ma->format('%y')." Años"),1,0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(60,6,utf8_decode('TELÉFONOS: ' . $Teléfonos_ma[0]['Prefijo'] . '-' . $Teléfonos_ma[0]['Número_Telefónico'] . ' / ' . $Teléfonos_ma[1]['Prefijo'] . '-' . $Teléfonos_ma[1]['Número_Telefónico']),1,0);
$pdf->Cell(0,6,utf8_decode('FECHA DE NACIMIENTO: ' .  $madre['Fecha_Nacimiento']),1,1);
$pdf->SetFont('Arial','',7);
$pdf->Cell(90,6,utf8_decode('LUGAR DE NACIMIENTO: ' . $madre['Lugar_Nacimiento']),1,0);
$pdf->Cell(0,6,utf8_decode('CORREO ELECTRÓNICO: ' . $madre['Correo_Electrónico']),1,1);
$pdf->Cell(50,6,utf8_decode('ESTADO CIVIL: ' . $madre['Estado_Civil']),1,0);
$pdf->Cell(0,6,utf8_decode('DIRECCIÓN: ' . $madre['Dirección']),1,1);
$pdf->Cell(50,6,utf8_decode('SE ENCUENTRA EN EL PAÍS: ' . $SeEncuentraEnElPais_ma),1,0);

if ($madre['País_Residencia'] == "Venezuela") {
    $pdf->Cell(0,6,utf8_decode('DÓNDE: '),1,1);
}
else {
    $pdf->Cell(0,6,utf8_decode('DÓNDE: ' . $madre['País_Residencia']),1,1);
}

$pdf->SetFont('Arial','',14);
$pdf->Cell(0,6,utf8_decode('DATOS DEL REPRESENTANTE'),1,1,'C',1);
$pdf->SetFont('Arial','',9);

#PARTE DEL REPRESENTANTE

$pdf->Cell(0,6,utf8_decode('NOMBRES Y APELLIDOS DEL REPRESENTANTE: ' . $datos_representante['Primer_Nombre'] . ' ' . $datos_representante['Segundo_Nombre']. ' ' . $datos_representante['Primer_Apellido'] . ' ' . $datos_representante['Segundo_Apellido']),1,1);
$pdf->Cell(90,6,utf8_decode('VÍNCULO CON EL ESTUDIANTE: ' . $Estudiante['Relación_Representante']),1,0);
$pdf->Cell(56,6,utf8_decode('CÉDULA DE IDENTIDAD: ' . $datos_representante['Cédula']),1,0);
$pdf->Cell(0,6,utf8_decode('EDAD: ' . $edad_diff_re->format('%y')),1,1);
#CAMBIAR VARIABLE PARA LOS REPRESENTANTES
$pdf->Cell(90,6,utf8_decode('TELÉFONOS: ' . Teléfono($Teléfonos_re[0]['Prefijo'],$Teléfonos_re[0]['Número_Telefónico']) . ' / ' . Teléfono($Teléfonos_re[1]['Prefijo'],$Teléfonos_re[1]['Número_Telefónico']) . ' / ' . Teléfono($Teléfonos_re[2]['Prefijo'],$Teléfonos_re[2]['Número_Telefónico'])),1,0);
$pdf->Cell(0,6,utf8_decode('FECHA DE NACIMIENTO: ' .  $datos_representante['Fecha_Nacimiento']),1,1);
$pdf->SetFont('Arial','',7);
$pdf->Cell(90,6,utf8_decode('LUGAR DE NACIMIENTO: ' . $datos_representante['Lugar_Nacimiento']),1,0);
$pdf->Cell(0,6,utf8_decode('CORREO ELECTRÓNICO: ' . $datos_representante['Correo_Electrónico']),1,1);
$pdf->SetFont('Arial','',9);
$pdf->Cell(50,6,utf8_decode('ESTADO CIVIL: ' . $datos_representante['Estado_Civil']),1,0);
$pdf->SetFont('Arial','',7);
$pdf->Cell(0,6,utf8_decode('DIRECCIÓN: ' . $datos_representante['Dirección']),1,1);
$pdf->Cell(50,6,utf8_decode('OTRO CONTACTO PARA EMERGENCIAS'),1,0,'C',1);
$pdf->Cell(38,6,utf8_decode('PARENTESCO: ' . $datos_auxiliar['Relación']),1,0);
$pdf->Cell(75,6,utf8_decode('NOMBRE: ' . $dat_contacto_aux['Primer_Nombre'].' '.$dat_contacto_aux['Primer_Apellido']),1,0);
$pdf->Cell(0,6,utf8_decode('TELÉFONO: ' . $Teléfonos_aux[0]['Prefijo'] . '-' . $Teléfonos_aux[0]['Número_Telefónico']),1,1);
$pdf->Cell(82,6,utf8_decode('BANCO: ' . $datos_económicos['Banco']),1,0);
$pdf->Cell(40,6,utf8_decode('TIPO DE CUENTA: ' . $datos_económicos['Tipo_Cuenta']),1,0);
$pdf->Cell(0,6,utf8_decode('NÚMERO DE CUENTA BANCARIA: ' . $datos_económicos['Cta_Bancaria']),1,1);

$pdf->SetFont('Arial','',14);
$pdf->Cell(0,6,utf8_decode('DATOS ECONÓMICOS'),1,1,'C',1);
$pdf->SetFont('Arial','',9);
$pdf->Cell(50,6,utf8_decode('TRABAJA: ' . $tiene_empleo),1,0);
$pdf->Cell(0,6,utf8_decode('EN QUÉ SE DESEMPEÑA: ' . $datos_laborales['Empleo']),1,1);


$pdf->Cell(58.5,6,utf8_decode('TELÉFONO TRABAJO: ' . Teléfono($Teléfonos_re[3]['Prefijo'],$Teléfonos_re[3]['Número_Telefónico'])),1,0);
$pdf->Cell(0,6,utf8_decode('LUGAR TRABAJO: ' . $datos_laborales['Lugar_Trabajo']),1,1);
$pdf->Cell(63,6,utf8_decode('GRADO DE INSTRUCCIÓN: ' . $datos_representante['Grado_Académico']),1,0);
#AJUSTAR Índice DEL Teléfono Y VARIABLE PARA EL REPRESENTANTE
$pdf->Cell(64,6,utf8_decode('REMUNERACIÓN (Sueldos mínimos): ' . $datos_laborales['Remuneración']),1,0);
$pdf->Cell(0,6,utf8_decode('TIPO DE REMUNERACIÓN: ' . $datos_laborales['Tipo_Remuneración']),1,1);
/*$pdf->Cell(0,6,utf8_decode('TIPO DE COLABORACIÓN QUE ESTA ENTREGANDO A LA INSTITUCIÓN (Dejar en blanco):'),'L,T,R',1,'C');
$pdf->SetFont('Arial','',8);
$pdf->Multicell(0,6,utf8_decode("DESINFECTANTE: SI____ LITRO NO_____ , CLORO: SI____ LITRO NO_____, CERA: SI____ LITRO NO_____, JABÓN SI____ LITRO NO____\nLAVAPLATOS: SI____ LITRO NO_____, DESENGRASANTE SI____ LITRO  NO_____, OTRO: ____________________________________\nARTÍCULOS DE OFICINA: LÁPIZ SI____ NO_____, LAPICERO SI____ NO_____, MARCADOR SI____ NO_____ OTRO__________________\nHOJAS BLANCAS: SI_______CANT APROX NO_____, HOJAS DE RECICLAJE: SI_______CANT APROX NO ______ \nDONARÁ UTENSILIOS PARA EL COMEDOR: CUCHARILLA: SI____  NO____ LO TRAERÁ DIARIO____, TENEDOR:  SI____  NO____ LO TRAERÁ DIARIO____"),'L,R,B',0);*/

$pdf->SetFont('Arial','',14);
$pdf->Cell(0,6,utf8_decode('DATOS SOCIALES'),1,1,'C',1);
$pdf->SetFont('Arial','',9);
$pdf->Cell(65,6,utf8_decode('CONDICIONES DE LA VIVIENDA: ' . $datos_vivienda['Condiciones_Vivienda']),1,0);
$pdf->Cell(65,6,utf8_decode('TIPO DE VIVIENDA: ' . $datos_vivienda['Tipo_Vivienda']),1,0);
$pdf->Cell(0,6,utf8_decode('TENENCIA DE LA VIVIENDA: ' . $datos_vivienda['Tenencia_Vivienda']),1,1);
$pdf->Cell(55,6,utf8_decode('POSEE CARNET DE LA PATRIA: ' . $carnet_re),1,0);
if ($hijos>1) {
    $TieneMasHijos = "Si";
}
else {
    $TieneMasHijos = "No";
}
$pdf->Cell(55,6,utf8_decode('CÓDIGO: ' . $carnetpatria_re['Código_Carnet']),1,0);
$pdf->Cell(0,6,utf8_decode('SERIAL: ' . $carnetpatria_re['Serial_Carnet']),1,1);
$pdf->Cell(100.9,6,utf8_decode('TIENE MÁS HIJOS ESTUDIANDO DENTRO DEL PLANTEL: ' . $TieneMasHijos),1,0);
$pdf->Cell(19,6,utf8_decode('1ERO: '),1,0);
$pdf->Cell(19,6,utf8_decode('2DO: '),1,0);
$pdf->Cell(19,6,utf8_decode('3ERO: '),1,0);
$pdf->Cell(19,6,utf8_decode('4TO: '),1,0);
$pdf->Cell(19,6,utf8_decode('5TO: '),1,1);
$pdf->Cell(0,6,utf8_decode('ESTÁ DISPUESTO A PARTICIPAR EN EL CONSEJO EDUCATIVO DEL AÑO ' . $Inicio_Año_Escolar . '-' . $Fin_Año_Escolar . '                          SI______ NO_______'),1,1);
$pdf->Cell(0,6,utf8_decode('ESTÁ DISPUESTO A PARTICIPAR EN EL MOVIMIENTO BOLIVARIANO DE FAMILIA                               SI______ NO_______'),1,1);

$pdf->Cell(0,6,utf8_decode('SE COMPROMETE A PARTICIPAR EN TODAS LAS CONVOCATORIAS DEL PLANTEL                            SI______ NO_______'),1,1);
$pdf->MultiCell(0,5.1,utf8_decode("ASISTIÓ AL TALLER DICTADO POR LA INSTITUCIÓN EN RELACIÓN A LAS NORMAS \nDE CONVIVENCIA, DERECHOS Y DEBERES DE PADRES, REPRESENTANTES Y ESTUDIANTES         SI______ NO_______"),1,1);
$pdf->MultiCell(0,10.6,utf8_decode("RESPONSABLE DE LA INSCRIPCIÓN: (solo para personal de la institución)__________________________________\nFIRMA DEL REPRESENTANTE: _____________________________________\nFIRMA DEL ESTUDIANTE: _____________________________________\nFIRMA DEL RESPONSABLE DE LA INSTITUCIÓN: _____________________________________\n"),1,1);

$pdf->AddPage();
$pdf->SetFont('Arial','',14);
$pdf->Ln(6);
$pdf->Cell(0,6,utf8_decode('OBSERVACIONES'),1,1,'C',1);
$pdf->SetFont('Arial','',9);
$pdf->Multicell(0,5,utf8_decode("Realice una descripción general de su representado, mencionando características en el aspecto social, físico, personal, familiar y académico que a usted le gustaria dar a  conocer a los docentes de la institución. \nSocial: \n" . $observaciones_Est['Social'] . "\nFísico: \n" . $observaciones_Est['Físico'] .  "\nPersonal: \n" . $observaciones_Est['Personal'] . "\nFamiliar: \n" . $observaciones_Est['Familiar'] . "\nAcadémico: \n" . $observaciones_Est['Académico']),1,0);
$pdf->MultiCell(0,5,utf8_decode("OTRA OBSERVACIÓN: \n" . $observaciones_Est['Otra']),1,1);
$pdf->SetFont('Arial','',14);
$pdf->Cell(0,6,utf8_decode('REQUISITOS'),1,1,'C',1);
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(0,6,utf8_decode("Cédula\nFicha de inscripción\nCertificado de promoción\nCertificación de calificaciones\nFotos\nPermiso CEDNA\nInforme médico"),1,0);

$pdf->Output();

desconectarBD($conexion);

?>

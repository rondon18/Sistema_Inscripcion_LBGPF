<?php


require_once('controladores/conexion.php');

require_once('clases/personas.php');
require_once('clases/teléfonos.php');

require_once('clases/representantes.php');
require_once('clases/laborales-representantes.php');
require_once('clases/económicos-representantes.php');
require_once('clases/vivienda-representantes.php');
require_once('clases/contactos-auxiliares.php');


require_once('clases/estudiante.php');
require_once('clases/ficha-médica.php');
require_once('clases/sociales-estudiantes.php');
require_once('clases/tallas-estudiantes.php');
require_once('clases/tallas-estudiantes.php');
require_once('clases/estudiantes-repitentes.php');
require_once('clases/observaciones-estudiantes.php');

require_once('clases/padres.php');

require_once('clases/carnet-patria.php');
require_once('clases/grado.php');
require_once('clases/año-escolar.php');


$persona = new Personas();
$Teléfonos = new Teléfonos();
$carnet = New CarnetPatria();

$datos_representante = New Representantes();
$datos_vivienda = New DatosVivienda();
$datos_económicos = New Datoseconómicos();
$datos_laborales = New DatosLaborales();
$estudiante_repitente = new EstudiantesRepitentes();
$observaciones = New Observaciones();

$datos_auxiliar = New ContactoAuxiliar();

$datos_padre = new Padres();

$datos_estudiante	= new Estudiantes();
$datos_salud	= new Fichamédica();
$datos_sociales = new DatosSociales();
$datos_tallas = new TallasEstudiante();

$año_escolar = new Año_Escolar();
$grado = new GradoAcadémico();

//
// REPRESENTANTE
//

$persona->setPrimer_Nombre('Primer_Nombre_R');
$persona->setSegundo_Nombre('Segundo_Nombre_R');
$persona->setPrimer_Apellido('Primer_Apellido_R');
$persona->setSegundo_Apellido('Segundo_Apellido_R');

$Cédula_representante = 'V12345677';
$persona->setCédula($Cédula_representante);

$persona->setFecha_Nacimiento('Fecha_Nacimiento_R');
$persona->setLugar_Nacimiento('Lugar_Nacimiento_R');
$persona->setGénero('Género_R');
$persona->setCorreo_Electrónico('Correo_electrónico_R');
$persona->setDirección('Dirección_R');
$persona->setEstado_Civil('Estado_Civil_R');

$persona->insertarPersona();

//
// Teléfonos representante
//

#Teléfono principal
$Teléfonos->setPrefijo('Prefijo_Principal_R');
$Teléfonos->setNúmero_Telefónico('Teléfono_Principal_R');
$Teléfonos->setRelación_Teléfono('Principal');
$Teléfonos->setCédula_Persona($persona->getCédula());

$Teléfonos->insertarTeléfono();

#Teléfono secundario
$Teléfonos->setPrefijo('Prefijo_Secundario_R');
$Teléfonos->setNúmero_Telefónico('Teléfono_Secundario_R');
$Teléfonos->setRelación_Teléfono('Secundario');
$Teléfonos->setCédula_Persona($persona->getCédula());

$Teléfonos->insertarTeléfono();

#Teléfono auxiliar
$Teléfonos->setPrefijo('Prefijo_Trabajo_R');
$Teléfonos->setNúmero_Telefónico('Teléfono_Trabajo_R');
$Teléfonos->setRelación_Teléfono('Auxiliar');
$Teléfonos->setCédula_Persona($persona->getCédula());

$Teléfonos->insertarTeléfono();

#Teléfono trabajo
$Teléfonos->setPrefijo('Prefijo_Trabajo_R');
$Teléfonos->setNúmero_Telefónico('Teléfono_Trabajo_R');
$Teléfonos->setRelación_Teléfono('Trabajo');
$Teléfonos->setCédula_Persona($persona->getCédula());

$Teléfonos->insertarTeléfono();

$datos_representante->setCédula_Persona($persona->getCédula());
$datos_representante->setGrado_Académico('Grado_Instrucción');

$datos_representante->insertarRepresentante();

//
// CARNET DE LA PATRIA
//

$carnet->setCódigo_Carnet('0123456789');
$carnet->setSerial_Carnet('0123456789');
$carnet->setCédula_Persona($persona->getCédula());

$carnet->insertarCarnetPatria();


//
// DATOS LABORALES
//

#Si se marca que si tiene empleo, se asignan los datos, sino, se asigna como desempleado
if ('Representante_Trabaja' == "No") {
  $datos_laborales->setEmpleo("Desempleado");
}
else {
  $datos_laborales->setEmpleo('Empleo_R');
  $datos_laborales->setLugar_Trabajo('Lugar_Trabajo_R');
  $datos_laborales->setRemuneración('Remuneración');
  $datos_laborales->setTipo_Remuneración('Tipo_Remuneración');
}

$datos_laborales->setidRepresentantes($datos_representante->getidRepresentantes());
$datos_laborales->insertarDatosLaborales();

#Datos económicos
$datos_económicos->setBanco('Banco');
$datos_económicos->setTipo_Cuenta('Tipo_Cuenta');
$datos_económicos->setCta_Bancaria('Nro_Cuenta');
$datos_económicos->setidRepresentantes($datos_representante->getidRepresentantes());
$datos_económicos->insertarDatoseconómicos();

#Datos vivienda
$datos_vivienda->setCondiciones_Vivienda('Condición_vivienda');
$datos_vivienda->setTipo_Vivienda('Tipo_Vivienda');

#Si marca la tenencia como otro. Asume el texto ingresado en la casilla
if ('Tenencia_vivienda' == "Otro") {
  $datos_vivienda->setTenencia_Vivienda('Tenencia_vivienda_Otro');
}
else{
  $datos_vivienda->setTenencia_Vivienda('Tenencia_vivienda');
}

$datos_vivienda->setidRepresentante($datos_representante->getidRepresentantes());
$datos_vivienda->insertarDatosVivienda();

//
// DATOS DEL CONTACTO AUXILIAR
//

$persona->setPrimer_Nombre('Primer_Nombre_Aux');
$persona->setSegundo_Nombre('Segundo_Nombre_Aux');
$persona->setPrimer_Apellido('Primer_Apellido_Aux');
$persona->setSegundo_Apellido('Segundo_Apellido_Aux');
$Cédula_auxiliar = 'Tipo_Cédula_Aux'.'Cédula_Aux';
$persona->setCédula($Cédula_auxiliar);
$persona->setFecha_Nacimiento('Fecha_Nacimiento_Aux');
$persona->setLugar_Nacimiento('Lugar_Nacimiento_Aux');
$persona->setGénero('Género_Aux');
$persona->setCorreo_Electrónico('Correo_electrónico_Aux');
$persona->setDirección('Dirección_Aux');
$persona->setEstado_Civil('Estado_Civil_Aux');

$persona->insertarPersona();

//
// Teléfonos del auxiliar
//

#Teléfono principal
$Teléfonos->setPrefijo('Prefijo_Principal_Aux');
$Teléfonos->setNúmero_Telefónico('Teléfono_Principal_Aux');
$Teléfonos->setRelación_Teléfono('Principal');
$Teléfonos->setCédula_Persona($persona->getCédula());

$Teléfonos->insertarTeléfono();

#Teléfono secundario
$Teléfonos->setPrefijo('Prefijo_Secundario_Aux');
$Teléfonos->setNúmero_Telefónico('Teléfono_Secundario_Aux');
$Teléfonos->setRelación_Teléfono('Secundario');
$Teléfonos->setCédula_Persona($persona->getCédula());

$Teléfonos->insertarTeléfono();

#Teléfono auxiliar
$Teléfonos->setPrefijo('Prefijo_Auxiliar_Aux');
$Teléfonos->setNúmero_Telefónico('Teléfono_Auxiliar_Aux');
$Teléfonos->setRelación_Teléfono('Auxiliar');
$Teléfonos->setCédula_Persona($persona->getCédula());

$Teléfonos->insertarTeléfono();

//
//	Datos del auxiliar
//

$datos_auxiliar->setRelación('Relación_Auxiliar');
$datos_auxiliar->setCédula_Persona($persona->getCédula());
$datos_auxiliar->setidRepresentante($datos_representante->getidRepresentantes());

//
//
// PARTE DEL PADRE/MADRE
//
//

$persona->setPrimer_Nombre('Primer_Nombre_R');
$persona->setSegundo_Nombre('Segundo_Nombre_R');
$persona->setPrimer_Apellido('Primer_Apellido_R');
$persona->setSegundo_Apellido('Segundo_Apellido_R');

$Cédula_padre = 'Cédula_P';
$persona->setCédula($Cédula_padre);

$persona->setFecha_Nacimiento('Fecha_Nacimiento_R');
$persona->setLugar_Nacimiento('Lugar_Nacimiento_R');
$persona->setGénero('Género_R');
$persona->setCorreo_Electrónico('Correo_electrónico_R');
$persona->setDirección('Dirección_R');
$persona->setEstado_Civil('Estado_Civil_R');

$persona->insertarPersona();

$datos_padre->setCédula_Persona($Cédula_padre);
$datos_padre->setPaís_Residencia("");

$datos_padre->insertarPadres();

//
// Teléfonos del padre/madre
//

#Teléfono principal
$Teléfonos->setPrefijo('Prefijo_Principal_Aux');
$Teléfonos->setNúmero_Telefónico('Teléfono_Principal_Aux');
$Teléfonos->setRelación_Teléfono('Principal');
$Teléfonos->setCédula_Persona($persona->getCédula());

$Teléfonos->insertarTeléfono();

#Teléfono secundario
$Teléfonos->setPrefijo('Prefijo_Secundario_Aux');
$Teléfonos->setNúmero_Telefónico('Teléfono_Secundario_Aux');
$Teléfonos->setRelación_Teléfono('Secundario');
$Teléfonos->setCédula_Persona($persona->getCédula());

$Teléfonos->insertarTeléfono();

//
//
// PARTE DEL ESTUDIANTE
//
//

$persona->setPrimer_Nombre('Primer_Nombre_Est');
$persona->setSegundo_Nombre('Segundo_Nombre_Est');
$persona->setPrimer_Apellido('Primer_Apellido_Est');
$persona->setSegundo_Apellido('Segundo_Apellido_Est');

$Cédula_estudiante = 'Tipo_Cédula_Est';
$persona->setCédula($Cédula_estudiante);

$persona->setFecha_Nacimiento('Fecha_Nacimiento_Est');
$persona->setLugar_Nacimiento('Lugar_Nacimiento_Est');
$persona->setGénero('Género_Est');
$persona->setCorreo_Electrónico('Correo_electrónico_Est');
$persona->setDirección('Dirección_Est');
$persona->setEstado_Civil('Soltero(a)');

$persona->insertarPersona();

$datos_estudiante->setPlantel_Procedencia("");
$datos_estudiante->setCon_Quién_Vive("");
$datos_estudiante->setCédula_Estudiante($Cédula_estudiante);
$datos_estudiante->setidRepresentante($datos_representante->getidRepresentantes());
$datos_estudiante->setidPadre($datos_padre->getidPadres());

$datos_estudiante->insertarEstudiante();

//
// Teléfonos del estudiante
//

#Teléfono principal
$Teléfonos->setPrefijo('Prefijo_Principal_Est');
$Teléfonos->setNúmero_Telefónico('Teléfono_Principal_Est');
$Teléfonos->setRelación_Teléfono('Principal');
$Teléfonos->setCédula_Persona($persona->getCédula());

$Teléfonos->insertarTeléfono();

#Teléfono secundario
$Teléfonos->setPrefijo('Prefijo_Secundario_Est');
$Teléfonos->setNúmero_Telefónico('Teléfono_Secundario_Est');
$Teléfonos->setRelación_Teléfono('Secundario');
$Teléfonos->setCédula_Persona($persona->getCédula());

$Teléfonos->insertarTeléfono();

//
//	Datos de salud
//

$datos_salud->setEstatura('Talla');
$datos_salud->setPeso('Peso');
$datos_salud->setÍndice('Índice');
$datos_salud->setCirc_Braquial('C_Braquial');
$datos_salud->setLateralidad('Lateralidad');
$tipo_sangre = 'Lateralidad'.'Lateralidad';
$datos_salud->setTipo_Sangre('');
$datos_salud->setMedicación('');
$datos_salud->setDieta_Especial('');
$datos_salud->setEnfermedad('');
$datos_salud->setImpedimento_Físico('');
$datos_salud->setAlergias('');
$datos_salud->setCond_Vista('');
$datos_salud->setCond_Dental('');
$datos_salud->setInstitución_médica('');
$datos_salud->setCarnet_Discapacidad('');
$datos_salud->insertarFicha_médica($datos_estudiante->getidEstudiantes());

//
//	Datos sociales del estudiante
//

$datos_sociales->setPosee_Canaima('');
$datos_sociales->setCondición_Canaima('');
$datos_sociales->setPosee_Carnet_Patria('');
$datos_sociales->setAcceso_Internet('');

$datos_sociales->insertarDatosSociales($datos_estudiante->getidEstudiantes());

//
//	Datos de tallas del estudiante
//

$datos_tallas->setTalla_Camisa("");
$datos_tallas->setTalla_Pantalón("");
$datos_tallas->setTalla_Zapatos("");

$datos_tallas->insertarTallasEstudiante($datos_estudiante->getidEstudiantes());

//
//	Datos del carnet de la patria del estudiante
//

$carnet->setCódigo_Carnet('0123456789');
$carnet->setSerial_Carnet('0123456789');
$carnet->setCédula_Persona($persona->getCédula());

$carnet->insertarCarnetPatria();

$grado->setGrado_A_Cursar("Segundo año");
$grado->insertarGrado($datos_estudiante->getidEstudiantes(),$año_escolar->getInicio_Año_Escolar(),$año_escolar->getFin_Año_Escolar());

$estudiante_repitente->getMaterias_Pendientes('');
$estudiante_repitente->getAño_Repetido('');
$estudiante_repitente->getQue_Materias_Repite('');

$estudiante_repitente->insertarEstudiantesRepitentes($datos_estudiante->getidEstudiantes());

//
//	Observaciones sobre el estudiante
//

$observaciones->setSocial('');
$observaciones->setFísico('');
$observaciones->setPersonal('');
$observaciones->setFamiliar('');
$observaciones->setAcadémico('');
$observaciones->setOtra('');
$observaciones->setidEstudiantes($datos_estudiante->getidEstudiantes());

$observaciones->insertarObservaciones();
 ?>

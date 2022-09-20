<?php

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}



require_once('../controladores/conexion.php');

require_once('../clases/personas.php');
require_once('../clases/teléfonos.php');

require_once('../clases/representantes.php');
require_once('../clases/laborales.php');
require_once('../clases/laborales-madres.php');
require_once('../clases/laborales-padres.php');
require_once('../clases/económicos-representantes.php');
require_once('../clases/vivienda.php');
require_once('../clases/vivienda-madres.php');
require_once('../clases/vivienda-padres.php');
require_once('../clases/contactos-auxiliares.php');


require_once('../clases/estudiante.php');
require_once('../clases/ficha-médica.php');
require_once('../clases/sociales-estudiantes.php');
require_once('../clases/tallas-estudiantes.php');
require_once('../clases/tallas-estudiantes.php');
require_once('../clases/estudiantes-repitentes.php');
require_once('../clases/observaciones-estudiantes.php');

require_once('../clases/Padre.php');
require_once('../clases/Madre.php');

require_once('../clases/carnet-patria.php');
require_once('../clases/grado.php');
require_once('../clases/año-escolar.php');

require_once('../clases/inscripciones.php');


$persona = new Personas();
$Teléfonos = new Teléfonos();
$carnet = New CarnetPatria();

$datos_representante = New Representantes();
$datos_vivienda = New DatosVivienda();
$datos_vivienda_ma = New DatosViviendaMa();
$datos_vivienda_pa = New DatosViviendaPa();
$datos_económicos = New Datoseconómicos();
$datos_laborales = New DatosLaborales();
$datos_laborales_ma = New DatosLaboralesMadres();
$datos_laborales_pa = New DatosLaboralesPadres();

$datos_padre = new Padre();
$datos_madre = new Madre();
$datos_auxiliar = new ContactoAuxiliar();

$datos_estudiante	= new Estudiantes();
$datos_salud	= new Fichamédica();
$datos_sociales = new DatosSociales();
$datos_tallas = new TallasEstudiante();
$observaciones = new Observaciones();

$año_escolar = new Año_Escolar();
$grado = new GradoAcadémico();
$estudiante_repitente = new EstudiantesRepitentes();

$Inscripcion = new Inscripciones();


if (isset($_POST['orden']) and $_POST['orden']) {

	$orden = $_POST['orden'];

	if ($orden == "Insertar") {

		// foreach ($_POST as $key => $value) {
		// 	echo $key.">>";
		// 	var_dump($value);
		// 	echo "<br><br>";
		// }

		//
		// REPRESENTANTE
		//

		$persona->setPrimer_Nombre($_POST['Primer_Nombre_R']);
		$persona->setSegundo_Nombre($_POST['Segundo_Nombre_R']);
		$persona->setPrimer_Apellido($_POST['Primer_Apellido_R']);
		$persona->setSegundo_Apellido($_POST['Segundo_Apellido_R']);

		$Cédula_representante = $_POST['Tipo_Cédula_R'].$_POST['Cédula_R'];
		$persona->setCédula($Cédula_representante);

		$persona->setFecha_Nacimiento($_POST['Fecha_Nacimiento_R']);
		$persona->setLugar_Nacimiento($_POST['Lugar_Nacimiento_R']);
		$persona->setGénero($_POST['Género_R']);
		$persona->setCorreo_Electrónico($_POST['Correo_electrónico_R']);
		$persona->setDirección($_POST['Dirección_R']);
		$persona->setEstado_Civil($_POST['Estado_Civil_R']);

		$persona->insertarPersona();

		//
		// Teléfonos representante
		//

		#Teléfono principal
		$Teléfonos->setPrefijo($_POST['Prefijo_Principal_R']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Principal_R']);
		$Teléfonos->setRelación_Teléfono('Principal');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->insertarTeléfono();

		#Teléfono secundario
		$Teléfonos->setPrefijo($_POST['Prefijo_Secundario_R']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Secundario_R']);
		$Teléfonos->setRelación_Teléfono('Secundario');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->insertarTeléfono();

		#Teléfono auxiliar
		$Teléfonos->setPrefijo($_POST['Prefijo_Auxiliar_R']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Auxiliar_R']);
		$Teléfonos->setRelación_Teléfono('Auxiliar');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->insertarTeléfono();

		#Teléfono trabajo
		$Teléfonos->setPrefijo($_POST['Prefijo_Trabajo_R']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Trabajo_R']);
		$Teléfonos->setRelación_Teléfono('Trabajo');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->insertarTeléfono();

		$datos_representante->setCédula_Persona($persona->getCédula());
		$datos_representante->setGrado_Académico($_POST['Grado_Instrucción_R']);

		$datos_representante->insertarRepresentante();

		//
		// CARNET DE LA PATRIA
		//

		if ($_POST['Tiene_Carnet_Patria_R'] = "Si") {
			$carnet->setCódigo_Carnet($_POST['Código_Carnet_Patria_R']);
			$carnet->setSerial_Carnet($_POST['Serial_Carnet_Patria_R']);
		}
		$carnet->setCédula_Persona($persona->getCédula());

		$carnet->insertarCarnetPatria();

		//
		// DATOS LABORALES
		//

		#Si se marca que si tiene empleo, se asignan los datos, sino, se asigna como desempleado
		if ($_POST['Representante_Trabaja'] == "No") {
		  $datos_laborales->setEmpleo("Desempleado");
		}
		else {
		  $datos_laborales->setEmpleo($_POST['Empleo_R']);
		  $datos_laborales->setLugar_Trabajo($_POST['Lugar_Trabajo_R']);
		  $datos_laborales->setRemuneración($_POST['Remuneración_R']);
		  $datos_laborales->setTipo_Remuneración($_POST['Tipo_Remuneración_R']);
		}

		$datos_laborales->setidRepresentantes($datos_representante->getidRepresentantes());
		$datos_laborales->insertarDatosLaborales_R();

		#Datos económicos
		$datos_económicos->setBanco($_POST['Banco']);
		$datos_económicos->setTipo_Cuenta($_POST['Tipo_Cuenta']);
		$datos_económicos->setCta_Bancaria($_POST['Nro_Cuenta']);
		$datos_económicos->setidRepresentantes($datos_representante->getidRepresentantes());
		$datos_económicos->insertarDatoseconómicos();

		#Datos vivienda
		$datos_vivienda->setCondiciones_Vivienda($_POST['Condición_vivienda_R']);
		$datos_vivienda->setTipo_Vivienda($_POST['Tipo_Vivienda_R']);

		#Si marca la tenencia como otro. Asume el texto ingresado en la casilla
		if ($_POST['Tenencia_vivienda_R'] == "Otro") {
		  $datos_vivienda->setTenencia_Vivienda($_POST['Tenencia_vivienda_R_Otro']);
		}
		else{
		  $datos_vivienda->setTenencia_Vivienda($_POST['Tenencia_vivienda_R']);
		}

		$datos_vivienda->setidRepresentante($datos_representante->getidRepresentantes());
		$datos_vivienda->insertarDatosVivienda();

		//
		//
		// PARTE DE LA MADRE
		//
		//

		$persona->setPrimer_Nombre($_POST['Primer_Nombre_Madre']);
		$persona->setSegundo_Nombre($_POST['Segundo_Nombre_Madre']);
		$persona->setPrimer_Apellido($_POST['Primer_Apellido_Madre']);
		$persona->setSegundo_Apellido($_POST['Segundo_Apellido_Madre']);

		$Cédula_madre = $_POST['Tipo_Cédula_Madre'].$_POST['Cédula_Madre'];
		$persona->setCédula($Cédula_madre);

		$persona->setFecha_Nacimiento($_POST['Fecha_Nacimiento_Madre']);
		$persona->setLugar_Nacimiento($_POST['Lugar_Nacimiento_Madre']);
		$persona->setCorreo_Electrónico($_POST['Correo_electrónico_Madre']);
		$persona->setDirección($_POST['Dirección_Madre']);
		$persona->setEstado_Civil($_POST['Estado_Civil_Madre']);

		$persona->insertarPersona();

		$datos_madre->setCédula_Persona($Cédula_madre);
		if ($_POST['Reside_En_El_País_Ma'] == "Si") {
			$datos_madre->setPaís_ResidenciaMa('Venezuela');
		}
		else {
			$datos_madre->setPaís_ResidenciaMa($_POST['País_Ma']);
		}
		$datos_madre->setGrado_AcadémicoMa($_POST['Grado_Instrucción_Ma']);		

		$datos_madre->insertarMadre();

		//
		// DATOS LABORALES MADRES
		//		

		#Si se marca que si tiene empleo, se asignan los datos, sino, se asigna como desempleado
		if ($_POST['Madre_Trabaja'] == "No") {
		  $datos_laborales_ma->setEmpleoMa("Desempleado");
		}
		else {
		  $datos_laborales_ma->setEmpleoMa($_POST['Empleo_Ma']);
		  $datos_laborales_ma->setLugar_TrabajoMa($_POST['Lugar_Trabajo_Ma']);
		  $datos_laborales_ma->setRemuneraciónMa($_POST['Remuneración_Ma']);
		  $datos_laborales_ma->setTipo_RemuneraciónMa($_POST['Tipo_Remuneración_Ma']);
		}

		$datos_laborales_ma->setidMadre($datos_madre->getidMadre());
		$datos_laborales_ma->insertarDatosLaborales_Ma();

		#Datos vivienda
		$datos_vivienda_ma->setCondiciones_ViviendaMa($_POST['Condición_vivienda_Ma']);
		$datos_vivienda_ma->setTipo_ViviendaMa($_POST['Tipo_Vivienda_Ma']);

		#Si marca la tenencia como otro. Asume el texto ingresado en la casilla
		if ($_POST['Tenencia_vivienda_Ma'] == "Otro") {
		  $datos_vivienda_ma->setTenencia_viviendaMa($_POST['Tenencia_vivienda_Ma_Otro']);
		}
		else{
		  $datos_vivienda_ma->setTenencia_viviendaMa($_POST['Tenencia_vivienda_Ma']);
		}

		$datos_vivienda_ma->setidMadre($datos_madre->getidMadre());
		$datos_vivienda_ma->insertarDatosVivienda_Ma();

		//
		// Teléfonos de la madre
		//

		#Teléfono principal
		$Teléfonos->setPrefijo($_POST['Prefijo_Principal_Madre']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Principal_Madre']);
		$Teléfonos->setRelación_Teléfono('Principal');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->insertarTeléfono();

		#Teléfono secundario
		$Teléfonos->setPrefijo($_POST['Prefijo_Secundario_Madre']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Secundario_Madre']);
		$Teléfonos->setRelación_Teléfono('Secundario');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->insertarTeléfono();

		#Teléfono trabajo
		$Teléfonos->setPrefijo($_POST['Prefijo_Trabajo_Ma']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Trabajo_Ma']);
		$Teléfonos->setRelación_Teléfono('Trabajo');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->insertarTeléfono();

		//
		//
		// PARTE DEL PADRE
		//
		//

		$persona->setPrimer_Nombre($_POST['Primer_Nombre_Padre']);
		$persona->setSegundo_Nombre($_POST['Segundo_Nombre_Padre']);
		$persona->setPrimer_Apellido($_POST['Primer_Apellido_Padre']);
		$persona->setSegundo_Apellido($_POST['Segundo_Apellido_Padre']);

		$Cédula_padre = $_POST['Tipo_Cédula_Padre'].$_POST['Cédula_Padre'];
		$persona->setCédula($Cédula_padre);

		$persona->setFecha_Nacimiento($_POST['Fecha_Nacimiento_Padre']);
		$persona->setLugar_Nacimiento($_POST['Lugar_Nacimiento_Padre']);
		$persona->setCorreo_Electrónico($_POST['Correo_electrónico_Padre']);
		$persona->setDirección($_POST['Dirección_Padre']);
		$persona->setEstado_Civil($_POST['Estado_Civil_Padre']);

		$persona->insertarPersona();

		$datos_padre->setCédula_Persona($Cédula_padre);
		if ($_POST['Reside_En_El_País_Pa'] == "Si") {
			$datos_padre->setPaís_Residencia('Venezuela');
		}
		else {
			$datos_padre->setPaís_Residencia($_POST['País_Pa']);
		}
		$datos_padre->setGrado_AcadémicoPa($_POST['Grado_Instrucción_Pa']);		

		$datos_padre->insertarPadre();

		//
		// DATOS LABORALES PADRES
		//

		#Si se marca que si tiene empleo, se asignan los datos, sino, se asigna como desempleado
		if ($_POST['Padre_Trabaja'] == "No") {
		  $datos_laborales_pa->setEmpleoPa("Desempleado");
		}
		else {
		  $datos_laborales_pa->setEmpleoPa($_POST['Empleo_Pa']);
		  $datos_laborales_pa->setLugar_TrabajoPa($_POST['Lugar_Trabajo_Pa']);
		  $datos_laborales_pa->setRemuneraciónPa($_POST['Remuneración_Pa']);
		  $datos_laborales_pa->setTipo_RemuneraciónPa($_POST['Tipo_Remuneración_Pa']);
		}		

		$datos_laborales_pa->setidPadre($datos_padre->getidPadre());
		$datos_laborales_pa->insertarDatosLaborales_Pa();

		#Datos vivienda
		$datos_vivienda_pa->setCondiciones_ViviendaPa($_POST['Condición_vivienda_Pa']);
		$datos_vivienda_pa->setTipo_ViviendaPa($_POST['Tipo_Vivienda_Pa']);

		#Si marca la tenencia como otro. Asume el texto ingresado en la casilla
		if ($_POST['Tenencia_vivienda_Pa'] == "Otro") {
		  $datos_vivienda_pa->setTenencia_viviendaPa($_POST['Tenencia_vivienda_Pa_Otro']);
		}
		else{
		  $datos_vivienda_pa->setTenencia_viviendaPa($_POST['Tenencia_vivienda_Pa']);
		}

		$datos_vivienda_pa->setidPadre($datos_padre->getidPadre());
		$datos_vivienda_pa->insertarDatosVivienda_Pa();

		//
		// Teléfonos del padre
		//

		#Teléfono principal
		$Teléfonos->setPrefijo($_POST['Prefijo_Principal_Padre']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Principal_Padre']);
		$Teléfonos->setRelación_Teléfono('Principal');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->insertarTeléfono();

		#Teléfono secundario
		$Teléfonos->setPrefijo($_POST['Prefijo_Secundario_Padre']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Secundario_Padre']);
		$Teléfonos->setRelación_Teléfono('Secundario');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->insertarTeléfono();

		#Teléfono trabajo
		$Teléfonos->setPrefijo($_POST['Prefijo_Trabajo_Pa']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Trabajo_Pa']);
		$Teléfonos->setRelación_Teléfono('Trabajo');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->insertarTeléfono();


		//
		// Teléfonos del auxiliar
		//

		#Teléfono principal
		// $Teléfonos->setPrefijo($_POST['Prefijo_Principal_Aux']);
		// $Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Principal_Aux']);
		// $Teléfonos->setRelación_Teléfono('Principal');
		// $Teléfonos->setCédula_Persona($persona->getCédula());

		// $Teléfonos->insertarTeléfono();

		#Teléfono secundario
		// $Teléfonos->setPrefijo($_POST['Prefijo_Secundario_Aux']);
		// $Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Secundario_Aux']);
		// $Teléfonos->setRelación_Teléfono('Secundario');
		// $Teléfonos->setCédula_Persona($persona->getCédula());

		// $Teléfonos->insertarTeléfono();

		#Teléfono auxiliar
		// $Teléfonos->setPrefijo($_POST['Prefijo_Auxiliar_Aux']);
		// $Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Auxiliar_Aux']);
		// $Teléfonos->setRelación_Teléfono('Auxiliar');
		// $Teléfonos->setCédula_Persona($persona->getCédula());

		// $Teléfonos->insertarTeléfono();

		//
		//
		// PARTE DEL ESTUDIANTE
		//
		//

		$persona->setPrimer_Nombre($_POST['Primer_Nombre_Est']);
		$persona->setSegundo_Nombre($_POST['Segundo_Nombre_Est']);
		$persona->setPrimer_Apellido($_POST['Primer_Apellido_Est']);
		$persona->setSegundo_Apellido($_POST['Segundo_Apellido_Est']);

		$Cédula_estudiante = $_POST['Tipo_Cédula_Est'].$_POST['Cédula_Est'];
		$persona->setCédula($Cédula_estudiante);

		$persona->setFecha_Nacimiento($_POST['Fecha_Nacimiento_Est']);
		$persona->setLugar_Nacimiento($_POST['Lugar_Nacimiento_Est']);
		$persona->setGénero($_POST['Género_Est']);
		$persona->setCorreo_Electrónico($_POST['Correo_electrónico_Est']);
		$persona->setDirección($_POST['Dirección_Est']);
		$persona->setEstado_Civil('Soltero(a)');

		$persona->insertarPersona();

		$datos_estudiante->setPlantel_Procedencia($_POST['Plantel_Procedencia']);
		$datos_estudiante->setCon_Quién_Vive($_POST['Con_Quién_Vive']);
		$datos_estudiante->setCédula_Estudiante($Cédula_estudiante);
		$datos_estudiante->setidRepresentante($datos_representante->getidRepresentantes());
		$datos_estudiante->setidPadre($datos_padre->getidPadre());
		$datos_estudiante->setidMadre($datos_madre->getidMadre());
		$datos_estudiante->setRelación_Representante($_POST['Vinculo_R']);

		$datos_estudiante->insertarEstudiante();

		//
		// Teléfonos del estudiante
		//

		#Teléfono principal
		$Teléfonos->setPrefijo($_POST['Prefijo_Principal_Est']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Principal_Est']);
		$Teléfonos->setRelación_Teléfono('Principal');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->insertarTeléfono();

		#Teléfono secundario
		$Teléfonos->setPrefijo($_POST['Prefijo_Secundario_Est']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Secundario_Est']);
		$Teléfonos->setRelación_Teléfono('Secundario');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->insertarTeléfono();

		#Teléfono secundario
		$Teléfonos->setPrefijo($_POST['Prefijo_Secundario_Est']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Secundario_Est']);
		$Teléfonos->setRelación_Teléfono('Auxiliar');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->insertarTeléfono();

		//
		//	Datos de salud
		//

		$datos_salud->setEstatura($_POST['Talla']);
		$datos_salud->setPeso($_POST['Peso']);
		$datos_salud->setÍndice($_POST['Índice']);
		$datos_salud->setCirc_Braquial($_POST['C_Braquial']);
		$datos_salud->setLateralidad($_POST['Lateralidad']);
		$tipo_sangre = $_POST['Grupo_Sanguineo'].$_POST['Factor_Rhesus'];
		$datos_salud->setTipo_Sangre($tipo_sangre);

		if ($_POST['Recibe_médicación'] == "Si") {
			$datos_salud->setMedicación($_POST['médicación']);
		}

		if ($_POST['Tiene_Dieta_Especial'] == "Si") {
			$datos_salud->setDieta_Especial($_POST['Dieta_Especial']);
		}

		if ($_POST['Tiene_Carnet_Discapacidad'] == "Si") {
			$datos_salud->setCarnet_Discapacidad($_POST['Nro_Carnet_Discapacidad']);
		}

		if ($_POST['Recibe_Atención_Inst'] == "Si") {
			$datos_salud->setInstitución_médica($_POST['Institución_médica']);
		}

		if ($_POST['Padece_Enfermedad'] == "Si") {
			$datos_salud->setEnfermedad($_POST['Cual_Enfermedad']);
		}

		$impedimentos = "";

		if (isset($_POST['Condiciones_Salud'])) {
			foreach ($_POST['Condiciones_Salud'] as $impedimento) {
				$impedimentos .= $impedimento.", ";
			}
			#elimina el ", " al final de la cadena de texto
			$datos_salud->setImpedimento_Físico(substr($impedimentos,0,-2));
		}
		else {
			$datos_salud->setImpedimento_Físico(NULL);
		}
		$datos_salud->setNecesidad_educativa($_POST['Necesidad_educativa']);
		$datos_salud->setVacunado($_POST['Vacunado']);
		$datos_salud->setVacuna($_POST['Vacuna']);
		$datos_salud->setDosis($_POST['Dosis']);
		$datos_salud->setLote($_POST['Lote']);		
		$datos_salud->setCond_Vista($_POST['Condición_Vista']);
		$datos_salud->setCond_Dental($_POST['Condición_Dentadura']);
		$datos_salud->insertarFicha_médica($datos_estudiante->getidEstudiantes());

		//
		//	Datos sociales del estudiante
		//

		$datos_sociales->setPosee_Canaima($_POST['Tiene_Canaima']);
		if ($_POST['Tiene_Canaima'] == "Si") {
			$datos_sociales->setCondición_Canaima($_POST['Condiciones_Canaima']);
		}
		$datos_sociales->setAcceso_Internet($_POST['Internet_Vivienda']);

		$datos_sociales->insertarDatosSociales($datos_estudiante->getidEstudiantes());

		//
		//	Datos de tallas del estudiante
		//

		$datos_tallas->setTalla_Camisa($_POST['Talla_Camisa']);
		$datos_tallas->setTalla_Pantalón($_POST['Talla_Pantalón']);
		$datos_tallas->setTalla_Zapatos($_POST['Talla_Zapatos']);

		$datos_tallas->insertarTallasEstudiante($datos_estudiante->getidEstudiantes());

		//
		//	Datos del carnet de la patria del estudiante
		//

		if ($_POST['Tiene_Carnet_Patria_Est'] == "Si") {
			$carnet->setCódigo_Carnet($_POST['Código_Carnet_Patria_Est']);
			$carnet->setSerial_Carnet($_POST['Serial_Carnet_Patria_Est']);
		}

		$carnet->setCédula_Persona($persona->getCédula());

		$carnet->insertarCarnetPatria();

		$grado->setGrado_A_Cursar($_POST['Grado_A_Cursar']);
		$grado->insertarGrado($datos_estudiante->getidEstudiantes(),$año_escolar->getInicio_Año_Escolar(),$año_escolar->getFin_Año_Escolar());

		if ($_POST['Estudiante_Repitente'] == "Si") {
			#Si repite año
			$estudiante_repitente->getAño_Repetido($_POST['Año_Repitente']);
			$estudiante_repitente->getQue_Materias_Repite($_POST['Materias_Repitente']);
		}
		if ($_POST['Tiene_Materias_Pendientes'] == "Si") {
			#Si tiene materias pendientes
			$estudiante_repitente->getMaterias_Pendientes($_POST['Materias_Pendientes']);
		}

		$estudiante_repitente->insertarEstudiantesRepitentes($datos_estudiante->getidEstudiantes());

		//
		//	Observaciones sobre el estudiante
		//
		$observaciones->setSocial($_POST['observaciones_Social']);
		$observaciones->setFísico($_POST['observaciones_Fisico']);
		$observaciones->setPersonal($_POST['observaciones_Personal']);
		$observaciones->setFamiliar($_POST['observaciones_Familiar']);
		$observaciones->setAcadémico($_POST['observaciones_Academico']);
		$observaciones->setOtra($_POST['observaciones_Otra']);
		$observaciones->setidEstudiantes($datos_estudiante->getidEstudiantes());

		$observaciones->insertarObservaciones();
		
		//
		// DATOS DEL CONTACTO AUXILIAR
		//

		$datos_auxiliar->setPrimer_Nombre($_POST['Primer_Nombre_Aux']);
		$datos_auxiliar->setSegundo_Nombre($_POST['Segundo_Nombre_Aux']);
		$datos_auxiliar->setPrimer_Apellido($_POST['Primer_Apellido_Aux']);
		$datos_auxiliar->setSegundo_Apellido($_POST['Segundo_Apellido_Aux']);
		$datos_auxiliar->setRelación($_POST['Relación_Auxiliar']);				
		$datos_auxiliar->setPrefijo($_POST['Prefijo_Principal_Aux']);
		$datos_auxiliar->setNúmero_Telefónico($_POST['Teléfono_Principal_Aux']);
		$datos_auxiliar->setidRepresentante($datos_representante->getidRepresentantes());
		$datos_auxiliar->setidEstudiantes($datos_estudiante->getidEstudiantes());
		// $Cédula_auxiliar = $_POST['Tipo_Cédula_Aux'].$_POST['Cédula_Aux'];
		// $persona->setCédula($Cédula_auxiliar);
		// $persona->setGénero($_POST['Género_Aux']);
		// $persona->setCorreo_Electrónico($_POST['Correo_electrónico_Aux']);
		// $persona->setDirección($_POST['Dirección_Aux']);

		$datos_auxiliar->insertarContactoAuxiliar();

		$Inscripcion->insertarRegistro($_SESSION['usuario']['idUsuarios'],$datos_estudiante->getidEstudiantes());

		require('../clases/bitácora.php');

		$bitácora = new bitácora();
		$_SESSION['acciones'] .= ',Registra un estudiante';
		$bitácora->actualizar_bitácora($_SESSION['acciones'],$_SESSION['idbitácora']);

		header('Location: ../lobby/consultar.php?exito');
	}

	elseif ($orden == "Editar") {

		foreach ($_POST as $key => $value) {
			print_r($key . "->" . $value . "<br>");
		}

		var_dump($_POST['Tenencia_Vivienda']);

		$persona->setPrimer_Nombre($_POST['Primer_Nombre_R']);
		$persona->setSegundo_Nombre($_POST['Segundo_Nombre_R']);
		$persona->setPrimer_Apellido($_POST['Primer_Apellido_R']);
		$persona->setSegundo_Apellido($_POST['Segundo_Apellido_R']);

		$Cédula_representante = $_POST['Tipo_Cédula_R'].$_POST['Cédula_R'];
		$persona->setCédula($Cédula_representante);

		$persona->setFecha_Nacimiento($_POST['Fecha_Nacimiento_R']);
		$persona->setLugar_Nacimiento($_POST['Lugar_Nacimiento_R']);
		$persona->setGénero($_POST['Género_R']);
		$persona->setCorreo_Electrónico($_POST['Correo_electrónico_R']);
		$persona->setDirección($_POST['Dirección_R']);
		$persona->setEstado_Civil($_POST['Estado_Civil_R']);

		$persona->editarPersonaC($Cédula_representante);



		//Consulta el representante

		$conexion = conectarBD();

		$sql = "SELECT * FROM `representantes` WHERE `Cédula_Persona` = '$Cédula_representante'";

		$consulta_representantes = $conexion->query($sql) or die("error: ".$conexion->error);
		$representantes = $consulta_representantes->fetch_assoc();

		$idRepresentante = $representantes['idRepresentantes'];

		desconectarBD($conexion);

		//
		// Teléfonos representante
		//

		#Teléfono principal
		$Teléfonos->setPrefijo($_POST['Prefijo_Principal_R']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Principal_R']);
		$Teléfonos->setRelación_Teléfono('Principal');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->editarTeléfono($Cédula_representante);

		#Teléfono secundario
		$Teléfonos->setPrefijo($_POST['Prefijo_Secundario_R']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Secundario_R']);
		$Teléfonos->setRelación_Teléfono('Secundario');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->editarTeléfono($Cédula_representante);

		#Teléfono auxiliar
		$Teléfonos->setPrefijo($_POST['Prefijo_Auxiliar_R']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Auxiliar_R']);
		$Teléfonos->setRelación_Teléfono('Auxiliar');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->editarTeléfono($Cédula_representante);

		#Teléfono trabajo
		$Teléfonos->setPrefijo($_POST['Prefijo_Trabajo_R']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Trabajo_R']);
		$Teléfonos->setRelación_Teléfono('Trabajo');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->editarTeléfono($Cédula_representante);

		$datos_representante->setCédula_Persona($persona->getCédula());
		$datos_representante->setGrado_Académico($_POST['Grado_Instrucción_R']);

		$datos_representante->editarRepresentante($Cédula_representante);

		//
		// CARNET DE LA PATRIA
		//

		if ($_POST['Tiene_Carnet_Patria_R'] = "Si") {
			$carnet->setCódigo_Carnet($_POST['Código_Carnet_Patria_R']);
			$carnet->setSerial_Carnet($_POST['Serial_Carnet_Patria_R']);
		}
		$carnet->setCédula_Persona($persona->getCédula());

		$carnet->editarCarnetPatria();

		//
		// DATOS LABORALES
		//

		#Si se marca que si tiene empleo, se asignan los datos, sino, se asigna como desempleado
		if ($_POST['Representante_Trabaja'] == "No") {
			$datos_laborales->setEmpleo("Desempleado");
		}
		else {
			$datos_laborales->setEmpleo($_POST['Empleo_R']);
			$datos_laborales->setLugar_Trabajo($_POST['Lugar_Trabajo_R']);
			$datos_laborales->setRemuneración($_POST['Remuneración_R']);
			$datos_laborales->setTipo_Remuneración($_POST['Tipo_Remuneración']);
		}

		$datos_laborales->setidRepresentantes($datos_representante->getidRepresentantes());
		$datos_laborales->editarDatosLaborales_R($idRepresentante);

		#Datos económicos
		$datos_económicos->setBanco($_POST['Banco']);
		$datos_económicos->setTipo_Cuenta($_POST['Tipo_Cuenta']);
		$datos_económicos->setCta_Bancaria($_POST['Nro_Cuenta']);
		$datos_económicos->setidRepresentantes($datos_representante->getidRepresentantes());
		$datos_económicos->editarDatoseconómicos($idRepresentante);

		#Datos vivienda
		$datos_vivienda->setCondiciones_Vivienda($_POST['Condición_vivienda_R']);
		$datos_vivienda->setTipo_Vivienda($_POST['Tipo_Vivienda']);

		#Si marca la tenencia como otro. Asume el texto ingresado en la casilla

		if ($_POST['Tenencia_Vivienda'] == "Otro") {
			$datos_vivienda->setTenencia_vivienda($_POST['Tenencia_vivienda_R_Otro']);
		}
		else{
			$datos_vivienda->setTenencia_Vivienda($_POST['Tenencia_Vivienda']);
		
		if ($_POST["Tenencia_Vivienda"] == "Otro") {
			$datos_vivienda->setTenencia_vivienda($_POST['Tenencia_vivienda_R_Otro']);
		}
		else{
			$datos_vivienda->setTenencia_vivienda($_POST['Tenencia_Vivienda']);
		}

		$datos_vivienda->setidRepresentante($datos_representante->getidRepresentantes());
		$datos_vivienda->editarDatosVivienda($idRepresentante);

		//
		// DATOS DEL CONTACTO AUXILIAR
		//

		$datos_auxiliar->setPrimer_Nombre($_POST['Primer_Nombre_Aux']);
		$datos_auxiliar->setSegundo_Nombre($_POST['Segundo_Nombre_Aux']);
		$datos_auxiliar->setPrimer_Apellido($_POST['Primer_Apellido_Aux']);
		$datos_auxiliar->setSegundo_Apellido($_POST['Segundo_Apellido_Aux']);
		$datos_auxiliar->setRelación($_POST['Relación_Auxiliar']);
		$datos_auxiliar->setPrefijo($_POST['Prefijo_Auxiliar_R']);
		$datos_auxiliar->setNúmero_Telefónico($_POST['Teléfono_Auxiliar_R']);		
		// $Cédula_auxiliar = $_POST['Tipo_Cédula_Aux'].$_POST['Cédula_Aux'];
		// $persona->setCédula($Cédula_auxiliar);
		// $persona->setGénero($_POST['Género_Aux']);
		// $persona->setCorreo_Electrónico($_POST['Correo_electrónico_Aux']);
		// $persona->setDirección($_POST['Dirección_Aux']);

		$datos_auxiliar->editarContactoAuxiliar($datos_auxiliar->getidContactoAuxiliar());

		//
		// Teléfonos del auxiliar
		//

		#Teléfono secundario
		// $Teléfonos->setPrefijo($_POST['Prefijo_Secundario_Aux']);
		// $Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Secundario_Aux']);
		// $Teléfonos->setRelación_Teléfono('Secundario');
		// $Teléfonos->setCédula_Persona($persona->getCédula());

		// $Teléfonos->editarTeléfono($Cédula_auxiliar);

		#Teléfono auxiliar
		// $Teléfonos->setPrefijo($_POST['Prefijo_Auxiliar_Aux']);
		// $Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Auxiliar_Aux']);
		// $Teléfonos->setRelación_Teléfono('Auxiliar');
		// $Teléfonos->setCédula_Persona($persona->getCédula());

		// $Teléfonos->editarTeléfono($Cédula_auxiliar);

		//
		//
		// PARTE DE LA MADRE
		//
		//

		$persona->setPrimer_Nombre($_POST['Primer_Nombre_Madre']);
		$persona->setSegundo_Nombre($_POST['Segundo_Nombre_Madre']);
		$persona->setPrimer_Apellido($_POST['Primer_Apellido_Madre']);
		$persona->setSegundo_Apellido($_POST['Segundo_Apellido_Madre']);

		$Cédula_madre = $_POST['Tipo_Cédula_Madre'].$_POST['Cédula_Madre'];
		$persona->setCédula($Cédula_madre);

		$persona->setFecha_Nacimiento($_POST['Fecha_Nacimiento_Madre']);
		$persona->setLugar_Nacimiento($_POST['Lugar_Nacimiento_Madre']);
		$persona->setCorreo_Electrónico($_POST['Correo_electrónico_Madre']);
		$persona->setDirección($_POST['Dirección_Madre']);
		$persona->setEstado_Civil($_POST['Estado_Civil_Madre']);

		$persona->editarPersonaC($Cédula_madre);

		$madre = $datos_madre->consultarMadreC($Cédula_madre);
		$idMadre = $madre['idMadre'];

		$datos_madre->setCédula_Persona($Cédula_madre);

		if ($_POST['Reside_En_El_País_Ma'] == "Si") {
			$datos_madre->setPaís_ResidenciaMa('Venezuela');
		}
		else {
			$datos_madre->setPaís_ResidenciaMa($_POST['País_Ma']);
		}
		$datos_madre->setGrado_AcadémicoMa($_POST['Grado_Instrucción_Ma']);		

		$datos_madre->editarMadre($madre['idMadre']);

		//Consulta la madre

		$conexion = conectarBD();

		$sql = "SELECT * FROM `madre` WHERE `Cédula_Persona` = '$Cédula_madre'";

		$consulta_madre = $conexion->query($sql) or die("error: ".$conexion->error);
		$representantes = $consulta_madre->fetch_assoc();
		$idMadre = $madre['idMadre'];

		desconectarBD($conexion);

		//
		// DATOS LABORALES MADRE
		//

		#Si se marca que si tiene empleo, se asignan los datos, sino, se asigna como desempleado
		if ($_POST['Madre_Trabaja'] == "No") {
			$datos_laborales_ma->setEmpleoMa("Desempleado");
		}
		else {
			$datos_laborales_ma->setEmpleoMa($_POST['Empleo_Ma']);
			$datos_laborales_ma->setLugar_TrabajoMa($_POST['Lugar_Trabajo_Ma']);
			$datos_laborales_ma->setRemuneraciónMa($_POST['Remuneración_Ma']);
			$datos_laborales_ma->setTipo_RemuneraciónMa($_POST['Tipo_Remuneración_Ma']);
		}

		$datos_laborales_ma->setidMadre($datos_madre->getidMadre());
		$datos_laborales_ma->editarDatosLaborales_Ma($idMadre);

		#Datos vivienda
		$datos_vivienda_ma->setCondiciones_ViviendaMa($_POST['Condición_vivienda_Ma']);
		$datos_vivienda_ma->setTipo_ViviendaMa($_POST['Tipo_Vivienda_Ma']);

		#Si marca la tenencia como otro. Asume el texto ingresado en la casilla
		if ($_POST['Tenencia_vivienda_Ma'] == "Otro") {
			$datos_vivienda_ma->setTenencia_viviendaMa($_POST['Tenencia_vivienda_Ma_Otro']);
		}
		else{
			$datos_vivienda_ma->setTenencia_viviendaMa($_POST['Tenencia_vivienda_Ma']);
		}

		$datos_vivienda_ma->setidMadre($datos_madre->getidMadre());
		$datos_vivienda_ma->editarDatosVivienda_Ma($idMadre);

		//
		// Teléfonos de la madre
		//		

		#Teléfono principal
		$Teléfonos->setPrefijo($_POST['Prefijo_Principal_Madre']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Principal_Madre']);
		$Teléfonos->setRelación_Teléfono('Principal');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->editarTeléfono($Cédula_madre);

		#Teléfono secundario
		$Teléfonos->setPrefijo($_POST['Prefijo_Secundario_Madre']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Secundario_Madre']);
		$Teléfonos->setRelación_Teléfono('Secundario');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->editarTeléfono($Cédula_madre);	

		#Teléfono trabajo
		$Teléfonos->setPrefijo($_POST['Prefijo_Trabajo_Ma']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Trabajo_Ma']);
		$Teléfonos->setRelación_Teléfono('Trabajo');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->editarTeléfono($Cédula_madre);		

		//
		//
		// PARTE DEL PADRE
		//
		//		

		$persona->setPrimer_Nombre($_POST['Primer_Nombre_Padre']);
		$persona->setSegundo_Nombre($_POST['Segundo_Nombre_Padre']);
		$persona->setPrimer_Apellido($_POST['Primer_Apellido_Padre']);
		$persona->setSegundo_Apellido($_POST['Segundo_Apellido_Padre']);

		$Cédula_padre = $_POST['Tipo_Cédula_Padre'].$_POST['Cédula_Padre'];
		$persona->setCédula($Cédula_padre);

		$persona->setFecha_Nacimiento($_POST['Fecha_Nacimiento_Padre']);
		$persona->setLugar_Nacimiento($_POST['Lugar_Nacimiento_Padre']);
		$persona->setCorreo_Electrónico($_POST['Correo_electrónico_Padre']);
		$persona->setDirección($_POST['Dirección_Padre']);
		$persona->setEstado_Civil($_POST['Estado_Civil_Padre']);

		$persona->editarPersonaC($Cédula_padre);

		$padre = $datos_padre->consultarPadreC($Cédula_padre);
		$idPadre = $padre['idPadre'];

		$datos_padre->setCédula_Persona($Cédula_padre);

		if ($_POST['Reside_En_El_País_Pa'] == "Si") {
			$datos_padre->setPaís_Residencia('Venezuela');
		}
		else {
			$datos_padre->setPaís_Residencia($_POST['País_Pa']);
		}
		$datos_padre->setGrado_AcadémicoPa($_POST['Grado_Instrucción_Pa']);		

		$datos_padre->editarPadre($padre['idPadre']);

		//Consulta el padre

		$conexion = conectarBD();		
		
		$sql = "SELECT * FROM `padre` WHERE `Cédula_Persona` = '$Cédula_padre'";

		$consulta_padre = $conexion->query($sql) or die("error: ".$conexion->error);
		$padre = $consulta_padre->fetch_assoc();

		$idPadre = $padre['idPadre'];

		desconectarBD($conexion);

		//
		// DATOS LABORALES PADRE
		//

		#Si se marca que si tiene empleo, se asignan los datos, sino, se asigna como desempleado
		if ($_POST['Padre_Trabaja'] == "No") {
			$datos_laborales_pa->setEmpleoPa("Desempleado");
		}
		else {
			$datos_laborales_pa->setEmpleoPa($_POST['Empleo_Pa']);
			$datos_laborales_pa->setLugar_TrabajoPa($_POST['Lugar_Trabajo_Pa']);
			$datos_laborales_pa->setRemuneraciónPa($_POST['Remuneración_Pa']);
			$datos_laborales_pa->setTipo_RemuneraciónPa($_POST['Tipo_Remuneración_Pa']);
		}

		$datos_laborales_pa->setidPadre($datos_padre->getidPadre());
		$datos_laborales_pa->editarDatosLaborales_Pa($idPadre);

		#Datos vivienda
		$datos_vivienda_pa->setCondiciones_ViviendaPa($_POST['Condición_vivienda_Pa']);
		$datos_vivienda_pa->setTipo_ViviendaPa($_POST['Tipo_Vivienda_Pa']);

		#Si marca la tenencia como otro. Asume el texto ingresado en la casilla
		if ($_POST['Tenencia_vivienda_Pa'] == "Otro") {
			$datos_vivienda_pa->setTenencia_viviendaPa($_POST['Tenencia_vivienda_Pa_Otro']);
		}
		else {
			$datos_vivienda_pa->setTenencia_viviendaPa($_POST['Tenencia_vivienda_Pa']);
		}

		$datos_vivienda_pa->setidPadre($datos_padre->getidPadre());
		$datos_vivienda_pa->editarDatosVivienda_Pa($idPadre);

		//
		// Teléfonos del padre
		//

		#Teléfono principal
		$Teléfonos->setPrefijo($_POST['Prefijo_Principal_Padre']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Principal_Padre']);
		$Teléfonos->setRelación_Teléfono('Principal');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->editarTeléfono($Cédula_padre);

		#Teléfono secundario
		$Teléfonos->setPrefijo($_POST['Prefijo_Secundario_Padre']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Secundario_Padre']);
		$Teléfonos->setRelación_Teléfono('Secundario');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->editarTeléfono($Cédula_padre);

		#Teléfono trabajo
		$Teléfonos->setPrefijo($_POST['Prefijo_Trabajo_Pa']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Trabajo_Pa']);
		$Teléfonos->setRelación_Teléfono('Trabajo');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->editarTeléfono($Cédula_padre);

		//
		//
		// PARTE DEL ESTUDIANTE
		//
		//

		$persona->setPrimer_Nombre($_POST['Primer_Nombre_Est']);
		$persona->setSegundo_Nombre($_POST['Segundo_Nombre_Est']);
		$persona->setPrimer_Apellido($_POST['Primer_Apellido_Est']);
		$persona->setSegundo_Apellido($_POST['Segundo_Apellido_Est']);

		$Cédula_estudiante = $_POST['Tipo_Cédula_Est'].$_POST['Cédula_Est'];
		$persona->setCédula($Cédula_estudiante);

		$persona->setFecha_Nacimiento($_POST['Fecha_Nacimiento_Est']);
		$persona->setLugar_Nacimiento($_POST['Lugar_Nacimiento_Est']);
		$persona->setGénero($_POST['Género_Est']);
		$persona->setCorreo_Electrónico($_POST['Correo_electrónico_Est']);
		$persona->setDirección($_POST['Dirección_Est']);
		$persona->setEstado_Civil('Soltero(a)');

		$persona->editarPersonaC($Cédula_estudiante);

		$datos_estudiante->setPlantel_Procedencia($_POST['Plantel_Procedencia']);
		$datos_estudiante->setCon_Quién_Vive($_POST['Con_Quién_Vive']);
		$datos_estudiante->setCédula_Estudiante($Cédula_estudiante);
		$datos_estudiante->setidRepresentante($idRepresentante);
		$datos_estudiante->setidPadre($idPadre);
		$datos_estudiante->setidPadre($idMadre);
		$datos_estudiante->setRelación_Representante($_POST['Vinculo_R']);

		$datos_estudiante->editarEstudiante($Cédula_estudiante);


		$estudiante = $datos_estudiante->consultarEstudiante($Cédula_estudiante);

		$idEstudiante = $estudiante['idEstudiantes'];
		//
		// Teléfonos del estudiante
		//

		#Teléfono principal
		$Teléfonos->setPrefijo($_POST['Prefijo_Principal_Est']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Principal_Est']);
		$Teléfonos->setRelación_Teléfono('Principal');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->editarTeléfono($Cédula_estudiante);

		#Teléfono secundario
		$Teléfonos->setPrefijo($_POST['Prefijo_Secundario_Est']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Secundario_Est']);
		$Teléfonos->setRelación_Teléfono('Secundario');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->editarTeléfono($Cédula_estudiante);

		#Teléfono secundario
		$Teléfonos->setPrefijo($_POST['Prefijo_Secundario_Est']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Secundario_Est']);
		$Teléfonos->setRelación_Teléfono('Auxiliar');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->editarTeléfono($Cédula_estudiante);

		//
		//	Datos de salud
		//

		$datos_salud->setEstatura($_POST['Talla']);
		$datos_salud->setPeso($_POST['Peso']);
		$datos_salud->setÍndice($_POST['Índice']);
		$datos_salud->setCirc_Braquial($_POST['C_Braquial']);
		$datos_salud->setLateralidad($_POST['Lateralidad']);
		$tipo_sangre = $_POST['Grupo_Sanguineo'].$_POST['Factor_Rhesus'];
		$datos_salud->setTipo_Sangre($tipo_sangre);

		if ($_POST['Tiene_Dieta_Especial'] == "Si") {
			$datos_salud->setDieta_Especial($_POST['Dieta_Especial']);
		}

		if ($_POST['Tiene_Carnet_Discapacidad'] == "Si") {
			$datos_salud->setCarnet_Discapacidad($_POST['Nro_Carnet_Discapacidad']);
		}

		if ($_POST['Recibe_Atención_Inst'] == "Si") {
			$datos_salud->setInstitución_médica($_POST['Institución_médica']);
		}

		if ($_POST['Padece_Enfermedad'] == "Si") {
			$datos_salud->setEnfermedad($_POST['Cual_Enfermedad']);
		}

		$impedimentos = "";

		if (isset($_POST['Condiciones_Salud'])) {
			foreach ($_POST['Condiciones_Salud'] as $impedimento) {
				$impedimentos .= $impedimento.", ";
			}
			#elimina el ", " al final de la cadena de texto
			$datos_salud->setImpedimento_Físico(substr($impedimentos,0,-2));
		}
		else {
			$datos_salud->setImpedimento_Físico(NULL);
		}
		$datos_salud->setNecesidad_educativa($_POST['Necesidad_educativa']);
		$datos_salud->setVacunado($_POST['Vacunado']);
		$datos_salud->setVacuna($_POST['Vacuna']);
		$datos_salud->setDosis($_POST['Dosis']);
		$datos_salud->setLote($_POST['Lote']);
		$datos_salud->setCond_Vista($_POST['Condición_Vista']);
		$datos_salud->setCond_Dental($_POST['Condición_Dentadura']);
		$datos_salud->editarFicha_médica($datos_estudiante->getidEstudiantes());

		//
		//	Datos sociales del estudiante
		//

		$datos_sociales->setPosee_Canaima($_POST['Tiene_Canaima']);
		if ($_POST['Tiene_Canaima'] == "Si") {
			$datos_sociales->setCondición_Canaima($_POST['Condiciones_Canaima']);
		}
		$datos_sociales->setAcceso_Internet($_POST['Internet_Vivienda']);

		$datos_sociales->editarDatosSociales($datos_estudiante->getidEstudiantes());

		//
		//	Datos de tallas del estudiante
		//

		$datos_tallas->setTalla_Camisa($_POST['Talla_Camisa']);
		$datos_tallas->setTalla_Pantalón($_POST['Talla_Pantalón']);
		$datos_tallas->setTalla_Zapatos($_POST['Talla_Zapatos']);

		$datos_tallas->editarTallasEstudiante($datos_estudiante->getidEstudiantes());

		//
		//	Datos del carnet de la patria del estudiante
		//

		if ($_POST['Tiene_Carnet_Patria_Est'] == "Si") {
			$carnet->setCódigo_Carnet($_POST['Código_Carnet_Patria_Est']);
			$carnet->setSerial_Carnet($_POST['Serial_Carnet_Patria_Est']);
		}

		$carnet->setCédula_Persona($persona->getCédula());

		$carnet->editarCarnetPatria();

		$grado->setGrado_A_Cursar($_POST['Grado_A_Cursar']);
		$grado->editarGrado($datos_estudiante->getidEstudiantes(),$año_escolar->getInicio_Año_Escolar(),$año_escolar->getFin_Año_Escolar());


		if ($_POST['Estudiante_Repitente'] == "Si") {
			#Si repite año
			$estudiante_repitente->getAño_Repetido($_POST['Año_Repitente']);
			$estudiante_repitente->getQue_Materias_Repite($_POST['Materias_Repitente']);
		}
		if ($_POST['Tiene_Materias_Pendientes'] == "Si") {
			#Si tiene materias pendientes
			$estudiante_repitente->getMaterias_Pendientes($_POST['Materias_Pendientes']);
		}

		$estudiante_repitente->editarEstudiantesRepitentes($datos_estudiante->getidEstudiantes());

		//
		//	Observaciones sobre el estudiante
		//
		$observaciones->setSocial($_POST['observaciones_Social']);
		$observaciones->setFísico($_POST['observaciones_Fisico']);
		$observaciones->setPersonal($_POST['observaciones_Personal']);
		$observaciones->setFamiliar($_POST['observaciones_Familiar']);
		$observaciones->setAcadémico($_POST['observaciones_Academico']);
		$observaciones->setOtra($_POST['observaciones_Otra']);
		$observaciones->setidEstudiantes($datos_estudiante->getidEstudiantes());

		$observaciones->editarObservaciones($idEstudiante);

		header('Location: ../lobby/consultar.php?exito');
	}

	elseif ($orden == "Eliminar") {
		$datos_estudiante->eliminarEstudiante($_POST['Cédula_Estudiante']);
		header('Location: ../lobby/consultar.php');
	}
	else {
		echo "La orden: ' ". $orden . " ' no es valida.";
		header('Location: ../lobby/index.php');
	}
}
else {
	header('Location: index.php');
}




?>

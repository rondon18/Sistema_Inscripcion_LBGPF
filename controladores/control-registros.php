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
require_once('../clases/laborales-representantes.php');
require_once('../clases/económicos-representantes.php');
require_once('../clases/vivienda-representantes.php');
require_once('../clases/contactos-auxiliares.php');


require_once('../clases/estudiante.php');
require_once('../clases/ficha-médica.php');
require_once('../clases/sociales-estudiantes.php');
require_once('../clases/tallas-estudiantes.php');
require_once('../clases/tallas-estudiantes.php');
require_once('../clases/estudiantes-repitentes.php');
require_once('../clases/observaciones-estudiantes.php');

require_once('../clases/padres.php');

require_once('../clases/carnet-patria.php');
require_once('../clases/grado.php');
require_once('../clases/año-escolar.php');


$persona = new Personas();
$Teléfonos = new Teléfonos();
$carnet = New CarnetPatria();

$datos_representante = New Representantes();
$datos_vivienda = New DatosVivienda();
$datos_económicos = New Datoseconómicos();
$datos_laborales = New DatosLaborales();

$datos_padre = new Padres();

$datos_estudiante	= new Estudiantes();
$datos_salud	= new Fichamédica();
$datos_sociales = new DatosSociales();
$datos_tallas = new TallasEstudiante();

$año_escolar = new Año_Escolar();
$grado = new GradoAcadémico();
$estudiante_repitente = new EstudiantesRepitentes();


if (isset($_POST['orden']) and $_POST['orden']) {

	$orden = $_POST['orden'];

	if ($orden == "Insertar") {

		foreach ($_POST as $key => $value) {
			echo $key.">>";
			var_dump($value);
			echo "<br><br>";
		}

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
		$datos_representante->setGrado_Académico($_POST['Grado_Instrucción']);

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
		  $datos_laborales->setRemuneración($_POST['Remuneración']);
		  $datos_laborales->setTipo_Remuneración($_POST['Tipo_Remuneración']);
		}

		$datos_laborales->setidRepresentantes($datos_representante->getidRepresentantes());
		$datos_laborales->insertarDatosLaborales();

		#Datos económicos
		$datos_económicos->setBanco($_POST['Banco']);
		$datos_económicos->setTipo_Cuenta($_POST['Tipo_Cuenta']);
		$datos_económicos->setCta_Bancaria($_POST['Nro_Cuenta']);
		$datos_económicos->setidRepresentantes($datos_representante->getidRepresentantes());
		$datos_económicos->insertarDatoseconómicos();

		#Datos vivienda
		$datos_vivienda->setCondiciones_Vivienda($_POST['Condición_vivienda']);
		$datos_vivienda->setTipo_Vivienda($_POST['Tipo_Vivienda']);

		#Si marca la tenencia como otro. Asume el texto ingresado en la casilla
		if ($_POST['Tenencia_vivienda_Otro'] == "Otro") {
		  $datos_vivienda->setTenencia_Vivienda($_POST['Tenencia_vivienda_Otro']);
		}
		else{
		  $datos_vivienda->setTenencia_Vivienda($_POST['Tenencia_vivienda']);
		}

		$datos_vivienda->setidRepresentante($datos_representante->getidRepresentantes());
		$datos_vivienda->insertarDatosVivienda();

		//
		// DATOS DEL CONTACTO AUXILIAR
		//

		$persona->setPrimer_Nombre($_POST['Primer_Nombre_Aux']);
		$persona->setSegundo_Nombre($_POST['Segundo_Nombre_Aux']);
		$persona->setPrimer_Apellido($_POST['Primer_Apellido_Aux']);
		$persona->setSegundo_Apellido($_POST['Segundo_Apellido_Aux']);
		$Cédula_auxiliar = $_POST['Tipo_Cédula_Aux'].$_POST['Cédula_Aux'];
		$persona->setCédula($Cédula_auxiliar);
		$persona->setGénero($_POST['Género_Aux']);
		$persona->setCorreo_Electrónico($_POST['Correo_electrónico_Aux']);
		$persona->setDirección($_POST['Dirección_Aux']);

		$persona->insertarPersona();

		//
		// Teléfonos del auxiliar
		//

		#Teléfono principal
		$Teléfonos->setPrefijo($_POST['Prefijo_Principal_Aux']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Principal_Aux']);
		$Teléfonos->setRelación_Teléfono('Principal');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->insertarTeléfono();

		#Teléfono secundario
		$Teléfonos->setPrefijo($_POST['Prefijo_Secundario_Aux']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Secundario_Aux']);
		$Teléfonos->setRelación_Teléfono('Secundario');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->insertarTeléfono();

		#Teléfono auxiliar
		$Teléfonos->setPrefijo($_POST['Prefijo_Auxiliar_Aux']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Auxiliar_Aux']);
		$Teléfonos->setRelación_Teléfono('Auxiliar');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->insertarTeléfono();

		//
		//	Datos del auxiliar
		//

		$datos_auxiliar->setRelación($_POST['Relación_Auxiliar']);
		$datos_auxiliar->setCédula_Persona($persona->getCédula());
		$datos_auxiliar->setidRepresentante($datos_representante->getidRepresentantes());

		$datos_auxiliar->insertarContactoAuxiliar();

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
		if ($_POST['Reside_En_El_País'] == "Si") {
			$datos_padre->setPaís_Residencia('Venezuela');
		}

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

		#Teléfono auxiliar
		$Teléfonos->setPrefijo('Prefijo_Secundario_Aux');
		$Teléfonos->setNúmero_Telefónico('Teléfono_Secundario_Aux');
		$Teléfonos->setRelación_Teléfono('Auxiliar');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->insertarTeléfono();

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
		$datos_estudiante->setidPadre($datos_padre->getidPadres());

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
		$datos_salud->setAlergias($_POST['Alergias']);
		$datos_salud->setCond_Vista($_POST['Condición_Vista']);
		$datos_salud->setCond_Dental($_POST['Condición_Dentadura']);
		$datos_salud->insertarFicha_médica($datos_estudiante->getidEstudiantes());

		//
		//	Datos sociales del estudiante
		//

		$datos_sociales->setPosee_Canaima($_POST['Tiene_Canaima']);
		if ($_POST['Posee_Canaima'] == "Si") {
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

	}

	elseif ($orden == "Editar") {


		$id = $_POST['id'];

		$estudiante->setPrimerNombre($_POST['PrimerNombre']);
		$estudiante->setSegundoNombre($_POST['SegundoNombre']);
		$estudiante->setPrimerApellido($_POST['PrimerApellido']);
		$estudiante->setSegundoApellido($_POST['SegundoApellido']);
		$estudiante->setGénero($_POST['Género']);
		$estudiante->setCédula($_POST['Cédula']);
		$estudiante->setTipoCédula($_POST['TipoCédula']);
		$estudiante->setCédulaRepresentante($_POST['CédulaRepresentante']);
		$estudiante->setFechaNacimiento($_POST['FechaNacimiento']);
		$estudiante->setEstado($_POST['Estado']);
		$estudiante->setMunicipio($_POST['Municipio']);
		$estudiante->setParroquia($_POST['Parroquia']);
		$estudiante->setCiudad($_POST['Ciudad']);
		$estudiante->setPuedeIrseSolo($_POST['PuedeIrseSolo']);
		$estudiante->setContactoAuxiliar($_POST['ContactoAuxiliar']);
		$estudiante->setTeléfonoAuxiliar($_POST['TeléfonoAuxiliar']);
		$estudiante->setRelacionAuxiliar($_POST['RelacionAuxiliar']);
		$estudiante->setEstatura($_POST['Estatura']);
		$estudiante->setPeso($_POST['Peso']);
		$estudiante->setGrupoSanguineo($_POST['GrupoSanguineo']);
		$estudiante->setmédicación($_POST['médicación']);
		$estudiante->setDietaEspecial($_POST['DietaEspecial']);
		$estudiante->setImpedimentoFisico($_POST['ImpedimentoFisico']);
		$estudiante->setAlergias($_POST['Alergias']);
		$estudiante->setProblemasVista($_POST['ProblemasVista']);
		$estudiante->setProblemasSalud($_POST['ProblemasSalud']);
		$estudiante->setGrado($_POST['Grado']);
		$estudiante->setTipoInscripción($_POST['TipoInscripción']);

		$crud->editarEstudiante($estudiante);
	}

	elseif ($orden == "Eliminar") {
		$datos_estudiante->eliminarEstudiante($_POST['Cédula_Estudiante']);
		#header('Location: ../lobby/consultar.php');
	}
	else {
		echo "La orden: ' ". $orden . " ' no es valida.";
	#	header('Location: ../lobby/index.php');
	}
}
else {
	#header('Location: index.php');
}




?>

<?php

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

require('../controladores/conexion.php');

require('../clases/personas.php');
require('../clases/telefonos.php');
require('../clases/representantes.php');
require('../clases/contactos-auxiliares.php');
require('../clases/laborales-representantes.php');
require('../clases/economicos-representantes.php');
require('../clases/vivienda-representantes.php');

#Representante
$representante	= new Personas();
$datos_representante	= new Representantes();

$telefonoP = new Telefonos();
$telefonoS = new Telefonos();
$telefonoA = new Telefonos();
$telefonoT = new Telefonos();

$datos_laborales = new DatosLaborales();
$datos_economicos = new DatosEconomicos();
$datos_vivienda = new DatosVivienda();

#Contacto auxiliar del representante
$contacto_aux new Personas();
$datos_contacto_aux = new ContactoAuxiliar();

$telefonoP_Aux = new Telefonos();
$telefonoS_Aux = new Telefonos();
$telefonoA_Aux = new Telefonos();

if (isset($_POST['orden']) and $_POST['orden']) {

	$orden = $_POST['orden'];

	if ($orden == "Insertar") {
		#Persona
		$representante->setPrimer_Nombre($_POST['Primer_Nombre_R']);
		$representante->setSegundo_Nombre($_POST['Segundo_Nombre_R']);
		$representante->setPrimer_Apellido($_POST['Primer_Apellido_R']);
		$representante->setSegundo_Apellido($_POST['Segundo_Apellido_R']);
		$representante->setCédula($_POST['Cédula_R']);
		$representante->setFecha_Nacimiento($_POST['Fecha_Nacimiento_R']);
		$representante->setLugar_Nacimiento($_POST['Lugar_Nacimiento_R']);
		$representante->setGénero($_POST['Genero_R']);
		$representante->setCorreo_Electrónico($_POST['Correo_electrónico_R']);
		$representante->setDirección($_POST['Direccion_R']);
		$representante->setEstado_Civil($_POST['Estado_Civil_R']);

		$representante->insertarPersona();

		#Telefono principal
		$telefonoP->setPrefijo($_POST['Prefijo_Principal_R']);
		$telefonoP->setNúmero_Telefónico($_POST['Teléfono_Principal_R']);
		$telefonoP->setRelación_Teléfono('Principal');
		$telefonoP->setCedula_Persona($persona->getCédula());

		$telefonoP->insertarTelefono();

		#Telefono secundario
		$telefonoS->setPrefijo($_POST['Prefijo_Secundario_R']);
		$telefonoS->setNúmero_Telefónico($_POST['Teléfono_Secundario_R']);
		$telefonoS->setRelación_Teléfono('Secundario');
		$telefonoS->setCedula_Persona($persona->getCédula());

		$telefonoS->insertarTelefono();

		#Telefono auxiliar
		$telefonoA->setPrefijo($_POST['Prefijo_Auxiliar_R']);
		$telefonoA->setNúmero_Telefónico($_POST['Teléfono_Auxiliar_R']);
		$telefonoA->setRelación_Teléfono('Auxiliar');
		$telefonoA->setCedula_Persona($persona->getCédula());

		$telefonoA->insertarTelefono();

		#Telefono del trabajo
		$telefonoT->setPrefijo($_POST['Prefijo_Trabajo_R']);
		$telefonoT->setNúmero_Telefónico($_POST['Teléfono_Trabajo_R']);
		$telefonoT->setRelación_Teléfono('Trabajo');
		$telefonoT->setCedula_Persona($persona->getCédula());

		$telefonoT->insertarTelefono();

		#Representante
		#Verifica si el vinculo es distinto a madre o padre
		if ($_POST['Vinculo_R'] == "Otro") {
			$representante->setVinculo($_POST['Otro_Vinculo']);
		}
		else {
			$representante->setVinculo($_POST['Vinculo_R']);
		}

		$representante->setCedula_Persona($persona->getCédula());
		$representante->setGrado_Academico($_POST['Grado_Instrucción']);

		$representante->insertarRepresentante();

		#Datos laborales

		#Si se marca que si, se asignan los datos
		if ($_POST['Representante_Trabaja'] == "No") {
			$datos_laborales->setEmpleo("Desempleado");
		}
		else {
			$datos_laborales->setEmpleo($_POST['Empleo_R']);
			$datos_laborales->setLugar_Trabajo($_POST['Lugar_Trabajo_R']);
			$datos_laborales->setRemuneración($_POST['Remuneración']);
			$datos_laborales->setTipo_Remuneración($_POST['Tipo_Remuneracion']);

		}

		$datos_laborales->setidRepresentantes($representante->getidRepresentantes());
		$datos_laborales->insertarDatosLaborales();

		#Datos economicos
		$datos_economicos->setBanco($_POST['Banco']);
		$datos_economicos->setTipo_Cuenta($_POST['Tipo_Cuenta']);
		$datos_economicos->setCta_Bancaria($_POST['Nro_Cuenta']);
		$datos_economicos->setidRepresentantes($representante->getidRepresentantes());
		$datos_economicos->insertarDatosEconomicos();

		#Datos vivienda
		$datos_vivienda->setCondiciones_Vivienda($_POST['Condicion_vivienda']);
		$datos_vivienda->setTipo_Vivienda($_POST['Tipo_Vivienda']);
		$datos_vivienda->setTenencia_Vivienda($_POST['Tenencia_vivienda']);
		$datos_vivienda->setidRepresentante($representante->getidRepresentantes());
		$datos_vivienda->insertarDatosVivienda();

		#Datos del contacto auxiliar

		#Persona
		$persona_auxiliar->setPrimer_Nombre($_POST['Primer_Nombre_Aux']);
		$persona_auxiliar->setSegundo_Nombre($_POST['Segundo_Nombre_Aux']);
		$persona_auxiliar->setPrimer_Apellido($_POST['Primer_Apellido_Aux']);
		$persona_auxiliar->setSegundo_Apellido($_POST['Segundo_Apellido_Aux']);
		$persona_auxiliar->setCédula($_POST['Cédula_Aux']);
		$persona_auxiliar->setFecha_Nacimiento($_POST['Fecha_Nacimiento_Aux']);
		$persona_auxiliar->setLugar_Nacimiento($_POST['Lugar_Nacimiento_Aux']);
		$persona_auxiliar->setGénero($_POST['Genero_Aux']);
		$persona_auxiliar->setCorreo_Electrónico($_POST['Correo_electrónico_Aux']);
		$persona_auxiliar->setDirección($_POST['Direccion_Aux']);
		$persona_auxiliar->setEstado_Civil($_POST['Estado_Civil_Aux']);

		$persona_auxiliar->insertarPersona();

		#Telefono principal
		$telefonoP->setPrefijo($_POST['Prefijo_Principal_Aux']);
		$telefonoP->setNúmero_Telefónico($_POST['Teléfono_Principal_Aux']);
		$telefonoP->setRelación_Teléfono('Principal');
		$telefonoP->setCedula_Persona($persona_auxiliar->getCédula());

		$telefonoP->insertarTelefono();

		#Telefono secundario
		$telefonoS->setPrefijo($_POST['Prefijo_Secundario_Aux']);
		$telefonoS->setNúmero_Telefónico($_POST['Teléfono_Secundario_Aux']);
		$telefonoS->setRelación_Teléfono('Secundario');
		$telefonoS->setCedula_Persona($persona_auxiliar->getCédula());

		$telefonoS->insertarTelefono();

		#Telefono auxiliar
		$telefonoA->setPrefijo($_POST['Prefijo_Auxiliar_Aux']);
		$telefonoA->setNúmero_Telefónico($_POST['Teléfono_Auxiliar_Aux']);
		$telefonoA->setRelación_Teléfono('Auxiliar');
		$telefonoA->setCedula_Persona($persona_auxiliar->getCédula());

		$telefonoA->insertarTelefono();

		#datos auxiliar
		$contacto_aux->setRelación($_POST['Relación_Auxiliar']);
		$contacto_aux->setCédula_Persona($persona_auxiliar->getCédula());

		$contacto_aux->insertarContactoAuxiliar($representante->getidRepresentantes());
/*
		#Persona -> padre
		$padre->setPrimer_Nombre($_POST['Primer_Nombre_Familiar']);
		$padre->setSegundo_Nombre($_POST['Segundo_Nombre_Familiar']);
		$padre->setPrimer_Apellido($_POST['Primer_Apellido_Familiar']);
		$padre->setSegundo_Apellido($_POST['Segundo_Apellido_Familiar']);
		$padre->setCédula($_POST['Cédula_Familiar']);
		$padre->setFecha_Nacimiento($_POST['Fecha_Nacimiento_Familiar']);
		$padre->setLugar_Nacimiento($_POST['Lugar_Nacimiento_Familiar']);
		$padre->setGénero($_POST['Genero_Familiar']);
		$padre->setCorreo_Electrónico($_POST['Correo_electrónico_Familiar']);
		$padre->setDirección($_POST['Direccion_Familiar']);
		$padre->setEstado_Civil($_POST['Estado_Civil_Familiar']);

		$padre->insertarPersona();

		$datos_padre->setCedula_Persona($padre->getCédula());
		$datos_padre->setParentezco($_POST['Vinculo_Familiar']);
		$datos_padre->insertarPadres();
*/

		#Persona -> estudiante -> datos sociales, medicos y tallas
		#datos basicos del estudiante
		$estudiante->setPrimer_Nombre($_POST['Primer_Nombre_Est']);
		$estudiante->setSegundo_Nombre($_POST['Segundo_Nombre_Est']);
		$estudiante->setPrimer_Apellido($_POST['Primer_Apellido_Est']);
		$estudiante->setSegundo_Apellido($_POST['Segundo_Apellido_Est']);
		$estudiante->setCédula($_POST['Cedula_Est']);
		$estudiante->setFecha_Nacimiento($_POST['Fecha_Nacimiento_Est']);
		$estudiante->setLugar_Nacimiento($_POST['Lugar_Nacimiento_Est']);
		$estudiante->setGénero($_POST['Genero_Est']);
		$estudiante->setCorreo_Electrónico($_POST['Correo_electrónico_Est']);
		$estudiante->setDirección($_POST['Direccion_Est']);
		$estudiante->setEstado_Civil("Soltero(a)");

		$estudiante->insertarPersona();

		$datos_estudiante->setCedula_Estudiante($_POST['Cedula_Est']);
		$datos_estudiante->setPlantel_Procedencia($_POST['Plantel_Procedencia']);
		$datos_estudiante->setCon_Quien_Vive($_POST['Con_Quien_Vive']);
		$datos_estudiante->setidRepresentante($_SESSION['representante']['idRepresentantes']);
		$datos_estudiante->setidPadre($datos_padre->getidPadres());

		$datos_estudiante->insertarEstudiante();

		#datos medicos
		$datos_salud->setEstatura($_POST['Talla']);
		$datos_salud->setPeso($_POST['Peso']);
		$datos_salud->setIndice($_POST['Indice']);
		$datos_salud->setCirc_Braquial($_POST['C_Braquial']);
		$datos_salud->setLateralidad($_POST['Lateralidad']);
		$datos_salud->setTipo_Sangre($_POST['Grupo_Sanguineo'].$_POST['Factor_Rhesus']);
		$datos_salud->setMedicación($_POST['Medicacion']);
		$datos_salud->setDieta_Especial($_POST['Dieta_Especial']);

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
		$datos_salud->setCond_Vista($_POST['Condicion_Vista']);
		$datos_salud->setCond_Dental($_POST['Condicion_Dentadura']);
		$datos_salud->setInstitucion_Medica($_POST['Institucion_Medica']);
		$datos_salud->setCarnet_Discapacidad($_POST['Nro_Carnet_Discapacidad']);

		$datos_salud->insertarFicha_Medica($datos_estudiante->getidEstudiantes());

		#datos sociales del estudiante
		$datos_sociales->setPosee_Canaima($_POST['Tiene_Canaima']);
		$datos_sociales->setCondicion_Canaima($_POST['Condiciones_Canaima']);

		if ($_POST['Tiene_Carnet_Patria'] == "Si") {
			$datos_sociales->setCodigo_Carnet_Patria($_POST['Codigo_Carnet_Patria']);
			$datos_sociales->setSerial_Carnet_Patria($_POST['Serial_Carnet_Patria']);
		}
		$datos_sociales->setAcceso_Internet($_POST['Internet_Vivienda']);

		$datos_sociales->insertarDatosSociales($datos_estudiante->getidEstudiantes());

		#Tallas del estudiante
		$datos_tallas->setTalla_Camisa($_POST['Talla_Camisa']);
		$datos_tallas->setTalla_Pantalón($_POST['Talla_Pantalon']);
		$datos_tallas->setTalla_Zapatos($_POST['Talla_Zapatos']);

		$datos_tallas->insertarTallasEstudiante($datos_estudiante->getidEstudiantes());

		#estudiante -> grado -> año-escolar
		#datos academicos
		$grado->setGrado_A_Cursar($_POST['Grado_A_Cursar']);
		$grado->insertarGrado($datos_estudiante->getidEstudiantes(),$año_escolar->getInicio_Año_Escolar(),$año_escolar->getFin_Año_Escolar());

		#Estudiante_Repitente
		if ($_POST['Estudiante_Repitente'] == 'Si') {
			#Si tiene materias pendientes se asigna un valor, de lo contrario pasa como NULL por defecto
			$estudiante_repitente->setMaterias_Pendientes($_POST['Materias_Pendientes']);
		}
		$estudiante_repitente->insertarEstudiantesRepitentes($datos_estudiante->getidEstudiantes());
		header('Location: ../lobby/index.php');
	}

	elseif ($orden == "Editar") {


		$id = $_POST['id'];

		$estudiante->setPrimerNombre($_POST['PrimerNombre']);
		$estudiante->setSegundoNombre($_POST['SegundoNombre']);
		$estudiante->setPrimerApellido($_POST['PrimerApellido']);
		$estudiante->setSegundoApellido($_POST['SegundoApellido']);
		$estudiante->setGenero($_POST['Genero']);
		$estudiante->setCedula($_POST['Cedula']);
		$estudiante->setTipoCedula($_POST['TipoCedula']);
		$estudiante->setCedulaRepresentante($_POST['CedulaRepresentante']);
		$estudiante->setFechaNacimiento($_POST['FechaNacimiento']);
		$estudiante->setEstado($_POST['Estado']);
		$estudiante->setMunicipio($_POST['Municipio']);
		$estudiante->setParroquia($_POST['Parroquia']);
		$estudiante->setCiudad($_POST['Ciudad']);
		$estudiante->setPuedeIrseSolo($_POST['PuedeIrseSolo']);
		$estudiante->setContactoAuxiliar($_POST['ContactoAuxiliar']);
		$estudiante->setTelefonoAuxiliar($_POST['TelefonoAuxiliar']);
		$estudiante->setRelacionAuxiliar($_POST['RelacionAuxiliar']);
		$estudiante->setEstatura($_POST['Estatura']);
		$estudiante->setPeso($_POST['Peso']);
		$estudiante->setGrupoSanguineo($_POST['GrupoSanguineo']);
		$estudiante->setMedicacion($_POST['Medicacion']);
		$estudiante->setDietaEspecial($_POST['DietaEspecial']);
		$estudiante->setImpedimentoFisico($_POST['ImpedimentoFisico']);
		$estudiante->setAlergias($_POST['Alergias']);
		$estudiante->setProblemasVista($_POST['ProblemasVista']);
		$estudiante->setProblemasSalud($_POST['ProblemasSalud']);
		$estudiante->setGrado($_POST['Grado']);
		$estudiante->setTipoInscripcion($_POST['TipoInscripcion']);

		$crud->editarEstudiante($estudiante);
	}

	elseif ($orden == "Eliminar") {
		$estudiante->eliminarEstudiante($_POST['cedula_estudiante']);
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

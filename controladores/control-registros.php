<?php

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

require_once('../clases/estudiante.php');
require_once('../clases/ficha-medica.php');
require_once('../clases/sociales-estudiantes.php');
require_once('../clases/tallas-estudiantes.php');

require_once('../clases/grado.php');
require_once('../clases/año-escolar.php');
require_once('../clases/padres.php');

require_once('../clases/estudiantes-repitentes.php');

require_once('../controladores/conexion.php');

$estudiante	= new Personas();
$datos_estudiante	= new Estudiantes();

$padre = new Personas();
$datos_padre = new Padres();

$datos_salud	= new FichaMedica();
$datos_sociales = new DatosSociales();
$datos_tallas = new TallasEstudiante();

$año_escolar = new Año_Escolar();
$grado = new GradoAcademico();
$estudiante_repitente = new EstudiantesRepitentes();

$datos_salud = new FichaMedica();



if (isset($_POST['orden']) and $_POST['orden']) {

	$orden = $_POST['orden'];

	if ($orden == "Insertar") {

		//
		// REPRESENTANTE
		//

		$persona->setPrimer_Nombre($_POST['Primer_Nombre_R']);
		$persona->setSegundo_Nombre($_POST['Segundo_Nombre_R']);
		$persona->setPrimer_Apellido($_POST['Primer_Apellido_R']);
		$persona->setSegundo_Apellido($_POST['Segundo_Apellido_R']);

		$cedula_representante = $_POST['Tipo_Cédula_R'].$_POST['Cédula_R'];
		$persona->setCédula($cedula_representante);

		$persona->setFecha_Nacimiento($_POST['Fecha_Nacimiento_R']);
		$persona->setLugar_Nacimiento($_POST['Lugar_Nacimiento_R']);
		$persona->setGénero($_POST['Genero_R']);
		$persona->setCorreo_Electrónico($_POST['Correo_electrónico_R']);
		$persona->setDirección($_POST['Direccion_R']);
		$persona->setEstado_Civil($_POST['Estado_Civil_R']);

		//
		// telefonos
		//

		#Telefono principal
		$telefonos->setPrefijo($_POST['Prefijo_Principal_R']);
		$telefonos->setNúmero_Telefónico($_POST['Teléfono_Principal_R']);
		$telefonos->setRelación_Teléfono('Principal');
		$telefonos->setCedula_Persona($persona->getCédula());

		$telefonos->insertarTelefono();

		#Telefono principal
		$telefonos->setPrefijo($_POST['Prefijo_Secundario_R']);
		$telefonos->setNúmero_Telefónico($_POST['Teléfono_Secundario_R']);
		$telefonos->setRelación_Teléfono('Secundario');
		$telefonos->setCedula_Persona($persona->getCédula());

		$telefonos->insertarTelefono();

		#Telefono principal
		$telefonos->setPrefijo($_POST['Prefijo_Trabajo_R']);
		$telefonos->setNúmero_Telefónico($_POST['Teléfono_Trabajo_R']);
		$telefonos->setRelación_Teléfono('Auxiliar');
		$telefonos->setCedula_Persona($persona->getCédula());

		$telefonos->insertarTelefono();

		$datos_representante->setCedula_Persona($persona->getCédula());
		$datos_representante->setGrado_Academico($_POST['Grado_Instrucción']);

		$datos_representante->insertarRepresentante();

		//
		// CARNET DE LA PATRIA
		//

		if ($_POST['Tiene_Carnet_Patria'] == "Si") {
			// code...
		}

		$carnet->getCódigo_Carnet($_POST['Codigo_Carnet_Patria']);
		$carnet->getSerial_Carnet($_POST['Serial_Carnet_Patria']);
		$carnet->getCedula_Persona($persona->getCédula())

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
			$datos_laborales->setTipo_Remuneración($_POST['Tipo_Remuneracion']);
		}

		$datos_laborales->setidRepresentantes($persona->getidRepresentantes());
		$datos_laborales->insertarDatosLaborales();

		#Datos economicos
		$datos_economicos->setBanco($_POST['Banco']);
		$datos_economicos->setTipo_Cuenta($_POST['Tipo_Cuenta']);
		$datos_economicos->setCta_Bancaria($_POST['Nro_Cuenta']);
		$datos_economicos->setidRepresentantes($persona->getidRepresentantes());
		$datos_economicos->insertarDatosEconomicos();

		#Datos vivienda
		$datos_vivienda->setCondiciones_Vivienda($_POST['Condicion_vivienda']);
		$datos_vivienda->setTipo_Vivienda($_POST['Tipo_Vivienda']);

		#Si marca la tenencia como otro. Asume el texto ingresado en la casilla
		if ($_POST['Tenencia_vivienda'] == "Otro") {
			$datos_vivienda->setTenencia_Vivienda($_POST['Tenencia_vivienda_Otro']);
		}
		else{
			$datos_vivienda->setTenencia_Vivienda($_POST['Tenencia_vivienda']);
		}

		$datos_vivienda->setidRepresentante($persona->getidRepresentantes());
		$datos_vivienda->insertarDatosVivienda();

		//
		// DATOS DEL CONTACTO AUXILIAR
		//

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



















		Banco
		Tipo_Cuenta
		Nro_Cuenta
		Representante_Trabaja
		Empleo_R


		Lugar_Trabajo_R
		Remuneración
		Tipo_Remuneracion
		Primer_Nombre_Aux
		Segundo_Nombre_Aux
		Primer_Apellido_Aux
		Segundo_Apellido_Aux
		Genero_Aux
		Tipo_Cédula_Aux
		Cédula_Aux
		Correo_electrónico_Aux
		Prefijo_Principal_Aux
		Teléfono_Principal_Aux
		Prefijo_Secundario_Aux
		Teléfono_Secundario_Aux
		Prefijo_Auxiliar_Aux
		Teléfono_Auxiliar_Aux
		Direccion_Aux
		Relación_Auxiliar

		Primer_Nombre_Est
		Segundo_Nombre_Est
		Primer_Apellido_Est
		Segundo_Apellido_Est
		Cedula_Est
		Genero_Est
		Genero_Est
		Fecha_Nacimiento_Est
		Lugar_Nacimiento_Est
		Correo_electrónico_Est
		Prefijo_Principal_Est
		Teléfono_Principal_Est
		Prefijo_Secundario_Est
		Teléfono_Secundario_Est
		Grado_A_Cursar
		Estudiante_Repitente
		Año_Repitente
		Tiene_Materias_Pendientes
		Materias_Pendientes
		Plantel_Procedencia
		Direccion_Est
		Con_Quien_Vive
		Tiene_Canaima
		Tiene_Canaima
		Condiciones_Canaima
		Tiene_Carnet_Patria
		Codigo_Carnet_Patria
		Serial_Carnet_Patria
		Internet_Vivienda
		Internet_Vivienda
		Indice
		Talla
		Peso
		C_Braquial
		Talla_Pantalon
		Talla_Camisa
		Talla_Zapatos
		Padece_Enfermedad
		Cual_Enfermedad
		Alergias
		Grupo_Sanguineo
		Factor_Rhesus
		Lateralidad
		Lateralidad
		Lateralidad
		Condicion_Dentadura
		Condicion_Dentadura
		Condicion_Dentadura
		Condicion_Vista
		Condicion_Vista
		Condicion_Vista
		Condiciones_Salud
		Condiciones_Salud
		Condiciones_Salud
		Condiciones_Salud
		Condiciones_Salud
		Condiciones_Salud
		Recibe_Atención_Inst
		Institucion_Medica
		Recibe_Medicacion
		Medicacion
		Tiene_Dieta_Especial
		Dieta_Especial
		Tiene_Carnet_Discapacidad
		Nro_Carnet_Discapacidad
		Vinculo_Familiar
		Vinculo_Familiar
		Primer_Nombre_Familiar
		Segundo_Nombre_Familiar
		Primer_Apellido_Familiar
		Segundo_Apellido_Familiar
		Genero_Familiar
		Genero_Familiar
		Cédula_Familiar
		Fecha_Nacimiento_Familiar
		Lugar_Nacimiento_Familiar
		Correo_electrónico_Familiar
		Prefijo_Principal_Familiar
		Teléfono_Principal_Familiar
		Prefijo_Secundario_Familiar
		Teléfono_Secundario_Familiar
		Estado_Civil_Familiar
		Direccion_Familiar
		Reside_En_El_País
		País

		orden












































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

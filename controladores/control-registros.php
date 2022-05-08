<?php

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

require_once('../clases/estudiante.php');
require_once('../clases/ficha-médica.php');
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

$datos_salud	= new Fichamédica();
$datos_sociales = new DatosSociales();
$datos_tallas = new TallasEstudiante();

$año_escolar = new Año_Escolar();
$grado = new GradoAcadémico();
$estudiante_repitente = new EstudiantesRepitentes();

$datos_salud = new Fichamédica();



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

		$Cédula_representante = $_POST['Tipo_Cédula_R'].$_POST['Cédula_R'];
		$persona->setCédula($Cédula_representante);

		$persona->setFecha_Nacimiento($_POST['Fecha_Nacimiento_R']);
		$persona->setLugar_Nacimiento($_POST['Lugar_Nacimiento_R']);
		$persona->setGénero($_POST['Género_R']);
		$persona->setCorreo_Electrónico($_POST['Correo_electrónico_R']);
		$persona->setDirección($_POST['Dirección_R']);
		$persona->setEstado_Civil($_POST['Estado_Civil_R']);

		//
		// Teléfonos
		//

		#Teléfono principal
		$Teléfonos->setPrefijo($_POST['Prefijo_Principal_R']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Principal_R']);
		$Teléfonos->setRelación_Teléfono('Principal');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->insertarTeléfono();

		#Teléfono principal
		$Teléfonos->setPrefijo($_POST['Prefijo_Secundario_R']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Secundario_R']);
		$Teléfonos->setRelación_Teléfono('Secundario');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->insertarTeléfono();

		#Teléfono principal
		$Teléfonos->setPrefijo($_POST['Prefijo_Trabajo_R']);
		$Teléfonos->setNúmero_Telefónico($_POST['Teléfono_Trabajo_R']);
		$Teléfonos->setRelación_Teléfono('Auxiliar');
		$Teléfonos->setCédula_Persona($persona->getCédula());

		$Teléfonos->insertarTeléfono();

		$datos_representante->setCédula_Persona($persona->getCédula());
		$datos_representante->setGrado_Académico($_POST['Grado_Instrucción']);

		$datos_representante->insertarRepresentante();

		//
		// CARNET DE LA PATRIA
		//

		if ($_POST['Tiene_Carnet_Patria'] == "Si") {
			// code...
		}

		$carnet->getCódigo_Carnet($_POST['Código_Carnet_Patria']);
		$carnet->getSerial_Carnet($_POST['Serial_Carnet_Patria']);
		$carnet->getCédula_Persona($persona->getCédula())

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

		$datos_laborales->setidRepresentantes($persona->getidRepresentantes());
		$datos_laborales->insertarDatosLaborales();

		#Datos económicos
		$datos_económicos->setBanco($_POST['Banco']);
		$datos_económicos->setTipo_Cuenta($_POST['Tipo_Cuenta']);
		$datos_económicos->setCta_Bancaria($_POST['Nro_Cuenta']);
		$datos_económicos->setidRepresentantes($persona->getidRepresentantes());
		$datos_económicos->insertarDatoseconómicos();

		#Datos vivienda
		$datos_vivienda->setCondiciones_Vivienda($_POST['Condición_vivienda']);
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
		$persona_auxiliar->setGénero($_POST['Género_Aux']);
		$persona_auxiliar->setCorreo_Electrónico($_POST['Correo_electrónico_Aux']);
		$persona_auxiliar->setDirección($_POST['Dirección_Aux']);
		$persona_auxiliar->setEstado_Civil($_POST['Estado_Civil_Aux']);

		$persona_auxiliar->insertarPersona();



















		Banco
		Tipo_Cuenta
		Nro_Cuenta
		Representante_Trabaja
		Empleo_R


		Lugar_Trabajo_R
		Remuneración
		Tipo_Remuneración
		Primer_Nombre_Aux
		Segundo_Nombre_Aux
		Primer_Apellido_Aux
		Segundo_Apellido_Aux
		Género_Aux
		Tipo_Cédula_Aux
		Cédula_Aux
		Correo_electrónico_Aux
		Prefijo_Principal_Aux
		Teléfono_Principal_Aux
		Prefijo_Secundario_Aux
		Teléfono_Secundario_Aux
		Prefijo_Auxiliar_Aux
		Teléfono_Auxiliar_Aux
		Dirección_Aux
		Relación_Auxiliar

		Primer_Nombre_Est
		Segundo_Nombre_Est
		Primer_Apellido_Est
		Segundo_Apellido_Est
		Cédula_Est
		Género_Est
		Género_Est
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
		Dirección_Est
		Con_Quién_Vive
		Tiene_Canaima
		Tiene_Canaima
		Condiciones_Canaima
		Tiene_Carnet_Patria
		Código_Carnet_Patria
		Serial_Carnet_Patria
		Internet_Vivienda
		Internet_Vivienda
		Índice
		Talla
		Peso
		C_Braquial
		Talla_Pantalón
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
		Condición_Dentadura
		Condición_Dentadura
		Condición_Dentadura
		Condición_Vista
		Condición_Vista
		Condición_Vista
		Condiciones_Salud
		Condiciones_Salud
		Condiciones_Salud
		Condiciones_Salud
		Condiciones_Salud
		Condiciones_Salud
		Recibe_Atención_Inst
		Institución_médica
		Recibe_médicación
		médicación
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
		Género_Familiar
		Género_Familiar
		Cédula_Familiar
		Fecha_Nacimiento_Familiar
		Lugar_Nacimiento_Familiar
		Correo_electrónico_Familiar
		Prefijo_Principal_Familiar
		Teléfono_Principal_Familiar
		Prefijo_Secundario_Familiar
		Teléfono_Secundario_Familiar
		Estado_Civil_Familiar
		Dirección_Familiar
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
		$padre->setGénero($_POST['Género_Familiar']);
		$padre->setCorreo_Electrónico($_POST['Correo_electrónico_Familiar']);
		$padre->setDirección($_POST['Dirección_Familiar']);
		$padre->setEstado_Civil($_POST['Estado_Civil_Familiar']);

		$padre->insertarPersona();

		$datos_padre->setCédula_Persona($padre->getCédula());
		$datos_padre->setParentezco($_POST['Vinculo_Familiar']);
		$datos_padre->insertarPadres();
		#Persona -> estudiante -> datos sociales, Médicos y tallas
		#datos basicos del estudiante
		$estudiante->setPrimer_Nombre($_POST['Primer_Nombre_Est']);
		$estudiante->setSegundo_Nombre($_POST['Segundo_Nombre_Est']);
		$estudiante->setPrimer_Apellido($_POST['Primer_Apellido_Est']);
		$estudiante->setSegundo_Apellido($_POST['Segundo_Apellido_Est']);
		$estudiante->setCédula($_POST['Cédula_Est']);
		$estudiante->setFecha_Nacimiento($_POST['Fecha_Nacimiento_Est']);
		$estudiante->setLugar_Nacimiento($_POST['Lugar_Nacimiento_Est']);
		$estudiante->setGénero($_POST['Género_Est']);
		$estudiante->setCorreo_Electrónico($_POST['Correo_electrónico_Est']);
		$estudiante->setDirección($_POST['Dirección_Est']);
		$estudiante->setEstado_Civil("Soltero(a)");

		$estudiante->insertarPersona();

		$datos_estudiante->setCédula_Estudiante($_POST['Cédula_Est']);
		$datos_estudiante->setPlantel_Procedencia($_POST['Plantel_Procedencia']);
		$datos_estudiante->setCon_Quién_Vive($_POST['Con_Quién_Vive']);
		$datos_estudiante->setidRepresentante($_SESSION['representante']['idRepresentantes']);
		$datos_estudiante->setidPadre($datos_padre->getidPadres());

		$datos_estudiante->insertarEstudiante();

		#datos Médicos
		$datos_salud->setEstatura($_POST['Talla']);
		$datos_salud->setPeso($_POST['Peso']);
		$datos_salud->setÍndice($_POST['Índice']);
		$datos_salud->setCirc_Braquial($_POST['C_Braquial']);
		$datos_salud->setLateralidad($_POST['Lateralidad']);
		$datos_salud->setTipo_Sangre($_POST['Grupo_Sanguineo'].$_POST['Factor_Rhesus']);
		$datos_salud->setmédicación($_POST['médicación']);
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
		$datos_salud->setCond_Vista($_POST['Condición_Vista']);
		$datos_salud->setCond_Dental($_POST['Condición_Dentadura']);
		$datos_salud->setInstitución_médica($_POST['Institución_médica']);
		$datos_salud->setCarnet_Discapacidad($_POST['Nro_Carnet_Discapacidad']);

		$datos_salud->insertarFicha_médica($datos_estudiante->getidEstudiantes());

		#datos sociales del estudiante
		$datos_sociales->setPosee_Canaima($_POST['Tiene_Canaima']);
		$datos_sociales->setCondición_Canaima($_POST['Condiciones_Canaima']);

		if ($_POST['Tiene_Carnet_Patria'] == "Si") {
			$datos_sociales->setCódigo_Carnet_Patria($_POST['Código_Carnet_Patria']);
			$datos_sociales->setSerial_Carnet_Patria($_POST['Serial_Carnet_Patria']);
		}
		$datos_sociales->setAcceso_Internet($_POST['Internet_Vivienda']);

		$datos_sociales->insertarDatosSociales($datos_estudiante->getidEstudiantes());

		#Tallas del estudiante
		$datos_tallas->setTalla_Camisa($_POST['Talla_Camisa']);
		$datos_tallas->setTalla_Pantalón($_POST['Talla_Pantalón']);
		$datos_tallas->setTalla_Zapatos($_POST['Talla_Zapatos']);

		$datos_tallas->insertarTallasEstudiante($datos_estudiante->getidEstudiantes());

		#estudiante -> grado -> año-escolar
		#datos Académicos
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
		$estudiante->eliminarEstudiante($_POST['Cédula_estudiante']);
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

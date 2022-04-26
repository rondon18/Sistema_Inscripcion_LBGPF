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



if (isset($_POST['orden']) and $_POST['orden']) {

	$orden = $_POST['orden'];

	if ($orden == "Insertar") {

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

		$padre->insertarPadres($padre->getCedula());
		$padre->setParentezco($_POST['Vinculo_Familiar']);
		$padre->insertarPadres();
		#Persona -> estudiante -> datos sociales, medicos y tallas

		Primer_Nombre_Est
		Segundo_Nombre_Est
		Primer_Apellido_Est
		Segundo_Apellido_Est
		Cedula_Est
		Genero_Est
		Fecha_Nacimiento_Est
		Lugar_Nacimiento_Est
		Correo_electrónico_Est
		Prefijo_Principal_Est
		Teléfono_Principal_Est
		Prefijo_Secundario_Est
		Teléfono_Secundario_Est
		Teléfono_Principal_Est
		Teléfono_Auxiliar_Est
		Grado_A_Cursar
		Estudiante_Repitente
		Año_Repitente
		Tiene_Materias_Pendientes
		Materias_Pendientes
		Plantel_Procedencia
		Direccion_Estudiante

		Tiene_Canaima
		Condiciones_Canaima
		Tiene_Carnet_Patria
		Codigo_Carnet_Patria
		Serial_Carnet_Patria
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
		Condicion_Dentadura
		Condicion_Vista
		Condiciones_Salud
		Recibe_Atención_Inst
		Institucion_Medica
		Recibe_Medicacion
		Medicacion
		Tiene_Dieta_Especial
		Dieta_Especial
		Tiene_Carnet_Discapacidad
		Nro_Carnet_Discapacidad








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

		$datos_estudiante->setPlantel_Procedencia($_POST['Plantel_Procedencia']);
		$datos_estudiante->setCon_Quien_Vive($_POST['Con_Quien_Vive']);
		$datos_estudiante->setidRepresentante($_SESSION['representante'][0]);
		$datos_estudiante->setidPadre($padre->getidPadres());

		$datos_estudiante->insertarEstudiante();

		#datos medicos
		$ficha_medica->setEstatura($_POST['Talla']);
		$ficha_medica->setPeso($_POST['Peso']);
		$ficha_medica->setIndice($_POST['Indice']);
		$ficha_medica->setCirc_Braquial($_POST['C_Braquial']);
		$ficha_medica->setLateralidad($_POST['Lateralidad']);
		$ficha_medica->setTipo_Sangre($_POST['Grupo_Sanguineo'].$_POST['Factor_Rhesus']);
		$ficha_medica->setMedicación($_POST['Medicacion']);
		$ficha_medica->setDieta_Especial($_POST['Dieta_Especial']);

		$impedimentos = "";

		if (isset($_POST['Condiciones_Salud'])) {
			foreach ($_POST['Condiciones_Salud'] as $impedimento) {
				$impedimentos .= $impedimento.", ";
			}
			#elimina el ", " al final de la cadena de texto
			$ficha_medica->setImpedimento_Físico(substr($impedimentos,0,-2));
		}
		else {
			$ficha_medica->setImpedimento_Físico(NULL);
		}

		$ficha_medica->setAlergias($_POST['Alergias']);
		$ficha_medica->setCond_Vista($_POST['Condicion_Vista']);
		$ficha_medica->setCond_Dental($_POST['Condicion_Dentadura']);
		$ficha_medica->setInstitucion_Medica($_POST['Institucion_Medica']);
		$ficha_medica->setCarnet_Discapacidad($_POST['Nro_Carnet_Discapacidad']);

		$ficha_medica->insertarFicha_Medica($estudiante->getidEstudiantes());

		#datos sociales del estudiante
		$datos_sociales->setPosee_Canaima($_POST['Tiene_Canaima']);
		$datos_sociales->setCondicion_Canaima($_POST['Condiciones_Canaima']);
		$datos_sociales->setPosee_Carnet_Patria($_POST['Tiene_Carnet_Patria']);
		$datos_sociales->setCodigo_Carnet_Patria($_POST['Codigo_Carnet_Patria']);
		$datos_sociales->setSerial_Carnet_Patria($_POST['Serial_Carnet_Patria']);
		$datos_sociales->setAcceso_Internet($_POST['Internet_Vivienda']);

		$datos_sociales->insertarDatosSociales($estudiante->getidEstudiantes());

		#Tallas del estudiante
		$tallas_estudiantes->setTalla_Camisa($_POST['Talla_Camisa']);
		$tallas_estudiantes->setTalla_Pantalón($_POST['Talla_Pantalon']);
		$tallas_estudiantes->setTalla_Zapatos($_POST['Talla_Zapatos']);

		$tallas_estudiantes->insertarTallasEstudiante($estudiante->getidEstudiantes());

		#estudiante -> grado -> año-escolar
		#datos academicos
		$grado->setGrado_A_Cursar($_POST['Grado_A_Cursar']);
		$grado->insertarGrado($estudiante->getidEstudiantes(),$año_escolar->getInicio_Año_Escolar(),$año_escolar->getFin_Año_Escolar());

		#EStudiante_Repitente
		if ($_POST['EStudiante_Repitente'] == 'Si') {
			#Si tiene materias pendientes se asigna un valor, de lo contrario pasa como NULL por defecto
			$estudiante_repitente->setMaterias_Pendientes($_POST['Materias_Pendientes']);
		}
		$estudiante_repitente->insertarEstudiantesRepitentes($estudiante->getidEstudiantes());
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

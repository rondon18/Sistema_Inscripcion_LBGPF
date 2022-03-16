<?php

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

require_once('../clases/alumno.php');
require_once('../clases/ficha-medica.php');
require_once('../clases/sociales-alumnos.php');
require_once('../clases/tallas-alumnos.php');

require_once('../clases/grado.php');
require_once('../clases/año-escolar.php');
require_once('../clases/padres.php');

require_once('../clases/crud-alumnos.php');

$crud 	= new CrudAlumnos();
$alumno	= new Alumnos();
$ficha_medica	= new FichaMedica();
$datos_sociales = new DatosSociales();
$tallas_alumnos = new TallasAlumno();
$grado = new GradoAcademico();
$año_escolar = new Año_Escolar();
$padre = new Padres();

if (isset($_POST['orden']) and $_POST['orden']) {
	
	$orden = $_POST['orden'];
		
	if ($orden == "Insertar") {

		if (!isset($_POST['Es_el_representante'])) {
			$padre->setNombres($_POST['Primer_Nombre_Familiar']." ".$_POST['Segundo_Nombre_Familiar']);
			$padre->setApellidos($_POST['Primer_Apellido_Familiar']." ".$_POST['Segundo_Apellido_Familiar']);
			$padre->setCedula($_POST['Cedula_Familiar']);
			$padre->setCorreo($_POST['Correo_electrónico_Familiar']);
			$padre->setGenero($_POST['Genero_Familiar']);
			$padre->setFecha_Nacimiento($_POST['Fecha_Nacimiento_Familiar']);
			$padre->setLugar_Nacimiento($_POST['Lugar_Nacimiento_Familiar']);
			$padre->setDireccion($_POST['Direccion_Alumno']);
			$padre->setTeléfono_Principal($_POST['Teléfono_Principal_Familiar']);
			$padre->setTeléfono_Auxiliar($_POST['Teléfono_Auxiliar_Familiar']);
			$padre->setEstado_Civil("Soltero(a)");

			$padre->insertarPersona();

			$padre->setParentezco($_POST['Vinculo_Familiar']);
			
			$padre->insertarPadres($padre->getCedula());
		}
		elseif (isset($_POST['Es_el_representante'])){
			$padre->setParentezco($_POST['Vinculo_Familiar']);
			$padre->insertarPadres($_SESSION['persona'][3]);
		}

		#datos basicos del alumno
		$alumno->setNombres($_POST['Primer_Nombre_Alumno']." ".$_POST['Segundo_Nombre_Alumno']);
		$alumno->setApellidos($_POST['Primer_Apellido_Alumno']." ".$_POST['Segundo_Apellido_Alumno']);
		$alumno->setCedula($_POST['Cedula_Alumno']);
		$alumno->setCorreo($_POST['Correo_electrónico_Alumno']);
		$alumno->setGenero($_POST['Genero_Alumno']);
		$alumno->setFecha_Nacimiento($_POST['Fecha_Nacimiento_Alumno']);
		$alumno->setLugar_Nacimiento($_POST['Lugar_Nacimiento_Alumno']);
		$alumno->setDireccion($_POST['Direccion_Alumno']);
		$alumno->setTeléfono_Principal($_POST['Teléfono_Principal_Alumno']);
		$alumno->setTeléfono_Auxiliar($_POST['Teléfono_Auxiliar_Alumno']);
		$alumno->setEstado_Civil("Soltero");

		$alumno->setPlantel_Procedencia($_POST['Plantel_Procedencia']);
		$alumno->setidRepresentante($_SESSION['representante'][0]);

		$alumno->insertarPersona();
		$alumno->insertarAlumno($_SESSION['representante'][0],$padre->getidPadres());

		#datos academicos

		$grado->setGrado_A_Cursar($_POST['Grado_A_Cursar']);
		$grado->insertarGrado($alumno->getidAlumnos(),$año_escolar->getAño_Escolar());

		#Datos medicos del alumno
		$ficha_medica->setEstatura($_POST['Talla']);
		$ficha_medica->setPeso($_POST['Peso']);
		$ficha_medica->setIndice($_POST['Indice']);
		$ficha_medica->setCirc_Braquial($_POST['C_Braquial']);
		$ficha_medica->setLateralidad($_POST['Lateralidad']);
		$ficha_medica->setTipo_Sangre($_POST['Grupo_Sanguineo'].$_POST['Factor_Rhesus']);
		$ficha_medica->setMedicación($_POST['Medicacion']);
		$ficha_medica->setDieta_Especial($_POST['Dieta_Especial']);
		


		$Condiciones_Salud = "";
		if (!empty($_POST['Condiciones_Salud'])) {
			for ($i=0; $i < sizeof($_POST['Condiciones_Salud']); $i++) { 
			if ($i == sizeof($_POST['Condiciones_Salud'])-1 and sizeof($_POST['Condiciones_Salud']) > 1) {
				$Condiciones_Salud .= "y ".$_POST['Condiciones_Salud'][$i];
			}
			elseif (sizeof($_POST['Condiciones_Salud']) == 1 or $i == 1) {
				$Condiciones_Salud .= $_POST['Condiciones_Salud'][$i];
			}
			else {
				$Condiciones_Salud .= ", ".$_POST['Condiciones_Salud'][$i];
			}
		}
		}
		
		
		$ficha_medica->setImpedimento_Físico($Condiciones_Salud);#Hacer explode()

		$ficha_medica->setAlergias($_POST['Alergias']);
		$ficha_medica->setCond_Vista($_POST['Condicion_Vista']);
		$ficha_medica->setCond_Dental($_POST['Condicion_Dentadura']);
		$ficha_medica->setInstitucion_Medica($_POST['Institucion_Medica']);
		$ficha_medica->setCarnet_Discapacidad($_POST['Nro_Carnet_Discapacidad']);
		$ficha_medica->setidAlumnos($alumno->getidAlumnos());

		$ficha_medica->insertarFicha_Medica();

		#Datos sociales del alumno
		$datos_sociales->setPosee_Canaima($_POST['Tiene_Canaima']);
		$datos_sociales->setCondicion_Canaima($_POST['Condiciones_Canaima']);
		$datos_sociales->setPosee_Carnet_Patria($_POST['Tiene_Carnet_Patria']);
		$datos_sociales->setCodigo_Carnet_Patria($_POST['Codigo_Carnet_Patria']);
		$datos_sociales->setSerial_Carnet_Patria($_POST['Serial_Carnet_Patria']);
		$datos_sociales->setAcceso_Internet($_POST['Internet_Vivienda']);

		#Tallas del estudiante
		$tallas_alumnos->setTalla_Camisa($_POST['Talla_Pantalon']);
		$tallas_alumnos->setTalla_Pantalón($_POST['Talla_Camisa']);
		$tallas_alumnos->setTalla_Zapatos($_POST['Talla_Zapatos']);

		#ALumno_Repitente
		#Año_Repitente
		#Tiene_Materias_Pendientes

		echo "Nombres: ".$alumno->getNombres()."<br>";
		echo "Apellidos: ".$alumno->getApellidos()."<br>";
		echo "Cedula: ".$alumno->getCedula()."<br>";
		echo "Correo: ".$alumno->getCorreo()."<br>";
		echo "Genero: ".$alumno->getGenero()."<br>";
		echo "Fecha_Nacimiento: ".$alumno->getFecha_Nacimiento()."<br>";
		echo "Lugar_Nacimiento: ".$alumno->getLugar_Nacimiento()."<br>";
		echo "Direccion: ".$alumno->getDireccion()."<br>";
		echo "Teléfono_Principal: ".$alumno->getTeléfono_Principal()."<br>";
		echo "Teléfono_Auxiliar: ".$alumno->getTeléfono_Auxiliar()."<br>";
		echo "Estado_Civil: ".$alumno->getEstado_Civil()."<br>";
		echo "Plantel_Procedencia: ".$alumno->getPlantel_Procedencia()."<br>";
		echo "idRepresentante: ".$alumno->getidRepresentante()."<br>";
		echo "Grado_A_Cursar: ".$grado->getGrado_A_Cursar()."<br>";
		echo "Estatura: ".$ficha_medica->getEstatura()."<br>";
		echo "Peso: ".$ficha_medica->getPeso()."<br>";
		echo "Indice: ".$ficha_medica->getIndice()."<br>";
		echo "Circ_Braquial: ".$ficha_medica->getCirc_Braquial()."<br>";
		echo "Lateralidad: ".$ficha_medica->getLateralidad()."<br>";
		echo "Tipo_Sangre: ".$ficha_medica->getTipo_Sangre()."<br>";
		echo "Medicación: ".$ficha_medica->getMedicación()."<br>";
		echo "Dieta_Especial: ".$ficha_medica->getDieta_Especial()."<br>";
		echo "Impedimento_Físico: ".print_r($ficha_medica->getImpedimento_Físico())."<br>";
		echo "Alergias: ".$ficha_medica->getAlergias()."<br>";
		echo "Cond_Vista: ".$ficha_medica->getCond_Vista()."<br>";
		echo "Cond_Dental: ".$ficha_medica->getCond_Dental()."<br>";
		echo "Institucion_Medica: ".$ficha_medica->getInstitucion_Medica()."<br>";
		echo "Carnet_Discapacidad: ".$ficha_medica->getCarnet_Discapacidad()."<br>";
		echo "Posee_Canaima: ".$datos_sociales->getPosee_Canaima()."<br>";
		echo "Condicion_Canaima: ".$datos_sociales->getCondicion_Canaima()."<br>";
		echo "Posee_Carnet_Patria: ".$datos_sociales->getPosee_Carnet_Patria()."<br>";
		echo "Codigo_Carnet_Patria: ".$datos_sociales->getCodigo_Carnet_Patria()."<br>";
		echo "Serial_Carnet_Patria: ".$datos_sociales->getSerial_Carnet_Patria()."<br>";
		echo "Acceso_Internet: ".$datos_sociales->getAcceso_Internet()."<br>";
					
		#$crud->insertarAlumno($alumno,$ficha_medica,$datos_sociales,$tallas_alumnos,$grado,$año_escolar,$padre,$_POST['Es_el_representante']);

		#header('Location: ../lobby/index.php');
	}
	
	elseif ($orden == "Editar") {
		
		
		$id = $_POST['id'];

		$alumno->setPrimerNombre($_POST['PrimerNombre']);
		$alumno->setSegundoNombre($_POST['SegundoNombre']);
		$alumno->setPrimerApellido($_POST['PrimerApellido']);
		$alumno->setSegundoApellido($_POST['SegundoApellido']);
		$alumno->setGenero($_POST['Genero']);
		$alumno->setCedula($_POST['Cedula']);
		$alumno->setTipoCedula($_POST['TipoCedula']);
		$alumno->setCedulaRepresentante($_POST['CedulaRepresentante']);
		$alumno->setFechaNacimiento($_POST['FechaNacimiento']);
		$alumno->setEstado($_POST['Estado']);
		$alumno->setMunicipio($_POST['Municipio']);
		$alumno->setParroquia($_POST['Parroquia']);
		$alumno->setCiudad($_POST['Ciudad']);
		$alumno->setPuedeIrseSolo($_POST['PuedeIrseSolo']);
		$alumno->setContactoAuxiliar($_POST['ContactoAuxiliar']);
		$alumno->setTelefonoAuxiliar($_POST['TelefonoAuxiliar']);
		$alumno->setRelacionAuxiliar($_POST['RelacionAuxiliar']);
		$alumno->setEstatura($_POST['Estatura']);
		$alumno->setPeso($_POST['Peso']);
		$alumno->setGrupoSanguineo($_POST['GrupoSanguineo']);
		$alumno->setMedicacion($_POST['Medicacion']);
		$alumno->setDietaEspecial($_POST['DietaEspecial']);
		$alumno->setImpedimentoFisico($_POST['ImpedimentoFisico']);
		$alumno->setAlergias($_POST['Alergias']);
		$alumno->setProblemasVista($_POST['ProblemasVista']);
		$alumno->setProblemasSalud($_POST['ProblemasSalud']);
		$alumno->setGrado($_POST['Grado']);
		$alumno->setTipoInscripcion($_POST['TipoInscripcion']);

		$crud->editarAlumno($alumno);
	}
	
	elseif ($orden == "Consultar") {
		//texto a buscar
		$criterio = $_POST['Criterio'];

		//buscar entre nombres, apellidos, etc
		$condiciones = $_POST['Condiciones'];

		#$crud->
	}
	
	elseif ($orden == "Eliminar") {
		echo $orden;
	}
	else {
		echo "La orden: ' ". $orden . " ' no es valida.";
	}

	
	//Esto hace lo suyo y manda de regreso a la pagina inicial

	#header('Location: index.php');
	
}
else {
	#header('Location: index.php');
}




?>
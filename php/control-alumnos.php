<?php


require_once('../clases/alumno.php');
require_once('crud-alumnos.php');

$crud 	= new CrudAlumnos();
$alumno	= new Alumno();

if (isset($_POST['orden']) and $_POST['orden']) {
	
	$orden = $_POST['orden'];
		
	if ($orden == "Insertar") {

		#Se asignan los valores del objeto antes de pasarlo al crud
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
	

		$datos = [];

		if (isset($_POST['Asma']) and $_POST['Asma'] != "") {
			$datos[] = $_POST['Asma'];
		}
		if (isset($_POST['Insomnio']) and $_POST['Insomnio'] != "") {
			$datos[] = $_POST['Insomnio'];
		}
		if (isset($_POST['Botulismo']) and $_POST['Botulismo'] != "") {
			$datos[] = $_POST['Botulismo'];
		}
		if (isset($_POST['Diabetes']) and $_POST['Diabetes'] != "") {
			$datos[] = $_POST['Diabetes'];
		}
		if (isset($_POST['ProblemasCardiovasculares']) and $_POST['ProblemasCardiovasculares'] != "") {
			$datos[] = $_POST['ProblemasCardiovasculares'];
		}

		$ProblemasSalud = "";

		$checks = 0; 

		for ($i = 0; $i < count($datos); $i++) {
			if ($datos[$i]) {
				#si los problemas tachados con checkbox son más de uno 
				if ($checks > 0 and $i != count($datos)-1) {
					#inserta una coma luego de cada dato, a partir de segundo, excepto el ultimo
					$ProblemasSalud .= ", $datos[$i]";
				}
				elseif ($i == count($datos)-1 and count($datos) >= 2) {
					#Diferencia el ultimo dato marcado. Se agrega E o Y solo por gramatica
					if ($datos[$i] != 'Insomnio') {
						$ProblemasSalud .= " y $datos[$i]";
					}
					else {
						$ProblemasSalud .= " e $datos[$i]";
					}
				
				}
				else {
					$ProblemasSalud .= $datos[$i];
				}
				$checks += 1;
			}
		}

		#se anexa el campo de otros solo si se marcó 
		if (isset($_POST['ProblemasSalud']) and $ProblemasSalud != "") {
			$ProblemasSalud .= ". Además de: ".$_POST['ProblemasSalud'];
		}

		$alumno->setProblemasSalud($ProblemasSalud);
		
		$alumno->setGrado($_POST['Grado']);
		$alumno->setTipoInscripcion($_POST['TipoInscripcion']);
			
		$crud->insertarAlumno($alumno);

		header('Location: ../lobby/index.php');
	
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
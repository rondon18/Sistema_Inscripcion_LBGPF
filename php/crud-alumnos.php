<?php 

require('conexion.php');

class CrudAlumnos {


	#debe recibir un alumno como tal
	public function insertarAlumno($alumno) {
		$conexion = conectarBD();
			
			$PrimerNombre = $alumno->getPrimerNombre();
			$SegundoNombre = $alumno->getSegundoNombre();
			$PrimerApellido = $alumno->getPrimerApellido();
			$SegundoApellido = $alumno->getSegundoApellido();

			$Genero = $alumno->getGenero();
			
			$Cedula = $alumno->getCedula();
			$TipoCedula = $alumno->getTipoCedula();
			$CedulaRepresentante = $alumno->getCedulaRepresentante();
			
			$FechaNacimiento = $alumno->getFechaNacimiento();

			$Estado = $alumno->getEstado();
			$Municipio = $alumno->getMunicipio();
			$Parroquia = $alumno->getParroquia();
			$Ciudad = $alumno->getCiudad();
			
			$PuedeIrseSolo = $alumno->getPuedeIrseSolo();
			
			$ContactoAuxiliar = $alumno->getContactoAuxiliar();
			$TelefonoAuxiliar = $alumno->getTelefonoAuxiliar();
			$RelacionAuxiliar = $alumno->getRelacionAuxiliar();
			
			$Estatura = $alumno->getEstatura();
			$Peso = $alumno->getPeso();
			$GrupoSanguineo = $alumno->getGrupoSanguineo();
			$Medicacion = $alumno->getMedicacion();
			$DietaEspecial = $alumno->getDietaEspecial();
			$ImpedimentoFisico = $alumno->getImpedimentoFisico();
			$Alergias = $alumno->getAlergias();
			$ProblemasVista = $alumno->getProblemasVista();
			

			$ProblemasSalud = $alumno->getProblemasSalud();
			
			$Grado = $alumno->getGrado();
			$TipoInscripcion = $alumno->getTipoInscripcion();
		
		$sql = "INSERT INTO `alumnos`(`id`, `PrimerNombre`, `SegundoNombre`, `PrimerApellido`, `SegundoApellido`, `Genero`, `Cedula`, `TipoCedula`, `CedulaRepresentante`, `FechaNacimiento`, `Estado`, `Municipio`, `Parroquia`, `Ciudad`, `PuedeIrseSolo`, `ContactoAuxiliar`, `TelefonoAuxiliar`, `RelacionAuxiliar`, `Estatura`, `Peso`, `GrupoSanguineo`, `Medicacion`, `DietaEspecial`, `ImpedimentoFisico`, `Alergias`, `ProblemasVista`, `ProblemasSalud`, `Grado`, `TipoInscripcion`) 
		VALUES (
		NULL,
		'$PrimerNombre',
		'$SegundoNombre',
		'$PrimerApellido',
		'$SegundoApellido',
		'$Genero',
		'$Cedula',
		'$TipoCedula',
		'$CedulaRepresentante','
		$FechaNacimiento',
		'$Estado',
		'$Municipio',
		'$Parroquia',
		'$Ciudad',
		'$PuedeIrseSolo',
		'$ContactoAuxiliar',
		'$TelefonoAuxiliar',
		'$RelacionAuxiliar',
		'$Estatura','$Peso',
		'$GrupoSanguineo',
		'$Medicacion',
		'$DietaEspecial',
		'$ImpedimentoFisico',
		'$Alergias',
		'$ProblemasVista',
		'$ProblemasSalud',
		'$Grado',
		'$TipoInscripcion')";

		$conexion->query($sql) or die("error: ".$conexion->error);

		desconectarBD($conexion);
	}
	public function editarAlumno() {
		$conexion = conectarBD();

		$conexion->query($sql) or die("error: ".$conexion->error);

		desconectarBD($conexion);
	}
	public function mostrarTodos($criterio = '1') {
		$conexion = conectarBD();

		
		$sql = "SELECT * FROM alumnos";
		
		if ($criterio == '1') {
			$sql .= " ORDER BY `id` ASC";
		}
		
		elseif ($criterio == '2') {
			$sql .= " ORDER BY `id` DESC";
		}
		
		$resultados = $conexion->query($sql);

		$listaAlumnos = [];

		while ($consulta = $resultados->fetch_object()) {
			$listaAlumnos[] = $consulta;    
		}

		desconectarBD($conexion);

		return $listaAlumnos;
	}
	public function mostrarAlumno($id) {


		$conexion = conectarBD();

		$sql = "SELECT * FROM alumnos WHERE `id` = $id";

		$resultado = $conexion->query($sql) or die("error: ".$conexion->error);

		$consulta = $resultado->fetch_object();

		desconectarBD($conexion);

		return $consulta;

	}
	public function consultarAlumnos($busqueda = NULL,$ordenamiento = '1',$criterio = '1') {

		//para hacer un buscador

		$conexion = conectarBD();
		if ($busqueda != NULL) {
			$sql = 
			"SELECT * FROM bd_proyecto.alumnos WHERE 
			`id` LIKE '%$busqueda%' 
			OR `PrimerNombre` LIKE '%$busqueda%' 
			OR `SegundoNombre` LIKE '%$busqueda%' 
			OR `PrimerApellido` LIKE '%$busqueda%' 
			OR `SegundoApellido` LIKE '%$busqueda%' 
			OR `Genero` LIKE '%$busqueda%' 
			OR `Cedula` LIKE '%$busqueda%' 
			OR `TipoCedula` LIKE '%$busqueda%' 
			OR `CedulaRepresentante` LIKE '%$busqueda%' 
			OR `FechaNacimiento` LIKE '%$busqueda%' 
			OR `Grado` LIKE '%$busqueda%' 
			OR `TipoInscripcion` LIKE '%$busqueda%'";
		}
		else {
			$sql = "SELECT * FROM bd_proyecto.alumnos";
		}
		

		//Esto indica por cual columna se va a ordenar
		if ($ordenamiento == '1') {
			$sql .= " ORDER BY `id`";
		}
		elseif ($ordenamiento == '2') {
			$sql .= " ORDER BY `PrimerNombre`";
		}
		elseif ($ordenamiento == '3') {
			$sql .= " ORDER BY `PrimerApellido`";
		}
		elseif ($ordenamiento == '4') {
			$sql .= " ORDER BY `Cedula`";
		}
		elseif ($ordenamiento == '5') {
			$sql .= " ORDER BY `CedulaRepresentante`";
		}
		elseif ($ordenamiento == '6') {
			$sql .= " ORDER BY `Grado`";
		}
		elseif ($ordenamiento == '7') {
			$sql .= " ORDER BY `TipoInscripcion`";
		}
		else {
			$sql .= " ORDER BY `id`";
		}
		
		if ($criterio == '1') {
			$sql .= " ASC";
		}
		elseif ($criterio == '2') {
			$sql .= " DESC";
		}

		$resultados = $conexion->query($sql) or die("error: ".$conexion->error);

		$listaAlumnos = [];

		while ($consulta = $resultados->fetch_object()) {
			$listaAlumnos[] = $consulta;   
		}

		desconectarBD($conexion);

		return $listaAlumnos;
	
	}
	public function eliminarAlumno($id) {
		
		$conexion = conectarBD();

		$sql = "DELETE FROM alumnos WHERE `id` = $id";

		$conexion->query($sql) or die("error: ".$conexion->error);

		desconectarBD($conexion);
	
	}

}

?>
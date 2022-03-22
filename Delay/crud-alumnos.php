<?php 

require('conexion.php');

class CrudAlumnos {


	#debe recibir un alumno como tal
	public function insertarAlumno($alumno,$ficha_medica,$datos_sociales,$tallas_alumnos,$grado,$año_escolar,$padre,$es_padre) {
		$conexion = conectarBD();
			
		#datos del padre o madre

		if ($es_padre != "Es_el_representante") {
			#Si no es el representante, se inserta la persona
			$array = $padre->retornarTodo();

			$Nombres = $padre->getNombres();
			$Apellidos = $padre->getApellidos();
			$Cedula = $padre->getCedula();
			$Correo = $padre->getCorreo();
			$Genero = $padre->getGenero();
			$Fecha_Nacimiento = $padre->getFecha_Nacimiento();
			$Lugar_Nacimiento = $padre->getLugar_Nacimiento();
			$Direccion = $padre->getDireccion();
			$Teléfono_Principal = $padre->getTeléfono_Principal();
			$Teléfono_Auxiliar = $padre->getTeléfono_Auxiliar();
			$Estado_Civil = $padre->getEstado_Civil();

			$sql = "INSERT INTO `personas`(`idPersonas`, `Nombres`, `Apellidos`, `Cédula`, `Fecha_Nacimiento`, `Lugar_Nacimiento`, `Género`, `Correo_Electronico`, `Dirección`, `Teléfono_Principal`, `Teléfono_Auxiliar`, `Estado_Civil`) VALUES (
				NULL,
				'$Nombres',
				'$Apellidos',
				'$Cedula',
				'$Fecha_Nacimiento',
				'$Lugar_Nacimiento',
				'$Genero',
				'$Correo',
				'$Direccion',
				'$Teléfono_Principal',
				'$Teléfono_Auxiliar',
				'$Estado_Civil'
			)";
			$conexion->query($sql) or die("error: ".$conexion->error);
			$padre->setidPadres($conexion->insert_id);
		}

		$alumno->insertarPersona();
/*
			$Nombres = $alumno->getNombres();
			$Apellidos = $alumno->getApellidos();
			$Cedula = $alumno->getCedula();
			$Correo = $alumno->getCorreo();
			$Genero = $alumno->getGenero();
			$Fecha_Nacimiento = $alumno->getFecha_Nacimiento();
			$Lugar_Nacimiento = $alumno->getLugar_Nacimiento();
			$Direccion = $alumno->getDireccion();
			$Teléfono_Principal = $alumno->getTeléfono_Principal();
			$Teléfono_Auxiliar = $alumno->getTeléfono_Auxiliar();
			$Estado_Civil = $alumno->getEstado_Civil();

			$sql = "INSERT INTO `personas`(`idPersonas`, `Nombres`, `Apellidos`, `Cédula`, `Fecha_Nacimiento`, `Lugar_Nacimiento`, `Género`, `Correo_Electronico`, `Dirección`, `Teléfono_Principal`, `Teléfono_Auxiliar`, `Estado_Civil`) VALUES (
				NULL,
				'$Nombres',
				'$Apellidos',
				'$Cedula',
				'$Fecha_Nacimiento',
				'$Lugar_Nacimiento',
				'$Genero',
				'$Correo',
				'$Direccion',
				'$Teléfono_Principal',
				'$Teléfono_Auxiliar',
				'$Estado_Civil'
			)";
			$conexion->query($sql) or die("error: ".$conexion->error);
			$alumno->setidAlumnos($conexion->insert_id);
			*/
		$datos_alumno = $alumno->retornarTodo();

		$Plantel_Procedencia = $datos_alumno['Plantel_Procedencia'];

		$sql = "SELECT `Cédula` FROM `personas` WHERE `idPersonas` = $conexion->insert_id";
		$busqueda = $conexion->query($sql) or die("error: ".$conexion->error);
		$resultados = $busqueda->fetch_array();

		$Cedula_Persona = $resultados[0];
		$idRepresentante = $_SESSION['representante'][0];

		print_r($resultados); 

/*
		$sql = "INSERT INTO `alumnos`(`idAlumnos`, `Plantel_Procedencia`, `Cedula_Persona`, `idRepresentante`, `idPadre`) VALUES (
			NULL,
			'$Plantel_Procedencia',
			'$Cedula_Persona',
			'$idRepresentante',
			'$idPadre')";
	*/
		#$conexion->query($sql) or die("error: ".$conexion->error);

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
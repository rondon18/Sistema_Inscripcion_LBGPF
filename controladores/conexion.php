<?php

	// Iniciar la conexion a base de datos
	function conectarBD() {
		
		$servidor 	= "localhost";
		$usuario		= "root";	
		$bd       	= "base_proyecto_nueva";
		$clave		= "";
		
		//instancia la clase mysqli y se conecta a la base de datos
		$conexion= new mysqli($servidor,$usuario,$clave,$bd);


		// Establece la codificacion a utf8
		$conexion->set_charset("utf8");
		
		if($conexion->connect_errno) {
			echo "Error al conectar ". $this->conexion->connect_errno."<br>";
			exit();
		}

		return $conexion;
	}


	// Cerrar la conexion a base de datos
	function desconectarBD($conexion) {
		if ($conexion) {
			$conexion->close();
		}
	}
?>
<?php 

require_once('conexion.php');

class CrudUsuarios {


	#debe recibir un objeto como tal
	public function insertarUsuario($Usuario) {
		
		#Prepara la orden SQL
		$conexion = conectarBD();
		#NULL pasa a ser el id, que es autoincremento

		$Cedula 		= $Usuario->getCedula();
		$Nombre1 	= $Usuario->getNombre1();
		$Nombre2 	= $Usuario->getNombre2();
		$Apellido1 	= $Usuario->getApellido1();
		$Apellido2 	= $Usuario->getApellido2();
		$Genero 		= $Usuario->getGenero();
		$Clave 		= $Usuario->getClave();
		$Telefono1 	= $Usuario->getTelefono1();
		$Telefono2 	= $Usuario->getTelefono2();
		$Email 		= $Usuario->getEmail();
		$Direccion 	= $Usuario->getDireccion();
		

		$sql = "INSERT INTO `bd_proyecto`.`usuarios` (`id`, `Cedula`, `PrimerNombre`, `SegundoNombre`, `PrimerApellido`, `SegundoApellido`, `Genero`, `Clave`, `Telefono1`, `Telefono2`, `Direccion`, `Correo`) VALUES (NULL, '$Cedula', '$Nombre1', '$Nombre2', '$Apellido1', '$Apellido2', '$Genero', '$Clave', '$Telefono1', '$Telefono2', '$Direccion', '$Email')";


		$conexion->query($sql) or die("error: ".$conexion->error);

		desconectarBD($conexion);
	}
	public function editarUsuario($Usuario,$Id) {
		#Se edita el usuario en base a su id, esto permite editar un usuario que no sea suyo si es un administrador. Por si el usuario olvida su clave o parecido

		$Cedula 		= $Usuario->getCedula();
		$Nombre1 	= $Usuario->getNombre1();
		$Nombre2 	= $Usuario->getNombre2();
		$Apellido1 	= $Usuario->getApellido1();
		$Apellido2 	= $Usuario->getApellido2();
		$Genero 		= $Usuario->getGenero();
		$Clave 		= $Usuario->getClave();
		$Telefono1 	= $Usuario->getTelefono1();
		$Telefono2 	= $Usuario->getTelefono2();
		$Email 		= $Usuario->getEmail();
		$Direccion 	= $Usuario->getDireccion();

		#var_dump($Usuario);
		
		$conexion = conectarBD();

		$sql = "UPDATE `bd_proyecto`.`usuarios` SET id ='$Id', `Cedula`= '$Cedula',
		`PrimerNombre`= '$Nombre1',`SegundoNombre`='$Nombre2',`PrimerApellido`= '$Apellido1',
		`SegundoApellido`= '$Apellido2',`Genero`= '$Genero',`Clave`= '$Clave',`Telefono1`= '$Telefono1',`Telefono2`= '$Telefono2',`Direccion`= '$Direccion',`Correo`='$Email' WHERE `id`=$Id";

		$conexion->query($sql) or die("error: ".$conexion->error);

		desconectarBD($conexion);


	}
	
	public function mostrarTodos($criterio = '1') {
		$conexion = conectarBD();

		
		$sql = "SELECT * FROM usuarios";
		
		if ($criterio == '1') {
			$sql .= " ORDER BY `id` ASC";
		}
		
		elseif ($criterio == '2') {
			$sql .= " ORDER BY `id` DESC";
		}
		
		$resultados = $conexion->query($sql);

		$listaUsuarios = [];

		while ($consulta = $resultados->fetch_object()) {
			$listaUsuarios[] = $consulta;    
		}

		desconectarBD($conexion);

		return $listaUsuarios;
	}
	public function consultarUsuarios($busqueda,$ordenamiento = '1',$criterio = '1') {

		//para hacer un buscador

		$conexion = conectarBD();

		$sql = 
		"SELECT * FROM bd_proyecto.usuarios WHERE 
		`PrimerNombre` LIKE '%$busqueda%'
		OR `SegundoNombre` LIKE '%$busqueda%'
		OR `PrimerApellido` LIKE '%$busqueda%'
		OR `SegundoApellido` LIKE '%$busqueda%'
		OR `Cedula` LIKE '%$busqueda%'
		OR `Correo` LIKE  '%$busqueda%'
		OR `Telefono1` LIKE '%$busqueda%'
		OR `Telefono2` LIKE '%$busqueda%'";

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
			$sql .= " ORDER BY `Correo`";
		}

		if ($criterio == '1') {
			$sql .= " ASC";
		}
		elseif ($criterio == '2') {
			$sql .= " DESC";
		}
		
		$resultados = $conexion->query($sql);

		$listaUsuarios = [];

		while ($consulta = $resultados->fetch_object()) {
			$listaUsuarios[] = $consulta;   
		}

		desconectarBD($conexion);

		return $listaUsuarios;
	
	}
	
	public function eliminarUsuario($id) {
		$conexion = conectarBD();

		$sql = "DELETE FROM usuarios WHERE id = $id";

		$conexion->query($sql) or die("error: ".$conexion->error) ;

		desconectarBD($conexion);
		
	}

}

?> 
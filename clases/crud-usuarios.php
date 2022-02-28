<?php 

require_once('../controladores/conexion.php');

class CrudUsuarios {

	#debe recibir un objeto como tal
	public function insertarUsuario($usuario) {
		
		#Prepara la orden SQL
		$conexion = conectarBD();
		#NULL pasa a ser el id, que es autoincremento

		$sql = "INSERT INTO `personas`(`idPersonas`, `Nombres`, `Apellidos`, `Cédula`, `Fecha_Nacimiento`, `Género`, `Correo_Electronico`, `Dirección`, `Teléfono`) 
		VALUES (
			NUll,
			$usuario->get(),
			$usuario->get(),
			$usuario->get(),
			$usuario->get(),
			$usuario->get(),
			$usuario->get(),
			$usuario->get(),
			$usuario->get()
		)";

		$sql = "INSERT INTO `usuarios`(`idUsuarios`, `Clave`, `Privilegios`, `Cedula_Persona`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')";

		$sql = "INSERT INTO `representantes`(`idRepresentantes`, `Vinculo`, `Banco`, `Tipo_Cuenta`, `Cta_Bancaria`, `Estado_Civil`, `Contacto_Aux`, `Grado_Inst`, `Empleo`, `id_Usuario`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]')";

		$conexion->query($sql) or die("error: ".$conexion->error);

		desconectarBD($conexion);
	}
	// public function editarUsuario($Usuario,$Id) {
	// 	#Se edita el usuario en base a su id, esto permite editar un usuario que no sea suyo si es un administrador. Por si el usuario olvida su clave o parecido

	// 	$Cedula 		= $Usuario->getCedula();
	// 	$Nombre1 	= $Usuario->getNombre1();
	// 	$Nombre2 	= $Usuario->getNombre2();
	// 	$Apellido1 	= $Usuario->getApellido1();
	// 	$Apellido2 	= $Usuario->getApellido2();
	// 	$Genero 		= $Usuario->getGenero();
	// 	$Clave 		= $Usuario->getClave();
	// 	$Telefono1 	= $Usuario->getTelefono1();
	// 	$Telefono2 	= $Usuario->getTelefono2();
	// 	$Email 		= $Usuario->getEmail();
	// 	$Direccion 	= $Usuario->getDireccion();

	// 	#var_dump($Usuario);
		
	// 	$conexion = conectarBD();

	// 	$sql = "UPDATE `bd_proyecto`.`usuarios` SET id ='$Id', `Cedula`= '$Cedula',
	// 	`PrimerNombre`= '$Nombre1',`SegundoNombre`='$Nombre2',`PrimerApellido`= '$Apellido1',
	// 	`SegundoApellido`= '$Apellido2',`Genero`= '$Genero',`Clave`= '$Clave',`Telefono1`= '$Telefono1',`Telefono2`= '$Telefono2',`Direccion`= '$Direccion',`Correo`='$Email' WHERE `id`=$Id";

	// 	$conexion->query($sql) or die("error: ".$conexion->error);

	// 	desconectarBD($conexion);


	// }
	
	// public function mostrarTodos($criterio = '1') {
	// 	$conexion = conectarBD();

		
	// 	$sql = "SELECT * FROM usuarios";
		
	// 	if ($criterio == '1') {
	// 		$sql .= " ORDER BY `id` ASC";
	// 	}
		
	// 	elseif ($criterio == '2') {
	// 		$sql .= " ORDER BY `id` DESC";
	// 	}
		
	// 	$resultados = $conexion->query($sql);

	// 	$listaUsuarios = [];

	// 	while ($consulta = $resultados->fetch_object()) {
	// 		$listaUsuarios[] = $consulta;    
	// 	}

	// 	desconectarBD($conexion);

	// 	return $listaUsuarios;
	// }
	// public function consultarUsuarios($busqueda,$ordenamiento = '1',$criterio = '1') {

	// 	//para hacer un buscador

	// 	$conexion = conectarBD();

	// 	$sql = 
	// 	"SELECT * FROM bd_proyecto.usuarios WHERE 
	// 	`PrimerNombre` LIKE '%$busqueda%'
	// 	OR `SegundoNombre` LIKE '%$busqueda%'
	// 	OR `PrimerApellido` LIKE '%$busqueda%'
	// 	OR `SegundoApellido` LIKE '%$busqueda%'
	// 	OR `Cedula` LIKE '%$busqueda%'
	// 	OR `Correo` LIKE  '%$busqueda%'
	// 	OR `Telefono1` LIKE '%$busqueda%'
	// 	OR `Telefono2` LIKE '%$busqueda%'";

	// 	//Esto indica por cual columna se va a ordenar
	// 	if ($ordenamiento == '1') {
	// 		$sql .= " ORDER BY `id`";
	// 	}
	// 	elseif ($ordenamiento == '2') {
	// 		$sql .= " ORDER BY `PrimerNombre`";
	// 	}
	// 	elseif ($ordenamiento == '3') {
	// 		$sql .= " ORDER BY `PrimerApellido`";
	// 	}
	// 	elseif ($ordenamiento == '4') {
	// 		$sql .= " ORDER BY `Cedula`";
	// 	}
	// 	elseif ($ordenamiento == '5') {
	// 		$sql .= " ORDER BY `Correo`";
	// 	}

	// 	if ($criterio == '1') {
	// 		$sql .= " ASC";
	// 	}
	// 	elseif ($criterio == '2') {
	// 		$sql .= " DESC";
	// 	}
		
	// 	$resultados = $conexion->query($sql);

	// 	$listaUsuarios = [];

	// 	while ($consulta = $resultados->fetch_object()) {
	// 		$listaUsuarios[] = $consulta;   
	// 	}

	// 	desconectarBD($conexion);

	// 	return $listaUsuarios;
	
	// }
	
	// public function eliminarUsuario($id) {
	// 	$conexion = conectarBD();

	// 	$sql = "DELETE FROM usuarios WHERE id = $id";

	// 	$conexion->query($sql) or die("error: ".$conexion->error) ;

	// 	desconectarBD($conexion);
		
	// }

}

?> 
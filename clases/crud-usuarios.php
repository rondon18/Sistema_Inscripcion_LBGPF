<?php 

require_once('../controladores/conexion.php');

class CrudUsuarios {

	#debe recibir un objeto como tal
	public function insertarUsuario($usuario,$auxiliar) {
		$conexion = conectarBD();

		$usuario->insertarPersona();

		#datos de usuario
		$Clave = $array['Clave'];
		$Privilegios = $array['Privilegios'];

		$sql = "INSERT INTO `usuarios`(`idUsuarios`, `Clave`, `Privilegios`, `Cedula_Persona`) VALUES (NULL, '$Clave','$Privilegios', '$Cedula')";

		$conexion->query($sql) or die("error: ".$conexion->error);

		#datos economicos
		$Vinculo = $array['Vinculo'];
		$Banco = $array['Banco'];
		$Tipo_Cuenta = $array['Tipo_Cuenta'];
		$Nro_Cuenta = $array['Nro_Cuenta'];
		$Contacto_Aux = $array['Contacto_Aux'];
		$Grado_Inst = $array['Grado_Inst'];
		$Empleo = $array['Empleo'];
		$Lugar_Trabajo = $array['Lugar_Trabajo'];
		$Teléfono_Trabajo = $array['Teléfono_Trabajo'];
		$Remuneración = $array['Remuneración'];
		$Tipo_Remuneración = $array['Tipo_Remuneración'];


		$consulta_id_usuario = "SELECT `idUsuarios` FROM `usuarios` WHERE `Cedula_Persona` = $Cedula";
		$busqueda = $conexion->query($consulta_id_usuario) or die("error: ".$conexion->error);
		$Id_usuario = $busqueda->fetch_array()[0] ?? NULL; 

		$sql = "INSERT INTO `representantes`(`idRepresentantes`, `Vinculo`, `Banco`, `Tipo_Cuenta`, `Cta_Bancaria`, `Grado_Inst`, `Empleo`, `Lugar_Trabajo`, `Teléfono_Trabajo`, `Remuneracion`, `Tipo_Remuneración`, `id_Usuario`, `Cedula_Persona`) VALUES (
			NULL,
			'$Vinculo',
			'$Banco',
			'$Tipo_Cuenta',
			'$Nro_Cuenta',
			'$Grado_Inst',
			'$Empleo',
			'$Lugar_Trabajo',
			'$Teléfono_Trabajo',
			'$Remuneración',
			'$Tipo_Remuneración',
			'$Id_usuario',
			'$Cedula'
			)";

		$conexion->query($sql) or die("error: ".$conexion->error);
		
		$sql = "SELECT `idRepresentantes` From `representantes` WHERE `Cedula_Persona` = $Cedula";
		$consulta = $conexion->query($sql) or die("error: ".$conexion->error);
		$resultado = $consulta->fetch_array();

		#contacto de emergencia
		$datos_auxiliar = $auxiliar->retornarTodo();

		$Relación_Auxiliar = $datos_auxiliar['Relación'];
		$Nombre_Contacto_Emergencia = $datos_auxiliar['Nombre_Aux'];
		$Tfl_P_Contacto_Aux = $datos_auxiliar['Tfl_P_Contacto_Aux'];
		$Tfl_S_Contacto_Aux = $datos_auxiliar['Tfl_S_Contacto_Aux'];


		$sql ="INSERT INTO `contactos_auxiliares`(`idContactoAuxiliar`, `idRepresentante`, `Relación`, `Nombre_Aux`, `Tfl_P_Contacto_Aux`, `Tfl_S_Contacto_Aux`) VALUES (
			NULL,
			$resultado[0],
			'$Relación_Auxiliar',
			'$Nombre_Contacto_Emergencia',
			'$Tfl_P_Contacto_Aux',
			'$Tfl_S_Contacto_Aux'
			)";
		$consulta = $conexion->query($sql) or die("error: ".$conexion->error);

	}
	public function eliminarUsuario($id) {
		$conexion = conectarBD();
		$sql = "DELETE FROM `usuarios` WHERE `idUsuarios` = '$id'";
		$conexion->query($sql) or die("error: ".$conexion->error);
	}
 	public function editarUsuario($usuario,$id) {
 		$conexion = conectarBD();
		#Prepara la orden SQL
		$conexion = conectarBD();
		

		#datos de persona

		$array = $usuario->retornarTodo();

		$Nombres = $array["Nombres"];
		$Apellidos = $array["Apellidos"];
		$Cedula = $array["Cedula"];
		$Correo = $array["Correo"];
		$Genero = $array["Genero"];
		$Fecha_Nacimiento = $array["Fecha_Nacimiento"];
		$Lugar_Nacimiento = $array["Lugar_Nacimiento"];
		$Direccion = $array["Direccion"];
		$Teléfono_Principal = $array["Teléfono_Principal"];
		$Teléfono_Auxiliar = $array["Teléfono_Auxiliar"];
		$Estado_Civil = $array["Estado_Civil"];


		

		$sql = "UPDATE `personas` SET 
				`Nombres`='$Nombres',
				`Apellidos`='$Apellidos',
				`Cédula`='$Cedula',
				`Fecha_Nacimiento`='$Fecha_Nacimiento',
				`Lugar_Nacimiento`='$Lugar_Nacimiento',
				`Género`='$Genero',
				`Correo_Electronico`='$Correo',
				`Dirección`='$Direccion',
				`Teléfono_Principal`='$Teléfono_Principal',
				`Teléfono_Auxiliar`='$Teléfono_Auxiliar',
				`Estado_Civil`='$Estado_Civil' 
				WHERE `idPersonas`='$id'";

		$conexion->query($sql) or die("error: ".$conexion->error);

		#datos de usuario


		$Clave = $array['Clave'];
		$Privilegios = $array['Privilegios'];

		$sql = 	"UPDATE `usuarios` SET 
						`Clave`='[value-2]',
						`Privilegios`='[value-3]',
						`Cedula_Persona`='[value-4]' 
					WHERE `idUsuarios`='[value-1]'";

		$conexion->query($sql) or die("error: ".$conexion->error);

		#datos economicos

		$Vinculo = $array['Vinculo'];
		$Banco = $array['Banco'];
		$Tipo_Cuenta = $array['Tipo_Cuenta'];
		$Nro_Cuenta = $array['Nro_Cuenta'];
		$Contacto_Aux = $array['Contacto_Aux'];
		$Grado_Inst = $array['Grado_Inst'];
		$Empleo = $array['Empleo'];
		$Lugar_Trabajo = $array['Lugar_Trabajo'];
		$Teléfono_Trabajo = $array['Teléfono_Trabajo'];
		$Remuneración = $array['Remuneración'];


		$consulta_id_usuario = "SELECT `idUsuarios` FROM `usuarios` WHERE `Cedula_Persona` = $Cedula";
		$busqueda = $conexion->query($consulta_id_usuario) or die("error: ".$conexion->error);
		$Id_usuario = $busqueda->fetch_array()[0]; 


		

		$sql = "UPDATE `usuarios` SET `idUsuarios`='[value-1]',`Clave`='[value-2]',`Privilegios`='[value-3]',`Cedula_Persona`='[value-4]' WHERE 1";

		$conexion->query($sql) or die("error: ".$conexion->error);
 	}
}


/*
		

		

		$sql = "INSERT INTO `representantes`(`idRepresentantes`, `Vinculo`, `Banco`, `Tipo_Cuenta`, `Cta_Bancaria`, `Estado_Civil`, `Contacto_Aux`, `Grado_Inst`, `Empleo`, `id_Usuario`) VALUES (
			
			)";

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
*/

?> 
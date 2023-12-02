<?php  
	// include 'personas.php';
	// include '../controladores/conexion.php';

	class usuarios extends personas {

		// 
		
		private $cedula_persona;
		private $rol;
		private $privilegios;
		private $contrasenia;
		private $pregunta_seg_1;
		private $respuesta_1;
		private $pregunta_seg_2;
		private $respuesta_2;


		// CONSTRUCTOR
		public function _construct() {}

		public function insertar_usuarios() {
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();
			$rol = $this->get_rol();
			$privilegios = $this->get_privilegios();
			$contrasenia = $this->get_contrasenia();
			$pregunta_seg_1 = $this->get_pregunta_seg_1();
			$respuesta_1 = $this->get_respuesta_1();
			$pregunta_seg_2 = $this->get_pregunta_seg_2();
			$respuesta_2 = $this->get_respuesta_2();

			$sql = "
				INSERT INTO `usuarios`(
			    `cedula_persona`,
			    `rol`,
			    `privilegios`,
			    `contraseña`,
			    `pregunta_seg_1`,
			    `respuesta_1`,
			    `pregunta_seg_2`,
			    `respuesta_2`
				)
				VALUES(
			    '$cedula_persona',
			    '$rol',
			    '$privilegios',
			    '$contrasenia',
			    '$pregunta_seg_1',
			    '$respuesta_1',
			    '$pregunta_seg_2',
			    '$respuesta_2'
				)
				ON DUPLICATE KEY UPDATE
				`cedula_persona` = `cedula_persona`;
			";

			// echo $sql;

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function editar_usuarios() {
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();
			$pregunta_seg_1 = $this->get_pregunta_seg_1();
			$respuesta_1 = $this->get_respuesta_1();
			$pregunta_seg_2 = $this->get_pregunta_seg_2();
			$respuesta_2 = $this->get_respuesta_2();

			$sql = "
				UPDATE
			    `usuarios`
				SET
			    `pregunta_seg_1` = '$pregunta_seg_1',
			    `respuesta_1` = '$respuesta_1',
			    `pregunta_seg_2` = '$pregunta_seg_2',
			    `respuesta_2` = '$respuesta_2'
				WHERE
					`cedula_persona` = '$cedula_persona';
			";

			echo $sql;

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}


		public function editar_contrasenia() {
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();
			$contrasenia = $this->get_contrasenia();

			$sql = "
				UPDATE
			    `usuarios`
				SET
			    `contraseña` = '$contrasenia'
				WHERE
					`cedula_persona` = '$cedula_persona';
			";

			echo $sql . "<br>";

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function mostrar_usuarios() {
			// Muestra todos los usuarios registrados
			$conexion = conectarBD();

			$sql = "SELECT * FROM `vista_usuarios`";

			$resultado = $conexion->query($sql) or die("error: ".$conexion->error);
			
			$lista_usuarios = $resultado->fetch_all(MYSQLI_ASSOC);
			
			desconectarBD($conexion);

			return $lista_usuarios;
		}


		public function consultar_usuario() {

			$conexion = conectarBD();

			$cedula = $this->get_cedula_persona();

			$sql = "SELECT * FROM vista_usuarios WHERE cedula = '$cedula';";

			$consulta_usuario = $conexion->query($sql) or die("error: ".$conexion->error);
			$usuario = $consulta_usuario->fetch_assoc();

			desconectarBD($conexion);

			return $usuario;

		}

		public function chequeo_login() {
			$conexion = conectarBD();

			$cedula = $this->get_cedula();
			$contrasenia = $this->get_contrasenia();

			$sql = "SELECT * FROM vista_usuarios WHERE cedula = '$cedula' and contraseña = '$contrasenia';";

			echo $sql;

			$consulta_usuario = $conexion->query($sql) or die("error: ".$conexion->error);
			$usuario = $consulta_usuario->fetch_assoc();

			desconectarBD($conexion);

			return $usuario;
		}

		// GETTERS
		public function get_cedula_persona() {
			return $this->cedula_persona;
		}
		
		public function get_rol() {
			return $this->rol;
		}
		
		public function get_privilegios() {
			return $this->privilegios;
		}
		
		public function get_contrasenia() {
			return $this->contraseña;
		}
		
		public function get_pregunta_seg_1() {
			return $this->pregunta_seg_1;
		}
		
		public function get_respuesta_1() {
			return $this->respuesta_1;
		}
		
		public function get_pregunta_seg_2() {
			return $this->pregunta_seg_2;
		}
		
		public function get_respuesta_2() {
			return $this->respuesta_2;
		}		


		// SETTERS
		public function set_cedula_persona($cedula_persona) {
			$this->cedula_persona = $cedula_persona;
		}
		
		public function set_rol($rol) {
			$this->rol = $rol;
		}
		
		public function set_privilegios($privilegios) {
			$this->privilegios = $privilegios;
		}
		
		public function set_contrasenia($contrasenia) {
			$this->contraseña = $contrasenia;
		}
		
		public function set_pregunta_seg_1($pregunta_seg_1) {
			$this->pregunta_seg_1 = $pregunta_seg_1;
		}
		
		public function set_respuesta_1($respuesta_1) {
			$this->respuesta_1 = $respuesta_1;
		}
		
		public function set_pregunta_seg_2($pregunta_seg_2) {
			$this->pregunta_seg_2 = $pregunta_seg_2;
		}
		
		public function set_respuesta_2($respuesta_2) {
			$this->respuesta_2 = $respuesta_2;
		}
	}	



	// $usuario = new usuarios();

	// $lista_usuarios = $usuario->mostrar_usuarios();

	// foreach ($lista_usuarios as $value) {

	// 	$usuario->set_cedula_persona($value["cedula_persona"]);
	// 	$usuario->set_contrasenia(hash("sha256", $value["contraseña"]));
	// 	$usuario->editar_contrasenia();
	// }

?>
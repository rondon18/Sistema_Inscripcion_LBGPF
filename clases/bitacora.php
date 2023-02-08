<?php  

	class bitacora {

		// 

		private $id_bitacora;
		private $fecha_ingreso;
		private $fecha_salida;
		private $hora_ingreso;
		private $hora_salida;
		private $acciones_realizadas;
		private $cedula_usuario;


		// CONSTRUCTOR
		public function __construct(){}


		// Primera instaciación de la bitacora (login)
		public function iniciar_bitacora() {
			
			// conecta con la base de datos
			$conexion = conectarBD();
			
			
			// toma la fecha y hora actual para registrar el inicio de sesion
			date_default_timezone_set("America/Caracas");
			
			$fecha_ingreso = date("Y-m-d");
			$hora_ingreso = date("H:i:s");


			// primera accion como inicia sesión
			$acciones_realizadas = "Inicia sesión";

			$cedula_usuario = $this->get_cedula_usuario();

			$sql = "
				INSERT INTO `bitacora`(
			    `id_bitacora`,
			    `fecha_ingreso`,
			    `fecha_salida`,
			    `hora_ingreso`,
			    `hora_salida`,
			    `acciones_realizadas`,
			    `cedula_usuario`
				)
				VALUES(
			    NULL,
			    '$fecha_ingreso',
			    '',
			    '$hora_ingreso',
			    '',
			    '$acciones_realizadas',
			    '$cedula_usuario'
				)
			";

			$conexion->query($sql) or die("error: ".$conexion->error);
			$id_bitacora = $conexion->insert_id;

			desconectarBD($conexion);

			return $id_bitacora;
		}

		// actualiza la bitacora en la base de datos sobre el mismo registro
		public function actualizar_bitacora(){

			// conecta con la base de datos
			$conexion = conectarBD();

			// toma la fecha y hora actual para registrar el cierre de sesion
			$id_bitacora = $this->get_id_bitacora();
			$acciones_realizadas = $this->get_acciones_realizadas();



			// actualiza las acciones realizadas
			$sql = "
				UPDATE
			    `bitacora`
				SET
			    `acciones_realizadas` = '$acciones_realizadas'
				WHERE
			    `id_bitacora` = '$id_bitacora';
			";

			// ejecuta la consulta y se desconecta
			$conexion->query($sql) or die("error: ".$conexion->error);
			desconectarBD($conexion);
		}

		public function cerrar_bitacora(){
			$conexion = conectarBD();

			date_default_timezone_set("America/Caracas");
			$fecha_salida = date("Y-m-d");
			$hora_salida = date("H:i:s");

			$id_bitacora = $this->get_id_bitacora();

			$sql = "
				UPDATE
					`bitacora`
				SET
					`fecha_salida` = '$fecha_salida',
					`hora_salida` = '$hora_salida'
				WHERE
					`id_bitacora` = '$id_bitacora'
			";

			$conexion->query($sql) or die("error: ".$conexion->error);
			desconectarBD($conexion);
		}

		public function mostrar_bitacora() {
			$conexion = conectarBD();

			$sql = "SELECT * FROM `bitacora` ORDER BY `id_bitacora` DESC";

			$consulta_registros = $conexion->query($sql) or die("error: ".$conexion->error);
			$registros = $consulta_registros->fetch_all(MYSQLI_ASSOC);

			desconectarBD($conexion);

			return $registros;
	}


		// GETTERS
		public function get_id_bitacora() {
			return $this->id_bitacora;
		}

		public function get_fecha_ingreso() {
			return $this->fecha_ingreso;
		}

		public function get_fecha_salida() {
			return $this->fecha_salida;
		}

		public function get_hora_ingreso() {
			return $this->hora_ingreso;
		}

		public function get_hora_salida() {
			return $this->hora_salida;
		}

		public function get_acciones_realizadas() {
			return $this->acciones_realizadas;
		}

		public function get_cedula_usuario() {
			return $this->cedula_usuario;
		}


		// SETTERS
		public function set_id_bitacora($id_bitacora) {
			$this->id_bitacora = $id_bitacora;
		}
		public function set_fecha_ingreso($fecha_ingreso) {
			$this->fecha_ingreso = $fecha_ingreso;
		}
		public function set_fecha_salida($fecha_salida) {
			$this->fecha_salida = $fecha_salida;
		}
		public function set_hora_ingreso($hora_ingreso) {
			$this->hora_ingreso = $hora_ingreso;
		}
		public function set_hora_salida($hora_salida) {
			$this->hora_salida = $hora_salida;
		}
		public function set_acciones_realizadas($acciones_realizadas) {
			$this->acciones_realizadas = $acciones_realizadas;
		}
		public function set_cedula_usuario($cedula_usuario) {
			$this->cedula_usuario = $cedula_usuario;
		}
	}

// class bitacora {

// 	public function __construct(){}

// 	public function guardar_bitacora($idUsuarios){
// 		$conexion = conectarBD();
// 		date_default_timezone_set("America/Caracas");
// 		$fechaActual = date("Y-m-d");
// 		$horaActual = date("H:i:s");

// 		$links = "Inicia Sesión";

// 		$sql = "
// 		INSERT INTO `bitacora`
// 		(
// 			`id_bitacora`, 
// 			`idUsuarios`, 
// 			`fechaInicioSesión`, 
// 			`horaInicioSesión`, 
// 			`linksVisitados`, 
// 			`fechaFinalSesión`, 
// 			`horaFinalSesión`
// 		) 
// 		VALUES (
// 			NULL,
// 			'$idUsuarios',
// 			'$fechaActual',
// 			'$horaActual',
// 			'$links',
// 			NULL,
// 			NULL
// 		)";

// 		$conexion->query($sql) or die("error: ".$conexion->error);
// 		$id_bitacora = $conexion->insert_id;

// 		desconectarBD($conexion);

// 		return $id_bitacora;
// 	}

// 	public function actualizar_bitacora($acciones,$id_bitacora){

// 		$conexion = conectarBD();

// 		$sql = "UPDATE `bitacora` SET
// 		`linksVisitados`='$acciones'
// 		WHERE `id_bitacora`='$id_bitacora'";

// 		$conexion->query($sql) or die("error: ".$conexion->error);
// 		desconectarBD($conexion);
// 	}

// 	public function cerrar_bitacora($id_bitacora){
// 		$conexion = conectarBD();

// 		date_default_timezone_set("America/Caracas");
// 		$fechaFinal = date("Y-m-d");
// 		$horaFinal = date("H:i:s");

// 		$sql = "UPDATE `bitacora` SET
// 		`fechaFinalSesión`='$fechaFinal',
// 		`horaFinalSesión`='$horaFinal'
// 		WHERE `id_bitacora`='$id_bitacora'";

// 		$conexion->query($sql) or die("error: ".$conexion->error);
// 		desconectarBD($conexion);
// 	}

// 	public function mostrar_bitacora() {
// 			$conexion = conectarBD();

// 			$sql = "SELECT * FROM `bitacora` ORDER BY `id_bitacora` DESC";

// 			$consulta_registros = $conexion->query($sql) or die("error: ".$conexion->error);
// 			$registros = $consulta_registros->fetch_all(MYSQLI_ASSOC);

// 			desconectarBD($conexion);

// 			return $registros;
// 	}
// }

?>
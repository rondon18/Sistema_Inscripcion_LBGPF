<?php 
	class Respaldo {

		private $idRespaldo;
		private $Nombre_Respaldo;
		private $Fecha_Respaldo;
		private $Hora_Respaldo;

		public function __construct($Nombre_Respaldo, $Fecha_Respaldo, $Hora_Respaldo){
			$this->setNombre_Respaldo($Nombre_Respaldo);
			$this->setFecha_Respaldo($Fecha_Respaldo);
			$this->setHora_Respaldo($Hora_Respaldo);
		}

		public function registrarRespaldo() {
			// Hace registro en la bd de cada respaldo generado por los usuarios
			$conexion = conectarBD();

			$Nombre_Respaldo = $this->getNombre_Respaldo();
			$Fecha_Respaldo = $this->getFecha_Respaldo();
			$Hora_Respaldo = $this->getHora_Respaldo();


			$sql = "INSERT INTO `respaldos`
			(
				`idRespaldo`,
				`Nombre_Respaldo`,
				`Fecha_Respaldo`,
				`Hora_Respaldo`
			) 
			VALUES 
			(
				NULL,
				'$Nombre_Respaldo',
				'$Fecha_Respaldo',
				'$Hora_Respaldo'
			)";
			
			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function mostrarRespaldos() {
			// Retorna todos los registros de bitacora existentes
			$conexion = conectarBD();

			$sql = "SELECT * FROM `respaldos`";

			$consulta_respaldos = $conexion->query($sql) or die("error: ".$conexion->error);
			$respaldo = $consulta_respaldos->fetch_all(MYSQLI_ASSOC);


			// Hace un arreglo de arreglos para contener los datos de los respaldos
			$Lista_respaldos = [];
			foreach ($respaldo as $respaldo) {
				$Lista_respaldos[]= $respaldo;
			}

			desconectarBD($conexion);

			return $Lista_respaldos;
		}

		public function setidRespaldo($idRespaldo) {
			$this->idRespaldo = $idRespaldo;
		}
		public function setNombre_Respaldo($Nombre_Respaldo) {
			$this->Nombre_Respaldo = $Nombre_Respaldo;
		}
		public function setFecha_Respaldo($Fecha_Respaldo) {
			$this->Fecha_Respaldo = $Fecha_Respaldo;
		}
		public function setHora_Respaldo($Hora_Respaldo) {
			$this->Hora_Respaldo = $Hora_Respaldo;
		}

		public function getidRespaldo() {
			return $this->idRespaldo;
		}
		public function getNombre_Respaldo() {
			return $this->Nombre_Respaldo;
		}
		public function getFecha_Respaldo() {
			return $this->Fecha_Respaldo;
		}
		public function getHora_Respaldo() {
			return $this->Hora_Respaldo;
		}


	}
?>
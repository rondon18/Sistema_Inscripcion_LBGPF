<?php

	class DatosSociales {

		private $idDatos_Sociales;
		private $Posee_Canaima;
		private $Condición_Canaima;
		private $Acceso_Internet;
		private $idEstudiantes;

		public function __construct(){}

		public function insertarDatosSociales($id_Estudiante) {
			$conexion = conectarBD();

			$Posee_Canaima = $this->getPosee_Canaima();
			$Condición_Canaima = $this->getCondición_Canaima();
			$Acceso_Internet = $this->getAcceso_Internet();

			$sql = "SELECT * FROM `datos-sociales` WHERE `idEstudiantes` = '$id_Estudiante'";

			$registro_existe = $conexion->query($sql);
			$resultado = $registro_existe->fetch_assoc();

			if ($resultado == NULL) {


				$sql = "INSERT INTO `datos-sociales`(`idDatos-Sociales`, `Posee_Canaima`, `Condición_Canaima`, `Acceso_Internet`, `idEstudiantes`) VALUES (
					NULL,
					'$Posee_Canaima',
					'$Condición_Canaima',
					'$Acceso_Internet',
					'$id_Estudiante'
				)";

				$conexion->query($sql) or die("error: ".$conexion->error);
				$this->setidDatos_Sociales($conexion->insert_id);
			}
			elseif ($resultado != NULL) {
				$this->setidDatos_Sociales($resultado['idDatos-Sociales']);
			}

			desconectarBD($conexion);
		}

		public function editarDatosSociales($id_Estudiante) {
			$conexion = conectarBD();

			$Posee_Canaima = $this->getPosee_Canaima();
			$Condición_Canaima = $this->getCondición_Canaima();
			$Acceso_Internet = $this->getAcceso_Internet();

			$sql = "UPDATE `datos-sociales` SET
				`Posee_Canaima`='$Posee_Canaima',
				`Condición_Canaima`='$Condición_Canaima',
				`Acceso_Internet`='$Acceso_Internet'
			WHERE `idEstudiantes`='$id_Estudiante'";

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function consultarDatosSociales($id_Estudiante) {
			$conexion = conectarBD();

			$sql = "SELECT * FROM `datos-sociales` WHERE `idEstudiantes` = '$id_Estudiante'";

			$consulta_sociales = $conexion->query($sql) or die("error: ".$conexion->error);
			$sociales = $consulta_sociales->fetch_assoc();

			desconectarBD($conexion);

			return $sociales;
		}

		#No hay eliminar porque este registro se va en cascada si se elimina el estudiante

		//Setters
		public function setidDatos_Sociales($idDatos_Sociales){
			$this->idDatos_Sociales = $idDatos_Sociales;
		}
		public function setPosee_Canaima($Posee_Canaima){
			$this->Posee_Canaima = $Posee_Canaima;
		}
		public function setCondición_Canaima($Condición_Canaima){
			$this->Condición_Canaima = $Condición_Canaima;
		}
		public function setPosee_Carnet_Patria($Posee_Carnet_Patria){
			$this->Posee_Carnet_Patria = $Posee_Carnet_Patria;
		}
		public function setCódigo_Carnet_Patria($Código_Carnet_Patria){
			$this->Código_Carnet_Patria = $Código_Carnet_Patria;
		}
		public function setSerial_Carnet_Patria($Serial_Carnet_Patria){
			$this->Serial_Carnet_Patria = $Serial_Carnet_Patria;
		}
		public function setAcceso_Internet($Acceso_Internet){
			$this->Acceso_Internet = $Acceso_Internet;
		}
		public function setidEstudiantes($idEstudiantes){
			$this->idEstudiantes = $idEstudiantes;
		}

		//Getters
		public function getidDatos_Sociales() {
			return $this->idDatos_Sociales;
		}
		public function getPosee_Canaima() {
			return $this->Posee_Canaima;
		}
		public function getCondición_Canaima() {
			return $this->Condición_Canaima;
		}
		public function getPosee_Carnet_Patria() {
			return $this->Posee_Carnet_Patria;
		}
		public function getCódigo_Carnet_Patria() {
			return $this->Código_Carnet_Patria;
		}
		public function getSerial_Carnet_Patria() {
			return $this->Serial_Carnet_Patria;
		}
		public function getAcceso_Internet() {
			return $this->Acceso_Internet;
		}
		public function getidEstudiantes() {
			return $this->idEstudiantes;
		}


	}

?>

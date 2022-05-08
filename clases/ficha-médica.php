<?php

	class Fichamédica {

		private $idDatos_Médicos;
		private $Estatura;
		private $Peso;
		private $Índice;
		private $Circ_Braquial;
		private $Lateralidad;
		private $Tipo_Sangre;
		private $médicación;
		private $Dieta_Especial;
		private $Enfermedad;
		private $Impedimento_Físico;
		private $Alergias;
		private $Cond_Vista;
		private $Cond_Dental;
		private $Institución_médica;
		private $Carnet_Discapacidad;
		private $idEstudiantes;

		public function __construct(){}

		public function insertarFicha_médica($id_Estudiante) {
			$conexion = conectarBD();

			$Estatura = $this->getEstatura();
			$Peso = $this->getPeso();
			$Índice = $this->getÍndice();
			$Circ_Braquial = $this->getCirc_Braquial();
			$Lateralidad = $this->getLateralidad();
			$Tipo_Sangre = $this->getTipo_Sangre();
			$médicación = $this->getmédicación();
			$Dieta_Especial = $this->getDieta_Especial();
			$Enfermedad = $this->getEnfermedad();
			$Impedimento_Físico = $this->getImpedimento_Físico();
			$Alergias = $this->getAlergias();
			$Cond_Vista = $this->getCond_Vista();
			$Cond_Dental = $this->getCond_Dental();
			$Institución_médica = $this->getInstitución_médica();
			$Carnet_Discapacidad = $this->getCarnet_Discapacidad();

			$sql = "INSERT INTO `datos-salud`(`idDatos-Médicos`, `Estatura`, `Peso`, `Índice`, `Circ_Braquial`, `Lateralidad`, `Tipo_Sangre`, `médicación`, `Dieta_Especial`, `Enfermedad`, `Impedimento_Físico`, `Alergias`, `Cond_Vista`, `Cond_Dental`, `Institución_médica`, `Carnet_Discapacidad`, `idEstudiantes`)
			VALUES (
				NULL,
				'$Estatura',
				'$Peso',
				'$Índice',
				'$Circ_Braquial',
				'$Lateralidad',
				'$Tipo_Sangre',
				'$médicación',
				'$Dieta_Especial',
				'$Enfermedad',
				'$Impedimento_Físico',
				'$Alergias',
				'$Cond_Vista',
				'$Cond_Dental',
				'$Institución_médica',
				'$Carnet_Discapacidad',
				'$id_Estudiante'
				)";

			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setidDatos_Médicos($conexion->insert_id);

			desconectarBD($conexion);
		}

		public function editarFicha_médica($id_Estudiante) {
			$conexion = conectarBD();

			$Estatura = $this->getEstatura();
			$Peso = $this->getPeso();
			$Índice = $this->getÍndice();
			$Circ_Braquial = $this->getCirc_Braquial();
			$Lateralidad = $this->getLateralidad();
			$Tipo_Sangre = $this->getTipo_Sangre();
			$médicación = $this->getmédicación();
			$Dieta_Especial = $this->getDieta_Especial();
			$Enfermedad = $this->getEnfermedad();
			$Impedimento_Físico = $this->getImpedimento_Físico();
			$Alergias = $this->getAlergias();
			$Cond_Vista = $this->getCond_Vista();
			$Cond_Dental = $this->getCond_Dental();
			$Institución_médica = $this->getInstitución_médica();
			$Carnet_Discapacidad = $this->getCarnet_Discapacidad();

			$sql = "UPDATE `datos-salud` SET
			`Estatura`='$Estatura',
			`Peso`='$Peso',
			`Índice`='$Índice',
			`Circ_Braquial`='$Circ_Braquial',
			`Lateralidad`='$Lateralidad',
			`Tipo_Sangre`='$Tipo_Sangre',
			`médicación`='$médicación',
			`Dieta_Especial`='$Dieta_Especial',
			`Enfermedad`='$Enfermedad',
			`Impedimento_Físico`='$Impedimento_Físico',
			`Alergias`='$Alergias',
			`Cond_Vista`='$Cond_Vista',
			`Cond_Dental`='$Cond_Dental',
			`Institución_médica`='$Institución_médica',
			`Carnet_Discapacidad`='$Carnet_Discapacidad'
			 WHERE `idEstudiantes`='$id_Estudiante'";

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function consultarFicha_médica($id_Estudiante) {
			$conexion = conectarBD();

			$sql = "SELECT * FROM `datos-salud` WHERE `idEstudiantes` = '$id_Estudiante'";

			$consulta_sociales = $conexion->query($sql) or die("error: ".$conexion->error);
			$datos_salud = $consulta_sociales->fetch_assoc();

			desconectarBD($conexion);

			return $datos_salud;
		}

		public function setidDatos_Médicos($idDatos_Médicos) {
			$this->idDatos_Médicos = $idDatos_Médicos;
		}
		public function setEstatura($Estatura) {
			$this->Estatura = $Estatura;
		}
		public function setPeso($Peso) {
			$this->Peso = $Peso;
		}
		public function setÍndice($Índice) {
			$this->Índice = $Índice;
		}
		public function setCirc_Braquial($Circ_Braquial) {
			$this->Circ_Braquial = $Circ_Braquial;
		}
		public function setLateralidad($Lateralidad) {
			$this->Lateralidad = $Lateralidad;
		}
		public function setTipo_Sangre($Tipo_Sangre) {
			$this->Tipo_Sangre = $Tipo_Sangre;
		}
		public function setmédicación($médicación) {
			$this->médicación = $médicación;
		}
		public function setDieta_Especial($Dieta_Especial) {
			$this->Dieta_Especial = $Dieta_Especial;
		}
		public function setEnfermedad($Enfermedad) {
			$this->Enfermedad = $Enfermedad;
		}
		public function setImpedimento_Físico($Impedimento_Físico) {
			$this->Impedimento_Físico = $Impedimento_Físico;
		}
		public function setAlergias($Alergias) {
			$this->Alergias = $Alergias;
		}
		public function setCond_Vista($Cond_Vista) {
			$this->Cond_Vista = $Cond_Vista;
		}
		public function setCond_Dental($Cond_Dental) {
			$this->Cond_Dental = $Cond_Dental;
		}
		public function setInstitución_médica($Institución_médica) {
			$this->Institución_médica = $Institución_médica;
		}
		public function setCarnet_Discapacidad($Carnet_Discapacidad) {
			$this->Carnet_Discapacidad = $Carnet_Discapacidad;
		}
		public function setidEstudiantes($idEstudiantes) {
			$this->idEstudiantes = $idEstudiantes;
		}

		public function getidDatos_Médicos() {
			return $this->idDatos_Médicos;
		}
		public function getEstatura() {
			return $this->Estatura;
		}
		public function getPeso() {
			return $this->Peso;
		}
		public function getÍndice() {
			return $this->Índice;
		}
		public function getCirc_Braquial() {
			return $this->Circ_Braquial;
		}
		public function getLateralidad() {
			return $this->Lateralidad;
		}
		public function getTipo_Sangre() {
			return $this->Tipo_Sangre;
		}
		public function getmédicación() {
			return $this->médicación;
		}
		public function getDieta_Especial() {
			return $this->Dieta_Especial;
		}
		public function getEnfermedad() {
			return $this->Enfermedad;
		}
		public function getImpedimento_Físico() {
			return $this->Impedimento_Físico;
		}
		public function getAlergias() {
			return $this->Alergias;
		}
		public function getCond_Vista() {
			return $this->Cond_Vista;
		}
		public function getCond_Dental() {
			return $this->Cond_Dental;
		}
		public function getInstitución_médica() {
			return $this->Institución_médica;
		}
		public function getCarnet_Discapacidad() {
			return $this->Carnet_Discapacidad;
		}
		public function getidEstudiantes() {
			return $this->idEstudiantes;
		}
	}
?>

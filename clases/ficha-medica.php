<?php 

	class FichaMedica {

		private $idDatos_Medicos;
		private $Estatura;
		private $Peso;
		private $Indice;
		private $Circ_Braquial;
		private $Lateralidad;
		private $Tipo_Sangre;
		private $Medicación;
		private $Dieta_Especial;
		private $Impedimento_Físico;
		private $Alergias;
		private $Cond_Vista;
		private $Cond_Dental;
		private $Institucion_Medica;
		private $Carnet_Discapacidad;
		private $idAlumnos;

		public function __construct(){}

		public function insertarFicha_Medica() {
			$conexion = conectarBD();

			$Estatura = $this->getEstatura();
			$Peso = $this->getPeso();
			$Indice = $this->getIndice();
			$Circ_Braquial = $this->getCirc_Braquial();
			$Lateralidad = $this->getLateralidad();
			$Tipo_Sangre = $this->getTipo_Sangre();
			$Medicación = $this->getMedicación();
			$Dieta_Especial = $this->getDieta_Especial();
			$Impedimento_Físico = $this->getImpedimento_Físico();
			$Alergias = $this->getAlergias();
			$Cond_Vista = $this->getCond_Vista();
			$Cond_Dental = $this->getCond_Dental();
			$Institucion_Medica = $this->getInstitucion_Medica();
			$Carnet_Discapacidad = $this->getCarnet_Discapacidad();
			$idAlumnos = $this->getidAlumnos();



			$sql = "INSERT INTO `datos-medicos`(`idDatos-Medicos`, `Estatura`, `Peso`, `Indice`, `Circ_Braquial`, `Lateralidad`, `Tipo_Sangre`, `Medicación`, `Dieta_Especial`, `Impedimento_Físico`, `Alergias`, `Cond_Vista`, `Cond_Dental`, `Institucion_Medica`, `Carnet_Discapacidad`, `idAlumnos`) VALUES (
					NULL,
					'$Estatura',
					'$Peso',
					'$Indice',
					'$Circ_Braquial',
					'$Lateralidad',
					'$Tipo_Sangre',
					'$Medicación',
					'$Dieta_Especial',
					'$Impedimento_Físico',
					'$Alergias',
					'$Cond_Vista',
					'$Cond_Dental',
					'$Institucion_Medica',
					'$Carnet_Discapacidad',
					'$idAlumnos'
				)";

			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setidDatos_Medicos($conexion->insert_id);

			desconectarBD($conexion);

		}

		public function retornarTodo() {
			$datos = [
				'idDatos_Medicos' => $this->getidDatos_Medicos(),
				'Estatura' => $this->getEstatura(),
				'Peso' => $this->getPeso(),
				'Indice' => $this->getIndice(),
				'Circ_Braquial' => $this->getCirc_Braquial(),
				'Lateralidad' => $this->getLateralidad(),
				'Tipo_Sangre' => $this->getTipo_Sangre(),
				'Medicación' => $this->getMedicación(),
				'Dieta_Especial' => $this->getDieta_Especial(),
				'Impedimento_Físico' => $this->getImpedimento_Físico(),
				'Alergias' => $this->getAlergias(),
				'Cond_Vista' => $this->getCond_Vista(),
				'Cond_Dental' => $this->getCond_Dental(),
				'Institucion_Medica' => $this->getInstitucion_Medica(),
				'Carnet_Discapacidad' => $this->getCarnet_Discapacidad(),
				'idAlumnos' => $this->getidAlumnos()
			];
			return $datos;
		}
		public function setidDatos_Medicos($idDatos_Medicos) {
			$this->idDatos_Medicos = $idDatos_Medicos;
		}
		public function setEstatura($Estatura) {
			$this->Estatura = $Estatura;
		}
		public function setPeso($Peso) {
			$this->Peso = $Peso;
		}
		public function setIndice($Indice) {
			$this->Indice = $Indice;
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
		public function setMedicación($Medicación) {
			$this->Medicación = $Medicación;
		}
		public function setDieta_Especial($Dieta_Especial) {
			$this->Dieta_Especial = $Dieta_Especial;
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
		public function setInstitucion_Medica($Institucion_Medica) {
			$this->Institucion_Medica = $Institucion_Medica;
		}
		public function setCarnet_Discapacidad($Carnet_Discapacidad) {
			$this->Carnet_Discapacidad = $Carnet_Discapacidad;
		}
		public function setidAlumnos($idAlumnos) {
			$this->idAlumnos = $idAlumnos;
		}

		public function getidDatos_Medicos() {
			return $this->idDatos_Medicos;
		}
		public function getEstatura() {
			return $this->Estatura;
		}
		public function getPeso() {
			return $this->Peso;
		}
		public function getIndice() {
			return $this->Indice;
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
		public function getMedicación() {
			return $this->Medicación;
		}
		public function getDieta_Especial() {
			return $this->Dieta_Especial;
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
		public function getInstitucion_Medica() {
			return $this->Institucion_Medica;
		}
		public function getCarnet_Discapacidad() {
			return $this->Carnet_Discapacidad;
		}
		public function getidAlumnos() {
			return $this->idAlumnos;
		}
	}
?>
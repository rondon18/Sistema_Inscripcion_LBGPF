<?php 

class Alumno {

	private $id;

	private $PrimerNombre;
	private $SegundoNombre;
	private $PrimerApellido;
	private $SegundoApellido;
	
	private $Genero;
	
	private $Cedula;
	private $TipoCedula;
	private $CedulaRepresentante;
	
	private $FechaNacimiento;
	private $Estado;
	private $Municipio;
	private $Parroquia;
	private $Ciudad;
	
	private $PuedeIrseSolo;
	private $ContactoAuxiliar;
	private $TelefonoAuxiliar;
	private $RelacionAuxiliar;
	
	private $Estatura;
	private $Peso;
	private $GrupoSanguineo;
	private $Medicacion;
	private $DietaEspecial;
	private $ImpedimentoFisico;
	private $Alergias;
	private $ProblemasVista;
	private $ProblemasSalud;
	
	private $Grado;
	private $TipoInscripcion;


	public function __construct() {}

	public function getid() {
		return $this->id;
	}

	public function setid($id) {
		$this->id = $id;
	}

	public function getPrimerNombre() {
		return $this->PrimerNombre;
	}

	public function setPrimerNombre($PrimerNombre) {
		$this->PrimerNombre = $PrimerNombre;
	}

	public function getSegundoNombre() {
		return $this->SegundoNombre;
	}

	public function setSegundoNombre($SegundoNombre) {
		$this->SegundoNombre = $SegundoNombre;
	}

	public function getPrimerApellido() {
		return $this->PrimerApellido;
	}

	public function setPrimerApellido($PrimerApellido) {
		$this->PrimerApellido = $PrimerApellido;
	}

	public function getSegundoApellido() {
		return $this->SegundoApellido;
	}

	public function setSegundoApellido($SegundoApellido) {
		$this->SegundoApellido = $SegundoApellido;
	}

	public function getGenero() {
		return $this->Genero;
	}

	public function setGenero($Genero) {
		$this->Genero = $Genero;
	}

	public function getCedula() {
		return $this->Cedula;
	}

	public function setCedula($Cedula) {
		$this->Cedula = $Cedula;
	}

	public function getTipoCedula() {
		return $this->TipoCedula;
	}

	public function setTipoCedula($TipoCedula) {
		$this->TipoCedula = $TipoCedula;
	}

	public function getCedulaRepresentante() {
		return $this->CedulaRepresentante;
	}

	public function setCedulaRepresentante($CedulaRepresentante) {
		$this->CedulaRepresentante = $CedulaRepresentante;
	}

	public function getFechaNacimiento() {
		return $this->FechaNacimiento;
	}

	public function setFechaNacimiento($FechaNacimiento) {
		$this->FechaNacimiento = $FechaNacimiento;
	}

	public function getEstado() {
		return $this->Estado;
	}

	public function setEstado($Estado) {
		$this->Estado = $Estado;
	}

	public function getMunicipio() {
		return $this->Municipio;
	}

	public function setMunicipio($Municipio) {
		$this->Municipio = $Municipio;
	}

	public function getParroquia() {
		return $this->Parroquia;
	}

	public function setParroquia($Parroquia) {
		$this->Parroquia = $Parroquia;
	}

	public function getCiudad() {
		return $this->Ciudad;
	}

	public function setCiudad($Ciudad) {
		$this->Ciudad = $Ciudad;
	}

	public function getPuedeIrseSolo() {
		return $this->PuedeIrseSolo;
	}

	public function setPuedeIrseSolo($PuedeIrseSolo) {
		$this->PuedeIrseSolo = $PuedeIrseSolo;
	}

	public function getContactoAuxiliar() {
		return $this->ContactoAuxiliar;
	}

	public function setContactoAuxiliar($ContactoAuxiliar) {
		$this->ContactoAuxiliar = $ContactoAuxiliar;
	}

	public function getTelefonoAuxiliar() {
		return $this->TelefonoAuxiliar;
	}

	public function setTelefonoAuxiliar($TelefonoAuxiliar) {
		$this->TelefonoAuxiliar = $TelefonoAuxiliar;
	}

	public function getRelacionAuxiliar() {
		return $this->RelacionAuxiliar;
	}

	public function setRelacionAuxiliar($RelacionAuxiliar) {
		$this->RelacionAuxiliar = $RelacionAuxiliar;
	}

	public function getEstatura() {
		return $this->Estatura;
	}

	public function setEstatura($Estatura) {
		$this->Estatura = $Estatura;
	}

	public function getPeso() {
		return $this->Peso;
	}

	public function setPeso($Peso) {
		$this->Peso = $Peso;
	}

	public function getGrupoSanguineo() {
		return $this->GrupoSanguineo;
	}

	public function setGrupoSanguineo($GrupoSanguineo) {
		$this->GrupoSanguineo = $GrupoSanguineo;
	}

	public function getMedicacion() {
		return $this->Medicacion;
	}

	public function setMedicacion($Medicacion) {
		$this->Medicacion = $Medicacion;
	}

	public function getDietaEspecial() {
		return $this->DietaEspecial;
	}

	public function setDietaEspecial($DietaEspecial) {
		$this->DietaEspecial = $DietaEspecial;
	}

	public function getImpedimentoFisico() {
		return $this->ImpedimentoFisico;
	}

	public function setImpedimentoFisico($ImpedimentoFisico) {
		$this->ImpedimentoFisico = $ImpedimentoFisico;
	}

	public function getAlergias() {
		return $this->Alergias;
	}

	public function setAlergias($Alergias) {
		$this->Alergias = $Alergias;
	}

	public function getProblemasVista() {
		return $this->ProblemasVista;
	}

	public function setProblemasVista($ProblemasVista) {
		$this->ProblemasVista = $ProblemasVista;
	}

	public function getProblemasSalud() {
		return $this->ProblemasSalud;
	}

	public function setProblemasSalud($ProblemasSalud) {
		$this->ProblemasSalud = $ProblemasSalud;
	}

	public function getGrado() {
		return $this->Grado;
	}

	public function setGrado($Grado) {
		$this->Grado = $Grado;
	}

	public function getTipoInscripcion() {
		return $this->TipoInscripcion;
	}

	public function setTipoInscripcion($TipoInscripcion) {
		$this->TipoInscripcion = $TipoInscripcion;
	}


}

?>
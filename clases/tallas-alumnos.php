<?php 

class TallasAlumno {
	

	private $idDatos_Tallas;
	private $Talla_Camisa;
	private $Talla_Pantalón;
	private $Talla_Zapatos;
	private $idAlumnos;

	function __construct(){}

	public function insertarTallasAlumno() {
		
	}

	public function setidDatos_Tallas($idDatos_Tallas) {
		$this->idDatos_Tallas = $idDatos_Tallas;
	}
	public function setTalla_Camisa($Talla_Camisa) {
		$this->Talla_Camisa = $Talla_Camisa;
	}
	public function setTalla_Pantalón($Talla_Pantalón) {
		$this->Talla_Pantalón = $Talla_Pantalón;
	}
	public function setTalla_Zapatos($Talla_Zapatos) {
		$this->Talla_Zapatos = $Talla_Zapatos;
	}
	public function setidAlumnos($idAlumnos) {
		$this->idAlumnos = $idAlumnos;
	}

	public function getidDatos_Tallas() {
		return $this->idDatos_Tallas;
	}
	public function getTalla_Camisa() {
		return $this->Talla_Camisa;
	}
	public function getTalla_Pantalón() {
		return $this->Talla_Pantalón;
	}
	public function getTalla_Zapatos() {
		return $this->Talla_Zapatos;
	}
	public function getidAlumnos() {
		return $this->idAlumnos;
	}




}

 ?>
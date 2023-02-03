<?php

class Año_Escolar {
	
	private $idAño_Escolar;
	private $Inicio_Año_Escolar;
	private $Fin_Año_Escolar;

	public function __construct() {
		//Calcula el año escolar en curso segun la fecha del servidor
		date_default_timezone_set("America/Caracas");
		$mes = date('m');
		//si el mes es entre septiembre y marzo, se inscribe para el año en curso, si no, para el siguente
		$año = (int)date('Y');

		if ($mes >= 9 or $mes <= 3) {
			$this->setInicio_Año_Escolar($año+1);
			$this->setFin_Año_Escolar($año+2);
		}
		else {
			$this->setInicio_Año_Escolar($año);
			$this->setFin_Año_Escolar($año+1);
		}
		
		$this->crearAño_Escolar();
	}

	public function crearAño_Escolar() {
		$conexion = conectarBD();

		$Inicio_Año_Escolar = $this->getInicio_Año_Escolar();
		$Fin_Año_Escolar = $this->getFin_Año_Escolar();
		
		#consulta si el año escolar ya existe
		$sql = "SELECT * FROM `año-escolar` WHERE `Inicio_Año_Escolar` = '$Inicio_Año_Escolar' AND `Fin_Año_Escolar` = '$Fin_Año_Escolar'";

		$registro_existe = $conexion->query($sql) or die("error: ".$conexion->error);
		$resultado = $registro_existe->fetch_assoc();

		if ($resultado == NULL) {
			#Si el registro no existe se crea con esta orden
			$sql = "INSERT INTO `año-escolar`(`idAño-Escolar`, `Inicio_Año_Escolar`, `Fin_Año_Escolar`) VALUES (
				NULL,
				'$Inicio_Año_Escolar',
				'$Fin_Año_Escolar'
			)";
			
			$conexion->query($sql);
			$this->setidAño_Escolar($conexion->insert_id);
		}
		desconectarBD($conexion);
	}
	public function consultarAño_Escolar($Inicio_Año_Escolar,$Fin_Año_Escolar) {
		
		$conexion = conectarBD();

		#consulta el inicio y fin del año escolar
		$sql = "SELECT * FROM `año-escolar` WHERE `Inicio_Año_Escolar` = '$Inicio_Año_Escolar' AND `Fin_Año_Escolar` = '$Fin_Año_Escolar'";

		$consulta_Año_Escolar = $conexion->query($sql) or die("error: ".$conexion->error);			
		$Año_Escolar = $consulta_Año_Escolar->fetch_assoc();

		desconectarBD($conexion);

		return $Año_Escolar;
	}

	public function setidAño_Escolar($idAño_Escolar){
		$this->idAño_Escolar = $idAño_Escolar;
	}
	public function setInicio_Año_Escolar($Inicio_Año_Escolar){
		$this->Inicio_Año_Escolar = $Inicio_Año_Escolar;
	}
	public function setFin_Año_Escolar($Fin_Año_Escolar){
		$this->Fin_Año_Escolar = $Fin_Año_Escolar;
	}

	public function getidAño_Escolar() {
		return $this->idAño_Escolar;
	}
	public function getInicio_Año_Escolar() {
		return $this->Inicio_Año_Escolar;
	}
	public function getFin_Año_Escolar() {
		return $this->Fin_Año_Escolar;
	}


}



?>
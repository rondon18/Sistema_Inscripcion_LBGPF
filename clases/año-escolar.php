<?php  

class Año_Escolar {
	private $idAño_Escolar;
	private $Año_Escolar;

	public function __construct() {
		//Calcula el año escolar en curso segun la fecha del servidor
		$mes = date('m');
		//si el mes es entre septiembre y marzo, se inscribe para el año en curso, si no, para el siguente
		$año = date('Y');
		if ($mes >= 9 or $mes <= 3) {
			$año_inicio = $año+1;
			$año_fin = $año+2;
		}
		else {
			$año_inicio = $año;
			$año_fin = $año+1;
		}
		$this->setAño_Escolar("$año_inicio-$año_fin");
	}

	public function setidAño_Escolar($idAño_Escolar){
		$this->idAño_Escolar = $idAño_Escolar;
	}
	public function setAño_Escolar($Año_Escolar){
		$this->Año_Escolar = $Año_Escolar;
	}

	public function getidAño_Escolar() {
		return $this->idAño_Escolar;
	}
	public function getAño_Escolar() {
		return $this->Año_Escolar;
	}


}

?>
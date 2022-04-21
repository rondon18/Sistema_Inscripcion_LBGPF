<?php 

class Representantes {
	
	private $idRepresentantes;
	private $Vinculo;
	private $Grado_Academico;
	private $Cedula_Persona;

	public function __construct(){}

	public function insertarRepresentante() {
		$conexion = conectarBD();

		$Vinculo = $this->getVinculo();
		$Cedula_Persona = $this->getCedula_Persona();
		$Grado_Academico = $this->getGrado_Academico();


		$sql = "SELECT * FROM `representantes` WHERE `Cedula_Persona` = '$Cedula_Persona'";

		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();

		#Consulta si el registro ya existe para prevenir registros duplicados o excesivos
		if ($resultado == NULL) {
			$sql = "INSERT INTO `representantes`(`idRepresentantes`, `Vinculo`, `Grado_Academico`, `Cedula_Persona`) VALUES (
				NULL,
				'$Vinculo',
				'$Grado_Academico',
				'$Cedula_Persona'
			)";

			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setidRepresentantes($conexion->insert_id);
		}
		elseif ($resultado != NULL) {
			$this->setidRepresentantes($resultado['idRepresentantes']);
		}
		desconectarBD($conexion);
	}
	public function editarRepresentante($Cedula_Persona) {
		$conexion = conectarBD();

		$Vinculo = $this->getVinculo();
		$Grado_Academico = $this->getGrado_Academico();

		$sql = "UPDATE `representantes` SET 
			`Vinculo`='$Vinculo',
			`Grado_Academico`='$Grado_Academico',
		 WHERE `Cedula_Persona`='$Cedula_Persona'";

		$conexion->query($sql) or die("error: ".$conexion->error);

		desconectarBD($conexion);
	}
	public function eliminarRepresentante($Cedula_Persona) {
		$conexion = conectarBD();

		$sql = "DELETE FROM `representantes` WHERE `Cedula_Persona` = '$Cedula_Persona'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectarBD($conexion);
	}
	public function consultarRepresentante($Cedula_Persona) {
		$conexion = conectarBD();
		
		$sql = "SELECT * FROM `representantes` WHERE `Cedula_Persona` = '$Cedula_Persona'";

		$consulta_representantes = $conexion->query($sql) or die("error: ".$conexion->error);			
		$representantes = $consulta_representantes->fetch_assoc();

		desconectarBD($conexion);
		
		return $representantes;
	}
	public function mostrarRepresentantes() {
		#Muestra todas las representantes en la tabla
		$conexion = conectarBD();

		$sql = "SELECT * FROM `personas`,`representantes` WHERE `personas`.`Cédula` = `representantes`.`Cedula_Persona`";

		$consulta_representantes = $conexion->query($sql) or die("error: ".$conexion->error);			
		$representantes = $consulta_representantes->fetch_all();

		#Hace un arreglo de arreglos para contener los campos de la representantes
		$Lista_Representantes = [];
		foreach ($representantes as $representantes) {
			$Lista_Representantes[]= $representantes;
		}

		desconectarBD($conexion);

		return $Lista_Representantes;
	}
	
	public function setidRepresentantes($idRepresentantes) {
		$this->idRepresentantes = $idRepresentantes;
	}
	public function setVinculo($Vinculo) {
		$this->Vinculo = $Vinculo;
	}
	public function setCedula_Persona($Cedula_Persona) {
		$this->Cedula_Persona = $Cedula_Persona;
	}
	public function setGrado_Academico($Grado_Academico) {
		$this->Grado_Academico = $Grado_Academico;
	}

	public function getidRepresentantes() {
		return $this->idRepresentantes;
	}
	public function getVinculo() {
		return $this->Vinculo;
	}
	public function getCedula_Persona() {
		return $this->Cedula_Persona;
	}
	public function getGrado_Academico() {
		return $this->Grado_Academico;
	}
}

?>
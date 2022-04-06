<?php 

class Mantenimiento {

	public function __construct(){}

	public function respaldarBD() {
		$conexion = conectarBD();

		$backup_file = "bd_proyecto__" . date("Y-m-d") ."__". date("H-i-s") . '.sql';

		// comandos a ejecutar
		$command = "C:/xampp/mysql/bin/mysqldump -u root -h Localhost bd_proyecto > ../respaldos/$backup_file";

		// ejecución y salida de éxito o errores
		system($command,$output);

		header("Location: ../respaldos/$backup_file");
	}
	public function restaurarBD() {
		#Devuelve la base de datos a su estado inicial
		$conexion = conectarBD();

		$command = "C:/xampp/mysql/bin/mysql -u root -h Localhost bd_proyecto < ../respaldos/respaldo-base.sql";

		// ejecución y salida de éxito o errores
		system($command,$output);

	}
}






?>
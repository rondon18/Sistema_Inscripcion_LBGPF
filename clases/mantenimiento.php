<?php 

	class mantenimiento {

		public function __construct(){}

		public function respaldarBD() {
			$conexion = conectarBD();

			$nombre_respaldo 	= "respaldo";
			$fecha_respaldo 	= date("d-m-Y");
			$hora_respaldo 		= date("H-i-s");
			$extension 				= '.sql';

			$respaldo = $nombre_respaldo ."__". $fecha_respaldo ."__". $hora_respaldo . $extension;

			echo $respaldo;

			// comandos a ejecutar
			$command = "C:/xampp/mysql/bin/mysqldump -u root -h Localhost SI_LBGPF > ../respaldos/$respaldo";

			// ejecución y salida de éxito o errores
			system($command,$output);


			// Registro del respaldo generado

			header("Location: ../respaldos/$respaldo");
		}
		public function restaurarBD($respaldo) {
			#Devuelve la base de datos a un estado anterior o a su estado inicial

			$command = "C:/xampp/mysql/bin/mysql -u root -h Localhost SI_LBGPF < ../respaldos/".$respaldo;

			// ejecución y salida de éxito o errores
			system($command,$output);
		}
	}
?>
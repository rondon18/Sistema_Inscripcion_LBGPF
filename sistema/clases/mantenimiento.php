<?php 

	class mantenimiento {

		public function __construct(){}

		public function respaldar_bd($descarga = true) {
			$conexion = conectarBD();

			$nombre_respaldo 	= "respaldo";
			$fecha_respaldo 	= date("d-m-Y");
			$hora_respaldo 		= date("H-i-s");
			$extension 				= '.sql';

			$respaldo = $nombre_respaldo ."__". $fecha_respaldo ."__". $hora_respaldo . $extension;

			echo $respaldo;

			// comandos a ejecutar
			$command = "C:/xampp/mysql/bin/mysqldump -u root -h Localhost sis_reg_lb_gpf_v2 > ../respaldos/$respaldo";

			// ejecución y salida de éxito o errores
			system($command,$output);


			// Registro del respaldo generado

			if ($descarga == true) {
				header("Location: ../respaldos/$respaldo");
			}

		}


		public function restaurar_bd($respaldo) {
			#Devuelve la base de datos a un estado anterior o a su estado inicial

			$command = "C:/xampp/mysql/bin/mysql -u root -h Localhost sis_reg_lb_gpf_v2 < ../respaldos/".$respaldo;

			// ejecución y salida de éxito o errores
			system($command,$output);
		}
	}
?>
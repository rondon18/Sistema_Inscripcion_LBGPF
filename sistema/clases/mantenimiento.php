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

			// comandos a ejecutar

			// Ruta en windows
			$command = "C:/xampp/mysql/bin/mysqldump -u root -h Localhost sis_reg_lb_gpf_v3 > ../respaldos/$respaldo";

			// Ruta en GNU/Linux: Instalacion generica con LAMPP (Cambiar si se hace con otro o se elige otra ruta)
			// $command = "/opt/lampp/bin/mysqldump -u root -h Localhost sis_reg_lb_gpf_v3 > ../respaldos/$respaldo";

			// ejecución y salida de éxito o errores

			try {
				system($command,$output);
				if ($output != 0) {
					throw new Exception("Ha ocurrido un error con el comando ($command)");
				}
				else {
					// Registro del respaldo generado
					if ($descarga == true) {
						header("Location: ../respaldos/$respaldo");
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}


		public function restaurar_bd($respaldo) {
			// Devuelve la base de datos a un estado anterior o a su estado inicial

			// Ruta en windows
			$command = "C:/xampp/mysql/bin/mysql -u root -h Localhost sis_reg_lb_gpf_v3 < ../respaldos/".$respaldo;

			// Ruta en GNU/Linux: Instalacion generica con LAMPP (Cambiar si se hace con otro o se elige otra ruta)
			// $command = "/opt/lampp/bin/mysql -u root -h Localhost sis_reg_lb_gpf_v3 < ../respaldos/".$respaldo;


			try {
				system($command,$output);
				if ($output != 0) {
					throw new Exception("Ha ocurrido un error con el comando ($command)");
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
	}
?>
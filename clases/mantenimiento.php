<?php 

	require_once('respaldo.php');

	class Mantenimiento {

		public function __construct(){}

		public function respaldarBD() {
			$conexion = conectarBD();

			$nombre_respaldo 	= "SI_LBGPF";
			$fecha_respaldo 	= date("Y-m-d");
			$hora_respaldo 		= date("H-i-s");
			$extension 				= '.sql';

			$respaldo = $nombre_respaldo ."__". $fecha_respaldo ."__". $hora_respaldo . $extension;

			echo $respaldo;

			// comandos a ejecutar
			$command = "C:/xampp/mysql/bin/mysqldump -u root -h Localhost SI_LBGPF > ../respaldos/$respaldo";

			// ejecución y salida de éxito o errores
			system($command,$output);


			// Registro del respaldo generado

			$Respaldo = new Respaldo($respaldo,$fecha_respaldo,$hora_respaldo);
			$Respaldo->registrarRespaldo();

			header("Location: ../respaldos/$respaldo");
		}
		public function restaurarBD() {
			#Devuelve la base de datos a un estado anterior o a su estado inicial
			$conexion = conectarBD();

			$command = "C:/xampp/mysql/bin/mysql -u root -h Localhost SI_LBGPF < ../respaldos/respaldo-base.sql";

			// ejecución y salida de éxito o errores
			system($command,$output);

		}
	}
?>
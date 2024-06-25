<?php  

	class per_academico {
		
		// 
		
		private $id_per_academico;
		private $inicio;
		private $fin;

		// constructor
		// calcula el periodo acacemico en curso segun la fecha del servidor

		/*

			Probablemente id_per_academico sea retirado, una vez normalizada la BD se puede optar a una
			clave compuesta entre el año de inicio y el año de fin

			| anio_inicio | anio_fin |
			| 2023        | 2024     |
			| 2024        | 2025     |

		*/

		// Esta clase requiere conexion.php

		
		public function __construct() {
			try {
				// Establese la region para Venezuela (Hora, fecha, etc)
				date_default_timezone_set("America/Caracas");
				// Toma la fecha actual al momento de comprobar
				$fecha_actual = new DateTime();
				/*
					Obtiene la fecha de cierre del periodo académico.
					Toma el año actual de manera automatica, más
							| | |
							V V V
				*/
				$fecha_cierre = new DateTime((int)date('Y').'05-01');
				// Compara la fecha actual con la fecha de finalización del periodo académico
				if ($fecha_actual >= $fecha_cierre) {
					// El inicio del año escolar será el año actual
			    $this->set_inicio($fecha_actual->format('Y'));
					// El fin del año escolar será el año proximo
			    $this->set_fin($fecha_actual->format('Y') + 1);
				}
				else {
					// El inicio del año escolar será el año anterior
			    $this->set_fin($fecha_actual->format('Y'));
					// El fin del año escolar será el año actual
			    $this->set_inicio($fecha_actual->format('Y') - 1);
				}
				// Concatena ambos para formar el id del periodo académico
				$id_per_academico = $this->get_inicio().$this->get_fin();
				$this->set_id_per_academico($id_per_academico);
				// guarda el periodo académico actual o inserta uno nuevo
				$this->insertar_per_academico();
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}


		public function insertar_per_academico() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					// el id es la concatenacion del año de inicio y el año de fin
					$id_per_academico = mysqli_escape_string($conexion,$this->get_inicio()).mysqli_escape_string($conexion,$this->get_fin());
					$inicio = mysqli_escape_string($conexion,$this->get_inicio());
					$fin = mysqli_escape_string($conexion,$this->get_fin());
					$sql = " INSERT INTO `per_academico` (`id_per_academico`, `inicio`, `fin`) VALUES ('$id_per_academico', '$inicio', '$fin') ON DUPLICATE KEY UPDATE `id_per_academico` = `id_per_academico`;";
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$conexion->query($sql);
						desconectarBD($conexion);
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		/*
			Esta funcion puede que se vaya (es un poco redundate si se usa el ON DUPLICATE en el constructor)
					| | |
					V V V
		*/

		public function consultar_per_academico($id_per_academico) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					// consulta si el periodo academico ya existe
					$id_per_academico = mysqli_escape_string($conexion,$id_per_academico);
					$sql = "SELECT * FROM `per_academico` WHERE `id_per_academico` = '$id_per_academico';";
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$resultado = $conexion->query($sql);
						desconectarBD($conexion);
						return $resultado->num_rows;
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return 0;
			}
		}
		

		
		// GETTERS
		public function get_id_per_academico() {
			return $this->id_per_academico;
		}
		
		public function get_inicio() {
			return $this->inicio;
		}
		
		public function get_fin() {
			return $this->fin;
		}
		

		// SETTERS
		public function set_id_per_academico($id_per_academico) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($id_per_academico)) {
					throw new Exception("El id del periodo escolar no puede estar vacío");
					return;
				}
				// Validar la longitud y el formato de la cédula
				if (strlen($id_per_academico) != 8 || !preg_match('/^[0-9]+$/', $id_per_academico)) {
					throw new Exception("El id del periodo escolar ($id_per_academico) tiene un formato inválido");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->id_per_academico = $id_per_academico;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_inicio($inicio) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($inicio)) {
					throw new Exception("El inicio de periodo escolar no puede estar vacío");
					return;
				}
				// Validar la longitud y el formato de la cédula
				if (strlen($inicio) != 4 || !preg_match('/^[0-9]+$/', $inicio)) {
					throw new Exception("El inicio de periodo escolar ($inicio) tiene un formato inválido");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->inicio = $inicio;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_fin($fin) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($fin)) {
					throw new Exception("El fin de periodo escolar no puede estar vacío");
					return;
				}
				// Validar la longitud y el formato de la cédula
				if (strlen($fin) != 4 || !preg_match('/^[0-9]+$/', $fin)) {
					throw new Exception("El fin de periodo escolar ($fin) tiene un formato inválido");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->fin = $fin;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
	}

?>
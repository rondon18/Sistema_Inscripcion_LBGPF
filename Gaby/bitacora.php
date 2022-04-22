<?php

	class Bitacora {

		#atributos para insertar
		public $tabla;
		public $values;
		public $columnas;

		#atributos para editar
		public $update;
		public $set;

		#atributos para mostrar datos
		public $select;
		public $from;
		public $condition;
		public $rows;

		#atributos del login
		public $idUsuarios;
		public $Clave;


		public function insertar(){
			$conexion = conectarBD();
			$tabla = $this->tabla;
			$values = $this->values;
			$columnas = $this->columnas;
			$sql = "INSERT INTO `$tabla` (`$columnas`) VALUES '$values'";
			$consulta = $conexion->query($sql);
			$consulta;#->fetch_assoc();
			desconectarBD($conexion);
		}

		public function editar(){
			$conexion = conectarBD();
			$update = $this->update;
			$set = $this->set;
			$condition = $this->condition;
			if($condition != ""){
				$condition = "WHERE ".$condition;
			}
			$sql = "UPDATE `$update` SET `$set` `$condition`";
			$consulta = $conexion->query($sql);
			$consulta;#->fetch_assoc();
			desconectarBD($conexion);
		}

		public function leer(){
			$conexion = conectarBD();
			$select = $this->select;
			$from = $this->from;
			$condition = $this->condition;
			$rows = $this->rows;
			if($condition != ""){
				$condition = "WHERE ".$condition;
			}
			$sql = "SELECT `$select` FROM `$from` $condition";
			$consulta = $conexion->query($sql);
			$consulta;#->fetch_assoc();

			while($filas = $consulta/*->fetch_assoc()*/){
				$this->rows[] = $filas;
			}
			desconectarBD($conexion);
		}


		public function login(){
			$conexion = conectarBD();
			$sql = "SELECT * FROM `usuarios` WHERE `idUsuarios` = '$idUsuarios' AND `Clave`= '$Clave";
			$consulta = $conexion->query($sql);
/*			$consulta->bindParam('$idUsuarios', 			$this->idUsuarios, PDO::PARAM_STR);
			$consulta->bindParam('$Clave', $this->Clave, PDO::PARAM_STR);*/
			$resultado = $consulta->fetch_assoc();
			$total = $consulta->rowCount();

			if (total == 0){
				header("Location: ../index.php");
			}
			else{
				$fecha = date("Y-m-d");
				$hora = date("H:i:s");
				$links = $_SERVER['PHP_SELF'];
				$fila = $consulta->fetch_assoc();
				$sql2 = "INSERT INTO bitacora (`idBitacora`, `idUsuarios`, `fechaInicioSesion`, `horaInicioSesion`, `linksVisitados`, `fechaFinalSesion`, `horaFinalSesion`) VALUES (null, '".$fila['idUsuarios']."', '$fecha', '$hora', '', ''";
					$consulta2 = $consulta->query($sql2);
					#$consulta2->fetch_assoc();
/*
					session_start();
					$_SESSION['id_Usuarios'] = $fila['idUsuarios']*/
			}
			desconectarBD($conexion);
		}
	}



  ?>
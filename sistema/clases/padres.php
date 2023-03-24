<?php  

	class padres {
		private $cedula_persona;
		private $pais_residencia;

		public function __construct() {}

		public function insertar_padres() {
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();
			$pais_residencia = $this->get_pais_residencia();

			$sql = "
				INSERT INTO `padres`(
			    `cedula_persona`,
			    `pais_residencia`
				)
				VALUES('$cedula_persona', '$pais_residencia')
				ON DUPLICATE KEY UPDATE
				`cedula_persona` = `cedula_persona`;
			";

			// echo $sql;

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function editar_padres() {
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();
			$pais_residencia = $this->get_pais_residencia();

			$sql = "
				UPDATE
			    `padres`
				SET
			    `pais_residencia` = '$pais_residencia'
				WHERE
			    `cedula_persona` = '$cedula_persona'
			";

			// echo $sql;

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function mostrar_padres() {
			// Muestra todos los padres registrados
			$conexion = conectarBD();

			$sql = "SELECT * FROM `vista_padres`";

			$resultado = $conexion->query($sql) or die("error: ".$conexion->error);
			
			$lista_padres = $resultado->fetch_all(MYSQLI_ASSOC);
			
			desconectarBD($conexion);

			return $lista_padres;
		}


		public function consultar_padres() {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();

			$sql = "SELECT * FROM `vista_padres` WHERE `cedula` = '$cedula_persona'";

			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$padre = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $padre;
		}

		public function mostrar_hijos() {
			// Muestra los estudiantes que representa el representante
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();

			$sql = "
			SELECT
		    `cedula`,
		    `p_nombre`,
		    `grado_a_cursar`
			FROM
		    `vista_estudiantes`
			WHERE
		    cedula_padre = '$cedula_persona' OR
		    cedula_madre = '$cedula_persona'
		    ";

			$resultado = $conexion->query($sql) or die("error: ".$conexion->error);
			
			$lista_hijos = $resultado->fetch_all(MYSQLI_ASSOC);
			desconectarBD($conexion);
			
			return $lista_hijos;
		}

		public function contar_hijos() {
			// Muestra cuantos estudiantes representa el representante
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();

			$sql = "
			SELECT
		    *
			FROM
		    `vista_estudiantes`
			WHERE
		    cedula_padre = '$cedula_persona' OR
		    cedula_madre = '$cedula_persona'
	    ";

			$resultado = $conexion->query($sql) or die("error: ".$conexion->error);
			desconectarBD($conexion);
			
			return $resultado->num_rows;
		}




		// 
		// calculos para estadisticas
		// 


		/*	

			El calculo de porcentajes se encuentra separado de las cantidades directas
			
			En el caso de opuestos aplicar (total_padres - nro_obtenido) por ejemplo
			para estudiantes que no tengan canaima 

			Se pueden llamar estas funciones sin parametros, pero si se agregan, deben ir todos

		*/

	
		// Retorna el porcentaje al que equivale la muestra en base al total de padres
		public function get_porcentaje($muestra) {
			// la poblacion es el total de representante

			$poblacion = $this->get_nro_padres();
			$porcentaje = ( $muestra / $poblacion ) * 100;

			return round($porcentaje) . "%";
		}


		// Retorna el número de padres registrados (Se puede filtrar)
		public function get_nro_padres() {
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_padres FROM `vista_padres`";

			$consulta_representante = $conexion->query($sql) or die("error: ".$conexion->error);
			$representante = $consulta_representante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_padres = $representante["nro_padres"];
		}


		// Retorna el número de padres inscritos (Se puede filtrar)
		public function get_nro_p_empleados() {
			
			$conexion = conectarBD();

			// Muestra todos los padres que cuenten con un empleo
			$sql = "SELECT COUNT(*) as nro_p_empleados FROM `vista_padres` WHERE `empleo` != ''";

			$consulta_representante = $conexion->query($sql) or die("error: ".$conexion->error);
			$representante = $consulta_representante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_p_empleados = $representante["nro_p_empleados"];
		}


		// Retorna el número de padres con cierto grado académico (Se puede filtrar)
		public function get_nro_p_g_academico($g_academico) {
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_p_g_academico FROM `vista_padres` WHERE `grado_academico` = '$g_academico'";

			$consulta_representante = $conexion->query($sql) or die("error: ".$conexion->error);
			$representante = $consulta_representante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_p_g_academico = $representante["nro_p_g_academico"];
		}


		// Retorna el número de estudiantes en el rango de sueldos minimos que ganan (Se puede filtrar por año y por seccion) 
		public function get_nro_sueldos_rem($sueldos = 1) {
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_sueldos_rem FROM `vista_padres` WHERE `remuneracion` >= 0";

			// filtra para aquellos padres que tengan una remuneracion mayor y igual a la especificada
			// siempre y cuando sea mayor a 1
			if ($sueldos > 1) {
				
				$sql .= " AND ";
				$filtros = [];

				// anexar los filtros con array_merge()

				$filtro_nro_sueldos = "`remuneracion` >= $sueldos";
				$filtros = array_merge($filtros,[$filtro_nro_sueldos]);

				// agregará un AND entre cada condicion siempre que haya más de una
				$sql .= implode(" AND ", $filtros);

			}

			$consulta_representante = $conexion->query($sql) or die("error: ".$conexion->error);
			$representante = $consulta_representante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_sueldos_rem = $representante["nro_sueldos_rem"];
		}


		// Retorna el número de padres con cierto tipo de remuneracion (Se puede filtrar por año y por seccion) 
		public function get_nro_frec_rem($f_remuneracion = "Mensual") {
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_frec_rem FROM `vista_padres` WHERE `tipo_remuneracion` = '$f_remuneracion'";

			$consulta_representante = $conexion->query($sql) or die("error: ".$conexion->error);
			$representante = $consulta_representante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_frec_rem = $representante["nro_frec_rem"];
		}

		
		// Retorna el número de padres con cierto tipo de vivienda (Se puede filtrar)
		public function get_nro_tipo_v($tipo_v) {
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_tipo_v FROM `vista_padres` WHERE `tipo` = '$tipo_v'";

			$consulta_representante = $conexion->query($sql) or die("error: ".$conexion->error);
			$representante = $consulta_representante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_tipo_v = $representante["nro_tipo_v"];
		}

		
		// Retorna el número de padres con cierta condicion de vivienda (Se puede filtrar)
		public function get_nro_condicion_v($condicion_v) {
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_condicion_v FROM `vista_padres` WHERE `condicion` = '$condicion_v'";

			$consulta_representante = $conexion->query($sql) or die("error: ".$conexion->error);
			$representante = $consulta_representante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_condicion_v = $representante["nro_condicion_v"];
		}

		
		// Retorna el número de padres con cierta tenencia de vivienda (Se puede filtrar)
		public function get_nro_tenencia_v($tenencia) {
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_tenencia_v FROM `vista_padres`";

			if ($tenencia == "Otra") {
				$sql .= "WHERE `tenencia` NOT IN ('Propia','Alquilada','Prestada')";
			}
			else {
				$sql .= "WHERE `tenencia` = '$tenencia'";
			}

			$consulta_representante = $conexion->query($sql) or die("error: ".$conexion->error);
			$representante = $consulta_representante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_tenencia_v = $representante["nro_tenencia_v"];
		}


		// Retorna el número de de representantes con cierto numero de representados (Se puede filtrar)
		public function get_nro_hijos($nro_hijos = 1,$anio = NULL,$seccion = NULL) {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			// Consulta que representantes tienen más de un representado
			
			$aux = [
				"`vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` OR`vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula`"];

			// si alguno de los dos se asigna
			if ($anio != NULL or $seccion != NULL) {

				if ($anio != NULL) {
					$aux[] = " `vista_estudiantes`.`grado_a_cursar` = '$anio'";
				}

				if ($seccion != NULL) {
					$aux[] = " `vista_estudiantes`.`seccion` = '$seccion'";
				}

			}

			$aux = implode(" AND ", $aux);

			$sub_con = "
				SELECT
					COUNT(
						`vista_estudiantes`.`cedula_representante`
					) AS nro_hijos,
					`vista_padres`.`cedula`
				FROM
					`vista_estudiantes`,
					`vista_padres`
				WHERE
					$aux
				GROUP BY
					`vista_padres`.`cedula`
			";

			// Consulta cuantos representantes tienen más de un representado
			$sql = "SELECT COUNT(*) as `nro_hijos` FROM ($sub_con) as subcon WHERE";

			// cuando tengan solo un reprentado
			if ($nro_hijos <= 1 and $nro_hijos < 2) {
				$sql .= "`nro_hijos` = '$nro_hijos'";
			}
			// siempre que tengan al menos el número indicado
			elseif ($nro_hijos > 1) {
				$sql .= "`nro_hijos` >= '$nro_hijos'";
			}

			// echo $sql;

			$consulta_representante = $conexion->query($sql) or die("error: ".$conexion->error);
			$representante = $consulta_representante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_hijos = $representante["nro_hijos"];
		}


		// Retorna el número de padres con cierta tenencia de vivienda (Se puede filtrar)
		public function get_nro_pais($tenencia) {
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_tenencia_v FROM `vista_padres` WHERE `pais_residencia` != ''";


			$consulta_representante = $conexion->query($sql) or die("error: ".$conexion->error);
			$representante = $consulta_representante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_tenencia_v = $representante["nro_tenencia_v"];
		}


		public function get_cedula_persona() {
			return $this->cedula_persona;
		}
		public function get_pais_residencia() {
			return $this->pais_residencia;
		}

		public function set_cedula_persona($cedula_persona) {
			$this->cedula_persona = $cedula_persona;
		}
		public function set_pais_residencia($pais_residencia) {
			$this->pais_residencia = $pais_residencia;
		}

	}

?>
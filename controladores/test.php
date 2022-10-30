<?php 

require 'conexion.php';
require '../clases/personas.php';

$conexion = conectarBD();
$persona = new Personas();

$fila = $persona->contarPersonas();

var_dump($fila);

desconectarBD($conexion);

echo "a".NULL;

foreach ($_POST as $key => $value) {
	echo $value;
}

//Si el campo se envia
		if (isset($_POST['Tipo_Cédula_Padre'],$_POST['Cédula_Padre'])) {
			
			//si la cédula y su tipo están llenos
			if (!empty($_POST['Tipo_Cédula_Padre']) and !empty($_POST['Cédula_Padre'])) {
				//asignacion con los datos enviados
				$Cédula_padre = $_POST['Tipo_Cédula_Padre'].$_POST['Cédula_Padre'];
				echo $Cédula_padre;
			}

			//si la cédula o su tipo están vacios
			elseif(empty($_POST['Tipo_Cédula_Padre']) or empty($_POST['Cédula_Padre'])) {
				// asignacion de cédula probicional e incremento para el caso madre
				$cedula_P = "V".$fila;
				echo "cedula";
				$fila++;
			}
		}

?>


<form action="test.php" method="post">
	
	<input type="text" name="Tipo_Cédula_Padre" value="test">
	<input type="text" name="Cédula_Padre" value="">

	<select name="A" id="">
		<option value="" selected disabled>a</option>
		<option value="">b</option>
	</select>

	<input type="submit" name="enviar">

</form>
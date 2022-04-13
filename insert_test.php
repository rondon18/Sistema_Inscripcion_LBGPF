<?php 

require('clases/personas.php');
require('clases/telefonos.php');
require('clases/representantes.php');
require('clases/usuario.php');
require('clases/laborales-representantes.php');
require('controladores/conexion.php');

$persona = new Personas();

$telefonoP = new Telefonos();
$telefonoS = new Telefonos();
$telefonoA = new Telefonos();
$telefonoT = new Telefonos();

$representante = new Representantes();
$datos_laborales = new DatosLaborales();

$usuario = new Usuarios();


#Persona
$persona->setPrimer_Nombre('Elber');
$persona->setSegundo_Nombre('Alonso');
$persona->setPrimer_Apellido('Rondón');
$persona->setSegundo_Apellido('Hernández');
$persona->setCédula('27919566');
$persona->setFecha_Nacimiento('2001-05-05');
$persona->setLugar_Nacimiento('Mérida');
$persona->setGénero('M');
$persona->setCorreo_Electrónico('earh_2001@outlook.com');
$persona->setDirección('La Pedregosa Alta');
$persona->setEstado_Civil('S');

$persona->insertarPersona();

#Telefono principal
$telefonoP->setPrefijo('0416');
$telefonoP->setNúmero_Telefónico('12345678');
$telefonoP->setRelación_Teléfono('Principal');
$telefonoP->setCedula_Persona('27919566');

$telefonoP->insertarTelefono($telefonoP->getCedula_Persona());

#Telefono secundario
$telefonoS->setPrefijo('0412');
$telefonoS->setNúmero_Telefónico('87654321');
$telefonoS->setRelación_Teléfono('Secundario');
$telefonoS->setCedula_Persona('27919566');

$telefonoS->insertarTelefono($telefonoS->getCedula_Persona());

#Telefono auxiliar
$telefonoA->setPrefijo('0274');
$telefonoA->setNúmero_Telefónico('12349587');
$telefonoA->setRelación_Teléfono('Auxiliar');
$telefonoA->setCedula_Persona('27919566');

$telefonoA->insertarTelefono($telefonoA->getCedula_Persona());

#Telefono del trabajo
$telefonoT->setPrefijo('0274');
$telefonoT->setNúmero_Telefónico('12349587');
$telefonoT->setRelación_Teléfono('Trabajo');
$telefonoT->setCedula_Persona('27919566');

$telefonoT->insertarTelefono($telefonoA->getCedula_Persona());

#Representante
$representante->setVinculo("Padre");
$representante->setCedula_Persona("27919566");

$representante->insertarRepresentante();

#Datos laborales
$datos_laborales->setEmpleo('Directivo');
$datos_laborales->setLugar_Trabajo('Liceo....');
$datos_laborales->setTeléfono_Trabajo('');
$datos_laborales->setRemuneración('');
$datos_laborales->setTipo_Remuneración('');

echo $representante->getidRepresentantes();
$datos_laborales->setidRepresentantes($representante->getidRepresentantes());


$usuario->setClave("12345");
$usuario->setPrivilegios("1");
$usuario->setCedula_Persona("27919566");

//INSERCIONES







$datos_laborales->insertarDatosLaborales();

$usuario->insertarUsuario();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test</title>
</head>
<body>
	<table border="1" cellpadding="8">
		<tr>
			<td colspan="14">Personas</td>
		</tr>
		<tr>
			<td>Dato 1</td>
			<td>Dato 2</td>
			<td>Dato 3</td>
			<td>Dato 4</td>
			<td>Dato 5</td>
			<td>Dato 6</td>
			<td>Dato 7</td>
			<td>Dato 8</td>
			<td>Dato 9</td>
			<td>Dato 10</td>
			<td>Dato 11</td>
			<td>Dato 12</td>
			<td>Dato 13</td>
			<td>Dato 14</td>
		</tr>
		<tr>
			<td><?php echo $persona->getPrimer_Nombre(); ?></td>
			<td><?php echo $persona->getSegundo_Nombre(); ?></td>
			<td><?php echo $persona->getPrimer_Apellido(); ?></td>
			<td><?php echo $persona->getSegundo_Apellido(); ?></td>
			<td><?php echo $persona->getCédula(); ?></td>
			<td><?php echo $persona->getFecha_Nacimiento(); ?></td>
			<td><?php echo $persona->getLugar_Nacimiento(); ?></td>
			<td><?php echo $persona->getGénero(); ?></td>
			<td><?php echo $persona->getCorreo_Electrónico(); ?></td>
			<td><?php echo $persona->getDirección(); ?></td>
			<td><?php echo $persona->getEstado_Civil(); ?></td>
			<td><?php echo $telefonoP->getPrefijo()."-".$telefonoP->getNúmero_Telefónico();?></td>
			<td><?php echo $telefonoS->getPrefijo()."-".$telefonoS->getNúmero_Telefónico();?></td>
			<td><?php echo $telefonoA->getPrefijo()."-".$telefonoA->getNúmero_Telefónico();?></td>
		</tr>
	</table>
	<?php  ?>
</body>
</html>
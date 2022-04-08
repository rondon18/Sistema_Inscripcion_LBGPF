<?php

session_start();

require("conexion.php");

require("../clases/representantes.php");
require("../clases/contactos-auxiliares.php");

$conexion = conectarBD();

$representante = new Representantes;
$auxiliar = new ContactoAuxiliar;

if (isset($_POST['orden']) and $_POST['orden']) {
	
	$orden = $_POST['orden'];
		
	if ($orden == "Insertar") {

		#asigna los valores del objeto antes de ejecutar los metodos de inserción

		$representante->setNombres($_POST['Primer_Nombre_Representante']." ".$_POST['Segundo_Nombre_Representante']);
		$representante->setApellidos($_POST['Primer_Apellido_Representante']." ".$_POST['Segundo_Apellido_Representante']);
		$representante->setCedula($_POST['Cédula_Representante']);
		$representante->setFecha_Nacimiento($_POST['Fecha_Nacimiento_Representante']);
		$representante->setLugar_Nacimiento($_POST['Lugar_Nacimiento_Representante']);
		$representante->setLugar_Trabajo($_POST['Lugar_Trabajo_Representante']);
		$representante->setGenero($_POST['Genero_Representante']);
		$representante->setCorreo($_POST['Correo_electrónico']);
		$representante->setDireccion($_POST['Direccion_Representante']);
		$representante->setTeléfono_Principal($_POST['Teléfono_Principal_Representante']);
		$representante->setTeléfono_Auxiliar($_POST['Teléfono_Auxiliar_Representante']);
		$representante->setEstado_Civil($_POST['Estado_Civil_Representante']);

		if ($_POST['Vinculo_Representante'] == "Otro") {
			$representante->setVinculo($_POST['Otro_Vinculo']);
		}
		else {
			$representante->setVinculo($_POST['Vinculo_Representante']);
		}

		$representante->setBanco($_POST['Banco']);
		$representante->setTipo_Cuenta($_POST['Tipo_Cuenta']);
		$representante->setNro_Cuenta($_POST['Nro_Cuenta']);


		$representante->setGrado_Inst($_POST['Grado_Instrucción']);

		if ($_POST['Representante_Trabaja'] == "No") {
			$representante->setEmpleo("Desempleado");
			$representante->setLugar_Trabajo(NULL);
			$representante->setTeléfono_Trabajo(NULL);
			$representante->setRemuneración(NULL);
			$representante->setTipo_Remuneración(NULL);
		}
		else {
			$representante->setEmpleo($_POST['Cargo_Representante']);
			$representante->setLugar_Trabajo($_POST['Lugar_Trabajo_Representante']);
			$representante->setTeléfono_Trabajo($_POST['Telefono_Trabajo_Representante']);
			$representante->setRemuneración($_POST['Remuneración']);
			$representante->setTipo_Remuneración($_POST['Tipo_Remuneracion']);
		}
		

		$representante->setClave($_POST['Contraseña']);
		$representante->setPrivilegios(1);
		#Esto establese la autoridad 1: usuario, 2: administrador

		$auxiliar->setRelación($_POST['Relación_Auxiliar']);
		$auxiliar->setNombre_Aux($_POST['Nombre_Contacto_Emergencia']);
		$auxiliar->setTfl_P_Contacto_Aux($_POST['Tfl_P_Contacto_Aux']);
		$auxiliar->setTfl_S_Contacto_Aux($_POST['Tfl_S_Contacto_Aux']);

		$representante->insertarPersona();
		$representante->insertarRepresentante();
		$representante->insertarUsuario();

		#usa el id del representante insertado para añadir la foranea al contacto auxiliar
		$auxiliar->insertarContactoAuxiliar($representante->getidRepresentantes());

		#Si el usuario se esta registrando destruye las variables de la sesión y que no aparezcan al registrar otro usuario
		if (isset($_POST['Registrar'])) {
			session_destroy();
		}

		header('Location: ../index.php');
	}

	elseif ($orden == "Editar") {
		
		#asigna los valores del objeto antes de ejecutar los metodos de inserción

		$representante->setNombres($_POST['Primer_Nombre_Representante']." ".$_POST['Segundo_Nombre_Representante']);
		$representante->setApellidos($_POST['Primer_Apellido_Representante']." ".$_POST['Segundo_Apellido_Representante']);
		$representante->setCedula($_POST['Cédula_Representante']);
		$representante->setFecha_Nacimiento($_POST['Fecha_Nacimiento_Representante']);
		$representante->setLugar_Nacimiento($_POST['Lugar_Nacimiento_Representante']);
		$representante->setLugar_Trabajo($_POST['Lugar_Trabajo_Representante']);
		$representante->setGenero($_POST['Genero_Representante']);
		$representante->setCorreo($_POST['Correo_electrónico']);
		$representante->setDireccion($_POST['Direccion_Representante']);
		$representante->setTeléfono_Principal($_POST['Teléfono_Principal_Representante']);
		$representante->setTeléfono_Auxiliar($_POST['Teléfono_Auxiliar_Representante']);
		$representante->setEstado_Civil($_POST['Estado_Civil_Representante']);

		if ($_POST['Vinculo_Representante'] == "Otro") {
			$representante->setVinculo($_POST['Otro_Vinculo']);
		}
		else {
			$representante->setVinculo($_POST['Vinculo_Representante']);
		}

		$representante->setBanco($_POST['Banco']);
		$representante->setTipo_Cuenta($_POST['Tipo_Cuenta']);
		$representante->setNro_Cuenta($_POST['Nro_Cuenta']);


		$representante->setGrado_Inst($_POST['Grado_Instrucción']);

		if ($_POST['Representante_Trabaja'] == "No") {
			$representante->setEmpleo("Desempleado");
			$representante->setLugar_Trabajo(NULL);
			$representante->setTeléfono_Trabajo(NULL);
			$representante->setRemuneración(NULL);
			$representante->setTipo_Remuneración(NULL);
		}
		else {
			$representante->setEmpleo($_POST['Cargo_Representante']);
			$representante->setLugar_Trabajo($_POST['Lugar_Trabajo_Representante']);
			$representante->setTeléfono_Trabajo($_POST['Telefono_Trabajo_Representante']);
			$representante->setRemuneración($_POST['Remuneración']);
			$representante->setTipo_Remuneración($_POST['Tipo_Remuneracion']);
		}
		
		if (!empty($_POST['Contraseña']) and $_POST['Contraseña'] == $_POST['RepetirContraseña']) {
			$representante->setClave($_POST['Contraseña']);
		}
		else {
			$representante->setClave($_SESSION['usuario'][1]);
		}
		
		$representante->setPrivilegios(1);
		#Esto establese la autoridad 1: usuario, 2: administrador

		$auxiliar->setRelación($_POST['Relación_Auxiliar']);
		$auxiliar->setNombre_Aux($_POST['Nombre_Contacto_Emergencia']);
		$auxiliar->setTfl_P_Contacto_Aux($_POST['Tfl_P_Contacto_Aux']);
		$auxiliar->setTfl_S_Contacto_Aux($_POST['Tfl_S_Contacto_Aux']);

		#Permite que un usuario edite su propio perfil o que un administrador edite otro usuario
		if (isset($_POST['editar-perfil'])) {
			$representante->editarPersona($_SESSION['persona'][0]);
			$representante->editarRepresentante($_SESSION['representante'][0]);
			$representante->editarUsuario($_SESSION['usuario'][0]);
		}
		else {
			$representante->editarPersona($representante->getId());
			$representante->editarRepresentante($representante->getidRepresentantes());
			$representante->editarUsuario($representante->getId_usuario());
		}

		#Hace los cambios en la tabla contacto auxiliar
		$auxiliar->editarContactoAuxiliar($representante->getidRepresentantes());

		if (isset($_POST['editar-perfil'])) {
			$_SESSION['persona'][1] = $representante->getNombres();
			$_SESSION['persona'][2] = $representante->getApellidos();
			$_SESSION['persona'][3] = $representante->getCedula();
			$_SESSION['persona'][4] = $representante->getFecha_Nacimiento();
			$_SESSION['persona'][5] = $representante->getLugar_Nacimiento();
			$_SESSION['persona'][6] = $representante->getGenero();
			$_SESSION['persona'][7] = $representante->getCorreo();
			$_SESSION['persona'][8] = $representante->getDireccion();
			$_SESSION['persona'][9] = $representante->getTeléfono_Principal();
			$_SESSION['persona'][10] = $representante->getTeléfono_Auxiliar();
			$_SESSION['persona'][11] = $representante->getEstado_Civil();
			
			$_SESSION['representante'][1] = $representante->getVinculo();
			$_SESSION['representante'][2] = $representante->getBanco();
			$_SESSION['representante'][3] = $representante->getTipo_Cuenta();
			$_SESSION['representante'][4] = $representante->getNro_Cuenta();
			$_SESSION['representante'][5] = $representante->getGrado_Inst();
			$_SESSION['representante'][6] = $representante->getEmpleo();
			$_SESSION['representante'][7] = $representante->getLugar_Trabajo();
			$_SESSION['representante'][8] = $representante->getTeléfono_Trabajo();
			$_SESSION['representante'][9] = $representante->getRemuneración();
			$_SESSION['representante'][10] = $representante->getTipo_Remuneración();

			#Relación, Nombre, telefonos principal y auxiliar.
			$_SESSION['auxiliar'][2] = $auxiliar->getRelación();
			$_SESSION['auxiliar'][3] = $auxiliar->getNombre_Aux();
			$_SESSION['auxiliar'][4] = $auxiliar->getTfl_P_Contacto_Aux();
			$_SESSION['auxiliar'][5] = $auxiliar->getTfl_S_Contacto_Aux();

			#Clave
			$_SESSION['usuario'][1] = $representante->getClave();

		}

		#header('Location: ../lobby/index.php');
	}
	elseif ($orden == "Consultar") {
		$representante->setidRepresentantes($_POST['idRepresentantes']);
		$representante->consultarRepresentante($representante->getidRepresentantes());
	}
	elseif ($orden == "Eliminar") {
		
		if (isset($_POST['DarseDeBaja'])) {
			$crud->eliminarUsuario($_SESSION['usuario'][0]);
			header('Location: ../lobby/logout.php');
		}
		elseif (isset($_POST['id'])) {
			$crud->eliminarUsuario($_POST['id']);
			header('Location: ../lobby/index.php');
		}
	}
	else {
		echo "La orden: ' ". $orden . " ' no es valida.";
	}
	//Esto hace lo suyo y manda de regreso a la pagina inicial

}
else {
	//header('Location: ../index.php');
}




?>
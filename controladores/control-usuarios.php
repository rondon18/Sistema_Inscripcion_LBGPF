<?php

session_start();

require("conexion.php");

require("../clases/representantes.php");
require("../clases/contactos-auxiliares.php");
require("../clases/crud-usuarios.php");

$conexion = conectarBD();

$representante = new Representantes;
$auxiliar = new ContactoAuxiliar;
$crud = new CrudUsuarios;

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
			$representante->setRemuneración($_POST['Remuneracion']);
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

		header('Location: ../index.php');
	}

	elseif ($orden == "Editar") {
		
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
			$representante->setTipo_Remuneración($_POST['Tipo_Remuneración']);
		}

		$representante->setClave($_POST['Contraseña']);

		$auxiliar->setRelación($_POST['Relación_Auxiliar']);
		$auxiliar->setNombre_Aux($_POST['Nombre_Contacto_Emergencia']);
		$auxiliar->setTfl_P_Contacto_Aux($_POST['Tfl_P_Contacto_Aux']);
		$auxiliar->setTfl_S_Contacto_Aux($_POST['Tfl_S_Contacto_Aux']);

		$crud->insertarUsuario($representante,$auxiliar);
		header('Location: ../index.php');
	}
	elseif ($orden == "Consultar") {
		
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
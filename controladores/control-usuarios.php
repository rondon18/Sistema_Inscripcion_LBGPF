<?php

session_start();

require("conexion.php");

require('../clases/personas.php');
require('../clases/telefonos.php');
require('../clases/representantes.php');
require('../clases/contactos-auxiliares.php');
require('../clases/usuario.php');
require('../clases/laborales-representantes.php');
require('../clases/economicos-representantes.php');
require('../clases/vivienda-representantes.php');

$conexion = conectarBD();

$persona = new Personas();
$persona_auxiliar = new Personas();

$telefonoP = new Telefonos();
$telefonoS = new Telefonos();
$telefonoA = new Telefonos();
$telefonoT = new Telefonos();

$telefonoP_Aux = new Telefonos();
$telefonoS_Aux = new Telefonos();
$telefonoA_Aux = new Telefonos();


$representante = new Representantes();
$contacto_aux = new ContactoAuxiliar();
$datos_laborales = new DatosLaborales();
$datos_economicos = new DatosEconomicos();
$datos_vivienda = new DatosVivienda();

$usuario = new Usuarios();


if (isset($_POST['orden']) and $_POST['orden']) {

	$orden = $_POST['orden'];

	if ($orden == "Insertar") {

		/*

			Datos del representante

		*/

		#Persona
		$persona->setPrimer_Nombre($_POST['Primer_Nombre_R']);
		$persona->setSegundo_Nombre($_POST['Segundo_Nombre_R']);
		$persona->setPrimer_Apellido($_POST['Primer_Apellido_R']);
		$persona->setSegundo_Apellido($_POST['Segundo_Apellido_R']);
		$persona->setCédula($_POST['Cédula_R']);
		$persona->setFecha_Nacimiento($_POST['Fecha_Nacimiento_R']);
		$persona->setLugar_Nacimiento($_POST['Lugar_Nacimiento_R']);
		$persona->setGénero($_POST['Genero_R']);
		$persona->setCorreo_Electrónico($_POST['Correo_electrónico_R']);
		$persona->setDirección($_POST['Direccion_R']);
		$persona->setEstado_Civil($_POST['Estado_Civil_R']);

		$persona->insertarPersona();

		#Telefono principal
		$telefonoP->setPrefijo($_POST['Prefijo_Principal_R']);
		$telefonoP->setNúmero_Telefónico($_POST['Teléfono_Principal_R']);
		$telefonoP->setRelación_Teléfono('Principal');
		$telefonoP->setCedula_Persona($persona->getCédula());

		$telefonoP->insertarTelefono();

		#Telefono secundario
		$telefonoS->setPrefijo($_POST['Prefijo_Secundario_R']);
		$telefonoS->setNúmero_Telefónico($_POST['Teléfono_Secundario_R']);
		$telefonoS->setRelación_Teléfono('Secundario');
		$telefonoS->setCedula_Persona($persona->getCédula());

		$telefonoS->insertarTelefono();

		#Telefono auxiliar
		$telefonoA->setPrefijo($_POST['Prefijo_Auxiliar_R']);
		$telefonoA->setNúmero_Telefónico($_POST['Teléfono_Auxiliar_R']);
		$telefonoA->setRelación_Teléfono('Auxiliar');
		$telefonoA->setCedula_Persona($persona->getCédula());

		$telefonoA->insertarTelefono();

		#Telefono del trabajo
		$telefonoT->setPrefijo($_POST['Prefijo_Trabajo_R']);
		$telefonoT->setNúmero_Telefónico($_POST['Teléfono_Trabajo_R']);
		$telefonoT->setRelación_Teléfono('Trabajo');
		$telefonoT->setCedula_Persona($persona->getCédula());

		$telefonoT->insertarTelefono();

		#Representante
		#Verifica si el vinculo es distinto a madre o padre
		if ($_POST['Vinculo_R'] == "Otro") {
			$representante->setVinculo($_POST['Otro_Vinculo']);
		}
		else {
			$representante->setVinculo($_POST['Vinculo_R']);
		}

		$representante->setCedula_Persona($persona->getCédula());
		$representante->setGrado_Academico($_POST['Grado_Instrucción']);

		$representante->insertarRepresentante();

		#Datos laborales

		#Si se marca que si, se asignan los datos
		if ($_POST['Representante_Trabaja'] == "No") {
			$datos_laborales->setEmpleo("Desempleado");
		}
		else {
			$datos_laborales->setEmpleo($_POST['Empleo_R']);
			$datos_laborales->setLugar_Trabajo($_POST['Lugar_Trabajo_R']);
			$datos_laborales->setRemuneración($_POST['Remuneración']);
			$datos_laborales->setTipo_Remuneración($_POST['Tipo_Remuneracion']);

		}

		$datos_laborales->setidRepresentantes($representante->getidRepresentantes());
		$datos_laborales->insertarDatosLaborales();

		#Datos economicos
		$datos_economicos->setBanco($_POST['Banco']);
		$datos_economicos->setTipo_Cuenta($_POST['Tipo_Cuenta']);
		$datos_economicos->setCta_Bancaria($_POST['Nro_Cuenta']);
		$datos_economicos->setidRepresentantes($representante->getidRepresentantes());
		$datos_economicos->insertarDatosEconomicos();

		#Datos vivienda
		$datos_vivienda->setCondiciones_Vivienda($_POST['Condicion_vivienda']);
		$datos_vivienda->setTipo_Vivienda($_POST['Tipo_Vivienda']);
		$datos_vivienda->setTenencia_Vivienda($_POST['Tenencia_vivienda']);
		$datos_vivienda->setidRepresentante($representante->getidRepresentantes());

		$datos_vivienda->insertarDatosVivienda();

		/*

			Datos del contacto auxiliar

		*/

		#Persona
		$persona_auxiliar->setPrimer_Nombre($_POST['Primer_Nombre_Aux']);
		$persona_auxiliar->setSegundo_Nombre($_POST['Segundo_Nombre_Aux']);
		$persona_auxiliar->setPrimer_Apellido($_POST['Primer_Apellido_Aux']);
		$persona_auxiliar->setSegundo_Apellido($_POST['Segundo_Apellido_Aux']);
		$persona_auxiliar->setCédula($_POST['Cédula_Aux']);
		$persona_auxiliar->setFecha_Nacimiento($_POST['Fecha_Nacimiento_Aux']);
		$persona_auxiliar->setLugar_Nacimiento($_POST['Lugar_Nacimiento_Aux']);
		$persona_auxiliar->setGénero($_POST['Genero_Aux']);
		$persona_auxiliar->setCorreo_Electrónico($_POST['Correo_electrónico_Aux']);
		$persona_auxiliar->setDirección($_POST['Direccion_Aux']);
		$persona_auxiliar->setEstado_Civil($_POST['Estado_Civil_Aux']);

		$persona_auxiliar->insertarPersona();

		#Telefono principal
		$telefonoP->setPrefijo($_POST['Prefijo_Principal_Aux']);
		$telefonoP->setNúmero_Telefónico($_POST['Teléfono_Principal_Aux']);
		$telefonoP->setRelación_Teléfono('Principal');
		$telefonoP->setCedula_Persona($persona_auxiliar->getCédula());

		$telefonoP->insertarTelefono();

		#Telefono secundario
		$telefonoS->setPrefijo($_POST['Prefijo_Secundario_Aux']);
		$telefonoS->setNúmero_Telefónico($_POST['Teléfono_Secundario_Aux']);
		$telefonoS->setRelación_Teléfono('Secundario');
		$telefonoS->setCedula_Persona($persona_auxiliar->getCédula());

		$telefonoS->insertarTelefono();

		#Telefono auxiliar
		$telefonoA->setPrefijo($_POST['Prefijo_Auxiliar_Aux']);
		$telefonoA->setNúmero_Telefónico($_POST['Teléfono_Auxiliar_Aux']);
		$telefonoA->setRelación_Teléfono('Auxiliar');
		$telefonoA->setCedula_Persona($persona_auxiliar->getCédula());

		$telefonoA->insertarTelefono();

		#datos auxiliar
		$contacto_aux->setRelación($_POST['Relación_Auxiliar']);
		$contacto_aux->setCédula_Persona($persona_auxiliar->getCédula());

		$contacto_aux->insertarContactoAuxiliar($representante->getidRepresentantes());

		/*

			Datos del usuario

		*/

		#Usuario
		$usuario->setClave($_POST['Contraseña']);
		$usuario->setPrivilegios(2);#Se establese como 2 para todos los representantes
		$usuario->setCedula_Persona($persona->getCédula());

		$usuario->insertarUsuario();

		header('Location: ../index.php');
	}

	elseif ($orden == "Editar") {
		/*

			Datos del representante

		*/

		#Persona
		$persona->setPrimer_Nombre($_POST['Primer_Nombre_R']);
		$persona->setSegundo_Nombre($_POST['Segundo_Nombre_R']);
		$persona->setPrimer_Apellido($_POST['Primer_Apellido_R']);
		$persona->setSegundo_Apellido($_POST['Segundo_Apellido_R']);
		$persona->setCédula($_POST['Cédula_R']);
		$persona->setFecha_Nacimiento($_POST['Fecha_Nacimiento_R']);
		$persona->setLugar_Nacimiento($_POST['Lugar_Nacimiento_R']);
		$persona->setGénero($_POST['Genero_R']);
		$persona->setCorreo_Electrónico($_POST['Correo_electrónico_R']);
		$persona->setDirección($_POST['Direccion_R']);
		$persona->setEstado_Civil($_POST['Estado_Civil_R']);

		$persona->editarPersona();

		if ($_SESSION[$_SESSION['usuario']['Privilegios'] == 2]) {
			#Telefono principal
			$telefonoP->setPrefijo($_POST['Prefijo_Principal_R']);
			$telefonoP->setNúmero_Telefónico($_POST['Teléfono_Principal_R']);
			$telefonoP->setRelación_Teléfono('Principal');
			$telefonoP->setCedula_Persona($persona->getCédula());

			$telefonoP->editarTelefono();

			#Telefono secundario
			$telefonoS->setPrefijo($_POST['Prefijo_Secundario_R']);
			$telefonoS->setNúmero_Telefónico($_POST['Teléfono_Secundario_R']);
			$telefonoS->setRelación_Teléfono('Secundario');
			$telefonoS->setCedula_Persona($persona->getCédula());

			$telefonoS->editarTelefono();

			#Telefono auxiliar
			$telefonoA->setPrefijo($_POST['Prefijo_Auxiliar_R']);
			$telefonoA->setNúmero_Telefónico($_POST['Teléfono_Auxiliar_R']);
			$telefonoA->setRelación_Teléfono('Auxiliar');
			$telefonoA->setCedula_Persona($persona->getCédula());

			$telefonoA->editarTelefono();

			#Telefono del trabajo
			$telefonoT->setPrefijo($_POST['Prefijo_Trabajo_R']);
			$telefonoT->setNúmero_Telefónico($_POST['Teléfono_Trabajo_R']);
			$telefonoT->setRelación_Teléfono('Trabajo');
			$telefonoT->setCedula_Persona($persona->getCédula());

			$telefonoT->editarTelefono();

			#Representante
			#Verifica si el vinculo es distinto a madre o padre
			if ($_POST['Vinculo_R'] == "Otro") {
				$representante->setVinculo($_POST['Otro_Vinculo']);
			}
			else {
				$representante->setVinculo($_POST['Vinculo_R']);
			}

			$representante->setCedula_Persona($persona->getCédula());
			$representante->setGrado_Academico($_POST['Grado_Instrucción']);

			$representante->editarRepresentante();

			#Datos laborales
			$datos_laborales->setEmpleo($_POST['Empleo_R']);
			$datos_laborales->setLugar_Trabajo($_POST['Lugar_Trabajo_R']);
			$datos_laborales->setTeléfono_Trabajo($_POST['Telefono_Trabajo_R']);
			$datos_laborales->setRemuneración($_POST['Remuneración']);
			$datos_laborales->setTipo_Remuneración($_POST['Tipo_Remuneracion']);
			$datos_laborales->setidRepresentantes($representante->getidRepresentantes());

			#Si se marca que si, se asignan los datos
			if ($_POST['Representante_Trabaja'] == "No") {
				$datos_laborales->setEmpleo("Desempleado");
			}
			else {
				$datos_laborales->setEmpleo($_POST['Empleo_R']);
				$datos_laborales->setLugar_Trabajo($_POST['Lugar_Trabajo_R']);
				$datos_laborales->setTeléfono_Trabajo($_POST['Telefono_Trabajo_R']);
				$datos_laborales->setRemuneración($_POST['Remuneración']);
				$datos_laborales->setTipo_Remuneración($_POST['Tipo_Remuneracion']);
				$datos_laborales->setidRepresentantes($representante->getidRepresentantes());
			}

			$datos_laborales->editarDatosLaborales();

			#Datos economicos
			$datos_economicos->setBanco($_POST['Banco']);
			$datos_economicos->setTipo_Cuenta($_POST['Tipo_Cuenta']);
			$datos_economicos->setCta_Bancaria($_POST['Nro_Cuenta']);
			$datos_economicos->setidRepresentantes($representante->getidRepresentantes());
			$datos_economicos->editarDatosEconomicos();

			#Datos vivienda
			$datos_vivienda->setCondiciones_Vivienda($_POST['Condicion_vivienda']);
			$datos_vivienda->setTipo_Vivienda($_POST['Tipo_Vivienda']);
			$datos_vivienda->setTenencia_Vivienda($_POST['Tenencia_vivienda']);
			$datos_vivienda->setidRepresentante($representante->getidRepresentantes());

			$datos_vivienda->editarDatosVivienda();

			/*

				Datos del contacto auxiliar

			*/

			#Persona
			$persona_auxiliar->setPrimer_Nombre($_POST['Primer_Nombre_Aux']);
			$persona_auxiliar->setSegundo_Nombre($_POST['Segundo_Nombre_Aux']);
			$persona_auxiliar->setPrimer_Apellido($_POST['Primer_Apellido_Aux']);
			$persona_auxiliar->setSegundo_Apellido($_POST['Segundo_Apellido_Aux']);
			$persona_auxiliar->setCédula($_POST['Cédula_Aux']);
			$persona_auxiliar->setFecha_Nacimiento($_POST['Fecha_Nacimiento_Aux']);
			$persona_auxiliar->setLugar_Nacimiento($_POST['Lugar_Nacimiento_Aux']);
			$persona_auxiliar->setGénero($_POST['Genero_Aux']);
			$persona_auxiliar->setCorreo_Electrónico($_POST['Correo_electrónico_Aux']);
			$persona_auxiliar->setDirección($_POST['Direccion_Aux']);
			$persona_auxiliar->setEstado_Civil($_POST['Estado_Civil_Aux']);

			$persona_auxiliar->editarPersona();

			#Telefono principal
			$telefonoP_Aux->setPrefijo($_POST['Prefijo_Principal_Aux']);
			$telefonoP_Aux->setNúmero_Telefónico($_POST['Teléfono_Principal_Aux']);
			$telefonoP_Aux->setRelación_Teléfono($_POST['Principal']);
			$telefonoP_Aux->setCedula_Persona($persona_auxiliar->getCédula());

			$telefonoP_Aux->editarTelefono();

			#Telefono secundario
			$telefonoS_Aux->setPrefijo($_POST['Prefijo_Secundario_Aux']);
			$telefonoS_Aux->setNúmero_Telefónico($_POST['Teléfono_Secundario_Aux']);
			$telefonoS_Aux->setRelación_Teléfono($_POST['Secundario']);
			$telefonoS_Aux->setCedula_Persona($persona_auxiliar->getCédula());

			$telefonoS->editarTelefono();

			#Telefono auxiliar
			$telefonoA_Aux->setPrefijo($_POST['Prefijo_Auxiliar_Aux']);
			$telefonoA_Aux->setNúmero_Telefónico($_POST['Teléfono_Auxiliar_Aux']);
			$telefonoA_Aux->setRelación_Teléfono($_POST['Auxiliar']);
			$telefonoA_Aux->setCedula_Persona($persona_auxiliar->getCédula());

			$telefonoA_Aux->editarTelefono();

			#datos auxiliar
			$contacto_aux->setRelación($_POST['Relación_Auxiliar']);
			$contacto_aux->setCédula_Persona($persona_auxiliar->getCédula());

			$contacto_aux->editarContactoAuxiliar($representante->getidRepresentantes());
		}

		/*

			Datos del usuario

		*/

		#Usuario
		$usuario->setClave($_POST['Contraseña']);
		$usuario->setCedula_Persona($persona->getCédula());

		$usuario->editarUsuario();

		/*

			Cambia las variables de sesion para no redireccionar al usuario a iniciar sesión

		*/
		$_SESSION['persona']['Primer_Nombre'] = $persona->getPrimer_Nombre();
		$_SESSION['persona']['Segundo_Nombre'] = $persona->getSegundo_Nombre();
		$_SESSION['persona']['Primer_Apellido'] = $persona->getPrimer_Apellido();
		$_SESSION['persona']['Segundo_Apellido'] = $persona->getSegundo_Apellido();
		$_SESSION['persona']['Cédula'] = $persona->getCédula();
		$_SESSION['persona']['Fecha_Nacimiento'] = $persona->getFecha_Nacimiento();
		$_SESSION['persona']['Lugar_Nacimiento'] = $persona->getLugar_Nacimiento();
		$_SESSION['persona']['Género'] = $persona->getGénero();
		$_SESSION['persona']['Correo_Electrónico'] = $persona->getCorreo_Electrónico();
		$_SESSION['persona']['Dirección'] = $persona->getDirección();
		$_SESSION['persona']['Estado_Civil'] = $persona->getEstado_Civil();

		if ($_SESSION['usuario']['Privilegios'] == 2) {
			$_SESSION['telefonos'][0]['Prefijo'] = $telefonoP->getPrefijo();
			$_SESSION['telefonos'][0]['Número_Telefónico'] = $telefonoP->getNúmero_Telefónico();

			$_SESSION['telefonos'][1]['Prefijo'] = $telefonoS->getPrefijo();
			$_SESSION['telefonos'][1]['Número_Telefónico'] = $telefonoS->getNúmero_Telefónico();

			$_SESSION['telefonos'][2]['Prefijo'] = $telefonoA->setPrefijo();
			$_SESSION['telefonos'][2]['Número_Telefónico'] = $telefonoA->getNúmero_Telefónico();

			$_SESSION['telefonos'][3]['Prefijo'] = $telefonoT->setPrefijo();
			$_SESSION['telefonos'][3]['Número_Telefónico'] = $telefonoT->getNúmero_Telefónico();

			$_SESSION['representante']['Vinculo'] = $representante->getVinculo();
			$_SESSION['representante']['Grado_Academico'] = $representante->getGrado_Academico();

			$_SESSION['datos_economicos']['Banco'] = $datos_economicos->getBanco();
			$_SESSION['datos_economicos']['Tipo_Cuenta'] = $datos_economicos->getTipo_Cuenta();
			$_SESSION['datos_economicos']['Cta_Bancaria'] = $datos_economicos->getCta_Bancaria();

			$_SESSION['datos_laborales']['Empleo'] = $datos_laborales->getEmpleo();
			$_SESSION['datos_laborales']['Lugar_Trabajo'] = $datos_laborales->getLugar_Trabajo();
			$_SESSION['datos_laborales']['Remuneración'] = $datos_laborales->getRemuneración();
			$_SESSION['datos_laborales']['Tipo_Remuneración'] = $datos_laborales->getTipo_Remuneración();

			$_SESSION['datos_vivienda']['Condiciones_Vivienda'] = $datos_vivienda->getCondiciones_Vivienda();
			$_SESSION['datos_vivienda']['Tipo_Vivienda'] = $datos_vivienda->getTipo_Vivienda();
			$_SESSION['datos_vivienda']['Tenencia_Vivienda'] = $datos_vivienda->getTenencia_Vivienda();

			$_SESSION['ContactoAuxiliar'][0]['Primer_Nombre'] = $persona_auxiliar->getPrimer_Nombre();
			$_SESSION['ContactoAuxiliar'][0]['Segundo_Nombre'] = $persona_auxiliar->getSegundo_Nombre();
			$_SESSION['ContactoAuxiliar'][0]['Primer_Apellido'] = $persona_auxiliar->getPrimer_Apellido();
			$_SESSION['ContactoAuxiliar'][0]['Segundo_Apellido'] = $persona_auxiliar->getSegundo_Apellido();
			$_SESSION['ContactoAuxiliar'][0]['Cédula'] = $persona_auxiliar->getCédula();
			$_SESSION['ContactoAuxiliar'][0]['Género'] = $persona_auxiliar->getGénero();
			$_SESSION['ContactoAuxiliar'][0]['Correo_Electrónico'] = $persona_auxiliar->getCorreo_Electrónico();
			$_SESSION['ContactoAuxiliar'][0]['Dirección'] = $persona_auxiliar->getDirección();
			$_SESSION['ContactoAuxiliar'][0]['Estado_Civil'] = $persona_auxiliar->getEstado_Civil();

			$_SESSION['ContactoAuxiliar'][1]['Relación'] = $contacto_aux->getRelación();

			$_SESSION['ContactoAuxiliar'][2][0]['Prefijo'] = $telefonoP_Aux->getPrefijo();
			$_SESSION['ContactoAuxiliar'][2][0]['Número_Telefónico'] = $telefonoP_Aux->getNúmero_Telefónico();
			$_SESSION['ContactoAuxiliar'][2][1]['Prefijo'] = $telefonoS_Aux->getPrefijo();
			$_SESSION['ContactoAuxiliar'][2][1]['Número_Telefónico'] = $telefonoS_Aux->getNúmero_Telefónico();
			$_SESSION['ContactoAuxiliar'][2][2]['Prefijo'] = $telefonoA_Aux->getPrefijo();
			$_SESSION['ContactoAuxiliar'][2][2]['Número_Telefónico'] = $telefonoA_Aux->getNúmero_Telefónico();
		}
		header('Location: ../lobby/index.php');
	}
	elseif ($orden == "Eliminar") {

		if (isset($_POST['DarseDeBaja'])) {

			$usuario->eliminarUsuario($_SESSION['persona']['Cédula']);

			require('../clases/bitacora.php');

			$bitacora = new bitacora();
			$_SESSION['acciones'] .= ',Se da de baja';
			$bitacora->actualizar_Bitacora($_SESSION['acciones'],$_SESSION['idBitacora']);

			header('Location: logout.php');
		}
		elseif (isset($_POST['id'])) {
			$usuario->eliminarUsuario($_POST['id']);
			header('Location: ../lobby/index.php');
		}
	}
	else {
		echo "La orden: ' ". $orden . " ' no es valida.";
	}
	//Esto hace lo suyo y manda de regreso a la pagina inicial

}
else {
	header('Location: ../index.php');
}




?>

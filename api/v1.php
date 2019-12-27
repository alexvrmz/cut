<?php

	// Content Type JSON
	header("Content-type: application/json");

	function limpiar_cadena($string) {
		$patterns = "/[<*°\'\\\[\{\]\}\!#\=$%&+\">]/";
		$replace = '';
		if (is_string($string)) {
			return preg_replace($patterns, $replace, $string);
		} elseif (is_array($string)) {
			reset($string);
			while (list($key, $value) = each($string)) {
				$string[$key] = limpiar_cadena($value);
			}
			return $string;
		}
	}

	foreach($_POST as $k => $v) {$$k = limpiar_cadena($v);}
	foreach($_GET as $k => $v) {$$k = limpiar_cadena($v);}

	// Database connection
	//$conn = new mysqli("localhost", "alexrmzi_ejemplo", "c72821g*", "alexrmzi_ejemplovue");
	$conn = new mysqli("192.168.1.78", "uservue", "Myx9ln.2", "crudvue");
	if ($conn->connect_error) {
		die("Error de conexion con la base de datos!");
	}
	$res = array('error' => false);


	// Read data from database
	$action = 'leer';

	if (isset($_GET['action'])) {
		$action = $_GET['action'];
	}

	if ($action == 'leer') {
		$result = $conn->query("SELECT * FROM usuarios");
		$usuarios  = array();

		while ($row = $result->fetch_assoc()) {
			array_push($usuarios, $row);
		}
		$res['usuarios'] = $usuarios;
		//print_r($usuarios);
	}


	// Insert data into database
	if ($action == 'agregar') {
		

		$result = $conn->query("INSERT INTO usuarios (matricula_usuario, apaterno_usuario, amaterno_usuario, nombres_usuario, email_usuario, telefono_usuario) VALUES('$matricula_usuario','$apaterno_usuario', '$amaterno_usuario', '$nombres_usuario', '$email_usuario', '$telefono_usuario')");
		//$desc_bit = 'Se creo el usuario: ' . $matricula_usuario . ' con el email_usuario: ' . $email_usuario . ' y el telefono: ' . $telefono_usuario;
		//$bitacora = $conn->query("INSERT INTO bitacora (desc_bit) VALUES('$desc_bit')");
		if ($result) {
			$res['message'] = "Exito! se agrego el Usuario.";
			//$res['message2'] = $desc_bit;
		} else {
			$res['error']   = true;
			$res['message'] = "Error al crear usuario!.";
			//$res['message'] = $result;
		}
	}


	// Update data

	if ($action == 'actualizar') {


		$result = $conn->query("UPDATE usuarios SET matricula_usuario='$matricula_usuario', apaterno_usuario='$apaterno_usuario', amaterno_usuario='$amaterno_usuario', nombres_usuario='$nombres_usuario', email_usuario='$email_usuario', telefono_usuario='$telefono_usuario' WHERE id_usuario='$id_usuario'");
		//$desc_bit = 'Se edito usuario: ' . $matricula_usuario . ' con el email_usuario: ' . $email_usuario . ' y el telefono: ' . $telefono_usuario;
		//$bitacora = $conn->query("INSERT INTO bitacora (desc_bit) VALUES('$desc_bit')");

		if ($result) {
			$res['message'] = "Exito! se actualizo el Usuario.";
			//$res['message2'] = $desc_bit;
		} else {
			$res['error']   = true;
			$res['message'] = "Error al actualizar Usuario!.";
		}
	}


	// Delete data

	if ($action == 'eliminar') {

		$result = $conn->query("DELETE FROM usuarios WHERE id_usuario='$id_usuario'");
		//$desc_bit = 'Se elimino el usuario: ' . $matricula_usuario . ' con el email_usuario: ' . $email_usuario . ' y el telefono: ' . $telefono_usuario;
		//$bitacora = $conn->query("INSERT INTO bitacora (desc_bit) VALUES('$desc_bit')");

		if ($result) {
			$res['message'] = "Exito! se elimino el Usuario.";
			//$res['message2'] = $desc_bit;
		} else {
			$res['error']   = true;
			$res['message'] = "Error al eliminar el Usuario!.";
		}
	}


	// Close database connection
	$conn->close();
	//echo 'hola<br>';
	//print_r($res);
	// print json encoded data
	echo json_encode($res);
	die();

?>
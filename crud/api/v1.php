<?php

	// Content Type JSON
	header("Content-type: application/json");

	// Database connection
	$conn = new mysqli("localhost", "alexrmzi_ejemplo", "c72821g*", "alexrmzi_ejemplovue");
	//$conn = new mysqli("192.168.1.78", "uservue", "Myx9ln.2", "crudvue");
	if ($conn->connect_error) {
		die("Database connection failed!");
	}
	$res = array('error' => false);


	// Read data from database
	$action = 'read';

	if (isset($_GET['action'])) {
		$action = $_GET['action'];
	}

	if ($action == 'read') {
		$result = $conn->query("SELECT * FROM `usuarios`");
		$usuarios  = array();

		while ($row = $result->fetch_assoc()) {
			array_push($usuarios, $row);
		}
		$res['usuarios'] = $usuarios;
		//print_r($usuarios);
	}


	// Insert data into database
	if ($action == 'create') {
		$matricula_usuario = $_POST['matricula_usuario'];
		$email    = $_POST['email'];
		$mobile   = $_POST['mobile'];

		$result = $conn->query("INSERT INTO `usuarios` (`matricula_usuario`, `email`, `mobile`) VALUES('$matricula_usuario', '$email', '$mobile')");
		$desc_bit = 'Se creo el usuario: ' . $matricula_usuario . ' con el email: ' . $email . ' y el telefono: ' . $mobile;
		$bitacora = $conn->query("INSERT INTO `bitacora` (`desc_bit`) VALUES('$desc_bit')");
		if ($result) {
			$res['message'] = "Usuario added successfully";
			$res['message2'] = $desc_bit;
		} else {
			$res['error']   = true;
			$res['message'] = "Usuario insert failed!";
		}
	}


	// Update data

	if ($action == 'update') {
		$id_usuario       = $_POST['id_usuario'];
		$matricula_usuario = $_POST['matricula_usuario'];
		$email    = $_POST['email'];
		$mobile   = $_POST['mobile'];


		$result = $conn->query("UPDATE `usuarios` SET `matricula_usuario`='$matricula_usuario', `email`='$email', `mobile`='$mobile' WHERE `id_usuario`='$id_usuario'");
		$desc_bit = 'Se edito usuario: ' . $matricula_usuario . ' con el email: ' . $email . ' y el telefono: ' . $mobile;
		$bitacora = $conn->query("INSERT INTO `bitacora` (`desc_bit`) VALUES('$desc_bit')");

		if ($result) {
			$res['message'] = "Usuario updated successfully";
			$res['message2'] = $desc_bit;
		} else {
			$res['error']   = true;
			$res['message'] = "Usuario update failed!";
		}
	}


	// Delete data

	if ($action == 'delete') {
		$id_usuario       = $_POST['id_usuario'];
		$matricula_usuario = $_POST['matricula_usuario'];
		$email    = $_POST['email'];
		$mobile   = $_POST['mobile'];

		$result = $conn->query("DELETE FROM `usuarios` WHERE `id_usuario`='$id_usuario'");
		$desc_bit = 'Se elimino el usuario: ' . $matricula_usuario . ' con el email: ' . $email . ' y el telefono: ' . $mobile;
		$bitacora = $conn->query("INSERT INTO `bitacora` (`desc_bit`) VALUES('$desc_bit')");

		if ($result) {
			$res['message'] = "Usuario delete success";
			$res['message2'] = $desc_bit;
		} else {
			$res['error']   = true;
			$res['message'] = "Usuario delete failed!";
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
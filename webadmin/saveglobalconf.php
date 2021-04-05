<?php require_once 'basics/config.php';
      require_once 'basics/conexion.php';



    $savesql = "UPDATE conf_db SET notificationemail=?, notificationemail2=?, sendaotw=?, sendcontactmessage=? WHERE id=1";


  	if (!($stmt = $conn->prepare($savesql))) {
  		 header('HTTP/1.1 500 Internal Server Error');
  		 header('Content-Type: application/json; charset=UTF-8');
	     //echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;

	     $errores = "Prepare failed: (" . $conn->errno . ") " . $conn->error;
	     die(json_encode($errores));
	}

    $varnotificationemail = $_POST['formnotificationemail'];
    $varnotificationemail2 = $_POST['formnotificationemail2'];
    $varsendaotw = $_POST['formsendaotw'];
    $varsendcontacmessage = $_POST['formsendcontacmessage'];


	if (!$stmt->bind_param('ssss', $varnotificationemail, $varnotificationemail2, $varsendaotw, $varsendcontacmessage)) {
	    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	}


    /* execute prepared statement */
    if (!$stmt->execute()) {
    	header('HTTP/1.1 500 Internal Server Error');
	    $errores = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	    //$errores = array('errores' => 'ajasjasdjsad');
	    echo json_encode($errores);
	}

	else {
		$exito = "Todo Bien!";
		echo json_encode($exito);
	}

    //echo "Records inserted successfully.";
    //}

    //else{
    //echo "ERROR: Could not prepare query: $sql. " . $mysqli->error($conn);
  //}

    /* close statement and connection */
    $stmt->close();


    /* close connection */
    $conn->close();

?>

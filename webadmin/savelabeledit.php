<?php require_once 'basics/config.php';
      require_once 'basics/conexion.php';
               


    $savesql = "UPDATE labels_db SET name=?, description=?, musician=?, website=?, facebook=?, twitter=?, instagram=?, soundcloud=? WHERE id=?";


  	if (!($stmt = $conn->prepare($savesql))) {
  		 header('HTTP/1.1 500 Internal Server Error');
  		 header('Content-Type: application/json; charset=UTF-8');
	     //echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
	     
	     $errores = "Prepare failed: (" . $conn->errno . ") " . $conn->error;
	     die(json_encode($errores));
	}

	//$varname = isset($_POST['varname'])
    //          ? $_POST['varname']
    //          : '';
    //$vardesc = isset($_POST['vardesc'])
    //          ? $_POST['vardesc']
    //          : '';
    //$varwebsite = isset($_POST['varwebsite'])
    //          ? $_POST['varwebsite']
    //          : '';
    //$varfacebook = isset($_POST['varfacebook'])
    //          ? $_POST['varfacebook']
    //          : '';
    //$vartwitter = isset($_POST['vartwitter'])
    //          ? $_POST['vartwitter']
    //          : '';
    //$varinstagram = isset($_POST['varinstagram'])
    //          ? $_POST['varinstagram']
    //          : '';
    //$varsoundcloud = isset($_POST['varsoundcloud'])
    //          ? $_POST['varsoundcloud']
    //          : '';

    $varid = $_POST['varid'];
    $varname = $_POST['varname'];
    $varmusician = $_POST['varmusician'];
    $vardesc = $_POST['vardesc'];
    $varwebsite = $_POST['varwebsite'];
    $varfacebook = $_POST['varfacebook'];
    $vartwitter = $_POST['vartwitter'];
    $varinstagram = $_POST['varinstagram'];
    $varsoundcloud = $_POST['varsoundcloud'];


	if (!$stmt->bind_param('ssssssssi', $varname, $vardesc, $varmusician, $varwebsite, $varfacebook, $vartwitter, $varinstagram, $varsoundcloud, $varid)) {
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
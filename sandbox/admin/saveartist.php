<?php require_once 'basics/config.php';
      require_once 'basics/conexion.php';               


    $savesql = "INSERT INTO artists_db (name, description, imgpath, website, facebook, twitter, instagram, soundcloud, act) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";


  	if (!($stmt = $conn->prepare($savesql))) {
  		 header('HTTP/1.1 500 Internal Server Error');
  		 header('Content-Type: application/json; charset=UTF-8');
	     //echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
	     
	     $errores = "Prepare failed: (" . $conn->errno . ") " . $conn->error;
	     die(json_encode($errores));
	}

     $target_file = "imgs/noprofilepic.jpg";
     $imgname = $_FILES['formimg']['name'];
     
     if(!empty($imgname)){

     foreach($_FILES['formimg']['name'] as $key=>$val){
            //upload and stored images
            $imgname = $_FILES['formimg']['name'][$key];
            $tmp_imgname = $_FILES['formimg']['tmp_name'][$key];
            $newimgname = rand(100,999).$imgname;
            $imgname = strtolower($newimgname);

            $path = "imgs/";
            $absolutepath = "../imgs/";
            $target_file = $absolutepath.$imgname;
            move_uploaded_file($tmp_imgname,$target_file);
            $target_file = $path.$imgname;
        }
     
     }

    $varname = $_POST['formname'];
    $vardesc = $_POST['formdesc'];
    $varwebsite = $_POST['formwebsite'];
    $varfacebook = $_POST['formfacebook'];
    $vartwitter = $_POST['formtwitter'];
    $varinstagram = $_POST['forminstagram'];
    $varsoundcloud = $_POST['formsoundcloud'];
    $varact = "1";


	if (!$stmt->bind_param('ssssssssi', $varname, $vardesc, $target_file, $varwebsite, $varfacebook, $vartwitter, $varinstagram, $varsoundcloud, $varact)) {
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
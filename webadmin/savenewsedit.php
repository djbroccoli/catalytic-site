<?php require_once 'basics/config.php';
      require_once 'basics/conexion.php';
               


    $savesql = "UPDATE news_db SET title=?, subtitle=?, message=? WHERE id=?";


  	if (!($stmt = $conn->prepare($savesql))) {
  		 header('HTTP/1.1 500 Internal Server Error');
  		 header('Content-Type: application/json; charset=UTF-8');
	     //echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
	     
	     $errores = "Prepare failed: (" . $conn->errno . ") " . $conn->error;
	     die(json_encode($errores));
	}

     //$target_file = $_POST['formimgpath'];
     //$imgname = $_FILES['formimg']['name'];
     
     //if(!empty($imgname)){

     //foreach($_FILES['formimg']['name'] as $key=>$val){
            
            //$imgname = $_FILES['formimg']['name'][$key];
            //$tmp_imgname = $_FILES['formimg']['tmp_name'][$key];
            //$newimgname = rand(100,999).$imgname;
            //$imgname = strtolower($newimgname);

            //$path = "imgs/";
            //$target_file = $path.$imgname;
            //move_uploaded_file($tmp_imgname,"../{$target_file}");

        //}
     
     //}

    $varid = $_POST['formid'];
    $vartitle = $_POST['formtitle'];
    $varsubtitle = $_POST['formsubtitle'];
    $vartext = $_POST['formtext'];



	if (!$stmt->bind_param('sssi', $vartitle, $varsubtitle, $vartext, $varid)) {
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
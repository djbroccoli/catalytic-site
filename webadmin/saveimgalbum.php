<?php require_once 'basics/config.php';
      require_once 'basics/conexion.php';               


    $savesql = "INSERT INTO img_db (imgpath, act) VALUES (?, ?)";


  	if (!($stmt = $conn->prepare($savesql))) {
  		 header('HTTP/1.1 500 Internal Server Error');
  		 header('Content-Type: application/json; charset=UTF-8');
	     //echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
	     
	     $errores = "Prepare failed: (" . $conn->errno . ") " . $conn->error;
	     die(json_encode($errores));
	}


     $imgname = $_FILES['formimgpath']['name'];
     
     if(!empty($imgname)){

     foreach($_FILES['formimgpath']['name'] as $key=>$val){
            //upload and stored images
            $imgname = $_FILES['formimgpath']['name'][$key];
            $tmp_imgname = $_FILES['formimgpath']['tmp_name'][$key];
            $newimgname = rand(100,999).$imgname;
            $imgname = strtolower($newimgname);

            $path = "imgs/";
            $target_file = $path.$imgname;
            move_uploaded_file($tmp_imgname,"../{$target_file}");

        }
     
     }

    //$varname = $_POST['formname'];
    $varact = "1";


	if (!$stmt->bind_param('si', $target_file, $varact)) {
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
		$imgcover = $target_file;
    $imgid = $conn->insert_id;
    $data = array(
    "imgcover" => $imgcover,
    "imgid"  => $imgid
    );
    echo json_encode($data);
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
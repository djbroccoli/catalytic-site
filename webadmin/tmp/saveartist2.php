<?php require_once 'basics/config.php';
      require_once 'basics/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {               


    $savesql = "INSERT INTO artists_db (name, description, website, facebook, twitter, instagram, soundcloud, act) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";


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

    $varname = $_POST['varname'];
    $vardesc = $_POST['vardesc'];
    $varwebsite = $_POST['varwebsite'];
    $varfacebook = $_POST['varfacebook'];
    $vartwitter = $_POST['vartwitter'];
    $varinstagram = $_POST['varinstagram'];
    $varsoundcloud = $_POST['varsoundcloud'];
    $varact = "1";

    //$targetdir = "imagestest/"; 
    //$targetfile = $targetdir . basename( $_FILES['img-0']['name']); 

    //$varname = strip_tags(trim($_POST["varname"]));
    //$vardesc = strip_tags(trim($_POST["vardesc"]));
    //$varimg = $_FILES["img-0"]["name"];
    //$varwebsite = strip_tags(trim($_POST["varwebsite"]));
    //$varfacebook = strip_tags(trim($_POST["varfacebook"]));
    //$vartwitter = strip_tags(trim($_POST["vartwitter"]));
    //$varinstagram = strip_tags(trim($_POST["varinstagram"]));
    //$varsoundcloud = strip_tags(trim($_POST["varsoundcloud"]));
    //$varact = "1";


	if (!$stmt->bind_param('sssssssi', $varname, $vardesc, $varwebsite, $varfacebook, $vartwitter, $varinstagram, $varsoundcloud, $varact)) {
	    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	}

    //if (move_uploaded_file($_FILES["img-0"]["tmp_name"], $targetfile)) {
    //    echo "The file ". basename( $_FILES["img-0"]["name"]). " has been uploaded.";
    //} else {
    //    echo "Sorry, there was an error uploading your file.";
    //}


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

}

else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>
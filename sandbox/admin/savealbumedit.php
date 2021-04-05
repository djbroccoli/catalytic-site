<?php require_once 'basics/config.php';
      require_once 'basics/conexion.php';               


    $savesql = "UPDATE full_db SET artistid=?, albumname=?, albumartist=?, personnel=?, label=?, releaseyear=?, formats=?, bandcamplink=?, quantity=?, wholesalecost=?, physical=?, albumcredits=?, coverlink=?, coverimgid=?, newadd=?, newrelease=? WHERE id=?";


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

    //$varid = $_POST['varid'];
    //$varartistpage = $_POST['varartistpage'];
    //$varalbumname = $_POST['varalbumname'];
    //$varartist = $_POST['varartist'];
    //$varpersonnel = $_POST['varpersonnel'];
    //$varlabel = $_POST['varlabel'];
    //$varreleaseyear = $_POST['varreleaseyear'];
    //$varformats = $_POST['varformats'];
    //$varbandcamplink = $_POST['varbandcamplink'];
    //$varquantity = $_POST['varquantity'];
    //$varwholesale = $_POST['varwholesale'];
    //$varphysical = $_POST['varphysical'];
    //$vardesc = $_POST['vardesc'];
    //$varcoverlink = $_POST['varcoverlink'];
    //$varnewadd = $_POST['varnewadd'];
    //$varnewrelease = $_POST['varnewrelease'];

    $varid = $_POST['formid'];
    $varartistpage = $_POST['formartistpage'];
    $varalbumname = $_POST['formalbumname'];
    $varartist = $_POST['formartist'];
    $varpersonnel = $_POST['formpersonnel'];
    $varlabel = $_POST['formlabel'];
    $varreleaseyear = $_POST['formreleaseyear'];
    $varformats = $_POST['formformats'];
    $varbandcamplink = $_POST['formbandcamplink'];
    $varquantity = $_POST['formquantity'];
    $varwholesale = $_POST['formwholesale'];
    $varphysical = $_POST['formphysical'];
    $vardesc = $_POST['formdesc'];

    $prevarcoverlink = $_POST['formcoverlink'];
    $prefind = array("_1.jpg","_2.jpg","_3.jpg","_4.jpg","_5.jpg","_6.jpg","_8.jpg","_12.jpg","_16.jpg");
    $prereplace = "_10.jpg";
    $varcoverlink = str_replace($prefind,$prereplace,$prevarcoverlink);

    $varcoverimgid = $_POST['formcoverimgid'];
    $varnewadd = $_POST['formnewadd'];
    $varnewrelease = $_POST['formnewrelease'];


    if (!$stmt->bind_param('ssssssssssssssssi', $varartistpage, $varalbumname, $varartist, $varpersonnel, $varlabel, $varreleaseyear, $varformats, $varbandcamplink, $varquantity, $varwholesale, $varphysical, $vardesc, $varcoverlink, $varcoverimgid, $varnewadd, $varnewrelease, $varid)) {
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
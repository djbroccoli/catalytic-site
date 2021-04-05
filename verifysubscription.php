<?php
    require_once 'webadmin/basics/config.php';
    require_once 'webadmin/basics/conexion.php';
 
        date_default_timezone_set('America/Chicago');
        $date = date('m/d/Y H:i:s');

        $varemail = $_GET['email'];
        $varverifiedcode = $_GET['token'];
        $varverified = "1";

        $verifiedsql = "UPDATE subscribers_db SET verified=? WHERE verifiedcode=? AND email=?";

        $stmt = $conn->prepare($verifiedsql);
        $stmt->bind_param("iss", $varverified, $varverifiedcode, $varemail);
        //$stmt->execute();     

        if (!$stmt->execute()) {   
         echo "<h3><i class='fa fa-exclamation-triangle fa-1x'></i> Something went wrong</h3><p>Please, try again later</p>";   
        } else {
            //echo "<p class='wow fadeInUp' style='font-size:16px;'>Verified!</p>";
            
            echo header( 'Location: index.php' ) ;
        }

        $stmt->close();
    
?>
<?php
      require_once 'basics/config.php';
      require_once 'basics/conexion.php'; ;

        date_default_timezone_set('America/Chicago');
        $date = date('m/d/Y');

        $originaldate = $_GET['date'];

        $albumtoreload = $_GET['id'];

        $newalbum = $_GET['newid'];


        $verifiedsql = "UPDATE aotw_db SET albumid=?, week=? WHERE id=?";

        $stmt = $conn->prepare($verifiedsql);
        $stmt->bind_param("isi", $newalbum, $originaldate, $albumtoreload);
        //$stmt->execute();

        if (!$stmt->execute()) {
         echo "<h3><i class='fa fa-exclamation-triangle fa-1x'></i> Something went wrong</h3><p>Please, try again later</p>";
        } else {

            //echo header( 'Location: index.php' ) ;
            header('Location: adminaotw.php#ok');
        }

        $result->free();
        $stmt->close();

?>

<?php
      require_once 'basics/config.php';
      require_once 'basics/conexion.php'; ;

        date_default_timezone_set('America/Chicago');
        $date = date('m/d/Y');

        $originaldate = $_GET['date'];

        $albumtoreload = $_GET['id'];


		$randsql = "SELECT * FROM full_db WHERE act = 1 AND releaseyear < '2015' AND releaseyear NOT LIKE '' AND (formats NOT LIKE '%T-Shirt%' OR formats NOT LIKE '%Poster%') AND id <> " . $albumtoreload . " ORDER BY RAND() LIMIT 1";

		$result = $conn->query($randsql);

		if ($result->num_rows > 0) {

			//$rows = array();

            	while($randrow = $result->fetch_assoc()) {

            		//$rows[] = $randrow;

            		$varalbumid[] = $randrow['id'];
            		$varalbumname[] = $randrow['albumname'];
            		$varalbumartist[] = $randrow['albumartist'];

            	}
        }

        //foreach($rows as $key => $arrayrow) {
		//$varalbumid0 = $arrayrow['id'];
		//$varalbumname0 = $arrayrow['albumname'];
		//$varalbumartist0 = $arrayrow['albumartist'];
		//}


        $verifiedsql = "UPDATE aotw_db SET albumid=?, week=? WHERE albumid=?";

        $stmt = $conn->prepare($verifiedsql);
        $stmt->bind_param("isi", $varalbumid[0], $originaldate, $albumtoreload);
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

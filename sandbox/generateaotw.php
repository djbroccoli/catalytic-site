<?php
    require_once 'admin/basics/config.php';
    require_once 'admin/basics/conexion.php';

        date_default_timezone_set('America/Chicago');
        $date = date('m/d/Y');


		$randsql = "SELECT * FROM full_db WHERE act = 1 AND releaseyear < '2015' AND releaseyear NOT LIKE '' AND (formats NOT LIKE '%T-Shirt%' OR formats NOT LIKE '%Poster%') ORDER BY RAND() LIMIT 30";

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


        $verifiedsql = "INSERT INTO aotw_db (albumid, week) VALUES (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?)";

        $stmt = $conn->prepare($verifiedsql);
        $stmt->bind_param("isisisisisisisisisisisisisisisisisisisisisisisisisisisisisis",
        $varalbumid[0],
        $date,
        $varalbumid[1],
        $date,
        $varalbumid[2],
        $date,
        $varalbumid[3],
        $date,
        $varalbumid[4],
        $date,
        $varalbumid[5],
        $date,
        $varalbumid[6],
        $date,
        $varalbumid[7],
        $date,
        $varalbumid[8],
        $date,
        $varalbumid[9],
        $date,
        $varalbumid[10],
        $date,
        $varalbumid[11],
        $date,
        $varalbumid[12],
        $date,
        $varalbumid[13],
        $date,
        $varalbumid[14],
        $date,
        $varalbumid[15],
        $date,
        $varalbumid[16],
        $date,
        $varalbumid[17],
        $date,
        $varalbumid[18],
        $date,
        $varalbumid[19],
        $date,
        $varalbumid[20],
        $date,
        $varalbumid[21],
        $date,
        $varalbumid[22],
        $date,
        $varalbumid[23],
        $date,
        $varalbumid[24],
        $date,
        $varalbumid[25],
        $date,
        $varalbumid[26],
        $date,
        $varalbumid[27],
        $date,
        $varalbumid[28],
        $date,
        $varalbumid[29],
        $date);
        //$stmt->execute();

        if (!$stmt->execute()) {
         echo "<h3><i class='fa fa-exclamation-triangle fa-1x'></i> Something went wrong</h3><p>Please, try again later</p>";
        } else {
            //echo "<p class='wow fadeInUp' style='font-size:16px;'>You are an awesome human being!</p>";

            $globalconfsql = "SELECT * FROM conf_db WHERE id = 1";
            $globalconfresult = $conn->query($globalconfsql);

            $globalconfrow = $globalconfresult->fetch_assoc();


            //confirmation email

            if ($globalconfrow["sendaotw"] == 1) {

  	        $to = $globalconfrow["notificationemail"];
  	        $headers = "MIME-Version: 1.0" . "\r\n";
  	        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  	        $headers .= 'From: Catalytic Sound <albumoftheweek@catalyticsound.com>' . "\r\n";
            if ($globalconfrow["notificationemail2"] > '') {
              $headers .= 'Cc: '. $globalconfrow["notificationemail2"] .'' . "\r\n";
            }
  	        $headers .= 'Bcc: jdvillafane@gmail.com' . "\r\n";
  	        $subject = "Albums of the Week - ". $date;
  	        //$fields = array();
  	        //$fields{"name"} = "name";
  	        //$fields{"email"} = "email";
  	        //$fields{"phone"} = "phone";
  	        //$fields{"message"} = "message";
  	        //$body = "Here is what was sent:\n\n"; foreach($fields as $a => $b){   $body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]); }
  	        $body = "
  	        <html>
  	        <head>
  	        <title>Email from Catalytic Sound Website</title>
  	        </head>
  	        <body style='font-family:sans-serif;'>
  	        <table align='center' width='650'>
  	        <tr>
  	        <td align='center'>
  	        <img src='http://catalyticsound.com/imgs/logobig.png'>
  	        </td>
  	        </tr>
  	        <tr>
  	        <tr>
  	        <td>
  	        <table align='center' width='610' style='border-top:1px solid #d0d0d0;border-top:1px solid #ccc;'>
  	        </table>
  	        </td>
  	        </tr>
  	        <td align='center'>
  	        <h2 style='color:#acacac;text-align:center;'>Albums of the Week - ". $date ."</h2>
  	        </td>
  	        </tr>
  	        <tr>
  	        <td>
  	        <table align='center' width='610' style='border-top:1px solid #d0d0d0;padding-top:30px;border-top:1px solid #ccc;'>
  	        <tr>
  	        <th style='text-align:left;'>#</th>
  	        <th style='text-align:left;'><p>Album Name</p></th>
  	        <th style='text-align:left;'><p>Artist</p></th>
  	        </tr>
  	        <tr>
  	        <td>1.</td>
  	        <td>". $varalbumname[0] ."</td>
  	        <td>". $varalbumartist[0] ."</td>
  	        </tr>
  	        <tr>
  	        <td>2.</td>
  	        <td>". $varalbumname[1] ."</td>
  	        <td>". $varalbumartist[1] ."</td>
  	        </tr>
  	        <tr>
  	        <td>3.</td>
  	        <td>". $varalbumname[2] ."</td>
  	        <td>". $varalbumartist[2] ."</td>
  	        </tr>
  	        <tr>
  	        <td>4.</td>
  	        <td>". $varalbumname[3] ."</td>
  	        <td>". $varalbumartist[3] ."</td>
  	        </tr>
  	        <tr>
  	        <td>5.</td>
  	        <td>". $varalbumname[4] ."</td>
  	        <td>". $varalbumartist[4] ."</td>
  	        </tr>
  	        <tr>
  	        <td>6.</td>
  	        <td>". $varalbumname[5] ."</td>
  	        <td>". $varalbumartist[5] ."</td>
  	        </tr>
  	        <tr>
  	        <td>7.</td>
  	        <td>". $varalbumname[6] ."</td>
  	        <td>". $varalbumartist[6] ."</td>
  	        </tr>
  	        <tr>
  	        <td>8.</td>
  	        <td>". $varalbumname[7] ."</td>
  	        <td>". $varalbumartist[7] ."</td>
  	        </tr>
            <tr>
  	        <td>9.</td>
  	        <td>". $varalbumname[8] ."</td>
  	        <td>". $varalbumartist[8] ."</td>
  	        </tr>
  	        <tr>
  	        <td>10.</td>
  	        <td>". $varalbumname[9] ."</td>
  	        <td>". $varalbumartist[9] ."</td>
  	        </tr>
  	        <tr>
  	        <td>11.</td>
  	        <td>". $varalbumname[10] ."</td>
  	        <td>". $varalbumartist[10] ."</td>
  	        </tr>
  	        <tr>
  	        <td>12.</td>
  	        <td>". $varalbumname[11] ."</td>
  	        <td>". $varalbumartist[11] ."</td>
  	        </tr>
  	        <tr>
  	        <td>13.</td>
  	        <td>". $varalbumname[12] ."</td>
  	        <td>". $varalbumartist[12] ."</td>
  	        </tr>
  	        <tr>
  	        <td>14.</td>
  	        <td>". $varalbumname[13] ."</td>
  	        <td>". $varalbumartist[13] ."</td>
  	        </tr>
  	        <tr>
  	        <td>15.</td>
  	        <td>". $varalbumname[14] ."</td>
  	        <td>". $varalbumartist[14] ."</td>
  	        </tr>
  	        <tr>
  	        <td>16.</td>
  	        <td>". $varalbumname[15] ."</td>
  	        <td>". $varalbumartist[15] ."</td>
  	        </tr>
            <tr>
  	        <td>17.</td>
  	        <td>". $varalbumname[16] ."</td>
  	        <td>". $varalbumartist[16] ."</td>
  	        </tr>
  	        <tr>
  	        <td>18.</td>
  	        <td>". $varalbumname[17] ."</td>
  	        <td>". $varalbumartist[17] ."</td>
  	        </tr>
  	        <tr>
  	        <td>19.</td>
  	        <td>". $varalbumname[18] ."</td>
  	        <td>". $varalbumartist[18] ."</td>
  	        </tr>
  	        <tr>
  	        <td>20.</td>
  	        <td>". $varalbumname[19] ."</td>
  	        <td>". $varalbumartist[19] ."</td>
  	        </tr>
  	        <tr>
  	        <td>21.</td>
  	        <td>". $varalbumname[20] ."</td>
  	        <td>". $varalbumartist[20] ."</td>
  	        </tr>
  	        <tr>
  	        <td>22.</td>
  	        <td>". $varalbumname[21] ."</td>
  	        <td>". $varalbumartist[21] ."</td>
  	        </tr>
  	        <tr>
  	        <td>23.</td>
  	        <td>". $varalbumname[22] ."</td>
  	        <td>". $varalbumartist[22] ."</td>
  	        </tr>
  	        <tr>
  	        <td>24.</td>
  	        <td>". $varalbumname[23] ."</td>
  	        <td>". $varalbumartist[23] ."</td>
  	        </tr>
            <tr>
  	        <td>25.</td>
  	        <td>". $varalbumname[24] ."</td>
  	        <td>". $varalbumartist[24] ."</td>
  	        </tr>
  	        <tr>
  	        <td>26.</td>
  	        <td>". $varalbumname[25] ."</td>
  	        <td>". $varalbumartist[25] ."</td>
  	        </tr>
  	        <tr>
  	        <td>27.</td>
  	        <td>". $varalbumname[26] ."</td>
  	        <td>". $varalbumartist[26] ."</td>
  	        </tr>
  	        <tr>
  	        <td>28.</td>
  	        <td>". $varalbumname[27] ."</td>
  	        <td>". $varalbumartist[27] ."</td>
  	        </tr>
  	        <tr>
  	        <td>29.</td>
  	        <td>". $varalbumname[28] ."</td>
  	        <td>". $varalbumartist[28] ."</td>
  	        </tr>
  	        <tr>
  	        <td>30.</td>
  	        <td>". $varalbumname[29] ."</td>
  	        <td>". $varalbumartist[29] ."</td>
  	        </tr>
  	        </table>
  	        </td>
  	        </tr>
  	        </table>
  	        </body>
  	        </html>
  	        ";
  	        $send = mail($to, $subject, $body, $headers);

          }

            //echo header( 'Location: index.php' ) ;
        }

        $globalconfresult->free();
        $result->free();
        $stmt->close();

?>

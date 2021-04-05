<?php
    require_once 'webadmin/basics/config.php';
    require_once 'webadmin/basics/conexion.php';
    // Only process POST requests.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ( preg_match( "/[\r\n]/", $name ) ||  preg_match( "/[,]/", $name ) || preg_match( "/[\r\n]/", $email ) || preg_match( "/[,]/", $email ) ) {

        return '<h3>Sorry, I am not able to deliver your message. That was a possible Hijacking</h3>';
        return false;
        } else
        {
        $globalconfsql = "SELECT * FROM conf_db WHERE id = 1";
        $globalconfresult = $conn->query($globalconfsql);

        $globalconfrow = $globalconfresult->fetch_assoc();

        if ($globalconfrow["sendcontactmessage"] == 1) {

          $to = $globalconfrow["notificationemail"];
          $from = $_REQUEST['contactemail'];
          $name = $_REQUEST['contactname'];
          $message = $_REQUEST['contactmessage'];
          date_default_timezone_set('America/Chicago');
          $date = date('m/d/Y H:i:s');
          $act = "1";

          $mailsql = "INSERT INTO messages_db (name, message, email, serverdate, act) VALUES (?, ?, ?, ?, ?)";

          $stmt = $conn->prepare($mailsql);
          $stmt->bind_param("ssssi", $name, $message, $from, $date, $act);

          if(!$stmt->execute()) {
            $messagesaved = 0;
          }
          else {
            $messagesaved = 1;
          }
          $stmt->close();

          //cabecera
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
          $headers .= 'From: Web Contact Form <contact-form@catalyticsound.com>' . "\r\n";
          if ($globalconfrow["notificationemail2"] > '') {
            $headers .= 'Cc: '. $globalconfrow["notificationemail2"] .'' . "\r\n";
          }
          $headers .= 'Bcc: joeldario.dg@gmail.com' . "\r\n";
          $subject = "New message from $name";
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
          <td align='center'>
          <h3 style='color:#acacac;text-align:center;'>Catalytic Sound Contact Form</h3>
          <table align='center' width='500' style='border-top:1px solid #d0d0d0;padding-top:15px;border-top:1px dotted #ccc;'>
          <tr>
          <th colspan='2' style='text-align:left;'>Date: ". $date ."</th>
          </tr>
          <tr>
          <td colspan='2'><p>Name: <strong>". $name ."</strong></p></td>
          </tr>
          <tr>
          <td colspan='2'>
          <p>Email: <strong>". $from ."</strong></p>
          </td>
          </tr>
          <tr>
          <td colspan='2'><p>Message: <strong>". $message ."</strong></p></td>
          </tr>
          <tr>
          <td colspan='2'><a href='mailto:". $from ."'><p style='text-align:center;'>Click here to reply!</p></a></td>
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
        }

        if($messagesaved <> 1) {
         echo "<h3><i class='fa fa-exclamation-triangle fa-1x'></i> Something went wrong</h3><p>Please, try again later</p>";
        } else {
            echo "<h3 class='wow fadeInUp'>Thank You!</h3><p class='wow fadeInUp' style='font-size:15px;'>Your message has been successfully sent.</p><p style='font-style:italic;color:#9e9e9e;padding-top:25px;'>Your email is: ". $from ."</p>";
        }
    }
    else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
?>

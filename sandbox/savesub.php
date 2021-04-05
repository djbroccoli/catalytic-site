<?php
    require_once 'admin/basics/config.php';
    require_once 'admin/basics/conexion.php';
    require_once 'admin/login/includes/RandomStringGenerator.php';
    use Utils\RandomStringGenerator;
    // Only process POST requests.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ( preg_match( "/[\r\n]/", $email ) || preg_match( "/[,]/", $email ) ) {

        return '<h3>Sorry, I am not able to deliver your message. That was a possible Hijacking</h3>';
        return false;
        } else
        {
        //$to = "customer-service@catalytic-sound.com";
        //$to = "jdvillafane@gmail.com";
        $email = $_REQUEST['subemail'];
        date_default_timezone_set('America/Chicago');
        $date = date('m/d/Y H:i:s');

        // Token generator class.
        $customAlphabet = '01234678aAbBcCdDeEfFgGHJKLMNPQRSTVWXZ';
        $generator = new RandomStringGenerator($customAlphabet);
        $tokenLength = 25;
        $verifiedcode = $generator->generate($tokenLength);
        $act = "1";

        $mailsql = "INSERT INTO subscribers_db (email, verifiedcode, act) VALUES (?, ?, ?)";

        $stmt = $conn->prepare($mailsql);
        $stmt->bind_param("ssi", $email, $verifiedcode, $act);
        $stmt->execute();
        $stmt->close();

        //cabecera
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: Catalytic Sound <customer-service@catalytic-sound.com>' . "\r\n";
        $headers .= 'Bcc: joeldario.dg@gmail.com' . "\r\n";
        $subject = "Thank you for your subscription to Catalytic Sound Newsletter";
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
        <table align='center' width='610' style='border-top:1px solid #d0d0d0;padding-top:20px;border-top:1px solid #ccc;'>
        </table>
        </td>
        </tr>
        <td align='center'>
        <h2 style='color:#acacac;text-align:center;'>Thank you!</h2><p>Please verify your email by clicking <a href='http://catalyticsound.com/verifysubscription.php?email=". $email ."&token=". $verifiedcode ."' target='_blank'>here</a>.</p>
        </td>
        </tr>
        </table>
        </body>
        </html>
        ";
        $send = mail($email, $subject, $body, $headers);
        }

        if(!$send) {
         echo "<h3><i class='fa fa-exclamation-triangle fa-1x'></i> Something went wrong</h3><p>Please, try again later</p>";
        } else {
            echo "<p class='wow fadeInUp' style='font-size:16px;'>Thank you!</p>";
        }
    }
    else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
?>

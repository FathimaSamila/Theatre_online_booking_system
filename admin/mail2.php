<?php
$connection = mysqli_connect("localhost", "root", "", "vijaya_theater");
use function PHPSTORM_META\map;
// booking data delete
if (isset($_POST['save'])) {

    require 'mail/PHPMailerAutoload.php';

    $name=$_POST['email'];
    $pass=$_POST['pass'];

    $mail = new PHPMailer;
    $mail->SMTPDebug = 4;                               // Enable verbose debug output

    $mail->isSMTP();
    $mail->Host = 'localhost';
    $mail->SMTPAuth = false;
    $mail->SMTPAutoTLS = false; 
    $mail->Port = 25;
    // $mail->isSMTP();                                      // Set mailer to use SMTP
    // $mail->Host = 'smtp.gmail.com';                         // Specify main and backup SMTP servers
    // $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'kirukirusopan16@gmail.com';                 // SMTP username
    $mail->Password = 'kiru0816';                           // SMTP password
    // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    // $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('kirukirusopan16@gmail.com', 'Vijaya Theatre');

    $mail->addAddress($name);            
        // Add a recipient
        // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Show Cancel';
        $mail->Body    = 'Name : ' . $name . 'Email :' . $pass;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="mail2.php">
        <label for="email">Email</label>
        <input type="Email" name="email">
        <label for="pass">password</label>
        <input type="password" name="pass">
        <button name="save">Save</button>
    </form>
</body>

</html>
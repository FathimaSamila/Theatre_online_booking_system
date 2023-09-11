<?php
$connection = mysqli_connect("localhost", "root", "", "vijaya_theater");
use function PHPSTORM_META\map;

// booking mail send
if (isset($_POST['mail-btn'])) {
    require 'mail/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->SMTPDebug = 4;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                         // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'kirukirusopan16@gmail.com';                 // SMTP username
    $mail->Password = 'kiru0816';                          // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('kirukirusopan16@gmail.com', 'Vijaya Theatre');

    $show_id = $_POST['show_id'];
    $movie = $_POST['movie'];
    $date = $_POST['date'];
    $query = "SELECT * FROM payment WHERE show_id='$show_id'";
    $query_run = mysqli_query($connection, $query);
    if (mysqli_num_rows($query_run) > 0) {
        while ($row = mysqli_fetch_assoc($query_run)) {
            $user = $row['name'];
            $email = $row['email'];
            $mail->addAddress($email);
        }              
        // Add a recipient
        // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Show Cancel';
        $mail->Body    = 'Name : ' . $user . 'Email :' . $email;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    } 
    else 
    {
        echo'No data found';
    }
}

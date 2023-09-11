<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "vijaya_theater");

if (isset($_POST['showadd'])) {
    $showtype = $_POST['show-type'];
    // $_SESSION['type'] = $showtype;
    $name = $_POST['addshow-movielist'];
    $date = $_POST['showdate'];
    $time = $_POST['showtime'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $add_date = $_POST['cDate'];
    $showdt = $date . ' ' . $time;
    $sql = "SELECT * FROM show_table WHERE categorie='$showtype' AND movie_name='$name' ";
    $sql_run = mysqli_query($connection, $sql);
    if (mysqli_num_rows($sql_run) > 0) {
        while ($row = mysqli_fetch_assoc($sql_run)) {
            $showDate = $row['show_date_time'];
            if ($showDate == $showdt) {
                $_SESSION['success'] = "Show Already Added";
                header('Location: show-admin.php');
            } else {
                $sql2 = "SELECT * FROM movie WHERE categorie='$showtype' AND movie_name='$name' ";
                $sql2_run = mysqli_query($connection, $sql2);
                $row2 = mysqli_fetch_assoc($sql2_run);
                $id = $row2['movie_id'];

                $query = "INSERT INTO show_table(movie_id,categorie,movie_name,show_date_time,ticket_price,cover_image,add_date)
                VALUES ('$id','$showtype','$name','$showdt','$price','$image','$add_date') ";
                $query_run = mysqli_query($connection, $query);

                if ($query_run) {
                    $_SESSION['success'] = "Show Added";
                    header('Location: show-admin.php');
                } else {
                    $_SESSION['success'] = "Show Not Added";
                    header('Location: show-admin.php');
                }
            }
        }
    }
    else {
        $sql2 = "SELECT * FROM movie WHERE categorie='$showtype' AND movie_name='$name' ";
        $sql2_run = mysqli_query($connection, $sql2);
        $row2 = mysqli_fetch_assoc($sql2_run);
        $id = $row2['movie_id'];

        $query = "INSERT INTO show_table(movie_id,categorie,movie_name,show_date_time,ticket_price,cover_image,add_date)
        VALUES ('$id','$showtype','$name','$showdt','$price','$image','$add_date') ";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Show Added";
            header('Location: show-admin.php');
        } else {
            $_SESSION['success'] = "Show Not Added";
            header('Location: show-admin.php');
        }
    }
}

// data delete

if (isset($_POST['addelete-btn'])) 
{
        $id = $_POST['delete_id'];

        // $sql1="SELECT id FROM seat_reserved WHERE show_id='$id'";
        // $sql1_run= mysqli_query($connection,$sql1);
        // $sid=mysqli_fetch_array($sql1_run);
        // $sid2=$sid['id'];

        $query1 = "DELETE From seat_reserved WHERE show_id='$id'";
        $query1_run = mysqli_query($connection, $query1);

        // $sql2="SELECT pay_id FROM payment WHERE show_id='$id'";
        // $sql2_run= mysqli_query($connection,$sql2);
        // $pid=mysqli_fetch_array($sql2_run);
        // $pid2=$pid['pay_id'];

        $query2 = "DELETE From payment WHERE show_id='$id'";
        $query2_run = mysqli_query($connection, $query2);

        // $sql3="SELECT booking_id FROM booking WHERE show_id='$id'";
        // $sql3_run= mysqli_query($connection,$sql3);
        // $bid=mysqli_fetch_array($sql3_run);
        // $bid2=$bid['booking_id'];

        $query3 = "DELETE From booking WHERE show_id='$id'";
        $query3_run = mysqli_query($connection, $query3);

        // $sql4="SELECT id FROM seat_detail WHERE show_id='$id'";
        // $sql4_run= mysqli_query($connection,$sql4);
        // $sdid=mysqli_fetch_array($sql4_run);
        // $sdid2=$sdid['id'];

        $query4 = "DELETE From seat_detail WHERE show_id='$id'";
        $query4_run = mysqli_query($connection, $query4);

        $query5 = "DELETE FROM show_table WHERE show_id='$id'";
        $query5_run = mysqli_query($connection, $query5);

        if ($query4_run) {
            $_SESSION['success'] = "Show Cancel Successfully";
            $_SESSION['success_code'] = "success";
            header('Location: show-admin.php');
        } else {
            $_SESSION['success'] = "Show Not Cancel";
            $_SESSION['success_code'] = "error";
            header('Location: show-admin.php');
        }
}

if (isset($_POST['mail-btn'])) 
{
    require 'mail/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->SMTPDebug = 4;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                         // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'nkkiru16@example.com';                 // SMTP username
    $mail->Password = 'kiru0816';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('nkkiru16@example.com', 'Vijaya Theatre');

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
    } else {
        echo 'No data found';
    }
}

// // data update

if (isset($_POST['btn_update'])) {
    $id = $_POST['edit_id'];
    $showtype = $_POST['show-type'];
    $name = $_POST['addshow-movielist'];
    $time = $_POST['showtime'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $query = "UPDATE show_table SET categorie='$showtype',movie_name='$name',show_date_time='$time',ticket_price='$price',cover_image='$image' WHERE show_id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Your data is updated";
        $_SESSION['success_code'] = "success";
        header('Location: show-admin.php');
    } else {
        $_SESSION['success'] = "Your data is not updated";
        $_SESSION['success_code'] = "error";
        header('Location: show-admin.php');
    }
}

if (isset($_POST['canbtn'])) {
    header('Location: show-admin.php');
}

?>




?>
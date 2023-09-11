<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "vijaya_theater");
// booking data delete

if (isset($_POST['bookcan-btn'])) {
    $bid = $_POST['book_id'];
    $uid = $_POST['user_id'];
    $sid = $_POST['show_id'];

    $query3 = "DELETE From seat_reserved WHERE booking_id='$bid'";
    $query3_run = mysqli_query($connection, $query3);

    $query4 = "DELETE From payment WHERE booking_id='$bid'";
    $query4_run = mysqli_query($connection, $query4);

    $query5 = "DELETE From booking WHERE booking_id='$bid'";
    $query5_run = mysqli_query($connection, $query5);

    $query6 = "DELETE From seat_detail WHERE user_id='$uid' AND show_id='$sid'";
    $query6_run = mysqli_query($connection, $query6);


    if ($query5_run) {
        $_SESSION['ok'] = "Booking Canceled";
        header('Location: admin-booking.php');
    } else {
        $_SESSION['no'] = "Booking Not Canceled";
        header('Location: admin-booking.php');
    }
}



if (isset($_POST['loginbtn'])) {
    $username = mysqli_real_escape_string($connection, $_POST['lgname']);
    $pass1 = mysqli_real_escape_string($connection, $_POST['lgpass']);
    $type = mysqli_real_escape_string($connection, $_POST['user']);

    $sql = "INSERT INTO login(user_name,password,type) 
    VALUES('$username','$pass1','$type')";
    $sql_run = mysqli_query($connection, $sql);

    $login_name = "SELECT * FROM registration WHERE username='$username' AND password='$pass1' LIMIT 1";
    $loginname_run = mysqli_query($connection, $login_name);

    if (mysqli_num_rows($loginname_run) > 0) {

        foreach ($loginname_run as $data) {
            $user_id = $data['user_id'];
            $user_email = $data['email'];
            $user_type = $data['user_type'];
        }

        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$user_type";
        $_SESSION['auth'] = [
            'user_id' => $user_id,
            'username' => $user_name,
            'email' => $user_email,
        ];

        if ($_SESSION['auth_role'] == "admin") {
            header('Location: home.php');
            exit(0);
        }
    } else {
        $_SESSION['message'] = "You are not allowed to access this site";
        header('Location: index.php');
        exit(0);
    }
} else {
    $_SESSION['message'] = "You are not allowed to access this site";
    header('Location: index.php');
    exit(0);
}
?>


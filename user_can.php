<?php
session_start();
$connection = mysqli_connect("localhost","root","","vijaya_theater");
?>   
<?php
        if(isset($_POST['can_btn']))
        {
            $bid=$_POST['can_id'];
            $uid=$_POST['can2_id'];
            $sid=$_POST['can3_id'];
            $_SESSION['booking']=$bid;


            $query3="DELETE From seat_reserved WHERE booking_id='$bid'";
            $query3_run=mysqli_query($connection,$query3);

            $query4="DELETE From payment WHERE booking_id='$bid'";
            $query4_run=mysqli_query($connection,$query4);

            $query5 ="DELETE From booking WHERE booking_id='$bid'";
            $query5_run=mysqli_query($connection,$query5);

            $query6="DELETE From seat_detail WHERE user_id='$uid' AND show_id='$sid'";
            $query6_run=mysqli_query($connection,$query6);

            if($query5_run)
                {
                    $_SESSION['ok']="Ticket Cancel Successfully";
                    header('Location: user.php');
                }
                else
                {
                    $_SESSION['no']="Ticket Not Cancel";
                    header('Location: user.php');
                }
        }


?>


<?php

        if(isset($_POST['logout'])){

            unset($_SESSION['login']);
            header('Location: login.php');
        }



?>

<?php
?>
<!-- message session start for alert  -->
<?php
if(isset($_SESSION['message']))
{
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
    unset($_SESSION['message']);
}
?> 

<!-- success session start -->
<?php
if(isset($_SESSION['success']))
{
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <?= $_SESSION['success']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
    unset($_SESSION['success']);
}
?>

<!-- error session start -->
<?php
if(isset($_SESSION['error']))
{

?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <?= $_SESSION['error']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <?php 
    unset($_SESSION['error']);
}
?>

<!-- home main movie button -->
<?php
            if(isset($_POST['watch-btn']))
            {
                if(empty($_SESSION['username']))
                {
                    header('Location: login.php');
                }
                else
                {
                    header('Location: main_movie.php');
                }
                
            }

//  home second movie button 
            if(isset($_POST['watch-btn2']))
            {
                if(empty($_SESSION['username']))
                {
                    header('Location: login.php');
                }
                else
                {
                    header('Location: movie2.php');
                }
                
            }
    
            

?>

<?php


// payment button
    //     if(isset($_POST['pay_btn']))
    //     {
    //         $userid=$_POST['userid'];          
    //         $name=$_POST['movie'];
    //         $show_id=$_POST['show_id'];
    //         $d=$_POST['show_date'];
    //         $count=$_POST['no_seat'];
    //         $seat1=$_POST['seat_name'];
    //         $total=$_POST['amount'];

    //          // payment variable
    //         $first_name=$_POST['fname'];
    //         $phone=$_POST['phone'];
    //         $email=$_POST['email'];
    //         $card_no=$_POST['card_no'];
    //         $ex_date=$_POST['ex_date'];
    //         $cvv=$_POST['cvv'];

    //         if($first_name ==='')
    //         {
    //             $_SESSION['message']="Username Required";
    //             $_SESSION['message_code']="error";
    //             header('Location: payment.php');
    //             exit(0);
    //         }
    //         elseif($phone==''){
    //             $_SESSION['message']="Phone Number Required";
    //             $_SESSION['message_code']="error";
    //             header('Location: payment.php');
    //             exit(0);
    //         }
    //         elseif($card_no==''){
    //             $_SESSION['message']="Card Number Required";
    //             $_SESSION['message_code']="error";
    //             header('Location: payment.php');
    //             exit(0);
    //         }
    //         elseif($email==''){
    //             $_SESSION['error']="Email Required";
    //             $_SESSION['message_code']="error";
    //             header('Location: payment.php');
    //             exit(0);
    //         }
    //         elseif($ex_date==''){
    //             $_SESSION['message']="Expiration Date Required";
    //             $_SESSION['message_code']="error";
    //             header('Location: payment.php');
    //             exit(0);
    //         }
    //         elseif($cvv==''){
    //             $_SESSION['message']="CVV Required";
    //             $_SESSION['message_code']="error";
    //             header('Location: payment.php');
    //             exit(0);
    //         }
    //         else
    //         {
    //             $query="INSERT INTO seat_detail(user_id,show_id,seat_no)
    //             VALUES ('$userid','$show_id','$seat1')";
    //             $query_run=mysqli_query($connection,$query);

    //             $ticket="SELECT id FROM seat_detail WHERE user_id='$userid' and show_id='$show_id' and seat_no='$seat1'";
    //             $ticket_run=mysqli_query($connection,$ticket);
    //             $kiru=mysqli_fetch_assoc($ticket_run);
    //             $ticketid=$kiru['id'];

    //             $query1="INSERT INTO booking(ticket_id,user_id,show_id,ticket_name,movie,no_of_seat,ticket_date_time,amount) 
    //             VALUES ('$ticketid','$userid','$show_id','$seat1','$name','$count','$d','$total')";
    //             $query1_run= mysqli_query($connection,$query1);

    //                 $b="SELECT booking_id FROM booking WHERE user_id='$userid' AND show_id='$show_id' AND ticket_name='$seat1'";
    //                 $b_run=mysqli_query($connection,$b);
    //                 $bookid=mysqli_fetch_assoc($b_run);
    //                 $bookid2=$bookid['booking_id'];
        
    //                 $query3="INSERT INTO payment(user_id,show_id,booking_id,name,email,card_no,ex_date,cvv)
    //                 VALUES ('$userid','$show_id','$bookid2','$first_name','$email','$card_no','$ex_date','$cvv')";
    //                 $query3_run=mysqli_query($connection,$query3);

    //             if($query3_run)
    //             {
    //                 $_SESSION['message']="Ticket Booked Successfuly";
    //                 header('Location: home.php');
    //                 exit(0);
    //             }
    //             else
    //             {
    //                 $_SESSION['message']="Ticket Not booked";
    //                 $_SESSION['message_code']="error";
    //                 header('Location: home.php');
    //                 exit(0); 
    //             }
    //         }

    //     }
        

    //     if(isset($_POST['pay_can_btn']))
    //     {
    //         header('Location: home.php');
    //         exit(0);
    //     }

    // ?>
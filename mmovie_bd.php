<?php
session_start();
$connection= mysqli_connect("localhost","root","","vijaya_theater");
?>
<?php

if(isset($_POST['show_btn'])){

    $m_name=$_POST['show_btn'];

    // $_SESSION['movie']=$m_name;
    $query="SELECT * FROM show_table WHERE show_date_time='$m_name'";
    $query_run=mysqli_query($connection,$query);

    if(mysqli_num_rows($query_run)> 0)
                {
                    while($row = mysqli_fetch_assoc($query_run))
                    { 
                        $show=$row['show_id'];
                        $movie=$row['movie_name'];
                        $show_date=$row['show_date_time'];
                        $price=$row['ticket_price'];

                        $_SESSION['movie']=$movie;
                        $_SESSION['show_id']=$show;
                        $_SESSION['date']=$show_date;
                        $_SESSION['price']=$price;                        
                    }
                }
    header('Location: seat.php');
}

?>

<!-- movie book button -->
<?php


if(isset($_POST['book_btn']))
{
    if($_POST['seat_no']=='')
    {
        $_SESSION['seat']="Please Select Seat";
        header('Location: seat.php');
    }
    elseif($_POST['fname']=='')
    {
        $_SESSION['seat']="Username Required";
        header('Location: seat.php');
    }
    elseif($_POST['email']=='')
    {
        $_SESSION['seat']="Email Required";
        header('Location: seat.php');
    }
    elseif($_POST['card_no']=='')
    {
        $_SESSION['seat']="Card No Required";
        header('Location: seat.php');
    }
    elseif($_POST['ex_date']=='')
    {
        $_SESSION['seat']="Expiration Date  Required";
        header('Location: seat.php');
    }
    elseif($_POST['cvv']=='')
    {
        $_SESSION['seat']="CVV Required";
        header('Location: seat.php');
    }
    else
    {
        $userid=$_POST['user'];            
        $name=$_POST['movie'];
        $show_id=$_POST['show'];
        $d=$_POST['show_date'];
        $seat=$_POST['seat_no'];
        $seat1= implode(" ",$seat);
        $count=$_POST['count'];
        $total=$_POST['total'];
        $date=$_POST['cDate'];

        // payment variable
        $first_name=$_POST['fname'];
        $email=$_POST['email'];
        $card_no=$_POST['card_no'];
        $ex_date=$_POST['ex_date'];
        $cvv=$_POST['cvv'];

        foreach($seat as $seatSelect)
        {
            $query="INSERT INTO seat_reserved (user_id,show_id,seat_name,reserved)
            VALUE('$userid','$show_id','$seatSelect','true')";
            $query_run=mysqli_query($connection,$query);
        }
        
        $query="INSERT INTO seat_detail(user_id,show_id,seat_no)
        VALUES ('$userid','$show_id','$seat1')";
        $query_run=mysqli_query($connection,$query);

        $ticket="SELECT id FROM seat_detail WHERE user_id='$userid' and show_id='$show_id' and seat_no='$seat1'";
        $ticket_run=mysqli_query($connection,$ticket);
        $kiru=mysqli_fetch_assoc($ticket_run);
        $ticketid=$kiru['id'];

        $query1="INSERT INTO booking(ticket_id,user_id,show_id,ticket_name,movie,no_of_seat,ticket_date_time,amount,booked_date) 
        VALUES ('$ticketid','$userid','$show_id','$seat1','$name','$count','$d','$total','$date')";
        $query1_run= mysqli_query($connection,$query1);

            $b="SELECT booking_id FROM booking WHERE user_id='$userid' AND show_id='$show_id' AND ticket_name='$seat1'";
            $b_run=mysqli_query($connection,$b);
            $bookid=mysqli_fetch_assoc($b_run);
            $bookid2=$bookid['booking_id'];

            $query3="INSERT INTO payment(user_id,show_id,booking_id,name,email,card_no,ex_date,cvv)
            VALUES ('$userid','$show_id','$bookid2','$first_name','$email','$card_no','$ex_date','$cvv')";
            $query3_run=mysqli_query($connection,$query3);

        if($query3_run)
        {
            $_SESSION['message']="Ticket Booked Successfuly";
            header('Location: home.php');
            exit(0);
        }
        else
        {
            $_SESSION['message']="Ticket Not booked";
            $_SESSION['message_code']="error";
            header('Location: home.php');
            exit(0); 
        }
    }

}

?>
<?php
if(isset($_POST['can_btn']))
{
    header('Location: home.php');
    exit(0);
}
?>

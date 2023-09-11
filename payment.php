<?php
session_start();
$connection= mysqli_connect("localhost","root","","vijaya_theater");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vijaya theater</title>
    <link rel="stylesheet" href="css/paymentp.css">
    <link rel="stylesheet" href="css/nav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!--link boxicon css-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header class="hero">
        <nav>
            <div class="logo">Vijaya <span>theatre</span></div>
            <div class="hum">
                <div class="line"></div>
            </div>
            <ul class="nbar">
                <li><a href="home.php">HOME</a></li>
                <li><a href="payment.php" class="active">PAYMENT</a></li>
            </ul>
            <img src="image/user.png" alt="user" class="user-img" onclick="toggleMenu()">

            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="image/user.png" alt="user" class="user-img2">
                        <h2><?php echo($_SESSION['username']);?></h2>
                    </div>
                    <hr>
                    <a href="user.php" class="sub-menu-link">
                        <p>Booking Details</p>
                        <span>></span>
                    </a>
                    <a href="" class="sub-menu-link">
                        <p>Setting</p>
                        <span>></span>
                    </a>
                    <a class="sub-menu-link2">
                        <form class="lgspan" action="user_can.php" method="POST">
                                <button class="sub-menu-b" name="logout">
                                <p>Logout</p>
                                    <span>></span>
                                </button>
                        </form>
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <?php
        
        $user= $_SESSION['userid'];
        $movie=$_SESSION['movie'];
        $show_td=$_SESSION['show_dtime'];
        $show_id=$_SESSION['showid'];
        $no_seat=$_SESSION['no_seat'];
        $seat_name=$_SESSION['seat_name'];
        $amount=$_SESSION['amount'];
    ?>
<label class="me"><?php include('book_s.php');?></label>
<div class="row1">
        <div class="left">
            <form action="message.php" method="POST" class="payment">
                    
                    <input type="hidden" name="userid"value="<?php echo $user?>">
                    <input type="hidden" name="movie" value="<?php echo $movie?>">
                    <input type="hidden" name="show_id" value="<?php echo $show_id?>">
                    <input type="hidden" name="show_date" value="<?php echo $show_td?>">
                    <input type="hidden" name="no_seat" value="<?php echo $no_seat?>">
                    <input type="text" name="seat_name" value="<?php echo $seat_name?>">
                    <input type="hidden" name="amount" value="<?php echo $amount?>">

                    <div class="payline1">
                        <div class="firstname">
                            <input type="text" name="fname" placeholder="Card Holder">
                        </div>
                        <div class="email">
                            <input type="number" class="phone" name="phone" placeholder="Phone Number" >
                        </div>
                    </div>
                    <div class="card1">
                        <input type="number" class="card_no" name="card_no" placeholder="Card Number" >
                        <input type="email" name="email" class="email1" placeholder="Email Address" >
                    </div>
                    <div class="payline2">
                        <div class="phone-nu">
                            <label>Expiration Date</label>
                            <input type="date" name="ex_date" placeholder="Expiration Date" >
                        </div>
                        <div class="cvv">
                            <input type="number" name="cvv" placeholder="CVV" >
                        </div>
                    </div>

                    <div class="movie-btn">
                        <div class="ok-btn">
                                <button type="submit" class="pay-btn" name="pay_btn">
                                    Pay                                        
                                </button>
                        </div>
                        <div class="cal-btn">
                                <button type="submit" name="pay_can_btn" class="pay-cancel-btn">
                                    Cancel
                                </button>
                        </div>
                    </div>
            </form>
        </div>

        <div class="right">
            <h1>Make Your Payment</h1>
            <label class="label">Enjoy Your Movie</label>
            <h2>You can use any card</h2>
            <!-- <p>Click <label class="B"> </label><span></span></p>         -->
            
        </div>
</div>


    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }
    </script>
        <!-- sweetalert -->
        <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                <?php
                        if(isset($_SESSION['message']) && $_SESSION['message'] !='')
                        {
                    ?>
                            <script>
                                swal({
                                        title: "$_SESSION['message']?>", -->
                                        <!-- // text: "You clicked the button!",
                                        icon: "<?php echo $_SESSION['message_code']?>",
                                        button: "OK",
                                    });
                            </script>
                    <?php
                            unset($_SESSION['message']);
                        }

                    ?>
            </script> -->

<!-- Custom styles for this template -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>
<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "vijaya_theater");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Ticket</title>
    <!--link css-->

    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/seatPay1122.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
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
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="seat.php" class="active">SEAT</a></li>
            </ul>
            <img src="image/user.png" alt="user" class="user-img" onclick="toggleMenu()">

            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="image/user.png" alt="user" class="user-img2">
                        <h2><?php echo ($_SESSION['username']); ?></h2>
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

    $movie = $_SESSION['movie'];
    $show_id = $_SESSION['show_id'];
    $date = $_SESSION['date'];
    $price = $_SESSION['price'];
    ?>

    <form name="form" action="mmovie_bd.php" method="POST">
        <section>
            <div class="row1">
                <div class="left">
                    <div class="text-container">
                        <h1>Pick Your Ticket</h1>
                        <h2>Make Your Payment Below</h2>
                        <label class="label">Enjoy Your Movie</label>
                        <h2>Ticket Price is <label class="c"> <?php echo $price ?></label></h2>
                    </div>
                </div>

                <div class="right">

                    <input type="hidden" name="movie" value="<?php echo $movie ?>">
                    <input type="hidden" name="show" value="<?php echo $show_id ?>">
                    <input type="hidden" name="show_date" value="<?php echo $date ?>">
                    <input type="hidden" id="price" name="price" value="<?php echo $price ?>">

                    <div class="me">
                        <?php include('book_s.php'); ?>
                    </div>
                    <div class="seat_container">
                        <div class="seat_select">
                            <div class="a"></div>
                            <label>Not Selected</label>
                            <div class="a2"></div>
                            <label>Selected</label>
                        </div>
                        <div class="screen"></div>
                        <div class="seat_form">

                            <?php
                            $sql = "SELECT * FROM seat_reserved WHERE show_id='$show_id'";
                            $sql_run = mysqli_query($connection, $sql);
                            $selectSeat = array();
                            if (mysqli_num_rows($sql_run) > 0) {
                                while ($row = mysqli_fetch_assoc($sql_run)) {
                                    $selectSeat = $row['seat_name'];

                            ?>
                                    <input type="hidden" name="selectSeat" class="selectSeat" id="selectSeat" value="<?php echo $selectSeat ?>">
                                <?php
                                }
                            }

                            for ($i = 1; $i <= 5; $i++) {
                                ?>
                                <div class="seat_line">
                                    <?php
                                    for ($j = 1; $j <= 10; $j++) {
                                        echo ' <input type="checkbox" id="cseat" class="seat"name="seat_no[]" value="R', $i, 'S', $j, '" onclick="countseat()">';
                                    }
                                    ?>
                                </div>

                            <?php
                            }
                            ?>
                            <script>
                                let bookedSeat = document.getElementsByName('selectSeat');
                                let selectSeat = document.getElementsByName('seat_no[]');
                                let booked = [];
                                let seat = [];
                                for (let i = 0; i < bookedSeat.length; i++) {
                                    booked.push(bookedSeat[i].value);
                                }
                                for (let i = 0; i < selectSeat.length; i++) {
                                    seat.push(selectSeat[i].value);
                                }
                                // console.log(seat[1]);
                                // console.log(booked);
                                // console.log(seat);

                                for (let a = 0; a < booked.length; a++) {
                                    for (let x = 0; x < seat.length; x++) {
                                        if (booked[a] === seat[x]) {
                                            let x = booked[a];
                                            let k1 = document.querySelector('input[type=checkbox][value="' + x + '"]');
                                            // let k2= document.querySelector('input[type=checkbox][value=R1S2]');
                                            // console.log(k1.value);
                                            k1.disabled = true;
                                        }
                                    }
                                }
                            </script>
                            <div class="total_count2">
                                <div class="ki">
                                    <label class="se">Number of Seat:</label><label class="p" id="count"> </label>
                                </div>
                                <div class="ki">
                                    <label class="se">Total Amount: </label><label class="p" id="total"> </label>
                                </div>
                            </div>
                            <input type="hidden" class="set" name="count" id="count2">
                            <input type="hidden" class="set" name="total" id="total2">
                            <div>
                                <?php
                                $username = $_SESSION['username'];
                                $user = "SELECT user_id FROM registration WHERE username='$username'";
                                $user_run = mysqli_query($connection, $user);
                                $row = mysqli_fetch_assoc($user_run);
                                $userid = $row['user_id'];
                                ?>
                                <input type="hidden" class="set" name="user" id="user" value="<?php echo $userid ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="payment">
            <div class="center">
                <div class="payline1">
                    <div class="firstname">
                        <input type="text" name="fname" placeholder="Card Holder">
                    </div>
                    <div class="email">
                        <input type="email" name="email" class="email1" placeholder="Email Address">
                    </div>
                </div>
                <div class="card1">
                    <input type="number" class="card_no" name="card_no" placeholder="Card Number">
                </div>
                <div class="payline2">
                    <div class="phone-nu">
                        <label>Expiration Date</label>
                        <input type="date" name="ex_date" placeholder="Expiration Date">
                    </div>
                    <div class="cvv">
                        <input type="number" name="cvv" placeholder="CVV">
                    </div>
                    <input type="hidden" name="cDate" id="cdate" >
                </div>
                <button type="submit" class="cancle_movie" name="can_btn">CANCEL</button>
                <button type="submit" class="book-movie" name="book_btn">BOOK NOW</button>
            </div>
        </section>

    </form>



    <!-- script for seat count and price -->
    <script>
        let d= new Date();
        let y = d.getFullYear();
        let m = d.getMonth()+1;
            if(m<10){
                m='0'+m;
            }
            let date=d.getDate();
            if(date<10){
                date='0'+date;
            }
            let FullDate=y+'-'+m+'-'+date;
            document.getElementById('cdate').value=FullDate;
        function countseat() {
            let a = document.forms["form"];
            let x = a.querySelectorAll('input[type="checkbox"]:checked');

            var z = (x.length);
            document.getElementById('count').textContent = z;
            document.getElementById('count2').value = z;

            let t = document.getElementById('count2').value;
            let p = document.getElementById('price').value;
            let total = t * p;
            document.getElementById('total').textContent = total;
            document.getElementById('total2').value = total;
        }
    </script>

    <!-- script for user dropdown Details -->
    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }
    </script>


    <!-- Custom styles for this template -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>
<?php
session_start();
$connection = mysqli_connect("localhost","root","","vijaya_theater");
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>user</title>
        <!--link css-->
        <link rel="stylesheet" href="css/nav.css">
        <link rel="stylesheet" href="css/user1.css">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- css for icon-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
                    <li><a href="main_movie.php">MOVIE</a></li>
                </ul>
                <img src="image/user.png" alt="user" class="user-img" onclick="toggleMenu()">

                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            <img src="image/user.png" alt="user" class="user-img2">
                            <h2>
                                <?php echo($_SESSION['username']);?>
                            </h2>
                        </div>
                        <hr>
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

        <div class="user_detail">
            <?php
            $name=$_SESSION['username'];
            $query = "SELECT * FROM registration WHERE username='$name'";
            $query_run= mysqli_query($connection,$query);
            if($row = mysqli_fetch_assoc($query_run))
    {
                $id=$row['user_id'];
                $name= $row['username'];
                $email= $row['email'];  
                $pass= $row['password'];          
        ?>
                <h1>User Name: <label><?php echo $name?></label></h1>
                <h1>Email: <label ><?php echo $email?></label></h1>
                <h1>Password: <label ><?php echo $pass?></label></h1>
        </div>

        <?php
            if(isset($_SESSION['ok']))
            {
                echo '<h2>'.$_SESSION['ok'].'</h2>';
                unset($_SESSION['ok']);
            }
            if(isset($_SESSION['no']))
            {
                echo '<h2>'.$_SESSION['no'].'</h2>';
                unset($_SESSION['no']);
            }
        
        ?>


        <div class="user_table">
            <?php
            $query2= "SELECT * FROM Booking WHERE user_id='$id'" ;
            $query2_run=mysqli_query($connection,$query2);
            
        ?>
                <table class="table" boder="1">
                    <thead>
                        <tr>
                        <th scope="col">booking ID</th>
                            <th scope="col">Movie</th>
                            <th scope="col">Show</th>
                            <th scope="col">Total Seat</th>
                            <th scope="col">Seat Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Ticket</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($query2_run)>0)
                        {
                            while($row2 = mysqli_fetch_assoc($query2_run))
                            {
                                $id=$row2['booking_id'];
                                $uid=$row2['user_id'];
                                $sid=$row2['show_id'];
                                $mname=$row2['movie'];
                                $tdt=$row2['ticket_date_time'];
                                $tname=$row2['ticket_name'];
                                $nos=$row2['no_of_seat'];
                                $am=$row2['amount'];
                                                    
                        ?>
                        <tr>
                            <td><?php echo $id?></td>
                            <td><?php echo $mname?></td>
                            <td><?php echo $tdt?></td>
                            <td><?php echo $nos?></td>
                            <td><?php echo $tname?></td>
                            <td><?php echo $am?></td>
                            <td>
                                <?php
                                

                                ?>
                                <form action="pdf.php" method="POST">
                                    <input type="hidden" name="uname" value="<?php echo $name?>">
                                    <input type="hidden" name="email" value="<?php echo $email?>">
                                    <input type="hidden" name="mname" value="<?php echo $mname?>">
                                    <input type="hidden" name="tdt" value="<?php echo $tdt?>">
                                    <input type="hidden" name="tname" value="<?php echo $tname?>">
                                    <input type="hidden" name="nos" value="<?php echo $nos?>">
                                    <input type="hidden" name="am" value="<?php echo $am?>">
                                    <input type="hidden" name="bid" value="<?php echo $id?>">
                                    <input type="hidden" name="uid" value="<?php echo $uid?>">
                                    <input type="hidden" name="sid" value="<?php echo $sid?>">
                                    <button type="submit" name="pdf_btn" class="pdf_btn">View Ticket</button>
                                </form>

                            </td>
                            <td>
                                <form action="user_can.php" method="POST">
                                    <input type="hidden" name="can_id" value="<?php echo $id?>">
                                    <input type="hidden" name="can2_id" value="<?php echo $uid?>">
                                    <input type="hidden" name="can3_id" value="<?php echo $sid?>">
                                    <button type="submit" name="can_btn" class="can_btn">Cancel</button>
                                </form>

                            </td>
                        </tr>
                        <?php
                            }
                        }
                        else
                        {
                            echo "No Record Found";
                        }
                        ?>

                    </tbody>
                </table>
        </div>
        <?php
    }
    ?>



                <script>
                    let subMenu = document.getElementById("subMenu");

                    function toggleMenu() {
                        subMenu.classList.toggle("open-menu");
                    }
                </script>



    </body>

    </html>
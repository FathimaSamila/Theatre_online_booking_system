<?php
session_start();
?>
<!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>vijaya theater Admin - Register</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!--link boxicon css-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <!-- Custom styles for this template-->
        <link rel="stylesheet" href="css/register3.css">
        <link rel="stylesheet" href="css/nav.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    </head>

    <body background="image/lg3.avif">
    <header class="hero">
        <nav>
            <div class="logo">Vijaya <span>theatre</span></div>
            <div class="hum">
                <div class="line"></div>
            </div>
            <ul class="nbar">
                <li><a href="home.php" >HOME</a></li>
                <li><a href="login.php" class="active">REGISTER</a></li>
                <li><a href="main_movie.php">MOVIE</a></li>
            </ul>
        </nav>
    </header>
    <div class="me"><?php include('error.php');?></div>
        <div class="register_container">
            <div class="register_form">
                <div class="rhead">
                    <h1>Create Account </h1>
                </div>
                <div class="regi_form">
                    <form action="registerbd.php" method="POST" class="user">
                        <div class="mail">
                            <input type="text" name="username" id="username" class="username" placeholder="Username" required>
                            <div id="error" class="error"></div>
                            <input type="email" name="email" id="email" class="email" placeholder="Email Address" required>
                            <div id="error" class="error"></div>
                        </div>
                        <div class="pass">
                            <div class="password1">
                                <input type="password" name="pass1" id="pass1" class="pass1" placeholder="Password" required>
                                <div id="error" class="error"></div>
                            </div>
                            <div class="password2">
                                <input type="password" name="pass2" id="pass2" class="pass2" placeholder="Repeat Password" required>
                                <div  id="error"class="error"></div>
                            </div>
                            <input type="hidden" name="admin" class="i4" value="user">
                            <input type="hidden" name="cDate" id="cdate">
                            <div id="error" class="error"></div>
                        </div>
                        <button type="submit" class="reg-btn" name="regbtn">
                                    Register Account
                                </button>
                    </form>
                    <div class="text-center2">
                        <a class="small" href="login.php">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- sweetalert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                let d = new Date();
        let y = d.getFullYear();
        let m = d.getMonth() + 1;
        if (m < 10) {
            m = '0' + m;
        }
        let date = d.getDate();
        if (date < 10) {
            date = '0' + date;
        }
        let FullDate = y + '-' + m + '-' + date;
        document.getElementById('cdate').value = FullDate;
            </script>




        <!-- Custom styles for this template-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    </body>

    </html>
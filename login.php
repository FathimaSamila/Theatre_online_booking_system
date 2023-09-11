<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>vijaya theatre Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="css/login13.css">
    <link rel="stylesheet" href="css/nav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body background="image/lg2.webp">

    <header class="hero">
        <nav>
            <div class="logo">Vijaya <span>theatre</span></div>
            <div class="hum">
                <div class="line"></div>
            </div>
            <ul class="nbar">
                <li><a href="home.php">HOME</a></li>
                <li><a href="login.php" class="active">LOGIN</a></li>
            </ul>
        </nav>
    </header>
    <!-- <div class="me">
                <?php include('message.php'); ?>
        </div> -->
    <div class="login_container">
        <div class="login-form">
            <div class="lhead">
                <h1>Welcome</h1>
            </div>
            <div href="" class="user">
                <img src="image/user.png" alt="user" class="luser-img">
            </div>
            <form action="registerbd.php" method="POST" class="login" name="login">
                <input type="text" name="lgname" class="usename" placeholder="Username" required>
                <input type="password" name="lgpass" class="password" placeholder="Password" required>
                <input type="hidden" name="user" value="user">
                <div class="text-center">
                    <a class="small" href="reset_password.php">Forgot Password?</a>
                </div>
                <button type="submit" name="loginbtn" id="loginbtn" onclick="show()">
                    LOGIN
                </button>
                <a href="register.php" class="cr">
                    Create an account?
                </a>

            </form>

        </div>
    </div>
    <!-- sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        <?php
        if (isset($_SESSION['message']) && $_SESSION['message'] != '') {
        ?>
                <
                script >
                swal({
                    title: "$_SESSION['message']?>",
                    // text: "You clicked the button!",
                    icon: "<?php echo $_SESSION['message_code'] ?>",
                    button: "OK",
                });
    </script>
<?php
            unset($_SESSION['message']);
        }

?>
</script>

<!-- Custom styles for this template -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>


</body>

</html>
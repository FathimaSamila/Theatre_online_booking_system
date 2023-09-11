
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>vijaya theatre admin Login</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link rel="stylesheet" href="css/index1.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    </head>

    <body class="body-login">

        <div class="me">
                <?php include('userbd.php'); ?>
        </div>

        <div class="login_container">
            <div class="login-form">
                <div class="lhead">
                    <h1>ADMIN PANAL</h1>
                </div>
                <div href="" class="user">
                    <img src="img/user2.png" alt="user" class="luser-img">
                </div>
                <form action="bookingbd.php" method="POST" class="login" name="login">
                    <input type="text" name="lgname" class="usename" placeholder="Username" required>
                    <input type="password" name="lgpass" class="password" placeholder="Password" required>
                    <input type="hidden" name="user" value="admin">
                    <button type="submit" name="loginbtn" id="loginbtn" onclick="show()">
                LOGIN
                </button>

                </form>

            </div>
        </div>

    
        <script src="js/kiru.js"></script>



    </body>

    </html>
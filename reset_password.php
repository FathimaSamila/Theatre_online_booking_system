<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/reset_password.css">
</head>

<body>

    <header class="reset-password">
        <div class="password">
            <h1>Password Recovery</h1>
            <form action="#" class="reset">
                <label for="">Enter your email id</label>
                <input type="email" placeholder="Email address">
                <label for=""> Enter old password</label>
                <input type="password" placeholder=" Old Password">
                <label for=""> Enter new password</label>
                <input type="password" placeholder=" New Password">
            </form>
            <div class="return">
                <a class="rtl" href="login.php">Return to login</a>
                <a href="login.php" class="email-sent">
                    <button class="reset-btn">Reset Password</button>
                </a>

            </div>
        </div>

    </header>
</body>

</html>
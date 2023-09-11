<?php
session_start();
$connection= mysqli_connect("localhost","root","","vijaya_theater");
?>


<?php

if(isset($_POST['regbtn']))
{
    $username= mysqli_real_escape_string($connection,$_POST['username']);
    $email= mysqli_real_escape_string($connection,$_POST['email']);
    $pass1= mysqli_real_escape_string($connection,$_POST['pass1']);
    $pass2= mysqli_real_escape_string($connection,$_POST['pass2']);
    $type= mysqli_real_escape_string($connection,$_POST['admin']);
    $cDate= mysqli_real_escape_string($connection,$_POST['cDate']);

        if($pass1==$pass2)
        {
                    
            $checkemail= "SELECT email FROM registration WHERE email='$email'";
            $checkemail_run= mysqli_query($connection,$checkemail);
            $checkname= "SELECT username FROM registration WHERE username='$username'";
            $checkname_run= mysqli_query($connection,$checkname);

            if(mysqli_num_rows($checkemail_run) > 0)
            {
                $_SESSION['Rgerror']="Already Email Exits";
                header('Location: register.php');
                exit(0);
            }
            else
            {
                if(mysqli_num_rows($checkname_run) > 0)
                {
                    $_SESSION['Rgerror']="Already Username Exits";
                    header('Location: register.php');
                    exit(0);
                }
                else
                {
                    $query = "INSERT INTO registration (username,email,password,user_type,add_date)
                    VALUES ('$username','$email','$pass1','$type','$cDate') ";
                    $query_run=mysqli_query($connection,$query);

                    if($query_run)
                    {
                        $_SESSION['message']="Register Successfully";
                        header('Location: login.php');
                        exit(0);
                    }
                    else
                    {
                        $_SESSION['Rgerror']="Something went wrong";
                        header('Location: register.php');
                        exit(0);
                    }
                }
            }
        }

        else
        {
            $_SESSION['Rgerror']="Password and Confirm Password Not Match";
            header('Location: register.php');
            exit(0);
        }
}


?>

    
<?php

if(isset($_POST['loginbtn']))
{
    $username=mysqli_real_escape_string($connection,$_POST['lgname']);
    $pass1=mysqli_real_escape_string($connection,$_POST['lgpass']);
    $type=mysqli_real_escape_string($connection,$_POST['user']);

    $sql= "INSERT INTO login(user_name,password,type) 
    VALUES('$username','$pass1','$type')";
    $sql_run=mysqli_query($connection,$sql);

    $login_name="SELECT * FROM registration WHERE username='$username' AND password='$pass1' LIMIT 1";
    $loginname_run= mysqli_query($connection,$login_name);


    if(mysqli_num_rows($loginname_run) > 0)
    {
        
        foreach($loginname_run as $data){
            $user_id = $data['user_id'];
            $user_email = $data['email'];
            $user_type = $data['user_type'];
        }

            $_SESSION['auth'] = true;
            $_SESSION['auth_role'] = "$user_type";
            $_SESSION['auth'] = [
            'user_id' => $user_id,
            'username' => $user_name,
            'email' => $user_email,
        ];

        if($_SESSION['auth_role'] =="admin")
        {
            header('Location: admin/home.php');
            exit(0);
        }
        elseif($_SESSION['auth_role'] =="user")
        {
            $_SESSION['login']="yes";
            $_SESSION['username']=$username;
            $_SESSION['message']="Login Successfully";
            header('Location: home.php');
            exit(0);
        }

        
    }
    else
    {
        $_SESSION['message']="Invalid Data";
        header('Location: login.php');
        exit(0);
    }

    
}
else
{
    $_SESSION['message']="You are not allowed to access this site";
    header('Location: login.php');
    exit(0);
}

?>
<?php
session_start();
$connection= mysqli_connect("localhost","root","","vijaya_theater");
if(isset($_POST['adminadd']))
{
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['confirmpassword'];
    $type=$_POST['admin'];

    if($password === $cpassword)
    {
        $sql="SELECT username FROM registration WHERE username='$username'";
        $sql_run=mysqli_query($connection,$sql);
        $sql2="SELECT email FROM registration WHERE  email='$email'";
        $sql2_run=mysqli_query($connection,$sql2);

        if(mysqli_num_rows($sql_run)>0)
        {
            $_SESSION['status']="Already username Exits";
            header('Location: user.php');
            exit(0);
        }
        else
        {
            if(mysqli_num_rows($sql2_run)>0)
            {
                $_SESSION['status']="Already Email Exits";
                header('Location: user.php');
                exit(0);
            }
            else
            {
                $query = "INSERT INTO registration (username,email,password,user_type) VALUES ('$username','$email','$password','$type') ";
                $query_run=mysqli_query($connection,$query);
            }
            
                if($query_run)
                {
                    $_SESSION['status']="Admin Profile Added";
                    header('Location: user.php');
                }
                else
                {
                    $_SESSION['status']="Admin Profile Not Added";
                    header('Location: user.php');
                } 
        }
        
    
    }
    else
    {
            $_SESSION['status']="Password and Confirm Password Not Match";
            header('Location: user.php');
    }
}

// data update

if(isset($_POST['updatebtn']))
{
    $id= $_POST['edit_id'];
    $usermame=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query= "UPDATE registration SET username='$usermame',email='$email',password='$password' WHERE user_id='$id' ";
    $query_run= mysqli_query($connection,$query);

    if($query_run)
    {
        $_SESSION['status']="Your data is updated";
            header('Location: user.php');
    }
    else
    {
        $_SESSION['status']="Your data is not updated";
            header('Location: user.php');
    }
}

// data delete

if(isset($_POST['addelete-btn']))
{
    $id= $_POST['delete_id'];

    $query= "DELETE FROM registration WHERE user_id='$id'";
    $query_run= mysqli_query($connection,$query);

    if($query_run)
    {
        $_SESSION['status']="Your data is deleted";
            header('Location: user.php');
    }
    else
    {
        $_SESSION['status']="Your data is not deleted";
        header('Location: user.php');
    }

}
if(isset($_POST['canbtn']))
{
    header('Location: user.php');
}

?>






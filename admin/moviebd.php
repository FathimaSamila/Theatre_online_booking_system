<?php
session_start();
$connection= mysqli_connect("localhost","root","","vijaya_theater");

if(isset($_POST['movieadd']))
{

    $name= $_POST['name'];
    $cate= $_POST['categorie'];
    $gender= $_POST['gender'];
    $dir= $_POST['dir'];
    $lang= $_POST['lang'];
    $run= $_POST['run'];
    $rele= $_POST['rele'];
    $img= $_POST['img'];
    $tra= $_POST['tra'];

    $query = "INSERT INTO movie (movie_name,categorie,gender,director,language,runtime,release_date,image,video_url) 
    VALUES ('$name','$cate','$gender','$dir','$lang','$run','$rele','$img','$tra') ";
        $query_run=mysqli_query($connection,$query);
    
        if($query_run)
        {
            $_SESSION['success']="Movie Added";
            $_SESSION['success_code']="success";
            header('Location: movie-admin.php');
        }
        else
        {
            $_SESSION['success']="Movie Not Added";
            $_SESSION['success_code']="error";
            header('Location: movie-admin.php');
        }

}

// data delete

if(isset($_POST['addelete-btn']))
{
    $id= $_POST['delete_id'];

    $query= "DELETE FROM movie WHERE movie_id='$id'";
    $query_run= mysqli_query($connection,$query);

    if($query_run)
    {
        $_SESSION['success']="Your data is deleted";
        $_SESSION['success_code']="success";
        header('Location: movie-admin.php');
    }
    else
    {
        $_SESSION['success']="Your data is not deleted";
        $_SESSION['success_code']="error";
        header('Location: movie-admin.php');
    }

}

// data update

if(isset($_POST['updatebtn']))
{
    $id= $_POST['edit_id'];
    $cate= $_POST['categorie'];
    $name= $_POST['name'];
    $gender= $_POST['gender'];
    $dir= $_POST['dir'];
    $lang= $_POST['lang'];
    $run= $_POST['run'];
    $rele= $_POST['rele'];
    $img= $_POST['img'];
    $tra= $_POST['tra'];

    $query= "UPDATE movie SET categorie='$cate',movie_name='$name',gender='$gender', director='$dir',language='$lang',runtime='$run',release_date='$rele',image='$img',video_url='$tra'
    WHERE movie_id='$id' ";
    $query_run= mysqli_query($connection,$query);

    if($query_run)
    {
        $_SESSION['success']="Your data is updated";
        $_SESSION['success_code']="success";
        header('Location: movie-admin.php');
    }
    else
    {
        $_SESSION['success']="Your data is not updated";
        $_SESSION['success_code']="error";
            header('Location: movie-admin.php');
    }
}
if(isset($_POST['canbtn']))
{
    header('Location: movie-admin.php');
}

?>

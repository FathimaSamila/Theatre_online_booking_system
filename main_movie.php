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
    <title>Show Time</title>
    <!--link css-->

    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/movie11.css">
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
                <li><a href="main_movie.php" class="active">MOVIE</a></li>
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

    <section class="main-movie-image" id="im">
        <?php


            $query = "SELECT * FROM movie WHERE categorie ='Main movie'";
            $query_run = mysqli_query($connection,$query);
        
            if($row = mysqli_fetch_assoc($query_run))
            {
    
            $movie_title= $row['movie_name'];
            $movie_image= $row['image'];
            $movie_gender= $row['gender'];
            $movie_dir= $row['director'];
            $movie_lan= $row['language'];
            $movie_rt= $row['runtime'];
            $movie_rd= $row['release_date'];
            $movie_trailer= $row['video_url'];

            $query2 = "SELECT * FROM show_table WHERE categorie ='Main movie' AND movie_name='$movie_title'";
            $query2_run = mysqli_query($connection,$query2);

            $row2 = mysqli_fetch_assoc($query2_run);
            $image=$row2['cover_image'];

            $_SESSION['movie_name']=$movie_title;

        ?>

            <img src="image/<?php echo $image?>" alt="photo" class="mmovie-image" id="mmimg">
            <div class="main-movie-text">
                <p>Now Showing</p>
                <a href="<?php echo $movie_trailer?>" class="watch-btn" id="mmtri">
                    <i class='bx bx-play-circle'></i>
                    <span>Watch trailer</span>
                </a>
            </div>
    </section>
    <!--movie detail-->
    <div class="about-movie">
        <div class="about">
            <h1 class="about-movie-title">
                <a id="mmname">
                    <?php echo $movie_title?>
                </a>
            </h1>
            <h2 class="about-movie-gender">
                <a id="mmgender">
                    <?php echo $movie_gender?>
                </a>
            </h2>
            <h2 class="movie-dir">
                <span>Director: </span>
                <a id="mmdir">
                    <?php echo $movie_dir?>
                </a>
            </h2>
            <h2 class="movie-lan">
                <span>Languages: </span>
                <a id="mmlang">
                    <?php echo $movie_lan?>
                </a>
            </h2>
            <h2 class="movie-lan">
                <span>Release Date: </span>
                <a id="mmlang">
                    <?php echo $movie_rd?>
                </a>
            </h2>
            <h2 class="movie-runt">
                <span>Run time: </span>
                <a id="mmrun">
                    <?php echo $movie_rt?>
                </a>
            </h2>
        </div>
    </div>
            <h1 class="show-txt">Select Show <span>Time</span></h1>
    <section class="movie-booking">  
        <form name="form" action="mmovie_bd.php" method="POST">
            <?php
                $name=$movie_title;
                $query = "SELECT * FROM show_table WHERE categorie ='Main movie' AND movie_name='$name'";
                $query_run = mysqli_query($connection,$query);
                
                if(mysqli_num_rows($query_run)> 0)
                {
                ?>
                
                    <div class="selectDate">
                <?php
                    while($row = mysqli_fetch_assoc($query_run))
                    { 
                        $id=$row['movie_id'];
                        $name=$row['movie_name'];
                        $date= $row['show_date_time'];
                        $show_id=$row['show_id'];
                        $price=$row['ticket_price'];
                        $image=$row['cover_image'];
            ?>
                            
                                <input name="mname" type="hidden" value="<?php echo $name?>">
                                <input name="date" type="hidden" value="<?php echo $date?>">
                                <input name="id" type="hidden" value="<?php echo $show_id?>">
                                <input name="price" type="hidden" value="<?php echo $price?>">
                                <button type="submit" name="show_btn" class="show_btn" value="<?php echo $date?>"><?php echo $date?></button>
                    <?php
                    }
                }
            }
                    ?>
                    </div>
        </form>
    </section>

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

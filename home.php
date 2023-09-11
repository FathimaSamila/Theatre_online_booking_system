
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vijaya theatre</title>
        <link rel="stylesheet" href="css/homemx.css">
        <link rel="stylesheet" href="css/nav.css">

        <!--link boxicon css-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <!--link swiper css-->
        <link rel="stylesheet" href="css/swiper-bundle.min.css">
    </head>

    <body>
        <header class="hero">
        
            <nav>
                <div class="logo">Vijaya <span>theatre</span></div>
                <div class="hum">
                    <div class="line"></div>
                </div>
                <?php include('lg.php'); ?>
            </nav>
        </header>
        <div class="me">
        <?php include('message.php'); ?>
        </div>
        <!--home image add-->
        <section class="home_image" id="im">
            <?php
            $connection= mysqli_connect("localhost","root","","vijaya_theater");
            $quary = "SELECT * FROM movie WHERE categorie ='Main movie'";
            $quary_run = mysqli_query($connection,$quary);

            if($row = mysqli_fetch_assoc($quary_run))
            {
                
                $movie_title= $row['movie_name'];
                $movie_image= $row['image'];
            ?>

                <img src="image/<?php echo $movie_image?>" alt="photo" class="first-image">
                <div class="homei-text">
                    <h1 class="homei-title" >
                        <?php echo $movie_title?>
                    </h1>
                    <p>Now Showing</p>
                    <form action="message.php" method="POST">
                        <button type="submit" name="watch-btn" class="watch-btn2" id="watch-btn">Book ticket</button>
                    </form>
                </div>
                <?php 
            }
        ?>
        </section>

        <!--end of home image -->
        <!-- seond movie-->
        <section class="now-show" id="movie1">
            <div class="heading-pu">
                <h1 class="ns-title">Second Movie</h1>
            </div>
            <!--movie list-->
            <div class="movie-content">
                <?php

                $quary = "SELECT * FROM movie WHERE categorie ='Second movie'";
                $quary_run = mysqli_query($connection,$quary);
                
                if($row=mysqli_fetch_assoc($quary_run))
                {
                    
                    $movie_title= $row['movie_name'];
                    $movie_image= $row['image'];
                    $movie_gender= $row['gender'];
                    $movie_trailer= $row['video_url'];
                ?>

                    <!--movie box 1-->
                    <form action="message.php" method="POST">
                        <div class="movie-box" id="movie-box-m2">
                            <img src="image/<?php echo $movie_image?>" alt="photo" class="movieim">
                            <div class="movie-text">
                                <h2 class="movie-title">
                                    <?php echo $movie_title?>
                                </h2>
                                <p>Now Showing</p>
                                <button type="submit" name="watch-btn2" class="watch-btn2" id="watch-btn">Book ticket</button>
                            </div>
                        </div>
                    </form>
                    
                <?php
                }
                ?>
            </div>
            

        </section>


        <!--upcoming movie list-->
        <selection class="upcoming-show" id="movie2">
            <!--moive heading-->
            <div class="heading-up">
                <h1 class="up-title">Upcoming Movies</h1>
                <!--swiper btn-->
                <div class="swiper-btn">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>

            <!--movies-->
            <div class="upcoming-movie swiper">
                <div class="swiper-wrapper">

                    <?php

                    $quary = "SELECT * FROM movie WHERE categorie ='Up coming movie'";
                    $quary_run = mysqli_query($connection,$quary);
                
                    while($row=mysqli_fetch_assoc($quary_run))
                    {
                    
                        $movie_title= $row['movie_name'];
                        $movie_image= $row['image'];
                        $movie_gender= $row['gender'];
                        $movie_trailer= $row['video_url'];
                ?>
                        <!--movie -->
                        <div class="swiper-slide">
                            <div class="movie-box2" id="movie-box2-m1">
                                <img src="image/<?php echo $movie_image?>" alt="photo" class="movieim2">
                                <div class="movie-text2">
                                    <h2 class="movie-title2">
                                        <?php echo $movie_title?>
                                    </h2>
                                    <span class="movie-type2"><?php echo $movie_gender?></span>
                                    <a href="<?php echo $movie_trailer?>" class="watch-btn play-btn">
                                        <i class='bx bx-play-circle'></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <?php
                }
                ?>

                </div>
            </div>
        </selection>
        <!--upcoming movie end-->
        <!--populer movie start-->
        <section class="populer-movie" id="movie3">
            <!-- populer heading-->
            <div class="heading-pu">
                <h1 class="ns-title">Populer movies</h1>
                <div class="swiper-btn">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <!--movie list-->
            <!--movies-->
            <div class="upcoming-movie swiper">
                <div class="swiper-wrapper">

                <!--movie -->
                <?php

                $quary = "SELECT * FROM movie WHERE categorie ='Populer movie'";
                $quary_run = mysqli_query($connection,$quary);

                    while($row=mysqli_fetch_assoc($quary_run))
                        {

                            $movie_title= $row['movie_name'];
                            $movie_image= $row['image'];
                            $movie_gender= $row['gender'];
                            $movie_trailer= $row['video_url'];
                ?>
                <div class="swiper-slide">
                    <div class="movie-box3" id="movie-box3-m1">
                        <img src="image/<?php echo $movie_image?>" alt="photo" class="movieim3">
                        <div class="movie-text3">
                            <h2 class="movie-title3">
                                <?php echo $movie_title?>
                            </h2>
                            <span class="movie-type3"><?php echo $movie_gender?></span>
                            <a href="<?php echo $movie_trailer?>" class="watch-btn play-btn">
                                <i class='bx bx-play-circle'></i>
                            </a>
                        </div>
                    </div>
                </div>

                    <?php
                        }
            ?>

            </div>
        </section>
        <!-- sweetalert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
            <?php
                        if(isset($_SESSION['message']) && $_SESSION['message'] !='')
                        {
                    ?>
                            <script>
                                swal({
                                        title: "$_SESSION['message']?>",
                                        // text: "You clicked the button!",
                                        icon: "<?php echo $_SESSION['message_code']?>",
                                        button: "OK",
                                    });
                            </script>
                    <?php
                            unset($_SESSION['message']);
                        }

                    ?>
            </script>>
        
        <!--link swiper js-->
        <script src="js/swiper-bundle.min.js"></script>
        <!--link js-->
        <script src="js/kiru.js"></script>




        <script>
            let subMenu = document.getElementById("subMenu");
            function toggleMenu() {
                subMenu.classList.toggle("open-menu");
            }
        </script>

    </body>

    </html>
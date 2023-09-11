<?php

session_start();

if(isset($_SESSION["login"]))
{
?>
<ul class="nbar">
                    <li><a href="home.php" class="active">HOME</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="main_movie.php">MOVIE</a></li>
                </ul>
                <div class="kiru">
                    <form action="login.php" method="POST" name="form">
                    <img src="image/user.png" alt="user" id="k" class="user-img" onclick="toggleMenu()">
                    </form>
                    

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
                </div>

                <?php
}
                    else
                    {
                ?>
                    <ul class="nbar">
                        <li><a href="home.php" class="active">HOME</a></li>
                        <li ><a href="login.php">LOGIN</a></li>
                        <li><a href="about.php">ABOUT</a></li>
                    </ul>
            <?php
                    }
                ?>
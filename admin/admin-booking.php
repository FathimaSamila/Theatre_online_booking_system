<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vijaya Theater Admin</title>

    <link rel="stylesheet" href="css/admin_book.css">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- css for icon-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class='bx bxs-camera-movie'></i>
                </div>
                <div class="sidebar-brand-text mx-3">VIJAYA <sup>THEATRE</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="home.php">
                    <i class='bx bxs-home-alt-2'></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="movie-admin.php">
                    <i class='bx bxs-movie'></i>
                    <span>Movie Management</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="show-admin.php">
                    <i class='bx bxs-movie-play'></i>
                    <span>show Management</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="admin-booking.php">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Booking Management</span>
                </a>

            </li>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="user.php">
                    <i class='bx bxs-user-account'></i>
                    <span>User Management</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="moive-add-title2">
                            <h1 class="addtitle">BOOKING DETAILS</h1>
                        </div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Vijaya theater</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../home.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
<div class="add-user mt-5">
            <div class="container report-container">
                <form class="form-group" action="admin_pdf.php" method="POST">
                    <label for="startDate" class="h5 ms-5 me-2 sdate">Start Date</label>
                    <input type="date" name="startDate" class="mr-5">
                    <label for="endDate" class="h5 ms-5 me-2 ">End Date</label>
                    <input type="date" name="endDate" class="mr-5">
                    <button type="submit" class="btn btn-primary ms-5" name="b_report_btn">Report<i class='bx bx-download'></i></button>  

                </form>

            </div>
                <div>
                    <?php include('alert.php'); ?>
                </div>
                <div class="booking-detail-table mt-5">
                <?php
                    $connection= mysqli_connect("localhost","root","","vijaya_theater");
                    $query = "SELECT * FROM booking";
                    $query_run = mysqli_query($connection, $query);

                ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>User Id</th>
                                    <th>Show Id</th>   
                                    <th>Movie</th>
                                    <th>Show date</th>
                                    <th>Ticket Name</th>
                                    <th>No Of Seat</th>
                                    <th>Amount</th>
                                    <th>Ticket booked date</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(mysqli_num_rows($query_run)> 0)
                                {
                                        while($row= mysqli_fetch_assoc($query_run))
                                        {
                            ?>
                                <tr>
                                    <td><?php echo $row['booking_id'];?></td>
                                    <td><?php echo $row['user_id'];?></td>
                                    <td><?php echo $row['show_id'];?></td>
                                    <td><?php echo $row['movie'];?></td>
                                    <td><?php echo $row['ticket_date_time'];?></td>
                                    <td><?php echo $row['ticket_name'];?></td>
                                    <td><?php echo $row['no_of_seat'];?></td>
                                    <td><?php echo $row['amount'];?></td>
                                    <td><?php echo $row['booked_date'];?></td>
                                    <!-- <td>
                                        <form action="bookingbd.php" method="POST">
                                            <input type="hidden" name="book_id" value="<?php echo $row['booking_id'];?>">
                                            <input type="hidden" name="user_id" value="<?php echo $row['user_id'];?>">
                                            <input type="hidden" name="show_id" value="<?php echo $row['show_id'];?>">
                                            <button type="submit" class="adedit-btn" name="bookcan-btn">
                                                Cancel
                                            </button>
                                        </form>       
                                    </td> -->
                                </tr>
                            <?php
                                        }
                                }
                                else
                                {
                                    echo "No Record Found";
                                }
                            ?>    
                            </tbody>
                        </table>
                </div>

            </div>
        </div>
</div>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="../home.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>



        <!-- Custom styles for this template-->
        <!-- sweetalert -->
            <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <?php
                    if(isset($_SESSION['ok']) && $_SESSION['ok'] !='')
                    {
                ?>
                        <script>
                            swal({
                                    title: "<?php echo $_SESSION['ok']?>",
                                    // text: "You clicked the button!",
                                    icon: "<?php echo $_SESSION['ok_code']?>",
                                    button: "OK",
                                });
                        </script>
                <?php
                        unset($_SESSION['ok']);
                    }

                ?> -->
            
            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/chart-area-demo.js"></script>
            <script src="js/demo/chart-pie-demo.js"></script>

        <!-- Custom styles for this template-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>





</body>

</html>
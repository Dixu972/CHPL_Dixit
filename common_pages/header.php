<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the session variable for logged-in user exists and is set to true
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location:index.php');
    exit;
}

?>

<!-- PHP CODE ENDED -->

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HRMS Dashboard</title>
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/13063/13063059.png" type="image/x-icon">
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- Sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- jQuery for AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    

    <style>
        /* Make error messages red */
        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>

</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="welcome.php">Welcome <span style="font-size: 23px"> <?php echo strtoupper($_SESSION['admin_name']); ?></span></a>
            </div>
            <div id="time" style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Current Access : <?php echo date('l, d Y H:i:s', time()); ?> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive" />
                    </li>
                    <li>
                        <a class="active-menu" href="welcome.php"><i class="fa fa-dashboard fa-3x"></i>Dashboard</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Data<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Employee<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="manage_employee.php">Manage Employee</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Attendance<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="manage_attendance.php">Manage Attendance</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Leave<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="manage_leave.php">Manage Leave</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Company<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="manage_company.php">Manage Company</a>
                                    </li>
                                    <li>
                                        <a href="add_company.php">Add Company</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Department<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="manage_department.php">Manage Department</a>
                                    </li>
                                    <li>
                                        <a href="add_department.php">Add Department</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Position<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="manage_position.php">Manage Position</a>
                                    </li>
                                    <li>
                                        <a href="add_position.php">Add Position</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
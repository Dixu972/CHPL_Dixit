<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>HRMS Admin Registration</title>
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/13063/13063059.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login_assets/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login_assets/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login_assets/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login_assets/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login_assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/login_assets/css/main.css">
    <!--===============================================================================================-->
    <!-- Sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="assets/login_assets/images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="action_code.php" method="post">
                    <span class="login100-form-title">
                        <span class="h1 text-danger">A</span>dmin Registration
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Name is required">
                        <input class="input100" type="text" name="admin_name" id="admin_name" placeholder="Enter Full Name">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Email is required">
                        <input class="input100" type="email" name="a_email" id="a_email" placeholder="Enter Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" id="a_password" name="a_password" placeholder="Enter Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input dropdown-wrapper" data-validate="Role is required">
                        <select class="input100" name="role" id="role">
                                <option value="" disabled selected>Select Your Role</option>
                                <option value="superadmin">Super Admin</option>
                                <option value="company_admin">Company Admin</option>
                        </select>
                        <span class="symbol-input100">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" name="register_ad_btn" class="login100-form-btn">
                            Register
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            <!-- Forgot -->
                        </span>
                        <a class="txt2" href="#">
                            <!-- Username / Password? -->
                        </a>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="index.php">
                            Already have an account? Login
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    // Check for success message in session
    if (isset($_SESSION['success_message'])) {
        echo "<script>
    swal('Success!', '" . $_SESSION['success_message'] . "', 'success');
    </script>";
        unset($_SESSION['success_message']); // Unset the session after displaying the alert
    }

    // Check for error message in session
    if (isset($_SESSION['error_message'])) {
        echo "<script>
    swal('Error!', '" . $_SESSION['error_message'] . "', 'error');
    </script>";
        unset($_SESSION['error_message']); // Unset the session after displaying the alert
    }
    ?>
    <!--===============================================================================================-->
    <script src="assets/login_assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login_assets/vendor/bootstrap/js/popper.js"></script>
    <script src="assets/login_assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login_assets/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login_assets/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="assets/login_assets/js/main.js"></script>

</body>

</html>
<?php

session_start();

include 'controller/dbconfig.php';


// for admin registration

if (isset($_POST['register_ad_btn'])) {
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['a_email'];
    $admin_pass = password_hash($_POST['a_password'], PASSWORD_DEFAULT); // Secure password
    $role = $_POST['role'];

    // Check if email already exists
    $checkEmail = "SELECT * FROM admin_master WHERE admin_email = '$admin_email'";
    $result = mysqli_query($conn, $checkEmail);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['error_message'] = "Email already registered!";
        header("Location: admin_reg.php");
        exit();
    }

    // Insert Query
    $query = "INSERT INTO admin_master (admin_name, admin_email, admin_pass, role) 
              VALUES ('$admin_name', '$admin_email', '$admin_pass', '$role')";

    if (mysqli_query($conn, $query)) {
        $_SESSION['success_message'] = "Admin registered successfully!";
        header("Location: index.php");
    } else {
        $_SESSION['error_message'] = "Registration failed. Please try again.";
        header("Location: admin_reg.php");
    }
}


// login code
if (isset($_POST['login'])) {
    $a_email = $_POST['a_email'];
    $a_password = $_POST['a_password'];

    // Secure SQL Query (Prepared Statement)
    $login = "SELECT `admin_id`, `admin_pass`, `role` FROM admin_master WHERE admin_email = ?";
    $stmt = mysqli_prepare($conn, $login);
    mysqli_stmt_bind_param($stmt, "s", $a_email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if email exists
    if ($row = mysqli_fetch_assoc($result)) {

        // Verify password
        if (password_verify($a_password, $row['admin_pass'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['a_email'] = $a_email;
            $_SESSION['role'] = $row['role'];
            $_SESSION['admin_id'] = $row['admin_id'];

            // Role-based Allowed Pages
            if ($row['role'] == 'company_admin') {
                $allowedPages = ['welcome.php', 'manage_company.php', 'manage_employee.php', 'manage_department.php', 'manage_position.php', 'manage_leave.php'];
            } else { // Super Admin
                $allowedPages = ['welcome.php', 'add_company.php', 'add_department.php', 'add_position.php', 'edit_employee.php', 'edit_department.php', 'edit_position.php', 'edit_comapny.php', 'manage_employee.php',];
            }

            // Encrypt & Store in Cookies
            $encryptedPages = openssl_encrypt(json_encode($allowedPages), 'AES-128-ECB', '9d@X!vP5bG8&kLz2');
            setcookie('admin_access', $encryptedPages, time() + (3600), "/");

            $_SESSION['success_message'] = ucfirst($_SESSION['role']) . " login successfully !";
            header('Location: welcome.php');
            exit;
        } else {
            // Wrong password
            $_SESSION['error_message'] = 'Invalid login credentials.';
            header('Location: index.php');
            exit;
        }
    } else {
        // Email does not exist
        $_SESSION['error_message'] = 'Invalid login credentials.';
        header('Location: index.php');
        exit;
    }
}


// leave approve reject code

if (isset($_POST[''])) {

    // Get the form data (id and action_code)
    $id = $_POST['id'];

    // Check which button was clicked and set the status accordingly
    if (isset($_POST['approve_btn'])) {
        $status = 'Approved';
    } elseif (isset($_POST['reject_btn'])) {
        $status = 'Rejected';
    } elseif (isset($_POST['pending_btn'])) {
        $status = 'Pending';
    } else {
        die("Invalid request.");
    }

    // Secure SQL Query (Prepared Statement)
    $sql = "UPDATE leave_status SET status_name = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $status, $id);

    // Execute the query
    if (mysqli_stmt_execute($stmt)) {
        echo "Status updated successfully!";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}

mysqli_close($conn);

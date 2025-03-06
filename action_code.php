<?php

session_start();

include 'controller/dbconfig.php';

// Process login form submission
if (isset($_POST['login'])) {

    $a_email = $_POST['a_email'];
    $a_password = $_POST['a_password'];

    $login = "SELECT * FROM admin_master WHERE admin_email = '$a_email' AND admin_pass = '$a_password'";
    $result = mysqli_query($conn, $login);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Set session variables for login
        $_SESSION['logged_in'] = true;
        $_SESSION['a_email'] = $a_email;

        // Set success message
        $_SESSION['success_message'] = 'Admin login successfully!';
        // Redirect to same page
        header('Location: welcome.php');
        exit;
    } else {
        // Set error message
        $_SESSION['error_message'] = 'Invalid login credentials.';
        // Redirect to same page
        header('Location: index.php');
        exit;
    }
}

// leave approve reject code

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data (id and action_code)
    $id = $_POST['id'];

    // Check which button was clicked and set the status accordingly
    if (isset($_POST['approve_btn'])) {
        $status = 'Approved';
    } elseif (isset($_POST['reject_btn'])) {
        $status = 'Rejected';
    } elseif (isset($_POST['pending_btn'])) {
        $status = 'Pending';
    }

    // Update the leave status in the database
    $sql = "UPDATE leave_status SET status_name = '$status' WHERE id = $id";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Status updated successfully!";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}

mysqli_close($conn);

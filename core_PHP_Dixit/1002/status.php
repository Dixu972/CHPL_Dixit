<?php

include('dbconfig.php');


if (isset($_POST['emp_id']) && isset($_POST['status'])) {
    $emp_id = $_POST['emp_id'];
    $status = $_POST['status'];

    $sql = "UPDATE employees SET status = '$status' WHERE emp_id = '$emp_id'";
    if (mysqli_query($conn, $sql)) {
        echo 'success';
    } else {
        echo 'error';
    }
}

?>
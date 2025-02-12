<?php

include('dbconfig.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['insert'])) {

        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['state']) && isset($_POST['u_phone']) && isset($_POST['comp_name']) && isset($_POST['comp_add'])) {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $state = $_POST['state'];
            $u_phone = $_POST['u_phone'];
            $comp_name = $_POST['comp_name'];
            $comp_add = $_POST['comp_add'];

            $sql = "INSERT INTO `user_api_test`(`name`, `email`, `state`, `u_phone`, `comp_name`, `comp_add`) VALUES 
        ('$name','$email', '$state' ,'$u_phone','$comp_name','$comp_add')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                $response["message"] = "Data Added...";
                $response["status"] = "200";
            } else {
                $response["message"] = "Error!!! Something Wrong...";
                $response["status"] = "201";
            }
        } else {
            $response["message"] = "Please Add The Details...";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "Please Add Correct Key...";
        $response["status"] = "201";
    }
} else {
    $response["message"] = "Only Post Method Allowed...";
    $response["status"] = "201";
}
echo json_encode($response);

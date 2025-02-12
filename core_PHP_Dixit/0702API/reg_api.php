<?php

include('dbconfig.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["add_user"])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $state = $_POST['state'];

        $insert = "INSERT INTO user_api_test (name,email,state) VALUES ('$name','$email','$state')";
        if (mysqli_query($conn, $insert)) {

            $responce["message"] = "Data Inserted Succesfully";
            $responce["status"] = "200";
        } else {
            $responce["message"] = "Something Wrong";
            $responce["status"] = "201";
        }
    } else {
        $resoonce["message"] = "Use valid tag";
        $responce["status"] = "201 tag";
    }
} else {
    $resoonce["message"] = "Use only Post Method";
    $responce["status"] = "201 method";
}

echo json_encode($responce);

mysqli_close($conn);

?>

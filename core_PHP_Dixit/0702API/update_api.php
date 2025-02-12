<?php
include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['method'])) {
        if (isset($_POST['method']) == "update") {
            if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['state']) && isset($_POST['id'])) {

                $name = $_POST['name'];
                $email = $_POST['email'];
                $state = $_POST['state'];
                $id = $_POST['id'];

                $sql = "UPDATE `user_api_test ` SET`name`='$name',`email`='$email',`state`='$state' WHERE id=$id";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $response["message"] = "Data Updated";
                    $response["status"] = "200";
                } else {
                    $response["message"] = "Something Wrong !";
                    $response["status"] = "201 Update failed";
                }
            } else {
                $response["message"] = "Something Wrong !";
                $response["status"] = "201 Tag Error";
            }
        } else {
            $response["message"] = "Something Wrong !";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "Something Wrong !";
        $response["status"] = "201 Method 1";
    }
} else {
    $response["message"] = "Use Post Method";
    $response["status"] = "201 Method 0";
}
echo json_encode($response);

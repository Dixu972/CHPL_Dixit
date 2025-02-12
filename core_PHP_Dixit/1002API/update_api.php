<?php

include('dbconfig.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['method'])) {
        if ($_POST['method'] == 'update') {

            if (isset($_POST['id']) && $_POST['id'] != '') {

                $id = $_POST['id'];

                $fetch_sql = "SELECT * FROM `user_api_test` WHERE `id` = '$id'";
                $fetch_result = mysqli_query($conn, $fetch_sql);
                $fetch_row = mysqli_fetch_assoc($fetch_result);

                if ($fetch_row) {

                    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['state']) && isset($_POST['comp_name']) && isset($_POST['comp_add'])) {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $state = $_POST['state'];
                        $comp_name = $_POST['comp_name'];
                        $comp_add = $_POST['comp_add'];

                        $sql = "UPDATE `user_api_test` SET `name` = '$name', `email` = '$email', `state` = '$state', `comp_name` = '$comp_name', `comp_add` = '$comp_add' WHERE `id` = '$id'";

                        if (mysqli_query($conn, $sql)) {
                            $response["message"] = "Data Updated...";
                            $response["status"] = "200";
                        } else {
                            $response["message"] = "Something Wrong Data Not Update...";
                            $response["status"] = "201";
                        }
                    } else {
                        $response["message"] = "Invalid parameters...";
                        $response["status"] = "201";
                    }
                } else {
                    $response["message"] = "Invalid ID... User not found";
                    $response["status"] = "201";
                }
            } else {
                $response["message"] = "Invalid ID...";
                $response["status"] = "201";
            }
        } else {
            $response["message"] = "Please Enter The Key Value Or Invalid Value Of Key...";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "Please Check Method Parameter...";
        $response["status"] = "201";
    }
} else {
    $response["message"] = "Only Post Method Allowed...";
    $response["status"] = "201";
}

echo json_encode($response);

?>
<?php

include('dbconfig.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['method'])) {

        if (isset($_POST['method']) == "get_data") {

            $sql = "SELECT * FROM `user_api_test`";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

                $data = array();

                while ($row = mysqli_fetch_assoc($result)) {

                    $data[] = $row;
                }
                $response["message"] = "Your Table Data...";
                $response["status"] = "200";
                $response["data"] = $data;
            } else {
                $response["message"] = "Data Not Found...";
                $response["status"] = "201";
            }
        } else {
            $response["message"] = "Please Add The Correct Token Value...";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "PLease Enter The Correct Token...";
        $response["status"] = "201";
    }
} else {
    $response["message"] = "Only Post Method Allowed...";
    $response["status"] = "201";
}
echo json_encode($response);

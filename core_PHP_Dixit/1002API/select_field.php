<?php

include('dbconfig.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['method'])) {

        if ($_POST['method'] == "get_data") {

            $sql = "SELECT * FROM `user_api_test` ";

            $result = mysqli_query($conn, $sql);
            $data=[];
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                    $response["name"] = $row["name"];
                    $response["email"] = $row["email"];
                    $response["comp_name"] = $row["comp_name"];
                }

                $response["message"] = "Select Field Data Received...";
                $response["status"] = "200";
            } else {
                $response["message"] = "Data Not Found in Table...";
                $response["status"] = "201";
            }
        } else {
            $response["message"] = "Please Pass The Correct Token Value...";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "Please Pass The Correct Token...";
        $response["status"] = "201";
    }
} else {
    $response["message"] = "Only Post Method Allowed...";
    $response["status"] = "201";
}
echo json_encode($response);

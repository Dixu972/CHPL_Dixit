<?php

include('dbconfig.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['method'])) {

        if (isset($_POST['method']) == "get_data") {

            $sql = "SELECT * FROM `user_api_test`";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

                $data = array();

                while ($row = mysqli_fetch_assoc($result)) {

                    $response["name"] = $row["name"];
                    $response["email"] = $row["email"];
                    $response["u_phone"] = $row["u_phone"];

                    array_push($data, $response);
                }
                $response["message"] = "All Data Retrived Successfully...";
                $response["status"] = "200";
                $response["data"] = $data;
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

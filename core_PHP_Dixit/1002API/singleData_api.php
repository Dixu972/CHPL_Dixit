<?php

include('dbconfig.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['method'])) {

        if (isset($_POST['method']) == "single") {

            if (isset($_POST["id"])) {

                $id = $_POST["id"];

                $sql = "SELECT * FROM `user_api_test` where id= $id";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $array = array();
                    $row = mysqli_fetch_assoc($result) ;

                        $array[] = $row;
                    $response["message"] = "Selected Data Received...";
                    $response["status"] = "200";
                    $response["data"] = $array;
                } else {
                    $response["message"] = "Data Not Found IN Table...";
                    $response["status"] = "201";
                }

            } else {
                $response["message"] = "Please Pass The Correct User Id...";
                $response["status"] = "201";
            }


        } else {
            $response["message"] = "Please Enter The Correct Token Value..";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "Please Enter The Correct Token...";
        $response["status"] = "201";
    }

} else {
    $response["message"] = "Only Post Method Allowed...";
    $response["status"] = "201";
}
echo json_encode($response);
?>
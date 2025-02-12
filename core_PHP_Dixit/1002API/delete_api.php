<?php

include('dbconfig.php');

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['method']) && $_POST['method'] == 'delete_data') {

        $id = $_POST['id'];

        $sql_check = "SELECT id FROM `user_api_test` WHERE id = '$id'";

        $result_check = mysqli_query($conn, $sql_check);

        if (mysqli_num_rows($result_check) > 0) {

            $sql = "DELETE FROM `user_api_test` WHERE id = '$id'";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                $response["message"] = "Data Deleted Successfully...";
                $response["status"] = "200";
            } else {
                $response["message"] = "Something Wrong Data Not Deleted...";
                $response["status"] = "201";
            }
        } else {
            $response["message"] = "Invalid ID...User Not Found...";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "Invalid Key Value...";
        $response["status"] = "201";
    }
} else {
    $response["message"] = "Only Post Method Allowed...";
    $response["status"] = "201";
}

echo json_encode($response);

?>

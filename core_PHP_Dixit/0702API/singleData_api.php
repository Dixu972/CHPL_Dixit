<?php

include('dbconfig.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id=$_POST['id'];

    if (isset($_POST["getData"])) {

        $data = array();

        $sql = "SELECT * FROM user_api_test WHERE id='$id'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
                echo json_encode($data);
                $responce["message"] = "Data Inserted Succesfully";
                $responce["status"] = "200";
            }
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

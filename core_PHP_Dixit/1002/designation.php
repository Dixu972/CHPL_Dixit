<?php

include('dbconfig.php');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$department_id = $_POST['department_id'];

$sql = "SELECT * FROM designation WHERE DepartmentID = '$department_id'";
$result = mysqli_query($conn, $sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);

?>
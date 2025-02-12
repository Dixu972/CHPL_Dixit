<?php

$conn = mysqli_connect("localhost", "root", "", "Chpl_Emp_ManageDB");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

//  get data query

$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action == 'get_departments') {
    $sql = "SELECT DepartmentID, DepartmentName FROM department";
    $result = $conn->query($sql);

    $departments = array();
    while ($row = $result->fetch_assoc()) {
        $departments[] = $row;
    }

    echo json_encode($departments);
}

if ($action == 'get_designations') {
    $department_id = isset($_GET['DepartmentID']) ? intval($_GET['DepartmentID']) : 0;

    if ($department_id > 0) {
        $sql = "SELECT DesignationID, DesignationName FROM designation WHERE DepartmentID = $department_id";
        $result = $conn->query($sql);

        $designations = array();
        while ($row = $result->fetch_assoc()) {
            $designations[] = $row;
        }

        echo json_encode($designations);
    }
}

// $conn->close();

?>
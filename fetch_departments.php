<?php
include 'controller/dbconfig.php';

if (isset($_POST['company_id'])) {
    
    $company_id = $_POST['company_id'];

    $query = "SELECT dept_id, dept_name FROM dept_master WHERE company_id = '$company_id' ORDER BY dept_name ASC";
    $result = mysqli_query($conn, $query);

    echo "<option value=''>Select Department</option>";
    while ($dept = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $dept['dept_id'] . "'>" . $dept['dept_name'] . "</option>";
    }
}
?>

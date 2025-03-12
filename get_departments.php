<?php
include 'controller/dbconfig.php';

if (isset($_POST['company_id'])) {
    $company_id = intval($_POST['company_id']); // Ensure it's an integer

    $query = "SELECT dept_id, dept_name FROM dept_master WHERE company_id = $company_id ORDER BY dept_name ASC";
    $result = mysqli_query($conn, $query);

    echo '<option value="">Select Department</option>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . htmlspecialchars($row['dept_id']) . "'>" . htmlspecialchars($row['dept_name']) . "</option>";
    }
}

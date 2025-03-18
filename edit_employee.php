<?php

include_once 'controller/access_control.php';
include 'common_pages/header.php';
include 'controller/dbconfig.php'; // Include database connection

// Get Employee ID from URL
if (!isset($_GET['edit_emp_id'])) {
    echo "Invalid Employee ID.";
    exit;
}

$emp_e_id = $_GET['edit_emp_id'];

// Fetch Employee Details
$emp = "SELECT 
    u.u_id, 
    u.u_name, 
    u.u_email, 
    u.u_phone, 
    u.u_gender, 
    u.dept_id, 
    u.position_id, 
    u.u_salary,
    u.u_dob,
    u.u_joining_Date,
    u.company_id
    -- u.u_profile_photo
FROM user_master u
WHERE u.u_id = '$emp_e_id' AND u.u_is_delete = 0";

$result = mysqli_query($conn, $emp);
$employee = mysqli_fetch_assoc($result);

// Fetch Departments & Positions for Dropdown
$departments = mysqli_query($conn, "SELECT * FROM dept_master WHERE company_id = '" . $employee['company_id'] . "'");
$positions = mysqli_query($conn, "SELECT * FROM position_master WHERE company_id = ' " . $employee['company_id'] . "'");
$companys = mysqli_query($conn, "SELECT * FROM company_master");

?>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Employee</h2>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Employee Form
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post" action="action_code.php" enctype="multipart/form-data">
                                <input type="hidden" name="emp_u_id" value="<?= $employee['u_id']; ?>" />
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Employee Full Name</label>
                                        <input type="text" class="form-control" name="u_name" value="<?= $employee['u_name']; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="u_email" value="<?= $employee['u_email']; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label><br />
                                        <label class="radio-inline">
                                            <input type="radio" name="u_gender" value="1" <?= ($employee['u_gender'] == 1) ? 'checked' : 'disabled'; ?> /> Male
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="u_gender" value="2" <?= ($employee['u_gender'] == 2) ? 'checked' : 'disabled'; ?> /> Female
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="u_gender" value="3" <?= ($employee['u_gender'] == 3) ? 'checked' : 'disabled'; ?> /> Other
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        <input class="form-control" type="text" name="u_phone" value="<?= $employee['u_phone']; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Date Of Birth</label>
                                        <input class="form-control" type="date" name="u_dob" value="<?= $employee['u_dob']; ?>" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Company</label>
                                        <select class="form-control" name="company_id" disabled>
                                            <?php while ($row = mysqli_fetch_assoc($companys)) { ?>
                                                <option value="<?= $row['company_id']; ?>" <?= ($employee['company_id'] == $row['company_id']) ? 'selected' : ''; ?>>
                                                    <?= $row['company_name']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select class="form-control" name="dept_id">
                                            <?php while ($row = mysqli_fetch_assoc($departments)) { ?>
                                                <option value="<?= $row['dept_id']; ?>" <?= ($employee['company_id'] == $row['company_id']) ? 'selected' : ''; ?>>
                                                    <?= $row['dept_name']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <select class="form-control" name="position_id">
                                            <?php while ($row = mysqli_fetch_assoc($positions)) { ?>
                                                <option value="<?= $row['position_id']; ?>" <?= ($employee['position_id'] == $row['position_id']) ? 'selected' : ''; ?>>
                                                    <?= $row['position_name']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Joining Date</label>
                                        <input class="form-control" type="date" name="u_joining_Date" value="<?= $employee['u_joining_Date']; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Salary</label>
                                        <input class="form-control" type="number" name="u_salary" value="<?= $employee['u_salary']; ?>" />
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Profile Photo</label><br />
                                        <input type="file" name="profile-photo" />
                                        <?php // if (!empty($employee['u_profile_photo'])) { 
                                        ?>
                                            <img src="uploads/<?= $employee['u_profile_photo']; ?>" width="80" height="80" />
                                        <?php // } 
                                        ?>
                                    </div>  -->
                                </div>
                                <button type="submit" class="btn btn-primary" name="update_employee_btn" style="margin-left: 15px;">Update</button>
                                <a href="manage_employee.php" class="btn btn-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'common_pages/footer.php'; ?>
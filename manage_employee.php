<?php

include_once 'controller/access_control.php';
include 'common_pages/header.php';
include 'controller/dbconfig.php';

$admin_company_id = $_SESSION['a_company_id']; // Store company_id if company_admin
$admin_role = $_SESSION['role']; // Get role


// fetch data
$sql = "SELECT 
    u.u_id, 
    u.u_name, 
    u.u_email, 
    u.u_phone, 
    CASE 
        WHEN u.u_gender = 1 THEN 'Male' 
        WHEN u.u_gender = 2 THEN 'Female' 
        ELSE 'Other' 
    END AS gender, 
    d.dept_name, 
    p.position_name, 
    c.company_name, 
    u.u_salary,
    u.u_dob,
    u.u_joining_Date 
FROM user_master u
LEFT JOIN dept_master d ON u.dept_id = d.dept_id
LEFT JOIN position_master p ON u.position_id = p.position_id
LEFT JOIN company_master c ON u.company_id = c.company_id
WHERE u.u_is_delete = 0";

// If not superadmin, filter by company
if ($admin_role != "superadmin") {
    $sql .= " AND u.company_id = $admin_company_id";
}

$result = mysqli_query($conn, $sql);


?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Employee Data Table</h2>
                <h5>Welcome ! Love to see you back. </h5>

            </div>
        </div>
        <!-- /. ROW  -->
        <hr />

        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12 ">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Search Data Table
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table small table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Employee Name</th>
                                        <th>Email</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th>Contact No</th>
                                        <th>DOB</th>
                                        <th>Gender</th>
                                        <th>Company Name</th>
                                        <th>Joining Date</th>
                                        <th>Salary</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($result as $u) {
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $u['u_id'];?></td>
                                            <td><?php echo $u['u_name'];?></td>
                                            <td><?php echo $u['u_email'];?></td>
                                            <td><?php echo $u['dept_name'];?></td>
                                            <td><?php echo $u['position_name'];?></td>
                                            <td><?php echo $u['u_phone'];?></td>
                                            <td><?php echo $u['u_dob'];?></td>
                                            <td><?php echo $u['gender'];?></td>
                                            <td><?php echo $u['company_name'];?></td>
                                            <td><?php echo $u['u_joining_Date'];?></td>
                                            <td><?php echo !empty($u['u_salary']) ? $u['u_salary'] : 'Shortly Update !';?></td>
                                            <td>
                                            <?php
                                                if ($_SESSION['role'] == 'superadmin') {
                                                ?>
                                                <a href="action_code.php?emp_del=<?php echo $u['u_id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Employee ?')">Delete</a>
                                                <?php
                                                } else {
                                                ?>
                                                    <button class="btn btn-danger" disabled>Delete</button>
                                                <?php
                                                }
                                                ?>
                                                <a href="edit_employee.php?edit_emp_id=<?php echo $u['u_id'];?>" class="btn btn-info emp-bt">EDIT</a>
                                            </td>
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. ROW  -->
</div>

</div>
<!-- /. PAGE INNER  -->
</div>

<?php include 'common_pages/footer.php'; ?>
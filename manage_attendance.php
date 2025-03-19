<?php

include_once 'controller/access_control.php';

include 'common_pages/header.php';
include 'controller/dbconfig.php';

// fetch data
$attendance = "SELECT a.*,u.u_name,att.a_status_name FROM `attendance_master` as a LEFT JOIN user_master as u ON a.u_id = u.u_id LEFT JOIN attendance_status as att ON a.a_status = att.a_status_id ";

$result = mysqli_query($conn, $attendance);

?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Attendance Management Table
                    <!-- <a href="add_company.php" class="btn btn-info" style="float:right;">Add Company</a> -->
                </h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Search Data Table
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-responsive table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Attendance ID</th>
                                        <th>User Name</th>
                                        <th>Check_In Time</th>
                                        <th>Check_Out Time</th>
                                        <th>Attendance Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $a) { ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $a['a_id']; ?></td>
                                            <td><?php echo $a['u_name']; ?></td>
                                            <td><?php echo $a['a_check_in_time']; ?></td>
                                            <td><?php echo $a['a_check_out_time']; ?></td>
                                            <td><?php echo $a['a_status_name']; ?></td>
                                            <td>
                                                <?php
                                                if ($_SESSION['role'] == 'superadmin') {
                                                ?>
                                                    <!-- <a href="action_code.php?delete_attendance=<?php // echo $a['a_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this company?');">Delete</a> -->
                                                <?php
                                                } else {
                                                ?>
                                                    <button class="btn btn-danger" disabled>Delete</button>
                                                <?php
                                                }
                                                ?>
                                                <a href="edit_attendance.php?att_id=<?php echo  $a['a_id']; ?>" class="btn btn-info">EDIT</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>
    <!-- /. ROW  -->
</div>

</div>
<!-- /. PAGE INNER  -->
</div>



<?php include 'common_pages/footer.php'; ?>
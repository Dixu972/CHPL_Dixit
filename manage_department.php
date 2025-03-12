<?php

include_once 'controller/access_control.php';
include 'common_pages/header.php';
include 'controller/dbconfig.php';

// fetch data
$dept = "SELECT d.dept_id, d.dept_name, c.company_name 
FROM dept_master AS d 
JOIN company_master AS c ON d.company_id = c.company_id 
ORDER BY c.company_name ASC, d.dept_name ASC";
$result = mysqli_query($conn, $dept);

?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Department Data Table
                    <a href="add_department.php" class="btn btn-info" style="float:right;">Add Department</a>
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
                                        <th>Department ID</th>
                                        <th>Company Name</th>
                                        <th>Department Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($result as $d) { ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $d['dept_id']; ?></td>
                                            <td><?php echo $d['company_name']; ?></td>
                                            <td><?php echo $d['dept_name']; ?></td>
                                            <td>
                                                <?php
                                                if ($_SESSION['role'] == 'superadmin') {
                                                ?>
                                                    <a href="action_code.php?del_dept_id=<?php echo $d['dept_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Department ?')">Delete</a>
                                                <?php
                                                } else {
                                                ?>
                                                    <button class="btn btn-danger" disabled>Delete</button>
                                                <?php
                                                }
                                                ?>
                                                <a href="edit_department.php?e_dept_id=<?php echo $d['dept_id']; ?>" class="btn btn-info">EDIT</a>
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
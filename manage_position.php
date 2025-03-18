<?php

include_once 'controller/access_control.php';
include 'common_pages/header.php';
include 'controller/dbconfig.php';

if ($pos_id = $_SESSION['a_company_id']) {
    $position = "SELECT p.position_id,p.position_name,c.company_name,d.dept_name
            FROM position_master AS p 
            LEFT JOIN company_master c ON p.company_id = c.company_id
            LEFT JOIN dept_master d ON p.dept_id = d.dept_id WHERE p.company_id = $pos_id";
} else {
    $position = "SELECT p.position_id,p.position_name,c.company_name,d.dept_name
            FROM position_master AS p 
            LEFT JOIN company_master c ON p.company_id = c.company_id
            LEFT JOIN dept_master d ON p.dept_id = d.dept_id";
}

$result = mysqli_query($conn, $position);

?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Position Data Table
                    <a href="add_position.php" class="btn btn-info" style="float:right;">Add Position</a>
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
                                        <th>Position ID</th>
                                        <th>Company Name</th>
                                        <th>Department Name</th>
                                        <th>Position Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $p) { ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $p['position_id']; ?></td>
                                            <td><?php echo $p['company_name']; ?></td>
                                            <td><?php echo $p['dept_name']; ?></td>
                                            <td><?php echo $p['position_name']; ?></td>
                                            <td>
                                                <?php
                                                if ($_SESSION['role'] == 'superadmin') {
                                                ?>
                                                    <a href="action_code.php?delete_pos=<?php echo $p['position_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Position?');">Delete</a>
                                                <?php
                                                } else {
                                                ?>
                                                    <button class="btn btn-danger" disabled>Delete</button>
                                                <?php } ?>
                                                <a href="edit_position.php?position_id=<?php echo $p['position_id']; ?>" class="btn btn-info">EDIT</a>
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
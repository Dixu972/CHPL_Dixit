<?php

include_once 'controller/access_control.php';

include 'common_pages/header.php';
include 'controller/dbconfig.php';

// fetch data
$company = "SELECT * FROM `company_master`";

$result = mysqli_query($conn, $company);

?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Company Data Table
                    <a href="add_company.php" class="btn btn-info" style="float:right;">Add Company</a>
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
                                        <th>Company ID</th>
                                        <th>Company Name</th>
                                        <th>Email</th>
                                        <th>Contact No</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $c) { ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $c['company_id']; ?></td>
                                            <td><?php echo $c['company_name']; ?></td>
                                            <td><?php echo $c['company_email']; ?></td>
                                            <td><?php echo $c['company_phone']; ?></td>
                                            <td><?php echo $c['company_address']; ?></td>
                                            <td>
                                                <?php
                                                if ($_SESSION['role'] == 'superadmin') {
                                                ?>
                                                    <a href="action_code.php?delete_comp=<?php echo $c['company_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this company?');">Delete</a>
                                                <?php
                                                } else {
                                                ?>
                                                    <button class="btn btn-danger" disabled>Delete</button>
                                                <?php
                                                }
                                                ?>
                                                <a href="edit_company.php?e_id=<?php echo $c['company_id']; ?>" class="btn btn-info comp-bt">EDIT</a>
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
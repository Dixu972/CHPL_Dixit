<?php

include_once 'controller/access_control.php';
include 'common_pages/header.php';

?>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Department Form :</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Department Form Element
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post" action="action_code.php" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="company_id">Company Name:</label>
                                        <select class="form-control" name="company_id" id="company_id" required>
                                            <option value="">Select Company</option>
                                            <?php
                                            include 'controller/dbconfig.php';
                                            $query = "SELECT company_id, company_name FROM company_master ORDER BY company_name ASC";
                                            $result = mysqli_query($conn, $query);

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='" .htmlspecialchars($row['company_id']) . "'>" . htmlspecialchars($row['company_name']) . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Department Name :</label>
                                        <input type="text" class="form-control" name="dept_name" id="dept_name" placeholder="Enter Department Name" required />
                                    </div>
                                    <button type="submit" name="reg_dept" class="btn btn-primary">Submit</button>
                                    <a href="manage_department.php" class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Form Elements -->
        </div>
    </div>
</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<?php include 'common_pages/footer.php'; ?>
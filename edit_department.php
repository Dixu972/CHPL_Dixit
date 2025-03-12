<?php

include_once 'controller/access_control.php';
include 'common_pages/header.php';
include 'controller/dbconfig.php';

// fetch data of selected company
if (isset($_GET['e_dept_id'])) {
    $d_id = $_GET['e_dept_id'];
    $query = "SELECT * FROM dept_master WHERE dept_id = $d_id";
    $result = mysqli_query($conn, $query);
   $dept = mysqli_fetch_assoc($result);
//    print_r ($row);
}

?>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Department Form :</h2>
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
                                <input type="hidden" name="dept_id" value="<?php echo $dept['dept_id']; ?>" />
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="company_id">Company Name:</label>
                                        <select class="form-control" name="company_id" id="company_id">
                                            <option value="">Select Company</option>
                                            <?php
                                            $query = "SELECT company_id, company_name FROM company_master";
                                            $result = mysqli_query($conn, $query);

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $selected = ($row['company_id'] == $dept['company_id']) ? "selected" : "";
                                                echo "<option value='" . htmlspecialchars($row['company_id']) . "' $selected>" . htmlspecialchars($row['company_name']) . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Department Name :</label>
                                        <input type="text" class="form-control" name="dept_name" id="dept_name"
                                            value="<?php echo $dept['dept_name']; ?>" />
                                    </div>
                                    <button type="submit" name="update_dept" class="btn btn-primary">Update</button>
                                    <a href="manage_department.php" class="btn btn-danger">Cancel</a>
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
<?php

include_once 'controller/access_control.php';
include 'common_pages/header.php';
include 'controller/dbconfig.php';

if (isset($_GET['position_id'])) {
    $position_id = $_GET['position_id'];

    // Fetch position details
    $query = "SELECT * FROM position_master WHERE position_id = '$position_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}

?>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Position Form :</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Position Form Element
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post" action="action_code.php">
                                <input type="hidden" name="u_position_id" value="<?php echo $row['position_id']; ?>">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="company_id">Company Name:</label>
                                        <select class="form-control" name="company_id" id="company_id">
                                            <option value="">Select Company</option>
                                            <!-- for data selected get -->
                                            <?php
                                            $query = "SELECT company_id, company_name FROM company_master ORDER BY company_name ASC";
                                            $result = mysqli_query($conn, $query);

                                            while ($company = mysqli_fetch_assoc($result)) {
                                                $selected = ($company['company_id'] == $row['company_id']) ? 'selected' : '';
                                                echo "<option value='" . $company['company_id'] . "' $selected>" . $company['company_name'] . "</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    <!-- Department Dropdown (Updated using AJAX) -->
                                    <div class="form-group">
                                        <label for="dept_id">Department Name:</label>
                                        <select class="form-control" name="dept_id" id="dept_id" required>
                                            <option value="">Select Department</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Position Name :</label>
                                        <input type="text" class="form-control" name="position_name" id="position_name" value="<?php echo $row['position_name']; ?>" />
                                    </div>
                                    <button type="submit" name="u_reg_pos" class="btn btn-primary">Update</button>
                                    <a href="manage_position.php" class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Form Elements -->
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        function loadDepartments(company_id, selectedDeptId = null) {
            $.ajax({
                url: "fetch_departments.php",
                method: "POST",
                data: {
                    company_id: company_id
                },
                success: function(data) {
                    $("#dept_id").html(data);
                    if (selectedDeptId) {
                        $("#dept_id").val(selectedDeptId);
                    }
                }
            });
        }
        // On Page Load (For Editing: Fetch and Select Department)
        var companyId = $("#company_id").val();
        var deptId = "<?php echo $row['dept_id']; ?>";

        if (companyId) {
            loadDepartments(companyId, deptId);
        }
        // When Company Dropdown Changes
        $("#company_id").change(function() {
            var company_id = $(this).val();
            if (company_id) {
                loadDepartments(company_id);
            } else {
                $("#dept_id").html('<option value="">Select Department</option>');
            }
        });
    });
</script>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<?php include 'common_pages/footer.php'; ?>
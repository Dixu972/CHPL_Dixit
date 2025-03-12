<?php

include_once 'controller/access_control.php';
include 'common_pages/header.php';
include 'controller/dbconfig.php';

// fetch data of selected company
if (isset($_GET['e_id'])) {
    $c_id = $_GET['e_id'];
    $query = "SELECT * FROM company_master WHERE company_id = $c_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}
?>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Company Form :</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Company Form Element
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post" action="action_code.php" enctype="multipart/form-data">
                                <input type="hidden" name="u_id" value="<?php echo $row['company_id']; ?>" />
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Company Name :</label>
                                        <input type="text" class="form-control" name="company_name" id="company_name" value="<?php echo $row['company_name']; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Company Email :</label>
                                        <input type="email" class="form-control" name="company_email" id="company_email" value="<?php echo $row['company_email']; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Contact No :</label>
                                        <input type="number" class="form-control" name="company_phone" id="company_phone" value="<?php echo $row['company_phone']; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Full Address :</label>
                                        <textarea class="form-control" name="company_address" id="company_address"><?php echo $row['company_address']; ?></textarea>
                                    </div>

                                    <button type="submit" name="comp_update" class="btn btn-primary">Update Data</button>
                                    <a href="manage_company.php" class="btn btn-danger">Cancel</a>
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
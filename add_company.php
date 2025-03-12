<?php

include_once 'controller/access_control.php';
include 'common_pages/header.php'

?>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Add Company Form :</h2>
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Company Name :</label>
                                        <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter Company Name" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Company Email :</label>
                                        <input type="email" class="form-control" name="company_email" id="company_email" placeholder="Enter Company Email" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Contact No :</label>
                                        <input type="number" class="form-control" name="company_phone" id="company_phone" placeholder="Enter Company Contact No" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Full Address :</label>
                                        <textarea class="form-control" name="company_address" id="company_address" placeholder="Enter Address" required></textarea>
                                    </div>

                                    <button type="submit" name="comp_reg" class="btn btn-primary">Submit</button>
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
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
                            <form role="form" id="comp_form" method="post" action="action_code.php" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Company Name :</label>
                                        <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter Company Name" />
                                    </div>
                                    <div class="form-group">
                                        <label>Company Email :</label>
                                        <input type="email" class="form-control" name="company_email" id="company_email" placeholder="Enter Company Email" />
                                    </div>
                                    <div class="form-group">
                                        <label>Contact No :</label>
                                        <input type="number" class="form-control" name="company_phone" id="company_phone" placeholder="Enter Company Contact No" />
                                    </div>
                                    <div class="form-group">
                                        <label>Full Address :</label>
                                        <textarea class="form-control" name="company_address" id="company_address" placeholder="Enter Address"></textarea>
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
<script>
    $(document).ready(function() {
    // if ($.fn.validate) {
    //     console.log("✅ jQuery Validation Plugin Loaded Successfully!");
    // } else {
    //     console.log("❌ jQuery Validation Plugin NOT Loaded!");
    // }

    $("#comp_form").validate({
        rules: {
            company_name: { required: true, minlength: 3 },
            company_email: { required: true, email: true },
            company_phone: { required: true, digits: true, minlength: 10, maxlength: 15 },
            company_address: { required: true, minlength: 10 }
        },
        messages: {
            company_name: { required: "Please enter the company name", minlength: "Company name must be at least 3 characters long" },
            company_email: { required: "Please enter the company email", email: "Enter a valid email address" },
            company_phone: { required: "Please enter the contact number", digits: "Only numbers are allowed", minlength: "Contact number must be at least 10 digits", maxlength: "Contact number cannot exceed 15 digits" },
            company_address: { required: "Please enter the company address", minlength: "Address must be at least 10 characters long" }
        }
    });
});
</script>
<?php include 'common_pages/footer.php'; ?>
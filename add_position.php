<?php include 'common_pages/header.php'; ?>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Position Form :</h2>
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
                            <form role="form" method="post" action="action_code.php" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Position Name</label>
                                        <input type="text" class="form-control" name="" id="" placeholder="Enter Position Name" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Profile Photo</label>
                                        <input type="file" id="" name="profile-photo" />
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="manage_position.php" class="btn btn-danger">Cancel</a>
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
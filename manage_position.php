<?php include 'common_pages/header.php'; ?>
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
                                        <th>Posi_ID</th>
                                        <th>Position Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>1</td>
                                        <td>CEO</td>
                                        <td class="">
                                            <a href="#" class="btn btn-danger">Delete</a>
                                            <a href="#" class="btn btn-info">EDIT</a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>2</td>
                                        <td>President</td>
                                        <td class="">
                                            <a href="#" class="btn btn-danger">Delete</a>
                                            <a href="#" class="btn btn-info">EDIT</a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>3</td>
                                        <td>Director</td>
                                        <td class="">
                                            <a href="#" class="btn btn-danger">Delete</a>
                                            <a href="#" class="btn btn-info">EDIT</a>
                                        </td>
                                    </tr>
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
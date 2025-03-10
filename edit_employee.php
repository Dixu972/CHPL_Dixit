<?php 

include_once 'controller/access_control.php';
include 'common_pages/header.php'; 

?>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Form :</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Employee Form Element
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post" action="" enctype="multipart/form-data">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Employee Full Name</label>
                                        <input type="text" class="form-control" name="" id="" placeholder="Enter Full Name" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Enter Email" />
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" type="password" placeholder="Enter Password" />
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label><br />
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" value="male" /> Male
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" value="female" /> Female
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" value="other" /> Other
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        <input class="form-control" type="text" placeholder="Enter Contact Number" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Salary</label>
                                        <input class="form-control" type="number" placeholder="Enter Salary" />
                                    </div>
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select class="form-control">
                                            <option>HR</option>
                                            <option>Sales</option>
                                            <option>Marketing</option>
                                            <option>Engineering</option>
                                            <option>Finance</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input class="form-control" type="text" placeholder="Enter Designation" />
                                    </div>
                                    <div class="form-group">
                                        <label>Joining Date</label>
                                        <input class="form-control" type="date" />
                                    </div>
                                    <div class="form-group">
                                        <label>Profile Photo</label>
                                        <input type="file" id="" name="profile-photo" />
                                    </div>
                                </div>
                                <button type="submit" class=" edit-btn btn btn-primary">Update</button>
                                <a href="manage_employee.php" class="btn btn-danger">Cancel</a>
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
<?php include 'common_pages/footer.php';?>
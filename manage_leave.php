<?php

include_once 'common_pages/header.php';
include 'controller/access_control.php';


// include 'controller/dbconfig.php';

// Fetch statuses from the database
// $query = "SELECT * FROM leave_status";
// $result = mysqli_query($conn, $query);
// $row = mysqli_fetch_assoc($result);


?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Employee Leave Data Table</h2>
            </div>
        </div>
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
                            <table class="table small table-striped table-responsive table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Leave ID</th>
                                        <th>Employee Name</th>
                                        <th>Leave_type</th>
                                        <th>Leave_start</th>
                                        <th>Leave_end</th>
                                        <th>Leave_status_id</th>
                                        <th>Leave_status</th>
                                        <th>Leave_approved_by</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>1</td>
                                        <td>Dixit Patel</td>
                                        <td>CL</td>
                                        <td>2025/01/06</td>
                                        <td>2000/01/06</td>
                                        <td>0</td>
                                        <td>Approve</td>
                                        <td>senior Hr</td>
                                        <td class="">
                                            <!-- Approve Button -->
                                            <form action="your_script.php" method="POST" style="display:inline;">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" name="approve_btn" value="1" class="btn btn-success">Approve</button>
                                            </form>

                                            <!-- Reject Button -->
                                            <form action="your_script.php" method="POST" style="display:inline;">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" name="reject_btn" value="0" class="btn btn-danger">Reject</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /. ROW  -->
</div>

</div>
<!-- /. PAGE INNER  -->
</div>

<?php include 'common_pages/footer.php'; ?>
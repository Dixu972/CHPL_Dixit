<?php

include 'controller/access_control.php';
include_once 'common_pages/header.php';
include 'controller/dbconfig.php';

// Fetch form database
$leave = "SELECT l.l_id,c.company_name,u.u_name,lt.type_name,l.l_reason,l.l_start_date,l.l_end_date,ls.status_name,a.admin_name from leave_master l 
LEFT JOIN company_master c ON l.company_id=c.company_id
LEFT JOIN user_master u ON l.u_id=u.u_id
LEFT JOIN leave_types lt ON l.leave_type_id=lt.id
LEFT JOIN leave_statuses ls ON l.l_status_id=ls.id
LEFT JOIN admin_master a ON l.l_approved_by=a.admin_id";

$result = mysqli_query($conn, $leave);


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
                                        <th>Company Name</th>
                                        <th>Employee Name</th>
                                        <th>Leave Type</th>
                                        <th>Reason</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Leave_status</th>
                                        <th>Leave_approved_by</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($result as $l) {?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $l['l_id'];?></td>
                                        <td><?php echo $l['company_name'];?></td>
                                        <td><?php echo $l['u_name'];?></td>
                                        <td><?php echo $l['type_name'];?></td>
                                        <td><?php echo $l['l_reason'];?></td>
                                        <td><?php echo $l['l_start_date'];?></td>
                                        <td><?php echo !empty($l['l_end_date']) ? $l['l_end_date'] : '---';?></td>
                                        <td><b><?php echo $l['status_name'];?></b></td>
                                        <td><?php echo $l['admin_name'];?></td>
                                        <td>
                                            <!-- Approve Button -->
                                            <form action="action_code.php" method="POST" style="display:inline;">
                                                <input type="hidden" name="approve_lid" value="<?php echo $l['l_id']; ?>">
                                                <button type="submit" name="approve_btn" value="1" class="btn btn-success">Approve</button>
                                            </form>

                                            <!-- Reject Button -->
                                            <form action="action_code.php" method="POST" style="display:inline;">
                                                <input type="hidden" name="reject_lid" value="<?php echo $l['l_id']; ?>">
                                                <button type="submit" name="reject_btn" value="0" class="btn btn-danger lv_rej">Reject</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php } ?>
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
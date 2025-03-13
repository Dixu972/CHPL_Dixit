<?php

include 'common_pages/header.php';
include 'controller/dbconfig.php';

// fetch count of employee registration

$sql = "SELECT COUNT(u_id) AS active_users FROM user_master WHERE u_is_delete = 0";
$result = mysqli_query($conn, $sql);
$activeUsers = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $activeUsers = $row['active_users'];
}

// comapny count

$comp = "SELECT COUNT(company_name) AS reg_com FROM company_master";
$result = mysqli_query($conn, $comp);
$reg_com = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $reg_com = $row['reg_com'];
}

// dynamic data of month for total working days 

function getWorkingDaysAndWeekOffs($month, $year)
{
    $startDate = strtotime("$year-$month-01");
    $endDate = strtotime("$year-$month-" . date('t', $startDate)); // Last date of the month
    $totalWorkingDays = 0;
    $leftWorkingDays = 0;
    $totalWeekOffs = 0;
    $today = strtotime(date('Y-m-d')); // Current date

    for ($date = $startDate; $date <= $endDate; $date = strtotime("+1 day", $date)) {
        $dayOfWeek = date('N', $date); // 1 (Monday) to 7 (Sunday)

        if ($dayOfWeek == 6 || $dayOfWeek == 7) {
            // Count Saturdays & Sundays as week offs
            $totalWeekOffs++;
            continue;
        }

        $totalWorkingDays++;

        if ($date >= $today) {
            $leftWorkingDays++;
        }
    }

    return [$totalWorkingDays, $leftWorkingDays, $totalWeekOffs];
}

// Get current month and year
$month = date('m');
$year = date('Y');
$monthName = date('F');

// Calculate working days and week offs
list($totalWorkingDays, $leftWorkingDays, $totalWeekOffs) = getWorkingDaysAndWeekOffs($month, $year);


?>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>HRMS<span> <?php echo ucfirst($_SESSION['role']); ?> </span>Dashboard</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="panel panel-back noti-box" style="min-height: 210px;">
                    <span class="icon-box bg-color-blue set-icon">
                        <i class="fa fa-bell-o"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text"><?php echo $monthName; ?> Month</p>
                        <p class="text-muted" style="margin-top: 9px;">Total Working Days: <?php echo $totalWorkingDays; ?></p>
                        <p class="text-muted">Total Week Offs: <?php echo $totalWeekOffs; ?></p>
                        <p class="text-muted">Left Working Days: <?php echo $leftWorkingDays; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="panel panel-back noti-box" style="min-height: 240px;">
                    <span class="icon-box bg-color-red set-icon">
                        <i class="fa fa-copy"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">Company</p>
                        <p class="text-muted" style="margin-top: 9px;">Total Register : <?php echo $reg_com; ?></p>

                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="panel panel-back noti-box" style="min-height: 240px;">
                    <span class="icon-box bg-color-brown set-icon">
                        <i class="fa fa-users"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">Employee</p>
                        <p class="text-muted" style="margin-top: 9px; font-weight: bold;">Active Users Numbers</p>
                        <p class="text-muted">Total: <?php echo $activeUsers; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="panel panel-back noti-box" style="min-height: 240px;">
                    <span class="icon-box bg-color-green set-icon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">5 Pending</p>
                        <p class="text-muted">Leave Requests</p>
                    </div>
                </div>
            </div>

        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-blue">
                        <i class="fa fa-warning"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">Upcoming Employee Review</p>
                        <hr />
                        <p class="text-muted">
                            <span class="text-muted color-bottom-txt"><i class="fa fa-edit"></i>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Non veritatis fugiat tempora explicabo quos et repellendus eius nemo doloremque magni.
                            </span>
                        </p>
                    </div>
                </div>
            </div>


            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel back-dash">
                    <i class="fa fa-dashboard fa-3x"></i><strong> &nbsp; EMPLOYEE PERFORMANCE</strong>
                    <p class="text-muted">Track the performance of employees, monitor progress, and evaluate achievements to ensure growth and development in the organization. </p>
                </div>

            </div>
            <div class="col-md-3 col-sm-12 col-xs-12 ">
                <div class="panel ">
                    <div class="main-temp-back">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-6"> <i class="fa fa-money fa-3x"></i> Payroll </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-green set-icon">
                        <i class="fa fa-user"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">Manage Salary</p>
                        <p class="text-muted">Distribution</p>
                    </div>
                </div>

            </div>

        </div>

        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="chat-panel panel panel-default chat-boder chat-panel-head">
                    <div class="panel-heading">
                        <i class="fa fa-comments fa-fw"></i>
                        HRMS Chat Box
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu slidedown">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-refresh fa-fw"></i> Refresh
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-check-circle fa-fw"></i> Available
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-times fa-fw"></i> Busy
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-clock-o fa-fw"></i> Away
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-sign-out fa-fw"></i> Sign Out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <ul class="chat-box">
                            <li class="left clearfix">
                                <span class="chat-img pull-left">
                                    <img src="assets/img/1.png" alt="User" class="img-circle" />
                                </span>
                                <div class="chat-body">
                                    <strong>HR Admin</strong>
                                    <small class="pull-right text-muted">
                                        <i class="fa fa-clock-o fa-fw"></i>10 mins ago
                                    </small>
                                    <p>
                                        Leave request from John Doe has been approved. Please review his new leave balance.
                                    </p>
                                </div>
                            </li>
                            <li class="right clearfix">
                                <span class="chat-img pull-right">
                                    <img src="assets/img/2.png" alt="User" class="img-circle" />
                                </span>
                                <div class="chat-body clearfix">
                                    <small class="text-muted">
                                        <i class="fa fa-clock-o fa-fw"></i>12 mins ago
                                    </small>
                                    <strong class="pull-right">Jane Smith</strong>
                                    <p>
                                        Payroll for this month is ready for review. Kindly confirm by end of the day.
                                    </p>
                                </div>
                            </li>
                            <li class="left clearfix">
                                <span class="chat-img pull-left">
                                    <img src="assets/img/3.png" alt="User" class="img-circle" />
                                </span>
                                <div class="chat-body clearfix">
                                    <strong>HR Admin</strong>
                                    <small class="pull-right text-muted">
                                        <i class="fa fa-clock-o fa-fw"></i>15 mins ago
                                    </small>
                                    <p>
                                        Performance review for Sarah Lee is due next week. Ensure feedback is collected from managers.
                                    </p>
                                </div>
                            </li>
                            <li class="right clearfix">
                                <span class="chat-img pull-right">
                                    <img src="assets/img/4.png" alt="User" class="img-circle" />
                                </span>
                                <div class="chat-body clearfix">
                                    <small class="text-muted">
                                        <i class="fa fa-clock-o fa-fw"></i>20 mins ago
                                    </small>
                                    <strong class="pull-right">Michael Clark</strong>
                                    <p>
                                        Employee John Doe's salary increment has been processed. HR team to notify him.
                                    </p>
                                </div>
                            </li>
                            <li class="left clearfix">
                                <span class="chat-img pull-left">
                                    <img src="assets/img/1.png" alt="User" class="img-circle" />
                                </span>
                                <div class="chat-body">
                                    <strong>HR Admin</strong>
                                    <small class="pull-right text-muted">
                                        <i class="fa fa-clock-o fa-fw"></i>25 mins ago
                                    </small>
                                    <p>
                                        New employee onboarding completed for Emma Watson. HR documents sent.
                                    </p>
                                </div>
                            </li>
                            <li class="right clearfix">
                                <span class="chat-img pull-right">
                                    <img src="assets/img/2.png" alt="User" class="img-circle" />
                                </span>
                                <div class="chat-body clearfix">
                                    <small class="text-muted">
                                        <i class="fa fa-clock-o fa-fw"></i>30 mins ago
                                    </small>
                                    <strong class="pull-right">John Doe</strong>
                                    <p>
                                        Just submitted a request for sick leave. Please confirm if it's been reviewed.
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <!-- Employee Status Panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Employee Status
                    </div>
                    <div class="panel-body">
                        <span class="label label-default">Inactive</span>
                        <span class="label label-primary">Active</span>
                        <span class="label label-success">On Leave</span>
                        <span class="label label-info">Vacation</span>
                        <span class="label label-warning">Pending Approval</span>
                        <span class="label label-danger">Terminated</span>
                    </div>
                </div>

                <!-- Attendance Overview Panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Attendance Overview
                    </div>
                    <div class="panel-body">
                        <h4>Employee Attendance Summary</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="attendance-box">
                                    <h5>Total Working Days</h5>
                                    <p><strong>22 Days</strong></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="attendance-box">
                                    <h5>Days Attended</h5>
                                    <p><strong>20 Days</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="attendance-box">
                                    <h5>Absent Days</h5>
                                    <p><strong>2 Days</strong></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="attendance-box">
                                    <h5>On-time Arrivals</h5>
                                    <p><strong>19 Days</strong></p>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <h5><strong>Leave Summary</strong></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="attendance-box">
                                    <h6>Sick Leave Taken</h6>
                                    <p><strong>1 Day</strong></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="attendance-box">
                                    <h6>Casual Leave Taken</h6>
                                    <p><strong>1 Day</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /. ROW  -->

        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>

<?php include 'common_pages/footer.php'; ?>
<?php
session_start();

include('dbconfig.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Data</title>
    <!-- bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jquery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.semanticui.min.css">
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.semanticui.min.js"></script>
    <!-- bootstrap icon CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- fancyBox CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

    <!-- jquery date moment CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <!-- sweetAlert CDN -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        body {
            background: rgb(171, 238, 250);
            background: -webkit-linear-gradient(to right, rgb(253, 226, 191), rgb(204, 237, 243));
            background: linear-gradient(to right, rgb(248, 224, 192), rgb(201, 247, 255));
        }

        #empTable {
            overflow-x: auto;
        }
    </style>
</head>

<body>
    <div class="container-fluid mt-3">
        <span class="h2 fst-italic text-uppercase text-danger">Employee Data</span>
        <a href="reg_form.php" class="btn btn-primary float-end">Register</a>
        <hr>
        <table class="col-sm-12 small" id="empTable" class=" text-center table-responsive table table-bordered table-striped" style="align-items: center;">
            <thead>
                <tr>
                    <th>EMP. ID</th>
                    <th>Employee Name</th>
                    <th>Email</th>
                    <th>M.No</th>
                    <th>Gender</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Skills</th>
                    <th>Salary</th>
                    <th>Joining Date</th>
                    <th>Profile Picture</th>
                    <th>Action</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $view = "SELECT * FROM employees";
                $view_run = mysqli_query($conn, $view);

                if (mysqli_num_rows($view_run) > 0) {

                    foreach ($view_run as $v) {
                ?>
                        <tr>
                            <td><?php echo $v['emp_id']; ?></td>
                            <td><?php echo $v['emp_name']; ?></td>
                            <td><?php echo $v['email']; ?></td>
                            <td><?php echo $v['phone_number']; ?></td>
                            <td><?php echo $v['gender']; ?></td>
                            <td><?php echo $v['department']; ?></td>
                            <td><?php echo $v['designation']; ?></td>
                            <td><?php echo $v['skills']; ?></td>
                            <td><?php echo $v['salary']; ?></td>
                            <td class="date_format">
                                <?php echo $v['joining_date']; ?>
                            </td>
                            <td>
                                <a href="./assets/userimg/<?php echo $v['profile_picture']; ?>" data-fancybox>
                                    <img src="./assets/userimg/<?php echo $v['profile_picture']; ?>" alt="profile_pic" width="80px">
                                </a>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <button class="me-2 border-0"><a href="edit_form.php?edit=<?php echo $v['emp_id']; ?>" class=""><i class="bi bi-pencil-square text-success h3"></i></a></button>
                                    <form action="main_code.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $v['emp_id']; ?>">
                                        <button class="border-0" type="submit" name="del_data"><i class="bi bi-trash3-fill text-danger h3"></i></button>
                                    </form>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input toggle-status" type="checkbox" data-id="<?php echo $v['emp_id']; ?>" id="flexSwitchCheckChecked<?php echo $v['emp_id']; ?>"
                                        <?php if ($v['status'] == 'active') echo 'checked'; ?>>

                                    <label class="form-check-label fw-bold" for="flexSwitchCheckChecked<?php echo $v['emp_id']; ?>" id="status-<?php echo $v['emp_id']; ?>" style="color: <?php echo ($v['status'] == 'inactive') ? 'red' : 'black'; ?>">
                                        <?php echo ucfirst($v['status']); ?>
                                    </label>
                                </div>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#empTable').DataTable();
            responsive: true


            // toggle switch

            $('.toggle-status').on('click', function() {
                var emp_id = $(this).data('id');
                changeStatus(emp_id);
            });

            function changeStatus(emp_id) {
                var status = $('#flexSwitchCheckChecked' + emp_id).prop('checked') ? 'active' : 'inactive';

                $.ajax({
                    type: 'POST',
                    url: 'status.php',
                    data: {
                        emp_id: emp_id,
                        status: status
                    },
                    success: function(response) {
                        if (response == 'success') {
                            $('#status-' + emp_id).html(status.charAt(0).toUpperCase() + status.slice(1));
                            alert('User ' + status + ' successfully!');
                        } else {
                            alert('Error: ' + response);
                            $('#flexSwitchCheckChecked' + emp_id).prop('checked', !$('#flexSwitchCheckChecked' + emp_id).prop('checked'));
                        }
                    }
                });
            }

            $('.date_format').each(function() {
                var date = moment($(this).text());
                $(this).text(date.format('DD-MMM-YYYY'));
            });

        });

        Fancybox.bind('[data-fancybox]', {
            //
        });
    </script>
</body>

</html>
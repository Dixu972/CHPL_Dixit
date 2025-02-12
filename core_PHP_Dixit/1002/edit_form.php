<?php

include('dbconfig.php');

session_start();

$edit_id = $_GET['edit'];
$edit_get = "SELECT * FROM employees WHERE emp_id='$edit_id' ";
$run = mysqli_query($conn, $edit_get);
$e = mysqli_fetch_assoc($run);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="shortcut icon" href="./assets/checklist.png" type="image/x-icon">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery UI CSS CDN -->
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
        rel='stylesheet'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js">
    </script>
    <!-- css -->
    <style>
        body {
            background-image: url(https://img.freepik.com/free-photo/flat-lay-desk-concept-with-copy-space_23-2148236810.jpg?t=st=1738818295~exp=1738821895~hmac=fbf6302ce2666db2043f0d7685b0a1627eb66bd40295b82acadcee7a25598b17&w=1350);
        }
    </style>
</head>

<body>
    <div class="container col-md-6 mt-3">
        <h2 class="p-2 text-center text-bg-danger fst-italic">Edit Employee form</h2>


        <form action="main_code.php" class="shadow p-3 mb-5  rounded" method="post" enctype="multipart/form-data">
            <input type="hidden" name="u_id" value="<?php echo $e['emp_id']; ?>">
            <div class="mb-3 mt-3">
                <label for="e_name" class="fst-italic fw-bolder">Employee Name :</label>
                <input type="text" class="form-control" id="e_name" name="e_name" value="<?php echo $e['emp_name']; ?>">
            </div>
            <div class="mb-3 mt-3">
                <label for="e_email" class="fst-italic fw-bolder">Email:</label>
                <input type="email" class="form-control" id="e_email" name="e_email" value="<?php echo $e['email']; ?>">
            </div>
            <div class="mb-3 mt-3">
                <label for="e_mno" class="fst-italic fw-bolder">Phone Number:</label>
                <input type="number" class="form-control" id="e_mno" name="e_mno" value="<?php echo $e['phone_number']; ?>">
            </div>
            <div class="mb-3">
                <label for="" class="fst-italic fw-bolder">Gender:</label>
                <div class="d-flex">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="Male" <?php if ($e['gender'] == 'Male') echo 'checked'; ?>>
                        <label class="form-check-label pe-2" for="radio1">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="Female" <?php if ($e['gender'] == 'Female') echo 'checked'; ?>>
                        <label class="form-check-label pe-2" for="radio2">Female</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input " id="radio3" name="optradio" value="Other" <?php if ($e['gender'] == 'Other') echo 'checked'; ?>>
                        <label class="form-check-label" for="radio3">Other</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="fst-italic fw-bolder">Department :</label>
                <select class="form-select" id="department" name="department">
                    <option value=""><?php echo $e['department']; ?></option>
                    <?php
                    foreach ($departments as $department) {
                        echo '<option value="' . $department['DepartmentID'] . '">' . $department['DepartmentName'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="fst-italic fw-bolder">Designation :</label>
                <select class="form-select" id="designation " name="designation ">
                    <option value=""><?php echo $e['designation']; ?></option>
                </select>
            </div>
            <div class="mb-3">
                <label for="skills" class="fst-italic fw-bolder">Skills :</label>
                <div class="d-flex">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check1" name="skills[]" value="HTML" <?php if (in_array('HTML', explode(', ', $e['skills']))) echo 'checked'; ?>>
                        <label class="form-check-label pe-2" for="check1">HTML</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check2" name="skills[]" value="CSS" <?php if (in_array('CSS', explode(', ', $e['skills']))) echo 'checked'; ?>>
                        <label class="form-check-label pe-2" for="check2">CSS</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check3" name="skills[]" value="JavaScript" <?php if (in_array('JavaScript', explode(', ', $e['skills']))) echo 'checked'; ?>>
                        <label class="form-check-label pe-2">JavaScript</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check4" name="skills[]" value="PHP" <?php if (in_array('PHP', explode(', ', $e['skills']))) echo 'checked'; ?>>
                        <label class="form-check-label pe-2">PHP</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check5" name="skills[]" value="Laravel" <?php if (in_array('Laravel', explode(', ', $e['skills']))) echo 'checked'; ?>>
                        <label class="form-check-label pe-2">Laravel</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check6" name="skills[]" value="React" <?php if (in_array('React', explode(', ', $e['skills']))) echo 'checked'; ?>>
                        <label class="form-check-label">React</label>
                    </div>
                </div>
            </div>
            <div class="mb-3 mt-3">
                <label for="salary" class="fst-italic fw-bolder">Salary:</label>
                <input type="text" class="form-control" id="salary" name="salary" value="<?php echo $e['salary']; ?>">
            </div>
            <div class="mb-3 mt-3">
                <label for="j_date" class="fst-italic fw-bolder">Joining Date:</label>
                <input type="text" class="form-control" id="j_date" name="j_date" value="<?php echo $e['joining_date']; ?>">
            </div>
            <div class="mb-3 mt-3">
                <label for="photo" class="fst-italic fw-bolder">Profile Picture:</label>
                <input type="hidden" name="old_image" value="<?php echo $e['profile_picture']; ?>">
                <input type="file" class="form-control" id="photo" name="photo" value="<?php echo $e['profile_picture']; ?>">
                <img class="mt-2" src="./assets/userimg/<?php echo $e['profile_picture']; ?>" alt="" width="100px">
            </div>
            <button type="submit" name="updateData" class="btn btn-primary">Update Data</button>
            <a href="index.php" class="btn btn-danger">Cancel</a>
            <br>
            <br>
        </form>
    </div>
    <!-- footer -->
    <footer class="text-center bg-body-tertiary">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2025 Copyright:
            <a class="text-body fst-italic link-offset-2 link-underline link-underline-opacity-0" href="#"><b>Designed
                    By : Dixit Patel</b></a>
        </div>
    </footer>
    <!-- Script -->
    <script src="./script.js"></script>
</body>

</html>
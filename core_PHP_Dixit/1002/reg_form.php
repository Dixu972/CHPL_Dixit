<?php
session_start();
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
    <!-- css -->
    <link rel="stylesheet" href="style.css">
    <!-- jQuery UI CSS CDN -->
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
        rel='stylesheet'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <div class="container col-sm-12 col-md-12 col-lg-8 mt-3">
        <h2 class="p-2 text-center text-bg-danger fst-italic">Employee Registration form</h2>
        <form class="col-sm-12" action="main_code.php" class="shadow p-3 mb-5  rounded" method="post" enctype="multipart/form-data">
            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger">
                    <?php foreach ($_SESSION['error'] as $err) { ?>
                        <?php echo $err . '<br>'; ?>
                    <?php } ?>
                </div>
            <?php unset($_SESSION['error']);
            } ?>

            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-success">
                    <?php echo $_SESSION['message']; ?>
                </div>
            <?php unset($_SESSION['message']);
            } ?>
            <div class="mb-3 mt-3">
                <label for="e_name" class="fst-italic fw-bolder">Employee Name :</label>
                <input type="text" class="form-control" id="e_name" placeholder="Enter Your Full Name" name="e_name" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="e_email" class="fst-italic fw-bolder">Email:</label>
                <input type="email" class="form-control" id="e_email" placeholder="Enter email" name="e_email">
            </div>
            <div class="mb-3 mt-3">
                <label for="e_mno" class="fst-italic fw-bolder">Phone Number:</label>
                <input type="number" class="form-control" id="e_mno" placeholder="Enter Phone Number" minlength="10"
                    name="e_mno">
            </div>
            <div class="mb-3">
                <label for="" class="fst-italic fw-bolder">Gender:</label>
                <div class="d-flex">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="Male">
                        <label class="form-check-label pe-2" for="radio1">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="Female">
                        <label class="form-check-label pe-2" for="radio2">Female</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input " id="radio2" name="optradio" value="Other">
                        <label class="form-check-label" for="radio2">Other</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="fst-italic fw-bolder">Department :</label>
                <select class="form-select" id="department" name="department">
                    <option value="" selected disabled>Select Department </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="fst-italic fw-bolder">Designation :</label>
                <select class="form-select" id="designation" name="designation">
                    <option value="">Select Designation</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="skills" class="fst-italic fw-bolder">Skills :</label>
                <div class="d-flex">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="html" name="skills[]" value="HTML">
                        <label class="form-check-label" for="html">HTML</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="css" name="skills[]" value="CSS">
                        <label class="form-check-label" for="css">CSS</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="javascript" name="skills[]" value="JavaScript">
                        <label class="form-check-label" for="javascript">JavaScript</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="php" name="skills[]" value="PHP">
                        <label class="form-check-label" for="php">PHP</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="laravel" name="skills[]" value="Laravel">
                        <label class="form-check-label" for="laravel">Laravel</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="react" name="skills[]" value="React">
                        <label class="form-check-label" for="react">React</label>
                    </div>
                </div>
            </div>
            <div class="mb-3 mt-3">
                <label for="salary" class="fst-italic fw-bolder">Salary:</label>
                <input type="text" class="form-control" id="salary" placeholder="Enter Your Current Salary"
                    name="salary">
            </div>
            <div class="mb-3 mt-3">
                <label for="j_date" class="fst-italic fw-bolder">Joining Date:</label>
                <input type="text" class="form-control" id="j_date" name="j_date">
            </div>
            <div class="mb-3 mt-3">
                <label for="photo" class="fst-italic fw-bolder">Profile Picture:</label>
                <input type="file" class="form-control mb-3" id="photo" name="photo" onchange="showImage(this)">
                <img id="imagePreview" src="" alt="Image Preview" style="display: none; width: 100px; height: 100px;">
                <script>
                    function showImage(input) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#imagePreview').attr('src', e.target.result);
                            $('#imagePreview').show();
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                </script>
            </div>
            <button type="submit" name="reg_btn" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-info">Reset</button>
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

    <script src="script.js"></script>

</body>

</html>
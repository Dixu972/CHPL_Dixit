<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .form {
            background-color: rgb(211, 243, 241);
        }

        th,
        td {
            padding: 10px;
        }
    </style>
</head>

<body>

    <?php

    $tnameErr = $cnameErr = $mnoErr = $emailErr = $sloganErr = $s_addErr = "";
    $tname = $cname = $mno = $email = $slogan = $s_add = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["tname"])) {
            $tnameErr = "Team Name is required";
        } else {
            $tname = test_input($_POST["tname"]);
            if (!preg_match("/^[a-zA-Z-' ]{5,15}$/", $tname)) {
                $tnameErr = "Only letters, spaces allowed (5-15 characters)";
            }
        }

        if (empty($_POST["cname"])) {
            $cnameErr = "Coach Name is required";
        } else {
            $cname = test_input($_POST["cname"]);
            if (!preg_match("/^[a-zA-Z-' ]{5,10}$/", $cname)) {
                $cnameErr = "Only letters, spaces allowed (5-10 characters)";
            }
        }

        if (empty($_POST["mno"])) {
            $mnoErr = "Mobile Number is required";
        } else {
            $mno = test_input($_POST["mno"]);
            if (!preg_match("/^[0-9]{10}$/", $mno)) {
                $mnoErr = "Enter a valid 10-digit number ! Invalid Format";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
          } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Invalid email format";
            }
          }

        if (empty($_POST["slogan"])) {
            $sloganErr = "Slogan is required";
        } else {
            $slogan = test_input($_POST["slogan"]);
            if (!preg_match("/^[a-zA-Z-' ]{6,15}$/", $slogan)) {
                $sloganErr = "Only letters, spaces allowed";
            }
        }

        if (empty($_POST["s_add"])) {
            $s_addErr = "Address is required";
        } else {
            $s_add = test_input($_POST["s_add"]);
            if (strlen($s_add) < 20 or strlen($s_add) > 150) {
                $s_addErr = "Address between 20-150 characters";
            }
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>

    <div class="container">
        <div class="row form ">
            <div class="col-md-12 text-center heading text-primary">
                <h2 class="fst-italic">Cricket Team Registration Form</h2>
                <img src="https://files.jotform.com/jufs/ugurg/form_files/cricket-2.63a1c2375fd794.24804916.png?md5=qXePvbjhTJfKeE34ufKYMg&expires=1737629210"
                    alt="cricket" width="10%">
                <hr>
            </div>
            <div class="col-md-8  offset-2">

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"
                    enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="tname" class="form-label fw-bold">Team Name :</label><span class="text-danger">*</span>
                        <input type="text" class="form-control" id="tname" name="tname" minlength="5" maxlength="15"
                            value="<?php echo $tname; ?>">
                        <span class="text-danger">* <?php echo $tnameErr; ?></span>
                    </div>

                    <div class="mb-3">
                        <label for="cname" class="form-label fw-bold">Coach Full name :</label></label><span class="text-danger">*</span>
                        <input type="text" class="form-control" id="cname" name="cname" minlength="5" maxlength="10"
                            value="<?php echo $cname; ?>">
                        <span class="text-danger"> *<?php echo $cnameErr; ?></span>
                    </div>

                    <div class="mb-3">
                        <label for="mno" class="form-label fw-bold">Contact No :</label></label><span class="text-danger">*</span>
                        <input type="text" class="form-control" id="mno" name="mno" minlength="10" maxlength="10"
                            value="<?php echo $mno; ?>">
                        <span class="text-danger">* <?php echo $mnoErr; ?></span>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Mailing Address :</label></label><span class="text-danger">*</span>
                        <input type="email" class="form-control" id="email" name="email">
                        <span class="text-danger"> *<?php echo $emailErr; ?></span>
                    </div>

                    <div class="mb-3">
                        <label for="slogan" class="form-label fw-bold">Team Slogan :</label></label><span class="text-danger">*</span>
                        <input type="text" class="form-control" id="slogan" name="slogan" maxlength="15" minlength="7"
                            value="<?php echo $slogan; ?>">
                        <span class="text-danger">* <?php echo $sloganErr; ?></span>
                    </div>

                    <div class="mb-3">
                        <label for="tcolor" class="form-label fw-bold">T-shirt Colour :</label>
                        <input type="color" class="form-control" id="tcolor" name="tcolor">
                    </div>

                    <div class="mb-3">
                        <label for="s_add" class="form-label fw-bold">Street Address :</label></label><span class="text-danger">*</span>
                        <textarea class="form-control" id="s_add" name="s_add" minlength="20"
                            maxlength="150"><?php echo $s_add; ?></textarea>
                        <span class="text-danger">*<?php echo $s_addErr; ?></span>
                    </div>

                    <div class="mb-3">
                        <label for="s_city" class="form-label fw-bold">Select City:</label>
                        <select class="form-select" name="s_city" id="s_city">
                            <option selected>Select City</option>
                            <option value="ahbad">Ahmedabad</option>
                            <option value="surat">Surat</option>
                            <option value="rajkot">Rajkot</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="player" class="form-label fw-bold">Team Player :</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="player" value="11" checked>
                            <label class="form-check-label">11</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio2" name="player" value="07">
                            <label class="form-check-label">07</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="s_days" class="form-label fw-bold">Slot Book For Days:</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="option[]" value="5 days" checked>
                            <label class="form-check-label">5 Days</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="option[]" value="11 days">
                            <label class="form-check-label">11 Days</label>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary mb-3" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
    <hr>
    <!-- Show Data -->

        <div class="container">
            <div class="row">
                <div class="mt-3 row text-center">
                    <div class="col-md-12" class=" text-danger">
                        <h3>Thanks For Submitting !</h3>
                        <h5><?php echo $_REQUEST['tname']; ?></h5>
                        <hr>
                    </div>
                    <div class="col">
                        <table class="table table-dark table-bordered table-responsive">
                            <tbody class="text-primary p-2">
                                <tr>
                                    <td>Team Name</td>
                                    <td><?php echo $tname; ?></td>
                                </tr>
                                <tr>
                                    <td>Coach Name</td>
                                    <td><?php echo $cname; ?></td>
                                </tr>
                                <tr>
                                    <td>Contact No</td>
                                    <td><?php echo $mno; ?></td>
                                </tr>
                                <tr>
                                    <td>Email Id</td>
                                    <td><?php echo $email; ?></td>
                                </tr>
                                <tr>
                                    <td>Team Slogan</td>
                                    <td><?php echo $slogan; ?></td>
                                </tr>
                                <tr>
                                    <td>T-shirt Colour</td>
                                    <td><?php echo $_REQUEST['tcolor']; ?></td>
                                <tr>
                                    <td>Address</td>
                                    <td><?php echo $s_add; ?></td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td><?php echo $_REQUEST['s_city']; ?></td>
                                </tr>
                                <tr>
                                    <td>Player</td>
                                    <td><?php echo $_REQUEST['player']; ?></td>
                                </tr>
                                <tr>
                                    <td>Booking Days</td>
                                    <td>
                                        <?php
                                        $book = $_POST['option'];

                                        foreach ($book as $days) {
                                            echo $days . "<br>";
                                        } ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>
<?php
session_start();

include 'dbconfig.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert data
if (isset($_POST['reg_btn'])) {
    $error = array();

    $emp_name = $_POST['e_name'];
    if (!preg_match("/^[a-zA-Z ]{2,40}$/", $emp_name)) {
        $error[] = "Employee name should be between 2 to 40 characters and contain only letters and spaces.";
    }

    $email = $_POST['e_email'];
    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        $error[] = "Invalid email address.";
    }

    $phone_number = $_POST['e_mno'];
    if (!preg_match("/^\d{10}$/", $phone_number)) {
        $error[] = "Phone number should be 10 digits long.";
    }

    // Get  form data
    $gender = $_POST['optradio'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $skills = implode(', ', $_POST['skills']);
    $salary = $_POST['salary'];
    $joining_date = $_POST['j_date'];

    if (!preg_match("/^\d{1,10}(\.\d{1,2})?$/", $salary)) {
        $error[] = "Invalid salary format.";
    }

    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $joining_date)) {
        $error[] = "Invalid joining date format. Please use YYYY-MM-DD.";
    }

    // Upload profile picture
    $profile_picture = $_FILES['photo']['name'];
    $path = 'assets/userimg/' . $profile_picture;
    $tmp_file = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tmp_file, $path);

    // Send registration email
    $to = "$email";
    $subject = "Registration User";
    include 'sample_mail.php';
    include 'mailFunction.php';

    if (empty($error)) {
        $insert = "INSERT INTO `employees`(`emp_name`, `email`, `phone_number`, `gender`, `department`, `designation`, `skills`, `salary`, `joining_date`, `profile_picture`, `status`) VALUES ('$emp_name','$email','$phone_number','$gender','$department','$designation','$skills','$salary','$joining_date','$profile_picture','Active')";

        if (mysqli_query($conn, $insert)) {
            echo "<script>swal('Data Inserted!', 'You have inserted data successfully!', 'success');</script>";
            echo "<script>window.location.href='index.php';</script>";
            exit;
        } else {
            $error[] = "Error: " . $insert . "<br>" . mysqli_error($conn);
            foreach ($error as $err) {
                echo "<script>swal('Error!', '$err', 'error');</script>";
            }
            header('Location: reg_form.php');
            exit;
        }
    } else {
        foreach ($error as $err) {
            echo "<script>swal('Error!', '$err', 'error');</script>";
        }
        header('Location: reg_form.php');
        exit;
    }
}

// Delete data
if (isset($_POST['del_data'])) {
    $delete_id = $_POST['id'];

    // Delete profile picture
    $img_get = "SELECT profile_picture from employees";
    $result = mysqli_query($conn, $img_get);
    $row = mysqli_fetch_assoc($result);
    $image = $row['profile_picture'];
    $img_path = "assets/userimg/" . $image;
    if (file_exists($img_path)) {
        unlink($img_path);
    }

    $delete = "DELETE from employees where emp_id = '$delete_id' ";
    if (mysqli_query($conn, $delete)) {
        echo "<script>swal('Data Deleted!', 'You have deleted data successfully!', 'success');</script>";
        echo "<script>window.location.href='index.php';</script>";
        exit;
    } else {
        $error[] = "Error: " . $delete . "<br>" . mysqli_error($conn);
        foreach ($error as $err) {
            echo "<script>swal('Error!', '$err', 'error');</script>";
        }
        header('Location: reg_form.php');
        exit;
    }
}

// Update data
if (isset($_POST['updateData'])) {
    $d_id = $_POST['u_id'];
    $old_image = $_POST['old_image'];

    // Get updated form data
    $emp_name = $_POST['e_name'];
    $email = $_POST['e_email'];
    $phone_number = $_POST['e_mno'];
    $gender = $_POST['optradio'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $skills = implode(', ', $_POST['skills']);
    $salary = $_POST['salary'];
    $joining_date = $_POST['j_date'];

    // Upload new profile picture
    if ($_FILES['photo']['name'] != '') {
        $profile_picture = $_FILES['photo'];
        $upload_dir = './assets/userimg/';
        $pic_name = $profile_picture['name'];

        if (move_uploaded_file($profile_picture['tmp_name'], $upload_dir . $pic_name)) {
            unlink($upload_dir . $old_image);
            $update = "UPDATE employees SET emp_name='$emp_name', email='$email', phone_number='$phone_number', gender='$gender', department='$department', designation='$designation', skills='$skills', salary='$salary', joining_date='$joining_date', profile_picture='$pic_name' WHERE emp_id='$d_id'";
            if (mysqli_query($conn, $update)) {
                echo "<script>swal('Data Updated!', 'You have updated data successfully!', 'success');</script>";
                echo "<script>window.location.href='index.php';</script>";
                exit;
            } else {
                $error[] = "Error: " . $update . "<br>" . mysqli_error($conn);
                foreach ($error as $err) {
                    echo "<script>swal('Error!', '$err', 'error');</script>";
                }
                header('Location: reg_form.php');
                exit;
            }
        } else {
            $error[] = 'Error uploading image';
            foreach ($error as $err) {
                echo "<script>swal('Error!', '$err', 'error');</script>";
            }
            header('Location: reg_form.php');
            exit;
        }
    } else {
        $update = "UPDATE employees SET emp_name='$emp_name', email='$email', phone_number='$phone_number', gender='$gender', department='$department', designation='$designation', skills='$skills', salary='$salary', joining_date='$joining_date' WHERE emp_id='$d_id'";
        if (mysqli_query($conn, $update)) {
            echo "<script>swal('Data Updated!', 'You have updated data successfully!', 'success');</script>";
            echo "<script>window.location.href='index.php';</script>";
            exit;
        } else {
            $error[] = "Error: " . $update . "<br>" . mysqli_error($conn);
            foreach ($error as $err) {
                echo "<script>swal('Error!', '$err', 'error');</script>";
            }
            header('Location: reg_form.php');
            exit;
        }
    }
}

mysqli_close($conn);

?>

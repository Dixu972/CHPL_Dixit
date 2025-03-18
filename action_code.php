<?php

session_start();

include 'controller/dbconfig.php';


// for admin registration

if (isset($_POST['register_ad_btn'])) {
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['a_email'];
    $admin_pass = password_hash($_POST['a_password'], PASSWORD_DEFAULT); // Secure password
    $role = $_POST['role'];
    $a_company_id = $_POST['a_company_id'];

    // Check if email already exists
    $checkEmail = "SELECT * FROM admin_master WHERE admin_email = '$admin_email'";
    $result = mysqli_query($conn, $checkEmail);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['error_message'] = "Email already registered!";
        header("Location: admin_reg.php");
        exit();
    }

    // Insert Query
    $query = "INSERT INTO admin_master (admin_name, admin_email, admin_pass, role,a_company_id) 
              VALUES ('$admin_name', '$admin_email', '$admin_pass', '$role','$a_company_id')";

    if (mysqli_query($conn, $query)) {
        $_SESSION['success_message'] = "Admin registered successfully!";
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['error_message'] = "Registration failed. Please try again.";
        header("Location: admin_reg.php");
        exit;
    }
}


// login code
if (isset($_POST['login'])) {
    $a_email = $_POST['a_email'];
    $a_password = $_POST['a_password'];

    // Secure SQL Query (Prepared Statement)
    $login = "SELECT * FROM admin_master WHERE admin_email = ?";
    $stmt = mysqli_prepare($conn, $login);
    mysqli_stmt_bind_param($stmt, "s", $a_email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if email exists
    if ($row = mysqli_fetch_assoc($result)) {

        // Verify password
        if (password_verify($a_password, $row['admin_pass'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['a_email'] = $a_email;
            $_SESSION['role'] = $row['role'];
            $_SESSION['admin_id'] = $row['admin_id'];
            $_SESSION['a_company_id'] = $row['a_company_id'];
            $_SESSION['admin_name'] = $row['admin_name'];

            // Role-based Allowed Pages
            if ($row['role'] == 'company_admin') {
                $allowedPages = ['welcome.php', 'manage_company.php', 'manage_employee.php', 'manage_department.php', 'manage_position.php', 'manage_leave.php', 'manage_attendance.php','edit_employee.php'];
            } else { // Super Admin
                $allowedPages = ['welcome.php', 'add_company.php', 'add_department.php', 'add_position.php', 'edit_employee.php', 'edit_department.php', 'edit_position.php', 'edit_company.php', 'manage_employee.php', 'manage_department.php', 'manage_position.php', 'manage_company.php', 'manage_leave.php', 'manage_attendance.php'];
            }

            // Encrypt & Store in Cookies
            $encryptedPages = openssl_encrypt(json_encode($allowedPages), 'AES-128-ECB', '9d@X!vP5bG8&kLz2');
            setcookie('admin_access', $encryptedPages, time() + (3600), "/");

            $_SESSION['success_message'] = ucfirst($_SESSION['role']) . " login successfully !";
            header('Location: welcome.php');
            exit;
        } else {
            // Wrong password
            $_SESSION['error_message'] = 'Invalid login credentials.';
            header('Location: index.php');
            exit;
        }
    } else {
        // Email does not exist
        $_SESSION['error_message'] = 'Invalid login credentials.';
        header('Location: index.php');
        exit;
    }
}


// insert data of company

if (isset($_POST['comp_reg'])) {
    $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
    $company_email = mysqli_real_escape_string($conn, $_POST['company_email']);
    $company_phone = mysqli_real_escape_string($conn, $_POST['company_phone']);
    $company_address = mysqli_real_escape_string($conn, $_POST['company_address']);

    // Insert query
    $sql = "INSERT INTO company_master (company_name, company_email, company_phone, company_address) 
            VALUES ('$company_name', '$company_email', '$company_phone', '$company_address')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = "Company Register successfully!";
        header("Location: manage_company.php");
        exit;
    } else {
        $_SESSION['error_message'] = 'Something Wrong !';
        header('Location: add_company.php');
        exit;
    }
}

// update data of company

if (isset($_POST['comp_update'])) {
    $id = $_POST['u_id'];
    $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
    $company_email = mysqli_real_escape_string($conn, $_POST['company_email']);
    $company_phone = mysqli_real_escape_string($conn, $_POST['company_phone']);
    $company_address = mysqli_real_escape_string($conn, $_POST['company_address']);

    $sql = "UPDATE company_master SET 
                company_name = '$company_name', 
                company_email = '$company_email', 
                company_phone = '$company_phone', 
                company_address = '$company_address' 
            WHERE company_id = '$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = "Company Update successfully!";
        header("Location: manage_company.php");
        exit;
    } else {
        $_SESSION['error_message'] = 'Update Data Failed !';
        header('Location: edit_company.php');
        exit;
    }
}

// delete company

if (isset($_GET['delete_comp'])) {

    $id = intval($_GET['delete_comp']); // Convert to integer for security

    $sql = "DELETE FROM company_master WHERE company_id = '$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = "Company Deleted successfully!";
        header("Location: manage_company.php");
        exit;
    } else {
        $_SESSION['error_message'] = 'Error deleting record !';
        header('Location: manage_company.php');
        exit;
    }
}

// insert Department of company

if (isset($_POST['reg_dept'])) {
    $company_id = mysqli_real_escape_string($conn, $_POST['company_id']);
    $dept_name = mysqli_real_escape_string($conn, $_POST['dept_name']);

    // Insert query
    $sql = "INSERT INTO dept_master(company_id, dept_name) 
            VALUES ('$company_id', '$dept_name')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = "Department Register successfully!";
        header("Location: manage_department.php");
        exit;
    } else {
        $_SESSION['error_message'] = 'Something Wrong !';
        header('Location: add_department.php');
        exit;
    }
}

// update Department of company

if (isset($_POST['update_dept'])) {

    $dept_id = intval($_POST['dept_id']);
    $company_id = intval($_POST['company_id']);
    $dept_name = mysqli_real_escape_string($conn, $_POST['dept_name']);

    $query = "UPDATE dept_master SET company_id = $company_id, dept_name = '$dept_name' WHERE dept_id = $dept_id";

    if (mysqli_query($conn, $query)) {
        $_SESSION['success_message'] = "Department Update successfully!";
        header("Location: manage_department.php");
        exit;
    } else {
        $_SESSION['error_message'] = 'Something Wrong !';
        header('Location: edit_department.php');
        exit;
    }
}

// Delete Department of company

if (isset($_GET['del_dept_id'])) {

    $id = intval($_GET['del_dept_id']); // Convert to integer for security

    $sql = "DELETE FROM dept_master WHERE dept_id = '$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = "Department Deleted successfully!";
        header("Location: manage_department.php");
        exit;
    } else {
        $_SESSION['error_message'] = 'Error deleting record !';
        header('Location: manage_department.php');
        exit;
    }
}

// insert Position

if (isset($_POST['reg_pos'])) {
    $company_id = mysqli_real_escape_string($conn, $_POST['company_id']);
    $dept_id = mysqli_real_escape_string($conn, $_POST['dept_id']);
    $position_name = mysqli_real_escape_string($conn, $_POST['position_name']);

    $query = "INSERT INTO position_master (company_id, dept_id, position_name) VALUES ('$company_id', '$dept_id', '$position_name')";

    if (mysqli_query($conn, $query)) {
        $_SESSION['success_message'] = "Position Register successfully!";
        header("Location: manage_position.php");
        exit;
    } else {
        $_SESSION['error_message'] = 'Something Wrong !';
        header('Location: add_position.php');
        exit;
    }
}

// update position

if (isset($_POST['u_reg_pos'])) {

    $position_id = mysqli_real_escape_string($conn, $_POST['u_position_id']);
    $company_id = mysqli_real_escape_string($conn, $_POST['company_id']);
    $dept_id = mysqli_real_escape_string($conn, $_POST['dept_id']);
    $position_name = mysqli_real_escape_string($conn, $_POST['position_name']);

    $query = "UPDATE position_master SET company_id='$company_id', dept_id='$dept_id', position_name='$position_name' WHERE position_id='$position_id'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['success_message'] = "Position Updated successfully!";
        header("Location: manage_position.php");
        exit;
    } else {
        $_SESSION['error_message'] = 'Something Wrong !';
        header('Location: manage_position.php');
        exit;
    }
}

// delete position

if (isset($_GET['delete_pos'])) {

    $id = intval($_GET['delete_pos']); // Convert to integer for security

    $sql = "DELETE FROM position_master WHERE position_id = '$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = "Position Deleted successfully!";
        header("Location: manage_position.php");
        exit;
    } else {
        $_SESSION['error_message'] = 'Error deleting record !';
        header('Location: manage_position.php');
        exit;
    }
}


// leave approve reject code


$admin_id = $_SESSION['admin_id'];
$admin_role = $_SESSION['role']; // Check if company_admin or super admin
$admin_company_id = $_SESSION['a_company_id']; // Store company_id if company_admin

if (isset($_POST['approve_btn'])) {

    $leave_id = $_POST['approve_lid'];

    // Check if leave is already approved or rejected
    $query = "SELECT l_status_id,company_id FROM leave_master WHERE l_id = $leave_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (($row['l_status_id'] == 1 or $row['l_status_id'] == 3) and ($row['company_id'] == $admin_company_id or $admin_role == "superadmin")) {
        $updateQuery = "UPDATE leave_master SET l_status_id = 2, l_approved_by = $admin_id WHERE l_id = $leave_id";
        mysqli_query($conn, $updateQuery);
        $_SESSION['success_message'] = "Leave Approved Successfully !";
    } else {
        $_SESSION['error_message'] = "You Are Not Authorize To Approve !";
    }
    header("Location: manage_leave.php");
    exit();
}

if (isset($_POST['reject_btn'])) {
    $leave_id = $_POST['reject_lid'];

    // Check if leave is already approved or rejected
    $query = "SELECT l_status_id,company_id FROM leave_master WHERE l_id = $leave_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (($row['l_status_id'] == 1 or $row['l_status_id'] == 2) and ($row['company_id'] == $admin_company_id or $admin_role == "superadmin")) {
        $updateQuery = "UPDATE leave_master SET l_status_id = 3, l_approved_by = $admin_id WHERE l_id = $leave_id";
        mysqli_query($conn, $updateQuery);
        $_SESSION['success_message'] = "Leave Rejected Successfully !";
    } else {
        $_SESSION['error_message'] = "You Are Not Authorize To Approve !";
    }
    header("Location: manage_leave.php");
    exit();
}

// employee delete code and edit 

if (isset($_GET['emp_del'])) {

    $emp_id = intval($_GET['emp_del']); // Convert to integer for security

    $sql = "UPDATE user_master SET u_is_delete = 1 WHERE u_id = '$emp_id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = "Employee Deleted successfully!";
        header("Location: manage_employee.php");
        exit;
    } else {
        $_SESSION['error_message'] = 'Error deleting record !';
        header('Location: manage_employee.php');
        exit;
    }
}


// for emp update of salary
if (isset($_POST['update_employee_btn'])) {

    $u_id = $_POST['emp_u_id'];
    $u_name = $_POST['u_name'];
    $u_email = $_POST['u_email'];
    $u_phone = $_POST['u_phone'];
    $u_dob = $_POST['u_dob'];
    $u_joining_Date = $_POST['u_joining_Date'];
    $u_salary = $_POST['u_salary'];
    $dept_id = $_POST['dept_id'];
    $position_id = $_POST['position_id'];

    // // Fetch old image name from database
    // $query = "SELECT u_profile_photo FROM user_master WHERE u_id = '$u_id'";
    // $result = mysqli_query($conn, $query);
    // $row = mysqli_fetch_assoc($result);
    // $old_image = $row['u_profile_photo'];


    // Image Upload Logic
    if (!empty($_FILES['profile-photo']['name'])) {
        $image_name =$_FILES['profile-photo']['name'];
        $image_tmp = $_FILES['profile-photo']['tmp_name'];
        $upload_path = "assets/upload_img/employee_img/" . $image_name;

        // Unlink old image if exists
        if (!empty($old_image) && file_exists("assets/upload_img/employee_img/" . $old_image)) {
            unlink("assets/upload_img/employee_img/" . $old_image);
        }

        // Move new image to upload folder
        move_uploaded_file($image_tmp, $upload_path);

        // Update query with new image
        $update_query = "UPDATE user_master SET 
            u_name = '$u_name', 
            u_email = '$u_email', 
            u_phone = '$u_phone', 
            u_dob = '$u_dob', 
            u_joining_Date = '$u_joining_Date', 
            u_salary = '$u_salary', 
            dept_id = '$dept_id', 
            position_id = '$position_id', 
            u_profile_photo = '$image_name' 
        WHERE u_id = '$u_id'";
    } else {
        // Update query without changing image
        $update_query = "UPDATE user_master SET 
            u_name = '$u_name', 
            u_email = '$u_email', 
            u_phone = '$u_phone', 
            u_dob = '$u_dob', 
            u_joining_Date = '$u_joining_Date', 
            u_salary = '$u_salary', 
            dept_id = '$dept_id', 
            position_id = '$position_id'
        WHERE u_id = '$u_id'";
    }

    if (mysqli_query($conn, $update_query)) {
        $_SESSION['success_message'] = "Employee Updated successfully!";
        header("Location: manage_employee.php");
        exit;
    } else {
        $_SESSION['error_message'] = 'Error Updating record !';
        header('Location: manage_employee.php');
        exit;
    }
}

mysqli_close($conn);

?>

<?php
session_start();

session_unset();

$_SESSION['success_message'] = 'Logout successfully!';

session_destroy();

?>

<!-- for sweetalert  -->
<html>

<head>
    <!-- Include SweetAlert2 from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <script>
        // SweetAlert2 message
        Swal.fire({
            title: 'Success !',
            text: 'Logout successfully!',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(function() {
            window.location.href = 'index.php';
        });
    </script>
</body>

</html>
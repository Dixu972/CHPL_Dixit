<?php

// $view = "SELECT * FROM employees";
// $view_run = mysqli_query($conn, $view);
// $view_data = mysqli_fetch_assoc($view_run);

$message = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            background-color: #f0f0f0;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        
        .header h2 {
            margin-top: 0;
        }
        
        .content {
            padding: 20px;
        }
        
        .content p {
            margin-bottom: 20px;
        }
        
        .button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        
        .button:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Employee Login Registration</h2>
        </div>
        <div class="content">
            <p>Dear Employee,</p>
            <p>We are pleased to inform you that your employee login registration is complete.</p>
            <p>Please click the link below to login to your account:</p>
            <p><a class="button" href="https://democrm.chplgroup.org/">Login to Your Account</a></p>
            <p>If you have any questions or concerns, please do not hesitate to contact us.</p>
            <p>Thank you for your cooperation.</p>
            <p>Best regards,</p>
            <p><br>Dixit Patel</b></p>
        </div>
    </div>
</body>
</html>
';

?>

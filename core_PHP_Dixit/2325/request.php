<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="col-md-6 offset-3">
            <h3>Welcome ! Your User Name : <?php echo $_REQUEST["uname"]; ?></h3>
            <hr>
            <p><b> Your Mobile Number is: <?php echo $_REQUEST["mno"]; ?></b></p>
            <p><b> Your Age: <?php echo $_REQUEST["age"]; ?></b></p>
            <p><b> Your email address is: <?php echo $_REQUEST["email"]; ?></b></p>

            <a href="request_form.php" class="btn btn-danger">Back To Home</a>
        </div>
    </div>


</body>

</html>
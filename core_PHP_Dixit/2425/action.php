<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        th,
        td {
            padding: 10px;
        }
    </style>
</head>

<body>
    
    <div class="container">
        <div class="mt-3 row text-center">
            <div class="col-md-12">
                <h3 class="text-success">Thanks For Submitting !</h3>
                <h5><?php echo $_REQUEST['tname']; ?></h5>
                <hr>
            </div>
            <div class="col">
                <table class="table table-dark table-bordered table-responsive">
                    <tbody class="text-primary p-2">
                        <tr>
                            <td>Team Name</td>
                            <td><?php echo $_REQUEST['tname']; ?></td>
                        </tr>
                        <tr>
                            <td>Coach Name</td>
                            <td><?php echo $_REQUEST['cname']; ?></td>
                        </tr>
                        <tr>
                            <td>Contact No</td>
                            <td><?php echo $_REQUEST['mno']; ?></td>
                        </tr>
                        <tr>
                            <td>Email Id</td>
                            <td><?php echo $_REQUEST['email']; ?></td>
                        </tr>
                        <tr>
                            <td>Team Slogan</td>
                            <td><?php echo $_REQUEST['slogan']; ?></td>
                        </tr>
                        <tr>
                            <td>T-shirt Colour</td>
                            <td><?php echo $_REQUEST['tcolor']; ?></td>
                        <tr>
                            <td>Address</td>
                            <td><?php echo $_REQUEST['s_add']; ?></td>
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
                <a href="php_form.php" class="btn btn-danger">Back</a>
            </div>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>include produce a warning error and running the script</h4>
    <hr>
    <h6>With Right File name</h6>
    <?php include('data_table.php'); ?>
    <hr>
    <h6>File Not exists</h6>
    <?php include('data_tables.php'); ?>
</body>
</html>
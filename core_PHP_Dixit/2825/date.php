<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh"content="1">
    <title>Document</title>
</head>

<body>
    <h4>Date() In PHP</h4>
    <hr>
    <?php

    echo "Current Date is : " .date("d/m/Y")."<br><br>";
    echo "Current Date is : " .date("y-M-d")."<br><br>";
    echo "Today is  : " .date("l")."<br><br>";

    // copy right year

    echo "&copy 2015-".date("Y")."<br><br>";

    // time 

    date_default_timezone_set("Asia/Kolkata") ;
    echo "Current Time is : ".date("h:i:s A")."<br><br>";

    // mktime

    $new_date=mktime(15,58,35,12,31,2026);
    echo "New Created date is :".date("Y-m-d h:i:s",$new_date)."<br><br>";

    // strtotime

    $d=strtotime("+2 months");
    echo "After 2 month date is : ".date("d-m-Y",$d);

    ?>
</body>

</html>
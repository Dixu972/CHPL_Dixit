<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    function checkNum($num)
    {
        try {
            if ($num % 2 == 0) {

                throw new Exception("Number is an Even Number : $num");
            }
            echo '</br> <b>Number is an Odd Number : </b>'.$num;
        }  

        catch (Exception $e) {
            echo "</br> Exception Message: " .$e->getMessage() ." </br>";

        } finally {
            echo '</br>finally block, always executes.</br>';
        }
    }
    checkNum(19);
    checkNum(4);

    ?>

</body>

</html>
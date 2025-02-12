<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo phpversion() . "<hr>";

    // variable PG
    
    $name = "Dixit Patel";
    $_comapny = "CHPL";
    $pin = 382449;
    echo $name, $_comapny . " and $pin" . "<hr>";
    var_dump($name);
    echo "<hr>";

    $student = array("dixit", "dev", "shiv");
    print_r($student);

    $roll_no = null;
    var_dump($roll_no);

    // casting for using data type
    
    $salary = 50000;
    $salary = (float) $salary;
    var_dump($salary);

    echo "<hr>";

    // string function
    
    echo strlen($name);
    echo "<hr>";

    echo str_word_count($name) . "<br>";

    echo strtoupper($name) . "<br>";

    echo strrev($name) . "<br>";

    $website = "www.    chpl .com    ";

    echo trim($website);

    $web = "Hello Chpl Student!";
    $new_web = explode(" ", $web);

    print_r($new_web);

    echo "<br>";

    $clg = "babasaheb ambedkar";

    echo substr($clg, 4, 10) . "<br>";

    echo substr($name, 4) . "<hr>";

    // conditional statement
    
    if (10 > 8) {
        echo "10 is greater 8";
    } else {
        echo "10 isn't greater 8";
    }

    echo "<br>";

    //   ternary operator
    
    $a = true;

    echo $a = 0 ? "Morning" : "Not Morning";

    echo "<br>";

    // break statement
    
    for ($i = 2; $i <= 50; $i += 2) {
        if ($i == 24) {
            break;
        }

        echo $i . "<br>";

    }
    // continue statement
    
    for ($i = 2; $i <= 50; $i += 2) {
        if ($i == 42) {
            continue;
        }

        echo $i . "<br>";

    }
    echo "<hr>";

    // foreach for array
    
    $subject = array("maths", "chemistry", "physics", "computer");
    foreach ($subject as $sub) {
        echo $sub . "<br>";
    }

    echo "<hr>";
    // switch case 
    
    $menu = "breakfast";

    switch ($menu) {
        case "breakfast":
            $break = array("tea", "pauva", "samosa");
            foreach ($break as $b) {
                echo $b . "<br>";
            }
            break;
        case "dinner":
            $dinner = array("salad", "roti", "sabji");
            foreach ($dinner as $d) {
                echo $d . "<br>";
            }
            break;
        case "lunch":
            $lunch = array("Soups", "Parathas", "Pizza");
            foreach ($lunch as $l) {
                echo $l . "<br>";
            }
            break;
            default:
            echo "Not Valid Option !";

    }



    ?>
</body>

</html>
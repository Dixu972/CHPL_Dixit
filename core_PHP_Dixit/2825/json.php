<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h5 style="text-align: center;">JSON - Javascript object notation</h5>
    <hr>
    <?php

    $user = array(
        array("name" => "Dixit", "id" => 54, "city" => "ahmedabad"),
        array("name" => "vaibhav", "id" => 78, "city" => "rajkot"),
        array("name" => "jay", "id" => 30, "city" => "surat"),
        array("name" => "surya", "id" => 85, "city" => "surat"),
        array("name" => "mrunal", "id" => 96, "city" => "ahmedabad"),
        array("name" => "himanshu", "id" => 108, "city" => "rajkot")
    );

    echo "<h4>Json Encode Data :</h4>" . json_encode($user) . "<hr>";

    $json_obj = '[{"name":"Dixit","id":54,"city":"ahmedabad"},
    {"name":"vaibhav","id":78,"city":"rajkot"},
    {"name":"jay","id":30,"city":"surat"},
    {"name":"surya","id":85,"city":"surat"}]';

    echo "<h4>Json Decode data</h4>";


    print_r(json_decode($json_obj, true));

    echo "<br>";
    echo "<br>";


    $data = json_decode($json_obj);

    foreach ($data as $user) {
        echo $user->name . " id is " . $user->id . " and from " . $user->city . "<br>";
    }
    ?>
</body>

</html>
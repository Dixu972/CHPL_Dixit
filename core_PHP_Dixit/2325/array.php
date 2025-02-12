<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    echo "<h2>PG-1 Student List(indexed Array )</h2><br>";

    $student = ["raj", "vaibhav", "virat", "lalit"];
    print_r($student);

    echo "<hr>";

    echo "<h2>PG-2 Student Profile(Associative Array )</h2><br>";

    $stu_profile = array("name" => "himanshu", "clg name" => "vgec", "roll.no" => 123456778);

    print_r($stu_profile);
    echo "<hr>";

    echo "<h2>PG-3 Multiple Subject Grade (Associative Array ) : Display grade </h2><br>";

    $subject = array
    (
        array("Vijay", "ravi", "darshan"),
        array("english", "maths", "science"),
        array("Grade:A", "Grade:B+", "Grade:A+")
    );

    echo $subject[0][0] . " :- subject :-" . $subject[1][0] . "  " . $subject[2][0] . "<br>";
    echo $subject[0][1] . " :- subject :-" . $subject[1][1] . "  " . $subject[2][1] . "<br>";
    echo $subject[0][2] . " :- subject :-" . $subject[1][2] . "  " . $subject[2][2];

    echo "<hr>";
    echo "<h2>PG-4 Add new Student  (index Array ) : Display grade </h2><br>";

    print_r($student);

    echo "<br><br>";

    array_push($student, "purva");

    print_r($student);

    echo "<hr>";
    echo "<h2>PG-5 Display Student  with grade (Associative Array ) </h2><br>";

    $grade = array(
        "Dixit" => "A+",
        "Rajesh" => "O",
        "Kavita" => "B",
        "Suresh" => "C"
    );

    foreach ($grade as $key => $value) {
        echo "$key = $value<br>";
    }
    ;
    echo "<hr>";
    echo "<h2>PG-6 Count Total Student  </h2><br>";

    foreach ($student as $stu) {
        echo "$stu<br>";
    }
    $stu = count($student);
    echo "Total Student Of : $stu";

    echo "<hr>";
    echo "<h2>PG-7 Update Student Marks and display them  </h2><br>";

    $stu_marks = array(
        "Shivansh" => array("Science" => 85, "Maths" => 75, "Physics" => 95),
        "Moksh" => array("Science" => 75, "Maths" => 83, "Physics" => 97),
        "ravi" => array("Science" => 89, "Maths" => 85, "Physics" => 87)
    );

    echo "Old Marks :";


    foreach ($stu_marks as $key => $name) {
        echo " <h3>$key</h3><br>";
        foreach ($name as $key => $value) {
            echo "$key = $value <br>";
        }
    }

    $stu_marks["Moksh"]["Science"] = 58;

    echo "<h2>Update Marks of Moksh :</h2>";

    foreach ($stu_marks as $key => $name) {
        echo " <h3>$key</h3><br>";
        foreach ($name as $key => $value) {
            echo "$key = $value <br>";
        }
    }

    echo "<hr>";
    echo "<h2>PG-8 Multi Dimension Array Student profile with name,grade and age </h2><br>";

    $mul_profile = array
    (
        [
            "name" => "Dixit",
            "age" => 25,
            "subjects" => [
                ["subject" => "Maths", "marks" => 85, "grade" => "A"],
                ["subject" => "Science", "marks" => 90, "grade" => "A+"],
                ["subject" => "Physics", "marks" => 78, "grade" => "B"],
            ],
        ],
        array
        (
            "name" => "Purva",
            "age" => 23,
            "subjects" => array
            (
                array("subject" => "Maths", "marks" => 78, "grade" => "B"),
                array("subject" => "Science", "marks" => 87, "grade" => "A+"),
                array("subject" => "Maths", "marks" => 92, "grade" => "O"),
            )
        )
    );

    foreach ($mul_profile as $student) {
        echo "Name: " . $student["name"] . "  , Age :" . $student["age"] . "<br>";
        foreach ($student['subjects'] as $subject) {
            echo $subject['subject'] . ", Marks: " . $subject['marks'] . " , Grade: " . $subject['grade'] . "<br>";
        }
        echo "<br>";

    }

    echo "<hr>";
    echo "<h2>PG-9 create 3D array table student </h2><br>";

    $mul_profile = array
    (
        [
            "name" => "heli",
            "subjects" => [
                ["subject" => "Maths", "marks" => 85],
                ["subject" => "Science", "marks" => 90],
                ["subject" => "Physics", "marks" => 78],
            ],
        ],
        array
        (
            "name" => "vaishali",
            "subjects" => array
            (
                array("subject" => "Maths", "marks" => 78),
                array("subject" => "Science", "marks" => 87),
                array("subject" => "Maths", "marks" => 92)
            )
        )
    );
    foreach ($mul_profile as $student) {
        echo "Name: " . $student["name"] . "<br>";
        foreach ($student['subjects'] as $subject) {
            echo $subject['subject'] . ", Marks: " . $subject['marks']  . "<br>";
        }
        echo "<br>";

    }

    echo "<hr>";
    echo "<h2>PG-11 Sorting Index array (ascending & descending)</h2><br>";

    $string_num = array(25,44,0,12,60,1009);

   sort($string_num);

   print_r($string_num);

   echo "descending array <br>";


   rsort($string_num);

   print_r($string_num);
   echo "<hr>";
   echo "<h2>PG-12 Sorting Associative array (key  & value)</h2><br>";

   $stu_profile = array("name" => "himanshu", "clg name" => "vgec", "roll.no" => 123456778);

   asort($stu_profile);
   print_r($stu_profile);


   ksort($stu_profile);
   print_r($stu_profile);

   echo "<hr>";
   echo "<h2>PG-13 Sorting array of string.</h2><br>";

   $sorting = array("east","west","south","north");

   sort($sorting);

   print_r($sorting);

   echo "<hr>";

   echo "<h3>Super Global Variable Details : </h3>";


   echo "filename : ". $_SERVER['PHP_SELF'];
   echo "<br>";
   echo "Server Information : ". $_SERVER['SERVER_NAME'];
   echo "<br>";
   echo "Method : " .$_SERVER['REQUEST_METHOD'];

    ?>

</body>

</html>
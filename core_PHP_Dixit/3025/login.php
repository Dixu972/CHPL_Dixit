<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$conn = mysqli_connect("localhost", "root", "", "chpl_2025");

if (!$conn) {
    die("connection Failed !") . mysqli_connect_error();
}
echo "Successfully Connected With DB . <br>";

// create table 
/*

$sql = "CREATE TABLE User_Reg 
(
id INT(11) AUTO_INCREMENT PRIMARY KEY,
u_name VARCHAR(50) NOT NULL ,
Email VARCHAR(100) UNIQUE NOT NULL,
password varchar(255) UNIQUE NOT NULL,
u_add text(100) Null,
DOB Date Null
)";

if(mysqli_query($conn,$sql)){
    echo "Table User_Reg Created Successfully !";
}
else{
    echo "Something Went Wrong , Try Again";
}

*/

// insert data 
/*
$insert = "INSERT INTO User_Reg VALUES ('','dixit972','dixit@gmail.com','011299','ahmedabd',''),
('','vishal005','visu@gmail.com','123456','rajkot','01-12-2002'),
('','surbhi','surbhi@gmail.com','300125','surat','24-11-1998'),
('','jigar','jigar@gmail.com','017889','ahmedabd','')";

if(mysqli_query($conn,$insert)) {
    echo "Insert data Succesfully into USER REG table !";
} else {
    "Something Wrong ! Data Not Inserted";
};

*/

// insert into last_id

/*

$sql = "INSERT INTO User_Reg (u_name,email,password) values ('akshay','akshay@gmail.com','753951')";

if (mysqli_query($conn, $sql)) {

    $last_id = mysqli_insert_id($conn);

    echo "Register Succesfully !. Last inserted ID is: " . $last_id;
  } else {
    echo "Something Wrong ! " . $sql . "<br>" . mysqli_error($conn);
  }

  */

//  select data show


$sql = "SELECT * FROM User_Reg";
$show = mysqli_query($conn, $sql);
echo "<h3><u>User Data Table </u></h3>";


if (mysqli_num_rows($show) > 0) {
    while ($row = mysqli_fetch_assoc($show)) {
        echo "id: " . $row["id"] . " -- : " . $row["u_name"] . " -- " . $row["Email"] . " -- " . $row["DOB"] . " -- " . $row["u_add"] . "<br>";
    }
} else {
    echo "0 results";
}


// sql to delete a record

/*

$sql = "DELETE FROM User_Reg WHERE id=3";

if (mysqli_query($conn, $sql)) {
  echo "data deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

*/

// Update data

/*

$sql = "UPDATE User_Reg SET u_name='janki' WHERE id=2";

if ($conn->query($sql) === TRUE) {
  echo "data updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

*/

// User Login Checking 

$email = "visu@gmail.com";
$pass = "123456";

$login = " SELECT Email,password,u_name FROM User_Reg WHERE Email='$email'  ;";

$res_login = mysqli_query($conn, $login);

if (mysqli_num_rows($res_login) > 0) {

    $data = mysqli_fetch_assoc($res_login);

    $new_email = $data['Email'];
    $new_pass = $data['password'];

    if ($new_email === $email) {
        if ($new_pass === $pass) {
            echo "<h2>Welcome User !</h2>" . $data['u_name'] . "<h2>  Login Successfully .</h2>" ;
        } else {
            echo "<h4>Password Wrong !</h4>";
        }
    }
} else {
    $pass = " SELECT password FROM User_Reg WHERE password='$pass'  ;";
    $res_login = mysqli_query($conn, $pass);

    if (mysqli_num_rows($res_login) > 0) {
        echo "<h4>Email ID Not valid or Register !</h4>";
    } else {
        echo "<h4>Both Email ID & Password Wrong ,Please Try again !</h4>";
    }
}

mysqli_close($conn);

?>

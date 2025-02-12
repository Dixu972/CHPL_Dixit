<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Object-oriented

$server = "localhost";
$username = "root";
$password = "";
$dbname = "test_2025";


// Create connection

$conn = new mysqli($server, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully.<br>";

// Create database

/* $sql = "CREATE DATABASE test_2025";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully<br>";
} else {
  echo "Error creating database: " . $conn->error;
}
  */




// Create table

/* $sql = "CREATE TABLE Emp_details (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    Emp_address VARCHAR(30) NOT NULL,
    email VARCHAR(50)
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
*/

//insert data

/* $sql= "INSERT INTO Emp_details values 
('','dixit patel','ahmedabad','test@gmail.com'),
('','vaibhav solanki','maninagar','abc@gmail.com'),
('','soham patel','rajkot','xyz@gmail.com'),
('','kishan rohan','suart','kishan@gmail.com'),
('','dev parmar','baroda','dev@gmail.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully<br>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  */

// LAST ID Check

/* $sql = "INSERT INTO Emp_details
VALUES ('','John', 'kheda', 'john@example.com')";

if (mysqli_query($conn, $sql)) {
  $last_id = mysqli_insert_id($conn);
  echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

*/

// delete data

/*
$sql="DELETE FROM Emp_details where id=7 ";

if($conn->query($sql)){
    echo "Data Deleted";
}
else{
    "Something wrong ! ".$conn->error;
}

*/

// select data query

 $select = "SELECT * FROM Emp_details";

$res=$conn->query($select);

if ($res->num_rows > 0) {
    while($data = $res->fetch_assoc()) {
      echo "id : " . $data["id"]. " - Name : " . $data["fullname"]."  ". "Address : " . $data["Emp_address"]. "  ". "Email Id : ". $data['email'] ."<br>";
    }
  } else {
    echo "0 results";
  } 

//   update data

$sql = "UPDATE Emp_details SET fullname='manisha' WHERE id=2";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully<br>";
} else {
  echo "Error updating record: " . $conn->error;
}

// order by desc

$select = "SELECT * FROM Emp_details order by fullname DESC";

$res=$conn->query($select);

echo "<h3>Desc Order table by name.</h3><br>";  


if ($res->num_rows > 0) {
    while($data = $res->fetch_assoc()) {
        
      echo "id : " . $data["id"]. " - Name : " . $data["fullname"]."  ". "Address : " . $data["Emp_address"]. "  ". "Email Id : ". $data['email'] ."<br>";
    }
  } else {
    echo "0 results";
  } 


 $conn->close();

?>  
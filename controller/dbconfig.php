<?php 

$conn=mysqli_connect("localhost","root","","hrms_db_1");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>
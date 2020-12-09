<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nemer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// $mysqli -> set_charset("utf8");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
<?php 
$website_title = "Plan2Plant";

$jsonfilelocation = "/var/www/html/plan2plant/lib/"."stagesData.json";
// == DataBase Config ==
$servername = "localhost";
$username = "";
$password = "";
$dbname = "plan2plant";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// $mysqli -> set_charset("utf8");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// ==== DEBUG ====
if (isset($_GET['getcwd'])) {
	die(getcwd());
}
// ==== DEBUG ====
?>

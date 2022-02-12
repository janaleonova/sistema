<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "www1";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("pieslēgums neizdevās: " . $conn->connect_error);
}
?>

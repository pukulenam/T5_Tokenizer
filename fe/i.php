<?php
$servername = "34.126.145.20";
$username = "t5default";
$password = "T5defaultAcc";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
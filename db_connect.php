<?php
$servername = "localhost";
$username = "root"; // Change this if needed
$password = "jignesh@6278"; // Change if you set a password
$database = "shopycloud"; // Change this

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    // echo "Connected successfully";
}
?>

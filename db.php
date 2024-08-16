<?php
$servername = "localhost";
$username = "root";
$password = "morelo1905"; 
$dbname = "ivg_comunicaciones"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
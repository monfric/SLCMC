<?php
$host = 'localhost';
$db = 'course_application_db';
$user = 'root'; // Your MySQL username
$pass = '';     // Your MySQL password

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




?>

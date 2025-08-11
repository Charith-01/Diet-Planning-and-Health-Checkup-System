<?php
$host = 'localhost';
$db = 'diet_planning_&_health_checkup_system'; // Change this to your database name
$user = 'root'; // Change this to your database username
$pass = ''; // Change this to your database password

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

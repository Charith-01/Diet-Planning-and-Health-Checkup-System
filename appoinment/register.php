<?php 
$AppointmentId = "";
$PatientName = "";
$Age = "";
$Address = "";
$ClinicType = "";
$AppointmentDate = "";

$errorMessage = "";

$servername = "localhost";
$username = "root";
$password = "";
$database = "diet_planning_&_health_checkup_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
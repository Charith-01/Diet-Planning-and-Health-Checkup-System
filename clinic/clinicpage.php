<?php
include_once '../header.php';
session_start();
?>

<?php 
$servername="localhost";
$username="root";
$password="";
$database="diet_planning_&_health_checkup_system";

// Database connection
$conn=new mysqli($servername,$username,$password,$database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch clinic data
$sql = "SELECT clinicImage, clinicName, staffInCharge, address FROM clinicdetails";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Top Clinics</title>
    <link rel="stylesheet" href="clinic.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:#0050d5;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            padding-top:60px;
            color: #fff;
        }
        .clinic-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .clinic1 {
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            width: 300px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            margin-bottom: 120px;
        }
        .clinic1 img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-bottom: 1px solid #ccc;
            margin-bottom: 15px;
            border-radius: 8px 8px 0 0;
        }
        .clinic1 h2 {
            margin-bottom: 10px;
        }
        .clinic1 h4 {
            margin-bottom: 5px;
        }  
    </style>
</head>
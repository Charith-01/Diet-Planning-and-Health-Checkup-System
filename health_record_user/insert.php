<?php
session_start(); // Start the session
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $uname = $_POST['uname'];
    $date = $_POST['date'];
    $surgeries = $_POST['surgeries'];
    $allergies = $_POST['allergies'];
    $smoke = $_POST['smoke'];
    $alcohol = $_POST['alcohol'];
    $vision = $_POST['vision'];
    $headaches = $_POST['headaches'];
    $glucose = $_POST['glucose'];
    $cholesterol = $_POST['cholesterol'];
    $pressure = $_POST['pressure'];

    // Store uname in session
    $_SESSION['uname'] = $uname;

    // Insert into database
    $sql = "INSERT INTO healthrec (uname, date, surgeries, allergies, smoke, alcohol, vision, headaches, glucose, cholesterol, pressure) 
            VALUES (:uname, :date, :surgeries, :allergies, :smoke, :alcohol, :vision, :headaches, :glucose, :cholesterol, :pressure)";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':uname', $uname);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':surgeries', $surgeries);
    $stmt->bindParam(':allergies', $allergies);
    $stmt->bindParam(':smoke', $smoke);
    $stmt->bindParam(':alcohol', $alcohol);
    $stmt->bindParam(':vision', $vision);
    $stmt->bindParam(':headaches', $headaches);
    $stmt->bindParam(':glucose', $glucose);
    $stmt->bindParam(':cholesterol', $cholesterol);
    $stmt->bindParam(':pressure', $pressure);

    if ($stmt->execute()) {
        echo "User profile created successfully!";
        header("location:read.php");
        exit();
    } else {
        echo "Error creating user profile.";
    }
}
?>
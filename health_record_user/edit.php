<?php
session_start(); // Start the session
require 'db.php';

if (isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];

    // Fetch current data
    $sql = "SELECT * FROM healthrec WHERE uname = :uname";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':uname', $uname);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get updated form data
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

        // Update database
        $sql = "UPDATE healthrec SET date = :date, surgeries = :surgeries, allergies = :allergies, 
                smoke = :smoke, alcohol = :alcohol, vision = :vision, headaches = :headaches, 
                glucose = :glucose, cholesterol = :cholesterol, pressure = :pressure 
                WHERE uname = :uname";
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
            header("Location: read.php");
            exit();
        } else {
            echo "Error updating user profile.";
        }
    }
} else {
    echo "Username not provided.";
}
?>
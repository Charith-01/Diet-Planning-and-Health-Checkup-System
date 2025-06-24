<?php
// upload_post.php

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'diet_planning_&_health_checkup_system');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Handle image upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Insert post into the database
    $sql = "INSERT INTO posts (title, description, image_url) VALUES ('$title', '$description', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        header("Location: blog.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

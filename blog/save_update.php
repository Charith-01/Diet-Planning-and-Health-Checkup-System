<?php
// save_update.php

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'diet_planning_&_health_checkup_system');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Handle image upload (optional)
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        // Update query with new image
        $sql = "UPDATE posts SET title = '$title', description = '$description', image_url = '$target_file' WHERE id = $id";
    } else {
        // Update query without new image
        $sql = "UPDATE posts SET title = '$title', description = '$description' WHERE id = $id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: blog.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!-- process_update_post.php -->
<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'diet_planning_&_health_checkup_system');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image_url = "";

    // Check if a new image was uploaded
    if (!empty($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = "uploads/" . basename($image_name);
        move_uploaded_file($image_tmp_name, $image_folder);
        $image_url = $image_folder;
    }

    // Update the post in the database
    if (!empty($image_url)) {
        $sql = "UPDATE posts SET title = '$title', description = '$description', image_url = '$image_url' WHERE id = $id";
    } else {
        $sql = "UPDATE posts SET title = '$title', description = '$description' WHERE id = $id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "<p>Post updated successfully.</p>";
    } else {
        echo "<p>Error updating post: " . $conn->error . "</p>";
    }
}

$conn->close();

// Redirect back to post details page
header("Location: post_details.php?id=$id");
exit();
?>

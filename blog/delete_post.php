<!-- delete_post.php -->
<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'diet_planning_&_health_checkup_system');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if post ID is set
if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    // Delete the post from the database
    $sql = "DELETE FROM posts WHERE id = $post_id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Post deleted successfully.</p>";
        header("Location: blog.php");
    } else {
        echo "<p>Error deleting post: " . $conn->error . "</p>";
    }
}

$conn->close();

// Redirect back to the home page
header("Location: blog.php");
exit();
?>

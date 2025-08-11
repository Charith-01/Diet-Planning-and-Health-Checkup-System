Share

CC
You said:
<?php
session_start(); // Start the session
require 'db.php';

if (isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];

    // Delete from database
    $sql = "DELETE FROM healthrec WHERE uname = :uname";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':uname', $uname);

    if ($stmt->execute()) {
        echo "User profile deleted successfully!";
        session_destroy(); // End the session after deletion
        header("Location: insert.php"); // Redirect to create page
        exit();
    } else {
        echo "Error deleting user profile.";
    }
} else {
    echo "Username not provided.";
}
?>
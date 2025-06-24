<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            font-size: 1.2em;
        }
        td {
            font-size: 1.1em;
        }
        button {
            padding: 10px 15px;
            background-color: #008cba;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #005f7f;
        }
    </style>
</head>
<body>

<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'diet_planning_&_health_checkup_system');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if post ID is set
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $post_id = intval($_GET['id']);  // Ensure the ID is an integer

    // Debugging: Display the value of $post_id to ensure it's retrieved
    echo "<p>Debug: Post ID = " . $post_id . "</p>";

    // Use a prepared statement to fetch post details
    $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
    $stmt->bind_param("i", $post_id);  // "i" stands for integer
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Display post details
        $row = $result->fetch_assoc();
        echo "
        <table>
            <tr><th>Post ID</th><td>{$row['id']}</td></tr>
            <tr><th>Title</th><td>{$row['title']}</td></tr>
            <tr><th>Description</th><td>{$row['description']}</td></tr>
        </table>
        <button onclick=\"location.href='update_post.php?id={$row['id']}'\">Update</button>
        <button onclick=\"deletePost({$row['id']})\">Delete</button>";
    } else {
        echo "<p>Post not found.</p>";
    }

    // Close the statement
    $stmt->close();
} else {
    echo "<p>No post ID provided or invalid ID.</p>";
}

// Close the connection
$conn->close();
?>

<script>
// Function to delete a post
function deletePost(postId) {
    if (confirm("Are you sure you want to delete this post?")) {
        window.location.href = `delete_post.php?id=${postId}`;
    }
}
</script>

</body>
</html>

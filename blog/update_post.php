<!-- update_post.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        label {
            margin-top: 15px;
            font-size: 1.2em;
            color: #555;
        }
        input[type="text"], textarea, input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 1em;
        }
        textarea {
            height: 150px;
            resize: vertical;
        }
        button {
            background-color: #008cba;
            color: white;
            padding: 12px;
            margin-top: 20px;
            border: none;
            border-radius: 4px;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s ease;
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
if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    // Fetch post details from the database
    $sql = "SELECT * FROM posts WHERE id = $post_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display post details in form
        echo "
        <form action='process_update_post.php' method='POST' enctype='multipart/form-data'>
            <input type='hidden' name='id' value='{$row['id']}'>
            <label for='title'>Title:</label>
            <input type='text' id='title' name='title' value='{$row['title']}' required>
            
            <label for='description'>Description:</label>
            <textarea id='description' name='description' required>{$row['description']}</textarea>
            
            <label for='image'>Current Image:</label>
            <br><img src='{$row['image_url']}' alt='{$row['title']}' style='max-width: 100%; margin-top: 10px;'>
            
            <label for='image'>Upload New Image (optional):</label>
            <input type='file' id='image' name='image' accept='image/*'>
            
            <button type='submit'>Update Post</button>
        </form>";
    } else {
        echo "<p>Post not found.</p>";
    }
} else {
    echo "<p>No post ID provided.</p>";
}

$conn->close();
?>

</body>
</html>

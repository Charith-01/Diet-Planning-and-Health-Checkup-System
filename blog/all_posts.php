<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .add-post {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }
        #description-cell {
            max-width: 600px; 
        }
        #action-cell {
            min-width: 50px; 
        }
        th {
            background-color: #008cba;
            color: white;
            font-size: 1.2em;
        }
        td {
            font-size: 1.1em;
            color: #555;
        }
        button {
            padding: 10px 15px;
            background-color: #008cba;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 0.9em;
            margin-right: 5px;
        }
        button:hover {
            background-color: #005f7f;
        }
        @media (max-width: 768px) {
            th, td {
                font-size: 0.9em;
            }
            button {
                padding: 8px 12px;
            }
        }
    </style>
</head>
<body>

<h1>All Published Posts</h1>

<!-- Add New Post button -->
<div class="add-post">
    <button onclick="location.href='add_post.php'">Add New Post</button>
    <button onclick="location.href='../dashboard/admin_dashboard.php'">Back Previous Page</button>
</div>

<table>
    <tr>
        <th>Post ID</th>
        <th>Title</th>
        <th>Description</th>
        <th id="action-cell">Actions</th> <!-- Apply min-width here -->
    </tr>

    <?php
    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'diet_planning_&_health_checkup_system');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch all posts from the database
    $sql = "SELECT * FROM posts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data for each row
        while($row = $result->fetch_assoc()) {
            echo "
            <tr>
                <td>{$row['id']}</td>
                <td>{$row['title']}</td>
                <td id='description-cell'>{$row['description']}</td>
                <td id='action-cell'> 
                    <button onclick=\"location.href='post_details.php?id={$row['id']}'\">View</button>
                    <button onclick=\"location.href='update_post.php?id={$row['id']}'\">Update</button>
                    <button onclick=\"deletePost({$row['id']})\">Delete</button>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No posts available.</td></tr>";
    }

    $conn->close();
    ?>

</table>

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

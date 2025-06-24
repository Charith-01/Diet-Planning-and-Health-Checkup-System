<!-- add_post.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Post</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Add New Post</h1>
        <nav>
            <a href="blog.php">Home</a>
        </nav>
    </header>
    
    <section>
        <form action="upload_post.php" method="POST" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <button type="submit">Add Post</button>
        </form>
    </section>
</body>
</html>
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
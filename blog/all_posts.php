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
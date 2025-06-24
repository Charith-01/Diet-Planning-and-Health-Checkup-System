<?php
  session_start();
  include_once '../header.php';
?>

<!-- blog.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie Place</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');
        
        /* Reset some default styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: black;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Style the header */
        header {
            padding: 20px 0;
            text-align: center;
            margin-bottom: 30px;
        }

        header h1 {
            font-size: 2.5em;
            margin-bottom: 0.2em;
        }

        /* Style for the posts section */
        .posts {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        /* Post card styling */
        .post {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
            position: relative;
        }

        .post:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .post img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .post h2 {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #333;
        }

        /* Adjust description styling */
        .post p {
            font-size: 1em;
            color: #555;
            margin-bottom: 10px;
            /* Remove max-height and overflow */
            transition: all 0.3s ease; /* Smooth transition */
        }

        .post p.hidden {
            display: none; /* Simply hide the element when toggled */
        }

        .post button {
            background-color: #008cba;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .post button:hover {
            background-color: #005f7f;
        }

        /* Responsive styling */
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            header h1 {
                font-size: 2em;
            }

            nav a {
                font-size: 1em;
            }

            .post h2 {
                font-size: 1.3em;
            }

            .post p {
                font-size: 0.9em;
            }

            .post button {
                font-size: 0.9em;
            }
        }
    </style>
    </head>
<body>
    <header>
        <h1>Blog Page</h1>
    </header>

    <section class="posts">
    <?php
    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'diet_planning_&_health_checkup_system');
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch blog posts from the database
    $sql = "SELECT * FROM posts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data for each row
        while($row = $result->fetch_assoc()) {
            $description = $row['description'];
            // Limit the description length (if required)
            $shortDescription = (strlen($description) > 100) ? substr($description, 0, 100) . '...' : $description;
            
            echo "
            <div class='post'>
                <img src='" . $row['image_url'] . "' alt='" . $row['title'] . "'>
                <h2>" . $row['title'] . "</h2>
                <p class='description'>$shortDescription</p>
                <button class='see-more'>See More</button>
                <p class='full-description hidden'>$description</p>
            </div>";
        }
    } else {
        echo "<p>No posts available.</p>";
    }

    $conn->close();
    ?>
    </section>

    <script>
        // Handle "See More" button clicks
        document.querySelectorAll('.post .see-more').forEach(button => {
            button.addEventListener('click', () => {
                const post = button.parentElement;
                const fullDesc = post.querySelector('.full-description');
                const shortDesc = post.querySelector('.description');

                // Toggle description visibility
                if (fullDesc.classList.contains('hidden')) {
                    fullDesc.classList.remove('hidden'); // Show full description
                    button.textContent = 'Show Less';    // Change button text to 'Show Less'
                    shortDesc.style.display = 'none';    // Hide the short description
                } else {
                    fullDesc.classList.add('hidden');    // Hide full description
                    button.textContent = 'See More';     // Reset button text to 'See More'
                    shortDesc.style.display = 'block';   // Show the short description
                }
            });
        });
    </script>
</body>
</html>

<?php
include_once '../footer.php';
?>

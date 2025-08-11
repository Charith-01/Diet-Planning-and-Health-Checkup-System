<?php
session_start(); // Start the session
require 'db.php';
include_once '../header.php';

// Check if the user is logged in
if (isset($_SESSION['uname'])) {
    $uname = htmlspecialchars($_SESSION['uname']); // Sanitize session variable

    try {
        // Prepare and execute the SQL statement
        $sql = "SELECT * FROM healthrec WHERE uname = :uname";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':uname', $uname);
        $stmt->execute();

        // Fetch the user data
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Check if the user exists
        if ($user) {
            // Add your CSS styles
            echo '<style>
                body {
                    font-family: "Arial", sans-serif;
                    margin: 0;
                    background: linear-gradient(to bottom, #0050d5, #16c5ff); /* New blue gradient */
                    color: #333;
                }

                .profile-container {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    padding: 20px;
                }

                .profile-card {
                    background-color: #ffffff; /* White background for the card */
                    width: 100%;
                    max-width: 800px;
                    border-radius: 20px;
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    text-align: center;
                    margin-top: 50px;
                }

                .profile-header {
                    background: linear-gradient(to right, #0050d5, #16c5ff); /* New blue gradient for header */
                    color: #ffffff;
                    padding: 40px 20px;
                }

                .profile-icon {
                    width: 120px;
                    height: 120px;
                    border-radius: 50%;
                    border: 5px solid #ffffff;
                }

                .profile-header h1 {
                    margin: 20px 0 10px;
                    font-size: 32px;
                }

                .profile-header p {
                    margin: 0;
                    font-size: 18px;
                }

                .profile-details {
                    padding: 20px 40px;
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 20px;
                }

                .profile-field {
                    background: #e0f2f1; /* Light teal background for fields */
                    padding: 15px;
                    border-radius: 10px;
                    font-size: 16px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    transition: transform 0.3s;
                }

                .profile-field:hover {
                    transform: scale(1.05);
                }

                .button-group {
                    display: flex;
                    justify-content: center;
                    gap: 15px;
                    padding: 20px 0 40px;
                }

                .edit-button,
                .delete-button,
                .logout-button {
                    padding: 10px 20px;
                    border-radius: 25px;
                    border: none;
                    font-size: 16px;
                    cursor: pointer;
                    text-decoration: none;
                    color: #ffffff;
                    transition: background-color 0.3s, transform 0.3s;
                }

                .edit-button {
                    background-color: #0050d5; /* Blue for edit button */
                }

                .edit-button:hover {
                    background-color: #0040b5;
                    transform: scale(1.05);
                }

                .delete-button {
                    background-color: #f44336; /* Red for delete button */
                }

                .delete-button:hover {
                    background-color: #e53935;
                    transform: scale(1.05);
                }

                .logout-button {
                    background-color: #16c5ff; /* Light blue for logout button */
                }

                .logout-button:hover {
                    background-color: #14b0e5;
                    transform: scale(1.05);
                }
            </style>';

            ?>
            <div class="profile-container">
                <div class="profile-card">
                    <div class="profile-header">
                        <img src="https://img.icons8.com/ios-filled/100/000000/user-male-circle.png" alt="Profile Icon" class="profile-icon"> <!-- Replace with actual icon path -->
                        <h1>Health Reacord Profile: <?= $uname ?></h1>
                    </div>
                    <div class="profile-details">
                        <div class="profile-field"><strong>Checkup Date:</strong> <?= htmlspecialchars($user['date']) ?></div>
                        <div class="profile-field"><strong>Surgeries:</strong> <?= htmlspecialchars($user['surgeries']) ?></div>
                        <div class="profile-field"><strong>Allergies:</strong> <?= htmlspecialchars($user['allergies']) ?></div>
                        <div class="profile-field"><strong>Smokes:</strong> <?= htmlspecialchars($user['smoke']) ?></div>
                        <div class="profile-field"><strong>Alcohol Consumption:</strong> <?= htmlspecialchars($user['alcohol']) ?></div>
                        <div class="profile-field"><strong>Vision Issues:</strong> <?= htmlspecialchars($user['vision']) ?></div>
                        <div class="profile-field"><strong>Frequent Headaches:</strong> <?= htmlspecialchars($user['headaches']) ?></div>
                        <div class="profile-field"><strong>Glucose Level:</strong> <?= htmlspecialchars($user['glucose']) ?></div>
                        <div class="profile-field"><strong>Cholesterol Level:</strong> <?= htmlspecialchars($user['cholesterol']) ?></div>
                        <div class="profile-field"><strong>Blood Pressure:</strong> <?= htmlspecialchars($user['pressure']) ?></div>
                    </div>
                    <div class="button-group">
                        <a href="edit.php" class="edit-button">Edit Profile</a>
                        <a href="delete.php" class="delete-button">Delete Profile</a>
                    </div>
                </div>
            </div>
            <?php
        } else {
            echo "User not found.";
        }
    } catch (PDOException $e) {
        // Handle error (you can log the error or show a user-friendly message)
        echo "An error occurred while retrieving user data: " . htmlspecialchars($e->getMessage());
    }
} else {
    echo "Username not provided.";
}
?>

<?php
include_once '../footer.php';
?>
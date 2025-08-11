<?php
session_start(); // Start the session
require 'db.php';

if (isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];

    // Fetch current data
    $sql = "SELECT * FROM healthrec WHERE uname = :uname";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':uname', $uname);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get updated form data
        $date = $_POST['date'];
        $surgeries = $_POST['surgeries'];
        $allergies = $_POST['allergies'];
        $smoke = $_POST['smoke'];
        $alcohol = $_POST['alcohol'];
        $vision = $_POST['vision'];
        $headaches = $_POST['headaches'];
        $glucose = $_POST['glucose'];
        $cholesterol = $_POST['cholesterol'];
        $pressure = $_POST['pressure'];

        // Update database
        $sql = "UPDATE healthrec SET date = :date, surgeries = :surgeries, allergies = :allergies, 
                smoke = :smoke, alcohol = :alcohol, vision = :vision, headaches = :headaches, 
                glucose = :glucose, cholesterol = :cholesterol, pressure = :pressure 
                WHERE uname = :uname";
        $stmt = $conn->prepare($sql);
        
        $stmt->bindParam(':uname', $uname);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':surgeries', $surgeries);
        $stmt->bindParam(':allergies', $allergies);
        $stmt->bindParam(':smoke', $smoke);
        $stmt->bindParam(':alcohol', $alcohol);
        $stmt->bindParam(':vision', $vision);
        $stmt->bindParam(':headaches', $headaches);
        $stmt->bindParam(':glucose', $glucose);
        $stmt->bindParam(':cholesterol', $cholesterol);
        $stmt->bindParam(':pressure', $pressure);

        if ($stmt->execute()) {
            header("Location: read.php");
            exit();
        } else {
            echo "Error updating user profile.";
        }
    }
} else {
    echo "Username not provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User Profile</title>
    <link rel="stylesheet" href="../CSS/health_edit.css">
    <script>
        
    </script>
</head>
<body>
    <h1>Update User Profile</h1>
    <div class="constainer">
        <form method="post" action="edit.php">
            <div class="question">
                <label for="date" class="topic1">Checkup Date:</label>
                <input type="date" id="date" name="date" value="<?= htmlspecialchars($user['date']) ?>" required><br>
            </div>

            <div class="question">
                <label for="surgeries" class="topic1">Surgeries:</label>
                <input type="text" id="surgeries" name="surgeries" value="<?= htmlspecialchars($user['surgeries']) ?>"><br>
            </div>

            <div class="question">
                <label for="allergies" class="topic1">Allergies:</label>
                <input type="text" id="allergies" name="allergies" value="<?= htmlspecialchars($user['allergies']) ?>"><br>
            </div>

            <div class="question">
                <label class="topic1">Do you smoke?</label>
                <input type="radio" id="smoke-yes" name="smoke" value="Yes" <?= $user['smoke'] == 'Yes' ? 'checked' : '' ?>>
                <label for="smoke-yes">Yes</label>
                <input type="radio" id="smoke-no" name="smoke" value="No" <?= $user['smoke'] == 'No' ? 'checked' : '' ?>>
                <label for="smoke-no">No</label><br>
            </div>

            <div class="question">
                <label class="topic1">Do you consume alcohol?</label>
                <input type="radio" id="alcohol-yes" name="alcohol" value="Yes" <?= $user['alcohol'] == 'Yes' ? 'checked' : '' ?>>
                <label for="alcohol-yes">Yes</label>
                <input type="radio" id="alcohol-no" name="alcohol" value="No" <?= $user['alcohol'] == 'No' ? 'checked' : '' ?>>
                <label for="alcohol-no">No</label><br>
            </div>

            <div class="question">
                <label class="topic1">Vision Issues:</label>
                <input type="radio" id="vision-yes" name="vision" value="Yes" <?= $user['vision'] == 'Yes' ? 'checked' : '' ?>>
                <label for="vision-yes">Yes</label>
                <input type="radio" id="vision-no" name="vision" value="No" <?= $user['vision'] == 'No' ? 'checked' : '' ?>>
                <label for="vision-no">No</label><br>
            </div>

            <div class="question">
                <label class="topic1">Frequent Headaches:</label>
                <input type="radio" id="headaches-yes" name="headaches" value="Yes" <?= $user['headaches'] == 'Yes' ? 'checked' : '' ?>>
                <label for="headaches-yes">Yes</label>
                <input type="radio" id="headaches-no" name="headaches" value="No" <?= $user['headaches'] == 'No' ? 'checked' : '' ?>>
                <label for="headaches-no">No</label><br>
            </div>

            <div class="question">
                <label for="glucose" class="topic1">Glucose Level:</label>
                <input type="text" id="glucose" name="glucose" value="<?= htmlspecialchars($user['glucose']) ?>"><br>
            </div>

            <div class="question">
                <label for="cholesterol" class="topic1">Cholesterol Level:</label>
                <input type="text" id="cholesterol" name="cholesterol" value="<?= htmlspecialchars($user['cholesterol']) ?>"><br>
            </div>

            <div class="question">
                <label for="pressure" class="topic1">Blood Pressure:</label>
                <input type="text" id="pressure" name="pressure" value="<?= htmlspecialchars($user['pressure']) ?>"><br>
            </div>

            <div class="buttons">
                <input type="submit" value="Update Profile">
                <input type="reset" value="Reset">
            </div>
        </form>
    </div>
</body>
</html>

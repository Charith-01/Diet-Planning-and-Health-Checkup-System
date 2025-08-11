<?php
session_start(); // Start the session
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $uname = $_POST['uname'];
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

    // Store uname in session
    $_SESSION['uname'] = $uname;

    // Insert into database
    $sql = "INSERT INTO healthrec (uname, date, surgeries, allergies, smoke, alcohol, vision, headaches, glucose, cholesterol, pressure) 
            VALUES (:uname, :date, :surgeries, :allergies, :smoke, :alcohol, :vision, :headaches, :glucose, :cholesterol, :pressure)";
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
        echo "User profile created successfully!";
        header("location:read.php");
        exit();
    } else {
        echo "Error creating user profile.";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../CSS/health_insert.css">
    </head>
    <body>
        <div class="img1">
        <img src="../health_record_admin/form1.jpeg" class="healthicon">
        </div>
        <h1>Comprehensive Health Checkup</h1>
        <div class="constainer">
            
                <form method="post" action="insert.php">
                <div class="question1">
                    <label for="username"> Enter your user name  :</label>
                    <input type="text" id="blood-pressure" name="uname">
                </div>
                <div class="topic1">Medical History</div>
                <div class="question">
                    <label >01. When was the last full body check-up?</label>
                    <input type="date" id="checkup-date" name="date">
                </div>
                <div class="question">
                    <label>02. Have you had any surgeries?</label>
                    <input type="radio" id="surgeries-yes" name="surgeries" value="Yes">
                    <label for="surgeries-yes">Yes</label>
                    <input type="radio" id="surgeries-no" name="surgeries" value="No" >
                    <label for="surgeries-no">No</label>
                </div>
                <div class="question">
                    <label>03. Do you have any allergies?</label>
                    <input type="radio" id="allergies-yes" name="allergies" value="Yes">
                    <label for="allergies-yes">Yes</label>
                    <input type="radio" id="allergies-no" name="allergies" value="No" >
                    <label for="allergies-no">No</label>
                </div>

                <div class="topic1">Life Style</div>
                <div class="question">
                    <label>04. Do you smoke?</label>
                    <input type="radio" id="smoke-yes" name="smoke" value="Yes">
                    <label for="smoke-yes">Yes</label>
                    <input type="radio" id="smoke-no" name="smoke" value="No" >
                    <label for="smoke-no">No</label>
                </div>
                <div class="question">
                    <label>05. Do you consume alcohol?</label>
                    <input type="radio" id="alcohol-yes" name="alcohol" value="Yes">
                    <label for="alcohol-yes">Yes</label>
                    <input type="radio" id="alcohol-no" name="alcohol" value="No" >
                    <label for="alcohol-no">No</label>
                </div>
                
                <div class="topic1">Physical Health</div>
                <div class="question">
                    <label>06. Do you have any issues with your vision?</label>
                    <input type="radio" id="vision-yes" name="vision" value="Yes">
                    <label for="vision-yes">Yes</label>
                    <input type="radio" id="vision-no" name="vision" value="No" >
                    <label for="vision-no">No</label>
                </div>
    
                <div class="question">
                    <label>07. Do you experience frequent headaches or migraines?</label>
                    <input type="radio" id="headaches-yes" name="headaches" value="Yes">
                    <label for="headaches-yes">Yes</label>
                    <input type="radio" id="headaches-no" name="headaches" value="No" >
                    <label for="headaches-no">No</label>
                </div>

                <div class="topic1">Fill</div>
                <div class="question">
                    <label for="glucose-level">08. Your glucose level:</label>
                    <input type="text" id="glucose-level" name="glucose">
                </div>
    
                <div class="question">
                    <label for="cholesterol-level">09. Your cholesterol level :</label>
                    <input type="text" id="cholesterol-level" name="cholesterol">
                </div>
    
                <div class="question">
                    <label for="blood-pressure">10. Your blood pressure :</label>
                    <input type="text" id="blood-pressure" name="pressure">
                </div>

                <div class="buttons">
                   <input type="reset" value="Reset">
                    <input type="submit" value=" Submit ">
                    
                </div>
            </form>

            
        </div>
    </body>
</html>
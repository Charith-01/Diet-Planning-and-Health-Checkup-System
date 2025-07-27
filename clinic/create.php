<?php
$ClinicImage="";
$ClinicName="";
$StaffInCharge="";
$Address="";

$errorMessage="";
$successMessage="";

$servername="localhost";
$username="root";
$password="";
$database="diet_planning_&_health_checkup_system";

//create connection
$conn=new mysqli($servername,$username,$password,$database);

//check connection
if($conn->connect_error){
    die ("Connection failed:".$conn->connect_error);
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $ClinicImage = "";
    $ClinicName=$_POST["clinicName"];
    $StaffInCharge=$_POST["staffInCharge"];
    $Address=$_POST["address"];

    // File upload handling
    if (isset($_FILES['clinicImage']) && $_FILES['clinicImage']['error'] == UPLOAD_ERR_OK) {
        $targetDir = "image/";  // Directory where images will be saved
        $targetFile = $targetDir . basename($_FILES["clinicImage"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Allow only certain file formats
        $allowedTypes = array("jpg", "jpeg", "png", "gif");
        if (in_array($imageFileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["clinicImage"]["tmp_name"], $targetFile)) {
                $ClinicImage = $targetFile;  // Save the file path to store in the database
            } else {
                $errorMessage = "There was an error uploading the file.";
            }
        } else {
            $errorMessage = "Only JPG, JPEG, PNG & GIF files are allowed.";
        }
    }
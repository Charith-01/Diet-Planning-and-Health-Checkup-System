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
    

    do{
        if(empty($ClinicName)||empty($StaffInCharge)||empty($Address)){
            $errorMessage="All the fields are required";
            break;
        }

        //add new client to database
        $sql="INSERT INTO clinicdetails(clinicImage,clinicName,staffInCharge,address)".
                "VALUES('$ClinicImage','$ClinicName','$StaffInCharge','$Address')";
        $result=$conn->query($sql);

        if(!$result){
            $errorMessage="Invalid query:".$conn->error;
            break;
        }

        $ClinicImage="";
        $ClinicName="";
        $StaffInCharge="";
        $Address="";

        $successMessage="Clinic added correctly";
        header("location:index.php");
    exit;
        
    }while(false);
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Clinic</title>
        <link rel="stylesheet" href="../CSS/clinic.css">
    </head>
    <body>
        <h2>New Clinic</h2>

        <form method="POST"enctype="multipart/form-data">
            <div class="f1">
                <label>Image:</label>
                <div>
                <input type="file" name="clinicImage" required >
                </div>
            </div>
            <div class="f2">
                <label class="f_l2">Clinic Name</label>
                <div class="textbox2">
                    <input type="text" class="f_t2" name="clinicName" value="<?php echo $ClinicName; ?>"required>
                </div>
            </div>

            <div class="f3">
                <label class="f_l3">Doctor-In-Charge</label>
                <div class="textbox3">
                    <input type="text" class="f_t3" name="staffInCharge" value="<?php echo $StaffInCharge; ?>"required>
                </div>
            </div>

            <div class="f4">
                <label class="f_l4">Address</label>
                <div class="textbox4">
                    <input type="text" class="f_t4" name="address" value="<?php echo $Address; ?>" required>
                </div>
            </div>
            
            <div class="f5">
                <div class="f_l5">
                    <button type="submit" class="btn">Submit</button>
                </div>
                
                <div class="f_l5">
                    <button><a class="btn" href="index.php" role="button">Cancel</a></button>
                </div>
            </div>
        </form>
    </body>
</html>
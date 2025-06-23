<?php 
$AppointmentId = "";
$PatientName = "";
$Age = "";
$Address = "";
$ClinicType = "";
$AppointmentDate = "";

$errorMessage = "";

$servername = "localhost";
$username = "root";
$password = "";
$database = "diet_planning_&_health_checkup_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $PatientName = $_POST["patientName"];
    $Age = $_POST["age"];
    $Address = $_POST["address"];
    $ClinicType = $_POST["clinicType"];
    $AppointmentDate = $_POST["appointmentDate"];

    do {
        if (empty($PatientName) || empty($Age) || empty($Address) || empty($ClinicType) || empty($AppointmentDate)) {
            $errorMessage = "All the fields are required";
            break;
        }

        // Insert new appointment into the database
        $sql = "INSERT INTO appointments (patientName, age, address, clinicType, appointmentDate)
                VALUES ('$PatientName', '$Age', '$Address', '$ClinicType', '$AppointmentDate')";
        $result = $conn->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $conn->error;
            break;
        }

        // Reset form fields
        $PatientName = "";
        $Age = "";
        $Address = "";
        $ClinicType = "";
        $AppointmentDate = "";

 
    } while (false);
    
}

// The last inserted appointment
$last_id = $conn->insert_id;
$sql = "SELECT appointmentId, patientName, age, address, clinicType, appointmentDate FROM appointments WHERE appointmentId = $last_id";
$result = $conn->query($sql); 

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $popupMessage = "Appointment successfully added!\\n\\n"
                  . "Appointment ID: " . $row['appointmentId'] . "\\n"
                  . "Patient Name: " . $row['patientName'] . "\\n"
                  . "Age: " . $row['age'] . "\\n"
                  . "Address: " . $row['address'] . "\\n"
                  . "Clinic Type: " . $row['clinicType'] . "\\n"
                  . "Appointment Date: " . $row['appointmentDate'];
                  
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>CLINIC Appointment</title>
    <link rel="stylesheet" href="../CSS/clinic.css">
</head>
<body>
    <h2>New Appointment</h2>
    
    <form method="POST" action="">
        
        <div class="f1">
                <label class="f_l1">Patient Name:</label>
                <div class="textbox1">
                    <input type="text" class="f_t1" name="patientName" value="<?php echo $PatientName; ?>" required>
                </div>
            </div>

            <div class="f1">
                <label class="f_l1">Age:</label>
                <div class="textbox1">
                    <input type="text" class="f_t1" name="age" value="<?php echo $Age; ?>" required>
                </div>
            </div>

            <div class="f1">
                <label class="f_l1">Address:</label>
                <div class="textbox1">
                    <input type="text" class="f_t1" name="address" value="<?php echo $Address; ?>" required>
                </div>
            </div>

            <div class="f1">
                <label class="f_l1">Clinic Type:</label>
                <select name="clinicType" id="" required>
                    <option>Cardiology Clinic</option>
                    <option>Eye Clinic</option>
                    <option>ENT Clinic</option>
                    <option>Dental Clinic</option>
                    <option>Psychological Clinic</option>
                    <option>Skin Clinic</option>
                </select>
            </div>
            <br>
            <div class="f1">
                <label class="f_l1">Appointment Date:
                <input type="date" id="date" name="appointmentDate" value="<?php echo $AppointmentDate; ?>" required >
                </label>
            </div>
            
            <div class="f5">
                <div class="f_l5">
                    <button type="submit" class="btn">Submit</button>
                </div>
                <div class="f_l5">
                    <button><a class="btn" href="../clinic/clinicpage.php" >Cancel</a></button>
                </div>
        </div>
    </form>

    <?php
    if (!empty($popupMessage)) {
        echo "<script type='text/javascript'>alert('$popupMessage');</script>";
    }
    ?>
    
    
</body>
</html>

<?php
$servername="localhost";
$username="root";
$password="";
$database="diet_planning_&_health_checkup_system";

//create connection
$conn=new mysqli($servername,$username,$password,$database);

$AppointmentId="";
$PatientName="";
$Age="";
$Address="";
$ClinicType="";
$AppointmentDate="";

$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']=='GET'){
    //GET method:show the data of the clinic
    if(!isset($_GET["appointmentId"])){
        header ("location:indexRegister.php");
        exit;
    }

    $AppointmentId=$_GET["appointmentId"];

    //read the row from selected clinic from database table
    $sql="SELECT * FROM appointments WHERE appointmentId=$AppointmentId";
    $result=$conn->query($sql);
    //read data of the clinic
    $row=$result->fetch_assoc();

    if(!$row){
        header("location:indexRegister.php");
        exit;
    }

    $AppointmentId=$row["appointmentId"];
    $PatientName=$row["patientName"];
    $Age=$row["age"];
    $Address=$row["address"];
    $ClinicType=$row["clinicType"];
    $AppointmentDate=$row["appointmentDate"];

}
else{
    //POST method:update the data of the client
    $AppointmentId=$_POST["appointmentId"];
    $PatientName=$_POST["patientName"];
    $Age=$_POST["age"];
    $Address=$_POST["address"];
    $ClinicType=$_POST["clinicType"];
    $AppointmentDate=$_POST["appointmentDate"];

    do{
        if(empty($AppointmentId)||empty($PatientName)||empty($Age)||empty($Address)||empty($ClinicType)||empty($AppointmentDate)){
            $errorMessage="All the fields are required";
            break;
        }
        //update data
        $sql = "UPDATE appointments ".
            "SET patientName='$PatientName', age='$Age', address='$Address', clinicType='$ClinicType', appointmentDate='$AppointmentDate' ".
            "WHERE appointmentId=$AppointmentId";
        $result=$conn->query($sql);

        if(!$result){
            $errorMessage="Invalid query:".$conn->error;
            break;
        }

        $successMessage="Appointment updated successfully";

        header("location:indexRegister.php");
        exit;
    }while(true);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Clinic Appointment</title>
        <link rel="stylesheet" href="../CSS/clinic.css">
    </head>
    <body>
        <h2>Update Appointment Information</h2>

        <form method="POST">
            <input type="hidden" name="appointmentId" value="<?php echo $AppointmentId; ?>">

            <div class="f2">
                <label class="f_l2">Patient Name:</label>
                <div class="textbox2">
                    <input type="text" class="f_t2" name="patientName" value="<?php echo $PatientName; ?>" required>
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
                <input type="date" id="date" name="appointmentDate" value="<?php echo $AppointmentDate; ?>" required>
                </label>
            </div>
              
            <div class="f5">
                <div class="f_l5">
                    <button type="submit" class="btn">Submit</button>
                </div>
                <div class="f_l5">
                    <a class="btn" href="indexRegister.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </body>
</html>
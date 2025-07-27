<?php
$servername="localhost";
$username="root";
$password="";
$database="diet_planning_&_health_checkup_system";

//create connection
$conn=new mysqli($servername,$username,$password,$database);


$ClinicId="";
$ClinicName="";
$StaffInCharge="";
$Address="";

$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']=='GET'){
    //GET method:show the data of the clinic
    if(!isset($_GET["clinicId"])){
        header ("location:index.php");
        exit;
    }

    $ClinicId=$_GET["clinicId"];

    //read the row from selected clinic from database table
    $sql="SELECT * FROM clinicdetails WHERE clinicid=$ClinicId";
    $result=$conn->query($sql);
    //read data of the clinic
    $row=$result->fetch_assoc();

    if(!$row){
        header("location:index.php");
        exit;
    }

    $ClinicId=$row["clinicId"];
    $ClinicName=$row["clinicName"];
    $StaffInCharge=$row["staffInCharge"];
    $Address=$row["address"];

}
else{
    //POST method:update the data of the client
    $ClinicId=$_POST["clinicId"];
    $ClinicName=$_POST["clinicName"];
    $StaffInCharge=$_POST["staffInCharge"];
    $Address=$_POST["address"];

    do{
        if(empty($ClinicId)||empty($ClinicName)||empty($StaffInCharge)||empty($Address)){
            $errorMessage="All the fields are required";
            break;
        }
        //update data
        $sql = "UPDATE clinicdetails ".
            "SET clinicName='$ClinicName', staffInCharge='$StaffInCharge', address='$Address' ".
            "WHERE clinicId=$ClinicId";
        $result=$conn->query($sql);

        if(!$result){
            $errorMessage="Invalid query:".$conn->error;
            break;
        }

        $successMessage="Clinic updated successfully";

        header("location:index.php");
        exit;
    }while(true);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Clinic</title>
        <link rel="stylesheet" href="../CSS/clinic.css">
    </head>
    <body>
        <h2>Update Clinic Information</h2>

        <form method="POST">
            <input type="hidden" name="clinicId" value="<?php echo $ClinicId; ?>" required>
            <div class="f2">
                <label class="f_l2">Clinic Name</label>
                <div class="textbox2">
                    <input type="text" class="f_t2" name="clinicName" value="<?php echo $ClinicName; ?>" required>
                </div>
            </div>

            <div class="f3">
                <label class="f_l3">Staff-In-Charge</label>
                <div class="textbox3">
                    <input type="text" class="f_t3" name="staffInCharge" value="<?php echo $StaffInCharge; ?>" required>
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
                    <a class="btn" href="index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </body>
</html>
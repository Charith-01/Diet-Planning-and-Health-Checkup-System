<?php
if(isset($_GET["clinicId"])){
    $ClinicId=$_GET["clinicId"];

    $servername="localhost";
    $username="root";
    $password="";
    $database="diet_planning_&_health_checkup_system";

    //create connection
    $conn=new mysqli($servername,$username,$password,$database);

    $sql="DELETE FROM clinicdetails WHERE clinicId=$ClinicId";
    $conn->query($sql);
}

header("location:index.php");
exit;
?>
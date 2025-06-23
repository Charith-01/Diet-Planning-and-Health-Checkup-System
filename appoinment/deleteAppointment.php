<?php
if(isset($_GET["appointmentId"])){
    $AppointmentId=$_GET["appointmentId"];

    $servername="localhost";
    $username="root";
    $password="";
    $database="diet_planning_&_health_checkup_system";

    //create connection
    $conn=new mysqli($servername,$username,$password,$database);

    $sql="DELETE FROM appointments WHERE appointmentId=$AppointmentId";
    $conn->query($sql);
    }

header("location:indexRegister.php");
exit;
?>
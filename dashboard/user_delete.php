<?php
if(isset($_GET["user_id"])){
    $id=$_GET["user_id"];

    $servername="localhost";
    $username="root";
    $password="";
    $database="diet_planning_&_health_checkup_system";

    //create connection
    $conn= new mysqli($servername,$username,$password,$database);

    $sql="DELETE FROM user_registration WHERE user_id=$id";
    $conn->query($sql);
}

header("location:user_management.php");
exit();

?>
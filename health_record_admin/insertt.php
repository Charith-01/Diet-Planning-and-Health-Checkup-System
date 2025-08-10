<?php
require 'configg.php';

$husername=$_POST["username"];
$hdate=$_POST["date"];
$hsurgery=$_POST["surgery"];
$hallergies=$_POST["allergies"];
$hsmoke=$_POST["smoke"];
$halcohol=$_POST["alcohol"];
$hvision=$_POST["vision"];
$hheadaches=$_POST["headaches"];
$hglucose=$_POST["glucose"];
$hcholesterol=$_POST["cholesterol"];
$hpressure=$_POST["pressure"];

$sql="INSERT INTO healthrec VALUES ('$husername','$hdate','$hsurgery','$hallergies','$hsmoke','$halcohol','$hvision','$hheadaches','$hglucose','$hcholesterol','$hpressure')";

if($con->query($sql))
{
    header("location:readd.php");
    exit;
}
else{
    echo "Error".$con->error;
}

$con->close();
?>
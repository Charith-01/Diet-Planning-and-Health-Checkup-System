<?php

require 'configg.php';

$uuname=$_POST["uname"];
$udate=$_POST["date"];
$usurgery=$_POST["surgery"];
$uallergies=$_POST["allergies"];
$usmoke=$_POST["smoke"];
$ualcohol=$_POST["alcohol"];
$uvision=$_POST["vision"];
$uheadaches=$_POST["headaches"];
$uglucose=$_POST["glucose"];
$ucholesterol=$_POST["cholesterol"];
$upressure=$_POST["pressure"];

if(empty($uuname)||empty($udate)||empty($usurgery)||empty($uallergies)||empty($usmoke)||empty($ualcohol)||empty($uvision)||empty($uheadaches)||empty($uglucose)||empty($ucholesterol)||empty($upressure))
{
    echo "All Required";
}
else{
    $sql="UPDATE healthrec set date='$udate', surgeries='$usurgery',allergies='$uallergies',smoke='$usmoke',alcohol='$ualcohol',vision='$uvision',headaches='$uheadaches',glucose='$uglucose',cholesterol='$ucholesterol', pressure='$upressure' WHERE uname='$uuname' ";
    if($con->query($sql))
    {
        echo "Updated";
        header("location:readd.php");
        exit();
    }
    else{
        echo "Not updated";
    }
}
?>
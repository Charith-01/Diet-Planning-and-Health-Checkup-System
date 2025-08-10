<?php
require 'configg.php';

$uname=$_POST["uname"];

$sql="DELETE FROM healthrec WHERE uname='$uname'";
if($con->query($sql))
{
    header("location:readd.php");

}
else 
{
    echo "not deleted";
}
?>


<?php
include_once 'connection.php';
$std_id=$_GET['id'];
$sql="DELETE FROM DETAIL WHERE `id`='$std_id'";
$result=mysqli_query($conn,$sql);
if($result)
{
    header("location:tabledata.php");

}else{
    echo "data not deleted";

}


?>
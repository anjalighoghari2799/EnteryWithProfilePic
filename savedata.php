<?php 
$tepname=$_FILES['photo']['tmp_name'];
$target_folder="upload";
$target_filename=$_FILES['photo']['name'];
$target_filesize=$_FILES['photo']['size'];
$target_fileserror=$_FILES['photo']['error'];
$target_filetype=$_FILES['photo']['type'];
$denobane = time().basename($target_filename);
$target_file=$target_folder."/".$denobane;
if($target_fileserror==0)
{
    $file_status=move_uploaded_file($tepname,$target_file);
}

include_once 'connection.php';
$stdname=$_POST['name'];
$stdarea=$_POST['area'];
$stdper=$_POST['per'];
$stdphoto=basename($target_filename);
if($file_status){
$sql="INSERT INTO `DETAIL` (`name`,`area`,`per`,`photo`) VALUES ('$stdname','$stdarea','$stdper','$denobane')";
}
$result=(mysqli_query($conn,$sql)) or die("Result eroor..");

if($result)
{
    header("location:tabledata.php");
}
else{
    echo "data not instered";
}




?>
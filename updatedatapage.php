<?php
$tepname=$_FILES['photo']['tmp_name'];
$target_folder="upload";
$target_filename=$_FILES['photo']['name'];
$target_filesize=$_FILES['photo']['size'];
$target_fileserror=$_FILES['photo']['error'];
$target_filetype=$_FILES['photo']['type'];
$target_file=$target_folder."/".time().basename($target_filename);
if($target_fileserror==0)
{
    $file_status=move_uploaded_file($tepname,$target_file);
}





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

 $std_id=$_POST['id'];

$n=$_POST['name'];
$a=$_POST['area'];
$per=$_POST['per'];
//$photo=$_POST['photo'];
$photo=basename($target_filename);

if($target_fileserror==0)
{
    $sql="UPDATE DETAIL SET name='{$n}',area='{$a}',per='{$per}',photo='{$denobane}' WHERE id='$std_id'";
}
else{
    $sql="UPDATE DETAIL SET name='{$n}',area='{$a}',per='{$per}' WHERE id='$std_id'";

}
$result=mysqli_query($conn,$sql);

if($result){
    header("location:tabledata.php");
}
else{
    echo "data not upload";
}






?>
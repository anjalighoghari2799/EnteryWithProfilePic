<?php
$sname="localhost";
$uname="root";
$pass="";
$dbname="stdinfo";
$conn=mysqli_connect($sname,$uname,$pass,$dbname);
if(!$conn)
{
    echo "not connect";
}
?>
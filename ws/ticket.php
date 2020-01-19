	<?php

$host="localhost";
$user="root";
$pass="";
$db="bolt";

$con=mysqli_connect($host,$user,$pass,$db);
 
$UniqueCode=$_POST['UniqueCode'];
 
$sql = "SELECT * from passager where UniqueCode='$UniqueCode';";
 
$res = mysqli_query($con,$sql);
 
$check = mysqli_fetch_array($res);
 
if(isset($check)){
echo 'success';
}else{
echo 'Echec';
}
 
mysqli_close($con);
?>
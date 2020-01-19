	<?php

$host="localhost";
$user="root";
$pass="";
$db="bolt";

$con=mysqli_connect($host,$user,$pass,$db);
 
$Pseudo_Util=$_POST['Pseudo_Util'];
$Pass_Util=sha1($_POST['Pass_Util']);
 
$sql = "select * from utilisateur where Pseudo_Util='$Pseudo_Util' and Pass_Util='$Pass_Util'";
 
$res = mysqli_query($con,$sql);
 
$check = mysqli_fetch_array($res);
 
if(isset($check)){
echo 'success';
}else{
echo 'failure';
}
 
mysqli_close($con);
?>
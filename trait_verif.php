    <?php
    include('config.php');

if (isset($_POST['submit'])){

$UniqueCode=$_POST['UniqueCode'];

$admin_query=(" SELECT * FROM passager where UniqueCode='$UniqueCode' ");
$admin=$mysqli->query($admin_query);

$row= $admin->fetch_array(MYSQLI_BOTH);

if ($row > 0){

session_start();
$_SESSION['Passager']=$row['CodePassager'];

 header("location:info_passagers.php");

}

else{
 
 echo "<script language='javascript'>\nalert(\"Code incorrect\");\n
window.location.href='verification.php';
 </script>";

?>


<?php }

}
?>  

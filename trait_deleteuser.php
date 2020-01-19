<?php
include("config.php");

if(isset($_POST['submit']))
{
	  $id=$_POST['supp'];
      
      $sql= "DELETE FROM utilisateur WHERE Id_Util='$id' ";
      $mysqli->query($sql);

var_dump($sql);
die();

header('location:utilisateurs.php');
}
 ?>
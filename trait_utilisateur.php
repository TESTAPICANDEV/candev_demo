<?php
include('config.php');

 $Nom_Util=htmlspecialchars($_POST['nom'], ENT_QUOTES) ;
 $Pren_Util=htmlspecialchars($_POST['prenom'], ENT_QUOTES);
 $Pseudo_Util=htmlspecialchars($_POST['pseudo'], ENT_QUOTES);
 $Pass_Util=sha1($_POST['pseudo']);
 $Profil_id=$_POST['profil'];
 $CodeAgence=$_POST['agence'];


$admin_query=(" SELECT * FROM Utilisateur where Pseudo_Util='$Pseudo_Util' ");
$admin=$mysqli->query($admin_query);
$row= $admin->fetch_array(MYSQLI_BOTH);


if ($row >0)

{
   echo "Old";
}
else{
      $sql=("INSERT  INTO utilisateur (CodeAgence, Profil_id, Nom_Util, Pren_Util, Pseudo_Util, Pass_Util) 
      	VALUES ('$CodeAgence', '$Profil_id', '$Nom_Util', '$Pren_Util', '$Pseudo_Util', '$Pass_Util')");
     $mysqli->query($sql);
     echo "Success";
 }



 ?>
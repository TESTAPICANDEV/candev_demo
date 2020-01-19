<?php
include('config.php');

 $NomAgence=htmlspecialchars($_POST['nom'], ENT_QUOTES);
 $Contact=$_POST['contact'];
 $Email=$_POST['email'];
 $DirectAgence=htmlspecialchars($_POST['direc'], ENT_QUOTES);


$sql= ("INSERT INTO agence (NomAgence, Contact, Email, DirectAgence) VALUES ('$NomAgence', '$Contact', '$Email', '$DirectAgence')");
$mysqli->query($sql);

echo "Success";

 ?>
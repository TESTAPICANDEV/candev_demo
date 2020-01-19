<?php
include('config.php');
session_start();
 $LibVehi=htmlspecialchars($_POST['nom'], ENT_QUOTES);
 $NbrPlace=$_POST['place'];
 $ImmaVehi=$_POST['imma'];

 $Code=$_SESSION['Agence'];


$sql= ("INSERT INTO vehicule (CodeAgence, LibVehi, NbrPlace, ImmaVehi) VALUES ('$Code', '$LibVehi', '$NbrPlace', '$ImmaVehi')");
$mysqli->query($sql);

echo "Success";

 ?>
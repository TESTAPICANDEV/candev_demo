<?php
include('config.php');

session_start();


 $VilleDepart=$_POST['depart'];
 $VilleArrive=$_POST['arrive'];
 $CodeTrajet=$_POST['CodeTrajet'];
 $DateDepart=$_POST['datedepart'];
 $DateArrivee=$_POST['datearrive'];
 $CodeVehi=$_POST['vehi'];
 $Prix=$_POST['pri'];
 //Code gare
 $CodeGare=$_POST['gare'];


      $sql=("UPDATE trajet set CodeVehi='$CodeVehi', VilleDepart='$VilleDepart', VilleArrive='$VilleArrive', DateDepart='$DateDepart', DateArrivee='$DateArrivee', Prix='$Prix' where CodeTrajet='$CodeTrajet' ");
     $mysqli->query($sql);

echo "Success";

 ?>
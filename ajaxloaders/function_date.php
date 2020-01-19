<?php
include('config.php');

session_start();



 $VilleDepart=$_POST['depart'];
 $VilleArrive=$_POST['arrive'];
 $CodeVehi=$_POST['vehi'];
 $Prix=$_POST['pri'];
 //Code gare
 $CodeGare=$_POST['gare'];

 $Depart = \DateTime::createFromFormat('d F Y - H:i', trim($_POST['datedepart']));
 $Arrivee = \DateTime::createFromFormat('d F Y - H:i', trim($_POST['datearrive']));

  $DateDepart = $Depart->format('Y-m-d H:i:s');
  $DateArrivee = $Arrivee->format('Y-m-d H:i:s');

      $sql=("INSERT  INTO trajet (CodeVehi, VilleDepart, VilleArrive, DateDepart, DateArrivee, Prix) 
      	VALUES ('$CodeVehi', '$VilleDepart', '$VilleArrive', '$DateDepart', '$DateArrivee', '$Prix')");
     $mysqli->query($sql);


  $sq =("SELECT max(CodeTrajet) as CodeTrajet from trajet");
  $res1 = $mysqli->query($sq);
  $show1 = $res1->fetch_array(MYSQLI_ASSOC);
  $trajet=$show1['CodeTrajet'];


  $sql=("INSERT  INTO proposer (CodeTrajet, CodeGare) 
  	VALUES ('$trajet', '$CodeGare')");
 $mysqli->query($sql);

echo "Success";

 ?>
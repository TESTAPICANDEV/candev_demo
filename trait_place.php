<?php      
include('config.php'); 

$CodeTrajet=$_POST["code"];

  $age=" SELECT v.NbrPlace  from trajet t, vehicule v 
     where t.CodeTrajet = $CodeTrajet
     and t.CodeVehi=v.CodeVehi ";
  $fetch_res = $mysqli->query($age) or die(mysql_error());
  $show = $fetch_res->fetch_array(MYSQLI_ASSOC);


  $que ="SELECT count(*) as Nbr_passa from ticket 
  where CodeTrajet=$CodeTrajet";
   $reqt = $mysqli->query($que);
    $affiche = $reqt->fetch_array(MYSQLI_ASSOC);
     
  $nbpa = $show['NbrPlace'];
  $passa = $affiche['Nbr_passa'];

  $sous = $nbpa - $passa;

  echo $sous;

          ?>
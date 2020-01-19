<?php
include('config.php');

session_start();

 $LibGare=htmlspecialchars($_POST['nom'], ENT_QUOTES);
 $TelGare=$_POST['contact'];
 $MailGare=$_POST['email'];
 $AdrGare=htmlspecialchars($_POST['adr'], ENT_QUOTES);
 $LatGare=$_POST['lat'];
 $LongGare=$_POST['long'];
 //Code de l'agence
 $Code=$_SESSION['Agence'];
 

      $sql=("INSERT  INTO gare (CodeAgence, LibGare, TelGare, MailGare, AdrGare, LatGare, LongGare) 
      	VALUES ('$Code', '$LibGare', '$TelGare', '$MailGare', '$AdrGare', '$LatGare', '$LongGare')");
     $mysqli->query($sql);
echo "Success";

 ?>
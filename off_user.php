<?php
include('config.php');

session_start();

$Id_Util = $_POST['id'];


      $sql=("UPDATE utilisateur set supprimer=1 where Id_Util='$Id_Util'; ");
     $mysqli->query($sql);

  header("location:utilisateurs.php");

 ?>
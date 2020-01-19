<?php
/**
 * Created by PhpStorm.
 * User: Herve
 * Date: 13/05/2017
 * Time: 08:36
 */

$host ="localhost";
$user ="root";
$pass="";
$db="bolt";


$con = mysqli_connect($host,$user,$pass,$db);

$UniqueCode=$_GET['UniqueCode'];

$sql = "SELECT p.NomPass, p.PrenPass, j.VilleDepart, j.VilleArrive, j.DateDepart, g.LibGare, t.DateAchat, p.UniqueCode, p.Numero, v.LibVehi, v.ImmaVehi 
        from passager p, trajet j, gare g, ticket t, agence a, vehicule v 
        where j.CodeTrajet = t.CodeTrajet 
        and p.CodePassager = t.CodePassager 
        and g.CodeAgence=a.CodeAgence 
        and t.CodeGare = g.CodeGare 
        and j.CodeVehi = v.CodeVehi
        and p.UniqueCode=$UniqueCode;";;

$result = $con->query($sql);

if ($result->num_rows >0) {
 
 $rows = array();
 while($row = $result->fetch_assoc()) {
    $rows[] = $row;
    
 }
 $json = json_encode($rows);

 echo $json;
} 
 ?>
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

$query ="SELECT g.CodeAgence, t.CodeTrajet, g.CodeGare, v.NbrPlace, g.LibGare, t.VilleArrive, t.VilleDepart, t.Prix, t.DateDepart, t.DateArrivee, a.NomAgence, g.LatGare, g.LongGare, a.Contact, g.TelGare 
    from trajet t, proposer p, gare g, agence a, vehicule v 
    where t.CodeTrajet = p.CodeTrajet 
    and t.CodeVehi=v.CodeVehi 
    and g.CodeAgence=a.CodeAgence 
    and g.CodeGare=p.CodeGare 
    and t.DateDepart >= CURRENT_TIMESTAMP;";
$result =mysqli_query($con,$query);
$response = array();

while ($row = mysqli_fetch_array($result))
{

   $que ="SELECT count(*) as Nbr_passa from ticket 
   where CodeTrajet=$row[1]";
   $reqt = mysqli_query($con,$que);
    $affiche = $reqt->fetch_array(MYSQLI_ASSOC);

    $passa = $affiche['Nbr_passa'];


    array_push($response,array('CodeAgence'=>$row[0],'CodeTrajet'=>$row[1],'CodeGare'=>$row[2],'NbrPlace'=>$row[3]-$passa,'LibGare'=>$row[4],'VilleArrive'=>$row[5],'VilleDepart'=>$row[6],'Prix'=>$row[7],'DateDepart'=>$row[8],'DateArrivee'=>$row[9],'NomAgence'=>$row[10],'LatGare'=>$row[11],'LongGare'=>$row[12],'Contact'=>$row[13],'TelGare'=>$row[14]));
}

mysqli_close($con);

echo json_encode(["server_response"=>$response]);
?>
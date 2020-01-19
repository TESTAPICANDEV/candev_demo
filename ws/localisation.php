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

$query ="SELECT a.NomAgence, g.LibGare, g.TelGare, g.AdrGare, g.LatGare, g.LongGare
FROM gare g, agence a 
where a.CodeAgence=g.CodeAgence;";
$result =mysqli_query($con,$query);
$response = array();

while ($row = mysqli_fetch_array($result))
{
    array_push($response,array('NomAgence'=>$row[0],'LibGare'=>$row[1],'TelGare'=>$row[2],'AdrGare'=>$row[3],'LatGare'=>$row[4],'LongGare'=>$row[5]));
}

mysqli_close($con);

echo json_encode(["server_response"=>$response]);
?>
<?php 
try {
$serverUrl = "http://aspsmsapi.com/http/sendsms.aspx?"; // URL de base
$dest = "228xxxxxx,228xxxxxx,228xxxxxx"; // Numéro du destinataire au foramt international
$username = "22892431923"; // Votre nom d'utilisateur
$apikey = "BLCFW1D96C"; // Votre clé API
$msg = "Test Message PHP"; // Contenu du message
$senderid = "ASPSMS"; // Identifiant d'envoi
$authmode = "http"; // Obligatoire. Ne pas modifier
// CURL_INIT
$ch = curl_init($serverUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch,CURLOPT_POSTFIELDS,"dest=$dest&username=$username&apikey=$apikey&senderid=$senderid&msg=$msg&authmode=$authmode");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
echo $output = curl_exec($ch); // Afficher le résultat du serveur
curl_close($ch);

}catch(Exception $ex) {
echo $ex;
}
?> 
	<?php
	include('config.php');

empty($_SESSION);

if (isset($_POST['submit'])){

$Pseudo_Util=$_POST['Pseudo_Util'];
$Pass_Util=sha1($_POST['Pass_Util']);

$admin_query=(" SELECT * FROM Utilisateur where Pseudo_Util='$Pseudo_Util' and Pass_Util='$Pass_Util' and supprimer=0");
$admin=$mysqli->query($admin_query);
$row= $admin->fetch_array(MYSQLI_BOTH);

if ($row > 0){

session_start();
$_SESSION['Utilisateur']=$row['Id_Util'];
$_SESSION['Agence']=$row['CodeAgence'];
$_SESSION['Gare']=$row['CodeGare'];
$_SESSION['Profil']=$row['Profil_id'];
$_SESSION['CodeGare']=$row['CodeGare'];
$_SESSION['CodeTrajet']=$row['CodeTrajet'];
$_SESSION['Passager']=$row['CodePassager'];

$prof = $_SESSION['Profil'];

if ($prof == 1){

	header("location:accueil.php");
}

else if ($prof == 2)
	{
      header("location:accueil_res_agence.php");
	}

	else 
	{
		header("location:portail_vente.php");
	}


}

else{
header("location:login_error.php");

?>

<?php }

}
?>	
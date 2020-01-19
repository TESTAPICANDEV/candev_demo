    <?php
    include('config.php');

if (isset($_POST['submit'])){

$UniqueCode=$_POST['UniqueCode'];

try{
$admin_query="SELECT CodePassager from passager where UniqueCode='$UniqueCode'";
$admin=$mysqli->query($admin_query);
$show1 = $admin->fetch_array(MYSQLI_ASSOC);
  $pass=$show1['CodePassager'];

$admin_query="DELETE from passager where UniqueCode='$UniqueCode'";
$admin=$mysqli->query($admin_query);


$admin_query="DELETE from ticket where CodePassager='$pass'";
$tik=$mysqli->query($admin_query);


//$row= $tik->fetch_array(MYSQLI_BOTH);


?>

      <script>
        
        alert('Ticket annule');
        window.location='annulation.php';
      </script>
<?php
}

catch(Exception $s){
 
 echo "<script language='javascript'>\nalert(\"Code incorrect\");\n
window.location.href='annulation.php';
 </script>";

?>


<?php }

}
?>  

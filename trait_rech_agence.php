 <?php
                    include("config.php");

         $CodeAgence=$_POST['rechagence'];
                    
                 $affich="<option value=''></option>";
                $age=" SELECT  CodeGare, LibGare  from gare
                where CodeAgence=$CodeAgence;";
                $fetch_res = $mysqli->query($age) or die(mysql_error());
    
               

        while ($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
        	{
              $affich.=  "<option value='".$show['CodeGare']."'>".$show['LibGare']."</option>";
        	}

       echo $affich;
         
        ?>
    
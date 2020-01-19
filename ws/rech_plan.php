<?php
		
	  require_once('config.inc.php');
          $sql = 'SELECT g.CodeAgence, t.CodeTrajet, g.CodeGare, v.NbrPlace, g.LibGare, t.VilleArrive, t.VilleDepart, t.Prix, t.DateDepart, t.DateArrivee, a.NomAgence from trajet t, proposer p, gare g, agence a, vehicule v where t.CodeTrajet = p.CodeTrajet and t.CodeVehi=v.CodeVehi and g.CodeAgence=a.CodeAgence and g.CodeGare=p.CodeGare';
          $statement = $connection->prepare($sql);
          $statement->execute();
          if($statement->rowCount())
          {
				$row_all = $statement->fetchall(PDO::FETCH_ASSOC);
				header('Content-type: application/json');
   		  		echo json_encode($row_all);
          		
          }  
          elseif(!$statement->rowCount())
          {
			  echo "no rows";
          }
		  
?>

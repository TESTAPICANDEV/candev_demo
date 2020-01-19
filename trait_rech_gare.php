 <?php
          include("config.php");

      $CodeGare=$_POST['rechgare'];

      $montre = "";

      $age=" SELECT t.CodeTrajet, g.CodeGare, v.NbrPlace, g.LibGare, t.VilleArrive, t.VilleDepart, t.Prix, t.DateDepart, t.DateArrivee from trajet t, proposer p, gare g, vehicule v 
         where t.CodeTrajet = p.CodeTrajet 
         and t.CodeVehi=v.CodeVehi 
         and g.CodeGare=p.CodeGare 
         and g.CodeGare=$CodeGare;";

      $fetch_res = $mysqli->query($age) or die(mysql_error());

          while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
          {


           $montre.= "<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
                    <div class='card'>
                        <div class='header'>
                            <h2>
                                <small>Détails</small>
                            </h2>
                        </div>
                        <div class='body'>
                            <div class='clearfix m-b-20'>
                                <div class='dd'>
                                            <div class='dd-handle'><h4>".$show['LibGare']."</h4></div>
                                            <div class='dd-handle'><p>Ville Départ:  ".$show['VilleDepart']."</p></div>
                                            <div class='dd-handle'>".$show['DateDepart']."</div>
                                            <div class='dd-handle'>".$show['VilleArrive']."</div>
                                            <div class='dd-handle'>".$show['DateArrivee']."</div>
                                            <div class='dd-handle'>".$show['Prix']."</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";

          }

    echo $montre;
?>
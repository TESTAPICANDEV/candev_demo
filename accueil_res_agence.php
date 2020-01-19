<!DOCTYPE html>
<html>
<?php 
  session_start();
  include('navadmin.php'); 
?>


            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">Menu</li>
                    <li class="active">
                        <a href="accueil_res_agence.php">
                            <i class="material-icons">home</i>
                            <span>Accueil</span>
                        </a>
                    </li> 
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">location_city</i>
                            <span>Emplacement</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="vehicule.php">
                                <i class="material-icons">directions_bus</i>
                                <span>Véhicule</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="gare.php">
                            <i class="material-icons">widgets</i>
                            <span>Secteurs</span>
                        </a>
                    </li>  
                    <li>
                        <a href="planning.php">
                            <i class="material-icons">create_new_folder</i>
                            <span>Planning</span>
                        </a>
                    </li> 
                    <li>
                        <a href="payement.php">
                            <i class="material-icons">create_new_folder</i>
                            <span>Payement</span>
                        </a>
                    </li>   
                    <li>
                        <a href="verification.php">
                            <i class="material-icons">vpn_key</i>
                            <span>Vérification</span>
                        </a>
                    </li> 
                    <li>
                        <a href="annulation.php">
                            <i class="material-icons">clear</i>
                            <span>Annuler réservation</span>
                        </a>
                    </li>               
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2020 - 2021 <a href="javascript:void(0);">GCcarpool</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content bg-light text-dark">
        <div class="container-fluid">
        
                    <div class="row">
                    <div class="col-sm-4">
                    <div class="card">
                      <div class="card-body bg-success text-white">
                        <h4 class="card-title">&nbsp;&nbsp;On vous cherche à la maison et au boulot</h4>
                        <p class="card-text">&nbsp;Nous cherchons toujours à vous mettre en contact d'une manière ou d'une autre, un bon moyen pour s'échanger.</p>
                      </div>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="card">
                      <div class="card-body bg-success text-white">
                        <h4 class="card-title">&nbsp;&nbsp;On vous cherche à la maison et au boulot</h4>
                        <p class="card-text">&nbsp;Nous cherchons toujours à vous mettre en contact d'une manière ou d'une autre, un bon moyen pour s'échanger.</p>
                      </div>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="card">
                      <div class="card-body bg-success text-white">
                        <h4 class="card-title">&nbsp;&nbsp;On vous cherche à la maison et au boulot</h4>
                        <p class="card-text">&nbsp;Nous cherchons toujours à vous mettre en contact d'une manière ou d'une autre, un bon moyen pour s'échanger.</p>
                      </div>
                    </div>
                    </div>
                    </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card bg-light text-dark">
                    <div class="row">

                             <div class="col-lg-8">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-inbox-wrap js-inbox-wrap">
                                        <div class="au-message js-list-load">
                                            <div class="au-message__noti">
                                                <p>You Have
                                                    <span>2</span>

                                                    new messages
                                                </p>
                                            </div>
                                            <div class="au-message-list">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                     
                    </div>
                </div>
            </div>





            <div class="block-header">
              <?php
                 include("config.php");
                $id = $_SESSION['Agence'];
                $query="SELECT * from agence 
                where CodeAgence=$id; ";
                $result = $mysqli->query($query) or die(mysql_error());
                while ($resultat = $result->fetch_array(MYSQLI_ASSOC))
                    { ?>
                <h2 style="font-size: 20px; font-family: Charlemagne Std;">PORTAIL <?php  echo $resultat['NomAgence'];  ?> <?php } ?></h2>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Total secteur</div>
                            <?php
                 include("config.php");
                $id = $_SESSION['Agence'];
                $query="SELECT COUNT(*) as somme 
                from gare 
                 where CodeAgence=$id";
                $result = $mysqli->query($query) or die(mysql_error());
                while ($resultat = $result->fetch_array(MYSQLI_ASSOC))
                    { ?>
                
                            <div class="number count-to" data-from="0" data-to="<?php echo $resultat['somme']; ?>" data-speed="15" data-fresh-interval="20"> <?php } ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">group</i>
                        </div>
                        <div class="content">
                            <div class="text">Total passager</div>
                <?php
                                include("config.php");
                           $id = $_SESSION['Agence'];

                            $age=" SELECT COUNT(*) as tout 
                            from passager p, trajet j, gare g, ticket t, agence a 
                            where j.CodeTrajet = t.CodeTrajet 
                            and p.CodePassager = t.CodePassager 
                            and g.CodeAgence=a.CodeAgence 
                            and t.CodeGare = g.CodeGare 
                            and a.CodeAgence=$id; ";
                            $fetch_res = $mysqli->query($age) or die(mysql_error());
                    while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
                    { ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $show['tout'] ?>" data-speed="1000" data-fresh-interval="20"><?php } ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">Course effectuée</div>
                <?php
                                include("config.php");
                           $id = $_SESSION['Agence'];

                            $age=" SELECT COUNT(*) as nbr 
                            from ticket t, trajet j, gare g, passager p, agence a 
                            where j.CodeTrajet = t.CodeTrajet 
                            and p.CodePassager = t.CodePassager 
                            and g.CodeAgence=a.CodeAgence 
                            and t.CodeGare = g.CodeGare 
                            and a.CodeAgence=$id; ";
                            $fetch_res = $mysqli->query($age) or die(mysql_error());
                    while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
                    { ?>
                         <div class="number count-to" data-from="0" data-to="<?php echo $show['nbr'] ?>" data-speed="1000" data-fresh-interval="20"><?php } ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">Utilisateurs</div>
                <?php
                                include("config.php");
                           $id = $_SESSION['Agence'];

                            $age=" SELECT COUNT(*) as kaka 
                            from utilisateur u, agence a
                            where u.CodeAgence=a.CodeAgence
                            and a.CodeAgence=$id; ";
                            $fetch_res = $mysqli->query($age) or die(mysql_error());
                    while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
                    { ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $show['kaka'] ?>" data-speed="1000" data-fresh-interval="20"><?php } ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <!-- #END# CPU Usage -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>

    <?php
include('logout.php');
 ?>
</body>

</html>
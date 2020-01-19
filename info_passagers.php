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
                        <a href="portail_vente.php">
                            <i class="material-icons">home</i>
                            <span>Accueil</span>
                        </a>
                    </li>  
                    <li>
                        <a href="planning.php">
                            <i class="material-icons">create_new_folder</i>
                            <span>Planning</span>
                        </a>
                    </li>
                    <li>
                        <a href="verification.php">
                            <i class="material-icons">create_new_folder</i>
                            <span>Vérification</span>
                        </a>
                    </li>                  
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 - 2018 <a href="javascript:void(0);">HerTrip</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Search Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <?php
                 include("config.php");
                $id = $_SESSION['Agence'];
                $query="SELECT * from agence 
                where CodeAgence=$id; ";
                $result = $mysqli->query($query) or die(mysql_error());
                while ($resultat = $result->fetch_array(MYSQLI_ASSOC))
                    { ?>
                <h2 style="font-size: 20px; font-family: Charlemagne Std;">Portail <?php  echo $resultat['NomAgence'];  ?> <?php } ?></h2>
            </div>
            <div class="row clearfix">
                <!-- Basic Examples -->
                <!-- #END# Basic Examples -->
                <!-- Badges -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Informations passager
                            </h2>
                        </div>
                        <div class="body">
                            <ul class="list-group">
                       <?php
                                include("config.php");
                           $id = $_SESSION['Agence'];
                           $passa = $_SESSION['Passager'];


                            $age=" SELECT p.NomPass, p.PrenPass, j.VilleDepart, j.VilleArrive, j.DateDepart, g.LibGare, t.DateAchat, p.UniqueCode, p.Numero, v.LibVehi, v.ImmaVehi 
                                from passager p, trajet j, gare g, ticket t, agence a, vehicule v 
                                where j.CodeTrajet = t.CodeTrajet 
                                and p.CodePassager = t.CodePassager 
                                and g.CodeAgence=a.CodeAgence 
                                and t.CodeGare = g.CodeGare 
                                and j.CodeVehi = v.CodeVehi 
                                and a.CodeAgence = $id
                                and p.CodePassager = $passa; ";
                            $fetch_res = $mysqli->query($age) or die(mysql_error());
                    while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
                    {    
                ?> 

                                <li class="list-group-item">Code ticket <span class="badge bg-purple"><?php  echo $show['UniqueCode'];  ?></span></li>
                                <li class="list-group-item">Nom <span class="badge bg-pink"><?php  echo $show['NomPass'];  ?></span></li>
                                <li class="list-group-item">Prénoms <span class="badge bg-cyan"><?php  echo $show['PrenPass'];  ?></span></li>
                                <li class="list-group-item">Numéro <span class="badge bg-purple"><?php  echo $show['Numero'];  ?></span></li>
                                <li class="list-group-item">Trajet <span class="badge bg-teal"><?php  echo $show['VilleDepart'];  ?> - <?php  echo $show['VilleArrive'];  ?></span></li>
                                <li class="list-group-item">Nom Véhicule <span class="badge bg-purple"><?php  echo $show['LibVehi'];  ?></span></li>
                                <li class="list-group-item">Immatriculation <span class="badge bg-pink"><?php  echo $show['ImmaVehi'];  ?></span></li>
                                <li class="list-group-item">Date Départ <span class="badge bg-orange"><?php  echo $show['DateDepart'];  ?></span><?php } ?> </li>      
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Badges -->
            </div>
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

    <!-- Bootstrap Notify Plugin Js -->
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>

    <?php
include('logout.php');
 ?>
</body>

</html>
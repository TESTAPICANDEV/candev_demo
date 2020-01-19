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
                        <a href="accueil.php">
                            <i class="material-icons">home</i>
                            <span>Accueil</span>
                        </a>
                    </li>
                    <li>
                        <a href="portail_vente.php">
                            <i class="material-icons">create_new_folder</i>
                            <span>Réserver trajet</span>
                        </a>
                    </li> 
                    <li>
                        <a href="agence.php">
                            <i class="material-icons">location_city</i>
                            <span>Emplacement</span>
                        </a>
                    </li>
                    <li>
                        <a href="utilisateurs.php">
                            <i class="material-icons">people_outline</i>
                            <span>Utilisateurs</span>
                        </a>
                    </li> 
                    <li>
                        <a href="securite.php">
                            <i class="material-icons">widgets</i>
                            <span>Sécurité</span>
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

    <section class="content">
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
                    <div class="row">

                             <div class="col-lg-8">
                                <div class="card">
                                    <div class="au-inbox-wrap js-inbox-wrap">
                                        <div class="au-message js-list-load">
                                            <div class="au-message__noti">
                                                  <img src="images/trajet.png">
                                            </div>
                                            <div class="au-message-list">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <div class="col-lg-2">
                               <div class="card">
                                <div class="au-inbox-wrap js-inbox-wrap">
                                        <img src="images/imagelefttwo.png" class="img">

                                      </div>
                                    </div>
                            </div>  
                     
                    </div>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Agence</div>
                            <?php
                 include("config.php");

                $query="SELECT COUNT(*) as somme from agence ";
                $result = $mysqli->query($query) or die(mysql_error());

                while ($resultat = $result->fetch_array(MYSQLI_ASSOC))
                    { ?>
                
                            <div class="number count-to" id="agen"  data-from="0" data-to="<?php echo $resultat['somme']; ?>" data-speed="15" data-fresh-interval="20"> <?php } ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"  >
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">Totale Gare</div>
                                                        <?php
                 include("config.php");

                $query="SELECT COUNT(*) as total from gare ";
                $result = $mysqli->query($query) or die(mysql_error());
                while ($resultat = $result->fetch_array(MYSQLI_ASSOC))
                    { ?>
                            <div id="gare" class="number count-to" data-from="0" data-to="<?php echo $resultat['total']; ?>" data-speed="1000" data-fresh-interval="20"><?php } ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">Course effectuée</div>
                            <?php 
                 include("config.php");

                $query="SELECT COUNT(*) as tick from ticket ";
                $result = $mysqli->query($query) or die(mysql_error());
                while ($resultat = $result->fetch_array(MYSQLI_ASSOC))
                    { ?>
                            <div id="ticket" class="number count-to"  data-from="0" data-to="<?php echo $resultat['tick']; ?>" data-speed="1000" data-fresh-interval="20"><?php } ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Passager</div>
                        <?php 
                 include("config.php");

                $query="SELECT COUNT(*) as pers from passager ";
                $result = $mysqli->query($query) or die(mysql_error());
                while ($resultat = $result->fetch_array(MYSQLI_ASSOC))
                    { ?>
                            <div id="passa" class="number count-to"  data-from="0" data-to="<?php echo $resultat['pers']; ?>" data-speed="1000" data-fresh-interval="20"><?php } ?></div>
                        </div>
                    </div>
                </div>
            </div>

               <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>PIE CHART</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                           <div id="echart_pie" style="height:350px;"></div>
                        </div>
                    </div>
                </div>-->
            <!-- #END# Widgets -->

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

    <!-- Morris Plugin Js 
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs 
    <script src="plugins/chartjs/Chart.bundle.js"></script>


    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>-->

     <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script type="text/javascript" src="js/echarts-all.js"></script>
    <script type="text/javascript">
    var myChart = echarts.init(document.getElementById('echart_pie'));
    myChart.setOption({
      tooltip: {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
      },
      legend: {
        x: 'center',
        y: 'bottom',
        data: ['Consommation lumiere', 'Consommation Climatisation', 'Consommation électro ménager', 'Consommation Biomédical']
      },
      toolbox: {
        show: true,
        feature: {
          magicType: {
            show: true,
            type: ['pie'],
          },
          restore: {
            show: true
          },
          saveAsImage: {
            show: true
          }
        }
      },
      calculable: true,
      series: [{
        name: 'Graphe',
        type: 'pie',
        radius: '55%',
        center: ['50%', '48%'], //left,top
        data: [{
          value: $("#agen").text(),
          name: 'Consommation lumiere'
        }, {
          value: $("#ticket").text(),
          name: 'Consommation Climatisation'
        }, {
          value: $("#passa").text(),
          name: 'Consommation électro ménager'
        }, {
          value: $("#gare").text(),
          name: 'Consommation Biomédical'
        }]
      }]
    });
    </script>


<?php
include('logout.php');
 ?>

</body>

</html>
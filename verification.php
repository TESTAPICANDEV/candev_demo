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
                    <?php 
                    $prof = $_SESSION['Profil'];

                    if ($prof == 3) {  ?>
                    <li>
                        <a href="portail_vente.php">
                            <i class="material-icons">home</i>
                            <span>Accueil</span>
                        </a>
                    </li>
                    <?php } ?>

                    <?php 
                    $prof = $_SESSION['Profil'];

                    if ($prof == 2) {  ?>
                    <li>
                        <a href="accueil_res_agence.php">
                            <i class="material-icons">home</i>
                            <span>Accueil</span>
                        </a>
                    </li> 

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">location_city</i>
                            <span>Agence</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="">
                                <i class="material-icons">group</i>
                                <span>Personnel</span>
                                </a>
                            </li>
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
                            <span>Gares</span>
                        </a>
                    </li>
                    <?php } ?>
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
                    <li class="active">
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
                    &copy; 2017 - 2018 <a href="javascript:void(0);">RapiDo</a>.
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

   <br>

<body class="fp-page">
  <div class="col-md-6">
    <div class="fp-box">
        <div class="logo" style="text-align: center;">
            <a>Rapi<b>Do</b></a>
            <small>Sécurité - Fiabilité - Rapidité</small>
        </div>

        <br>
        <div class="card" >
            <div class="body" style="background-image: images/qrcode.PNG;">
                <form autocomplete="off" method="POST" action="trait_verif.php">
                    <div class="msg">
                        Vérifier le code du ticket du passager.
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="UniqueCode" placeholder="Code ticket" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-block btn-lg bg-green waves-effect" name="submit">VERIFIER LE TICKET</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </body>
        

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

    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>

    <script src="js/pages/forms/advanced-form-elements.js"></script>

   <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Bootstrap Colorpicker Js -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="plugins/dropzone/dropzone.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>

    <!--Alerte -->
    <script src="js/pages/ui/notifications.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>






<script type="text/javascript">
$('.ajouter_nouveau').on('click', function()
{
    var racine = $(this).parent().parent();

    $(this).slideToggle(300);
    racine.find('.form_card').slideToggle(400);
});

$('.close_form').on('click', function()
{
    var racine = $(this).parent().parent().parent();

    racine.find('.form_card').slideToggle(400);
    racine.find('.ajouter_nouveau').fadeToggle(600);
});
</script>

 <?php  include('logout.php'); ?>
</body>

</html>
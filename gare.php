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
                    <li>
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
                    <li class="active">
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
                    &copy; 2020 - 2021 <a href="javascript:void(0);">GCacrpool</a>.
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
               
        $bat=(" select * from agence where CodeAgence = $id;  ") or die(mysql_error());
        $fetch_res = $mysqli->query($bat);
        
        while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
        
        {
        
    ?>
                <h2 style="font-size: 20px; font-family: Charlemagne Std;">Secteur <?php  echo $show['NomAgence'];  ?><?php } ?></h2>
            </div>
            <!--Ajouter Agence-->
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 pull-right" style="padding: 0 30px 15px 0;">
    <button type="button" class="btn btn-primary waves-effect pull-right ajouter_nouveau"><i class="fa fa-plus"></i> Ajouter secteur</button>
</div>
<br>
<div class="row clearfix">
    <div  style="display: none;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form_card">

                    <div class="card">
                        <div class="header">      
                            <h2>Enrégistrement d'un secteur<i class="material-icons btn btn-danger waves-effect pull-right close_form">close</i></h2>
                         </div>
                        <div  class="body" style="margin-right: 30px; margin-left: 30px;">
                        <div class="demo-masked-input">
                            <form id="form_gare" method="POST" autocomplete="off">
                            <div class="row clearfix">
                                <div class="col-md-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="LibGare" class="form-control">
                                        <label class="form-label">Nom secteur</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-4">
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="AdrGare" class="form-control">
                                        <label class="form-label">Adresse</label>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" id="MailGare" class="form-control email" placeholder="Ex: example@example.com">
                                    </div>
                                </div>
                                </div>
                                </div>
                                <div class="row clearfix">
                                <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">phone_iphone</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" id="TelGare" class="form-control mobile-phone-number" placeholder="Ex: (000) 000 0000">
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-4">
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="LatGare" class="form-control">
                                        <label class="form-label">Latitude</label>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="LongGare" class="form-control">
                                        <label class="form-label">Longitude</label>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <br>
                               <div style="margin-top: 0px; margin-bottom: 40px;">
                                  <button type="submit" class="btn btn-success waves-effect pull-right">Enrégistrer</button>
                                    <button  style="margin-right: 20px;" type="reset" class="btn btn-warning waves-effect pull-right" >Annuler</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
</div>

            <!--End Ajouter Agence-->
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Liste des secteurs
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Nom secteur</th>
                                            <th>Contact</th>
                                            <th>Adresse</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nom secteur</th>
                                            <th>Contact</th>
                                            <th>Adresse</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                <?php
                                include("config.php");

                                $code = $_SESSION['Agence'];

                            $age=" SELECT * from gare
                            where CodeAgence=$code ; ";
                            $fetch_res = $mysqli->query($age) or die(mysql_error());

                    while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
                    {
                    
                ?> 
                                        <tr>
                                            <td><?php  echo $show['LibGare'];  ?></td>
                                            <td><?php  echo $show['TelGare'];  ?></td>
                                            <td><?php  echo $show['AdrGare'];  ?></td>
                                            <td><?php  echo $show['LatGare'];  ?></td>
                                            <td><?php  echo $show['LongGare'];  ?></td>
                                            <td> <a class="btn btn-success" href="googlemaps.php?Lat=<?php  echo $show['LatGare'];  ?>&Long=<?php  echo $show['LongGare'];  ?>&LibGare=<?php  echo $show['LibGare'];  ?>">Localiser</a>
                                            <a class="btn btn-warning">Modifier</a>
                                            <a class="btn btn-danger">Supprimer</a></td>
                                        </tr> 
                                        <?php } ?>                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- #END# CPU Usage -->
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
        //  AJOUTER UNE AGENCE
        $('#form_gare').on('submit', function(e)
        {
            e.preventDefault();

            var nom = $('#LibGare').val();
            var email = $('#MailGare').val();
            var contact = $('#TelGare').val();
            var latitude = $('#LatGare').val();
            var longitude = $('#LongGare').val();
            var adresse = $('#AdrGare').val();

            if( !nom || !email || !contact || !latitude || !longitude || !adresse)
            {

                $.notify({
                     title: '<strong>Erreur!</strong>',
                       message: 'Vérifier les champs.'
                },{
                     type: 'warning'
                });

            }
            else
            {
                $.ajax({
                    url : "trait_gare.php",
                    type : "POST",
                    data : {nom: nom, email:email, contact:contact, lat:latitude, long:longitude, adr:adresse},
                    dataType : "text",
                    success : function(retour)
                    {
                        if (retour == 'Success') {
                                $.notify({
                                             title: '<strong>Succès!</strong>',
                                               message: 'Gare enrégistrée.'
                                        },{
                                             type: 'success'
                                        });  
                            
                            setTimeout(function() {
                                location.reload();
                            },1000);
                        }
                        else if (retour == 'Old') {
                            
                        }
                        else if (retour == 'Error') {
                            
                        }
                        else if (retour == 'Failed') {
                            
                        }

                    },
                    error : function(resultat,statut,erreur)
                    {
                        
                    }
                });

            }
        });

    </script>

    <script type="text/javascript">
$('.ajouter_nouveau').on('click', function()
{
    var racine = $(this).parent().parent();

    $(this).slideToggle(300);
    racine.find('.form_card').slideToggle(400);
});

</script>

    <script type="text/javascript">
$('input[id="LibGare"]').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^A-Za-z^éèÏï' ]/g,'') ); }
);

$('input[id="LatGare"]').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^0-9. ]/g,'') ); }
);

$('input[id="LongGare"]').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^0-9. ]/g,'') ); }
);
</script>

<?php include('logout.php'); ?>

</body>

</html>
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
                        <a href="accueil.php">
                            <i class="material-icons">home</i>
                            <span>Accueil</span>
                        </a>
                    </li>
                    <li class="active">
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
            <div class="block-header">
                <h2 style="font-size: 20px; font-family: Charlemagne Std;">Agences</h2>
            </div>
            <!--Ajouter Agence-->
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 pull-right" style="padding: 0 30px 15px 0;">
    <button type="button" class="btn btn-primary waves-effect pull-right ajouter_nouveau"><i class="fa fa-plus"></i> Ajouter Emplacement</button>
</div>
<br>
<div class="row clearfix">
    <div  style="display: none;" class="col-lg-8 col-md-8 col-sm-8 col-xs-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-1 form_card">

                    <div class="card" >
                        <div class="header">      
                            <h2>Enrégistrement d'un conducteur<i class="material-icons btn btn-danger waves-effect pull-right close_form">close</i></h2>

                         </div>
                        <div  class="body" style="margin-right: 30px; margin-left: 30px;">
                        <div class="demo-masked-input">
                            <form id="form_agence" method="POST" autocomplete="off">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="NomAgence" class="form-control">
                                        <label class="form-label">Emplacement</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="DirectAgence" class="form-control">
                                        <label class="form-label">Nom conducteur</label>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" id="Email" class="form-control email" placeholder="Ex: example@example.com">
                                    </div>
                                </div>
                                <div class="input-group"> 
                                    <span class="input-group-addon">
                                        <i class="material-icons">phone_iphone</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" id="Contact" minlength="11" maxlength="11" class="form-control mobile-phone-number" placeholder="Ex: 00000000">
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
                                Emplacement des conducteurs
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Emplacement</th>
                                            <th>Conducteur</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Emplacement</th>
                                            <th>Conducteur</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                <?php
                                include("config.php");

                            $age=" select * from agence; ";
                            $fetch_res = $mysqli->query($age) or die(mysql_error());

                    while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
                    {
                    
                ?> 
                                        <tr>
                                            <td><?php  echo $show['NomAgence'];  ?></td>
                                            <td><?php  echo $show['DirectAgence'];  ?></td>
                                            <td><?php  echo $show['Email'];  ?></td>
                                            <td><?php  echo $show['Contact'];  ?></td>
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
        $('#form_agence').on('submit', function(e)
        {
            e.preventDefault();

            var nom = $('#NomAgence').val();
            var directeur = $('#DirectAgence').val();
            var email = $('#Email').val();
            var contact = $('#Contact').val();

            if( !nom || !directeur || !email || !contact )
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
                    url : "trait_agence.php",
                    type : "POST",
                    data : {nom: nom, direc:directeur, email:email, contact:contact},
                    dataType : "text",
                    success : function(retour)
                    {
                        if (retour == 'Success') {
                                $.notify({
                                             title: '<strong>Succès!</strong>',
                                               message: 'Agence enrégistrée.'
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



$('input[id="NomAgence"]').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^A-Za-z^éèÏï' ]/g,'') ); }
);

$('input[id="DirectAgence"]').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^A-Za-z^éèÏï' ]/g,'') ); }
);
</script>

<?php   include('logout.php'); ?>
</body>

</html>
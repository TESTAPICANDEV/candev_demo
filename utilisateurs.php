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
                    <li>
                        <a href="agence.php">
                            <i class="material-icons">location_city</i>
                            <span>Emplacement</span>
                        </a>
                    </li>
                    <li class="active">
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
                <h2 style="font-size: 20px; font-family: Charlemagne Std;">UTILSATEURS</h2>
            </div>
            <!--Ajouter Agence-->
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 pull-right" style="padding: 0 30px 15px 0;">
    <button type="button" class="btn btn-primary waves-effect pull-right ajouter_nouveau"><i class="fa fa-plus"></i> Ajouter Utilisateur</button>
</div>
<br>
<div class="row clearfix">


                <div style="display: none;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form_card">
                    <div class="card">
                        <div class="header">
                            <h2>Enrégistrement d'un utilisateur<i class="material-icons btn btn-danger waves-effect pull-right close_form">close</i></h2>
                        </div>
                        <div class="body">
                        <form id="form_utilisateur" method="POST" autocomplete="off">
                            <div class="row clearfix">
                                <div class="col-md-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Nom_Util" class="form-control">
                                        <label class="form-label">Nom</label>
                                    </div>
                                </div>

                                </div>
                                <div class="col-md-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Pren_Util" class="form-control">
                                        <label class="form-label">Prénoms</label>
                                    </div>
                                </div>

                                </div>
                                <div class="col-md-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Pseudo_Util" class="form-control">
                                        <label class="form-label">Pseudo</label>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <p>
                                        <b>Profil</b>
                                    </p>
                                    <select class="form-control" id="Profil_id" data-live-search="true">
                                        <option></option>
 <?php
                    include("config.php");

                $age=" select * from profil; ";
                $fetch_res = $mysqli->query($age) or die(mysql_error());

        while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
        {
        
    ?> 
                     <option value="<?php  echo $show['Profil_id'];  ?>"><?php  echo $show['Profil_Nom'];  ?></option>
                     <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <b>Agence</b>
                                    </p>
                                    <select class="form-control" id="CodeAgence" data-live-search="true">
                                        <option></option>
 <?php
                    include("config.php");

                $age=" select * from agence; ";
                $fetch_res = $mysqli->query($age) or die(mysql_error());

        while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
        {
        
    ?> 
                                        <option value="<?php echo $show['CodeAgence']; ?>"><?php echo $show['NomAgence']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div style="margin-top: 0px; margin-bottom: 40px;">
                            <button  type="submit" class="btn btn-success waves-effect pull-right">Enrégistrer</button>
                            <button  style="margin-right: 20px;" type="reset" class="btn btn-warning waves-effect pull-right" >Annuler</button>
                            </div>
                        </div>
                        </form>
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
                                Liste des utilisateurs
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prénoms</th>
                                            <th>Pseudo</th>
                                            <th>Profil</th>
                                            <th>Agence</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prénoms</th>
                                            <th>Pseudo</th>
                                            <th>Profil</th>
                                            <th>Agence</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
         <?php
                    include("config.php");

                $age=" SELECT *
                from utilisateur u,  profil p, agence a
                where u.Profil_id=p.Profil_id  
                and u.CodeAgence=a.CodeAgence
                and u.supprimer=0; ";
                $fetch_res = $mysqli->query($age) or die(mysql_error());

        while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
        {

    ?> 
                                        <tr>
                                            <td><?php  echo $show['Nom_Util'];  ?></td>
                                            <td><?php  echo $show['Pren_Util'];  ?></td>
                                            <td><?php  echo $show['Pseudo_Util'];  ?></td>
                                            <td><?php  echo $show['Profil_Nom'];  ?></td>
                                            <td><?php  echo $show['NomAgence'];  ?></td>
                                            <td><a href="#" data-toggle="modal" data-target="#desa<?php echo $show['Id_Util']; ?>" class="btn btn-danger">Désactiver</a>
                                            <a class="btn btn-warning">Modifier</a></td>
                                        </tr> 

<div class="modal fade" id="desa<?php echo $show['Id_Util']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
<!--Debut Modal pour désactiver l'utilisateur-->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body" style="height:100px; FONT-size:20px; overflow:hidden;"></br>
      <center><STRONG> Désactiver utilisateur?</STRONG></center>
      </div>
      <form method="POST" action="off_user.php">
      <div class="modal-footer">
       <input type="hidden" name="id" value="<?php echo $show['Id_Util']; ?>"></input>
        <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
        <button class="btn btn-danger" type="submit">Oui</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--Fin -->
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

    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>



<script type="text/javascript">
        //  AJOUTER UN UTILISATEUR
        $('#form_utilisateur').on('submit', function(e)
        {
            e.preventDefault();

            var nom = $('#Nom_Util').val();
            var prenom = $('#Pren_Util').val();
            var pseudo = $('#Pseudo_Util').val();
            var profil = $('#Profil_id').val();
            var agence = $('#CodeAgence').val();

            if( !nom || !prenom || !pseudo || !profil )
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
                    url : "trait_utilisateur.php",
                    type : "POST",
                    data : {nom: nom, prenom:prenom, pseudo:pseudo, profil:profil, agence:agence},
                    dataType : "text",
                    success : function(retour)
                    {
                        if (retour == 'Success') {
                                $.notify({
                                             title: '<strong>Succès!</strong>',
                                               message: 'Utilisateur enrégistré.'
                                        },{
                                             type: 'success'
                                        });  
                            
                            setTimeout(function() {
                                location.reload();
                            },1000);
                        }
                        else if (retour == 'Old') {

                            $.notify({
                                             title: '<strong>Erreur!</strong>',
                                               message: 'Pseudo existe déja.'
                                        },{
                                             type: 'warning'
                                        });  
                            
                            setTimeout(function() {
                                location.reload();
                            },1000);
                            
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


$('input[id="Nom_Util"]').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^A-Za-z^éèÏï' ]/g,'') ); }
);

$('input[id="Pren_Util"]').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^A-Za-z^éèÏï' ]/g,'') ); }
);

$('input[id="Pseudo_Util"]').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^A-Za-z ]/g,'') ); }
);
</script>




<?php
//  include('deleteuser.php');
include('logout.php');
//include('desactiver.php')
 ?>
</body>



</html>
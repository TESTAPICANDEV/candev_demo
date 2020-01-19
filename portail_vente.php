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
                        <a href="portail_vente.php">
                            <i class="material-icons">create_new_folder</i>
                            <span>Réserver trajet</span>
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
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">Réservation déjà effectuée</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 pull-right" style="padding: 0 30px 15px 0;">
    <button type="button" class="btn btn-primary waves-effect pull-right ajouter_nouveau"><i class="fa fa-plus"></i> Réserver trajet</button>
</div>
<br>
            <div class="row clearfix">
    <div style="display: none;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form_card ">
                    <div class="card">
                        <div class="header">      
                            <h2>Informations Passager<i class="material-icons btn btn-danger waves-effect pull-right close_form">close</i></h2>
                         </div>
                        <div  class="body">
                        <div class="demo-masked-input">
                            <form id="form_vente" method="POST" autocomplete="off">
                            <div class="row clearfix">
                                   <div class="col-md-4">
                                    <p>
                                        <b>Trajet</b>
                                    </p>
                                    <select class="form-control select_trajet" id="CodeTrajet" data-live-search="true">
                                        <option></option>
                              <?php
                                                include("config.php");
                                                $id = $_SESSION['Agence'];

                            $age=" SELECT g.CodeAgence, g.CodeGare, g.LibGare, t.VilleArrive, t.VilleDepart, t.Prix, t.DateDepart, t.DateArrivee, t.CodeTrajet from trajet t, proposer p, gare g, agence a 
                               where t.CodeTrajet = p.CodeTrajet 
                               and g.CodeAgence=a.CodeAgence 
                               and t.DateDepart >= curdate()
                               and g.CodeGare=p.CodeGare
                               and a.CodeAgence=$id; ";
                            $fetch_res = $mysqli->query($age) or die(mysql_error());

                                    while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
                                    {
                                    
                                ?> 
                             <option value="<?php  echo $show['CodeTrajet'];  ?>"><?php  echo $show['VilleDepart'];  ?> - <?php  echo $show['VilleArrive'];  ?></option>
                             <?php } ?>
                                    </select>
                                    </div>
                                <div class="col-md-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="NomPass" class="form-control">
                                        <label class="form-label">Nom Passager</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="PrenPass" class="form-control">
                                        <label class="form-label">Prénoms</label>
                                    </div>
                                </div>
                                </div>
                                </div>
                                <div class="row clearfix">
                                <div class="col-md-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="AdrPass" class="form-control">
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
                                        <input type="text" id="Email" class="form-control email" placeholder="Ex: example@example.com">
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">phone_iphone</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" id="Numero" class="form-control mobile-phone-number" placeholder="Ex: (000)0000000">
                                    </div>
                                </div>
                                </div>                               

                                </div>

                                <div class="row clearfix">
                                   <div class="col-md-4">
                                    <p>
                                        <b>Secteur</b>
                                    </p>
                                    <select class="form-control" id="CodeGare" data-live-search="true">
                                        <option></option>
                                        <?php 
                                include("config.php");

                                $code = $_SESSION['Agence'];

                            $age=" SELECT * from gare
                            where CodeAgence=$code ; ";
                            $fetch_res = $mysqli->query($age) or die(mysql_error());

                                    while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
                                    {
                                    
                                ?> 
                             <option value="<?php  echo $show['CodeGare'];  ?>"><?php  echo $show['LibGare'];  ?></option>
                             <?php } ?>
                                    </select>
                                    </div>

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="body espace_affiche">
                                      
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
            <!-- #END# CPU Usage -->

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Liste des passagers
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prénoms</th>
                                            <th>Trajet</th>
                                            <th>Secteur</th>
                                            <th>Date Achat</th>
                                            <th>Date Départ</th>
                                            <th>Code Ticket</th>
                                        </tr>
                                    </thead>
                                    <tfoot>  
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prénoms</th>
                                            <th>Trajet</th>
                                            <th>Secteur</th>
                                            <th>Date Achat</th>
                                            <th>Date Départ</th>
                                            <th>Code Ticket</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                       <?php
                                include("config.php");
                           $id = $_SESSION['Agence'];



                            $age=" SELECT p.NomPass, p.PrenPass, j.VilleDepart, j.VilleArrive, j.DateDepart, g.LibGare, t.DateAchat, p.UniqueCode
                             from passager p, trajet j, gare g, ticket t, agence a
                               where j.CodeTrajet = t.CodeTrajet
                               and p.CodePassager = t.CodePassager
                               and g.CodeAgence=a.CodeAgence 
                               and j.DateDepart >= curdate()
                               and t.CodeGare = g.CodeGare
                               and a.CodeAgence = $id; ";
                            $fetch_res = $mysqli->query($age) or die(mysql_error());
                    while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
                    {    
                ?>   
                                    <tr>
                                        <td><?php  echo $show['NomPass'];  ?></td>
                                        <td><?php  echo $show['PrenPass'];  ?></td>
                                        <td><?php  echo $show['VilleDepart'];  ?> - <?php  echo $show['VilleArrive'];  ?></td>
                                        <td><?php  echo $show['LibGare'];  ?></td>
                                        <td><?php  echo $show['DateAchat'];  ?></td>
                                        <td><?php  echo $show['DateDepart'];  ?></td>
                                        <th><?php  echo $show['UniqueCode'];  ?></th>
                                    </tr> 
                                        <?php } ?>                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

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
        $('#form_vente').on('submit', function(e)
        {
            e.preventDefault();
            var nom = $('#NomPass').val();
            var pren = $('#PrenPass').val();
            var adr = $('#AdrPass').val();
            var mail = $('#Email').val();
            var num = $('#Numero').val();
            var gare = $('#CodeGare').val();
            var ligne = $('#CodeTrajet').val();
            if( !nom || !pren || !adr || !num || !gare || !ligne)
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
                    url : "trait_passager.php",
                    type : "POST",
                    data : {nom:nom, pren:pren, adr:adr, mail:mail, num:num, gare:gare, ligne:ligne},
                    dataType : "text",
                    success : function(retour)
                    {
                        if (retour == 'Success') {
                                $.notify({
                                             title: '<strong>Succès!</strong>',
                                               message: 'Passager enregistré.'
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

$('input[id="NomPass"]').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^A-Za-z^éêüçûàèÏï' ]/g,'') ); }
);

$('input[id="PrenPass"]').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^A-Za-z^éüûàçêèÏï' ]/g,'') ); }
);

</script>


<script type="text/javascript">
$('.select_trajet').on('change', function()
{

           var code = $('#CodeTrajet').val();

                $.ajax({
                    url : "trait_place.php",
                    type : "POST",
                    data : {code : code},
                    dataType : "text",
                    success : function(retour)
                    {
                        

                        $('.espace_affiche').html(retour);

                          if (retour == 0){
                              
                            $('#NomPass').hide("fast");
                            $('#PrenPass').hide("fast");
                            $('#AdrPass').hide("fast");
                            $('#Email').hide("fast");
                            $('#Numero').hide("fast");
                            $('#CodeGare').hide("fast");

                          }
                    }


                });

     });
</script>

<?php
include('logout.php');
 ?>

</body>

</html>
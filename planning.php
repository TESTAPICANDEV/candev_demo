<!DOCTYPE html>
<html>


<?php   
  session_start();
  include('navadmin.php');  ?>


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
                    <?php }?>
                    <li class="active">
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
               
        $bat=(" select * from agence where CodeAgence = $id;  ") or die(mysql_error());
        $fetch_res = $mysqli->query($bat);
        
        while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
        
        {
        
    ?>
                <h2 style="font-size: 20px; font-family: Charlemagne Std;">Planning <?php  echo $show['NomAgence'];  ?><?php } ?></h2>
            </div>
            <!--Ajouter Agence-->
                    <?php 
                    $prof = $_SESSION['Profil'];

                    if ($prof == 2) {  ?>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 pull-right" style="padding: 0 30px 15px 0;">
    <button type="button" class="btn btn-primary waves-effect pull-right ajouter_nouveau"><i class="fa fa-plus"></i> Ajouter Planning</button>
</div>
<?php } ?>
<br>
<div class="row clearfix">
    <div style="display: none;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form_card">
                    <div class="card">
                        <div class="header">      
                            <h2>Enrégistrement d'un planning<i class="material-icons btn btn-danger waves-effect pull-right close_form">close</i></h2>
                         </div>
                        <div  class="body">
                        <div class="demo-masked-input">
                            <form id="form_trajet" method="POST" autocomplete="off">
                            <div class="row clearfix">
                                   <div class="col-md-4">
                                    <p>
                                        <b>Gare</b>
                                    </p>
                                    <select class="form-control" id="CodeGare" data-live-search="true">
                                        <option></option>
                              <?php
                                                include("config.php");
                                             $id = $_SESSION['Agence'];

                                            $age=" SELECT * from gare 
                                            where CodeAgence = $id; ";
                                            $fetch_res = $mysqli->query($age) or die(mysql_error());

                                    while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
                                    {
                                    
                                ?> 
                             <option value="<?php  echo $show['CodeGare'];  ?>"><?php  echo $show['LibGare'];  ?></option>
                             <?php } ?>
                                    </select>
                                    </div>
                                <div class="col-md-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="VilleDepart" class="form-control">
                                        <label class="form-label">Lieu départ</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="VilleArrive" class="form-control">
                                        <label class="form-label">Lieu Arrivée</label>
                                    </div>
                                </div>
                                </div>
                                </div>
                                <div class="row clearfix">
                                <div class="col-md-4">
                                    <p>
                                        <b>Véhicule</b>
                                    </p>
                                    <select class="form-control" id="CodeVehi" data-live-search="true">
                                        <option></option>
                              <?php
                                                include("config.php");
                                                $ve = $_SESSION['Agence'];

                                            $age=" SELECT * from vehicule
                                            where CodeAgence=$ve; ";
                                            $fetch_res = $mysqli->query($age) or die(mysql_error());

                                    while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
                                    {
                                    
                                ?> 
                             <option value="<?php  echo $show['CodeVehi'];  ?>"><?php  echo $show['LibVehi'];  ?></option>
                             <?php } ?>
                                    </select>
                                    </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                             <input type="text" id="DateDepart" class="form-control floating-label" placeholder="Choisir date départ">
                                        </div>
                                    </div>
                                  </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="DateArrivee" class="form-control floating-label" placeholder="Choisir date d'arrivée">
                                        </div>
                                    </div> 
                                </div>                               

                                </div>

                                <div class="row clearfix">
                                <div class="col-md-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Prix" class="form-control">
                                        <label class="form-label">Prix</label>
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

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Liste des plannings
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Secteur</th>
                                            <th>Lieu Départ</th>
                                            <th>Date Départ</th>
                                            <th>Lieu Arrivée</th>
                                            <th>Date Arrivée</th>
                                            <th>Prix</th>
                                            <th>Disponible</th>
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Secteur</th>
                                            <th>Lieu Départ</th>
                                            <th>Date Départ</th>
                                            <th>Lieu Arrivée</th>
                                            <th>Date Arrivée</th>
                                            <th>Prix</th>
                                            <th>Disponible</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                <?php
                                include("config.php");
                           $id = $_SESSION['Agence'];

                            $age=" SELECT g.CodeAgence, t.CodeTrajet, g.CodeGare, v.NbrPlace, g.LibGare, t.VilleArrive, t.VilleDepart, t.Prix, t.DateDepart, t.DateArrivee from trajet t, proposer p, gare g, agence a, vehicule v 
                               where t.CodeTrajet = p.CodeTrajet 
                               and t.CodeVehi=v.CodeVehi 
                               and g.CodeAgence=a.CodeAgence 
                               and g.CodeGare=p.CodeGare
                               and t.DateDepart >= curdate()
                               and a.CodeAgence=$id; ";
                            $fetch_res = $mysqli->query($age) or die(mysql_error());
                    while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
                    {
                            $code_trajet = $show['CodeTrajet'];

                            $que ="SELECT count(*) as Nbr_passa from ticket 
                            where CodeTrajet=$code_trajet";
                             $reqt = $mysqli->query($que);
                              $affiche = $reqt->fetch_array(MYSQLI_ASSOC);
                               
                            $nbpa = $show['NbrPlace'];
                            $passa = $affiche['Nbr_passa'];

                            $sous = $nbpa - $passa;
                ?> 
                                        <tr>
                                            <td><?php  echo $show['LibGare'];  ?></td>
                                            <td><?php  echo $show['VilleDepart'];  ?></td>
                                            <td><?php  echo $show['DateDepart'];  ?></td>
                                            <td><?php  echo $show['VilleArrive'];  ?></td>
                                            <td><?php  echo $show['DateArrivee'];  ?></td>
                                            <td><?php  echo $show['Prix']; ?></td>
                                            <td><?php  echo $sous; ?></td>
                                            <td><a type="button" class="btn btn-danger">Supprimer</a>
                                            <a href="modif_planning.php?plann=<?php echo $show['CodeTrajet']; ?>" type="button" class="btn btn-warning">Modifier</a></td>
                                        </tr> 
                                        <?php } ?>                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </section>

<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
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
    <script src="js/pages/tables/jquery-datatable.js"></script>

    <!-- Bootstrap Colorpicker Js -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="plugins/dropzone/dropzone.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!--Alerte -->
    <script src="js/pages/ui/notifications.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>


    <!-- Jquery Core Js 
    <script src="plugins/jquery/jquery.min.js"></script>-->

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="plugins/momentjs/moment.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
<script type="text/javascript" src="js/bootstrap-material-datetimepicker.js"></script>


 

<script type="text/javascript">
        //  AJOUTER UN TRAJET
        $('#form_trajet').on('submit', function(e)
        {
            e.preventDefault();

            var depart = $('#VilleDepart').val();
            var arrive = $('#VilleArrive').val();
            var gare = $('#CodeGare').val();
            var datedepart = $('#DateDepart').val();
            var datearrive = $('#DateArrivee').val();
            var vehi = $('#CodeVehi').val();  
            var pri = $('#Prix').val(); 


        if( !depart || !arrive || !gare || !datedepart || !datearrive || !vehi || !pri)
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
                    url : "trait_trajet.php",
                    type : "POST",
                    data : {depart:depart, arrive:arrive, gare:gare, datedepart:datedepart, datearrive:datearrive, vehi:vehi, pri:pri},
                    dataType : "text",


                    success : function(retour)
                    {
                        if (retour == 'Success') {
                                $.notify({
                                             title: '<strong>Succès!</strong>',
                                               message: 'Trajet enrégistré.'
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

                              $.notify({
                                     title: '<strong>Erreur!</strong>',
                                       message: 'Vérifier la date départ.'
                                },{
                                     type: 'warning'
                                });
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

$('input[id="Prix"]').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^0-9 ]/g,'') ); }
);

</script>

    <script type="text/javascript">
        $(document).ready(function()
        {
            $('#date').bootstrapMaterialDatePicker
            ({
                weekStart : 0,
                time: false
            });

            $('#time').bootstrapMaterialDatePicker
            ({
                date: false,
                shortTime: true,
                format: 'HH:mm'
            });

            $('#date-format').bootstrapMaterialDatePicker
            ({
                format: 'dddd DD MMMM YYYY - HH:mm'
            });
            $('#date-fr').bootstrapMaterialDatePicker
            ({
                format: 'DD/MM/YYYY HH:mm',
                lang: 'fr',
                weekStart: 1, 
                cancelText : 'ANNULER'
            });

            $('#DateArrivee').bootstrapMaterialDatePicker
            ({
                weekStart: 0, format: 'DD/MM/YYYY HH:mm',
                lang: 'fr', cancelText : 'ANNULER'
            });

            $('#DateDepart').bootstrapMaterialDatePicker
            ({
                weekStart: 0, format: 'DD/MM/YYYY HH:mm',
                lang: 'fr', cancelText : 'ANNULER',

            }).on('change', function(e, date)
            {
                $('#DateArrivee').bootstrapMaterialDatePicker('setMinDate', date);
            });

            $('#min-date').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', minDate : new Date() });

            $.material.init()
        });
        </script>


<?php
include('logout.php');
 ?>
</body>

</html>
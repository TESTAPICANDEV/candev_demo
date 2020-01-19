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
                            <span>Agence</span>
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
                    <li>
                        <a href="planning.php">
                            <i class="material-icons">create_new_folder</i>
                            <span>Planning</span>
                        </a>
                    </li> 
                    <li class="active">
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
<?php } ?>
<br>
</div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Liste des payements
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Nom </th>
                                            <th>Prénoms</th>
                                            <th>Numéro</th>
                                            <th>Code ticket</th>
                                            <th>Date payement</th>
                                           <!-- <th>Action</th>-->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nom </th>
                                            <th>Prénoms</th>
                                            <th>Numéro</th>
                                            <th>Code ticket</th>
                                            <th>Date payement</th>
                                            <!--<th>Action</th>-->
                                        </tr>
                                    </tfoot>
                                    <tbody>
                <?php
                                include("config.php");
                           $id = $_SESSION['Agence'];

                            $age="SELECT j.CodePassager,p.NomPass, p.PrenPass, p.Numero, p.UniqueCode, j.DatePaye
                             From payement j, passager p
                             where j.CodePassager=p.CodePassager
                           and p.CodePassager IN (SELECT t.CodePassager
                       from ticket t 
                       where t.CodePassager = p.CodePassager
                       and t.CodeGare IN (SELECT g.CodeGare
                                          from gare g
                                          where g.CodeGare = t.CodeGare
                                          and g.CodeAgence =$id ));";
                            $fetch_res = $mysqli->query($age) or die(mysql_error());
                    while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
                    {

                ?> 
                                        <tr>
                                            <td><?php  echo $show['NomPass'];  ?></td>
                                            <td><?php  echo $show['PrenPass'];  ?></td>
                                            <td><?php  echo $show['Numero'];  ?></td>
                                            <td><?php  echo $show['UniqueCode'];  ?></td>
                                            <td><?php  echo $show['DatePaye'];  ?></td>
                                            
                                            <!--<td><a href="modif_planning.php?plann=</*?php  echo $show['CodeTrajet']; ?>"><i class="material-icons">mode_edit</i></a></td>-->
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
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
                            <i class="material-icons">local_activity</i>
                            <span>Gares</span>
                        </a>
                    </li>  
                    <li class="active">
                        <a href="planning.php">
                            <i class="material-icons">create_new_folder</i>
                            <span>Planning</span>
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
                <h2>Planning <?php  echo $show['NomAgence'];  ?><?php } ?></h2>
            </div>
            <!--Ajouter Agence-->
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 pull-right" style="padding: 0 30px 15px 0;">
    <button type="button" class="btn btn-primary waves-effect pull-right ajouter_nouveau"><i class="fa fa-plus"></i> Ajouter Planning</button>
</div>
<br>
<div class="row clearfix">
    <div style="display: none;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form_card">
                    <div class="card">
                        <div class="header">      
                            <h2>Enrégistrement d'un trajet</h2>
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
                                        <label class="form-label">Ville départ</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="VilleArrive" class="form-control">
                                        <label class="form-label">Ville Arrivée</label>
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

                                            $age=" select * from vehicule; ";
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
                                            <input type="text" id="DateDepart" class="datetimepicker form-control" placeholder="Date & Heure Depart">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="DateArrive" class="datetimepicker form-control" placeholder="Date & Heure Arrivée">
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
                                Liste des plannings
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Nom Gare</th>
                                            <th>Ville Depart</th>
                                            <th>Date Depart</th>
                                            <th>Ville Arrivée</th>
                                            <th>Date Arrivée</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nom Gare</th>
                                            <th>Ville Depart</th>
                                            <th>Date Depart</th>
                                            <th>Ville Arrivée</th>
                                            <th>Date Arrivée</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                <?php
                                include("config.php");
                         //$idgare = $_SESSION['CodeGare'];

                            $age=" SELECT * from trajet t, proposer p, gare g
                            where t.CodeTrajet = p.CodeTrajet and p.CodeGare=g.CodeGare ; ";
                            $fetch_res = $mysqli->query($age) or die(mysql_error());
                    while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
                    {
                    
                ?> 
                                        <tr>
                                            <td><?php  echo $show['LibGare'];  ?></td>
                                            <td><?php  echo $show['VilleDepart'];  ?></td>
                                            <td><?php  echo $show['DateDepart'];  ?></td>
                                            <td><?php  echo $show['VilleArrive'];  ?></td>
                                            <td><?php  echo $show['DateArrive'];  ?></td>
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

    <!-- Autosize Plugin Js -->
    <script src="plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>

<script type="text/javascript">
        //  AJOUTER UN TRAJET
        $('#form_trajet').on('submit', function(e)
        {
            e.preventDefault();

            var depart = $('#VilleDepart').val();
            var arrive = $('#VilleArrive').val();
            var gare = $('#CodeGare').val();
            var datedepart = $('#DateDepart').val();
            var datearrive = $('#DateArrive').val();
            var vehi = $('#CodeVehi').val();                     

            if( !depart || !arrive || !gare || !datedepart || !datearrive || !vehi)
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
                    data : {depart:depart, arrive:arrive, gare:gare, datedepart:datedepart, datearrive:datearrive, vehi:vehi},
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

$('.close_form').on('click', function()
{
    var racine = $(this).parent().parent().parent();

    racine.find('.form_card').slideToggle(400);
    racine.find('.ajouter_nouveau').fadeToggle(600);
});
</script>

<?php
include('logout.php');
 ?>
</body>

</html>
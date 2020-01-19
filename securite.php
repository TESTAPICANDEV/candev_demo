<!DOCTYPE html>
<html>

<?php
  include('logout.php');
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
                            <i class="material-icons">widgets</i>
                            <span>Agences</span>
                        </a>
                    </li>
                    <li>
                        <a href="utilisateurs.php">
                            <i class="material-icons">widgets</i>
                            <span>Utilisateurs</span>
                        </a>
                    </li> 
                    <li class="active">
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
                <h2>Accueil</h2>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Totale Agence</div>
                            <?php
                 include("config.php");

                $query="SELECT COUNT(*) as somme from agence ";
                $result = $mysqli->query($query) or die(mysql_error());
                while ($resultat = $result->fetch_array(MYSQLI_ASSOC))
                    { ?>
                
                            <div class="number count-to" data-from="0" data-to="<?php echo $resultat['somme']; ?>" data-speed="15" data-fresh-interval="20"> <?php } ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
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
                            <div class="number count-to" data-from="0" data-to="<?php echo $resultat['total']; ?>" data-speed="1000" data-fresh-interval="20"><?php } ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">Ticket Vendu</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW VISITORS</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>Statistiques</h2>
                                </div>
                                <div class="col-xs-12 col-sm-6 align-right">
                                    <div class="switch panel-switch-btn">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <?php
// just require TCPDF instead of FPDF
require_once('tcpdf\tcpdf.php');
require_once('tcpdf\fpdi.php');

class PDF extends FPDI
{
    /**
     * "Remembers" the template id of the imported page
     */
    var $_tplIdx;

    /**
     * Draw an imported PDF logo on every page
     */
    function Header()
    {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('lettreStage.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $size = $this->useTemplate($this->_tplIdx, 130, 5, 60);

        $this->SetFont('freesans', 'B', 20);
        $this->SetTextColor(0);
        $this->SetXY(PDF_MARGIN_LEFT, 5);
        $this->Cell(0, $size['h'], 'TCPDF and FPDI');
    }

    function Footer()
    {
        // emtpy method body
    }
}

// initiate PDF
$pdf = new PDF();
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(true, 40);
$pdf->setFontSubsetting(false);

// add a page
$pdf->AddPage();

// get external file content
$utf8text = file_get_contents('examples/data/utf8test.txt', true);

$pdf->SetFont('freeserif', '', 12);
// now write some text above the imported page
$pdf->Write(5, $utf8text);

$pdf->Output(); ?> 
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-light-blue">
                            <h2>Documentation</h2>
                        </div>
                        <div class="body">
                            Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra.
                        </div>
                    </div>
                </div>

            </div>
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

    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>
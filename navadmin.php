<!DOCTYPE >
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>GCcarpool</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="css/font-googleapis.css" rel="stylesheet" type="text/css">
    <link href="css/font-materialicon.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

      <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <!--<link rel="stylesheet" type="text/css" href="css/pikaday.css">-->

        <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

        <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/bootstrap-material-datetimepicker.css" />
  

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-blue">
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand">GCcarpool</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                                <?php 
                include('config.php');

       if (!isset($_SESSION['Utilisateur']))
        {
            header('location:index.php');
        }
        else
        {

        $iduser=$_SESSION['Utilisateur'];
        $emp=(" SELECT * 
            from utilisateur u, profil p
            where u.Profil_id=p.Profil_id
            and Id_Util='$iduser';") or die(mysql_error());
        $fetch_res = $mysqli->query($emp);

        while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
        {
    ?>
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $show['Nom_Util']; ?>  <?php echo $show['Pren_Util']; ?></div>
                    <div class="email"><?php echo $show['Profil_Nom']; ?> <?php }; } ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Compte</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="#" data-toggle="modal" data-target="#logout"><i class="material-icons">input</i>Déconnexion</a></li>
                        </ul>
                    </div>
                </div>
            </div>
<?php
require_once 'inc/db.php';
require_once 'inc/functions.php';
require_once 'inc/connect.php';
logged_only();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Espace Formation</title>

    <!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="css/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Espace Formation</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
		        	<li class="dropdown" class="active">
                <a href="toutesformAdmin.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Mes formations <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="formvalideesAdmin.php">Vos formations validées</a></li>
                  <li><a href="formenattAdmin.php">Vos formations en attente de validation</a></li>
                  <li><a href="formRefuseeAdmin.php">Vos formations refusées</a></li>
                  <li><a href="toutesformAdmin.php">Toutes vos formations</a></li>
                </ul>
            </li>
            <li><a href="catalogueAdmin.php">Catalogue de formations</a></li>
		        <li class="dropdown" class="active">
                <a href="validationAdmin.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Espace gestionnaire <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="validationAdmin.php">Gestion des formations</a></li>
                  <li><a href="ajoutAdmin.php">Inscription au service</a></li>
                  <li><a href="catalogueEmploye.php">Liste des employés</a></li>
                  <li><a href="ajoutForm.php">Ajouter une formation</a></li>
                </ul>
            </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li class="dropdown" class="active">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><?php echo $_SESSION['nom'] ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="destroy.php">Déconnexion</a></li>
                  <li><a href="modifEmploye.php">Modifier mon compte</a></li>
                </ul>
            </li>            
                        </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
<?php
require_once '../models/utilisateur.class.php';
require_once '../models/db.class.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Wik'Ynov</title>
    <link rel="icon" type="image/png" href="../assets/images/favi.jpg"/>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/stylesheets/stylesheets.css">
</head>
<body>
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <p class="navbar-brand">Wik'Ynov</p>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Utilisateurs <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="messagerie_controller.php">Messagerie</a></li>
                            <li><a href="droitusers_controller.php">Droit utilisateur</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Articles <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="ajoutearticle_controller.php">Ajouter article</a></li>
                            <li><a href="ajoutercategories_controller.php">Ajouter catégorie</a></li>
                            <li><a href="index_controller.php">Administrer</a></li>
                            <li><a href="../controllers/vu_controller.php">Vu publique</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-left" action="affichresul_controller.php" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" name="rechercher" placeholder="Rechercher">
                    </div>
                    <button type="submit" name="gorech" class="btn btn-default"><div class="glyphicon glyphicon-search"></div></button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><?php if (isset($_SESSION['session'])) {
                                echo '<form method="post"><button type="submit" name="deco"><div class="glyphicon glyphicon-off"></div></button></form>';
                                if (isset($_POST['deco'])) {
                                    $user = new utilisateur($_SESSION['session']['prenom'], $_SESSION['session']['nom']);
                                    $user->deconnexion();
                                    echo '<script>document.location = "accueil_controller.php"</script>';
                                }
                            } ?></a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>